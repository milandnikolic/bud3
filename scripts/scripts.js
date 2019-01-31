(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		$(document).ready(function(){
			
			//sticky scroll
			/*$('.home-archive-container .sticky-scroll').stickySidebar({
				topSpacing: 220,
				bottomSpacing: 20,
			//	containerSelector: '.sticky-scroll',
				
			});*/
			//sticky scroll
			$('.sticky-scroll').stickySidebar({
				topSpacing: 220,
				bottomSpacing: 20,
			//	containerSelector: '.sticky-scroll',
				
			});
/*			$('.izdvajamo .sticky-scroll').stickySidebar({
				topSpacing: 20,
				bottomSpacing: 20,
				containerSelector: '.izdvajamo',
				
			});			
			$('.news-section .sticky-scroll').stickySidebar({
				topSpacing: 20,
				bottomSpacing: 20,
				containerSelector: '.news-section',
				
			});*/
			/*$(".sticky-scroll").stick_in_parent({
				offset_top: 50,
			});*/
			
			$('.sticky-scroll-short').stickySidebar({
				topSpacing: 77,
				bottomSpacing: 10
			});
			
			$('ul.tabs li').click(function(){
				var tab_id = $(this).attr('data-tab');

				$('ul.tabs li').removeClass('current');
				$('.tab-content').removeClass('current');

				$(this).addClass('current');
				$("#"+tab_id).addClass('current');
			});
			
			$('ul li.tab2').click(function(){
				$('.tabs-wrapper').addClass('tab2-active');
			});
			
			$('ul li.tab1').click(function(){
				$('.tabs-wrapper').removeClass('tab2-active');
			});
			
			
			//open mobile sidebar
			  $('.fa-bars').on('click', function() {
				$(this).css({
				  'opacity': '0',
				  'transition': 'all .2s ease-out'
				});
				$('.side-nav').css({
				 // 'width': '200px',
					'left': '0'
				});
				 $('.side-nav-bg').css({
				  'width': '100%'
				});

			  });
			

			
			// close mobile side nav if click outside div
			$('.side-nav-bg').click(function(e){
			if ( e.target !== this ) {
				return;
			} 
				$('.side-nav').css({
				 // 'width': '0',
				  'left': '-70%'
				});
				$('.side-nav-bg').css({
				  'width': '0',				
				});

				$('.fa-bars').css({
				  'opacity': '1',
				  'transition': 'all .2s ease-in'
				});
			
		  
			});
			
			
			
			$('.side-nav .menu-item-has-children').click(function(e){
			//	e.preventDefault();
				$(this).toggleClass('menu-open');
				$(this).find('.sub-menu').slideToggle('slow', 'swing');
					  
			});
			
			
			
			
			
			//bottom to top
			$(window).scroll(function() {
				if ($(this).scrollTop() >= 400) {        
					$('#return-to-top').fadeIn(200);    
				} else {
					$('#return-to-top').fadeOut(200);   
				}
			});
			$('#return-to-top').click(function() {      
				$('body,html').animate({
					scrollTop : 0                      
				}, 500);
			});
			
			
			//create sticky nav
			$(window).scroll(function() {

				if ($(this).scrollTop() > 50){  
					$('.main-navigation, .main-body, .mobile-header').addClass("sticky");
				}
				else{
					$('.main-navigation, .main-body, .mobile-header').removeClass("sticky");
				}
			});
			
			/*SEARCH FORM MANIPULATION*/
            $('.br-search-field .search-submit .fa-search').on('click',function(e){
                var searchContainer=$(this).closest('.br-search-field');
                var inputField=searchContainer.find('.search-input');
                if(!searchContainer.hasClass('active')){
                    e.preventDefault();
                    searchContainer.addClass('active');
                    inputField.focus();
					//$('.header-search .search').append('<span class="close-search"><i class="fas fa-times"></i></span>');
                }
                else{
                    searchContainer.find('form').submit();
                    searchContainer.removeClass('active');
                }
            });
			
		/*	$('.close-search').on('click',function(){
				console.log('alo be');
				$(this).remove();
				$('.br-search-field').removeClass('active');
            });*/
			
            $('body').on('click',function(e){
                if($('.br-search-field').hasClass('active') && !$(e.target).closest('.search').length){
                    $('.br-search-field').removeClass('active');
                }
            });
			
			
			$(".comment-form-author input").attr("placeholder", "Ime i prezime *");
			$(".comment-form-email input").attr("placeholder", "E-mail*");
			$(".comment-form-comment textarea").attr("placeholder", "Tekst poruke");
			$('h3#reply-title').text('KOMENTAR');
			$('.comment-content-wrapper .reply a').text('ODGOVORI');
			$('p.form-submit input#submit').val('POŠALJI');
			$('p.comment-notes').text('Označena polja sa zvezdicom su obavezna da se popune. Vaša e-mail adresa neće biti objavljena.');
			$("p.form-submit").detach().appendTo('p.comment-notes');
/*			$('.comments #respond > form p.form-submit').click(function(){
				$('.comments #respond > form #submit').click();
				console.log('alo be');
			});*/
			//$("<div class='com-body'>").appendTo('.comment-author.vcard');



		});//ready
	});
	
})(jQuery, this);
