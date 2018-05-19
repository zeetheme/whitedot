<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WhiteDot
 */

if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<div itemtype="http://schema.org/WPSideBar" itemscope class="secondary">
		<div class="wd-sidebar">
			<div class="wd-widget-area">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>	
			</div><!--.wd-widget-area-->
		</div><!--.wd-sidebar-->
	</div><!--.secondary-->
<?php endif; ?>


