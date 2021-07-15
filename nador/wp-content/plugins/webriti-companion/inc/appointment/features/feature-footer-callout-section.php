<?php
function appointment_dark_footer_callout_customizer( $wp_customize ) {

	//Home call out

	$wp_customize->add_panel( 'appointment_footer_callout_setting', array(
		'priority'       => 640,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('Footer callout settings', 'appointment-dark'),
	) );
	
	//Contact Information Setting
	$wp_customize->add_section(
        'footer_callout_settings',
        array(
            'title' => esc_html__('Footer callout settings','appointment-dark'),
            'priority' => 35,
			'panel'  => 'appointment_footer_callout_setting',)
    );
	
	
	//Hide Index footer callout Section
	
	$wp_customize->add_setting(
    'appointment_options[front_callout_enable]',
    array(
        'default' => false,
		'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'appointment_dark_sanitize_checkbox',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_callout_enable]',
    array(
        'label' => esc_html__('Hide footer callout','appointment-dark'),
        'section' => 'footer_callout_settings',
        'type' => 'checkbox',
    )
	);
	
	//Form title
	$wp_customize->add_setting(
    'appointment_options[front_contact_title]',
    array(
        'default' => esc_html__('Sed ut perspiciatis unde','appointment-dark'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_dark_footer_callout_sanitize_text',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[front_contact_title]',array(
    'label'   => esc_html__('Callout Header','appointment-dark'),
    'section' => 'footer_callout_settings',
	 'type' => 'text',)  );
	 
	 //Footer callout Call-us
	 $wp_customize->add_setting(
		'appointment_options[contact_one_icon]', array(
        'default'        => esc_html__('fa-phone','appointment-dark'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_dark_footer_callout_sanitize_text',
		'type' =>'option',
    ));
	
	$wp_customize->add_control('appointment_options[contact_one_icon]', array(
        'label'   => esc_html__('Icon', 'appointment-dark'),
        'section' => 'footer_callout_settings',
        'type'    => 'text',
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[front_contact1_title]',
    array(
        'default' => esc_html__('Non proident, sunt in culpa','appointment-dark'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_dark_footer_callout_sanitize_text',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact1_title]',
    array(
        'label' => esc_html__('Title','appointment-dark'),
        'section' => 'footer_callout_settings',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'appointment_options[front_contact1_val]',
    array(
        'default' => esc_html__('+99 999 99 999','appointment-dark'),
		 'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_dark_footer_callout_sanitize_text',
		 'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact1_val]',
    array(
        'label' => esc_html__('Description','appointment-dark'),
        'section' => 'footer_callout_settings',
        'type' => 'text',	
    )
);


//callout Time
	 $wp_customize->add_setting(
		'appointment_options[contact_two_icon]', array(
        'default'        => esc_html__('fa-clock-o','appointment-dark'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'appointment_dark_footer_callout_sanitize_text',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'appointment_options[contact_two_icon]', array(
        'label'   => esc_html__('Icon', 'appointment-dark'),
        'section' => 'footer_callout_settings',
        'type'    => 'text',
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[front_contact2_title]',
    array(
        'default' => esc_html__('Neque porro quisquam','appointment-dark'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_dark_footer_callout_sanitize_text',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact2_title]',
    array(
        'label' => esc_html__('Title','appointment-dark'),
        'section' => 'footer_callout_settings',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'appointment_options[front_contact2_val]',
    array(
        'default' => esc_html__('Ullamco laboris nisi','appointment-dark'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'appointment_dark_footer_callout_sanitize_text',
		 'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact2_val]',
    array(
        'label' => esc_html__('Description','appointment-dark'),
        'section' => 'footer_callout_settings',
        'type' => 'text',	
    )
);

	//Contact Email Setting 
	
	$wp_customize->add_setting(
		'appointment_options[contact_three_icon]', array(
        'default'        => esc_html__('fa-envelope','appointment-dark'),
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'appointment_dark_footer_callout_sanitize_text',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'appointment_options[contact_three_icon]', array(
        'label'   => esc_html__('Icon', 'appointment-dark'),
        'section' => 'footer_callout_settings',
        'type'    => 'text',
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[front_contact3_title]',
    array(
        'default' => esc_html__('Ipsum quia dolor sit amet','appointment-dark'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_dark_footer_callout_sanitize_text',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact3_title]',
    array(
        'label' => esc_html__('Title','appointment-dark'),
        'section' => 'footer_callout_settings',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'appointment_options[front_contact3_val]',
    array(
        'default' => esc_html__('abc@example.com','appointment-dark'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'appointment_dark_footer_callout_sanitize_text',
		 'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact3_val]',
    array(
        'label' => esc_html__('Description','appointment-dark'),
        'section' => 'footer_callout_settings',
        'type' => 'text',	
    )
    );

    function appointment_dark_footer_callout_sanitize_text( $input ) {
        return wp_kses_post(force_balance_tags( $input ));
    }  	
}
add_action( 'customize_register', 'appointment_dark_footer_callout_customizer' );	