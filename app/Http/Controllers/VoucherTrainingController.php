<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;



class VoucherTrainingController extends Controller
{
    public function show(Request $request)
    {

        $vouchertraining = DB::select("SELECT * FROM voucher_training");


        return view("VoucherTraining.vouchertraining", ["vouchertraining"=>$vouchertraining]);
    }


    public function create(Request $request)
    {

        return view("VoucherTraining.vouchertraining-create");
    }

    public function update(Request $request, $id){

        $vouchertraining = DB::select("SELECT * FROM voucher_training WHERE id_vouchertraining=?",[$id]);

        if(count($vouchertraining)==0){
            return redirect("/admin/vouchertraining")->with("alert-info","Tidak ditemukan voucher dengan id tersebut...");
        }

        return view("VoucherTraining.vouchertraining-update", ["vouchertraining"=>$vouchertraining[0]]);
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

        return redirect("/admin/vouchertraining")->with("alert-success","Sukses menambahkan voucher training...");
    }

    public function update_post(Request $request, $id){

        $kode = $request->kode;
        $nominal = $request->nominal;
        $jumlah = $request->jumlah;

        $update = DB::update("UPDATE voucher_training SET kode_voucher=?,nominal=?,jumlahvoucher=? WHERE id_vouchertraining=?",[$kode,$nominal,$jumlah,$id]);
        
        return redirect("/admin/vouchertraining")->with("alert-success","Sukses mengubah voucher training...");
    }
}
