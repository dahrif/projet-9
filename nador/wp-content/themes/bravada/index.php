<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Bravada
 */
get_header();
?>
<div id="container" class="<?php bravada_get_layout_class(); ?>">
	<main id="main" class="main">
		<?php cryout_before_content_hook(); ?>

		<?php if ( have_posts() ) : ?>

			<div id="content-masonry" class="content-masonry" <?php cryout_schema_microdata( 'blog' ); ?>>
				<?php /* Start the Loop */
				while ( have_posts() ) : the_post();
					get_template_part( 'content/content', get_post_format() );
				endwhile;
				?>
			</div> <!-- content-masonry -->
			<?php bravada_pagination(); ?>

		<?php else :
			get_template_part( 'content/content', 'notfound' );
		endif; ?>

		<?php cryout_after_content_hook(); ?>
	</main><!-- #main -->

	<?php bravada_get_sidebar(); ?>
</div><!-- #container -->

<?php
get_footer();
