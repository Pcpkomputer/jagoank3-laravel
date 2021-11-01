<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WebinarController extends Controller
{
    public function show(Request $request)
    {
        $webinar = DB::select("SELECT * FROM webinar");

        return view("Webinar.webinar",["webinar"=>$webinar]);
    }


    public function create(Request $request)
    {
        return view("Webinar.webinar-create");
    }

    public function update(Request $request, $id){

        $webinar = DB::select('select * from webinar where id_webinar=?',[$id]);

        if(count($webinar)==0){
            return redirect("/admin/webinar")->with("alert-info","Tidak ditemukan webinar dengan id tersebut...");
        }
        

        return view("Webinar.webinar-update", ["webinar"=>$webinar[0]]);
    }

    public function delete(Request $request, $id){


        $delete = DB::delete("delete from webinar WHERE id_webinar=?",[$id]);
      
        return redirect("/admin/webinar")->with("alert-success","Sukses menghapus webinar...");


    }

    public function create_post(Request $request){

        $judul = $request->judul;
        $linkyoutube = $request->linkyoutube;

        $insert = DB::insert("INSERT INTO webinar VALUES (NULL,?,?)",[$judul,$linkyoutube]);
        
        return redirect("/admin/webinar")->with("alert-success","Sukses membuat webinar...");;
    }

    public function update_post(Request $request, $id){

        $nama = $request->nama;
        $linkyoutube = $request->linkyoutube;

        $update = DB::update("UPDATE webinar SET nama_webinar=?,link_youtube=? WHERE id_webinar=?",[$nama,$linkyoutube,$id]);

        return redirect("/admin/webinar")->with("alert-success","Sukses mengubah webinar...");

    }
}
