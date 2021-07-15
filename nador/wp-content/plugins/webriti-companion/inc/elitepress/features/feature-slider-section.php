<?php
$Repeater_path = trailingslashit( WC__PLUGIN_DIR ) . '/inc/controls/customizer-repeater/functions.php';
if ( file_exists($Repeater_path ) ) {
require_once( $Repeater_path );
}
function elitepress_slider_customizer( $wp_customize ) {

// list control categories	
if ( ! class_exists( 'WP_Customize_Control' ) ) return NULL;

 class Category_Dropdown_Custom_Control extends WP_Customize_Control
 {
    private $cats = false;
	
    public function __construct($wp_customize, $id, $args = array(), $options = array())
    {
        $this->cats = get_categories($options);
        parent::__construct( $wp_customize, $id, $args );
    }

    public function render_content()
       {
            if(!empty($this->cats))
            {
                ?>
                    <label>
                      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                      <select multiple="multiple" <?php $this->link(); ?>>
                           <?php
                                foreach ( $this->cats as $cat )
                                {
                                    printf('<option value="%s" %s>%s</option>', $cat->term_id, selected($this->value(), $cat->term_id, false), $cat->name);
                                }
                           ?>
                      </select>
                    </label>
                <?php
            }
       }
 }
// list contro categories		

	//slider Section 
	$wp_customize->add_panel( 'elitepress_homepage_setting', array(
		'priority'       => 400,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('Homepage section settings', 'webriti-companion'),
	) );
	
	$wp_customize->add_section(
        'slider_section_settings',
        array(
            'title' => esc_html__('Slider settings','webriti-companion'),
			'priority'   => 400,
            'panel'  => 'elitepress_homepage_setting',)
    );
	
	//Hide slider
	
	$wp_customize->add_setting(
    'elitepress_lite_options[home_banner_enabled]',
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'elitepress_sanitize_checkbox',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'elitepress_lite_options[home_banner_enabled]',
    array(
        'label' => esc_html__('Enable home banner','webriti-companion'),
		'priority'   => 1,
        'section' => 'slider_section_settings',
        'type' => 'checkbox',
    )
	);
	 
	 
	if ( class_exists( 'Webriti_Companion_Repeater' ) ) {
			$wp_customize->add_setting( 'elitepress_slider_content', array(
			'sanitize_callback' => 'webriti_companion_repeater_sanitize',
			) );

			$wp_customize->add_control( new Webriti_Companion_Repeater( $wp_customize, 'elitepress_slider_content', array(
				'label'                             => esc_html__( 'Slider Content', 'webriti-companion' ),
				'priority'   => 2,
				'section'                           => 'slider_section_settings',
				'add_field_label'                   => esc_html__( 'Add new slide', 'webriti-companion' ),
				'item_name'                         => esc_html__( 'Slide', 'webriti-companion' ),
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_button_text_control' => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_image_control' => true,
				'customizer_repeater_checkbox_control' => true,
				) ) );
		}
	 
	 //Slider Animation duration

	$wp_customize->add_setting(
    'elitepress_lite_options[animationSpeed]',
    array(
        'default' => '1500',
		'type' => 'option',
		'sanitize_callback' => 'elitepress_sanitize_select',
    ));

	$wp_customize->add_control(
    'elitepress_lite_options[animationSpeed]',
    array(
        'type' => 'select',
        'label' => esc_html__('Animation speed','webriti-companion'),
        'section' => 'slider_section_settings',
		 'choices' => array('500'=>'0.5','1000'=>'1.0','1500'=>'1.5','2000'=>'2.0','2500'=>'2.5','3000'=>'3.0','3500'=>'3.5','4000'=>'4.0','4500'=>'4.5','5000'=>'5.0','5500'=>'5.5'),
		
		));
		
	//Slide Show Speed
	$wp_customize->add_setting(
    'elitepress_lite_options[slideshowSpeed]',
    array(
        'default' => '2500',
		'type' => 'option',
		'sanitize_callback' => 'elitepress_sanitize_select',
    ));

	$wp_customize->add_control(
    'elitepress_lite_options[slideshowSpeed]',
    array(
        'type' => 'select',
        'label' => esc_html__('Slideshow speed','webriti-companion'),
        'section' => 'slider_section_settings',
		 'choices' => array('500'=>'0.5','1000'=>'1.0','1500'=>'1.5','2000'=>'2.0','2500'=>'2.5','3000'=>'3.0','3500'=>'3.5','4000'=>'4.0','4500'=>'4.5','5000'=>'5.0','5500'=>'5.5'),
		
		));

		
}
add_action( 'customize_register', 'elitepress_slider_customizer' );

