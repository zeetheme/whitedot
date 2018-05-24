<?php
/**
 * The template for displaying Left Sidebar pages.
 *
 * Template Name: Full Width (Page Builder)
 *
 * @package whitedot
 */

?>

<!doctype html>
<html <?php language_attributes(); ?> <?php whitedot_html_tag_schema(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'whitedot' ); ?></a>

	<?php
	/**
	 * whitedot_before_header hook.
	 *
	 * @since 1.0
	 *
	 */
	do_action( 'whitedot_before_header' );

	/**
	 * whitedot_header_content hook.
	 *
	 * @since 1.0
	 *
	 */
	do_action( 'whitedot_header_content' );

	
	/**
	 * whitedot_after_header hook.
	 *
	 * @since 1.0
	 *
	 */
	do_action( 'whitedot_after_header' );?>

	<div id="content" class="site-content">
		
		<div class="content-page-builder">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="page-builder-wrap">
					<?php the_content(); ?>
				</div>

			<?php endwhile; else : 

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</div><!-- .content-page-builder -->
	
	</div><!-- #content -->

	<?php
	/**
	 * whitedot_before_footer hook.
	 *
	 * @since 1.0
	 */
	do_action( 'whitedot_before_footer' ); 

	?>

	<footer itemtype="http://schema.org/WPFooter" itemscope class="site-footer">

		<?php
		/**
		 * whitedot_before_footer_content hook.
		 *
		 * @since 1.0
		 */
		do_action( 'whitedot_before_footer_content' ); 

		/**
		 * Functions hooked in to whitedot_footer_content action
		 *
		 * @hooked whitedot_footer_branding   - 10
		 * @hooked whitedot_footer_widgets   - 20
		 * @hooked whitedot_footer_info       - 30
		 */
		do_action( 'whitedot_footer_content' ); 

		/**
		 * whitedot_after_footer_content hook.
		 *
		 * @since 1.0
		 */
		do_action( 'whitedot_after_footer_content' );
		?>
		
	</footer><!--.site-footer-->

	<?php
	/**
	 * whitedot_after_footer hook.
	 *
	 * @since 1.0
	 */
	do_action( 'whitedot_after_footer' ); 

	?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>