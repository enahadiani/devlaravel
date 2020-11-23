<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('jenis', 'Dev\JenisController@index');
Route::get('jenis-detail', 'Dev\JenisController@show');
Route::post('jenis', 'Dev\JenisController@store');
Route::put('jenis', 'Dev\JenisController@update');
Route::delete('jenis', 'Dev\JenisController@destroy');