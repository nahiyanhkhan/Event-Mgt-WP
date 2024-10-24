jQuery(window).on('load', function() {
  jQuery('#status').fadeOut();
  jQuery('#preloader').delay(350).fadeOut('slow');
  jQuery('body').delay(350).css({'overflow':'visible'});
})

// sticky header
jQuery(window).scroll(function(){
  if (jQuery(window).scrollTop() >= 100) {
    jQuery('.is-sticky-on').addClass('sticky-head');
  }
  else {
    jQuery('.is-sticky-on').removeClass('sticky-head');
  }
});

jQuery(function($){
  $( '.toggle-nav button' ).click( function(e){
    $( 'body' ).toggleClass( 'show-main-menu' );
    var element = $( '.sidenav' );
    classic_events_trapFocus( element );
  });

  $( '.close-button' ).click( function(e){
    $( '.toggle-nav button' ).click();
    $( '.toggle-nav button' ).focus();
  });
  $( document ).on( 'keyup',function(evt) {
    if ( $( 'body' ).hasClass( 'show-main-menu' ) && evt.keyCode == 27 ) {
      $( '.toggle-nav button' ).click();
      $( '.toggle-nav button' ).focus();
    }
  });
});

function classic_events_trapFocus( element, namespace ) {
  var classic_events_focusableEls = element.find( 'a, button' );
  var classic_events_firstFocusableEl = classic_events_focusableEls[0];
  var classic_events_lastFocusableEl = classic_events_focusableEls[classic_events_focusableEls.length - 1];
  var KEYCODE_TAB = 9;

  classic_events_firstFocusableEl.focus();

  element.keydown( function(e) {
    var isTabPressed = ( e.key === 'Tab' || e.keyCode === KEYCODE_TAB );

    if ( !isTabPressed ) {
      return;
    }

    if ( e.shiftKey ) /* shift + tab */ {
      if ( document.activeElement === classic_events_firstFocusableEl ) {
        classic_events_lastFocusableEl.focus();
        e.preventDefault();
      }
    } else /* tab */ {
      if ( document.activeElement === classic_events_lastFocusableEl ) {
        classic_events_firstFocusableEl.focus();
        e.preventDefault();
      }
    }
  });
}

jQuery(document).ready(function() {
  jQuery('#slider-cat .owl-carousel').owlCarousel({
    loop: true,
    margin: 0,
    nav:true,
    navText: ["<i class='fas fa-caret-left'></i>", "<i class='fas fa-caret-right'></i>"], 
    dots:false,
    rtl:false,
    items: 1,
    autoplay:true,
  })
});

// about
jQuery(document).ready(function() {
    // Initialize the .abt-cat slider
    jQuery('.abt-cat .owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        rtl: false,
        items: 4,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
    });

    // Initialize the #abtslider
    jQuery('#abtslider').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        items: 1,
    });

    // Add click event handler to .abt-cat slider items
    jQuery('.abt-cat .owl-item').click(function() {
        var index = jQuery(this).index();
        jQuery('#abtslider').trigger('to.owl.carousel', [index, 300, true]);
    });

    // Synchronize #abtslider with .abt-cat slider
    jQuery('#abtslider').on('changed.owl.carousel', function(event) {
        var current = event.item.index;
        jQuery('.abt-cat .owl-carousel').trigger('to.owl.carousel', [current, 300, true]);
    });
});

/* ===============================================
  SCROLL TOP
============================================= */

jQuery(document).ready(function () {
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 0) {
      jQuery('#button').fadeIn();
    } else {
      jQuery('#button').fadeOut();
    }
  });
  jQuery('#button').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
  });

  classic_events_search_focus();
  
});

// search
function classic_events_search_focus() {

  /* First and last elements in the menu */
  var classic_events_search_firstTab = jQuery('.serach_inner input[type="search"]');
  var classic_events_search_lastTab  = jQuery('button.search-close'); /* Cancel button will always be last */

  jQuery(".search-open").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').addClass("search-focus");
    classic_events_search_firstTab.focus();
  });

  jQuery("button.search-close").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').removeClass("search-focus");
    jQuery(".search-open").focus();
  });

  /* Redirect last tab to first input */
  classic_events_search_lastTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('search-focus'))
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      classic_events_search_firstTab.focus();
    }
  });

  /* Redirect first shift+tab to last input*/
  classic_events_search_firstTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('search-focus'))
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      classic_events_search_lastTab.focus();
    }
  });

  /* Allow escape key to close menu */
  jQuery('.serach_inner').on('keyup', function(e){
    if (jQuery('body').hasClass('search-focus'))
    if (e.keyCode === 27 ) {
      jQuery('body').removeClass('search-focus');
      classic_events_search_lastTab.focus();
    };
  });
}