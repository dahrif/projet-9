<?php
// Template Name: Home Page

get_header();
$appointee_options = appointment_theme_setup_data();
$appointee_news_setting = wp_parse_args(get_option('appointment_options', array()), $appointee_options);
?>	
<div class="clearfix"></div>
<?php if(!function_exists('webriti_companion_activate')){ get_template_part('index','banner'); }?> 
<div id="wrap"></div>
<?php
do_action('appointment_sections', false);
if ($appointee_news_setting['home_blog_enabled'] == 0) {
    get_template_part('index', 'news');
}
get_footer();