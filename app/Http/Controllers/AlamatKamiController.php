<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AlamatKamiController extends Controller
{
    public function show(Request $request)
    {
        $alamatkami = DB::select("SELECT * FROM alamatkami_html");
        
        return view("AlamatKami.alamatkami", ["alamatkami"=>$alamatkami[0]->html]);
    }

    public function update(Request $request){

        $html = $request->html;

        $delete = DB::delete("DELETE FROM alamatkami_html");
        $insert = DB::insert("INSERT INTO alamatkami_html VALUES (?)",[$html]);
        
        return redirect("/admin/alamatkami");
   
    }


}
