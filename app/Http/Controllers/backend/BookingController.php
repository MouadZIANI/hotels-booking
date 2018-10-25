<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Booking;
use App\Hotel;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth_user = Auth::user();
        if($auth_user->role == 'client') {
            $bookings = Booking::where('client_id', $auth_user->id)->get();
            return view('backend.bookings.bookings_client', compact('bookings'));
        } elseif($auth_user->role == 'hoteler') {
            $rooms_types = Hotel::find($auth_user->hotel_id)->roomTypes;
            $bookings = array();
            foreach ($rooms_types as $key => $room) {
                foreach ($room->bookings as $booking) {
                    $bookings[] = $booking;
                }
            }
            return view('backend.bookings.bookings_manager', compact('bookings'));
        } else {
            $bookings = Booking::all();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect(route('bookings.index'));
    }

    public function activateBooking($id)
    {
        $booking = Booking::find($id);
        $booking->etat = 0;
        $booking->save();
        return redirect(route('bookings.index'));
    }

    public function validateBooking($id)
    {
        $booking = Booking::find($id);
        $booking->etat = 1;
        $booking->save();
        return redirect(route('bookings.index'));
    }

    public function cancelBooking($id)
    {
        $booking = Booking::find($id);
        $booking->etat = -1;
        $booking->save();
        return redirect(route('bookings.index'));
    }
}
