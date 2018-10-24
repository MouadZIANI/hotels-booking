/* <![CDATA[ */

// Jquery validate form booking form home
jQuery(document).ready(function(){

	$('#check_avail').submit(function(){
	'use strict';
		var action = $(this).attr('action');

		$("#message-booking").slideUp(750,function() {
		$('#message-booking').hide();

 		$('#submit-booking')
			.after('<i class="icon-spin4 animate-spin loader"></i>')
			.attr('disabled','disabled');
			
		$.post(action, {
			check_in: $('#check_in').val(),
			check_out: $('#check_out').val(),
			adults: $('#adults').val(),
			children: $('#children').val(),
			room_type: $('#room_type').val(),
			name_booking: $('#name_booking').val(),
			email_booking: $('#email_booking').val()
		},
			function(data){
				document.getElementById('message-booking').innerHTML = data;
				$('#message-booking').slideDown('slow');
				$('#check_avail .loader').fadeOut('slow',function(){$(this).remove()});
				$('#submit-booking').removeAttr('disabled');
				if(data.match('success') != null) $('#check_avail').slideUp('slow');

			}
		);

		});

		return false;

	});
});

/// Jquery validate newsletter
jQuery(document).ready(function(){

	$('#newsletter_2').submit(function(){

		var action = $(this).attr('action');

		$("#message-newsletter_2").slideUp(750,function() {
		$('#message-newsletter_2').hide();
		
		$('#submit-newsletter_2')
			.after('<i class="icon-spin4 animate-spin loader"></i>')
			.attr('disabled','disabled');

		$.post(action, {
			email_newsletter_2: $('#email_newsletter_2').val()
		},
			function(data){
				document.getElementById('message-newsletter_2').innerHTML = data;
				$('#message-newsletter_2').slideDown('slow');
				$('#newsletter_2 .loader').fadeOut('slow',function(){$(this).remove()});
				$('#submit-newsletter_2').removeAttr('disabled');
				if(data.match('success') != null) $('#newsletter_2').slideUp('slow');

			}
		);

		});

		return false;

	});

});
// Jquery validate form contact
jQuery(document).ready(function(){

	$('#contactform').submit(function(){
	'use strict';
		var action = $(this).attr('action');

		$("#message-contact").slideUp(750,function() {
		$('#message-contact').hide();

 		$('#submit-contact')
			.after('<i class="icon-spin4 animate-spin loader"></i>')
			.attr('disabled','disabled');
			
		$.post(action, {
			name_contact: $('#name_contact').val(),
			lastname_contact: $('#lastname_contact').val(),
			email_contact: $('#email_contact').val(),
			phone_contact: $('#phone_contact').val(),
			message_contact: $('#message_contact').val(),
			verify_contact: $('#verify_contact').val()
		},
			function(data){
				document.getElementById('message-contact').innerHTML = data;
				$('#message-contact').slideDown('slow');
				$('#contactform .loader').fadeOut('slow',function(){$(this).remove()});
				$('#submit-contact').removeAttr('disabled');
				if(data.match('success') != null) $('#contactform').slideUp('slow');

			}
		);

		});

		return false;

	});
});

/// Jquery validate review
jQuery(document).ready(function(){

	$('#review').submit(function(){

		var action = $(this).attr('action');

		$("#message-review").slideUp(750,function() {
		$('#message-review').hide();
		
		$('#submit-review')
			.after('<i class="icon-spin4 animate-spin loader"></i>')
			.attr('disabled','disabled');

		$.post(action, {
			name_review: $('#name_review').val(),
			lastname_review: $('#lastname_review').val(),
			email_review: $('#email_review').val(),
			room_type_review: $('#room_type_review').val(),
			position_review: $('#position_review').val(),
			comfort_review: $('#comfort_review').val(),
			price_review: $('#price_review').val(),
			quality_review: $('#quality_review').val(),
			review_text: $('#review_text').val(),
			verify_review: $('#verify_review').val()
		},
		
			function(data){
				document.getElementById('message-review').innerHTML = data;
				$('#message-review').slideDown('slow');
				$('#review .loader').fadeOut('slow',function(){$(this).remove()});
				$('#submit-review').removeAttr('disabled');
				if(data.match('success') != null) $('#review').slideUp('slow');

			}
		);

		});

		return false;

	});

});
  /* ]]> */