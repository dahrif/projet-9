<?php
function webriti_companion_dreamspa_slider_customizer( $wp_customize ) {

//Home slider Section
	
	$wp_customize->add_section(
        'slider_section_settings',
        array(
            'title' => __('Slider settings','webriti-companion'),
			'panel'  => 'section_settings',
			'priority'       => 1,
			)
    );
	

	//Show and hide slider section
	$wp_customize->add_setting(
	'spa_theme_options[home_slider_enabled]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'spa_theme_options[home_slider_enabled]',
    array(
        'label' => __('Enable Home slider section','webriti-companion'),
        'section' => 'slider_section_settings',
        'type' => 'checkbox',
    )
	);
	
	$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), dream_spa_default_data() );
	
	$current_options = get_option( 'spa_theme_options');
	//$ImagePath = get_the_post_thumbnail_url($current_options['dreamspa_slider_post']);
	 
	$dreamspa_slider_post = isset($current_options['dreamspa_slider_post'])? get_the_post_thumbnail_url($current_options['dreamspa_slider_post']) : WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_banner.jpg';
	 
	//slider image
	$wp_customize->add_setting( 'spa_theme_options[dreamspa_slider_post]',array('default' => $dreamspa_slider_post,
	'type' => 'option', 'sanitize_callback' => 'esc_url_raw'));
 
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'spa_theme_options[dreamspa_slider_post]',
			array(
				'label' => __('Slider Image','spasalon'),
				'settings' =>'spa_theme_options[dreamspa_slider_post]',
				'section' => 'slider_section_settings',
				'type' => 'upload',
			)
		)
	);
	
	$slider_title = isset($current_options['dreamspa_slider_post'])?   get_the_title($current_options['dreamspa_slider_post']) : 'The Essence of Natural Beauty';
		
	
	$slider_desc = isset($current_options['dreamspa_slider_post'])?   get_post_field('post_content', $current_options['dreamspa_slider_post']) : 'We at Dream Spa provide services to the natural of the clients !';
	
	
	// //Banner Title
	$wp_customize->add_setting(
    'spa_theme_options[slider_title]',
    array(
        'default' => $slider_title,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control('spa_theme_options[slider_title]',array(
    'label'   => __('Slider title','webriti-companion'),
    'section' => 'slider_section_settings',
	 'type' => 'text',)  );	
	 
	 
	 // //Banner Description
	$wp_customize->add_setting(
    'spa_theme_options[slider_desc]',
    array(
        'default' => $slider_desc,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control('spa_theme_options[slider_desc]',array(
    'label'   => __('Slider description','webriti-companion'),
    'section' => 'slider_section_settings',
	 'type' => 'text',)  );	
	
	
	// slider caption align
			$wp_customize->add_setting( 'spa_theme_options[slider_caption_align]' , array(
			'default' => 'left',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[slider_caption_align]' , array(
			'label'          => __( 'Slider caption alignment', 'dream-spa' ),
			'section'        => 'slider_section_settings',
			'type'           => 'select',
			'choices'        => array(
				'left' => 'left',
				'right' => 'right',
				'center' => 'center',
			) ) );
			
			
			// slider caption color
			$wp_customize->add_setting( 'spa_theme_options[slider_caption_title_color]' , array(
			'default'     => '#fff',
				'type'=>'option',
				'sanitize_callback' => 'sanitize_text_field',
				)
			);
 
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'spa_theme_options[slider_caption_title_color]',
					array(
						'label'      => __('Slider caption title color', 'dream-spa' ),
						'section'    => 'slider_section_settings',
						'settings'   => 'spa_theme_options[slider_caption_title_color]'
					)
				)
			);
			
			
			$wp_customize->add_setting( 'spa_theme_options[slider_caption_overlay_color]' , array(
			'default'     => '#fff',
				'type'=>'option',
				'sanitize_callback' => 'sanitize_text_field',
				)
			);
 
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'spa_theme_options[slider_caption_overlay_color]',
					array(
						'label'      => __('Slider caption description color', 'dream-spa' ),
						'section'    => 'slider_section_settings',
						'settings'   => 'spa_theme_options[slider_caption_overlay_color]'
					)
				)
			);
	
}		
	add_action( 'customize_register', 'webriti_companion_dreamspa_slider_customizer' );
	
	/**
 * Add selective refresh for Front page project section controls.
 */
function dreamspa_register_slider_section_partials( $wp_customize ){

/* Slider banner*/	
$wp_customize->selective_refresh->add_partial( 'spa_theme_options[slider_desc]', array(
		'selector'            => '.txt p',
		'settings'            => 'spa_theme_options[slider_desc]',
	
	) );


/* Slider Title*/
$wp_customize->selective_refresh->add_partial( 'spa_theme_options[slider_title]', array(
		'selector'            => '.caption-overlay h1',
		'settings'            => 'spa_theme_options[slider_title]',
	
	) );
	
/* Slider description*/	
$wp_customize->selective_refresh->add_partial( 'spa_theme_options[dreamspa_slider_post]', array(
		'selector'            => '.slide-img',
		'settings'            => 'spa_theme_options[dreamspa_slider_post]',
	
	) );	

}

add_action( 'customize_register', 'dreamspa_register_slider_section_partials' );