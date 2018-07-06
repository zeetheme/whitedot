<?php

function whitedot_customizer_css() {

    // Color mods 
    $body_text_color = get_theme_mod('whitedot_body_text_color');
    $header_color = get_theme_mod('whitedot_header_color');
    $link_color = get_theme_mod('whitedot_link_color');
    $link_hover_color = get_theme_mod('whitedot_link_hover_color');
    $font_size = get_theme_mod('whitedot_body_text_font_size');
    $line_height = get_theme_mod('whitedot_body_text_line_height');
    $header_text_color = get_theme_mod('header_text_color');

?>

<style type="text/css">
<?php if( class_exists( 'LifterLMS' ) ) { ?>
    <?php if ( is_llms_checkout() ) { ?>
        .has-sidebar #primary{
            width: 100%!important;
            float: none!important;
        }
        .has-sidebar .secondary{
            display: none;
        }
    <?php } ?>
<?php } ?>

/* Color */
body{
    color: <?php echo esc_attr( $body_text_color ) ?>;
}
h1, h2, h3, h4, h5, h6{
    color: <?php echo esc_attr( $header_color ) ?>;
}
a{
    color: <?php echo esc_attr( $link_color ) ?>;
}
a:hover{
    color: <?php echo esc_attr( $link_hover_color ) ?>;
}

/*--Header--*/
.sub-menu li a{
	color: #777!important;
}
.site-name{
	color: <?php echo esc_attr( $header_text_color ); ?>!important;
}
.menu-item-has-children:after{
	color: <?php echo esc_attr( $header_text_color ); ?>70;
}
.site-description,
.primary-nav li a,
.wd-cart a,
.wd-cart-mob a {
	color: <?php echo esc_attr( $header_text_color ); ?>;
}


<?php if( true === get_theme_mod( 'whitedot_hide_tagline', false ) ) { ?>
    @media (min-width: 768px){
        .site-description{
            display: none;
        }
        .site-branding{
            padding-top: 20px;
        }
    }
<?php } ?>

<?php if( 'style-2' === get_theme_mod( 'header_styles' ) ) { ?> 
    @media (min-width: 768px){
    	.site-header{
    		min-height: auto;
    	}
        .site-branding {
            width: 100%;
            text-align: center;
        }
        #wd-primary-nav {
            width: 100%;
        }
        .primary-nav {
            text-align: center;
        }
        #primary-menu {
			display: inline-block;
			vertical-align: top;
		}
        .wd-site-logo {
            width: 100%;
            text-align: center;
        }
        <?php if ( true == get_theme_mod( 'whitedot_fixed_header', false ) ) { ?> 
        .site-content {
            margin-top: 160px!important;
        }
        <?php } ?>
    }
<?php } ?>
<?php if(get_header_image()){ ?>
	.site-header{
		background-image: url(<?php header_image(); ?>);
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover ;
	}
	.sub-menu .menu-item-has-children:after{
		color: #00000030;
	}
<?php } ?>

/*--Sidebar--*/
<?php if( 'sidebarleft' === get_theme_mod( 'whitedot_page_sidebar_layout' ) ) { ?> 
@media (min-width: 768px){
    .has-sidebar.page-template-default #primary {
        float: right;
        width: 68%;
    }
    .has-sidebar.page-template-default .secondary {
        float: left;
    }
}
<?php } ?>
<?php if( 'sidebarright' === get_theme_mod( 'whitedot_page_sidebar_layout' ) ) { ?> 
@media (min-width: 768px){
    .has-sidebar.page-template-default #primary {
        float: left;
        width: 68%;
    }
    .has-sidebar.page-template-default .secondary {
        float: right;
    }
}
<?php } ?>
<?php if( 'sidebarnone' === get_theme_mod( 'whitedot_page_sidebar_layout' ) ) { ?> 
    .has-sidebar.page-template-default #primary {
        float: none!important;
        width: 100%!important;
    }
    .has-sidebar.page-template-default .secondary {
        display: none;
    }
<?php } ?>
<?php if( 'style-2' === get_theme_mod( 'whitedot_sidebar_styles' ) ) { ?> 
    .wd-widget {
        margin-bottom: 2px;
    }
<?php } ?>
<?php if( 'style-3' === get_theme_mod( 'whitedot_sidebar_styles' ) ) { ?> 
    .wd-widget {
        margin-bottom: 0px;
        box-shadow: none;
    }
    .wd-widget-area{
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }
<?php } ?>

