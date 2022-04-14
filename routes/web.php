<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', 'DashboardController@index');
Route::get('/add', 'TestController@cek');

Route::get('/login', 'TestController@cek');
Route::get('/register', 'TestController@cek');

Route::get('/alumni-detail/{id}', 'TestController@alumniDetail');

Route::get('/tes', function () {
    return view('tes', ['title' => 'dashboard']);
});

Route::prefix('ad')->group(function () {
    Route::get('/dashboard', 'admin\MainController@dashboard');
    Route::get('/notif', 'admin\MainController@notifikasi');

    Route::prefix('al')->group(function () {
        Route::get('/main', 'admin\AlumniController@main');
        Route::get('/daftar', 'admin\AlumniController@daftarAlumni');
        Route::get('/detail', 'admin\AlumniController@detailAlumni');
        Route::get('/penelusuran', 'admin\AlumniController@penelusuranAlumni');
        Route::get('/penelusuran-jurusan', 'admin\AlumniController@penelusuranJurusanAlumni');
    });

    Route::prefix('ak')->group(function () {
        Route::get('/main', 'admin\AkunController@main');
    });

    Route::prefix('in')->group(function () {
        Route::get('/main', 'admin\InformasiController@main');
    });

    Route::prefix('lk')->group(function () {
        Route::get('/main', 'admin\LokerController@main');
    });

    Route::prefix('mt')->group(function () {
        Route::get('/main', 'admin\MitraController@main');
    });
});

Route::prefix('mt')->group(function () {
    Route::get('/main', 'mitra\MainController@main');
    Route::get('/notif', 'mitra\MainController@notif');
    Route::get('/profil', 'mitra\MainController@profil')->name('profil.daftar');
    Route::get('/profil/ubah/{id}', 'mitra\MainController@prUbah');
    Route::post('/profil/ubahPost', 'mitra\MainController@prUbahPost');

    Route::get('/kantor/tambah', 'mitra\MainController@kantorAdd');
    Route::post('/kantor/post', 'mitra\MainController@kantorPost');
    Route::get('/kantor/ubah/{id}', 'mitra\MainController@kantorEdit');
    Route::post('/kantor/editPost', 'mitra\MainController@kantorEditPost');
    Route::post('/kantor/hapus/{id}', 'mitra\MainController@kantorDelete');

    Route::prefix('lk')->group(function () {
        Route::get('/main', 'mitra\LokerController@main')->name('daftar');
        Route::get('/detail/{id}', 'mitra\LokerController@detail');
        Route::get('/tambah', 'mitra\LokerController@tambah')->name('tambah-mitra');
        Route::post('/tambahpost', 'mitra\LokerController@store');
        Route::get('/ubah/{id}', 'mitra\LokerController@ubah');
        Route::post('/ubah/post', 'mitra\LokerController@ubahStore');
        Route::post('/hapus/{id}', 'mitra\LokerController@hapus')->name('loker.delete');

        Route::get('/pelamar/{id}', 'mitra\LokerController@pelamar')->name('pelamar');
        Route::get('/pelamar/print/{id}', 'mitra\LokerController@generatePelamar');

        Route::get('/rekomend/{id}', 'mitra\LokerController@rekomend')->name('rekomend');
        Route::post('/rekomend/post', 'mitra\LokerController@rekomendAdd');

        Route::get('/tahap/{id}', 'mitra\LokerController@tahap')->name('tahap');
        // MENAMBAH TAHAPAN BARU
        Route::post('/tahap/post', 'mitra\LokerController@tahapAdd');
        // HALAMAN TAHAP SELEKSI
        Route::get('/tahap/detail/{id}', 'mitra\LokerController@tahapSeleksi');
        // HALAMAN UNTUK MENAMBAH ALUMNI YANG DISELEKSI
        Route::post('/tahap/seleksi/{id}', 'mitra\LokerController@alumniSeleksi');

    });

    Route::prefix('re')->group(function () {
        Route::get('/main', 'mitra\RekomendController@main')->name('rekomend.awal');
        Route::post('/tambah', 'mitra\RekomendController@add');
    });
});

Route::prefix('al')->group(function () {
        Route::get('/main', 'alumni\MainController@main');
});
