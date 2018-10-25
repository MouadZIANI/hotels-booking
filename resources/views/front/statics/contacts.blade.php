@extends('front.layouts.master')

@section('title') Hotels bookings @stop

@section('content')
<section class="sub_header" id="bg_room">
    <div class="sub_header_content">
        <div class="animated fadeInDown">
            <h1>Contact us</h1>
        </div>
    </div>
</section><!-- End Section -->

<div class="container margin_60">
	<div class="row">
    	<div class="col-md-8">
        
        <div id="message-contact"></div>
			<form method="post" action="assets/contact.php" id="contactform">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="Enter Name">
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" id="lastname_contact" name="lastname_contact" placeholder="Enter Last Name">
						</div>
					</div>
				</div>
				<!-- End row -->
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label>Email</label>
							<input type="email" id="email_contact" name="email_contact" class="form-control" placeholder="Enter Email">
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label>Phone</label>
							<input type="text" id="phone_contact" name="phone_contact" class="form-control" placeholder="Enter Phone number">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Message</label>
							<textarea id="message_contact" name="message_contact" class="form-control" placeholder="Write your message" style="height:150px;"></textarea>
						</div>
					</div>
				</div>
				<div class="row add_bottom_30">
					<div class="col-md-6">
                    	<div class="form-group">
                            <label>Human verification</label>
                            <input type="text" id="verify_contact" class=" form-control add_bottom_30" placeholder="Are you human? 3 + 1 =">
                        </div>
						<input type="submit" value="Submit" class="btn_1" id="submit-contact">
					</div>
				</div>
			</form>               
        </div><!-- End col-md-8 -->
        
        <div class="col-md-4">
        	<div class="box_style_1">
            	<h3>Contacts</h3>
                <h5>Address</h5>
                <p>Route de Sablet 1023, Marseille<br>France 01923</p>
                <h5>Telephone</h5>
                <p><a href="tel://004542344599">+45 423 445 99</a> / <a href="tel://004542344599">+45 423 445 99</a></p>
                <h5>Email</h5>
                <p><a href="mailto:info@countryholidays.com">info@countryholidays.com</a></p>
                <p>His civibus tacimates ex, an quo nominavi qualisque. In erant dissentiunt vel, dicit legimus docendi an nam. Te congue perfecto eos, aliquid corrumpit ea est, eam petentium repudiandae ad.</p>
            </div>
        </div><!-- End col-md-4 -->
    </div><!-- End row -->
</div><!-- End Container -->
@endsection
