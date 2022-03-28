<?php

namespace App\Http\Controllers\mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loker;
use App\Models\Tahap;
use App\Models\Galeri;
use App\Models\Requirement;

class LokerController extends Controller
{
    /**
    * menampilkan halman utama
    *
    *
    * @return void
    */
    public function main()
    {
        // $loker = Loker::all();

        $data = [
            'title' => 'loker',
            // 'loker' => $loker,
        ];

        return view('mitra.loker.main', $data);
    }

    /**
    * menampilkan halman detail
    *
    *
    * @return void
    */
    public function detail()
    {
        // $loker = Loker::all();

        $data = [
            'title' => 'loker',
        ];

        return view('mitra.loker.detail', $data);
    }

    /**
    * menampilkan halman tambah
    *
    *
    * @return void
    */
    public function tambah()
    {
        $jurusan = [['id' => 'JRSN0004','nama' => 'Rekayasa Perangkat Lunak']];
        $lokasi_kerja = [['id' => 'KTR00001','alamat' => 'Jl. H. Ucok', 'status' => 'Kantor Cabang']];

        $data = [
            'title' => 'loker',
            'jurusan' => $jurusan,
            'lokasi_kerja' => $lokasi_kerja,
            // 'jurusan' => '',
        ];

        return view('mitra.loker.tambah', $data);
    }

    public function tambahTes(Request $request)
    {
        // $foto = $request->foto1;
        dd($request->all());
    }

    /**
    * store
    *
    * @param  mixed $request
    * @return void
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id'                => 'required',
            'mitra_id'          => 'required',
            'jurusan_id'        => 'required',
            'title'             => 'required',
            'kategori'          => 'required',
            'jurusan'           => 'required',
            'jenis_pekerjaan'   => 'required',
            'posisi'            => 'required',
            'kuota'             => 'required',
            'lokasi_kerja'      => 'required',
            'deskripsi'         => 'required',
            'gaji'              => 'required',
            'kedaluwarsa'       => 'required',
            'tanggal_posting'   => 'required',
            'banner'            => 'required',
            'status'            => 'required',
            // 'banner'            => 'required',
            // 'image'             => 'required|image|mimes:png,jpg,jpeg',
        ]);

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/blogs', $image->hashName());

        $galeri = Galeri::create([
            'id1'                => 'G0000001',
            'id2'                => 'G0000002',
            'id3'                => 'G0000003',
            'id4'                => 'G0000004',
            'id5'                => 'G0000005',
            'foto1'              => $foto1,
            'foto2'              => $foto2,
            'foto3'              => $foto3,
            'foto4'              => $foto4,
            'foto5'              => $foto5,
        ]);

        $requirement = Requirement::create([]);

        $tahap = Tahap::create([]);

        $loker = Loker::create([
            // 'id'                => $request->id,
            'id'                => 'LOK00001',
            // 'mitra_id'          => $request->mitra_id,
            'mitra_id'          => 'MRA00001',
            'jurusan_id'        => 'JRSN0001',
            'title'             => $request->title,
            'kategori'          => $request->kategori,
            'tanggal_posting'   => $request->tanggal_posting,
            'kedaluwarsa'       => $request->kedaluwarsa,
            'posisi'            => $request->posisi,
            'kuota'             => $request->kuota,
            'lokasi_kerja'      => $request->lokasi_kerja,
            'deskripsi'         => $request->deskripsi,
            'jenis_pekerjaan'   => $request->jenis_pekerjaan,
        ]);

        if($loker && $galeri){
            //redirect dengan pesan sukses
            return redirect()->route('mt.lk.daftar')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('mt.lk.daftar')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
    * menampilkan halman ubah
    *
    *
    * @return void
    */
    public function ubah()
    {
        // $loker = Loker::find($id);

        $data = [
            'title' => 'loker',
            // 'loker' => $loker,
        ];

        return view('mitra.loker.tambah', $data);
    }

    /**
    * menampilkan halman daftar pelamar
    *
    *
    * @return void
    */
    public function pelamar()
    {
        // $loker = Loker::all();

        $data = [
            'title' => 'loker',
            // 'loker' => $loker,
        ];

        return view('mitra.loker.pelamar', $data);
    }

    /**
    * menampilkan halman daftar rekomend alumni
    *
    *
    * @return void
    */
    public function rekomend()
    {
        // $loker = Loker::all();

        $data = [
            'title' => 'loker',
            // 'loker' => $loker,
        ];

        return view('mitra.loker.rekomend', $data);
    }

    /**
    * menampilkan halman daftar tahapan
    *
    *
    * @return void
    */
    public function tahap()
    {
        // $loker = Loker::find($id);

        $data = [
            'title' => 'loker',
            // 'loker' => $loker,
        ];

        return view('mitra.loker.tahap', $data);
    }
}