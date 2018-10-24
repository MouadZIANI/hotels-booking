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
	return view('front.layouts.master');
});

Route::get('/bcrypt/{password}', function ($password) {
	return bcrypt($password);
});





Auth::routes();





Route::group(['middleware' => 'auth'], function () 
{
	Route::get('/bookings', function ()
	{
		return view('backend.bookings.index');
	});
});
