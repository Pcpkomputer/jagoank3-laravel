<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function show(Request $request)
    {

        $artikel = DB::select("SELECT artikel.*, admin.username FROM artikel INNER JOIN admin ON admin.id_admin=artikel.penulis;");

        return view("Artikel.artikel", ["artikel"=>$artikel]);
    }


    public function create(Request $request)
    {

        return view("Artikel.artikel-create");
    }

    public function update(Request $request, $id){

        $artikel = DB::select("SELECT * FROM artikel WHERE id_artikel=?",[$id]);

        if(count($artikel)==0){
            return redirect("/artikel")->with("alert-info","Tidak ditemukan artikel dengan id tersebut");
        }


        return view("Artikel.artikel-update", ["artikel"=>$artikel[0]]);
    }

    public function delete(Request $request, $id){

        $gambar = DB::select("select gambar_artikel from artikel where id_artikel=?",[$id]);

        if(count($gambar)>0){
            if(file_exists(Storage::disk('local')->path("public/artikel/".$gambar[0]->gambar_artikel))){
                unlink(Storage::disk('local')->path("public/artikel/".$gambar[0]->gambar_artikel));
            }
        }

        $delete = DB::delete("delete from artikel WHERE id_artikel=?",[$id]);
      
        return redirect("/artikel")->with("alert-success","Sukses menghapus artikel...");
    }

    public function create_post(Request $request){

        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $judul = $request->judul;
        $konten = $request->konten;

        $image      = $request->file('foto');
        $fileName   = time() . '.' . $image->getClientOriginalExtension();

        Storage::disk('local')->putFileAs('', $image, 'public'.'/artikel'.'/'.$fileName);

        $current_date = date('Y-m-d H:i:s');

        $insert = DB::insert("insert into artikel (gambar_artikel,judul_artikel,tanggal_dibuat,penulis,konten) VALUES (?,?,?,?,?)",[$fileName,$judul,$current_date,$request->session()->get("credentials")["id_admin"],$konten]);

        return redirect("/artikel")->with("alert-success","Sukses menambahkan artikel...");
    }

    public function update_post(Request $request, $id){


        if($request->hasFile("foto")){

            $gambar = DB::select("select gambar_artikel from artikel where id_artikel=?",[$id]);
            if(count($gambar)>0){
                if(file_exists(Storage::disk('local')->path("public/artikel/".$gambar[0]->gambar_artikel))){
                    unlink(Storage::disk('local')->path("public/artikel/".$gambar[0]->gambar_artikel));
                }
            }

            $validated = $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
           
            $judul = $request->judul;
            $konten = $request->konten;

            $image      = $request->file('foto');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
    
            Storage::disk('local')->putFileAs('', $image, 'public'.'/artikel'.'/'.$fileName);
    
            $update = DB::update("update artikel SET judul_artikel=?,gambar_artikel=?,konten=? WHERE id_artikel=?",[$judul,$fileName,$konten,$id]);
    
            return redirect("/artikel")->with("alert-success","Sukses mengubah artikel...");;
        }
        else{
    
            $judul = $request->judul;
            $konten = $request->konten;
    
            $update = DB::update("update artikel SET judul_artikel=?,konten=? WHERE id_artikel=?",[$judul,$konten,$id]);
    
            return redirect("/artikel")->with("alert-success","Sukses mengubah artikel..");;
        }


    }
}
