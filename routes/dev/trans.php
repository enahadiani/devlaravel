<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('tagihan', 'Dev\TagihanController@index');
Route::get('tagihan-detail', 'Dev\TagihanController@show');
Route::post('tagihan', 'Dev\TagihanController@store');
Route::put('tagihan', 'Dev\TagihanController@update');
Route::delete('tagihan', 'Dev\TagihanController@destroy');
Route::get('tagihan-load', 'Dev\TagihanController@load');

Route::get('bayar', 'Dev\BayarController@index');
Route::get('bayar-detail', 'Dev\BayarController@show');
Route::post('bayar', 'Dev\BayarController@store');
Route::put('bayar', 'Dev\BayarController@update');
Route::delete('bayar', 'Dev\BayarController@destroy');


// pembayaran
Route::post('dev-pembayaran-upload', 'Dev\UploadPembayaranController@uploadXLS');
Route::get('dev-pembayaran-load', 'Dev\UploadPembayaranController@loadDataTmp');

// tagihan
Route::post('dev-tagihan-upload', 'Dev\UploadTagihanController@uploadXLS');

// upload mahasiswa
Route::post('dev-mahasiswa-upload', 'Dev\UploadMahasiswaController@uploadExcel');