<?php
/**
 * The template for displaying the landing page/blog posts
 * The functions used here can be found in includes/landing-page.php
 *
 * @package Bravada
 */

$bravada_landingpage = cryout_get_option( 'theme_landingpage' );

if ( is_page() && ! $bravada_landingpage ) {
	load_template( get_page_template() );
	return true;
}

if ( 'posts' == get_option( 'show_on_front' ) ) {
	include( get_home_template() );
} else {

	get_header();
	?>

	<div id="container" class="bravada-landing-page one-column">
		<main id="main" class="main">
		<?php
		//cryout_before_content_hook();

		if ( $bravada_landingpage ) {
			get_template_part( apply_filters('bravada_landingpage_main_template', 'content/landing-page' ) );
		} else {
			bravada_lpindex();
		}

		//cryout_after_content_hook();
		?>
		</main><!-- #main -->
		<?php if ( ! $bravada_landingpage ) { bravada_get_sidebar(); } ?>
	</div><!-- #container -->

	<?php get_footer();

} //else !posts
