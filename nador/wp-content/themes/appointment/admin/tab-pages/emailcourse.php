<?php
/**
 * Email Course
 */
?>
<div id="emailcourse_themes" class="appointment-tab-pane panel-close">

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
                            <h1 class="appointment-info-title text-center"><?php echo esc_html__('Trustworthy Websites Details','appointment'); ?><?php if( !empty($appointment['Version']) ): ?> <sup id="appointment-theme-version"><?php echo esc_html( $appointment['Version'] ); ?> </sup><?php endif; ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="appointment-tab-pane-half appointment-tab-pane-first-half">
					<p>
						<?php esc_html_e( 'A website exists for one and ONLY one reason:','appointment');?>
						<b><?php esc_html_e('To bring you more business.','appointment'); ?></b>
					</p>
					<p>
		   				<?php esc_html_e('Think of your website as a hardworking salesman who works 24/7 and never asks for a raise!','appointment');?>
		   			</p>
					<p>
					<?php esc_html_e( 'In this email course I deliver 4 highly actionable tips on how you can build a website which is trustworthy and which, in turn, brings more business to you.', 'appointment' ); ?>
					</p>
				</div>
			</div>	
			<div class="offer-content clearfix">
			<div class="media pricing-content text-center padding10">
				<div class="media-body">
					<a href="<?php echo esc_url('http://webriti.com/website-email-course/');?>" target="_blank" class="btn btn-info btn-lg" id="email_course"><?php esc_html_e('JOIN COURSE','appointment' ); ?></a>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>