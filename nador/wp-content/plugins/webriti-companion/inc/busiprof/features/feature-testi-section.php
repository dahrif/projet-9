<?php
function busiprof_theme_testi_section( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? true : false;
	//Testimonial Section
			
	$wp_customize->add_section( 'testimonial_settings' , array(
		'title'      => esc_html__('Testimonial settings', 'webriti-companion'),
		'panel'  => 'section_settings',
		'priority'   => 5,
   	) );
	
		
		$wp_customize->add_setting( 'busiprof_theme_options[home_testimonial_section_enabled]' , array( 'default' => 'on' , 'type' => 'option', 'sanitize_callback' => 'busiprof_sanitize_radio'  ) );
		$wp_customize->add_control(	'busiprof_theme_options[home_testimonial_section_enabled]' , array(
				'label'    => esc_html__( 'Enable Home Testimonial section', 'webriti-companion' ),
				'section'  => 'testimonial_settings',
				'type'     => 'radio',
				'choices' => array(
					'on'=>esc_html__('ON', 'webriti-companion'),
					'off'=>esc_html__('OFF', 'webriti-companion')
				)
		));
		
		// testmonial section title
		$wp_customize->add_setting( 'busiprof_theme_options[testimonials_title]', 
		array( 'default' => esc_html__('Aliquam erat vol', 'webriti-companion' ) , 'type'=>'option', 'sanitize_callback' => 'wp_kses_post'  ) );
		$wp_customize->add_control(	'busiprof_theme_options[testimonials_title]', 
			array(
				'label'    => esc_html__( 'Title', 'webriti-companion' ),
				'section'  => 'testimonial_settings',
				'type'     => 'text',
		));
		
		// testmonial section desc
		$wp_customize->add_setting( 'busiprof_theme_options[testimonials_text]', array( 'default' => esc_html__('We are a group of passionate designers and developers', 'webriti-companion' ) , 'type'=>'option', 'sanitize_callback' => 'sanitize_text_field'  ) );
		$wp_customize->add_control(	'busiprof_theme_options[testimonials_text]', 
			array(
				'label'    => esc_html__( 'Description', 'webriti-companion' ),
				'section'  => 'testimonial_settings',
				'type'     => 'textarea',
		));	
		
		if ( class_exists( 'Webriti_Companion_Repeater' ) ) {
			$wp_customize->add_setting( 'busiprof_testimonial_content', array(
			'sanitize_callback' => 'webriti_companion_repeater_sanitize',
			) );

			$wp_customize->add_control( new Webriti_Companion_Repeater( $wp_customize, 'busiprof_testimonial_content', array(
				'label'                             => esc_html__( 'Testimonial content', 'webriti-companion' ),
				'section'                           => 'testimonial_settings',
				'add_field_label'                   => esc_html__( 'Add new Testimonial', 'webriti-companion' ),
				'item_name'                         => esc_html__( 'Testimonial', 'webriti-companion' ),
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_image_control' => true,
				'customizer_repeater_designation_control' => true,
				'customizer_repeater_checkbox_control' => true,
				) ) );
		}
}

add_action( 'customize_register', 'busiprof_theme_testi_section' );

function busiprof_register_testi_section_partials( $wp_customize ){
	
$wp_customize->selective_refresh->add_partial( 'busiprof_theme_options[testimonials_title]', array(
		'selector'            => '.testimonial-scroll .section-heading',
		'settings'            => 'busiprof_theme_options[testimonials_title]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'busiprof_theme_options[testimonials_text]', array(
		'selector'            => '.testimonial-scroll .section-title p',
		'settings'            => 'busiprof_theme_options[testimonials_text]',
	
	) );
}
add_action( 'customize_register', 'busiprof_register_testi_section_partials' );	



if ($theme->name == 'vdequator' && (version_compare(wp_get_theme()->get('Version'), '1.0.9') > 0)):

    if (!function_exists('vdequator_testimonial_layout_customizer')) {

        function vdequator_testimonial_layout_customizer($wp_customize) {
            $current_options = wp_parse_args(get_option('busiprof_theme_options', array()), busiprof_theme_setup_data());

            /* Testimonial Layout section */

            if (get_option('busiprof_user', 'new') == 'old' || $current_options['busiprof_custom_css'] == 'nomorenow') {

                $wp_customize->add_setting('busiprof_theme_options[testimonial_effect_layout_setting]', array(
                    'default' => 'default',
                    'sanitize_callback' => 'webriti_companion_image_radio_button_sanitization',
                    'type' => 'option',
                ));
            } else {

                $wp_customize->add_setting('busiprof_theme_options[testimonial_effect_layout_setting]', array(
                    'default' => 'box_effect',
                    'sanitize_callback' => 'webriti_companion_image_radio_button_sanitization',
                    'type' => 'option',
                ));
            }

            $wp_customize->add_control(new webriti_companion_image_radio_button($wp_customize, 'busiprof_theme_options[testimonial_effect_layout_setting]',
                            array(
                        'label' => esc_html__('Testimonial Layout Setting', 'webriti-companion'),
                        'section' => 'testimonial_settings',
                        'choices' => array(
                            'default' => array(
                                'image' => WC__PLUGIN_URL . 'inc/busiprof/img/testimonial/vdequator-testimonial-default.png',
                                'name' => esc_html__('Testimonial Design 1', 'webriti-companion')
                            ),
                            'box_effect' => array(
                                'image' => WC__PLUGIN_URL . 'inc/busiprof/img/testimonial/vdequator-testimonial-box_effect.png',
                                'name' => esc_html__('Testimonial Design 2', 'webriti-companion')
                            )
                        )
                            )
            ));
        }

    }

    add_action('customize_register', 'vdequator_testimonial_layout_customizer');
    
