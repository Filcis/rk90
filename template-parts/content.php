<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rk_90lat
 */

?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php
		if ( !is_single() ) :
			the_title( '<h1 class="entry-title_excerpt">', '</h1>' );
            if ( 'post' === get_post_type() ) : ?>
                <div class="entry-meta">
                    <?php rk90_posted_on(); ?>
                </div>
                <!-- .entry-meta -->
                <?php
            endif;
        endif; ?>
        </header>
        <!-- .entry-header -->
        <div class="entry-content">
            <?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Czytaj więcej %s <span class="meta-nav">&rarr;</span>', 'rk90' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rk90' ),
				'after'  => '</div>',
			) );
		?> </div>
        <!-- .entry-content -->
        <footer class="entry-footer">
            <?php rk90_entry_footer(); ?>
        </footer>
        <!-- .entry-footer -->
    </article>
    <!-- #post-## -->