<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function show(Request $request)
    {
        $shop = DB::select('select * from shop');

        return view("Shop.shop", ["shop"=>$shop]);
    }


    public function create(Request $request)
    {
        return view("Shop.shop-create");
    }

    public function update(Request $request, $id){

        $shop = DB::select('select * from shop WHERE id_item=?',[$id]);

        if(count($shop)==0){
            return redirect("/shop")->with("alert-info","Tidak ditemukan instruktur dengan id tersebut...");
        }

        return view("Shop.shop-update", ["shop"=>$shop[0]]);
    }

    public function delete(Request $request, $id){

        $gambar = DB::select("select gambar_barang from shop where id_item=?",[$id]);

        if(count($gambar)>0){
            if(file_exists(Storage::disk('local')->path("public/shop/".$gambar[0]->gambar_barang))){
                unlink(Storage::disk('local')->path("public/shop/".$gambar[0]->gambar_barang));
            }
        }

        $delete = DB::delete("delete from shop WHERE id_item=?",[$id]);
      
        return redirect("/shop")->with("alert-success","Sukses menghapus item...");
    }

    public function create_post(Request $request){

        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $nama = $request->nama;
        $deskripsi = $request->deskripsi;
        $harga = $request->harga;

        $image      = $request->file('foto');
        $fileName   = time() . '.' . $image->getClientOriginalExtension();

        Storage::disk('local')->putFileAs('', $image, 'public'.'/shop'.'/'.$fileName);

        $insert = DB::insert("insert into shop (nama_barang,deskripsi,harga,gambar_barang) VALUES (?,?,?,?)",[$nama,$deskripsi,$harga,$fileName]);

        return redirect("/shop")->with("alert-success","Sukses menambah item...");

    }

    public function update_post(Request $request, $id){

        if($request->hasFile("foto")){

            $gambar = DB::select("select gambar_barang from shop where id_item=?",[$id]);
            if(count($gambar)>0){
                if(file_exists(Storage::disk('local')->path("public/shop/".$gambar[0]->gambar_barang))){
                    unlink(Storage::disk('local')->path("public/shop/".$gambar[0]->gambar_barang));
                }
            }

            $validated = $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $nama = $request->nama;
            $deskripsi = $request->deskripsi;
            $harga = $request->harga;
    
            $image      = $request->file('foto');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
    
            Storage::disk('local')->putFileAs('', $image, 'public'.'/shop'.'/'.$fileName);
    
            $update = DB::update("update shop SET nama_barang=?,deskripsi=?,harga=?,gambar_barang=? WHERE id_item=?",[$nama,$deskripsi,$harga,$fileName,$id]);
    
            return redirect("/shop")->with("alert-success","Sukses mengubah item...");;
        }
        else{
    
            $nama = $request->nama;
            $deskripsi = $request->deskripsi;
            $harga = $request->harga;
    
    
            $update = DB::update("update shop SET nama_barang=?,deskripsi=?,harga=? WHERE id_item=?",[$nama,$deskripsi,$harga,$id]);
    
            return redirect("/shop")->with("alert-success","Sukses mengubah item...");;
        }

      
    }
}
