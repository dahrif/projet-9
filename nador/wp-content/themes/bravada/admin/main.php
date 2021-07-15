<?php
/**
 * Admin theme page
 *
 * @package Bravada
 */

// Theme particulars
require_once( get_template_directory() . "/admin/defaults.php" );
require_once( get_template_directory() . "/admin/options.php" );
require_once( get_template_directory() . "/includes/tgmpa.php" );

// Custom CSS Styles for customizer
require_once( get_template_directory() . "/includes/custom-styles.php" );

// load up theme options
$cryout_theme_settings = apply_filters( 'bravada_theme_structure_array', $bravada_big );
$cryout_theme_options = bravada_get_theme_options();
$cryout_theme_defaults = bravada_get_option_defaults();

// Get the theme options and make sure defaults are used if no values are set
//if ( ! function_exists( 'bravada_get_theme_options' ) ):
function bravada_get_theme_options() {
	$options = wp_parse_args(
		get_option( 'bravada_settings', array() ),
		bravada_get_option_defaults()
	);
	$options = cryout_maybe_migrate_options( $options );
	return apply_filters( 'bravada_theme_options_array', $options );
} // bravada_get_theme_options()
//endif;

//if ( ! function_exists( 'bravada_get_theme_structure' ) ):
function bravada_get_theme_structure() {
	global $bravada_big;
	return apply_filters( 'bravada_theme_structure_array', $bravada_big );
} // bravada_get_theme_structure()
//endif;

// backwards compatibility filter for some values that changed format
// this needs to be applied to the options array using WordPress' 'option_{$option}' filter
function bravada_options_back_compat( $options ){
	return $options;
} // bravada_options_back_compat()
//add_filter( 'option_bravada_settings', 'bravada_options_back_compat' ); /* not currently used in Bravada */

// Hooks/Filters
add_action( 'admin_menu', 'bravada_add_page_fn' );

// Add admin scripts
function bravada_admin_scripts( $hook ) {
	global $bravada_page;
	if( $bravada_page != $hook ) {
        	return;
	}

	wp_enqueue_style( 'wp-jquery-ui-dialog' );
	wp_enqueue_style( 'bravada-admin-style', esc_url( get_template_directory_uri() . '/admin/css/admin.css' ), NULL, _CRYOUT_THEME_VERSION );
	wp_enqueue_script( 'bravada-admin-js', esc_url( get_template_directory_uri() . '/admin/js/admin.js' ), array('jquery-ui-dialog'), _CRYOUT_THEME_VERSION );
	$js_admin_options = array(
		'reset_confirmation' => esc_html( __( 'Reset Bravada Settings to Defaults?', 'bravada' ) ),
	);
	wp_localize_script( 'bravada-admin-js', 'cryout_admin_settings', $js_admin_options );
}

// Create admin subpages
function bravada_add_page_fn() {
	global $bravada_page;
	$bravada_page = add_theme_page( __( 'Bravada Theme', 'bravada' ), __( 'Bravada Theme', 'bravada' ), 'edit_theme_options', 'about-bravada-theme', 'bravada_page_fn' );
	add_action( 'admin_enqueue_scripts', 'bravada_admin_scripts' );
} // bravada_add_page_fn()

// Display the admin options page

function bravada_page_fn() {

	if (!current_user_can('edit_theme_options'))  {
		wp_die( __( 'Sorry, but you do not have sufficient permissions to access this page.', 'bravada') );
	}

?>

<div class="wrap" id="main-page"><!-- Admin wrap page -->
	<div id="lefty">
	<?php
	// Reset settings to defaults if the reset button has been pressed
	if ( isset( $_POST['cryout_reset_defaults'] ) ) {
		delete_option( 'bravada_settings' ); ?>
		<div class="updated fade">
			<p><?php _e('Bravada settings have been reset successfully.', 'bravada') ?></p>
		</div> <?php
	} ?>

		<div id="admin_header">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/admin/images/logo-about-top.png' ) ?>" />
			<span class="version">
				<?php echo wp_kses_post( apply_filters( 'cryout_admin_version', sprintf( __( 'Bravada Theme v%1$s by %2$s', 'bravada' ),
					_CRYOUT_THEME_VERSION,
					'<a href="https://www.cryoutcreations.eu" target="_blank">Cryout Creations</a>'
				) ) ); ?><br>
				<?php do_action( 'cryout_admin_version' ); ?>
			</span>
		</div>

		<div id="admin_links">
			<a href="https://www.cryoutcreations.eu/wordpress-themes/bravada" target="_blank"><?php _e( 'Bravada Homepage', 'bravada' ) ?></a>
			<a href="https://www.cryoutcreations.eu/forums/f/wordpress/bravada" target="_blank"><?php _e( 'Theme Support', 'bravada' ) ?></a>
			<a class="blue-button" href="https://www.cryoutcreations.eu/wordpress-themes/bravada#cryout-comparison-section" target="_blank"><?php _e( 'Upgrade to Plus', 'bravada' ) ?></a>
		</div>

		<div id="description">
			<div id="description-inside">
			<?php
				$theme = wp_get_theme();
				echo wp_kses_post( apply_filters( 'cryout_theme_description', esc_html( $theme->get( 'Description' ) ) ) );
			?>
			</div>
		</div>

		<div id="customizer-container">
			<a class="button" href="customize.php" id="customizer"> <?php _e( 'Customize', 'bravada' ); ?> </a>
			<form action="" method="post" id="defaults" id="defaults">
				<input type="hidden" name="cryout_reset_defaults" value="true" />
				<input type="submit" class="button" id="cryout_reset_defaults" value="<?php _e( 'Reset to Defaults', 'bravada' ); ?>" />
			</form>
		</div>

	</div><!--lefty -->


	<div id="righty">
		<div id="cryout-donate" class="postbox donate">

			<h3 class="hndle"><?php _e( 'Upgrade to Plus', 'bravada' ); ?></h3>
			<div class="inside">
				<p><?php printf( __('Find out what features you\'re missing out on and how the Plus version of %1$s can improve your site.', 'cryout'), cryout_sanitize_tnl( _CRYOUT_THEME_NAME ) )  ?></p>
				<img src="<?php echo esc_url( get_template_directory_uri() . '/admin/images/features.png' ) ?>" />
				<a class="button" href="https://www.cryoutcreations.eu/wordpress-themes/bravada" target="_blank" style="display: block;"><?php _e( 'Upgrade to Plus', 'bravada' ); ?></a>

			</div><!-- inside -->

		</div><!-- donate -->

	</div><!--  righty -->
</div><!--  wrap -->

<?php
} // bravada_page_fn()
