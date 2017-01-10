<?php /* Template Name: Gadżety */ 

get_header(); ?>

	<div id="primary" class="content-area medium-8">
		<main id="main" class="site-main" role="main">
		<?php
         while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
            
            
        $terms = get_terms( 'rk90_gadget_cat', array( 'hide_empty' => false ) );  
        foreach($terms as $i) {
                //argumenty dla pętli  
                $args = array( 
                    'post_type' => 'rk90_Gadget', 
                    'posts_per_page' => 10,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'rk90_gadget_cat',
                            'terms' => $i->term_id,
                            'include_children' => true,
                            'operator' => 'IN'
                            )
                        ),
                );
                //custom taxonomy      
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                echo '<h1>' . $i->name . '</h><br>';
                the_title();
                echo '<div class="entry-content__gadget">';
                the_post_thumbnail();
                the_content();
                echo '</div>';
                endwhile; 
            }       
            ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
