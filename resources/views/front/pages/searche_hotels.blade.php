@extends('front.layouts.master')

@section('title') Rooms hotels @stop

@section('css')
    <link href="{{ asset('front/css/slider-pro.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <section class="sub_header" id="bg_room">
        <div class="sub_header_content">
            <div class="animated fadeInDown">
                <h1>Result Hotel</h1>
            </div>
        </div>
    </section><!-- End Section -->

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#">Home</a></li>
                <li>hotels</li>
            </ul>
        </div>
    </div><!-- End Position -->
    <div class="bg_gray">
        <div class="container">
            <div class="row">
                @forelse($hotels as $hotel)
                    <div class="col-lg-4">
                        <section class="box_cat_wp">
                        <div class="box_cat cat-hover">
                            <a href="{{ route('hotel-rooms', ['id' => $hotel->id]) }}" class="cat-overlay">
                            <h2>{{ $hotel->name }} <span class="pull-right">{{ $hotel->stars }}<i class="icon-star-1"></i></span></h2>
                            <p>{{ $hotel->description }}</p>
                            <span class="box_cat_bt">Read more</span>
                            </a>
                            <div class="cat-img">
                                <img src="{{ asset('front/img/room_1.jpg') }}" alt="">
                            </div>
                        </div>
                        </section>
                    </div>
                @empty
                    <h1 class="text-center">No Hotel Found</h1>
                @endforelse
            </div><!-- End row -->
        </div><!-- End container -->
    </div>
@endsection

@section('javascripts')
    <script src="{{ asset('front/js/quantity-bt.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap-datepicker.js') }}"></script>
    <script>$('input.date-pick').datepicker();</script>
    <!-- Specifi scripts -->
    <script src="{{ asset('front/js/mosaic.1.0.1.js') }}"></script>
    <script type="text/javascript">
            jQuery(function ($) {
                $('.cat-hover').mosaic({
                    animation: 'slide'      //fade or slide
                });
            });
    </script>
@endsection