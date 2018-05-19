<?php
/**
 * WhiteDot Theme Customizer
 *
 * @package WhiteDot
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function whitedot_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting('custom_logo')->transport =  'refresh';
	$wp_customize->remove_control( 'header_textcolor' );
	$wp_customize->remove_control('display_header_text');
	//Background
    $wp_customize->get_control( 'background_color' )->section   = 'background_image';
    $wp_customize->get_section( 'background_image' )->title     = __( 'Background', 'whitedot' );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'whitedot_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'whitedot_customize_partial_blogdescription',
		) );
	}

	//Header Section
    
    $wp_customize->add_section( 'whitedot_header_settings_section' , array(
        'title'      => __('Header Settings','whitedot'),
        'priority'   => 20,
    ) );

    $wp_customize->get_control( 'header_image' )->section   = 'whitedot_header_settings_section';

    $wp_customize->add_setting( 'header_text_color' , array(
        'transport'  => 'postMessage',
        'default'    =>  '#666',
        'sanitize_callback' => 'whitedot_sanitize_hex_color',
        
        )
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
        $wp_customize, 
        'header_text_color', 
        array(
            'label'      => __( 'Header Text Color', 'whitedot' ),
            'section'    => 'whitedot_header_settings_section',
            'settings'   => 'header_text_color',
        ) ) 
    );

    $wp_customize->add_setting( 'header_styles' , array(
        'default' => 'style-1',
        'sanitize_callback' => 'whitedot_sanitize_choice',
        
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'header_styles',
            array(
                'label'          => __( 'Header Styles', 'whitedot' ),
                'section'        => 'whitedot_header_settings_section',
                'settings'       => 'header_styles',
                'type'           => 'select',
                'choices'        => array(
                    'style-1'      => 'Default',
                    'style-2'       => 'Centered'
                )
            )
        )
    );

    //Color Settings
    
    $wp_customize->add_section( 'whitedot_color_settings_section' , array(
        'title'      => __('Colors','whitedot'),
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'whitedot_body_text_color' , array(
        'transport'  => 'postMessage',
        'default'    =>  '#333',
        'sanitize_callback' => 'whitedot_sanitize_hex_color',
        
        )
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
        $wp_customize, 
        'whitedot_body_text_color', 
        array(
            'label'      => __( 'Text Color', 'whitedot' ),
            'section'    => 'whitedot_color_settings_section',
        ) ) 
    );

    $wp_customize->add_setting( 'whitedot_header_color' , array(
        'transport'  => 'postMessage',
        'default'    =>  '#777',
        'sanitize_callback' => 'whitedot_sanitize_hex_color',
        
        )
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
        $wp_customize, 
        'whitedot_header_color', 
        array(
            'label'      => __( 'Header Color', 'whitedot' ),
            'section'    => 'whitedot_color_settings_section',
        ) ) 
    );

    $wp_customize->add_setting( 'whitedot_link_color' , array(
        'transport'  => 'refresh',
        'default'    =>  '#e5554e',
        'sanitize_callback' => 'whitedot_sanitize_hex_color',
        
        )
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
        $wp_customize, 
        'whitedot_link_color', 
        array(
            'label'      => __( 'Link Color', 'whitedot' ),
            'section'    => 'whitedot_color_settings_section',
        ) ) 
    );

    $wp_customize->add_setting( 'whitedot_link_hover_color' , array(
        'transport'  => 'refresh',
        'default'    =>  '#c53f38',
        'sanitize_callback' => 'whitedot_sanitize_hex_color',
        
        )
    );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
        $wp_customize, 
        'whitedot_link_hover_color', 
        array(
            'label'      => __( 'Link Hover Color', 'whitedot' ),
            'section'    => 'whitedot_color_settings_section',
        ) ) 
    );


    //Typography
    $wp_customize->add_section( 'whitedot_typography_settings_section' , array(
        'title'      => __('Typography','whitedot'),
        'priority'   => 40,
    ) );

    $wp_customize->add_setting( 'whitedot_google_fonts' , array(
        'default' => 'font-1',
        'sanitize_callback' => 'whitedot_sanitize_choice',
        
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'whitedot_google_fonts',
            array(
                'label'          => __( 'Font', 'whitedot' ),
                'section'        => 'whitedot_typography_settings_section',
                'settings'       => 'whitedot_google_fonts',
                'type'           => 'select',
                'choices'        => array(
                    'font-1'    => 'Default Font',
                    'font-2'    => 'ABeeZee',
                    'font-3'       => 'Abel',
                    'font-4'      => 'Actor',
                    'font-5'       => 'Advent Pro',
                    'font-6'       => 'Anaheim',
                    'font-7'       => 'Andada',
                    'font-8'       => 'Bad Script',
                    'font-9'       => 'Barlow',
                    'font-10'       => 'Bellefair',
                    'font-11'       => 'BenchNine',
                    'font-12'       => 'Bubbler One',
                    'font-13'       => 'Cabin',
                    'font-14'       => 'Cairo',
                    'font-15'       => 'Capriola',
                    'font-16'       => 'Catamaran',
                    'font-17'       => 'Chathura',
                    'font-18'       => 'Delius',
                    'font-19'   => 'Delius Swash Caps',
                    'font-20'       => 'Didact Gothic',
                    'font-21'       => 'Dosis',
                )
            )
        )
    );

    $wp_customize->add_setting( 'whitedot_body_text_font_size',
       array(
          'default' => 16,
          'transport' => 'postMessage',
          'sanitize_callback' => 'whitedot_sanitize_integer'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Slider_Custom_Control( $wp_customize, 'whitedot_body_text_font_size',
       array(
          'label' => esc_html__( 'Body Font Size', 'whitedot' ),
          'section' => 'whitedot_typography_settings_section',
          'input_attrs' => array(
             'min' => 1, 
             'max' => 25, 
             'step' => 1, 
          ),
       )
    ) );

    $wp_customize->add_setting( 'whitedot_body_text_line_height',
       array(
          'default' => 16,
          'transport' => 'postMessage',
          'sanitize_callback' => 'whitedot_sanitize_integer'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Slider_Custom_Control( $wp_customize, 'whitedot_body_text_line_height',
       array(
          'label' => esc_html__( 'Line Height', 'whitedot' ),
          'section' => 'whitedot_typography_settings_section',
          'input_attrs' => array(
             'min' => 10,
             'max' => 40,
             'step' => 1,
          ),
       )
    ) );




    //SideBar Section
    $wp_customize->add_section( 'whitedot_sidebar_settings_section' , array(
        'title'      => __('Sidebar Settings','whitedot'),
        'priority'   => 50,
    ) );

    $wp_customize->add_setting( 'whitedot_page_sidebar_layout',
       array(
          'default' => 'sidebarright',
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_text_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Image_Radio_Button_Custom_Control( $wp_customize, 'whitedot_page_sidebar_layout',
       array(
          'label' => __( 'Page Sidebar Layout', 'whitedot' ),
          'section' => 'whitedot_sidebar_settings_section',
          'choices' => array(
             'sidebarleft' => array(
                'image' =>  get_template_directory_uri() . '/img/left-sidebar.png', 
                'name' => __( 'Left Sidebar', 'whitedot' ) 
             ),
             'sidebarnone' => array(
                'image' => get_template_directory_uri() . '/img/fullwidth.png',
                'name' => __( 'No Sidebar', 'whitedot' )
             ),
             'sidebarright' => array(
                'image' => get_template_directory_uri() . '/img/right-sidebar.png',
                'name' => __( 'Right Sidebar', 'whitedot' )
             )
          )
       )
    ) );

    $wp_customize->add_setting( 'whitedot_sidebar_styles' , array(
        'default' => 'style-1',
        'sanitize_callback' => 'whitedot_sanitize_choice',
        
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'whitedot_sidebar_styles',
            array(
                'label'          => __( 'Sidebar Styles', 'whitedot' ),
                'section'        => 'whitedot_sidebar_settings_section',
                'settings'       => 'whitedot_sidebar_styles',
                'type'           => 'select',
                'choices'        => array(
                    'style-1'      => 'Default style',
                    'style-2'       => 'Style 2',
                    'style-3'       => 'Style 3'
                )
            )
        )
    );

    /*////////////////////////////////////////////////////////////////////////
                                    Blog Panel                               
    ////////////////////////////////////////////////////////////////////////*/

    $wp_customize->add_panel( 'whitedot_blog_panel' , array(
        'priority' => 60,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Blog Settings', 'whitedot' ),
        
        )
    );

    //Blog Home/Archive
    $wp_customize->add_section( 'whitedot_blog_archive_section' , array(
        'title'      => __('Blog Home/Archive','whitedot'),
        'priority'   => 10,
        'panel'        => 'whitedot_blog_panel',
    ) );

    $wp_customize->add_setting( 'whitedot_blog_archive_sidebar_layout',
       array(
          'default' => 'sidebarright',
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_text_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Image_Radio_Button_Custom_Control( $wp_customize, 'whitedot_blog_archive_sidebar_layout',
       array(
          'label' => __( 'Sidebar Layout', 'whitedot' ),
          'section' => 'whitedot_blog_archive_section',
          'choices' => array(
             'sidebarleft' => array(  
                'image' =>  get_template_directory_uri() . '/img/left-sidebar.png',
                'name' => __( 'Left Sidebar', 'whitedot' ) //
             ),
             'sidebarnone' => array(
                'image' => get_template_directory_uri() . '/img/fullwidth.png',
                'name' => __( 'No Sidebar', 'whitedot' )
             ),
             'sidebarright' => array(
                'image' => get_template_directory_uri() . '/img/right-sidebar.png',
                'name' => __( 'Right Sidebar', 'whitedot' )
             )
          )
       )
    ) );

    $wp_customize->add_setting( 'whitedot_blog_home_layout' , array(
        'default' => 'style-1',
        'sanitize_callback' => 'whitedot_sanitize_choice',
        
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'whitedot_blog_home_layout',
            array(
                'label'          => __( 'Blog Layout', 'whitedot' ),
                'section'        => 'whitedot_blog_archive_section',
                'settings'       => 'whitedot_blog_home_layout',
                'type'           => 'select',
                'choices'        => array(
                    'style-1'      => 'Full Width(Default)',
                    'style-2'       => 'Grid'
                )
            )
        )
    );

    $wp_customize->add_setting( 'whitedot_blog_home_grid_culmn',
       array(
          'default' => 2,
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_sanitize_integer'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Slider_Custom_Control( $wp_customize, 'whitedot_blog_home_grid_culmn',
       array(
          'label' => esc_html__( 'Grid Columns', 'whitedot' ),
          'section' => 'whitedot_blog_archive_section',
          'input_attrs' => array(
             'min' => 1, 
             'max' => 4, 
             'step' => 1, 
          ),
       )
    ) );

    $wp_customize->add_setting( 'whitedot_blog_home_metadate' , array(
        'transport' => 'refresh',
        'default'    =>  'true',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'whitedot_blog_home_metadate',
            array(
                'label'          => __( 'Show Meta Date', 'whitedot' ),
                'section'        => 'whitedot_blog_archive_section',
                'type'           => 'checkbox',
                
            )
        )
    );

    $wp_customize->add_setting( 'whitedot_blog_home_metaauthor' , array(
        'transport' => 'refresh',
        'default'    =>  'true',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'whitedot_blog_home_metaauthor',
            array(
                'label'          => __( 'Show Meta Author', 'whitedot' ),
                'section'        => 'whitedot_blog_archive_section',
                'type'           => 'checkbox',
                
            )
        )
    );

    $wp_customize->add_setting( 'whitedot_blog_home_pagination_style',
       array(
          'default' => 'page-num',
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_sanitize_choice'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Text_Radio_Button_Custom_Control( $wp_customize, 'whitedot_blog_home_pagination_style',
       array(
          'label' => __( 'Pageination Style', 'whitedot' ),
          'section' => 'whitedot_blog_archive_section',
          'choices' => array(
             'next-prev' => __( 'Next-Previous', 'whitedot' ), 
             'page-num' => __( 'Page Numbers', 'whitedot' )
          )
       )
    ) );

    //Single Post
    $wp_customize->add_section( 'whitedot_blog_single_section' , array(
        'title'      => __('Single Post','whitedot'),
        'priority'   => 20,
        'panel'        => 'whitedot_blog_panel',
    ) );

    $wp_customize->add_setting( 'whitedot_blog_single_sidebar_layout',
       array(
          'default' => 'sidebarright',
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_text_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Image_Radio_Button_Custom_Control( $wp_customize, 'whitedot_blog_single_sidebar_layout',
       array(
          'label' => __( 'Sidebar Layout', 'whitedot' ),
          'section' => 'whitedot_blog_single_section',
          'choices' => array(
             'sidebarleft' => array(  
                'image' =>  get_template_directory_uri() . '/img/left-sidebar.png',
                'name' => __( 'Left Sidebar', 'whitedot' ) //
             ),
             'sidebarnone' => array(
                'image' => get_template_directory_uri() . '/img/fullwidth.png',
                'name' => __( 'No Sidebar', 'whitedot' )
             ),
             'sidebarright' => array(
                'image' => get_template_directory_uri() . '/img/right-sidebar.png',
                'name' => __( 'Right Sidebar', 'whitedot' )
             )
          )
       )
    ) );

    $wp_customize->add_setting( 'whitedot_blog_single_metadate' , array(
        'transport' => 'refresh',
        'default'    =>  'true',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'whitedot_blog_single_metadate',
            array(
                'label'          => __( 'Show Meta Date', 'whitedot' ),
                'section'        => 'whitedot_blog_single_section',
                'type'           => 'checkbox',
                
            )
        )
    );

    $wp_customize->add_setting( 'whitedot_blog_single_metaauthor' , array(
        'transport' => 'refresh',
        'default'    =>  'true',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'whitedot_blog_single_metaauthor',
            array(
                'label'          => __( 'Show Meta Author', 'whitedot' ),
                'section'        => 'whitedot_blog_single_section',
                'type'           => 'checkbox',
                
            )
        )
    );

    $wp_customize->add_setting( 'whitedot_blog_single_metacategory' , array(
        'transport' => 'refresh',
        'default'    =>  'true',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'whitedot_blog_single_metacategory',
            array(
                'label'          => __( 'Show Meta Category', 'whitedot' ),
                'section'        => 'whitedot_blog_single_section',
                'type'           => 'checkbox',
                
            )
        )
    );


    /*////////////////////////////////////////////////////////////////////////
                                    WooCommerce Panel                               
    ////////////////////////////////////////////////////////////////////////*/

    $wp_customize->add_panel( 'whitedot_woocommerce_panel' , array(
        'priority' => 70,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'WooCommerce Settings', 'whitedot' ),
        
        )
    );

    //WooCommerce General
    $wp_customize->add_section( 'whitedot_woocommerce_general_section' , array(
        'title'      => __('General','whitedot'),
        'priority'   => 10,
        'panel'        => 'whitedot_woocommerce_panel',
    ) );

    $wp_customize->add_setting( 'whitedot_show_cart_in_header',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_switch_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Toggle_Switch_Custom_control( $wp_customize, 'whitedot_show_cart_in_header',
       array(
          'label' => esc_html__( 'Header Mini Cart', 'whitedot' ),
          'section' => 'whitedot_woocommerce_general_section'
       )
    ) );

    //WooCommerce Shop
    $wp_customize->add_section( 'whitedot_woocommerce_shop_section' , array(
        'title'      => __('Shop','whitedot'),
        'priority'   => 20,
        'panel'        => 'whitedot_woocommerce_panel',
    ) );

    $wp_customize->add_setting( 'whitedot_woo_shop_sidebar_layout',
       array(
          'default' => 'sidebarnone',
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_text_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Image_Radio_Button_Custom_Control( $wp_customize, 'whitedot_woo_shop_sidebar_layout',
       array(
          'label' => __( 'Sidebar Layout', 'whitedot' ),
          'section' => 'whitedot_woocommerce_shop_section',
          'choices' => array(
             'sidebarleft' => array(  
                'image' =>  get_template_directory_uri() . '/img/left-sidebar.png',
                'name' => __( 'Left Sidebar', 'whitedot' ) //
             ),
             'sidebarnone' => array(
                'image' => get_template_directory_uri() . '/img/fullwidth.png',
                'name' => __( 'No Sidebar', 'whitedot' )
             ),
             'sidebarright' => array(
                'image' => get_template_directory_uri() . '/img/right-sidebar.png',
                'name' => __( 'Right Sidebar', 'whitedot' )
             )
          )
       )
    ) );

    $wp_customize->add_setting( 'whitedot_woo_product_columns',
       array(
          'default' => 3,
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_sanitize_integer'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Slider_Custom_Control( $wp_customize, 'whitedot_woo_product_columns',
       array(
          'label' => esc_html__( 'Product Columns', 'whitedot' ),
          'section' => 'whitedot_woocommerce_shop_section',
          'input_attrs' => array(
             'min' => 1, 
             'max' => 6, 
             'step' => 1, 
          ),
       )
    ) );

    $wp_customize->add_setting( 'whitedot_shop_products_per_page',
       array(
          'default' => 12,
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_sanitize_integer'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Slider_Custom_Control( $wp_customize, 'whitedot_shop_products_per_page',
       array(
          'label' => esc_html__( 'Product Per Page ', 'whitedot' ),
          'section' => 'whitedot_woocommerce_shop_section',
          'input_attrs' => array(
             'min' => 1, 
             'max' => 50, 
             'step' => 1, 
          ),
       )
    ) );

    $wp_customize->add_setting( 'whitedot_show_add_to_cart',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_switch_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Toggle_Switch_Custom_control( $wp_customize, 'whitedot_show_add_to_cart',
       array(
          'label' => esc_html__( 'Show Add to Cart Button', 'whitedot' ),
          'section' => 'whitedot_woocommerce_shop_section'
       )
    ) );

    $wp_customize->add_setting( 'whitedot_show_product_filter',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_switch_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Toggle_Switch_Custom_control( $wp_customize, 'whitedot_show_product_filter',
       array(
          'label' => esc_html__( 'Show Product Filter', 'whitedot' ),
          'section' => 'whitedot_woocommerce_shop_section'
       )
    ) );

    $wp_customize->add_setting( 'whitedot_woo_shop_filter_layout',
       array(
          'default' => 'right',
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_sanitize_choice'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Text_Radio_Button_Custom_Control( $wp_customize, 'whitedot_woo_shop_filter_layout',
       array(
          'label' => __( 'Shop Filter Layout', 'whitedot' ),
          'section' => 'whitedot_woocommerce_shop_section',
          'choices' => array(
             'left' => __( 'Left', 'whitedot' ), 
             'right' => __( 'Right', 'whitedot' )
          )
       )
    ) );

    //WooCommerce Single Product
    $wp_customize->add_section( 'whitedot_woocommerce_single_product_section' , array(
        'title'      => __('Single Product','whitedot'),
        'priority'   => 30,
        'panel'        => 'whitedot_woocommerce_panel',
    ) );

    $wp_customize->add_setting( 'whitedot_woo_single_product_sidebar_layout',
       array(
          'default' => 'sidebarnone',
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_text_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Image_Radio_Button_Custom_Control( $wp_customize, 'whitedot_woo_single_product_sidebar_layout',
       array(
          'label' => __( 'Sidebar Layout', 'whitedot' ),
          'section' => 'whitedot_woocommerce_single_product_section',
          'choices' => array(
             'sidebarleft' => array(
                'image' =>  get_template_directory_uri() . '/img/left-sidebar.png', 
                'name' => __( 'Left Sidebar', 'whitedot' ) 
             ),
             'sidebarnone' => array(
                'image' => get_template_directory_uri() . '/img/fullwidth.png',
                'name' => __( 'No Sidebar', 'whitedot' )
             ),
             'sidebarright' => array(
                'image' => get_template_directory_uri() . '/img/right-sidebar.png',
                'name' => __( 'Right Sidebar', 'whitedot' )
             )
          )
       )
    ) );

    $wp_customize->add_setting( 'whitedot_woo_related_product_column',
       array(
          'default' => 3,
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_sanitize_integer'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Slider_Custom_Control( $wp_customize, 'whitedot_woo_related_product_column',
       array(
          'label' => esc_html__( 'Related Product Columns', 'whitedot' ),
          'section' => 'whitedot_woocommerce_single_product_section',
          'input_attrs' => array(
             'min' => 1, 
             'max' => 6, 
             'step' => 1, 
          ),
       )
    ) );

    $wp_customize->add_setting( 'whitedot_woo_related_product_per_page',
       array(
          'default' => 3,
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_sanitize_integer'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Slider_Custom_Control( $wp_customize, 'whitedot_woo_related_product_per_page',
       array(
          'label' => esc_html__( 'Related Product Per Page', 'whitedot' ),
          'section' => 'whitedot_woocommerce_single_product_section',
          'input_attrs' => array(
             'min' => 1, 
             'max' => 12, 
             'step' => 1, 
          ),
       )
    ) );

    //WooCommerce Cart
    $wp_customize->add_section( 'whitedot_woocommerce_cart_section' , array(
        'title'      => __('Cart','whitedot'),
        'priority'   => 40,
        'panel'        => 'whitedot_woocommerce_panel',
    ) );

    $wp_customize->add_setting( 'whitedot_woo_cart_sidebar_layout',
       array(
          'default' => 'sidebarnone',
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_text_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Image_Radio_Button_Custom_Control( $wp_customize, 'whitedot_woo_cart_sidebar_layout',
       array(
          'label' => __( 'Sidebar Layout', 'whitedot' ),
          'section' => 'whitedot_woocommerce_cart_section',
          'choices' => array(
             'sidebarleft' => array(
                'image' =>  get_template_directory_uri() . '/img/left-sidebar.png', 
                'name' => __( 'Left Sidebar', 'whitedot' )
             ),
             'sidebarnone' => array(
                'image' => get_template_directory_uri() . '/img/fullwidth.png',
                'name' => __( 'No Sidebar', 'whitedot' )
             ),
             'sidebarright' => array(
                'image' => get_template_directory_uri() . '/img/right-sidebar.png',
                'name' => __( 'Right Sidebar', 'whitedot' )
             )
          )
       )
    ) );

    //WooCommerce Checkout
    $wp_customize->add_section( 'whitedot_woocommerce_checkout_section' , array(
        'title'      => __('Checkout','whitedot'),
        'priority'   => 40,
        'panel'        => 'whitedot_woocommerce_panel',
    ) );

    $wp_customize->add_setting( 'whitedot_woo_checkout_sidebar_layout',
       array(
          'default' => 'sidebarright',
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_text_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Image_Radio_Button_Custom_Control( $wp_customize, 'whitedot_woo_checkout_sidebar_layout',
       array(
          'label' => __( 'Sidebar Layout', 'whitedot' ),
          'section' => 'whitedot_woocommerce_checkout_section',
          'choices' => array(
             'sidebarleft' => array(
                'image' =>  get_template_directory_uri() . '/img/left-sidebar.png', 
                'name' => __( 'Left Sidebar', 'whitedot' )
             ),
             'sidebarnone' => array(
                'image' => get_template_directory_uri() . '/img/fullwidth.png',
                'name' => __( 'No Sidebar', 'whitedot' )
             ),
             'sidebarright' => array(
                'image' => get_template_directory_uri() . '/img/right-sidebar.png',
                'name' => __( 'Right Sidebar', 'whitedot' )
             )
          )
       )
    ) );

    /*////////////////////////////////////////////////////////////////////////
                                LifterLMS Panel                               
    ////////////////////////////////////////////////////////////////////////*/

    $wp_customize->add_panel( 'whitedot_lifterlms_panel' , array(
        'priority' => 80,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'LifterLMS Settings', 'whitedot' ),
        
        )
    );

    //Course Catalog
    $wp_customize->add_section( 'whitedot_course_catalog_section' , array(
        'title'      => __('Course Catelog','whitedot'),
        'priority'   => 10,
        'panel'        => 'whitedot_lifterlms_panel',
    ) );

    $wp_customize->add_setting( 'whitedot_course_catalog_sidebar_layout',
       array(
          'default' => 'sidebarnone',
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_text_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Image_Radio_Button_Custom_Control( $wp_customize, 'whitedot_course_catalog_sidebar_layout',
       array(
          'label' => __( 'Sidebar Layout', 'whitedot' ),
          'section' => 'whitedot_course_catalog_section',
          'choices' => array(
             'sidebarleft' => array(
                'image' =>  get_template_directory_uri() . '/img/left-sidebar.png', 
                'name' => __( 'Left Sidebar', 'whitedot' )
             ),
             'sidebarnone' => array(
                'image' => get_template_directory_uri() . '/img/fullwidth.png',
                'name' => __( 'No Sidebar', 'whitedot' )
             ),
             'sidebarright' => array(
                'image' => get_template_directory_uri() . '/img/right-sidebar.png',
                'name' => __( 'Right Sidebar', 'whitedot' )
             )
          )
       )
    ) );

    $wp_customize->add_setting( 'whitedot_course_catalog_column',
       array(
          'default' => 3,
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_sanitize_integer'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Slider_Custom_Control( $wp_customize, 'whitedot_course_catalog_column',
       array(
          'label' => esc_html__( 'Course Catalog Columns', 'whitedot' ),
          'section' => 'whitedot_course_catalog_section',
          'input_attrs' => array(
             'min' => 1, 
             'max' => 6, 
             'step' => 1, 
          ),
       )
    ) );

    //Membership Catalog
    $wp_customize->add_section( 'whitedot_membership_catalog_section' , array(
        'title'      => __('Membership Catelog','whitedot'),
        'priority'   => 20,
        'panel'        => 'whitedot_lifterlms_panel',
    ) );

    $wp_customize->add_setting( 'whitedot_membership_catalog_sidebar_layout',
       array(
          'default' => 'sidebarnone',
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_text_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Image_Radio_Button_Custom_Control( $wp_customize, 'whitedot_membership_catalog_sidebar_layout',
       array(
          'label' => __( 'Sidebar Layout', 'whitedot' ),
          'section' => 'whitedot_membership_catalog_section',
          'choices' => array(
             'sidebarleft' => array(
                'image' =>  get_template_directory_uri() . '/img/left-sidebar.png', 
                'name' => __( 'Left Sidebar', 'whitedot' )
             ),
             'sidebarnone' => array(
                'image' => get_template_directory_uri() . '/img/fullwidth.png',
                'name' => __( 'No Sidebar', 'whitedot' )
             ),
             'sidebarright' => array(
                'image' => get_template_directory_uri() . '/img/right-sidebar.png',
                'name' => __( 'Right Sidebar', 'whitedot' )
             )
          )
       )
    ) );

    $wp_customize->add_setting( 'whitedot_membership_catalog_column',
       array(
          'default' => 3,
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_sanitize_integer'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Slider_Custom_Control( $wp_customize, 'whitedot_membership_catalog_column',
       array(
          'label' => esc_html__( 'Membership Catalog Columns', 'whitedot' ),
          'section' => 'whitedot_membership_catalog_section',
          'input_attrs' => array(
             'min' => 1, 
             'max' => 6, 
             'step' => 1, 
          ),
       )
    ) );

    //Dashboard
    $wp_customize->add_section( 'whitedot_llms_dashboard_section' , array(
        'title'      => __('Dashboard','whitedot'),
        'priority'   => 25,
        'panel'        => 'whitedot_lifterlms_panel',
    ) );

    $wp_customize->add_setting( 'whitedot_llms_dashboard_sidebar_layout',
       array(
          'default' => 'sidebarnone',
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_text_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Image_Radio_Button_Custom_Control( $wp_customize, 'whitedot_llms_dashboard_sidebar_layout',
       array(
          'label' => __( 'Sidebar Layout', 'whitedot' ),
          'section' => 'whitedot_llms_dashboard_section',
          'choices' => array(
             'sidebarleft' => array(
                'image' =>  get_template_directory_uri() . '/img/left-sidebar.png', 
                'name' => __( 'Left Sidebar', 'whitedot' )
             ),
             'sidebarnone' => array(
                'image' => get_template_directory_uri() . '/img/fullwidth.png',
                'name' => __( 'No Sidebar', 'whitedot' )
             ),
             'sidebarright' => array(
                'image' => get_template_directory_uri() . '/img/right-sidebar.png',
                'name' => __( 'Right Sidebar', 'whitedot' )
             )
          )
       )
    ) );

    $wp_customize->add_setting( 'whitedot_show_dashboard_nav_icon',
       array(
          'default' => 0,
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_switch_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Toggle_Switch_Custom_control( $wp_customize, 'whitedot_show_dashboard_nav_icon',
       array(
          'label' => esc_html__( 'Show Navigation Icons', 'whitedot' ),
          'section' => 'whitedot_llms_dashboard_section'
       )
    ) );

    $wp_customize->add_setting( 'whitedot_llms_duplicate_titles' , array(
        'transport' => 'refresh',
        'default'    =>  '',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'whitedot_llms_duplicate_titles',
            array(
                'label'          => __( 'Remove Duplicate Titles', 'whitedot' ),
                'section'        => 'whitedot_llms_dashboard_section',
                'type'           => 'checkbox',
                
            )
        )
    );


    //Single Course 
    $wp_customize->add_section( 'whitedot_single_course_section' , array(
        'title'      => __('Single Course','whitedot'),
        'priority'   => 30,
        'panel'        => 'whitedot_lifterlms_panel',
    ) );

    $wp_customize->add_setting( 'whitedot_single_course_sidebar_layout',
       array(
          'default' => 'sidebarright',
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_text_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Image_Radio_Button_Custom_Control( $wp_customize, 'whitedot_single_course_sidebar_layout',
       array(
          'label' => __( 'Sidebar Layout', 'whitedot' ),
          'section' => 'whitedot_single_course_section',
          'choices' => array(
             'sidebarleft' => array(
                'image' =>  get_template_directory_uri() . '/img/left-sidebar.png', 
                'name' => __( 'Left Sidebar', 'whitedot' )
             ),
             'sidebarnone' => array(
                'image' => get_template_directory_uri() . '/img/fullwidth.png',
                'name' => __( 'No Sidebar', 'whitedot' )
             ),
             'sidebarright' => array(
                'image' => get_template_directory_uri() . '/img/right-sidebar.png',
                'name' => __( 'Right Sidebar', 'whitedot' )
             )
          )
       )
    ) );

    $wp_customize->add_setting( 'whitedot_single_course_metaauthor' , array(
        'transport' => 'refresh',
        'default'    =>  'true',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'whitedot_single_course_metaauthor',
            array(
                'label'          => __( 'Show Meta Author(Below Title)', 'whitedot' ),
                'section'        => 'whitedot_single_course_section',
                'type'           => 'checkbox',
                
            )
        )
    );

    $wp_customize->add_setting( 'whitedot_single_course_metadate' , array(
        'transport' => 'refresh',
        'default'    =>  'true',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'whitedot_single_course_metadate',
            array(
                'label'          => __( 'Show Meta Date(Below Title)', 'whitedot' ),
                'section'        => 'whitedot_single_course_section',
                'type'           => 'checkbox',
                
            )
        )
    );

    //Single Lesson 
    $wp_customize->add_section( 'whitedot_single_lesson_section' , array(
        'title'      => __('Single Lesson','whitedot'),
        'priority'   => 40,
        'panel'        => 'whitedot_lifterlms_panel',
    ) );

    $wp_customize->add_setting( 'whitedot_single_lesson_sidebar_layout',
       array(
          'default' => 'sidebarright',
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_text_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Image_Radio_Button_Custom_Control( $wp_customize, 'whitedot_single_lesson_sidebar_layout',
       array(
          'label' => __( 'Sidebar Layout', 'whitedot' ),
          'section' => 'whitedot_single_lesson_section',
          'choices' => array(
             'sidebarleft' => array(
                'image' =>  get_template_directory_uri() . '/img/left-sidebar.png', 
                'name' => __( 'Left Sidebar', 'whitedot' )
             ),
             'sidebarnone' => array(
                'image' => get_template_directory_uri() . '/img/fullwidth.png',
                'name' => __( 'No Sidebar', 'whitedot' )
             ),
             'sidebarright' => array(
                'image' => get_template_directory_uri() . '/img/right-sidebar.png',
                'name' => __( 'Right Sidebar', 'whitedot' )
             )
          )
       )
    ) );

    $wp_customize->add_setting( 'whitedot_single_lesson_metaauthor' , array(
        'transport' => 'refresh',
        'default'    =>  'true',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'whitedot_single_lesson_metaauthor',
            array(
                'label'          => __( 'Show Meta Author(Below Title)', 'whitedot' ),
                'section'        => 'whitedot_single_lesson_section',
                'type'           => 'checkbox',
                
            )
        )
    );

    $wp_customize->add_setting( 'whitedot_single_lesson_metadate' , array(
        'transport' => 'refresh',
        'default'    =>  'true',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'whitedot_single_lesson_metadate',
            array(
                'label'          => __( 'Show Meta Date(Below Title)', 'whitedot' ),
                'section'        => 'whitedot_single_lesson_section',
                'type'           => 'checkbox',
                
            )
        )
    );

    //Single Membership 
    $wp_customize->add_section( 'whitedot_single_membership_section' , array(
        'title'      => __('Single Membership','whitedot'),
        'priority'   => 50,
        'panel'        => 'whitedot_lifterlms_panel',
    ) );

    $wp_customize->add_setting( 'whitedot_single_membership_sidebar_layout',
       array(
          'default' => 'sidebarnone',
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_text_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Image_Radio_Button_Custom_Control( $wp_customize, 'whitedot_single_membership_sidebar_layout',
       array(
          'label' => __( 'Sidebar Layout', 'whitedot' ),
          'section' => 'whitedot_single_membership_section',
          'choices' => array(
             'sidebarleft' => array(
                'image' =>  get_template_directory_uri() . '/img/left-sidebar.png', 
                'name' => __( 'Left Sidebar', 'whitedot' )
             ),
             'sidebarnone' => array(
                'image' => get_template_directory_uri() . '/img/fullwidth.png',
                'name' => __( 'No Sidebar', 'whitedot' )
             ),
             'sidebarright' => array(
                'image' => get_template_directory_uri() . '/img/right-sidebar.png',
                'name' => __( 'Right Sidebar', 'whitedot' )
             )
          )
       )
    ) );

    $wp_customize->add_setting( 'whitedot_single_membership_metaauthor' , array(
        'transport' => 'refresh',
        'default'    =>  'true',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'whitedot_single_membership_metaauthor',
            array(
                'label'          => __( 'Show Meta Author(Below Title)', 'whitedot' ),
                'section'        => 'whitedot_single_membership_section',
                'type'           => 'checkbox',
                
            )
        )
    );

    $wp_customize->add_setting( 'whitedot_single_membership_metadate' , array(
        'transport' => 'refresh',
        'default'    =>  'true',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'whitedot_single_membership_metadate',
            array(
                'label'          => __( 'Show Meta Date(Below Title)', 'whitedot' ),
                'section'        => 'whitedot_single_membership_section',
                'type'           => 'checkbox',
                
            )
        )
    );
    

    //Social Settings
    $wp_customize->add_section( 'whitedot_social_settings_section' , array(
        'title'      => __('Social','whitedot'),
        'priority'   => 90,
    ) );

    $wp_customize->add_setting( 'whitedot_social_facebook', array(
        'capability' => 'edit_theme_options',
        'default'    =>  '',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 'whitedot_social_facebook', array(
        'type' => 'checkbox',
        'section' => 'whitedot_social_settings_section', 
        'label'      => __( 'Show Facebook Icon', 'whitedot' ),
        ) 
    );

    $wp_customize->add_setting(
      'wd_facebook_url',
      array(
          'default'           => __( '#', "whitedot" ),
          'transport'         => 'refresh',
          'sanitize_callback' => 'sanitize_text'          
      )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'wd_facebook_url',
            array(
                'label'          => __( 'Facebook url', 'whitedot' ),
                'section'        => 'whitedot_social_settings_section',
                'settings'       => 'wd_facebook_url',
                'type'           => 'text'
            )
        )
    );

    $wp_customize->add_setting( 'whitedot_social_twitter', array(
        'capability' => 'edit_theme_options',
        'default'    =>  '',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 'whitedot_social_twitter', array(
        'type' => 'checkbox',
        'section' => 'whitedot_social_settings_section', 
        'label'      => __( 'Show Twitter Icon', 'whitedot' ),
        ) 
    );

    $wp_customize->add_setting(
      'wd_twitter_url',
      array(
          'default'           => __( '#', "whitedot" ),
          'transport'         => 'refresh',
          'sanitize_callback' => 'sanitize_text'          
      )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'wd_twitter_url',
            array(
                'label'          => __( 'Twitter url', 'whitedot' ),
                'section'        => 'whitedot_social_settings_section',
                'settings'       => 'wd_twitter_url',
                'type'           => 'text'
            )
        )
    );

    $wp_customize->add_setting( 'whitedot_social_instagram', array(
        'capability' => 'edit_theme_options',
        'default'    =>  '',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 'whitedot_social_instagram', array(
        'type' => 'checkbox',
        'section' => 'whitedot_social_settings_section', 
        'label'      => __( 'Show Instagram Icon', 'whitedot' ),
        ) 
    );

    $wp_customize->add_setting(
      'wd_instagram_url',
      array(
          'default'           => __( '#', "whitedot" ),
          'transport'         => 'refresh',
          'sanitize_callback' => 'sanitize_text'          
      )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'wd_instagram_url',
            array(
                'label'          => __( 'Instagram url', 'whitedot' ),
                'section'        => 'whitedot_social_settings_section',
                'settings'       => 'wd_instagram_url',
                'type'           => 'text'
            )
        )
    );

    $wp_customize->add_setting( 'whitedot_social_google', array(
        'capability' => 'edit_theme_options',
        'default'    =>  '',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 'whitedot_social_google', array(
        'type' => 'checkbox',
        'section' => 'whitedot_social_settings_section', 
        'label'      => __( 'Show Google+ Icon', 'whitedot' ),
        ) 
    );

    $wp_customize->add_setting(
      'wd_google_url',
      array(
          'default'           => __( '#', "whitedot" ),
          'transport'         => 'refresh',
          'sanitize_callback' => 'sanitize_text'          
      )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'wd_google_url',
            array(
                'label'          => __( 'Google+ url', 'whitedot' ),
                'section'        => 'whitedot_social_settings_section',
                'settings'       => 'wd_google_url',
                'type'           => 'text'
            )
        )
    );

    $wp_customize->add_setting( 'whitedot_social_pintrest', array(
        'capability' => 'edit_theme_options',
        'default'    =>  '',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 'whitedot_social_pintrest', array(
        'type' => 'checkbox',
        'section' => 'whitedot_social_settings_section', 
        'label'      => __( 'Show Pintrest Icon', 'whitedot' ),
        ) 
    );

    $wp_customize->add_setting(
      'wd_pintrest_url',
      array(
          'default'           => __( '#', "whitedot" ),
          'transport'         => 'refresh',
          'sanitize_callback' => 'sanitize_text'          
      )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'wd_pintrest_url',
            array(
                'label'          => __( 'Pintrest url', 'whitedot' ),
                'section'        => 'whitedot_social_settings_section',
                'settings'       => 'wd_pintrest_url',
                'type'           => 'text'
            )
        )
    );

    $wp_customize->add_setting( 'whitedot_social_youtube', array(
        'capability' => 'edit_theme_options',
        'default'    =>  '',
        'sanitize_callback' => 'whitedot_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 'whitedot_social_youtube', array(
        'type' => 'checkbox',
        'section' => 'whitedot_social_settings_section', 
        'label'      => __( 'Show Youtube Icon', 'whitedot' ),
        ) 
    );

    $wp_customize->add_setting(
      'wd_youtube_url',
      array(
          'default'           => __( '#', "whitedot" ),
          'transport'         => 'refresh',
          'sanitize_callback' => 'sanitize_text'          
      )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'wd_youtube_url',
            array(
                'label'          => __( 'Youtube url', 'whitedot' ),
                'section'        => 'whitedot_social_settings_section',
                'settings'       => 'wd_youtube_url',
                'type'           => 'text'
            )
        )
    );

    //Course Catalog
    $wp_customize->add_section( 'whitedot_footer_settings_section' , array(
        'title'      => __('Footer Settings','whitedot'),
        'priority'   => 110,
    ) );

    $wp_customize->add_setting( 'whitedot_show_footer_branding',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_switch_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Toggle_Switch_Custom_control( $wp_customize, 'whitedot_show_footer_branding',
       array(
          'label' => esc_html__( 'Show Footer Branding', 'whitedot' ),
          'section' => 'whitedot_footer_settings_section'
       )
    ) );

    $wp_customize->add_setting( 'whitedot_show_footer_social_icons',
       array(
          'default' => 0,
          'transport' => 'refresh',
          'sanitize_callback' => 'whitedot_switch_sanitization'
       )
    );
     
    $wp_customize->add_control( new WhiteDot_Toggle_Switch_Custom_control( $wp_customize, 'whitedot_show_footer_social_icons',
       array(
          'label' => esc_html__( 'Show Social Icons', 'whitedot' ),
          'section' => 'whitedot_footer_settings_section'
       )
    ) );








}


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function whitedot_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function whitedot_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


// Sanitize text 
function sanitize_text( $text ) {
    
    return sanitize_text_field( $text );

}

/**
 * Text sanitization
 *
 * @param  string   Input to be sanitized (either a string containing a single string or multiple, separated by commas)
 * @return string   Sanitized input
 */
if ( ! function_exists( 'whitedot_text_sanitization' ) ) {
    function whitedot_text_sanitization( $input ) {
        if ( strpos( $input, ',' ) !== false) {
            $input = explode( ',', $input );
        }
        if( is_array( $input ) ) {
            foreach ( $input as $key => $value ) {
                $input[$key] = sanitize_text_field( $value );
            }
            $input = implode( ',', $input );
        }
        else {
            $input = sanitize_text_field( $input );
        }
        return $input;
    }
}

// Sanitize checkbox 
function whitedot_sanitize_checkbox( $checked ) {

  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

// Sanitize radio
function whitedot_sanitize_choice( $input, $setting ) {

  $input = sanitize_key( $input );

  $choices = $setting->manager->get_control( $setting->id )->choices;

  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function whitedot_sanitize_hex_color( $color ) {
    if ( '' === $color ) {
        return '';
    }
    if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
        return $color;
    }

    return '';
}

/**
 * Only allow values between a certain minimum & maxmium range
 *
 * @param  number   Input to be sanitized
 * @return number   Sanitized input
 */
if ( ! function_exists( 'whitedot_in_range' ) ) {
    function whitedot_in_range( $input, $min, $max ){
        if ( $input < $min ) {
            $input = $min;
        }
        if ( $input > $max ) {
            $input = $max;
        }
    return $input;
    }
}


/**
 * Array sanitization
 *
 * @param  array    Input to be sanitized
 * @return array    Sanitized input
 */
if ( ! function_exists( 'whitedot_array_sanitization' ) ) {
    function whitedot_array_sanitization( $input ) {
        if( is_array( $input ) ) {
            foreach ( $input as $key => $value ) {
                $input[$key] = sanitize_text_field( $value );
            }
        }
        else {
            $input = '';
        }
        return $input;
    }
}

/**
 * Switch sanitization
 *
 * @param  string       Switch value
 * @return integer  Sanitized value
 */
if ( ! function_exists( 'whitedot_switch_sanitization' ) ) {
    function whitedot_switch_sanitization( $input ) {
        if ( true === $input ) {
            return 1;
        } else {
            return 0;
        }
    }
}

/**
 * Integer sanitization
 *
 * @param  string       Input value to check
 * @return integer  Returned integer value
 */
if ( ! function_exists( 'whitedot_sanitize_integer' ) ) {
    function whitedot_sanitize_integer( $input ) {
        return (int) $input;
    }
}

/**
   * Sanitize integers that can use decimals.
   *
   * @since 1.0
   */
if ( ! function_exists( 'whitedot_sanitize_decimal_integer' ) ) {
  
  function whitedot_sanitize_decimal_integer( $input ) {
    return abs( floatval( $input ) );
  }
}



