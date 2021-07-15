<?php
if ( ! function_exists( 'webriti_busiprof_testi' ) ) :

function webriti_busiprof_testi() {
$testimonial_options = get_theme_mod('busiprof_testimonial_content');
if(empty($testimonial_options)){
	$old_testimonial_data = get_option( 'busiprof_theme_options');

	$testimonial_options = json_encode( array(
				array(
				'title'      => isset($old_testimonial_data['testimonials_name_one'])? $old_testimonial_data['testimonials_name_one']:esc_html__('Robert Johnson','webriti-companion'),
				'text'       => isset($old_testimonial_data['testimonials_text_one'])? $old_testimonial_data['testimonials_text_one']:esc_html__('We are group of passionate designers and developers who really love to create wordpress themes with amazing support. Widest laborum dolo rumes fugats untras. Ethar omnis iste natus error sit voluptatem accusantiexplicabo. Nemo enim ipsam eque porro quisquam est, qui dolorem ipsum am quaerat voluptatem...','webriti-companion'),
				'designation' => isset($old_testimonial_data['testimonials_designation_one'])? $old_testimonial_data['testimonials_designation_one']:esc_html__('CEO','webriti-companion'),
				'link'       => '#',
				'image_url'  => isset($old_testimonial_data['testimonials_image_one'])? $old_testimonial_data['testimonials_image_one']:WC__PLUGIN_URL.'inc/busiprof/img/testimonial.jpg',
				'id'         => 'customizer_repeater_56d7ea7f40b96',
				'open_new_tab' => 'no',

				),
				array(
				'title'      => isset($old_testimonial_data['testimonials_name_two'])? $old_testimonial_data['testimonials_name_two']:esc_html__('Annah Doe','webriti-companion'),
				'text'       => isset($old_testimonial_data['testimonials_text_two'])? $old_testimonial_data['testimonials_text_two']:esc_html__('We are group of passionate designers and developers who really love to create wordpress themes with amazing support. Widest laborum dolo rumes fugats untras. Ethar omnis iste natus error sit voluptatem accusantiexplicabo. Nemo enim ipsam eque porro quisquam est, qui dolorem ipsum am quaerat voluptatem...','webriti-companion'),
				'designation' => isset($old_testimonial_data['testimonials_designation_two'])? $old_testimonial_data['testimonials_designation_two']:esc_html__('Team Leader','webriti-companion'),
				'link'       => '#',
				'image_url'  => isset($old_testimonial_data['testimonials_image_two'])? $old_testimonial_data['testimonials_image_two']:WC__PLUGIN_URL.'inc/busiprof/img/testimonial2.jpg',
				'id'         => 'customizer_repeater_56d7ea7f40b97',
				'open_new_tab' => 'no',

				),
			) );



}



 $current_options = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), busiprof_theme_setup_data() );
