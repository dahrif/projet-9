<?php
if (!function_exists('elitepress_portfolio')) :
	function elitepress_portfolio() {
	$elitepress_lite_options=elitepress_theme_data_setup();
	$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options ); 
	if($current_options['portfolio_one_image']=='portfolio1'){
			$current_options['portfolio_one_image']=WC__PLUGIN_URL.'inc/elitepress/images/portfolio/1.jpg';

		}
		if($current_options['portfolio_two_image']=='portfolio2'){
			$current_options['portfolio_two_image']=WC__PLUGIN_URL.'inc/elitepress/images/portfolio/2.jpg';

		}
		if($current_options['portfolio_three_image']=='portfolio3'){
			$current_options['portfolio_three_image']=WC__PLUGIN_URL.'inc/elitepress/images/portfolio/3.jpg';

		}
	if($current_options['portfolio_section_enabled'] == true) { ?>
	<!-- Portfolio Section -->
	<section class="portfolio">
		<div class="container">
		
			<!-- Section Title -->
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="section-header">
					<?php if($current_options['front_portfolio_title']) { ?>
					<h3 class="section-title"><?php echo esc_html($current_options['front_portfolio_title']); ?></h3>
					<?php }
					if($current_options['front_portfolio_description']) { ?>
					<p class="section-subtitle"><?php echo esc_html($current_options['front_portfolio_description']); ?></p>
					<?php } ?>	
					</div>
				</div>		
			</div>
			<!-- /Section Title -->
			<!-- Portfolio Area -->
			<div class="row">
			<?php if($current_options['portfolio_one_image'] || $current_options['portfolio_one_title'] || $current_options['portfolio_one_description']){ ?>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<article class="portfolio-area">
						<figure class="portfolio-image">
						<?php if($current_options['portfolio_one_image']) { ?>
							<img class="img-responsive" src="<?php echo esc_url($current_options['portfolio_one_image']); ?>">
							<?php } ?>
						</figure>
						<div class="portfolio-info">
							<header class="entry-header">
								<?php if($current_options['portfolio_one_title']){ ?>
								<h4 class="entry-title">
								<?php echo esc_html($current_options['portfolio_one_title']); ?></h4>
								<?php } ?>
							</header>					
							<?php if($current_options['portfolio_one_description']){ ?>
							<div class="entry-content">
								<p>
								<?php echo esc_html($current_options['portfolio_one_description']);?>
								<?php } ?>
								</p>
							</div>
						</div>
					</article>
				</div>
			<?php } 
			if($current_options['portfolio_two_image'] || $current_options['portfolio_two_title'] || $current_options['portfolio_two_description']){ ?>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<article class="portfolio-area">
						<figure class="portfolio-image">
						<?php if($current_options['portfolio_two_image']) { ?>
							<img class="img-responsive" src="<?php echo esc_url($current_options['portfolio_two_image']); ?>">
							<?php } ?>
						</figure>
						<div class="portfolio-info">
							<header class="entry-header">
								<?php if($current_options['portfolio_two_title']){ ?>
								<h4 class="entry-title">
								<?php echo esc_html($current_options['portfolio_two_title']); ?></h4>
								<?php } ?>
							</header>					
							<?php if($current_options['portfolio_two_description']){ ?>
							<div class="entry-content">
								<p>
								<?php echo esc_html($current_options['portfolio_two_description']);?>
								<?php } ?>
								</p>
							</div>
						</div>
					</article>
				</div>
			<?php } 
			if($current_options['portfolio_three_image'] || $current_options['portfolio_three_title'] || $current_options['portfolio_three_description']){ ?>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<article class="portfolio-area">
						<figure class="portfolio-image">
						<?php if($current_options['portfolio_three_image']) { ?>
							<img class="img-responsive" src="<?php echo esc_url($current_options['portfolio_three_image']); ?>">
							<?php } ?>
						</figure>
						<div class="portfolio-info">
							<header class="entry-header">
								<?php if($current_options['portfolio_three_title']){ ?>
								<h4 class="entry-title">
								<?php echo esc_html($current_options['portfolio_three_title']); ?></h4>
								<?php } ?>
							</header>					
							<?php if($current_options['portfolio_three_description']){ ?>
							<div class="entry-content">
								<p>
								<?php echo esc_html($current_options['portfolio_three_description']);?>
								<?php } ?>
								</p>
							</div>
						</div>
					</article>
				</div>
			<?php }?>	
			</div>
			<div class="row">
				<div class="col-md-12"></div>	
			</div>
			<!-- /Portfolio Area -->
					
		</div>
	</section>
	<!-- /Portfolio Section -->
	<?php } 
}
endif;

if (function_exists('elitepress_portfolio')) {
    $section_priority = apply_filters('elitepresss_section_priority', 14, 'elitepress_portfolio');
    add_action('elitepress_sections', 'elitepress_portfolio', absint($section_priority));
}