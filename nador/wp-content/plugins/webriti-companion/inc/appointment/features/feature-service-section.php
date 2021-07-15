<?php

function appointment_service_customizer($wp_customize) {

//Service section panel
    $wp_customize->add_panel('appointment_service_options', array(
        'priority' => 500,
        'capability' => 'edit_theme_options',
        'title' => esc_html__('Service settings', 'webriti-companion'),
    ));


    $wp_customize->add_section('service_section_head', array(
        'title' => esc_html__('Section Heading', 'webriti-companion'),
        'panel' => 'appointment_service_options',
        'priority' => 50,
    ));


    //Hide Index Service Section

    $wp_customize->add_setting(
            'appointment_options[service_section_enabled]',
            array(
                'default' => '',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointment_sanitize_checkbox',
                'type' => 'option'
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_section_enabled]',
            array(
                'label' => esc_html__('Hide service section from homepage', 'webriti-companion'),
                'section' => 'service_section_head',
                'type' => 'checkbox',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[service_title]',
            array(
                'default' => esc_html__('Lorem Ipsum', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointment_service_sanitize_html',
                'type' => 'option'
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_title]',
            array(
                'label' => esc_html__('Title', 'webriti-companion'),
                'section' => 'service_section_head',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[service_description]',
            array(
                'default' => esc_html__('Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'webriti-companion'),
                'sanitize_callback' => 'appointment_service_sanitize_html',
                'type' => 'option'
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_description]',
            array(
                'label' => esc_html__('Description', 'webriti-companion'),
                'section' => 'service_section_head',
                'type' => 'text',
                'sanitize_callback' => 'appointment_service_sanitize_html',
            )
    );

//service section one
    $wp_customize->add_section('service_section_one', array(
        'title' => esc_html__('Service section one', 'webriti-companion'),
        'panel' => 'appointment_service_options',
        'priority' => 100,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting(
            'appointment_options[service_one_icon]', array(
        'default' => 'fa-mobile',
        'sanitize_callback' => 'sanitize_text_field',
        'capability' => 'edit_theme_options',
        'type' => 'option',
    ));

    $wp_customize->add_control('appointment_options[service_one_icon]', array(
        'label' => esc_html__('Icon', 'webriti-companion'),
        'style' => 'background-color: red',
        'section' => 'service_section_one',
        'type' => 'text',
    ));

    $wp_customize->add_setting(
            'appointment_options[service_one_title]',
            array(
                'default' => esc_html__('Quam in nibh', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointment_service_sanitize_html',
                'type' => 'option'
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_one_title]',
            array(
                'label' => esc_html__('Title', 'webriti-companion'),
                'section' => 'service_section_one',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[service_one_description]',
            array(
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointment_service_sanitize_html',
                'type' => 'option'
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_one_description]',
            array(
                'label' => esc_html__('Description', 'webriti-companion'),
                'section' => 'service_section_one',
                'type' => 'text',
            )
    );
//Second service

    $wp_customize->add_section('service_section_two', array(
        'title' => esc_html__('Service section two', 'webriti-companion'),
        'panel' => 'appointment_service_options',
        'priority' => 200,
    ));


    $wp_customize->add_setting(
            'appointment_options[service_two_icon]',
            array(
                'type' => 'option',
                'default' => 'fa-bell',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_two_icon]',
            array(
                'label' => esc_html__('Icon', 'webriti-companion'),
                'section' => 'service_section_two',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[service_two_title]',
            array(
                'default' => esc_html__('Quam in nibh', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointment_service_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_two_title]',
            array(
                'label' => esc_html__('Title', 'webriti-companion'),
                'section' => 'service_section_two',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[service_two_description]',
            array(
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointment_service_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_two_description]',
            array(
                'label' => esc_html__('Description', 'webriti-companion'),
                'section' => 'service_section_two',
                'type' => 'text',
            )
    );
//Third Service section
    $wp_customize->add_section('service_section_three', array(
        'title' => esc_html__('Service section three', 'webriti-companion'),
        'panel' => 'appointment_service_options',
        'priority' => 300,
    ));


    $wp_customize->add_setting(
            'appointment_options[service_three_icon]',
            array(
                'default' => 'fa-laptop',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_three_icon]',
            array(
                'label' => esc_html__('Icon', 'webriti-companion'),
                'section' => 'service_section_three',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[service_three_title]',
            array(
                'default' => esc_html__('Quam in nibh', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointment_service_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_three_title]',
            array(
                'label' => esc_html__('Title', 'webriti-companion'),
                'section' => 'service_section_three',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[service_three_description]',
            array(
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointment_service_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_three_description]',
            array(
                'label' => esc_html__('Description', 'webriti-companion'),
                'section' => 'service_section_three',
                'type' => 'text',
            )
    );
//Four Service section

    $wp_customize->add_section('service_section_four', array(
        'title' => esc_html__('Service section four', 'webriti-companion'),
        'panel' => 'appointment_service_options',
        'priority' => 400,
    ));

    $wp_customize->add_setting(
            'appointment_options[service_four_icon]',
            array(
                'default' => 'fa-support',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_four_icon]',
            array(
                'label' => esc_html__('Icon', 'webriti-companion'),
                'section' => 'service_section_four',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[service_four_title]',
            array(
                'default' => esc_html__('Quam in nibh', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointment_service_sanitize_html',
                'type' => 'option'
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_four_title]',
            array(
                'label' => esc_html__('Title', 'webriti-companion'),
                'section' => 'service_section_four',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[service_four_description]',
            array(
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointment_service_sanitize_html',
                'type' => 'option'
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_four_description]',
            array(
                'label' => esc_html__('Description', 'webriti-companion'),
                'section' => 'service_section_four',
                'type' => 'text',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );
//Five service section
    $wp_customize->add_section('service_section_five', array(
        'title' => esc_html__('Service section five', 'webriti-companion'),
        'panel' => 'appointment_service_options',
        'priority' => 500,
    ));


    $wp_customize->add_setting(
            'appointment_options[service_five_icon]',
            array(
                'default' => 'fa-code',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_five_icon]',
            array(
                'label' => esc_html__('Icon', 'webriti-companion'),
                'section' => 'service_section_five',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[service_five_title]',
            array(
                'default' => esc_html__('Quam in nibh', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointment_service_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_five_title]',
            array(
                'label' => esc_html__('Title', 'webriti-companion'),
                'section' => 'service_section_five',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[service_five_description]',
            array(
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointment_service_sanitize_html',
                'type' => 'option'
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_five_description]',
            array(
                'label' => esc_html__('Description', 'webriti-companion'),
                'section' => 'service_section_five',
                'type' => 'text',
            )
    );
//Six service section
    $wp_customize->add_section('service_section_six', array(
        'title' => esc_html__('Service section six', 'webriti-companion'),
        'panel' => 'appointment_service_options',
        'priority' => 600,
    ));


    $wp_customize->add_setting(
            'appointment_options[service_six_icon]',
            array(
                'default' => 'fa-cog',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_six_icon]',
            array(
                'label' => esc_html__('Icon', 'webriti-companion'),
                'section' => 'service_section_six',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[service_six_title]',
            array(
                'default' => esc_html__('Quam in nibh', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointment_service_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_six_title]',
            array(
                'label' => esc_html__('Title', 'webriti-companion'),
                'section' => 'service_section_six',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[service_six_description]',
            array(
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.', 'webriti-companion'),
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointment_service_sanitize_html',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[service_six_description]',
            array(
                'label' => esc_html__('Description', 'webriti-companion'),
                'section' => 'service_section_six',
                'type' => 'text',
            )
    );

    function appointment_service_sanitize_html($input) {
        return wp_kses_post(force_balance_tags($input));
    }

}

add_action('customize_register', 'appointment_service_customizer');

$theme = wp_get_theme();

// Appointment Red Service Layout Setting
if ($theme->name == 'Appointment Red'):

    function appointment_red_service_layout_customizer($wp_customize) {

        /**
         * Image Radio Button Custom Control
         *
         * @author Anthony Hortin <http://maddisondesigns.com>
         * @license http://www.gnu.org/licenses/gpl-2.0.html
         * @link https://github.com/maddisondesigns
         */
        class Appointment_red_Image_Radio_Button_service_Custom_Control extends WP_Customize_Control {

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
                    #customize-controls #customize-control-appointment_options-service_layout_setting img{
                        margin: 2%;
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

        $appointment_options = appointment_theme_setup_data();
        $header_setting = wp_parse_args(get_option('appointment_options', array()), $appointment_options);


        /* Service Layout section */

        // Service Layout settings
        if ((!has_custom_logo() && $header_setting['enable_header_logo_text'] == 'nomorenow' ) || $header_setting['enable_header_logo_text'] == 1 || $header_setting['upload_image_logo'] != '') {

            $wp_customize->add_setting('appointment_options[service_layout_setting]', array(
                'default' => 'default',
                'sanitize_callback' => 'appointment_red_sanitize_radio',
                'type' => 'option',
            ));
        } else {

            $wp_customize->add_setting('appointment_options[service_layout_setting]', array(
                'default' => 'box',
                'sanitize_callback' => 'appointment_red_sanitize_radio',
                'type' => 'option',
            ));
        }

        $wp_customize->add_control(new Appointment_red_Image_Radio_Button_service_Custom_Control($wp_customize, 'appointment_options[service_layout_setting]',
                        array(
                    'label' => esc_html__('Service Layout Setting', 'webriti-companion'),
                    'section' => 'service_section_head',
                    'choices' => array(
                        'default' => array(
                            'image' => WC__PLUGIN_URL . 'inc/appointment/images/appointment-red-service1.png',
                            'name' => esc_html__('Service Design 1', 'webriti-companion')
                        ),
                        'box' => array(
                            'image' => WC__PLUGIN_URL . 'inc/appointment/images/appointment-red-service2.png',
                            'name' => esc_html__('Service Design 2', 'webriti-companion')
                        )
                    )
                        )
        ));
    }

    add_action('customize_register', 'appointment_red_service_layout_customizer');
endif;


// Appointment Green Service Layout Setting
if ($theme->name == 'Appointment Green'):

    function appointment_green_service_rotate_layout_customizer($wp_customize) {

        /**
         * Image Radio Button Custom Control
         *
         * @author Anthony Hortin <http://maddisondesigns.com>
         * @license http://www.gnu.org/licenses/gpl-2.0.html
         * @link https://github.com/maddisondesigns
         */
        class Appointment_green_Image_Radio_Button_service_Custom_Control extends WP_Customize_Control {

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
                    #customize-control-appointment_options-service_rotate_layout_section .image_radio_button_control .radio-button-label > img{
                        margin: 2%;
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

        $appointment_options = appointment_theme_setup_data();
        $header_setting = wp_parse_args(get_option('appointment_options', array()), $appointment_options);


        /* Service Layout section */

        // Service Layout settings
        if ((!has_custom_logo() && $header_setting['enable_header_logo_text'] == 'nomorenow' ) || $header_setting['enable_header_logo_text'] == 1 || $header_setting['upload_image_logo'] != '') {

            $wp_customize->add_setting('appointment_options[service_rotate_layout_section]', array(
                'default' => 'default',
                'sanitize_callback' => 'appointment_green_sanitize_radio',
                'type' => 'option',
            ));
        } else {

            $wp_customize->add_setting('appointment_options[service_rotate_layout_section]', array(
                'default' => 'rotate',
                'sanitize_callback' => 'appointment_green_sanitize_radio',
                'type' => 'option',
            ));
        }

        $wp_customize->add_control(new Appointment_green_Image_Radio_Button_service_Custom_Control($wp_customize, 'appointment_options[service_rotate_layout_section]',
                        array(
                    'label' => esc_html__('Service Layout Setting', 'webriti-companion'),
                    'section' => 'service_section_head',
                    'choices' => array(
                        'default' => array(
                            'image' => WC__PLUGIN_URL . 'inc/appointment/images/green-default.png',
                            'name' => esc_html__('Service Design 1', 'webriti-companion')
                        ),
                        'rotate' => array(
                            'image' => WC__PLUGIN_URL . 'inc/appointment/images/green-rotate.png',
                            'name' => esc_html__('Service Design 2', 'webriti-companion')
                        )
                    )
                        )
        ));
    }

    add_action('customize_register', 'appointment_green_service_rotate_layout_customizer');
endif;

// Appointment Blue Service Layout Setting
if ($theme->name == 'Appointment Blue'):

    function appointment_blue_service_slide_layout_customizer($wp_customize) {

        /**
         * Image Radio Button Custom Control
         *
         * @author Anthony Hortin <http://maddisondesigns.com>
         * @license http://www.gnu.org/licenses/gpl-2.0.html
         * @link https://github.com/maddisondesigns
         */
        class Appointment_blue_Image_Radio_Button_service_Custom_Control extends WP_Customize_Control {

            /**
             * The type of control being rendered
             */
            public $type = 'image_radio_button';

            public function enqueue() {
                add_action('customize_controls_print_styles', array($this, 'print_styles'));
            }

            public function print_styles() {
                ?><style>
                    /*Blue child*/
                    #customize-control-appointment_options-service_slide_layout_setting .image_radio_button_control .radio-button-label > img {
                        margin: 2%;
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

        $appointment_options = appointment_theme_setup_data();
        $header_setting = wp_parse_args(get_option('appointment_options', array()), $appointment_options);


        /* Service Layout section */

        // Service Layout settings
        if ((!has_custom_logo() && $header_setting['enable_header_logo_text'] == 'nomorenow' ) || $header_setting['enable_header_logo_text'] == 1 || $header_setting['upload_image_logo'] != '') {

            $wp_customize->add_setting('appointment_options[service_slide_layout_setting]', array(
                'default' => 'default',
                'sanitize_callback' => 'appointment_blue_sanitize_radio',
                'type' => 'option',
            ));
        } else {

            $wp_customize->add_setting('appointment_options[service_slide_layout_setting]', array(
                'default' => 'slide',
                'sanitize_callback' => 'appointment_blue_sanitize_radio',
                'type' => 'option',
            ));
        }

        $wp_customize->add_control(new Appointment_blue_Image_Radio_Button_service_Custom_Control($wp_customize, 'appointment_options[service_slide_layout_setting]',
                        array(
                    'label' => esc_html__('Service Layout Setting', 'webriti-companion'),
                    'section' => 'service_section_head',
                    'choices' => array(
                        'default' => array(
                            'image' => WC__PLUGIN_URL . 'inc/appointment/images/appointment-blue-service1.png',
                            'name' => esc_html__('Service Design 1', 'webriti-companion')
                        ),
                        'slide' => array(
                            'image' => WC__PLUGIN_URL . 'inc/appointment/images/appointment-blue-service2.png',
                            'name' => esc_html__('Service Design 2', 'webriti-companion')
                        )
                    )
                        )
        ));
    }

    add_action('customize_register', 'appointment_blue_service_slide_layout_customizer');
endif;


// Shk Corporate Service Layout Setting
if ($theme->name == 'Shk Corporate'):

    function shk_corporate_service_slide_layout_customizer($wp_customize) {

        /**
         * Image Radio Button Custom Control
         *
         * @author Anthony Hortin <http://maddisondesigns.com>
         * @license http://www.gnu.org/licenses/gpl-2.0.html
         * @link https://github.com/maddisondesigns
         */
        class shk_corporate_Image_Radio_Button_service_Custom_Control extends WP_Customize_Control {

            /**
             * The type of control being rendered
             */
            public $type = 'image_radio_button';

            public function enqueue() {
                add_action('customize_controls_print_styles', array($this, 'print_styles'));
            }

            public function print_styles() {
                ?><style>
                    /*Blue child*/
                    #customize-control-appointment_options-service_blink_layout_setting .image_radio_button_control .radio-button-label > img {
                        margin: 2%;
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

        $appointment_options = appointment_theme_setup_data();
        $header_setting = wp_parse_args(get_option('appointment_options', array()), $appointment_options);


        /* Service Layout section */

        // Service Layout settings
        if ((!has_custom_logo() && $header_setting['enable_header_logo_text'] == 'nomorenow' ) || $header_setting['enable_header_logo_text'] == 1 || $header_setting['upload_image_logo'] != '') {

            $wp_customize->add_setting('appointment_options[service_blink_layout_setting]', array(
                'default' => 'default',
                'sanitize_callback' => 'shk_corporate_sanitize_radio',
                'type' => 'option',
            ));
        } else {

            $wp_customize->add_setting('appointment_options[service_blink_layout_setting]', array(
                'default' => 'blink',
                'sanitize_callback' => 'shk_corporate_sanitize_radio',
                'type' => 'option',
            ));
        }

        $wp_customize->add_control(new shk_corporate_Image_Radio_Button_service_Custom_Control($wp_customize, 'appointment_options[service_blink_layout_setting]',
                        array(
                    'label' => esc_html__('Service Layout Setting', 'webriti-companion'),
                    'section' => 'service_section_head',
                    'choices' => array(
                        'default' => array(
                            'image' => WC__PLUGIN_URL . 'inc/appointment/images/shk-service-default.png',
                            'name' => esc_html__('Service Design 1', 'webriti-companion')
                        ),
                        'blink' => array(
                            'image' => WC__PLUGIN_URL . 'inc/appointment/images/shk-service-hover.png',
                            'name' => esc_html__('Service Design 2', 'webriti-companion')
                        )
                    )
                        )
        ));
    }

    add_action('customize_register', 'shk_corporate_service_slide_layout_customizer');
endif;