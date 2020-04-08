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
			Route::get('src_add_jurusan', 'SearchController@src_add_jurusan')->name('src_add_jurusan');
			Route::get('src_edit_jurusan', 'SearchController@src_edit_jurusan')->name('src_edit_jurusan');

		Route::resource('ruangan','RuanganController');
			Route::get('src_add_ruangan', 'SearchController@src_add_ruangan')->name('src_add_ruangan');
			Route::get('src_edit_ruangan', 'SearchController@src_edit_ruangan')->name('src_edit_ruangan');
	});
	
	Route::group(['middleware' => 'checkRole:admin,staff'], function()
	{
		Route::resource('barang','BarangController');
			Route::get('src_add_barang', 'SearchController@src_add_barang')->name('src_add_barang');
			Route::get('src_edit_barang', 'SearchController@src_edit_barang')->name('src_edit_barang');
	});
});
	
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('signout', ['as' => 'auth.signout', 'uses' => 'Auth\loginController@signout']);
