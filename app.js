(function($){
"use strict";

function validateCommentForms() {
	$('.comment-form .input-required').each(function(){
		var $that = $(this);
		$that.on('keyup', function() {
			if ($that.val().length > 0) {
				$that.parent().removeClass('message-error');
			} else {
				$that.parent().addClass('message-error');
			}
		});
	});
}

$(document).ready(function(){
	$('.blog-search').on('click', '.search-icon', function(e){
		e.preventDefault();
		$('.blog-search').toggleClass('active-search');
	});

	$('.blog-content-grid .blog-load-more a').on('click', function(e){
		e.preventDefault();
		$('.blog-content-grid .blog-load-more-content .loaded-img').removeClass('loaded-img');
		$('.blog-content-grid .blog-load-more-content .loaded-text').removeClass('loaded-text');
		setTimeout(function(){
			$('.blog-content-grid .blog-load-more').before($('.blog-load-more-content').html());
			$(window).trigger('scroll');
		}, 100);
	});

	$('.blog-content-rows .blog-load-more a').on('click', function(e){
		e.preventDefault();
		$('.blog-content-rows .blog-load-more-content .loaded-img').removeClass('loaded-img');
		$('.blog-content-rows .blog-load-more-content .loaded-text').removeClass('loaded-text');
		setTimeout(function(){
			$('.blog-content-rows .blog-load-more').before($('.blog-load-more-content').html());
			$(window).trigger('scroll');
		}, 100);
	});
	validateCommentForms();
});


})(jQuery);

(function($){
	"use strict";

	function validateContactForms() {
		$('.contact-form .input-required').each(function(){
			var $that = $(this);
			$that.on('keyup', function() {
				if ($that.val().length > 0) {
					$that.parent().removeClass('message-error');
				} else {
					$that.parent().addClass('message-error');
				}
			});
		});
		
		$(document).on("submit", "#c-form", function(e) {
			e.preventDefault();
			$('#c-form .message-error').removeClass('message-error');

			$.ajax({
				url: 'c-send.php',
				type: 'POST',
				dataType: 'json',
				data: $('#c-form').serialize(),

			}).done(function(responseData) {
				if(responseData.status === 'success') {
					$("#c-form .btn-contact").addClass('button-success');
					$('.c-input input, .c-input textarea').val('');
					$('.contact-form .c-input').removeClass('active-input');
					$('.contact-form .clear-input').removeClass('clear-input');
					setTimeout(function() {
						$("#c-form .btn-contact").removeClass('button-success');
					}, 3000);
				} else {
					$.each(responseData.errors, function(i, field) {
						$('#c_'+field).parent().addClass('message-error');
					});
				}
			}).fail(function() {
				// handle server fail here
			});
		});
	}

	$(document).ready(function(){
		validateContactForms();
	});

	$(window).on('resize', function(){
		if($('html').hasClass('map-ready')) {
			initMap();
		}
	});


})(jQuery);



document.addEventListener('DOMContentLoaded', function () {
	if (document.querySelectorAll('#map').length > 0) {
		if (document.querySelector('html').lang)
			lang = document.querySelector('html').lang;
		else
			lang = 'pl';

		var js_file = document.createElement('script');
		js_file.type = 'text/javascript';
		js_file.src = 'https://maps.googleapis.com/maps/api/js?callback=initMap&language=' + lang;
		document.getElementsByTagName('body')[0].appendChild(js_file);
		document.getElementsByTagName('html')[0].classList += ' map-ready ';
	}
});

var map;
var marker; 

