<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package rk_90lat
 */

get_header(); ?>

<header class="page-header container">
    <h1 class="page-title"><?php esc_html_e( 'Oops! Nie znaleziono strony', 'rk90' ); ?></h1>
</header><!-- .page-header -->
<!-- .featured image -->
<div id="page-featured-image" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/404.jpg' ?>)"></div>
<!-- #featured image -->
<div id="content" class="site-content container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">


				<div class="page-content">
					<p><?php esc_html_e( 'Spróbuj wyszukiwania lub sprawdź linki poniżej', 'rk90' ); ?></p>
                    <div class="row">
					<?php
						get_search_form();
                    ?>
                    </div>
                    <?php
						the_widget( 'WP_Widget_Recent_Posts' );

						// Only show the widget if site has multiple categories.
						if ( rk90_categorized_blog() ) :
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Najpopularniejsze kategorie', 'rk90' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->

					<?php
						endif;

						the_widget( 'WP_Widget_Tag_Cloud' );
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
