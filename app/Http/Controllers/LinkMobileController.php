<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LinkMobileController extends Controller
{
    public function show(Request $request)
    {
        $android = DB::select("SELECT * FROM linkmobile WHERE id='android'")[0];
        $ios = DB::select("SELECT * FROM linkmobile WHERE id='ios'")[0];

        return view("LinkMobile.linkmobile",["android"=>$android,"ios"=>$ios]);
    }


    public function update(Request $request)
    {
        $playstore = $request->playstore;
        $appstore = $request->appstore;

        DB::update("UPDATE linkmobile SET link=? WHERE id='android'",[$playstore]);
        DB::update("UPDATE linkmobile SET link=? WHERE id='ios'",[$appstore]);

        return redirect("/admin/linkmobile")->with("alert-success","Sukses mengubah link mobile...");
    }

 
}
