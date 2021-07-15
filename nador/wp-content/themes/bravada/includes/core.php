<?php
/**
 * Core theme functions
 *
 * @package Bravada
 */


 /**
  * Calculates the correct content_width value depending on site with and configured layout
  */
if ( ! function_exists( 'bravada_content_width' ) ) :
function bravada_content_width() {
	global $content_width;
	$deviation = 0.85;

	$options = cryout_get_option( array(
		'theme_sitelayout', 'theme_landingpage', 'theme_magazinelayout', 'theme_sitewidth', 'theme_primarysidebar', 'theme_secondarysidebar',
   ) );

	$content_width = 0.98 * (int)$options['theme_sitewidth'];

	switch( $options['theme_sitelayout'] ) {
		case '2cSl': case '3cSl': case '3cSr': case '3cSs': $content_width -= (int)$options['theme_primarysidebar']; // primary sidebar
		case '2cSr': case '3cSl': case '3cSr': case '3cSs': $content_width -= (int)$options['theme_secondarysidebar']; break; // secondary sidebar
	}

	if ( is_front_page() && $options['theme_landingpage'] ) {
		// landing page could be a special case;
		$width = ceil( (int)$content_width / apply_filters('bravada_lppostslayout_filter', (int)$options['theme_magazinelayout']) );
		$content_width = ceil($width);
		return;
	}

	if ( is_archive() ) {
		switch ( $options['theme_magazinelayout'] ):
			case 1: $content_width = floor($content_width*0.4); break; // magazine-one
			case 2: $content_width = floor($content_width*0.94/2); break; // magazine-two
			case 3: $content_width = floor($content_width*0.94/3); break; // magazine-three
		endswitch;
	};

	$content_width = floor($content_width*$deviation);

} // bravada_content_width()
endif;

 /**
  * Calculates the correct featured image width depending on site with and configured layout
  * Used by bravada_setup()
  */
if ( ! function_exists( 'bravada_featured_width' ) ) :
function bravada_featured_width() {

	$options = cryout_get_option( array(
		'theme_sitelayout', 'theme_landingpage', 'theme_magazinelayout', 'theme_sitewidth', 'theme_primarysidebar', 'theme_secondarysidebar',
		'theme_lplayout',
	) );

	$width = (int)$options['theme_sitewidth'];

	$deviation = 0.02 * $width; // content to sidebar(s) margin

	switch( $options['theme_sitelayout'] ) {
		case '2cSl': case '3cSl': case '3cSr': case '3cSs': $width -= (int)$options['theme_primarysidebar'] + $deviation; // primary sidebar
		case '2cSr': case '3cSl': case '3cSr': case '3cSs': $width -= (int)$options['theme_secondarysidebar'] + $deviation; break; // secondary sidebar
	}

	if ( is_front_page() && $options['theme_landingpage'] ) {
		// landing page is a special case
		$width = ceil( (int)$options['theme_sitewidth'] / apply_filters('bravada_lppostslayout_filter', (int)$options['theme_magazinelayout'] ) );
		return ceil($width);
	}

	if ( ! is_singular() ) {
		switch ( $options['theme_magazinelayout'] ):
			case 1: $width = ceil($width*0.4); break; // magazine-one
			case 2: $width = ceil($width*0.94/2); break; // magazine-two
			case 3: $width = ceil($width*0.94/3); break; // magazine-three
		endswitch;
	};

	return ceil($width);
	// also used on images registration

} // bravada_featured_width()
endif;


 /**
  * Check if a header image is being used
  * Returns the URL of the image or FALSE
  */
if ( ! function_exists( 'bravada_header_image_url' ) ) :
function bravada_header_image_url() {
	$headerlimits = cryout_get_option( 'theme_headerlimits' );
	if ($headerlimits) $limit = 0.75; else $limit = 0;

	$theme_fheader = apply_filters( 'bravada_header_image', cryout_get_option( 'theme_fheader' ) );
	$theme_headerh = floor( cryout_get_option( 'theme_headerheight' ) * $limit );
	$theme_headerw = floor( cryout_get_option( 'theme_sitewidth' ) * $limit );

	// Check if this is a post or page, if it has a thumbnail, and if it's a big one
	global $post;
	$header_image = FALSE;
	if ( get_header_image() != '' ) { $header_image = get_header_image(); }
	if ( is_singular() && has_post_thumbnail( $post->ID ) && $theme_fheader &&
		( $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'bravada-header' ) )
		 ) :
			if ( ( absint($image[1]) >= $theme_headerw ) && ( absint($image[2]) >= $theme_headerh ) ) {
				// 'header' image is large enough
				$header_image = $image[0];
			} else {
				// 'header' image too small, try 'full' image instead
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				if ( ( absint($image[1]) >= $theme_headerw ) && ( absint($image[2]) >= $theme_headerh ) ) {
					// 'full' image is large enough
					$header_image = $image[0];
				} /* else {
					// even 'full' image is too small, don't return an image
					//$header_image = false;
				} */
			}
	endif;

	return apply_filters( 'bravada_header_image_url', $header_image );
} //bravada_header_image_url()
endif;

