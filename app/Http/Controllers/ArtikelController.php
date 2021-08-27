<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ArtikelController extends Controller
{
    public function show(Request $request)
    {
        return view("Artikel.artikel");
    }


    public function create(Request $request)
    {
        return view("Artikel.artikel-create");
    }

    public function update(Request $request, $id){
        return view("Artikel.artikel-update");
    }

    public function delete(Request $request, $id){
        return "delete";
    }

    public function create_post(Request $request, $id){
        return "create post";
    }

    public function update_post(Request $request, $id){
        return "update_post";
    }
}
