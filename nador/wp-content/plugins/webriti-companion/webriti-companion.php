<?php
/*
  Plugin Name: Webriti Companion
  Description: Enhances Webriti themes with extra functionality.
  Version: 1.8.3
  Author: Webriti
  Author URI: https://www.webriti.com
  Text Domain: webriti-companion
 */
define('WC__PLUGIN_URL', plugin_dir_url(__FILE__));
define('WC__PLUGIN_DIR', plugin_dir_path(__FILE__));

if (!function_exists('webriti_companion_activate')) {

    function webriti_companion_activate() {
        $theme = wp_get_theme(); // gets the current theme

        if ('Quality' == $theme->name || 'Quality blue' == $theme->name || 'Quality orange' == $theme->name || 'Quality green' == $theme->name || 'Mazino' == $theme->name || 'Heroic' == $theme->name || 'Quality child' == $theme->name || 'Quality Child' == $theme->name) {

            require_once('inc/controls/customizer-repeater/functions.php' );
            require_once('inc/controls/customizer-alpha-color-picker/class-quality-customize-alpha-color-control.php');
            require_once('inc/quality/features/feature-service-section.php');
            require_once('inc/quality/features/feature-project-section.php');
            require_once('inc/quality/features/feature-funfact-section.php');
            require_once('inc/quality/features/feature-testimonial-section.php');
            require_once('inc/quality/sections/quality-portfolio-section.php');
            require_once('inc/quality/sections/quality-features-section.php');
            require_once('inc/quality/sections/quality-funfact-section.php');
            require_once('inc/quality/sections/quality-testimonial-section.php');
            require_once('inc/quality/customizer.php');

        }



        if ('Spasalon' == $theme->name || 'Spasalon child' == $theme->name || 'Spasalon Child' == $theme->name) {
            require_once('inc/spasalon/features/feature-slider-section.php');
            require_once('inc/spasalon/features/feature-service-section.php');
            require_once('inc/spasalon/features/feature-project-section.php');
            require_once('inc/spasalon/sections/spasalon-slider-section.php');
            require_once('inc/spasalon/sections/spasalon-portfolio-section.php');
            require_once('inc/spasalon/sections/spasalon-features-section.php');
            require_once('inc/spasalon/customizer.php');
        }

        if ('Dream Spa' == $theme->name) {
            require_once('inc/dreamspa/features/feature-slider-section.php');
            require_once('inc/spasalon/features/feature-service-section.php');
            require_once('inc/spasalon/features/feature-project-section.php');
            require_once('inc/dreamspa/sections/dreamspa-slider-section.php');
            require_once('inc/spasalon/sections/spasalon-portfolio-section.php');
            require_once('inc/spasalon/sections/spasalon-features-section.php');
            require_once('inc/spasalon/customizer.php');
        }

        if ('Appointee'== $theme->name || 'Appointment' == $theme->name || 'Appointment Green' == $theme->name || 'Appointment Blue' == $theme->name || 'Appointment Red' == $theme->name || 'vice'== $theme->name || 'Appointment Child' == $theme->name || 'Appointment child' == $theme->name || 'Mandy' == $theme->name || 'Shk Corporate'== $theme->name ) {
            require_once('inc/appointment/features/feature-service-section.php');
            require_once('inc/appointment/features/feature-homecallout-section.php');
            require_once('inc/appointment/features/feature-slider-section.php');
            require_once('inc/appointment/sections/appointment-slider-section.php');
            require_once('inc/appointment/sections/appointment-service-section.php');
            require_once('inc/appointment/sections/appointment-homecallout-section.php');
            require_once('inc/appointment/sections/appointment-sidebar-orange.php');
            require_once('inc/appointment/additional_feature.php');
        }

        if ('Appointment Dark' == $theme->name){
            require_once('inc/appointment/features/feature-service-section.php');
            require_once('inc/appointment/features/feature-homecallout-section.php');
            require_once('inc/appointment/features/feature-slider-section.php');
            require_once('inc/appointment/features/feature-footer-callout-section.php');
            require_once('inc/appointment/sections/appointment-slider-section.php');
            require_once('inc/appointment/sections/appointment-service-section.php');
            require_once('inc/appointment/sections/appointment-homecallout-section.php');
            require_once('inc/appointment/sections/appointment-footer-callout-section.php');
            require_once('inc/appointment/sections/appointment-sidebar-orange.php');
            require_once('inc/appointment/additional_feature.php');
        }

        if ( 'Wallstreet' == $theme->name || 'Bluestreet' == $theme->name || 'Leo' == $theme->name || 'Wallstreet Light' == $theme->name || 'Wallstreet child' == $theme->name || 'Wallstreet Child' == $theme->name || 'Wallstreet Agency' == $theme->name){
            require_once('inc/wallstreet/features/feature-slider-section.php');
            require_once('inc/wallstreet/features/feature-service-section.php');
            require_once('inc/wallstreet/features/feature-project-section.php');
            require_once('inc/wallstreet/features/feature-heading-section.php');
            require_once('inc/wallstreet/sections/wallstreet-static-banner-section.php');
            require_once('inc/wallstreet/sections/wallstreet-service-section.php');
            require_once('inc/wallstreet/sections/wallstreet-portfolio-section.php');
            require_once('inc/wallstreet/sections/wallstreet-header-top-layer-section.php');

        }
        if ( 'Rambo' == $theme->name || 'Rambo child' == $theme->name || 'Rambo Child' == $theme->name){
            require_once('inc/rambo/features/feature-slider-section.php');
            require_once('inc/rambo/features/feature-cta-section.php');
            require_once('inc/rambo/features/feature-service-section.php');
            require_once('inc/rambo/features/feature-project-section.php');
            require_once('inc/rambo/sections/rambo-slider-section.php');
            require_once('inc/rambo/sections/rambo-cta-section.php');
            require_once('inc/rambo/sections/rambo-service-section.php');
            require_once('inc/rambo/sections/rambo-project-section.php');
           require_once('inc/rambo/customizer.php');
            }
        if ('Spicy' == $theme->name || 'WorkPress' == $theme->name || 'Mambo' == $theme->name || 'Redify' == $theme->name ){
            require_once('inc/rambo/features/feature-slider-section.php');
            require_once('inc/rambo/features/feature-cta-section.php');
            require_once('inc/rambo/features/feature-service-section.php');
            require_once('inc/rambo/features/feature-project-section.php');
            require_once('inc/rambo/sections/rambo-slider-section.php');
            require_once('inc/rambo/sections/rambo-cta-section.php');
            require_once('inc/rambo/sections/rambo-child-service-section.php');
            require_once('inc/rambo/sections/rambo-project-section.php');
           require_once('inc/rambo/customizer.php');
        }

        if ( 'ElitePress' == $theme->name || 'WorkSpace' == $theme->name  || 'ElitePress child' == $theme->name || 'ElitePress Child' == $theme->name)
            {
            require_once('inc/elitepress/features/feature-slider-section.php');
            require_once('inc/elitepress/features/feature-service-section.php');
            require_once('inc/elitepress/features/feature-project-section.php');
            require_once('inc/elitepress/features/feature-homecallout-section.php');
            require_once('inc/elitepress/sections/elitepress-portfolio-section.php');
            require_once('inc/elitepress/sections/elitepress-service-section.php');
            require_once('inc/elitepress/sections/elitepress-slider-section.php');
            require_once('inc/elitepress/sections/elitepress-top-call-out-section.php');
            }
        if ( 'Busiprof' == $theme->name || 'LazyProf' == $theme->name || 'vdequator' == $theme->name  || 'ARzine' == $theme->name  || 'vdperanto' == $theme->name || 'Busiprof Agency' == $theme->name || 'Busiprof child' == $theme->name || 'Busiprof Child' == $theme->name )
            {
            require_once('inc/busiprof/features/feature-slider-section.php');
            require_once('inc/busiprof/features/feature-cta-section.php');
            require_once('inc/busiprof/features/feature-service-section.php');
            require_once('inc/busiprof/features/feature-project-section.php');
            require_once('inc/busiprof/features/feature-testi-section.php');
            require_once('inc/busiprof/sections/busiprof-slider-section.php');
            require_once('inc/busiprof/sections/busiprof-service-section.php');
            require_once('inc/busiprof/sections/busiprof-project-section.php');
            require_once('inc/busiprof/sections/busiprof-testi-section.php');
            require_once('inc/busiprof/customizer.php');
            require_once('inc/controls/Image_Radio_Button/webriti_companion_image_radio_button.php');
            }
    }

}

