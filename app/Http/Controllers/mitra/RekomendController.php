<?php

namespace App\Http\Controllers\mitra;

use App\Http\Controllers\Controller;
use App\Models\Rekomend;
use App\Models\Alumni;
use App\Models\Loker;
use Illuminate\Http\Request;

class RekomendController extends Controller
{
    /**
    * menampilkan halman utama rekomend
    *
    *
    * @return void
    */
    public function main()
    {
        $rekomend = Rekomend::all()->toArray();
        $loker = Loker::where('mitra_id', 'MRA00002')->get();
        $alumni = Alumni::all();

        dd($loker);

        $data = [
            'title' => 'rekomend',
            'rekomend' => $rekomend,
            'alumni' => $alumni,
        ];

        return view('mitra.rekomend.main', $data);
    }
}