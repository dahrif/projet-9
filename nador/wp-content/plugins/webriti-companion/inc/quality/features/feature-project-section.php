<?php

function webriti_companion_quality_project_customizer($wp_customize) {

    $wp_customize->add_section(
            'project_section_settings',
            array(
                'title' => esc_html__('Project settings', 'webriti-companion'),
                //'panel'  => 'quality_project_setting',
                'panel' => 'quality_homepage_section_setting',
                'priority' => 4,)
    );


    //Show and hide Project section
    $wp_customize->add_setting(
            'quality_pro_options[home_projects_enabled]'
            ,
            array(
                'default' => true,
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'quality_sanitize_checkbox',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'quality_pro_options[home_projects_enabled]',
            array(
                'label' => esc_html__('Enable Home Project section', 'webriti-companion'),
                'section' => 'project_section_settings',
                'type' => 'checkbox',
            )
    );

    // //Project Title
    $wp_customize->add_setting(
            'quality_pro_options[project_heading_one]',
            array(
                'default' => esc_html__('Vestibulum vitae tellus', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'type' => 'option',
                'sanitize_callback' => 'sanitize_text_field'
            )
    );
    $wp_customize->add_control('quality_pro_options[project_heading_one]', array(
        'label' => esc_html__('Title', 'webriti-companion'),
        'section' => 'project_section_settings',
        'type' => 'text',));

    //Project Description 
    $wp_customize->add_setting(
            'quality_pro_options[project_tagline]',
            array(
                'default' => __('Orci <b>varius</b> natoque', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'type' => 'option',
                'sanitize_callback' => 'wp_kses_post'
            )
    );
    $wp_customize->add_control('quality_pro_options[project_tagline]', array(
        'label' => esc_html__('Description', 'webriti-companion'),
        'section' => 'project_section_settings',
        'type' => 'text',));


    //Project one settings

    $wp_customize->add_setting('quality_pro_options[project_one_thumb]', array('default' => WC__PLUGIN_URL . '/inc/quality/images/portfolio/home-port1.jpg',
        'type' => 'option', 'sanitize_callback' => 'esc_url_raw',));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
                    $wp_customize,
                    'quality_pro_options[project_one_thumb]',
                    array(
                'label' => esc_html__('Image', 'webriti-companion'),
                'section' => 'example_section_one',
                'settings' => 'quality_pro_options[project_one_thumb]',
                'section' => 'project_section_settings',
                'priority' => 140,
                'type' => 'upload',
                    )
            )
    );


    $wp_customize->add_setting(
            'quality_pro_options[project_one_title]', array(
        'default' => esc_html__('Cras tempus', 'webriti-companion'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'option',
    ));
    $wp_customize->add_control('quality_pro_options[project_one_title]', array(
        'label' => esc_html__('Title', 'webriti-companion'),
        'section' => 'project_section_settings',
        'priority' => 141,
        'type' => 'text',
    ));

    $wp_customize->add_setting(
            'quality_pro_options[project_one_desc]', array(
        'default' => esc_html__('Nunc, Placerat', 'quality'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'option',
    ));
    $wp_customize->add_control('quality_pro_options[project_one_desc]', array(
        'label' => esc_html__('Description', 'webriti-companion'),
        'section' => 'project_section_settings',
        'priority' => 142,
        'type' => 'text',
    ));



    //Project two settings
    $wp_customize->add_setting('quality_pro_options[project_two_thumb]', array('default' => WC__PLUGIN_URL . '/inc/quality/images/portfolio/home-port2.jpg', 'type' => 'option', 'sanitize_callback' => 'esc_url_raw',));
    $wp_customize->add_control(
            new WP_Customize_Image_Control(
                    $wp_customize,
                    'quality_pro_options[project_two_thumb]',
                    array(
                'label' => esc_html__('Image', 'webriti-companion'),
                'section' => 'example_section_one',
                'settings' => 'quality_pro_options[project_two_thumb]',
                'section' => 'project_section_settings',
                'priority' => 150,
                'type' => 'upload',
                    )
            )
    );

    $wp_customize->add_setting(
            'quality_pro_options[project_two_title]', array(
        'default' => esc_html__('Cras tempus', 'webriti-companion'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'option',
    ));
    $wp_customize->add_control('quality_pro_options[project_two_title]', array(
        'label' => esc_html__('Title', 'webriti-companion'),
        'section' => 'project_section_settings',
        'priority' => 151,
        'type' => 'text',
    ));

    $wp_customize->add_setting(
            'quality_pro_options[project_two_desc]', array(
        'default' => esc_html__('Nunc, Placerat', 'quality'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'option',
    ));
    $wp_customize->add_control('quality_pro_options[project_two_desc]', array(
        'label' => esc_html__('Description', 'webriti-companion'),
        'section' => 'project_section_settings',
        'priority' => 152,
        'type' => 'text',
    ));


    //Project three settings

    $wp_customize->add_setting('quality_pro_options[project_three_thumb]', array('default' => WC__PLUGIN_URL . '/inc/quality/images/portfolio/home-port3.jpg', 'type' => 'option', 'sanitize_callback' => 'esc_url_raw',));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
                    $wp_customize,
                    'quality_pro_options[project_three_thumb]',
                    array(
                'label' => esc_html__('Image', 'webriti-companion'),
                'section' => 'example_section_one',
                'settings' => 'quality_pro_options[project_three_thumb]',
                'section' => 'project_section_settings',
                'priority' => 153,
                'type' => 'upload',
                    )
            )
    );

    $wp_customize->add_setting(
            'quality_pro_options[project_three_title]', array(
        'default' => esc_html__('Cras tempus', 'webriti-companion'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'option',
    ));
    $wp_customize->add_control('quality_pro_options[project_three_title]', array(
        'label' => esc_html__('Title', 'webriti-companion'),
        'section' => 'project_section_settings',
        'priority' => 154,
        'type' => 'text',
    ));

    $wp_customize->add_setting(
            'quality_pro_options[project_three_desc]', array(
        'default' => esc_html__('Nunc, Placerat', 'quality'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'option',
    ));
    $wp_customize->add_control('quality_pro_options[project_three_desc]', array(
        'label' => esc_html__('Description', 'webriti-companion'),
        'section' => 'project_section_settings',
        'priority' => 155,
        'type' => 'text',
    ));


    //Project Four settings

    $wp_customize->add_setting('quality_pro_options[project_four_thumb]', array('default' => WC__PLUGIN_URL . '/inc/quality/images/portfolio/home-port4.jpg', 'type' => 'option', 'sanitize_callback' => 'esc_url_raw',));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
                    $wp_customize,
                    'quality_pro_options[project_four_thumb]',
                    array(
                'label' => esc_html__('Image', 'webriti-companion'),
                'section' => 'example_section_one',
                'settings' => 'quality_pro_options[project_four_thumb]',
                'section' => 'project_section_settings',
                'priority' => 156,
                'type' => 'upload',
                    )
            )
    );


    $wp_customize->add_setting(
            'quality_pro_options[project_four_title]', array(
        'default' => esc_html__('Cras tempus', 'webriti-companion'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'option',
    ));
    $wp_customize->add_control('quality_pro_options[project_four_title]', array(
        'label' => esc_html__('Title', 'webriti-companion'),
        'section' => 'project_section_settings',
        'priority' => 157,
        'type' => 'text',
    ));

    $wp_customize->add_setting(
            'quality_pro_options[project_four_desc]', array(
        'default' => esc_html__('Nunc, Placerat', 'quality'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'option',
    ));
    $wp_customize->add_control('quality_pro_options[project_four_desc]', array(
        'label' => esc_html__('Description', 'webriti-companion'),
        'section' => 'project_section_settings',
        'priority' => 158,
        'type' => 'text',
    ));


    //Project five settings

    $wp_customize->add_setting('quality_pro_options[project_five_thumb]', array('default' => WC__PLUGIN_URL . '/inc/quality/images/portfolio/home-port5.jpg', 'type' => 'option', 'sanitize_callback' => 'esc_url_raw',));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
                    $wp_customize,
                    'quality_pro_options[project_five_thumb]',
                    array(
                'label' => esc_html__('Image', 'webriti-companion'),
                'settings' => 'quality_pro_options[project_five_thumb]',
                'section' => 'project_section_settings',
                'priority' => 159,
                'type' => 'upload',
                    )
            )
    );

    $wp_customize->add_setting(
            'quality_pro_options[project_five_title]', array(
        'default' => esc_html__('Cras tempus', 'webriti-companion'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'option',
    ));
    $wp_customize->add_control('quality_pro_options[project_five_title]', array(
        'label' => esc_html__('Title', 'webriti-companion'),
        'section' => 'project_section_settings',
        'priority' => 160,
        'type' => 'text',
    ));

    $wp_customize->add_setting(
            'quality_pro_options[project_five_desc]', array(
        'default' => esc_html__('Nunc, Placerat', 'quality'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'option',
    ));
    $wp_customize->add_control('quality_pro_options[project_five_desc]', array(
        'label' => esc_html__('Description', 'webriti-companion'),
        'section' => 'project_section_settings',
        'priority' => 161,
        'type' => 'text',
    ));
}

add_action('customize_register', 'webriti_companion_quality_project_customizer');

/**
 * Add selective refresh for Front page project section controls.
 */
function quality_register_project_section_partials($wp_customize) {

    $wp_customize->selective_refresh->add_partial('quality_pro_options[project_heading_one]', array(
        'selector' => '.portfolio .section-header p',
        'settings' => 'quality_pro_options[project_heading_one]',
    ));
    $wp_customize->selective_refresh->add_partial('quality_pro_options[project_tagline]', array(
        'selector' => '.portfolio .section-header h1',
        'settings' => 'quality_pro_options[project_tagline]',
    ));

    $wp_customize->selective_refresh->add_partial('quality_pro_options[project_one_thumb]', array(
        'selector' => '#quality_project_one img',
        'settings' => 'quality_pro_options[project_one_thumb]',
    ));

    $wp_customize->selective_refresh->add_partial('quality_pro_options[project_one_title]', array(
        'selector' => '#quality_project_one .entry-title a',
        'settings' => 'quality_pro_options[project_one_title]',
    ));

    $wp_customize->selective_refresh->add_partial('quality_pro_options[project_one_desc]', array(
        'selector' => '#quality_project_one p',
        'settings' => 'quality_pro_options[project_one_desc]',
    ));


    $wp_customize->selective_refresh->add_partial('quality_pro_options[project_two_thumb]', array(
        'selector' => '#quality_project_two img',
        'settings' => 'quality_pro_options[project_two_thumb]',
    ));

    $wp_customize->selective_refresh->add_partial('quality_pro_options[project_two_title]', array(
        'selector' => '#quality_project_two .entry-title a',
        'settings' => 'quality_pro_options[project_two_title]',
    ));

    $wp_customize->selective_refresh->add_partial('quality_pro_options[project_two_desc]', array(
        'selector' => '#quality_project_two p',
        'settings' => 'quality_pro_options[project_two_desc]',
    ));


    $wp_customize->selective_refresh->add_partial('quality_pro_options[project_three_thumb]', array(
        'selector' => '.home_portfolio_row #quality_project_three .qua_portfolio_image',
        'settings' => 'quality_pro_options[project_three_thumb]',
    ));

    $wp_customize->selective_refresh->add_partial('quality_pro_options[project_three_title]', array(
        'selector' => '#quality_project_three .entry-title a',
        'settings' => 'quality_pro_options[project_three_title]',
    ));

    $wp_customize->selective_refresh->add_partial('quality_pro_options[project_three_desc]', array(
        'selector' => '#quality_project_three p',
        'settings' => 'quality_pro_options[project_three_desc]',
    ));


    $wp_customize->selective_refresh->add_partial('quality_pro_options[project_four_thumb]', array(
        'selector' => '#quality_project_two img',
        'settings' => 'quality_pro_options[project_four_thumb]',
    ));

    $wp_customize->selective_refresh->add_partial('quality_pro_options[project_four_title]', array(
        'selector' => '#quality_project_four .entry-title a',
        'settings' => 'quality_pro_options[project_four_title]',
    ));

    $wp_customize->selective_refresh->add_partial('quality_pro_options[project_four_desc]', array(
        'selector' => '#quality_project_four p',
        'settings' => 'quality_pro_options[project_four_desc]',
    ));

    $wp_customize->selective_refresh->add_partial('quality_pro_options[project_five_thumb]', array(
        'selector' => '#quality_project_five img',
        'settings' => 'quality_pro_options[project_five_thumb]',
    ));

    $wp_customize->selective_refresh->add_partial('quality_pro_options[project_five_title]', array(
        'selector' => '#quality_project_five .entry-title a',
        'settings' => 'quality_pro_options[project_five_title]',
    ));

    $wp_customize->selective_refresh->add_partial('quality_pro_options[project_five_desc]', array(
        'selector' => '#quality_project_five p',
        'settings' => 'quality_pro_options[project_five_desc]',
    ));
}

add_action('customize_register', 'quality_register_project_section_partials');