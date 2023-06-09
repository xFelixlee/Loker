<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthCtrl extends Controller
{
    function login(){
        // Jika sudah login akan langsung ke Dashboard
        if(Auth::check()){
            return redirect("/");
        }
        
        return view('auth.login');
    }

    function cek_login(Request $req){
        // Validasi
        $req->validate(
            [
                "name" => "required",
                "password" => "required"
            ],
            [
                "name.required" => "Maaf name harus diisi !",
                "password.required" => "Maaf password harus diisi !"
            ]
        );

        // Cek Login
        if(Auth::attempt(['name' => $req->name, 'password' => $req->password])){
            $req->session()->regenerate();
            $file_u = DB::table('file')->where('id_users',Auth::user()->id)->count();
            $pendidikan = DB::table('pendidikan')->where('id_user',Auth::user()->id)->count();
            $pengalaman = DB::table('pengalaman')->where('id_user',Auth::user()->id)->count();
            $biodata = DB::table('biodata')->where('id_user',Auth::user()->id)->count();
            if (Auth::user()->role == 'Admin') {
                return redirect('/dashboard'); // Dashboard
            } else {
                if($file_u > 0 && $pendidikan > 0 && $pengalaman > 0 && $biodata > 0){
                    return redirect('/'); // Dashboard
                }else{
                    return redirect('/biodata'); // Dashboard
                }
            }
            
        }

        // Jika user dan password salah maka Kembali ke form Login
        $mess = [
            "type" => "danger",
            "text" => "Maaf username atau password salah !"
        ];

        return back()->with($mess);
    }

    function registrasi(){
        return view("auth.register");
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

        return redirect("auth/login")->with($mess);
    }

    function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('auth/login');
    }
}