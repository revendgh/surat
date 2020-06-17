<?php

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

Route::get('/cetak', 'surat_controller@cetak');

Route::get('/mahasiswa', 'surat_controller@index');
Route::get('/mahasiswa/sk', 'surat_controller@create_sk');
Route::get('/mahasiswa/surat_pernyataan', 'surat_controller@create_sp');
Route::get('/mahasiswa/ta', 'surat_controller@create_ta');
Route::get('/mahasiswa/ta/dpm', 'surat_controller@create_ta_dpm');
Route::get('/mahasiswa/matkul', 'surat_controller@create_matkul');
Route::post('/mahasiswa/create_ta', 'surat_controller@store');
Route::post('/mahasiswa/create_matkul', 'surat_controller@store_matkul');
Route::post('/mahasiswa/create_sk', 'surat_controller@store_sk');
Route::post('/mahasiswa/create_sp', 'surat_controller@store_sp');
Route::post('/mahasiswa/create_ta_dpm', 'surat_controller@store_ta_dpmp');

Route::get('/admin/dashboard', 'surat_controller@index_admin');
Route::get('/admin/arsip/terima', 'surat_controller@index_arsip');
Route::get('/admin/pemohon/{id}', 'surat_controller@show_admin');
Route::get('/admin/terima/{id}',  'surat_controller@update_admin_terima');
Route::get('/admin/tolak/{id}',  'surat_controller@update_admin_tolak');
Route::get('/admin/cetak/{id}', 'surat_controller@cetak_admin');
