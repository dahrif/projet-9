<?php

function appointment_header_customizer($wp_customize) {

    /* Header Section */
    $wp_customize->add_panel('header_options', array(
        'priority' => 450,
        'capability' => 'edit_theme_options',
        'title' => esc_html__('Header settings', 'appointment'),
    ));

    //Header social Icon

    $wp_customize->add_section(
            'header_social_icon',
            array(
                'title' => esc_html__('Social links', 'appointment'),
                'priority' => 600,
                'panel' => 'header_options',
            )
    );

    //Show and hide Header Social Icons
    $wp_customize->add_setting(
            'appointment_options[header_social_media_enabled]'
            ,
            array(
                'default' => 0,
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointment_sanitize_checkbox',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[header_social_media_enabled]',
            array(
                'label' => esc_html__('Hide Header Social icons', 'appointment'),
                'section' => 'header_social_icon',
                'type' => 'checkbox',
            )
    );




    // Facebook link
    $wp_customize->add_setting(
            'appointment_options[social_media_facebook_link]',
            array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[social_media_facebook_link]',
            array(
                'label' => esc_html__('Facebook URL', 'appointment'),
                'section' => 'header_social_icon',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[facebook_media_enabled]', array(
        'default' => 1,
        'sanitize_callback' => 'appointment_sanitize_checkbox',
        'type' => 'option',
    ));

    $wp_customize->add_control(
            'appointment_options[facebook_media_enabled]',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Open link in new tab', 'appointment'),
                'section' => 'header_social_icon',
                'disabled' => 'disabled',
            )
    );

    //twitter link

    $wp_customize->add_setting(
            'appointment_options[social_media_twitter_link]',
            array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[social_media_twitter_link]',
            array(
                'label' => esc_html__('Twitter URL', 'appointment'),
                'section' => 'header_social_icon',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[twitter_media_enabled]'
            , array(
        'default' => 1,
        'sanitize_callback' => 'appointment_sanitize_checkbox',
        'type' => 'option',
    ));

    $wp_customize->add_control(
            'appointment_options[twitter_media_enabled]',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Open link in new tab', 'appointment'),
                'section' => 'header_social_icon',
            )
    );
    //Linkdin link

    $wp_customize->add_setting(
            'appointment_options[social_media_linkedin_link]',
            array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[social_media_linkedin_link]',
            array(
                'label' => esc_html__('LinkedIn URL', 'appointment'),
                'section' => 'header_social_icon',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[linkedin_media_enabled]'
            , array(
        'default' => 1,
        'sanitize_callback' => 'appointment_sanitize_checkbox',
        'type' => 'option',
    ));

    $wp_customize->add_control(
            'appointment_options[linkedin_media_enabled]',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Open link in new tab', 'appointment'),
                'section' => 'header_social_icon',
            )
    );
}

add_action('customize_register', 'appointment_header_customizer');
