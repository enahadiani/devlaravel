<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::post('lap-bidang', 'Wisata\LaporanController@getBidang');
Route::post('lap-mitra', 'Wisata\LaporanController@getMitra');