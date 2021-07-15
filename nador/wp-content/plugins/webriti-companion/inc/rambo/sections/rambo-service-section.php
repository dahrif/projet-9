<?php
/**
 * Slider section for the homepage.
 */
if ( ! function_exists( 'webriti_rambo_services' ) ) :

function webriti_rambo_services() {
$current_options = wp_parse_args(  get_option( 'rambo_pro_theme_options', array() ), rambo_theme_data_setup() );

if($current_options['home_service_enabled']==false)
{
$rambo_service_content  = ! empty($current_options['rambo_service_content']) ? $current_options['rambo_service_content'] : rambo_get_service_default();

if(empty($rambo_service_content))
	{
	$ThemeData = get_option('rambo_pro_theme_options');
	if (!empty($current_options['slider_post'])){
			
					$ServiceOldData = get_option('rambo_feature_page_widget');
	
					$the_sidebars = wp_get_sidebars_widgets();
					
					
					if(!empty($the_sidebars['sidebar-service'])){
					
					$pro_service_data = array();
					foreach ($the_sidebars['sidebar-service'] as $data) {
					
						$widget_data = explode('-',$data);
						$data  = $widget_data[1];
						if($widget_data[0] == 'rambo_feature_page_widget'){
							$options = get_option( 'widget_rambo_feature_page_widget' );
						
							$pro_service_data[] = array(
							'icon_value' => isset($options[$widget_data[1]]['icon'])? $options[$widget_data[1]]['icon'] : '',
							'image_url'  => isset($options[$widget_data[1]]['selected_page'])? get_the_post_thumbnail_url($options[$widget_data[1]]['selected_page']) :'',
							'title'      => isset($options[$widget_data[1]]['selected_page'])? get_the_title( $options[$widget_data[1]]['selected_page'] ) : '',
							'text'       => isset($options[$widget_data[1]]['selected_page'])? get_post_field('post_content', $options[$widget_data[1]]['selected_page']) : '',
							'color'		 => '#f22853',
							'button_text' => isset($options[$widget_data[1]]['buttontext'])? $options[$widget_data[1]]['buttontext'] : '',
							'link'       => isset($options[$widget_data[1]]['servicelink'])? $options[$widget_data[1]]['servicelink'] : '',
							'open_new_tab' => isset($options[$widget_data[1]]['target']) ? $options[$widget_data[1]]['target'] : '',
							'id'         => 'customizer_repeater_56d7ea7f40b56',
							
							);
						}
						
					}
					$rambo_service_content = json_encode($pro_service_data);
					
					//}
						
					}else
					{
						
						$rambo_service_content = json_encode( array(
						array(
						'icon_value' => 'fa fa-camera',
						'image_url'  => '',
						'title'      => esc_html__( 'Incredibly Flexible', 'webriti-companion' ),
						'text'       => esc_html__('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.', 'webriti-companion' ),
						'color'		 => '#f22853',
						'button_text' => esc_html__( 'Read More', 'webriti-companion' ),
						'link'       => '#',
						'open_new_tab' => 'yes',
						'choice'    => 'customizer_repeater_icon',
						'id'         => 'customizer_repeater_56d7ea7f40b56',
						),
						array(
						'icon_value' => 'fa fa-cogs',
						'image_url'  => '',
						'title'      => esc_html__( 'Powerful Admin', 'webriti-companion' ),
						'text'       => esc_html__('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.', 'webriti-companion' ),
						'color'		 => '#6dc82b',
						'button_text' => esc_html__( 'Read More', 'webriti-companion' ),
						'link'       => '#',
						'open_new_tab' => 'yes',
						'choice'    => 'customizer_repeater_icon',
						'id'         => 'customizer_repeater_56d7ea7f40b66',
						),
						array(
						'icon_value' => 'fa fa-user',
						'image_url'  => '',
						'title'      => esc_html__( 'Easy To Use', 'webriti-companion' ),
						'text'       => esc_html__('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.', 'webriti-companion' ),
						'color'		 => '#fe8000',
						'button_text' => esc_html__( 'Read More', 'webriti-companion' ),
						'link'       => '#',
						'open_new_tab' => 'yes',
						'choice'    => 'customizer_repeater_icon',
						'id'         => 'customizer_repeater_56d7ea7f40b76',
						),
						array(
						'icon_value' => 'fa fa-desktop',
						'image_url'  => '',
						'title'      => esc_html__( 'Responsive Design', 'webriti-companion' ),
						'text'       => esc_html__('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.', 'webriti-companion' ),
						'color'		 => '#1abac8',
						'button_text' => esc_html__( 'Read More', 'webriti-companion' ),
						'link'       => '#',
						'open_new_tab' => 'yes',
						'choice'    => 'customizer_repeater_icon',
						'id'         => 'customizer_repeater_56d7ea7f40b86',
						),
						
					) );
					}
					
					
				
			 
		 } 
}
function rambo_service_content( $rambo_service_content, $is_callback = false ) {
if ( ! $is_callback ) { ?>
<div class="sidebar-service">
<div class="row">
<?php } 
if ( ! empty( $rambo_service_content ) ) {

		$allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'b'      => array(),
		'i'      => array(),
		);
$rambo_service_content = json_decode( $rambo_service_content );

foreach ( $rambo_service_content as $service_item ) :
			$icon = ! empty( $service_item->icon_value ) ? apply_filters( 'rambo_translate_single_string', $service_item->icon_value, 'service section' ) : '';
			$title = ! empty( $service_item->title ) ? apply_filters( 'rambo_translate_single_string', $service_item->title, 'service section' ) : '';
			$text = ! empty( $service_item->text ) ? apply_filters( 'rambo_translate_single_string', $service_item->text, 'service section' ) : '';
			$link = ! empty( $service_item->link ) ? apply_filters( 'rambo_translate_single_string', $service_item->link, 'service section' ) : '';
			$image = ! empty( $service_item->image_url ) ? apply_filters( 'rambo_translate_single_string', $service_item->image_url, 'service section' ) : '';
			$buttontext = ! empty( $service_item->button_text ) ? apply_filters( 'rambo_translate_single_string', $service_item->button_text, 'service section' ) : '';
			$opennewtab = ! empty( $service_item->open_new_tab) ? apply_filters('rambo_translate_single_string',$service_item->open_new_tab, 'service section' ) : '';
			$choice = $service_item->choice;
	
			$color = '';
			if ( is_customize_preview() && ! empty( $service_item->color ) ) {
				$color = $service_item->color;
			}


?>
			<div class="span3 home_service">

				<?php 
					if($choice == 'customizer_repeater_image'){
				if ( ! empty( $image ) ) : ?>
					<?php if ( ! empty( $link ) ) {?>
					<a href="<?php echo esc_url( $link ); ?>" <?php if($opennewtab == 'yes'){ echo 'target="_blank"';}?>>
					<?php } ?>
					<figure class="post-thumbnail">
					<img class="services_cols_mn_icon"
						 src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
					</figure>
					<?php if ( ! empty( $link ) ) {?>
					</a>
					<?php }?>
				<?php endif; 
					} 
					if($choice == 'customizer_repeater_icon'){
					if ( ! empty( $icon ) ) :?>
							<span class="fa-stack fa-4x icon_align_center">
							<?php if ( ! empty( $link ) )
								{?>
							<a href="<?php echo esc_url( $link ); ?>" <?php if($opennewtab == 'yes'){ echo 'target="_blank"';}?>>
							<?php } ?>
								<i class="fa <?php echo esc_html( $icon ); ?> home_media_icon_1x fa-inverse" ></i>
							<?php if ( ! empty( $link ) ) {?>
							</a> <?php } ?>
					
							</span>
					<?php endif;
					}
					?>
				
				<?php if ( ! empty( $title ) ) : ?>
<a <?php if(!empty($link)){?> href="<?php echo esc_url( $link ); ?>" <?php } ?><?php if($opennewtab == 'yes'){ echo 'target="_blank"';}?>>
				<h2 class="widget-title"><?php echo esc_html( $title ); ?></h2>
				</a><?php endif; ?>
				<?php if ( ! empty( $text ) ) : ?>
			        <p><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></p>
	           	<?php endif; ?>
						<?php if(!empty($buttontext)):?>
							<?php if(!empty($link)):?>
							<p><strong><a href="<?php echo esc_url( $link ); ?>" <?php if($opennewtab =='yes'){echo "target='_blank'";} ?> ><?php echo esc_html($buttontext); ?></a></strong></p>
							<?php else: ?>
							<p><strong><a><?php echo esc_html($buttontext); ?></a></strong></p>
							<?php endif; ?>
						<?php endif; ?>	
				
			</div>
		<?php 
		endforeach;
		}
			else
		{
		$colors = array('#f22853','#6dc82b','#fe8000', '#1abac8');
		$title = array (__('Incredibly Flexible','webriti-companion'), __('Powerful Admin','webriti-companion'), __('Easy To Use','webriti-companion'), __('Responsive Design','webriti-companion'));
		$icon = array('fa fa-camera','fa fa-cogs','fa fa-user','fa fa-desktop');
		for($i=0; $i<=3; $i++) {
		?>
		
	<div id="rambo_feature_page_widget-2" class="span3 home_service widget widget_rambo_feature_page_widget"><span class="fa-stack fa-4x icon_align_center"><a href="#" target="_blank"><i class="fa <?php echo $icon[$i]; ?> home_media_icon_1x fa-inverse"></i></a></span><a href="#" target="_blank"><h2 class="widget-title"><?php echo esc_html($title[$i]); ?></h2></a><p><?php echo esc_html__('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.','webriti-companion'); ?></p><p><strong><a href="#"><?php esc_html_e('Read More','webriti-companion'); ?></a></strong></p>
	</div>
<?php } 
	}
	if ( ! $is_callback ) { ?>
		</div>
		</div>
		<?php
	
}
} ?>
<div class="home_service_section">
<div class="container">
	 <?php if( $current_options['service_title'] != '' || $current_options['service_description'] != ''){ ?>
		<div class="row-fluid featured_port_title">
		
		<?php if( $current_options['service_title'] != '') { ?>
			<h1><?php echo esc_html($current_options['service_title']); ?></h1>
		<?php } ?>
		
		<?php if( $current_options['service_description'] != '') { ?>	
			<p><?php echo esc_html($current_options['service_description']); ?></p>
	 <?php } ?>
		
		</div>
	 <?php }?>
		<!-- /Home Service Section -->
		 <?php rambo_service_content( $rambo_service_content ); ?>
		<!-- /Home Service Section -->	
</div>
</div>
<?php }

	}
		
		
	
