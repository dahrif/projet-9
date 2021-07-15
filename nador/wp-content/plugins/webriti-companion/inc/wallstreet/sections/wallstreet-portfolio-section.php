<?php
/**
 * Portfolio section for the homepage.
 */
 if (!function_exists('wallstreet_portfolio_section')) :

    function wallstreet_portfolio_section() {
		$wallstreet_pro_options=wallstreet_theme_data_setup();
		$current_options = wp_parse_args(  get_option( 'wallstreet_pro_options', array() ), $wallstreet_pro_options ); 
		if($current_options['portfolio_image_one']=='portfolio1'){
			$current_options['portfolio_image_one']=WC__PLUGIN_URL.'inc/wallstreet/images/portfolio/portfolio1.png';

		}
		if($current_options['portfolio_image_two']=='portfolio2'){
			$current_options['portfolio_image_two']=WC__PLUGIN_URL.'inc/wallstreet/images/portfolio/portfolio2.png';

		}
		if($current_options['portfolio_image_three']=='portfolio3'){
			$current_options['portfolio_image_three']=WC__PLUGIN_URL.'inc/wallstreet/images/portfolio/portfolio3.png';

		}
		if($current_options['portfolio_image_four']=='portfolio4'){
			$current_options['portfolio_image_four']=WC__PLUGIN_URL.'inc/wallstreet/images/portfolio/portfolio4.png';

		}

		 if($current_options['portfolio_section_enabled'] == true) { ?>
		<div class="portfolio-section">
			<div class="container">

				<div class="row">
					<div class="section_heading_title">
						<?php if($current_options['portfolio_title']) { ?>
						<h1><?php echo esc_html($current_options['portfolio_title']); ?></h1>
						<div class="pagetitle-separator">
							<div class="pagetitle-separator-border">
								<div class="pagetitle-separator-box"></div>
							</div>
						</div>
					<?php } ?>
					<?php if($current_options['portfolio_description']) { ?>
						<p><?php echo esc_html($current_options['portfolio_description']); ?></p>
					<?php } ?>				
					</div>
				</div>
				<div class="row">
				<?php if($current_options['portfolio_image_one']) { ?>
					<div class="col-md-3 col-md-6 home-portfolio-area">
						<div class="home-portfolio-showcase">
							<div class="home-portfolio-showcase-media">
							
								<img class="img-responsive home-portfolio-img" alt="<?php echo esc_attr($current_options['portfolio_title_one']);?>" src="<?php echo esc_url($current_options['portfolio_image_one']); ?>">
								<?php if( $current_options['portfolio_title_one'] || $current_options['portfolio_description_one']){ ?>
								<div class="home-portfolio-showcase-overlay">
									<div class="home-portfolio-showcase-overlay-inner">
										<div class="home-portfolio-showcase-detail">
											<?php if($current_options['portfolio_title_one']){ ?>
											<h4><?php echo esc_html($current_options['portfolio_title_one']); ?></h4>
											<?php } ?>
											<?php if($current_options['portfolio_description_one']){ ?>
											<p><?php echo esc_html($current_options['portfolio_description_one']);?></p>
											<?php } ?>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php } 
					 if($current_options['portfolio_image_two']) { ?>
					<div class="col-md-3 col-md-6 home-portfolio-area">
						<div class="home-portfolio-showcase">
							<div class="home-portfolio-showcase-media">
							
								<img class="img-responsive home-portfolio-img" alt="<?php echo esc_attr($current_options['portfolio_title_two']);?>" src="<?php echo esc_url($current_options['portfolio_image_two']); ?>">
								<?php if( $current_options['portfolio_title_two'] || $current_options['portfolio_description_two']){ ?>
								<div class="home-portfolio-showcase-overlay">
									<div class="home-portfolio-showcase-overlay-inner">
										<div class="home-portfolio-showcase-detail">
											<?php if($current_options['portfolio_title_two']){ ?>
											<h4><?php echo esc_html($current_options['portfolio_title_two']); ?></h4>
											<?php } ?>
											<?php if($current_options['portfolio_description_two']){ ?>
											<p><?php echo esc_html($current_options['portfolio_description_two']);?></p>
											<?php } ?>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php }
					if($current_options['portfolio_image_three']) { ?>
					<div class="col-md-3 col-md-6 home-portfolio-area">
						<div class="home-portfolio-showcase">
							<div class="home-portfolio-showcase-media">
							
								<img class="img-responsive home-portfolio-img" alt="<?php echo esc_attr($current_options['portfolio_title_three']);?>" src="<?php echo esc_url($current_options['portfolio_image_three']); ?>">
								<?php if( $current_options['portfolio_title_three'] || $current_options['portfolio_description_three']){ ?>
								<div class="home-portfolio-showcase-overlay">
									<div class="home-portfolio-showcase-overlay-inner">
										<div class="home-portfolio-showcase-detail">
											<?php if($current_options['portfolio_title_three']){ ?>
											<h4><?php echo esc_html($current_options['portfolio_title_three']); ?></h4>
											<?php } ?>
											<?php if($current_options['portfolio_description_three']){ ?>
											<p><?php echo esc_html($current_options['portfolio_description_three']);?></p>
											<?php } ?>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
						<?php }
					if($current_options['portfolio_image_four']) { ?>
					<div class="col-md-3 col-md-6 home-portfolio-area">
						<div class="home-portfolio-showcase">
							<div class="home-portfolio-showcase-media">
							
								<img class="img-responsive home-portfolio-img" alt="<?php echo esc_attr($current_options['portfolio_title_four']);?>" src="<?php echo esc_url($current_options['portfolio_image_four']); ?>">
								<?php if( $current_options['portfolio_title_four'] || $current_options['portfolio_description_four']){ ?>
								<div class="home-portfolio-showcase-overlay">
									<div class="home-portfolio-showcase-overlay-inner">
										<div class="home-portfolio-showcase-detail">
											<?php if($current_options['portfolio_title_four']){ ?>
											<h4><?php echo esc_html( $current_options['portfolio_title_four'] ); ?></h4>
											<?php } ?>
											<?php if($current_options['portfolio_description_four']){ ?>
											<p><?php echo esc_html( $current_options['portfolio_description_four'] );?></p>
											<?php } ?>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
			<?php } ?>
				</div>
		</div>	
		</div>
		<?php }
		} 
	endif;

	    if (function_exists('wallstreet_portfolio_section')) {
	        $section_priority = apply_filters('wallstreet_section_priority', 12, 'wallstreet_portfolio_section');
	        add_action('wallstreet_sections', 'wallstreet_portfolio_section', absint($section_priority));
	    }