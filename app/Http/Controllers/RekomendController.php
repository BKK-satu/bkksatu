<?php

namespace App\Http\Controllers;

use App\Models\Rekomend;
use Illuminate\Http\Request;

class RekomendController extends Controller
{
    /**
    * menampilkan halman utama
    *
    *
    * @return void
    */
    public function main()
    {
        $rekomend = Rekomend::all();
        // $alumni = Alumni::all();

        $data = [
            'title' => 'rekomend',
            'rekomend' => $rekomend,
        ];

        return view('mitra.loker.rekomend', $data);
    }
}
