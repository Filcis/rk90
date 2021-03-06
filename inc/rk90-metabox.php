<?php

/**
* Return subtitle metabox value
*/

function rk90_subtitle_get_meta( $value ) {
//    if (!is_singular() || !is_home()) return;
	global $post;
    $id = $post->ID;
    if(is_home()){
        global $wp_query;
        $id = $wp_query->get_queried_object_id();
    }

	$field = get_post_meta( $id, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}


/**
* Register subtitle metabox
*/
function rk90_subtitle_add_meta_box() {
	add_meta_box(
		'rk90_subtitle',
		__( 'rk90 subtitle', 'rk90_subtitle' ),
		'rk90_subtitle_html',
		'page',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'rk90_subtitle_add_meta_box' );

/**
* Subtitle metabox markup
*/
function rk90_subtitle_html( $post) {
	wp_nonce_field( '_rk90_subtitle_nonce', 'rk90_subtitle_nonce' ); ?>

	<p>
		<label for="rk90_subtitle"><?php _e( 'Dodatkowy opis strony', 'rk90_subtitle' ); ?></label><br><br>
		<textarea name="rk90_subtitle" id="rk90_subtitle" class="widefat" ><?php echo rk90_subtitle_get_meta( 'rk90_subtitle' ); ?></textarea>
	
	</p><?php
}

function rk90_subtitle_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['rk90_subtitle_nonce'] ) || ! wp_verify_nonce( $_POST['rk90_subtitle_nonce'], '_rk90_subtitle_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['rk90_subtitle'] ) ){
        $metabox_value = str_replace('[', '<', $metabox_value);
        $metabox_value = str_replace(']', '>', $metabox_value);
		update_post_meta( $post_id, 'rk90_subtitle', esc_attr( $_POST['rk90_subtitle'] ) );
    }
}
add_action( 'save_post', 'rk90_subtitle_save' );

/*
	Usage: rk90_subtitle_get_meta( 'rk90_subtitle' )
*/

/**
* changes "[" to "<", to allow html in textarea
*/
function rk90_the_subtitle_meta() {
    $metabox_value = rk90_subtitle_get_meta( 'rk90_subtitle' );
    $metabox_value = str_replace('[', '<', $metabox_value);
    $metabox_value = str_replace(']', '>', $metabox_value);
    if (!empty($metabox_value)){
        
        echo '<div id="featured-image-text__wrapper" class="medium-8">
                    <p class="featured-image-text">' . $metabox_value . 
                    '</p>
              </div>';
    }
}
