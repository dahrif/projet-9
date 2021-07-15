<?php
/**
 * Slider section for the homepage.
 */
if ( ! function_exists( 'webriti_rambo_child_services' ) ) :

function webriti_rambo_child_services() {
$current_options = wp_parse_args(  get_option( 'rambo_pro_theme_options', array() ), rambo_theme_data_setup() );

if($current_options['home_service_enabled']==false)
{
$rambo_child_service_content  = ! empty($current_options['rambo_service_content']) ? $current_options['rambo_service_content'] : rambo_child_get_service_default();

if(empty($rambo_child_service_content))
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
					$rambo_child_service_content = json_encode($pro_service_data);
					
					//}
						
					}else
					{
						
						$rambo_service_content = json_encode( array(
							array(
							'icon_value' => 'fa-arrows-alt',
							'image_url'  => '',
							'title'      => esc_html__( 'Minima Veniam', 'webriti-companion' ),
							'text'       => esc_html__('Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.', 'webriti-companion' ),
							'button_text' => esc_html__( 'Sed ut', 'webriti-companion' ),
							'link'       => '#',
							'open_new_tab' => 'yes',
							'choice'    => 'customizer_repeater_icon',
							'id'         => 'customizer_repeater_56d7ea7f40b56',
							),
							array(
							'icon_value' => 'fa-thumbs-o-up',
							'image_url'  => '',
							'title'      => esc_html__( 'Numquam Eius', 'webriti-companion' ),
							'text'       => esc_html__('Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.', 'webriti-companion' ),
							'button_text' => esc_html__( 'Sed ut', 'webriti-companion' ),
							'link'       => '#',
							'open_new_tab' => 'yes',
							'choice'    => 'customizer_repeater_icon',
							'id'         => 'customizer_repeater_56d7ea7f40b66',
							),
							array(
							'icon_value' => 'fa-laptop',
							'image_url'  => '',
							'title'      => esc_html__( 'Voluptatem Quia', 'webriti-companion' ),
							'text'       => esc_html__('Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.', 'webriti-companion' ),
							'button_text' => esc_html__( 'Sed ut', 'webriti-companion' ),
							'link'       => '#',
							'open_new_tab' => 'yes',
							'choice'    => 'customizer_repeater_icon',
							'id'         => 'customizer_repeater_56d7ea7f40b76',
							),
						) );
					}
					
					
				
			 
		 } 
}
function rambo_child_service_content( $rambo_child_service_content, $is_callback = false ) {
	if ( ! $is_callback ) { ?>
		<div class="row-fluid">
	<?php } 
	if ( ! empty( $rambo_child_service_content ) ) {
		$allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'b'      => array(),
		'i'      => array(),
		);
	$rambo_child_service_content = json_decode( $rambo_child_service_content );
	foreach ( $rambo_child_service_content as $service_item ) :
			$icon = ! empty( $service_item->icon_value ) ? apply_filters( 'rambo_translate_single_string', $service_item->icon_value, 'service section' ) : '';
			$title = ! empty( $service_item->title ) ? apply_filters( 'rambo_translate_single_string', $service_item->title, 'service section' ) : '';
			$text = ! empty( $service_item->text ) ? apply_filters( 'rambo_translate_single_string', $service_item->text, 'service section' ) : '';
			$link = ! empty( $service_item->link ) ? apply_filters( 'rambo_translate_single_string', $service_item->link, 'service section' ) : '';
			$image = ! empty( $service_item->image_url ) ? apply_filters( 'rambo_translate_single_string', $service_item->image_url, 'service section' ) : '';
			$buttontext = ! empty( $service_item->button_text ) ? apply_filters( 'rambo_translate_single_string', $service_item->button_text, 'service section' ) : '';
			$opennewtab = ! empty( $service_item->open_new_tab) ? apply_filters('rambo_translate_single_string',$service_item->open_new_tab, 'service section' ) : '';
			$choice = $service_item->choice;?>
			<div class="span4 home_service">
				<div class="service-post">
				<?php if($choice == 'customizer_repeater_image'){
					if ( ! empty( $image ) ) : ?>
						<div class="service-box">
							<img class="services_cols_mn_icon"
							 src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
						</div>	
					<?php endif; 
				} 
				if($choice == 'customizer_repeater_icon'){
					if ( ! empty( $icon ) ) :?>
						<div class="service-box">							
							<i class="fa <?php echo esc_html( $icon ); ?>" ></i>									
						</div>
					<?php endif;
				}?>
				
				<?php if ( (! empty( $title )) || (! empty( $text ))) : ?>
					<div class="service-area">
						<?php if ( ! empty( $title ) ) : ?>				
							<h2 class="widget-title">
								<a <?php if(!empty($link)){?> href="<?php echo esc_url( $link ); ?>" <?php } ?><?php if($opennewtab == 'yes'){ echo 'target="_blank"';}?>>
								<?php echo esc_html( $title ); ?>
								</a>
							</h2>
						<?php endif;
						if ( ! empty( $text ) ) : ?>
					        <p><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></p>
						<?php endif;				
		           		if(!empty($buttontext)):
							if(!empty($link)):?>
								<a class="home_service_btn" href="<?php echo esc_url( $link ); ?>"><i class="fa fa-angle-double-right"></i> <?php echo esc_html($buttontext); ?></a>
							<?php endif;
						endif;?>
					</div>
				<?php endif;?>
				</div>
			</div> 
		<?php endforeach;
		}else{
		$title = array (__('Minima Veniam','webriti-companion'), __('Numquam Eius','webriti-companion'), __('Voluptatem Quia','webriti-companion'));
		$icon = array('fa-arrows-alt','fa-thumbs-o-up','fa-laptop');
		for($i=0; $i<=2; $i++) {?>
			<div class="span4 home_service">
				<div class="service-post">
					<div class="service-box">
						<i class="fa <?php echo $icon[$i]; ?>"></i>
					</div>
					<div class="service-area">
						<h2 class="widget-title"><a href="#" target="_blank"><?php echo esc_html($title[$i]); ?></a></h2>
						<p><?php echo esc_html__('Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.','webriti-companion');?>	
						</p>
						<a class="home_service_btn" href="#"><i class="fa fa-angle-double-right"></i><?php esc_html_e('Read More','webriti-companion'); ?></a>
					</div>
				</div>
			</div>
		<?php } 
		}
		if ( ! $is_callback ) { ?>
				</div>
		<?php }
} 

