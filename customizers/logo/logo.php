<?php
/**
 * marcador Logo Theme Customizer.
 *
 * @package marcadordo
 * @author Richard Blondet <richardblondet@gmail.com>
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function marcador_logo_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'marcador_logo_section_handler' , array(
		'title'      => __( 'Logo', 'marcador' ),
		'priority'   => 10,
		'description'=> __('Logo de Marcador. Dimensiones 130px ancho x 25px alto', 'marcador')
	));
	$wp_customize->add_setting( 'marcador_logo_setting_handler' , array(
		'default'     => get_template_directory_uri().'/assets/imgs/logo.png',
		'capability'  => 'edit_theme_options',
		'type'        => 'option',
		'transport'   => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'marcador_logo_setting_handler', array(
		'label'      => __( 'Seleccionar imagen .png, .gif, .jpg', 'marcador' ),
		'section'    => 'marcador_logo_section_handler',
		'settings'   => 'marcador_logo_setting_handler',
	)));
	$wp_customize->get_setting( 'marcador_logo_setting_handler' )->transport = 'postMessage';
}
add_action( 'customize_register', 'marcador_logo_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * Used by hook: 'customize_preview_init'
 */
if(! function_exists( 'marcador_logo_customize_preview_js' )) {
	function marcador_logo_customize_preview_js() {
		wp_enqueue_script( 
			'marcador_logo_customizer', 
			get_template_directory_uri() . '/customizers/logo/logo.js', 
			array( 'jquery','customize-preview' ), 
			'1', 
			true
		);
	}
	add_action( 'customize_preview_init', 'marcador_logo_customize_preview_js' );
}