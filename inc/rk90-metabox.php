<?php

function rk90_add_meta_boxes( $post ){
	add_meta_box( 'rk90_subtitle', 
                 __( 'Pudtytuł', 'rk90' ),
                 'rk90_generate_metabox',
                 '',
                 'normal',
                 'low' );
}
add_action( 'add_meta_boxes', 'rk90_add_meta_boxes' );

function rk90_generate_metabox () {
    global $post;
    wp_nonce_field( basename( __FILE__ ), 'rk90_meta_box_nonce' );
    $subtitle = get_post_meta( $post->ID, 'rk90subtitle', true );
    ?>

<h3><?php _e( 'Podtytuł', 'rk90' ); ?></h3>
		<p>
			<input type="text" name="rk90subtitle" value="<?php echo $subtitle; ?>" /> 
		</p>

<?php
}

function rk90_save_meta_box_data( $post_id ){
	// verify taxonomies meta box nonce
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['rk90_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['rk90_meta_box_nonce'], 'rk90_meta_box_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	// store custom fields values
	if ( isset( $_POST['rk90subtitle'] ) ) {
        $metabox_value = esc_attr( $_POST['rk90subtitle'] );
        $metabox_value = str_replace('[', '<', $metabox_value);
        $metabox_value = str_replace(']', '>', $metabox_value);
		update_post_meta( $post_id, 'rk90subtitle', $metabox_value );
	}
}
add_action( 'save_post', 'rk90_save_meta_box_data' );