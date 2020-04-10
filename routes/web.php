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

Route::group(['middleware' => 'auth'], function()
{
	Route::group(['middleware' => 'checkRole:admin'], function()
	{
		Route::resource('fakultas','FakultasController');

		Route::resource('jurusan','JurusanController');
			Route::get('src_jurusan', 'SearchController@src_jurusan')->name('src_jurusan');

		Route::resource('ruangan','RuanganController');
			Route::get('src_ruangan', 'SearchController@src_ruangan')->name('src_ruangan');
	});
	
	Route::group(['middleware' => 'checkRole:admin,staff'], function()
	{
		Route::resource('barang','BarangController');
			Route::get('src_barang', 'SearchController@src_barang')->name('src_barang');
	});
});
	
Auth::routes();

Route::get('signout', ['as' => 'auth.signout', 'uses' => 'Auth\loginController@signout']);
