<?php
 get_header();
 get_template_part('index', 'banner'); ?>
<!-- /Page Title Section ---->
<div class="page-builder" id="wrap">
	<div class="container">
		<div class="row">
			<!-- Blog Area -->
			<div class="<?php appointment_post_layout_class(); ?>" >
			<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('content','')?>
				<?php endwhile; ?>
				<?php else : ?>
				<h2><?php esc_html_e( "Nothing Found",'appointment' ); ?></h2>
			<div class="">
			<p><?php esc_html_e( "Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'appointment' ); ?>
			</p>
			<?php get_search_form(); ?>
			</div><!-- .blog_con_mn -->
			<?php endif; ?>
			</div>
			<!-- /Blog Area -->			
			
			<!--Sidebar Area-->
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
			<!--Sidebar Area-->
		</div>
	</div>
</div>
<?php get_footer(); ?>