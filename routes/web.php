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

Route::resource('pegawais', 'PegawaiController');
Route::resource('pendidikan', 'PendidikanController');
Route::resource('jabatan', 'JabatanController');
Route::get('/home', 'HomeController@index')->name('home');
