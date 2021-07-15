<?php
$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), spasalon_default_data() );

if ( ! function_exists( 'spasalon_features' ) ) :

	function spasalon_features() {
		
		$current_options = get_option( 'spa_theme_options');
		$hide_section = isset($current_options['service_hide'])? $current_options['service_hide']:true;
	
		$spasalon_service_title    = isset($current_options['tagline_title'])? $current_options['tagline_title'] : esc_html__('Morbi finibus luctus lacus','webriti-companion');
		$spasalon_service_subtitle = isset($current_options['tagline_contents'])?$current_options['tagline_contents']: esc_html__('In commodo pulvinar metus, id tristique massa ultrices at. Nulla auctor turpis ut mi pulvinar eu accumsan risus sagittis. Mauris nunc ligula, ullamcorper vitae accumsan eu,congue in nulla. Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.','webriti-companion');
		$spasalon_service_content  = ! empty($current_options['spasalon_service_content']) ? $current_options['spasalon_service_content'] : spasalon_get_service_default();
		if(empty($spasalon_service_content))
	{
	$ServiceOldData = get_option('widget_wbr_feature_page_widget');
	
	$the_sidebars = wp_get_sidebars_widgets();
	//Print_r($the_sidebars['sidebar-service']);
	if(!empty($the_sidebars['sidebar-service'])){
		//print_r("Hello in else");
	$pro_service_data = array();
	foreach ($the_sidebars['sidebar-service'] as $data) {
	
		$widget_data = explode('-',$data);
		$data  = $widget_data[1];
		//print_r($widget_data[0]);
		$options = get_option( 'widget_wbr_feature_page_widget' );
		if($widget_data[0] == 'wbr_feature_page_widget'){
			$options = get_option( 'widget_wbr_feature_page_widget' );
			print_r($options);
			$pro_service_data[] = array(
			'icon_value' => '',
			'image_url'  => get_the_post_thumbnail_url($options[$widget_data[1]]['selected_page']),
			'title'      => get_the_title($options[$widget_data[1]]['selected_page']),
			'text'       => get_post_field('post_content', $options[$widget_data[1]]['selected_page']),
			'choice'    => 'customizer_repeater_icon',
			'color'		 => '#f22853',
			'link'       => '#',
			'open_new_tab' => 'no',
			'id'         => 'customizer_repeater_56d7ea7f40b56',
			);
		}
		
	}
	return apply_filters(
					'spasalon_service_default_content', json_encode($pro_service_data)
					);
	
	}
	else {		
	return apply_filters(
		'spasalon_service_default_content', json_encode(
			array(
				array(
				'icon_value' => 'fa fa-leaf',
				'image_url'  => '',
				'title'      => esc_html__( 'Aenean quis', 'webriti-companion' ),
				'text'       => esc_html__('An veritus voluptatum vim, no duo veritus ocurreret. Stet rebum hendrerit pro an, omnesque salutandi theophrastus ne pri.', 'webriti-companion' ),
				'choice'    => 'customizer_repeater_icon',
				'color'		 => '#f22853',
				'link'       => '#',
				'open_new_tab' => 'no',

				),
				array(
				'icon_value' => 'fa fa-street-view',
				'image_url'  => '',
				'title'      => esc_html__( 'Nullam sapien', 'webriti-companion' ),
				'text'       => esc_html__('An veritus voluptatum vim, no duo veritus ocurreret. Stet rebum hendrerit pro an, omnesque salutandi theophrastus ne pri.', 'webriti-companion' ),
				'choice'    => 'customizer_repeater_icon',
				'color'		 => '#6dc82b',
				'link'       => '#',
				'open_new_tab' => 'no',
				
				),
				array(
				'icon_value' => 'fa fa-user',
				'image_url'  => '',
				'title'      => esc_html__( 'Ullamcorper tortor', 'webriti-companion' ),
				'text'       => esc_html__('An veritus voluptatum vim, no duo veritus ocurreret. Stet rebum hendrerit pro an, omnesque salutandi theophrastus ne pri.', 'webriti-companion' ),
				'choice'    => 'customizer_repeater_icon',
				'color'		 => '#fe8000',
				'link'       => '#',
				'open_new_tab' => 'no',
				
				),
				array(
				'icon_value' => 'fa fa-lemon-o',
				'image_url'  => '',
				'title'      => esc_html__( 'Scelerisque molestie', 'webriti-companion' ),
				'text'       => esc_html__('An veritus voluptatum vim, no duo veritus ocurreret. Stet rebum hendrerit pro an, omnesque salutandi theophrastus ne pri.', 'webriti-companion' ),
				'choice'    => 'customizer_repeater_icon',
				'color'		 => '#1abac8',
				'link'       => '#',
				'open_new_tab' => 'no',

				),
			)
		)
	);
	}
}

if( $hide_section == true ):

?>

<!-- Service Section -->

<section id="section" class="service">

	<div class="container">
	
		<!-- Section Title -->
		
		<div class="row">
		
			<div class="col-md-12">
			
				<div class="section-header">
				
				<?php
					if ( ! empty( $spasalon_service_title ) || is_customize_preview() ) {
						echo '<h1 class="section-title txt-color">' . esc_html( $spasalon_service_title ) . '</h1>';
					}
					if ( ! empty( $spasalon_service_subtitle ) || is_customize_preview() ) {
						echo '<p class="section-subtitle">' . esc_html( $spasalon_service_subtitle ) . '</p>';
					}
				?>
				
				</div>
				
			</div>
			
		</div>
		<!-- /Section Title -->	
		<?php
		
		spasalon_service_content($spasalon_service_content);
		?>
	</div>
	
</section>

<!-- End of Service Section -->

<div class="clearfix"></div>

<?php endif; 
		
		}
		
	endif;
	

