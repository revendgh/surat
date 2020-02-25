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

Route::get('/cetak', 'surat@cetak');

Route::get('/mahasiswa', 'surat@index');
Route::get('/mahasiswa/ta', 'surat@showform');
Route::get('/mahasiswa/matkul', 'surat@showform_matkul');
Route::post('/mahasiswa/create_ta', 'surat@store');
Route::post('/mahasiswa/create_matkul', 'surat@store_matkul');
