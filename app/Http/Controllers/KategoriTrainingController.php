<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KategoriTrainingController extends Controller
{
    public function show(Request $request)
    {

        $kategoritraining = DB::select("SELECT * FROM kategori_training");

        return view("KategoriTraining.kategoritraining", ["kategoritraining"=>$kategoritraining]);
    }


    public function create(Request $request)
    {
        return view("KategoriTraining.kategoritraining-create");
    }

    public function update(Request $request, $id){

        $kategoritraining = DB::select("SELECT * FROM kategori_training WHERE id_kategoritraining=?",[$id]);
        $subkategoritraining = DB::select("SELECT * FROM subkategori_training WHERE id_kategoritraining=?",[$id]);

        return view("KategoriTraining.kategoritraining-update",["kategoritraining"=>$kategoritraining[0],"subkategoritraining"=>$subkategoritraining]);
    }

    public function delete(Request $request, $id){

        $delete = DB::delete("DELETE FROM kategori_training WHERE id_kategoritraining=?",[$id]);

        return redirect("/admin/kategoritraining")->with("alert-success","Sukses menghapus kategori training...");
    }

    public function create_post(Request $request){

        $kategoritraining = $request->namakategoritraining;

        $insert = DB::insert("INSERT INTO kategori_training VALUES (NULL,?)",[$kategoritraining]);

        $lastid = DB::getPdo()->lastInsertId();

        foreach ($request->subkategori as $key => $value) {
            $insert2 = DB::insert("INSERT INTO subkategori_training VALUES (?,?)",[$lastid,$value]);
        }

        return redirect("/admin/kategoritraining")->with("alert-success","Sukses menambahkan kategori training...");
    }

    public function update_post(Request $request, $id){

        $kategoritraining = $request->namakategoritraining;

        $update = DB::insert("UPDATE kategori_training SET nama_kategoritraining=? WHERE id_kategoritraining=?",[$kategoritraining,$id]);

        $deletesub = DB::delete("DELETE FROM subkategori_training WHERE id_kategoritraining=?",[$id]);

        foreach ($request->subkategori as $key => $value) {
            $insert = DB::insert("INSERT INTO subkategori_training VALUES (?,?)",[$id,$value]);
        }

        return redirect("/admin/kategoritraining")->with("alert-success","Sukses mengubah kategori training...");
    }
}
