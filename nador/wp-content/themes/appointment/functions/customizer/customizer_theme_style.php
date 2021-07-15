<?php
// Adding customizer home page setting
function appointment_style_customizer( $wp_customize ) {

    /* Theme Style settings */
    $wp_customize->add_section( 'theme_style' , array(
      'title'      => __('Theme style settings', 'appointment'),
      'priority'   => 1
    ) );

    //Theme Color Scheme
    $wp_customize->add_setting(
      'appointment_options[link_color_enable]',
        array(
          'default' => false,
          'capability'     => 'edit_theme_options',
          'sanitize_callback' => 'appointment_sanitize_checkbox',
          'type' => 'option',
        )
    );
    $wp_customize->add_control(
      'appointment_options[link_color_enable]',
        array(
          'label' => __('Enable custom color skin','appointment'),
          'section' => 'theme_style',
          'type' => 'checkbox',
      )
    );

    $wp_customize->add_setting(
      'appointment_options[link_color]',
      array(
        'capability'     => 'edit_theme_options',
        'default' => '#ee591f',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_hex_color'
      )
    );

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize, 'appointment_options[link_color]',
          array(
          'label'      => __( 'Skin color', 'appointment' ),
          'section'    => 'theme_style',
          'settings'   => 'appointment_options[link_color]',
          )
        )
    );
}
add_action( 'customize_register', 'appointment_style_customizer' );
