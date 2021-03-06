<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('jenis', 'Dev\JenisController@index');
Route::get('jenis-detail', 'Dev\JenisController@show');
Route::post('jenis', 'Dev\JenisController@store');
Route::put('jenis', 'Dev\JenisController@update');
Route::delete('jenis', 'Dev\JenisController@destroy');

Route::get('jurusan', 'Dev\JurusanController@index');
Route::get('jurusan-detail', 'Dev\JurusanController@show');
Route::post('jurusan', 'Dev\JurusanController@store');
Route::put('jurusan', 'Dev\JurusanController@update');
Route::delete('jurusan', 'Dev\JurusanController@destroy');

Route::get('siswa', 'Dev\SiswaController@index');
Route::get('siswa-detail', 'Dev\SiswaController@show');
Route::post('siswa', 'Dev\SiswaController@store');
Route::put('siswa', 'Dev\SiswaController@update');
Route::delete('siswa', 'Dev\SiswaController@destroy');