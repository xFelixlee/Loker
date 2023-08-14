<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class resumeCtrl extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Mendapatkan informasi pengguna yang sedang login
        $userId = $user->id; // Mendapatkan ID pengguna
        
        $data = [
            'title' => 'resume',
            'dtRes' => resume::where('id_users', $userId)->get()
        ];
        return view('resume', $data);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|file|max:2048' // Maksimal 2MB (2 * 1024 KB)
            ]);
            
            $user = Auth::user(); // Mendapatkan informasi pengguna yang sedang login
            $userId = $user->id; // Mendapatkan ID pengguna
    
            $existingFile = resume::where('id_users', $userId)->first();
    
            if ($request->hasFile('file')) {
                if(isset($existingFile)) { Storage::delete($existingFile->filepath.$existingFile->filename); }
                $file = $request->file('file');
                $filename = basename(md5("resume".Auth::user()->id).".".$file->extension());
                // Simpan file dengan menggunakan user_id sebagai bagian dari path
                //$file->storeAs("uploads/resume/{$userId}", $filename);
                $file->move(public_path('uploads/resume/'.$userId), $filename);
                
                if ($existingFile) {
                    // Update data file di database
                    $existingFile->filename = $filename;
                    $existingFile->filepath = "uploads/resume/$userId/";
                    $existingFile->save();
                } else {
                    // Simpan data file ke database
                    $newFile = new resume();
                    $newFile->id_users = $userId;
                    $newFile->filename = $filename;
                    $newFile->filepath = "uploads/resume/$userId/";
                    $newFile->save();      
                }
            }
    
            // Notifikasi
            $notif = [
                'type' => 'success',
                'text' => 'File Berhasil Disimpan!'
            ];
        } catch (\Exception $err) {
            $notif = [
                'type' => 'danger',
                'text' => 'File Gagal Disimpan!'.$err->getMessage()
            ];
        }

        return redirect(url('resume'))->with($notif);
    }

}


