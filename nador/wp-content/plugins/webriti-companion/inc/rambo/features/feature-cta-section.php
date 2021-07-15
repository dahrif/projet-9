<?php
function rambo_theme_cta_section( $wp_customize ) {

	$selective_refresh = isset( $wp_customize->selective_refresh ) ? true : false;
	
/* Site Intro Panel */
	$wp_customize->add_section( 'site_intro_settings' , array(
			'title'      => esc_html__('Call to action top settings', 'webriti-companion'),
			'panel'  => 'section_settings',
			'priority'   => 515,
		) );
		
		
			$wp_customize->add_setting(
			'rambo_pro_theme_options[site_intro_descritpion]',
			array(
				'default' => esc_html__('Quis nostrum exercitationem ullam corporis suscipit.','webriti-companion'),
				'capability'     => 'edit_theme_options',
				'type' => 'option',
				'sanitize_callback' => 'sanitize_text_field',
				
				'transport' => $selective_refresh ? 'postMessage' : 'refresh',
				)
			);	
				

			$wp_customize->add_control('rambo_pro_theme_options[site_intro_descritpion]',array(
			'label'   => esc_html__('Description','webriti-companion'),
			'section' => 'site_intro_settings',
			 'type' => 'text',)  );	

			 
			$wp_customize ->add_setting (
			'rambo_pro_theme_options[site_intro_button_text]',
			array( 
			'default' => esc_html__('Sequi Nesciunt','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
			'transport' => $selective_refresh ? 'postMessage' : 'refresh',
			) 
			);

			$wp_customize->add_control (
			'rambo_pro_theme_options[site_intro_button_text]',
			array (  
			'label' => esc_html__('Button Text','webriti-companion'),
			'section' => 'site_intro_settings',
			'type' => 'text',
			) );
			
			$wp_customize ->add_setting (
			'rambo_pro_theme_options[site_intro_button_link]',
			array( 
			'default' => '#',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type' => 'option',
			) );

			$wp_customize->add_control (
			'rambo_pro_theme_options[site_intro_button_link]',
			array (  
			'label' => esc_html__('Button Link','webriti-companion'),
			'section' => 'site_intro_settings',
			'type' => 'text',
			) );

			$wp_customize->add_setting(
				'rambo_pro_theme_options[intro_button_target]',
				array('capability'     => 'edit_theme_options',
				'sanitize_callback' => 'rambo_cta_checkbox',
				'type' => 'option',
				'default'=> true ,
				));

			$wp_customize->add_control(
				'rambo_pro_theme_options[intro_button_target]',
				array(
					'type' => 'checkbox',
					'label' => esc_html__('Open link in new tab','webriti-companion'),
					'section' => 'site_intro_settings',
				)
			);

}
add_action( 'customize_register', 'rambo_theme_cta_section' );

/**
 * Add selective refresh for service title section controls.
 */
function rambo_register_callout_section_partials( $wp_customize ){

$wp_customize->selective_refresh->add_partial( 'rambo_pro_theme_options[site_intro_descritpion]', array(
		'selector'            => '.purchase_main_content .span8 h1',
		'settings'            => 'rambo_pro_theme_options[site_intro_descritpion]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'rambo_pro_theme_options[site_intro_button_text]', array(
		'selector'            => '.purchase_main_content .span4 a',
		'settings'            => 'rambo_pro_theme_options[site_intro_button_text]',
	
	) );
}
add_action( 'customize_register', 'rambo_register_callout_section_partials' );

function rambo_cta_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}