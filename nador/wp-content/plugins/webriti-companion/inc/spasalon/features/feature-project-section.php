<?php
function webriti_companion_spasalon_project_customizer( $wp_customize ){

//Home project Section
	$wp_customize->add_section(
    'project_section_settings',
    array(
        'title' => esc_html__('Project settings','webriti-companion'),
		'panel'  => 'section_settings',
		'priority'       => 3,
		)
	);
	
	
	//Show and hide Project section
	$wp_customize->add_setting(
	'spa_theme_options[project_hide]',
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'spasalon_sanitize_checkbox',
		'type' => 'option',
    	)	
	);
	$wp_customize->add_control(
    'spa_theme_options[project_hide]',
    array(
        'label' => esc_html__('Enable Home Project section','webriti-companion'),
        'section' => 'project_section_settings',
        'type' => 'checkbox',
    	)
	);
	
	// //Project Title
	$wp_customize->add_setting(
    'spa_theme_options[product_title]',
    array(
        'default' => esc_html__('Phasellus a hendrerit turpis','webriti-companion'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control('spa_theme_options[product_title]',
	array(
	    'label'   => esc_html__('Title','webriti-companion'),
	    'section' => 'project_section_settings',
		 'type' => 'text',
		)
	);	
	 
	//Project Description 
	 $wp_customize->add_setting(
    'spa_theme_options[product_contents]',
    array(
        'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','webriti-companion'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'spa_theme_options[product_contents]',
	array(
	    'label'   => esc_html__('Description','webriti-companion'),
	    'section' => 'project_section_settings',
		 'type' => 'text',
		)
	);
	
	//Project one image
	$wp_customize->add_setting( 'spa_theme_options[product_one_thumb]',
		array(
			'default' => WC__PLUGIN_URL .'/inc/spasalon/images/portfolio/project1.jpg',
			'type' => 'option',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
 
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'spa_theme_options[product_one_thumb]',
	array(
		'label' =>esc_html__('Image','webriti-companion'),
		'settings' =>'spa_theme_options[product_one_thumb]',
		'section' => 'project_section_settings',
		'type' => 'upload',
		)
	));
	
	//Project one Title
	$wp_customize->add_setting(
	'spa_theme_options[product_one_title]', array(
        'default'        => esc_html__('Make-up Products','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('spa_theme_options[product_one_title]', array(
        'label'   => esc_html__('Title', 'webriti-companion'),
        'section' => 'project_section_settings',
		'type' => 'text',
    ));
	
	//Project one Description
	$wp_customize->add_setting(
	'spa_theme_options[product_one_desc]',
	array(
        'default'        => esc_html__('Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	    )
	);
    $wp_customize->add_control('spa_theme_options[product_one_desc]',
    array(
        'label'   => esc_html__('Description', 'webriti-companion'),
        'section' => 'project_section_settings',
		'type' => 'text',
	    )
	);
	
	//Project two image
	$wp_customize->add_setting( 'spa_theme_options[product_two_thumb]',
	array(
		'default' => WC__PLUGIN_URL .'/inc/spasalon/images/portfolio/project2.jpg',
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'spa_theme_options[product_two_thumb]',
	array(
		'label' => esc_html__('Image','webriti-companion'),
		'section' => 'example_section_one',
		'settings' =>'spa_theme_options[product_two_thumb]',
		'section' => 'project_section_settings',
		'type' => 'upload',
		)
	));
	
	//Project Two Title
	$wp_customize->add_setting(
	'spa_theme_options[product_two_title]',
	array(
        'default'        => esc_html__('Golden Cream','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	    )
	);
    $wp_customize->add_control('spa_theme_options[product_two_title]',
    array(
        'label'   => esc_html__('Title', 'webriti-companion'),
        'section' => 'project_section_settings',
		'type' => 'text',
	    )
	);
	
	//Project two Description
	$wp_customize->add_setting('spa_theme_options[product_two_desc]',
	array(
        'default'        => esc_html__('Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.', 'webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	    )
	);
    $wp_customize->add_control('spa_theme_options[product_two_desc]',
   	array(
        'label'   => esc_html__('Description', 'webriti-companion'),
        'section' => 'project_section_settings',
		'type' => 'text',
	    )
	);
	
	
	//Project three image
	$wp_customize->add_setting( 'spa_theme_options[product_three_thumb]',
		array(
			'default' => WC__PLUGIN_URL .'/inc/spasalon/images/portfolio/project3.jpg',
			'type' => 'option',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
 
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'spa_theme_options[product_three_thumb]',
	array(
		'label' => esc_html__('Image','webriti-companion'),
		'settings' =>'spa_theme_options[product_three_thumb]',
		'section' => 'project_section_settings',
		'type' => 'upload',
		)
	));
	
	//Project Three Title
	$wp_customize->add_setting(
	'spa_theme_options[product_three_title]',
	array(
        'default'        => esc_html__('Facial Toner','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	    )
	);
    $wp_customize->add_control('spa_theme_options[product_three_title]',
    array(
        'label'   => esc_html__('Title','webriti-companion'),
        'section' => 'project_section_settings',
		'type' => 'text',
	    )
	);
	
	//Project three Description
	$wp_customize->add_setting(
	'spa_theme_options[product_three_desc]',
	array(
        'default'        => esc_html__('Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	    )
	);
    $wp_customize->add_control('spa_theme_options[product_three_desc]',
    array(
        'label'   => esc_html__('Description', 'webriti-companion'),
        'section' => 'project_section_settings',
		'type' => 'text',
	    )
	);	
	
	//Project Four image
	$wp_customize->add_setting( 'spa_theme_options[product_four_thumb]',
	array(
		'default' => WC__PLUGIN_URL .'/inc/spasalon/images/portfolio/project4.jpg',
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		)
	);
 
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'spa_theme_options[product_four_thumb]',
	array(
		'label' => esc_html__('Image','webriti-companion'),
		'section' => 'example_section_one',
		'settings' =>'spa_theme_options[product_four_thumb]',
		'section' => 'project_section_settings',
		'type' => 'upload',
		)
	));
	 
	 
	 //Project Four Title
	$wp_customize->add_setting('spa_theme_options[product_four_title]',
	array(
        'default'        => esc_html__('Premium Cleanser','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	    )
	);
    $wp_customize->add_control('spa_theme_options[product_four_title]',
    array(
        'label'   => esc_html__('Title', 'webriti-companion'),
        'section' => 'project_section_settings',
		'type' => 'text',
	    )
	);
	
	//Project four Description
	$wp_customize->add_setting(
	'spa_theme_options[product_four_desc]',
	array(
        'default'        => esc_html__('Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	    )
	);
    $wp_customize->add_control('spa_theme_options[product_four_desc]',
    array(
        'label'   => esc_html__('Description', 'webriti-companion'),
        'section' => 'project_section_settings',
		'type' => 'text',
	    )
	);	
	
	//Project five image
	$wp_customize->add_setting( 'spa_theme_options[product_five_thumb]',
	array(
		'default' => WC__PLUGIN_URL .'/inc/spasalon/images/portfolio/project5.jpg',
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw',
		)
	);
 
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'spa_theme_options[product_five_thumb]',
	array(
		'label' => esc_html__('Image','webriti-companion'),
		'settings' =>'spa_theme_options[product_five_thumb]',
		'section' => 'project_section_settings',
		'type' => 'upload',
		)
	));
	
	//Project five Title
	$wp_customize->add_setting(
	'spa_theme_options[product_five_title]',
	array(
        'default'        => esc_html__('Silver Cleanser','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    	)
	);
    $wp_customize->add_control('spa_theme_options[product_five_title]',
    array(
        'label'   => esc_html__('Title', 'webriti-companion'),
        'section' => 'project_section_settings',
		'type' => 'text',
    	)
	);
	
	//Project five Description
	$wp_customize->add_setting(
	'spa_theme_options[product_five_desc]', 
	array(
        'default'        => esc_html__('Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
	    )
	);
    $wp_customize->add_control('spa_theme_options[product_five_desc]', 
    array(
        'label'   => esc_html__('Description', 'webriti-companion'),
        'section' => 'project_section_settings',
		'type' => 'text',
	    )
	);
	

}		
	add_action( 'customize_register', 'webriti_companion_spasalon_project_customizer' );
	
	/**
 * Add selective refresh for Front page project section controls.
 */
function spasalon_register_project_section_partials( $wp_customize ){

$wp_customize->selective_refresh->add_partial( 'spa_theme_options[product_title]', array(
		'selector'            => '.products .section-title',
		'settings'            => 'spa_theme_options[product_title]',
	
	) );
$wp_customize->selective_refresh->add_partial( 'spa_theme_options[product_contents]', array(
		'selector'            => '.products .section-subtitle',
		'settings'            => 'spa_theme_options[product_contents]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'spa_theme_options[product_one_thumb]', array(
		'selector'            => '.one-thumb',
		'settings'            => 'spa_theme_options[product_one_thumb]',
	
	) );
	
	
	$wp_customize->selective_refresh->add_partial( 'spa_theme_options[product_one_title]', array(
		'selector'            => '.first h4',
		'settings'            => 'spa_theme_options[product_one_title]',
	
	) );
	
	
	$wp_customize->selective_refresh->add_partial( 'spa_theme_options[product_one_desc]', array(
		'selector'            => '.one_desc p',
		'settings'            => 'spa_theme_options[product_one_desc]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'spa_theme_options[product_two_thumb]', array(
		'selector'            => '.two-thumb',
		'settings'            => 'spa_theme_options[product_two_thumb]',
	
	) );
	
	
	$wp_customize->selective_refresh->add_partial( 'spa_theme_options[product_two_title]', array(
		'selector'            => '.second h4',
		'settings'            => 'spa_theme_options[product_two_title]',
	
	) );
	
	
	
	$wp_customize->selective_refresh->add_partial( 'spa_theme_options[product_two_desc]', array(
		'selector'            => '.two_desc p',
		'settings'            => 'spa_theme_options[product_two_desc]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'spa_theme_options[product_three_thumb]', array(
		'selector'            => '.three-thumb',
		'settings'            => 'spa_theme_options[product_three_thumb]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'spa_theme_options[product_three_title]', array(
		'selector'            => '.three h4',
		'settings'            => 'spa_theme_options[product_three_title]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'spa_theme_options[product_three_desc]', array(
		'selector'            => '.three_desc p',
		'settings'            => 'spa_theme_options[product_three_desc]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'spa_theme_options[product_four_thumb]', array(
		'selector'            => '.four-thumb',
		'settings'            => 'spa_theme_options[product_four_thumb]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'spa_theme_options[product_four_title]', array(
		'selector'            => '.four h4',
		'settings'            => 'spa_theme_options[product_four_title]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'spa_theme_options[product_four_desc]', array(
		'selector'            => '.four_desc p',
		'settings'            => 'spa_theme_options[product_four_desc]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'spa_theme_options[product_five_thumb]', array(
		'selector'            => '.five-thumb',
		'settings'            => 'spa_theme_options[product_five_thumb]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'spa_theme_options[product_five_title]', array(
		'selector'            => '.five h4',
		'settings'            => 'spa_theme_options[product_five_title]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'spa_theme_options[product_five_desc]', array(
		'selector'            => '.five_desc p',
		'settings'            => 'spa_theme_options[product_five_desc]',
	
	) );	
}

add_action( 'customize_register', 'spasalon_register_project_section_partials' );