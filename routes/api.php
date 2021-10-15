<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\IsAuthenticate;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


function random_strings($length_of_string) 
{ 
    $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; 
    return substr(str_shuffle($str_result), 0, $length_of_string); 
} 




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get("/banner",function (Request $request){
    
    $banner = DB::select("SELECT * FROM banner");

    return $banner;
});

Route::get("/instruktur", function (Request $request){
    
    $instruktur = DB::select("SELECT * FROM instruktur");

    return $instruktur;
});

Route::get("/instruktur/{id}", function (Request $request){
    $id = $request->id;

    $instruktur = DB::select("SELECT * FROM instruktur WHERE id_instruktur=?",[$id]);

    return $instruktur;
    
});


Route::get("/shop", function (Request $request){
    
    $shop = DB::select("SELECT * FROM shop");

    return $shop;
});


Route::get("/artikel", function (Request $request){
    $artikel = DB::select("SELECT * FROM artikel");

    return $artikel;
});

Route::get("/artikel/{id}", function (Request $request){
    $id = $request->id;

    $artikel = DB::select("SELECT artikel.*,admin.username FROM artikel INNER JOIN admin ON admin.id_admin=artikel.penulis WHERE id_artikel=?",[$id]);

    return $artikel;
});

Route::get("/galeri", function (Request $request){
    $galeri = DB::select("SELECT * FROM galeri");

    return $galeri;
});


Route::get("/dashboardtext", function (Request $request){
    $dashboardtext = DB::select("SELECT * FROM dashboardtext WHERE id_dashboardtext=0");
    $parsed = json_decode($dashboardtext[0]->json);

    return $parsed;
});




Route::get("/ourclient", function (Request $request){
    $ourclient = DB::select("SELECT * FROM ourclient");
    
    return $ourclient;
});

Route::post("/login", function (Request $request){

    $validated = $request->validate([
        'email' => 'required',
        'katasandi' => 'required',
    ]);

    $email = $request->email;
    $katasandi = $request->katasandi;

    $exist = DB::select("SELECT * FROM user WHERE email=? OR username=?",[$email,$email]);

    if(count($exist)==0){
        return ["success"=>false,"msg"=>"Email belum terdaftar..."];
    }

    if($exist[0]->email==$email && $exist[0]->kata_sandi==$katasandi){
        $encrypt =  Crypt::encryptString(json_encode($exist[0]));
        return ["success"=>true,"credentials"=>
        [
            "detail"=>[
                "id"=>$exist[0]->user_id,
                "nama"=>$exist[0]->nama,
                "email"=>$exist[0]->email,
                "notelepon"=>$exist[0]->no_telepon,
            ],
            "token"=>$encrypt
        ]
        ];
    }
    else if($exist[0]->username==$email && $exist[0]->kata_sandi==$katasandi){
        $encrypt =  Crypt::encryptString(json_encode($exist[0]));
        return ["success"=>true,"credentials"=>
        [
            "detail"=>[
                "id"=>$exist[0]->user_id,
                "nama"=>$exist[0]->nama,
                "email"=>$exist[0]->email,
                "notelepon"=>$exist[0]->no_telepon,
            ],
            "token"=>$encrypt
        ]
        ];
    }
    else{
        return ["success"=>false,"msg"=>"Login gagal..."];
    }
});

Route::post("/register", function (Request $request){
    $validated = $request->validate([
        'nama' => 'required',
        'username' => 'required',
        'nickname' => 'required',
        'email' => 'required',
        'notelepon' => 'required',
        'katasandi' => 'required',
    ]);

    

    $nama = $request->nama;
    $username = $request->username;
    $nickname = $request->nickname;
    $email = $request->email;
    $notelepon = $request->notelepon;
    $katasandi = $request->katasandi;

    $duplicate = DB::select("SELECT * FROM user WHERE email=?",[$email]);
    $duplicate2 = DB::select("SELECT * FROM yser WHERE username=?",[$username]);


    if(count($duplicate)>0){
        return ["success"=>false,"msg"=>"Email telah terdaftar..."];
    }
    else if(count($duplicate2)>0){
        return ["success"=>false,"msg"=>"Username telah terdaftar..."];
    }

    $insert = DB::insert("INSERT INTO user VALUES (NULL,?,?,?,?,?,?,?)",[$nama,$username,$nickname,$email,$notelepon,$katasandi,random_strings(6)]);

    return ["success"=>true];

});


