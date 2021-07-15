<?php
if (!function_exists('elitepress_top_call_out')) :
	function elitepress_top_call_out() {
	$elitepress_lite_options=elitepress_theme_data_setup(); 
	$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
	if( $current_options['topcalout_section_enabled']== true ) {
	?>
	<!-- Top Callout Section -->
	<section class="top-callout-section">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<?php if($current_options['header_call_out_title']){ ?>
					<h2><?php echo esc_html($current_options['header_call_out_title']); ?></h2>
					<?php }
					if($current_options['header_call_out_description']){ ?>
					<p><?php echo esc_html($current_options['header_call_out_description']); ?></p>
					<?php } ?>
				</div>
				<?php if($current_options['header_call_out_btn_text']){ ?>
				<div class="col-md-3">
				<?php if($current_options['header_call_out_btn_link']){ ?>
					<a href="<?php echo esc_url($current_options['header_call_out_btn_link']); ?>" <?php if($current_options['header_call_out_btn_link_target'] ==true) { echo "target='_blank'"; } ?> ><?php echo esc_html($current_options['header_call_out_btn_text']); ?></a>
				<?php } else { ?>
				<a><?php echo esc_html($current_options['header_call_out_btn_text']); ?></a>
				<?php } }?>
				
			</div>
		</div>
	</section>
	<?php 
}
}
endif;

if (function_exists('elitepress_top_call_out')) {
    $section_priority = apply_filters('elitepresss_section_priority', 12, 'elitepress_top_call_out');
    add_action('elitepress_sections', 'elitepress_top_call_out', absint($section_priority));
}