endif;

function rambo_get_service_default() {
	
	$old_theme_servives = wp_parse_args(  get_option( 'quality_pro_options', array() ), plugin_data_setup() );
	
	//if(get_option( 'quality_pro_options')!=''){
	if($old_theme_servives['service_one_icon']!= '' || $old_theme_servives['service_one_title']!= '' || $old_theme_servives['service_one_text']!= ''  || $old_theme_servives['service_one_read_more']!= ''
			|| $old_theme_servives['service_two_icon']!= '' || $old_theme_servives['service_two_title']!= '' || $old_theme_servives['service_two_text']!= '' || $old_theme_servives['service_two_read_more']!= ''
			|| $old_theme_servives['service_three_icon']!= '' || $old_theme_servives['service_three_title']!= '' || $old_theme_servives['service_three_text']!= '' || $old_theme_servives['service_three_read_more']!= ''
			 || $old_theme_servives['service_four_icon']!= '' || $old_theme_servives['service_four_title']!= '' || $old_theme_servives['service_four_text']!= '' || $old_theme_servives['service_four_read_more']!= '')
		 {
			 //$old_theme_servives = get_option( 'quality_pro_options');
			 
			 return apply_filters(
		'quality_service_default_content', json_encode(
			array(
				array(
						 'icon_value' => isset($old_theme_servives['service_one_icon'])? $old_theme_servives['service_one_icon']:'',
						 'title'      => isset($old_theme_servives['service_one_title'])? $old_theme_servives['service_one_title']:'',
						'text'       => isset($old_theme_servives['service_one_text'])? $old_theme_servives['service_one_text']:'',
						'choice'    => 'customizer_repeater_icon',
						'button_text' => isset($old_theme_servives['service_one_read_more'])? $old_theme_servives['service_one_read_more']:'',
						'link'       => '#',
						'open_new_tab' => 'no',
						 ),
						array(
						 'icon_value' => isset($old_theme_servives['service_two_icon'])? $old_theme_servives['service_two_icon']:'',
						 'title'      => isset($old_theme_servives['service_two_title'])? $old_theme_servives['service_two_title']:'',
						 'text'       => isset($old_theme_servives['service_two_text'])? $old_theme_servives['service_two_text']:'',
						 'choice'    => 'customizer_repeater_icon',
						 'button_text' => isset($old_theme_servives['service_two_read_more'])? $old_theme_servives['service_two_read_more']:'',
						 'link'       => '#',
						 'open_new_tab' => 'no',
						 ),
						 array(
						 'icon_value' => isset($old_theme_servives['service_three_icon'])? $old_theme_servives['service_three_icon']:'',
						 'title'      => isset($old_theme_servives['service_three_title'])? $old_theme_servives['service_three_title']:'',
						 'text'       => isset($old_theme_servives['service_three_text'])? $old_theme_servives['service_three_text']:'',
						 'choice'    => 'customizer_repeater_icon',
						 'button_text' => isset($old_theme_servives['service_three_read_more'])? $old_theme_servives['service_three_read_more']:'',
						 'link'       => '#',
						 'open_new_tab' => 'no',
						),
						
						 array(
						 'icon_value' => isset($old_theme_servives['service_four_icon'])? $old_theme_servives['service_four_icon']:'',
						 'title'      => isset($old_theme_servives['service_four_title'])? $old_theme_servives['service_four_title']:'',
						 'text'       => isset($old_theme_servives['service_four_text'])? $old_theme_servives['service_four_text']:'',
						 'choice'    => 'customizer_repeater_icon',
						  'button_text' => isset($old_theme_servives['service_four_read_more'])? $old_theme_servives['service_four_read_more']:'',
						 'link'       => '#',
						 'open_new_tab' => 'no',
						),
						
					
			)
		)
	);	 
		 } 
		 //}
	else {
	return apply_filters(
		'quality_service_default_content', json_encode(
			array(
				array(
					'icon_value' => 'fa fa-cogs txt-pink',
					'title'      => esc_html__( 'Minima Veniam', 'webriti-companion' ),
					'text'       => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'webriti-companion' ),
					'choice'    => 'customizer_repeater_icon',
					'link'       => '#',
					'open_new_tab' => 'no',
				),
				array(
					'icon_value' => 'fa fa-mobile txt-pink',
					'title'      => esc_html__( 'Numquam Eius', 'webriti-companion' ),
					'text'       => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'webriti-companion' ),
					'link'       => '#',
					'choice'    => 'customizer_repeater_icon',
					'open_new_tab' => 'no',
				),
				array(
					'icon_value' => 'fa fa-users txt-pink',
					'title'      => esc_html__( 'Voluptatem Quia', 'webriti-companion' ),
					'text'       => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'webriti-companion' ),
					'choice'    => 'customizer_repeater_icon',
					'link'       => '#',
					'open_new_tab' => 'no',
				),
				array(
					'icon_value' => 'fa fa-laptop txt-pink',
					'title'      => esc_html__( 'Magna Aliqua', 'webriti-companion' ),
					'text'       => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'webriti-companion' ),
					'choice'    => 'customizer_repeater_icon',
					'link'       => '#',
					'open_new_tab' => 'no',
				),				
				
			)
		)
	);
	}
}