function initMap() {
	var markerPosition = new google.maps.LatLng(51.104411, 17.01300); 
    var image = {
        path: 'M768 896q0 106 -75 181t-181 75t-181 -75t-75 -181t75 -181t181 -75t181 75t75 181zM1024 896q0 -109 -33 -179l-364 -774q-16 -33 -47.5 -52t-67.5 -19t-67.5 19t-46.5 52l-365 774q-33 70 -33 179q0 212 150 362t362 150t362 -150t150 -362z',
        fillColor: $('.mapMarkerColor').css('color'),
        fillOpacity: 1,
        scale: 0.03,
        strokeColor: 'black',
        strokeWeight: 0.2,
        rotation: 180
    };
    var mapOptions = {
        zoom: 17,
        center: new google.maps.LatLng(51.103994, 17.010588),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false,
        disableDefaultUI: true,
        styles: [{stylers: [{saturation: -100}]}]
    };

    var map = new google.maps.Map(document.getElementById('map'),
            mapOptions);
    var marker = new google.maps.Marker({
    position: markerPosition,
    map: map,
    title:"Hello World!",
    icon: image});


  // map = new google.maps.Map(document.getElementById('map'), {
  //   center: {lat: 51.104411, lng: 17.01300},
  //   zoom: 15
  // });
}
(function($){
"use strict";

$(document).ready(function(){
	gallerySwipebox();
	initSingleGallerySlider();
	$('.gallery-filters-list').on('click', 'a', function(e){
		e.preventDefault();
		var $that = $(this);
		if(!$that.parent().hasClass('active-filter')) {
			$('.gallery-filters-list li').removeClass('active-filter');
			$that.parent().addClass('active-filter');
		}
	});
	var gutter = $('.gallery .gallery-container').data('gutter');
	$('.gallery-grid .gallery-item').css('padding', gutter);
	$('.gallery-grid .gallery-container').css('margin-top', -gutter);
	$('.gallery-grid .gallery-container').css('margin-bottom', -gutter);
	$('.gallery-grid .gallery-container').css('padding', '0 '+gutter+'px');

	function gallerySwipebox() {
		$('.gallery').on('click', '.swipebox', function(e){
			e.preventDefault();
			var images = [];
			$(this).parent().find('a').each(function(){
				images.push({href: this.href, title: this.title});
			});
			if(images.length > 0) {
				$.swipebox(images);
			}
		});
	}
	function initSingleGallerySlider() {
		var sliderSingleGallery = new Swiper('.single-gallery-slider', {
			speed: 750,
			slidesPerView: 1,
			// simulateTouch: true,
			autoplay: false,
			// autoplayDisableOnInteraction: false,
			// freeMode: false,	
			centeredSlides: true,
			loop: true,
			autoHeight: true,
			effect: 'fade',
			fade: {crossFade: true},
			direction: 'horizontal',
			mousewheelControl: false,
			grabCursor: false,
			slideClass: 'swiper-slide',
			keyboardControl: true,
			nextButton: '.single-gallery-arrows .arrow-next',
			prevButton: '.single-gallery-arrows .arrow-prev',
		});
	}


	$('.gallery-container .gallery-load-more a').on('click', function(e){
		e.preventDefault();
		$('.gallery-container .gallery-load-more-content .loaded-img').removeClass('loaded-img');
		setTimeout(function(){
			$('.gallery-container .gallery-load-more').before($('.gallery-load-more-content').html());
			$(window).trigger('scroll');
		}, 100);
	});

});


})(jQuery);

