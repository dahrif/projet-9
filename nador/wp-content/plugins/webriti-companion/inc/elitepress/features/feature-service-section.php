<?php
function elitepress_service_customizer( $wp_customize ) {
 
    //Service Section
	$wp_customize->add_section(
        'service_section_settings',
        array(
            'title' => esc_html__('Service settings','webriti-companion'),
			'priority'   => 403,
            'panel'  => 'elitepress_homepage_setting',)
    );
	
	//Hide Index Service Section
	
	$wp_customize->add_setting(
    'elitepress_lite_options[service_section_enabled]',
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'elitepress_sanitize_checkbox',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'elitepress_lite_options[service_section_enabled]',
    array(
        'label' => esc_html__('Enable Service section on front page','webriti-companion'),
        'section' => 'service_section_settings',
        'type' => 'checkbox',
    )
	);
	
	$wp_customize->add_setting(
    'elitepress_lite_options[service_title]',
    array(
        'default' =>esc_html__('Aenean euismod','webriti-companion'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'elitepress_lite_options[service_title]',
    array(
        'label' => esc_html__('Title','webriti-companion'),
        'section' => 'service_section_settings',
        'type' => 'text',
    )
	);
	
	$wp_customize->add_setting(
    'elitepress_lite_options[service_description]',
    array(
        'default' => esc_html__('Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','webriti-companion'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'elitepress_lite_options[service_description]',
    array(
        'label' => esc_html__('Description','webriti-companion'),
        'section' => 'service_section_settings',
        'type' => 'text',
		'sanitize_callback' => 'sanitize_text_field',
    )
	);	
	
	if ( class_exists( 'Webriti_Companion_Repeater' ) ) {
			$wp_customize->add_setting( 'elitepress_service_content', array(
			'sanitize_callback' => 'webriti_companion_repeater_sanitize',
			) );

			$wp_customize->add_control( new Webriti_Companion_Repeater( $wp_customize, 'elitepress_service_content', array(
				'label'                             => esc_html__( 'Service Content', 'webriti-companion' ),
				'section'                           => 'service_section_settings',
				'priority'                          => 10,
				'add_field_label'                   => esc_html__( 'Add new Service', 'webriti-companion' ),
				'item_name'                         => esc_html__( 'Service', 'webriti-companion' ),
				'customizer_repeater_icon_control'  => true,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_image_control' => true,
				'customizer_repeater_button_text_control' => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_checkbox_control' => true,
				) ) );
		}

}
add_action( 'customize_register', 'elitepress_service_customizer' );

// Elitepress default service data.
if ( ! function_exists( 'elitepress_service_default_customize_register' ) ) :
	
	function elitepress_service_default_customize_register( $wp_customize ) {
	$theme = wp_get_theme(); // gets the current theme
		
		// Elitepress  default service data.
			if(get_option('elitepress_lite_options')!=''){	
				$old_theme_servives = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), elitepress_theme_data_setup() );
				
				if($old_theme_servives['service_one_icon']!= '' || $old_theme_servives['service_one_title']!= '' || $old_theme_servives['service_one_description']!= '' 
				|| $old_theme_servives['service_two_icon']!= '' || $old_theme_servives['service_two_title']!= '' || $old_theme_servives['service_two_description']!= '' 
				|| $old_theme_servives['service_three_icon']!= '' || $old_theme_servives['service_three_title']!= '' || $old_theme_servives['service_three_description']!= ''
				 || $old_theme_servives['service_four_icon']!= '' || $old_theme_servives['service_four_title']!= '' || $old_theme_servives['service_four_description']!= '')
				{
				 $elitepress_service_content_control = $wp_customize->get_setting( 'elitepress_service_content' );
					if ( ! empty( $elitepress_service_content_control ) ) {
						$elitepress_service_content_control->default = json_encode( array(
							array(
							 'icon_value' => isset($old_theme_servives['service_one_icon'])? $old_theme_servives['service_one_icon']:'',
							 'title'      => isset($old_theme_servives['service_one_title'])? $old_theme_servives['service_one_title']:'',
							'text'       => isset($old_theme_servives['service_one_description'])? $old_theme_servives['service_one_description']:'',
							'choice'    => 'customizer_repeater_icon',
							'link'       => '',
							'open_new_tab'	=> '',
							 'button_text'	=> '',
							 'id'         => 'customizer_repeater_56d7ea7f40b56',
							 ),
							array(
							 'icon_value' => isset($old_theme_servives['service_two_icon'])? $old_theme_servives['service_two_icon']:'',
							 'title'      => isset($old_theme_servives['service_two_title'])? $old_theme_servives['service_two_title']:'',
							 'text'       => isset($old_theme_servives['service_two_description'])? $old_theme_servives['service_two_description']:'',
							 'choice'    => 'customizer_repeater_icon',
							 'link'       => '',
							 'open_new_tab'	=> '',
							 'button_text'	=> '',
							 'id'         => 'customizer_repeater_56d7ea7f40b66',
							 ),
							 array(
							 'icon_value' => isset($old_theme_servives['service_three_icon'])? $old_theme_servives['service_three_icon']:'',
							 'title'      => isset($old_theme_servives['service_three_title'])? $old_theme_servives['service_three_title']:'',
							 'text'       => isset($old_theme_servives['service_three_description'])? $old_theme_servives['service_three_description']:'',
							 'choice'    => 'customizer_repeater_icon',
							 'link'       => '',
							 'open_new_tab'	=> '',
							 'button_text'	=> '',
							'id'         => 'customizer_repeater_56d7ea7f40b86',
							),
							
							 array(
							 'icon_value' => isset($old_theme_servives['service_four_icon'])? $old_theme_servives['service_four_icon']:'',
							 'title'      => isset($old_theme_servives['service_four_title'])? $old_theme_servives['service_four_title']:'',
							 'text'       => isset($old_theme_servives['service_four_description'])? $old_theme_servives['service_four_description']:'',
							 'choice'    => 'customizer_repeater_icon',
							 'link'       => '',
							 'open_new_tab'	=> '',
							 'button_text'	=> '',
							 'id'         => 'customizer_repeater_56d7ea7f40b96',
							),
						));
			 		}
			 	} 
			}
			else{
			$elitepress_service_content_control = $wp_customize->get_setting( 'elitepress_service_content' );
				if ( ! empty( $elitepress_service_content_control ) ) {
					$elitepress_service_content_control->default = json_encode( array(
						array(
						'icon_value' => 'fa fa-shield',
						'title'      => esc_html__( 'Ipsum pulvinar', 'webriti-companion' ),
						'text'       => esc_html__( 'Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.', 'webriti-companion' ),
						'choice'    => 'customizer_repeater_icon',
						'link'			=> '#',
						'open_new_tab'	=> 'yes',
						'button_text'	=> esc_html__('Sed gravida','webriti-companion'),
						'id'         => 'customizer_repeater_56d7ea7f40b56',
						),
						array(
						'icon_value' => 'fa fa-tablet',
						'title'      => esc_html__( 'Lorem ipsum', 'webriti-companion' ),
						'text'       => esc_html__( 'Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.', 'webriti-companion' ),
						'choice'    => 'customizer_repeater_icon',
						'link'			=> '#',
						'open_new_tab'	=> 'yes',
						'button_text'	=> esc_html__('Sed gravida','webriti-companion'),
						'id'         => 'customizer_repeater_56d7ea7f40b66',
						),
						array(
						'icon_value' => 'fa fa-edit',
						'title'      => esc_html__( 'Integer ultricies', 'webriti-companion' ),
						'text'       => esc_html__( 'Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.', 'webriti-companion' ),
						'choice'    => 'customizer_repeater_icon',
						'link'			=> '#',
						'open_new_tab'	=> 'yes',
						'button_text'	=> esc_html__('Sed gravida','webriti-companion'),
						'id'         => 'customizer_repeater_56d7ea7f40b86',
						),
						
						array(
						'icon_value' => 'fa fa-star-half-o',
						'title'      => esc_html__( 'Integer condimentum', 'webriti-companion' ),
						'text'       => esc_html__( 'Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.', 'webriti-companion' ),
						'choice'    => 'customizer_repeater_icon',
						'link'			=> '#',
						'open_new_tab'	=> 'yes',
						'button_text'	=> esc_html__('Sed gravida','webriti-companion'),
						'id'         => 'customizer_repeater_56d7ea7f40b96',
						),
					));
				}			
			}
		
	}
	add_action( 'customize_register', 'elitepress_service_default_customize_register' );
endif;