<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rk_90lat
 */

get_header();
//featured image
if (has_post_thumbnail(get_option( 'page_for_posts' )) ) : 
    $rk90_featured_image_url = get_the_post_thumbnail_url( get_option( 'page_for_posts' ),'full' ); ?>
    <div id="page-featured-image" style="background-image:url(<?php echo $rk90_featured_image_url ?>);"></div>
<?php endif;?>
<!-- #featured image -->
<div id="content" class="site-content container">

	<div id="primary" class="content-area medium-8">
		<main id="main" class="site-main" role="main">
            <header class="entry-header">
                <h1 class="entry-title">
		<?php echo apply_filters( 'the_title', get_the_title( get_option( 'page_for_posts' ) ) ); ?>
                </h1>
                <hr>
	</header><!-- .entry-header -->
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
