<?php
/**
 * Portfolio section for the homepage.
 */
if ( ! function_exists( 'spasalon_product' ) ) :

	function spasalon_product() {
		
		$spa_theme_options= companion_product_theme_data_setup(); 
		$current_theme_content = wp_parse_args(  get_option( 'spa_theme_options', array() ), $spa_theme_options ); 
		
		$current_options = get_option( 'spa_theme_options');
		$project_hide = isset($current_options['project_hide'])? $current_options['project_hide']:true;
		$product_title    = isset($current_options['product_title'])? $current_options['product_title'] : esc_html__('Phasellus a hendrerit turpis','webriti-companion');
		$project_tagline = isset($current_options['product_contents'])?$current_options['product_contents']: esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','webriti-companion');
		if (  $project_hide == true ) {
		?>
	<section id="section" class="products bg-color">
	<div class="container">
	
		<div class="row">
			<div class="col-md-12">
				<div class="section-header">
					
					<?php 
						if( $product_title ) {
					?>
					<h1 class="section-title">
						<?php echo esc_html($product_title); ?>
					</h1>
						<?php } ?>
					
					<?php 
						if( $project_tagline ) {
					?>
					<p class="section-subtitle">
						<?php echo esc_html($project_tagline); ?>
					</p>
						<?php } ?>
					
				</div>
			</div>
		</div>
		<?php if( is_active_sidebar('project-widget-section') ): ?>
		<div class="row">
		 	<?php dynamic_sidebar('project-widget-section'); ?>
		</div>
		<?php else: ?> 
		<div class="col-md-12 col-xs-12">
			<div class="product">
				<div class="clearfix"></div>
				<?php 
				if($current_theme_content['product_one_thumb'] || $current_theme_content['product_one_title'] || $current_theme_content['product_one_desc']):?>
					<aside class="one-thumb item-product">
						<figure class="item">
						<?php if($current_theme_content['product_one_thumb']) { ?>
							<img src="<?php echo esc_url($current_theme_content['product_one_thumb']); ?>">
						<?php } ?>
						</figure>
						<div class="product-info first">
							
							<?php if($current_theme_content['product_one_title']) { ?>
							<h4><?php echo esc_html($current_theme_content['product_one_title']); ?></h4>
							<?php } ?>
							<label class="product-description one_desc">	
							<?php if( $current_theme_content['product_one_desc']){ ?>
							<p><?php echo esc_html($current_theme_content['product_one_desc']); ?></p>
							<?php } ?>
						</label>	
						</div>
					</aside>
				<?php endif;

				if($current_theme_content['product_two_thumb'] || $current_theme_content['product_two_title'] || $current_theme_content['product_two_desc']):?>
					<aside class="two-thumb item-product ">
						<figure class="item">
						<?php if($current_theme_content['product_two_thumb']) { ?>
							<img src="<?php echo esc_url($current_theme_content['product_two_thumb']); ?>">
						<?php } ?>
						</figure>
						<div class="product-info second">
							
							<?php if($current_theme_content['product_two_title']) { ?>
							<h4><?php echo esc_html($current_theme_content['product_two_title']); ?></h4>
							<?php } ?>
							<label class="product-description two_desc">	
							<?php if( $current_theme_content['product_two_desc']){ ?>
							<p><?php echo esc_html($current_theme_content['product_two_desc']); ?></p>
							<?php } ?>
						</label>	
						</div>
					</aside>
				<?php endif;

				if($current_theme_content['product_three_thumb'] || $current_theme_content['product_three_title'] || $current_theme_content['product_three_desc']):?>
					<aside class="three-thumb item-product">
						<figure class="item">
						<?php if($current_theme_content['product_three_thumb']) { ?>
							<img src="<?php echo esc_url($current_theme_content['product_three_thumb']); ?>">
						<?php } ?>
						</figure>
						<div class="product-info three">
							
							<?php if($current_theme_content['product_three_title']) { ?>
							<h4><?php echo esc_html($current_theme_content['product_three_title']); ?></h4>
							<?php } ?>
							<label class="product-description three_desc">	
							<?php if( $current_theme_content['product_three_desc']){ ?>
							<p><?php echo esc_html($current_theme_content['product_three_desc']); ?></p>
							<?php } ?>
						</label>	
						</div>
					</aside>

				<?php endif;
				if($current_theme_content['product_four_thumb'] || $current_theme_content['product_four_title'] || $current_theme_content['product_four_desc']):?>
					<aside class="four-thumb item-product">
						<figure class="item">
						<?php if($current_theme_content['product_four_thumb']) { ?>
							<img src="<?php echo esc_url($current_theme_content['product_four_thumb']); ?>">
						<?php } ?>
						</figure>
						<div class="product-info four">
							
							<?php if($current_theme_content['product_four_title']) { ?>
							<h4><?php echo esc_html($current_theme_content['product_four_title']); ?></h4>
							<?php } ?>
							<label class="product-description four_desc">	
							<?php if( $current_theme_content['product_four_desc']){ ?>
							<p><?php echo esc_html($current_theme_content['product_four_desc']); ?></p>
							<?php } ?>
						</label>	
						</div>
					</aside>
					<?php endif;
				if($current_theme_content['product_five_thumb'] || $current_theme_content['product_five_title'] || $current_theme_content['product_five_desc']):?>
					<aside class="five-thumb item-product">
						<figure class="item">
						<?php if($current_theme_content['product_five_thumb']) { ?>
							<img src="<?php echo esc_url($current_theme_content['product_five_thumb']); ?>">
						<?php } ?>
						</figure>
						<div class="product-info five">
							
							<?php if($current_theme_content['product_five_title']) { ?>
							<h4><?php echo esc_html($current_theme_content['product_five_title']); ?></h4>
							<?php } ?>
							<label class="product-description five_desc">	
							<?php if( $current_theme_content['product_five_desc']){ ?>
							<p><?php echo esc_html($current_theme_content['product_five_desc']); ?></p>
							<?php } ?>
						</label>	
						</div>
					</aside>
				<?php endif;?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php } 
} 

