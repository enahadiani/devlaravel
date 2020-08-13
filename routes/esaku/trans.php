<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Penjualan Routes //
Route::get('penjualan-open', 'Esaku\PenjualanController@getNoOpen');
Route::get('penjualan-bonus/{kd_barang}/{tanggal}/{jumlah}/{harga}', 'Esaku\PenjualanController@cekBonus');
Route::post('penjualan', 'Esaku\PenjualanController@store');

//Open Kasir //
Route::get('open-kasir', 'Esaku\OpenKasirController@index');
Route::post('open-kasir', 'Esaku\OpenKasirController@store');
Route::put('open-kasir/{nik}/{no_open}', 'Esaku\OpenKasirController@update');

//Close Kasir //
Route::get('close-kasir-new', 'Esaku\CloseKasirController@indexNew');
Route::get('close-kasir-finish', 'Esaku\CloseKasirController@indexFinish');
Route::get('close-kasir-detail/{no_open}', 'Esaku\CloseKasirController@getData');
Route::post('close-kasir', 'Esaku\CloseKasirController@store');

// Pembelian Routes //
Route::get('pembelian', 'Esaku\PembelianController@index');
Route::get('pembelian-barang', 'Esaku\PembelianController@getBarang');
Route::post('pembelian', 'Esaku\PembelianController@store');
Route::put('pembelian/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\PembelianController@update');
Route::delete('pembelian/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\PembelianController@delete');
Route::get('pembelian-detail/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\PembelianController@show');

// Retur Pembelian //
Route::post('retur-beli', 'Esaku\ReturBeliController@store');
Route::get('retur-beli-new', 'Esaku\ReturBeliController@getNew');
Route::get('retur-beli-finish', 'Esaku\ReturBeliController@getFinish');
Route::get('retur-beli-barang/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\ReturBeliController@getBarang');
Route::get('retur-beli-detail/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\ReturBeliController@show');

// Stok Opname //
Route::get('stok-opname', 'Esaku\StokOpnameController@index');
// Route::get('retur-beli-new', 'Esaku\ReturBeliController@getNew');
// Route::get('retur-beli-finish', 'Esaku\ReturBeliController@getFinish');
// Route::get('retur-beli-barang/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\ReturBeliController@getBarang');
// Route::get('retur-beli-detail/{no_bukti1}/{no_bukti2}/{no_bukti3}', 'Esaku\ReturBeliController@show');

// Pemasukan Routes //
Route::get('pemasukan', 'Esaku\PemasukanController@index');
Route::get('pemasukan/{no_bukti}', 'Esaku\PemasukanController@show');
Route::post('pemasukan', 'Esaku\PemasukanController@store');
Route::put('pemasukan/{no_bukti}', 'Esaku\PemasukanController@update');
Route::delete('pemasukan/{no_bukti}', 'Esaku\PemasukanController@destroy');

// Pemasukan Routes //
Route::get('pengeluaran', 'Esaku\PengeluaranController@index');
Route::get('pengeluaran/{no_bukti}', 'Esaku\PengeluaranController@show');
Route::post('pengeluaran', 'Esaku\PengeluaranController@store');
Route::put('pengeluaran/{no_bukti}', 'Esaku\PengeluaranController@update');
Route::delete('pengeluaran/{no_bukti}', 'Esaku\PengeluaranController@destroy');

// Pindah buku Routes //
Route::get('pindah-buku', 'Esaku\PindahBukuController@index');
Route::get('pindah-buku/{no_bukti}', 'Esaku\PindahBukuController@show');
Route::post('pindah-buku', 'Esaku\PindahBukuController@store');
Route::put('pindah-buku/{no_bukti}', 'Esaku\PindahBukuController@update');
Route::delete('pindah-buku/{no_bukti}', 'Esaku\PindahBukuController@destroy');

//Penjualan OL //
Route::get('penjualan-langsung-bonus/{kd_barang}/{tanggal}/{jumlah}/{harga}', 'Esaku\PenjualanLangsungController@cekBonus');
Route::post('penjualan-langsung', 'Esaku\PenjualanLangsungController@store');

// Data Provinsi //
Route::get('provinsi', 'Esaku\PenjualanLangsungController@getProvinsi');
Route::get('kota', 'Esaku\PenjualanLangsungController@getKota');
Route::get('kecamatan', 'Esaku\PenjualanLangsungController@getKecamatan');
Route::get('service', 'Esaku\PenjualanLangsungController@getService');

Route::get('barcode-load', 'Esaku\BarcodeController@loadData');
Route::get('periode', 'Esaku\BarcodeController@getPeriode');
Route::post('barcode', 'Esaku\BarcodeController@store');

Route::get('/jurnal', 'Esaku\JurnalController@index');
Route::post('/jurnal', 'Esaku\JurnalController@store');
Route::get('/jurnal/{id}', 'Esaku\JurnalController@show');
Route::put('/jurnal/{id}','Esaku\JurnalController@update');
Route::delete('/jurnal/{id}','Esaku\JurnalController@destroy');
Route::get('/pp', 'Esaku\JurnalController@getPP');
Route::get('/akun', 'Esaku\JurnalController@getAkun');
Route::get('/nikperiksa', 'Esaku\JurnalController@getNIKPeriksa');
Route::get('/nikperiksa/{nik}', 'Esaku\JurnalController@getNIKPeriksaByNIK');
Route::get('/jurnal-periode', 'Esaku\JurnalController@getPeriodeJurnal');
