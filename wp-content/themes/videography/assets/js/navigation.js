/**
 * Theme functions file.
 *
 * Contains handlers for navigation.
 */

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast'
   	});
});

function videography_open() {
	jQuery(".sidenav").addClass('show');
}
function videography_close() {
	jQuery(".sidenav").removeClass('show');
    jQuery( '.mobile-menu' ).focus();
}

function videography_menuAccessibility() {
	var links, i, len,
	    videography_menu = document.querySelector( '.nav-menu' ),
	    videography_iconToggle = document.querySelector( '.nav-menu ul li:first-child a' );
    
	let videography_focusableElements = 'button, a, input';
	let videography_firstFocusableElement = videography_iconToggle; // get first element to be focused inside menu
	let videography_focusableContent = videography_menu.querySelectorAll(videography_focusableElements);
	let videography_lastFocusableElement = videography_focusableContent[videography_focusableContent.length - 1]; // get last element to be focused inside menu

	if ( ! videography_menu ) {
    	return false;
	}

	links = videography_menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
	    links[i].addEventListener( 'focus', toggleFocus, true );
	    links[i].addEventListener( 'blur', toggleFocus, true );
	}

	// Sets or removes the .focus class on an element.
	function toggleFocus() {
      	var self = this;

      	// Move up through the ancestors of the current link until we hit .mobile-menu.
      	while (-1 === self.className.indexOf( 'nav-menu' ) ) {
	      	// On li elements toggle the class .focus.
	      	if ( 'li' === self.tagName.toLowerCase() ) {
	          	if ( -1 !== self.className.indexOf( 'focus' ) ) {
	          		self.className = self.className.replace( ' focus', '' );
	          	} else {
	          		self.className += ' focus';
	          	}
	      	}
	      	self = self.parentElement;
      	}
	}
    
	// Trap focus inside modal to make it ADA compliant
	document.addEventListener('keydown', function (e) {
	    let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

	    if ( ! isTabPressed ) {
	    	return;
	    }

	    if ( e.shiftKey ) { // if shift key pressed for shift + tab combination
	      	if (document.activeElement === videography_firstFocusableElement) {
		        videography_lastFocusableElement.focus(); // add focus for the last focusable element
		        e.preventDefault();
	      	}
	    } else { // if tab key is pressed
	    	if (document.activeElement === videography_lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
		      	videography_firstFocusableElement.focus(); // add focus for the first focusable element
		      	e.preventDefault();
	    	}
	    }
	});   
}

jQuery(function($){
	$('.mobile-menu').click(function () {
	    videography_menuAccessibility();
  	});
});

jQuery(document).ready(function(){
	jQuery('.featured-img img').click(function(){
		var popup_display = jQuery(this).attr('lz-featured-video');
		jQuery('.' + popup_display).css('visibility','visible');
		jQuery('.' + popup_display).css('top','0');
	});

	jQuery('.close-btn').click(function(){
		var popup_display = jQuery(this).attr('lz-featured-video');
		jQuery('.' + popup_display).css('visibility','hidden');
		jQuery('.' + popup_display).css('top','-110%');
	});
});