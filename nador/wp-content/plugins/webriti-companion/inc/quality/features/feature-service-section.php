<?php
if (!function_exists('quality_service_customize_register')) :

    function quality_service_customize_register($wp_customize) {
        //Service section panel
        $wp_customize->add_section(
                'service_settings', array(
            'title' => esc_html__('Service settings', 'webriti-companion'),
            //'panel'    => 'quality_service_options',
            'panel' => 'quality_homepage_section_setting',
            'priority' => 2,
                )
        );

        //Hide Index Service Section
        $wp_customize->add_setting(
                'quality_pro_options[service_enable]',
                array(
                    'default' => true,
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'quality_sanitize_checkbox',
                    'type' => 'option',
                )
        );

        $wp_customize->add_control(
                'quality_pro_options[service_enable]',
                array(
                    'label' => esc_html__('Enable Services on homepage.', 'webriti-companion'),
                    'section' => 'service_settings',
                    'type' => 'checkbox',
                )
        );

        $wp_customize->add_setting(
                'quality_pro_options[service_title]',
                array(
                    'default' => esc_html__('Nam suscipit libero', 'webriti-companion'),
                    'capability' => 'edit_theme_options',
                    'type' => 'option',
                    'sanitize_callback' => 'sanitize_text_field'
                )
        );
        $wp_customize->add_control(
                'quality_pro_options[service_title]',
                array(
                    'label' => esc_html__('Title', 'webriti-companion'),
                    'section' => 'service_settings',
                    'type' => 'text',
                )
        );

        $wp_customize->add_setting(
                'quality_pro_options[service_description]',
                array(
                    'default' => __('Curabitur <b>lacinia</b> tellus', 'webriti-companion'),
                    'type' => 'option',
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'wp_kses_post'
                )
        );
        $wp_customize->add_control(
                'quality_pro_options[service_description]',
                array(
                    'label' => esc_html__('Description', ''),
                    'section' => 'service_settings',
                    'type' => 'text',
                )
        );

        if (class_exists('Webriti_Companion_Repeater')) {
            $wp_customize->add_setting('quality_pro_options[quality_service_content]', array(
                'type' => 'option',
                'sanitize_callback' => 'webriti_companion_repeater_sanitize',
            ));

            $wp_customize->add_control(new Webriti_Companion_Repeater($wp_customize, 'quality_pro_options[quality_service_content]', array(
                        'label' => esc_html__('Service content', 'webriti-companion'),
                        'section' => 'service_settings',
                        'add_field_label' => esc_html__('Add new service', 'webriti-companion'),
                        'item_name' => esc_html__('Service', 'webriti-companion'),
                        'customizer_repeater_title_control' => true,
                        'customizer_repeater_text_control' => true,
                        'customizer_repeater_link_control' => true,
                        'customizer_repeater_icon_control' => true,
                        'customizer_repeater_checkbox_control' => true,
                        'customizer_repeater_image_control' => true,
            )));
        }
    }

    add_action('customize_register', 'quality_service_customize_register');

    /**
     * Add selective refresh for Front page section section controls.
     */
    function quality_register_service_section_partials($wp_customize) {

        $wp_customize->selective_refresh->add_partial('quality_pro_options[service_title]', array(
            'selector' => '.service .section-header p',
            'settings' => 'quality_pro_options[service_title]',
        ));

        $wp_customize->selective_refresh->add_partial('quality_pro_options[service_description]', array(
            'selector' => '.service .section-header h1.widget-title',
            'settings' => 'quality_pro_options[service_description]',
        ));

        $wp_customize->selective_refresh->add_partial('quality_pro_options[quality_service_content]', array(
            'selector' => '.service #service_content_section',
            'settings' => 'quality_pro_options[quality_service_content]',
        ));
    }

    add_action('customize_register', 'quality_register_service_section_partials');
endif;

//Set for old user
if (!get_option('quality_user', false)) {
     //detect old user and set value
    $quality_user = get_option('quality_pro_options', array());
    if ((isset($quality_user['service_title']) || isset($quality_user['service_description']) || isset($quality_user['blog_heading']) || isset($quality_user['home_blog_description']))) {
        add_option('quality_user', 'old');
    }else{
        add_option('quality_user', 'new');
    }
}

