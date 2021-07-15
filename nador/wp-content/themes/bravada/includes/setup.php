<?php
/*
 * Theme setup functions. Theme initialization, add_theme_support(), widgets, navigation
 *
 * @package Bravada
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
add_action( 'after_setup_theme', 'bravada_content_width' ); // mostly for dashboard
add_action( 'template_redirect', 'bravada_content_width' );

/** Tell WordPress to run bravada_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'bravada_setup' );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function bravada_setup() {

	add_filter( 'bravada_theme_options_array', 'bravada_lpbox_width' );

	$options = cryout_get_option();

	// This theme styles the visual editor with editor-style.css to match the theme style.
	if ($options['theme_editorstyles']) add_editor_style( 'resources/styles/editor-style.css' );

	// Support title tag since WP 4.1
	add_theme_support( 'title-tag' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Add HTML5 support
	add_theme_support( 'html5', array( 'script', 'style', 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

	// Add post formats
	add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'audio', 'video' ) );

	// Make theme available for translation
	load_theme_textdomain( 'bravada', get_template_directory() . '/cryout/languages' );
	load_theme_textdomain( 'bravada', get_template_directory() . '/languages' );
	load_textdomain( 'cryout', '' );

	// This theme allows users to set a custom backgrounds
	add_theme_support( 'custom-background' );

	// This theme supports WordPress 4.5 logos
	add_theme_support( 'custom-logo', array( 'height' => (int) $options['theme_headerheight'], 'width' => 240, 'flex-height' => true, 'flex-width'  => true ) );
	add_filter( 'get_custom_logo', 'cryout_filter_wp_logo_img' );

	// This theme uses wp_nav_menu() in 3 locations.
	register_nav_menus( array(
		'primary'	=> __( 'Primary/Side Navigation', 'bravada' ),
		'top'		=> __( 'Header Navigation', 'bravada' ),
		'sidebar'	=> __( 'Left Sidebar', 'bravada' ),
		'footer'	=> __( 'Footer Navigation', 'bravada' ),
		'socials'	=> __( 'Social Icons', 'bravada' ),
	) );

	$fheight = $options['theme_fheight'];
	$falign = (bool)$options['theme_falign'];
	if (false===$falign) {
		$fheight = 0;
	} else {
		$falign = explode( ' ', $options['theme_falign'] );
		if (!is_array($falign) ) $falign = array( 'center', 'center' ); //failsafe
	}

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(
		// default Post Thumbnail dimensions
		apply_filters( 'bravada_thumbnail_image_width', bravada_featured_width() ),
		apply_filters( 'bravada_thumbnail_image_height', $options['theme_fheight'] ),
		false
	);
	// Custom image size for use with post thumbnails
	add_image_size( 'bravada-featured',
		apply_filters( 'bravada_featured_image_width', bravada_featured_width() ),
		apply_filters( 'bravada_featured_image_height', $fheight ),
		$falign
	);

	// Additional responsive image sizes
	add_image_size( 'bravada-featured-lp',
		apply_filters( 'bravada_featured_image_lp_width', ceil( $options['theme_sitewidth'] / apply_filters( 'bravada_lppostslayout_filter', $options['theme_magazinelayout'] ) ) ),
		apply_filters( 'bravada_featured_image_lp_height', $options['theme_fheight'] ),
		$falign
	);

	add_image_size( 'bravada-featured-half',
		apply_filters( 'bravada_featured_image_half_width', 800 ),
		apply_filters( 'bravada_featured_image_falf_height', $options['theme_fheight'] ),
		$falign
	);
	add_image_size( 'bravada-featured-third',
		apply_filters( 'bravada_featured_image_third_width', 512 ),
		apply_filters( 'bravada_featured_image_third_height', $options['theme_fheight'] ),
		$falign
	);

	// Boxes image sizes
	add_image_size( 'bravada-lpbox-1', $options['theme_lpboxwidth1'], $options['theme_lpboxheight1'], true );
	add_image_size( 'bravada-lpbox-2', $options['theme_lpboxwidth2'], $options['theme_lpboxheight2'], true );

	// Add support for flexible headers
	add_theme_support( 'custom-header', array(
		'flex-height' 	=> true,
		'height'		=> (int) $options['theme_headerheight'],
		'flex-width'	=> true,
		'width'			=> 1920,
		'default-image'	=> get_template_directory_uri() . '/resources/images/headers/mirrorlake.jpg',
		'video'         => true,
	));

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'mirrorlake' => array(
			'url' => '%s/resources/images/headers/mirrorlake.jpg',
			'thumbnail_url' => '%s/resources/images/headers/mirrorlake.jpg',
			'description' => __( 'Mirror lake', 'bravada' )
		)
	) );

	// Gutenberg
	// add_theme_support( 'wp-block-styles' ); // apply default block styles
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-color-palette', array(
		array(
			'name' => __( 'Accent #1', 'bravada' ),
			'slug' => 'accent-1',
			'color' => $options['theme_accent1'],
		),
		array(
			'name' => __( 'Accent #2', 'bravada' ),
			'slug' => 'accent-2',
			'color' => $options['theme_accent2'],
		),
		array(
			'name' => __( 'Content Headings', 'bravada' ),
			'slug' => 'headings',
			'color' => $options['theme_headingstext'],
		),
 		array(
			'name' => __( 'Site Text', 'bravada' ),
			'slug' => 'sitetext',
			'color' => $options['theme_sitetext'],
		),
		array(
			'name' => __( 'Content Background', 'bravada' ),
			'slug' => 'sitebg',
			'color' => $options['theme_contentbackground'],
		),
 	) );
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => __( 'small', 'cryout' ),
			'shortName' => __( 'S', 'cryout' ),
			'size' => intval( intval( $options['theme_fgeneralsize'] ) / 1.6 ),
			'slug' => 'small'
		),
		array(
			'name' => __( 'normal', 'cryout' ),
			'shortName' => __( 'M', 'cryout' ),
			'size' => intval( intval( $options['theme_fgeneralsize'] ) * 1.0 ),
			'slug' => 'normal'
		),
		array(
			'name' => __( 'large', 'cryout' ),
			'shortName' => __( 'L', 'cryout' ),
			'size' => intval( intval( $options['theme_fgeneralsize'] ) * 1.6 ),
			'slug' => 'large'
		),
		array(
			'name' => __( 'larger', 'cryout' ),
			'shortName' => __( 'XL', 'cryout' ),
			'size' => intval( intval( $options['theme_fgeneralsize'] ) * 2.56 ),
			'slug' => 'larger'
		)
	) );

	// WooCommerce compatibility
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

} // bravada_setup()

function bravada_gutenberg_editor_styles() {
	$editorstyles = cryout_get_option('theme_editorstyles');
	if ( ! $editorstyles ) return;
	wp_enqueue_style( 'bravada-gutenberg-editor-styles', get_theme_file_uri( '/resources/styles/gutenberg-editor.css' ), false, _CRYOUT_THEME_VERSION, 'all' );
	wp_add_inline_style( 'bravada-gutenberg-editor-styles', preg_replace( "/[\n\r\t\s]+/", " ", bravada_editor_styles() ) );
}
add_action( 'enqueue_block_editor_assets', 'bravada_gutenberg_editor_styles' );

/*
 * Have two textdomains work with translation systems.
 * https://gist.github.com/justintadlock/7a605c29ae26c80878d0
 */
