<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                "level" => $req->level,
                "role" => $req->role,
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
    function save_akun(Request $req){
        // Validasi
        // var_dump($req->all());exit;
        $req->validate(
            [
                "name" => "required|max:50",
                "email" => "required",
                // "password" => "required|min:8"
            ],
            [
                "name.required" => "Maaf Nama harus diisi !",
                "name.max" => "Maaf nama maximal 50 karakter",
                "email.required" => "Maaf email harus diisi !",
                "password.required" => "Maaf password harus diisi !",
                "password.min" => "Password minimal 8 karakter"
            ]
        );
        if ($req->password == "") {
            $pass = $req->old_password;
        } else {
            $pass = Hash::make($req->password);
        }
        if ($req->id_user != "") {
            DB::table('users')->where('id',$req->id_user)->update([
                "name" => $req->name,
                "email" => $req->email,
                "password" => $pass,
                "role" => $req->role,
                "level" => $req->level,
            ]);
        } else {
            DB::table('users')->insert([
                "name" => $req->name,
                "email" => $req->email,
                "password" => $pass,
                "role" => $req->role,
                "level" => $req->level,
            ]);
        }
        
        return redirect("user");
    }
}
