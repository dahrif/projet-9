<?php
/* Includes all style and script files
 */

function appointment_scripts() {
    $appointment_options = theme_setup_data();
    $current_options = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );

    wp_enqueue_style('appointment-style', get_stylesheet_uri());
    wp_enqueue_style('appointment-bootstrap-css', APPOINTMENT_TEMPLATE_DIR_URI . '/css/bootstrap.css');
    if($current_options['link_color_enable'] == true) {
		    appointment_custom_light();
		}
		else {
        wp_enqueue_style('appointment-default', APPOINTMENT_TEMPLATE_DIR_URI . '/css/default.css');
    }
    require_once('custom_style.php');
    wp_enqueue_style('appointment-menu-css', APPOINTMENT_TEMPLATE_DIR_URI . '/css/theme-menu.css');
    wp_enqueue_style('appointment-element-css', APPOINTMENT_TEMPLATE_DIR_URI . '/css/element.css');

    /* Font Awesome */
    wp_enqueue_style('appointment-font-awesome-min', APPOINTMENT_TEMPLATE_DIR_URI . '/css/font-awesome/css/font-awesome.min.css');
    /* Media Responsive Css */
    wp_enqueue_style('appointment-media-responsive-css', APPOINTMENT_TEMPLATE_DIR_URI . '/css/media-responsive.css');
    /* Bootstrap Js */
    wp_enqueue_script('jquery');
    wp_enqueue_script('appointment-bootstrap-js', APPOINTMENT_TEMPLATE_DIR_URI . '/js/bootstrap.min.js');
    wp_enqueue_script('appointment-menu-js', APPOINTMENT_TEMPLATE_DIR_URI . '/js/menu/menu.js');
    wp_enqueue_script('appointment-page-scroll-js', APPOINTMENT_TEMPLATE_DIR_URI . '/js/page-scroll.js');
    wp_enqueue_script('appointment-carousel-js', APPOINTMENT_TEMPLATE_DIR_URI . '/js/carousel.js');

    if (is_singular()) {
        wp_enqueue_script("comment-reply");
    }
}

add_action('wp_enqueue_scripts', 'appointment_scripts');

function appointment_custmizer_style() {
    wp_enqueue_style('appointment-customizer-css', APPOINTMENT_TEMPLATE_DIR_URI . '/css/cust-style.css');
}

add_action('customize_controls_print_styles', 'appointment_custmizer_style');

// define the customize_controls_enqueue_scripts callback
function appointment_custom_customize_enqueue() {
    wp_enqueue_script('appointment_custom-customize', APPOINTMENT_TEMPLATE_DIR_URI . '/js/custom.customize.js', array('jquery', 'customize-controls'), true);
}

;
// add the action
add_action('customize_controls_enqueue_scripts', 'appointment_custom_customize_enqueue', 10, 0);

function appointment_welcome_admin_css($hook) {

    if ('appearance_page_appointment-welcome' != $hook) {
        return;
    }
    add_action('admin_head', 'appointment_custom_admin_css');

    function appointment_custom_admin_css() {
        echo '<style>
        body {
            background: #f1f1f1;
        }
            </style>';
    }

}

add_action('admin_enqueue_scripts', 'appointment_welcome_admin_css');
