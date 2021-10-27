<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

function random_strings($length_of_string) 
{ 
    $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; 
    return substr(str_shuffle($str_result), 0, $length_of_string); 
} 


class InvoiceTrainingController extends Controller
{
    public function show(Request $request)
    {
        $invoicetraining = DB::select("SELECT invoice_training.*,item_training.namapaketpelatihan, user.nama FROM invoice_training INNER JOIN item_training ON item_training.id=invoice_training.id_itemtraining INNER JOIN user ON user.user_id=invoice_training.user_id");
        
        return view("InvoiceTraining.invoicetraining", ["invoicetraining"=>$invoicetraining]);
    }


    // public function create(Request $request)
    // {

    //     return view("User.user-create");
    // }

    public function updatedetail(Request $request, $id){
        $sudahdibayar = $request->sudahdibayar;
        
        $update = DB::update("UPDATE invoice_training SET status=? WHERE id_invoicetraining=?",[$sudahdibayar,$id]);

        return redirect("/admin/invoicetraining");
    }

    public function detail(Request $request, $id){

        $invoicetraining = DB::select("SELECT * FROM invoice_training WHERE id_invoicetraining=?",[$id]);
        $itemtraining = DB::select("SELECT * FROM item_training WHERE id=?",[$invoicetraining[0]->id_itemtraining]);
        $referral = DB::select("SELECT user.referral_code,training.nominalpemotonganreferral FROM penerima_referral INNER JOIN invoice_training ON penerima_referral.id_invoicetraining=invoice_training.id_invoicetraining INNER JOIN item_training ON invoice_training.id_itemtraining=item_training.id INNER JOIN user ON user.user_id=penerima_referral.user_id INNER JOIN training ON training.id_training=invoice_training.id_training WHERE penerima_referral.id_invoicetraining=?",[$id]);
        $voucher = DB::select("SELECT * FROM used_vouchertraining INNER JOIN voucher_training ON voucher_training.id_vouchertraining=used_vouchertraining.id_vouchertraining WHERE used_vouchertraining.id_invoicetraining=?",[$id]);

        $totaldibayar = 0;

        // return $itemtraining;

        if($invoicetraining[0]->belisaatpromo==1){
            $totaldibayar = $itemtraining[0]->hargapromopaketpelatihan;
        }   
        else{   
            $totaldibayar = $itemtraining[0]->hargapaketpelatihan;
        }

        ////

        if(count($referral)>0){
            $totaldibayar = $totaldibayar - $referral[0]->nominalpemotonganreferral;
        }
        
        if(count($voucher)>0){
            $totaldibayar = $totaldibayar - $voucher[0]->nominal;
        }

        return view("InvoiceTraining.invoicetraining-detail",[
            "invoicetraining"=>$invoicetraining,
            "itemtraining"=>$itemtraining,
            "referral"=>$referral,
            "voucher"=>$voucher,
            "jumlahdibayar"=>$totaldibayar
        ]);
    }

    public function delete(Request $request, $id){

        $delete = DB::delete("DELETE FROM invoice_training WHERE id_invoicetraining=?",[$id]);

        return redirect("/admin/invoicetraining");
    }

    // public function create_post(Request $request){
        
    //     $nama = $request->nama;
    //     $username = $request->username;
    //     $nickname = $request->nickname;
    //     $email = $request->email;
    //     $no_telepon = $request->no_telepon;
    //     $kata_sandi = $request->kata_sandi;

    //     $insert = DB::insert("INSERT INTO user (nama,username,nickname,email,no_telepon,kata_sandi,referral_code) VALUES (?,?,?,?,?,?,?)",[$nama, $username,$nickname,$email,$no_telepon,$kata_sandi,random_strings(6)]);

    //     return redirect("/admin/user")->with("alert-success","Sukses membuat user baru...");
    // }

    // public function update_post(Request $request, $id){

    //     $nama = $request->nama;
    //     $username = $request->username;
    //     $nickname = $request->nickname;
    //     $email = $request->email;
    //     $no_telepon = $request->no_telepon;
    //     $kata_sandi = $request->kata_sandi;

    //     $insert = DB::insert("UPDATE user SET nama=?,username=?,nickname=?,email=?,no_telepon=?,kata_sandi=? WHERE user_id=?",[$nama, $username,$nickname,$email,$no_telepon,$kata_sandi,$id]);

    //     return redirect("/admin/user")->with("alert-success","Sukses mengubah user...");
    // }
}
