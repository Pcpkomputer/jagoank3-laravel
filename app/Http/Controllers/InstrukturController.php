<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class InstrukturController extends Controller
{
    public function show(Request $request)
    {
        return view("Instruktur.instruktur");
    }


    public function create(Request $request)
    {
        return view("Instruktur.instruktur-create");
    }

    public function update(Request $request, $id){
        return view("Instruktur.instruktur-update");
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
