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
    <title>@yield('title')</title>

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
    @yield('css')

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

    <!-- Start Content -->

    @yield('content')

    <!-- End Content -->        
    
    <!-- Start Footer -->

    @include('front.includes._footer')

    <!-- End Footer -->
    
<div id="toTop"></div><!-- Back to top button -->

<!-- Common scripts -->
<script src="{{ asset('front/js/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('front/js/common_scripts_min.js') }}"></script>
<script src="{{ asset('front/js/functions.js') }}"></script>
<script src="{{ asset('front/assets/validate.js') }}"></script>

<!-- Specific scripts -->
@yield('javascripts')

</body>
</html>