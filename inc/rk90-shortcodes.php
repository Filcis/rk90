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
        'rodzaj' => '',
    ), $atts );
    $args = array(
        'post_type' => 'rk90_Gadget', 
        'posts_per_page' => 20,
        'tax_query' => array(
		array(
			'taxonomy' => 'rk90_gadget_cat',
			'field'    => 'slug',
			'terms'    => $atts['rodzaj'],
		),
	),
    );
    $posts = new WP_Query($args);
    $output = '<div class="gadget_wrapper">';
    	ob_start();
		// Posts are found
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) :
				$posts->the_post();
//				global $post;
				?>
				<div id="<?php the_ID(); ?>" class="medium-4 gadget_single">
					<?php if ( has_post_thumbnail() ) : ?>
						<img class="gadget_zoom gadget_thumbnail" src="<?php the_post_thumbnail_url('small'); ?>" data-zoom-image="<?php the_post_thumbnail_url('large'); ?>">
					<?php endif; ?>
                    <section class="gadget_description">
                        <h3 class="gadget_title"><?php the_title(); ?></h3>
                        <?php rk90_gadget_description() ?>
<!--                    tu funkcja generująca opisy-->
                    </section>
				</div>
				<?php
			endwhile;
		}
		// Posts not found
		else {
			echo '<h4>' . __( 'brak postów', 'rk90' ) . '</h4>';
		}
		$output .= ob_get_contents();
        $output .= '</div>';
		ob_end_clean();
		// Reset the query
		wp_reset_postdata();
		su_query_asset( 'css', 'su-other-shortcodes' );
		return $output;
} 
add_shortcode( 'rk90_gadgets', 'rk90_gadget_loop');