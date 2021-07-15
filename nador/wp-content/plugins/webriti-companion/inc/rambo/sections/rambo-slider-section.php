<?php
/**
 * Slider section for the homepage.
 */
if ( ! function_exists( 'webriti_rambo_slider' ) ) :

	function webriti_rambo_slider() {

		$rambo_pro_theme_options = rambo_theme_data_setup();
		$current_options = wp_parse_args(  get_option( 'rambo_pro_theme_options', array() ), $rambo_pro_theme_options );
		
		$current_options = get_option( 'rambo_pro_theme_options');

		if(isset($current_options['slider_post'])){	
		if(is_numeric ($current_options['slider_post']))
		{
		$slider_post = isset($current_options['slider_post'])?   get_the_post_thumbnail_url($current_options['slider_post']) : WC__PLUGIN_URL.'/inc/rambo/img/slider.jpg';
		}else{$slider_post = isset($current_options['slider_post'])?   $current_options['slider_post'] : WC__PLUGIN_URL.'/inc/rambo/img/slider.jpg';
		}
		}else
		{
		$slider_post = WC__PLUGIN_URL.'/inc/rambo/img/slider.jpg';
		}
	
				if(isset($current_options['slider_post']))
		{	
			if(is_numeric ($current_options['slider_post']))
			{
		 	  $slider_title = get_the_title( $current_options['slider_post'] );
			}
			else
			{
				$slider_title = isset($current_options['slider_title'])?   $current_options['slider_title'] : esc_html__('Sit Voluptatem Accusantium','webriti-companion');
			}
		}
		else
		{
			$slider_title = isset($current_options['slider_title'])?   $current_options['slider_title'] : esc_html__('Sit Voluptatem Accusantium', 'webriti-companion' );
		}
		if(isset($current_options['slider_post']))
		{	
			if(is_numeric ($current_options['slider_post']))
				{
					$slider_text=apply_filters('get_the_content', get_post_field('post_content', $current_options['slider_post']));
		
				}
			else
				{
					$slider_text = isset($current_options['slider_text'])?   $current_options['slider_text'] : esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','webriti-companion');
				}
		}
		else
		{
			$slider_text = isset($current_options['slider_text'])?   $current_options['slider_text'] : esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','webriti-companion');
		}
				$home_banner_enabled = isset($current_options['home_banner_enabled'])? $current_options['home_banner_enabled']:true;
		if (  $home_banner_enabled == true ) {
			
			
		$rambo_pro_theme_options = rambo_theme_data_setup();
		$current_options = wp_parse_args(  get_option( 'rambo_pro_theme_options', array() ), $rambo_pro_theme_options );
		
		?>
		
	<!-- Slider with Thumbnails -->
<div class="main_slider">
	<div class="carousel-inner">
		<!-- Carousel items -->
		<div id="post-<?php the_ID(); ?>" class="item active">
			<div class="item" style="background-image:url(<?php echo $slider_post; ?>); width: 100%; height: 60vh; background-position: center center; background-size: cover; z-index: 0;" >
			<div class="container slider_con">
				<?php if($slider_title) { ?>
				<h2><?php echo esc_html($slider_title); ?></h2>
				<?php } if($slider_text) { ?>
				<h5 class="slide-title">
				<span>
				<?php echo esc_html($slider_text);  ?>
				</span>
				</h5>
				<?php } ?>
				<?php if($current_options['slider_readmore_text']!=''){ ?>
							<a class="slide-btn" href="<?php echo esc_url($current_options['readmore_text_link']); ?>" <?php if(
							$current_options['readmore_target'] == true) { echo "target='_blank'"; } ?> class="flex-btn"><?php echo esc_html($current_options['slider_readmore_text']); ?></a>
				<?php } ?>
			</div>
			</div>
		</div>
	</div>
</div>
<?php }


	}
		
		
	
endif;
if ( function_exists( 'webriti_rambo_slider' ) ) {
$section_priority = apply_filters( 'honeypress_section_priority', 11, 'webriti_rambo_slider' );
add_action( 'rambo_business_template_sections', 'webriti_rambo_slider', absint( $section_priority ) );
}