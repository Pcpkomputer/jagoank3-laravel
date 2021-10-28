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


class InvoiceShopController extends Controller
{
    public function show(Request $request)
    {
        $invoiceshop = DB::select("SELECT invoice_shop.*, user.nama FROM invoice_shop INNER JOIN user ON user.user_id=invoice_shop.user_id");
        
        return view("InvoiceShop.invoiceshop", ["invoiceshop"=>$invoiceshop]);
    }


    // public function create(Request $request)
    // {

    //     return view("User.user-create");
    // }

    public function updatedetail(Request $request, $id){
        $sudahdibayar = $request->sudahdibayar;
        
        $update = DB::update("UPDATE invoice_shop SET status=? WHERE id_invoiceshop=?",[$sudahdibayar,$id]);

        return redirect("/admin/invoiceshop");
    }

    public function detail(Request $request, $id){

        $invoiceshop = DB::select("SELECT * FROM invoice_shop WHERE id_invoiceshop=?",[$id]);
        $iteminvoiceshop = DB::select("SELECT * FROM item_invoiceshop INNER JOIN shop ON item_invoiceshop.id_item=shop.id_item WHERE id_invoiceshop=?",[$id]);

        $totaldibayar = 0;
        foreach ($iteminvoiceshop as $key => $value) {
            $totaldibayar = $totaldibayar + $value->harga;
        }


        return view("InvoiceShop.invoiceshop-detail",[
            "invoiceshop"=>$invoiceshop,
            "iteminvoiceshop"=>$iteminvoiceshop,
            "jumlahdibayar"=>$totaldibayar
        ]);
    }

    public function delete(Request $request, $id){

        $delete = DB::delete("DELETE FROM invoice_shop WHERE id_invoiceshop=?",[$id]);

        return redirect("/admin/invoiceshop");
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
