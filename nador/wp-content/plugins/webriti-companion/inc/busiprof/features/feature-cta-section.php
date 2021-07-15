<?php
function busiprof_theme_cta_section( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? true : false;

	/* Banner strip section */
	$wp_customize->add_section( 'bannerstrip_section' , array(
		'title'      => esc_html__('Infobar settings', 'webriti-companion'),
		'panel'  => 'section_settings',
		'priority'   => 1,
   	) );

	// Enable banner strip
	$wp_customize->add_setting( 'busiprof_theme_options[home_banner_strip_enabled]' , array( 'default' => 'on' , 'type' => 'option', 'sanitize_callback' => 'busiprof_sanitize_radio' ) );
	$wp_customize->add_control(	'busiprof_theme_options[home_banner_strip_enabled]' , array(
				'label'    => esc_html__('Enable Infobar', 'webriti-companion' ),
				'section'  => 'bannerstrip_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>esc_html__('ON','webriti-companion'),
					'off'=>esc_html__('OFF','webriti-companion')
				)
		));
		
		// Banner strip text
		$wp_customize->add_setting( 'busiprof_theme_options[slider_head_title]', 
		array( 'default' => esc_html__('Busiprof: Lorem ipsum dolor sit amet, consectetur adipiscing elit','webriti-companion') , 'type' => 'option', 'sanitize_callback' => 'busiprof_input_field_sanitize_text' ) );
		$wp_customize->add_control(	'busiprof_theme_options[slider_head_title]', 
			array(
				'label'    => esc_html__( 'Infobar text', 'webriti-companion' ),
				'section'  => 'bannerstrip_section',
				'type'     => 'textarea',
		));
	

}
add_action( 'customize_register', 'busiprof_theme_cta_section' );