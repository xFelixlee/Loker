<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class categoryCtrl extends Controller
{
    public function index(){
        $data = [
            'title' => 'Category',
            'page' => 'Category',
            'dtCat' => category::All()
        ];
        return view('category.data',$data);
    }

    public function form(Request $req){
        $data = [
            'title' => 'Category',
            'page' => 'Tambah Category Baru',
            'rsCat' => category::where('id',$req->id_cat)->first()
        ];
        return view('category.form',$data);
    }

    public function save(Request $req){


        try {
            // Save
            category::UpdateOrCreate(
                [
                    'id' => $req->input('id_cat')
                ],
                [
                    'cat_nm' => $req->input('cat_nm')
                ]
            );

            // Notif
            $notif = [
                'type' => 'success',
                'text' => 'Category Berhasil disimpan !'
            ];
        } catch(PDOException $err){
            $notif = [
                'type' => 'danger',
                'text' => 'Category Gagal disimpan !'.$err->getMessage()
            ];
        }
        return redirect(url('category'))->with($notif);
    }

    public function delete($id){
        try {
            // Delete
            category::where('id',$id)->delete();

            // Notif
            $notif = [
                'type' => 'success',
                'text' => 'Category Berhasil dihapus !'
            ];
        } catch(PDOException $err){
            $notif = [
                'type' => 'danger',
                'text' => 'Category Gagal dihapus !'.$err->getMessage()
            ];
        }
        return redirect(url('category'))->with($notif);
    }
}
