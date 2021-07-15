<?php
/**
 * Slider section for the homepage.
 */
if ( ! function_exists( 'webriti_rambo_project' ) ) :

	function webriti_rambo_project() {
$rambo_pro_theme_options = theme_setup_rambo_project();
$current_options = wp_parse_args(  get_option( 'rambo_pro_theme_options', array() ), $rambo_pro_theme_options );
	$quality_portfolio_title    = isset($current_options['project_heading_one'])? $current_options['project_heading_one'] : __('Perspiciatis Unde','webriti-companion');
		$quality_portfolio_subtitle = isset($current_options['project_tagline'])?$current_options['project_tagline']: __('Maecenas sit amet tincidunt elit. Pellentesque habitant morbi tristique senectus et netus et Nulla facilisi.','webriti-companion');
$hide_section = isset($current_options['project_protfolio_enabled'])? $current_options['project_protfolio_enabled']:false;
if (  $hide_section == false )
{
?>
<!-- Recent Work Section -->
<div class="portfolio_main_content">	
	<div class="container">	
	<?php
	$rambo_pro_theme_options = theme_setup_rambo_project();
	$current_options = wp_parse_args(  get_option( 'rambo_pro_theme_options', array() ), $rambo_pro_theme_options );
	?>
		<div class="row-fluid featured_port_title">
			<?php if($quality_portfolio_title) { ?>
			<h1><?php echo esc_html($quality_portfolio_title); ?></h1>
			<?php } ?>
			<?php if($quality_portfolio_subtitle) { ?>
			<p><?php echo esc_html($quality_portfolio_subtitle); ?></p>
			<?php } ?>
		</div>
		<?php 
		if(is_active_sidebar('sidebar-project'))
		{
			echo '<div id="sidebar-project " class="row sidebar-project">';
			dynamic_sidebar('sidebar-project');
			echo '</div>';
		}
		else
		{ ?>
				<div id="sidebar-project" class="row">
					<div class="span3 featured_port_projects">
						<div class="thumbnail">
						<?php if($current_options['project_one_thumb']) { ?>
							  <img src="<?php echo esc_url($current_options['project_one_thumb']); ?>">
						<?php } ?>
							
							  <div class="featured_service_content">
								<?php if($current_options['project_one_title']) { ?>
								<h3><a href="#"><?php echo esc_html($current_options['project_one_title']); ?></a></h3>
								<?php } ?>
								<?php if($current_options['project_one_text']) { ?>
								<p><?php echo esc_html($current_options['project_one_text']); ?></p>
								<?php } ?>
							  </div>
						</div>
					</div>
					<div class="span3 featured_port_projects">
						<div class="thumbnail">
						<?php if($current_options['project_two_thumb']) { ?>
							  <img src="<?php echo esc_url($current_options['project_two_thumb']); ?>">
						<?php } ?>
							
							  <div class="featured_service_content">
								<?php if($current_options['project_two_title']) { ?>
								<h3><a href="#"><?php echo esc_html($current_options['project_two_title']); ?></a></h3>
								<?php } ?>
								<?php if($current_options['project_two_text']) { ?>
								<p><?php echo esc_html($current_options['project_two_text']); ?></p>
								<?php } ?>
							  </div>
						</div>
					</div>
					<div class="span3 featured_port_projects">
						<div class="thumbnail">
						<?php if($current_options['project_three_thumb']) { ?>
							  <img src="<?php echo esc_url($current_options['project_three_thumb']); ?>">
						<?php } ?>
							
							  <div class="featured_service_content">
								<?php if($current_options['project_three_title']) { ?>
								<h3><a href="#"><?php echo esc_html($current_options['project_three_title']); ?></a></h3>
								<?php } ?>
								<?php if($current_options['project_three_text']) { ?>
								<p><?php echo esc_html($current_options['project_three_text']); ?></p>
								<?php } ?>
							  </div>
						</div>
					</div>
					<div class="span3 featured_port_projects">
						<div class="thumbnail">
						<?php if($current_options['project_four_thumb']) { ?>
							  <img src="<?php echo esc_url($current_options['project_four_thumb']); ?>">
						<?php } ?>
							
							  <div class="featured_service_content">
								<?php if($current_options['project_four_title']) { ?>
								<h3><a href="#"><?php echo esc_html($current_options['project_four_title']); ?></a></h3>
								<?php } ?>
								<?php if($current_options['project_four_text']) { ?>
								<p><?php echo esc_html($current_options['project_four_text']); ?></p>
								<?php } ?>
							  </div>
						</div>
					</div>
				</div>
		<?php }
		?>	
	</div>	
</div>
<?php }

	}
		
		
	
endif;
if ( function_exists( 'webriti_rambo_project' ) ) {
$section_priority = apply_filters( 'honeypress_section_priority', 11, 'webriti_rambo_project' );
add_action( 'rambo_business_template_sections', 'webriti_rambo_project', absint( $section_priority ) );
}

function theme_setup_rambo_project()
{	
	return $theme_options=array(
			
			//Projects Section Settings
			
			'project_one_thumb' => WC__PLUGIN_URL.'/inc/rambo/img/port1.jpg',
			'project_one_title' => esc_html__('Aliquip Ex','webriti-companion'),
			'project_one_text' => esc_html__('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','webriti-companion'),

			'project_two_thumb' => WC__PLUGIN_URL.'/inc/rambo/img/port2.jpg',
			'project_two_title' => esc_html__('Sint Occaecat','webriti-companion'),
			'project_two_text' => esc_html__('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','webriti-companion'),

			'project_three_thumb' => WC__PLUGIN_URL.'/inc/rambo/img/port3.jpg',
			'project_three_title' => esc_html__('Ut Enim','webriti-companion'),
			'project_three_text' => esc_html__('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','webriti-companion'),

			'project_four_thumb' => WC__PLUGIN_URL.'/inc/rambo/img/port4.jpg',
			'project_four_title' => esc_html__('Duis aute irure','webriti-companion'),
			'project_four_text' => esc_html__('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.','webriti-companion'),
		);
}