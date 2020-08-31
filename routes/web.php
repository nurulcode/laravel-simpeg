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


Route::group(['middleware' => ['auth']], function() {

    Route::post('/autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');
    Route::post('/autocomplete/fetch_categories', 'AutocompleteController@fetchCategories')->name('autocomplete.fetch_categories');


    Route::prefix('masters')->namespace('Master')->group(function () {
        Route::resource('pendidikan', 'PendidikanController');
        Route::resource('jabatan', 'JabatanController');
        Route::resource('gaji', 'GajiController');
        Route::resource('golongan', 'GolonganController');
        Route::resource('unit', 'UnitController');
    });

    Route::prefix('kepegawaians')->namespace('Kepegawaian')->group(function () {
        Route::resource('teguran', 'TeguranController');
        Route::resource('arsip', 'ArsipController');

    });

    Route::prefix('histories')->namespace('History')->group(function () {
        Route::resource('keluarga', 'KeluargaController');
        Route::resource('sekolah', 'SekolahController');
        Route::resource('bahasa', 'BahasaController');
    });

    Route::get('/pegawai/report_pegawais/{pegawai}', 'PegawaiController@report_pegawais')->name('pegawais.report_pegawais');
    Route::get('/pegawais/pegawais_excel', 'PegawaiController@pegawais_excel')->name('pegawais.pegawais_excel');
    Route::resource('pegawai', 'PegawaiController');

    Route::resource('rekapitulasi', 'RekapitulasiController');

    Route::get('/home', 'HomeController@index')->name('home');


    Route::namespace('Permission')->group(function () {
        Route::resource('roles','RoleController');
        Route::resource('users','UserController');
    });

});
