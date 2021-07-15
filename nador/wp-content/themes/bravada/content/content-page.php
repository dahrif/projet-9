<?php
/**
 *
 * The template for displaying pages
 *
 * Used in page.php and page templates
 *
 * @package Bravada
 */
?>
<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="schema-image">
			<?php cryout_featured_hook(); ?>
		</div>
		<div class="article-inner">
			<header>
				<?php
					$theme_heading_tag = ( is_front_page() ) ? 'h2' : 'h1';
					the_title( '<' . $theme_heading_tag . ' class="entry-title singular-title" ' . cryout_schema_microdata( 'entry-title', 0 ) . '>', '</' . $theme_heading_tag . '>' );
				?>
				<span class="entry-meta" >
					<?php bravada_posted_edit(); ?>
				</span>
			</header>

			<?php cryout_singular_before_inner_hook();  ?>

			<div class="entry-content" <?php cryout_schema_microdata( 'text' ); ?>>
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'bravada' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->

		</div><!-- .article-inner -->
		<?php cryout_singular_after_inner_hook();  ?>
	</article><!-- #post-## -->
	<?php comments_template( '', true ); ?>

<?php endwhile; ?>