function elitepress_slider_sanitize_layout( $value ) {
if ( ! in_array( $value, array( 'Uncategorized','category_slider' ) ) )    
return $value;
}

// Elitepress default slider data.
if ( ! function_exists( 'elitpress_slider_default_customize_register' ) ) :
	
	function elitpress_slider_default_customize_register( $wp_customize ) {
		
			
			
		 if(get_option('elitepress_lite_options')!='')
		 {
			$elitepress_slider_content_control = $wp_customize->get_setting( 'elitepress_slider_content' );
					if ( ! empty( $elitepress_slider_content_control ) ) {
						$elitepress_lite_options=elitepress_theme_data_setup();
						$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options ); 
						$query_args =array( 'category__in' =>$current_options['slider_select_category'],'ignore_sticky_posts' => 1 );
						$slider = new WP_Query( $query_args ); 
						if( $slider->have_posts() )
							{	
								$elitepress_slider_content_control->default = json_encode( array() );
								while ( $slider->have_posts() ) : $slider->the_post();
								if( strpos( wp_strip_all_tags(get_the_excerpt()), 'Read More' ) !== false ) $button_text = 'Read More';
									$pro_slider_data[] = array(
									'title'      => get_the_title(),
									'text'       => rtrim(wp_strip_all_tags(get_the_excerpt()),'Read More'),
									'button_text'      => $button_text,
									'link'       => '#',
									'image_url'  => get_the_post_thumbnail_url(),
									'open_new_tab' => false,
									'id'         => 'customizer_repeater_56d7ea7f40b50',
								);
								endwhile; 
								$elitepress_slider_content_control->default = json_encode($pro_slider_data);
							}
					}
		 } else
				{
				$elitepress_slider_content_control = $wp_customize->get_setting( 'elitepress_slider_content' );
				if ( ! empty( $elitepress_slider_content_control ) ) {
				$elitepress_slider_content_control->default = json_encode( array(
				array(
				'title'      => esc_html__( 'Lorem ipsum dolor sit amet, consectetur.', 'webriti-companion' ),
				'text'       => esc_html__( 'Lorem ipsum dolor sit amet consectetuer adipiscing elit.', 'webriti-companion' ),
				'button_text'      => esc_html__('Sed gravida','webriti-companion'),
				'link'       => '#',
				'image_url'  => esc_url(WC__PLUGIN_URL.'inc/elitepress/images/slider/1.jpg'),
				'open_new_tab' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b96',
				),
				array(
				'title'      => esc_html__( 'Vestibulum ut ipsum!', 'webriti-companion' ),
				'text'       => esc_html__( 'Lorem ipsum dolor sit amet consectetuer adipiscing elit.', 'webriti-companion' ),
				'button_text'      => esc_html__('Sed gravida','webriti-companion'),
				'link'       => '#',
				'image_url'  => esc_url(WC__PLUGIN_URL.'inc/elitepress/images/slider/2.jpg'),
				'open_new_tab' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b97',
				),
				array(
				'title'      => esc_html__( 'Lorem ipsum dolor sit amet, consectetur.', 'webriti-companion' ),
				'text'       => esc_html__( 'Lorem ipsum dolor sit amet consectetuer adipiscing elit.', 'webriti-companion' ),
				'button_text'      => esc_html__('Sed gravida','webriti-companion'),
				'link'       => '#',
				'image_url'  =>  esc_url(WC__PLUGIN_URL.'inc/elitepress/images/slider/3.jpg'),
				'open_new_tab' => 'no',
				'id'         => 'customizer_repeater_56d7ea7f40b98',
				),
			) );

		} 
		 }
	}
	add_action( 'customize_register', 'elitpress_slider_default_customize_register' );
endif;