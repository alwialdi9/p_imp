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

Route::get('/', 'LoginController@index');

Route::get('/login', 'LoginController@login');
Route::post('/loginPost', 'LoginController@loginPost');
Route::get('/register', 'LoginController@register');
Route::post('/registerPost', 'LoginController@registerPost');
Route::get('/logout', 'LoginController@logout');


Route::get('/dashboard', 'DashboardController@index');
Route::get('/keuangan', 'KeuanganController@index');
Route::get('/keuangan/create', 'KeuanganController@create');

Route::get('/penjualan', 'PenjualanController@index');
Route::get('/penjualan/buat_penjualan', 'PenjualanController@create');
Route::post('/penjualan', 'PenjualanController@store');
Route::get('/penjualan/edit/{id}', 'PenjualanController@edit');
Route::post('/penjualan/update', 'PenjualanController@update');
Route::get('/penjualan/hapus/{id}', 'PenjualanController@hapus');
Route::get('kode_penjualan/{id}', 'PenjualanController@getinfo');

Route::get('/pembelian', 'PembelianController@index');
Route::get('/pembelian/buat_pembelian', 'PembelianController@create');
Route::post('/pembelian', 'PembelianController@store');
Route::get('/pembelian/edit/{id}', 'PembelianController@edit');
Route::post('/pembelian/update', 'PembelianController@update');
Route::get('/pembelian/hapus/{id}', 'PembelianController@hapus');

Route::get('/biaya', 'BiayaController@index');
Route::get('/biaya/buat_biaya', 'BiayaController@create');
Route::post('/biaya', 'BiayaController@store');

Route::get('/petty', 'PettyCashController@index');
Route::get('/petty/buat_petty', 'PettyCashController@create');
Route::post('/petty', 'PettyCashController@store');
Route::post('/searchpetty', 'PettyCashController@show');

Route::get('/surat', 'SuratController@index');
Route::get('/surat/suratmasuk', 'SuratController@create');
Route::get('/surat/suratkeluar', 'SuratController@createkeluar');
Route::post('/surat', 'SuratController@store');
Route::get('/surat/edit/{id}', 'SuratController@edit');
Route::post('/surat/update', 'SuratController@update');
Route::post('/searchsurat', 'SuratController@show');
Route::delete('/surathapus/{id}', 'SuratController@destroy');

Route::get('akun', 'AkunController@index');
Route::get('akun/{id}', 'AkunController@show');
Route::get('akunedit/{id}', 'AkunController@edit');
Route::post('akuncreate', 'AkunController@store');
Route::delete('akunhapus/{id}', 'AkunController@destroy');

Route::get('/invoice', 'InvoiceController@index');
Route::get('/invoice/buatinvoice', 'InvoiceController@create');
Route::post('/invoice', 'InvoiceController@store');
Route::get('/invoice/edit/{id}', 'InvoiceController@edit');
Route::post('/invoice/update', 'InvoiceController@update');
Route::get('/invoice/hapus/{id}', 'InvoiceController@hapus');
Route::get('pelangganinvoice/{id}', 'InvoiceController@getinfo');
Route::post('/searchinvoice', 'InvoiceController@show');

Route::get('/invoice/lihat/{id}', 'InvoiceController@preview');
// Route::get('/print', 'InvoiceController@print')->name('print');

Route::post('/petty', 'PenjualanController@validation');
Route::post('/petty', 'PettyCashController@store');

Route::get('/pelanggan', 'PelangganController@index');
Route::post('/pelanggancreate', 'PelangganController@store');
Route::get('pelangganedit/{id}', 'PelangganController@edit');
Route::delete('pelangganhapus/{id}', 'PelangganController@destroy');

Route::get('/labarugi', 'LabaRugiController@index');
Route::get('/labarugi/index', 'LabaRugiController@create');
Route::post('/labarugi', 'LabaRugiController@store');

Route::get('/rencanaaruskas', 'RencanaKasController@index');
Route::get('/rencanaaruskas/index', 'RencanaKasController@create');
Route::post('/rencanaaruskas', 'RencanaKasController@store');

Route::get('/neraca', 'NeracaController@index');
Route::get('/neraca/index', 'NeracaController@create');
Route::post('/neraca', 'NeracaController@store');