function spasalon_service_content( $spasalon_service_content, $is_callback = false ) {

	if ( ! $is_callback ) {
	?>
	
		<?php
	}
	if ( ! empty( $spasalon_service_content ) ) :
		

		$allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'b'      => array(),
		'i'      => array(),
		);
		$spasalon_service_content = json_decode( $spasalon_service_content );
			echo '<div id="service_content_section">';
				echo '<div class="row">';
		foreach ( $spasalon_service_content as $service_item ) :
			$icon = ! empty( $service_item->icon_value ) ? apply_filters( 'spasalon_translate_single_string', $service_item->icon_value, 'service section' ) : '';
			$title = ! empty( $service_item->title ) ? apply_filters( 'spasalon_translate_single_string', $service_item->title, 'service section' ) : '';
			$text = ! empty( $service_item->text ) ? apply_filters( 'spasalon_translate_single_string', $service_item->text, 'service section' ) : '';
			$link = ! empty( $service_item->link ) ? apply_filters( 'spasalon_translate_single_string', $service_item->link, 'service section' ) : '';
			$image = ! empty( $service_item->image_url ) ? apply_filters( 'spasalon_translate_single_string', $service_item->image_url, 'service section' ) : '';
			$opennewtab = ! empty( $service_item->open_new_tab) ? apply_filters('spasalon_translate_single_string',$service_item->open_new_tab, 'service section' ) : '';
			
			$color = '';
			if ( is_customize_preview() && ! empty( $service_item->color ) ) {
				$color = $service_item->color;
			}
			
			?>
			<div class="col-md-3 col-sm-6 col-xs-12 service-box">
			<div class="post text-center">
							<?php
                            if($service_item->choice == 'customizer_repeater_image'){
								if ( ! empty( $image ) ) : ?>
									<?php if ( ! empty( $link ) ) : ?>
										<a href="<?php echo esc_url( $link ); ?>" <?php if($opennewtab== "yes"){ echo "target='_blank'";} ?>>
									<?php endif; ?>
									<figure class="post-thumbnail">
									<img class="services_cols_mn_icon"
										 src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
									</figure>	 
									<?php if ( ! empty( $link ) ) : ?>
										</a>
									<?php endif; ?>
								<?php endif; 
							}  else if($service_item->choice =='customizer_repeater_icon'){
							?>
							
                            <?php if ( ! empty( $icon ) ) :?>
							
								<?php if ( ! empty( $link ) ) : ?>
									<a href="<?php echo esc_url( $link ); ?>" <?php if($opennewtab== "yes"){ echo "target='_blank'";} ?>>
								<?php endif; ?>	
				
									<figure class="post-thumbnail service-icon">
										<i class="fa <?php echo esc_attr( $icon ); ?> " <?php if ( ! empty( $color ) ) { echo 'style="background-color:' . $color . '"'; } ?>></i>
									</figure>							
									
								<?php if ( ! empty( $link ) ) : ?>
									</a>
								<?php endif; ?>

                            <?php endif; ?>								
								
							<?php } ?>	
			
						<?php if ( ! empty( $title ) ) : ?>
										<div class="entry-header">
										<h4 class="entry-title">
										<?php if ( ! empty( $link ) ) : ?>
												<a href="<?php echo esc_url( $link ); ?>" <?php if($opennewtab== "yes"){ echo "target='_blank'";} ?>>
										<?php endif; ?>
										<?php echo esc_html( $title ); ?>
											<?php if ( ! empty( $link ) ) : ?>
												</a>
										<?php endif; ?>
										</h4>
										</div>
									<?php endif; ?>

					
			            <?php if ( ! empty( $text ) ) : ?>
			
							<div class="entry-content">
							<p><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></p>
							
							</div>

						<?php endif; ?>
			</div>
			</div>
			<?php
			endforeach;?>
						</div>
	</div><?php
		endif;
	if ( ! $is_callback ) {
	?>
		
		<?php
	}
}


