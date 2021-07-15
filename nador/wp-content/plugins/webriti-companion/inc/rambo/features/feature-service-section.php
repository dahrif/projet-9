<?php
$repeater_path = trailingslashit( WC__PLUGIN_DIR ) . '/inc/controls/customizer-repeater/functions.php';
	if ( file_exists( $repeater_path ) ) {
		require_once( $repeater_path );
	}

// customizer serive panel
function rambo_service_customizer_service_panel( $wp_customize ) {

$selective_refresh = isset( $wp_customize->selective_refresh ) ? true : false;


	//Service panel
	$wp_customize->add_section( 'service_settings' , array(
	'title'      => esc_html__('Service settings', 'webriti-companion'),
	'capability'     => 'edit_theme_options',
	'panel'  => 'section_settings',
	'priority'   => 516,
   	) );
	
		// enable service section
			$wp_customize->add_setting('rambo_pro_theme_options[home_service_enabled]',array(
			'default' => false,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_service_checkbox',
			'type' => 'option'
			) );
			
			$wp_customize->add_control('rambo_pro_theme_options[home_service_enabled]',array(
			'label' => esc_html__('Hide service section','webriti-companion'),
			'section' => 'service_settings',
			'type' => 'checkbox',
			) );
			
			// Service title
			$wp_customize->add_setting('rambo_pro_theme_options[service_title]',array(
			'default' => esc_html__('Voluptate Velit','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_service_sanitize_html',
			'type' => 'option',
			'transport' => $selective_refresh ? 'postMessage' : 'refresh',
			) );
			
			$wp_customize->add_control('rambo_pro_theme_options[service_title]',array(
			'label' => esc_html__('Title','webriti-companion'),
			'section' => 'service_settings',
			'type' => 'text',
			) );
			
			// service description
			$wp_customize->add_setting('rambo_pro_theme_options[service_description]',array(
			'default' => esc_html__('Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit','webriti-companion'),
			'sanitize_callback' => 'rambo_service_sanitize_html',
			'type' => 'option',
			'transport' => $selective_refresh ? 'postMessage' : 'refresh',
			) );
			
			$wp_customize->add_control('rambo_pro_theme_options[service_description]',array(
			'label' => esc_html__('Description','webriti-companion'),
			'section' => 'service_settings',
			'type' => 'textarea',
			) );
			
			if ( class_exists( 'Webriti_Companion_Repeater' ) ) {
			$wp_customize->add_setting('rambo_pro_theme_options[rambo_service_content]', array(
			'type'=> 'option',
			'sanitize_callback' => 'webriti_companion_repeater_sanitize',
			) );

			$wp_customize->add_control( new Webriti_Companion_Repeater( $wp_customize, 'rambo_pro_theme_options[rambo_service_content]', array(
				'label'                             => esc_html__( 'Service content', 'webriti-companion' ),
				'section'                           => 'service_settings',
				'priority'                          => 10,
				'add_field_label'                   => esc_html__( 'Add new Service', 'webriti-companion' ),
				'item_name'                         => esc_html__( 'Service', 'webriti-companion' ),
				'customizer_repeater_icon_control'  => true,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_button_text_control' => true,
				'customizer_repeater_image_control' => true,
				'customizer_repeater_checkbox_control' => true,
				) ) );
		}
			
			
			
			function rambo_service_sanitize_html( $input ) {
				return wp_kses_post( force_balance_tags( $input ) );
			}
			
			
}
add_action( 'customize_register', 'rambo_service_customizer_service_panel' );

/**
 * Add selective refresh for service title section controls.
 */
function rambo_register_service_section_partials( $wp_customize ){

$wp_customize->selective_refresh->add_partial( 'rambo_pro_theme_options[service_title]', array(
		'selector'            => '.home_service_section .featured_port_title h1',
		'settings'            => 'rambo_pro_theme_options[service_title]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'rambo_pro_theme_options[service_description]', array(
		'selector'            => '.home_service_section .featured_port_title p',
		'settings'            => 'rambo_pro_theme_options[service_description]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'rambo_pro_theme_options[rambo_service_content]', array(
		'selector'            => '.home_service_section .sidebar-service',
		'settings'            => 'rambo_pro_theme_options[rambo_service_content]',
	
	) );
}
add_action( 'customize_register', 'rambo_register_service_section_partials' );

function rambo_service_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}