if(wp_get_theme()->name=='Redify'){
    $service_class='services3';
}elseif(wp_get_theme()->name=='WorkPress'){
    $service_class='services4';
}elseif(wp_get_theme()->name=='Mambo'){
    $service_class='services2';
}

?>
<div class="<?php echo $service_class; ?>">
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
		 <?php rambo_child_service_content( $rambo_child_service_content ); ?>
		<!-- /Home Service Section -->	
	</div>
</div>
<?php }

}
		
		
	
endif;

function rambo_child_get_service_default() {
	
	$old_theme_servives = wp_parse_args(  get_option( 'quality_pro_options', array() ), rambo_child_plugin_data_setup() );
	
	//if(get_option( 'quality_pro_options')!=''){
	if($old_theme_servives['service_one_icon']!= '' || $old_theme_servives['service_one_title']!= '' || $old_theme_servives['service_one_text']!= ''  || $old_theme_servives['service_one_read_more']!= ''
			|| $old_theme_servives['service_two_icon']!= '' || $old_theme_servives['service_two_title']!= '' || $old_theme_servives['service_two_text']!= '' || $old_theme_servives['service_two_read_more']!= ''
			|| $old_theme_servives['service_three_icon']!= '' || $old_theme_servives['service_three_title']!= '' || $old_theme_servives['service_three_text']!= '' || $old_theme_servives['service_three_read_more']!= ''
			 || $old_theme_servives['service_four_icon']!= '' || $old_theme_servives['service_four_title']!= '' || $old_theme_servives['service_four_text']!= '' || $old_theme_servives['service_four_read_more']!= '')
		 {
			 //$old_theme_servives = get_option( 'quality_pro_options');
			 
			 return apply_filters(
		'rambo_child_service_default_content', json_encode(
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
					
			)
		)
	);	 
		 } 
		 //}
	else {
	return apply_filters(
		'rambo_child_service_default_content', json_encode(
			array(
				array(
					'icon_value' => 'fa-arrows-alt',
					'title'      => esc_html__( 'Minima Veniam', 'webriti-companion' ),
					'text'       => esc_html__('Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.', 'webriti-companion' ),
					'choice'    => 'customizer_repeater_icon',
					'link'       => '#',
					'open_new_tab' => 'no',
				),
				array(
					'icon_value' => 'fa-thumbs-o-up',
					'title'      => esc_html__( 'Numquam Eius', 'webriti-companion' ),
					'text'       => esc_html__('Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.', 'webriti-companion' ),
					'link'       => '#',
					'choice'    => 'customizer_repeater_icon',
					'open_new_tab' => 'no',
				),
				array(
					'icon_value' => 'fa-laptop',
					'title'      => esc_html__( 'Voluptatem Quia', 'webriti-companion' ),
					'text'       => esc_html__('Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.', 'webriti-companion' ),
					'choice'    => 'customizer_repeater_icon',
					'link'       => '#',
					'open_new_tab' => 'no',
				),	
			)
		)
	);
	}
}

if ( function_exists( 'webriti_rambo_child_services' ) ) {
$section_priority = apply_filters( 'honeypress_section_priority', 11, 'webriti_rambo_child_services' );
add_action( 'rambo_business_template_sections', 'webriti_rambo_child_services', absint( $section_priority ) );
}

function rambo_child_plugin_data_setup()
{	

			return $theme_options=array(
			'service_one_title' => esc_html__('Minima Veniam','webriti-companion'),
			'service_two_title' => esc_html__('Numquam Eius','webriti-companion'),
			'service_three_title' => esc_html__('Voluptatem Quia','webriti-companion'),
			
			'service_one_icon' => 'fa-arrows-alt',
			'service_two_icon' => 'fa-thumbs-o-up',
			'service_three_icon' => 'fa-laptop',
			
			'service_one_text' => esc_html__('Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.', 'webriti-companion' ),
			'service_two_text' => esc_html__('Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.', 'webriti-companion' ),
			'service_three_text' => esc_html__('Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.', 'webriti-companion' ),
			
			'service_one_read_more' => esc_html__('Sed ut','webriti-companion'),
			'service_two_read_more' => esc_html__('Sed ut','webriti-companion'),
			'service_three_read_more' => esc_html__('Sed ut','webriti-companion'),			
		);
}