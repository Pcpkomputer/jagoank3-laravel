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


class UserController extends Controller
{
    public function show(Request $request)
    {

        $user = DB::select("SELECT * FROM user");

        return view("User.user", ["user"=>$user]);
    }


    public function create(Request $request)
    {

        return view("User.user-create");
    }

    public function update(Request $request, $id){

        $user = DB::select("SELECT * FROM user WHERE user_id=?",[$id]);

        return view("User.user-update", ["user"=>$user[0]]);
    }

    public function delete(Request $request, $id){
        return "delete";
    }

    public function create_post(Request $request){
        
        $nama = $request->nama;
        $username = $request->username;
        $nickname = $request->nickname;
        $email = $request->email;
        $no_telepon = $request->no_telepon;
        $kata_sandi = $request->kata_sandi;

        $insert = DB::insert("INSERT INTO user (nama,username,nickname,email,no_telepon,kata_sandi,referral_code) VALUES (?,?,?,?,?,?,?)",[$nama, $username,$nickname,$email,$no_telepon,$kata_sandi,random_strings(6)]);

        return redirect("/admin/user")->with("alert-success","Sukses membuat user baru...");
    }

    public function update_post(Request $request, $id){

        $nama = $request->nama;
        $username = $request->username;
        $nickname = $request->nickname;
        $email = $request->email;
        $no_telepon = $request->no_telepon;
        $kata_sandi = $request->kata_sandi;

        $insert = DB::insert("UPDATE user SET nama=?,username=?,nickname=?,email=?,no_telepon=?,kata_sandi=? WHERE user_id=?",[$nama, $username,$nickname,$email,$no_telepon,$kata_sandi,$id]);

        return redirect("/admin/user")->with("alert-success","Sukses mengubah user...");
    }
}
