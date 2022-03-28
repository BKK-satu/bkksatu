<?php

namespace App\Http\Controllers\mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    // HALAMAN UTAMA main
    public function main()
    {
        $data = [
            'title' => 'dashboard',
        ];

        return view('mitra.dashboard.dashboard', $data);
    }

    // HALAMAN NOTIFIKASI
    public function notif()
    {
        $data = [
            'title' => 'dashboard',
        ];

        return view('mitra.dashboard.notifikasi', $data);
    }

    // HALAMAN PROFIL
    public function profil()
    {
        $data = [
            'title' => 'profil',
        ];

        return view('mitra.profil.main', $data);
    }

    // HALAMAN PROFIL EDIT
    public function profilUbah()
    {
        $data = [
            'title' => 'profil',
        ];

        return view('mitra.profil.ubah', $data);
    }
}