/**
 * Header image handler
 * Both as normal img and background image
 */
add_action ( 'cryout_headerimage_hook', 'bravada_header_image', 99 );
if ( ! function_exists( 'bravada_header_image' ) ) :
function bravada_header_image() {
	if ( cryout_on_landingpage() && cryout_get_option('theme_lpslider') != 3) return; // if on landing page and static slider not set to header image, exit.
	$header_image = bravada_header_image_url();
	if ( is_front_page() && function_exists( 'the_custom_header_markup' ) && has_header_video() ) {
		the_custom_header_markup();
	} elseif ( ! empty( $header_image ) ) { ?>
			<div id="header-overlay"></div>
			<div class="header-image" <?php cryout_echo_bgimage( esc_url( $header_image ) ) ?>></div>
			<img class="header-image" alt="<?php if ( is_single() ) the_title_attribute(); elseif ( is_archive() ) echo esc_attr( get_the_archive_title() ); else echo esc_attr( get_bloginfo( 'name' ) ) ?>" src="<?php echo esc_url( $header_image ) ?>" />
			<?php cryout_header_widget_hook(); ?>
	<?php }
} // bravada_header_image()
endif;

if ( ! function_exists( 'bravada_header_title_check' ) ) :
function bravada_header_title_check() {
	return true;
    $options = cryout_get_option( array( 'theme_headertitles_posts', 'theme_headertitles_pages', 'theme_headertitles_archives', 'theme_headertitles_home' ) );

	// woocommerce should never use header titles
	if (function_exists('is_woocommerce') && is_woocommerce()) return false;

	// theme's landing page
	if ( cryout_on_landingpage() && $options['theme_headertitles_home'] ) return true;

	// blog section
	if ( is_home() && $options['theme_headertitles_home'] ) return true;

	// other instances
	if ( ( is_single() && $options['theme_headertitles_posts'] ) ||
    ( is_page() && $options['theme_headertitles_pages'] && ! cryout_on_landingpage() ) ||
    ( ( is_archive() || is_search() || is_404() ) && $options['theme_headertitles_archives'] ) ||
    ( ( is_home() ) && $options['theme_headertitles_home'] ) ) {
        return true;
    }
	return false;
} // bravada_header_title_check()
endif;

/**
 * Header Title and meta
 */
add_action ( 'cryout_headerimage_hook', 'bravada_header_title', 100 );
if ( ! function_exists( 'bravada_header_title' ) ) :
function bravada_header_title() {
    if ( cryout_on_landingpage() && cryout_get_option('theme_lpslider') != 3) return; // if on landing page and static slider not set to header image, exit.
    if ( bravada_header_title_check() ) : ?>
    <div id="header-page-title">
        <div id="header-page-title-inside">
			<?php if ( is_author() ) {?>
				<div id="author-avatar" <?php cryout_schema_microdata( 'image' );?>>
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'bravada_author_bio_avatar_size', 80 ), '', '', array( 'extra_attr' => cryout_schema_microdata( 'url', 0) ) ); ?>
				</div><!-- #author-avatar -->
			<?php } ?>
			<div class="entry-meta pretitle-meta">
				<?php cryout_headertitle_topmeta_hook(); ?>
			</div><!-- .entry-meta -->
            <?php
			if ( is_front_page() ) {
				echo '<h2 class="entry-title" ' . cryout_schema_microdata('entry-title', 0) . '>' . esc_html( get_bloginfo( 'name', 'display' ) ) . '</h2><p class="byline">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
			} elseif ( is_singular() )  {
                the_title( '<div class="entry-title">', '</div>' );
            } else {
                    echo '<div class="entry-title">';
					if ( is_home() ) {
						single_post_title();
					}
					if ( function_exists( 'is_shop' ) && is_shop() ) {
						echo wp_kses( get_the_title( wc_get_page_id( 'shop' ) ), array() );
					} elseif ( is_archive() ) {
                        echo wp_kses(get_the_archive_title(), array());
                    }
                    if ( is_search() ) {
                        printf( __( 'Search Results for: %s', 'bravada' ), '' . get_search_query() . '' );
                    }
                    if ( is_404() ) {
                        _e( 'Not Found', 'bravada' );
                    }
                    echo '</div>';
            }
			?>
			<div class="entry-meta aftertitle-meta">
				<?php cryout_headertitle_bottommeta_hook(); ?>
				<?php cryout_breadcrumbs_hook();?>
			</div><!-- .entry-meta -->
			<div class="byline">
				<?php
				if ( is_singular( array('post', 'page') ) && has_excerpt() && cryout_get_option('theme_meta_single_byline')) {
					echo wp_kses_post( get_the_excerpt() );
				}
				if ( ( ( is_archive() && !function_exists( 'is_shop' ) ) || ( is_archive() && !is_shop() ) ) && cryout_get_option('theme_meta_blog_byline') ) {
					echo wp_kses_post( get_the_archive_description() );
				}
				if ( is_search() ) {
					echo get_search_form();
				}
				?>
			</div>
        </div>
    </div> <?php endif;
} // bravada_header_title()
endif;

