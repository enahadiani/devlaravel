<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

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
    return view('webjava.'.$id);
});

Route::get('/form/{id}/{kode}/{name}', function ($id,$kode,$name) {
    
    $data['page'] = $kode;
    return view('webjava.'.$id,$data);
});

Route::get('/news/{page}', function ($page) {
    
    $data['page'] = $page;
    return view('webjava.news',$data);
});

Route::get('read-item/{id}', function ($id) {
    
    $data['id'] = $id;
    return view('webjava.vItem',$data);
});

Route::get('/', 'Webjava\WebController@index');
Route::get('/menu', 'Webjava\WebController@getMenu');
Route::get('/gallery', 'Webjava\WebController@getGallery');
Route::get('/kontak', 'Webjava\WebController@getKontak');
Route::get('/page/{id}', 'Webjava\WebController@getPage');
Route::get('/news/{page}/{bln}/{thn}', 'Webjava\WebController@getNews');
Route::get('/readitem/{id}', 'Webjava\WebController@readItem');




