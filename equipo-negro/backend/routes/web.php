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
    return view('frontendvue');
    //vue js de Leo Gonzales Desarrollador IU Frontend
});
Route::get('getPuntos','ResultadosController@vuejsonindex');


Route::get('/resultados','ResultadosController@resultados');


Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
  if(\Auth::user() == null){
    return view('welcome');
  }
});

Route::get('/usuarios', function () {

    return view('welcome');

});

Route::get('articulosresapi','SoapController@articulos');

Route::resource('resultados','ResultadosController');

Route::group(['middleware' => ['auth']], function () {
  Route::get('/resultado', function () {
      return view('welcome');
  });
});

Route::resource('users','UsersController');

Route::get('/home', 'HomeController@index');

Route::get('auth',function(){
  var_dump(\Auth::user());
});

Route::post('register','UserController@register');
Route::post('login','UserController@login');
// Route::get('logout','UserController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index');
