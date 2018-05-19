/**
 * File customizer-controls.js.
 *
 * Handles the Controls inside the Customizer panel.
 *
 */

(function( $ ) {
    wp.customize.bind( 'ready', function() {
 
    var customize = this;
    customize( 'whitedot_show_product_filter', function( value ) {
 

        var Controls = [
            'whitedot_woo_shop_filter_layout'
        ];

        $.each( Controls, function( index, id ) {
            customize.control( id, function( control ) {
                /**
                 * Toggling function
                 */
                var toggle = function( to ) {
                    control.toggle( to );
                };
 
                // 1. On loading.
                toggle( value.get() );
 
                // 2. On value change.
                value.bind( toggle );
            } );
        } );

    } );

    var customize = this;
    customize( 'whitedot_show_footer_branding', function( value ) {
 

        var Controls = [
            'whitedot_show_footer_social_icons'
        ];

        $.each( Controls, function( index, id ) {
            customize.control( id, function( control ) {
                /**
                 * Toggling function
                 */
                var toggle = function( to ) {
                    control.toggle( to );
                };
 
                // 1. On loading.
                toggle( value.get() );
 
                // 2. On value change.
                value.bind( toggle );
            } );
        } );

    } );

    var customize = this; // Customize object alias.
    customize( 'whitedot_social_facebook', function( value ) {
 

        var Controls = [
            'wd_facebook_url'
        ];

        $.each( Controls, function( index, id ) {
            customize.control( id, function( control ) {
                /**
                 * Toggling function
                 */
                var toggle = function( to ) {
                    control.toggle( to );
                };
 
                // 1. On loading.
                toggle( value.get() );
 
                // 2. On value change.
                value.bind( toggle );
            } );
        } );

    } );

    var customize = this; // Customize object alias.
    customize( 'whitedot_social_twitter', function( value ) {
 

        var Controls = [
            'wd_twitter_url'
        ];

        $.each( Controls, function( index, id ) {
            customize.control( id, function( control ) {
                /**
                 * Toggling function
                 */
                var toggle = function( to ) {
                    control.toggle( to );
                };
 
                // 1. On loading.
                toggle( value.get() );
 
                // 2. On value change.
                value.bind( toggle );
            } );
        } );

    } );

    var customize = this; // Customize object alias.
    customize( 'whitedot_social_instagram', function( value ) {
 

        var Controls = [
            'wd_instagram_url'
        ];

        $.each( Controls, function( index, id ) {
            customize.control( id, function( control ) {
                /**
                 * Toggling function
                 */
                var toggle = function( to ) {
                    control.toggle( to );
                };
 
                // 1. On loading.
                toggle( value.get() );
 
                // 2. On value change.
                value.bind( toggle );
            } );
        } );

    } );

    var customize = this; // Customize object alias.
    customize( 'whitedot_social_google', function( value ) {
 

        var Controls = [
            'wd_google_url'
        ];

        $.each( Controls, function( index, id ) {
            customize.control( id, function( control ) {
                /**
                 * Toggling function
                 */
                var toggle = function( to ) {
                    control.toggle( to );
                };
 
                // 1. On loading.
                toggle( value.get() );
 
                // 2. On value change.
                value.bind( toggle );
            } );
        } );

    } );

    var customize = this; // Customize object alias.
    customize( 'whitedot_social_pintrest', function( value ) {
 

        var Controls = [
            'wd_pintrest_url'
        ];

        $.each( Controls, function( index, id ) {
            customize.control( id, function( control ) {
                /**
                 * Toggling function
                 */
                var toggle = function( to ) {
                    control.toggle( to );
                };
 
                // 1. On loading.
                toggle( value.get() );
 
                // 2. On value change.
                value.bind( toggle );
            } );
        } );

    } );

    var customize = this; // Customize object alias.
    customize( 'whitedot_social_youtube', function( value ) {
 

        var Controls = [
            'wd_youtube_url'
        ];

        $.each( Controls, function( index, id ) {
            customize.control( id, function( control ) {
                /**
                 * Toggling function
                 */
                var toggle = function( to ) {
                    control.toggle( to );
                };
 
                // 1. On loading.
                toggle( value.get() );
 
                // 2. On value change.
                value.bind( toggle );
            } );
        } );

    } );

} );
})( jQuery );