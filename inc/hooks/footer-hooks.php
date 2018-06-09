<?php
/**
 * Footer Hooks
 *
 * @package WhiteDot
 */


/**
 * WhiteDot Footer Branding
 *
 * @since 1.0.0
 */
function whitedot_footer_branding(){

?>
	<div itemscope itemtype="http://schema.org/Organization" class="wd-footer-branding">

		<?php
		/**
		 * whitedot_single_post_content_after hook.
		 *
		 * @hooked whitedot_footer_site_title  		- 10
		 * @hooked whitedot_footer_site_description - 20
		 * @hooked whitedot_footer_social_links - 30
		 *
		 * @since 0.1
		 */
		do_action( 'whitedot_footer_branding_content' );?>
		
	</div><!--.wd-footer-branding -->

<?php

}

/**
 * WhiteDot Footer Site Title
 *
 * @since 1.0.0
 */
function whitedot_footer_site_title(){

?>
	<a class="wd-footer-title" itemprop="url" href="<?php echo esc_url( home_url() ); ?>"><span itemprop="name"><?php bloginfo('name'); ?></span></a>
<?php

}

/**
 * WhiteDot Footer Site Description
 *
 * @since 1.0.0
 */
function whitedot_footer_site_description(){

?>
	<p itemprop="description" class="footer-site-description"><?php bloginfo( 'description' ); ?></p>
<?php

}


/**
 * WhiteDot Footer Site Widgets
 *
 * @since 1.0.0
 */
function whitedot_footer_widgets(){

?>
	<div class="col-full">

		<?php if ( is_active_sidebar( 'sidebar-footer' )  ) : ?>
			 <div class="wd-footer-columns">
			 	<?php dynamic_sidebar( 'sidebar-footer' ); ?>
			 </div><!--.wd-footer-columns -->
		<?php endif; ?>
		
	</div><!--.col-full-->
<?php

}

/**
 * whitedot Footer Social Icons
 *
 * @since 1.0.0
 */
function whitedot_footer_social_links(){

?>


	<div class="wd-footer-social-icons">

		<?php if ( true == get_theme_mod( 'whitedot_social_facebook', false ) ) { ?> 
			<a href="<?php echo get_theme_mod('wd_facebook_url'); ?>" class="wd-footer-social-icon" target="blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		<?php } ?> 

		<?php if ( true == get_theme_mod( 'whitedot_social_twitter', false ) ) { ?> 
			<a href="<?php echo get_theme_mod('wd_twitter_url'); ?>" class="wd-footer-social-icon" target="blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		<?php } ?> 

		<?php if ( true == get_theme_mod( 'whitedot_social_instagram', false ) ) { ?> 
			<a href="<?php echo get_theme_mod('wd_instagram_url'); ?>" class="wd-footer-social-icon" target="blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		<?php } ?> 

		<?php if ( true == get_theme_mod( 'whitedot_social_google', false ) ) { ?> 
			<a href="<?php echo get_theme_mod('wd_google_url'); ?>" class="wd-footer-social-icon" target="blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
		<?php } ?> 

		<?php if ( true == get_theme_mod( 'whitedot_social_pintrest', false ) ) { ?> 
			<a href="<?php echo get_theme_mod('wd_pintrest_url'); ?>" class="wd-footer-social-icon" target="blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
		<?php } ?> 

		<?php if ( true == get_theme_mod( 'whitedot_social_youtube', false ) ) { ?> 
			<a href="<?php echo get_theme_mod('wd_youtube_url'); ?>" class="wd-footer-social-icon" target="blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
		<?php } ?> 

	</div><!--.wd-footer-social-icons -->

<?php

}

/**
 * WhiteDot Footer Info
 *
 * @since 1.0.0
 */
function whitedot_footer_info(){

?>

	<div class="wd-footer-info">

		<?php do_action( 'whitedot_footer_info_content' ); ?>
		
	</div><!--.wd-footer-info-->

<?php

}