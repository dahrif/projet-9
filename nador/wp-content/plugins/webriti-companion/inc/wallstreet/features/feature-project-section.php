<?php
function wallstreet_project_customizer( $wp_customize ) {

//Home project Section
	$wp_customize->add_panel( 'wallstreet_project_setting', array(
		'priority'       => 700,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('Project settings', 'webriti-companion'),
	) );
	
	$wp_customize->add_section(
        'project_section_settings',
        array(
            'title' => esc_html__('Project settings','webriti-companion'),
            'description' => '',
			'panel'  => 'wallstreet_project_setting',)
    );
	
	
	//Show and hide Project section
	$wp_customize->add_setting(
	'wallstreet_pro_options[portfolio_section_enabled]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'wallstreet_sanitize_checkbox',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'wallstreet_pro_options[portfolio_section_enabled]',
    array(
        'label' => esc_html__('Enable portfolio section on homepage (project section)','webriti-companion'),
        'section' => 'project_section_settings',
        'type' => 'checkbox',
    )
	);
	
	
	//Project one Title
	$wp_customize->add_setting(
	'wallstreet_pro_options[portfolio_title_one]', array(
        'default'        => esc_html__('Aenean eu risus','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('wallstreet_pro_options[portfolio_title_one]', array(
        'label'   => esc_html__('Title', 'webriti-companion'),
        'section' => 'project_one_section_settings',
		'type' => 'text',
    ));
	
	
	//Project one description
	$wp_customize->add_setting(
    'wallstreet_pro_options[portfolio_description_one]',
    array(
        'default' => esc_html__('Integer pellentesque dolor molestie, pellentesque nibh quis, vulputate lorem.','webriti-companion'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_textarea_field',
		 'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'wallstreet_pro_options[portfolio_description_one]',
    array(
        'label' => esc_html__('Description','webriti-companion'),
        'section' => 'project_one_section_settings',
        'type' => 'textarea',	
    )
);
	
	
	//Project Two
	$wp_customize->add_section(
        'project_one_section_settings',
        array(
            'title' => esc_html__('Homepage portfolio one','webriti-companion'),
            'description' => '',
			'panel'  => 'wallstreet_project_setting',)
    );
	
	//Project one image
	$wp_customize->add_setting( 'wallstreet_pro_options[portfolio_image_one]',
		array(
			'default' => esc_url(WC__PLUGIN_URL.'inc/wallstreet/images/portfolio/portfolio1.png'),
			'type' => 'option',
			'sanitize_callback' => 'esc_url_raw',
		));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'wallstreet_pro_options[portfolio_image_one]',
			array(
				'label' => esc_html__('Image','webriti-companion'),
				'section' => 'example_section_one',
				'settings' =>'wallstreet_pro_options[portfolio_image_one]',
				'section' => 'project_one_section_settings',
				'type' => 'upload',
			)
		)
	);
	//Project Two
	$wp_customize->add_section(
        'project_two_section_settings',
        array(
            'title' => esc_html__('Homepage portfolio two','webriti-companion'),
            'description' => '',
			'panel'  => 'wallstreet_project_setting',)
    );
	
	//Project Two Title
	$wp_customize->add_setting(
	'wallstreet_pro_options[portfolio_title_two]', array(
        'default'        => esc_html__('Aenean eu risus','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('wallstreet_pro_options[portfolio_title_two]', array(
        'label'   => esc_html__('Title', 'webriti-companion'),
        'section' => 'project_two_section_settings',
		'type' => 'text',
    ));
	
	//Project two description
	$wp_customize->add_setting(
    'wallstreet_pro_options[portfolio_description_two]',
    array(
        'default' => esc_html__('Integer pellentesque dolor molestie, pellentesque nibh quis, vulputate lorem.','webriti-companion'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_textarea_field',
		 'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'wallstreet_pro_options[portfolio_description_two]',
    array(
        'label' => esc_html__('Description','webriti-companion'),
        'section' => 'project_two_section_settings',
        'type' => 'textarea',	
    )
);
	
	//Project two image
	$wp_customize->add_setting( 'wallstreet_pro_options[portfolio_image_two]',
		array(
			'default' => esc_url(WC__PLUGIN_URL.'inc/wallstreet/images/portfolio/portfolio2.png'),
			'type' => 'option',
			'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'wallstreet_pro_options[portfolio_image_two]',
			array(
				'label' => esc_html__('Image','webriti-companion'),
				'section' => 'example_section_one',
				'settings' =>'wallstreet_pro_options[portfolio_image_two]',
				'section' => 'project_two_section_settings',
				'type' => 'upload',
			)
		)
	);
	
	//Project Three section
	$wp_customize->add_section(
        'project_three_section_settings',
        array(
            'title' => esc_html__('Homepage portfolio three','webriti-companion'),
            'description' => '',
			'panel'  => 'wallstreet_project_setting',)
    );
	
	
	
	//Project Three Title
	$wp_customize->add_setting(
	'wallstreet_pro_options[portfolio_title_three]', array(
       'default'        => esc_html__('Aenean eu risus','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('wallstreet_pro_options[portfolio_title_three]', array(
        'label'   => esc_html__('Title', 'webriti-companion'),
        'section' => 'project_three_section_settings',
		'type' => 'text',
    ));
	
	//Project three description
	$wp_customize->add_setting(
    'wallstreet_pro_options[portfolio_description_three]',
    array(
        'default' => esc_html__('Integer pellentesque dolor molestie, pellentesque nibh quis, vulputate lorem.','webriti-companion'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_textarea_field',
		 'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'wallstreet_pro_options[portfolio_description_three]',
    array(
        'label' => esc_html__('Description','webriti-companion'),
        'section' => 'project_three_section_settings',
        'type' => 'textarea',	
    )
);
	
	//Project three image
	$wp_customize->add_setting( 'wallstreet_pro_options[portfolio_image_three]',
		array(
			'default' => esc_url(WC__PLUGIN_URL.'inc/wallstreet/images/portfolio/portfolio3.png'),
			'type' => 'option',
			'sanitize_callback' => 'esc_url_raw',
		));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'wallstreet_pro_options[portfolio_image_three]',
			array(
				'label' => esc_html__('Image','webriti-companion'),
				'section' => 'example_section_one',
				'settings' =>'wallstreet_pro_options[portfolio_image_three]',
				'section' => 'project_three_section_settings',
				'type' => 'upload',
			)
		)
	);
	
	
	//Project Four section
	$wp_customize->add_section(
        'project_four_section_settings',
        array(
            'title' => esc_html__('Homepage portfolio four','webriti-companion'),
            'description' => '',
			'panel'  => 'wallstreet_project_setting',)
    );
	
	//Project Four Title
	$wp_customize->add_setting(
	'wallstreet_pro_options[portfolio_title_four]', array(
       'default'        => esc_html__('Aenean eu risus','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('wallstreet_pro_options[portfolio_title_four]', array(
        'label'   => esc_html__('Title', 'webriti-companion'),
        'section' => 'project_four_section_settings',
		'type' => 'text',
    ));
	
	//Project four description
	$wp_customize->add_setting(
    'wallstreet_pro_options[portfolio_description_four]',
    array(
        'default' => esc_html__('Integer pellentesque dolor molestie, pellentesque nibh quis, vulputate lorem.','webriti-companion'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_textarea_field',
		 'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'wallstreet_pro_options[portfolio_description_four]',
    array(
        'label' => esc_html__('Description','webriti-companion'),
        'section' => 'project_four_section_settings',
        'type' => 'textarea',	
    )
);
	
	//Project Four image
	$wp_customize->add_setting( 'wallstreet_pro_options[portfolio_image_four]',
		array(
			'default' => esc_url(WC__PLUGIN_URL.'/inc/wallstreet/images/portfolio/portfolio4.png'),
			'type' => 'option',
			'sanitize_callback' => 'esc_url_raw',
		));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'wallstreet_pro_options[portfolio_image_four]',
			array(
				'label' => esc_html__('Image','webriti-companion'),
				'section' => 'example_section_one',
				'settings' =>'wallstreet_pro_options[portfolio_image_four]',
				'section' => 'project_four_section_settings',
				'type' => 'upload',
			)
		)
	);
}		
	add_action( 'customize_register', 'wallstreet_project_customizer' );