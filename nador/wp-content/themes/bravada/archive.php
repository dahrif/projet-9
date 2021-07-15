<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bravada
 *
 */

get_header(); ?>

	<div id="container" class="<?php bravada_get_layout_class(); ?>">
		<main id="main" class="main">
			<?php cryout_before_content_hook(); ?>

			<?php if ( have_posts() ) : ?>

				<header class="page-header pad-container" <?php cryout_schema_microdata( 'element' ); ?>>
					<?php
						// Load custom header if author
						if (is_author()) {
							get_template_part( 'content/user-bio' );
						// Default for all archives
						} else {
								the_archive_title( '<h1 class="page-title" ' . cryout_schema_microdata('entry-title', 0) . '>', '</h1>' );
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
						}
					?>
				</header><!-- .page-header -->

				<div id="content-masonry" class="content-masonry" <?php cryout_schema_microdata( 'blog' ); ?>>
					<?php
					while ( have_posts() ) : the_post();
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content/content', get_post_format() );
					endwhile;
					?>
				</div><!--content-masonry-->
				<?php bravada_pagination();

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'content/content', 'notfound' );
			endif;

			cryout_after_content_hook(); ?>
		</main><!-- #main -->

		<?php bravada_get_sidebar(); ?>
	</div><!-- #container -->

<?php get_footer(); ?>
