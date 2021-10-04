<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function show(Request $request)
    {
        $banner = DB::select("SELECT * FROM banner");
        return view("Banner.banner",["banner"=>$banner]);
    }


    public function create(Request $request)
    {
        return view("Banner.banner-create");
    }

    public function update(Request $request, $id){

        $banner = DB::select("SELECT * FROM banner WHERE id_banner=?",[$id]);

        if(count($banner)==0){
            return redirect("/admin/banner")->with("alert-info","Tidak ditemukan banner dengan id tersebut");
        }


        return view("Banner.banner-update", ["banner"=>$banner[0]]);
    }

    public function delete(Request $request, $id){
        
        $gambar = DB::select("select gambar from banner where id_banner=?",[$id]);

        if(count($gambar)>0){
            if(file_exists(Storage::disk('local')->path("public/banner/".$gambar[0]->gambar))){
                unlink(Storage::disk('local')->path("public/banner/".$gambar[0]->gambar));
            }
        }

        $delete = DB::delete("delete from banner WHERE id_banner=?",[$id]);
      
        return redirect("/admin/banner")->with("alert-success","Sukses menghapus banner...");

    }

    public function create_post(Request $request){

        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $caption = $request->caption;
        $deskripsi = $request->deskripsi;

        $image      = $request->file('foto');
        $fileName   = time() . '.' . $image->getClientOriginalExtension();

        Storage::disk('local')->putFileAs('', $image, 'public'.'/banner'.'/'.$fileName);

        //$current_date = date('Y-m-d H:i:s');

        $insert = DB::insert("insert into banner (gambar,caption,deskripsi) VALUES (?,?,?)",[$fileName,$caption,$deskripsi]);

        return redirect("/admin/banner")->with("alert-success","Sukses menambahkan banner...");
    }

    public function update_post(Request $request, $id){


        if($request->hasFile("foto")){

            $gambar = DB::select("select gambar from banner where id_banner=?",[$id]);
            if(count($gambar)>0){
                if(file_exists(Storage::disk('local')->path("public/banner/".$gambar[0]->gambar))){
                    unlink(Storage::disk('local')->path("public/banner/".$gambar[0]->gambar));
                }
            }

            $validated = $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
           
            $caption = $request->caption;
            $deskripsi = $request->deskripsi;

            $image      = $request->file('foto');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
    
            Storage::disk('local')->putFileAs('', $image, 'public'.'/gambar'.'/'.$fileName);
    
            $update = DB::update("update banner SET caption=?,deskripsi=?,gambar=? WHERE id_banner=?",[$caption,$deskripsi,$fileName,$id]);
    
            return redirect("/admin/banner")->with("alert-success","Sukses mengubah banner...");;
        }
        else{

            $caption = $request->caption;
            $deskripsi = $request->deskripsi;
    
             $update = DB::update("update banner SET caption=?,deskripsi=? WHERE id_banner=?",[$caption,$deskripsi,$id]);
    
            return redirect("/admin/banner")->with("alert-success","Sukses mengubah banner...");;
        }

    }
}