// Quality Blue Service Layout Setting
if ($theme->name == 'Quality blue' && (version_compare(wp_get_theme()->get('Version'), '1.5.9') > 0)):

    function quality_blue_service_slide_layout_customizer($wp_customize) {

        /**
         * Image Radio Button Custom Control
         *
         * @author Anthony Hortin <http://maddisondesigns.com>
         * @license http://www.gnu.org/licenses/gpl-2.0.html
         * @link https://github.com/maddisondesigns
         */
        class quality_blue_Image_Radio_Button_service_Custom_Control extends WP_Customize_Control {

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
                    #customize-control-quality_pro_options-service_blink_layout_setting .radio-button-label input{
                        display:none;
                    }
                    #customize-control-quality_pro_options-service_blink_layout_setting .radio-button-label img{
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

        $quality_options = quality_theme_data_setup();
        $current_options = wp_parse_args(get_option('quality_pro_options', array()), $quality_options);

        /* Service Layout section */

        // Service Layout settings
        $quality_blue_customizer_data = get_option('quality_pro_options');
        if (get_option('quality_user', 'new')=='old' || $current_options['text_title'] != '' || $current_options['upload_image_logo'] != '' || $current_options['webrit_custom_css'] == 'nomorenow') {

            $wp_customize->add_setting('quality_pro_options[service_blink_layout_setting]', array(
                'default' => 'default',
                'sanitize_callback' => 'quality_blue_sanitize_radio',
                'type' => 'option',
            ));
        } else {

            $wp_customize->add_setting('quality_pro_options[service_blink_layout_setting]', array(
                'default' => 'blink',
                'sanitize_callback' => 'quality_blue_sanitize_radio',
                'type' => 'option',
            ));
        }

        $wp_customize->add_control(new quality_blue_Image_Radio_Button_service_Custom_Control($wp_customize, 'quality_pro_options[service_blink_layout_setting]',
                        array(
                    'label' => esc_html__('Service Layout Setting', 'webriti-companion'),
                    'section' => 'service_settings',
                    'choices' => array(
                        'default' => array(
                            'image' => WC__PLUGIN_URL . 'inc/quality/images/blue-default.png',
                            'name' => esc_html__('Service Design 1', 'webriti-companion')
                        ),
                        'blink' => array(
                            'image' => WC__PLUGIN_URL . 'inc/quality/images/blue-hover.png',
                            'name' => esc_html__('Service Design 2', 'webriti-companion')
                        )
                    )
                        )
        ));
    }

    add_action('customize_register', 'quality_blue_service_slide_layout_customizer');
endif;

// Quality Green Service Layout Setting
if ($theme->name == 'Quality green' && version_compare(wp_get_theme()->get('Version'), '1.2.7') > 0):

    function quality_green_service_slide_layout_customizer($wp_customize) {

        /**
         * Image Radio Button Custom Control
         *
         * @author Anthony Hortin <http://maddisondesigns.com>
         * @license http://www.gnu.org/licenses/gpl-2.0.html
         * @link https://github.com/maddisondesigns
         */
        class quality_green_Image_Radio_Button_service_Custom_Control extends WP_Customize_Control {

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
                    #customize-control-quality_pro_options-service_box_layout_setting input{
                        display:none;
                    }
                    #customize-control-quality_pro_options-service_box_layout_setting .radio-button-label img{
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

        $current_options = wp_parse_args(get_option('quality_pro_options', array()), quality_theme_data_setup());

        /* Service Layout section */

        // Service Layout settings
        if (get_option('quality_user', 'new')=='old' || $current_options['text_title'] != '' || $current_options['upload_image_logo'] != '' || $current_options['webrit_custom_css'] == 'nomorenow') {

            $wp_customize->add_setting('quality_pro_options[service_box_layout_setting]', array(
                'default' => 'default',
                'sanitize_callback' => 'quality_green_sanitize_radio',
                'type' => 'option',
            ));
        } else {

            $wp_customize->add_setting('quality_pro_options[service_box_layout_setting]', array(
                'default' => 'box',
                'sanitize_callback' => 'quality_green_sanitize_radio',
                'type' => 'option',
            ));
        }

        $wp_customize->add_control(new quality_green_Image_Radio_Button_service_Custom_Control($wp_customize, 'quality_pro_options[service_box_layout_setting]',
                        array(
                    'label' => esc_html__('Service Layout Setting', 'webriti-companion'),
                    'section' => 'service_settings',
                    'choices' => array(
                        'default' => array(
                            'image' => WC__PLUGIN_URL . 'inc/quality/images/green-service-default.png',
                            'name' => esc_html__('Service Design 1', 'webriti-companion')
                        ),
                        'box' => array(
                            'image' => WC__PLUGIN_URL . 'inc/quality/images/green-service-box.png',
                            'name' => esc_html__('Service Design 2', 'webriti-companion')
                        )
                    )
                        )
        ));
    }

    add_action('customize_register', 'quality_green_service_slide_layout_customizer');
endif;

