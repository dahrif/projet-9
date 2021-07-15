<?php

add_action('widgets_init', 'appointee_widgets_init');

function appointee_widgets_init() {

    register_sidebar(array(
        'name' => esc_html__('Sidebar widget area', 'appointee'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Sidebar widget area', 'appointee'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar-widget-title"><h3>',
        'after_title' => '</h3></div>',
    ));

//Header sidebar
    register_sidebar(array(
        'name' => esc_html__('Top header left area', 'appointee'),
        'id' => 'home-header-sidebar_left',
        'description' => esc_html__('Top header left area', 'appointee'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Top header right area', 'appointee'),
        'id' => 'home-header-sidebar_right',
        'description' => esc_html__('Top header right area', 'appointee'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}


    /**
     * @return boolean Checks value of checkbox
     */
    if (!function_exists('appointee_sanitize_checkbox')) {
                //checkbox box sanitization function
        function appointee_sanitize_checkbox($checked) {
            // Boolean check.
            return ( ( isset($checked) && true == $checked ) ? 1 : 0 );
        }
    }


function appointee_sticky_menu() {
    ?>
    <script type="text/javascript">
        /* ---------------------------------------------- /*
         * Navbar menu sticky
         /* ---------------------------------------------- */

        (function ($) {
            $(window).bind('scroll', function () {
                if ($(window).scrollTop() > 200) {
                    $('.header').addClass('stickymenu1');
                    $('.header').slideDown();
                } else {
                    $('.header').removeClass('stickymenu1');
                    $('.header').attr('style', '');
                }
            });
        })(jQuery);

    </script><?php

}

add_action('wp_footer', 'appointee_sticky_menu');


function appointee_title_padding() {
        wp_localize_script(
                'appointee_custom',
                'logocheck',
                array(
                    'txt' => (get_theme_mod('header_text') == 0) ? 0 : 1,
                    'logo' => (has_custom_logo()) ? 1 : 0
        ));
    }

add_action('wp_enqueue_scripts','appointee_title_padding',12);

add_action('after_setup_theme', 'appointee_remove_action', 0);

function appointee_remove_action() {
    remove_action('customize_register', 'appointment_copyright_customizer');
}

function appointee_copyright_customizer($wp_customize) {

    $wp_customize->add_panel('appointment_copyright_setting', array(
        'priority' => 700,
        'capability' => 'edit_theme_options',
        'title' => esc_html__('Footer copyright settings', 'appointee'),
    ));

    $wp_customize->add_section(
            'copyright_section_one',
            array(
                'title' => esc_html__('Footer copyright settings', 'appointee'),
                'priority' => 35,
                'panel' => 'appointment_copyright_setting',
            )
    );


    $wp_customize->add_setting(


            'appointment_options[footer_copyright_text]',
            array(
                'default' => '<p>' . __('Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: <a href="https://webriti.com" rel="nofollow">Appointee</a> by Webriti', 'appointee') . '</p>',
                'sanitize_callback' => 'appointee_footer_copyright_sanitize_html',
                'type' => 'option'
            )
    );
    $wp_customize->add_control(
            'appointment_options[footer_copyright_text]',
            array(
                'label' => esc_html__('Copyright text', 'appointee'),
                'section' => 'copyright_section_one',
                'type' => 'text',
            )
    );
    $wp_customize->add_setting(
            'appointment_options[footer_menu_bar_enabled]', array(
        'sanitize_callback' => 'appointee_sanitize_checkbox',
        'type' => 'option'
    ));

    $wp_customize->add_control(
            'appointment_options[footer_menu_bar_enabled]',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Hide copyright text', 'appointee'),
                'section' => 'copyright_section_one',
            )
    );

    //Footer social link
    $wp_customize->add_section(
            'copyright_social_icon',
            array(
                'title' => esc_html__('Social Links', 'appointee'),
                'priority' => 45,
                'panel' => 'appointment_copyright_setting',
            )
    );


    //Hide Index Service Section

    $wp_customize->add_setting(
            'appointment_options[footer_social_media_enabled]',
            array(
                'default' => 0,
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointee_sanitize_checkbox',
                'type' => 'option'
            )
    );
    $wp_customize->add_control(
            'appointment_options[footer_social_media_enabled]',
            array(
                'label' => esc_html__('Hide footer social icons', 'appointee'),
                'section' => 'copyright_social_icon',
                'type' => 'checkbox',
            )
    );

    // Facebook link
    $wp_customize->add_setting(
            'appointment_options[footer_social_media_facebook_link]',
            array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[footer_social_media_facebook_link]',
            array(
                'label' => esc_html__('Facebook URL', 'appointee'),
                'section' => 'copyright_social_icon',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[footer_facebook_media_enabled]', array(
        'default' => 0,
        'sanitize_callback' => 'appointee_sanitize_checkbox',
        'type' => 'option'
    ));

    $wp_customize->add_control(
            'appointment_options[footer_facebook_media_enabled]',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Open link in new tab', 'appointee'),
                'section' => 'copyright_social_icon',
            )
    );

    //twitter link

    $wp_customize->add_setting(
            'appointment_options[footer_social_media_twitter_link]',
            array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
                'type' => 'option'
            )
    );
    $wp_customize->add_control(
            'appointment_options[footer_social_media_twitter_link]',
            array(
                'label' => esc_html__('Twitter URL', 'appointee'),
                'section' => 'copyright_social_icon',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[footer_twitter_media_enabled]', array(
        'sanitize_callback' => 'appointee_sanitize_checkbox',
        'default' => 0,
        'type' => 'option'
    ));

    $wp_customize->add_control(
            'appointment_options[footer_twitter_media_enabled]',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Open link in new tab', 'appointee'),
                'section' => 'copyright_social_icon',
            )
    );
    //Linkdin link

    $wp_customize->add_setting(
            'appointment_options[footer_social_media_linkedin_link]',
            array(
                'type' => 'option',
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            )
    );
    $wp_customize->add_control(
            'appointment_options[footer_social_media_linkedin_link]',
            array(
                'label' => esc_html__('LinkedIn URL', 'appointee'),
                'section' => 'copyright_social_icon',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[footer_linkedin_media_enabled]', array(
        'default' => 0,
        'sanitize_callback' => 'appointee_sanitize_checkbox',
        'type' => 'option',
    ));

    $wp_customize->add_control(
            'appointment_options[footer_linkedin_media_enabled]',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Open link in new tab', 'appointee'),
                'section' => 'copyright_social_icon',
            )
    );

    //Skype link

    $wp_customize->add_setting(
            'appointment_options[footer_social_media_skype_link]',
            array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[footer_social_media_skype_link]',
            array(
                'label' => esc_html__('Skype URL', 'appointee'),
                'section' => 'copyright_social_icon',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[footer_skype_media_enabled]', array(
        'default' => 0,
        'sanitize_callback' => 'appointee_sanitize_checkbox',
        'type' => 'option',
    ));

    $wp_customize->add_control(
            'appointment_options[footer_skype_media_enabled]',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Open link in new tab', 'appointee'),
                'section' => 'copyright_social_icon',
            )
    );

    if (!function_exists('appointee_footer_copyright_sanitize_html')):

        function appointee_footer_copyright_sanitize_html($input) {
            return wp_kses_post(force_balance_tags($input));
        }

    endif;
}

