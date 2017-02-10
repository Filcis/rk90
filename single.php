<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package rk_90lat
 */

get_header(); ?>
<div id="content" class="site-content container">

    <header class="entry-header__single medium-12 large-8">
            <?php the_title( '<h1 class="entry-title">', '</h1>' );  
        if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php rk90_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?> 
    </header> 

	<div id="primary" class="content-area__single medium-8">
		<main id="main" class="site-main" role="main">
                <!-- .featured image -->

<!-- #featured image -->

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
