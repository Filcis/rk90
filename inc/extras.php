<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package rk_90lat
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function rk90_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'rk90_body_classes' );

/**
 * Modifies default tag cloud arguments.
 *
 * @param array $args.
 * @return array
 */

function rk90_custom_tag_cloud_widget($args) {
	$args['largest'] = 14; //largest tag
	$args['smallest'] = 10; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'rk90_custom_tag_cloud_widget' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function rk90_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'rk90_pingback_header' );

/**
 * Add secondary header with page title above featured image.
 */
function rk90_page_title() {
    if ( is_home() || is_page()) : ?>
    <div class="entry-header medium-4">
        <?php
                    if (is_home()) {
                        echo '<h1 class="entry-title">' . apply_filters( 'the_title', get_the_title( get_option( 'page_for_posts' ) )) . '</h1>';
                    } else {
                        the_title( '<h1 class="entry-title">', '</h1>' ); 
                    }
                 ?> </div>
    <?php   
    rk90_the_subtitle_meta();
    else:
//    do nothing
    endif;
}

function rk90_post_class( $classes ) {
    if(is_home() || is_archive()){
        array_push($classes, 'post-card');
    }
    return $classes;
}
add_filter( 'post_class', 'rk90_post_class' );


function rk90_remove_more_jump_link($link) {
    $offset = strpos($link, '#more-');
    if ($offset) {
        $end = strpos($link, '"',$offset);
    }
    if ($end) {
        $link = substr_replace($link, '', $offset, $end-$offset);
    }
    return $link;
}
add_filter('the_content_more_link', 'rk90_remove_more_jump_link');