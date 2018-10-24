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


Route::get('/bcrypt/{password}', function ($password) {
	return bcrypt($password);
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () 
{
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/posts', 'PostController@index')->name('posts');
	Route::get('/prefrred_posts', 'LikedPostController@index')->name('prefrred_posts');
	
	Route::post('/posts/like', 'PostController@like');
	Route::post('/posts/dislike', 'PostController@dislike');

	Route::get('/getAllPosts', 'PostController@getAllPosts');
	Route::get('/getPreferredPosts', 'LikedPostController@getPreferredPosts');

	Route::delete('/remove_preffered_post/{$id}', 'LikedPostController@destroy');
});
