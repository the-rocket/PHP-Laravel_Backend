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

Route::get('/', 'PostsController@index')->name('home');
Route::prefix('posts')->group(function() {
	Route::get('{post}', 'PostsController@show')->where('post', '[0-9]+');

	Route::middleware(['auth'])->group(function() {
		Route::get('create', 'PostsController@create');
		Route::post('', 'PostsController@store');
		Route::post('{post}/comments', 'CommentsController@store');
	});
});

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');


