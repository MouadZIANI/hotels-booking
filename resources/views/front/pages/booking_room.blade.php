@extends('front.layouts.master')

@section('title') Rooms hotels @stop

@section('css')
    <link href="{{ asset('front/css/date_time_picker.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/slider-pro.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <section class="sub_header" id="bg_room">
        <div class="sub_header_content">
            <div class="animated fadeInDown">
                <h1>{{ $room->name }} - {{ $room->hotel->name }} </h1>
            </div>
        </div>
    </section><!-- End Section -->

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="{{ route('hotel-rooms', ['id' => $room->hotel_id]) }}">{{ $room->hotel->name }}</a></li>
                <li>{{ $room->name }}</li>
            </ul>
        </div>
    </div><!-- End Position -->
    
    <div class="container margin_60">
        <div class="row">
            <div class="col-md-8" id="single_tour_desc">
                <div id="Img_carousel" class="slider-pro">
                    <div class="sp-slides">
                        <div class="sp-slide">
                            @foreach($room->roomImages as $image)
                                <img alt="" class="sp-image" src="../src/css/images/blank.gif" 
                                data-src="{{ asset('front/img/' . $image->image) }}" 
                                data-small="{{ asset('front/img/' . $image->image) }}" 
                                data-medium="{{ asset('front/img/' . $image->image) }}" 
                                data-large="{{ asset('front/img/' . $image->image) }}" 
                                data-retina="{{ asset('front/img/' . $image->image) }}">
                            @endforeach()
                        </div>
                    </div>
                    <div class="sp-thumbnails">
                        @foreach($room->roomImages as $image)
                            <img alt="" class="sp-thumbnail" src="{{ asset('front/img/' . $image->image) }}">
                        @endforeach()
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <h3>Description</h3>
                    </div>
                    <div class="col-md-9">
                        <p>{{ $room->description }}</p>
                    </div><!-- End col-md-9  -->
                </div><!-- End row  -->              
            </div><!-- End col-lg-9 -->
            
            <div class="col-md-4"><div class="box_style_1" id="book_in">
                <h3>Book this type</h3>
                <div id="message-booking"></div>
                <form role="form" method="post" action="{{ route('post-booking-rooms') }}" autocomplete="off">
                    @csrf
                    <input type="hidden" name="room_type_id" value="{{ $room->id }}">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label>Start date</label>
                               <input class="date-pick form-control" value="{{ old('start_date') }}" data-date-format="yyyy-mm-dd" type="text" id="start_date" name="start_date" placeholder="Start date">
                               <span class="input-icon"><i class=" icon-calendar"></i></span>
                               @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        {{ $errors->first('start_date') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                <label>End date</label>
                               <input class="date-pick form-control" data-date-format="yyyy-mm-dd" type="text" id="end_date" name="end_date" placeholder="Check out">
                               <span class="input-icon"><i class=" icon-calendar"></i></span>
                               @if ($errors->has('end_date'))
                                    <span class="help-block">
                                        {{ $errors->first('end_date') }}
                                    </span>
                                @endif
                           </div>
                        </div>
                    </div><!-- End row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('rooms_count') ? ' has-error' : '' }}">
                                <label>Rooms</label>
                                <div class="qty-buttons">
                                    <input type="button" value="-" class="qtyminus" name="rooms_count">
                                    <input type="text" name="rooms_count" value="1" class="qty form-control" placeholder="0">
                                    <input type="button" value="+" class="qtyplus" name="rooms_count">
                                </div>
                                @if ($errors->has('rooms_count'))
                                    <span class="help-block">
                                        {{ $errors->first('rooms_count') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div><!-- End row -->
                    
                    <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group{{ $errors->has('name_booking') ? ' has-error' : '' }}">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name_booking" @if(Auth::user() and Auth::user()->role == 'client') value="{{ Auth::user()->name }}" disabled @endif() id="name_booking" placeholder="Name and Last name">
                                    @if ($errors->has('name_booking'))
                                        <span class="help-block">
                                            {{ $errors->first('name_booking') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6">
                                <div class="form-group{{ $errors->has('email_booking') ? ' has-error' : '' }}">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email_booking" @if(Auth::user() and Auth::user()->role == 'client') value="{{ Auth::user()->email }}" disabled @endif() id="email_booking" placeholder="Your email">
                                    @if ($errors->has('rooms_count'))
                                        <span class="help-block">
                                            {{ $errors->first('email_booking') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('tel_booking') ? ' has-error' : '' }}">
                                    <label>Tel</label>
                                    <input type="text" class="form-control" name="tel_booking" @if(Auth::user() and Auth::user()->role == 'client') value="{{ Auth::user()->tel }}" disabled @endif() placeholder="Your Phone number">
                                    @if ($errors->has('rooms_count'))
                                        <span class="help-block">
                                            {{ $errors->first('rooms_count') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input type="submit" value="Book now" class="btn_full" id="submit-booking">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- End col-lg-3 -->
        </div><!-- End row -->
    </div><!-- End Container -->
@endsection

@section('javascripts')
    <script src="{{ asset('front/js/jquery.sliderPro.min.js') }}"></script>
    <script src="{{ asset('front/js/quantity-bt.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript">
        $( document ).ready(function( $ ) {
            $('input.date-pick').datepicker();
            $( '#Img_carousel' ).sliderPro({
                width: 960,
                height: 500,
                fade: true,
                arrows: true,
                buttons: false,
                fullScreen: false,
                smallSize: 500,
                startSlide: 0,
                mediumSize: 1000,
                largeSize: 3000,
                thumbnailArrows: true,
                autoplay: false
            });
        });
    </script>
@endsection