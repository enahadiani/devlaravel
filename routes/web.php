<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('dago-auth/login');
    $domain = $_SERVER['SERVER_NAME'];
    switch ($domain){
        case 'dwi.simkug.com' : 
            return redirect('dago-auth/login');
        break;
        default : 
            return view('welcome');
        break;
    }
});

// Route::get('/midtrans', 'DonationController@index')->name('midtrans');
// Route::get('/midtrans/finish', function(){
//     return redirect()->route('midtrans');
// })->name('donation.finish');

// Route::get('/midtrans/unfinish', function(){
//     return redirect()->route('midtrans');
// })->name('donation.unfinish');

// Route::get('/midtrans/error', function(){
//     return redirect()->route('midtrans');
// })->name('donation.error');
 

// Route::post('/donation/store', 'DonationController@submitDonation')->name('donation.store');
// Route::post('/midtrans/callback', 'DonationController@notificationHandler')->name('notification.handler');
 