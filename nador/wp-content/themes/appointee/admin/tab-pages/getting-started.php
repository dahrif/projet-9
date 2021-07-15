<?php
/**
 * Getting started template
 */
?>

<div id="getting_started" class="appointee-tab-pane active">

	<div class="container-fluid">
		<div class="row">
		    <div class="col-md-12">
				<h1 class="appointee-info-title text-center"><?php echo esc_html__('About the Appointee theme','appointee'); ?></h1>
		    </div>
		</div>
		<div class="row">
			<div class="col-md-6">

				<div class="appointee-tab-pane-half appointee-tab-pane-first-half">
					<div>
						<p style="margin-top: 16px;">
							<?php esc_html_e( 'This theme is ideal for creating corporate and business websites. There is no separate premium version of it, as Appointee is a child theme of the Appointment WordPress theme. The premium version, Appointment PRO has tons of features: a homepage with many sections where you can feature unlimited services, portfolios, user reviews, latest news, callout, custom widgets and much more.', 'appointee' ); ?>
						</p>
					</div>
				</div>

				<div class="appointee-tab-pane-half appointee-tab-pane-first-half">
					<h3><?php esc_html_e( "Recommended Plugins", 'appointee' ); ?></h3>
					<div style="border-top: 1px solid #eaeaea;">
						<p style="margin-top: 16px;">
							<?php esc_html_e( 'To take full advantage of the theme features you need to install recommended plugins.', 'appointee' ); ?>
						</p>
						<p><a target="_self" href="#recommended_actions" class="appointee-custom-class"><?php esc_html_e( 'Click here','appointee');?></a></p>
					</div>
				</div>

				<div class="appointee-tab-pane-half appointee-tab-pane-first-half">
					<h3><?php esc_html_e( "Start Customizing", 'appointee' ); ?></h3>
					<div style="border-top: 1px solid #eaeaea;">
						<p style="margin-top: 16px;">
							<?php esc_html_e( 'After activating recommended plugins , now you can start customization.', 'appointee' ); ?>

						</p>
						<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer','appointee');?></a></p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="appointee-tab-pane-half appointee-tab-pane-first-half">
				<img src="<?php echo esc_url( APPOINTEE_TEMPLATE_DIR_URI ) . '/admin/img/appointee.png'; ?>" alt="<?php esc_attr_e( 'Appointee Theme', 'appointee' ); ?>" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="appointee-tab-center">
				<h3><?php esc_html_e( "Useful Links", 'appointee' ); ?></h3>
			</div>
			<div class=" useful_box">
                <div class="appointee-tab-pane-half appointee-tab-pane-first-half">
                    <a href="<?php echo esc_url('https://appointee.webriti.com/'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-desktop info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Lite Demo','appointee'); ?></p>
                	</a>
                    <a href="<?php echo esc_url('https://demo.webriti.com/?theme=Appointment%20Pro'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-desktop info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('PRO Demo','appointee'); ?></p>
                    </a>
                </div>
                <div class="appointee-tab-pane-half appointee-tab-pane-first-half">
                    <a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/appointee'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-smiley info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Your feedback is valuable to us','appointee'); ?></p>
                    </a>
                    <a href="<?php echo esc_url('https://webriti.com/appointment/'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-book-alt info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Premium Theme Details','appointee'); ?></p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
