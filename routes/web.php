<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriTrainingController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\VoucherTrainingController;
use App\Http\Controllers\DashboardTextController;
use App\Http\Controllers\OurClientController;
use App\Http\Controllers\InvoiceTrainingController;
use App\Http\Controllers\InvoiceShopController;
use App\Http\Controllers\HubungiKamiController;
use App\Http\Controllers\AlamatKamiController;
use App\Http\Controllers\TentangJagoanK3Controller;
use App\Http\Controllers\HalamanBantuanController;
use App\Http\Controllers\WebinarController;

use App\Http\Middleware\IsAuthenticate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function (Request $request) {

    if($request->session()->has("credentials")){
        return redirect("/admin/dashboard");
    }

    return view("login");
});

Route::get("/admin/logout", function (Request $request){

    $request->session()->forget('credentials');

    return redirect("/admin");
});

Route::post("/admin", function (Request $request){

    $email = $request->email;
    $password = $request->password;

    $select = DB::select("select * from admin where email=?",[$email]);

    if(count($select)==0){
        return redirect("/admin")->with("alert-danger","Tidak ditemukan user tersebut");
    }

    $e = $select[0]->email;
    $p = $select[0]->password;

    if($e==$email && $p==$password){
        $request->session()->put("credentials",[
            "id_admin"=>$select[0]->id_admin,
            "email"=>$select[0]->email,
            "username"=>$select[0]->username,
            "password"=>$select[0]->password,
        ]);
        return redirect("/admin/dashboard");
    }   
    else{
        return redirect("/admin")->with("alert-danger","Login gagal");
    }

});



