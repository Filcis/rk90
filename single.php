<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

    <header class="entry-header__single">
            <?php the_title( '<h1 class="entry-title">', '</h1>' );  ?> 
    </header> 

	<div id="primary" class="content-area__single medium-7">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

//			// If comments are open or we have at least one comment, load up the comment template.
//			if ( comments_open() || get_comments_number() ) :
//				comments_template();
//			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
