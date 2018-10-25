@extends('backend.layouts.master')

@section('title') Reservations @stop

@section('css')
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  	<link rel="stylesheet" href="/resources/demos/style.css">

@endsection

@section('content')

    <section class="content-header">
        <h1>All bookings</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/') }}" class="btn bg-orange-active"> <i class="ion ion-person-add"></i> new booking</a>
            </li>
        </ol>
    </section>

    <section class="content" id="app">
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> <i class="ion ion-person-stalker"></i>&nbsp;Bookings</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="box-body table-responcive">
                <div class="">
                    <table class="table table-hover table-striped table-bordered dataTable">
                        <thead>
                            <tr style="min-width: 100px !important;">
                                <th>#</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>Rooms</th>
                                <th>Room type</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Booking date</th>
                                <th style="width: 100px;">Status actions</th>
                                <th style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                                <tr style="min-width: 100px !important;">
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ dateToFrFormat($booking->start_date) }}</td>
                                    <td>{{ dateToFrFormat($booking->end_date) }}</td>
                                    <td>{{ $booking->nbr_rooms }}</td>
                                    <td>{{ $booking->roomType->name }}</td>
                                    <td>{{ numberToPriceFormat($booking->roomType->price_per_night * $booking->nbr_rooms) }}</td>
                                    <td>
                                        @if($booking->etat == 0)
                                            <span class="badge bg-blue">Active</span>
                                        @elseif($booking->etat == 1)
                                            <span class="badge bg-green">Valide</span>
                                        @else
                                            <span class="badge bg-red">Canceled</span>
                                        @endif()
                                    </td>
                                    <td>{{ dateToFrFormat($booking->created_at) }}</td>
                                    <td>
                                        @if($booking->etat == -1)
                                            <a href="{{ route('booking.activate', ['id' => $booking->id]) }}" class="btn btn-primary btn-xs btn-flat">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        @elseif($booking->etat == 0)
                                            <a href="{{ route('booking.validate', ['id' => $booking->id]) }}" class="btn btn-success btn-xs btn-flat">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <a href="{{ route('booking.cancel', ['id' => $booking->id]) }}" class="btn bg-orange-active btn-xs btn-flat">
                                                <i class="fa fa-minus-circle"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('booking.cancel', ['id' => $booking->id]) }}" class="btn bg-orange-active btn-xs btn-flat">
                                                <i class="fa fa-minus-circle"></i>
                                            </a>
                                        @endif()
                                    </td>
                                    <td>
                                        <a href="{{ route('bookings.edit', ['id' => $booking->id]) }}" class="btn btn-info btn-xs btn-flat">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form style="display: inline-block;" action="{{ route('bookings.destroy', ['id' => $booking->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
