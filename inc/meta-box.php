<?php
/**
 * Builds the main Layout meta box.
 *
 * @package WhiteDot
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


function whitedot_supress_title( $title, $post_id = 0 ) {
	if ( ! $post_id ) {
		return $title;
	}

	$hide_title = get_post_meta( $post_id, 'whitedot_hide_title', true );
	if ( ! is_admin() && is_singular() && intval( $hide_title ) && in_the_loop() ) {
		return '';
	}

	return $title;
}

add_filter( 'the_title', 'whitedot_supress_title', 10, 2 );

/*--------------------------------------------------
	MetaBox
----------------------------------------------------*/

add_action( 'load-post.php', 'whitedot_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'whitedot_post_meta_boxes_setup' );

function whitedot_post_meta_boxes_setup() {
	/* Add meta boxes on the 'add_meta_boxes' hook. */
	add_action( 'add_meta_boxes', 'whitedot_add_post_meta_boxes' );

	/* Save post meta on the 'save_post' hook. */
	add_action( 'save_post', 'whitedot_save_meta', 10, 2 );
}

function whitedot_add_post_meta_boxes() {
	add_meta_box(
		'whitedot-hide-title',        // Unique ID
		'Hide Title?',            // Title
		'whitedot_render_metabox',    // Callback function
		null,                    // Admin page
		'side',                    // Context
		'core'                    // Priority
	);
}

function whitedot_render_metabox( $post ) {
	$curr_value = get_post_meta( $post->ID, 'whitedot_hide_title', true );
	wp_nonce_field( basename( __FILE__ ), 'whitedot_meta_nonce' );
	?>
	<input type="hidden" name="whitedot-hide-title-checkbox" value="0"/>
	<input type="checkbox" name="whitedot-hide-title-checkbox" id="whitedot-hide-title-checkbox"
	       value="1" <?php checked( $curr_value, '1' ); ?> />
	<label for="whitedot-hide-title-checkbox"><?php _e( 'Hide the title for this item : ', 'whitedot' ); ?></label>
	<?php
}

function whitedot_save_meta( $post_id, $post ) {

	/* Verify the nonce before proceeding. */
	if ( ! isset( $_POST['whitedot_meta_nonce'] ) || ! wp_verify_nonce( $_POST['whitedot_meta_nonce'], basename( __FILE__ ) ) ) {
		return;
	}

	/* Get the post type object. */
	$post_type = get_post_type_object( $post->post_type );

	/* Check if the current user has permission to edit the post. */
	if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
		return;
	}

	/* Get the posted data and sanitize it for use as an HTML class. */
	$form_data = ( isset( $_POST['whitedot-hide-title-checkbox'] ) ? $_POST['whitedot-hide-title-checkbox'] : '0' );
	update_post_meta( $post_id, 'whitedot_hide_title', $form_data );
}