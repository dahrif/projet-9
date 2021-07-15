<?php
if ( ! function_exists( 'webriti_busiprof_slider' ) ) :
function webriti_busiprof_slider() {
$current_options = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), busiprof_theme_setup_data() );

$img_name=explode('/', $current_options['slider_image']);

$theme = wp_get_theme();
if ( $theme->name == 'LazyProf' && version_compare(wp_get_theme()->get('Version'), '1.2.5') > 0  && end($img_name) =='home_slide.jpg') {
	$current_options['slider_image']=WC__PLUGIN_URL.'inc/busiprof/img/home_lazyprof_slide.jpg';
}
elseif( $theme->name == 'vdequator' && version_compare(wp_get_theme()->get('Version'), '1.0.9') > 0 && end($img_name) =='home_slide.jpg'){
	$current_options['slider_image']=WC__PLUGIN_URL.'inc/busiprof/img/home_vdequator_slide.jpg';
}
elseif(  $theme->name == 'vdperanto' && version_compare(wp_get_theme()->get('Version'), '2.0','>=') && end($img_name) =='home_slide.jpg'){
	$current_options['slider_image']=WC__PLUGIN_URL.'inc/busiprof/img/home_vdperanto_slide.png';
}
elseif(  $theme->name == 'Busiprof Agency' && end($img_name) =='home_slide.jpg' ){
	$current_options['slider_image'] = WC__PLUGIN_URL.'inc/busiprof/img/home_busiprof_agency_slide.jpg';
}

if($current_options['home_page_slider_enabled']=="on"){
if( $current_options['home_banner_strip_enabled'] == 'on' && $current_options['slider_head_title'] != '' ) { ?>
<div class="clearfix"></div>
<!-- Slider -->
<?php }
$busiprof_feature_slide=$current_options['slider_image'];
	?>
<div id="main" role="main">
	<section class="slider">
		<ul class="slides">
				<li>
					<div class="item" style="background-image:url(<?php echo esc_url($busiprof_feature_slide); ?>); width: 100%; height: 70vh; background-color: #ccc; background-position: center center; background-size: cover; z-index: 0;" >
					<?php if($current_options['caption_head'] || $current_options['caption_text'] || $current_options['readmore_text_link']|| $current_options['readmore_text']):?>
					<div class="container">
						<div class="slide-caption">
							<?php if($current_options['caption_head']!='') {?>
							<h2><?php echo esc_html($current_options['caption_head']); ?></h2>
							<?php } if($current_options['caption_text']!='') {?>
							<p><?php echo esc_html($current_options['caption_text']); ?></p>
							<?php } ?>
							<?php if($current_options['readmore_text_link']!=''){ ?>
							<div><a href="<?php echo esc_url($current_options['readmore_text_link']); ?>"
							<?php if($current_options['readmore_target'] !=false) { ?>
							target="_blank" <?php } ?> class="flex-btn"><?php echo esc_html($current_options['readmore_text']); ?></a>
							</div>
							<?php }?>
						</div>
					</div>
					<?php endif;?>
					</div>
				</li>
			</ul>
	</section>
</div>
<!-- End of Slider -->
<div class="clearfix"></div>
<?php
 if( $current_options['home_banner_strip_enabled'] == 'on') {?>
<section class="header-title"><h2><?php echo esc_html($current_options['slider_head_title']); ?> </h2></section>
<div class="clearfix"></div>
<?php }
}
}
endif;

if ( function_exists( 'webriti_busiprof_slider' ) ) {
$section_priority = apply_filters( 'busiprof_section_priority', 11, 'webriti_busiprof_slider' );
add_action( 'busiprof_home_template_sections', 'webriti_busiprof_slider', absint( $section_priority ) );
}
