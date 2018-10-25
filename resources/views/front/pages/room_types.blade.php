@extends('front.layouts.master')

@section('title') Rooms hotels @stop

@section('css')
    <link href="{{ asset('front/css/slider-pro.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <section class="sub_header" id="bg_room">
        <div class="sub_header_content">
            <div class="animated fadeInDown">
                <h1>Hotel: {{ $hotel->name }}</h1>
            </div>
        </div>
    </section><!-- End Section -->

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#">Home</a></li>
                <li>{{ $hotel->name }}</li>
            </ul>
        </div>
    </div><!-- End Position -->
    
    <div class="container margin_60">
        <div class="row">
            <div class="col-lg-9 col-md-8" id="single_tour_desc">
                <div id="Img_carousel" class="slider-pro">
                    <div class="sp-slides">
                        <div class="sp-slide">
                            @foreach($hotel->hotelsImages as $image)
                                <img alt="" class="sp-image" src="../src/css/images/blank.gif" 
                                data-src="{{ asset($image->image) }}" 
                                data-small="{{ asset($image->image) }}" 
                                data-medium="{{ asset($image->image) }}" 
                                data-large="{{ asset($image->image) }}" 
                                data-retina="{{ asset($image->image) }}">
                            @endforeach()
                        </div>
                    </div>
                    <div class="sp-thumbnails">
                        @foreach($hotel->hotelsImages as $image)
                            <img alt="" class="sp-thumbnail" src="{{ asset($image->image) }}">
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
                        <p>{{ $hotel->description }}</p>
                    </div><!-- End col-md-9  -->
                </div><!-- End row  -->              
            </div><!-- End col-lg-9 -->
            
            <div class="col-lg-3 col-md-4">
                <div class="box_style_1" id="general_facilities">
                    <h3>General infos</h3>
                    <ul>
                        <li><i class="icon_set_1_icon-41"></i>{{ $hotel->city->name . ' - ' . $hotel->zip_code }}</li>
                        <li><i class=" icon_set_1_icon-81"></i>{{ $hotel->stars }} stars</li>
                    </ul>
                </div>
                <div class="box_style_1" id="general_facilities">
                    <h3>Adress</h3>
                    <p>{{ $hotel->adress }}</p>
                </div>
                <div class=" box_style_2">
                    <i class="icon_set_1_icon-90"></i>
                    <h4>Need help? Call us</h4>
                    <a href="tel://{{ $hotel->tel }}" class="phone">{{ $hotel->tel }}</a>
                </div>
            </div><!-- End col-lg-3 -->
        </div><!-- End row -->
    </div><!-- End Container -->
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                @foreach($roomsTypes as $key => $roomType)
                    <div class="strip_all_rooms_list wow fadeIn" data-wow-delay="0.{{ $key }}s">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="img_list">
                                    @if(isset($roomType->roomImages[0]))
                                        <a href="{{ route('get-booking-rooms', ['id' => $roomType->id]) }}"><img src="{{ asset($roomType->roomImages[0]->image) }}" alt=""></a>
                                    @else
                                        <a href="{{ route('get-booking-rooms', ['id' => $roomType->id]) }}"><img src="{{ asset('front/img/room_list_1.jpg') }}" alt=""></a>
                                    @endif()
                                </div>
                            </div>
                            <div class="clearfix visible-xs-block">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="rooms_list_desc">
                                    <br>
                                    <h3><strong>{{ $roomType->name }}</strong></h3>
                                    <br>
                                    <p>{{ substr($hotel->description, 0, 180) }}</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <div class="price_list">
                                    <div>
                                        <sup>$</sup>{{ $roomType->price_per_night }}*<small><br>Per night</small>
                                        <p>
                                            <a href="{{ route('get-booking-rooms', ['id' => $roomType->id]) }}" class="btn_1">Details</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--End strip -->
                @endforeach()
            </div><!-- End col-lg-9 -->
        </div><!-- End row -->
    </div><!-- End Container -->
@endsection

@section('javascripts')
    <script src="{{ asset('front/js/jquery.sliderPro.min.js') }}"></script>
    <script type="text/javascript">
        $( document ).ready(function( $ ) {
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