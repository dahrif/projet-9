<?php
if ( ! function_exists( 'quality_funfact' ) ) :

function quality_funfact() {
	
$funfact_enable = get_theme_mod('funfact_enable',true);
if($funfact_enable == true){

$quality_funfact_content  = get_theme_mod( 'quality_funfact_content');

$funfact_background = get_theme_mod('funfact_background', WC__PLUGIN_URL .'/inc/quality/images/funfact-bg.jpg');	
 if($funfact_background != '') { ?>
<section class="funfact" style="background-image:url('<?php echo esc_url($funfact_background);?>'); 50% 0 fixed; position: relative; ">
	<?php } else { ?>
<section class="funfact">
<?php } 

$funfact_overlay_section_color = get_theme_mod('funfact_overlay_section_color','rgba(0,0,0,0.85)');
$funfact_image_overlay = get_theme_mod('funfact_image_overlay',true);
?>
<div class="overlay"<?php if($funfact_image_overlay != false) { ?>style="background-color:<?php echo $funfact_overlay_section_color; } ?>">
<div class="container">

		<div class="row ">
		<?php 
		if ( ! empty( $quality_funfact_content ) ) {
		$allowed_html = array(
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'b'      => array(),
		'i'      => array(),
		);	
			
		$quality_funfact_content = json_decode( $quality_funfact_content );
		foreach ( $quality_funfact_content as $features_item ) {
		$icon = ! empty( $features_item->icon_value ) ? apply_filters( 'quality_translate_single_string',$features_item->icon_value, 'Funfact section' ) : '';
		$title = ! empty( $features_item->title ) ? apply_filters( 'quality_translate_single_string', $features_item->title, 'Funfact section' ) : '';
		$text = ! empty( $features_item->text ) ? apply_filters( 'quality_translate_single_string',
		$features_item->text, 'Funfact section' ) : '';
		?>
		<?php if( ! empty( $icon ) || ! empty( $title ) || ! empty( $text )): ?>
		<div class="col-lg-3 col-md-3 col-sm-6">	
			<div class="funfact-inner text-center">
				<?php if ( ! empty( $icon ) ) :?>
				<i class="fa <?php echo esc_attr( $icon ); ?> funfact-icon"></i><?php endif; ?>
				<?php if ( ! empty( $title ) ) : ?>
				<h1 class="funfact-title"><?php echo esc_html( $title ); ?></h1><?php endif; ?>
				<?php if ( ! empty( $text ) ) : ?>
				<p class="description"><?php echo wp_kses( html_entity_decode( $text ), $allowed_html ); ?></p><?php endif; ?>
			</div>  
		</div>
		<?php endif; } } else { ?>
			<div class="col-lg-3 col-md-3 col-sm-6">	
				<div class="funfact-inner text-center">
					<i class="fa fa-smile-o funfact-icon"></i>
					<h1 class="funfact-title"><?php echo esc_html__('2500','quality'); ?></h1>
					<p class="description"><?php esc_html_e('Vestibulum gravida','webriti-companion'); ?></p>
				</div>  
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">		
				<div class="funfact-inner text-center">
					<i class="fa  fa-handshake-o funfact-icon"></i>
					<h1 class="funfact-title"><?php echo esc_html__('2500','quality'); ?></h1>
					<p class="description"><?php esc_html_e('Malesuada Fames','webriti-companion'); ?></p>
				</div>  
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">		
				<div class="funfact-inner text-center">
					<i class="fa fa-line-chart funfact-icon"></i>
					<h1 class="funfact-title"><?php echo esc_html__('90%','quality'); ?></h1>
					<p class="description"><?php esc_html_e('Vitae Convallis','webriti-companion'); ?></p>
				</div>  
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6">			
				<div class="funfact-inner text-center">
					<i class="fa fa-coffee funfact-icon"></i>
					<h1 class="funfact-title"> <?php echo esc_html__('1350','quality'); ?></h1>
					<p class="description"><?php esc_html_e('Vestibulum vitae Tellus','webriti-companion'); ?></p>
				</div>  
			</div>
		<?php } ?>
		</div>	 

	</div>
	</div>
</section>
<!-- /End of Funfact Section ---->
<div class="clearfix"></div>
<?php } 
}
endif;

if ( function_exists( 'quality_funfact' ) ) {
	$section_priority = apply_filters( 'quality_section_priority', 11, 'quality_funfact' );
	add_action( 'quality_sections', 'quality_funfact', absint( $section_priority ) );
}