(function($){
"use strict";

function initHomeSlider() {
	var transition = $('.home-bg-slider').data('transition');
	var delay = $('.home-bg-slider').data('delay');
	var auto = $('.home-bg-slider').data('auto');
	var transitionDuration = $('.home-bg-slider').data('transitionDuration');
	var slidesCount = $('.single-slide').length;
	var slides = [];
	$('.single-slide').each(function(i, el){
		var slide = $(this).data('slide');
		slides.push({'src' : slide});
		var text = '';
		i = i+1;
		text = '<span class="slide-number">'+i+' <span>of</span> '+slidesCount+'</span>';
		$('.home-slider-pagination').append(text);
		// var progressSlide = 100 / slidesCount;
		// $('.home-slider-pagination .progress-slide').css('width', progressSlide+'px');
	});
	var timer1;
	var timer2;
	
	$('.home-slider-container' ).vegas({
		delay: delay,
		firstTransition: 'zoomOut',
		firstTransitionDuration: 3000,
		transition: transition,
		transitionDuration: transitionDuration,
		autoplay: auto,
		// timer: true,
		slides: slides,
		walk: function (index, slideSettings) {
			var progressSlide = 100 / slidesCount;
			var moveProgress = index * progressSlide;
			// $('.home-slider-pagination .progress-slide').css('left', moveProgress+'px');

			if($('.slider-text').length > 1) {
				$('.vegas-slide').each(function(){
					$(this)[0].style['transition-delay'] = '.5s';
				});

				// timer2 = setTimeout(function(){
					$('.slider-text.slide-active').removeClass('slide-active');
				// }, delay+(transitionDuration/2) - 2000);
				clearTimeout(timer1);
				timer1 = setTimeout(function(){
					$('.slider-text:eq('+index+')').addClass('slide-active');
				}, transitionDuration/3);

			}


			if($('.home-bg-slider').hasClass('autoplay')) {
				$('.home-bg-slider .slide-number').removeClass('slide-active');
				$('.home-bg-slider .slide-number:eq('+index+')').addClass('slide-active');
				if($('.slider-text').length == $('.single-slide').length) {
					// $('.slider-text').removeClass('slide-active');
					// $('.slider-text:eq('+index+')').addClass('slide-active');
				}
			}
		}
	});

	$('.vegas-timer').appendTo('.home-slider-pagination .progress-slide');

	$('.home-bg-slider').on('click', '.arrow-prev', function(){
		$('.home-slider-container').vegas('previous');
		if($('.slider-text').length > 1 && $('.home-slider-container').length > 0) {
			$('.slider-text.slide-active').removeClass('slide-active');
		}
	});
	$('.home-bg-slider').on('click', '.arrow-next', function(){
		$('.home-slider-container').vegas('next');
		if($('.slider-text').length > 1 && $('.home-slider-container').length > 0) {
			$('.slider-text.slide-active').removeClass('slide-active');
		}
	});
}

function initHomeSlider2() {
	var slidesCount = $('.homepage-slider2 .swiper-slide').length;
	$('.homepage-slider2 .swiper-slide').each(function(i, el){
		var text = '';
		i = i+1;
		text = '<span class="slide-number">'+i+' <span>of</span> '+slidesCount+'</span>';
		$('.home-slider-pagination').append(text);
		var progressSlide = 100 / slidesCount;
		$('.home-slider-pagination .progress-slide').css('width', progressSlide+'px');
	});
	var slidesPerView = '';
	var loop = '';
	var autoplay = '';

	if($('.slider-centered .swiper-slide').length == 1) {
		loop = false;
		slidesPerView = 1;
	} else {
		loop = true;
		slidesPerView = 'auto';
	}

	if($('.slider-centered').hasClass('autoplay')) {
		autoplay = 5000;
	} else {
		autoplay = "";
	}

	var timer1;

	var sliderCentered = new Swiper('.slider-centered', {
		speed: 1500,
		slidesPerView: slidesPerView,
		centeredSlides: true,
		simulateTouch: false,
		autoplay: autoplay,
		autoplayDisableOnInteraction: false,
		freeMode: false,
		loop: loop,
		direction: 'horizontal',
		mousewheelControl: false,
		grabCursor: false,
		slideClass: 'swiper-slide',
		keyboardControl: true,
		nextButton: '.home-slider-arrows .arrow-next',
		prevButton: '.home-slider-arrows .arrow-prev',
		onTransitionStart: function(swiper) {
			var active = $('.swiper-slide-active').data('swiper-slide-index');
				// timer2 = setTimeout(function(){
				// }, delay+(transitionDuration/2) - 2000);
				// clearTimeout(timer1);

				
			$('.active').removeClass('active');
			$('.swiper-slide[data-swiper-slide-index="'+active+'"]').addClass('active');
			var progressSlide = 100 / slidesCount;
			var moveProgress = active * progressSlide;
			$('.home-slider-pagination .progress-slide').css('left', moveProgress+'px');
			if($('.home-bg-slider').hasClass('autoplay')) {
				$('.home-bg-slider .slide-number').removeClass('slide-active');
				$('.home-bg-slider .slide-number:eq('+active+')').addClass('slide-active');
				if($('.slider-text').length == slidesCount) {
					$('.slider-text.slide-active').removeClass('slide-active');
					clearTimeout(timer1);
					timer1 = setTimeout(function(){
						$('.slider-text:eq('+active+')').addClass('slide-active');
					}, 500);
				}
			}
		},
	});
}

function hideInfoSlider() {
	$('.home-bg-slider').on('click', '.btn-slider-1', function(){
		var $that = $(this);

		if($('.btn-show-picture').hasClass('btn-slider-active')) {
			$('.home-overlay').removeClass('active-overlay');
			$('.btn-show-picture').removeClass('btn-slider-active');
			$('.btn-show-content').addClass('btn-slider-active');
			$('.home-content .content').removeClass('show-content');
		} else {
			$('.home-overlay').addClass('active-overlay');
			$('.btn-show-content').removeClass('btn-slider-active');
			$('.btn-show-picture').addClass('btn-slider-active');
			$('.home-content .content').addClass('show-content');
		}

	});
}

function initVideo() {
	if($('.video-wrapper').length > 0) {
		$('.video-wrapper').YTPlayer();

		if($('.video-toggle').length > 0) {
			$('.video-toggle').on('click', function(e){
				e.preventDefault();
				var $el = $(this);
				if($el.data('pause') == $el.text()) {
					$el.text($el.data('play'));
					$('.video-wrapper').YTPPause();
				} else {
					$('.video-wrapper').YTPPlay();
					$el.text($el.data('pause'));
				}
			
				// $('.video-wrapper').YTPPlay();
				// $('.video-wrapper').YTPPause();
			});
		}
		if($('.video-mute-toggle').length > 0) {
			$('.video-mute-toggle').on('click', function(e){
				e.preventDefault();
				var $el = $(this);
				if($el.data('mute') == $el.text()) {
					$el.text($el.data('unmute'));
					$('.video-wrapper').YTPMute();
				} else {
					$('.video-wrapper').YTPUnmute();
					$el.text($el.data('mute'));
				}
			});
		}
	}
}

$(document).ready(function(){
	initHomeSlider();
	initHomeSlider2();
	hideInfoSlider();
	initVideo();

	$('.home-slider-languages li').on('click', 'a', function(){
		$('.home-slider-languages li a').removeClass('active');
		$(this).addClass('active');
	});
});

$(window).on('resize', function(){
	if($('.swiper-container').length > 0) {
		var swiper = $('.swiper-container')[0].swiper;
		swiper.stopAutoplay();
		swiper.startAutoplay();
	}
});

})(jQuery);