function bravada_override_load_textdomain( $override, $domain ) {
	// Check if the domain is our framework domain.
	if ( 'cryout' === $domain ) {
		global $l10n;
		// If the theme's textdomain is loaded, assign the theme's translations
		// to the framework's textdomain.
		if ( isset( $l10n[ 'bravada' ] ) )
			$l10n[ $domain ] = $l10n[ 'bravada' ];
		// Always override.  We only want the theme to handle translations.
		$override = true;
	}
	return $override;
}
add_filter( 'override_load_textdomain', 'bravada_override_load_textdomain', 10, 2 );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function bravada_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'bravada_page_menu_args' );

/**
 * Custom menu fallback, using wp_page_menu()
 * Created to make the fallback menu have the same HTML structure as the default
 */
function bravada_default_main_menu() {
    wp_page_menu($args = array(
		'menu_class'	=> 'side-menu side-section',
		'link_before'	=> '<span>',
		'link_after'	=> '</span>',
		'before' 		=> '<ul id="mobile-nav">',
		'after' 		=> '</ul>'
	));
}

/**
 * Custom menu fallback, using wp_page_menu()
 * Created to make the fallback menu have the same HTML structure as the default
 */
function bravada_default_header_menu() {
    wp_page_menu($args = array(
		'menu_class'	=> '',
		'link_before'	=> '<span>',
		'link_after'	=> '</span>',
		'before' 		=> '<ul id="top-nav" class="top-nav">',
		'after' 		=> '</ul>'
	));
}