// Quality Orange Service Layout Setting
if ($theme->name == 'Quality orange' && version_compare(wp_get_theme()->get('Version'), '1.1.9.2') > 0):

    function quality_orange_service_slide_layout_customizer($wp_customize) {

        /**
         * Image Radio Button Custom Control
         *
         * @author Anthony Hortin <http://maddisondesigns.com>
         * @license http://www.gnu.org/licenses/gpl-2.0.html
         * @link https://github.com/maddisondesigns
         */
        class quality_orange_Image_Radio_Button_service_Custom_Control extends WP_Customize_Control {

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
                    #customize-control-quality_pro_options-service_rotate_layout_setting input{
                        display:none;
                    }
                    #customize-control-quality_pro_options-service_rotate_layout_setting img{
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

        $current_options = wp_parse_args(get_option('quality_pro_options', array()), quality_theme_data_setup());

        /* Service Layout section */

        // Service Layout settings
        if (get_option('quality_user', 'new')=='old' || $current_options['text_title'] != '' || $current_options['upload_image_logo'] != '' || $current_options['webrit_custom_css'] == 'nomorenow') {

            $wp_customize->add_setting('quality_pro_options[service_rotate_layout_setting]', array(
                'default' => 'default',
                'sanitize_callback' => 'quality_orange_sanitize_radio',
                'type' => 'option',
            ));
        } else {

            $wp_customize->add_setting('quality_pro_options[service_rotate_layout_setting]', array(
                'default' => 'rotate',
                'sanitize_callback' => 'quality_orange_sanitize_radio',
                'type' => 'option',
            ));
        }

        $wp_customize->add_control(new quality_orange_Image_Radio_Button_service_Custom_Control($wp_customize, 'quality_pro_options[service_rotate_layout_setting]',
                        array(
                    'label' => esc_html__('Service Layout Setting', 'webriti-companion'),
                    'section' => 'service_settings',
                    'choices' => array(
                        'default' => array(
                            'image' => WC__PLUGIN_URL . 'inc/quality/images/quality-orange-service-default.png',
                            'name' => esc_html__('Service Design 1', 'webriti-companion')
                        ),
                        'rotate' => array(
                            'image' => WC__PLUGIN_URL . 'inc/quality/images/quality-orange-service-rotate.png',
                            'name' => esc_html__('Service Design 2', 'webriti-companion')
                        )
                    )
                        )
        ));
    }

    add_action('customize_register', 'quality_orange_service_slide_layout_customizer');
endif;

// Heroic Service Layout Setting
if ($theme->name == 'Heroic' && version_compare(wp_get_theme()->get('Version'), '1.2.1') > 0):

    function heroic_service_slide_layout_customizer($wp_customize) {

        /**
         * Image Radio Button Custom Control
         *
         * @author Anthony Hortin <http://maddisondesigns.com>
         * @license http://www.gnu.org/licenses/gpl-2.0.html
         * @link https://github.com/maddisondesigns
         */
        class heroic_Image_Radio_Button_service_Custom_Control extends WP_Customize_Control {

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
                    #customize-control-quality_pro_options-service_slide_layout_setting input{
                        display:none;
                    }
                    #customize-control-quality_pro_options-service_slide_layout_setting img{
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

        $current_options = wp_parse_args(get_option('quality_pro_options', array()), quality_theme_data_setup());

        /* Service Layout section */

        // Service Layout settings
        if (get_option('quality_user', 'new')=='old' || $current_options['text_title'] != '' || $current_options['upload_image_logo'] != '' || $current_options['webrit_custom_css'] == 'nomorenow') {

            $wp_customize->add_setting('quality_pro_options[service_slide_layout_setting]', array(
                'default' => 'default',
                'sanitize_callback' => 'heroic_sanitize_radio',
                'type' => 'option',
            ));
        } else {

            $wp_customize->add_setting('quality_pro_options[service_slide_layout_setting]', array(
                'default' => 'slide',
                'sanitize_callback' => 'heroic_sanitize_radio',
                'type' => 'option',
            ));
        }

        $wp_customize->add_control(new heroic_Image_Radio_Button_service_Custom_Control($wp_customize, 'quality_pro_options[service_slide_layout_setting]',
                        array(
                    'label' => esc_html__('Service Layout Setting', 'webriti-companion'),
                    'section' => 'service_settings',
                    'choices' => array(
                        'default' => array(
                            'image' => WC__PLUGIN_URL . 'inc/quality/images/heroic-service-default.png',
                            'name' => esc_html__('Service Design 1', 'webriti-companion')
                        ),
                        'slide' => array(
                            'image' => WC__PLUGIN_URL . 'inc/quality/images/heroic-service-side.png',
                            'name' => esc_html__('Service Design 2', 'webriti-companion')
                        )
                    )
                        )
        ));
    }

    add_action('customize_register', 'heroic_service_slide_layout_customizer');
endif;