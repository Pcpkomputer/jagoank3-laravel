<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class GaleriController extends Controller
{
    public function show(Request $request)
    {
        return view("Galeri.galeri");
    }


    public function create(Request $request)
    {
        return view("Galeri.galeri-create");
    }

    public function update(Request $request, $id){
        return view("Galeri.galeri-update");
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
