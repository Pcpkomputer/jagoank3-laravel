<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HubungiKamiController extends Controller
{
    public function show(Request $request)
    {
        $hubungikami = DB::select("SELECT * FROM hubungikami_html");
        
        return view("HubungiKami.hubungikami", ["hubungikami"=>$hubungikami[0]->html]);
    }

    public function update(Request $request){

        $html = $request->html;

        $delete = DB::delete("DELETE FROM hubungikami_html");
        $insert = DB::insert("INSERT INTO hubungikami_html VALUES (?)",[$html]);
        return redirect("/admin/hubungikami");
    }


}
