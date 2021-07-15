<?php
/**
 * Theme Defaults
 *
 * @package Bravada
 */

function bravada_get_option_defaults() {

	$sample_pages = cryout_get_default_pages();

	// DEFAULT OPTIONS ARRAY
	$bravada_defaults = array(

	"theme_db" 					=> "0.9",

	// Layout
	"theme_sitelayout"			=> "2cSr", // two columns, sidebar right
	"theme_layoutalign"			=> 0, 		// 0=wide, 1=boxed
	"theme_sitewidth"  			=> 1240, 	// pixels
	"theme_primarysidebar"		=> 320, 	// pixels
	"theme_secondarysidebar"	=> 320, 	// pixels
	"theme_magazinelayout"		=> 2, 		// two columns
	"theme_elementpadding" 		=> 0, 		// percent
	"theme_footercols"			=> 3, 		// 0, 1, 2, 3, 4
	"theme_footeralign"			=> 0,		// default

	// Menu
	"theme_menustyle"			=> 0, 	// normal, fixed
	"theme_menuheight"			=> 75, 	// pixels
	"theme_menuposition"		=> 1, 	// normal, on header image
	"theme_menualignment"		=> 1, 	// boxed, wide
	"theme_menulayout"			=> 1, 	// 0=left, 1=right, 2=center

	"theme_logoupload"			=> '', // empty
	"theme_siteheader"			=> 'both', // title, logo, both, empty
	"theme_sitetagline"			=> '', // 1= show tagline
	"theme_titleaccent" 		=> 1.2, // em

	"theme_headertitle_anim"	=> 1,	// 1=enabled, 0=disabled
	"theme_headerfullscreen"	=> 1, 	// 1=enabled, 0=disabled
	//"theme_headerfullscreenarchives"=> 0, // 1=enabled, 0=disabled
	"theme_headerheight" 		=> 1080, // pixels
	"theme_headerresponsive" 	=> 0, 	// 0=cropped, 1=contained

	"theme_headerwidgetwidth"	=> "33%", // 25%, 33%, 50%, 60%, 100%
	"theme_headerwidgetalign"	=> "right", // left, center, right

	// Landing page
	"theme_landingpage"			=> 1, // 1=enabled, 0=disabled

	"theme_lpslider"			=> 1, // 2=shortcode, 1=static, 0=disabled
	"theme_lpsliderimage"		=> get_template_directory_uri() . '/resources/images/slider/static.jpg', // static image
	"theme_lpslidershortcode"	=> '',
	"theme_lpslidertitle"		=> get_bloginfo('name'),
	"theme_lpslidertext"		=> get_bloginfo('description'),
	"theme_lpslidercta1text"	=> 'Read more',
	"theme_lpslidercta1link"	=> '#lp-blocks',
	"theme_lpslidercta2text"	=> 'See more',
	"theme_lpslidercta2link"	=> '#lp-boxes-1',
	"theme_lpposts"				=> 1, // 2=static page, 1=posts, 0=disabled
	"theme_lpposts_more"		=> 'More Posts',

	"theme_lpblockmaintitle1"	=> '',
	"theme_lpblockmaindesc1"	=> '',
	"theme_lpblockscontent1"	=> 1, // 0=disabled, 1=excerpt, 2=full
	"theme_lpblocksclick1"		=> 0,
	"theme_lpblocksreadmore1"	=> '',
	"theme_lpblockone1"			=> $sample_pages[1],
	"theme_lpblockoneicon1"		=> 'trophy',
	"theme_lpblocktwo1"			=> $sample_pages[2],
	"theme_lpblocktwoicon1"		=> 'briefcase',
	"theme_lpblockthree1"		=> $sample_pages[3],
	"theme_lpblockthreeicon1"	=> 'notebook',
	"theme_lpblockfour1"		=> 0,
	"theme_lpblockfouricon1"	=> 'megaphone',

	"theme_lpboxmaintitle1"		=> '',
	"theme_lpboxmaindesc1"		=> '',
	"theme_lpboxcat1"			=> '',
	"theme_lpboxcount1"			=> 4,
	"theme_lpboxrow1"			=> 4, // 1-4
	"theme_lpboxheight1"		=> 250, // pixels
	"theme_lpboxlayout1"		=> 2, // 1=full width, 2=boxed
	"theme_lpboxmargins1"		=> 2, // 1=no margins, 2=margins
	"theme_lpboxanimation1"		=> 2, // 1=animated, 2=static
	"theme_lpboxreadmore1"		=> 'Read More',
	"theme_lpboxlength1"		=> 25,

	"theme_lpboxmaintitle2"		=> '',
	"theme_lpboxmaindesc2"		=> '',
	"theme_lpboxcat2"			=> '',
	"theme_lpboxcount2"			=> 6,
	"theme_lpboxrow2"			=> 3, 	// 1-4
	"theme_lpboxheight2"		=> 300, // pixels
	"theme_lpboxlayout2"		=> 2, 	// 1=full width, 2=boxed
	"theme_lpboxmargins2"		=> 1, 	// 1=no margins, 2=margins
	"theme_lpboxanimation2"		=> 1, 	// 1=animated, 2=static
	"theme_lpboxreadmore2"		=> 'Read More',
	"theme_lpboxlength2"		=> 12,

	"theme_lptextone"			=> $sample_pages[1],
	"theme_lptexttwo"			=> $sample_pages[2],
	"theme_lptextthree"			=> $sample_pages[3],
	"theme_lptextfour"			=> $sample_pages[4],

	// General
	"theme_breadcrumbs"			=> 0,
	"theme_pagination"			=> 1,
	"theme_singlenav"			=> 1, // 1=static, 2=absolute, 0=disable
	"theme_contenttitles" 		=> 1, // 1, 2, 3, 0
	"theme_totop"				=> 'bravada-totop-normal',
	"theme_tables"				=> 'bravada-stripped-table',
	"theme_normalizetags"		=> 1, // 0,1
	"theme_copyright"			=> '&copy;'. date_i18n('Y') . ' '. get_bloginfo('name'),

	"theme_articleanimation"	=> "fade", // 0=none, >0=effect

	"theme_image_style"			=> 'bravada-image-none',
	"theme_caption_style"		=> 'bravada-caption-one',

	"theme_searchboxmain" 			=> 1,
	"theme_searchboxfooter"			=> 0,

	"theme_socials_header"			=> 1,
	"theme_socials_footer"			=> 1,
	"theme_socials_left_sidebar"	=> 0,
	"theme_socials_right_sidebar"	=> 0,

	// Colors
	"theme_sitebackground" 			=> "#F3F7F6",
	"theme_sitetext" 				=> "#707070",
	"theme_titletext" 				=> "#162521",
	"theme_headingstext" 			=> "#162521",
	"theme_contentbackground"		=> "#FFFFFF",
	"theme_primarybackground"		=> "",
	"theme_secondarybackground"		=> "",
	"theme_accent1" 				=> "#E9B44C",
	"theme_accent2" 				=> "#0F8B8D",

	"theme_menubackground"			=> "#FFFFFF",
	"theme_menutext" 				=> "#444444",
	"theme_submenutext" 			=> "#FFFFFF",
	"theme_submenubackground"		=> "#066664",
	"theme_activeitemtext"			=> "#e9b44c",

	"theme_overlaytext"					=> "#FFFFFF",
	"theme_overlaybackground1"			=> "#08415c",
	"theme_overlaybackgroundposition1"	=> "0",
	"theme_overlaybackground2"			=> "#1c110a",
	"theme_overlaybackgroundposition2"	=> "100",
	"theme_overlayangle"				=> "180",
	"theme_overlayopacity"				=> "60",

	"theme_footerbackground"	=> "#1e3231",
	"theme_footertext"			=> "#DBDBDB",

	"theme_lpblocksbg"			=> "#F9F7F5",
	"theme_lpboxesbg"			=> "#F8F8F8",
	"theme_lptextsbg"			=> "#EEEBE9",
	"theme_lppostsbg"			=> "#F3F7F6",

	// Typography
	"theme_fgeneral" 			=> 'Muli/gfont',
	"theme_fgeneralgoogle" 		=> '',
	"theme_fgeneralsize" 		=> 16, // px
	"theme_fgeneralweight" 		=> '400',
	"theme_fgeneralvariant" 	=> '',
	"theme_lineheight"			=> 1.8,
	"theme_paragraphspace"		=> 1.0,

	"theme_fsitetitle" 			=> 'Playfair Display/gfont',
	"theme_fsitetitlegoogle"	=> '',
	"theme_fsitetitlesize" 		=> 1.3, // em
	"theme_fsitetitleweight"	=> '700',
	"theme_fsitetitlevariant"	=> '',

	"theme_fmenu" 				=> 'Playfair Display/gfont',
	"theme_fmenugoogle"			=> '',
	"theme_fmenusize" 			=> 2.5, // em
	"theme_fmenuweight"			=> '700',
	"theme_fmenuvariant"		=> '',

	// blog titles
	"theme_ftitles" 			=> 'Playfair Display/gfont',
	"theme_ftitlesgoogle"		=> '',
	"theme_ftitlessize" 		=> 1.7, // em
	"theme_ftitlesweight"		=> '700',
	"theme_ftitlesvariant"		=> '',

	// blog metas
	"theme_metatitles" 			=> 'inherit',
	"theme_metatitlesgoogle"	=> '',
	"theme_metatitlessize" 		=> 1.0, // em
	"theme_metatitlesweight"	=> '300',
	"theme_metatitlesvariant"	=> '',

	"theme_singletitle"			=> 'Playfair Display/gfont',
	"theme_singletitlegoogle"	=> '',
	"theme_singletitlesize" 	=> 5, // em
	"theme_singletitleweight"	=> '700',
	"theme_singletitlevariant"	=> '',
	"theme_singletitlelineheight" => 1.3,

	"theme_singlemeta"			=> 'inherit',
	"theme_singlemetagoogle"	=> '',
	"theme_singlemetasize" 		=> 1.1, // em
	"theme_singlemetaweight"	=> '300',
	"theme_singlemenuvariant"	=> '',

	"theme_fheadings" 			=> 'Playfair Display/gfont',
	"theme_fheadingsgoogle"		=> '',
	"theme_fheadingssize" 		=> 100, // %
	"theme_fheadingsweight"		=> '700',
	"theme_fheadingsvariant"	=> '',
	"theme_fheadingslineheight" => 1.2,
	"theme_fheadingsspace"		=> 0.5,

	// widget titles
	"theme_fwtitle" 			=> 'Playfair Display/gfont',
	"theme_fwtitlegoogle"		=> '',
	"theme_fwtitlesize" 		=> 1.2, // em
	"theme_fwtitleweight"		=> '700',
	"theme_fwtitlevariant"		=> '',
	"theme_fwtitlelineheight" 	=> 2.0,
	"theme_fwtitlespace"		=> 0.5,

	// widget text
	"theme_fwcontent" 			=> 'inherit',
	"theme_fwcontentgoogle"		=> '',
	"theme_fwcontentsize" 		=> 1, // em
	"theme_fwcontentweight"		=> '400',
	"theme_fwcontentvariant"	=> '',
	"theme_fwcontentlineheight" => 1.8,

	"theme_textalign"		=> "inherit",
	"theme_parindent"		=> 0.0, // em

	// Post information
	"theme_fpost" 			=> 1,
	"theme_fauto" 			=> 0,
	"theme_fheight"			=> 300,
	"theme_fresponsive" 	=> 1, // cropped, contained
	"theme_falign" 			=> "center center",
	"theme_fheader" 		=> 1,

	"theme_meta_blog_author" 	=> 1,
	"theme_meta_blog_date"	 	=> 1,
	"theme_meta_blog_time" 		=> 0,
	"theme_meta_blog_category" 	=> 1,
	"theme_meta_blog_tag" 		=> 0,
	"theme_meta_blog_comment" 	=> 1,
	"theme_meta_blog_byline" 	=> 1,

	"theme_meta_single_author" 		=> 1,
	"theme_meta_single_date"		=> 1,
	"theme_meta_single_time" 		=> 0,
	"theme_meta_single_category" 	=> 1,
	"theme_meta_single_tag" 		=> 1,
	// "theme_meta_single_comment" 	=> 0,
	"theme_meta_single_byline" 		=> 1,

	"theme_excerpthome"		=> 'excerpt',
	"theme_excerptsticky"	=> 'full',
	"theme_excerptarchive"	=> 'excerpt',
	"theme_excerptlength"	=> "25",
	"theme_excerptdots"		=> " &hellip;",
	"theme_excerptcont"		=> "Read more",

	"theme_comclosed"		=> 1, // 1, 2, 3, 0
	"theme_comdate"			=> 2, // 1, 2
	"theme_comlabels"		=> 1, // 1, 2, 3
	"theme_comicons"		=> 1, // 0, 1
	"theme_comformwidth"	=> 0, // pixels

	// Miscellaneous
	"theme_pagesmenu"		=> 1,
	"theme_masonry"			=> 1,
	"theme_defer"			=> 1,
	"theme_autoscroll"		=> 1,
	"theme_headerlimits"	=> 0,
	"theme_lazyimages"		=> 2,
	"theme_fitvids"			=> 1,
	"theme_mobileonios"		=> 0,
	"theme_preloader"		=> 2, // 2 lp only, 1 enable, 0 disable
	"theme_editorstyles"	=> 1,

	); // bravada_defaults array

	return apply_filters( 'bravada_option_defaults_array', $bravada_defaults );
} // bravada_get_option_defaults()

/* Get sample pages for options defaults */
function cryout_get_default_pages( $number = 4 ) {
	$block_ids = array( 0, 0, 0, 0, 0 );
	$default_pages = get_pages(
		array(
			'sort_order' => 'desc',
			'sort_column' => 'post_date',
			'number' => $number,
			'hierarchical' => 0,
		)
	);
	foreach ( $default_pages as $key => $page ) {
		if ( ! empty ( $page->ID ) ) {
			$block_ids[$key+1] = $page->ID;
		}
		else {
			$block_ids[$key+1] = 0;
		}
	}
	return $block_ids;
} //cryout_get_default_pages()

// FIN
