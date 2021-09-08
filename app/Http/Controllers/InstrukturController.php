<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class InstrukturController extends Controller
{
    public function show(Request $request)
    {
        $instruktur = DB::select('select * from instruktur');

        return view("Instruktur.instruktur",["instruktur"=>$instruktur]);
    }


    public function create(Request $request)
    {

        return view("Instruktur.instruktur-create");
    }

    public function update(Request $request, $id){

        $instruktur = DB::select('select * from instruktur WHERE id_instruktur=?',[$id]);

        if(count($instruktur)==0){
            return redirect("/instruktur")->with("alert-info","Tidak ditemukan instruktur dengan id tersebut...");
        }
        
        return view("Instruktur.instruktur-update", ['instruktur'=>$instruktur[0]]);
    }

    public function delete(Request $request, $id){


        $gambar = DB::select("select foto from instruktur where id_instruktur=?",[$id]);
        if(count($gambar)>0){
            if(file_exists(Storage::disk('local')->path("public/instruktur/".$gambar[0]->foto))){
                unlink(Storage::disk('local')->path("public/instruktur/".$gambar[0]->foto));
            }
        }

        $delete = DB::delete("delete from instruktur where id_instruktur=?",[$id]);
        
        return redirect("/instruktur")->with("alert-success","Sukses menghapus instruktur...");;
    }

    public function create_post(Request $request){

        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $id_instruktur = $request->id_instruktur;
        $nama = $request->nama;
        $tentang = $request->tentang;
        $posisi = $request->posisi;
        $videoyt = $request->videoyt;

        $image      = $request->file('foto');
        $fileName   = time() . '.' . $image->getClientOriginalExtension();

        Storage::disk('local')->putFileAs('', $image, 'public'.'/instruktur'.'/'.$fileName);
        

        $insert = DB::insert("insert into instruktur (nama,tentang,posisi,videoyt,foto) VALUES (?,?,?,?,?)",[$nama,$tentang,$posisi,$videoyt,$fileName]);

        return redirect("/instruktur")->with("alert-success","Sukses menambah instruktur...");;

    }

    public function update_post(Request $request, $id){

        if($request->hasFile("foto")){

            $gambar = DB::select("select foto from instruktur where id_instruktur=?",[$id]);
            if(count($gambar)>0){
                if(file_exists(Storage::disk('local')->path("public/instruktur/".$gambar[0]->foto))){
                    unlink(Storage::disk('local')->path("public/instruktur/".$gambar[0]->foto));
                }
            }

            $validated = $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $id_instruktur = $request->id_instruktur;
            $nama = $request->nama;
            $tentang = $request->tentang;
            $posisi = $request->posisi;
            $videoyt = $request->videoyt;

            $image      = $request->file('foto');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();

            Storage::disk('local')->putFileAs('', $image, 'public'.'/instruktur'.'/'.$fileName);

            $update = DB::update("update instruktur SET nama=?,foto=?,tentang=?,posisi=?,videoyt=? where id_instruktur=?",[$nama,$fileName,$tentang,$posisi,$videoyt,$id_instruktur]);

            return redirect("/instruktur")->with("alert-success","Sukses mengubah instruktur...");;
        }
        else{

            $id_instruktur = $request->id_instruktur;
            $nama = $request->nama;
            $tentang = $request->tentang;
            $posisi = $request->posisi;
            $videoyt = $request->videoyt;

            $update = DB::update("update instruktur SET nama=?,tentang=?,posisi=?,videoyt=? where id_instruktur=?",[$nama,$tentang,$posisi,$videoyt,$id_instruktur]);
         
            return redirect("/instruktur")->with("alert-success","Sukses mengubah instruktur...");;
        }

        
    }
}
