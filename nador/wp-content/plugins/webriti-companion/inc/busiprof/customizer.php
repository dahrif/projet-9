<?php if ( ! function_exists( 'busiprof_service_default_customize_register' ) ) :
	
	function busiprof_service_default_customize_register( $wp_customize ) {

		if(get_option('busiprof_theme_options')!='')
		{	
			$old_theme_servives = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), busiprof_theme_setup_data() );
			
			if($old_theme_servives['service_image_one']!= '' || $old_theme_servives['service_icon_one']!= '' || $old_theme_servives['service_title_one']!= '' || $old_theme_servives['service_text_one']!= '' 
			|| $old_theme_servives['service_image_two']!= '' || $old_theme_servives['service_icon_two']!= '' || $old_theme_servives['service_title_two']!= '' || $old_theme_servives['service_text_two']!= '' 
			|| $old_theme_servives['service_image_three']!= '' || $old_theme_servives['service_icon_three']!= '' || $old_theme_servives['service_title_three']!= '' || $old_theme_servives['service_text_three']!= ''
			||$old_theme_servives['service_image_four']!= '' || $old_theme_servives['service_icon_four']!= '' || $old_theme_servives['service_title_four']!= '' || $old_theme_servives['service_text_four']!= '')
			{
				$busiprof_service_content_control = $wp_customize->get_setting( 'busiprof_service_content' );
				if ( ! empty( $busiprof_service_content_control ) ) {
					$busiprof_service_content_control->default = json_encode( array(
						array(
						'icon_value' => isset($old_theme_servives['service_icon_one'])? $old_theme_servives['service_icon_one']:'',
						'image_url'	 => isset($old_theme_servives['service_image_one'])? $old_theme_servives['service_image_one']:'',
						'title'      => isset($old_theme_servives['service_title_one'])? $old_theme_servives['service_title_one']:'',
						'text'       => isset($old_theme_servives['service_text_one'])? $old_theme_servives['service_text_one']:'',
						'link'       => '',
						'id'         => 'customizer_repeater_56d7ea7f40b56',
						'color'      => '#e91e63',
						),
						array(
						'icon_value' => isset($old_theme_servives['service_icon_two'])? $old_theme_servives['service_icon_two']:'',
						'image_url'	 => isset($old_theme_servives['service_image_two'])? $old_theme_servives['service_image_two']:'',
						'title'      => isset($old_theme_servives['service_title_two'])? $old_theme_servives['service_title_two']:'',
						'text'       => isset($old_theme_servives['service_text_two'])? $old_theme_servives['service_text_two']:'',
						'link'       => '',
						'id'         => 'customizer_repeater_56d7ea7f40b66',
						'color'      => '#a01000',
						),
						array(
						'icon_value' => isset($old_theme_servives['service_icon_three'])? $old_theme_servives['service_icon_three']:'',
						'image_url'	 => isset($old_theme_servives['service_image_three'])? $old_theme_servives['service_image_three']:'',
						'title'      => isset($old_theme_servives['service_title_three'])? $old_theme_servives['service_title_three']:'',
						'text'       => isset($old_theme_servives['service_text_three'])? $old_theme_servives['service_text_three']:'',
						'link'       => '',
						'id'         => 'customizer_repeater_56d7ea7f40b86',
						'color'      => '#4caf50',
						),
						
						array(
						'icon_value' => isset($old_theme_servives['service_icon_four'])? $old_theme_servives['service_icon_four']:'',
						'image_url'	 => isset($old_theme_servives['service_image_four'])? $old_theme_servives['service_image_four']:'',
						'title'      => isset($old_theme_servives['service_title_four'])? $old_theme_servives['service_title_four']:'',
						'text'       => isset($old_theme_servives['service_text_four'])? $old_theme_servives['service_text_four']:'',
						'link'       => '',
						'id'         => 'customizer_repeater_56d7ea7f40b96',
						'color'      => '#4caf50',
						),
					
					
						) );
			}
			}else {
			
			 $busiprof_service_content_control = $wp_customize->get_setting( 'busiprof_service_content' );
			if ( ! empty( $busiprof_service_content_control ) ) {
				$busiprof_service_content_control->default = json_encode( array(
					array(
					'icon_value' => 'fa-laptop',
					'choice'    => 'customizer_repeater_icon',
					'title'      => esc_html__( 'Quis Urna', 'webriti-companion' ),
					'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat pretium nulla, vitae molestie arcu dignissim in.', 'webriti-companion' ),
					'link'       => '#',
					'id'         => 'customizer_repeater_56d7ea7f40b56',
					'color'      => '#e91e63',
					),
					array(
					'icon_value' => 'fa-tasks',
					'choice'    => 'customizer_repeater_icon',
					'title'      => esc_html__( 'Sit Amet Aliquet', 'webriti-companion' ),
					'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat pretium nulla, vitae molestie arcu dignissim in.', 'webriti-companion' ),
					'link'       => '#',
					'id'         => 'customizer_repeater_56d7ea7f40b66',
					'color'      => '#a01000',
					),
					array(
					'icon_value' => 'fa-thumbs-o-up',
					'choice'    => 'customizer_repeater_icon',
					'title'      => esc_html__( 'Sed non massa', 'webriti-companion' ),
					'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat pretium nulla, vitae molestie arcu dignissim in.', 'webriti-companion' ),
					'link'       => '#',
					'id'         => 'customizer_repeater_56d7ea7f40b86',
					'color'      => '#eded23',
					),
					
					array(
					'icon_value' => 'fa-life-ring',
					'choice'    => 'customizer_repeater_icon',
					'title'      => esc_html__( 'Velit Tempus', 'webriti-companion' ),
					'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat pretium nulla, vitae molestie arcu dignissim in.', 'webriti-companion' ),
					'link'       => '#',
					'id'         => 'customizer_repeater_56d7ea7f40b96',
					'color'      => '#59327a',
					),
					
					
				) );

			}
			
		}
		} else {
			
			 $busiprof_service_content_control = $wp_customize->get_setting( 'busiprof_service_content' );
			if ( ! empty( $busiprof_service_content_control ) ) {
				$busiprof_service_content_control->default = json_encode( array(
					array(
					'icon_value' => 'fa-laptop',
					'choice'    => 'customizer_repeater_icon',
					'title'      => esc_html__( 'Quis Urna', 'webriti-companion' ),
					'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat pretium nulla, vitae molestie arcu dignissim in.', 'webriti-companion' ),
					'link'       => '#',
					'id'         => 'customizer_repeater_56d7ea7f40b56',
					'color'      => '#e91e63',
					),
					array(
					'icon_value' => 'fa-tasks',
					'choice'    => 'customizer_repeater_icon',
					'title'      => esc_html__( 'Sit Amet Aliquet', 'webriti-companion' ),
					'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat pretium nulla, vitae molestie arcu dignissim in.', 'webriti-companion' ),
					'link'       => '#',
					'id'         => 'customizer_repeater_56d7ea7f40b66',
					'color'      => '#a01000',
					),
					array(
					'icon_value' => 'fa-thumbs-o-up',
					'choice'    => 'customizer_repeater_icon',
					'title'      => esc_html__( 'Sed non massa', 'webriti-companion' ),
					'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat pretium nulla, vitae molestie arcu dignissim in.', 'webriti-companion' ),
					'link'       => '#',
					'id'         => 'customizer_repeater_56d7ea7f40b86',
					'color'      => '#eded23',
					),
					
					array(
					'icon_value' => 'fa-life-ring',
					'choice'    => 'customizer_repeater_icon',
					'title'      => esc_html__( 'Velit Tempus', 'webriti-companion' ),
					'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat pretium nulla, vitae molestie arcu dignissim in.', 'webriti-companion' ),
					'link'       => '#',
					'id'         => 'customizer_repeater_56d7ea7f40b96',
					'color'      => '#59327a',
					),
					
					
				) );

			}
			
		}
		
		// Busiprof default testimonial data.
		$testimonial_data = get_option('busiprof_theme_options');
		$busiprof_testimonial_content_control = $wp_customize->get_setting( 'busiprof_testimonial_content' );
		if ( ! empty( $busiprof_testimonial_content_control ) ) {
			$busiprof_testimonial_content_control->default = json_encode( array(
				array(
				'title'      => isset($testimonial_data['testimonials_name_one'])? $testimonial_data['testimonials_name_one']:esc_html__('Robert Johnson','webriti-companion'),
				'text'       => isset($testimonial_data['testimonials_text_one'])? $testimonial_data['testimonials_text_one']: esc_html__('We are group of passionate designers and developers who really love to create wordpress themes with amazing support. Widest laborum dolo rumes fugats untras. Ethar omnis iste natus error sit voluptatem accusantiexplicabo. Nemo enim ipsam eque porro quisquam est, qui dolorem ipsum am quaerat voluptatem...','webriti-companion'),
				'designation' => isset($testimonial_data['testimonials_designation_one'])? $testimonial_data['testimonials_designation_one']:esc_html__('CEO','webriti-companion'),
				'link'       => '#',
				'image_url'  => isset($testimonial_data['testimonials_image_one'])? $testimonial_data['testimonials_image_one']:WC__PLUGIN_URL.'inc/busiprof/img/testimonial.jpg',
				'id'         => 'customizer_repeater_56d7ea7f40b96',
				'open_new_tab' => 'no',
				
				),
				array(
				'title'      => isset($testimonial_data['testimonials_name_two'])? $testimonial_data['testimonials_name_two']:esc_html__('Annah Doe','webriti-companion'),
				'text'       => isset($testimonial_data['testimonials_text_two'])? $testimonial_data['testimonials_text_two']:esc_html__('We are group of passionate designers and developers who really love to create wordpress themes with amazing support. Widest laborum dolo rumes fugats untras. Ethar omnis iste natus error sit voluptatem accusantiexplicabo. Nemo enim ipsam eque porro quisquam est, qui dolorem ipsum am quaerat voluptatem...','webriti-companion'),
				'designation' => isset($testimonial_data['testimonials_designation_two'])? $testimonial_data['testimonials_designation_two']:esc_html__('Team Leader','webriti-companion'),
				'link'       => '#',
				'image_url'  => isset($testimonial_data['testimonials_image_two'])? $testimonial_data['testimonials_image_two']:WC__PLUGIN_URL.'inc/busiprof/img/testimonial2.jpg',
				'id'         => 'customizer_repeater_56d7ea7f40b97',
				'open_new_tab' => 'no',
				
				),
			) );

		}
		
	}
	
	
	add_action( 'customize_register', 'busiprof_service_default_customize_register' );
	
endif;