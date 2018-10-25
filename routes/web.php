<?php
use App\Hotel;
use App\RoomType;

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

// Front routes
// Get
Route::get('/', 'front\PagesController@index')->name('home');
Route::get('/hotels/{id}/rooms-types', 'front\PagesController@getRoomsTypeHotel')->name('hotel-rooms');
Route::get('/rooms/{id}', 'front\PagesController@getRoom')->name('get-booking-rooms');
// Post
Route::post('/search-hotels', 'front\PagesController@searcheHotels')->name('searche-hotels');
Route::post('/booking', 'front\PagesController@bookingRooms')->name('post-booking-rooms');

// Statcs routes
Route::get('/contacts', 'front\PagesController@contacts')->name('contacts');


Route::get('/bcrypt/{password}', function ($password)
{
	return bcrypt($password);
});

// Auth routes
Auth::routes();

Route::get('/insert', function () {
	$rooms = RoomType::all();
	foreach ($rooms as $key => $room) {
		for ($i=4; $i >= 1; $i--) { 
			DB::table('room_images')->insert(
			    ['image' => "front/images/rooms/" . $i . ".jpg", 'room_type_id' => $room->id, 'created_at' => '2018-10-25 20:35:03', 'updated_at' => '2018-10-25 20:35:03']
			);
		}
	}
	
});

// Backend routes
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
	//Route::resource('admins', 'backend\AdminController');
	Route::resource('clients', 'backend\ClientController');
	Route::resource('hotelers', 'backend\HotelerController');
	//Route::resource('hotels', 'backend\HotelController');
	Route::resource('room-types', 'backend\RoomTypeController');
	Route::resource('rooms', 'backend\RoomController');
	Route::resource('bookings', 'backend\BookingController');
	Route::resource('cities', 'backend\CityController');
	
	// Specific route of role
	// shared
	Route::get('/booking/{id}/activate', 'backend\BookingController@activateBooking')->name('booking.activate');
	Route::get('/booking/{id}/cancel', 'backend\BookingController@cancelBooking')->name('booking.cancel');

	// Hoteler
	Route::get('/booking/{id}/validate', 'backend\BookingController@validateBooking')->name('booking.validate');
});