endif;

		if ( function_exists( 'spasalon_product' ) ) {
		$section_priority = apply_filters( 'spasalon_section_priority', 11, 'spasalon_product' );
		add_action( 'spasalon_sections', 'spasalon_product', absint( $section_priority ) );

		}
function companion_product_theme_data_setup()
{	
	return $theme_options=array(
			
			//product Section Settings
			
					'product_one_thumb' => WC__PLUGIN_URL .'/inc/spasalon/images/portfolio/project1.jpg',
					'product_one_title' => esc_html__('Bibendum mauris','webriti-companion'),
					'product_one_desc' => esc_html__('Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.','webriti-companion'),

					'product_two_thumb' => WC__PLUGIN_URL .'/inc/spasalon/images/portfolio/project2.jpg',
					'product_two_title' => esc_html__('Bibendum mauris','webriti-companion'),
					'product_two_desc' =>  esc_html__('Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.','webriti-companion'),

					'product_three_thumb' => WC__PLUGIN_URL .'/inc/spasalon/images/portfolio/project3.jpg',
					'product_three_title' => esc_html__('Bibendum mauris','webriti-companion'),
					'product_three_desc' =>  esc_html__('Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.','webriti-companion'),

					'product_four_thumb' => WC__PLUGIN_URL .'/inc/spasalon/images/portfolio/project4.jpg',
					'product_four_title' => esc_html__('Bibendum mauris','webriti-companion'),
					'product_four_desc' =>  esc_html__('Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.','webriti-companion'),

					'product_five_thumb' => WC__PLUGIN_URL .'/inc/spasalon/images/portfolio/project5.jpg',
					'product_five_title' => esc_html__('Bibendum mauris','webriti-companion'),
					'product_five_desc' =>  esc_html__('Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.','webriti-companion'),
		);
}