<?php
if (!function_exists('elitepress_slider')) :
	function elitepress_slider() {
	$slide_options = get_theme_mod('elitepress_slider_content');

	if(empty($slide_options))
	{
		$lite_slider_data = get_option('elitepress_lite_options');
		
		if(!empty($lite_slider_data))
		{
			
			$elitepress_lite_options=elitepress_theme_data_setup();
			$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options ); 
			$query_args =array( 'category__in' =>$current_options['slider_select_category'],'ignore_sticky_posts' => 1 );
			$slider = new WP_Query( $query_args ); 
			if( $slider->have_posts() )
				{
					while ( $slider->have_posts() ) : $slider->the_post();
					
					if( strpos( wp_strip_all_tags(get_the_excerpt()), 'Read More' ) !== false ) $button_text = esc_html__('Read More', 'webriti-companion');
						$pro_slider_data_old[] = array(
							'title'      => esc_html(get_the_title()),
							'text'       => rtrim(wp_strip_all_tags(get_the_excerpt()),'Read More'),
							'button_text'      => $button_text,
							'link'       => '#',
							'image_url'  => get_the_post_thumbnail_url(),
							'open_new_tab' => false,
							'id'         => 'customizer_repeater_56d7ea7f40b50',
					);
					endwhile; 
					$slide_options = json_encode($pro_slider_data_old);
				}
					
		}
		
	}

	$elitepress_lite_options=elitepress_theme_data_setup(); 
	$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
	$settings= array();
	$settings=array('animation'=>$current_options['animation'],'animationSpeed'=>$current_options['animationSpeed'],'slide_direction'=>$current_options['slide_direction'],'slideshowSpeed' =>$current_options['slideshowSpeed']);
	 
	wp_register_script('elitepress-slider',get_template_directory_uri().'/js/front-page/slider.js',array('jquery'));
	wp_localize_script('elitepress-slider','slider_settings',$current_options);
	wp_enqueue_script('elitepress-slider');
	?>
	<?php if($current_options['home_banner_enabled'] == true) { ?>
	<!-- Slider -->
	<section class="homepage-mycarousel">

			<div class="flexslider">
			 <div class="flex-viewport">
				<ul class="slides">
				<?php 
					$slide_options = json_decode($slide_options);
					if( $slide_options!='' )
					{
						foreach($slide_options as $slide_iteam){?>
					<li style="background-image:url(<?php echo esc_url($slide_iteam->image_url); ?>);width: 100%; height: 60vh; background-position: center center; background-size: cover; z-index: 0;">
						<?php
						$img_description =  $slide_iteam->text;
						$readmorelink = $slide_iteam->link;
						$readmore_button = $slide_iteam->button_text;
						$open_new_tab = $slide_iteam->open_new_tab;
						?>
						
						<div class="container flex-slider-center">
							<?php if($slide_iteam->title != '') { ?>
							<div class="slide-text-bg1"><h1><?php echo esc_html($slide_iteam->title); ?></h1></div>
							<?php }?>
							<?php  
								if($img_description !=''){?>
								<div class="slide-text-bg2">
								<h3><?php echo esc_html($img_description); ?></h3>
								</div>
								<?php } ?>
							
							<?php if($readmore_button != '') {?>
							<div class="flex-btn-div">
								<a href="<?php echo esc_url($readmorelink); ?>" <?php if($open_new_tab== 'yes') { echo "target='_blank'"; } ?> class="btn1 flex-btn"><?php echo esc_html($readmore_button); ?></a>
							</div>	
							<?php }?>						
	                    </div>
					</li>	
					<?php } 
					} else {
							
						$slider_default_title = array(__('Lorem ipsum dolor sit amet, consectetur.','webriti-companion'), __('Vestibulum ut ipsum!','webriti-companion'), __('Lorem ipsum dolor sit amet, consectetur.','webriti-companion'),);
							for($i=1; $i<=3; $i++) 
							{  ?>
							<li style="background-image:url(<?php echo esc_url(WC__PLUGIN_URL.'inc/elitepress/images/slider/'.$i.'.jpg');?>);width: 100%; height: 60vh; background-position: center center; background-size: cover; z-index: 0;">
						
								
								<div class="container flex-slider-center">
									<div class="slide-text-bg1"><h1><?php echo esc_html($slider_default_title[$i-1]); ?></h1>
									</div>
									<div class="slide-text-bg2"><h3><?php echo esc_html__('Lorem ipsum dolor sit amet consectetuer adipiscing elit.','webriti-companion'); ?></h3></div>
									<div class="flex-btn-div"><a class="btn1 flex-btn" href="#"><?php esc_html_e('Sed gravida', 'webriti-companion'); ?></a></div>
								</div>
							</li>
					<?php }
					}?>
				</ul>
			</div>
			</div>
	</section>
	<?php
	 } 
}
endif;

if (function_exists('elitepress_slider')) {
    $section_priority = apply_filters('elitepresss_section_priority', 11, 'elitepress_slider');
    add_action('elitepress_sections', 'elitepress_slider', absint($section_priority));
}

function elitepress_flexslider_scripts()
{	
	wp_enqueue_style('elitepress-flexslider', WC__PLUGIN_URL . '/inc/controls/flexslider/css/flexslider/flexslider.css');
	wp_enqueue_script('elitepress-jquery-flexslider', WC__PLUGIN_URL .'/inc/controls/flexslider/js/flexslider/jquery.flexslider.js');	
	wp_enqueue_script('jquery-flex-element', WC__PLUGIN_URL .'/inc/controls/flexslider/js/flexslider/flexslider-element.js');	
	
}
add_action('wp_enqueue_scripts', 'elitepress_flexslider_scripts');