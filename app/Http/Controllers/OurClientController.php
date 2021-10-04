<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OurClientController extends Controller
{
    public function show(Request $request)
    {
        $ourclient = DB::select('select * from ourclient');

        return view("OurClient.ourclient", ["ourclient"=>$ourclient]);
    }


    public function create(Request $request)
    {
        return view("OurClient.ourclient-create");
    }

    public function update(Request $request, $id){

        $client = DB::select('select * from ourclient where id_ourclient=?',[$id]);

        if(count($client)==0){
            return redirect("/admin/ourclient")->with("alert-info","Tidak ditemukan galeri dengan id tersebut...");
        }
        

        return view("OurClient.ourclient-update", ["ourclient"=>$client[0]]);
    }

    public function delete(Request $request, $id){

        $client = DB::select("select gambar from ourclient where id_ourclient=?",[$id]);

        if(count($client)>0){
            if(file_exists(Storage::disk('local')->path("public/ourclient/".$client[0]->gambar))){
                unlink(Storage::disk('local')->path("public/ourclient/".$client[0]->gambar));
            }
        }

        $delete = DB::delete("delete from ourclient WHERE id_ourclient=?",[$id]);
      
        return redirect("/admin/ourclient")->with("alert-success","Sukses menghapus galeri...");
    }

    public function create_post(Request $request){

        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $client = $request->client;

        $image      = $request->file('foto');
        $fileName   = time() . '.' . $image->getClientOriginalExtension();

        Storage::disk('local')->putFileAs('', $image, 'public'.'/ourclient'.'/'.$fileName);

        $insert = DB::insert("insert into ourclient (nama_client,gambar) VALUES (?,?)",[$client,$fileName]);

        return redirect("/admin/ourclient")->with("alert-success","Sukses menambah our client...");
    }

    public function update_post(Request $request, $id){


        if($request->hasFile("foto")){

            $client = DB::select("select gambar from ourclient where id_ourclient=?",[$id]);
            if(count($client)>0){
                if(file_exists(Storage::disk('local')->path("public/ourclient/".$client[0]->gambar))){
                    unlink(Storage::disk('local')->path("public/ourclient/".$client[0]->gambar));
                }
            }

            $validated = $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $nama = $request->client;
    
            $image      = $request->file('foto');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
    
            Storage::disk('local')->putFileAs('', $image, 'public'.'/ourclient'.'/'.$fileName);
    
            $update = DB::update("update ourclient SET nama_client=?,gambar=? WHERE id_ourclient=?",[$nama,$fileName,$id]);
    
            return redirect("/admin/ourclient")->with("alert-success","Sukses mengubah galeri...");;
        }
        else{
    
            $client = $request->client;
    
            $update = DB::update("update ourclient SET nama_client=? WHERE id_ourclient=?",[$client,$id]);
    
            return redirect("/admin/ourclient")->with("alert-success","Sukses mengubah galeri...");;
        }

        return "update post";

    }
}