/*--WooCommerce--*/
<?php if( class_exists( 'WooCommerce' ) ) { ?>
    <?php if ( 0 == get_theme_mod( 'whitedot_show_cart_in_header', 1 ) ) { ?>
        .primary-nav{
            margin-right: 0!important;
        }
    <?php } ?>
    <?php if( 'sidebarleft' === get_theme_mod( 'whitedot_woo_single_product_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .has-sidebar.single-product #primary {
            float: right;
            width: 68%;
        }
        .has-sidebar.single-product .secondary {
            float: left;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarright' === get_theme_mod( 'whitedot_woo_single_product_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .has-sidebar.single-product #primary {
            float: left;
            width: 68%;
        }
        .has-sidebar.single-product .secondary {
            float: right;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarnone' === get_theme_mod( 'whitedot_woo_single_product_sidebar_layout' ) ) { ?> 
        .has-sidebar.single-product #primary {
            float: none!important;
            width: 100%!important;
        }
        .has-sidebar.single-product .secondary {
            display: none;
        }
    <?php } ?>
    <?php if( 'sidebarleft' === get_theme_mod( 'whitedot_woo_shop_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .has-sidebar.post-type-archive-product #primary,
        .has-sidebar.tax-product_cat #primary,
        .has-sidebar.tax-product_tag #primary {
            float: right;
            width: 68%;
        }
        .has-sidebar.post-type-archive-product .secondary,
        .has-sidebar.tax-product_cat .secondary,
        .has-sidebar.tax-product_tag .secondary {
            float: left;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarright' === get_theme_mod( 'whitedot_woo_shop_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .has-sidebar.post-type-archive-product #primary,
        .has-sidebar.tax-product_cat #primary,
        .has-sidebar.tax-product_tag #primary {
            float: left;
            width: 68%;
        }
        .has-sidebar.post-type-archive-product .secondary,
        .has-sidebar.tax-product_cat .secondary,
        .has-sidebar.tax-product_tag .secondary {
            float: right;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarnone' === get_theme_mod( 'whitedot_woo_shop_sidebar_layout' ) ) { ?> 
        .has-sidebar.post-type-archive-product #primary,
        .has-sidebar.tax-product_cat #primary,
        .has-sidebar.tax-product_tag #primary {
            float: none!important;
            width: 100%!important;
        }
        .has-sidebar.post-type-archive-product .secondary,
        .has-sidebar.tax-product_cat .secondary,
        .has-sidebar.tax-product_tag .secondary {
            display: none;
        }
    <?php } ?>
    <?php if( 'sidebarleft' === get_theme_mod( 'whitedot_woo_cart_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .has-sidebar.woocommerce-cart #primary {
            float: right;
            width: 68%;
        }
        .has-sidebar.woocommerce-cart .secondary {
            float: left;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarright' === get_theme_mod( 'whitedot_woo_cart_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .has-sidebar.woocommerce-cart #primary {
            float: left;
            width: 68%;
        }
        .has-sidebar.woocommerce-cart .secondary {
            float: right;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarnone' === get_theme_mod( 'whitedot_woo_cart_sidebar_layout' ) ) { ?> 
        .has-sidebar.woocommerce-cart #primary {
            float: none!important;
            width: 100%!important;
        }
        .has-sidebar.woocommerce-cart .secondary {
            display: none;
        }
    <?php } ?>
    <?php if( 'sidebarleft' === get_theme_mod( 'whitedot_woo_checkout_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .has-sidebar.woocommerce-checkout #primary {
            float: right;
            width: 68%;
        }
        .has-sidebar.woocommerce-checkout .secondary {
            float: left;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarright' === get_theme_mod( 'whitedot_woo_checkout_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .has-sidebar.woocommerce-checkout #primary {
            float: left;
            width: 68%;
        }
        .has-sidebar.woocommerce-checkout .secondary {
            float: right;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarnone' === get_theme_mod( 'whitedot_woo_checkout_sidebar_layout' ) ) { ?> 
        .has-sidebar.woocommerce-checkout #primary {
            float: none!important;
            width: 100%!important;
        }
        .has-sidebar.woocommerce-checkout .secondary {
            display: none;
        }
    <?php } ?>
    <?php if( 'left' === get_theme_mod( 'whitedot_woo_shop_filter_layout' ) ) { ?> 
        #filter-main::-webkit-scrollbar {
            display: none;
        }
        #filter-main.active {
            left: 0;
            transition: .4s;
        }
        #filter-main {
            left: -1000px;
        }
        #remove-filter-wrap{
            float: right;
        }
        .whitedot-filter-widgets{
            clear: both;
        }
    <?php } ?>
<?php } ?>

