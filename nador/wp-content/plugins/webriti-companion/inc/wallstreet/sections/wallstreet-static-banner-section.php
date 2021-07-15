<?php
/**
 * Static banner section for the homepage.
 */
if (!function_exists('wallstreet_static_banner_section()')) :

    function wallstreet_static_banner_section() {
$wallstreet_pro_options=wallstreet_theme_data_setup();
$current_options = wp_parse_args(  get_option( 'wallstreet_pro_options', array() ), $wallstreet_pro_options );
$theme = wp_get_theme();
if ($current_options['slider_image']=='slider' && $theme->name == 'Leo' && version_compare(wp_get_theme()->get('Version'), '1.2.4') > 0 ) {
	$current_options['slider_image']=WC__PLUGIN_URL .'/inc/wallstreet/images/slider/leo-slider.jpg';
}
elseif($current_options['slider_image']=='slider' && $theme->name == 'Bluestreet' && version_compare(wp_get_theme()->get('Version'), '1.2.7') > 0){
	$current_options['slider_image']=WC__PLUGIN_URL .'/inc/wallstreet/images/slider/bluestreet-slider.jpg';
}
elseif($current_options['slider_image']=='slider' && $theme->name == 'Wallstreet Agency' ){
	$current_options['slider_image']=WC__PLUGIN_URL .'/inc/wallstreet/images/slider/wallstreet-agency.jpg';
}
elseif($current_options['slider_image']=='slider' &&  $theme->name == 'Wallstreet' || $current_options['slider_image']=='slider' &&  $theme->name == 'Wallstreet child' || $current_options['slider_image']=='slider' &&  $theme->name == 'Wallstreet Child'){
	$current_options['slider_image']=WC__PLUGIN_URL .'/inc/wallstreet/images/slider/slider.jpg';
}?>
<!-- /Slider Section -->
<?php if($current_options['home_banner_enabled'] == true) { ?>
<div class="homepage_mycarousel">
	<div class="static-banner" style="background-image:url(<?php echo esc_url($current_options['slider_image']); ?>);width: 100%; height: 90vh; background-position: center center; background-size: cover; z-index: 0;">
		<div class="flex-slider-center">
		<?php if($current_options['slider_title_one']){ ?>
			<div class="slide-text-bg1"><h2><?php echo esc_html($current_options['slider_title_one']); ?></h2></div>
			<?php } ?>
			<?php if($current_options['slider_title_two']){ ?>
			<div class="slide-text-bg2"><h1><?php echo esc_html($current_options['slider_title_two']); ?></h1></div>
			<?php } ?>
			<?php if($current_options['slider_description']) { ?>
			<div class="slide-text-bg3"><p><?php echo esc_html($current_options['slider_description']); ?></p></div>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
</div>
<?php
}
endif;

if (function_exists('wallstreet_static_banner_section')) {
    $section_priority = apply_filters('wallstreet_section_priority', 10, 'wallstreet_static_banner_section');
    add_action('wallstreet_sections', 'wallstreet_static_banner_section', absint($section_priority));
}
