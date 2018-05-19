/**
 * File script.js.
 *
 * The main javascript and jQuery file of the theme.
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

/* Toggle Menu Button in Mobile */
function wd_menu_toggle() {
    document.getElementById("wd-primary-nav").classList.toggle("show");
}


/* Toggle Product Filter */
function filtertoggle() {
    document.getElementById("filter-main").classList.toggle("active");
}

function filterremovetoggle() {
    document.getElementById("filter-main").classList.remove('active');
}


/*//////////////// Responsive OEmbed /////////////////*/

jQuery(document).ready(function($) {
 
  var $all_oembed_videos = $("iframe[src*='youtube'], iframe[src*='vimeo'], iframe[src*='wistia']");
  
  $all_oembed_videos.each(function() {
  
    $(this).removeAttr('height').removeAttr('width').wrap( "<div class='embed-container'></div>" );
  
  });
 
});