<?php
$Repeater_path = trailingslashit( WC__PLUGIN_DIR ) . '/inc/controls/customizer-repeater/functions.php';
if ( file_exists($Repeater_path ) ) {
require_once( $Repeater_path );
}
if ( ! function_exists( 'spasalon_service_customize_register' ) ) :

function spasalon_service_customize_register($wp_customize){
	
$wp_customize->add_section( 'service_settings' , 
	array(
			'title'      => esc_html__('Service Settings', 'webriti-companion'),
			'panel'  => 'section_settings',
			'priority'       => 2,
		)
	);
		
			// service hide
			$wp_customize->add_setting( 'spa_theme_options[service_hide]' ,
			array(
				'default' => true,
				'sanitize_callback' => 'spasalon_sanitize_checkbox',
				'type'=>'option'
				)
			);
			$wp_customize->add_control('spa_theme_options[service_hide]' ,
			array(
				'label'          => esc_html__('Enable Home service section', 'webriti-companion' ),
				'section'        => 'service_settings',
				'type'           => 'checkbox'
				)
			);
			
		
		
			// service title
			$wp_customize->add_setting( 'spa_theme_options[tagline_title]' ,
			array(
				'default' => esc_html__('Morbi finibus luctus lacus','webriti-companion'),
				'sanitize_callback' => 'sanitize_text_field',
				'type'=>'option'
				)
			);
			$wp_customize->add_control('spa_theme_options[tagline_title]' ,
			array(
				'label'          => esc_html__('Title', 'webriti-companion' ),
				'section'        => 'service_settings',
				'type'           => 'text'
				)
			);
			
			// service desc
			$wp_customize->add_setting( 'spa_theme_options[tagline_contents]' ,
			array(
				'default' => esc_html__('In commodo pulvinar metus, id tristique massa ultrices at. Nulla auctor turpis ut mi pulvinar eu accumsan risus sagittis. Mauris nunc ligula, ullamcorper vitae accumsan eu,congue in nulla. Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.','webriti-companion'),
				'sanitize_callback' => 'sanitize_textarea_field',
				'type'=>'option',
				) 
			);
			$wp_customize->add_control('spa_theme_options[tagline_contents]' ,
			array(
				'label'          => esc_html__('Description', 'webriti-companion' ),
				'section'        => 'service_settings',
				'type'           => 'textarea'
				)
			);
			
			if ( class_exists( 'Webriti_Companion_Repeater' ) ) {
			$wp_customize->add_setting( 'spa_theme_options[spasalon_service_content]',
			array(
				'type'=> 'option',
				'sanitize_callback' => 'webriti_companion_repeater_sanitize',
				)
			);

			$wp_customize->add_control( new Webriti_Companion_Repeater( $wp_customize, 'spa_theme_options[spasalon_service_content]',
			array(
				'label'                             => esc_html__( 'Service content', 'webriti-companion' ),
				'section'                           => 'service_settings',
				'add_field_label'                   => esc_html__( 'Add new service', 'webriti-companion' ),
				'item_name'                         => esc_html__( 'Service', 'webriti-companion' ),
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_icon_control'  => true,
				'customizer_repeater_image_control'  => true,
				'customizer_repeater_color_control'  => true,
				'customizer_repeater_checkbox_control' => true,
				) 
		));
		}
	
	
}
add_action( 'customize_register', 'spasalon_service_customize_register' );

/**
 * Add selective refresh for Front page section section controls.
 */
function spasalon_register_service_section_partials( $wp_customize ){

$wp_customize->selective_refresh->add_partial( 'spa_theme_options[tagline_title]', array(
		'selector'            => '.service .section-header h1',
		'settings'            => 'spa_theme_options[tagline_title]',
	
	) );

$wp_customize->selective_refresh->add_partial( 'spa_theme_options[tagline_contents]', array(
		'selector'            => '.service .section-subtitle',
		'settings'            => 'spa_theme_options[tagline_contents]',
	
	) );
	
$wp_customize->selective_refresh->add_partial( 'spa_theme_options[spasalon_service_content]', array(
		'selector'            => '.service #service_content_section',
		'settings'            => 'spa_theme_options[spasalon_service_content]',
	
	) );
	
	
}

add_action( 'customize_register', 'spasalon_register_service_section_partials' );

endif;