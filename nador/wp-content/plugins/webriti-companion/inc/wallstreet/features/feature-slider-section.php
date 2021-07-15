<?php
function wallstreet_slider_customizer( $wp_customize ) {

	$wp_customize->add_section(
        'slider_section_settings',
        array(
            'title' => esc_html__('Banner image settings','webriti-companion')));


	//Banner Image plus
	$theme = wp_get_theme();
	if ($theme->name == 'Leo' && version_compare(wp_get_theme()->get('Version'), '1.2.4') > 0 ) {

		$wp_customize->add_setting( 'wallstreet_pro_options[slider_image]',
			array(
				'default' => esc_url(WC__PLUGIN_URL .'/inc/wallstreet/images/slider/leo-slider.jpg'),
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			));
	}
	elseif ($theme->name == 'Bluestreet' && version_compare(wp_get_theme()->get('Version'), '1.2.7') > 0 ) {

		$wp_customize->add_setting( 'wallstreet_pro_options[slider_image]',
			array(
				'default' => esc_url(WC__PLUGIN_URL .'/inc/wallstreet/images/slider/bluestreet-slider.jpg'),
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			));
	}
	elseif ($theme->name == 'Wallstreet Agency' ) {
		$wp_customize->add_setting( 'wallstreet_pro_options[slider_image]',
			array(
				'default' => esc_url(WC__PLUGIN_URL .'/inc/wallstreet/images/slider/wallstreet-agency.jpg'),
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			));
	}
	else{
		$wp_customize->add_setting( 'wallstreet_pro_options[slider_image]',
			array(
				'default' => esc_url(WC__PLUGIN_URL .'/inc/wallstreet/images/slider/slider.jpg'),
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw',
			));
	}

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'wallstreet_pro_options[slider_image]',
			array(
				'type'        => 'upload',
				'label' => esc_html__('Image','webriti-companion'),
				'section' => 'example_section_one',
				'settings' =>'wallstreet_pro_options[slider_image]',
				'section' => 'slider_section_settings',

			)
		)
	);

	//Slider Title
	$wp_customize->add_setting(
	'wallstreet_pro_options[slider_title_one]', array(
        'default'        => esc_html__('Lorem ipsum dolor sit amet','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('wallstreet_pro_options[slider_title_one]', array(
        'label'   => __('Title', 'webriti-companion'),
        'section' => 'slider_section_settings',
		'priority'   => 150,
		'type' => 'text',
    ));

	//Slider sub title
	$wp_customize->add_setting(
	'wallstreet_pro_options[slider_title_two]', array(
        'default'        => esc_html__('Welcome to WallStreet','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('wallstreet_pro_options[slider_title_two]', array(
        'label'   => esc_html__('Sub title', 'webriti-companion'),
        'section' => 'slider_section_settings',
		'priority'   => 150,
		'type' => 'text',
    ));

	//Slider Banner discription
	$wp_customize->add_setting(
	'wallstreet_pro_options[slider_description]', array(
        'default'        => esc_html__('Maecenas a blandit justo. Curabitur dignissim quam quis malesuada ultrices. Vestibulum nisi augue, ultricies id congue vel.','webriti-companion'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('wallstreet_pro_options[slider_description]', array(
        'label'   => esc_html__('Description', 'webriti-companion'),
        'section' => 'slider_section_settings',
		'priority'   => 150,
		'type' => 'text',
    ));

	 }
	add_action( 'customize_register', 'wallstreet_slider_customizer' );
