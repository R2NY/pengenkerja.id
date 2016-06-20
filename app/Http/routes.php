<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|-----------------
| Front End
|-----------------
*/

Route::get('/', 'PageController@index');

// Pelamar
Route::get('pelamar/daftar', 'PelamarController@register');
Route::post('pelamar/daftar', 'PelamarController@registerProcess');

Route::get('pelamar/login', 'PelamarController@login');
Route::post('pelamar/login', 'PelamarController@loginProcess');
Route::get('pelamar/logout', 'PelamarController@logout');

// Penyedia
Route::get('penyedia/daftar', 'PenyediaController@register');
Route::post('penyedia/daftar', 'PenyediaController@registerProcess');

Route::get('penyedia/login', 'PenyediaController@login');
Route::post('penyedia/login', 'PenyediaController@loginProcess');
Route::get('penyedia/logout', 'PenyediaController@logout');

// Harus login
Route::group(['middleware' => ['pelamar']], function () {
	Route::get('pelamar/showText', 'PelamarController@showText'); // Just trying
});
Route::group(['middleware' => ['penyedia']], function () {
	Route::get('penyedia/dashboard', 'PenyediaController@dashboard');
	// Lowongan
	Route::get('lowongan/tambah', 'LowonganController@create');
	Route::post('lowongan/tambah', 'LowonganController@createProcess');
});

/*
|-----------------
| Back End
|-----------------
*/

Route::auth();

Route::group(['middleware' => ['auth']], function () {
	Route::get('dashboard', 'HomeController@dashboard');

	Route::get('pelamar', 'PelamarController@index');
	Route::get('pelamar/status/{id}', 'PelamarController@changeStatus');
	Route::delete('pelamar/{id}', 'PelamarController@destroy');

	Route::get('penyedia', 'PenyediaController@index');
	Route::get('penyedia/status/{id}', 'PenyediaController@changeStatus');
	Route::delete('penyedia/{id}', 'PenyediaController@destroy');

	Route::get('lowongan', 'LowonganController@index');
	Route::delete('lowongan/{id}', 'LowonganController@destroy');
});