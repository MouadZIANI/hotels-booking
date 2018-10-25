@extends('front.layouts.master')

@section('title') Hotels bookings @stop

@section('content')
    <div id="booking_container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="book">
                        <div id="message-booking"></div>
                        <form role="form" method="post" action="{{ route('searche-hotels') }}" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Ville</label>
                                        <select class="form-control" name="city">
                                            <option value="null">-- Select city --</option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach()
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Code posal</label>
                                        <input class="form-control" type="text" name="zipCode" placeholder="Code postal">
                                   </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nobre d'etoiles</label>
                                        <select class="form-control" name="stars">
                                            <option value="1">1 etoile</option>
                                            <option value="2">2 etoile</option>
                                            <option value="3">3 etoile</option>
                                            <option value="4">4 etoile</option>
                                            <option value="5">5 etoile</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button class="btn_full btn__full btn-block" type="submit">Chercher</button>
                                   </div>
                                </div>
                            </div><!-- End row -->
                        </form>
                    </div>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
        <div id="general_decor"></div>
    </div><!-- End Booking container -->

    <div class="container margin_60 padd_bottom_20">
        <div class="main_title">
            <span></span>
            <h2>We love Country Holidays</h2>
            <p>
                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium.
            </p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="box_home">
                    <i class="icon_set_2_icon-104"></i>
                    <h3>Cozy and Charming rooms</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box_home">
                    <i class="icon_set_2_icon-108"></i>
                    <h3>Relax in a beautiful contest</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box_home">
                    <i class="icon_set_1_icon-40"></i>
                    <h3>Enjoy country side activities</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                    </p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    <div class="bg_gray">
        <div class="container">
            <div class="row">
                @foreach($hotels as $hotel)
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
                @endforeach()
            </div><!-- End row -->
            <div class="text-center">
                {{ $hotels->links() }}
            </div>
        </div><!-- End container -->
    </div>
        
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 nopadding">
                <div class="features-bg">
                    <div class="features-img">
                    </div>
                </div>
            </div>
            <div class="col-md-6 nopadding">
                <div class="features-content">
                    <h3>"Enjoy spectacular countryside"</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                    </p>
                    <p>
                        <a href="#" class=" btn_1 white">Read more</a>
                    </p>
                </div>
            </div>
        </div>
    </div><!-- End container-fluid  -->
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
