<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Booking;
use App\Hotel;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth_user = Auth::user();
        if($auth_user->role == 'hoteler') {
            $bookings = Booking::all();
            $clients = array();
            $clients_ids = array();
            foreach ($bookings as $key => $booking) {
                if($booking->roomType->hotel_id == $auth_user->hotel_id) {
                    if(!in_array($booking->user->id, $clients_ids)) {
                        $clients[] = $booking->user;
                        $clients_ids[] = $booking->user->id;
                    }
                }
            }

            return view('backend.clients.index', compact('clients'));
        } elseif($auth_user->role == 'admin') {
            $clients = User::where('role', 'client')->get();

            return view('backend.clients.index', compact('clients'));
        } else {
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
