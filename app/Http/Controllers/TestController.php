<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TestController extends Controller
{
    /**
    * menampilkan halman tes
    *
    *
    * @return void
    */
    public function cek(Request $request)
    {
        $mytime = Carbon::now('Asia/Jakarta');
        echo $mytime->toDateTimeString();
        dd($request->all());
    }

    /**
    * mereturn data detail alumni dengan format json
    *
    *
    * @return void
    */
    public function alumniDetail($id)
    {
        $alumni  = Alumni::findOrFail($id);
        if ($alumni->foto == 'user-default.gif') {
            $alumni->foto = 'imp/user-default.gif';
        }
        $alumni->tanggal_lahir = Carbon::parse($alumni->tanggal_lahir)->format('d M Y');
        $alumni->jurusan_id = $alumni->jurusan->nama;
        $alumni->angkatan_id = $alumni->angkatan->tahun_masuk. '/'.$alumni->angkatan->tahun_lulus;

        return Response::json($alumni);
    }
}
