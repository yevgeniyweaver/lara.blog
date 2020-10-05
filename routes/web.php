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


Route::get('/admin', 'ObjectsController@index')->name('admin.start');

Route::post('/admin/create', 'ObjectsController@create')->name('create');

Route::get('/admin/form', 'ObjectsController@form')->name('form.new');

Route::get('/admin/edit/{id}', 'ObjectsController@edit')->where('id','[0-9]+')->name('edit');

Route::get('/admin/delete/{id}', 'ObjectsController@delete')->where('id','[0-9]+')->name('delete');

Route::post('/admin/update', 'ObjectsController@update')->name('update');
//Route::post('/ajax/getobjinfo','AjaxController@clear' )->name('getObjInfo');
Route::get('/admin/show/{id}', 'ObjectsController@show')->where('id','[0-9]+');

Route::get('/admin/show', 'ObjectsController@showAll');

Route::get('/admin/find', 'ObjectsController@find')->name('find');

//Route::get('/admin/user', 'UserController@show')->name('user.show');

Auth::routes();

// Маршруты аутентификации...
//Route::get('auth/login', 'Auth\AuthController@getLogin');
//Route::post('auth/login', 'Auth\AuthController@postLogin');
//Route::get('auth/logout', 'Auth\AuthController@getLogout');
//
//// Маршруты регистрации...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/home', 'HomeController@index')->name('home');


