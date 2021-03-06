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

Route::get('/', 'IndexController@index');
Route::get('/home','HorarioController@index');

Route::resource('linhas', 'LinhaController');
Route::get('linhas/{id}/horarios','LinhaController@horarios')->name('linhas.horarios');
Route::resource('campi', 'CampusController');
Route::resource('horarios', 'HorarioController');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
