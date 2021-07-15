<?php
function appointment_typography_customizer( $wp_customize ) {
		$wp_customize->add_panel( 'appointment_typography_setting', array(
				'priority'    => 650,
				'capability'  => 'edit_theme_options',
				'title'       => esc_html__('Typography settings','appointment')
		) );

		$font_size = array();
		for($i=9; $i<=100; $i++) {
			$font_size[$i] = $i;
		}
		$line_height = array();
		for($i=1; $i<=100; $i++) {
		    $line_height[$i] = $i;
		}

		$font_family = appointment_typo_fonts();

		// Header typography section
		$wp_customize->add_section( 'appointment_header_typography' , array(
				'title'    => esc_html__('Header', 'appointment'),
				'panel'    => 'appointment_typography_setting',
				'priority' => 1
   	) );

		// Enable/Disable Header typography section
		$wp_customize->add_setting(
    		'enable_header_typography',
		    array(
		        'default'           =>  false,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'appointment_sanitize_checkbox'
	    	)
		);
		$wp_customize->add_control('enable_header_typography', array(
				'label'   => esc_html__('Enable Header typography','appointment'),
		    'section' => 'appointment_header_typography',
				'setting' => 'enable_header_typography',
				'type'    =>  'checkbox'
		));
		class WP_Sitetitle_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    /* Render the control's content. */
		    public function render_content() {
		    ?>
		 				<h3><?php esc_html_e('Site Title','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
    		'site_title',
		    array(
		        'capability'     => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Sitetitle_Customize_Control( $wp_customize, 'site_title', array(
				'section' => 'appointment_header_typography',
				'setting' => 'site_title'
    )));
		$wp_customize->add_setting(
    		'site_title_fontfamily',
		    array(
				    'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('site_title_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
		    'section' => 'appointment_header_typography',
				'setting' => 'site_title_fontfamily',
				'type'    =>  'select',
				'choices' =>  $font_family
		));
		$wp_customize->add_setting(
		    'site_title_fontsize',
		    array(
			      'default'           =>  32,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('site_title_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_header_typography',
				'setting' => 'site_title_fontsize',
				'type'    => 'select',
				'choices' => $font_size
		));
		$wp_customize->add_setting(
    'site_title_line_height',
		    array(
		        'default'           =>  25,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field',
		    )
		);
		$wp_customize->add_control('site_title_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_header_typography',
		    'setting' => 'site_title_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));
		class WP_Tagline_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    /* Render the control's content. */
		    public function render_content() {
		    ?>
		 				<h3><?php esc_html_e('Tagline','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
    		'tagline_title',
		    array(
		        'capability'        => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Tagline_Customize_Control( $wp_customize, 'tagline_title', array(
				'section' => 'appointment_header_typography',
				'setting' => 'tagline_title'
    )));
		$wp_customize->add_setting(
    		'tagline_title_fontfamily',
		    array(
				    'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('tagline_title_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
		    'section' => 'appointment_header_typography',
				'setting' => 'tagline_title_fontfamily',
				'type'    =>  'select',
				'choices' =>  $font_family
		));
		$wp_customize->add_setting(
		    'tagline_title_fontsize',
		    array(
			      'default'           =>  15,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('tagline_title_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_header_typography',
				'setting' => 'tagline_title_fontsize',
				'type'    => 'select',
				'choices' => $font_size
		));
		$wp_customize->add_setting(
    'tagline_line_height',
		    array(
		        'default'           =>  25,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field',
		    )
		);
		$wp_customize->add_control('tagline_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_header_typography',
		    'setting' => 'tagline_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));

		class WP_Menus_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    /* Render the control's content. */
		    public function render_content() {
		    ?>
			 			<h3><?php esc_html_e('Menus','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'menus_title',
		    array(
		        'capability'        => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Menus_Customize_Control( $wp_customize, 'menus_title', array(
				'section' => 'appointment_header_typography',
				'setting' => 'menus_title'
		)));
		$wp_customize->add_setting(
		    'menu_title_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('menu_title_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
        'section' => 'appointment_header_typography',
				'setting' => 'menu_title_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'menu_title_fontsize',
		    array(
		        'default'           =>  14,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('menu_title_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_header_typography',
				'setting' => 'menu_title_fontsize',
				'type'    => 'select',
				'choices' => $font_size
		));
		$wp_customize->add_setting(
    'menu_line_height',
		    array(
		        'default'           =>  25,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('menu_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_header_typography',
		    'setting' => 'menu_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));
		class WP_SubMenus_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    /* Render the control's content. */
		    public function render_content() {
		    ?>
			 			<h3><?php esc_html_e('Submenus','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'submenus_title',
		    array(
		        'capability'     => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_SubMenus_Customize_Control( $wp_customize, 'submenus_title', array(
				'section' => 'appointment_header_typography',
				'setting' => 'submenus_title'
		)));
		$wp_customize->add_setting(
		    'submenu_title_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('submenu_title_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
        'section' => 'appointment_header_typography',
				'setting' => 'submenu_title_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'submenu_title_fontsize',
		    array(
		        'default'           =>  14,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('submenu_title_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_header_typography',
				'setting' => 'submenu_title_fontsize',
				'type'    => 'select',
				'choices' => $font_size
		));
		$wp_customize->add_setting(
    		'submenu_line_height',
		    array(
		        'default'           =>  25,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('submenu_line_height', array(
        'label'   => esc_html__('Line height (px)','appointment'),
        'section' => 'appointment_header_typography',
        'setting' => 'submenu_line_height',
        'type'    => 'select',
        'choices' => $line_height
		));


		// Banner typography section
		$wp_customize->add_section( 'appointment_banner_typography' , array(
				'title'     => esc_html__('Banner / Breadcrumb', 'appointment'),
				'panel' 		=> 'appointment_typography_setting',
				'priority'  => 2
   	) );
		$wp_customize->add_setting(
		    'enable_banner_typography',
		    array(
		        'default'           =>  false,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'appointment_sanitize_checkbox'
	    	)
		);
		$wp_customize->add_control('enable_banner_typography', array(
				'label' 	=> esc_html__('Enable Banner typography','appointment'),
		    'section' => 'appointment_banner_typography',
				'setting' => 'enable_banner_typography',
				'type'    =>  'checkbox'
		));
		class WP_Banner_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
			 			<h3><?php esc_html_e('Page Title','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'banner_title',
		    array(
		        'capability'     => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Banner_Customize_Control( $wp_customize, 'banner_title', array(
				'section' => 'appointment_banner_typography',
				'setting' => 'banner_title'
		)));
		$wp_customize->add_setting(
		    'banner_title_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		 ));
		$wp_customize->add_control('banner_title_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
        'section' => 'appointment_banner_typography',
				'setting' => 'banner_title_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'banner_title_fontsize',
		    array(
		        'default'           =>  36,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('banner_title_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_banner_typography',
				'setting' => 'banner_title_fontsize',
				'type'    => 'select',
				'choices' => $font_size
    ));
		$wp_customize->add_setting(
		    'banner_line_height',
		    array(
		        'default'           =>  25,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field',
		    )
		);
		$wp_customize->add_control('banner_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_banner_typography',
		    'setting' => 'banner_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));
		class WP_Breadcrumb_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
		 				<h3><?php esc_html_e('Breadcrumb Title','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'breadcrumb_title',
		    array(
		        'capability'     => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Breadcrumb_Customize_Control( $wp_customize, 'breadcrumb_title', array(
				'section' => 'appointment_banner_typography',
				'setting' => 'breadcrumb_title'
		)));
		$wp_customize->add_setting(
		    'breadcrumb_title_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('breadcrumb_title_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
		    'section' => 'appointment_banner_typography',
				'setting' => 'breadcrumb_title_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'breadcrumb_title_fontsize',
		    array(
		        'default'           =>  15,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('breadcrumb_title_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_banner_typography',
				'setting' => 'breadcrumb_title_fontsize',
				'type'    => 'select',
				'choices' => $font_size
    ));
		$wp_customize->add_setting(
		    'breadcrumb_line_height',
		    array(
		        'default'           =>  25,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('breadcrumb_line_height', array(
		    'label'   => esc_html__('Line height  (px)','appointment'),
		    'section' => 'appointment_banner_typography',
		    'setting' => 'breadcrumb_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));


		// Slider typography section
		$wp_customize->add_section( 'appointment_slider_typography' , array(
				'title'    => esc_html__('Slider', 'appointment'),
				'panel'    => 'appointment_typography_setting',
				'priority' => 3
   	) );
		$wp_customize->add_setting(
		    'enable_slider_typography',
		    array(
		        'default'           =>  false,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'appointment_sanitize_checkbox'
    ) );
		$wp_customize->add_control('enable_slider_typography', array(
				'label' => esc_html__('Enable Slider typography','appointment'),
		    'section' => 'appointment_slider_typography',
				'setting' => 'enable_slider_typography',
				'type'    =>  'checkbox'
		));
		class WP_Slider_Title_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
			 			<h3><?php esc_html_e('Title','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'slider_title',
		    array(
		        'capability'     => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Slider_Title_Customize_Control( $wp_customize, 'slider_title', array(
				'section' => 'appointment_slider_typography',
				'setting' => 'slider_title'
		    ))
		);
		$wp_customize->add_setting(
		    'slider_title_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		));
		$wp_customize->add_control('slider_title_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
		    'section' => 'appointment_slider_typography',
				'setting' => 'slider_title_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'slider_title_fontsize',
		    array(
		        'default'           =>  30,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('slider_title_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
		    'section' => 'appointment_slider_typography',
				'setting' => 'slider_title_fontsize',
				'type'    => 'select',
				'choices' => $font_size
    ));
		$wp_customize->add_setting(
		    'slider_line_height',
		    array(
		        'default'           =>  40,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('slider_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_slider_typography',
		    'setting' => 'slider_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));



		// Homepage section typography
		$wp_customize->add_section( 'appointment_homepage_typography' , array(
				'title'      => esc_html__('Homepage Section', 'appointment'),
				'panel'      => 'appointment_typography_setting',
				'priority'   => 4
   	) );

		$wp_customize->add_setting(
		    'enable_homepage_typography',
		    array(
		        'default'           =>  false,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'appointment_sanitize_checkbox'
  	) );
		$wp_customize->add_control('enable_homepage_typography', array(
					'label'   => esc_html__('Enable homepage sections typography','appointment'),
	        'section' => 'appointment_homepage_typography',
					'setting' => 'enable_homepage_typography',
					'type'    =>  'checkbox'
		));
		class WP_Homepage_Title_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
			  		<h3><?php esc_html_e('Section Title','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'homepage_title',
		    array(
		        'capability'     => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Homepage_Title_Customize_Control( $wp_customize, 'homepage_title', array(
				'section' => 'appointment_homepage_typography',
				'setting' => 'homepage_title'
		    ))
		);
		$wp_customize->add_setting(
		    'homepage_title_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		));
		$wp_customize->add_control('homepage_title_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
		    'section' => 'appointment_homepage_typography',
				'setting' => 'homepage_title_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'homepage_title_fontsize',
		    array(
		        'default'           =>  36,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('homepage_title_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_homepage_typography',
				'setting' => 'homepage_title_fontsize',
				'type'    => 'select',
				'choices' => $font_size
    ));
		$wp_customize->add_setting(
		    'homepage_title_line_height',
		    array(
		        'default'           =>  40,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('homepage_title_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_homepage_typography',
		    'setting' => 'homepage_title_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));
		class WP_Homepage_Description_Customize_Control extends WP_Customize_Control {
	    public $type = 'new_menu';
	    public function render_content() {
	    ?>
		 			<h3><?php esc_html_e('Section Description','appointment'); ?></h3>
	    <?php
	    }
		}
		$wp_customize->add_setting(
		    'homepage_description',
		    array(
		        'capability'     => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Homepage_Description_Customize_Control( $wp_customize, 'homepage_description', array(
				'section' => 'appointment_homepage_typography',
				'setting' => 'homepage_description'
		    ))
		);
		$wp_customize->add_setting(
		    'homepage_description_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		 ));
		$wp_customize->add_control('homepage_description_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
		    'section' => 'appointment_homepage_typography',
				'setting' => 'homepage_description_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'homepage_description_fontsize',
		    array(
		        'default'           =>  15,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('homepage_description_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_homepage_typography',
				'setting' => 'homepage_description_fontsize',
				'type'    => 'select',
				'choices' => $font_size
    ));
		$wp_customize->add_setting(
		    'homepage_description_line_height',
		    array(
		        'default'           =>  25,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('homepage_description_line_height', array(
			  'label'   => esc_html__('Line height (px)','appointment'),
			  'section' => 'appointment_homepage_typography',
			  'setting' => 'homepage_description_line_height',
			  'type'    => 'select',
			  'choices' => $line_height
		));


		// Content typography section
		$wp_customize->add_section( 'appointment_content_typography' , array(
				'title'     => esc_html__('Content','appointment'),
				'panel' 		=> 'appointment_typography_setting',
				'priority'  => 5
   	) );
		// Enable/Disable Content typography section
		$wp_customize->add_setting(
		    'enable_content_typography',
		    array(
		        'default'           =>  false,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'appointment_sanitize_checkbox'
    ));
		$wp_customize->add_control('enable_content_typography', array(
				'label'   => esc_html__('Enable Content typography','appointment'),
		    'section' => 'appointment_content_typography',
				'setting' => 'enable_content_typography',
				'type'    =>  'checkbox'
		));
		// h1 typography settings
		class WP_Content_H1_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	 <h3><?php esc_html_e('Heading 1 (H1)','appointment'); ?></h3>
    <?php
    }
}
		$wp_customize->add_setting(
		    'content_h1',
		    array(
		        'capability'        => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Content_H1_Customize_Control( $wp_customize, 'content_h1', array(
				'section' => 'appointment_content_typography',
				'setting' => 'content_h1'
		    ))
		);
		$wp_customize->add_setting(
		    'h1_typography_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h1_typography_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
		    'section' => 'appointment_content_typography',
				'setting' => 'h1_typography_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'h1_typography_fontsize',
		    array(
		        'default'           =>  36,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h1_typography_fontsize', array(
				'label' => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_content_typography',
				'setting' => 'h1_typography_fontsize',
				'type'    =>  'select',
				'choices'=>$font_size,
    ));
		$wp_customize->add_setting(
		    'h1_line_height',
		    array(
		        'default'           =>  40,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field',
		    )
		);
		$wp_customize->add_control('h1_line_height', array(
			    'label'   => esc_html__('Line height (px)','appointment'),
			    'section' => 'appointment_content_typography',
			    'setting' => 'h1_line_height',
			    'type'    => 'select',
			    'choices' => $line_height
		));
		// h2 typography settings
		class WP_Content_H2_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    /* Render the control's content */
		    public function render_content() {
		    ?>
			  		<h3><?php esc_html_e('Heading 2 (H2)','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'content_h2',
		    array(
		        'capability'        => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Content_H2_Customize_Control( $wp_customize, 'content_h2', array(
				'section' => 'appointment_content_typography',
				'setting' => 'content_h2'
		    ))
		);
		$wp_customize->add_setting(
		    'h2_typography_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h2_typography_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
		    'section' => 'appointment_content_typography',
				'setting' => 'h2_typography_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'h2_typography_fontsize',
		    array(
		        'default'           =>  30,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h2_typography_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
		    'section' => 'appointment_content_typography',
				'setting' => 'h2_typography_fontsize',
				'type'    => 'select',
				'choices' => $font_size
    ));
		$wp_customize->add_setting(
		    'h2_line_height',
		    array(
		        'default'           =>  35,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h2_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_content_typography',
		    'setting' => 'h2_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));
		// h3 typography settings
		class WP_Content_H3_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    /* Render the control's content*/
		    public function render_content() {
		    ?>
			  		<h3><?php esc_html_e('Heading 3 (H3)','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'content_h3',
		    array(
		        'capability'        => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Content_H3_Customize_Control( $wp_customize, 'content_h3', array(
				'section' => 'appointment_content_typography',
				'setting' => 'content_h3'
		    ))
		);
		$wp_customize->add_setting(
		    'h3_typography_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h3_typography_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
        'section' => 'appointment_content_typography',
				'setting' => 'h3_typography_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'h3_typography_fontsize',
		    array(
		        'default'           =>  24,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h3_typography_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_content_typography',
				'setting' => 'h3_typography_fontsize',
				'type'    => 'select',
				'choices' => $font_size
    ));
		$wp_customize->add_setting(
		    'h3_line_height',
		    array(
		        'default'           =>  30,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h3_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_content_typography',
		    'setting' => 'h3_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));
		// h4 typography settings
		class WP_Content_H4_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
		 				<h3><?php esc_html_e('Heading 4 (H4)','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'content_h4',
		    array(
		        'capability'        => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Content_H4_Customize_Control( $wp_customize, 'content_h4', array(
				'section' => 'appointment_content_typography',
				'setting' => 'content_h4'
		    ))
		);
		$wp_customize->add_setting(
		    'h4_typography_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h4_typography_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
		    'section' => 'appointment_content_typography',
				'setting' => 'h4_typography_fontfamily',
				'type'    =>  'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'h4_typography_fontsize',
		    array(
				    'default'           =>  20,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h4_typography_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_content_typography',
				'setting' => 'h4_typography_fontsize',
				'type'    => 'select',
				'choices' => $font_size
    ));
		$wp_customize->add_setting(
		    'h4_line_height',
		    array(
		        'default'           =>  25,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h4_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_content_typography',
		    'setting' => 'h4_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));
		// h5 typography settings
		class WP_Content_H5_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
			    <h3><?php esc_html_e('Heading 5 (H5)','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'content_h5',
		    array(
		        'capability'     => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Content_H5_Customize_Control( $wp_customize, 'content_h5', array(
				'section' => 'appointment_content_typography',
				'setting' => 'content_h5'
		    ))
		);
		$wp_customize->add_setting(
		    'h5_typography_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h5_typography_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
		    'section' => 'appointment_content_typography',
				'setting' => 'h5_typography_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'h5_typography_fontsize',
		    array(
		        'default'           =>  16,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
				    )
		);
		$wp_customize->add_control('h5_typography_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_content_typography',
				'setting' => 'h5_typography_fontsize',
				'type'    => 'select',
				'choices' => $font_size
		));
		$wp_customize->add_setting(
		    'h5_line_height',
		    array(
		        'default'           =>  20,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h5_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_content_typography',
		    'setting' => 'h5_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));
		// h6 typography settings
		class WP_Content_H6_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
			  		<h3><?php esc_html_e('Heading 6 (H6)','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'content_h6',
		    array(
		        'capability'        => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Content_H6_Customize_Control( $wp_customize, 'content_h6', array(
				'section' => 'appointment_content_typography',
				'setting' => 'content_h6'
		    ))
		);
		$wp_customize->add_setting(
		    'h6_typography_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h6_typography_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
        'section' => 'appointment_content_typography',
				'setting' => 'h6_typography_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'h6_typography_fontsize',
		    array(
		        'default'           =>  14,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h6_typography_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
		    'section' => 'appointment_content_typography',
				'setting' => 'h6_typography_fontsize',
				'type'    => 'select',
				'choices' => $font_size
    ));
		$wp_customize->add_setting(
		    'h6_line_height',
		    array(
		        'default'           =>  20,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('h6_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_content_typography',
		    'setting' => 'h6_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));
		// Paragraph typography settings
		class WP_Content_p_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
		 				<h3><?php esc_html_e('Paragraph','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'content_p',
		    array(
		        'capability'     => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Content_p_Customize_Control( $wp_customize, 'content_p', array(
				'section' => 'appointment_content_typography',
				'setting' => 'content_p'
		    ))
		);
		$wp_customize->add_setting(
		    'p_typography_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('p_typography_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
        'section' => 'appointment_content_typography',
				'setting' => 'p_typography_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'p_typography_fontsize',
		    array(
		        'default'           =>  15,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('p_typography_fontsize', array(
				'label' => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_content_typography',
				'setting' => 'p_typography_fontsize',
				'type'    =>  'select',
				'choices'=>$font_size,
    ));
		$wp_customize->add_setting(
		    'p_line_height',
		    array(
		        'default'           =>  25,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('p_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_content_typography',
		    'setting' => 'p_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));
		// Button text typography settings
		class WP_Content_button_text_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
		 				<h3><?php esc_html_e('Button Text','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'content_button_text',
		    array(
		        'capability'     => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Content_button_text_Customize_Control( $wp_customize, 'content_button_text', array(
				'section' => 'appointment_content_typography',
				'setting' => 'content_button_text'
		    ))
		);
		$wp_customize->add_setting(
		    'button_text_typography_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('button_text_typography_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
        'section' => 'appointment_content_typography',
				'setting' => 'button_text_typography_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'button_text_typography_fontsize',
		    array(
		        'default'           =>  16,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('button_text_typography_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_content_typography',
				'setting' => 'button_text_typography_fontsize',
				'type'    => 'select',
				'choices' => $font_size
    ));
		$wp_customize->add_setting(
		    'button_line_height',
		    array(
		        'default'           =>  25,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('button_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_content_typography',
		    'setting' => 'button_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));


		// Blog Page/Archive/Single Post typography
		$wp_customize->add_section( 'appointment_post_typography' , array(
				'title'      => esc_html__('Blog / Archive / Single Post', 'appointment'),
				'panel' 		 => 'appointment_typography_setting',
				'priority'   => 6
   	) );
		// Enable/Disable Blog/Archive/Single Post typography
		$wp_customize->add_setting(
		    'enable_post_typography',
		    array(
		        'default'           =>  false,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'appointment_sanitize_checkbox'
    ));
		$wp_customize->add_control('enable_post_typography', array(
				'label'   => esc_html__('Enable Blog / Archive / Single Post typography','appointment'),
        'section' => 'appointment_post_typography',
				'setting' => 'enable_post_typography',
				'type'    =>  'checkbox'
		));
		$wp_customize->add_setting(
		    'post_title_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('post_title_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
        'section' => 'appointment_post_typography',
				'setting' => 'post_title_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'post_title_fontsize',
		    array(
		        'default'           =>  27,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('post_title_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_post_typography',
				'setting' => 'post_title_fontsize',
				'type'    => 'select',
				'choices' => $font_size
    ));
		$wp_customize->add_setting(
		    'post_title_line_height',
		    array(
		        'default'           =>  25,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('post_title_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_post_typography',
		    'setting' => 'post_title_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));


		// Sidebar typography section
		$wp_customize->add_section( 'appointment_sidebar_typography' , array(
				'title'      => esc_html__('Sidebar Widgets', 'appointment'),
				'panel' 		 => 'appointment_typography_setting',
				'priority'   => 7
   	) );
		// Enable/Disable Sidebar typography section
		$wp_customize->add_setting(
		    'enable_sidebar_typography',
		    array(
		        'default'           =>  false,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'appointment_sanitize_checkbox'
    ));
		$wp_customize->add_control('enable_sidebar_typography', array(
				'label'   => esc_html__('Enable Sidebar Widgets typography','appointment'),
      	'section' => 'appointment_sidebar_typography',
				'setting' => 'enable_sidebar_typography',
				'type'    =>  'checkbox'
		));
		class WP_Sidebar_Widget_title_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
			  		<h3><?php esc_html_e('Sidebar Widget Title','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'sidebar_widget_title',
		    array(
		        'capability'        => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Sidebar_Widget_title_Customize_Control( $wp_customize, 'sidebar_widget_title', array(
				'section' => 'appointment_sidebar_typography',
				'setting' => 'sidebar_widget_title'
		    ))
		);
		$wp_customize->add_setting(
		    'sidebar_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('sidebar_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
        'section' => 'appointment_sidebar_typography',
				'setting' => 'sidebar_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'sidebar_fontsize',
		    array(
		        'default'           =>  24,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('sidebar_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_sidebar_typography',
				'setting' => 'sidebar_fontsize',
				'type'    => 'select',
				'choices' => $font_size
    ));
		$wp_customize->add_setting(
    'sidebar_line_height',
		    array(
		        'default'           =>  25,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('sidebar_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_sidebar_typography',
		    'setting' => 'sidebar_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));
		class WP_Sidebar_Widget_content_Customize_Control extends WP_Customize_Control {
			  public $type = 'new_menu';
			  public function render_content() {
			  ?>
			 		<h3><?php esc_html_e('Sidebar Widget Content','appointment'); ?></h3>
			  <?php
			  }
		}
		$wp_customize->add_setting(
		    'sidebar_widget_content',
		    array(
		        'capability'        => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Sidebar_Widget_content_Customize_Control( $wp_customize, 'sidebar_widget_content', array(
				'section' => 'appointment_sidebar_typography',
				'setting' => 'sidebar_widget_content'
		    ))
		);
		$wp_customize->add_setting(
		    'sidebar_widget_content_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('sidebar_widget_content_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
        'section' => 'appointment_sidebar_typography',
				'setting' => 'sidebar_widget_content_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'sidebar_widget_content_fontsize',
		    array(
		        'default'           =>  15,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('sidebar_widget_content_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_sidebar_typography',
				'setting' => 'sidebar_widget_content_fontsize',
				'type'    => 'select',
				'choices' => $font_size
    ));
		$wp_customize->add_setting(
    'sidebar_widget_content_line_height',
		    array(
		        'default'           =>  25,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field',
		    )
		);
		$wp_customize->add_control('sidebar_widget_content_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_sidebar_typography',
		    'setting' => 'sidebar_widget_content_line_height',
		    'type'    => 'select',
		    'choices' => $line_height,
		));


		// Footer Widgets typography section
		$wp_customize->add_section( 'appointment_widget_typography' , array(
				'title'      => esc_html__('Footer Widgets', 'appointment'),
				'panel'      => 'appointment_typography_setting',
				'priority'   => 8
   	) );
		// Enable/Disable Footer Widgets typography section
		$wp_customize->add_setting(
		    'enable_footer_widget_typography',
		    		array(
				        'default'           =>  false,
								'capability'        =>  'edit_theme_options',
								'sanitize_callback' =>  'appointment_sanitize_checkbox'
    ) );
		$wp_customize->add_control('enable_footer_widget_typography', array(
				'label'   => esc_html__('Enable Footer Widget typography','appointment'),
        'section' => 'appointment_widget_typography',
				'setting' => 'enable_footer_widget_typography',
				'type'    =>  'checkbox'
		));
		class WP_Footer_Widget_title_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
		    		<h3><?php esc_html_e('Footer Widget Title','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'footer_widget_title',
		    array(
	        	'capability'        => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Footer_Widget_title_Customize_Control( $wp_customize, 'footer_widget_title', array(
				'section' => 'appointment_widget_typography',
				'setting' => 'footer_widget_title'
		    ))
		);
		$wp_customize->add_setting(
		    'footer_widget_title_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('footer_widget_title_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
        'section' => 'appointment_widget_typography',
				'setting' => 'footer_widget_title_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'footer_widget_title_fontsize',
		    array(
		        'default'           =>  24,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('footer_widget_title_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_widget_typography',
				'setting' => 'footer_widget_title_fontsize',
				'type'    => 'select',
				'choices' => $font_size
    ));
		$wp_customize->add_setting(
    'footer_widget_title_line_height',
		    array(
		        'default'           =>  25,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('footer_widget_title_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_widget_typography',
		    'setting' => 'footer_widget_title_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));
		class WP_Footer_Widget_content_Customize_Control extends WP_Customize_Control {
		    public $type = 'new_menu';
		    public function render_content() {
		    ?>
			 			<h3><?php esc_html_e('Footer Widget Content','appointment'); ?></h3>
		    <?php
		    }
		}
		$wp_customize->add_setting(
		    'footer_widget_content',
		    array(
		        'capability'        => 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field'
		    )
		);
		$wp_customize->add_control( new WP_Footer_Widget_content_Customize_Control( $wp_customize, 'footer_widget_content', array(
				'section' => 'appointment_widget_typography',
				'setting' => 'footer_widget_content'
		    ))
		);
		$wp_customize->add_setting(
		    'footer_widget_content_fontfamily',
		    array(
		        'default'           =>  'Open Sans',
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('footer_widget_content_fontfamily', array(
				'label'   => esc_html__('Font family','appointment'),
		    'section' => 'appointment_widget_typography',
				'setting' => 'footer_widget_content_fontfamily',
				'type'    => 'select',
				'choices' => $font_family
		));
		$wp_customize->add_setting(
		    'footer_widget_content_fontsize',
		    array(
		        'default'           =>  15,
						'capability'        =>  'edit_theme_options',
						'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('footer_widget_content_fontsize', array(
				'label'   => esc_html__('Font size (px)','appointment'),
        'section' => 'appointment_widget_typography',
				'setting' => 'footer_widget_content_fontsize',
				'type'    => 'select',
				'choices' => $font_size
    ));
		$wp_customize->add_setting(
		    'footer_widget_content_line_height',
		    array(
		        'default'           =>  25,
		        'capability'        =>  'edit_theme_options',
		        'sanitize_callback' =>  'sanitize_text_field'
		    )
		);
		$wp_customize->add_control('footer_widget_content_line_height', array(
		    'label'   => esc_html__('Line height (px)','appointment'),
		    'section' => 'appointment_widget_typography',
		    'setting' => 'footer_widget_content_line_height',
		    'type'    => 'select',
		    'choices' => $line_height
		));

}
add_action( 'customize_register', 'appointment_typography_customizer' );