Route::middleware([IsAuthenticate::class])->group(function () {


        Route::prefix('admin')->group(function(){
            
            Route::get('/dashboard', function(Request $request){
        
                return view("dashboard");
            });
            
    
            // Banner Route
            Route::prefix('banner')->group(function () {
                Route::get("/",[BannerController::class,"show"]);
                Route::get("/create",[BannerController::class,"create"]);
                Route::get("/update/{id}",[BannerController::class,"update"]);
                Route::get("/delete/{id}",[BannerController::class,"delete"]);
    
                Route::post("/create",[BannerController::class,"create_post"]);
                Route::put("/update/{id}",[BannerController::class,"update_post"]);
            });
    
            // Artikel Route
            Route::prefix('artikel')->group(function(){
                Route::get("/",[ArtikelController::class,"show"]);
                Route::get("/create",[ArtikelController::class,"create"]);
                Route::get("/update/{id}",[ArtikelController::class,"update"]);
                Route::get("/delete/{id}",[ArtikelController::class,"delete"]);
    
                Route::post("/create",[ArtikelController::class,"create_post"]);
                Route::put("/update/{id}",[ArtikelController::class,"update_post"]);
            });
    
            // Kategori Training Route
            Route::prefix('kategoritraining')->group(function(){
                Route::get("/",[KategoriTrainingController::class,"show"]);
                Route::get("/create",[KategoriTrainingController::class,"create"]);
                Route::get("/update/{id}",[KategoriTrainingController::class,"update"]);
                Route::get("/delete/{id}",[KategoriTrainingController::class,"delete"]);
    
                Route::post("/create",[KategoriTrainingController::class,"create_post"]);
                Route::put("/update/{id}",[KategoriTrainingController::class,"update_post"]);
            });
    
    
            // Training Route
            Route::prefix('training')->group(function(){
                Route::get("/",[TrainingController::class,"show"]);
                Route::get("/create",[TrainingController::class,"create"]);
                Route::get("/update/{id}",[TrainingController::class,"update"]);
                Route::get("/delete/{id}",[TrainingController::class,"delete"]);
    
                Route::post("/create",[TrainingController::class,"create_post"]);
                Route::put("/update/{id}",[TrainingController::class,"update_post"]);
            });
    
    
            // User Route
            Route::prefix('user')->group(function(){
                Route::get("/",[UserController::class,"show"]);
                Route::get("/create",[UserController::class,"create"]);
                Route::get("/update/{id}",[UserController::class,"update"]);
                Route::get("/delete/{id}",[UserController::class,"delete"]);
    
                Route::post("/create",[UserController::class,"create_post"]);
                Route::put("/update/{id}",[UserController::class,"update_post"]);
            });
    
    
            // Galeri Route
            Route::prefix('galeri')->group(function(){
                Route::get("/",[GaleriController::class,"show"]);
                Route::get("/create",[GaleriController::class,"create"]);
                Route::get("/update/{id}",[GaleriController::class,"update"]);
                Route::get("/delete/{id}",[GaleriController::class,"delete"]);
    
                Route::post("/create",[GaleriController::class,"create_post"]);
                Route::put("/update/{id}",[GaleriController::class,"update_post"]);
            });


            // Webinar Route
            Route::prefix('webinar')->group(function(){
                Route::get("/",[WebinarController::class,"show"]);
                Route::get("/create",[WebinarController::class,"create"]);
                Route::get("/update/{id}",[WebinarController::class,"update"]);
                Route::get("/delete/{id}",[WebinarController::class,"delete"]);
    
                Route::post("/create",[WebinarController::class,"create_post"]);
                Route::put("/update/{id}",[WebinarController::class,"update_post"]);
            });
    
    
            // Instruktur Route
            Route::prefix('instruktur')->group(function(){
                Route::get("/",[InstrukturController::class,"show"]);
                Route::get("/create",[InstrukturController::class,"create"]);
                Route::get("/update/{id}",[InstrukturController::class,"update"]);
                Route::get("/delete/{id}",[InstrukturController::class,"delete"]);
    
                Route::post("/create",[InstrukturController::class,"create_post"]);
                Route::put("/update/{id}",[InstrukturController::class,"update_post"]);
            });
    
    
            // Shop Route
            Route::prefix('shop')->group(function(){
                Route::get("/",[ShopController::class,"show"]);
                Route::get("/create",[ShopController::class,"create"]);
                Route::get("/update/{id}",[ShopController::class,"update"]);
                Route::get("/delete/{id}",[ShopController::class,"delete"]);
    
                Route::post("/create",[ShopController::class,"create_post"]);
                Route::put("/update/{id}",[ShopController::class,"update_post"]);
            });
    
    
              // Voucher Training Route
              Route::prefix('vouchertraining')->group(function(){
                Route::get("/",[VoucherTrainingController::class,"show"]);
                Route::get("/create",[VoucherTrainingController::class,"create"]);
                Route::get("/update/{id}",[VoucherTrainingController::class,"update"]);
                Route::get("/delete/{id}",[VoucherTrainingController::class,"delete"]);
    
                Route::post("/create",[VoucherTrainingController::class,"create_post"]);
                Route::put("/update/{id}",[VoucherTrainingController::class,"update_post"]);
            });
    
    
    
              // Dashboard Text Route
              Route::prefix('dashboardtext')->group(function(){
                Route::get("/",[DashboardTextController::class,"show"]);
                // Route::get("/create",[DashboardTextController::class,"create"]);
                // Route::get("/update/{id}",[DashboardTextController::class,"update"]);
                // Route::get("/delete/{id}",[DashboardTextController::class,"delete"]);
    
                Route::post("/create",[DashboardTextController::class,"create_post"]);
                Route::put("/update/{id}",[DashboardTextController::class,"update_post"]);
            });

            // Our Client Route
            Route::prefix('ourclient')->group(function(){
                Route::get("/",[OurClientController::class,"show"]);
                Route::get("/create",[OurClientController::class,"create"]);
                Route::get("/update/{id}",[OurClientController::class,"update"]);
                Route::get("/delete/{id}",[OurClientController::class,"delete"]);
    
                Route::post("/create",[OurClientController::class,"create_post"]);
                Route::put("/update/{id}",[OurClientController::class,"update_post"]);
            });


              // Invoice Training Route
              Route::prefix('invoicetraining')->group(function(){
                Route::get("/",[InvoiceTrainingController::class,"show"]);
                Route::get("/create",[InvoiceTrainingController::class,"create"]);
                Route::get("/detail/{id}",[InvoiceTrainingController::class,"detail"]);
                Route::post("/detail/{id}",[InvoiceTrainingController::class,"updatedetail"]);
                Route::get("/delete/{id}",[InvoiceTrainingController::class,"delete"]);
    
                Route::post("/create",[InvoiceTrainingController::class,"create_post"]);
                Route::put("/update/{id}",[InvoiceTrainingController::class,"update_post"]);
            });

              // Invoice Shop Route
              Route::prefix('invoiceshop')->group(function(){
                Route::get("/",[InvoiceShopController::class,"show"]);
                Route::get("/create",[InvoiceShopController::class,"create"]);
                Route::get("/detail/{id}",[InvoiceShopController::class,"detail"]);
                Route::post("/detail/{id}",[InvoiceShopController::class,"updatedetail"]);
                Route::get("/delete/{id}",[InvoiceShopController::class,"delete"]);
    
                Route::post("/create",[InvoiceShopController::class,"create_post"]);
                Route::put("/update/{id}",[InvoiceShopController::class,"update_post"]);
            });


             // Hubungi Kami Route
             Route::prefix('hubungikami')->group(function(){
                Route::get("/",[HubungiKamiController::class,"show"]);
                Route::post("/",[HubungiKamiController::class,"update"]);
            });


             // Alamat Kami Route
             Route::prefix('alamatkami')->group(function(){
                Route::get("/",[AlamatKamiController::class,"show"]);
                Route::post("/",[AlamatKamiController::class,"update"]);
            });

              // Tentang Jagoan K3
              Route::prefix('tentangjagoank3')->group(function(){
                Route::get("/",[TentangJagoanK3Controller::class,"show"]);
                Route::post("/",[TentangJagoanK3Controller::class,"update"]);
            });

               // Halaman Bantuan
               Route::prefix('halamanbantuan')->group(function(){
                Route::get("/",[HalamanBantuanController::class,"show"]);
                Route::post("/",[HalamanBantuanController::class,"update"]);
            });

        });


        /// EXTRA
        Route::get("/api/get/subkategori/{id}", function(Request $request){
            $id = $request->id;
            $subkategori = DB::select("SELECT * FROM subkategori_training WHERE id_kategoritraining=?",[$id]);
            return $subkategori;
        });

        Route::get("/api/get/testimoni/{id}", function(Request $request){
            $id = $request->id;
            $testimoni = DB::select("SELECT * FROM pelatihan_testimoni INNER JOIN user ON pelatihan_testimoni.user_id=user.user_id WHERE id_kategoritraining=?",[$id]);
            return $testimoni;
        });

});










