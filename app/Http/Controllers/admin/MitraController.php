<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    // HALAMAN UTAMA MITRA
    public function main()
    {
        // $mitra = Mitra::all();

        $data = [
            'title' => 'mitra',
            'titlepage' => 'Dashboard Mitra | Admin',
            // 'mitra' => $mitra,
        ];

        return view('admin.mitra.main', $data);
    }
}