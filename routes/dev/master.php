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

// Data Klp Menu //
Route::get('menu-klp', 'Dev\Settings\KelompokMenuController@index');
Route::get('menu-klp/{id}', 'Dev\Settings\KelompokMenuController@getData');
Route::post('menu-klp', 'Dev\Settings\KelompokMenuController@store');
Route::put('menu-klp/{id}', 'Dev\Settings\KelompokMenuController@update');
Route::delete('menu-klp/{id}', 'Dev\Settings\KelompokMenuController@delete');

// Data Form //
Route::get('form', 'Dev\Settings\FormController@index');
Route::get('form/{id}', 'Dev\Settings\FormController@getData');
Route::post('form', 'Dev\Settings\FormController@store');
Route::put('form/{id}', 'Dev\Settings\FormController@update');
Route::delete('form/{id}', 'Dev\Settings\FormController@delete');

// Setting Menu Form //
Route::get('setting-menu', 'Dev\Settings\SettingMenuController@show');
Route::post('setting-menu', 'Dev\Settings\SettingMenuController@store');
Route::post('setting-menu-move', 'Dev\Settings\SettingMenuController@storeMove');
Route::put('setting-menu', 'Dev\Settings\SettingMenuController@update');
Route::delete('setting-menu', 'Dev\Settings\SettingMenuController@delete');
Route::post('setting-menu-csv', 'Dev\Settings\SettingMenuController@storeCSV');
