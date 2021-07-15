<?php

///////// CUSTOM CUSTOMIZERS /////////
function cryout_customizer_extras($wp_customize){

class Cryout_Customize_Link_Control extends WP_Customize_Control {
			public $type = 'cryout-link';
			public function render_content() {
				if ( !empty( $this->description ) ) { ?>
					<li class="customize-section-description-container">
						<div class="description customize-section-description">
						    <?php echo esc_html( $this->description ); ?>
						</div>
					</li>
				<?php
				}
				echo '<a href="' . esc_url( $this->value() ) . '" target="_blank">' . esc_html( $this->label ) .'</a>';
			}
	} // class Cryout_Customize_Link_Control

	class Cryout_Customize_About_Section extends WP_Customize_Section {
		public $type = 'cryout-about-section';
		public $button = FALSE;
		public $button_label = '';
		public function json() {
			$json = parent::json();
			$json['button'] = absint( $this->button );
			$json['button_label']  = esc_attr( $this->button_label );
			return $json;
		}
		protected function render_template() { ?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section customize-cryoutspecial-about-section control-section-{{ data.type }}">
			<h3 class="accordion-section-title" tabindex="0">
				{{ data.title }}

				<# if ( data.button && data.button_label ) { #>
					<a class="button alignright">{{ data.button_label }}</a>
				<# } #>
			</h3>
			<ul class="accordion-section-content">
				<li class="customize-section-description-container section-meta <# if ( data.description_hidden ) { #>customize-info<# } #>">
					<div class="customize-section-title">
						<button class="customize-section-back" tabindex="-1"></button>
						<h3>
							<span class="customize-action">
								{{{ data.customizeAction }}}
							</span>
							{{ data.title }}
						</h3>
						<# if ( data.description && data.description_hidden ) { #>
							<button type="button" class="customize-help-toggle dashicons dashicons-editor-help" aria-expanded="false"></button>
							<div class="description customize-section-description">
								{{{ data.description }}}
							</div>
						<# } #>

						<div class="customize-control-notifications-container"></div>
					</div>

					<# if ( data.description && ! data.description_hidden ) { #>
						<div class="description customize-section-description">
							{{{ data.description }}}
						</div>
					<# } #>
				</li>
			</ul>
		</li>
		<?php }
	} // Cryout_Customize_About_Section()

	class Cryout_Customize_About_Control extends WP_Customize_Control {
			public $type = 'cryout-about';
			public function render_content() {
					if ( ! empty( $this->label ) ) { ?>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ) ?></span>
					<?php }
					if ( ! empty( $this->description ) ) { ?>
                        <span class="description customize-control-description cryout-nomove"><?php echo wp_kses_post( $this->description ) ?></span>
                    <?php } ?>
					<span class="customize-control-content customize-cryoutspecial-about-link"><?php echo wp_kses_post( $this->value() ) ?></span>
			<?php
			}
	} // class Cryout_Customize_About_Control

	class Cryout_Customize_Spacer_Control extends WP_Customize_Control {
			public $type = 'cryout-spacer';
			public function render_content() { ?>
					<div class="customize-control-content customize-cryoutcontrol-spacer">
						<hr class="spacer">
					</div>
			<?php
			}
	} // class Cryout_Customize_Description_Control

	class Cryout_Customize_Description_Control extends WP_Customize_Control {
			public $type = 'cryout-description';
			public function render_content() {
					if ( ! empty( $this->label ) ) { ?>
                        <span class="customize-control-title customize-cryoutcontrol-description"><?php echo esc_html( $this->label ) ?></span>
					<?php }
					if ( ! empty( $this->description ) ) { ?>
                        <span class="description customize-control-description cryout-nomove customize-cryoutcontrol-description-desc"><?php echo wp_kses_post( $this->description ) ?></span>
                    <?php } ?>
					<span class="customize-control-content customize-cryoutcontrol-description-value"><?php echo wp_kses_post( $this->value() ) ?></span>
			<?php
			}
	} // class Cryout_Customize_Description_Control

	class Cryout_Customize_Hint_Control extends WP_Customize_Control {
			public $type = 'cryout-hint';
			public function render_content() {
					if ( ! empty( $this->label ) ) { ?>
                        <span class="customize-control-title customize-cryoutcontrol-hint"><?php echo esc_html( $this->label ) ?></span>
					<?php }
					if ( ! empty( $this->description ) ) { ?>
                        <span class="description customize-control-description cryout-nomove customize-cryoutcontrol-hint-desc"><?php echo wp_kses_post( $this->description ) ?></span>
                    <?php } ?>
					<span class="customize-control-content customize-cryoutcontrol-hint-value"><?php echo wp_kses_post( $this->value() ) ?></span>
			<?php
			}
	} // class Cryout_Customize_Hint_Control

	class Cryout_Customize_Notice_Control extends WP_Customize_Control {
			public $type = 'cryout-notice';
			public function render_content() {
					if (empty($this->input_attrs['class'])) $this->input_attrs['class'] = '';
					if ( ! empty( $this->label ) ) { ?>
                        <span class="customize-control-title customize-cryoutcontrol-notice customize-cryoutcontrol-notice-<?php echo esc_attr( $this->input_attrs['class'] ) ?>"><?php echo esc_html( $this->label ) ?></span>
					<?php }
					if ( ! empty( $this->description ) ) { ?>
                        <span class="description customize-control-description cryout-nomove customize-cryoutcontrol-notice-desc customize-cryoutcontrol-notice-<?php echo esc_attr( $this->input_attrs['class'] ) ?>-desc"><?php echo wp_kses_post( $this->description ) ?></span>
                    <?php } ?>
					<span class="customize-control-content customize-cryoutcontrol-notice-value customize-cryoutcontrol-notice-<?php echo esc_attr( $this->input_attrs['class'] ) ?>-value"><?php echo wp_kses_post( $this->value() ) ?></span>
			<?php
			}
	} // class Cryout_Customize_Notice_Control

	class Cryout_Customize_Blank_Control extends WP_Customize_Control {
			public $type = 'cryout-blank';
			public function render_content() {
				echo '&nbsp;';
			}
	} // class Cryout_Customize_Blank_Control

	class Cryout_Customize_Null_Control extends WP_Customize_Control {
			public $type = NULL;
			public function render_content() {
				return;
			}
	} // class Cryout_Customize_Null_Control


	class Cryout_Customize_Font_Control extends WP_Customize_Control {
			public $type = 'cryout-font';
			private $fonts = array();
			public function render_content() {
				$this->fonts = cryout_get_theme_structure('fonts');
				if (!empty($this->input_attrs['no_inherit'])) unset($this->fonts['Inherit']);
				?>
				<label>
					<?php if ( ! empty( $this->label ) ) : ?>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php endif;
					if ( ! empty( $this->description ) ) : ?>
						<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ) ?></span>
					<?php endif; ?>

					<select <?php $this->link(); ?> class="fontselect select2">
						<?php
						foreach ( $this->fonts as $fgroup => $fsubs ): ?>
							<optgroup label='<?php echo esc_attr( $fgroup ); ?>'>
							<?php foreach($fsubs as $item):
								$item_show = explode(',',$item); ?>
								<option style='font-family:<?php echo cryout_clean_gfont($item); ?>;' value='<?php echo esc_attr( $item ); ?>' <?php selected( $this->value(), $item ); ?>>
									<?php echo cryout_clean_gfont( $item_show[0] ); ?>
								</option>
							<?php endforeach; // fsubs ?>
							</optgroup>
						<?php endforeach; // $this->fonts ?>
					</select>
				</label>
				<?php
			} // render_content()

			public function enqueue() {
				// font control requires select2 library
				wp_enqueue_script( 'cryout-select2-js', get_template_directory_uri() . '/cryout/js/select2.min.js', array('jquery'), _CRYOUT_THEME_VERSION );
				wp_enqueue_style( 'cryout-select2-css', get_template_directory_uri() . '/cryout/css/select2.min.css', NULL, _CRYOUT_THEME_VERSION );
				// google fonts enqueues for the font selectors preview
				$gfonts = array();
				$cryout_theme_structure = cryout_get_theme_structure();
				$cryout_theme_options = cryout_get_option();
				foreach ($cryout_theme_structure['google-font-enabled-fields'] as $item) {
					if ( preg_match('/^(.*)\/gfont$/i', $cryout_theme_options[$item], $bits) ) $gfonts[] = $bits[1];
				};
				if ( count($gfonts) ):
					wp_enqueue_style( 'cryout-googlefonts', '//fonts.googleapis.com/css?family=' . implode( "|" , array_unique($gfonts) ), null, _CRYOUT_THEME_VERSION );
				endif;
			} // enqueue()

	} // class Cryout_Customize_Font_Control


	class Cryout_Customize_Slider_Control extends WP_Customize_Control {
			public $type = 'cryout-slider';
			public function __construct($manager, $id, $args = array(), $options = array()) {
				parent::__construct( $manager, $id, $args );
			} // __construct()

			public function render_content() { ?>
				<label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?>:
						<strong class="value"><?php echo esc_html( $this->value() ) ?></strong><?php echo wp_kses_post( $this->input_attrs['um'] ); ?>
					</span>
				</label>
				<input name="<?php echo esc_attr( $this->id ); ?>" type="number" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ) ?>" class="slider"
					step="<?php echo esc_attr( $this->input_attrs['step'] ) ?>" min="<?php echo esc_attr( $this->input_attrs['min'] ) ?>" max="<?php echo esc_attr( $this->input_attrs['max'] ) ?>" />
				<div class="slider"></div>
				<?php if ( ! empty( $this->description ) ) : ?>
					 <span class="description cryout-nomove customize-control-description"><?php echo wp_kses_post( $this->description ) ?></span>
				<?php endif; ?>
			<?php
			} // render_content()

			public function enqueue() {
				wp_enqueue_script( 'jquery-ui-core' );
				wp_enqueue_script( 'jquery-ui-slider' );
				wp_enqueue_script( 'cryout-customizer-controls-js', get_template_directory_uri() . '/cryout/js/customizer-controls.js', array('jquery'), _CRYOUT_THEME_VERSION );
				wp_enqueue_style( 'jquery-ui-slider', get_template_directory_uri() . '/cryout/css/jquery-ui.structure.css', NULL, _CRYOUT_THEME_VERSION );
				wp_enqueue_style( 'jquery-ui-slider-theme', get_template_directory_uri() . '/cryout/css//jquery-ui.theme.css', NULL, _CRYOUT_THEME_VERSION );
			} // enqueue()

	} // class Cryout_Customize_Slider_Control


	class Cryout_Customize_SliderTwo_Control extends WP_Customize_Control {
			public $type = 'cryout-slidertwo';
			public function __construct($manager, $id, $args = array(), $options = array()) {
				parent::__construct( $manager, $id, $args );
			} // __construct()

			public function render_content() { ?>
				<label><span class="customize-control-title"><?php echo esc_html( $this->label ); ?>:
					<strong class="value"><?php echo esc_html( $this->value() ) ?></strong><?php echo wp_kses_post( $this->input_attrs['um'] ); ?> /
					<strong class="value2"><?php echo ( intval($this->input_attrs['total']) - intval($this->value()) ); ?></strong><?php echo wp_kses_post( $this->input_attrs['um'] ); ?>
				</span></label>
				<input name="<?php echo esc_attr( $this->id ); ?>" type="number" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ) ?>" class="slidertwo"
					step="<?php echo esc_attr( $this->input_attrs['step'] ) ?>" min="<?php echo esc_attr( $this->input_attrs['min'] ) ?>"
					max="<?php echo esc_attr( $this->input_attrs['max'] ) ?>" size="<?php echo esc_attr( $this->input_attrs['total'] ) ?>"/>
				<div class="slidertwo"></div>
				<?php if ( ! empty( $this->description ) ) : ?>
					 <span class="description cryout-nomove customize-control-description"><?php echo wp_kses_post( $this->description ) ?></span>
				<?php endif; ?>
			<?php
			} // render_content()

			public function enqueue() {
				wp_enqueue_script( 'jquery-ui-core' );
				wp_enqueue_script( 'jquery-ui-slider' );
				wp_enqueue_script( 'cryout-customizer-controls-js', get_template_directory_uri() . '/cryout/js/customizer-controls.js', array('jquery'), _CRYOUT_THEME_VERSION );
				wp_enqueue_style( 'jquery-ui-slider', get_template_directory_uri() . '/cryout/css/jquery-ui.structure.css' );
				wp_enqueue_style( 'jquery-ui-slider-theme', get_template_directory_uri() . '/cryout/css//jquery-ui.theme.css' );
			} // enqueue()

	} // class Cryout_Customize_Slider_Control


	class Cryout_Customize_NumberSlider_Control extends WP_Customize_Control {
			public $type = 'cryout-numberslider';
			public function __construct($manager, $id, $args = array(), $options = array()) {
				parent::__construct( $manager, $id, $args );
			} // __construct()

			public function render_content() { ?>
				<label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				</label>
				<div class="inputcontainer">
					<input name="<?php echo esc_attr( $this->id ); ?>" type="number" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ) ?>" class="numberslider"
					step="<?php echo esc_attr( $this->input_attrs['step'] ) ?>" min="<?php echo esc_attr( $this->input_attrs['min'] )?>" max="<?php echo esc_attr( $this->input_attrs['max'] ) ?>" <?php if (!empty($this->input_attrs['readonly'])) { ?>readonly="readonly"<?php } ?> />
					<?php echo wp_kses_post( $this->input_attrs['um'] ); ?>
				</div>
				<div class="slider"></div>
				<?php if ( ! empty( $this->description ) ) : ?>
					 <span class="description cryout-nomove customize-control-description"><?php echo wp_kses_post( $this->description ) ?></span>
				<?php endif; ?>
			<?php
			} // render_content()

			public function enqueue() {
				wp_enqueue_script( 'jquery-ui-core' );
				wp_enqueue_script( 'jquery-ui-slider' );
				wp_enqueue_script( 'cryout-customizer-controls-js', get_template_directory_uri() . '/cryout/js/customizer-controls.js', array('jquery'), _CRYOUT_THEME_VERSION );
				wp_enqueue_style( 'jquery-ui-slider', get_template_directory_uri() . '/cryout/css/jquery-ui.structure.css', NULL, _CRYOUT_THEME_VERSION );
				wp_enqueue_style( 'jquery-ui-slider-theme', get_template_directory_uri() . '/cryout/css//jquery-ui.theme.css', NULL, _CRYOUT_THEME_VERSION );
			} // enqueue()

	} // class Cryout_Customize_NumberSlider_Control


	class Cryout_Customize_RadioImage_Control extends WP_Customize_Control {
			public $type = 'cryout-radioimage';
			public function __construct($manager, $id, $args = array(), $options = array()) {
				parent::__construct( $manager, $id, $args );
			} // __construct()

			public function render_content() {

				if ( empty( $this->choices ) ) return;

				$name = '_customize-imageradio-' . $this->id;  ?>

				<?php if ( ! empty( $this->label ) ) { ?> <span class="customize-control-title"><?php echo esc_html( $this->label ) ?></span> <?php } ?>

				<div class="buttonset"> <?php
					foreach ( $this->choices as $value => $data ) :

							$data['url'] = esc_url( sprintf( $data['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) );
							?>
							<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo esc_attr( $name ) . "-" . esc_attr( $value ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
							<label for="<?php echo esc_attr( $name ) . "-" . esc_attr( $value ); ?>">
									<img src="<?php echo esc_url( $data['url'] )?>" alt="<?php echo esc_html( $data['label'] ) ?>" title="<?php echo esc_html( $data['label'] ) ?>"/>
									<span class="screen-reader-text"><?php echo esc_html( $data['label'] ); ?></span>
							</label>
							<?php
					endforeach; ?>
				</div><!-- .buttonset -->

				<?php if ( ! empty( $this->description ) ) { ?> <span class="description cryout-nomove customize-control-description"><?php echo wp_kses_post( $this->description ) ?></span><?php } ?>
			<?php
			} // render_content()

			public function enqueue() {
				wp_enqueue_script( 'jquery-ui-core' );
				wp_enqueue_script( 'jquery-ui-button' );
				wp_enqueue_script( 'cryout-customizer-controls-js', get_template_directory_uri() . '/cryout/js/customizer-controls.js', array('jquery'), _CRYOUT_THEME_VERSION );
			}
	} // class Cryout_Customize_RadioImage_Control

	class Cryout_Customize_SelectShort_Control extends WP_Customize_Control {
			public $type = 'cryout-selectshort';
			public function render_content() {
				if ( empty( $this->choices ) )
					return;
				?>
				<?php if ( ! empty( $this->label ) ) : ?>
					<label for="<?php echo esc_attr( $this->id ); ?>" class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
				<?php endif; ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
				<?php endif; ?>

				<select id="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); ?> class="<?php echo esc_attr( $this->type ) ?>">
					<?php
					foreach ( $this->choices as $value => $label ) {
						echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . wp_kses_post( $label ) . '</option>';
					}
					?>
				</select>
				<?php
			} // render_content
	} // Cryout_Customize_SelectShort_Control

	class Cryout_Customize_Select2_Control extends WP_Customize_Control {
			public $type = 'cryout-select2';
			public function render_content() {
				if ( empty( $this->choices ) )
					return;
				?>
				<?php if ( ! empty( $this->label ) ) : ?>
					<label for="<?php echo esc_attr( $this->id ); ?>" class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
				<?php endif; ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
				<?php endif; ?>

				<select id="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); ?> class="<?php echo esc_attr( $this->type ) ?>">
					<?php
					foreach ( $this->choices as $value => $label ) {
						echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . wp_kses_post( $label ) . '</option>';
					}
					?>
				</select>
				<?php
			} // render_content

			public function enqueue() {
				wp_enqueue_script( 'cryout-select2-js', get_template_directory_uri() . '/cryout/js/select2.min.js', array('jquery'), _CRYOUT_THEME_VERSION );
				wp_enqueue_style( 'cryout-select2-css', get_template_directory_uri() . '/cryout/css/select2.min.css', NULL, _CRYOUT_THEME_VERSION );
			} // enqueue()

	} // Cryout_Customize_Select2_Control

	class Cryout_Customize_OptSelect_Control extends WP_Customize_Control {
			public $type = 'cryout-optselect';
			public function render_content() {
				if ( empty( $this->choices ) )
					return;
				?>
				<label>
					<?php if ( ! empty( $this->label ) ) : ?>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php endif;
					if ( ! empty( $this->description ) ) : ?>
						<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
					<?php endif; ?>

					<select <?php $this->link(); ?>>
					<?php if (!empty($this->input_attrs['disabled'])) { ?><option value="-1"><?php echo esc_html($this->input_attrs['disabled']); ?></option><?php } ?>
						<?php
						foreach ( $this->choices as $optgroup_id => $optgroup ) {
							echo '<optgroup label="' . esc_attr( $optgroup_id ) . '">';
							foreach ( $optgroup as $value => $label )
								echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . wp_kses_post( $label ) . '</option>';
							echo '</optgroup>';
						} ?>
					</select>
				</label>
				<?php
			} // render_content
	} // Cryout_Customize_OptSelect_Control

	class Cryout_Customize_IconSelect_Control extends WP_Customize_Control {
			public $type = 'cryout-iconselect';
			public function render_content() {
				$this->icons = cryout_get_theme_structure('block-icons');
				?>
				<label>
					<?php if ( ! empty( $this->label ) ) : ?>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php endif;
					if ( ! empty( $this->description ) ) : ?>
						<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ) ?></span>
					<?php endif; ?>

					<select <?php $this->link(); ?> class="iconselect select2">
						<?php
						foreach ( $this->icons as $id => $icon ): ?>
							<option value='<?php echo esc_attr( $id ); ?>' <?php selected( $this->value(), $id ); ?> class="blicon-<?php echo esc_attr( $id ) ?>"> <?php echo ( $id!='no-icon' ? "&#x" . esc_html( $icon ) . ";" : '&nbsp;' ); ?> <?php echo esc_html( $id )?> </option>
						<?php endforeach; // $this->icons ?>
					</select>
				</label>
				<?php
			} // render_content()

			public function enqueue() {
				// theme icons font enqueue for the icon selector preview
				wp_enqueue_style( 'cryout-theme-fontfaces', get_template_directory_uri() . '/resources/fonts/fontfaces.css', null, _CRYOUT_THEME_VERSION );
				wp_enqueue_style( 'cryout-select2-css', get_template_directory_uri() . '/cryout/css/select2.min.css', NULL, _CRYOUT_THEME_VERSION );
				wp_enqueue_script( 'cryout-customizer-controls-js', get_template_directory_uri() . '/cryout/js/customizer-controls.js', array('jquery'), _CRYOUT_THEME_VERSION );
				wp_enqueue_script( 'cryout-select2-js', get_template_directory_uri() . '/cryout/js/select2.min.js', array('jquery'), _CRYOUT_THEME_VERSION );
			} // enqueue()

	} // class Cryout_Customize_IconSelect_Control

	class Cryout_Customize_Toggle_Control extends WP_Customize_Control {
			public $type = 'cryout-toggle';
			public function render_content() { ?>
				<?php if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif; ?>

				<div class="toggler">
					<input
						id="<?php echo esc_attr( $this->id ); ?>"
						type="checkbox"
						value="<?php echo esc_attr( $this->value() ); ?>"
						<?php $this->link(); ?>
						<?php checked( $this->value() ); ?>
					/>
					<label for="<?php echo esc_attr( $this->id ); ?>" class="toggler-label"> </label>
				</div>

				<?php if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
				<?php endif; ?>

				<?php
			} // render_content()

			public function enqueue() {
				wp_enqueue_script( 'cryout-customizer-controls-js', get_template_directory_uri() . '/cryout/js/customizer-controls.js', array('jquery'), _CRYOUT_THEME_VERSION );
			} // enqueue()

	} // class Cryout_Customize_Toggle_Control

} // cryout_customizer_extras()

// FIN