/** Main/Side/Mobile menu */
function bravada_main_menu() {
	wp_nav_menu( array(
		'container'		=> '',
		'menu_id'		=> 'mobile-nav',
		'menu_class'	=> '',
		'theme_location'=> 'primary',
		'link_before'	=> '<span>',
		'link_after'	=> '</span>',
		'items_wrap'	=> '<div class="side-menu side-section"><ul id="%s" class="%s">%s</ul></div>',
		'fallback_cb' 	=> 'bravada_default_main_menu'
	) );
} // bravada_main_menu()
add_action ( 'cryout_mobilemenu_hook', 'bravada_main_menu' );

/** Header menu */
function bravada_header_menu() { ?>
	<?php
	wp_nav_menu( array(
		'container'		=> '',
		'menu_id'		=> 'top-nav',
		'menu_class'	=> '',
		'theme_location'=> 'top',
		'link_before'	=> '<span>',
		'link_after'	=> '</span>',
		'items_wrap'	=> '<div><ul id="%s" class="%s">%s</ul></div>',
		'fallback_cb'    => 'bravada_default_header_menu'

	) );
} // bravada_header_menu()
add_action ( 'cryout_access_hook', 'bravada_header_menu' );

/** Left sidebar menu */
function bravada_sidebar_menu() {
	if ( has_nav_menu( 'sidebar' ) )
		wp_nav_menu( array(
			'container'			=> 'nav',
			'container_class'	=> 'sidebarmenu widget-container',
			'theme_location'	=> 'sidebar',
			'depth'				=> 1
		) );
} // bravada_sidebar_menu()
add_action ( 'cryout_before_primary_widgets_hook', 'bravada_sidebar_menu' , 10 );

/** Footer menu */
function bravada_footer_menu() {
	if ( has_nav_menu( 'footer' ) )
		wp_nav_menu( array(
			'container' 		=> 'nav',
			'container_class'	=> 'footermenu',
			'theme_location'	=> 'footer',
			'after'				=> '<span class="sep">/</span>',
			'depth'				=> 1
		) );
} // bravada_footer_menu()
add_action ( 'cryout_master_footerbottom_hook', 'bravada_footer_menu' , 10 );

/** SOCIALS MENU */
function bravada_socials_menu( $location ) {
	if ( has_nav_menu( 'socials' ) )
		echo strip_tags(
			wp_nav_menu( array(
				'container' => 'nav',
				'container_class' => 'socials',
				'container_id' => $location,
				'theme_location' => 'socials',
				'link_before' => '<span>',
				'link_after' => '</span>',
				'depth' => 0,
				'items_wrap' => '%3$s',
				'walker' => new Cryout_Social_Menu_Walker(),
				'echo' => false,
			) ),
		'<a><div><span><nav>'
		);
} //bravada_socials_menu()

function bravada_socials_menu_header() { ?>
	<div class="side-socials side-section">
		<div class="widget-side-section-inner">
			<section class="side-section-element widget_cryout_socials">
				<div class="widget-socials">
					<?php bravada_socials_menu( 'sheader' ) ?>
				</div>
			</section>
		</div>
	</div><?php
} // bravada_socials_menu_header()

