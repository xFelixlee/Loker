<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class historyCtrl extends Controller
{
    function index(){
        $dthistory = DB::select("SELECT lamar.*,users.name,lowongan.nama_low,lowongan.perusahaan_low FROM lamar
        INNER JOIN users ON lamar.id_users = users.id
        INNER JOIN lowongan ON lamar.id_lowongan = lowongan.id
        WHERE lamar.id_users = ".Auth::user()->id);

        $data = [
            "title" => "Lamar",
            "page" => "Lamar",
            "dthistory" => $dthistory
        ];

        return view("history.data",$data);
    }
}