add_action('customize_register', 'appointee_copyright_customizer', 10);

function appointee_header_customizer($wp_customize) {

    /* Header Section */
    $wp_customize->add_panel('header_options', array(
        'priority' => 450,
        'capability' => 'edit_theme_options',
        'title' => esc_html__('Header settings', 'appointee'),
    ));

    //Header social Icon

    $wp_customize->add_section(
            'header_social_icon',
            array(
                'title' => esc_html__('Social links', 'appointee'),
                'priority' => 600,
                'panel' => 'header_options',
            )
    );

    //Show and hide Header Social Icons
    $wp_customize->add_setting(
            'appointment_options[header_social_media_enabled]'
            ,
            array(
                'default' => 0,
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'appointee_sanitize_checkbox',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[header_social_media_enabled]',
            array(
                'label' => esc_html__('Hide Header Social icons', 'appointee'),
                'section' => 'header_social_icon',
                'type' => 'checkbox',
            )
    );




    // Facebook link
    $wp_customize->add_setting(
            'appointment_options[social_media_facebook_link]',
            array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[social_media_facebook_link]',
            array(
                'label' => esc_html__('Facebook URL', 'appointee'),
                'section' => 'header_social_icon',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[facebook_media_enabled]', array(
        'default' => 0,
        'sanitize_callback' => 'appointee_sanitize_checkbox',
        'type' => 'option',
    ));

    $wp_customize->add_control(
            'appointment_options[facebook_media_enabled]',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Open link in new tab', 'appointee'),
                'section' => 'header_social_icon',
                'disabled' => 'disabled',
            )
    );

    //twitter link

    $wp_customize->add_setting(
            'appointment_options[social_media_twitter_link]',
            array(
                'default' => '',
                'type' => 'theme_mod',
                'sanitize_callback' => 'esc_url_raw',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[social_media_twitter_link]',
            array(
                'label' => esc_html__('Twitter URL', 'appointee'),
                'section' => 'header_social_icon',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[twitter_media_enabled]'
            , array(
        'default' => 0,
        'sanitize_callback' => 'appointee_sanitize_checkbox',
        'type' => 'option',
    ));

    $wp_customize->add_control(
            'appointment_options[twitter_media_enabled]',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Open link in new tab', 'appointee'),
                'section' => 'header_social_icon',
            )
    );
    //Linkdin link

    $wp_customize->add_setting(
            'appointment_options[social_media_linkedin_link]',
            array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
                'type' => 'option',
            )
    );
    $wp_customize->add_control(
            'appointment_options[social_media_linkedin_link]',
            array(
                'label' => esc_html__('LinkedIn URL', 'appointee'),
                'section' => 'header_social_icon',
                'type' => 'text',
            )
    );

    $wp_customize->add_setting(
            'appointment_options[linkedin_media_enabled]'
            , array(
        'default' => 0,
        'sanitize_callback' => 'appointee_sanitize_checkbox',
        'type' => 'option',
    ));

    $wp_customize->add_control(
            'appointment_options[linkedin_media_enabled]',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Open link in new tab', 'appointee'),
                'section' => 'header_social_icon',
            )
    );
}

add_action('customize_register', 'appointee_header_customizer',10);

function appointee_sanitize_text($input) {
            return wp_kses_post(force_balance_tags($input));
        }
