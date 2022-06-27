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
Route::get('mahasiswa', 'Dev\UploadMahasiswaController@index');
Route::delete('mahasiswa/{id}', 'Dev\UploadMahasiswaController@destroy');

Route::delete('mahasiswa-upload-clear-temp', 'Dev\UploadMahasiswaController@clearTmp');
Route::post('mahasiswa-upload-tmp', 'Dev\UploadMahasiswaController@getDataTmp');

Route::post('dev-mahasiswa-upload', 'Dev\UploadMahasiswaController@uploadExcel');
Route::get('mahasiswa-upload-validate', 'Dev\UploadMahasiswaController@doValidate');

Route::post('mahasiswa-simpan', 'Dev\UploadMahasiswaController@store');


// upload file document
Route::get('mahasiswa2', 'Dev\UploadFileDocumentController@index');
Route::get('mahasiswa2-detail', 'Dev\UploadFileDocumentController@show');

Route::post('file-doc-mahasiswa', 'Dev\UploadFileDocumentController@store');
Route::post('file-doc-mahasiswa-update', 'Dev\UploadFileDocumentController@update');
Route::delete('file-doc-mahasiswa', 'Dev\UploadFileDocumentController@destroy');