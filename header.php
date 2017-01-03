<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rk_90lat
 */

?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content">
                <?php esc_html_e( 'Skip to content', 'rk90' ); ?>
            </a>
            <!-----------------------------------------------------------
-----------------NAVIGATION AND BRANDING---------------------
------------------------------------------------------------>
            <header id="masthead" class="site-header" role="banner">
                <div class="main-navigation-wrapper container">
                    <div class="site-branding"> <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_template_directory_uri() . '/assets/logo_90.svg' ?>">
                        </a> </div>
                    <!-- .site-branding -->
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
                    </nav>
                </div>
                <!-- #site-navigation -->
            </header>
            <!-- #masthead -->
            <?php
            if (has_post_thumbnail()) {
                $rk90_featured_image_url = get_the_post_thumbnail_url();
            } else {
                $rk90_featured_image_url= '';
            }
            ?>
            <div id="page-featured-image" style="background-image: url(<?php echo $rk90_featured_image_url ?>)">
                <div id="featured-image-text__wrapper" class="container">
                    <p class="featured-image-text"><?php echo get_post_meta($post->ID, 'rk90subtitle',true)?></p>
                </div>
            </div>
            <!-- #featured image -->
            <div id="content" class="site-content container">