<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HalamanBantuanController extends Controller
{
    public function show(Request $request)
    {
        $halamanbantuan = DB::select("SELECT * FROM halamanbantuan_html");
        
        $halamanbantuan = json_decode($halamanbantuan[0]->json);

        return view("HalamanBantuan.halamanbantuan", ["halamanbantuan"=>$halamanbantuan]);
    }

    public function update(Request $request){

        $hubungikami = $request->hubungikami;
        $syaratdanketentuan = $request->syaratdanketentuan;
        $faq = $request->faq;
        $sosialmedia = $request->sosialmedia;

        $decode = json_encode([
            "hubungikami"=>$hubungikami,
            "syaratdanketentuan"=>$syaratdanketentuan,
            "faq"=>$faq,
            "sosialmedia"=>$sosialmedia
        ]);
        

        $delete = DB::delete("DELETE FROM halamanbantuan_html");
        $insert = DB::insert("INSERT INTO halamanbantuan_html VALUES (?)",[$decode]);
        return redirect("/admin/halamanbantuan");
    }


}
