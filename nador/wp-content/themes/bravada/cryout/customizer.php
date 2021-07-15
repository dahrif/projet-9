<?php
/**
 * Custom WP Customizer functionality
 *
 * @package Cryout Framework
 */

///////// SANITIZERS /////////
function cryout_customizer_sanitize_blank(){
	// dummy function that does nothing, since the sanitized add_section
	// calling it does not add any user-editable field
} // cryout_customizer_sanitize_blank()

function cryout_customizer_sanitize_number($input){
	return ( is_numeric( $input ) ) ? $input : intval( $input );
} // cryout_customizer_sanitize_number()

function cryout_customizer_sanitize_checkbox($input){
    if ( intval( $input ) == 1 ) return 1;
    return 0;
} // cryout_customizer_sanitize_checkbox()

function cryout_customizer_sanitize_url($input){
	return esc_url_raw( $input );
} // cryout_customizer_sanitize_url()

function cryout_customizer_sanitize_googlefont($input){
	return preg_replace( '/\+/', ' ', wp_kses_post($input) );
} // cryout_customizer_sanitize_url()

function cryout_customizer_sanitize_color($input){
	return sanitize_hex_color($input);
} // cryout_customizer_sanitize_color()

function cryout_customizer_sanitize_text($input){
	// return wp_filter_nohtml_kses( $input );
	return wp_kses_post( $input );
} // cryout_customizer_sanitize_text()

function cryout_customizer_sanitize_generic($input){
	return wp_kses_post( $input );
} // cryout_customizer_sanitize_generic()


// custom controls moved to cryout/controls.php in 0.8


////////// THE CUSTOMIZER CLASS /////////
class Cryout_Customizer {

	public function __construct () {

		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	} // __construct()

