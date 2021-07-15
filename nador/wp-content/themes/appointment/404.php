<?php get_header();
get_template_part('index','banner'); ?>
<div class="error-section" id="wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="error-404">
					<div class="text-center"><i class="fa fa-bug"></i></div>
          <div class="error404-title"><?php esc_html_e('Error 404','appointment'); ?></div>
          <div class="error404-sub-title"><?php esc_html_e('Oops! Page not found','appointment'); ?></div>
					<p><?php esc_html_e('We are sorry, but the page you are looking for does not exist.','appointment'); ?></p>
					<div class="error-btn-area"><a href="<?php echo esc_url(home_url('/'));?>" class="error-btn"><?php esc_html_e('Go Back','appointment'); ?></a></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
