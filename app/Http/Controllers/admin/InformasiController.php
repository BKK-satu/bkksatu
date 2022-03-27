<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    // HALAMAN UTAMA INFORMASI
    public function main()
    {
        // $informasi = Informasi::all();

        $data = [
            'title' => 'informasi',
            'titlepage' => 'Dashboard Informasi | Admin',
            // 'informasi' => $informasi,
        ];

        return view('admin.informasi.main', $data);
    }
}