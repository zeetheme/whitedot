<?php
/**
 * WhiteDot Customizer Functions
 *
 */

/**
 * Whitedot blog grid wrap
 *
 * @since 1.0.0
 */
add_action('template_redirect', 'whitedot_show_blog_grid_wrap');
function whitedot_show_blog_grid_wrap()
{
	if( 'style-2' === get_theme_mod( 'whitedot_blog_home_layout' ) ) {
        if ( !is_front_page() && is_home() ) {
    		add_action('whitedot_home_loop_before','whitedot_blog_grid_wrap_start', 10);
    		add_action('whitedot_blog_home_pagination','whitedot_blog_grid_wrap_end', 5);
        }
	}
}

/**
 * Whitedot blog grid wrap start
 *
 * @since 1.0.0
 */
function whitedot_blog_grid_wrap_start(){

	?>
		<div class="wd-blog-grid col-<?php echo get_theme_mod('whitedot_blog_home_grid_culmn', 2 ); ?>">
	<?php

}

/**
 * Whitedot blog grid wrap end
 *
 * @since 1.0.0
 */
function whitedot_blog_grid_wrap_end(){

	?>
		</div><!-- .wd-blog-grid -->
	<?php

}


/**
 * Whitedot Customizer Google Fonts
 *
 * @since 1.0.0
 */
function whitedot_customizer_google_fonts() {

	if( 'font-2' === get_theme_mod( 'whitedot_google_fonts' ) ) {  

        wp_enqueue_style( 'whitedot-google-font-ABeeZee', 'https://fonts.googleapis.com/css?family=ABeeZee', false );

    }elseif ('font-3' === get_theme_mod( 'whitedot_google_fonts' ) ) { 

        wp_enqueue_style( 'whitedot-google-font-Abel', 'https://fonts.googleapis.com/css?family=Abel', false );

    }elseif ('font-4' === get_theme_mod( 'whitedot_google_fonts' ) ) {

        wp_enqueue_style( 'whitedot-google-font-Actor', 'https://fonts.googleapis.com/css?family=Actor', false );

    }elseif ('font-5' === get_theme_mod( 'whitedot_google_fonts' ) ) { 

        wp_enqueue_style( 'whitedot-google-font-Advent-Pro', 'https://fonts.googleapis.com/css?family=Advent+Pro', false );

    }elseif ('font-6' === get_theme_mod( 'whitedot_google_fonts' ) ) {

        wp_enqueue_style( 'whitedot-google-font-Anaheim', 'https://fonts.googleapis.com/css?family=Anaheim', false );

    }elseif ('font-7' === get_theme_mod( 'whitedot_google_fonts' ) ) { 

        wp_enqueue_style( 'whitedot-google-font-Andada', 'https://fonts.googleapis.com/css?family=Andada', false );

    }elseif ('font-8' === get_theme_mod( 'whitedot_google_fonts' ) ) { 

        wp_enqueue_style( 'whitedot-google-font-Bad-Script', 'https://fonts.googleapis.com/css?family=Bad+Script', false );

    }elseif ('font-9' === get_theme_mod( 'whitedot_google_fonts' ) ) { 

        wp_enqueue_style( 'whitedot-google-font-Barlow', 'https://fonts.googleapis.com/css?family=Barlow', false );

    }elseif ('font-10' === get_theme_mod( 'whitedot_google_fonts' ) ) { 

        wp_enqueue_style( 'whitedot-google-font-Bellefair', 'https://fonts.googleapis.com/css?family=Bellefair', false );

    }elseif ('font-11' === get_theme_mod( 'whitedot_google_fonts' ) ) { 

        wp_enqueue_style( 'whitedot-google-font-BenchNine', 'https://fonts.googleapis.com/css?family=BenchNine', false );

    }elseif ('font-12' === get_theme_mod( 'whitedot_google_fonts' ) ) { 

        wp_enqueue_style( 'whitedot-google-font-Bubbler-One', 'https://fonts.googleapis.com/css?family=Bubbler+One', false );

    }elseif ('font-13' === get_theme_mod( 'whitedot_google_fonts' ) ) { 

        wp_enqueue_style( 'whitedot-google-font-Cabin', 'https://fonts.googleapis.com/css?family=Cabin', false );

    }elseif ('font-14' === get_theme_mod( 'whitedot_google_fonts' ) ) { 

        wp_enqueue_style( 'whitedot-google-font-Cairo', 'https://fonts.googleapis.com/css?family=Cairo', false );

    }elseif ('font-15' === get_theme_mod( 'whitedot_google_fonts' ) ) { 

        wp_enqueue_style( 'whitedot-google-font-Capriola', 'https://fonts.googleapis.com/css?family=Capriola', false );

    }elseif ('font-16' === get_theme_mod( 'whitedot_google_fonts' ) ) { 

        wp_enqueue_style( 'whitedot-google-font-Catamaran', 'https://fonts.googleapis.com/css?family=Catamaran', false );

    }elseif ('font-17' === get_theme_mod( 'whitedot_google_fonts' ) ) { 

        wp_enqueue_style( 'whitedot-google-font-Chathura', 'https://fonts.googleapis.com/css?family=Chathura', false );

    }elseif ('font-18' === get_theme_mod( 'whitedot_google_fonts' ) ) { 

        wp_enqueue_style( 'whitedot-google-font-Delius', 'https://fonts.googleapis.com/css?family=Delius', false );

    }elseif ('font-19' === get_theme_mod( 'whitedot_google_fonts' ) ) { 

        wp_enqueue_style( 'whitedot-google-font-Delius-Swash-Caps', 'https://fonts.googleapis.com/css?family=Delius+Swash+Caps', false );

    }elseif ('font-20' === get_theme_mod( 'whitedot_google_fonts' ) ) { 

        wp_enqueue_style( 'whitedot-google-font-Didact-Gothic', 'https://fonts.googleapis.com/css?family=Didact+Gothic', false );

    }elseif ('font-21' === get_theme_mod( 'whitedot_google_fonts' ) ) { 

        wp_enqueue_style( 'whitedot-google-font-Dosis', 'https://fonts.googleapis.com/css?family=Dosis', false );

    }else{
        wp_enqueue_style( 'whitedot_google_fonts', 'https://fonts.googleapis.com/css?family=Varela+Round', false ); 
    }

}


