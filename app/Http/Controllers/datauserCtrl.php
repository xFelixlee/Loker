<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class datauserCtrl extends Controller
{
    public function index(){
        $data = [
            'title' => 'User',
            'page' => 'User',
            'dtUser' => User::All()
        ];
        return view('user.data',$data);
    }

    public function form(Request $req){
        $data = [
            'title' => 'User',
            'page' => 'Tambah User Baru',
            'rsUser' => User::where('id',$req->id_user)->first()
        ];
        return view('user.form',$data);
    }

    function registrasi(){
        return view("user.form");
    }

    function save_registrasi(Request $req){
        // Validasi
        $req->validate(
            [
                "name" => "required|max:50",
                "email" => "required",
                "password" => "required|min:8"
            ],
            [
                "name.required" => "Maaf Nama harus diisi !",
                "name.max" => "Maaf nama maximal 50 karakter",
                "email.required" => "Maaf email harus diisi !",
                "password.required" => "Maaf password harus diisi !",
                "password.min" => "Password minimal 8 karakter"
            ]
        );

        try {
            // Save
            User::create([
                "name" => $req->name,
                "email" => $req->email,
                "password" => Hash::make($req->password),
                "level" => "User",
                "status" => 1
            ]);

            $mess = [
                "type" => "success",
                "text" => "Registrasi berhasil , silahkan login !"
            ];

        } catch(PDOException $err){
            $mess = [
                "type" => "danger",
                "text" => "Registrasi gagal !"
            ];
        }

        return redirect("user/data")->with($mess);
    }
}
