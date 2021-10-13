<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class TrainingController extends Controller
{
    public function show(Request $request)
    {
        $training = DB::select("SELECT * FROM training");

        return view("Training.training",["training"=>$training]);
    }


    public function create(Request $request)
    {
        $kategoritraining = DB::select("SELECT * FROM kategori_training");
        $galeri = DB::select("SELECT * FROM galeri");

        if(count($kategoritraining)>0){
            $subkategori = DB::select("SELECT * FROM subkategori_training WHERE id_kategoritraining=?",[$kategoritraining[0]->id_kategoritraining]);
            $testimoni = DB::select("SELECT * FROM pelatihan_testimoni INNER JOIN user ON pelatihan_testimoni.user_id=user.user_id WHERE id_kategoritraining=?",[$kategoritraining[0]->id_kategoritraining]);
        }

        return view("Training.training-create", ["galeri"=>$galeri, "testimoni"=>$testimoni, "subkategori"=>$subkategori, "kategoritraining"=>$kategoritraining]);
    }

    public function update(Request $request, $id){

        $kategoritraining = DB::select("SELECT * FROM kategori_training");
        $galeri = DB::select("SELECT * FROM galeri");

        if(count($kategoritraining)>0){
            $subkategori = DB::select("SELECT * FROM subkategori_training WHERE id_kategoritraining=?",[$kategoritraining[0]->id_kategoritraining]);
            $testimoni = DB::select("SELECT * FROM pelatihan_testimoni INNER JOIN user ON pelatihan_testimoni.user_id=user.user_id WHERE id_kategoritraining=?",[$kategoritraining[0]->id_kategoritraining]);
        }

        return view("Training.training-update", ["galeri"=>$galeri, "testimoni"=>$testimoni, "subkategori"=>$subkategori, "kategoritraining"=>$kategoritraining]);
    }

    public function delete(Request $request, $id){
        return "delete";
    }

    public function create_post(Request $request){

        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $namatraining = $request->namatraining;
        $tipetraining = $request->tipetraining;
        $nominalpenerimareferral = $request->nominalpenerimareferral;
        $nominalpemotonganreferral = $request->nominalpemotonganreferral;
        $kategoritraining = $request->kategoritraining;
        $subkategoritraining = $request->subkategoritraining;
        $deskripsisingkat = $request->deskripsisingkat;
        $batch = $request->batch;
        $jadwaltraining = $request->jadwaltraining;
        $deskripsipenuh = $request->deskripsipenuh;
        $persyaratan = $request->persyaratan;
        $fasilitas = $request->fasilitas;
        $infopendaftaran = $request->infopendaftaran;
        $instruktur = $request->instruktur;
        $ulasan = $request->ulasan;
        $pelatihan = $request->pelatihan;
        $testimoni = $request->testimoni;
        $galeri = $request->galeri;
        $modulyoutube = $request->modulyoutube;

        $pelatihan_parsed = json_decode($pelatihan);

        $image      = $request->file('foto');
        $fileName   = time() . '.' . $image->getClientOriginalExtension();

        Storage::disk('local')->putFileAs('', $image, 'public'.'/training'.'/'.$fileName);

        $payload = [$namatraining,$tipetraining,$nominalpenerimareferral,$nominalpemotonganreferral,$kategoritraining,
        $subkategoritraining,$deskripsisingkat,$batch,$jadwaltraining,$deskripsipenuh,$persyaratan,$fasilitas,$infopendaftaran,
        $instruktur,$ulasan,$galeri,$testimoni,$modulyoutube,$fileName];
        

        $insert = DB::insert("INSERT INTO training 
        (namatraining,tipetraining,nominalpenerimareferral,
        nominalpemotonganreferral,kategoritraining,subkategoritraining,deskripsisingkat,
        batch,jadwaltraining,deskripsipenuh,persyaratan,fasilitas,infopendaftaran,
        instruktur,ulasan,galeri,testimoni,modulyoutube,foto) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",$payload);

        $lastid = DB::getPdo()->lastInsertId();
        
        foreach ($pelatihan_parsed as $key => $value) {
            $uuid = Str::uuid()->toString();
            if($value->sedangpromo){
                $insert = DB::insert("INSERT INTO item_training VALUES (?,?,?,?,?,?,?,?)",[
                    $uuid,$lastid,$value->namapaketpelatihan,$value->hargapaketpelatihan,$value->hargapromopaketpelatihan,$value->sedangpromo,$value->stokkursi,
                    $value->paketpelatihan_tanggalpromoberakhir." ".$value->paketpelatihan_waktupromoberakhir
                ]);
            }
            else{
               $insert = DB::insert("INSERT INTO item_training (id,id_training,namapaketpelatihan,hargapaketpelatihan,hargapromopaketpelatihan,sedangpromo,stokkursi) VALUES (?,?,?,?,?,?,?)",[
                    $uuid,$lastid,$value->namapaketpelatihan,$value->hargapaketpelatihan,$value->hargapromopaketpelatihan,$value->sedangpromo,$value->stokkursi
                ]);
            }

        }

        return redirect("/admin/training");
    }

    public function update_post(Request $request, $id){
        return "update_post";
    }
}
