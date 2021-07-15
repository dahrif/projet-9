<?php
function elitepress_portfolio_customizer( $wp_customize ) {

    //portfolio section
	$wp_customize->add_section(
        'portfolio_section_settings',
        array(
            'title' => esc_html__('Project settings','webriti-companion'),
			'priority'   => 404,
			'panel'  => 'elitepress_homepage_setting',)
			
    );
	
	
	//Show and hide portfolio section
	$wp_customize->add_setting(
	'elitepress_lite_options[portfolio_section_enabled]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'elitepress_sanitize_checkbox',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'elitepress_lite_options[portfolio_section_enabled]',
    array(
        'label' => esc_html__('Enable project section on home Page','webriti-companion'),
        'section' => 'portfolio_section_settings',
        'type' => 'checkbox',
    )
	);
	//portfolio one Title
	$wp_customize->add_setting(
	'elitepress_lite_options[front_portfolio_title]',
	array(
        'default'        => esc_html__('Donec aliquam','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('elitepress_lite_options[front_portfolio_title]',
    	array(
        'label'   => esc_html__('Title', 'webriti-companion'),
        'section' => 'portfolio_section_settings',
		'type' => 'text',
    ));
	
	//portfolio Description
	$wp_customize->add_setting(
	'elitepress_lite_options[front_portfolio_description]',
	array(
        'default'        => esc_html__('Morbi leo risus, porta ac consectetur vestibulum eros cras mattis consectetur purus sit...', 'webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('elitepress_lite_options[front_portfolio_description]',
    	array(
        'label'   => esc_html__('Description', 'webriti-companion'),
        'section' => 'portfolio_section_settings',
		'type' => 'textarea',
    ));
	

	
	//portfolio one Title
	$wp_customize->add_setting(
	'elitepress_lite_options[portfolio_one_title]',
	array(
        'default'        => esc_html__('Pellentesque habitant morbi','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('elitepress_lite_options[portfolio_one_title]',
    array(
        'label'   => esc_html__('Project One', 'webriti-companion'),
        'section' => 'portfolio_section_settings',
		'type' => 'text',
    ));
	//portfolio one image
	$wp_customize->add_setting( 'elitepress_lite_options[portfolio_one_image]',
		array(
			'default' => WC__PLUGIN_URL.'/inc/elitepress/images/portfolio/1.jpg',
			'type' => 'option',
			'sanitize_callback' => 'esc_url_raw',
		));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'elitepress_lite_options[portfolio_one_image]',
			array(
				'label' => esc_html__('Image','webriti-companion'),
				'section' => 'example_section_one',
				'settings' =>'elitepress_lite_options[portfolio_one_image]',
				'section' => 'portfolio_section_settings',
				'type' => 'upload',
			)
		)
	);
	
	//portfolio one Description
	$wp_customize->add_setting(
	'elitepress_lite_options[portfolio_one_description]',
	array(
        'default'=> esc_html__('Morbi leo risus, porta ac consectetur vestibulum eros cras 	mattis consectetur purus sit...','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('elitepress_lite_options[portfolio_one_description]',
    array(
        'label'   => esc_html__('Description', 'webriti-companion'),
        'section' => 'portfolio_section_settings',
		'type' => 'textarea',
    ));
	
	
	
	//portfolio Two Title
	$wp_customize->add_setting(
	'elitepress_lite_options[portfolio_two_title]',
	array(
        'default'        => esc_html__('Fusce justo sapien','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('elitepress_lite_options[portfolio_two_title]',
    array(
        'label'   => esc_html__('Project Two', 'webriti-companion'),
        'section' => 'portfolio_section_settings',
		'type' => 'text',
    ));
	
	//portfolio two image
	$wp_customize->add_setting( 'elitepress_lite_options[portfolio_two_image]',
		array(
		'default' => WC__PLUGIN_URL.'/inc/elitepress/images/portfolio/2.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',
	));	
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'elitepress_lite_options[portfolio_two_image]',
			array(
				'label' => esc_html__('Image','webriti-companion'),
				'section' => 'example_section_one',
				'settings' =>'elitepress_lite_options[portfolio_two_image]',
				'section' => 'portfolio_section_settings',
				'type' => 'upload',
			)
		)
	);
	
	//portfolio Two Description
	$wp_customize->add_setting(
	'elitepress_lite_options[portfolio_two_description]',
	array(
        'default'        => esc_html__('Morbi leo risus, porta ac consectetur vestibulum eros cras mattis consectetur purus sit...','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('elitepress_lite_options[portfolio_two_description]',
    array(
        'label'   => esc_html__('Description', 'webriti-companion'),
        'section' => 'portfolio_section_settings',
		'type' => 'textarea',
    ));
	
	
	//portfolio Title Title
	$wp_customize->add_setting(
	'elitepress_lite_options[portfolio_three_title]', 
	array(
        'default'        => esc_html__('Aliquam auctor metus','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('elitepress_lite_options[portfolio_three_title]', 
    	array(
        'label'   => esc_html__('Project Three', 'webriti-companion'),
        'section' => 'portfolio_section_settings',
		'type' => 'text',
    ));
	
	
	
	//portfolio three image
	$wp_customize->add_setting( 'elitepress_lite_options[portfolio_three_image]',
		array(
		'default' => WC__PLUGIN_URL.'/inc/elitepress/images/portfolio/3.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',
	));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'elitepress_lite_options[portfolio_three_image]',
			array(
				'label' => esc_html__('Image','webriti-companion'),
				'section' => 'example_section_one',
				'settings' =>'elitepress_lite_options[portfolio_three_image]',
				'section' => 'portfolio_section_settings',
				'type' => 'upload',
			)
		)
	);
	
	//portfolio Three Description
	$wp_customize->add_setting(
	'elitepress_lite_options[portfolio_three_description]',
	 array(
        'default'        => esc_html__('Morbi leo risus, porta ac consectetur vestibulum eros cras mattis consectetur purus sit...','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('elitepress_lite_options[portfolio_three_description]', array(
        'label'   => esc_html__('Description', 'webriti-companion'),
        'section' => 'portfolio_section_settings',
		'type' => 'textarea',
    ));
	
	
	
	
	$wp_customize->add_section( 'more_portfolio' , array(
		'title'      => esc_html__('Add more portfolios', 'webriti-companion'),
		'panel'  => 'elitepress_portfolio_setting',
		'priority'   => 400,
   	) );
	
}		
add_action( 'customize_register', 'elitepress_portfolio_customizer' );