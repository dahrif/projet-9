<?php
/**
 * Ajax read more homepage functionality
 *
 * @package Cryout Framework
 * @since Cryout Framework 0.5.1
*/

if (! function_exists( 'cryout_ajax_init' ) ):
function cryout_ajax_init() {
	// loading theme structure identifiers
	$identifiers = cryout_get_theme_structure( 'theme_identifiers' );
	// loading theme settings
	$options = cryout_get_option( array(
		_CRYOUT_THEME_PREFIX . '_landingpage',
		_CRYOUT_THEME_PREFIX . '_lppostscount'
	) );

	if ( cryout_on_landingpage() ) {
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$the_query = new WP_Query(
			apply_filters( 'cryout_landingpage_indexquery', 
				array( 
					'posts_per_page' => $options[ _CRYOUT_THEME_PREFIX . '_lppostscount'], 
					'paged' => $paged 
				)
			)
		);
	} else {
		return;
	}

	// enqueue js
	wp_enqueue_script(
		'cryout_ajax_more',
		get_template_directory_uri(). '/resources/js/ajax.js',
		array('jquery'),
		_CRYOUT_THEME_VERSION,
		true
	);

	// Max number of pages
	$page_number_max = $the_query->max_num_pages;

	// Next page to load
	$page_number_next = (get_query_var('paged') > 1) ? get_query_var('paged') + 1 : 2;

	// Add some parameters for the JS.
	wp_localize_script(
		'cryout_ajax_more',
		'cryout_ajax_more',
		array(
			'page_number_next' => $page_number_next,
			'page_number_max' => $page_number_max,
			'page_link_model' => get_pagenum_link(9999999),
			'load_more_str' => cryout_get_option( $identifiers['load_more_optid'] ),
			'content_css_selector' => $identifiers['content_css_selector'],
			'pagination_css_selector' =>  $identifiers['pagination_css_selector'],
		)
	);
} // cryout_ajax_init()
endif;

if ( 'posts' == get_option( 'show_on_front' )) add_action( 'template_redirect', 'cryout_ajax_init' );

// FIN
