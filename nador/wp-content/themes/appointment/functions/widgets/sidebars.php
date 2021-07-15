<?php

add_action('widgets_init', 'appointment_widgets_init');

function appointment_widgets_init() {

    /* sidebar */
    register_sidebar(array(
        'name' => esc_html__('Sidebar widget area', 'appointment'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Sidebar widget area', 'appointment'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar-widget-title"><h3>',
        'after_title' => '</h3></div>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer widget area', 'appointment'),
        'id' => 'footer-widget-area',
        'description' => esc_html__('Footer widget area', 'appointment'),
        'before_widget' => '<div class="col-md-3 col-sm-6 footer-widget-column">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Right widget area below slider', 'appointment'),
        'id' => 'home-orange-sidebar_right',
        'description' => esc_html__('Right widget area below slider', 'appointment'),
        'before_widget' => '',
        'after_widget' => '<div class="clearfix"></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Center widget area below slider', 'appointment'),
        'id' => 'home-orange-sidebar_center',
        'description' => esc_html__('Center widget area below slider', 'appointment'),
        'before_widget' => '',
        'after_widget' => '<div class="clearfix"></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}