Route::get("/jadwaltrainingterdekat", function (Request $request){
    $terdekat = DB::select("SELECT * FROM training WHERE jadwaltraining BETWEEN NOW() AND date_add(NOW(), interval 9 day)");

    return $terdekat;
});

Route::post("/trainingbydateandcategory", function (Request $request){

    $validated = $request->validate([
        'from' => 'required',
        'to' => 'required',
        'id_kategoritraining'=>'required'
    ]);

    $from = $request->from;
    $to = $request->to;
    $id_kategoritraining = $request->id_kategoritraining;

    $req = DB::select("SELECT * FROM training WHERE kategoritraining=? AND jadwaltraining BETWEEN ? AND ?",[$id_kategoritraining,$from,$to]);

    return $req;
});


Route::get("/training/{id}", function(Request $request, $id){
    $training = DB::select("SELECT * FROM training WHERE id_training=?",[$id]);
    $itemtraining = DB::select("SELECT * FROM item_training WHERE id_training=?",[$id]);

    $training[0]->itemtraining=$itemtraining;

    return $training;
});

Route::post("/trainingbydateandsubcategory", function (Request $request){

    $validated = $request->validate([
        'from' => 'required',
        'to' => 'required',
        'id_kategoritraining'=>'required',
        'subkategori'=>'required'
    ]);

    $from = $request->from;
    $to = $request->to;
    $id_kategoritraining = $request->id_kategoritraining;
    $subkategori = $request->subkategori;

    $req = DB::select("SELECT * FROM training WHERE kategoritraining=? AND subkategoritraining=? AND jadwaltraining BETWEEN ? AND ?",[$id_kategoritraining,$subkategori,$from,$to]);

    return $req;
});


Route::post("/trainingbydate", function (Request $request){

    $validated = $request->validate([
        'from' => 'required',
        'to' => 'required'
    ]);

    $from = $request->from;
    $to = $request->to;

    $req = DB::select("SELECT * FROM training WHERE jadwaltraining BETWEEN ? AND ?",[$from,$to]);

    return $req;
});

Route::post("/trainingbysubkategori", function (Request $request){
    $validated = $request->validate([
        'subkategori' => 'required',
    ]);

    $subkategori = $request->subkategori;

    $training = DB::select("SELECT * FROM training WHERE subkategoritraining=?",[$subkategori]);

    return $training;
});

Route::get("/kategoritraining", function (Request $request){
    $arr = array();

    $kategori = DB::select("SELECT * FROM kategori_training");
    foreach ($kategori as $key => $value) {
        $payload = new StdClass();
        $payload->kategori=$value;
        
        $subkategori = DB::select("SELECT * FROM subkategori_training WHERE id_kategoritraining=?",[$value->id_kategoritraining]);
        $payload->subkategori=$subkategori;

        array_push($arr,$payload);
    }
    return $arr;
});


Route::post("/getstokkursi",function (Request $request){

    $validated = $request->validate([
        'id_training' => 'required',
        'id_itemtraining' => 'required'
    ]);

    $id_training = $request->id_training;
    $id_itemtraining = $request->id_itemtraining;

    $stokkursi = DB::select("SELECT * FROM item_training WHERE id_training=? AND id=?",[$id_training,$id_itemtraining]);
    $stokterpenuhi = DB::select("SELECT * FROM invoice_training WHERE id_itemtraining=?",[$id_itemtraining]);
    
    $stokterpenuhi = count($stokterpenuhi);

    $stokkursi[0]->kursiterpenuhi=$stokterpenuhi;

    return $stokkursi[0];
});


