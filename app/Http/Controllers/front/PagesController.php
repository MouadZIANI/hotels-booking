<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Hotel;
use App\RoomType;
use App\User;
use App\Booking;

class PagesController extends Controller
{
    public function index()
    {
    	$cities = City::all();
    	$hotels = Hotel::where('etat', true)->paginate(9);

    	return view("front.pages.index", compact(['cities', 'hotels'])); 
    }

    public function searcheHotels(Request $request)
    {
        $conditions = array('stars' => $request->stars, 'etat' => 1);
        if(!empty($request->zipCode)) {
            $conditions['zip_code'] = $request->zipCode;
        } 
        if(!empty($request->city)) {
            $conditions['city_id'] = $request->city;
        }
        $hotels = Hotel::select("*")->where($conditions)->paginate(18);

    	return view("front.pages.searche_hotels", compact(['hotels'])); 
    }

    public function getRoomsTypeHotel($id)
    {
    	$hotel = Hotel::find($id);
    	$roomsTypes = RoomType::where('hotel_id', $id)->get();

    	return view("front.pages.room_types", compact(['hotel', 'roomsTypes'])); 
    }

    public function getRoom($id)
    {
    	$room = RoomType::find($id);

    	return view("front.pages.booking_room", compact(['room'])); 
    }

    public function bookingRooms(Request $request)
    {
        $password = time();
    	$client = User::where('email', $request->email_booking)->first();
    	if(!$client) {
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'nbr_rooms' => 'required|numeric',
                'name_booking' => 'required|max:50|min:5',
                'email_booking' => 'required|email|unique:users',
                'tel_booking' => 'required|max:50|min:10'
            ]);

	    	$client = new User;
	    	$client->name = $request->name_booking;
	    	$client->email = $request->email_booking;
	    	$client->password_client = $password;
	    	$client->password = bcrypt($password);
	    	$client->tel = $request->tel_booking;
	    	$client->save();
    	} else {
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'nbr_rooms' => 'required|numeric'
            ]);
        }

    	$booking = new Booking;
    	$booking->client_id = $client->id;
    	$booking->room_type_id = $request->room_type_id;
    	$booking->start_date = $request->start_date;
    	$booking->end_date = $request->end_date;
    	$booking->nbr_rooms = $request->rooms_count;
    	$booking->save();
        $content = 'Your email : ' . $client->email . "\r\n";
        $content = 'Your password : ' . $client->password_client . "\r\n";
        sendMail(['content' => $content, 'to' => $client->email]);
        
    	return redirect(route('get-booking-rooms', ['id' => $request->room_type_id])); 
    }

    public function contacts()
    {
        return view("front.statics.contacts"); 
    }
}