if( $current_options['home_testimonial_section_enabled']=='on' ) {
    $theme = wp_get_theme(); // gets the current theme
//
//    $current_options = wp_parse_args(get_option('busiprof_theme_options', array()), busiprof_theme_setup_data());
        if (isset($current_options['testimonial_effect_layout_setting']) && $current_options['testimonial_effect_layout_setting'] && $theme->name=='vdequator') {

            if ($current_options['testimonial_effect_layout_setting'] == 'default') {
                $testimonial_section_class='testimonial-scroll bg-color'; //default Lyout
            }
            if ($current_options['testimonial_effect_layout_setting'] == 'box_effect') {
                $testimonial_section_class='testimonial2 testimonial-scroll bg-color'; //slide layout used in vdequator child
            }
        }
        if (isset($current_options['testimonial_sideline_effect_layout_setting']) && $current_options['testimonial_sideline_effect_layout_setting'] && $theme->name=='LazyProf') {
            if ($current_options['testimonial_sideline_effect_layout_setting'] == 'default') {
                $testimonial_section_class='testimonial-scroll bg-color'; //default Lyout
            }
            if ($current_options['testimonial_sideline_effect_layout_setting'] == 'sideline_box_effect') {
                $testimonial_section_class='testimonial3 testimonial-scroll bg-color'; //slide layout used in vdequator child
            }
        }
        if (isset($current_options['testimonial_center_effect_layout_setting']) && $current_options['testimonial_center_effect_layout_setting'] && $theme->name=='vdperanto') {
            if ($current_options['testimonial_center_effect_layout_setting'] == 'default') {
                $testimonial_section_class='testimonial-scroll bg-color'; //default Lyout
            }
            if ($current_options['testimonial_center_effect_layout_setting'] == 'center_box_effect') {
                $testimonial_section_class='testimonial1 testimonial-scroll bg-color'; //slide layout used in vdequator child
            }
        }

//        else {
//            $testimonial_section_class='testimonial2 testimonial-scroll bg-color'; //slide layout used in vdequator child
//        }
        if($theme->name=='vdequator' && (!isset($testimonial_section_class)) ){
            $testimonial_section_class = 'testimonial2 testimonial-scroll bg-color';

            if(get_option('busiprof_user', 'new') == 'old' && (version_compare(wp_get_theme()->get('Version'), '1.0.9') > 0)){
            $testimonial_section_class = 'testimonial-scroll bg-color';
            }else{
            $testimonial_section_class = 'testimonial2 testimonial-scroll bg-color';
            }

        }
        if($theme->name=='LazyProf' && (!isset($testimonial_section_class)) ){
            if(get_option('busiprof_user', 'new') == 'old' && (version_compare(wp_get_theme()->get('Version'), '1.2.5') > 0)){
            $testimonial_section_class = 'testimonial-scroll bg-color';
            }else{
            $testimonial_section_class = 'testimonial3 testimonial-scroll bg-color';
            }
        }
        if($theme->name=='vdperanto' && (!isset($testimonial_section_class)) ){
        if(get_option('busiprof_user', 'new') == 'old' && (version_compare(wp_get_theme()->get('Version'), '2.0','>='))){
            $testimonial_section_class = 'testimonial-scroll bg-color';
            }else{
            $testimonial_section_class = 'testimonial1 testimonial-scroll bg-color';
            }

        }
				if($theme->name=='Busiprof Agency' && (!isset($testimonial_section_class)) ) {
					$testimonial_section_class = 'testimonial-scroll bg-color testi-5';
				}
        if(!isset($testimonial_section_class)){
            $testimonial_section_class='testimonial-scroll bg-color';
        }

    ?>
<!-- Additional Section Two - Testimonial Scroll -->
<section id="section" class="<?php echo $testimonial_section_class; ?>">
	<div class="container">

			<!-- Section Title -->
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<?php if( $current_options['testimonials_title'] != '' ) { ?>
						<h1 class="section-heading"><?php echo wp_kses_post($current_options['testimonials_title']);?></h1>
						<?php } if( $current_options['testimonials_text'] !='') { ?>
						<p><?php echo esc_html($current_options['testimonials_text']);?></p>
						<?php } ?>
					</div>
				</div>
			</div>

			<!-- /Section Title -->

			<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myTestimonial">
				<div class="carousel-inner">
					<?php
					$t=true;
					$testimonial_options = json_decode($testimonial_options);
					if( $testimonial_options!='' )
						{
					foreach($testimonial_options as $testimonial_iteam){

						$title = ! empty( $testimonial_iteam->title ) ? apply_filters( 'busiprof_translate_single_string', $testimonial_iteam->title, 'Testimonial section' ) : '';
						$test_desc = ! empty(  $testimonial_iteam->text ) ? apply_filters( 'busiprof_translate_single_string',$testimonial_iteam->text, 'Testimonial section' ) : '';
						$test_link = ! empty( $testimonial_iteam->link ) ? apply_filters( 'busiprof_translate_single_string', $testimonial_iteam->link, 'Testimonial section' ) : '';

							$open_new_tab = $testimonial_iteam->open_new_tab;

						$designation = ! empty( $testimonial_iteam->designation ) ? apply_filters( 'busiprof_translate_single_string', $testimonial_iteam->designation, 'Testimonial section' ) : '';


					?>
					<div class="col-md-12 pull-left item <?php if( $t == true ){ echo 'active'; } $t = false; ?>">
						<div class="post">
							<?php $default_arg =array('class' => "img-circle"); ?>
							<figure class="post-thumbnail">
							<a href="<?php echo esc_url($test_link); ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>>
							<img class="img-responsive" src="<?php echo esc_url($testimonial_iteam->image_url); ?>" draggable="false">
							</a>
							</figure>

                                                    <?php if($testimonial_section_class == 'testimonial2 testimonial-scroll bg-color'){ ?>
							<div class="media">
								<div class="media-body">
									<span class="author-name"> <a href="<?php echo esc_url($test_link); ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>> <?php echo esc_html($title); ?> </a> <small class="designation"><?php echo esc_html($designation); ?></small></span>
								</div>
							</div>
                                                    <?php } ?>


							<div class="entry-content">
								<p><?php echo esc_html($test_desc); ?></p>
							</div>
                                                    <?php if($testimonial_section_class != 'testimonial2 testimonial-scroll bg-color'){ ?>
							<div class="media">
								<div class="media-body">
									<span class="author-name"> <a href="<?php echo esc_url($test_link); ?>" <?php if($open_new_tab == 'yes'){ echo 'target="_blank"';}?>> <?php echo esc_html($title); ?> </a> <small class="designation"><?php echo esc_html($designation); ?></small></span>
								</div>
							</div>
                                                    <?php } ?>
						</div>
					</div>
					<?php } } else {
					$image = array('item9','item10','item-small2','item-small3');
					$name = array(esc_html__('Robert Johnson','webriti-companion'),esc_html__('Natelie Portman','webriti-companion'),esc_html__('Annah Doe','webriti-companion'),esc_html__('Charlie Sun','webriti-companion'));
					$desc = array(esc_html__('CEO & Founder','webriti-companion'),esc_html__('Sales & Marketing','webriti-companion'),esc_html__('Sales Executive','webriti-companion'),esc_html__('Team Leader','webriti-companion'));
					for($i=0; $i<=3; $i++) { ?>
					<div class="col-md-12 pull-left item <?php if($i == 0) { echo 'active'; } ?>">

						<div class="post">
							<figure class="post-thumbnail"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $image[$i]; ?>.jpg" class="img-circle"></figure>
							<?php if($testimonial_section_class == 'testimonial2 testimonial-scroll bg-color' ){ ?>
                                                            <div class="media">
								<div class="media-body">
									<span class="author-name"><?php echo esc_html($name[$i]); ?> <small class="designation"><?php echo esc_html($desc[$i]); ?></small></span>
								</div>
                                                            </div>
                                                        <?php } ?>

                                                        <div class="entry-content">
								<p><?php echo esc_html__('Curabitur sit amet neque consequat, rutrum urna at, euismod ipsum. Nam fermentum tellus tortor, et varius ante posuere eu. Widest laborum dolo rumes fugats untras. Ethar omnis iste natus error sit voluptatem accusantiexplicabo. Nemo enim ipsam eque porro quisquam est, qui dolorem ipsum am quaerat voluptatem...','webriti-companion'); ?></p>
							</div>
                                                        <?php if($testimonial_section_class != 'testimonial2 testimonial-scroll bg-color' || ($testimonial_section_class !='testimonial3 testimonial-scroll bg-color')){ ?>
                                                            <div class="media">
								<div class="media-body">
									<span class="author-name"><?php echo esc_html($name[$i]); ?> <small class="designation"><?php echo esc_html($desc[$i]); ?></small></span>
								</div>
                                                            </div>
                                                        <?php } ?>

						</div>
					</div>
					<?php } }?>
				</div>


				<?php
				//print_r($testimonial_options);
				if( $testimonial_options!='')
						{
							if(count($testimonial_options)>1){
							$i=0;
							?>
						<div class="row">
							<div class="testi-pager">
								<ol class="carousel-indicators testi-pagi">
								<?php
								foreach($testimonial_options as $testimonial_iteam){
									?>
									<li data-target="#myTestimonial" data-slide-to="<?php echo esc_attr($i); ?>"<?php if($i==0){ ?> class="active" <?php }?> ></li>
										<?php $i++;
										}
								?>
								</ol>
							</div>
						</div>
							<?php
							}
						}else{
							?>
									<!-- Testimonial Pagination -->
						<div class="row">
							<div class="testi-pager">
								<ol class="carousel-indicators testi-pagi">
								<li data-target="#myTestimonial" data-slide-to="0" class="active"></li>
								<li data-target="#myTestimonial" data-slide-to="1" ></li>
								<li data-target="#myTestimonial" data-slide-to="2" ></li>
								<li data-target="#myTestimonial" data-slide-to="2" ></li>
								</ol>
							</div>
				</div>
						<?php }
				?>


			</div>
	</div>
</section>
<!-- End of Additional Section Two - Testimonial Scroll -->
<?php }



}
endif;
if ( function_exists( 'webriti_busiprof_testi' ) ) {
$section_priority = apply_filters( 'busiprof_section_priority', 11, 'webriti_busiprof_testi' );
add_action( 'busiprof_home_tesi_sections', 'webriti_busiprof_testi', absint( $section_priority ) );
}
