<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\IsAuthenticate;

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
        return ["success"=>true,"credentials"=>$exist[0]];
    }
    else if($exist[0]->username==$email && $exist[0]->kata_sandi==$katasandi){
        return ["success"=>true,"credentials"=>$exist[0]];
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

    if(count($duplicate)>0){
        return ["success"=>false,"msg"=>"Email telah terdaftar..."];
    }

    $insert = DB::insert("INSERT INTO user VALUES (NULL,?,?,?,?,?,?,?)",[$nama,$username,$nickname,$email,$notelepon,$katasandi,random_strings(6)]);

    return ["success"=>true];

});


Route::get("/jadwaltrainingterdekat", function (Request $request){
    $terdekat = DB::select("SELECT * FROM training WHERE jadwaltraining BETWEEN NOW() AND date_add(NOW(), interval 9 day)");

    return $terdekat;
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