<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LokerController extends Controller
{
    // HALAMAN UTAMA LOKER
    public function main()
    {
        // $loker = Loker::all();

        $data = [
            'title' => 'loker',
            'titlepage' => 'Dashboard Loker | Admin',
            // 'loker' => $loker,
        ];

        return view('admin.loker.main', $data);
    }
}