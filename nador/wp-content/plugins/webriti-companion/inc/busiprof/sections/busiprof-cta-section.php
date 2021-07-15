<?php
/**
 * Slider section for the homepage.
 */
if ( ! function_exists( 'webriti_busiprof_cta' ) ) :

	function webriti_busiprof_cta() {
$rambo_pro_theme_options = rambo_theme_data_setup();
$current_options = wp_parse_args(  get_option( 'rambo_pro_theme_options', array() ), $rambo_pro_theme_options );
?>
<!-- Purchase Now Section -->
<?php
$oldData = get_option( 'rambo_pro_theme_options');
if(isset($oldData['site_intro_descritpion']) || isset($oldData['site_intro_descritpion'])){?>
        
<div class="purchase_main_content">
	    <div class="container">	
				
				<div class="row-fluid purchase_now_content">
				
					<?php if( $current_options['site_intro_descritpion'] != '' ) { ?>
						<div class="span8">	
							<h1><?php echo esc_html($current_options['site_intro_descritpion']); ?></h1>
						</div>
					<?php } ?>
					
					<?php if($current_options['site_intro_button_text']!='') { ?>
						<div class="span4">
							<a class="purchase_now_btn" href="<?php if($current_options['site_intro_button_link']!='') { echo esc_url($current_options['site_intro_button_link']); } else { echo "#"; } ?>" <?php if($current_options['intro_button_target']==true) { echo  "target='_blank'"; } ?> ><?php echo esc_html($current_options['site_intro_button_text']); ?></a>
						</div>
					<?php } ?>
					
				</div>
			
		</div>	
</div>
<?php 
} elseif(is_active_sidebar('site-intro-area') && get_option( 'rambo_pro_theme_options' ) != null) {  ?>
	
  	<div class="purchase_main_content">
	    <div class="container">
	 
		<?php
		
			echo '<div class="row purchase_now_content">';
			
				dynamic_sidebar( 'site-intro-area' );
				
			echo '</div>';
				
		?>
				
	
	    </div>
    </div>
	

<?php } else {?>


<div class="purchase_main_content">
	    <div class="container">	
				
				<div class="row-fluid purchase_now_content">
				
					<?php if( $current_options['site_intro_descritpion'] != '' ) { ?>
						<div class="span8">	
							<h1><?php echo esc_html($current_options['site_intro_descritpion']); ?></h1>
						</div>
					<?php } ?>
					
					<?php if($current_options['site_intro_button_text']!='') { ?>
						<div class="span4">
							<a class="purchase_now_btn" href="<?php if($current_options['site_intro_button_link']!='') { echo esc_url($current_options['site_intro_button_link']); } else { echo "#"; } ?>" <?php if($current_options['intro_button_target']==true) { echo  "target='_blank'"; } ?> ><?php echo esc_html($current_options['site_intro_button_text']); ?></a>
						</div>
					<?php } ?>
					
				</div>
			
		</div>	
</div>


<?php }

	}
		
		
	
endif;
if ( function_exists( 'webriti_busiprof_cta' ) ) {
$section_priority = apply_filters( 'busiprof_section_priority', 11, 'webriti_busiprof_cta' );
add_action( 'busiprof_home_template_sections', 'webriti_busiprof_cta', absint( $section_priority ) );
}