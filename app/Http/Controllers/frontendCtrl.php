<?php

namespace App\Http\Controllers;

use App\Models\lamar;
use App\Models\biodata;
use App\Models\lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class frontendCtrl extends Controller
{
    function index() {
        $data = [
            'title' => 'home',
        ];
        return view("frontend/index",$data);
    }

    function lowongan(Request $req) {
        $data = [
            'title' => 'low',
            'dtLow' => lowongan::when($req->id_cat, function($query) use($req) {
                $query->where('id_cat', $req->id_cat);
            })->whereraw('deadline >= CURDATE()')->get(),
            'rsLowongan' => lowongan::all()
        ];

        return view("frontend/low",$data);
    }

    function detail(Request $req){
        $data = [
            'title' => 'low',
            'rsLowongan' => lowongan::where("id",$req->id_lowongan)->first(),
            'rslamar' => lamar::where("id_lowongan",$req->id_lowongan)->where("id_users",Auth::user()->id)->get()
        ];
        return view("frontend/detail_low",$data);
    }
    
    function history() {
        $dthistory = DB::select("SELECT lamar.*,users.name,lowongan.nama_low,lowongan.perusahaan_low FROM lamar
        INNER JOIN users ON lamar.id_users = users.id
        INNER JOIN lowongan ON lamar.id_lowongan = lowongan.id
        WHERE lamar.id_users = ".Auth::user()->id);

        $data = [
            "title" => "history",
            "page" => "history",
            "dthistory" => $dthistory
        ];
        return view("frontend/history",$data);
    }
}
