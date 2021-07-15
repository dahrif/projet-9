<?php
function appointment_slider_customizer($wp_customize) {

    //slider Section 
    $wp_customize->add_panel('appointment_slider_setting', array(
        'priority' => 500,
        'capability' => 'edit_theme_options',
        'title' => esc_html__('Slider settings', 'webriti-companion'),
    ));

    $wp_customize->add_section(
            'slider_section_settings',
            array(
                'title' => esc_html__('Featured slider settings', 'webriti-companion'),
                'description' => '',
                'panel' => 'appointment_slider_setting',)
    );

    //Hide slider

    $wp_customize->add_setting(
            'appointment_options[home_banner_enabled]',
            array(
                'default' => '',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointment_sanitize_checkbox',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[home_banner_enabled]',
            array(
                'label' => esc_html__('Hide slider from homepage', 'webriti-companion'),
                'section' => 'slider_section_settings',
                'type' => 'checkbox',
            )
    );


    //slider type
    $wp_customize->add_setting(
            'appointment_options[slider_radio]',
            array(
                'default' => 'demo',
                'type' => 'option',
                'sanitize_callback' => 'appointment_sanitize_radio',
            )
    );

    $wp_customize->add_control(
            'appointment_options[slider_radio]',
            array(
                'type' => 'radio',
                'label' => esc_html__('Select slider type', 'webriti-companion'),
                'section' => 'slider_section_settings',
                'choices' => array(
                    'demo' => esc_html__('Demo slider', 'webriti-companion'),
                    'category' => esc_html__('Category slider', 'webriti-companion'),
                ),
            )
    );



    // add section to manage featured slider on category basis	
    $wp_customize->add_setting(
            'appointment_options[slider_select_category]',
            array(
                'default' => 'Uncategorized',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointment_select2_text_sanitization',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(new Appointment_category_dropdown_customControl($wp_customize, 'appointment_options[slider_select_category]', array(
                'label' => esc_html__('Select category for slider', 'webriti-companion'),
                'section' => 'slider_section_settings',
                'settings' => 'appointment_options[slider_select_category]',
                'input_attrs' => array(
                    'placeholder' => esc_html__('Please select category', 'webriti-companion'),
                    'multiselect' => true,
                ),
    )));


    //Slider animation

    $wp_customize->add_setting(
            'appointment_options[slider_options]',
            array(
                'default' => esc_html__('slide', 'webriti-companion'),
                'type' => 'option',
                'sanitize_callback' => 'appointment_select2_text_sanitization'
            )
    );

    $wp_customize->add_control(
            'appointment_options[slider_options]',
            array(
                'type' => 'select',
                'label' => esc_html__('Select slider animation', 'webriti-companion'),
                'section' => 'slider_section_settings',
                'choices' => array('slide' => esc_html__('slide', 'webriti-companion'), 'carousel-fade' => esc_html__('fade', 'webriti-companion')),
    ));


    //Slider Animation duration

    $wp_customize->add_setting(
            'appointment_options[slider_transition_delay]',
            array(
                'default' => '2000',
                'type' => 'option',
                'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(
            'appointment_options[slider_transition_delay]',
            array(
                'type' => 'number',
                'label' => esc_html__('Duration', 'webriti-companion'),
                'section' => 'slider_section_settings',
    ));

    //Number of slides
    $wp_customize->add_setting(
            'appointment_options[featured_slider_post]',
            array(
                'default' => '',
                'sanitize_callback' => 'absint',
                'type' => 'option',
            )
    );

    $wp_customize->add_control(
            'appointment_options[featured_slider_post]',
            array(
                'type' => 'number',
                'label' => esc_html__('Input number of slides', 'webriti-companion'),
                'section' => 'slider_section_settings',)
    );
}

add_action('customize_register', 'appointment_slider_customizer');

function appointment_slider_sanitize_layout($value) {
    if (!in_array($value, array('Uncategorized', 'category_slider')))
        return $value;
}