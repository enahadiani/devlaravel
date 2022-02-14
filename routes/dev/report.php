<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('filter-nim','Dev\SiswaController@getFilterNIM');
Route::get('filter-jurusan','Dev\JurusanController@getFilterJurusan');
Route::get('filter-tagihan','Dev\TagihanController@getFilterTagihan');

Route::post('dev-lap-siswa', 'Dev\SiswaController@getDataSiswa');
Route::post('dev-lap-tagihan', 'Dev\TagihanController@getDataTagihan');


