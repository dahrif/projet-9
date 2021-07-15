<?php
/**
 * @package Cryout Framework
 * @version 0.8.5.6
 * @revision 20201227
 * @author Cryout Creations - www.cryoutcreations.eu
 */

define('_CRYOUT_FRAMEWORK_VERSION', '0.8.5.6');

// Load everything
require_once(get_template_directory() . "/cryout/prototypes.php");
require_once(get_template_directory() . "/cryout/controls.php");
require_once(get_template_directory() . "/cryout/customizer.php");
require_once(get_template_directory() . "/cryout/ajax.php");

if( is_admin() ) {
	// Admin functionality
	require_once(get_template_directory() . "/cryout/tgmpa-class.php");
}

// Set up the Theme Customizer settings and controls
// Needs to be included in both dashboard and frontend
add_action( 'customize_register', 'cryout_customizer_extras' );
add_action( 'customize_register', array( 'Cryout_Customizer', 'register' ) );

// FIN!