if ( function_exists( 'webriti_rambo_services' ) ) {
$section_priority = apply_filters( 'honeypress_section_priority', 11, 'webriti_rambo_services' );
add_action( 'rambo_business_template_sections', 'webriti_rambo_services', absint( $section_priority ) );
}

function plugin_data_setup()
{	

			return $theme_options=array(
			'service_one_title' => esc_html__('Minima Veniam','webriti-companion'),
			'service_two_title' => esc_html__('Numquam Eius','webriti-companion'),
			'service_three_title' => esc_html__('Voluptatem Quia','webriti-companion'),
			'service_four_title' => esc_html__('Magna Aliqua','webriti-companion'),
			
			'service_one_icon' => 'fa fa-cogs txt-pink',
			'service_two_icon' => 'fa fa-mobile txt-pink',
			'service_three_icon' => 'fa fa-users txt-pink',
			'service_four_icon' => 'fa fa-laptop txt-pink',
			
			'service_one_text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'webriti-companion' ),
			'service_two_text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'webriti-companion' ),
			'service_three_text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'webriti-companion' ),
			'service_four_text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'webriti-companion' ),

			'service_one_read_more' => esc_html__('Sed ut','webriti-companion'),
			'service_two_read_more' => esc_html__('Sed ut','webriti-companion'),
			'service_three_read_more' => esc_html__('Sed ut','webriti-companion'),
			'service_four_read_more' => esc_html__('Sed ut','webriti-companion'),
			
		);
}