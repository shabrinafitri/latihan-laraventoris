<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('barang/index','BarangController@index')->name('admin.index.barang');
Route::get('barang/show/{id}','BarangController@show')->name('admin.show.barang');
Route::get('peminjaman/index','PeminjamanController@index')->name('admin.index.peminjaman-barang');
Route::get('peminjaman/show/{id}','PeminjamanController@show')->name('admin.show.peminjaman-barang');
	
Route::group(['middleware' => 'siswa'], function(){
	Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['middleware' => 'admin'], function(){
	Route::group(['prefix' => 'admin'], function(){
		Route::get('/dashboard', 'HomeController@dashboard')->name('admin.dashboard');

		Route::group(['prefix' => 'siswa'], function(){
			Route::get('/index','SiswaController@index')->name('admin.index.siswa');
			Route::get('/show/{id}','SiswaController@show')->name('admin.show.siswa');
			Route::post('/tambah','SiswaController@store')->name('admin.store.siswa');
			Route::post('/edit/{id}', 'SiswaController@edit')->name('admin.edit.siswa');
			Route::post('/update/{id}', 'SiswaController@update')->name('admin.update.siswa');
			Route::get('/pdf/siswa', 'SiswaController@pdf')->name('admin.pdf.siswa');
		});

		Route::group(['prefix' => 'barang'], function(){
			Route::post('/tambah','BarangController@store')->name('admin.store.barang');
			Route::post('/edit/{id}', 'BarangController@edit')->name('admin.edit.barang');
			Route::post('/update/{id}', 'BarangController@update')->name('admin.update.barang');
		});

		Route::group(['prefix' => 'peminjaman'], function(){
			Route::post('/tambah','PeminjamanController@store')->name('admin.store.peminjaman-barang');
			Route::get('/return/{id}','PeminjamanController@return')->name('admin.return.peminjaman-barang');
		});

		Route::group(['prefix' => 'reparasi'], function(){
			Route::get('/index','ReparasiController@index')->name('admin.index.reparasi-barang');
			Route::post('/tambah','ReparasiController@store')->name('admin.store.reparasi-barang');
			Route::get('/show/{id}','ReparasiController@show')->name('admin.show.reparasi-barang');
			Route::get('/return/{id}','ReparasiController@return')->name('admin.return.reparasi-barang');
		});

		Route::group(['prefix' => 'mutasi'], function(){
			Route::get('/index','MutasiController@index')->name('admin.index.mutasi-barang');
			Route::post('/tambah','MutasiController@store')->name('admin.store.mutasi-barang');
			Route::get('/show/{id}','MutasiController@show')->name('admin.show.mutasi-barang');
		});

		Route::group(['prefix' => 'laporan'], function(){
			Route::get('/index','LaporanController@index')->name('admin.index.laporan');
			Route::get('/pdf/laporan/siswa', 'LaporanController@siswaPdf')->name('admin.pdf.siswa-laporan');
			Route::get('/pdf/laporan/barang', 'LaporanController@barangPdf')->name('admin.pdf.barang-laporan');
			Route::get('/pdf/laporan/peminjaman', 'LaporanController@peminjamanPdf')->name('admin.pdf.peminjaman-laporan');
			Route::get('/pdf/laporan/reparasi', 'LaporanController@reparasiPdf')->name('admin.pdf.reparasi-laporan');
			Route::get('/pdf/laporan/mutasi', 'LaporanController@mutasiPdf')->name('admin.pdf.mutasi-laporan');
		});
	});
});