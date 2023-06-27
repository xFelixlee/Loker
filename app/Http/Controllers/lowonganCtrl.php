<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\lowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\category;

class lowonganCtrl extends Controller
{
    public function index(Request $req){
        $data = [
            'title' => 'Lowongan',
            'page' => 'Lowongan',
            'dtCat' => category::All(),
            'dtLow' => lowongan::when($req->id_cat, function($query) use($req) {
                $query->where('id_cat', $req->id_cat);
            })->get()
        ];
        return view('lowongan.data',$data);
    }

    public function form(Request $req){
        $data = [
            'title' => 'Lowongan',
            'page' => 'Tambah Lowongan Baru',
            'dtCat' => category::All(),
            'rsLow' => lowongan::where('id',$req->id_low)->first()
        ];
        return view('lowongan.form',$data);
    }

    public function save(Request $req){
        if($req->file("foto")){
            $fileName = time().'.'.$req->file("foto")->extension();               
            $result = $req->file("foto")->move(public_path('uploads/ftloker'), $fileName);    
            $foto = "uploads/ftloker/".$fileName;
        } else {
            $foto = $req->input("old_foto");
        }   

        try {
            // Save
            lowongan::UpdateorCreate(
                [
                    'id' => $req->input('id_low')
                ],
                [
                    'id_cat' =>$req->input('id_cat'),
                    'nama_low' =>$req->input('nama_low'),
                    'perusahaan_low' =>$req->input('perusahaan_low'),
                    'alamat_low' =>$req->input('alamat_low'),
                    'desc_low' =>$req->input('desc_low'),
                    'kriteria_low' =>$req->input('kriteria_low'),
                    'deadline' =>$req->input('deadline'),
                    'posisi' =>$req->input('posisi'),
                    'sistem_kerja' =>$req->input('sistem_kerja'),
                    'foto' => $foto,
                ]
            );
            // Notif
            $notif = [
                'type' => 'success',
                'text' => 'Lowongan Berhasil disimpan !'
            ];
        } catch(PDOException $err){
            $notif = [
                'type' => 'danger',
                'text' => 'Lowongan Gagal disimpan !'.$err->getMessage()
            ];
        }
        return redirect(url('lowongan'))->with($notif);
    }

    public function detail($id){
        $data = [
            'title' => 'Lowongan',
            'rsLow' => lowongan::where('id',$id)->first()
        ];
        return view('lowongan.detail',$data);
    }

    public function delete($id){
        try {
            // Delete
            lowongan::where('id',$id)->delete();

            // Notif
            $notif = [
                'type' => 'success',
                'text' => 'Lowongan Berhasil dihapus !'
            ];
        } catch(PDOException $err){
            $notif = [
                'type' => 'danger',
                'text' => 'Lowongan Gagal dihapus !'.$err->getMessage()
            ];
        }
        return redirect(url('lowongan'))->with($notif);
    }

}