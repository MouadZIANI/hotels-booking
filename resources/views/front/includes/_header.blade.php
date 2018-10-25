<header>
    <div id="top_line">
        <div class="container">
            <ul id="top_links">
                <li><a href="#">En</a></li>
                <li><a href="#">Fr</a></li>
            </ul>
        </div><!-- End container-->
    </div><!-- End top line-->
    
    <div id="top_header">
    	<div class="container">
        	<div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div id="logo">
                    <a href="index.html"><img src="{{ asset('logo.png') }}"></a>
                </div>
            </div>
            <nav class="col-md-8 col-sm-8 col-xs-8">
                <a class="cmn-toggle-switch cmn-toggle-switch__rot  open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <div id="header_menu">
                        <img src="img/logo.png" width="240" height="40" alt="CountryHolidays" data-retina="true">
                    </div>
                    <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                    <ul>
                        <li><a href="{{ route('home') }}">Hotels</a></li>
                        <li><a href="{{ route('contacts') }}">Contact</a></li>
                        <li>
                            @if(Auth::user() and Auth::user()->role == 'client')
                                <a href="{{ route('bookings.index') }}">My Bookings</a>
                            @elseif(Auth::user())
                                <a href="{{ route('bookings.index') }}">Bookings</a>
                            @else
                                <a href="{{ route('login') }}">Login</a>
                            @endif()
                        </li>
                    </ul>
                </div><!-- End main-menu -->
            </nav>
        </div>
        </div>
    </div>
</header><!-- End Header -->