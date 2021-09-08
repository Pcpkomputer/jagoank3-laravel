<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function show(Request $request)
    {
        $galeri = DB::select('select * from galeri');

        return view("Galeri.galeri", ["galeri"=>$galeri]);
    }


    public function create(Request $request)
    {
        return view("Galeri.galeri-create");
    }

    public function update(Request $request, $id){

        $galeri = DB::select('select * from galeri where id_galeri=?',[$id]);

        if(count($galeri)==0){
            return redirect("/galeri")->with("alert-info","Tidak ditemukan galeri dengan id tersebut...");
        }
        

        return view("Galeri.galeri-update", ["galeri"=>$galeri[0]]);
    }

    public function delete(Request $request, $id){

        $gambar = DB::select("select gambar from galeri where id_galeri=?",[$id]);

        if(count($gambar)>0){
            if(file_exists(Storage::disk('local')->path("public/galeri/".$gambar[0]->gambar))){
                unlink(Storage::disk('local')->path("public/galeri/".$gambar[0]->gambar));
            }
        }

        $delete = DB::delete("delete from galeri WHERE id_galeri=?",[$id]);
      
        return redirect("/galeri")->with("alert-success","Sukses menghapus galeri...");
    }

    public function create_post(Request $request){

        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $judul = $request->judul;

        $image      = $request->file('foto');
        $fileName   = time() . '.' . $image->getClientOriginalExtension();

        Storage::disk('local')->putFileAs('', $image, 'public'.'/galeri'.'/'.$fileName);

        $insert = DB::insert("insert into galeri (judul,gambar) VALUES (?,?)",[$judul,$fileName]);

        return redirect("/galeri")->with("alert-success","Sukses menambah item...");
    }

    public function update_post(Request $request, $id){


        if($request->hasFile("foto")){

            $gambar = DB::select("select gambar from galeri where id_galeri=?",[$id]);
            if(count($gambar)>0){
                if(file_exists(Storage::disk('local')->path("public/galeri/".$gambar[0]->gambar))){
                    unlink(Storage::disk('local')->path("public/galeri/".$gambar[0]->gambar));
                }
            }

            $validated = $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $judul = $request->judul;
    
            $image      = $request->file('foto');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
    
            Storage::disk('local')->putFileAs('', $image, 'public'.'/galeri'.'/'.$fileName);
    
            $update = DB::update("update galeri SET judul=?,gambar=? WHERE id_galeri=?",[$judul,$fileName,$id]);
    
            return redirect("/galeri")->with("alert-success","Sukses mengubah galeri...");;
        }
        else{
    
            $judul = $request->judul;
    
            $update = DB::update("update galeri SET judul=? WHERE id_galeri=?",[$judul,$id]);
    
            return redirect("/galeri")->with("alert-success","Sukses mengubah galeri...");;
        }

    }
}
