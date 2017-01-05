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