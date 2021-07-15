<?php

function quality_funfact_customizer( $wp_customize ) {
 
	$wp_customize->add_section( 'funfact_section_head' , array(
		'title'      =>  esc_html__('Funfact settings','webriti-companion'),
		//'panel'  => 'quality_funfact_options',
		'panel'  => 'quality_homepage_section_setting',
		'priority'   => 3,
   	) );
	
	// Show Funfact on Home page
		$wp_customize->add_setting( 'funfact_enable', array(
			'default' => true,
			'sanitize_callback' => 'quality_sanitize_checkbox',
		) );
		
		$wp_customize->add_control('funfact_enable', array(
			'label'    => esc_html__('Enable Funfact on homepage.', 'webriti-companion' ),
			'section'  => 'funfact_section_head',
			'type' => 'checkbox',
		) );
	
	//Funfact Background Image
			$wp_customize->add_setting( 'funfact_background', array(
			  'sanitize_callback' => 'esc_url_raw',
			  'default' => WC__PLUGIN_URL .'/inc/quality/images/funfact-bg.jpg',
			) );
			
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'funfact_background', array(
			  'label'    => esc_html__( 'Background Image', 'webriti-companion' ),
			  'section'  => 'funfact_section_head',
			  'settings' => 'funfact_background',
			) ) );
			
		// Funfact Image overlay
		$wp_customize->add_setting( 'funfact_image_overlay', array(
			'default' => true,
			'sanitize_callback' => 'quality_sanitize_checkbox',
		) );
		
		$wp_customize->add_control('funfact_image_overlay', array(
			'label'    => esc_html__('Enable funfact image overlay', 'webriti-companion' ),
			'section'  => 'funfact_section_head',
			'type' => 'checkbox',
		) );
		
		
		if(class_exists('Webriti_Customize_Alpha_Color_Control'))
		{
		//Funfact Background Overlay Color
		$wp_customize->add_setting( 'funfact_overlay_section_color', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'rgba(0,0,0,0.85)',
            ) );	
            
            $wp_customize->add_control(new Webriti_Customize_Alpha_Color_Control( $wp_customize,'funfact_overlay_section_color', array(
               'label'      => esc_html__('Funfact image overlay color','webriti-companion' ),
                'palette' => true,
                'section' => 'funfact_section_head')
            ) );
		}
	
	
	
	if ( class_exists( 'Webriti_Companion_Repeater' ) ) {
			$wp_customize->add_setting( 'quality_funfact_content', array(
                            'sanitize_callback' => 'webriti_companion_repeater_sanitize',
			) );

			$wp_customize->add_control( new Webriti_Companion_Repeater( $wp_customize, 'quality_funfact_content', array(
				'label'                             => esc_html__( 'Funfact content', 'webriti-companion' ),
				'section'                           => 'funfact_section_head',
				'priority'                          => 220,
				'add_field_label'                   => esc_html__( 'Add new funfact', 'webriti-companion' ),
				'item_name'                         => esc_html__( 'Funfact', 'webriti-companion' ),
				'customizer_repeater_icon_control'  => true,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				) ) );
		}		
	
}
add_action( 'customize_register', 'quality_funfact_customizer' );


/**
 * Add selective refresh for Front page section section controls.
 */
function quality_register_funfact_section_partials( $wp_customize ){

$wp_customize->selective_refresh->add_partial( 'quality_funfact_content', array(
		'selector'            => '.funfact .container',
		'settings'            => 'quality_funfact_content',
	
	) );	
	
}

add_action( 'customize_register', 'quality_register_funfact_section_partials' );

// Quality default funfact content data
if ( ! function_exists( 'quality_funfact_default_customize_register' ) ) :
	function quality_funfact_default_customize_register( $wp_customize ){
		
	$quality_funfact_content_control = $wp_customize->get_setting( 'quality_funfact_content' );
				if ( ! empty( $quality_funfact_content_control ) ) {
					$quality_funfact_content_control->default = json_encode( array(
						array(
						'icon_value' => 'fa fa-smile-o funfact-icon',
						'title'      => esc_html__( '2500', 'webriti-companion' ),
						'text'       => esc_html__('Vestibulum gravida','webriti-companion'),
						'id'         => 'customizer_repeater_56d7ea7f40b56',
						'color'      => '#e91e63',
						),
						array(
						'icon_value' => 'fa fa-handshake-o funfact-icon',
						'title'      => esc_html__( '550', 'webriti-companion' ),
						'text'       => esc_html__('Malesuada Fames', 'webriti-companion'),
						'color'      => '#00bcd4',
						),
						array(
						'icon_value' => 'fa fa-line-chart funfact-icon',
						'title'      => esc_html__( '90%', 'webriti-companion' ),
						'text'       => esc_html__('Vitae Convallis', 'webriti-companion'),
						'id'         => 'customizer_repeater_56d7ea7f40b86',
						'color'      => '#4caf50',
						),
						
						array(
						'icon_value' => 'fa fa-coffee funfact-icon',
						'title'      => esc_html__( '1350', 'webriti-companion' ),
						'text'       => esc_html__('Vestibulum vitae Tellus','webriti-companion'),
						'id'         => 'customizer_repeater_56d7ea7f40b87',
						'color'      => '#4caf50',
						),
						
					) );

				}	
		
		

	
}		
add_action( 'customize_register', 'quality_funfact_default_customize_register' );
endif;