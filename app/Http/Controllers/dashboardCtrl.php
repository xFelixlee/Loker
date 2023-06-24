<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardCtrl extends Controller
{
    function index() {
        $data = [
            'title' => 'Dashboard',
            'page' => 'Dashboard'
        ];

        return view("dashboard",$data);
    }

}
