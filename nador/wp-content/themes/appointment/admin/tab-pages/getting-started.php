<?php
/**
 * Getting started template
 */
?>

<div id="getting_started" class="appointment-tab-pane active">

	<div class="container-fluid">

		<div class="row">
			<div class="col-md-6">
				<div class="appointment-tab-pane-half appointment-tab-pane-first-half">
					<h3><?php esc_html_e( "Recommended Plugins", 'appointment' ); ?></h3>
					<div style="border-top: 1px solid #eaeaea;">
						<p style="margin-top: 16px;">
							<?php esc_html_e( 'To take full advanctage of the theme features you need to install recommended plugins.', 'appointment' ); ?>

						</p>
						<p><a target="_self" href="#recommended_actions" class="appointment-custom-class"><?php esc_html_e( 'Click here','appointment');?></a></p>
					</div>
				</div>

				<div class="appointment-tab-pane-half appointment-tab-pane-first-half">
					<h3><?php esc_html_e( "Start Customizing", 'appointment' ); ?></h3>
					<div style="border-top: 1px solid #eaeaea;">
						<p style="margin-top: 16px;">
							<?php esc_html_e( 'After activating recommended plugins , now you can start customization.', 'appointment' ); ?>

						</p>
						<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer','appointment');?></a></p>
					</div>
				</div>

				<div class="appointment-tab-pane-half appointment-tab-pane-first-half">
					<h3><?php esc_html_e( "Documentation", 'appointment' ); ?></h3>
					<div style="border-top: 1px solid #eaeaea;">
						<p style="margin-top: 16px;">
							<?php esc_html_e( 'Browse the documention for the detailed information regarding this theme.', 'appointment' ); ?>

						</p>
						<p><a target="_blank" href="<?php echo esc_url('https://help.webriti.com/themes/appointment/appointment-wordpress-theme/'); ?>"><?php esc_html_e( 'Documentation','appointment');?></a></p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="appointment-tab-pane-half appointment-tab-pane-first-half">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/admin/img/appointment.png'; ?>" alt="<?php esc_attr_e( 'Appointment Theme', 'appointment' ); ?>" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="appointment-tab-center">
				<h3><?php esc_html_e( "Useful Links", 'appointment' ); ?></h3>
			</div>
			<div class=" useful_box">
                <div class="appointment-tab-pane-half appointment-tab-pane-first-half">
                    <a href="<?php echo esc_url('https://demo.webriti.com/?theme=Appointment'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-desktop info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Lite Demo','appointment'); ?></p>
                	</a>
                    <a href="<?php echo esc_url('https://demo.webriti.com/?theme=Appointment%20Pro'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-desktop info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('PRO Demo','appointment'); ?></p>
                    </a>
                </div>
                <div class="appointment-tab-pane-half appointment-tab-pane-first-half">
                    <a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/appointment'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-smiley info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Your feedback is valuable to us','appointment'); ?></p>
                    </a>
                    <a href="<?php echo esc_url('https://webriti.com/appointment/'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-book-alt info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Premium Theme Details','appointment'); ?></p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
