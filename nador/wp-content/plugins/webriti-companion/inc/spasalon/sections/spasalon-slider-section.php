<?php
/**
 * slider section for the homepage.
 */
if ( ! function_exists( 'spasalon_slider' ) ) :

	function spasalon_slider() {
		
		$spa_theme_options= companion_slider_theme_data_setup(); 
		$current_theme_content = wp_parse_args(  get_option( 'spa_theme_options', array() ), $spa_theme_options ); 
		
		$current_options = get_option( 'spa_theme_options');

if(isset($current_options['slider_post'])){	
if(is_numeric ($current_options['slider_post']))
{
$slider_post = isset($current_options['slider_post'])?   get_the_post_thumbnail_url($current_options['slider_post']) : WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_banner.jpg';
}else{$slider_post = isset($current_options['slider_post'])?   $current_options['slider_post'] : WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_banner.jpg';
}
}else
{
$slider_post = WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_banner.jpg';
}
if(isset($current_options['slider_thumbnail_one'])){
if(is_numeric ($current_options['slider_thumbnail_one']))
{
	
$slider_thumbnail_one = isset($current_options['slider_thumbnail_one'])? get_the_post_thumbnail_url($current_options['slider_thumbnail_one']) : WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_thumb.jpg';
}else{$slider_thumbnail_one = isset($current_options['slider_thumbnail_one'])? $current_options['slider_thumbnail_one'] : WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_thumb.jpg';
}
}else{
	$slider_thumbnail_one = WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_thumb.jpg';
}

if(isset($current_options['slider_thumbnail_two'])){
if(is_numeric ($current_options['slider_thumbnail_two']))
{
$slider_thumbnail_two = isset($current_options['slider_thumbnail_two'])? get_the_post_thumbnail_url($current_options['slider_thumbnail_two']) : WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_thumb-2.jpg';
}else{$slider_thumbnail_two = isset($current_options['slider_thumbnail_two'])? $current_options['slider_thumbnail_two'] : WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_thumb-2.jpg';
}

}else{
	$slider_thumbnail_two = WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_thumb-2.jpg';
}
if(isset($current_options['slider_thumbnail_three'])){
if(is_numeric ($current_options['slider_thumbnail_three']))
{
$slider_thumbnail_three = isset($current_options['slider_thumbnail_three'])? get_the_post_thumbnail_url($current_options['slider_thumbnail_three']) : WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_thumb-3.jpg';
}else{$slider_thumbnail_three = isset($current_options['slider_thumbnail_three'])? $current_options['slider_thumbnail_three'] : WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_thumb-3.jpg';
}
}else{
	$slider_thumbnail_three = WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_thumb-3.jpg';
}

		$home_slider_enabled = isset($current_options['home_slider_enabled'])? $current_options['home_slider_enabled']:true;
		$slider_thumbnails_enable = isset($current_options['slider_thumbnails_enable'])? $current_options['slider_thumbnails_enable']:true;
		$line_one    = isset($current_options['line_one'])? $current_options['line_one'] : esc_html__('Suspendisse','webriti-companion');
		$line_two    = isset($current_options['line_two'])? $current_options['line_two'] : esc_html__('Rutrum','webriti-companion');
		$description   = isset($current_options['description'])? $current_options['description'] : esc_html__('Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris.','webriti-companion');
		$call_us_text    = isset($current_options['call_us_text'])? $current_options['call_us_text'] : esc_html__('Aenean quis lorem','webriti-companion');
		$call_us    = isset($current_options['call_us'])? $current_options['call_us'] : esc_html__('999 999 9999','webriti-companion');
		
		if (  $home_slider_enabled == true ) {
		?>
		
	<!-- Slider with Thumbnails -->
<div id="main" role="main">
	<section class="slider" id="wrapper">
		<div id="slider">
			<ul class="slide-img slides">
					<?php if($slider_post) { ?>
					<img alt="slide1" src="<?php echo esc_url($slider_post); ?>"/>	
					<?php } if( $current_theme_content['slider_bannerstrip_enable'] == true ) { ?>
					<div class="container topbar-detail">
						<div class="col-md-3">
							<div class="title">
								<?php if($line_one) { ?>
								<h4><?php echo esc_html($line_one) ;  ?></h4> <?php } if($line_two) { ?>
								<h1><?php echo esc_html($line_two); ?></h1>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-6">
							<?php if($description) { ?>
							<p class="description">
								<?php echo  esc_html($description);  ?>
							</p>
							<?php } ?>
						</div>
						<div class="col-md-3"><div class="addr-detail"><address>
						
						<?php  if($call_us_text) { echo esc_html($call_us_text); }  if($call_us) { ?> <strong><?php echo esc_html($call_us); ?></strong> <?php } ?></address></div></div>
					</div>
					
				<?php 
					}
				?>
			</ul>
		</div>
		<?php if( $slider_thumbnails_enable  == true ) { ?>
		<div class="container thumb-caption-detail">
			<div class="row">
				<div id="carousel">
					<div class="slider-thumb-container container padding-none">
						<div class="one-slide-thumb thumb-img-container">
							<?php 	
							 if($slider_thumbnail_one) {  ?>
							<img src="<?php echo esc_url($slider_thumbnail_one); ?>"  class="slider-thumb" />
							<?php } ?>
						</div>
						<div class="two-slide-thumb thumb-img-container">
							<?php 	
							 if($slider_thumbnail_two) {  ?>
							<img src="<?php echo esc_url($slider_thumbnail_two); ?>"  class="slider-thumb" />
							<?php } ?>
						</div>
						<div class="three-slide-thumb thumb-img-container">
							<?php 	
							 if($slider_thumbnail_three) {  ?>
							<img src="<?php echo esc_url($slider_thumbnail_three); ?>"  class="slider-thumb" />
							<?php } ?>
						</div>
					</div>				
				</div>
			</div>
		</div>
		<?php } ?>
	</section>
</div>
<!-- End of Slider with Thumbnails -->
<div class="clearfix"></div>	
<?php
	} }
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
			'slider_thumbnail_one' => WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_thumb.jpg',
		    'slider_thumbnail_two' => WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_thumb-2.jpg',
			'slider_thumbnail_three' => WC__PLUGIN_URL .'/inc/spasalon/images/slider/home_thumb-3.jpg',
		);
}