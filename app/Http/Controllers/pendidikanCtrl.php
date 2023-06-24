<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\pendidikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class pendidikanCtrl extends Controller
{
    public function index(){
        $data = [
            'title' => 'Pendidikan',
            'dtPend' => pendidikan::where('id_user',Auth::user()->id)->get()
        ];
        return view('pendidikan.data',$data);
    }

    public function form(Request $req){
        $data = [
            'title' => 'Pendidikan',
            'page' => 'Tambah',
            'rsPend' => pendidikan::where('id',$req->id_pendidikan)->first()
        ];
        return view('pendidikan.form',$data);
    }

    public function save(Request $req){
        try {
            // Save
            pendidikan::UpdateOrCreate(
                [
                    'id' => $req->input('id_pendidikan')
                ],
                [
                    'univ' =>$req->input('univ'),
                    'id_user' =>Auth::user()->id,
                    'tahun_lulus' =>$req->input('tahun_lulus'),
                    'jurusan' =>$req->input('jurusan'),
                    'nilai' =>$req->input('nilai'),
                ]
            );

            // Notif
            $notif = [
                'type' => 'success',
                'text' => 'pendidikan Berhasil disimpan !'
            ];
        } catch(PDOException $err){
            $notif = [
                'type' => 'danger',
                'text' => 'pendidikan Gagal disimpan !'.$err->getMessage()
            ];
        }
        return redirect(url('pendidikan'))->with($notif);
    }

    public function delete($id){
        try {
            // Delete
            pendidikan::where('id',$id)->delete();

            // Notif
            $notif = [
                'type' => 'success',
                'text' => 'pendidikan Berhasil dihapus !'
            ];
        } catch(PDOException $err){
            $notif = [
                'type' => 'danger',
                'text' => 'pendidikan Gagal dihapus !'.$err->getMessage()
            ];
        }
        return redirect(url('pendidikan'))->with($notif);
    }
}
