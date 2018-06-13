/**
 * File script.js.
 *
 * The main javascript and jQuery file of the theme.
 */


/**
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
( function() {
  var isIe = /(trident|msie)/i.test( navigator.userAgent );

  if ( isIe && document.getElementById && window.addEventListener ) {
    window.addEventListener( 'hashchange', function() {
      var id = location.hash.substring( 1 ),
        element;

      if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
        return;
      }

      element = document.getElementById( id );

      if ( element ) {
        if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
          element.tabIndex = -1;
        }

        element.focus();
      }
    }, false );
  }
} )();


/**
 *
 * Hamburger Animation Effect
 *
 */
(function() {

  "use strict";

  var toggles = document.querySelectorAll(".wd-hamburger");

  for (var i = toggles.length - 1; i >= 0; i--) {
    var toggle = toggles[i];
    toggleHandler(toggle);
  };

  function toggleHandler(toggle) {
    toggle.addEventListener( "click", function(e) {
      e.preventDefault();
      (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
    });
  }

})(jQuery);


/**
 *
 * Toggle Menu Button in Mobile
 *
 */
function wd_menu_toggle() {
    document.getElementById("wd-primary-nav").classList.toggle("show");
}


/**
 *
 * Toggle Product Filter
 *
 */
function filtertoggle() {
    document.getElementById("filter-main").classList.toggle("active");
}

function filterremovetoggle() {
    document.getElementById("filter-main").classList.remove('active');
}

/**
 *
 * Mobile Menu Toggle
 *
 */
jQuery(document).ready(function($){

  $('.primary-nav .menu-item-has-children').children('a')
          .after('<button role="button" class="mob-menu-toggle" id="mob-menu-toggle"><i class="fa fa-chevron-down" aria-hidden="true"></i></button>');

  $('.primary-nav .mob-menu-toggle').on ( 'click', function() {
    $(this).siblings('ul').slideToggle(100);
  });
});

/**
 *
 * Responsive OEmbed for Course Catalog videos
 *
 */
jQuery(document).ready(function($) {
 
  var $all_oembed_videos = $(".llms-loop-item-content iframe[src*='youtube'], .llms-loop-item-content iframe[src*='vimeo'], .llms-loop-item-content iframe[src*='wistia']");
  
  $all_oembed_videos.each(function() {
  
    $(this).removeAttr('height').removeAttr('width').wrap( "<div class='embed-container'></div>" );
  
  });
 
});