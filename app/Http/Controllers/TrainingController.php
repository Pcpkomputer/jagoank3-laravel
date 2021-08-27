<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TrainingController extends Controller
{
    public function show(Request $request)
    {
        return view("Training.training");
    }


    public function create(Request $request)
    {
        return view("Training.training-create");
    }

    public function update(Request $request, $id){
        return view("Training.training-update");
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
