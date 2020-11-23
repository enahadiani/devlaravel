<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/form/{id}', function ($id) {
    if(isset($id)){

        if(!Session::has('isLoggedIn')){
            // return redirect('dash-telu/login');
            return view('dev.sesi');
        }else{
            return view('dev.'.$id);
        }
    }else{
        return view('dev.blankform');
    }
});

Route::get('/form/', function () {
    return view('dev.blankform');
});

Route::get('/sesi-habis', function () {
    return view('dev.sesi');
});

Route::get('/cek_session', 'Dev\AuthController@cek_session');
Route::get('/', 'Dev\AuthController@index');
Route::get('/dash', 'Dev\AuthController@index');
Route::get('/menu', 'Dev\AuthController@getMenu');
Route::get('/login', 'Dev\AuthController@login');
Route::post('/login', 'Dev\AuthController@cek_auth');
Route::get('/logout', 'Dev\AuthController@logout');

Route::get('/profile', 'Dev\AuthController@getProfile');
Route::post('/update-password', 'Dev\AuthController@updatePassword');
Route::post('/update-foto', 'Dev\AuthController@updatePhoto');
Route::post('/update-background', 'Dev\AuthController@updateBackground');

Route::get('notif','Dev\NotifController@getNotif');
Route::post('notif-update-status','Dev\NotifController@updateStatusRead');
Route::post('search-form','Dev\AuthController@searchForm');
Route::get('search-form-list','Dev\AuthController@searchFormList');
Route::get('search-form-list2','Dev\AuthController@searchFormList2');