endif;

if ($theme->name == 'LazyProf' && (version_compare(wp_get_theme()->get('Version'), '1.2.5') > 0)):

    if (!function_exists('lazyprof_testimonial_layout_customizer')) {

        function lazyprof_testimonial_layout_customizer($wp_customize) {
            $current_options = wp_parse_args(get_option('busiprof_theme_options', array()), busiprof_theme_setup_data());

            /* Testimonial Layout section */

            if (get_option('busiprof_user', 'new') == 'old' || $current_options['busiprof_custom_css'] == 'nomorenow') {

                $wp_customize->add_setting('busiprof_theme_options[testimonial_sideline_effect_layout_setting]', array(
                    'default' => 'default',
                    'sanitize_callback' => 'webriti_companion_image_radio_button_sanitization',
                    'type' => 'option',
                ));
            } else {

                $wp_customize->add_setting('busiprof_theme_options[testimonial_sideline_effect_layout_setting]', array(
                    'default' => 'sideline_box_effect',
                    'sanitize_callback' => 'webriti_companion_image_radio_button_sanitization',
                    'type' => 'option',
                ));
            }

            $wp_customize->add_control(new webriti_companion_image_radio_button($wp_customize, 'busiprof_theme_options[testimonial_sideline_effect_layout_setting]',
                            array(
                        'label' => esc_html__('Testimonial Layout Setting', 'webriti-companion'),
                        'section' => 'testimonial_settings',
                        'choices' => array(
                            'default' => array(
                                'image' => WC__PLUGIN_URL . 'inc/busiprof/img/testimonial/lazyprof-testimonial-default.png',
                                'name' => esc_html__('Testimonial Design 1', 'webriti-companion')
                            ),
                            'sideline_box_effect' => array(
                                'image' => WC__PLUGIN_URL . 'inc/busiprof/img/testimonial/lazyprof-testimonial-sideline_box_effect.png',
                                'name' => esc_html__('Testimonial Design 2', 'webriti-companion')
                            )
                        )
                            )
            ));
        }

    }

    add_action('customize_register', 'lazyprof_testimonial_layout_customizer');
    
endif;

if ($theme->name == 'vdperanto' && (version_compare(wp_get_theme()->get('Version'), '2.0', '>=') )):

    if (!function_exists('vdperanto_testimonial_layout_customizer')) {

        function vdperanto_testimonial_layout_customizer($wp_customize) {
            $current_options = wp_parse_args(get_option('busiprof_theme_options', array()), busiprof_theme_setup_data());

            /* Testimonial Layout section */

            if (get_option('busiprof_user', 'new') == 'old' || $current_options['busiprof_custom_css'] == 'nomorenow') {

                $wp_customize->add_setting('busiprof_theme_options[testimonial_center_effect_layout_setting]', array(
                    'default' => 'default',
                    'sanitize_callback' => 'webriti_companion_image_radio_button_sanitization',
                    'type' => 'option',
                ));
            } else {

                $wp_customize->add_setting('busiprof_theme_options[testimonial_center_effect_layout_setting]', array(
                    'default' => 'center_box_effect',
                    'sanitize_callback' => 'webriti_companion_image_radio_button_sanitization',
                    'type' => 'option',
                ));
            }

            $wp_customize->add_control(new webriti_companion_image_radio_button($wp_customize, 'busiprof_theme_options[testimonial_center_effect_layout_setting]',
                            array(
                        'label' => esc_html__('Testimonial Layout Setting', 'webriti-companion'),
                        'section' => 'testimonial_settings',
                        'choices' => array(
                            'default' => array(
                                'image' => WC__PLUGIN_URL . 'inc/busiprof/img/testimonial/vdperanto-testimonial-default.png',
                                'name' => esc_html__('Testimonial Design 1', 'webriti-companion')
                            ),
                            'center_box_effect' => array(
                                'image' => WC__PLUGIN_URL . 'inc/busiprof/img/testimonial/vdperanto-testimonial-center_box_effect.png',
                                'name' => esc_html__('Testimonial Design 2', 'webriti-companion')
                            )
                        )
                            )
            ));
        }

    }

    add_action('customize_register', 'vdperanto_testimonial_layout_customizer');
    
endif;