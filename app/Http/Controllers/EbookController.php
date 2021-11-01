<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EbookController extends Controller
{
    public function show(Request $request)
    {
        $ebook = DB::select("SELECT * FROM ebook");

        return view("Ebook.ebook",["ebook"=>$ebook]);
    }


    public function create(Request $request)
    {
        return view("Ebook.ebook-create");
    }

    public function update(Request $request, $id){
        

        $ebook = DB::select("SELECT * FROM ebook WHERE id_ebook=?",[$id]);

        if(count($ebook)==0){
            return redirect("/admin/ebook")->with("alert-info","Tidak ditemukan ebook dengan id tersebut...");
        }

        return view("Ebook.ebook-update",["ebook"=>$ebook[0]]);
    }

    public function delete(Request $request, $id){


        $ebook = DB::select("SELECT * FROM ebook WHERE id_ebook=?",[$id]);
        if(count($ebook)>0){
            if(file_exists(Storage::disk('local')->path("public/ebook/".$ebook[0]->file_ebook))){
                unlink(Storage::disk('local')->path("public/ebook/".$ebook[0]->file_ebook));
            }
        }

        $delete = DB::delete("DELETE FROM ebook WHERE id_ebook=?",[$id]);
      
        return redirect("/admin/ebook")->with("alert-success","Sukses menghapus ebook...");


    }

    public function create_post(Request $request){

        $validated = $request->validate([
            'file' => 'required|mimes:pdf',
        ]);

        $nama = $request->nama;


        $file      = $request->file('file');
        $fileName   = time() . '.' . $file->getClientOriginalExtension();
        Storage::disk('local')->putFileAs('', $file, 'public'.'/ebook'.'/'.$fileName);

        $insert = DB::insert("INSERT INTO ebook VALUES (NULL,?,?)",[$nama,$fileName]);
        
        return redirect("/admin/ebook")->with("alert-success","Sukses menambah e-book...");;

    }

    public function update_post(Request $request, $id){

        // $validated = $request->validate([
        //     'file' => 'required|mimes:pdf',
        // ]);


        if($request->hasFile("file")){

            $ebook = DB::select("SELECT * FROM ebook WHERE id_ebook=?",[$id]);
            if(count($ebook)>0){
                if(file_exists(Storage::disk('local')->path("public/ebook/".$ebook[0]->file_ebook))){
                    unlink(Storage::disk('local')->path("public/ebook/".$ebook[0]->file_ebook));
                }
            }

            $nama = $request->nama;

            $file      = $request->file('file');
            $fileName   = time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('', $file, 'public'.'/ebook'.'/'.$fileName);

            $update = DB::update("UPDATE ebook SET nama_ebook=?,file_ebook=? WHERE id_ebook=?",[$nama,$fileName,$id]);
        
            return redirect("/admin/ebook")->with("alert-success","Sukses mengubah ebook...");
        }
        else{

            $nama = $request->nama;

            $update = DB::update("UPDATE ebook SET nama_ebook=? WHERE id_ebook=?",[$nama,$id]);
            return redirect("/admin/ebook")->with("alert-success","Sukses mengubah ebook...");
        }

    }
}