Route::post("/gettestimoni", function (Request $request){
    $validated = $request->validate([
        'id_testimoni' => 'required'
    ]);

    $id = $request->id_testimoni;
    $join = join(",",$id);

    $testimoni = DB::select("SELECT pelatihan_testimoni.*,user.nama FROM pelatihan_testimoni INNER JOIN user ON user.user_id=pelatihan_testimoni.user_id WHERE id_pelatihantestimoni IN (?)",[$join]);

    return $testimoni;
});

Route::post("/createinvoice", function (Request $request){
    $validated = $request->validate([
        'pemesanan' => 'required',
        'credentials' => 'required'
    ]);

    ///// PROCESS AUTH
    $token = $request->bearerToken();
    $tokenparsed = Crypt::decryptString($token);
    $tokenparsed = json_decode($tokenparsed);
    $exist = DB::select("SELECT * FROM user WHERE user_id=?",[$tokenparsed->user_id]);
    if(count($exist)==0){
        return [
            "success"=>false,
            "msg"=>"Unauthorized"
        ];
    }
    else if($tokenparsed->email!=$exist[0]->email && $tokenparsed->password!=$exist[0]->password){
        return [
            "success"=>false,
            "msg"=>"Unauthorized"
        ];
    }
    /////


    $pemesanan = $request->pemesanan;
    $referral = $request->referral;
    $credentials = $request->credentials;
    $totaldibayarfrontend = $request->totaldibayarfrontend;

    $total = 0;
    $diskon = 0;
    $referral = 0;

    foreach ($pemesanan["keranjang"] as $key => $value) {
        if($value["itemtraining"]["sedangpromo"]){
            $promoexpired = Carbon::parse($value["itemtraining"]["tanggalpromoberakhir"])->isPast();
            if($promoexpired){
                $total = $total + $value["itemtraining"]["hargapaketpelatihan"];
            }
            else{
                $total = $total + $value["itemtraining"]["hargapromopaketpelatihan"];
            }
        }
        else{
            $total = $total + $value["itemtraining"]["hargapaketpelatihan"];
        }

    }

    if($pemesanan["diskon"]!=null){
        $diskon = 0;
    }else{
        $diskon = 0;
    }

    if($referral!=null){
        $referral=0;
    }
    else{
        $referral=0;
    }

    if($totaldibayarfrontend!==$total-($diskon+$referral)){
        return [
            "success"=>false,
            "msg"=>"Terdapat kesalahan dalam perhitungan harga, silakan coba kembali..."
        ];
    }

    $uuid = (string)Str::uuid();
    $date = new Carbon();

    $kodeinvoice = "INV/".$date->format("Y")."/".$date->format("m")."/".$date->format("d")."/".$tokenparsed->user_id."/".$uuid;
    $idtraining = $pemesanan["keranjang"][0]["training"]["id_training"];
    $iditemtraining = $pemesanan["keranjang"][0]["itemtraining"]["id"];
    $userid = $tokenparsed->user_id;

    $promoexpired = Carbon::parse($pemesanan["keranjang"][0]["itemtraining"]["tanggalpromoberakhir"])->isPast();
    if($promoexpired){
        $belisaatpromo=false;
    }
    else{
        $belisaatpromo=true;
    }

    $insert = DB::insert("INSERT INTO invoice_training VALUES (?,?,?,?,?,NOW(),?,?)",[
        $uuid,
        $kodeinvoice,
        $idtraining,
        $iditemtraining,
        $userid,
        $belisaatpromo,
        "Belum Dibayar"
    ]);


    return [
        "success"=>true,
        "data"=>[
            "pemesanan"=>$pemesanan,
            "referral"=>$referral,
            "credentials"=>$credentials
        ],
        "total"=>$total,
        "diskon"=>$diskon,
        "referral"=>$referral,
        "totaldibayar"=>$total-($diskon+$referral),
        "kodeinvoice"=>$kodeinvoice
    ];
});