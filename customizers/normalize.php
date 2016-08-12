<?php
/**
 * marcador Theme Customizer Normalizer.
 *
 * @package marcadordo
 * @author Richard Blondet <richardblondet@gmail.com>
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function marcador_customize_normalizer( $wp_customize ) {
	$wp_customize->remove_section('title_tagline');
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('background_image');
	$wp_customize->remove_section('nav');
	$wp_customize->remove_panel('widgets');
	$wp_customize->remove_panel('nav_menus');
	$wp_customize->remove_section('static_front_page');
}
add_action( 'customize_register', 'marcador_customize_normalizer', 20 );