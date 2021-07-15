<?php
if ( ! function_exists( 'spasalon_companion_customize_register' ) ) :
	/**
	 * Spasalon Companion Customize Register
	 */
	 
	function spasalon_companion_customize_register( $wp_customize ) {
		$spasalon_features_content_control = $wp_customize->get_setting( 'spa_theme_options[spasalon_service_content]' );
		if ( ! empty( $spasalon_features_content_control ) ) {
			$spasalon_features_content_control->default = spasalon_get_service_default();
		}
	}

	add_action( 'customize_register', 'spasalon_companion_customize_register' );
endif;