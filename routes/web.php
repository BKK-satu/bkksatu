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
});

Route::prefix('al')->group(function () {
        Route::get('/main', 'alumni\MainController@main');
});