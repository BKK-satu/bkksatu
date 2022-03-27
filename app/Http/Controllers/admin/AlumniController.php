<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    // HALAMAN UTAMA ALUMNI
    public function main()
    {
        // $alumni = Alumni::all();
        // $alumnikerja = Alumni::where('status' == 'berkerja)->get();
        // $alumnikuliah = Alumni::where('status' == 'kuliah)->get();
        // $alumniwirausaha = Alumni::where('status' == 'wirausaha)->get();

        $data = [
            'title' => 'alumni',
            'titlepage' => 'Dashboard Alumni | Admin',
            // 'alumni' => $alumni,
            // 'alumnikerja' => $alumnikerja,
            // 'alumnikuliah' => $alumnikuliah,
            // 'alumniwirausaha' => $alumniwirausaha
        ];

        return view('admin.alumni.main', $data);
    }

    // DAFTAR ALUMNI
    public function daftarAlumni()
    {
        $data = [
            'title' => 'alumni',
            'titlepage' => 'Daftar Alumni | Admin',
        ];

        return view('admin.alumni.daftar', $data);
    }

    // DETAIL ALUMNI
    public function detailAlumni()
    {
        $data = [
            'title' => 'alumni',
            'titlepage' => 'Detail Alumni | Admin',
        ];

        return view('admin.alumni.detail', $data);
    }

    // PENELUSURAN ALUMNI DENGAN ANGAKTAN
    public function penelusuranAlumni()
    {
        $data = [
            'title' => 'alumni',
            'titlepage' => 'Penelusuran Alumni | Admin',
        ];

        return view('admin.alumni.penelusuran', $data);
    }

    // PENELUSURAN ALUMNI DENGAN PERJURUSAN
    public function penelusuranJurusanAlumni()
    {
        $data = [
            'title' => 'alumni',
            'titlepage' => 'Penelusuran Alumni Berdasarkan Jurusan | Admin',
        ];

        return view('admin.alumni.penelusuran_jurusan', $data);
    }
}