/*--LifterLMS--*/
<?php if( class_exists( 'LifterLMS' ) ) { ?>
    <?php if( 'sidebarright' === get_theme_mod( 'whitedot_course_catalog_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .post-type-archive-course.has-sidebar #primary {
            float: left;
            width: 68%;
        }
        .post-type-archive-course.has-sidebar .secondary {
            float: right;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarleft' === get_theme_mod( 'whitedot_course_catalog_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .post-type-archive-course.has-sidebar #primary {
            float: right;
            width: 68%;
        }
        .post-type-archive-course.has-sidebar .secondary {
            float: left;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarnone' === get_theme_mod( 'whitedot_course_catalog_sidebar_layout' ) ) { ?> 
        .post-type-archive-course.has-sidebar #primary {
            float: none!important;
            width: 100%!important;
        }
        .post-type-archive-course.has-sidebar .secondary {
            display: none;
        }
    <?php } ?>
    <?php if( 'sidebarright' === get_theme_mod( 'whitedot_membership_catalog_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .post-type-archive-llms_membership.has-sidebar #primary {
            float: left;
            width: 68%;
        }
        .post-type-archive-llms_membership.has-sidebar .secondary {
            float: right;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarleft' === get_theme_mod( 'whitedot_membership_catalog_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .post-type-archive-llms_membership.has-sidebar #primary {
            float: right;
            width: 68%;
        }
        .post-type-archive-llms_membership.has-sidebar .secondary {
            float: left;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarnone' === get_theme_mod( 'whitedot_membership_catalog_sidebar_layout' ) ) { ?> 
        .post-type-archive-llms_membership.has-sidebar #primary {
            float: none!important;
            width: 100%!important;
        }
        .post-type-archive-llms_membership.has-sidebar .secondary {
            display: none;
        }
    <?php } ?>
    <?php if( 'sidebarright' === get_theme_mod( 'whitedot_single_course_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .single-course.has-sidebar #primary {
            float: left;
            width: 68%;
        }
        .single-course.has-sidebar .secondary {
            float: right;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarleft' === get_theme_mod( 'whitedot_single_course_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .single-course.has-sidebar #primary {
            float: right;
            width: 68%;
        }
        .single-course.has-sidebar .secondary {
            float: left;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarnone' === get_theme_mod( 'whitedot_single_course_sidebar_layout' ) ) { ?> 
        .single-course.has-sidebar #primary {
            float: none!important;
            width: 100%!important;
        }
        .single-course.has-sidebar .secondary {
            display: none;
        }
    <?php } ?>
    <?php if( 'sidebarright' === get_theme_mod( 'whitedot_single_lesson_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .single-lesson.has-sidebar #primary {
            float: left;
            width: 68%;
        }
        .single-lesson.has-sidebar .secondary {
            float: right;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarleft' === get_theme_mod( 'whitedot_single_lesson_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .single-lesson.has-sidebar #primary {
            float: right;
            width: 68%;
        }
        .single-lesson.has-sidebar .secondary {
            float: left;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarnone' === get_theme_mod( 'whitedot_single_lesson_sidebar_layout' ) ) { ?> 
        .single-lesson.has-sidebar #primary {
            float: none!important;
            width: 100%!important;
        }

        .single-lesson.has-sidebar .secondary {
            display: none;
        }
    <?php } ?>
    <?php if( 'sidebarright' === get_theme_mod( 'whitedot_single_membership_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .single-llms_membership.has-sidebar #primary {
            float: left;
            width: 68%;
        }
        .single-llms_membership.has-sidebar .secondary {
            float: right;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarleft' === get_theme_mod( 'whitedot_single_membership_sidebar_layout' ) ) { ?> 
    @media (min-width: 768px){
        .single-llms_membership.has-sidebar #primary {
            float: right;
            width: 68%;
        }
        .single-llms_membership.has-sidebar .secondary {
            float: left;
            display: block;
        }
    }
    <?php } ?>
    <?php if( 'sidebarnone' === get_theme_mod( 'whitedot_single_membership_sidebar_layout' ) ) { ?> 
        .single-llms_membership.has-sidebar #primary {
            float: none!important;
            width: 100%!important;
        }
        .single-llms_membership.has-sidebar .secondary {
            display: none;
        }
    <?php } ?>
    <?php if( false === get_theme_mod( 'whitedot_single_course_metaauthor', true ) ) { ?>
        .single-course .wd-author{
            display: none;
        }
    <?php } ?>
    <?php if( false === get_theme_mod( 'whitedot_single_course_metadate', true ) ) { ?>
        .single-course .wd-date,
        .single-course .wd-author:after{
            display: none;
        }
    <?php } ?>
    <?php if( false === get_theme_mod( 'whitedot_single_lesson_metaauthor', true ) ) { ?>
        .single-lesson .wd-author{
            display: none;
        }
    <?php } ?>
    <?php if( false === get_theme_mod( 'whitedot_single_lesson_metadate', true ) ) { ?>
        .single-lesson .wd-date,
        .single-lesson .wd-author:after{
            display: none;
        }
    <?php } ?>
    <?php if( false === get_theme_mod( 'whitedot_single_membership_metaauthor', true ) ) { ?>
        .single-llms_membership .wd-author{
            display: none;
        }
    <?php } ?>
    <?php if( false === get_theme_mod( 'whitedot_single_membership_metadate', true ) ) { ?>
        .single-llms_membership .wd-date,
        .single-llms_membership .wd-author:after{
            display: none;
        }
    <?php } ?>
    <?php if ( 1 == get_theme_mod( 'whitedot_show_dashboard_nav_icon', 0 ) ) { ?>
        .llms-student-dashboard .llms-sd-items li a:before {
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            content: "\f0f6";
            line-height: 1.618;
            margin-left: 0.5407911001em;
            width: 1.41575em;
            text-align: left;
            opacity: .25;
        }
        li.llms-sd-item.current a:before,
        li.llms-sd-item a:hover:before{
        opacity: 1;
        transition: .3s;
        }
        li.llms-sd-item.dashboard a:before{
        content: "\f0e4";
        }
        li.llms-sd-item.view-courses a:before{
        content: "\f24d";
        }
        li.llms-sd-item.view-achievements a:before{
        content: "\f19d";
        }
        li.llms-sd-item.notifications a:before{
        content: "\f0a2";
        }
        li.llms-sd-item.edit-account a:before{
        content: "\f2c0";
        }
        li.llms-sd-item.redeem-voucher a:before{
        content: "\f02c";
        }
        li.llms-sd-item.orders a:before{
        content: "\f07a";
        }
        li.llms-sd-item.signout a:before{
        content: "\f08b";
        }
    <?php } ?>
    <?php if( true === get_theme_mod( 'whitedot_llms_duplicate_titles', false ) ) { ?>
        .llms-sd-section.llms-my-courses .llms-sd-section-title,
        .llms-sd-section.llms-my-achievements .llms-sd-section-title{
            display: none;
        }
    <?php } ?>
