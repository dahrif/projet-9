<?php
/* Notifications in customizer */


require get_template_directory() . '/functions/customizer-notify/appointment-customizer-notify.php';


$appointment_config_customizer = array(
	'recommended_plugins'       => array(
		'webriti-companion' => array(
			'recommended' => true,
               'description' => sprintf( esc_html__('Install and activate the %s plugin to take full advantage of all the features this theme has to offer.', 'appointment' ), sprintf( '<strong>%s</strong>', 'Webriti Companion' ) ),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'appointment' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'appointment' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'appointment' ),
	'activate_button_label'     => esc_html__( 'Activate', 'appointment' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'appointment' ),
);
appointment_Customizer_Notify::init( apply_filters( 'appointment_customizer_notify_array', $appointment_config_customizer ) );