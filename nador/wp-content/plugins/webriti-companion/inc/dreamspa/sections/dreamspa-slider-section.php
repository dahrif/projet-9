<?php
/**
 * slider section for the homepage.
 */
if ( ! function_exists( 'spasalon_slider' ) ) :

	function spasalon_slider() {
		
		$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), dream_spa_default_data() );
		
		$current_options = get_option( 'spa_theme_options');

		if(isset($current_options['dreamspa_slider_post'])){	
		if(is_numeric ($current_options['dreamspa_slider_post']))
		{
		$dreamspa_slider_post = isset($current_options['dreamspa_slider_post'])?   get_the_post_thumbnail_url($current_options['dreamspa_slider_post']) : WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_banner.jpg';
		}else{$dreamspa_slider_post = isset($current_options['dreamspa_slider_post'])?   $current_options['dreamspa_slider_post'] : WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_banner.jpg';
		}
		}else
		{
		$dreamspa_slider_post = WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_banner.jpg';
		}
		
		
		if(isset($current_options['slider_title'])){	
		if(is_numeric ($current_options['slider_title']))
		{
		$slider_title = isset($current_options['dreamspa_slider_post'])?   get_the_title($current_options['slider_title']) : 'The Essence of Natural Beauty';
		}
		else{
		$slider_title = $current_options['slider_title'];
		}
		}
		else{
			$slider_title = esc_html__('The Essence of Natural Beauty','webriti-companion');
		}		
		
		if(isset($current_options['slider_desc'])){	
		if(is_numeric ($current_options['slider_desc']))
		{
		$slider_desc = isset($current_options['dreamspa_slider_post'])?   get_the_content($current_options['slider_desc']) : 'We at Dream Spa provide services to the natural of the clients !';
		}else{$slider_desc = $current_options['slider_desc'];
		}
		}else{
			$slider_desc =esc_html__('We at Dream Spa provide services to the natural of the clients !','webriti-companion');
		}
		
		$home_slider_enabled = isset($current_options['home_slider_enabled'])? $current_options['home_slider_enabled']:true;
		if (  $home_slider_enabled == true ) {
		?>
		
	<!-- Slider with Thumbnails -->
<div id="main" role="main">
	<section class="slider">
		<div id="slider">
			<ul class="slide-img slides">
					<?php if($dreamspa_slider_post) { ?>
					<img alt="slide1" src="<?php echo $dreamspa_slider_post; ?>"/>	
					<?php } } ?>
					<div class="container caption-overlay text-<?php echo $current_options['slider_caption_align']; ?>">
						<?php if($slider_title) { ?>
						<h1 class="slider_txt">
						<?php  echo $slider_title; ?>
						</h1>
						<?php } if($slider_desc) { ?>
						<div class="txt">
						<p><?php echo $slider_desc; ?>
						<?php } ?>	
						</div>
						
					</div>
			</ul>
		</div>
	</section>
</div>
<!-- End of Slider with Thumbnails -->
<div class="clearfix"></div>	
<?php
	}
endif;

		if ( function_exists( 'spasalon_slider' ) ) {
		$section_priority = apply_filters( 'spa_section_priority', 10, 'spasalon_slider' );
		add_action( 'spasalon_sections', 'spasalon_slider', absint( $section_priority ) );

		}
	function companion_slider_theme_data_setup()
{	
	return $theme_options=array(
			
			//slider Section Settings
			'slider_bannerstrip_enable' => true,
			'slider_post' => WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_banner.jpg', 
		);
}