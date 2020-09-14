<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Helper Controller//
Route::get('filter-akun', 'Yakes\HelperController@getFilterAkun');
Route::get('filter-periode-keu', 'Yakes\HelperController@getFilterPeriodeKeuangan');
Route::get('filter-fs', 'Yakes\HelperController@getFilterFS');
Route::get('filter-level', 'Yakes\HelperController@getFilterLevel');
Route::get('filter-format', 'Yakes\HelperController@getFilterFormat');
Route::get('filter-sumju', 'Yakes\HelperController@getFilterSumju');
Route::get('filter-modul', 'Yakes\HelperController@getFilterModul');
Route::get('filter-bukti-jurnal', 'Yakes\HelperController@getFilterBuktiJurnal');
Route::get('filter-mutasi', 'Yakes\HelperController@getFilterMutasi');

Route::post('lap-nrclajur', 'Yakes\LaporanController@getNrcLajur');
Route::post('lap-jurnal', 'Yakes\LaporanController@getJurnal');
Route::post('lap-buktijurnal', 'Yakes\LaporanController@getBuktiJurnal');
Route::post('lap-bukubesar', 'Yakes\LaporanController@getBukuBesar');
Route::post('lap-neraca', 'Yakes\LaporanController@getNeraca');
Route::post('lap-labarugi', 'Yakes\LaporanController@getLabaRugi');
Route::post('send-laporan', 'Yakes\LaporanController@sendMail');