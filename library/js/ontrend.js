// homepage scroll vanilla javascript
document.addEventListener("DOMContentLoaded", function(event) {

	// add class on body to show content when page loaded
	var body = document.body;
	body.classList.add("loaded");

	function scrollClick() {
	    document.querySelector('.home-content').scrollIntoView({ 
	    behavior: 'smooth',
	    block: "center"
	  });
	}

	// run on homepage only
	if ( body.classList.contains('home') ) {
		document.querySelector('.arrow-click').addEventListener('click', function () {
		  scrollClick();
		});	
	}
});

(function($) {

	// mobile class
	var mobileClass = function() {
		var windowWidth = document.body.clientWidth;

		if (windowWidth < 768) {
			$('body').addClass('mobile-width');
		} else if (windowWidth >= 768) {
			$('body').removeClass('mobile-width');
		};
	};
  
  	// fire on page resize
  	$(window).resize(function(){
    	mobileClass();
  	});

	// sticky nav
	$(window).scroll(function() {

		var $tagline = $('.mobile-width .site-subheader');
		
		// desktop sticky nav
		if ($(this).scrollTop() > 183) {
			$('.header .fixed-nav').addClass('is-fixed');
		} else {
			$('.header .fixed-nav').removeClass('is-fixed');
		}

		// mobile scroll remove tagline
		if ($(this).scrollTop() > 150) {
			$tagline.hide('fast');
		} else {
			$tagline.show('fast');
		}
	});
	
	// $ Works! You can test it with next line if you like
	// console.log($);
	var $hamburger = $('.hamburger');
	var $mainMenu = $('#menu-main');
	var $mainMenuItem = $('#menu-main li');
	var $subMenuOne = $('#menu-main > .menu-item-has-children > ul');
	var $subMenuTwo = $('#menu-main > .menu-item-has-children > ul ul');

	function mobileMenu() {
		$hamburger.click(function() {

			console.log('hamburger clicked');

			if ( $(this).hasClass('is-active') ) {
				$(this).removeClass('is-active');
				$mainMenu.removeClass('show-menu');
			} else {
				$(this).addClass('is-active');
				$mainMenu.addClass('show-menu');
			}
		});

		$mainMenuItem.each(function (){
			if($(this).hasClass("menu-item-has-children")){
				$(this).append('<i class="fa fa-angle-down"></i>');
			}
		});

		// Main nav dropdown click
		$('#menu-main > .menu-item-has-children > .fa').click(function() {
			$subMenuOne.toggleClass('show-submenu');
		});

		// Sub nav dropdown click
		$('#menu-main > .menu-item-has-children > ul li > .fa').click(function() {
			$subMenuTwo.toggleClass('show-submenu');
		});
	}

	// homepage typed papa
	function typedOne() {
		var typed = new Typed('.typed-one', {
			stringsElement: '.typed-strings-one',
			typeSpeed: 80,
			startDelay: 2000,
			showCursor: false,

			onComplete: (self) => {
				typedTwo();
			},
		});
	}

	function typedTwo() {
		var typed = new Typed('.typed-two', {
			stringsElement: '.typed-strings-two',
			typeSpeed: 80,
			startDelay: 1000,
			showCursor: false,
		});
	}

	// homepage slider
	function homeSlider() {
		$('.home-slider-new').slick({
			arrows: false,
			autoplay: true,
			autoplaySpeed: 3000,
			fade: true,
			speed: 3000
		});	
	}

// accordion
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
	


	$(document).ready(function() {

		// if is home page run typed and slider functions
		if ( $('body').hasClass('home') ) {
			typedOne();
			homeSlider();	
		}
		mobileMenu();

		mobileClass();
		






	});
	
})( jQuery );