(function($) {
	var initAll = {

		init: function() {
			this.navMenu();
			this.scrollTop();
			this.toggledMenu1();
			this.stickyMenu();
			this.navSearch();
			this.homepageSlider();
		},

		homepageSlider: function() {
			
			$('.owl-carousel').owlCarousel({
				rtl:true,
				loop:true,
				margin:0,
				nav:true,
				responsive:{
					0:{
						items:1
					},
					600:{
						items:1
					},
					1000:{
						items:1
					}
				}
			});

			$('#banner-slider .owl-carousel').append('<div class="slider-bottom-path"></div>');

		},

		stickyMenu: function() {
			var self = this;

			if ( $('#sticky').length ) {

				$(window).scroll(function() {
					self.stickThatMenu();
				});
				$(window).resize(function() {
					self.stickThatMenu();
				});
			}
		},

		stickThatMenu: function() {
			var scrollTop = $(window).scrollTop();
			var menuHeight = $('#site-navigation').outerHeight();
			
			if( scrollTop > menuHeight ) {
				$('#sticky').addClass('sticky-nav');
			} else {
				$('#sticky').removeClass('sticky-nav');
			}
		},


		/**
		 * Menu Toggle
		 * 
		 * @return void
		 */
		navMenu: function() {
			$('<span class="sub-arrow"><i class="fa fa-angle-down"></i></span>').insertAfter( $('.menu-item-has-children > a') );

			$('.menu-item-has-children .sub-arrow').click(function(e) {
				e.preventDefault();
				e.stopPropagation();

				var subMenuOpen = $(this).hasClass('sub-menu-open');
				
				if ( subMenuOpen ) {
					
					$(this).removeClass('sub-menu-open');
					$(this).find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
					$(this).next('ul.sub-menu, ul.children').removeClass('active').slideUp();
				
				} else {
					
					$(this).addClass('sub-menu-open');
					$(this).find('i').removeClass('fa-angle-down').addClass('fa-angle-up');
					$(this).next('ul.sub-menu, ul.children').addClass('active').slideDown();

				}

			});

		},


		/**
		 * Menu Toggle
		 * 
		 * @return void
		 */

		toggledMenu1: function() {
			var $primary_menu = $('#primary-navigation');

			$('.sub-menu').parent().append('<span class="arrow-menu"><i class="fa fa-chevron-down"></i></span>');

			if ( $primary_menu.length === 0 ) {
				return;
			}

			$primary_menu.clone().wrap('<div id="mobile-menu-wrapper" class="mobile-only"></div>').parent()
			.appendTo('body');

			$('#mobile-menu-wrapper').prepend('<div class="menu-toggle-close"><span class="search-close">🡢<span/></div>');

			$('.menu-toggle').click(function(e) {
				e.preventDefault();
				e.stopPropagation();
				$('#mobile-menu-wrapper').show(); // only required once
				$('body').toggleClass('mobile-menu-active');
			});

			$('#page, #lightbox, .menu-toggle-close').click(function() {
				if ($('body').hasClass('mobile-menu-active')) {
					$('body').removeClass('mobile-menu-active');
				}
			});

			if( $('#wpadminbar').length ) {
				$('#mobile-menu-wrapper').addClass('wpadminbar-active');
			}


			$('.arrow-menu').on('click', function(e) {
				
				e.preventDefault();
				e.stopPropagation();

				var subMenuOpen = $(this).hasClass('sub-menu-open');

				if ( subMenuOpen ) {
					$(this).removeClass('sub-menu-open');
					$(this).find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
					$(this).prev('ul.sub-menu').slideUp();
				} else {
					$(this).prev('ul.sub-menu').slideDown();
					$(this).addClass('sub-menu-open');
					$(this).find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
				}

			});

		},


		toggledMenu: function() {
			var $primary_menu = $('#primary-navigation');

			$('.sub-menu').parent().append('<span class="arrow-menu"><i class="fa fa-chevron-down"></i></span>');

			if ( $primary_menu.length === 0 ) {
				return;
			}

			$primary_menu.clone().wrap('<div id="mobile-menu-wrapper" class="mobile-only"></div>').parent()
			.appendTo('body');

			$('#mobile-menu-wrapper').prepend('<div class="menu-toggle-close"><i class="fas fa-times search-close"><i/></div>');

			$('.menu-toggle').click(function(e) {
				e.preventDefault();
				e.stopPropagation();
				$('#mobile-menu-wrapper').show(); // only required once
				$('body').toggleClass('mobile-menu-active');
			});

			$('#page, .menu-toggle-close').click(function() {
				if ($('body').hasClass('mobile-menu-active')) {
					$('body').removeClass('mobile-menu-active');
				}
			});

			if( $('#wpadminbar').length ) {
				$('#mobile-menu-wrapper').addClass('wpadminbar-active');
			}


			$('.arrow-menu').on('click', function(e) {
				
				e.preventDefault();
				e.stopPropagation();

				var subMenuOpen = $(this).hasClass('sub-menu-open');

				if ( subMenuOpen ) {
					$(this).removeClass('sub-menu-open');
					$(this).find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
					$(this).prev('ul.sub-menu').slideUp();
				} else {
					$(this).prev('ul.sub-menu').slideDown();
					$(this).addClass('sub-menu-open');
					$(this).find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
				}

			});

		},


		/**
		 * Toggle Search Click
		 * 
		 * @return void
		 */
		navSearch: function() {

			$('#trigger-overlay').on('click', function(e) {

				e.preventDefault();

				var hasActive = $('#search-overlay').hasClass('search-active');

				if (!hasActive) {
					$('#search-overlay').addClass('search-active');
					$('#search-overlay .search-field').focus();
				}

			});

			$('.search-close').on('click', function(e){
				e.preventDefault();

				$('#search-overlay').removeClass('search-active');

			});

		},

		/**
		 * Back to Top
		 * 
		 * @return void
		 */

		scrollTop : function() {
			$('.back-to-top').click(function () {
				$('html, body').animate({scrollTop : 0},800);
				return false;
			});

			$(document).scroll ( function() {
				var topPositionScrollBar = $(document).scrollTop();
				if ( topPositionScrollBar < '150' ) {
					$('.back-to-top').fadeOut();
				} else {
					$('.back-to-top').fadeIn();
				}
			});
		}

	}; // var initAll

	$(document).ready(function() {
		initAll.init();
	});

	$(document).mouseleave(function () {
		
	});

	$(window).load(function(){
  		//
	});
}) (jQuery);