/**
 * Whitedot Show Footer Branding
 *
 * @since 1.0.0
 */
add_action('template_redirect', 'whitedot_display_footer_branding');
function whitedot_display_footer_branding()
{
    if ( 0 == get_theme_mod( 'whitedot_show_footer_branding', 1 ) ) { 

    }else{

        add_action('whitedot_footer_content','whitedot_footer_branding', 10);
    }
}


/**
 * Whitedot Show Footer Social Icons
 *
 * @since 1.0.0
 */
add_action('template_redirect', 'whitedot_display_footer_social_icons');
function whitedot_display_footer_social_icons()
{
    if ( 1 == get_theme_mod( 'whitedot_show_footer_social_icons', 0 ) ) { 
        
        add_action('whitedot_footer_branding_content','whitedot_footer_social_links', 30);
    }
}


/**
 * Whitedot Blog Pagination Style
 *
 * @since 1.0.0
 */
add_action('template_redirect', 'whitedot_customizer_pagination_style');
function whitedot_customizer_pagination_style()
{
    if( 'next-prev' === get_theme_mod( 'whitedot_blog_home_pagination_style' ) ) { 

        remove_action( 'whitedot_blog_home_pagination', 'whitedot_blog_home_number_pagination', 10 );
        add_action( 'whitedot_blog_home_pagination', 'whitedot_blog_home_icon_pagination', 10 );
    }else{
        add_action( 'whitedot_blog_home_pagination', 'whitedot_blog_home_number_pagination', 10 );
        remove_action( 'whitedot_blog_home_pagination', 'whitedot_blog_home_icon_pagination', 10 );
    }
}

/**
 * LifterLMS Dashboard sidebar layout
 *
 * @since 1.0.0
 */
add_action('lifterlms_before_student_dashboard_content', 'whitedot_llms_dashboard_custom_css', 1);
function whitedot_llms_dashboard_custom_css()
{
   do_action( 'whitedot_dashboard_style' );
}

/**
 * LifterLMS Dashboard sidebar layout
 *
 * @since 1.0.0
 */
add_action('whitedot_dashboard_style', 'whitedot_llms_dashboard_sidebar_css', 1);
function whitedot_llms_dashboard_sidebar_css()
{
   ?>
   <style type="text/css">
        <?php if( 'sidebarleft' === get_theme_mod( 'whitedot_llms_dashboard_sidebar_layout' ) ) { ?> 

        @media (min-width: 768px){
            .has-sidebar #primary {
                float: right!important;
                width: 68%;
            }

            .has-sidebar .secondary {
                float: left!important;
                display: block;
            }
        }

        <?php } elseif( 'sidebarright' === get_theme_mod( 'whitedot_llms_dashboard_sidebar_layout' ) ) { ?> 

        @media (min-width: 768px){
            .has-sidebar #primary {
                float: left!important;
                width: 68%;
            }

            .has-sidebar .secondary {
                float: right!important;
                display: block;
            }
        }

        <?php } else { ?> 

            .has-sidebar #primary {
                float: none!important;
                width: 100%!important;
            }

            .has-sidebar .secondary {
                display: none;
            }

        <?php } ?>
   </style>
   <?php
}