<?php } ?>

/*--Blog--*/

<?php if( 'sidebarright' === get_theme_mod( 'whitedot_blog_single_sidebar_layout' ) ) { ?> 
@media (min-width: 768px){
    .has-sidebar.single-post #primary {
        float: left;
    }
    .has-sidebar.single-post .secondary {
        float: right;
        display: block;
    }
}
<?php } ?>
<?php if( 'sidebarleft' === get_theme_mod( 'whitedot_blog_single_sidebar_layout' ) ) { ?> 
@media (min-width: 768px){
    .has-sidebar.single-post #primary {
        float: right;
    }
    .has-sidebar.single-post .secondary {
        float: left;
        display: block;
    }
}
<?php } ?>
<?php if( 'sidebarnone' === get_theme_mod( 'whitedot_blog_single_sidebar_layout' ) ) { ?> 
    .has-sidebar.single-post #primary {
        float: none!important;
        width: 100%!important;
    }
    .has-sidebar.single-post .secondary {
        display: none;
    }
<?php } ?>
<?php if( 'sidebarright' === get_theme_mod( 'whitedot_blog_archive_sidebar_layout' ) ) { ?> 
@media (min-width: 768px){
    .has-sidebar.blog #primary {
        float: left;
    }
    .has-sidebar.blog .secondary {
        float: right;
        display: block;
    }
}
<?php } ?>
<?php if( 'sidebarleft' === get_theme_mod( 'whitedot_blog_archive_sidebar_layout' ) ) { ?> 
@media (min-width: 768px){
    .has-sidebar.blog #primary {
        float: right;
    }
    .has-sidebar.blog .secondary {
        float: left;
        display: block;
    }
}
<?php } ?>
<?php if( 'sidebarnone' === get_theme_mod( 'whitedot_blog_archive_sidebar_layout' ) ) { ?> 
    .has-sidebar.blog #primary {
        float: none!important;
        width: 100%!important;
    }
    .has-sidebar.blog .secondary {
        display: none;
    }
