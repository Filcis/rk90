<?php
/**
 * Header Template
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
<!-- ===== NAVIGATION AND BRANDING ===== -->
            <header id="masthead" class="site-header" role="banner">
                <div class="main-navigation-wrapper">
                    <div class="container">
                        <div class="site-branding"> 
                            <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_template_directory_uri() . '/assets/logo_90.svg' ?>">
                            </a>
                            <a class="site-logo" href="http://www.radio.katowice.pl/" rel="home" target="_blank">
                                <img alt="Radio Katowice" src="<?php echo get_template_directory_uri() . '/assets/logo_radio.svg' ?>">
                            </a>
                            
                        </div>                  
                        <!-- .site-nav -->
                        <nav id="site-navigation" class="main-navigation small-12 medium-9" role="navigation">
                            <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
                        </nav>
                        <!-- #site-navigation -->
                    </div>
                </div>
                <!-- .entry-header -->
                <?php 
                $rk90_sub_meta = rk90_subtitle_get_meta( 'rk90_subtitle' );
                if ( !empty( $rk90_sub_meta ) ) : 
                ?>
                <div class="page-title-wrapper container">
                <?php rk90_page_title(); ?>
                </div>
                <?php endif; ?>
            </header>
            <!-- #masthead -->