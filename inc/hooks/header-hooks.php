<?php
/**
 * Header Hooks
 *
 * @package WhiteDot
 */

/**
 * WhiteDot Header Content
 *
 * @since 1.0
 */
function whitedot_header_content(){

?>

<header itemtype="http://schema.org/WPHeader" itemscope="itemscope" id="masthead" class="site-header">

	<?php
	/**
	 * whitedot_before_header_wrap hook.
	 *
	 * @since 1.0
	 *
	 */
	do_action( 'whitedot_before_header_wrap' ); ?>

	<div class="col-full">

		<?php
		/**
		 * whitedot_header_content_before hook.
		 *
		 * @since 1.0
		 *
		 * @hooked whitedot_header_hamburger - 10
		 */
		do_action( 'whitedot_header_content_before' );?>

		
		<div itemscope itemtype="http://schema.org/Organization">

			<?php
			/**
			 * whitedot_header_branding hook.
			 *
			 * @since 1.0
			 *
			 * @hooked whitedot_header_logo - 10
			 * @hooked whitedot_header_identity - 20
			 */
			do_action( 'whitedot_header_branding' );?>
	
		</div>

		<?php
		/**
		 * whitedot_header_nav hook.
		 *
		 * @since 1.0
		 *
		 * @hooked whitedot_header_navigation - 10
		 */
		do_action( 'whitedot_header_nav' );?>

		<?php
		/**
		 * whitedot_header_content_after hook.
		 *
		 * @since 1.0
		 *
		 * @hooked whitedot_mob_header_cart - 10
		 */
		do_action( 'whitedot_header_content_after' );?>

		
	</div><!-- .col-full -->
</header><!-- #masthead -->

<?php 
}



/**
 * WhiteDot Header Hamburger
 *
 * @since 1.0
 */
function whitedot_header_hamburger(){

?>

<button class="wd-hamburger wd-hamburger--htx" onclick="wd_menu_toggle()">
	<span><?php _e( 'toggle menu', 'whitedot' ); ?></span>
</button>

<?php

}

/**
 * WhiteDot Header Logo
 *
 * @since 1.0
 */
function whitedot_header_logo(){

	if ( has_custom_logo() ) {?>
		<div class="wd-site-logo"> <span><?php the_custom_logo(); ?></span></div>
	<?php } 

}



/**
 * WhiteDot Header Identity
 *
 * @since 1.0
 */
function whitedot_header_identity(){

?>

	<div class="site-branding" <?php if ( has_custom_logo() ) : ?>style="position: absolute; font-size: 1px; top: -300px;"<?php endif; ?>>
		<?php 
			if ( is_front_page() && is_home() ) : ?>
				<h1><a itemprop="url" class="site-name" href="<?php echo esc_url( home_url() ); ?>"><span itemprop="name"><?php bloginfo('name'); ?></span></a></h1>
		 <?php else :?>
		 	<a itemprop="url" class="site-name" href="<?php echo esc_url( home_url() ); ?>"><span itemprop="name"><?php bloginfo('name'); ?></span></a>
		 <?php endif; ?>

		<?php 
		$whitedot_description = get_bloginfo( 'description', 'display' );
		if ( $whitedot_description || is_customize_preview() ) :
			?>
			<p itemprop="description" class="site-description"><?php echo $whitedot_description; /* WPCS: xss ok. */ ?></p>
		<?php endif; ?>
	</div>

<?php 

}

/**
 * WhiteDot Header Navigation
 *
 * @since 1.0
 */
function whitedot_header_navigation(){
	?>

	<div id="wd-primary-nav" class="site-nav">

		<?php
		/**
		 * whitedot_before_header_navigation hook.
		 *
		 * @since 1.0
		 *
		 */
		do_action( 'whitedot_before_header_navigation' ); ?>

		<nav itemtype="http://schema.org/SiteNavigationElement" itemscope class="primary-nav <?php if ( class_exists( 'WooCommerce' ) ) {?>has-wp-cart<?php } ?>">
			<?php 
				$defaults = array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				);
				wp_nav_menu ( $defaults );
			 ?>
		</nav>

		<?php
		/**
		 * whitedot_after_header_navigation hook.
		 *
		 * @hooked whitedot_header_cart - 10
		 *
		 * @since 1.0
		 *
		 */
		do_action( 'whitedot_after_header_navigation' ); ?>

	</div>

<?php }


/**
 * WhiteDot Header Cart
 *
 * @since 1.0
 */
function whitedot_header_cart(){

	if ( class_exists( 'WooCommerce' ) ) {?>
		<span class="wd-cart">
			<div class="wd-cart-container"> 
				<a href="<?php echo wc_get_cart_url(); ?>">
					<i class="fa fa-shopping-cart pkcart-icon" aria-hidden="true"></i>
				</a>
				<a class="wdcart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'whitedot' ); ?>"><?php echo sprintf (_n( '%d', '%d', 'whitedot', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
					
				</a> 
			</div><!--.wd-cart-container -->

			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
				<?php if ( is_active_sidebar( 'widget-cart' )  ) : ?>
					<div class="wd_minicart_hover non-active woocommerce widget_shopping_cart">
						<?php dynamic_sidebar( 'widget-cart' ); ?>	
					</div><!--.widget_shopping_cart -->
				<?php endif; ?>
			<?php endif; ?>

		</span>
	<?php }

}

/**
 * WhiteDot Header Cart
 *
 * @since 1.0
 */
function whitedot_mob_header_cart(){

	if ( class_exists( 'WooCommerce' ) ) {?>
			<span class="wd-cart-mob">
				<div class="wd-cart-container-mob"> 
				<a href="<?php echo wc_get_cart_url(); ?>">
					<i class="fa fa-shopping-cart pkcart-icon" aria-hidden="true"></i>
				</a>
				<a class="wdcart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'whitedot' ); ?>"><?php echo sprintf (_n( '%d', '%d', 'whitedot', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
					
				</a> 
			</div><!--wd-cart-container-mob -->
		</span>
	<?php }

}