<?php } ?>
<?php if( 'style-2' === get_theme_mod( 'whitedot_blog_home_layout' ) ) { ?> 
    @media (min-width: 600px){
        .wd-blog-grid.col-2 .wd-single-post {
            width: 47%;
            float: left;
            margin: 0 1.5% 3% 1.5%;
        }
        .wd-blog-grid.col-3 .wd-single-post {
            width: 31%;
            float: left;
            margin: 0 1.15% 2.3% 1.15%;
            margin-top: 0;
        }
        .wd-blog-grid.col-4 .wd-single-post {
            width: 23%;
            float: left;
            margin: 0 1% 2% 1%;
            margin-top: 0;
        }
        .blog .wd-blog-grid {
            display: flex;
            flex-wrap: wrap;
        }
        .wd-loop-featured-img {
             padding-bottom: 60%;
        }
    }
    .wd-post-pagination {
        margin-top: 1em;
    }
<?php } ?>
<?php if( false === get_theme_mod( 'whitedot_blog_home_metadate', true ) ) { ?>
    .blog .excerpt-meta .date{
        border: 0;
        clip: rect(1px, 1px, 1px, 1px);
        clip-path: inset(50%);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute !important;
        width: 1px;
        word-wrap: normal !important;
    }
<?php } ?>
<?php if( false === get_theme_mod( 'whitedot_blog_home_metaauthor', true ) ) { ?>
    .blog .excerpt-meta .author,
    .blog .excerpt-meta .date:after{
        border: 0;
        clip: rect(1px, 1px, 1px, 1px);
        clip-path: inset(50%);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute !important;
        width: 1px;
        word-wrap: normal !important;
    }
<?php } ?>
<?php if( false === get_theme_mod( 'whitedot_blog_single_metadate', true ) ) { ?>
    .single-excerpt-meta .wd-date{
        border: 0;
        clip: rect(1px, 1px, 1px, 1px);
        clip-path: inset(50%);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute !important;
        width: 1px;
        word-wrap: normal !important;
    }
<?php } ?>
<?php if( false === get_theme_mod( 'whitedot_blog_single_metaauthor', true ) ) { ?>
    .single-excerpt-meta .wd-author{
        border: 0;
        clip: rect(1px, 1px, 1px, 1px);
        clip-path: inset(50%);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute !important;
        width: 1px;
        word-wrap: normal !important;
    }
<?php } ?>
<?php if( false === get_theme_mod( 'whitedot_blog_single_metacategory', true ) ) { ?>
    .single-excerpt-meta .single-category-meta,
    .single-excerpt-meta .wd-date:after{
        border: 0;
        clip: rect(1px, 1px, 1px, 1px);
        clip-path: inset(50%);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute !important;
        width: 1px;
        word-wrap: normal !important;
    }
<?php } ?>

/*--Typography--*/

<?php if( 'font-2' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?> 
    body, 
    button,
    input{
        font-family: 'ABeeZee', sans-serif;
    }
<?php }elseif ('font-3' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Abel', sans-serif;
    }
<?php }elseif ('font-4' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Actor', sans-serif;
    }
<?php }elseif ('font-5' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Advent Pro', sans-serif;
    }
<?php }elseif ('font-6' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Anaheim', sans-serif;
    }
<?php }elseif ('font-7' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Andada', serif;
    }
<?php }elseif ('font-8' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Bad Script', cursive;
    }
<?php }elseif ('font-9' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Barlow', sans-serif;
    }
<?php }elseif ('font-10' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Bellefair', serif;
    }
<?php }elseif ('font-11' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'BenchNine', sans-serif;
    }
<?php }elseif ('font-12' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Bubbler One', sans-serif;
    }
<?php }elseif ('font-13' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Cabin', sans-serif;
    }
<?php }elseif ('font-14' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Cairo', sans-serif;
    }
<?php }elseif ('font-15' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Capriola', sans-serif;
    }
<?php }elseif ('font-16' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Catamaran', sans-serif;
    }
<?php }elseif ('font-17' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Chathura', sans-serif;
    }
<?php }elseif ('font-18' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Delius', cursive;
    }
<?php }elseif ('font-19' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Delius Swash Caps', cursive;
    }
<?php }elseif ('font-20' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Didact Gothic', sans-serif;
    }
<?php }elseif ('font-21' === get_theme_mod( 'whitedot_google_fonts' ) ) { ?>
    body, 
    button,
    input{
        font-family: 'Dosis', sans-serif;
    }
<?php } ?>
body{
    font-size: <?php echo esc_attr( $font_size ) ?>px;
    line-height: <?php echo "calc(" . esc_attr( $line_height ) . "/ 10 )" ?>;
}
</style>
<?php 
} 