(function($){
	"use strict";

	$(document).ready(function(){
		$('.food-menu-filters-list').on('click', 'a', function(e){
			e.preventDefault();
			var $that = $(this);
			if(!$that.parent().hasClass('active-filter')) {
				$('.food-menu-filters-list li').removeClass('active-filter');
				$that.parent().addClass('active-filter');
			}
		});
		$('.food-menu-item, .food-menu-cat-header').each(function(){
			var $that = $(this);
			var idImg = $that.data('img');
			var $featuredImgParent = $that.parents('.food-menu-category');
			var $featuredImg = $featuredImgParent.find('.food-menu-featured-img');

			if(typeof idImg !== "undefined") {
				$that.on('mouseenter', function(){
					$featuredImg.find('img').removeClass('show-img');
					$featuredImg.find('[data-id="'+idImg+'"]').addClass('show-img');
					$featuredImgParent.find('.food-menu-image-active').removeClass('food-menu-image-active');
					$that.addClass('food-menu-image-active');
				});
			}
		});

		$('.food-menu-standard .food-menu-container').masonry({
			columntWidth: '.grid-sizer',
			itemSelector: '.food-menu-category',
		});

	});

})(jQuery);


(function($){
"use strict";

function setHeightMosaic() {
	$('.mosaic-item').each(function(){
		var $that = $(this);
		var heightSmall = $that.data('smHeight');
		var heightLarge = $that.data('lgHeight');
		if($(window).width() < 1024) {
			$that.height(heightSmall);
		} else {
			$that.height(heightLarge);
		}
	});
}

$(document).ready(function(){
	setHeightMosaic();
});

$(window).on('resize', function(){
	setHeightMosaic();
});

})(jQuery);

