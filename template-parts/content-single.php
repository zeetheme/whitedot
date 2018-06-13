<?php
/**
 * Template part for displaying single blog content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WhiteDot
 */



/**
 * whitedot_main_single_content_before hook.
 *
 *
 * @since 0.1
 */
do_action( 'whitedot_main_single_content_before' ); ?>

<div class="wd-single-wrap">
						
	<article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class() ?>>

		<?php
		/**
		 * Functions hooked into whitedot_single_post_before add_action
		 *
		 * @hooked whitedot_thumbnail  - 10
		 *
		 * @since 0.1
		 */
		do_action( 'whitedot_single_post_before' ); ?>
		
		<div class="wd-post-content">

			<?php
			/**
			* Functions hooked into whitedot_single_post add_action
			*
			* @hooked whitedot_post_header          - 10
			* @hooked whitedot_post_meta            - 20
			* @hooked whitedot_post_content         - 30
			*/
			do_action( 'whitedot_single_post' ); ?>
	
		</div><!--.wd-post-content-->

		<?php
		/**
		 * whitedot_single_post_after hook.
		 *
		 * @hooked whitedot_single_post_tags       - 10
		 *
		 * @since 0.1
		 */
		do_action( 'whitedot_single_post_after' ); ?>

	</article>	
</div><!--.wd-single-wrap-->

<?php
/**
 * Functions hooked into whitedot_main_single_content_after add_action
 *
 * @hooked whitedot_post_author - 10
 * @hooked whitedot_post_comment - 20
 *
 * @since 0.1
 */
do_action( 'whitedot_main_single_content_after' );