/**
 * Remove the lables from archive titles
 */
function bravada_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
} // bravada_archive_title()

add_filter( 'get_the_archive_title', 'bravada_archive_title' );


/**
 * Adds title and description to header
 * Used in header.php
*/
if ( ! function_exists( 'bravada_title_and_description' ) ) :
function bravada_title_and_description() {

	$options = cryout_get_option( array( 'theme_logoupload', 'theme_siteheader' ) );

	if ( in_array( $options['theme_siteheader'], array( 'logo', 'both' ) ) ) {
		bravada_logo_helper( $options['theme_logoupload'] );
	}
	if ( in_array( $options['theme_siteheader'], array( 'title', 'both', 'logo', 'empty' ) ) ) {
		$heading_tag = ( is_front_page() || ( is_home() ) ) ? 'h1' : 'div';
		echo '<div id="site-text">';
		echo '<' . $heading_tag . cryout_schema_microdata( 'site-title', 0 ) . ' id="site-title">';
		echo '<span> <a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'description' ) ) . '" rel="home">' . esc_attr( get_bloginfo( 'name' ) ) . '</a> </span>';
		echo '</' . $heading_tag . '>';
		echo '<span id="site-description" ' . cryout_schema_microdata( 'site-description', 0 ) . ' >' . esc_attr( get_bloginfo( 'description' ) ). '</span>';
		echo '</div>';
	}
} // bravada_title_and_description()
endif;
add_action ( 'cryout_branding_hook', 'bravada_title_and_description' );

