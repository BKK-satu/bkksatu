<?php

namespace App\Http\Controllers\mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loker;
use App\Models\Tahap;
use App\Models\Galeri;
use App\Models\Requirement;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;
use Carbon\Carbon;

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
        }

        $data = [
            'title' => 'loker',
            'loker' => $loker,
            'requirement' => $requirement,
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

        $data = [
            'title' => 'loker',
            'loker' => $loker,
            'requirement' => $requirement,
            'tahap' => $tahap,
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
    public function store(Request $request)
    {
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
            // 'fotos'             => 'image|mimes:png,jpg,jpeg|max:80000',
            // 'tahapsec'          => 'numeric',
            // 'namasec'           => 'min:5',
            // 'datesec'           => 'date',
        ],[
            'req.min'           => 'Field Requirement must over 7 characters!',
        ]);

        // MENGAMBIL KODE LOKER BARU
        $kodeloker = DB::select('SELECT newidloker() AS kodeloker');
        $kodeloker = $kodeloker[0]->kodeloker;
        $kodetahap = DB::select('SELECT newidtahap() AS kodetahap');
        $kodetahap = $kodetahap[0]->kodetahap;

        // $ambilTahap = substr($kodetahap, 3);
        // $ambilTahap = str_pad($ambilTahap, 5, 0, STR_PAD_LEFT);

        // for ($i=0; $i <5 ; $i++) {
        //     $ambilTahap++;
        //     $kodetahapbaru = 'THP' . str_pad($ambilTahap - 1, 5, 0, STR_PAD_LEFT);
        // }

        // MEMBUAT LOKER
        $dateNow = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        if ($request->kedaluwarsa >= $dateNow){
            $status = 'active';
        }else{
            $status = 'nonactive';
        }

        // SAVING BANNER
        $banner = $request->file('banner');
        if ($banner !== null) {
            $nameBanner = pathinfo($banner->getClientOriginalName(), PATHINFO_FILENAME);
            $fullFileBanner = $nameBanner . "-" . time() . "." .$banner->getClientOriginalExtension();
            $banner->move(public_path('/assets/img'), $fullFileBanner);
        }else{
            $fullFileBanner = null;
        }

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
        if ($fotos !== null) {
        foreach ($fotos as $foto) {
            $fileName = pathinfo($foto->getClientOriginalName(), PATHINFO_FILENAME);
            $fullFileName = $fileName . "-" . time() . "." .$foto->getClientOriginalExtension();

            $galeri = Galeri::create([
                'lowongankerja_id'  => $kodeloker,
                'foto'              => $fullFileName,
                'keterangan'        => 'Membuat Foto'
            ]);
            $foto->move(public_path('/assets/img'), $fullFileName);
        }
        }else{
            $galeri = true;
        }

        // SAVING PERSYARATAN
        $req = $request->req;
        foreach ($req as $data) {
            if ($data !== null) {
                $requirement = Requirement::create([
                    'lowongankerja_id'  => $kodeloker,
                    'text'              => $data,
                ]);
            }else{
                $requirement = true;
            }
        }

        // SAVING TAHAPAN
        $tahap = $request->tahapsec;
        $nama = $request->namasec;
        $date = $request->datesec;

        $ambilTahap = substr($kodetahap, 3);
        $ambilTahap = str_pad($ambilTahap, 5, 0, STR_PAD_LEFT);
        foreach($tahap as $i => $val) {
            $ambilTahap++;
            $kodetahapbaru = 'THP' . str_pad($ambilTahap - 1, 5, 0, STR_PAD_LEFT);

            if ($val !== null && $nama[$i] !== null && $date[$i] !== null) {
                $tahapan = Tahap::create([
                    'id'                => $kodetahapbaru,
                    'lowongankerja_id'  => $kodeloker,
                    'tahap_ke'          => $val,
                    'nama'              => $nama[$i],
                    'tanggal_seleksi'   => $date[$i],
                    'keterangan'        => 'Ini adalah tahapan ke '. $val .' yang akan dilakukan pada '. $date[$i],
                ]);
            }else{
                $tahapan = true;
            }
            $kodetahap++;
        }

        if($loker && $galeri && $requirement && $tahapan){
            //redirect dengan pesan sukses
            return redirect()->route('daftar')->with(['success' => 'Data Berhasil Disimpan!']);
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