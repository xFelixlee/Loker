<?php

namespace App\Http\Controllers;

use App\Models\lamar;
use App\Models\biodata;
use App\Models\lowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class frontendCtrl extends Controller
{
    function index() {
        return view("frontend/index");
    }

    function lowongan(Request $req) {
        $data = [
            'dtLow' => lowongan::when($req->id_cat, function($query) use($req) {
                $query->where('id_cat', $req->id_cat);
            })->whereraw('deadline >= CURDATE()')->get(),
            'rsLowongan' => lowongan::all()
        ];

        return view("frontend/low",$data);
    }

    function detail(Request $req){
        $data = [
            'rsLowongan' => lowongan::where("id",$req->id_lowongan)->first(),
            'rslamar' => lamar::where("id_lowongan",$req->id_lowongan)->where("id_users",Auth::user()->id)->get()
        ];
        return view("frontend/detail_low",$data);
    }
    
}
