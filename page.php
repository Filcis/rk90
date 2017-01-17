<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rk_90lat
 */

get_header(); ?>
<!-- .featured image -->
<?php
if (has_post_thumbnail()) : 
$rk90_featured_image_url = get_the_post_thumbnail_url(); ?>
<div id="page-featured-image" style="background-image: url(<?php echo $rk90_featured_image_url ?>)"> </div>
<?php endif;?>
<!-- #featured image -->

<div id="content" class="site-content container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->
    <?php
get_footer();