<?php

namespace App\Http\Controllers\mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loker;
use App\Models\Tahap;
use App\Models\Galeri;
use App\Models\Alumni;
use App\Models\Requirement;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
// use DataTables;

class LokerController extends Controller
{
    public function __construct()
    {

    }

    /**
    * menampilkan halman utama
    *
    *
    * @return void
    */
    public function main()
    {
        $loker = Loker::all();
        foreach ($loker as $key => $lkr) {
            $requirement[$key++] = Requirement::where('lowongankerja_id', $lkr->id)->get();
            $age[$key++] = ['id' => $lkr->id, 'date' => Carbon::parse($lkr->tanggal_posting)->diffForHumans()];
        }

        $data = [
            'title' => 'loker',
            'loker' => $loker,
            'requirement' => $requirement,
            'ages' => $age,
        ];

        return view('mitra.loker.main', $data);
    }

    /**
     * menampilkan halman detail
     *
     *
     * @return void
     */
    public function detail($id)
    {
        $loker = Loker::find($id);
        $requirement = Requirement::where('lowongankerja_id', $loker->id)->get();
        $tahap = Tahap::where('lowongankerja_id', $loker->id)->get();
        $galeri = Galeri::where('lowongankerja_id', $loker->id)->get();

        $data = [
            'title' => 'loker',
            'loker' => $loker,
            'requirement' => $requirement,
            'tahap' => $tahap,
            'galeri' => $galeri,
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

    /**
    * store
    *
    * @param  mixed $request
    * @return void
    */
    public function store(Request $request)
    {
        // MEMVALIDASI
        $this->validate($request, [
            'title'             => 'required|min:5',
            'kategori'          => 'required',
            'jurusan'           => 'required',
            'jenis_pekerjaan'   => 'required',
            'posisi'            => 'required',
            'kuota'             => 'required|numeric',
            'lokasi_kerja'      => 'required',
            'deskripsi'         => 'required',
            'gaji'              => 'required|numeric',
            'kedaluwarsa'       => 'required|date',
            'req'               => 'nullable|min:5',
            'banner'            => 'nullable|image|mimes:png,jpg,jpeg|max:80000',
            // 'fotos'             => 'nullable|image|mimes:png,jpg,jpeg|max:80000',
            // 'namasec'           => 'nullable|min:5',
        ],[
            // MEMBUAT MESSAGE VALIDASI SENDRI
            'req.min'           => 'Field Requirement must over 7 characters!',
        ]);

        // MENGAMBIL KODE LOKER BARU
        $kodeloker = DB::select('SELECT newidloker() AS kodeloker');
        $kodeloker = $kodeloker[0]->kodeloker;
        $kodetahap = DB::select('SELECT newidtahap() AS kodetahap');
        $kodetahap = $kodetahap[0]->kodetahap;

        // MEMBUAT LOKER
        // MENGAMBIL WAKTU
        $dateNow = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        // JIKA WAKTU SEKARANG MELIBHI KEDALUWARSA
        if ($request->kedaluwarsa >= $dateNow){
            $status = 'active';
        }else{
            $status = 'nonactive';
        }

        // SAVING BANNER
        $banner = $request->file('banner');
        // JIKA BANNER ADA
        if ($banner !== null) {
            // BUAT NAMA BARU
            $nameBanner = pathinfo($banner->getClientOriginalName(), PATHINFO_FILENAME);
            $fullFileBanner = $nameBanner . "-" . time() . Str::random(5) . "." .$banner->getClientOriginalExtension();
            // PINDAHIN
            $banner->move(public_path('/assets/img'), $fullFileBanner);
        }else{
            $fullFileBanner = null;
        }

        // BUAT LOKER BARU
        $loker = Loker::create([
            'id'                => $kodeloker,
            'mitra_id'          => 'MRA00001',
            'jurusan_id'        => 'JRSN0001',
            'title'             => $request->title,
            'kategori'          => $request->kategori,
            'tanggal_posting'   => $dateNow,
            'kedaluwarsa'       => $request->kedaluwarsa,
            'posisi'            => $request->posisi,
            'kuota'             => $request->kuota,
            'gaji'              => $request->gaji,
            'lokasi_kerja'      => $request->lokasi_kerja,
            'deskripsi'         => $request->deskripsi,
            'jenis_pekerjaan'   => $request->jenis_pekerjaan,
            'banner'            => $fullFileBanner,
            'status'            => $status,
        ]);

        // SAVING IMAGE AND MAKING NAME
        $fotos = $request->file('fotos');
        // JIKA FOTO-FOTO ADA
        if ($fotos !== null) {
            foreach ($fotos as $foto) {
                // BUAT NAMA BARU
                $fileName = pathinfo($foto->getClientOriginalName(), PATHINFO_FILENAME);
                $fullFileName = $fileName . "-" . time() . Str::random(5) . "." .$foto->getClientOriginalExtension();

                // TAMBAH KE GALERI
                $galeri = Galeri::create([
                    'lowongankerja_id'  => $kodeloker,
                    'foto'              => $fullFileName,
                    'keterangan'        => 'Membuat Foto'
                ]);
                // PINDAHIN GAMBARNYA
                $foto->move(public_path('/assets/img'), $fullFileName);
            }
        }
        $galeri = true;

        // SAVING PERSYARATAN
        $req = $request->req;
        foreach ($req as $data) {
            // jika req ada
            if ($data !== null) {
                $requirement = Requirement::create([
                    'lowongankerja_id'  => $kodeloker,
                    'text'              => $data,
                ]);
            }
            $requirement = true;
        }

        // SAVING TAHAPAN
        $tahap = $request->tahapsec;
        $nama = $request->namasec;
        $date = $request->datesec;

        // MEMBUAT KODE TAHAP BARU
        $ambilTahap = substr($kodetahap, 3);
        $ambilTahap = str_pad($ambilTahap, 5, 0, STR_PAD_LEFT);
        foreach($tahap as $i => $val) {
            $ambilTahap++;
            $kodetahapbaru = 'THP' . str_pad($ambilTahap - 1, 5, 0, STR_PAD_LEFT);

            // JIKA DATA ADA
            if ($val !== null && $nama[$i] !== null && $date[$i] !== null) {
                $tahapan = Tahap::create([
                    'id'                => $kodetahapbaru,
                    'lowongankerja_id'  => $kodeloker,
                    'tahap_ke'          => $val,
                    'nama'              => $nama[$i],
                    'tanggal_seleksi'   => $date[$i],
                    'keterangan'        => 'Ini adalah tahapan ke '. $val .' yang akan dilakukan pada '. $date[$i],
                ]);
            }
            $tahapan = true;
            $kodetahap++;
        }

        if($loker && $galeri && $requirement && $tahapan){
            //redirect dengan pesan sukses
            return redirect()->route('daftar')->with(['success' => 'Data Berhasil Ditambahkan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->back()->withErrors(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
    * menampilkan halman ubah
    *
    *
    * @return void
    */
    public function ubah($id)
    {
        $loker = Loker::find($id);
        $age = Carbon::parse($loker->tanggal_posting)->diffForHumans();
        $jurusan = [['id' => 'JRSN0001','nama' => 'Teknik Permesinan'],['id' => 'JRSN0004','nama' => 'Rekayasa Perangkat Lunak']];
        $lokasi_kerja = [['id' => 'KTR00001','alamat' => 'Jl. H. Ucok', 'status' => 'Kantor Cabang']];
        $requirement = Requirement::where('lowongankerja_id', $id)->get();
        $tahap = Tahap::where('lowongankerja_id', $id)->get();
        $galeri = Galeri::where('lowongankerja_id', $id)->get();
        // $tahapNumber = $tahap->count();

        $data = [
            'title' => 'loker',
            'jurusan' => $jurusan,
            'lokasi_kerja' => $lokasi_kerja,
            'loker' => $loker,
            'reqs' => $requirement,
            'tahap' => $tahap,
            'galeri' => $galeri,
            'age' => $age,
        ];

        return view('mitra.loker.ubah', $data);
    }

    public function tambahTes(Request $request)
    {
        // dd($request->all());
        // $tahap = $request->tahapsec;
        // $nama = $request->namasec;
        // $date = $request->datesec;
        // $arrayTahap = ['tahap' => $tahap,'nama' => $nama,'date' => $date];
        // dd($arrayTahap);

        // MULTIPLE FOREACH
        // foreach($tahap as $i => $val) {
        //     echo $val, $nama[$i], $date[$i];
        //     echo "<br>";
        // }

        // foreach ($tahap as $tah => $index) {
            // $index = $array2[$];
            // echo $tah;
            // echo pathinfo($data->getClientOriginalName(), PATHINFO_FILENAME);
            // echo "<br>";
            // echo pathinfo($data->getClientOriginalName(), PATHINFO_EXTENSION);
            // echo "<br>";
            // echo pathinfo($data->getClientOriginalName(), PATHINFO_FILENAME)."-".time().$data->getClientOriginalExtension();
            // $image = $request->file('image');
            // $image->storeAs('public/assets/img', $image->hashName());
        // }
    }

    /**
    * store
    *
    * @param  mixed $request
    * @return void
    */
    public function ubahStore(Request $request)
    {
        // MEMVALIDASI
        $this->validate($request, [
            'title'             => 'required|min:5',
            'kategori'          => 'required',
            'jurusan'           => 'required',
            'jenis_pekerjaan'   => 'required',
            'posisi'            => 'required',
            'kuota'             => 'required|numeric',
            'lokasi_kerja'      => 'required',
            'deskripsi'         => 'required',
            'gaji'              => 'required|numeric',
            'kedaluwarsa'       => 'required|date',
            'req'               => 'nullable',
            'banner'            => 'image|mimes:png,jpg,jpeg|max:80000',
            'fotos'             => 'image|mimes:png,jpg,jpeg|max:80000',
            // 'namasec'           => 'min:5',
            // 'tahapsec'          => 'numeric',
            // 'datesec'           => 'date',
        ],[
            'req.min'           => 'Field Requirement must over 7 characters!',
        ]);


        // MENDAPATKAN DATA LOKER
        $loker = Loker::findOrFail($request->loker_id);

        // MENGAMBIL KODE TAHAP BARU
        $kodetahap = DB::select('SELECT newidtahap() AS kodetahap');
        $kodetahap = $kodetahap[0]->kodetahap;

        // MEMBUAT LOKER
        $dateNow = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        // JIKA SEKARANG KURANG DARI KEDALUWARSA
        if ($request->kedaluwarsa >= $dateNow){
            $status = 'active';
        }else{
            $status = 'nonactive';
        }

        // SAVING BANNER
        $banner = $request->file('banner');
        // JIKA BANNER ADA
        if ($banner !== null) {
            // BUAT NAMA BARU
            $nameBanner = pathinfo($banner->getClientOriginalName(), PATHINFO_FILENAME);
            $fullFileBanner = $nameBanner . "-" . time() . Str::random(5) . "." .$banner->getClientOriginalExtension();
            // PINDAHIN
            $banner->move(public_path('/assets/img'), $fullFileBanner);
        }

        // LOKER UPDATE
        $loker->update([
            'title'             => $request->title,
            'kategori'          => $request->kategori,
            'kedaluwarsa'       => $request->kedaluwarsa,
            'posisi'            => $request->posisi,
            'kuota'             => $request->kuota,
            'gaji'              => $request->gaji,
            'lokasi_kerja'      => $request->lokasi_kerja,
            'deskripsi'         => $request->deskripsi,
            'jenis_pekerjaan'   => $request->jenis_pekerjaan,
            'banner'            => $loker->banner,
            'status'            => $status,
        ]);


        // SAVING IMAGE AND MAKING NAME
        $fotos = $request->file('fotos');
        $old_foto = Galeri::where('lowongankerja_id', '=', $loker->id)->get()->toArray();
        $old_fotos = $request->old_fotos;
        $id_fotos = $request->id_fotos;

        // MENGEDIT FOTO
        foreach ($old_foto as $key => $oldfoto) {
            // JIKA FOTO LAMA ADA
            if ($old_fotos[$key] !== null) {
                // JIKA TIDAK SAMA DENGAN FOTO DI DATABASE
                if ($old_fotos[$key] !== $oldfoto['foto']) {
                    // GET NEW NAME IMAGE
                    $fileName = pathinfo($old_fotos[$key]->getClientOriginalName(), PATHINFO_FILENAME);
                    $fullFileName = $fileName . "-" . time() . Str::random(5) . "." . $old_fotos[$key]->getClientOriginalExtension();

                    // SAVE IMAGE
                    Galeri::findOrFail($oldfoto['id'])->update([
                        'foto'              => $fullFileName,
                        'keterangan'        => 'Mengubah Foto'
                    ]);
                    // DELETE OLD IMAGE
                    $link = str_replace('\\', '/', public_path('assets/img/'));
                    unlink($link. $oldfoto['foto']);
                    // MOVE IMAGE TO DIR
                    $old_fotos[$key]->move(public_path('/assets/img'), $fullFileName);
                }
            }else{
                // GET IMAGE AND DELETe
                Galeri::findOrFail($id_fotos[$key])->delete();
                $link = str_replace('\\', '/', public_path('assets/img/'));
                // DELETE FROM LOCAL STORAGE
                unlink($link. $oldfoto['foto']);
            }
        }

        // MENSAVE FOTO
        // JIKA FOTO ADA
        if ($fotos) {
            foreach ($fotos as $foto) {
                // BUAT NAMA BARU
                $fileName = pathinfo($foto->getClientOriginalName(), PATHINFO_FILENAME);
                $fullFileName = $fileName . "-" . time() . Str::random(5) . "." . $foto->getClientOriginalExtension();

                // CREATE IMAGE
                $galeriNew = Galeri::create([
                    'lowongankerja_id'  => $loker->id,
                    'foto'              => $fullFileName,
                    'keterangan'        => 'Membuat Foto'
                ]);

                // MOVE IMAGE TO DIR
                $foto->move(public_path('/assets/img'), $fullFileName);
            }
        }
        $galeriNew = 'Tidak Bertambah';

        // SAVING PERSYARATAN
        $req = $request->req;
        $id_req = $request->id_req;
        $old_req = Requirement::where('lowongankerja_id', '=', $loker->id)->get()->toArray();

        foreach ($req as $key => $data) {
            // UPDATE
            if ($data && isset($id_req[$key]) && $old_req[$key]['text'] !== $data && $old_req[$key]['id'] == intval($id_req[$key])) {
                Requirement::findOrFail($old_req[$key]['id'])->update([
                    'text'              => $data,
                ]);
            }elseif ($data && !isset($id_req[$key])) {
                // CREATE
                $requirement = Requirement::create([
                    'lowongankerja_id'  => $loker->id,
                    'text'              => $data,
                ]);
            }elseif ($data == null && isset($id_req[$key])){
                // DELETE
                Requirement::findOrFail($old_req[$key]['id'])->delete();
            }
            $requirementOld = 'Tidak Berubah';
        }

        // SAVING TAHAPAN
        $tahap = $request->tahapsec;
        $nama = $request->namasec;
        $date = $request->datesec;
        $id_tahap = $request->id_tahap;
        $old_tahap = Tahap::where('lowongankerja_id', '=', $loker->id)->get()->toArray();

        $ambilTahap = substr($kodetahap, 3);
        $ambilTahap = str_pad($ambilTahap, 5, 0, STR_PAD_LEFT);

        foreach($tahap as $i => $val) {
            // TAMBAH TAHAPAN
            if ($val && $nama[$i] && $date[$i] && !isset($id_tahap[$i])) {
                $ambilTahap++;
                // MEMBUAT KODE BARU
                $kodetahapbaru = 'THP' . str_pad($ambilTahap - 1, 5, 0, STR_PAD_LEFT);
                $tahapan = Tahap::create([
                    'id'                => $kodetahapbaru,
                    'lowongankerja_id'  => $loker->id,
                    'tahap_ke'          => $val,
                    'nama'              => $nama[$i],
                    'tanggal_seleksi'   => $date[$i],
                    'keterangan'        => 'Ini adalah tahapan ke '. $val .' yang akan dilakukan pada '. $date[$i],
                ]);
            }

            if (isset($id_tahap[$i])) {
                if ($val && $nama[$i] && $date[$i] && isset($id_tahap[$i]) == $old_tahap[$i]['id']) {
                    // UPDATE
                    if ($val !== $old_tahap[$i]['tahap_ke'] || $nama[$i] !== $old_tahap[$i]['nama'] || $date[$i] !== $old_tahap[$i]['tanggal_seleksi']) {
                        # update
                        $tahapan = Tahap::findOrFail($id_tahap[$i])->update([
                            'tahap_ke'          => $val,
                            'nama'              => $nama[$i],
                            'tanggal_seleksi'   => $date[$i],
                            'keterangan'        => 'Ini adalah tahapan ke '. $val .' yang akan dilakukan pada '. $date[$i],
                        ]);
                    }
                }elseif(isset($id_tahap[$i]) == $old_tahap[$i]['id'] && $val == null && $nama[$i] == null  && $date[$i] == null) {
                    // DELETE
                    $tahapan = Tahap::findOrFail($id_tahap[$i])->delete();
                }

                $tahapan = 'Tidak Terjadi';
                $kodetahap++;
            }
        }

        if($loker){
            //redirect dengan pesan sukses
            return redirect()->route('daftar')->with(['success' => 'Data Berhasil Diperbarui!']);
        }else{
            //redirect dengan pesan error
            return redirect()->back()->withErrors(['error' => 'Data Gagal Diperbarui!']);
        }
    }

    /**
    * menampilkan halman daftar pelamar
    *
    *
    * @return void
    */
    public function pelamar()
    {
        $loker = Loker::all();

        $data = [
            'title' => 'loker',
            // 'loker' => $loker,
        ];

        return view('admin.mitra.ubah', $data);
    }

    /**
    * menampilkan halman daftar rekomend alumni
    *
    *
    * @return void
    */
    public function rekomend()
    {
        $alumni = Alumni::all();

        $data = [
            'title' => 'loker',
            'alumni' => $alumni,
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

    /**
    * Delete data loker
    *
    *
    * @return void
    */
    public function hapus(Request $request, $id)
    {
        $loker = Loker::findOrFail($id);
        $loker->update([
            'kuota'     => 50,
        ]);

        return redirect('/mt/lk/main');
    }
}