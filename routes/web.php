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
    Route::resource('pendidikan', 'PendidikanController');
    Route::resource('jabatan', 'JabatanController');
    Route::resource('gaji', 'GajiController');
    Route::resource('golongan', 'GolonganController');
});

Route::get('/pegawais/report_pegawais/{pegawai}', 'PegawaiController@report_pegawais')->name('pegawais.report_pegawais');
Route::resource('pegawais', 'PegawaiController');
Route::resource('rekapitulasis', 'RekapitulasiController');

Route::resource('keluargas', 'KeluargaController');
Route::resource('sekolahs', 'SekolahController');
Route::resource('bahasa', 'BahasaController');

Route::get('/home', 'HomeController@index')->name('home');