function bravada_socials_menu_footer() { bravada_socials_menu( 'sfooter' ); }
function bravada_socials_menu_left()   { bravada_socials_menu( 'sleft' );   }
function bravada_socials_menu_right()  { bravada_socials_menu( 'sright' );  }

/* Socials hooks moved to master hook in core.php */

/**
 * Register widgetized areas defined by theme options.
 */
function cryout_widgets_init() {
	$areas = cryout_get_theme_structure( 'widget-areas' );
	if ( ! empty( $areas ) ):
		foreach ( $areas as $aid => $area ):
			register_sidebar( array(
				'name' 			=> $area['name'],
				'id' 			=> $aid,
				'description' 	=> ( isset( $area['description'] ) ? $area['description'] : '' ),
				'before_widget' => $area['before_widget'],
				'after_widget' 	=> $area['after_widget'],
				'before_title' 	=> $area['before_title'],
				'after_title' 	=> $area['after_title'],
			) );
		endforeach;
	endif;
} // cryout_widgets_init()
add_action( 'widgets_init', 'cryout_widgets_init' );

/**
 * Creates different class names for footer widgets depending on their number.
 * This way they can fit the footer area.
 */
function bravada_footer_colophon_class() {
	$opts = cryout_get_option( array( 'theme_footercols', 'theme_footeralign' ) );
	$class = '';
	switch ( $opts['theme_footercols'] ) {
		case '0': 	$class = 'all';		break;
		case '1':	$class = 'one';		break;
		case '2':	$class = 'two';		break;
		case '3':	$class = 'three';	break;
		case '4':	$class = 'four';	break;
	}
	if ( !empty($class) ) echo 'class="footer-' . esc_attr( $class ) . ' ' . ( $opts['theme_footeralign'] ? 'footer-center' : '' ) . '"';
} // bravada_footer_colophon_class()

/**
 * Set up widget areas
 */
function bravada_widget_header() {
	$headerimage_on_lp = cryout_get_option( 'theme_lpslider' );
	if ( is_active_sidebar( 'widget-area-header' ) && ( !cryout_on_landingpage() || ( cryout_on_landingpage() && ($headerimage_on_lp == 3) ) ) ) { ?>
		<aside id="header-widget-area" <?php cryout_schema_microdata( 'sidebar' ); ?>>
			<?php dynamic_sidebar( 'widget-area-header' ); ?>
		</aside><?php
	}
} // bravada_widget_header()

function bravada_widget_before() {
	if ( is_active_sidebar( 'content-widget-area-before' ) ) { ?>
		<aside class="content-widget content-widget-before" <?php cryout_schema_microdata( 'sidebar' ); ?>>
			<?php dynamic_sidebar( 'content-widget-area-before' ); ?>
		</aside><!--content-widget--><?php
	}
} //bravada_widget_before()

function bravada_widget_after() {
	if ( is_active_sidebar( 'content-widget-area-after' ) ) { ?>
		<aside class="content-widget content-widget-after" <?php cryout_schema_microdata( 'sidebar' ); ?>>
			<?php dynamic_sidebar( 'content-widget-area-after' ); ?>
		</aside><!--content-widget--><?php
	}
} //bravada_widget_after()

function bravada_widget_side_section() {
	do_action('cryout_header_socials_hook');

	if ( is_active_sidebar( 'widget-area-side-section' ) ) { ?>
		<div class="side-section-widget side-section">
			<div class="widget-side-section-inner">
				<?php dynamic_sidebar( 'widget-area-side-section' ); ?>
			</div><!--content-widget-->
		</div><?php
	};
} //bravada_widget_side_section()

add_action( 'cryout_header_widget_hook',  'bravada_widget_header' );
add_action( 'cryout_before_content_hook', 'bravada_widget_before' );
add_action( 'cryout_after_content_hook',  'bravada_widget_after' );
add_action( 'cryout_side_section_hook',    'bravada_widget_side_section' );

/* FIN */
