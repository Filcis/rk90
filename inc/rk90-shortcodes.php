<?php 


function rk90_row( $atts, $content ) {
    return '<div class="row">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'rk90_row', 'rk90_row' );

function rk90_column( $atts, $content ) {
    $atts = shortcode_atts( array(
        'small' => 12,
        'medium'=> null,
        'large' => null,
        'push'  => null
    ), $atts );
    
    $atts['medium'] = ( $atts['medium'] == null ) ? $atts['small'] : $atts['medium'];
    $atts['large'] = ( $atts['large'] == null ) ? $atts['medium'] : $atts['large'];
   
    extract( $atts );
    
    $sizes = 'small-' . $small . ' medium-' . $medium . ' large-' . $large;
    $push = '';
    if ( !empty($atts['push']) ) {
        $push = ' push-' . $atts['push'];
    } 
    
    return '<div class="columns ' . $sizes . $push . '">' . do_shortcode( $content ) . '</div>';
}

add_shortcode( 'rk90_column', 'rk90_column');

function rk90_gadget_loop($atts) {
    $atts = shortcode_atts( array(
        'rodzaj' => ''
    ), $atts );
    $args = array(
        'post_type' => 'rk90_Gadget', 
        'posts_per_page' => 20,
        'taxonomy' => $atts['rodzaj'],
    );
    $posts = new WP_Query($args);
    	ob_start();
		// Posts are found
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) :
				$posts->the_post();
				global $post;
				?>
				<div id="su-post-<?php the_ID(); ?>" class="medium-4">
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="su-post-thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
					<?php endif; ?>
					<h2 class="su-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</div>
				<?php
			endwhile;
		}
		// Posts not found
		else {
			echo '<h4>' . __( 'Posts not found', 'shortcodes-ultimate' ) . '</h4>';
		}
		$output = ob_get_contents();
		ob_end_clean();
		// Reset the query
		wp_reset_postdata();
		su_query_asset( 'css', 'su-other-shortcodes' );
		return $output;
} 
add_shortcode( 'rk90_gadgets', 'rk90_gadget_loop');