<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('filter-nim','Dev\FilterController@getFilterNIM');
Route::get('filter-jur','Dev\FilterController@getFilterJurusan');


