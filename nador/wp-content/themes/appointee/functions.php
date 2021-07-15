<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

define('APPOINTEE_PARENT_TEMPLATE_DIR_URI', get_template_directory_uri());
define('APPOINTEE_TEMPLATE_DIR_URI', get_stylesheet_directory_uri());
define('APPOINTEE_TEMPLATE_DIR', trailingslashit(get_stylesheet_directory()));

function appointee_setup() {
    require( APPOINTEE_TEMPLATE_DIR . '/function/header-widget.php' );
    require( APPOINTEE_TEMPLATE_DIR . '/function/functions.php' );
    load_theme_textdomain('appointee', APPOINTEE_TEMPLATE_DIR . '/languages');

    //About Theme
    $theme = wp_get_theme(); // gets the current theme
    if ('Appointee' == $theme->name) {
        if (is_admin()) {
            require APPOINTEE_TEMPLATE_DIR . '/admin/admin-init.php';
        }
    }
}
add_action('after_setup_theme', 'appointee_setup');

if (!function_exists('appointee_parent_css')):

    function appointee_parent_css() {
        wp_enqueue_style('appointee_parent', trailingslashit(APPOINTEE_PARENT_TEMPLATE_DIR_URI) . 'style.css', array());
    }

endif;
add_action('wp_enqueue_scripts', 'appointee_parent_css', 10);

if (!function_exists('appointee_default_css')):

    function appointee_default_css() {

        $appointee_options = theme_setup_data();
        $current_options = wp_parse_args(  get_option( 'appointment_options', array() ), $appointee_options );

        if($current_options['link_color_enable'] == true) {
            appointment_custom_light();
        }
        else {
            wp_enqueue_style('appointee_skin', trailingslashit(APPOINTEE_TEMPLATE_DIR_URI) . 'css/skin.css', array());
        }

        wp_enqueue_style('appointee_default', trailingslashit(APPOINTEE_TEMPLATE_DIR_URI) . 'css/default.css', array());
        wp_enqueue_script('appointee_custom', trailingslashit(APPOINTEE_TEMPLATE_DIR_URI) . 'js/customjs.js', array());
    }

endif;
add_action('wp_enqueue_scripts', 'appointee_default_css', 12);

if (!function_exists('wp_body_open')) {

    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }
}
 function appointee_remove_slider(){
     $appointee_options = appointment_theme_setup_data();
         $slider_setting = wp_parse_args(get_option('appointment_options', array()), $appointee_options);
         if ($slider_setting['home_banner_enabled'] == 1) {?>
             <style>
                .header {
                   position: relative;
                    background: #242526;
                }
            </style>

    <?php }
 }
 add_action('wp_head','appointee_remove_slider');

 function appointee_default_data() {

    return $theme_data = array(
        // general settings
        'footer_copyright_text' =>'<p>' . __('Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: <a href="https://webriti.com" rel="nofollow">Appointee</a> by Webriti', 'appointee') . '</p>',
        'footer_menu_bar_enabled' => '',
        'footer_social_media_enabled' => '',
        'footer_social_media_facebook_link' => '',
        'footer_facebook_media_enabled' => 0,
        'footer_social_media_twitter_link' => '',
        'footer_twitter_media_enabled' => 0,
        'footer_social_media_linkedin_link' => '',
        'footer_linkedin_media_enabled' => 0,
        'footer_social_media_skype_link' => '',
        'footer_skype_media_enabled' => 0,
        'social_media_facebook_link' => '',
        'social_media_twitter_link' => '',
        'social_media_linkedin_link' => '',
        'header_social_media_enabled' => 0,
        'facebook_media_enabled' => 0,
        'twitter_media_enabled' => 0,
        'linkedin_media_enabled' => 0,

    );
}
