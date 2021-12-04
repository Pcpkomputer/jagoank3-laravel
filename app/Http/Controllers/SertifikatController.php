<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class SertifikatController extends Controller
{
    public function show(Request $request)
    {
        $sertifikat = DB::select("SELECT * FROM sertifikat");
        return view("Sertifikat.sertifikat",["sertifikat"=>$sertifikat]);
    }


    public function createsertifikat(Request $request)
    {
        $uniq = Str::uuid();
        $idtraining = $request->idtraining;
        $html = $request->htmlsertifikat;

        $insert = DB::insert("INSERT INTO sertifikat VALUES (?,?,?)",[$uniq,$idtraining,$html]);

        return redirect("/admin/sertifikat")->with("alert-info","Sukses menambahkan sertifikat...");
    }


    public function create(Request $request)
    {

        $training = DB::select("SELECT * FROM training");

        return view("Sertifikat.sertifikat-create",["training"=>$training]);
    }

    public function update(Request $request, $id){

        $training = DB::select("SELECT * FROM training");

        $sertifikat = DB::select("SELECT * FROM sertifikat WHERE id_sertifikat=?",[$id]);

        return view("Sertifikat.sertifikat-update", ["training"=>$training,"sertifikat"=>$sertifikat[0]]);
    }

    public function delete(Request $request, $id){

        $delete = DB::delete("DELETE FROM voucher_training WHERE id_vouchertraining=?",[$id]);

       return redirect("/admin/vouchertraining")->with("alert-success","Sukses menghapus voucher training...");
    }

    public function create_post(Request $request){

        $kode = $request->kode;
        $nominal = $request->nominal;
        $jumlah = $request->jumlah;

        $insert = DB::insert("INSERT INTO voucher_training (kode_voucher,nominal,jumlahvoucher) VALUES (?,?,?)",[$kode,$nominal,$jumlah]);

        return redirect("/admin/vouchertraining")->with("alert-success","Sukses menambahkan sertifikat...");
    }

    public function update_post(Request $request, $id){

        $id = $request->id;
        $html = $request->htmlsertifikat;
        $idtraining = $request->idtraining;

        $update = DB::update("UPDATE sertifikat SET html=?,id_training=? WHERE id_sertifikat=?",[$html,$idtraining,$id]);

        return redirect("/admin/sertifikat")->with("alert-success","Sukses mengubah sertifikat...");
    }
}
