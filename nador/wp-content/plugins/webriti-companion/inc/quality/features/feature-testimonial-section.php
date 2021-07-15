<?php

function quality_testimonial_customizer($wp_customize) {

    $wp_customize->add_section(
            'test_section_settings',
            array(
                'title' => esc_html__('Testimonial settings', 'webriti-companion'),
                'description' => '',
                //'panel'  => 'quality_test_setting',
                'panel' => 'quality_homepage_section_setting',
                'priority' => 5,)
    );


    // Show Testimonail on Home page
    $wp_customize->add_setting('testimonial_enable', array(
        'default' => true,
        'sanitize_callback' => 'quality_sanitize_checkbox',
    ));

    $wp_customize->add_control('testimonial_enable', array(
        'label' => esc_html__('Enable Testimonail on homepage.', 'webriti-companion'),
        'section' => 'test_section_settings',
        'type' => 'checkbox',
    ));

    //Testimonial Background Image
    $wp_customize->add_setting('testimonial_background', array(
        'sanitize_callback' => 'esc_url_raw',
        'default' => '',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'testimonial_background', array(
                'label' => esc_html__('Background Image', 'webriti-companion'),
                'section' => 'test_section_settings',
                'settings' => 'testimonial_background',
            )));

    // add section to manage Testimonial Title
    $wp_customize->add_setting(
            'quality_pro_options[home_testimonial_title]',
            array(
                'default' => esc_html__("Aliquam eget", "webriti-companion"),
                'capability' => 'edit_theme_options',
                'type' => 'option',
                'sanitize_callback' => 'sanitize_text_field'
            )
    );
    $wp_customize->add_control('quality_pro_options[home_testimonial_title]', array(
        'label' => esc_html__('Title', 'webriti-companion'),
        'section' => 'test_section_settings',
        'type' => 'text',));


    $wp_customize->add_setting(
            'quality_pro_options[home_testimonial_desciption]',
            array(
                'default' => __('Magnis <b>Dis</b> Parturient', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'type' => 'option',
                'sanitize_callback' => 'wp_kses_post'
            )
    );
    $wp_customize->add_control('quality_pro_options[home_testimonial_desciption]', array(
        'label' => esc_html__('Description', 'webriti-companion'),
        'section' => 'test_section_settings',
        'type' => 'text',));

    //Testimonail Title
    $wp_customize->add_setting(
            'testimonial_title',
            array(
                'default' => esc_html__("Sed ut Perspiciatis Unde Omnis Iste", "webriti-companion"),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );
    $wp_customize->add_control('testimonial_title', array(
        'label' => esc_html__('Testimonial title', 'webriti-companion'),
        'section' => 'test_section_settings',
        'type' => 'text',));

    //Testimonail Description
    $wp_customize->add_setting(
            'testimonial_descripton',
            array(
                'default' => esc_html__('Sed ut Perspiciatis Unde Omnis Iste Sed ut perspiciatis unde omnis iste natu error sit voluptatem accu tium
		neque fermentum veposu miten a tempor nise. Duis autem vel eum iriure dolor in hendrerit
		in vulputate velit consequat in velit esse.', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );

    $wp_customize->add_control('testimonial_descripton', array(
        'label' => esc_html__('Testimonial description', 'webriti-companion'),
        'section' => 'test_section_settings',
        'type' => 'text',));


    $wp_customize->add_setting('testimonial_image', array(
        'sanitize_callback' => 'esc_url_raw',
        'default' => WC__PLUGIN_URL . '/inc/quality/images/user1.jpg',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'testimonial_image', array(
                'label' => esc_html__('Image', 'webriti-companion'),
                'section' => 'test_section_settings',
                'settings' => 'testimonial_image',
            )));

    $wp_customize->add_setting(
            'testimonial_name',
            array(
                'default' => esc_html__('Elementum Nulla', 'quality'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );
    $wp_customize->add_control('testimonial_name', array(
        'label' => esc_html__('Name', 'webriti-companion'),
        'section' => 'test_section_settings',
        'type' => 'text',));

    $wp_customize->add_setting(
            'testimonial_position',
            array(
                'default' => esc_html__('Vestibulum', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );
    $wp_customize->add_control('testimonial_position', array(
        'label' => esc_html__('Designation', 'webriti-companion'),
        'section' => 'test_section_settings',
        'type' => 'text'));
}

add_action('customize_register', 'quality_testimonial_customizer');

/**
 * Add selective refresh for Front page testimonial section controls.
 */
function quality_register_testimonial_section_partials($wp_customize) {

    $wp_customize->selective_refresh->add_partial('quality_pro_options[home_testimonial_title]', array(
        'selector' => '.testimonial .section-header p',
        'settings' => 'quality_pro_options[home_testimonial_title]',
    ));
    $wp_customize->selective_refresh->add_partial('quality_pro_options[home_testimonial_desciption]', array(
        'selector' => '.testimonial .section-header h1',
        'settings' => 'quality_pro_options[home_testimonial_desciption]',
    ));

    $wp_customize->selective_refresh->add_partial('testimonial_title', array(
        'selector' => '.testmonial-block h3',
        'settings' => 'testimonial_title',
    ));

    $wp_customize->selective_refresh->add_partial('testimonial_descripton', array(
        'selector' => '.testmonial-block p',
        'settings' => 'testimonial_descripton',
    ));

    $wp_customize->selective_refresh->add_partial('testimonial_image', array(
        'selector' => '.testmonial-block img',
        'settings' => 'testimonial_image',
    ));

    $wp_customize->selective_refresh->add_partial('testimonial_name', array(
        'selector' => '.testmonial-block .name',
        'settings' => 'testimonial_name',
    ));

    $wp_customize->selective_refresh->add_partial('testimonial_position', array(
        'selector' => '.testmonial-block .designation',
        'settings' => 'testimonial_position',
    ));
}

add_action('customize_register', 'quality_register_testimonial_section_partials');