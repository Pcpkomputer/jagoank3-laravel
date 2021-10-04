<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardTextController extends Controller
{
    public function show(Request $request)
    {
        $dashboardtext = DB::select("SELECT * FROM dashboardtext WHERE id_dashboardtext=0");
        $parsed = json_decode($dashboardtext[0]->json);

        return view("DashboardText.dashboardtext", ["dashboardtext"=>$parsed]);
    }


    public function create(Request $request)
    {
        return view("DashboardText.dashboardtext-create");
    }

    public function update(Request $request, $id){

        // $banner = DB::select("SELECT * FROM banner WHERE id_banner=?",[$id]);

        // if(count($banner)==0){
        //     return redirect("/admin/banner")->with("alert-info","Tidak ditemukan banner dengan id tersebut");
        // }


        return view("DashboardText.dashboardtext-update");
    }

    public function delete(Request $request, $id){
        
        // $gambar = DB::select("select gambar from banner where id_banner=?",[$id]);

        // if(count($gambar)>0){
        //     if(file_exists(Storage::disk('local')->path("public/banner/".$gambar[0]->gambar))){
        //         unlink(Storage::disk('local')->path("public/banner/".$gambar[0]->gambar));
        //     }
        // }

        // $delete = DB::delete("delete from banner WHERE id_banner=?",[$id]);
      
        // return redirect("/admin/banner")->with("alert-success","Sukses menghapus banner...");

        return "delete";

    }

    public function create_post(Request $request){

        $json = $request->jsonpayload;

        $exist = DB::select("SELECT * FROM dashboardtext WHERE id_dashboardtext=0");

        if($request->hasFile("section2gambar-0")){
            Storage::disk('local')->putFileAs('', $request["section2gambar-0"], 'public'.'/section2'.'/'.'section2gambar-0.jpg');
        }
        if($request->hasFile("section2gambar-1")){
            Storage::disk('local')->putFileAs('', $request->section2gambar-0, 'public'.'/section2'.'/'.'section2gambar-1.jpg');
        }
        if($request->hasFile("section2gambar-2")){
            Storage::disk('local')->putFileAs('', $request->section2gambar-0, 'public'.'/section2'.'/'.'section2gambar-2.jpg');
        }

        if(count($exist)>0){
            $update = DB::update("UPDATE dashboardtext SET json=? WHERE id_dashboardtext=0",[$json]);
            return redirect("/admin/dashboardtext")->with("alert-success","Sukses mengubah dashboard text...");
        }
        else{
            $insert = DB::insert("INSERT INTO dashboardtext (id_dashboardtext,json) VALUE (?,?)",[0,$json]);
            return redirect("/admin/dashboardtext")->with("alert-success","Sukses menambah dashboard text...");
        }


    }

    public function update_post(Request $request, $id){


        // if($request->hasFile("foto")){

        //     $gambar = DB::select("select gambar from banner where id_banner=?",[$id]);
        //     if(count($gambar)>0){
        //         if(file_exists(Storage::disk('local')->path("public/banner/".$gambar[0]->gambar))){
        //             unlink(Storage::disk('local')->path("public/banner/".$gambar[0]->gambar));
        //         }
        //     }

        //     $validated = $request->validate([
        //         'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]);
    
           
        //     $caption = $request->caption;
        //     $deskripsi = $request->deskripsi;

        //     $image      = $request->file('foto');
        //     $fileName   = time() . '.' . $image->getClientOriginalExtension();
    
        //     Storage::disk('local')->putFileAs('', $image, 'public'.'/gambar'.'/'.$fileName);
    
        //     $update = DB::update("update banner SET caption=?,deskripsi=?,gambar=? WHERE id_banner=?",[$caption,$deskripsi,$fileName,$id]);
    
        //     return redirect("/admin/banner")->with("alert-success","Sukses mengubah banner...");;
        // }
        // else{

        //     $caption = $request->caption;
        //     $deskripsi = $request->deskripsi;
    
        //      $update = DB::update("update banner SET caption=?,deskripsi=? WHERE id_banner=?",[$caption,$deskripsi,$id]);
    
        //     return redirect("/admin/banner")->with("alert-success","Sukses mengubah banner...");;
        // }

        return "update post";

    }
}
