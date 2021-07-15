<?php
/**
 *
 * The template for displaying author biography
 *
 * Used in single.php and arhive.php (author archives only)
 *
 * @package Bravada
 */

$bravada_heading_tag = ( is_single() ) ? 'h2' : 'h1';
?>
<?php if ( get_the_author_meta( 'description' ) ) : ?>
<section class="author-info" <?php cryout_schema_microdata( 'author' ); ?>>

		<div class="author-avatar" <?php cryout_schema_microdata( 'image' );?>>
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'bravada_author_bio_avatar_size', 80 ), '', '', array( 'extra_attr' => cryout_schema_microdata( 'url', 0) ) ); ?>
		</div><!-- .author-avatar -->

		<div class="author-description"  <?php cryout_schema_microdata( 'author-description' ); ?>>

			<<?php echo $bravada_heading_tag ?> class="page-title">
				<?php echo ' <span' . cryout_schema_microdata( 'author-name', 0) . '>' . esc_attr( get_the_author() ) . '</span>'; ?>
			</<?php echo $bravada_heading_tag ?>>
			<div class="author-text"><?php the_author_meta( 'description' ); ?></div>

			<?php if ( is_single() ) { ?>
				<div class="author-link">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"  <?php cryout_schema_microdata( 'author-url' ); ?>>
						<?php printf( __( 'View all posts by ', 'bravada' ) . '%s', get_the_author() ); ?>
					</a>
				</div><!-- .author-link	-->
			<?php } ?>

		</div><!-- .author-description -->

</section><!-- .author-info -->
<?php endif; ?>
