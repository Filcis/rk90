<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rk_90lat
 */

?>
	</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
        <?php if(is_front_page()) : ?>
            <div class="footer_image_wrapper">
                <img alt="Orkiestra, ilustracja Romana Kalarusa" src=<?php echo get_template_directory_uri() . '/assets/Orkiestra.png' ?>>
            </div>
        <?php endif; ?>
		<div class="site-info container">
            <?php 
            if ( is_active_sidebar( 'footer-1' ) ){
                dynamic_sidebar( 'footer-1' );
            }
            if ( is_active_sidebar( 'footer-2' ) ){
                dynamic_sidebar( 'footer-2' );
            }
            if ( is_active_sidebar( 'footer-3' ) ){
                dynamic_sidebar( 'footer-3' );
            }
            ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
