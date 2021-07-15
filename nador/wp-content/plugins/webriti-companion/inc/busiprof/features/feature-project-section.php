<?php
function busiprof_theme_portfolio_section( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? true : false;

	//Projects Setting
	
	$wp_customize->add_section( 'projects_settings' , array(
		'title'      => esc_html__('Project settings', 'webriti-companion'),
		'panel'  => 'section_settings',
		'priority'   => 3,
   	) );
	
	
		// Enable Projects
		$wp_customize->add_setting( 'busiprof_theme_options[enable_projects]' , array( 'default' => 'on' , 'type'=>'option', 'sanitize_callback' => 'busiprof_sanitize_radio' ) );
		$wp_customize->add_control(	'busiprof_theme_options[enable_projects]' , array(
				'label'    => esc_html__( 'Enable Home Project section', 'webriti-companion' ),
				'section'  => 'projects_settings',
				'type'     => 'radio',
				'choices' => array(
					'on'=>esc_html__('ON','webriti-companion'),
					'off'=>esc_html__('OFF','webriti-companion')
				)
		));
		
		//Projects Heading One
		$wp_customize->add_setting(
		'busiprof_theme_options[protfolio_tag_line]', array(
			'default'        => esc_html__('Lorem Ipsum','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[protfolio_tag_line]', array(
			'label'   => esc_html__('Title', 'webriti-companion'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Projects Heading two
		$wp_customize->add_setting(
		'busiprof_theme_options[protfolio_description_tag]', array(
			'default'        => esc_html__('Curabitur sit amet neque consequat, rutrum urna at, euismod ipsum. Nam fermentum tellus tortor, et varius ante posuere eu.','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[protfolio_description_tag]', array(
			'label'   => esc_html__('Description', 'webriti-companion'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		
		//Project One Title
		$wp_customize->add_setting(
		'busiprof_theme_options[project_title_one]', array(
			'default'        => esc_html__('Lorem Ipsum','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_title_one]', array(
			'label'   => esc_html__('Project One', 'webriti-companion'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Projects one image
		$wp_customize->add_setting( 'busiprof_theme_options[project_thumb_one]',array('default' => WC__PLUGIN_URL.'inc/busiprof/img/rec_project.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'busiprof_theme_options[project_thumb_one]',
				array(
					'label' => esc_html__('Image','webriti-companion'),
					'settings' =>'busiprof_theme_options[project_thumb_one]',
					'section' => 'projects_settings',
					'type' => 'upload',
				)
			)
		);
		
		
		//Project One Description
		$wp_customize->add_setting(
		'busiprof_theme_options[project_text_one]', array(
			'default'        => esc_html__('Aliquam erat volutpat erat','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_text_one]', array(
			'label'   => esc_html__('Description', 'webriti-companion'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		//Project One link
		$wp_customize->add_setting(
		'busiprof_theme_options[project_one_url]', array(
			'default'        => '#',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_one_url]', array(
			'label'   => esc_html__('Link', 'webriti-companion'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Project Two Title
		$wp_customize->add_setting(
		'busiprof_theme_options[project_title_two]', array(
			'default'        => esc_html__('Lorem Ipsum','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_title_two]', array(
			'label'   => esc_html__('Project Two', 'webriti-companion'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Projects Two image
		$wp_customize->add_setting( 'busiprof_theme_options[project_thumb_two]',array('default' => WC__PLUGIN_URL.'inc/busiprof/img/rec_project2.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'busiprof_theme_options[project_thumb_two]',
				array(
					'label' => esc_html__('Image','webriti-companion'),
					'settings' =>'busiprof_theme_options[project_thumb_two]',
					'section' => 'projects_settings',
					'type' => 'upload',
				)
			)
		);
		
		
		
		//Project Two Description
		$wp_customize->add_setting(
		'busiprof_theme_options[project_text_two]', array(
			'default'        => esc_html__('Aliquam erat volutpat erat','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_text_two]', array(
			'label'   => esc_html__('Description', 'webriti-companion'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		//Project Two link
		$wp_customize->add_setting(
		'busiprof_theme_options[project_two_url]', array(
			'default'        => '#',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_two_url]', array(
			'label'   => esc_html__('Link', 'webriti-companion'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Project Three Title
		$wp_customize->add_setting(
		'busiprof_theme_options[project_title_three]', array(
			'default'        => esc_html__('Lorem Ipsum','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_title_three]', array(
			'label'   => esc_html__('Project Three', 'webriti-companion'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Projects Three image
		$wp_customize->add_setting( 'busiprof_theme_options[project_thumb_three]',array('default' => WC__PLUGIN_URL.'inc/busiprof/img/rec_project3.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'busiprof_theme_options[project_thumb_three]',
				array(
					'label' => esc_html__('Image','webriti-companion'),
					'settings' =>'busiprof_theme_options[project_thumb_three]',
					'section' => 'projects_settings',
					'type' => 'upload',
				)
			)
		);
		
		
		
		//Project three Description
		$wp_customize->add_setting(
		'busiprof_theme_options[project_text_three]', array(
			'default'        => esc_html__('Aliquam erat volutpat erat','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_text_three]', array(
			'label'   => esc_html__('Description', 'webriti-companion'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		//Project three link
		$wp_customize->add_setting(
		'busiprof_theme_options[project_three_url]', array(
			'default'        => '#',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_three_url]', array(
			'label'   => esc_html__('Link', 'webriti-companion'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Project Four Title
		$wp_customize->add_setting(
		'busiprof_theme_options[project_title_four]', array(
			'default'        => esc_html__('Lorem Ipsum','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_title_four]', array(
			'label'   => esc_html__('Project Four', 'webriti-companion'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		
		//Projects four image
		$wp_customize->add_setting( 'busiprof_theme_options[project_thumb_four]',array('default' => WC__PLUGIN_URL.'inc/busiprof/img/rec_project4.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'busiprof_theme_options[project_thumb_four]',
				array(
					'label' => esc_html__('Image','webriti-companion'),
					'settings' =>'busiprof_theme_options[project_thumb_four]',
					'section' => 'projects_settings',
					'type' => 'upload',
				)
			)
		);
		
		
		//Project Four Description
		$wp_customize->add_setting(
		'busiprof_theme_options[project_text_four]', array(
			'default'        => esc_html__('Aliquam erat volutpat erat','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'busiprof_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_text_four]', array(
			'label'   => esc_html__('Description', 'webriti-companion'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
		
		//Project four link
		$wp_customize->add_setting(
		'busiprof_theme_options[project_four_url]', array(
			'default'        => '#',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type' => 'option',
		));
		$wp_customize->add_control('busiprof_theme_options[project_four_url]', array(
			'label'   => esc_html__('Link', 'webriti-companion'),
			'section' => 'projects_settings',
			'type' => 'text',
		));
}

add_action( 'customize_register', 'busiprof_theme_portfolio_section' );

function busiprof_register_port_section_partials( $wp_customize ){
	$wp_customize->selective_refresh->add_partial( 'busiprof_theme_options[protfolio_tag_line]', array(
		'selector'            => '.portfolio .section-title h1',
		'settings'            => 'busiprof_theme_options[protfolio_tag_line]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_theme_options[protfolio_description_tag]', array(
		'selector'            => '.portfolio .section-title p',
		'settings'            => 'busiprof_theme_options[protfolio_description_tag]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_theme_options[project_title_one]', array(
		'selector'            => '.portfolio #myTabContent',
		'settings'            => 'busiprof_theme_options[project_title_one]',
	
	) );
}
add_action( 'customize_register', 'busiprof_register_port_section_partials' );	