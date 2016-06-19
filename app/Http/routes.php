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
Route::get('pelamar/daftar', 'PelamarController@register');
Route::post('pelamar/daftar', 'PelamarController@registerProcess');

Route::get('pelamar/login', 'PelamarController@login');
Route::post('pelamar/login', 'PelamarController@loginProcess');

/*
|-----------------
| Back End
|-----------------
*/

Route::get('pelamar', 'PelamarController@index');
Route::get('penyedia', 'PenyediaController@index');
Route::delete('penyedia/{id}', 'PenyediaController@destroy');
Route::auth();

Route::get('/home', 'HomeController@index');
