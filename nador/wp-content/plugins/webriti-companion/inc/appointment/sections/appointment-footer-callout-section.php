<?php
/**
 * slider section for the homepage.
 */
if (!function_exists('appointment_dark_footer_callout_setting')) :

function appointment_dark_footer_callout_setting() {
$appointment_dark_footer_callout_setting = wp_parse_args(  get_option( 'appointment_options', array() ), appointment_dark_default_data() );
if($appointment_dark_footer_callout_setting['front_callout_enable'] == false ) { ?>
<!-- Top Contact Detail Section -->
<div class="footer-contact-detail-section">
	<div class="container">
		<?php if(!empty($appointment_dark_footer_callout_setting['front_contact_title'])):?>
		<div class="row">
			<div class="col-md-12">

			<div class="footer-section-heading-title"><h2><?php echo esc_html($appointment_dark_footer_callout_setting['front_contact_title']); ?></h2></div>
			</div>
		</div>
		<?php endif;?>
		<div class="row">
			<?php if(!empty($appointment_dark_footer_callout_setting['contact_one_icon']) || !empty($appointment_dark_footer_callout_setting['front_contact1_title']) || !empty($appointment_dark_footer_callout_setting['front_contact1_val'])):?>
			<div class="col-md-4">
				<div class="footer-contact-area">
					<div class="media">
						<div class="footer-contact-icon">
							<i class="fa <?php echo esc_attr($appointment_dark_footer_callout_setting['contact_one_icon']);?>"></i>
						</div>
						<?php if(!empty($appointment_dark_footer_callout_setting['front_contact1_title']) || !empty($appointment_dark_footer_callout_setting['front_contact1_val'])):?>
						<div class="media-body">
							<?php if(!empty($appointment_dark_footer_callout_setting['front_contact1_title'])):?><h6><?php echo esc_html($appointment_dark_footer_callout_setting['front_contact1_title']);  ?></h6><?php endif;?>
							<?php if(!empty($appointment_dark_footer_callout_setting['front_contact1_val'])):?><h4><?php echo esc_html($appointment_dark_footer_callout_setting['front_contact1_val']);?></h4><?php endif;?>
						</div>
					<?php endif;?>
					</div>
				</div>
			</div>
		<?php endif;?>
			<?php if(!empty($appointment_dark_footer_callout_setting['contact_two_icon']) || !empty($appointment_dark_footer_callout_setting['front_contact2_title']) || !empty($appointment_dark_footer_callout_setting['front_contact2_val'])):?>
			<div class="col-md-4">
				<div class="footer-contact-area">
					<div class="media">
						<div class="footer-contact-icon">
							<i class="fa <?php echo esc_attr($appointment_dark_footer_callout_setting['contact_two_icon']);?>"></i>
						</div>
						<?php if(!empty($appointment_dark_footer_callout_setting['front_contact2_title']) || !empty($appointment_dark_footer_callout_setting['front_contact2_val'])):?>
						<div class="media-body">
							<?php if(!empty($appointment_dark_footer_callout_setting['front_contact2_title'])):?><h6><?php echo esc_html($appointment_dark_footer_callout_setting['front_contact2_title']);  ?></h6><?php endif;?>
							<?php if(!empty($appointment_dark_footer_callout_setting['front_contact2_val'])):?><h4><?php echo esc_html($appointment_dark_footer_callout_setting['front_contact2_val']);?></h4><?php endif;?>
						</div>
					<?php endif;?>
					</div>
				</div>
			</div>
		<?php endif;?>
			<?php if(!empty($appointment_dark_footer_callout_setting['contact_three_icon']) || !empty($appointment_dark_footer_callout_setting['front_contact3_title']) || !empty($appointment_dark_footer_callout_setting['front_contact3_val'])):?>
			<div class="col-md-4">
				<div class="footer-contact-area">
					<div class="media">
						<div class="footer-contact-icon">
							<i class="fa <?php echo esc_attr($appointment_dark_footer_callout_setting['contact_three_icon']);?>"></i>
						</div>
						<?php if(!empty($appointment_dark_footer_callout_setting['front_contact3_title']) || !empty($appointment_dark_footer_callout_setting['front_contact3_val'])):?>
						<div class="media-body">
							<?php if(!empty($appointment_dark_footer_callout_setting['front_contact3_title'])):?><h6><?php echo esc_html($appointment_dark_footer_callout_setting['front_contact3_title']);  ?></h6><?php endif;?>
							<?php if(!empty($appointment_dark_footer_callout_setting['front_contact3_val'])):?><h4><?php echo esc_html($appointment_dark_footer_callout_setting['front_contact3_val']);?></h4><?php endif;?>
						</div>
					<?php endif;?>
					</div>
				</div>
			</div>
		<?php endif;?>
		</div>
	</div>
</div>
<!-- /Top Contact Detail Section -->
<div class="clearfix"></div>
<?php }

  }

endif;

if (function_exists('appointment_dark_footer_callout_setting')) {
    $appointment_dark_section_priority = apply_filters('appointment_dark_section_priority', 14, 'appointment_dark_footer_callout_setting');
    add_action('appointment_dark_sections', 'appointment_dark_footer_callout_setting', absint($appointment_dark_section_priority));
}
