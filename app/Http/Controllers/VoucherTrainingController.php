<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;



class VoucherTrainingController extends Controller
{
    public function show(Request $request)
    {



        return view("VoucherTraining.vouchertraining");
    }


    public function create(Request $request)
    {

        return view("VoucherTraining.vouchertraining-create");
    }

    public function update(Request $request, $id){


        return view("VoucherTraining.vouchertraining-update");
    }

    public function delete(Request $request, $id){
        return "delete";
    }

    public function create_post(Request $request){
        
        return "create_post";
    }

    public function update_post(Request $request, $id){

        return "update_post";
    }
}
