<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::post('lap-tagihan', 'Sai\LaporanController@getDataTagihan');