(function($){
"use strict";

function openSubnav() {
	var $el = $(this);
	if($el.data('nav-showed') == '1') {
		return false;
	}
	var $dropdown = $el.find('ul').first();
	$dropdown.velocity('stop').velocity({opacity: 1}, {duration: 200, display: 'block', complete: function(){
	$el.data('nav-showed', '1');
		
	}});

	if($dropdown.length > 0) {
		if($dropdown.parent().hasClass('first-level')) {
			$dropdown.css('margin-left', $dropdown.width() / -2);
		} else {
			if($dropdown.parent().outerWidth()*2 + $dropdown.parent().offset().left > $(window).width()) {
				$dropdown.addClass('dropdown-left');
			} else {
				$dropdown.removeClass('dropdown-left');
			}
		}
	}
}

function hideSubnav() {
	var $el = $(this);
	var $dropdown = $el.find('ul').first();
	$dropdown.velocity('stop').velocity({opacity: 0}, {duration: 300,  display: 'none', complete: function(){
		$el.data('nav-showed', '0');
	}});
}

function initNavCenter() {
	if($('.nav-classes:not(.nav-right) .nav-icons').length > 0) {
		$('.main-navigation .nav-items').css('padding-right', '50px');
	}
	if($('.nav-right .nav-icons, .nav-right-all .nav-icons').length > 0) {
		$('.main-navigation .nav-items').css('padding-left', '50px');
	}
	if($('.main-navigation').hasClass('center-navigation')) {
		var navWidth = $('.nav-center .nav-wrapper').width();
		var logoWidth = $('.nav-center .nav-items .nav-logo').width();
		var sideWidth = (navWidth - logoWidth) /2;
		sideWidth = sideWidth -1;
		var logoPosition = $('.nav-center .nav-logo').offset().left;
		$('.nav-center .main-nav-left, .nav-center .main-nav-right').width(sideWidth);
	}
}

function openMobileNavigation() {
	$('.btn-mobile-overlay').on('click', function(){
		var $that = $(this);
		if($('.swiper-container').length > 0) {
			var swiper = $('.swiper-container')[0].swiper;
			if($that.hasClass('open')){
				swiper.stopAutoplay();
			} else {
				swiper.startAutoplay();
			}
		}
		$('body').toggleClass('no-scroll');
		$('.mobile-navbar-helper').toggleClass('open-overlay');
		$('.mobile-navbar-overlay').toggleClass('show-mobile-nav');
	});
}

function initFixedNavigation() {
	var navHeight = $('.nav-classes').data('heightFixedNav');
	$('#fixed-nav').height(navHeight);
	var navbarWaypoint = new Waypoint({
		element: document.getElementById('nav-helper'),
		handler: function(direction) {
			if(direction == 'down') {
				$('#fixed-nav').addClass('show-fixed-nav');
			} else {
				$('#fixed-nav').removeClass('show-fixed-nav');
			}
		},
		offset: -navHeight+'px',
	});
}
function changeNavElement() {
	$('.el-nav .link-hover').on('click', function(e){
		e.preventDefault();
		var $that = $(this);
		$('body').velocity('scroll', {'offset': 0});
		if($that.hasClass('el-nav-transparent')) {
			$('body').removeClass('nav-solid').addClass('nav-transparent');
			if($that.hasClass('el-nav-light')) {
				$('.el-nav-type .page-intro .intro-overlay').css('background', "#000");
			}
			if($that.hasClass('el-nav-dark')) {
				$('.el-nav-type .page-intro .intro-overlay').css('background', "#fff");
			}
		}
		if($that.hasClass('el-nav-solid')) {
			$('body').removeClass('nav-transparent').addClass('nav-solid');
			if($('.page-wrapper').children('.page-intro').length > 0) {
				$('.nav-solid.nav-top .page-wrapper').css('padding-top', 0);
			}
		}
		if($that.hasClass('el-nav-light')) {
			$('body').removeClass('nav-dark-text').addClass('nav-light-text');
			$('.nav-logo-dark').hide();
			$('.nav-logo-light').show().css('opacity', 1);
		}
		if($that.hasClass('el-nav-dark')) {
			$('body').removeClass('nav-light-text').addClass('nav-dark-text');
			$('.nav-logo-light').hide();
			$('.nav-logo-dark').show().css('opacity', 1);
		}
		if($that.hasClass('el-nav-left-all')) {
			$('body').removeClass('nav-left').removeClass('nav-right').removeClass('nav-right-all').removeClass('nav-center').addClass('nav-left-all');
		}
		if($that.hasClass('el-nav-right-all')) {
			$('body').removeClass('nav-left').removeClass('nav-right').removeClass('nav-left-all').removeClass('nav-center').addClass('nav-right-all');
		}
		if($that.hasClass('el-nav-left')) {
			$('body').removeClass('nav-left-all').removeClass('nav-right').removeClass('nav-right-all').removeClass('nav-center').addClass('nav-left');
		}
		if($that.hasClass('el-nav-right')) {
			$('body').removeClass('nav-left').removeClass('nav-right-all').removeClass('nav-left-all').removeClass('nav-center').addClass('nav-right');
		}
		if($that.hasClass('el-nav-center')) {
			$('body').removeClass('nav-left').removeClass('nav-left').removeClass('nav-right-all').removeClass('nav-left-all').removeClass('nav-right').addClass('nav-center');
		}
	});
}
$(window).load(function(){
	initNavCenter();
});

$(document).ready(function(){
	
	openMobileNavigation();
	initFixedNavigation();
	if($('body').hasClass('el-nav-type')) {
		changeNavElement();
	}
	
	$('.desktop-menu .menu-item-has-children').on('mouseenter', openSubnav);
	$('.desktop-menu .menu-item-has-children').on('mouseleave', hideSubnav);

	$('.desktop-menu > .menu-item-has-children').addClass('first-level');

	
	if($('body').hasClass('nav-light-text')) {
		$('.nav-logo-dark').hide();
		$('.nav-logo-light').css('opacity', 1);
	}
	if($('body').hasClass('nav-dark-text')) {
		$('.nav-logo-light').hide();
		$('.nav-logo-dark').css('opacity', 1);
	}
	if($('.page-wrapper').children('.page-intro').length > 0) {
		$('.nav-solid.nav-top .page-wrapper').css('padding-top', 0);
	}
});

$(window).on('resize', function(){
	initNavCenter();
});

})(jQuery);

