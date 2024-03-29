<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\lamar;
use App\Models\resume;
use App\Models\biodata;
use App\Models\lowongan;
use App\Models\pendidikan;
use App\Models\pengalaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class lamarCtrl extends Controller
{
    function index(){
        $dtLoker = DB::select("SELECT lowongan.*,(SELECT COUNT(*) FROM lamar WHERE lamar.id_lowongan = lowongan.id) AS jumlah_pelamar FROM lowongan WHERE STATUS = 'O'");

        $data = [
            "title" => "lamar",
            "page" => "lamar",
            "dtLoker" => $dtLoker
        ];

        return view("lamar.data",$data);
    }

    function detail_lowongan(Request $req){
        $data = [
            "rsLowongan" =>lowongan::where("id",$req->id_lowongan)->first(),
            "dtLamar" => DB::table("lamar")
            ->join("users","lamar.id_users","=","users.id")
            ->join("file","users.id","=","file.id_users")
            ->select("lamar.*","users.name","file.filename","file.filepath")
            ->where("lamar.id_lowongan",$req->id_lowongan)
            ->get(),
            "title" => "lamar",
            "page" => "lamar",
        ];
        return view("lamar.detail",$data);
    }

    function update_status(Request $req){
        lamar::where("id",$req->id_lamar)->update([
            "status" => $req->status
        ]);

        return back();
    }

    function apply_job(Request $req) {

        // Validation Resume
        $resume = resume::where("id_users",Auth::user()->id)->first();
        $biodata = biodata::where("id_user",Auth::user()->id)->first();
        $pendidikan = pendidikan::where("id_user",Auth::user()->id)->first();
        $pengalaman = pengalaman::where("id_user",Auth::user()->id)->first();

        if(!isset($resume) || !isset($biodata) || !isset($pendidikan) || !isset($pengalaman)){
            $notif = [
                'type' => 'warning',
                'text' => 'Silahkan lengkapi Biodata , Pengalaman , Pendidikan dan Resume Terlebih Dahulu!'
            ];
        } else {

            try {
                Lamar::create([
                    "tgl_lamar" => date("Y-m-d"),
                    "id_lowongan" => $req->id_lowongan,
                    "id_users" => Auth::user()->id,
                    "status" => 0
                ]);
        
                // Notif
                $notif = [
                    'type' => 'success',
                    'text' => 'Lowongan Berhasil diapply !'
                ];
            } catch(PDOException $err) {
                $notif = [
                    'type' => 'danger',
                    'text' => 'Lowongan Gagal diapply !' . $err->getMessage()
                ];
            }
        }
    
        return redirect()->back()->with($notif);
    }
}
