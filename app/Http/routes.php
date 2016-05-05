
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
    return view('main');
});


Route::get('coba2','HomeController@get');
Route::get('daftar','HomeController@daftar');
Route::get('login','HomeController@login');
Route::post('formlogin','HomeController@loginform');
Route::get('dashboard','HomeController@dashboard');
Route::get('profile','HomeController@profil');
Route::post('register','HomeController@register');
Route::get('logout','HomeController@logout');
Route::post('updatedata','HomeController@update');
Route::get('editdokumen/{id}','HomeController@edit');
Route::post('savefile','HomeController@save');
Route::get('xx','HomeController@getdatafile');
Route::post('updatekonten','HomeController@updatekonten');