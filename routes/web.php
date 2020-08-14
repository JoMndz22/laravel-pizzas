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


Route::get('/', 'HomeController@getHome');

//INGREDIENTES
Route::resource('/ingredientes', 'IngredientesBladeController');

//sucursales
Route::resource('/sucursales', 'SucursalesBladeController');


Route::get('/crea-tu-pizza', 'CreaPizzaController@index');





//----------------------------------

Route::post('/send-register','UserController@register');
Auth::routes();