/**
 * Get default values for service section.
 *
 * @since 1.1.31
 * @access public
 */
function spasalon_get_service_default() {
	
		
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
						'color' => isset($old_theme_servives['service_one_color'])? $old_theme_servives['service_one_color']:'',
						'link'       => '#',
						'open_new_tab' => 'no',
						 ),
						array(
						 'icon_value' => isset($old_theme_servives['service_two_icon'])? $old_theme_servives['service_two_icon']:'',
						 'title'      => isset($old_theme_servives['service_two_title'])? $old_theme_servives['service_two_title']:'',
						 'text'       => isset($old_theme_servives['service_two_text'])? $old_theme_servives['service_two_text']:'',
						 'choice'    => 'customizer_repeater_icon',
						 'color' => isset($old_theme_servives['service_two_color'])? $old_theme_servives['service_two_color']:'',
						 'link'       => '#',
						 'open_new_tab' => 'no',
						 ),
						 array(
						 'icon_value' => isset($old_theme_servives['service_three_icon'])? $old_theme_servives['service_three_icon']:'',
						 'title'      => isset($old_theme_servives['service_three_title'])? $old_theme_servives['service_three_title']:'',
						 'text'       => isset($old_theme_servives['service_three_text'])? $old_theme_servives['service_three_text']:'',
						 'choice'    => 'customizer_repeater_icon',
						 'color' => isset($old_theme_servives['service_three_color'])? $old_theme_servives['service_three_color']:'',
						 'link'       => '#',
						 'open_new_tab' => 'no',
						),
						
						 array(
						 'icon_value' => isset($old_theme_servives['service_four_icon'])? $old_theme_servives['service_four_icon']:'',
						 'title'      => isset($old_theme_servives['service_four_title'])? $old_theme_servives['service_four_title']:'',
						 'text'       => isset($old_theme_servives['service_four_text'])? $old_theme_servives['service_four_text']:'',
						 'choice'    => 'customizer_repeater_icon',
						 'color' => isset($old_theme_servives['service_four_color'])? $old_theme_servives['service_four_color']:'',
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
		'spasalon_service_default_content', json_encode(
			array(
				array(
				'icon_value' => 'fa fa-leaf',
				'image_url'  => '',
				'title'      => esc_html__( 'Aenean quis', 'webriti-companion' ),
				'text'       => esc_html__('An veritus voluptatum vim, no duo veritus ocurreret. Stet rebum hendrerit pro an, omnesque salutandi theophrastus ne pri.', 'webriti-companion' ),
				'choice'    => 'customizer_repeater_icon',
				'color'		 => '#f22853',
				'link'       => '#',
				'open_new_tab' => 'no',

				),
				array(
				'icon_value' => 'fa fa-street-view',
				'image_url'  => '',
				'title'      => esc_html__( 'Nullam sapien', 'webriti-companion' ),
				'text'       => esc_html__('An veritus voluptatum vim, no duo veritus ocurreret. Stet rebum hendrerit pro an, omnesque salutandi theophrastus ne pri.', 'webriti-companion' ),
				'choice'    => 'customizer_repeater_icon',
				'color'		 => '#6dc82b',
				'link'       => '#',
				'open_new_tab' => 'no',
				
				),
				array(
				'icon_value' => 'fa fa-user',
				'image_url'  => '',
				'title'      => esc_html__( 'Ullamcorper tortor', 'webriti-companion' ),
				'text'       => esc_html__('An veritus voluptatum vim, no duo veritus ocurreret. Stet rebum hendrerit pro an, omnesque salutandi theophrastus ne pri.', 'webriti-companion' ),
				'choice'    => 'customizer_repeater_icon',
				'color'		 => '#fe8000',
				'link'       => '#',
				'open_new_tab' => 'no',
				
				),
				array(
				'icon_value' => 'fa fa-lemon-o',
				'image_url'  => '',
				'title'      => esc_html__( 'Scelerisque molestie', 'webriti-companion' ),
				'text'       => esc_html__('An veritus voluptatum vim, no duo veritus ocurreret. Stet rebum hendrerit pro an, omnesque salutandi theophrastus ne pri.', 'webriti-companion' ),
				'choice'    => 'customizer_repeater_icon',
				'color'		 => '#1abac8',
				'link'       => '#',
				'open_new_tab' => 'no',

				),
			)
		)
	);
	}
}

