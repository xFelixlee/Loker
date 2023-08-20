<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\pengalaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class pengalamanCtrl extends Controller
{
    public function index(){
        $data = [
            'title' => 'Pengalaman',
            'page' => 'Pengalaman',
            'dtPeng' => pengalaman::where('id_user', Auth::user()->id)->get()
        ];
        return view('pengalaman.data',$data);
    }

    public function form(Request $req){
        // var_dump($req->all());exit;
        $data = [
            'title' => 'pengalaman',
            'page' => 'Tambah',
            'rsPeng' => pengalaman::where('id',$req->id_pengalaman)->first()
        ];
        return view('pengalaman.form',$data);
    }

    public function save(Request $req){
        try {
            // Save
            pengalaman::UpdateOrCreate(
                [
                    'id' => $req->input('id_pengalaman')
                ],
                [
                    'posisi' =>$req->input('posisi'),
                    'id_user' =>Auth::user()->id,
                    'perusahaan' =>$req->input('perusahaan'),
                    'tgl_masuk' =>$req->input('tgl_masuk'),
                    'tgl_keluar' =>$req->input('tgl_keluar'),
                    'keterangan' =>$req->input('keterangan'),
                ]
            );

            // Notif
            $notif = [
                'type' => 'success',
                'text' => 'Pengalaman Berhasil Disimpan !'
            ];
        } catch(PDOException $err){
            $notif = [
                'type' => 'danger',
                'text' => 'Pengalaman Gagal Disimpan !'.$err->getMessage()
            ];
        }
        return redirect(url('pengalaman'))->with($notif);
    }

    public function delete($id){
        try {
            // Delete
            pengalaman::where('id',$id)->delete();

            // Notif
            $notif = [
                'type' => 'success',
                'text' => 'Pengalaman Berhasil Dihapus !'
            ];
        } catch(PDOException $err){
            $notif = [
                'type' => 'danger',
                'text' => 'Pengalaman Gagal Dihapus !'.$err->getMessage()
            ];
        }
        return redirect(url('pengalaman'))->with($notif);
    }
}
