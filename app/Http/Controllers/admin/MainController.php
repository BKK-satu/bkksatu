<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    // HALAMAN UTAMA DASHBOARD
    public function dashboard()
    {
        $data = [
            'title' => 'dashboard',
            'titlepage' => 'Dashboard Main | Admin',
        ];

        return view('admin.dashboard.dashboard', $data);
    }

    // HALAMAN NOTIFIKASI
    public function notifikasi()
    {
        $data = [
            'title' => 'dashboard',
            'titlepage' => 'Notifikasi | Admin',
        ];

        return view('admin.dashboard.notifikasi', $data);
    }
}