(function($){
"use strict";

function validateForms() {
	$('.reservation-form .input-required').each(function(){
		var $that = $(this);
		$that.on('keyup', function() {
			if ($that.val().length > 0) {
				$that.parent().removeClass('message-error');
			} else {
				$that.parent().addClass('message-error');
			}
		});
	});
	
	$(document).on("submit", "#bf-form", function(e) {
		e.preventDefault();
		$('#bf-form .message-error').removeClass('message-error');

		$.ajax({
			url: 'bf-send.php',
			type: 'POST',
			dataType: 'json',
			data: $('#bf-form').serialize(),

		}).done(function(responseData) {
			if(responseData.status === 'success') {
				$("#bf-form .btn-reservation").addClass('button-success');
				$('.bf-input input, .bf-input textarea').val('');
				$('.reservation-form .bf-input').removeClass('active-input');
				$('.reservation-form .clear-input').removeClass('clear-input');
				setTimeout(function() {
					$("#bf-form .btn-reservation").removeClass('button-success');
				}, 3000);
			} else {
				$.each(responseData.errors, function(i, field) {
					$('#bf_'+field).parent().addClass('message-error');
				});
			}
		}).fail(function() {
			// handle server fail here
		});
	});
}


$(document).ready(function(){
	validateForms();
});

$(window).on('resize', function(){

});


})(jQuery);


(function($){
"use strict";

	function changeTeamMember() {
		$('.team-members .team-header').on('click', function(){
			var $that = $(this);
			if($that.hasClass('active')) {
				return;
			} else {
				$('.img-wrapper-before').addClass('img-wrapper');
				$('.team-select .team-member').removeClass('team-member-active');
				$('.team-members .team-header').removeClass('active');
				$that.addClass('active');
				$('.team-select .team-member:eq('+$that.index()+')').addClass('team-member-active');
				$('.team-select .team-member .img-wrapper.loaded-img').removeClass('loaded-img').removeClass('img-wrapper');
				setTimeout(function(){
					$('.team-select .team-member:eq('+$that.index()+') .img-wrapper').addClass('loaded-img');
				}, 400);
			}
		});
	}

	$(document).ready(function(){
		changeTeamMember();
	});

	$(window).on('resize', function(){

	});


})(jQuery);
//Request animation frame polyfill
!function(){for(var a=0,b=["ms","moz","webkit","o"],c=0;c<b.length&&!window.requestAnimationFrame;++c)window.requestAnimationFrame=window[b[c]+"RequestAnimationFrame"],window.cancelAnimationFrame=window[b[c]+"CancelAnimationFrame"]||window[b[c]+"CancelRequestAnimationFrame"];window.requestAnimationFrame||(window.requestAnimationFrame=function(b){var d=(new Date).getTime(),e=Math.max(0,16-(d-a)),f=window.setTimeout(function(){b(d+e)},e);return a=d+e,f}),window.cancelAnimationFrame||(window.cancelAnimationFrame=function(a){clearTimeout(a)})}();