if ( function_exists( 'spasalon_features' ) ) {
	$section_priority = apply_filters( 'spasalon_section_priority', 10, 'spasalon_features' );
	add_action( 'spasalon_sections', 'spasalon_features', absint( $section_priority ) );
	
}

function plugin_data_setup()
{	

			return $theme_options=array(
			'service_one_title' => esc_html__( 'Aenean quis', 'webriti-companion' ),
			'service_two_title' => esc_html__( 'Nullam sapien', 'webriti-companion' ),
			'service_three_title' => esc_html__( 'Ullamcorper tortor', 'webriti-companion' ),
			'service_four_title' => esc_html__( 'Scelerisque molestie', 'webriti-companion' ),
			
			'service_one_icon' => 'fa fa-leaf',
			'service_two_icon' => 'fa fa-street-view',
			'service_three_icon' => 'fa fa-user', 
			'service_four_icon' =>'fa fa-lemon-o',
			
			'service_one_text' => esc_html__('An veritus voluptatum vim, no duo veritus ocurreret. Stet rebum hendrerit pro an, omnesque salutandi theophrastus ne pri.', 'webriti-companion' ),
			'service_two_text' =>  esc_html__('An veritus voluptatum vim, no duo veritus ocurreret. Stet rebum hendrerit pro an, omnesque salutandi theophrastus ne pri.', 'webriti-companion' ),
			'service_three_text' =>  esc_html__('An veritus voluptatum vim, no duo veritus ocurreret. Stet rebum hendrerit pro an, omnesque salutandi theophrastus ne pri.', 'webriti-companion' ),
			'service_four_text' =>  esc_html__('An veritus voluptatum vim, no duo veritus ocurreret. Stet rebum hendrerit pro an, omnesque salutandi theophrastus ne pri.', 'webriti-companion' ),

			'service_one_color'		 => '#f22853',
			'service_two_color'		 => '#6dc82b',
			'service_three_color'	 => '#fe8000',
			'service_four_color'	 => '#1abac8',
			
		);
}