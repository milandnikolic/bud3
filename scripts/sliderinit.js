(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';

	    $('.slider').on('init', function(e, slick) {
	        var $firstAnimatingElements = $('div.hero-slide:first-child').find('[data-animation]');
	        doAnimations($firstAnimatingElements);    
	    });
	    $('.slider').on('beforeChange', function(e, slick, currentSlide, nextSlide) {
	              var $animatingElements = $('div.slide-item[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
	              doAnimations($animatingElements);    
	    });
	    $('.slider').slick({
	       autoplay: true,
	       autoplaySpeed: 4000,
	       dots: true,
	       fade: true,
	       infinite: true,
	       arrows: true,
	       speed: 500,
	      // appendDots:$('.slider-container .slide-item .container')
       	 //  cssEase: 'linear',
           //lazyLoad: 'ondemand',
        //   lazyLoadBuffer: 0,
	   //    prevArrow: ".slider  .fa-long-arrow-alt-left",
		//   nextArrow: ".slider  .fa-long-arrow-alt-right"
	    });
		$('#home-slider .slick-dots li:nth-child(1) button').html('B');
		$('#home-slider .slick-dots li:nth-child(2) button').html('U');
		$('#home-slider .slick-dots li:nth-child(3) button').html('D');
	    $('#home-slider .slick-dots li:nth-child(4) button').html('3');
	    function doAnimations(elements) {
	        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
	        elements.each(function() {
	            var $this = $(this);
	            var $animationDelay = $this.data('delay');
	            var $animationType = 'animated ' + $this.data('animation');
	            $this.css({
	                'animation-delay': $animationDelay,
	                '-webkit-animation-delay': $animationDelay
	            });
	            $this.addClass($animationType).one(animationEndEvents, function() {
	                $this.removeClass($animationType);
	            });
	        });
	    }


/*
	   $('.related-slider').slick({
				slidesToShow: 2,
		  		slidesToScroll: 1,
			    autoplay: false,
//autoplaySpeed: 4000,
			    infinite:true,
			   // dots: false,
			   // fade: true,
			    prevArrow: '<span class="arrow-left"></span>',
				nextArrow: '<span class="arrow-right"></span>',
				  responsive: [
			    {
			      breakpoint: 768,
			      settings: {
			        arrows: true,
			       // centerMode: true,
			        slidesToShow: 1
			      }
			    },

			  ]
			});*/
		
		$('.friends-slider').slick({
				slidesToShow: 4,
		  		slidesToScroll: 1,
			    autoplay: true,
			    autoplaySpeed: 4000,
			    infinite:true,
			   // dots: false,
			   // fade: true,
			    prevArrow: '<i class="fas fa-chevron-left"></i>',
				nextArrow: '<i class="fas fa-chevron-right"></i>',
				  responsive: [
			    {
			      breakpoint: 768,
			      settings: {
			        arrows: false,
			        centerMode: true,
			        slidesToShow: 2
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        arrows: false,
			        centerMode: true,
			        slidesToShow: 1
			      }
			    }
			  ]
			});


	});
	
})(jQuery, this);