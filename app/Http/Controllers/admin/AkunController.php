<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    // HALAMAN UTAMA AKUN
    public function main()
    {
        // $akun = Akun::all();

        $data = [
            'title' => 'akun',
            'titlepage' => 'Dashboard Akun | Admin',
            // 'akun' => $akun,
        ];

        return view('admin.akun.main', $data);
    }
}