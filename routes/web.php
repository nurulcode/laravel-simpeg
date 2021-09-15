<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

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

    Route::get('/pegawai/report_pegawai/{pegawai}', 'PegawaiController@report_pegawai')->name('pegawai.report_pegawai');
    Route::get('/pegawai/pegawais_excel', 'PegawaiController@pegawais_excel')->name('pegawai.pegawais_excel');
    Route::resource('pegawai', 'PegawaiController');

    Route::resource('rekapitulasi', 'RekapitulasiController');
    Route::resource('registrasi', 'RegistrasiController');

    Route::get('/home', 'HomeController@index')->name('home');



    Route::namespace('Permission')->group(function () {
        Route::resource('roles','RoleController');
        Route::resource('users','UserController');
    });

    Route::resource('logs','LogController');
    Route::resource('permissions','PermissionController');

    Route::resource('pengumuman','PengumumanController')->except('show', 'edit', 'update');

    Route::get('/kelurahan/{id}','WilayahController@getKelurahan');
    Route::get('/kecamatan/{id}','WilayahController@getKecamatan');
    Route::get('/kabupaten/{id}','WilayahController@getKabupaten');
    Route::get('/provinsi','WilayahController@getProvinsi');

});
