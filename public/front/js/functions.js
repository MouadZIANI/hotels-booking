/* ==============================================
	Preload
=============================================== */
$(window).load(function() { // makes sure the whole site is loaded
	$('#status').fadeOut(); // will first fade out the loading animation
	$('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
	$('body').delay(350).css({'overflow':'visible'});
})
/* ==============================================
	Sticky nav
=============================================== */
$(window).scroll(function(){
    'use strict';
    if ($(this).scrollTop() > 1){  
        $('header').addClass("sticky");
    }
    else{
        $('header').removeClass("sticky");
    }
});
/* ==============================================
	Menu
=============================================== */
$('a.open_close').on("click",function() {
	 'use strict';
	$('.main-menu').toggleClass('show');
	$('.layer').toggleClass('layer-is-visible');
});
$('a.show-submenu').on("click",function() {
	 'use strict';
	$(this).next().toggleClass("show_normal");
});
$('a.show-submenu-mega').on("click",function() {
	 'use strict';
	$(this).next().toggleClass("show_mega");
});
if($(window).width() <= 480){
	 'use strict';
	$('a.open_close').on("click",function() {
	$('.cmn-toggle-switch').removeClass('active')
});
}

/* ==============================================
	Common
=============================================== */

<!-- Tooltip -->	
$('.tooltip-1').tooltip({html:true});
	
 //accordion	
function toggleChevron(e) {
    $(e.target)
        .prev('.panel-heading')
        .find("i.indicator")
        .toggleClass('icon_plus_alt2 icon_minus_alt2');
}
$('#accordion').on('hidden.bs.collapse shown.bs.collapse', toggleChevron);


/* ==============================================
	Animation on scroll
=============================================== */
new WOW().init();
/* ==============================================
	Video modal dialog + Parallax + Scroll to top  + Hamburger icon
=============================================== */
$(function () {
'use strict';
$('.video').magnificPopup({type:'iframe'});	/* video modal*/
// Image popups
$('.magnific-gallery').each(function() {
	 'use strict';
    $(this).magnificPopup({
        delegate: 'a', 
        type: 'image',
        gallery:{enabled:true}
    });
}); 
/* Hamburger icon*/
var toggles = document.querySelectorAll(".cmn-toggle-switch"); 
  for (var i = toggles.length - 1; i >= 0; i--) {
    var toggle = toggles[i];
    toggleHandler(toggle);
  };
  function toggleHandler(toggle) {
    toggle.addEventListener( "click", function(e) {
      e.preventDefault();
      (this.classList.contains("active") === true) ? this.classList.remove("active") : this.classList.add("active");
    });
  };
  /* Scroll to top*/
  $(window).scroll(function() {
	   'use strict';
		if($(this).scrollTop() != 0) {
			$('#toTop').fadeIn();	
		} else {
			$('#toTop').fadeOut();
		}
	});
	$('#toTop').on("click",function() {
		 'use strict';
		$('body,html').animate({scrollTop:0},500);
	});	
});

<!-- testimonial carousel -->	
$(document).ready(function() {
	 'use strict';
  $('#quote-carousel').carousel({
    pause: true,
    interval: 6000
  });
});
