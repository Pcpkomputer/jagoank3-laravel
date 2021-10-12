<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class TrainingController extends Controller
{
    public function show(Request $request)
    {
      

        return view("Training.training");
    }


    public function create(Request $request)
    {
        $kategoritraining = DB::select("SELECT * FROM kategori_training");
        $galeri = DB::select("SELECT * FROM galeri");

        if(count($kategoritraining)>0){
            $subkategori = DB::select("SELECT * FROM subkategori_training WHERE id_kategoritraining=?",[$kategoritraining[0]->id_kategoritraining]);
            $testimoni = DB::select("SELECT * FROM pelatihan_testimoni WHERE id_kategoritraining=?",[$kategoritraining[0]->id_kategoritraining]);
        }

        return view("Training.training-create", ["galeri"=>$galeri, "testimoni"=>$testimoni, "subkategori"=>$subkategori, "kategoritraining"=>$kategoritraining]);
    }

    public function update(Request $request, $id){
        return view("Training.training-update");
    }

    public function delete(Request $request, $id){
        return "delete";
    }

    public function create_post(Request $request, $id){
        return "create post";
    }

    public function update_post(Request $request, $id){
        return "update_post";
    }
}
