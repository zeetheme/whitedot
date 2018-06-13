<?php
/**
 * Whitedot Setup
 */

if ( ! function_exists( 'whitedot_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function whitedot_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WhiteDot, use a find and replace
		 * to change 'whitedot' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'whitedot', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'whitedot' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Set up the WordPress core custom header feature.
		 */
		add_theme_support( 'custom-header', apply_filters( 'whitedot_custom_header_args', array(
			'width'                  => 1000,
			'height'                 => 200,
			'flex-height'            => true,
			'flex-width'             => true,
		) ) );


		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'whitedot_custom_background_args', array(
			'default-color' => 'e9e9e9',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 200,
			'width'       => 800,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// declare that your theme supports LifterLMS Quizzes
		add_theme_support( 'lifterlms-quizzes' );
	}
endif;


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function whitedot_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'whitedot_content_width', 640 );
}


/**
 * Register main widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function whitedot_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'whitedot' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Displays on the side of pages and posts with a sidebar.', 'whitedot' ),
		'before_widget' => '<div div id="%1$s" class="wd-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="wd-widget-heading">',
		'after_title'   => '</h2>',
	) );
}


/**
 * Register footer widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function whitedot_footer_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'whitedot' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'Displays widgets in the footer of pages and posts.', 'whitedot' ),
		'before_widget' => '<div div id="%1$s" class="wd-footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="wd-footer-widget-heading">',
		'after_title'   => '</h2>',
	) );
}


/**
 * Register cart widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function whitedot_woo_product_filter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Product Filter Widgets', 'whitedot' ),
		'id'            => 'whitedot-product-filter',
		'description'   => esc_html__( 'This widget displays Product Filter on your shop page. You can add Woocommerce product filter widgets here.', 'whitedot' ),
		'before_widget' => '<div div id="%1$s" class="wd-product-filter %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="wd-product-filter-heading">',
		'after_title'   => '</h2>',
	) );
}


/**
 * Adds a responsive embed wrapper around oEmbed content
 *
 * @param  string $html The oEmbed markup.
 * @param  string $url The URL being embedded.
 * @param  array  $attr An array of attributes.
 *
 * @return string       Updated embed markup.
 */
function responsive_oembed_wrapper( $html, $url, $attr ) {

	$add_whitedot_oembed_wrapper = apply_filters( 'whitedot_responsive_oembed_wrapper_enable', true );

	$allowed_providers = apply_filters(
		'whitedot_allowed_fullwidth_oembed_providers', array(
			'vimeo.com',
			'youtube.com',
			'youtu.be',
			'wistia.com',
			'wistia.net',
			'dailymotion.com',
		)
	);


	if ( $add_whitedot_oembed_wrapper ) {
		$html = ( '' !== $html ) ? '<div class="embed-container">' . $html . '</div>' : '';
	}


	return $html;
}

add_filter( 'embed_oembed_html', 'responsive_oembed_wrapper' , 10, 3 );

