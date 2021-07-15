<?php
add_action('widgets_init', 'appointment_orange_sidebar_init');

if (!function_exists('appointment_orange_sidebar_init')) {

    //orange sidebar
    register_sidebar(array(
        'name' => esc_html__('Left widget area below slider', 'webriti-companion'),
        'id' => 'home-orange-sidebar_left',
        'description' => esc_html__('Left widget area below slider', 'webriti-companion'),
        'before_widget' => '',
        'after_widget' => '<div class="clearfix"></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Right widget area below slider', 'webriti-companion'),
        'id' => 'home-orange-sidebar_right',
        'description' => esc_html__('Right widget area below slider', 'webriti-companion'),
        'before_widget' => '',
        'after_widget' => '<div class="clearfix"></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Center widget area below slider', 'webriti-companion'),
        'id' => 'home-orange-sidebar_center',
        'description' => esc_html__('Center widget area below slider', 'webriti-companion'),
        'before_widget' => '',
        'after_widget' => '<div class="clearfix"></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}