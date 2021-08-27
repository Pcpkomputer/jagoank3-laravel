<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BannerController extends Controller
{
    public function show(Request $request)
    {
        return view("Banner.banner");
    }


    public function create(Request $request)
    {
        return view("Banner.banner-create");
    }

    public function update(Request $request, $id){
        return view("Banner.banner-update");
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
