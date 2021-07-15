<?php
function rambo_theme_portfolio_section( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? true : false;

//Project panel
	$wp_customize->add_section( 'project_settings' , array(
	'title'      => esc_html__('Project settings', 'webriti-companion'),
	'capability'     => 'edit_theme_options',
	'panel'  => 'section_settings',
	'priority'   => 517,
   	) );

		// enable project section
			$wp_customize->add_setting('rambo_pro_theme_options[project_protfolio_enabled]',array(
			'default' => false,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_project_checkbox',
			'type' => 'option'
			) );
			
			$wp_customize->add_control('rambo_pro_theme_options[project_protfolio_enabled]',array(
			'label' => esc_html__('Hide project section','webriti-companion'),
			'section' => 'project_settings',
			'type' => 'checkbox',
			) );
			
			
	
			//Project Title
			$wp_customize->add_setting(
			'rambo_pro_theme_options[project_heading_one]',
			array(
				'default' => esc_html__('Perspiciatis Unde','webriti-companion'),
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'rambo_project_sanitize_html',
				'type' => 'option',
				'transport' => $selective_refresh ? 'postMessage' : 'refresh',
				)
			);	
			$wp_customize->add_control('rambo_pro_theme_options[project_heading_one]',array(
			'label'   => esc_html__('Title','webriti-companion'),
			'section' => 'project_settings',
			 'type' => 'text',)  );	
			 
			//Project Description 
			 $wp_customize->add_setting(
			'rambo_pro_theme_options[project_tagline]',
			array(
				'default' => esc_html__('Maecenas sit amet tincidunt elit. Pellentesque habitant morbi tristique senectus et netus et Nulla facilisi.','webriti-companion'),
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'rambo_project_sanitize_html',
				'type' => 'option',
				'transport' => $selective_refresh ? 'postMessage' : 'refresh',
				)
			);	
			$wp_customize->add_control( 'rambo_pro_theme_options[project_tagline]',array(
			'label'   => esc_html__('Description','webriti-companion'),
			'section' => 'project_settings',
			 'type' => 'textarea',)  );
			 
			 
		//Projects one image
		$wp_customize->add_setting( 'rambo_pro_theme_options[project_one_thumb]',array('default' => WC__PLUGIN_URL.'/inc/rambo/img/port1.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'rambo_pro_theme_options[project_one_thumb]',
				array(
					'label' => esc_html__('Image','webriti-companion'),
					'settings' =>'rambo_pro_theme_options[project_one_thumb]',
					'section' => 'project_settings',
					'type' => 'upload',
				)
			)
		);
		
		//Project One Title
		$wp_customize->add_setting(
		'rambo_pro_theme_options[project_one_title]', array(
			'default'        => esc_html__('Aliquip Ex','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_project_sanitize_html',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[project_one_title]', array(
			'label'   => esc_html__('Title', 'webriti-companion'),
			'section' => 'project_settings',
			'type' => 'text',
		));
		
		
		//Project One Description
		$wp_customize->add_setting(
		'rambo_pro_theme_options[project_one_text]', array(
			'default'        => esc_html__('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[project_one_text]', array(
			'label'   => esc_html__('Description', 'webriti-companion'),
			'section' => 'project_settings',
			'type' => 'text',
		));
		
		//Projects two image
		$wp_customize->add_setting( 'rambo_pro_theme_options[project_two_thumb]',array('default' => WC__PLUGIN_URL.'/inc/rambo/img/port2.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'rambo_pro_theme_options[project_two_thumb]',
				array(
					'label' => esc_html__('Image','webriti-companion'),
					'settings' =>'rambo_pro_theme_options[project_two_thumb]',
					'section' => 'project_settings',
					'type' => 'upload',
				)
			)
		);
		
		//Project two Title
		$wp_customize->add_setting(
		'rambo_pro_theme_options[project_two_title]', array(
			'default'        => esc_html__('Sint Occaecat','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_project_sanitize_html',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[project_two_title]', array(
			'label'   => esc_html__('Title', 'webriti-companion'),
			'section' => 'project_settings',
			'type' => 'text',
		));
		
		
		//Project two Description
		$wp_customize->add_setting(
		'rambo_pro_theme_options[project_two_text]', array(
			'default'        => esc_html__('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[project_two_text]', array(
			'label'   => esc_html__('Description', 'webriti-companion'),
			'section' => 'project_settings',
			'type' => 'text',
		));
		
		//Projects two image
		$wp_customize->add_setting( 'rambo_pro_theme_options[project_three_thumb]',array('default' => WC__PLUGIN_URL.'/inc/rambo/img/port3.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'rambo_pro_theme_options[project_three_thumb]',
				array(
					'label' => esc_html__('Image','webriti-companion'),
					'settings' =>'rambo_pro_theme_options[project_three_thumb]',
					'section' => 'project_settings',
					'type' => 'upload',
				)
			)
		);
		
		//Project three Title
		$wp_customize->add_setting(
		'rambo_pro_theme_options[project_three_title]', array(
			'default'        => esc_html__('Ut Enim','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_project_sanitize_html',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[project_three_title]', array(
			'label'   => esc_html__('Title', 'webriti-companion'),
			'section' => 'project_settings',
			'type' => 'text',
		));
		
		
		//Project Three Description
		$wp_customize->add_setting(
		'rambo_pro_theme_options[project_three_text]', array(
			'default'        => esc_html__('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[project_three_text]', array(
			'label'   => esc_html__('Description', 'webriti-companion'),
			'section' => 'project_settings',
			'type' => 'text',
		));
		
		//Projects Four image
		$wp_customize->add_setting( 'rambo_pro_theme_options[project_four_thumb]',array('default' => WC__PLUGIN_URL.'/inc/rambo/img/port4.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'rambo_pro_theme_options[project_four_thumb]',
				array(
					'label' => esc_html__('Image','webriti-companion'),
					'settings' =>'rambo_pro_theme_options[project_four_thumb]',
					'section' => 'project_settings',
					'type' => 'upload',
				)
			)
		);
		
		//Project Four Title
		$wp_customize->add_setting(
		'rambo_pro_theme_options[project_four_title]', array(
			'default'        => esc_html__('Duis aute irure','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_project_sanitize_html',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[project_four_title]', array(
			'label'   => esc_html__('Title', 'webriti-companion'),
			'section' => 'project_settings',
			'type' => 'text',
		));
		
		
		//Project One Description
		$wp_customize->add_setting(
		'rambo_pro_theme_options[project_four_text]', array(
			'default'        => esc_html__('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[project_four_text]', array(
			'label'   => esc_html__('Description', 'webriti-companion'),
			'section' => 'project_settings',
			'type' => 'text',
		));
		 function rambo_project_sanitize_html( $input ) {
			return wp_kses_post( force_balance_tags( $input ) );
		}
}

function rambo_project_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

add_action( 'customize_register', 'rambo_theme_portfolio_section' );