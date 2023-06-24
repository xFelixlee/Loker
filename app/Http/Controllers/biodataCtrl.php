<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\biodata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class biodataCtrl extends Controller
{

    public function index()
    {
        $dtBio = biodata::where('id_user', Auth::user()->id)->get();
        $dataExist = !$dtBio->isEmpty();
    
        $data = [
            'title' => 'Biodata',
            'dtBio' => $dtBio,
            'dataExist' => $dataExist,
        ];
    
        return view('biodata.data', $data);
    }
    
    public function form(Request $req){
        $data = [
            'title' => 'Biodata',
            'page' => 'Tambah',
            'rsBio' => biodata::where('id',$req->id_biodata)->first()
        ];
        return view('biodata.form',$data);
    }

    public function save(Request $req){

        if($req->file("foto")){
            $fileName = time().'.'.$req->file("foto")->extension();               
            $result = $req->file("foto")->move(public_path('uploads/biodata'), $fileName);    
            $foto = "uploads/biodata/".$fileName;
        } else {
            $foto = $req->input("old_foto");
        }   

        try {
            // Save
            biodata::UpdateOrCreate(
                [
                    'id' => $req->input('id_biodata')
                ],
                [
                    'id_user' =>Auth::user()->id,
                    'nama' => $req->input('nama'),
                    'tgl_lahir' => $req->input('tgl_lahir'),
                    'tmpt_lahir' => $req->input('tmpt_lahir'),
                    'alamat' => $req->input('alamat'),
                    'telp' => $req->input('telp'),
                    'status' => $req->input('status'),
                    'foto' => $foto,
                ]
            );

            // Notif
            $notif = [
                'type' => 'success',
                'text' => 'Biodata Berhasil Disimpan !'
            ];
        } catch(PDOException $err){
            $notif = [
                'type' => 'danger',
                'text' => 'Biodata Gagal Disimpan !'.$err->getMessage()
            ];
        }
        return redirect(url('biodata'))->with($notif);
    }
}
