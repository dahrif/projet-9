<?php
// Template Name: Elementor template with slider

get_header();
?>
<div id="wrap"></div>
<div class="clearfix"></div>
<?php
if ( function_exists( 'webriti_companion_activate' ) ):
    appointment_slider();
else:
?>
    <div class="alert alert-warning alert-dismissible text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php esc_html_e('To show the slider, you have to activate the companion plugin.','appointment'); ?>
    </div>
<?php endif; ?>

<div class="page-builder">
    <div class="container">
      	<div class="row">
        		<div class="col-md-12">
          			<div class="blog-lg-area-left">
                    <?php the_post();
                    the_content(); ?>
          			</div>
        		</div>
      	</div>
    </div>
</div>
<?php
get_footer();
