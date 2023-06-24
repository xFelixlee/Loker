<?php

use App\Http\Controllers\AuthCtrl;
use App\Http\Controllers\authhCtrl;
use App\Http\Controllers\lamarCtrl;
use App\Http\Controllers\resumeCtrl;
use App\Http\Controllers\biodataCtrl;
use App\Http\Controllers\historyCtrl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryCtrl;
use App\Http\Controllers\datauserCtrl;
use App\Http\Controllers\frontendCtrl;
use App\Http\Controllers\lowonganCtrl;
use App\Http\Controllers\dashboardCtrl;
use App\Http\Controllers\pendidikanCtrl;
use App\Http\Controllers\pengalamanCtrl;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(["middleware"=>"auth"],function(){

    // FRONT END
    Route::get('/',[frontendCtrl::class,"index"]);
    Route::get('low',[frontendCtrl::class,"lowongan"]);
    Route::get("detail_low/{id_lowongan}",[frontendCtrl::class,"detail"]);
    Route::get("dashboard",[dashboardCtrl::class,"index"]);

    // Biodata
    Route::get('biodata',[biodataCtrl::class,"index"]);
    Route::get("biodata/form/{id_biodata?}",[biodataCtrl::class,"form"]);
    Route::post("biodata/save",[biodataCtrl::class,"save"]);

    // PENGALAMAN
    Route::get("pengalaman",[pengalamanCtrl::class,"index"]);
    Route::get("pengalaman/form/{id_pengalaman?}",[pengalamanCtrl::class,"form"]);
    Route::get("pengalaman/delete/{id_pengalaman?}",[pengalamanCtrl::class,"delete"]);
    Route::post("pengalaman/save",[pengalamanCtrl::class,"save"]);

    // PENDIDIKAN  
    Route::get("pendidikan",[pendidikanCtrl::class,"index"]);
    Route::get("pendidikan/form/{id_pendidikan?}",[pendidikanCtrl::class,"form"]);
    Route::get("pendidikan/delete/{id_pendidikan?}",[pendidikanCtrl::class,"delete"]);
    Route::post("pendidikan/save",[pendidikanCtrl::class,"save"]);
    
    // Resume
    Route::get("resume",[resumeCtrl::class,"index"]);
    Route::post("resume/store", [resumeCtrl::class, 'store']);
    
    // History  
    Route::get("history",[historyCtrl::class,"index"]);

    // DASHBOARD
    Route::group(["middleware"=>"roleAdmin"],function(){        
        Route::get("dashboard",[dashboardCtrl::class,"index"]);
    });

    // CATEGORY
    Route::group(["middleware"=>"roleAdmin"],function(){   
    Route::get("category",[categoryCtrl::class,"index"]);
    Route::get("category/form/{id_cat?}",[categoryCtrl::class,"form"]);
    Route::get("category/delete/{id_cat}",[categoryCtrl::class,"delete"]);
    Route::post("category/save",[categoryCtrl::class,"save"]);
    });

    // LOWONGAN
    Route::group(["middleware"=>"roleAdmin"],function(){   
    Route::get("lowongan",[lowonganCtrl::class,"index"]);
    Route::get("lowongan/form/{id_low?}",[lowonganCtrl::class,"form"]);
    Route::get("lowongan/delete/{id_low}",[lowonganCtrl::class,"delete"]);
    Route::get("lowongan/detail/{id_low}",[lowonganCtrl::class,"detail"]);
    Route::post("lowongan/save",[lowonganCtrl::class,"save"]);
    });

    // DATA USER
    Route::group(["middleware"=>"roleAdmin"],function(){   
    Route::get("user",[datauserCtrl::class,"index"]);
    Route::get("user/form/{id_user?}",[datauserCtrl::class,"form"]);
    Route::get("datauser/registrasi",[datauserCtrl::class,"registrasi"])->name("signup");
    Route::post("datauser/registrasi",[datauserCtrl::class,"save_registrasi"]);
    });

    // LAMAR
    Route::group(["middleware"=>"roleAdmin"],function(){   
        Route::get("lamar",[lamarCtrl::class,"index"]);
        Route::get("lamar/{id_lamar}/status/{status}",[lamarCtrl::class,"update_status"])->name("update_status_lamar");
    });

    Route::get("lamar/{id_lowongan}",[lamarCtrl::class,"apply_job"])->name("apply");
    Route::get("lamar/{id_lowongan}/detail",[lamarCtrl::class,"detail_lowongan"])->name("detail_loker");

    // Auth Logout hanya bisa di akses jika sudah login
    Route::get("auth/logout",[AuthCtrl::class,"logout"])->name("signout");

});

    // Auth
    Route::get("auth/login",[AuthCtrl::class,"login"])->name("login");
    Route::post("auth/login",[AuthCtrl::class,"cek_login"]);
    Route::get("auth/registrasi",[AuthCtrl::class,"registrasi"])->name("signup");
    Route::post("auth/registrasi",[AuthCtrl::class,"save_registrasi"]);





