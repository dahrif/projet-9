<?php
function wallstreet_service_customizer( $wp_customize ) {
//Service section panel
$wp_customize->add_panel( 'wallstreet_service_options', array(
		'priority'       => 600,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('Service settings', 'webriti-companion'),
	) );

	
	$wp_customize->add_section( 'service_section_head' , array(
		'title'      => esc_html__('Enable Service section', 'webriti-companion'),
		'panel'  => 'wallstreet_service_options',
		'priority'   => 50,
   	) );
	
	
	//Show and hide Service section
	$wp_customize->add_setting(
	'wallstreet_pro_options[service_section_enabled]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'wallstreet_sanitize_checkbox',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'wallstreet_pro_options[service_section_enabled]',
    array(
        'label' => esc_html__('Enable Service section','webriti-companion'),
        'section' => 'service_section_head',
        'type' => 'checkbox',
    )
	);
	//Enable and disable Service section
	$wp_customize->add_setting(
	'wallstreet_pro_options[service_section_animation_enabled]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'wallstreet_sanitize_checkbox',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'wallstreet_pro_options[service_section_animation_enabled]',
    array(
        'label' => esc_html__('Enable Service Animation','webriti-companion'),
        'section' => 'service_section_head',
        'type' => 'checkbox',
    )
	);
	
//service section one
	$wp_customize->add_section( 'service_section_one' , array(
		'title'      => esc_html__('Service one', 'webriti-companion'),
		'panel'  => 'wallstreet_service_options',
		'priority'   => 100,
		//'sanitize_callback' => 'sanitize_text_field',
   	) );
	
	$wp_customize->add_setting( 'wallstreet_pro_options[service_image_one]',
		array(
			'default' => esc_url(WC__PLUGIN_URL.'inc/wallstreet/images/service/service-4.png'),
			'type' => 'option',
			'sanitize_callback' => 'esc_url_raw',
		));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'wallstreet_pro_options[service_image_one]',
			array(
				'label' => esc_html__('Image','webriti-companion'),
				'section' => 'example_section_one',
				'settings' =>'wallstreet_pro_options[service_image_one]',
				'section' => 'service_section_one',
				'type' => 'upload',
			)
		)
	);
	
		
	$wp_customize->add_setting(
    'wallstreet_pro_options[service_title_one]',
    array(
        'default' => esc_html__('Habitasse platea','webriti-companion'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'wallstreet_pro_options[service_title_one]',
    array(
        'label' => esc_html__('Title','webriti-companion'),
        'section' => 'service_section_one',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'wallstreet_pro_options[service_description_one]',
    array(
        'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit dignissim dapib tumst dign eger porta nisl.','webriti-companion'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_textarea_field',
		 'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'wallstreet_pro_options[service_description_one]',
    array(
        'label' => esc_html__('Description','webriti-companion'),
        'section' => 'service_section_one',
        'type' => 'textarea',	
    )
);
//Second service

$wp_customize->add_section( 'service_section_two' , array(
		'title'      => esc_html__('Service two','webriti-companion'),
		'panel'  => 'wallstreet_service_options',
		'priority'   => 200,
   	) );


$wp_customize->add_setting( 'wallstreet_pro_options[service_image_two]',
	array(
			'default' => esc_url(WC__PLUGIN_URL.'inc/wallstreet/images/service/service-2.png'),
			'type' => 'option',
			'sanitize_callback' => 'esc_url_raw',
		));
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'wallstreet_pro_options[service_image_two]',
			array(
				'label' => esc_html__('Image','webriti-companion'),
				'section' => 'example_section_one',
				'settings' =>'wallstreet_pro_options[service_image_two]',
				'section' => 'service_section_two',
				'type' => 'upload',
			)
		)
	);

$wp_customize->add_setting(
    'wallstreet_pro_options[service_title_two]',
    array(
        'default' => esc_html__('Habitasse platea','webriti-companion'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control(
    'wallstreet_pro_options[service_title_two]',
    array(
        'label' => esc_html__('Title' ,'webriti-companion'),
        'section' => 'service_section_two',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'wallstreet_pro_options[service_description_two]',
    array(
        'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit dignissim dapib tumst dign eger porta nisl.','webriti-companion'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_textarea_field',
		 'type' => 'option',
    )	
);
$wp_customize->add_control(
		'wallstreet_pro_options[service_description_two]',
		array(
        'label' => esc_html__('Description','webriti-companion'),
        'section' => 'service_section_two',
        'type' => 'textarea',
    )
);
//Third Service section
$wp_customize->add_section( 'service_section_three' , array(
		'title'      => esc_html__('Service three', 'webriti-companion'),
		'panel'  => 'wallstreet_service_options',
		'priority'   => 300,
   	) );


$wp_customize->add_setting( 'wallstreet_pro_options[service_image_three]',
	array(
			'default' => esc_url(WC__PLUGIN_URL.'inc/wallstreet/images/service/service-3.png'),
			'type' => 'option',
			'sanitize_callback' => 'esc_url_raw',
		)); 

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'wallstreet_pro_options[service_image_three]',
			array(
				'label' => esc_html__('Image','webriti-companion'),
				'section' => 'example_section_one',
				'settings' =>'wallstreet_pro_options[service_image_three]',
				'section' => 'service_section_three',
				'type' => 'upload',
			)
		)
	);

$wp_customize->add_setting(
    'wallstreet_pro_options[service_title_three]',
    array(
        'default' => esc_html__('Habitasse platea','webriti-companion'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'wallstreet_pro_options[service_title_three]',
    array(
        'label' => esc_html__('Title','webriti-companion'),
        'section' => 'service_section_three',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'wallstreet_pro_options[service_description_three]',
    array(
        'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit dignissim dapib tumst dign eger porta nisl.','webriti-companion'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_textarea_field',
		'type' =>'option',
    )	
);
$wp_customize->add_control(
    'wallstreet_pro_options[service_description_three]',
    array(
        'label' => esc_html__('Description','webriti-companion'),
        'section' => 'service_section_three',
        'type' => 'textarea',
    )
);		
}
add_action( 'customize_register', 'wallstreet_service_customizer' );

// Bluestreet Service Layout Setting
if ($theme->name == 'Bluestreet' && version_compare(wp_get_theme()->get('Version'), '1.2.7') > 0):

    function bluestreet_service_slide_layout_customizer($wp_customize) {

        /**
         * Image Radio Button Custom Control
         *
         * @author Anthony Hortin <http://maddisondesigns.com>
         * @license http://www.gnu.org/licenses/gpl-2.0.html
         * @link https://github.com/maddisondesigns
         */
        class bluestreet_Image_Radio_Button_service_Custom_Control extends WP_Customize_Control {

            /**
             * The type of control being rendered
             */
            public $type = 'image_radio_button';

            public function enqueue() {
                add_action('customize_controls_print_styles', array($this, 'print_styles'));
            }

            public function print_styles() {
                ?><style>
                    /*Red child*/
                    #customize-control-wallstreet_pro_options-service_box_layout_setting input{
                        display:none;
                    }
                    #customize-control-wallstreet_pro_options-service_box_layout_setting .radio-button-label img{
                        margin: 2%;
                    }
                    .image_radio_button_control .radio-button-label > input:checked + img {
                        border: 3px solid #2885bb;
                    }

                </style>
                <?php
            }

            /**
             * Render the control in the customizer
             */
            public function render_content() {
                ?>
                <div class="image_radio_button_control">
                    <?php if (!empty($this->label)) { ?>
                        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                    <?php } ?>
                    <?php if (!empty($this->description)) { ?>
                        <span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
                    <?php } ?>

                    <?php foreach ($this->choices as $key => $value) { ?>
                        <label class="radio-button-label">
                            <input type="radio" name="<?php echo esc_attr($this->id); ?>" value="<?php echo esc_attr($key); ?>" <?php $this->link(); ?> <?php checked(esc_attr($key), $this->value()); ?>/>
                            <img src="<?php echo esc_attr($value['image']); ?>" alt="<?php echo esc_attr($value['name']); ?>" title="<?php echo esc_attr($value['name']); ?>" />
                        </label>
                    <?php } ?>
                </div>
                <?php
            }

        }

        $current_options = wp_parse_args(get_option('wallstreet_pro_options', array()), wallstreet_theme_data_setup());

        /* Service Layout section */

        // Service Layout settings

        $wp_customize->add_section( 'service_settings' , array(
			'title'      => esc_html__('Service Layout', 'webriti-companion'),
			'panel'  => 'wallstreet_service_options',
			'priority'   => 51,
	   	) );

        if (get_option('wallstreet_user', 'new')=='old' || $current_options['upload_image_logo'] != '' || $current_options['webrit_custom_css'] == 'nomorenow') {

            $wp_customize->add_setting('wallstreet_pro_options[service_box_layout_setting]', array(
                'default' => 'default',
                'sanitize_callback' => 'bluestreet_sanitize_radio',
                'type' => 'option',
            ));
        } else {

            $wp_customize->add_setting('wallstreet_pro_options[service_box_layout_setting]', array(
                'default' => 'box',
                'sanitize_callback' => 'bluestreet_sanitize_radio',
                'type' => 'option',
            ));
        }

        $wp_customize->add_control(new bluestreet_Image_Radio_Button_service_Custom_Control($wp_customize, 'wallstreet_pro_options[service_box_layout_setting]',
                        array(
                    'label' => esc_html__('Service Layout Setting', 'webriti-companion'),
                    'section' => 'service_settings',
                    'choices' => array(
                        'default' => array(
                            'image' => WC__PLUGIN_URL . 'inc/wallstreet/images/service/bluestreet-service-default.png',
                            'name' => esc_html__('Service Design 1', 'webriti-companion')
                        ),
                        'box' => array(
                            'image' => WC__PLUGIN_URL . 'inc/wallstreet/images/service/bluestreet-service-box.png',
                            'name' => esc_html__('Service Design 2', 'webriti-companion')
                        )
                    )
                        )
        ));
    }

    add_action('customize_register', 'bluestreet_service_slide_layout_customizer');
endif;

// Leo Service Layout Setting
if ($theme->name == 'Leo' && version_compare(wp_get_theme()->get('Version'), '1.2.4') > 0):

    function leo_service_slide_layout_customizer($wp_customize) {

        /**
         * Image Radio Button Custom Control
         *
         * @author Anthony Hortin <http://maddisondesigns.com>
         * @license http://www.gnu.org/licenses/gpl-2.0.html
         * @link https://github.com/maddisondesigns
         */
        class leo_Image_Radio_Button_service_Custom_Control extends WP_Customize_Control {

            /**
             * The type of control being rendered
             */
            public $type = 'image_radio_button';

            public function enqueue() {
                add_action('customize_controls_print_styles', array($this, 'print_styles'));
            }

            public function print_styles() {
                ?><style>
                    #customize-control-wallstreet_pro_options-service_slide_layout_setting .radio-button-label img{
                        margin: 2%;
                    }
                    .image_radio_button_control .radio-button-label > input:checked + img {
                        border: 3px solid #2885bb;
                    }
                    #customize-control-wallstreet_pro_options-service_slide_layout_setting .radio-button-label input{
                        display: none;
                    }

                </style>
                <?php
            }

            /**
             * Render the control in the customizer
             */
            public function render_content() {
                ?>
                <div class="image_radio_button_control">
                    <?php if (!empty($this->label)) { ?>
                        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                    <?php } ?>
                    <?php if (!empty($this->description)) { ?>
                        <span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
                    <?php } ?>

                    <?php foreach ($this->choices as $key => $value) { ?>
                        <label class="radio-button-label">
                            <input type="radio" name="<?php echo esc_attr($this->id); ?>" value="<?php echo esc_attr($key); ?>" <?php $this->link(); ?> <?php checked(esc_attr($key), $this->value()); ?>/>
                            <img src="<?php echo esc_attr($value['image']); ?>" alt="<?php echo esc_attr($value['name']); ?>" title="<?php echo esc_attr($value['name']); ?>" />
                        </label>
                    <?php } ?>
                </div>
                <?php
            }

        }

        $current_options = wp_parse_args(get_option('wallstreet_pro_options', array()), wallstreet_theme_data_setup());

        /* Service Layout section */

        // Service Layout settings

        $wp_customize->add_section( 'service_settings' , array(
            'title'      => esc_html__('Service Layout', 'webriti-companion'),
            'panel'  => 'wallstreet_service_options',
            'priority'   => 51,
        ) );

        if (get_option('wallstreet_user', 'new')=='old' || $current_options['upload_image_logo'] != '' || $current_options['webrit_custom_css'] == 'nomorenow') {

            $wp_customize->add_setting('wallstreet_pro_options[service_slide_layout_setting]', array(
                'default' => 'default',
                'sanitize_callback' => 'leo_sanitize_radio',
                'type' => 'option',
            ));
        } else {

            $wp_customize->add_setting('wallstreet_pro_options[service_slide_layout_setting]', array(
                'default' => 'slide',
                'sanitize_callback' => 'leo_sanitize_radio',
                'type' => 'option',
            ));
        }

        $wp_customize->add_control(new leo_Image_Radio_Button_service_Custom_Control($wp_customize, 'wallstreet_pro_options[service_slide_layout_setting]',
                        array(
                    'label' => esc_html__('Service Layout Setting', 'webriti-companion'),
                    'section' => 'service_settings',
                    'choices' => array(
                        'default' => array(
                            'image' => WC__PLUGIN_URL . 'inc/wallstreet/images/service/leo-service-default.png',
                            'name' => esc_html__('Service Design 1', 'webriti-companion')
                        ),
                        'slide' => array(
                            'image' => WC__PLUGIN_URL . 'inc/wallstreet/images/service/leo-service-slide.png',
                            'name' => esc_html__('Service Design 2', 'webriti-companion')
                        )
                    )
                        )
        ));
    }

    add_action('customize_register', 'leo_service_slide_layout_customizer');
endif;