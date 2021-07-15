<?php 
if ( ! function_exists( 'webriti_busiprof_project' ) ) :

function webriti_busiprof_project() {
	
$current_options = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), busiprof_theme_setup_data() );

if( $current_options['enable_projects'] == 'on' ) { 
	

$project_thumb_one=$current_options['project_thumb_one'];
$project_thumb_two=$current_options['project_thumb_two'];
$project_thumb_three=$current_options['project_thumb_three'];
$project_thumb_four=$current_options['project_thumb_four'];


?>
<!-- Portfolio Section -->
<section id="section" class="portfolio bg-color">
	<div class="container">
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<?php if($current_options['protfolio_tag_line']!='') {?>
					<h1 class="section-heading"><?php echo wp_kses_post($current_options['protfolio_tag_line']); ?>
					</h1><?php } ?>
					<?php if($current_options['protfolio_description_tag']!='') {?>
					<p><?php echo esc_html($current_options['protfolio_description_tag']); ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		
				
		<!-- Portfolio Item -->
	<div class="tab-content main-portfolio-section" id="myTabContent">
		<!-- Portfolio Item -->
			<div class="row">
				<?php if(($project_thumb_one =='') && (empty($current_options['project_title_one'])) && (empty($current_options['project_text_one']))) { } else { ?>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<?php if($current_options['project_one_url']!='') {?>
							<a href="<?php echo esc_url($current_options['project_one_url']); ?>">
							<?php } ?>
							<?php if($project_thumb_one!='') {?>
							<img alt="" src="<?php echo esc_url($project_thumb_one); ?>" class="project_feature_img" />
							<?php } ?>
							<?php if($current_options['project_one_url']!='') {?>
							</a>
							<?php } ?>
						</figure>
						<?php if((!empty($current_options['project_title_one'])) || (!empty($current_options['project_text_one']))):?>
						<div class="portfolio-info">
							<div class="entry-header">
								<h4 class="entry-title">
								<?php if($current_options['project_one_url']!='') {?>
								<a href="<?php echo esc_url($current_options['project_one_url']); ?>">
								<?php } 
								if($current_options['project_title_one']!='') {
								echo esc_html($current_options['project_title_one']); ?>
								<?php } ?>
								<?php if($current_options['project_one_url']!='') {?>
								</a>
								<?php } ?>
								</h4>
							</div>
							<div class="entry-content">
								<?php if($current_options['project_text_one']!='') {?>
								<p><?php echo esc_html($current_options['project_text_one']); ?></p>
								<?php } ?>
							</div>
						</div>	
						<?php endif;?>				
					</aside>
				</div>
				<?php } if(($project_thumb_two =='') && (empty($current_options['project_title_two'])) && (empty($current_options['project_text_two']))) {} else{?>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<?php if($current_options['project_two_url']!='') {?>
							<a href="<?php echo esc_url($current_options['project_two_url']); ?>">
							<?php } ?>
							<?php if($project_thumb_two!='') {?>
							<img alt="" src="<?php echo esc_url($project_thumb_two); ?>" class="project_feature_img" />
							<?php } ?>
							<?php if($current_options['project_two_url']!='') {?>
							</a>
							<?php } ?>
						</figure>
						<?php if((!empty($current_options['project_title_two'])) || (!empty($current_options['project_text_two']))):?>
						<div class="portfolio-info">
							<div class="entry-header">
								<h4 class="entry-title">
								<?php if($current_options['project_two_url']!='') {?>
								<a href="<?php echo esc_url($current_options['project_two_url']); ?>">
								<?php }
								if($current_options['project_title_two']!='') {
								echo esc_html($current_options['project_title_two']); ?>
								<?php }
								 if($current_options['project_two_url']!='') {?>
								</a>
								<?php } ?>
								</h4>
							</div>
							<div class="entry-content">
								<?php if($current_options['project_text_two']!='') {?>
								<p><?php echo esc_html($current_options['project_text_two']); ?></p>
								<?php } ?>
							</div>
						</div>	
						<?php endif;?>				
					</aside>
				</div>	
				<?php }  if(($project_thumb_three =='') && (empty($current_options['project_title_three'])) && (empty($current_options['project_text_three']))) { } else{?>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<?php if($current_options['project_three_url']!='') {?>
							<a href="<?php echo esc_url($current_options['project_three_url']); ?>">
							<?php } ?>
							<?php if($project_thumb_three!='') {?>
							<img alt="" src="<?php echo esc_url($project_thumb_three); ?>" class="project_feature_img" />
							<?php } ?>
							<?php if($current_options['project_three_url']!='') {?>
							</a>
							<?php } ?>
						</figure>
						<?php if((!empty($current_options['project_title_three'])) || (!empty($current_options['project_text_three']))):?>
						<div class="portfolio-info">
							<div class="entry-header">
								
								<h4 class="entry-title">
								<?php if($current_options['project_three_url']!='') {?>
								<a href="<?php echo esc_url($current_options['project_three_url']); ?>">
								<?php }
								if($current_options['project_title_three']!='') {
								echo esc_html($current_options['project_title_three']); ?>
								<?php }
								 if($current_options['project_three_url']!='') {?>
								</a>
								<?php }?>
								</h4>
							</div>
							<div class="entry-content">
								<?php if($current_options['project_text_three']!='') {?>
								<p><?php echo esc_html($current_options['project_text_three']); ?></p>
								<?php } ?>
							</div>
						</div>	
						<?php endif;?>				
					</aside>
				</div>
				<?php } 
			 if(($project_thumb_four=='') && (empty($current_options['project_title_four'])) && (empty($current_options['project_text_four']))) {} else{?>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<aside class="post">
						<figure class="post-thumbnail">
							<?php if($current_options['project_four_url']!='') {?>
							<a href="<?php echo esc_url($current_options['project_four_url']); ?>">
							<?php } ?>
							<?php if($project_thumb_four!='') {?>
							<img alt="" src="<?php echo esc_url($project_thumb_four); ?>" class="project_feature_img" />
							<?php } ?>
							<?php if($current_options['project_four_url']!='') {?>
							</a>
							<?php } ?>
						</figure>
						<?php if((!empty($current_options['project_title_four'])) || (!empty($current_options['project_text_four']))):?>
						<div class="portfolio-info">
							<div class="entry-header">
								<h4 class="entry-title">
								<?php if($current_options['project_four_url']!='') {?>
								<a href="<?php echo esc_url($current_options['project_four_url']); ?>">
								<?php }
								if($current_options['project_title_four']!='') {
								echo esc_html($current_options['project_title_four']); ?>
								<?php } ?>
								<?php if($current_options['project_four_url']!='') {?>
								</a>
								<?php } ?>
								</h4>
							</div>
							<div class="entry-content">
								<?php if($current_options['project_text_four']!='') {?>
								<p><?php echo esc_html($current_options['project_text_four']); ?></p>
								<?php } ?>
							</div>
						</div>	
						<?php endif;?>				
					</aside>
				</div>
				<?php } ?>
			</div>
	</div>
</section>
<!-- End of Portfolio Section -->
<div class="clearfix"></div>
<?php } 

}
endif;


if ( function_exists( 'webriti_busiprof_project' ) ) {
$section_priority = apply_filters( 'busiprof_section_priority', 11, 'webriti_busiprof_project' );
add_action( 'busiprof_home_template_sections', 'webriti_busiprof_project', absint( $section_priority ) );
}