<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function show(Request $request)
    {
        return view("User.user");
    }


    public function create(Request $request)
    {
        return view("User.user-create");
    }

    public function update(Request $request, $id){
        return view("User.user-update");
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
