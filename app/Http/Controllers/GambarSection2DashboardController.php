<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GambarSection2DashboardController extends Controller
{
    public function show(Request $request)
    {
        // $tentang = DB::select("SELECT * FROM tentangjagoank3_html");

        // if(count($tentang)==0){
        //     $item = new \stdClass();
        //     $item->text="";
         
        //     return view("TentangJagoanK3.tentangjagoank3",["tentang"=>$item]);
        // }

        return view("GambarSection2Dashboard.gambarsection2dashboard");
    }

    public function update(Request $request){

        if($request->hasFile("foto")){

            $image      = $request->file('foto');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();

            Storage::disk('local')->putFileAs('', $image, 'public'.'/section2dashboard'.'/'.'thumbnail.jpg');

            // $html = $request->html;
            // DB::delete("DELETE FROM tentangjagoank3_html");
            // DB::insert("INSERT INTO tentangjagoank3_html (text) VALUES (?)",[$html]);

            return redirect("/admin/gambarsection2dashboard");
        }
        else{

            $html = $request->html;
            
            // DB::delete("DELETE FROM tentangjagoank3_html");
            // DB::insert("INSERT INTO tentangjagoank3_html (text) VALUES (?)",[$html]);

            return redirect("/admin/gambarsection2dashboard");
        }
    }


}
