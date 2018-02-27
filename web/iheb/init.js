/*
 * Pet Clinic - HTML5 Template
 *
 * Author: www.matchthemes.com
 *
 */
 
(function($) {
    "use strict";
	
	$(window).load(function(){
	
	$(".petLoading").delay(250).fadeOut({ duration: 750 });

	gallery_load();

});
	
	$('#slides').superslides({
      animation: 'fade',
	  play: 4000
    });
	
	// MENU NAVIGATION
		
	$('.menu-nav li a[href*=#], a.btn-go[href*=#]').click(function() {
			
		var headerH = $('.navbar').height() - 1;
	
        $("html, body").animate({
            scrollTop: $($(this.hash)).offset().top - (headerH + 16)  + "px"
        }, {
            duration: 1000,
            easing: "easeInOutExpo"
        });

        return false;
    });
	
	$(window).scroll(function() {
  if ($(document).scrollTop() > 100) {
    $('.navbar').addClass('nav-shrink');
  } else {
    $('.navbar').removeClass('nav-shrink');
  }
});
	
	// END MENU NAVIGATION

$('.flexslider-testimonials').flexslider({
			animation: "fade",
			slideshow: true,
			slideshowSpeed: 4000,
			animationSpeed: 600, 
			directionNav: false,
			controlNav: true,
			useCSS: false
									
					});

$(".portfolio-img a[data-rel^='prettyPhoto']").prettyPhoto({
						animation_speed: 'normal',
						autoplay_slideshow: true,
						slideshow: 5000
					});
	
$('#myModal').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
$(this).find('.modal-body').html('');
});


})(jQuery);

function gallery_load(){
	"use strict";
	
	// cache container
var portfolioItems = $('#portfolio-items');
// initialize isotope
portfolioItems.isotope({
  itemSelector : '.portfolio-item',
  layoutMode : 'fitRows'
});

// filter items when filter link is clicked
$('#portfolio-filter a').click(function(){
										
	$('#portfolio-filter .current').removeClass('current');
    $(this).addClass('current');
		
  var selector = $(this).attr('data-filter');
  portfolioItems.isotope({ filter: selector });
  return false;
});

}