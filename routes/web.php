<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriTrainingController;
use App\Http\Controllers\TrainingController;

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

Route::get('/', function () {
    return "Halaman Login";
});

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


