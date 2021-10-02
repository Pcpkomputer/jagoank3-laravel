<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

Route::get("/galeri", function (Request $request){
    $galeri = DB::select("SELECT * FROM galeri");

    return $galeri;
});
