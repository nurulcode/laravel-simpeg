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
    return redirect('/login');
});


Auth::routes();

Route::match(['get', 'post'], '/register', function () {
    return redirect('/login');
})->name('register');

Route::prefix('masters')->group(function () {
    Route::resource('pendidikan', 'Master\PendidikanController');
    Route::resource('jabatan', 'Master\JabatanController');
    Route::resource('gaji', 'Master\GajiController');
    Route::resource('golongan', 'Master\GolonganController');
    Route::resource('unit', 'Master\UnitController');
});

Route::prefix('kepegawaians')->group(function () {
    Route::resource('teguran', 'Kepegawaian\TeguranController');
    Route::resource('arsip', 'Kepegawaian\ArsipController');

});

Route::get('/pegawai/report_pegawais/{pegawai}', 'PegawaiController@report_pegawais')->name('pegawais.report_pegawais');
Route::resource('pegawai', 'PegawaiController');
Route::resource('rekapitulasi', 'RekapitulasiController');

Route::resource('keluarga', 'KeluargaController');
Route::resource('sekolah', 'SekolahController');
Route::resource('bahasa', 'BahasaController');

Route::get('/home', 'HomeController@index')->name('home');