add_action('init', 'webriti_companion_activate');


$theme = wp_get_theme();
if ('Quality' == $theme->name || 'Quality blue' == $theme->name || 'Quality orange' == $theme->name || 'Quality green' == $theme->name || 'Mazino' == $theme->name || 'Heroic' == $theme->name || 'Quality child' == $theme->name || 'Quality Child' == $theme->name) {


    register_activation_hook(__FILE__, 'webriti_companion_install_function');

    function webriti_companion_install_function() {
        $item_details_page = get_option('item_details_page');
        if (!$item_details_page) {
            //post status and options
            $post = array(
                'comment_status' => 'closed',
                'ping_status' => 'closed',
                'post_author' => 1,
                'post_date' => date('Y-m-d H:i:s'),
                'post_name' => 'Home',
                'post_status' => 'publish',
                'post_title' => 'Home',
                'post_type' => 'page',
            );
            //insert page and save the id
            $newvalue = wp_insert_post($post, false);
            if ($newvalue && !is_wp_error($newvalue)) {
                update_post_meta($newvalue, '_wp_page_template', 'template-business.php');

                // Use a static front page
                $page = get_page_by_title('Home');
                update_option('show_on_front', 'page');
                update_option('page_on_front', $page->ID);
            }
            //save the id in the database
            update_option('item_details_page', $newvalue);
        }
    }

} else if ('Spasalon' == $theme->name || 'Spasalon child' == $theme->name || 'Spasalon Child' == $theme->name) {


    register_activation_hook(__FILE__, 'webriti_companion_install_function');

    function webriti_companion_install_function() {
        $ThemeFrontPage = get_option('spasalon_theme_front_page');
        if (!$ThemeFrontPage) {
            //post status and options
            $post = array(
                'comment_status' => 'closed',
                'ping_status' => 'closed',
                'post_author' => 1,
                'post_date' => date('Y-m-d H:i:s'),
                'post_name' => 'Home',
                'post_status' => 'publish',
                'post_title' => 'Home',
                'post_type' => 'page',
            );
            //insert page and save the id
            $newvalue = wp_insert_post($post, false);
            if ($newvalue && !is_wp_error($newvalue)) {
                update_post_meta($newvalue, '_wp_page_template', 'template-front-page.php');

                // Use a static front page
                $page = get_page_by_title('Home');
                update_option('show_on_front', 'page');
                update_option('page_on_front', $page->ID);
            }
            //save the id in the database
            update_option('spasalon_theme_front_page', $newvalue);
        }
    }

} else if ('Appointment' == $theme->name || 'Appointment Green' == $theme->name || 'Appointment Blue' == $theme->name || 'Appointment Red' == $theme->name || 'Appointment Dark' == $theme->name ||  'Appointment Child' == $theme->name || 'Appointment child' == $theme->name || 'Mandy' == $theme->name || 'Shk Corporate' == $theme->name || 'Appointee' == $theme->name ) {
    register_activation_hook(__FILE__, 'webriti_companion_install_function');

    function webriti_companion_install_function() {
        $AppointThemeFrontPage = get_option('appointment_theme_front_page');
        if (!$AppointThemeFrontPage) {
            //post status and options
            $post = array(
                'comment_status' => 'closed',
                'ping_status' => 'closed',
                'post_author' => 1,
                'post_date' => date('Y-m-d H:i:s'),
                'post_name' => 'Home',
                'post_status' => 'publish',
                'post_title' => 'Home',
                'post_type' => 'page',
            );
            //insert page and save the id
            $newvalue = wp_insert_post($post, false);
            if ($newvalue && !is_wp_error($newvalue)) {
                update_post_meta($newvalue, '_wp_page_template', 'template-homepage.php');

                // Use a static front page
                $page = get_page_by_title('Home');
                update_option('show_on_front', 'page');
                update_option('page_on_front', $page->ID);
            }
            //save the id in the database
            update_option('appointment_theme_front_page', $newvalue);
        }
    }

} else if('Wallstreet' == $theme->name || 'Bluestreet' == $theme->name || 'Leo' == $theme->name || 'Wallstreet Light' == $theme->name || 'Wallstreet Child' == $theme->name || 'Wallstreet child' == $theme->name || 'Wallstreet Agency' == $theme->name){
    register_activation_hook( __FILE__, 'webriti_companion_install_function');
    function webriti_companion_install_function()
    {
        $WallstreetThemeFrontPage = get_option('wallstreet_theme_front_page');
        if(!$WallstreetThemeFrontPage){
            //post status and options
            $post = array(
                  'comment_status' => 'closed',
                  'ping_status' =>  'closed' ,
                  'post_author' => 1,
                  'post_date' => date('Y-m-d H:i:s'),
                  'post_name' => 'Home',
                  'post_status' => 'publish' ,
                  'post_title' => 'Home',
                  'post_type' => 'page',
            );
            //insert page and save the id
            $newvalue = wp_insert_post( $post, false );
            if ( $newvalue && ! is_wp_error( $newvalue ) ){
                update_post_meta( $newvalue, '_wp_page_template', 'template-homepage.php' );

                // Use a static front page
                $page = get_page_by_title('Home');
                update_option( 'show_on_front', 'page' );
                update_option( 'page_on_front', $page->ID );

            }
            //save the id in the database
            update_option( 'wallstreet_theme_front_page', $newvalue );
        }
    }

}else if('ElitePress' == $theme->name || 'WorkSpace' == $theme->name || 'ElitePress Child' == $theme->name || 'ElitePress child' == $theme->name){
register_activation_hook( __FILE__, 'webriti_companion_install_function');
function webriti_companion_install_function()
{
    $ElitePressThemeFrontPage = get_option('elitepress_theme_front_page');
    if(!$ElitePressThemeFrontPage){
        //post status and options
        $post = array(
              'comment_status' => 'closed',
              'ping_status' =>  'closed' ,
              'post_author' => 1,
              'post_date' => date('Y-m-d H:i:s'),
              'post_name' => 'Home',
              'post_status' => 'publish' ,
              'post_title' => 'Home',
              'post_type' => 'page',
        );
        //insert page and save the id
        $newvalue = wp_insert_post( $post, false );
        if ( $newvalue && ! is_wp_error( $newvalue ) ){
            update_post_meta( $newvalue, '_wp_page_template', 'template-frontpage.php' );

            // Use a static front page
            $page = get_page_by_title('Home');
            update_option( 'show_on_front', 'page' );
            update_option( 'page_on_front', $page->ID );

        }
        //save the id in the database
        update_option( 'elitepress_theme_front_page', $newvalue );
    }
}
} else if ('Dream Spa' == $theme->name) {


    register_activation_hook(__FILE__, 'webriti_companion_install_function');

    function webriti_companion_install_function() {
        $ThemeFrontPage = get_option('spasalon_theme_front_page');
        if (!$ThemeFrontPage) {
            //post status and options
            $post = array(
                'comment_status' => 'closed',
                'ping_status' => 'closed',
                'post_author' => 1,
                'post_date' => date('Y-m-d H:i:s'),
                'post_name' => 'Home',
                'post_status' => 'publish',
                'post_title' => 'Home',
                'post_type' => 'page',
            );
            //insert page and save the id
            $newvalue = wp_insert_post($post, false);
            if ($newvalue && !is_wp_error($newvalue)) {
                update_post_meta($newvalue, '_wp_page_template', 'template-front-page.php');

                // Use a static front page
                $page = get_page_by_title('Home');
                update_option('show_on_front', 'page');
                update_option('page_on_front', $page->ID);
            }
            //save the id in the database
            update_option('spasalon_theme_front_page', $newvalue);
        }
    }

}
else if ( 'Rambo' == $theme->name || 'Spicy' == $theme->name || 'WorkPress' == $theme->name || 'Mambo' == $theme->name || 'Redify' == $theme->name || 'Rambo Child' == $theme->name || 'Rambo child' == $theme->name){

register_activation_hook( __FILE__, 'webriti_companion_install_function');
function webriti_companion_install_function()
{
    $item_details_page = get_option('item_details_page');
    if(!$item_details_page){
        //post status and options
        $post = array(
              'comment_status' => 'closed',
              'ping_status' =>  'closed' ,
              'post_author' => 1,
              'post_date' => date('Y-m-d H:i:s'),
              'post_name' => 'Home',
              'post_status' => 'publish' ,
              'post_title' => 'Home',
              'post_type' => 'page',
        );
        //insert page and save the id
        $newvalue = wp_insert_post( $post, false );
        if ( $newvalue && ! is_wp_error( $newvalue ) ){
            update_post_meta( $newvalue, '_wp_page_template', 'template-frontpage.php' );

            // Use a static front page
            $page = get_page_by_title('Home');
            update_option( 'show_on_front', 'page' );
            update_option( 'page_on_front', $page->ID );

        }
        //save the id in the database
        update_option( 'item_details_page', $newvalue );
    }
}
  }


