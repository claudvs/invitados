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

Route::get('/', function () {
    return view('login');
});
Route::get('olvidaste_contrasena', function () {
    return view('olividaste_contrasema');
});

Route::resource('log','LogController');
Route::get('logout','LogController@logout');

Route::get('dashboard', ['as' => 'admin', 'uses' => 'AdministradorController@admin']);



Route::resource('evento','EventoController');
Route::resource('relacionador','RelacionadorController');
