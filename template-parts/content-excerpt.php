<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
        
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) : ?>
		<?php
		endif; ?>
        
	</header><!-- .entry-header -->
    <div class="excerpt-wrapper">
    		<div class="entry-meta">
			<?php rk90_posted_on(); ?>
		</div><!-- .entry-meta -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Czytaj dalej %s <span class="meta-nav">&rarr;</span>', 'rk90' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
	</div><!-- .entry-content -->
</div>
	<footer class="entry-footer">
		<?php rk90_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->