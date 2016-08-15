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
	return view('welcome');
});

Route::get('contact', 'pagesController@contact');
Route::post('contact', 'pagesController@contactStore');
Route::get('about', 'pagesController@about');

// Route::get('articles', 'articlesController@index');
// Route::get('articles/create', 'articlesController@create');
// Route::get('articles/{id}', 'articlesController@show');
// Route::post('articles', 'articlesController@store');
// Route::get('articles/{id}/edit','articlesController@edit')
Route::resource('articles', 'articlesController');

Route::controllers([
	'auth'     => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
// Login routes...
// Route::get('auth/login', 'Auth\AuthController@getLogin');
// Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
// Route::get('auth/register', 'Auth\AuthController@getRegister');
// Route::post('auth/register', 'Auth\AuthController@postRegister');