<?php 
function elitepress_home_callout_customizer( $wp_customize ){	
	
//Home top callout
$wp_customize->add_section(
        'header_home_callout',
        array(
            'title' => esc_html__('Callout setting','webriti-companion'),
           'priority'    => 402,
			'panel' => 'elitepress_homepage_setting',
        )
    );
	
	
	//Hide Top Callout
	
	$wp_customize->add_setting(
    'elitepress_lite_options[topcalout_section_enabled]',
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'elitepress_sanitize_checkbox',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'elitepress_lite_options[topcalout_section_enabled]',
    array(
        'label' => esc_html__('Enable Callout section on front page','webriti-companion'),
        'section' => 'header_home_callout',
        'type' => 'checkbox',
    )
	);
	
	//Header Top Call Out Title
	$wp_customize->add_setting(
	'elitepress_lite_options[header_call_out_title]', array(
        'default'        => esc_html__('Integer condimentum fermentum.','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[header_call_out_title]', array(
        'label'   => esc_html__('Title', 'webriti-companion'),
        'section' => 'header_home_callout',
        'type'    => 'text',
    ));
	
	
	//Header Top Call Out Description
	$wp_customize->add_setting(
	'elitepress_lite_options[header_call_out_description]', array(
        'default'        => esc_html__('Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs  sint occaecat proidentse.', 'webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[header_call_out_description]', array(
        'label'   => esc_html__('Description', 'webriti-companion'),
        'section' => 'header_home_callout',
        'type'    => 'textarea',
    ));
	
	//Home callout read more button
	$wp_customize->add_setting(
	'elitepress_lite_options[header_call_out_btn_text]', array(
        'default'        => esc_html__('Sed gravida','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[header_call_out_btn_text]', array(
        'label'   => esc_html__('Button Text', 'webriti-companion'),
        'section' => 'header_home_callout',
        'type'    => 'text',
    ));
	
	//Home callout read more button link
	$wp_customize->add_setting(
	'elitepress_lite_options[header_call_out_btn_link]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[header_call_out_btn_link]', array(
        'label'   => esc_html__('Button Link', 'webriti-companion'),
        'section' => 'header_home_callout',
        'type'    => 'text',
    ));
	
	//Home callout read more button link target
	$wp_customize->add_setting(
	'elitepress_lite_options[header_call_out_btn_link_target]', array(
        'default'        => true ,
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'elitepress_sanitize_checkbox',
		'type' => 'option',
    ));
	$wp_customize->add_control('elitepress_lite_options[header_call_out_btn_link_target]', array(
        'label'   => esc_html__('Open link in new tab', 'webriti-companion'),
        'section' => 'header_home_callout',
        'type'    => 'checkbox',
    ));
	
}
add_action( 'customize_register', 'elitepress_home_callout_customizer' );