function bravada_logo_helper( $theme_logo ) {

		$wp_logo = str_replace( 'class="custom-logo-link"', 'id="logo" class="custom-logo-link" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '"', get_custom_logo() );
		if ( ! empty( $wp_logo ) ) {
			echo '<div class="identity">' . $wp_logo . '</div>';
		} else {
			echo '';
		}

} // bravada_logo_helper()

// cryout_schema_publisher() located in cryout/prototypes.php
add_action( 'cryout_after_inner_hook', 'cryout_schema_publisher' );
add_action( 'cryout_singular_after_inner_hook', 'cryout_schema_publisher' );

// cryout_schema_main() located in cryout/prototypes.php
add_action( 'cryout_after_inner_hook', 'cryout_schema_main' );
add_action( 'cryout_singular_after_inner_hook', 'cryout_schema_main' );

// cryout_skiplink() located in cryout/prototypes.php
add_action( 'wp_body_open', 'cryout_skiplink', 2 );

/**
 * Back to top button
*/
function bravada_back_top() {
	echo '<a id="toTop"><span class="screen-reader-text">' . __('Back to Top', 'bravada') . '</span><i class="icon-back2top"></i> </a>';
} // bravada_back_top()
add_action( 'cryout_master_topfooter_hook', 'bravada_back_top' );


/**
 * Creates pagination for blog pages.
 */
if ( ! function_exists( 'bravada_pagination' ) ) :
function bravada_pagination( $pages = '', $range = 2, $prefix ='' ) {
	$pagination = cryout_get_option( 'theme_pagination' );
	if ( $pagination && function_exists( 'the_posts_pagination' ) ):
		the_posts_pagination( array(
			'prev_text' => '<i class="icon-pagination-left"></i>',
			'next_text' => '<i class="icon-pagination-right"></i>',
			'mid_size' => $range
		) );
	else:
		//posts_nav_link();
		bravada_content_nav( 'nav-old-below' );
	endif;

} // bravada_pagination()
endif;

/**
 * Prev/Next page links
 */
if ( ! function_exists( 'bravada_nextpage_links' ) ) :
function bravada_nextpage_links( $defaults ) {
	$args = array(
		'link_before'      => '<em>',
		'link_after'       => '</em>',
	);
	$r = wp_parse_args( $args, $defaults );
	return $r;
} // bravada_nextpage_links()
endif;
add_filter( 'wp_link_pages_args', 'bravada_nextpage_links' );

/**
 * Fixed prev/next post links
 */
if ( ! function_exists( 'bravada_fixed_nav_links' ) ) :
function bravada_fixed_nav_links() { ?>
	<nav id="nav-fixed">
		<div class="nav-previous"><?php previous_post_link( '%link', '<i class="icon-fixed-nav"></i>', true );  previous_post_link( '%link', '<span>%title</span>', true );  ?></div>
		<div class="nav-next"><?php next_post_link( '%link', '<i class="icon-fixed-nav"></i>', true ); next_post_link( '%link', '<span>%title</span>', true );  ?></div>
	</nav>
<?php
} // bravada_fixed_nav_links()
endif;
if ( 2 == cryout_get_option( 'theme_singlenav' ) ) add_action('cryout_main_hook', 'bravada_fixed_nav_links', 15 );

/**
 * Footer Hook
 */
add_action( 'cryout_master_footerbottom_hook', 'bravada_master_footer' );
function bravada_master_footer() {
	$the_theme = wp_get_theme();
	do_action( 'cryout_footer_hook' );
	echo '<div style="display:block; margin: 0.5em auto;">' . __( "Powered by", "bravada" ) .
		'<a target="_blank" href="' . esc_html( $the_theme->get( 'ThemeURI' ) ) . '" title="';
	echo 'Bravada WordPress Theme by ' . 'Cryout Creations"> ' . 'Bravada' .'</a> &amp; <a target="_blank" href="' . "http://wordpress.org/";
	echo '" title="' . esc_attr__( "Semantic Personal Publishing Platform", "bravada") . '"> ' . sprintf( " %s", "WordPress" ) . '</a>.</div>';
}

add_action( 'cryout_master_footer_hook', 'bravada_copyright' );
function bravada_copyright() {
    echo '<div id="site-copyright">' . do_shortcode( cryout_get_option( 'theme_copyright' ) ). '</div>';
}

/*
 * Sidebar handler
*/
if ( ! function_exists( 'bravada_get_sidebar' ) ) :
function bravada_get_sidebar() {

	$layout = cryout_get_layout();

	switch( $layout ) {
		case '2cSl':
			get_sidebar( 'left' );
		break;

		case '2cSr':
			get_sidebar( 'right' );
		break;

		case '3cSl' : case '3cSr' : case '3cSs' :
			get_sidebar( 'left' );
			get_sidebar( 'right' );
		break;

		default:
		break;
	}
} // bravada_get_sidebar()
endif;

/*
 * General layout class
 */
if ( ! function_exists( 'bravada_get_layout_class' ) ) :
function bravada_get_layout_class( $echo = true ) {

	$layout = cryout_get_layout();

	/*  If not, return the general layout */
	switch( $layout ) {
		case '2cSl': $class = "two-columns-left"; break;
		case '2cSr': $class = "two-columns-right"; break;
		case '3cSl': $class = "three-columns-left"; break;
		case '3cSr' : $class = "three-columns-right"; break;
		case '3cSs' : $class = "three-columns-sided"; break;
		case '1c':
		default: $class = "one-column"; break;
	}

	// allow the generated layout class to be filtered
	$output = esc_attr( apply_filters( 'bravada_general_layout_class', $class, $layout ) );

	if ( $echo ) {
		echo $output;
	} else {
		return $output;
	}
} // bravada_get_layout_class()
endif;

/**
* Checks the browser agent string for mobile ids and adds "mobile" class to body if true
*/
add_filter( 'body_class', 'cryout_mobile_body_class');


/**
* Creates breadcrumbs with page sublevels and category sublevels.
* Hooked in master hook
*/
if ( ! function_exists( 'bravada_breadcrumbs' ) ) :
function bravada_breadcrumbs() {
	cryout_breadcrumbs(
		'',														// $separator, usually <i class="icon-bread-arrow"></i>
		'<i class="icon-bread-home"></i>', 						// $home
		1,														// $showCurrent
		'<span class="current">', 								// $before
		'</span>', 												// $after
		'<div id="breadcrumbs-container" class="cryout %1$s"><div id="breadcrumbs-container-inside"><div id="breadcrumbs"> <nav id="breadcrumbs-nav" %2$s>', // $wrapper_pre
		'</nav></div></div></div><!-- breadcrumbs -->', 		// $wrapper_post
		bravada_get_layout_class(false),						// $layout_class
		__( 'Home', 'bravada' ),								// $text_home
		__( 'Archive for category "%s"', 'bravada' ),			// $text_archive
		__( 'Search results for "%s"', 'bravada' ), 			// $text_search
		__( 'Posts tagged', 'bravada' ), 						// $text_tag
		__( 'Articles posted by', 'bravada' ), 					// $text_author
		__( 'Not Found', 'bravada' ),							// $text_404
		__( 'Post format', 'bravada' ),							// $text_format
		__( 'Page', 'bravada' )									// $text_page
	);
} // bravada_breadcrumbs()
endif;


/**
 * Adds searchboxes to the appropriate menu location
 * Hooked in master hook
 */
if ( ! function_exists( 'cryout_search_menu' ) ) :
function cryout_search_menu( $items, $args ) {
$options = cryout_get_option( array( 'theme_searchboxmain', 'theme_searchboxfooter' ) );

	if( $args->theme_location == 'primary' && $options['theme_searchboxmain'] ) {
		$container_class = 'menu-main-search';
		$items = "<li class='" . $container_class . " menu-search-animated'>
			<a href><i class='icon-search2'></i><span class='screen-reader-text'>" . __('Search', 'bravada') . "</span></a>" . get_search_form( false ) . "
			<i class='icon-cancel'></i>
		</li>" . $items; // reverse order
	}
	if( $args->theme_location == 'footer' && $options['theme_searchboxfooter'] ) {
		$container_class = 'menu-footer-search';
		$items .= "<li class='" . $container_class . "'>" . get_search_form( false ) . "</li>";
	}
	return $items;
} // cryout_search_mainmenu()
endif;

/**
 * Adds burger icon to main menu for an extra menu
 * Hooked in master hook
 */
if ( ! function_exists( 'cryout_burger_menu' ) ) :
function cryout_burger_menu( $items, $args = array() ) {
	$button_html = "<li class=''>

	</li>";
	if (isset($args->theme_location)) {
		// filtering wp_nav_menu_items
		if( $args->theme_location == 'primary' ) {
			$items .= $button_html;
		}
	} elseif (isset($args['menu_id']) && ('prime_nav' == $args['menu_id'])) {
		// filtering wp_page_menu_args
		$items = preg_replace( '/<\/ul>/is', $button_html . '</ul>', $items );
	};
	return $items;
} // cryout_burger_menu()
endif;

/**
 * Normalizes tags widget font when needed
 */
if ( TRUE === cryout_get_option( 'theme_normalizetags' ) ) add_filter( 'wp_generate_tag_cloud', 'cryout_normalizetags' );

/**
 * Adds preloader
 */
function bravada_preloader() {
	$theme_preloader = cryout_get_option( 'theme_preloader' );
	if ( ( $theme_preloader == 1) || ( $theme_preloader == 2 && (is_front_page() || is_home()) ) ): ?>
		<div class="cryout-preloader">
			<div class="cryout-preloader-inside">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
			</div>
		</div>
	<?php endif;
}
add_action( 'cryout_body_hook', 'bravada_preloader' );

/**
 * Adds failsafe styling for preloader and lazyloading functionality
 */
function bravada_header_failsafes() {
	$options = cryout_get_option( array( 'theme_preloader', 'theme_lazyimages' ) );
	?><noscript><style><?php
		if ( $options['theme_preloader'] ) { ?>.cryout .cryout-preloader {display: none;}<?php }
		if ( $options['theme_lazyimages'] !=0 ) { ?>.cryout img[loading="lazy"] {opacity: 1;}<?php }
	?></style></noscript>
<?php
} // bravada_header_failsafes()
add_action( 'wp_head', 'bravada_header_failsafes', 11 );

/**
* Master hook to bypass customizer options
*/
if ( ! function_exists( 'bravada_master_hook' ) ) :
function bravada_master_hook() {
	$theme_interim_options = cryout_get_option( array(
		'theme_breadcrumbs',
		'theme_searchboxmain',
		'theme_searchboxfooter',
		'theme_comlabels')
	);

	if ( $theme_interim_options['theme_breadcrumbs'] )  add_action( 'cryout_breadcrumbs_hook', 'bravada_breadcrumbs' );
	if ( $theme_interim_options['theme_searchboxmain'] || $theme_interim_options['theme_searchboxfooter'] ) add_filter( 'wp_nav_menu_items', 'cryout_search_menu', 10, 2);
	//if ( has_nav_menu( 'top' ) ) add_filter( 'wp_nav_menu_items', 'cryout_burger_menu', 10, 2); // add burger menu icon to standard main navigation
	//if ( has_nav_menu( 'top' ) ) add_filter( 'wp_page_menu', 'cryout_burger_menu', 12, 2); // add burger menu icon to failsafe pages main navigation

	if ( $theme_interim_options['theme_comlabels'] == 1 || $theme_interim_options['theme_comlabels'] == 3) {
		add_filter( 'comment_form_default_fields', 'bravada_comments_form' );
		add_filter( 'comment_form_field_comment', 'bravada_comments_form_textarea' );
	}

	if ( cryout_get_option( 'theme_socials_header' ) ) 		add_action( 'cryout_header_socials_hook', 'bravada_socials_menu_header', 10 );
	if ( cryout_get_option( 'theme_socials_footer' ) ) 		add_action( 'cryout_master_footer_hook', 'bravada_socials_menu_footer', 5 );
	if ( cryout_get_option( 'theme_socials_left_sidebar' ) ) 	add_action( 'cryout_before_primary_widgets_hook', 'bravada_socials_menu_left', 5 );
	if ( cryout_get_option( 'theme_socials_right_sidebar' ) ) 	add_action( 'cryout_before_secondary_widgets_hook', 'bravada_socials_menu_right', 5 );
};
endif;
add_action( 'wp', 'bravada_master_hook' );


// Boxes image size
function bravada_lpbox_width( $options = array() ) {

	if ( $options['theme_lpboxlayout1'] == 1 ) {
		$totalwidth = 1920;
	} else {
		$totalwidth = $options['theme_sitewidth'];
	}
	$options['theme_lpboxwidth1'] = intval ( $totalwidth / $options['theme_lpboxrow1'] );

	if ( $options['theme_lpboxlayout2'] == 1 ) {
		$totalwidth = 1920;
	} else {
		$totalwidth = $options['theme_sitewidth'];
	}
	$options['theme_lpboxwidth2'] = intval ( $totalwidth / $options['theme_lpboxrow2'] );

	return $options;
} // bravada_lpbox_width()

// Used for the landing page blocks auto excerpts
function bravada_custom_excerpt( $text = '', $length = 35, $more = '...' ) {
	$raw_excerpt = $text;

	//handle the <!--more--> and <!--nextpage--> tags
	$moretag = false;
	if (strpos( $text, '<!--nextpage-->' )) $explodemore = explode('<!--nextpage-->', $text);
	if (strpos( $text, '<!--more-->' )) $explodemore = explode('<!--more-->', $text);
	if (!empty($explodemore[1])) {
		// tag was found
		$text = $explodemore[0];
		$moretag = true;
	}

	if ( '' != $text ) {
		$text = strip_shortcodes( $text );

		$text = str_replace(']]>', ']]&gt;', $text);

		// Filters the number of words in an excerpt. Default 35.
		$excerpt_length = apply_filters( 'bravada_custom_excerpt_length', $length );

		if ($excerpt_length == 0) return '';

		// Filters the string in the "more" link displayed after a trimmed excerpt.
		$excerpt_more = apply_filters( 'bravada_custom_excerpt_more', $more );
		if (!$moretag) {
			$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
		}
	}
	return apply_filters( 'bravada_custom_excerpt', $text, $raw_excerpt );
} // bravada_custom_excerpt()

// ajax load more button alternative hook
add_action( 'template_redirect', 'cryout_ajax_init' );

function bravada_check_empty_menu( $menu_id ) {
	if (! has_nav_menu( $menu_id ) ) return true;

    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_id ] ) ) {
        $menu = wp_get_nav_menu_object( $locations[ $menu_id ] );
		$menu_items = wp_get_nav_menu_items( $menu->term_id );

		if( isset($menu_items) ) {
			return $menu_items;
		}

    }
	return false;
}

/* FIN */