else if ( 'Busiprof' == $theme->name  || 'LazyProf' == $theme->name  || 'vdequator' == $theme->name   || 'ARzine' == $theme->name  || 'vdperanto' == $theme->name || 'Busiprof Agency' == $theme->name || 'Busiprof child' == $theme->name || 'Busiprof Child' == $theme->name ){

register_activation_hook( __FILE__, 'webriti_companion_install_function');
function webriti_companion_install_function()
{

    $item_details_page = get_option('item_details_page');
    if(!$item_details_page){
        //post status and options
        $post = array(
              'comment_status' => 'closed',
              'ping_status' =>  'closed' ,
              'post_author' => 1,
              'post_date' => date('Y-m-d H:i:s'),
              'post_name' => 'Home',
              'post_status' => 'draft' ,
              'post_title' => 'Home',
              'post_type' => 'post',
        );
        //insert page and save the id
        $newvalue = wp_insert_post( $post, false );
        if ( $newvalue && ! is_wp_error( $newvalue ) ){
            update_post_meta( $newvalue, '_wp_page_template', 'front-page.php' );

            // Use a static front page
          //  $page = get_page_by_title('Home');
            update_option( 'show_on_front', 'posts' );
           // update_option( 'page_on_front', $page->ID );

        }
        //save the id in the database
        update_option( 'item_details_page', $newvalue );
    }


}
  }

// Feedback Form
if ('Quality' == $theme->name || 'Quality blue' == $theme->name || 'Quality orange' == $theme->name || 'Quality green' == $theme->name || 'Mazino' == $theme->name || 'Heroic' == $theme->name || 'Quality child' == $theme->name || 'Quality Child' == $theme->name) {
    add_action('switch_theme', 'qualitytheme_deactivate_message');

    function qualitytheme_deactivate_message() {
        $theme = wp_get_theme();
        if ($theme->template != 'quality') {
            require_once('inc/feedback-pop-up-form.php');
        }
    }

}
add_action( 'init', 'webriti_companion_load_textdomain' );
/**
 * Load plugin textdomain.
 */
function webriti_companion_load_textdomain() {
  load_plugin_textdomain( 'webriti-companion', false, plugin_dir_url(__FILE__). 'languages' );

}
