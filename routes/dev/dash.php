<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('data-jurusan', 'Dev\DashboardController@getDataJurusan');
