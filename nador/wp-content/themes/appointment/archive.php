<?php
get_header(); ?>
<div class="page-title-section">		
	<div class="overlay">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="page-title"><h1>
        <?php if ( is_day() ) : ?>
        <?php  esc_html_e( "Daily Archive", 'appointment' ); echo ' '; echo esc_html(get_the_date()); ?>
        <?php elseif ( is_month() ) : ?>
        <?php 
        $appointment_monthly_text = esc_html__('Monthly Archive','appointment');
        printf( esc_html__( '%1$s %2$s', 'appointment' ), esc_html($appointment_monthly_text), esc_html(get_the_date()) ); ?>
        <?php elseif ( is_year() ) : ?>
        <?php 
        $appointment_yearly_text = esc_html__('Yearly Archive','appointment');
        printf( esc_html__( '%1$s %2$s', 'appointment' ), esc_html($appointment_yearly_text), esc_html(get_the_date()) ); ?>
        
        <?php else : ?>
        <?php esc_html_e( "Blog Archive", 'appointment' ); ?>
        <?php endif; ?>	
        <?php if(get_post_meta( get_the_ID(), 'post_description', true ) != '' ) { ?>
        <p><?php echo esc_html(get_post_meta( get_the_ID(), 'post_description', true )) ; ?></p>
        <?php } ?>
        <div class="qua-separator" id=""></div>
		</h1></div>
				</div>
				<div class="col-md-6">
					<ul class="page-breadcrumb">
						<?php if (function_exists('appointment_custom_breadcrumbs')) appointment_custom_breadcrumbs();?>
					</ul>
					
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- /Page Title Section ---->
<div class="page-builder" id="wrap">
	<div class="container">
		<div class="row">
		
			<!-- Blog Area -->
			<div class="<?php appointment_post_layout_class(); ?>" >
			<?php
				while ( have_posts() ) : the_post();
				?>
				<?php get_template_part('content',''); ?>
				<?php endwhile;
				// Previous/next page navigation.
				the_posts_pagination( array(
				'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
				'next_text'          => '<i class="fa fa-angle-double-right"></i>',
				) );
				?>
			</div>
			<!--Sidebar Area-->
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
			<!--Sidebar Area-->
		</div>
	</div>
</div>
<?php get_footer(); ?>