	public static function register( $wp_customize ) {
		global $cryout_theme_settings;
		global $cryout_theme_defaults;

		$wp_customize->register_section_type( 'Cryout_Customize_About_Section' );

		////////// add about theme panel and sections //////////
		if (!empty($cryout_theme_settings['info_sections'])):
			$section_priority = 10;

			foreach ($cryout_theme_settings['info_sections'] as $iid=>$info):
				$wp_customize->add_section( new Cryout_Customize_About_Section( $wp_customize, $iid, array(
					'title'          => $info['title'],
					'description'    => $info['desc'],
					'priority'       => $section_priority++,
					'button'		 => $info['button'],
					'button_label'	 => $info['button_label'],
				) ) );
			endforeach;
		endif; //!empty

		foreach ($cryout_theme_settings['info_settings'] as $iid => $info):
			$wp_customize->add_setting( $iid, array(
				'default'        => $info['default'],
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'cryout_customizer_sanitize_blank'
			) );
			$wp_customize->add_control( new Cryout_Customize_About_Control( $wp_customize, $iid, array(
				'label'   	 => $info['label'],
				'description' => $info['desc'],
				'section' 	 => $info['section'],
				'default' 	 => $info['default'],
				'settings'   => $iid,
				'priority'   => 10,
			) ) );
		endforeach;
		////////// end about panel

		////////// add custom theme options panels //////////
		$priority = 45;
		foreach ($cryout_theme_settings['panels'] as $panel):

			$identifier = ( !empty($panel['identifier'])? $panel['identifier'] : 'cryout-' );
			$wp_customize->add_panel( $identifier . $panel['id'], array(
			  'title' => $panel['title'],
			  'description' => '',
			  'priority' => $priority+=5,
			) );

		endforeach;

		////////// add custom theme options sections, settings and empty placeholder control //////////
		$section_priority = 60;
		foreach ($cryout_theme_settings['sections'] as $section):

			// override section id to make it uniquely identifiable

			$wp_customize->add_section( 'cryout-' . $section['id'], array(
				'title'          => $section['title'],
				'description'    => '',
				'priority'       => ( isset($section['priority']) ? $section['priority'] : $section_priority+=5 ),
				'panel'  		 => ( !empty($section['sid']) ? 'cryout-' . $section['sid'] : '' ),
			) );

			/*$wp_customize->add_setting( 'placeholder_'.$section_priority, array(
				'default'        => '',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'cryout_customizer_sanitize_blank',
				'section' 		 => 'cryout-' . $section['id'],
			) );*/

			// override section id to make it uniquely identifiable
			/*$wp_customize->add_control( new Cryout_Customize_Blank_Control( $wp_customize, 'placeholder_'.$section_priority, array(
				'section' => 'cryout-' . $section['id'],
				'settings'   => 'placeholder_'.$section_priority,
				'priority'   => 10,
			) ) );*/

		endforeach;
		////////// end option panels/sections

		////////// override built-in WordPress customizer panels, if set //////////
		if (!empty($cryout_theme_settings['panel_overrides']))
		foreach ($cryout_theme_settings['panel_overrides'] as $poid => $pover):

			if (empty($pover['priority2'])) $pover['priority2'] = 60; // failsafe
			switch ($pover['type']):
				case 'remove': // remove bult-in setting/panel
					switch( $pover['section'] ):
						case 'panel':
							$wp_customize->remove_panel( $pover['replaces']);
							break;
						case 'section':
							$wp_customize->remove_section( $pover['replaces']);
							break;
						case 'setting':
						default:
							$wp_customize->remove_setting( $pover['replaces']);
							break;
					endswitch;
					break;
				case 'section': // move built-in setting to theme panel
					$wp_customize->get_section( $pover['replaces'] )->panel = $pover['section'];
					$wp_customize->get_section( $pover['replaces'] )->priority = $pover['priority2'];
					break;
				case 'panel':
				default: // add custom panel to replace built-in panel
					$wp_customize->add_panel( 'cryout-' . $poid, array(
						'priority'       => $pover['priority'],
						'title'          => $pover['title'],
						'description'    => $pover['desc'],
					) );
					$wp_customize->get_section( $pover['replaces'] )->panel = 'cryout-' . $poid;
					$wp_customize->get_section( $pover['replaces'] )->priority = $pover['priority2'];
					break;
			endswitch;

		endforeach;  // overrides

		// options priority start point
		$priority = 10;

		////////// add custom theme option controls, based on option type //////////
		foreach ($cryout_theme_settings['options'] as $opt):

			// check if option should be visible in this case
			if ( !empty( $opt['disable_if'] ) ) {
				if ( function_exists($opt['disable_if']) ) continue;
			}
			if ( !empty( $opt['require_fn'] ) ) {
				if ( ! function_exists($opt['require_fn']) ) continue;
			}

			// identify option clone count
			$clone_count = 1;
			if (preg_match('/#/',$opt['id'])) {
				$clone_section_id = str_replace( '#', '', $opt['section'] );

				if (!empty($cryout_theme_settings['clones'][$clone_section_id]))
					$clone_count = $cryout_theme_settings['clones'][$clone_section_id];

			}

			////////// sanitizer function callback select
			switch ($opt['type']):
				case 'number': case 'slider': case 'numberslider':
				case 'range':			$sanitize_callback = 'cryout_customizer_sanitize_number'; 		break;
				case 'checkbox':
				case 'toggle':			$sanitize_callback = 'cryout_customizer_sanitize_checkbox';		break;
				case 'url': 			$sanitize_callback = 'cryout_customizer_sanitize_url';			break;
				case 'color':			$sanitize_callback = 'cryout_customizer_sanitize_color';		break;
				case 'googlefont':      $sanitize_callback = 'cryout_customizer_sanitize_googlefont';   break;
				case 'media': case 'media-image':
										$sanitize_callback = 'cryout_customizer_sanitize_number';		break;
				case 'hint': case 'blank':
										$sanitize_callback = 'cryout_customizer_sanitize_blank';		break;
				case 'text': case 'tel': case 'email': case 'search':  case 'radio':
				case 'time': case 'date': case 'datetime': case 'week':
				case 'textarea':		$sanitize_callback = 'cryout_customizer_sanitize_text';			break;
				default: 				$sanitize_callback = 'cryout_customizer_sanitize_generic';		break;
			endswitch;

			$sanitize_callback = apply_filters( 'cryout_customizer_custom_control_sanitize_callback', $sanitize_callback, $opt['id'] );

			// remember placeholder id and section for the cloning cycle below
			$_opt_id = $opt['id'];
			$_opt_section = $opt['section'];

			/////////// add all cloned options
			for ( $i=1; $i<=$clone_count; $i++ ) {

				// replace # placeholder with clone index when necessary; use placeholders saved above
				$opt['id'] = str_replace( '#', $i, $_opt_id );
				$opt['section'] = str_replace( '#', $i, $_opt_section );

				////////// guess theme options variable name
				if (function_exists('cryout_get_theme_options_name')) {
					$theme_options_array = cryout_get_theme_options_name();
				} else {
					$theme_options_array = _CRYOUT_THEME_NAME . '_settings';
				};
				$opid = $theme_options_array . '[' . $opt['id'] . ']';

				// make section id uniquely identifiable, unless it's a special addon option
				if ( empty($opt['addon']) || $opt['addon'] != TRUE )
					$opt['section'] = 'cryout-' . $opt['section'];

				////////// add settings
				$wp_customize->add_setting( $opid, array(
					'type'			=> 'option',
					'default'       => ( isset( $cryout_theme_defaults[$opt['id']] ) ? $cryout_theme_defaults[$opt['id']] : '' ),
					'capability'    => 'edit_theme_options',
					'sanitize_callback' => $sanitize_callback,
					'transport' 	=> (isset($opt['transport'])?$opt['transport']:'refresh'),
				) );

				////////// cycle through and add appropriate control types
				switch ($opt['type']): // control selector
					case 'text':
					case 'number':
					case 'url': case 'tel': case 'email': case 'search:': case 'time': case 'date': case 'datetime': case 'week':
					case 'textarea':
					case 'checkbox':
						$wp_customize->add_control( $opid, array(
							'label'		=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'settings'	=> $opid,
							'input_attrs' => (!empty($opt['input_attrs'])?$opt['input_attrs']:array()),
							'type'		=> $opt['type'],
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) );
						break;
					case 'toggle':
						$wp_customize->add_control( new Cryout_Customize_Toggle_Control( $wp_customize, $opid, array(
							'label' 	=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'settings'	=> $opid,
							'type'		=> $opt['type'],
							'input_attrs'	=> (isset($opt['disabled'])?array('disabled'=>$opt['disabled']):array('disabled'=>false)),
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'choices'	=> (isset($opt['choices'])?$opt['choices']:(isset($opt['values'])?$opt['values']:array(0,1))),
							'disabled'	=> (isset($opt['disabled'])?$opt['disabled']:''),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) ) );
						break;
					case 'googlefont':
						$wp_customize->add_control( $opid, array(
							'label'		=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'settings'	=> $opid,
							'input_attrs' => (!empty($opt['input_attrs'])?$opt['input_attrs']:array()),
							'type'		=> 'text',
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) );
						break;
					case 'radio':
					case 'select':
						if (empty($opt['choices']) && empty($opt['labels'])) $opt['labels'] = $opt['values'];
						$wp_customize->add_control( $opid, array(
							'label'		=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'settings'	=> $opid,
							'type'		=> $opt['type'],
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'choices'	=> (isset($opt['choices'])?$opt['choices']:array_combine($opt['values'],$opt['labels'])),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) );
						break;
					case 'selecthalf':
					case 'selectthird':
						if (empty($opt['choices']) && empty($opt['labels'])) $opt['labels'] = $opt['values'];
						$wp_customize->add_control(  new Cryout_Customize_SelectShort_Control( $wp_customize, $opid, array(
							'label'		=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'settings'	=> $opid,
							'type'		=> $opt['type'],
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'choices'	=> (isset($opt['choices'])?$opt['choices']:array_combine($opt['values'],$opt['labels'])),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) ) );
						break;
					case 'select2':
						$wp_customize->add_control( new Cryout_Customize_Select2_Control( $wp_customize, $opid, array(
							'label' 	=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'settings'	=> $opid,
							'input_attrs'	=> (isset($opt['disabled'])?array('disabled'=>$opt['disabled']):array('disabled'=>false)),
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'choices'	=> (isset($opt['choices'])?$opt['choices']:array_combine($opt['values'],$opt['labels'])),
							'disabled'	=> (isset($opt['disabled'])?$opt['disabled']:''),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) ) );
						break;
					case 'optselect':
						$wp_customize->add_control( new Cryout_Customize_OptSelect_Control( $wp_customize, $opid, array(
							'label' 	=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'settings'	=> $opid,
							'input_attrs'	=> (isset($opt['disabled'])?array('disabled'=>$opt['disabled']):array('disabled'=>false)),
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'choices'	=> (isset($opt['choices'])?$opt['choices']:array_combine($opt['values'],$opt['labels'])),
							'disabled'	=> (isset($opt['disabled'])?$opt['disabled']:''),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) ) );
						break;
					case 'range':
						$wp_customize->add_control( $opid, array(
							'label'		=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'settings'	=> $opid,
							'type'		=> $opt['type'],
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'input_attrs' => array( 'min' => $opt['min'], 'max' => $opt['max'], 'step' => (isset($opt['step'])?$opt['step']:10) ),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) );
						break;
					case 'slider':
						$wp_customize->add_control(  new Cryout_Customize_Slider_Control( $wp_customize, $opid, array(
							'label'		=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'settings'	=> $opid,
							'type'		=> $opt['type'],
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'input_attrs' => array(
										'min' => $opt['min'],
										'max' => $opt['max'],
										'step' => (isset($opt['step'])?$opt['step']:10),
										'um' => (isset($opt['um'])?$opt['um']:'')
										),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) ) );
						break;
					case 'slidertwo':
						$wp_customize->add_control(  new Cryout_Customize_SliderTwo_Control( $wp_customize, $opid, array(
							'label'		=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'settings'	=> $opid,
							'type'		=> $opt['type'],
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'input_attrs' => array(
										'min' => $opt['min'],
										'max' => $opt['max'],
										'step' => (isset($opt['step'])?$opt['step']:10),
										'total' => (isset($opt['total'])?$opt['total']:0),
										'um' => (isset($opt['um'])?$opt['um']:'')
										),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) ) );
						break;
					case 'numberslider':
					case 'slidernumber':
						$wp_customize->add_control(  new Cryout_Customize_NumberSlider_Control( $wp_customize, $opid, array(
							'label'		=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'settings'	=> $opid,
							'type'		=> $opt['type'],
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'input_attrs' => array(
										'min' => $opt['min'],
										'max' => $opt['max'],
										'step' => (isset($opt['step'])?$opt['step']:10),
										'um' => (isset($opt['um'])?$opt['um']:''),
										'readonly' => (isset($opt['readonly'])?$opt['readonly']:'')
										),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) ) );
						break;
					case 'radioimage':
						$wp_customize->add_control( new Cryout_Customize_RadioImage_Control( $wp_customize, $opid, array(
							'label'		=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'settings'	=> $opid,
							'type'		=> $opt['type'],
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'choices' 	=> (isset($opt['choices'])?$opt['choices']:array_combine($opt['values'],$opt['labels'])),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) ) );
						break;
					case 'sortable':
						if (class_exists('Cryout_Customize_Sortable_Control')) {
							$wp_customize->add_control( new Cryout_Customize_Sortable_Control( $wp_customize, $opid, array(
								'label'		=> $opt['label'],
								'description'	=> (isset($opt['desc'])?$opt['desc']:''),
								'section'	=> $opt['section'],
								'settings'	=> $opid,
								'type'		=> $opt['type'],
								'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
								'choices' 	=> (isset($opt['choices'])?$opt['choices']:array_combine($opt['values'],$opt['labels'])),
								'input_attrs' => (!empty($opt['input_attrs'])?$opt['input_attrs']:array()),
								'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
							) ) );
						}
						break;
					case 'color':
						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $opid, array(
							'label' 	=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) ) );
						break;
					case 'font':
						$wp_customize->add_control( new Cryout_Customize_Font_Control( $wp_customize, $opid, array(
							'label' 	=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'input_attrs' => array(
									'no_inherit' => (isset($opt['no_inherit'])?$opt['no_inherit']:FALSE),
							),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) ) );
						break;
					case 'iconselect':
						$wp_customize->add_control( new Cryout_Customize_IconSelect_Control( $wp_customize, $opid, array(
							'label' 	=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) ) );
						break;
					case 'media-image':
						$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, $opid, array(
							'label' 	=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'mime_type'	=> 'image',
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) ) );
						break;
					case 'media':
						$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, $opid, array(
							'label' 	=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) ) );
						break;
					case 'description':
						$wp_customize->add_control( new Cryout_Customize_Description_Control( $wp_customize, $opid, array(
							'label' 	=> $opt['label'],
							'description'	=> $opt['desc'],
							'section'	=> $opt['section'],
							'settings'	=> $opid,
							'input_attrs' => (!empty($opt['input_attrs'])?$opt['input_attrs']:array()),
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) ) );
						break;
					case 'hint':
						$wp_customize->add_control( new Cryout_Customize_Hint_Control( $wp_customize, $opid, array(
							'label' 	=> $opt['label'],
							'description'	=> $opt['desc'],
							'section'	=> $opt['section'],
							'settings'	=> $opid,
							'input_attrs' => (!empty($opt['input_attrs'])?$opt['input_attrs']:array()),
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) ) );
						break;
					case 'notice':
						$wp_customize->add_control( new Cryout_Customize_Notice_Control( $wp_customize, $opid, array(
							'label' 	=> $opt['label'],
							'description'	=> $opt['desc'],
							'section'	=> $opt['section'],
							'settings'	=> $opid,
							'input_attrs' => (!empty($opt['input_attrs'])?$opt['input_attrs']:array()),
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) ) );
						break;
					case 'spacer':
						$wp_customize->add_control( new Cryout_Customize_Spacer_Control( $wp_customize, $opid, array(
							'section'	=> $opt['section'],
							'settings'	=> $opid,
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
						) ) );
						break;
					case NULL:
						$wp_customize->add_control( new Cryout_Customize_Null_Control( $wp_customize, $opid ) );
						break;
					case 'blank':
					default:
						$wp_customize->add_control( new Cryout_Customize_Blank_Control( $wp_customize, $opid, array(
							'label' 	=> $opt['label'],
							'description'	=> (isset($opt['desc'])?$opt['desc']:''),
							'section'	=> $opt['section'],
							'settings'	=> $opid,
							'priority'	=> (isset($opt['priority'])?$opt['priority']:$priority),
							'active_callback' => ( (isset($opt['active_callback'])) ? $opt['active_callback'] : NULL),
						) ) );
						break;
				endswitch;

			// increase priority for each option (including clones)
			//$priority += 10;

			} // end cloning for cycle


		endforeach;
		////////// end options sections

	} // register()

} // class Cryout_Customizer


////////// external resources //////////
function cryout_customizer_enqueue_scripts() {
	wp_enqueue_style( 'cryout-customizer-css', get_template_directory_uri() . '/cryout/css/customizer.css', array(), _CRYOUT_FRAMEWORK_VERSION );
	wp_add_inline_style( 'cryout-customizer-css', cryout_customize_theme_identification() ); // function located in includes/custom-styles.php
	wp_enqueue_script( 'cryout-customizer-js', get_template_directory_uri() . '/cryout/js/customizer.js', array( 'jquery' ), _CRYOUT_FRAMEWORK_VERSION, true );
}

add_action('customize_controls_enqueue_scripts', 'cryout_customizer_enqueue_scripts');

////////// FIN! //////////
