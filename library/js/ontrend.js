console.log('works');

(function($) {
	
	// $ Works! You can test it with next line if you like
	// console.log($);
	var $hamburger = $('.hamburger');
	var $mainMenu = $('#menu-main');
	var $mainMenuItem = $('#menu-main li');
	var $subMenuOne = $('#menu-main > .menu-item-has-children > ul');
	var $subMenuTwo = $('#menu-main > .menu-item-has-children > ul ul');

	function mobileMenu() {
		$hamburger.click(function() {
			$(this).toggleClass('is-active');
			$mainMenu.toggleClass('show-menu');
		});

		$mainMenuItem.each(function (){
			if($(this).hasClass("menu-item-has-children")){
				$(this).append('<i class="fa fa-angle-down"></i>');
			}
		});

		// Main nav dropdown click
		$('#menu-main > .menu-item-has-children > .fa').click(function() {
			$subMenuOne.toggleClass('show-submenu');
			console.log('sub menu depth one clicked');
		});

		// Sub nav dropdown click
		$('#menu-main > .menu-item-has-children > ul li > .fa').click(function() {
			$subMenuTwo.toggleClass('show-submenu');
			console.log('sub menu depth two clicked');
		});
	}

	$(document).ready(function() {
		mobileMenu();
	});
	
})( jQuery );