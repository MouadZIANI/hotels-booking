<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html>
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="farm activities, itineraries, farm holidays, country holidays, bed and breakfast, hotel, country hotel" />
    <meta name="description" content="Country Holidays - Premium site template for a country accommodation.">
    <meta name="author" content="Ansonika">
    <title>Country Holidays - Premium site template for a country accommodation.</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- Google web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
   
    <!-- BASE CSS -->
    <link href="{{ asset('front/css/base.css') }}" rel="stylesheet">
    
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('front/css/date_time_picker.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

    <div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>
    <!-- End Preload -->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Start Header -->

    @include('front.includes._header')

    <!-- End Header -->

    <div id="booking_container">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                
                    <div class="intro_title_booking" >
                        <h1 class="animated fadeInDown">Country holidays pleasure</h1>
                        <p class="animated fadeInDown">Rooms / Country Activities / Pleasure</p>
                        <a href="#" class="animated fadeInUp button_intro hidden-xs">View Rooms</a> 
                        <a href="#" class="animated fadeInUp button_intro outline hidden-xs">Activities</a>
                   </div>  
              
                </div>
                <div class="col-md-4">
                    <div id="book">
                    <div id="message-booking"></div>
                    <form role="form" method="post" action="assets/check_avail.php" id="check_avail" autocomplete="off">
                    
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label>Check in</label>
                                   <input class="date-pick form-control" data-date-format="M d, D" type="text" id="check_in" name="check_in" placeholder="Check in">
                                   <span class="input-icon"><i class=" icon-calendar"></i></span>
                                   </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label>Check out</label>
                                   <input class="date-pick form-control" data-date-format="M d, D" type="text" id="check_out" name="check_out" placeholder="Check out">
                                   <span class="input-icon"><i class=" icon-calendar"></i></span>
                               </div>
                            </div>
                        </div><!-- End row -->
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                            <label>Room type</label>
                            <select class="form-control" name="room_type" id="room_type">
                            <option value="">Select room type</option>
                            <option value="Single Room">Single Room</option>
                            <option value="Double Room">Double Room</option>
                            <option value="Luxury Double Room">Luxury Double Room</option>
                            </select>
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
                <div class="col-md-4 col-sm-4">
                    <div class="img_zoom">
                        <a href="room_details.html"><img src="{{ asset('front/img/room_1.jpg') }}" alt="" class="img-responsive"></a>
                    </div>
                    <h3>Single Room <span class="price_home">$90<em>Per night</em></span></h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                    </p>
                    <p>
                        <a href="#" class="btn_1">Read more</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="img_zoom">
                        <a href="room_details.html"><img src="{{ asset('front/img/room_1.jpg') }}" alt="" class="img-responsive"></a>
                    </div>
                    <h3>Single Room <span class="price_home">$90<em>Per night</em></span></h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                    </p>
                    <p>
                        <a href="#" class="btn_1">Read more</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="img_zoom">
                        <a href="room_details.html"><img src="{{ asset('front/img/room_1.jpg') }}" alt="" class="img-responsive"></a>
                    </div>
                    <h3>Single Room <span class="price_home">$90<em>Per night</em></span></h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                    </p>
                    <p>
                        <a href="#" class="btn_1">Read more</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="img_zoom">
                        <a href="room_details.html"><img src="{{ asset('front/img/room_1.jpg') }}" alt="" class="img-responsive"></a>
                    </div>
                    <h3>Single Room <span class="price_home">$90<em>Per night</em></span></h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                    </p>
                    <p>
                        <a href="#" class="btn_1">Read more</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="img_zoom">
                        <a href="room_details.html"><img src="{{ asset('front/img/room_1.jpg') }}" alt="" class="img-responsive"></a>
                    </div>
                    <h3>Single Room <span class="price_home">$90<em>Per night</em></span></h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                    </p>
                    <p>
                        <a href="#" class="btn_1">Read more</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="img_zoom">
                        <a href="room_details.html"><img src="{{ asset('front/img/room_1.jpg') }}" alt="" class="img-responsive"></a>
                    </div>
                    <h3>Single Room <span class="price_home">$90<em>Per night</em></span></h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                    </p>
                    <p>
                        <a href="#" class="btn_1">Read more</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="img_zoom">
                        <a href="room_details.html"><img src="{{ asset('front/img/room_1.jpg') }}" alt="" class="img-responsive"></a>
                    </div>
                    <h3>Single Room <span class="price_home">$90<em>Per night</em></span></h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                    </p>
                    <p>
                        <a href="#" class="btn_1">Read more</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="img_zoom">
                        <a href="room_details.html"><img src="{{ asset('front/img/room_1.jpg') }}" alt="" class="img-responsive"></a>
                    </div>
                    <h3>Single Room <span class="price_home">$90<em>Per night</em></span></h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                    </p>
                    <p>
                        <a href="#" class="btn_1">Read more</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="img_zoom">
                        <a href="room_details.html"><img src="{{ asset('front/img/room_2.jpg') }}" alt="" class="img-responsive"></a>
                    </div>
                    <h3>Double Room <span class="price_home">$120<em>Per night</em></span></h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                    </p>
                    <p>
                        <a href="#" class="btn_1">Read more</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="img_zoom">
                        <a href="room_details.html"><img src="{{ asset('front/img/room_3.jpg') }}" alt="" class="img-responsive"></a>
                    </div>
                    <h3>King double Room <span class="price_home">$140<em>Per night</em></span></h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                    </p>
                    <p>
                        <a href="#" class="btn_1">Read more</a>
                    </p>
                </div>
            </div><!-- End row -->
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
    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-3">
                    <h3>Contacts</h3>
                    <ul id="contact_details_footer">
                        <li>Route de Sablet 1023, Marseille<br>France 01923</li>
                        <li><a href="tel://004542344599">+45 423 445 99</a> / <a href="tel://004542344599">+45 423 445 99</a></li>
                        <li><a href="mailto:info@countryholidays.com">info@countryholidays.com</a></li>
                    </ul>  
                </div>
                <div class="col-md-2 col-sm-2">
                    <h3>About</h3>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Rooms</a></li>
                        <li><a href="#">Activities</a></li>
                        <li><a href="#">Contact us</a></li>
                         <li><a href="#">Gallery</a></li>
                    </ul>
                </div>                
                <div class="col-md-3 col-sm-3">
                    <h3>Change language</h3>
                   <ul>
                        <li><a href="#">English</a></li>
                        <li><a href="#">French</a></li>
                        <li><a href="#">Spanish</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3"  id="newsletter">
                    <h3>Newsletter</h3>
                    <p>Join our newsletter to keep be informed about offers and news.</p>
                    <div id="message-newsletter_2"></div>
                        <form method="post" action="assets/newsletter.php" name="newsletter_2" id="newsletter_2">
                        <div class="form-group">
                            <input name="email_newsletter_2" id="email_newsletter_2"  type="email" value=""  placeholder="Your mail" class="form-control">
                          </div>
                            <input type="submit" value="Subscribe" class="btn_1 white" id="submit-newsletter_2">
                        </form>
                </div>
            </div><!-- End row -->
            <div class="row">
                <div class="col-md-12">
                    <div id="social_footer">
                        <ul>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-google"></i></a></li>
                            <li><a href="#"><i class="icon-instagram"></i></a></li>
                            <li><a href="#"><i class="icon-pinterest"></i></a></li>
                            <li><a href="#"><i class="icon-vimeo"></i></a></li>
                            <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                        </ul>
                        <p>© CountryHolidays 2015</p>
                    </div>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </footer><!-- End footer -->
    
<div id="toTop"></div><!-- Back to top button -->

<!-- Common scripts -->
<script src="{{ asset('front/js/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('front/js/common_scripts_min.js') }}"></script>
<script src="{{ asset('front/js/functions.js') }}"></script>
<script src="{{ asset('front/assets/validate.js') }}"></script>

<!-- Specific scripts -->
<script src="{{ asset('front/js/quantity-bt.js') }}"></script>
<script src="{{ asset('front/js/bootstrap-datepicker.js') }}"></script>
<script>$('input.date-pick').datepicker();</script>

</body>
</html>