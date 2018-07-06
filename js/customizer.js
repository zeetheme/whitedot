/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-name' ).text( to );
      $( '.wd-footer-title span' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
      $( '.footer-site-description' ).text( to );
		} );
	} );

  //Hide Tagline
  wp.customize( 'whitedot_hide_tagline', function( value ) {
      value.bind( function( to ) {
        if (to === true){
          $( '.site-description' ).css( {
                  'display': 'none'
          } );
           $( '.site-branding' ).css( {
                  'padding-top': '20px'
          } );
        }else{
          $( '.site-description' ).css( {
                  'display': 'block'
          } );
           $( '.site-branding' ).css( {
                  'padding-top': '10px'
          } );
        }
      } );
  });

	// Header text color.
	wp.customize( 'header_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-name, .site-description, .primary-nav li a, .wd-cart a, .wd-cart-mob a' ).css( {
					'color': to
				} );
		} );
	} );

	// Body Text color.
	wp.customize( 'whitedot_body_text_color', function( value ) {
        value.bind( function( to ) {
            $( 'body' ).css( {
                    'color': to
            } );
        } );
  	});

	// Header(h1,h2,h3 .... ) color.
	wp.customize( 'whitedot_header_color', function( value ) {
        value.bind( function( to ) {
            $( 'h1, h2, h3, h4, h5, h6' ).css( {
                    'color': to
            } );
        } );
  	});

  	// Link color.
	wp.customize( 'whitedot_link_color', function( value ) {
        value.bind( function( to ) {
            $( 'a' ).css( {
                    'color': to
            } );
        } );
  	});

    // Body Font Size
  wp.customize( 'whitedot_body_text_font_size', function( value ) {
        value.bind( function( to ) {
            $( 'body' ).css( {
                    'font-size': to + 'px'
            } );
        } );
    });

  	// Body Line Height
	wp.customize( 'whitedot_body_text_line_height', function( value ) {
        value.bind( function( to ) {
            $( 'body' ).css( {
                    'line-height': to / 10
            } );
        } );
  	});
	
} )( jQuery );
