<?php
/**
 * The template for displaying attachments.
 *
 * @package Bravada
 */

get_header(); ?>

<div id="container" class="single-attachment <?php bravada_get_layout_class(); ?>">
	<main id="main" class="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
				<div class="article-inner">
					<header>
						<?php cryout_post_title_hook(); ?>
						<?php the_title( '<h1 class="entry-title" ' . cryout_schema_microdata( 'entry-title', 0 ) . '>', '</h1>' ); ?>

						<div class="entry-meta">
							<?php cryout_post_meta_hook();
								// Retrieve attachment metadata.
								$metadata = wp_get_attachment_metadata();
								if ( $metadata ) {
									printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><i class="icon-image icon-metas" title="%1$s"></i> <a href="%2$s">%3$s &times; %4$s </a>%5$s</span>',
										esc_html_x( 'Full size', 'Used before full size attachment link.', 'bravada' ),
										esc_url( wp_get_attachment_url() ),
										absint( $metadata['width'] ),
										absint( $metadata['height'] ),
										__( 'pixels', 'bravada' )
									);
								}

								// Retrieve attachment parent post.
								if ( ! empty( $post->post_parent ) ) :  ?>
									<span class="published-in">
										<i class="icon-book icon-metas" title="<?php esc_attr_e( 'Published in', 'bravada' ); ?>"></i>
										<a href="<?php echo esc_url( get_permalink( $post->post_parent ) ) ?>">
											<?php echo esc_html( get_the_title( $post->post_parent ) );?>
										</a>
									</span>
							<?php endif; ?>

						</div><!-- .entry-meta -->
					</header>

					<div class="entry-content" <?php cryout_schema_microdata( 'entry-content' ); ?>>

						<div class="entry-attachment">
							<?php
							// actual attachment
							$image_size = apply_filters( 'bravada_attachment_size', 'large' );
							echo wp_get_attachment_image( get_the_ID(), $image_size ) . '<br>';

							// attachment caption
							the_excerpt();
							?>
						</div><!-- .entry-attachment -->

						<?php the_content(); ?>
					</div><!-- .entry-content -->

					<div id="nav-below" class="navigation image-navigation">
						<div class="nav-previous"><?php previous_image_link( false, '<i class="icon-angle-left"></i>' . __( "Previous image", "bravada" ) ); ?></div>
						<div class="nav-next"><?php next_image_link( false, __("Next image", "bravada") . '<i class="icon-angle-right"></i>' ); ?></div>
					</div><!-- #nav-below -->

					<footer class="entry-meta entry-utility">
						<?php cryout_post_utility_hook(); ?>
					</footer><!-- .entry-meta -->

					<?php  comments_template( '', true ); ?>
				</div><!-- .article-inner -->
			</article><!-- #post-## -->

		<?php endwhile; ?>

	</main><!-- #main -->
	<?php bravada_get_sidebar(); ?>
</div><!-- #container -->

<?php get_footer(); ?>
