<?php
function elitepress_service_content( $elitepress_service_content, $is_callback = false ) {
	$theme = wp_get_theme(); // gets the current theme
	if ( ! $is_callback ) { ?>
		<div class="row">
	    <?php
	}
	if ( ! empty( $elitepress_service_content ) ) {
		$allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'b'      => array(),
		'i'      => array(),
		);
		$elitepress_service_content = json_decode( $elitepress_service_content );
		foreach ( $elitepress_service_content as $features_item ) :
			$icon = ! empty( $features_item->icon_value ) ? apply_filters( 'elitepress_translate_single_string', $features_item->icon_value, 'Features section' ) : '';
			$title = ! empty( $features_item->title ) ? apply_filters( 'elitepress_translate_single_string', $features_item->title, 'Features section' ) : '';
			$text = ! empty( $features_item->text ) ? apply_filters( 'elitepress_translate_single_string', $features_item->text, 'Features section' ) : '';
			$link = ! empty( $features_item->link ) ? apply_filters( 'elitepress_translate_single_string', $features_item->link, 'Features section' ) : '';
			$link_target = ! empty( $features_item->open_new_tab ) ? apply_filters( 'elitepress_translate_single_string', $features_item->open_new_tab, 'Features section' ) : '';
			$button_text = !empty( $features_item->button_text ) ? apply_filters( 'elitepress_translate_single_string', $features_item->button_text, 'Features section' ) : '';
			
			$image = ! empty( $features_item->image_url ) ? apply_filters( 'elitepress_translate_single_string', $features_item->image_url, 'Features section' ) : '';
			$color = '';
			if ( is_customize_preview() && ! empty( $features_item->color ) ) {
				$color = $features_item->color;
			}
			
//                        ElitePress
				echo '<div class="col-md-6 col-sm-6">';
			
			?>
			<div class="media service-area">
			<?php if($features_item->choice == 'customizer_repeater_image'){ ?>
				<?php if ( ! empty( $image ) ) : ?>
					<div class="service-featured-img">
						<img class="img-responsive" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
					</div>	
				<?php endif; 
			}
			else if($features_item->choice =='customizer_repeater_icon'){
				if ( ! empty( $icon ) ) :?>
						<div class="service-box">
								<i class="fa <?php echo esc_attr( $icon ); ?>"></i>
						</div>
				<?php endif; 
			}?>					
					
				<div class="media-body">			
					<?php if ( ! empty( $title ) ) : ?>
						<h4 class="entry-title"><?php echo esc_html( $title ); ?></h4>
					<?php endif; ?>
					<?php if ( ! empty( $text ) ) : ?>
						<p><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></p>
					<?php endif; ?>
					<?php if($button_text != '') {?>
						<div class="service-btn">
							<a href="<?php echo esc_url($link); ?>" <?php if($link_target== 'yes') { echo "target='_blank'"; } ?>><?php echo esc_html($button_text); ?></a>
						</div>	
					<?php }?>
				</div>		
			</div>
			</div>
		<?php
		endforeach;
		}
		else
		{
				
                    $title = array (__('Ipsum pulvinar','elitepress'), __('Lorem ipsum','elitepress'), __('Integer ultricies','elitepress'), __('Integer condimentum','elitepress'));
                    $icon = array('fa fa-shield','fa fa-tablet','fa fa-edit','fa fa-star-half-o');
                    for($i=0; $i<=3; $i++) { ?>
                            <div class="col-md-6 col-sm-6">
                                    <div class="media service-area">
                                            <div class="service-box">
                                                    <i class="<?php echo esc_html($icon[$i]); ?>"></i>
                                            </div>
                                            <div class="media-body">
                                            <h4 class="entry-title"><?php echo esc_html($title[$i]); ?></h4>
                                    <p><?php echo esc_html__('Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.','elitepress'); ?></p>
                                            <div class="service-btn"><a title="Read More" href="#"><?php esc_html_e('Sed gravida', 'elitepress'); ?></a></div>
                                    </div>
                                    </div>
                            </div>
                    <?php } 

			}
		if ( ! $is_callback ) { ?>
			</div>
			<?php
		}
}

