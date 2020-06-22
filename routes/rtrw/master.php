<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Master Satpam
Route::get('satpam','Rtrw\SatpamController@index');
Route::post('satpam','Rtrw\SatpamController@store');
Route::get('satpam/{id_satpam}','Rtrw\SatpamController@show');
Route::post('satpam/{id_satpam}','Rtrw\SatpamController@update');
Route::delete('satpam/{id_satpam}','Rtrw\SatpamController@destroy');
Route::post('satpam-generate-qrcode','Rtrw\SatpamController@generateQrCode');

//Master Blok
Route::get('blok','Rtrw\BlokController@index');
Route::get('blok/{blok}','Rtrw\BlokController@show');
Route::post('blok','Rtrw\BlokController@store');
Route::put('blok/{blok}','Rtrw\BlokController@update');
Route::delete('blok/{blok}','Rtrw\BlokController@destroy');

//Master PP
Route::get('pp','Rtrw\PpController@index');
Route::get('pp/{kode_pp}','Rtrw\PpController@show');
Route::post('pp','Rtrw\PpController@store');
Route::put('pp/{kode_pp}','Rtrw\PpController@update');
Route::delete('pp/{kode_pp}','Rtrw\PpController@destroy');

//Master Perlu
Route::get('perlu','Rtrw\KeperluanController@index');
Route::get('perlu/{kode_perlu}','Rtrw\KeperluanController@show');
Route::post('perlu','Rtrw\KeperluanController@store');
Route::put('perlu/{kode_perlu}','Rtrw\KeperluanController@update');
Route::delete('perlu/{kode_perlu}','Rtrw\KeperluanController@destroy');

//Master Rumah
Route::get('rumah','Rtrw\RumahController@index');
Route::get('rumah/{kode_rumah}','Rtrw\RumahController@show');
Route::post('rumah','Rtrw\RumahController@store');
Route::put('rumah/{kode_rumah}','Rtrw\RumahController@update');
Route::delete('rumah/{kode_rumah}','Rtrw\RumahController@destroy');

//Master Warga
Route::get('warga','Rtrw\WargaController@index');
Route::get('warga/{no_bukti}','Rtrw\WargaController@show');
Route::post('warga','Rtrw\WargaController@store');
Route::post('warga/{no_bukti}','Rtrw\WargaController@update');
Route::delete('warga/{no_bukti}','Rtrw\WargaController@destroy');
