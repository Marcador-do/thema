<?php
/**
 *
 * Functions Index:
 * - Enqueue styles.
 * - Enqueue scripts.
 *
 * Note: Please update the index if you modify this file.
 *
 **/


/**
 * Enqueue styles. 
 **/
function marcador_styles() {
	$google_roboto_font = 'https://fonts.googleapis.com/css?family=Material+Icons|Roboto:300,400,700';
	$twitter_bootstrap  = '/assets/vendor/bootstrap/css/bootstrap.min.css?id=5d472e23c7e390b505e8dd6606f3a9ce';

	wp_enqueue_style( 'google-roboto-font', $google_roboto_font, array() );
	wp_enqueue_style( 'twitter-bootstrap', get_template_directory_uri() . $twitter_bootstrap, array() );
	wp_enqueue_style( 'marcador-main', get_template_directory_uri() . '/style.css', array('twitter-bootstrap'), '1.0.0' );
}


/**
 * Enqueue scripts. 
 **/
function marcador_scripts() {
	$sidebar_menu = '/assets/js/sidebar-menu.js';
	$sidebar_nav_submenu = '/assets/js/sidebar-nav-submenu.js';

	wp_enqueue_script( 'sidebar-menu', get_template_directory_uri() . $sidebar_menu, array(), '1.0.0' );
	wp_enqueue_script( 'sidebar-nav-menu', get_template_directory_uri() . $sidebar_nav_submenu, array('sidebar-menu'), '1.0.0' );
}

// Load Styles
add_action( 'wp_enqueue_scripts', 'marcador_styles' );
// Load Scripts
add_action( 'wp_enqueue_scripts', 'marcador_scripts' );
