<?php
function rambo_theme_slider_section( $wp_customize ) {

$selective_refresh = isset( $wp_customize->selective_refresh ) ? true : false;	
/* Header Section */
	$wp_customize->add_section( 'slider_section_settings', array(
		'capability'     => 'edit_theme_options',
		'priority'   => 514,
		'panel'  => 'section_settings',
		'title'      => esc_html__('Slider settings', 'webriti-companion'),
	) );

			//Hide slider
			
			$wp_customize->add_setting(
			'rambo_pro_theme_options[home_banner_enabled]',
			array(
				'default' => true,
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'rambo_slider_checkbox',
				'type' => 'option',
			)	
			);
			$wp_customize->add_control(
			'rambo_pro_theme_options[home_banner_enabled]',
			array(
				'label' => esc_html__('Enable home slider','webriti-companion'),
				'section' => 'slider_section_settings',
				'type' => 'checkbox',
				'description' => esc_html__('Enable slider on front page.','webriti-companion'),
			));
			
	$current_options = wp_parse_args(  get_option( 'rambo_pro_theme_options', array() ), rambo_theme_data_setup() );
	
	$current_options = get_option( 'rambo_pro_theme_options');
	$ImagePath = get_the_post_thumbnail_url(isset($current_options['slider_post']));
	 
	$slider_post = isset($current_options['slider_post'])? $ImagePath : WC__PLUGIN_URL.'/inc/rambo/img/slider.jpg';
		
		
		
		//Slider Setting
		$wp_customize->add_setting( 'rambo_pro_theme_options[slider_post]',array('default' => WC__PLUGIN_URL.'/inc/rambo/img/slider.jpg','sanitize_callback' => 'esc_url_raw','type' => 'option',
		));
 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'rambo_pro_theme_options[slider_post]',
				array(
					'type'        => 'upload',
					'label' => esc_html__('Image','webriti-companion'),
					'section' => 'slider_section_settings',
					'settings' =>'rambo_pro_theme_options[slider_post]',
					
				)
			)
		);
		
		$slider_title = isset($current_options['slider_title'])?   get_the_title($current_options['slider_title']) : esc_html__('Sit Voluptatem Accusantium','webriti-companion');
		
		//Slider Title
		$wp_customize->add_setting(
		'rambo_pro_theme_options[slider_title]', array(
			'default'        => $slider_title,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_input_field_sanitize_text',
			'transport' => $selective_refresh ? 'postMessage' : 'refresh',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[slider_title]', array(
			'label'   => esc_html__('Title', 'webriti-companion'),
			'section' => 'slider_section_settings',
			'type' => 'text',
		));
		
		$slider_text = isset($current_options['slider_text'])?   get_post_field('post_content', $current_options['slider_text']) : esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','webriti-companion');
		
		//Slider sub title
		$wp_customize->add_setting(
		'rambo_pro_theme_options[slider_text]', 
			array(
			'default'        => $slider_text,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_input_field_sanitize_text',
			'transport' => $selective_refresh ? 'postMessage' : 'refresh',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[slider_text]', array(
			'label'   => esc_html__('Description', 'webriti-companion'),
			'section' => 'slider_section_settings',
			'type' => 'textarea',
		));
		
		
		
		//Slider read more button
		$wp_customize->add_setting(
		'rambo_pro_theme_options[slider_readmore_text]', 
			array(
			'default'        => esc_html__('Sed ut','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[slider_readmore_text]', array(
			'label'   => esc_html__('Button Text', 'webriti-companion'),
			'section' => 'slider_section_settings',
			'type' => 'text',
		));
		
		
		//Slider read more button link
		$wp_customize->add_setting(
		'rambo_pro_theme_options[readmore_text_link]', 
			array(
			'default'        => __('#','webriti-companion'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[readmore_text_link]', array(
			'label'   => esc_html__('Button Link', 'webriti-companion'),
			'section' => 'slider_section_settings',
			'type' => 'text',
		));
		
		
		//Slider read more button target
		$wp_customize->add_setting(
		'rambo_pro_theme_options[readmore_target]', 
			array(
			'default'        => false,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_slider_checkbox',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[readmore_target]', array(
			'label'   => esc_html__('Open link in new tab', 'webriti-companion'),
			'section' => 'slider_section_settings',
			'type' => 'checkbox',
		));
	
		
		function rambo_input_field_sanitize_text( $input ) 
		{
		return wp_kses_post( force_balance_tags( $input ) );
		}

}
	add_action( 'customize_register', 'rambo_theme_slider_section' );

/**
 * Add selective refresh for service title section controls.
 */
function rambo_register_slider_section_partials( $wp_customize ){
	
	$wp_customize->selective_refresh->add_partial( 'rambo_pro_theme_options[slider_title]', array(
		'selector'            => '.main_slider .slider_con h2',
		'settings'            => 'rambo_pro_theme_options[slider_title]',
	
	) );
	
		$wp_customize->selective_refresh->add_partial( 'rambo_pro_theme_options[slider_text]', array(
		'selector'            => '.main_slider .slider_con h5',
		'settings'            => 'rambo_pro_theme_options[slider_text]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'rambo_pro_theme_options[slider_readmore_text]', array(
		'selector'            => '.main_slider .slider_con a',
		'settings'            => 'rambo_pro_theme_options[slider_readmore_text]',
	
	) );
	
	
}
add_action( 'customize_register', 'rambo_register_slider_section_partials' );	

function rambo_slider_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}