(function($){
	'use strict';

	var $window = $(window);

	var prefix = (function () {
		var styles = window.getComputedStyle(document.documentElement, ''),
		pre = (Array.prototype.slice
			.call(styles)
			.join('')
			.match(/-(moz|webkit|ms)-/) || (styles.OLink === '' && ['', 'o'])
			)[1],
		dom = ('WebKit|Moz|MS|O').match(new RegExp('(' + pre + ')', 'i'))[1];
		return {
			dom: dom,
			lowercase: pre,
			css: '-' + pre + '-',
			js: pre[0].toUpperCase() + pre.substr(1)
		};
	})();

	var $transform = prefix['js']+'Transform';
	var parallaxImages = [];
	var parallaxElements = [];

/**
 *
 * menu images animations
 *
 */


	function showFoodImages() {
		if($('.food-menu-category').length > 0) {
			$('.food-menu-cat-img').each(function(){
				var parallaxImage = {};
				parallaxImage.element = $(this);
				parallaxImage.parent = $(this).parent('.food-menu-category');
				parallaxImages.push(parallaxImage);

			});
			menuScrollHandler();
			$window.on('scroll', function(){
				requestAnimationFrame(menuScrollHandler);
			});
		}
	}


	var menuScrollHandler = function() {
		$.each(parallaxImages, function(index, parallaxImage) {
			var val = $window.scrollTop()+150;
			var el = parallaxImage.element;
			var parent = parallaxImage.parent;
			var newVal = val-parent.offset().top;

			if(parent.offset().top <= val && el.height()+newVal <= parent.height() ) {
				el[0].style[$transform] = 'translate3d(0, '+newVal+'px, 0)';
			} else {
				if(parent.offset().top <= val) {
					el[0].style[$transform] = 'translate3d(0, '+(parent.height()-el.height())+'px, 0)';
				} else {
					el[0].style[$transform] = 'translate3d(0, 0, 0)';
				}
			}
		});
	};

/**
 *
 * images animations
 *
 */


	var animateImages = function() {
		$('.img-wrapper:not(.loaded-img)').each(function(){
			var el = this;
			if($(el).offset().top < $window.scrollTop() + ($window.height() / 10)*8 ) {
				$(el).addClass('loaded-img');
			}
		});
	};

	function bindImageAnimations() {
		requestAnimationFrame(animateImages);
		$window.on('scroll', function(){
			requestAnimationFrame(animateImages);
		});
	}

/**
 *
 * text animations
 *
 */


	var animateText = function() {
		$('.animate-text:not(.loaded-text)').each(function(){
			var el = this;
			if($(el).offset().top < $window.scrollTop() + ($window.height() / 10)*8 ) {
				$(el).addClass('loaded-text');
			}
		});
	};

	function bindTextAnimations() {
		requestAnimationFrame(animateText);
		$window.on('scroll', function(){
			requestAnimationFrame(animateText);
		});
	}

/**
 *
 * mosaic animations
 *
 */

	function arrayShuffle(a) {
		var j, x, i;
		for (i = a.length; i; i--) {
			j = Math.floor(Math.random() * i);
			x = a[i - 1];
			a[i - 1] = a[j];
			a[j] = x;
		}
	}

	function animateMosaic() {
		if($('.mosaic-item').length > 0) {
			var items = [];
			$('.mosaic-item').each(function(){
				items.push($(this));
			});

			arrayShuffle(items);
			$(items).each(function(i, el){
				setTimeout(function(){
					$(el).addClass('mosaic-loaded');
				}, 100*i);
			});
		}
	}


/**
 *
 * Animate header
 *
 */

	function animateHeader() {
		if($('.home-video-text .slider-text').length > 0) {
			$('.home-video-text .slider-text').addClass('slide-active');
		}
	}


/**
 *
 * loader animation
 *
 */


	$('.loading-progress').css('width', '50%');
	$window.load(function(){
		$('.loading-progress').css('width', '100%');
		showFoodImages();
		$('.loading-progress').css('width', '100%');
		$('.loading-wrapper').velocity({ opacity: 0}, { delay: 200, duration: 600, complete: function(){
			$('body').addClass('content-loaded');
			$(this).remove();
			animateMosaic();
			bindImageAnimations();
			bindTextAnimations();
			animateHeader();
			$('.page-intro').addClass('intro-loaded');
		}});
	});


})(jQuery);
(function($){
"use strict";

function showScrollToTop() {
	$('#scroll-up').off('click.scrollTop');
	$('#scroll-up').on('click.scrollTop', function(e){
		e.preventDefault();
		$('body').velocity('scroll', {'offset': 0});
	});
}

function focusedInput() {
	$('.forms-style .mf-input').each(function(){
		var $that = $(this);
		$that.find('label').append('<span><svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" viewBox="0 0 60 60" preserveAspectRatio="xMidYMid meet" zoomAndPan="disable" ><line id="e4_line" x1="0" y1="0" x2="60" y2="60" stroke="#171717" style="stroke-width: 1px; vector-effect: non-scaling-stroke; fill: none;"/><line x1="60" y1="0" x2="0" y2="60" stroke="#171717" style="stroke-width: 1px; vector-effect: non-scaling-stroke; fill: none;"/></svg></span>');
		$that.on('focus', 'input, textarea, select', function(){
			$that.addClass('active-input');
			if($that.find('input, textarea, select').val().length === 0) {
				if($that.find('label span').hasClass('clear-input')) {
					$that.find('label span').removeClass('clear-input');
				}
			}
		});

		$that.on('blur', 'input, textarea, select', function(){
			if($that.find('input, textarea, select').val().length === 0) {
				$that.removeClass('active-input');
				if($that.find('label span').hasClass('clear-input')) {
					$that.find('label span').removeClass('clear-input');
				}
			} else {
				$that.find('label span').addClass('clear-input');
			}
		});
		
		$that.on('click', '.clear-input', function(){
			$that.find('input, textarea, select').val('');
			$that.find('label span').removeClass('clear-input');
		});
	});
}
function changeIntroElement() {
	$('.el-intro .link-hover').on('click', function(e){
		e.preventDefault();
		var $that = $(this);
		if($that.hasClass('intro-no-header')) {
			$('.el-page-intro .intro-content').remove();
		}
		if($that.hasClass('intro-with-header')) {
			var header = $that.text();
			$('.el-page-intro .intro-content-wrapper').html('<div class="intro-content intro-content-center"><h1 class="italic-header">Intro with header</h1></div>');
		}
		if($that.hasClass('intro-with-page-header')) {
			var header = $that.text();
			$('.el-page-intro .intro-content-wrapper').html('<div class="intro-content"><div class="page-header-intro"><div class="page-header"><div class="header"><h3>Intro with element page header</h3><div class="post-meta"><ul><li>Share on:</li><li><a href="#" class="link-hover">Facebook</a></li><li><a href="#" class="link-hover">Twitter</a></li><li><a href="#" class="link-hover">TripAdvisor</a></li></ul></div></div></div></div></div>');
		}

	});
}

function setHeightIntro() {
	$('.page-intro').each(function(){
		var $that = $(this);
		var introHeight = $that.data('height');
		$that.height(introHeight);
	});
}

$(document).ready(function(){
	focusedInput();
	showScrollToTop();
	changeIntroElement();
	$('.gallery-content-lightbox').swipebox();
	$('.img-content-lightbox').swipebox();
});


$(window).on('load', function(){
	setHeightIntro();
});

$(window).on('resize', function(){

});

})(jQuery);
