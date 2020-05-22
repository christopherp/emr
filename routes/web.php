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

Route::get('/pasien/{id}/asesmenawalkandungan', [
    'uses' => 'AsesmenKandunganController@create',
    'as' => 'asesmen_awal_kandungan.create'
]);

Route::get('/pasien/{id}/doc/{nama_dokumen}', [
    'uses' => 'AsesmenKandunganController@show',
    'as' => 'asesmen_awal_kandungan.show'
]);

Route::delete('/pasien/{id}/doc/{nama_dokumen}', [
    'uses' => 'AsesmenKandunganController@destroy',
    'as' => 'asesmen_awal_kandungan.destroy'
]);

Route::get('/pasien/{id}/doc/{nama_dokumen}/edit', [
    'uses' => 'AsesmenKandunganController@edit',
    'as' => 'asesmen_awal_kandungan.edit'
]);

Route::post('/pasien/{id}/asesmenawalkandungan', [
    'uses' => 'AsesmenKandunganController@store',
    'as' => 'asesmen_awal_kandungan.store'
]);

Route::patch('/pasien/{id}/doc/{nama_dokumen}/edit', [
    'uses' => 'AsesmenKandunganController@update',
    'as' => 'asesmen_awal_kandungan.update'
]);

Route::resource('pasien', 'PasienController'); 