if (!function_exists('elitepress_services')) :

	function elitepress_services() {

	$default_content = false;
	$current_options = get_option('elitepress_lite_options');
	$elitepress_service_content  = get_theme_mod( 'elitepress_service_content', $default_content );
	$theme = wp_get_theme(); // gets the current theme
	if(!empty($current_options)){

		if(empty($elitepress_service_content)) {
				
                        $old_theme_servives = wp_parse_args(  get_option( 'elitepress_lite_options', array() ),elitepress_theme_data_setup() );

                        if($old_theme_servives['service_one_icon']!= '' || $old_theme_servives['service_one_title']!= '' || $old_theme_servives['service_one_description']!= '' 
                        || $old_theme_servives['service_two_icon']!= '' || $old_theme_servives['service_two_title']!= '' || $old_theme_servives['service_two_description']!= '' 
                        || $old_theme_servives['service_three_icon']!= '' || $old_theme_servives['service_three_title']!= '' || $old_theme_servives['service_three_description']!= ''
                        || $old_theme_servives['service_four_four']!= '' || $old_theme_servives['service_four_title']!= '' || $old_theme_servives['service_four_description']!= '')
                        {

                                        $elitepress_service_content = json_encode( array(
                                                array(
                                                'icon_value' => isset($old_theme_servives['service_one_icon'])? $old_theme_servives['service_one_icon']:'',
                                                'title'      => isset($old_theme_servives['service_one_title'])? $old_theme_servives['service_one_title']:'',
                                                'choice'    => 'customizer_repeater_icon',
                                                'text'       => isset($old_theme_servives['service_one_description'])? $old_theme_servives['service_one_description']:'',
                                                'link'       => '',
                                                'id'         => 'customizer_repeater_56d7ea7f40b56',
                                                'color'      => '#e91e63',
                                                ),
                                                array(
                                                'icon_value' => isset($old_theme_servives['service_two_icon'])? $old_theme_servives['service_two_icon']:'',
                                                'title'      => isset($old_theme_servives['service_two_title'])? $old_theme_servives['service_two_title']:'',
                                                'choice'    => 'customizer_repeater_icon',
                                                'text'       => isset($old_theme_servives['service_two_description'])? $old_theme_servives['service_two_description']:'',
                                                'link'       => '',
                                                'id'         => 'customizer_repeater_56d7ea7f40b66',
                                                'color'      => '#00bcd4',
                                                ),
                                                array(
                                                'icon_value' => isset($old_theme_servives['service_three_icon'])? $old_theme_servives['service_three_icon']:'',
                                                'title'      => isset($old_theme_servives['service_three_title'])? $old_theme_servives['service_three_title']:'',
                                                'choice'    => 'customizer_repeater_icon',
                                                'text'       => isset($old_theme_servives['service_three_description'])? $old_theme_servives['service_three_description']:'',
                                                'link'       => '',
                                                'id'         => 'customizer_repeater_56d7ea7f40b86',
                                                'color'      => '#4caf50',
                                                ),

                                                array(
                                                'icon_value' => isset($old_theme_servives['service_four_icon'])? $old_theme_servives['service_four_icon']:'',
                                                'title'      => isset($old_theme_servives['service_four_title'])? $old_theme_servives['service_four_title']:'',
                                                'choice'    => 'customizer_repeater_icon',
                                                'text'       => isset($old_theme_servives['service_four_description'])? $old_theme_servives['service_four_description']:'',
                                                'link'       => '',
                                                'id'         => 'customizer_repeater_56d7ea7f40b96',
                                                'color'      => '#4caf50',
                                                ),


                                                ) );
                        }
				
			}
	}
	$elitepress_lite_options=elitepress_theme_data_setup();
	$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
	
        $service_class='service';
	
	if( $current_options['service_section_enabled']== true ) {
	?>
	<!-- Service Section -->
	<section class="<?php echo esc_attr($service_class);?>">
		<div class="container">		
			<!-- Section Title -->
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="section-header">
					<?php if($current_options['service_title']) { ?>
					<h3 class="section-title"><?php echo esc_html($current_options['service_title']); ?></h3>
					<?php }
					if($current_options['service_description']) { ?>
					<p class="section-subtitle"><?php echo esc_html($current_options['service_description']); ?></p>
					<?php } ?>
					</div>
				</div>		
			</div>
			<!-- /Section Title -->
			<?php elitepress_service_content( $elitepress_service_content ); ?>
		</div>
	</section>
	<!-- End of Service Section -->	
	<div class="clearfix"></div>	
	<?php  }
	
	
}
endif;

if ( function_exists( 'elitepress_services' ) ) {
	$section_priority = apply_filters( 'elitepress_section_priority', 13, 'elitepress_services' );
	add_action( 'elitepress_sections', 'elitepress_services', absint( $section_priority ) );
}