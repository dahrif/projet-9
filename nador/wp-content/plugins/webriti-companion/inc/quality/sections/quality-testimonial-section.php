<?php
if (!function_exists('quality_testimonial')) :

    function quality_testimonial() {
        $funfact_enable = get_theme_mod('testimonial_enable', true);
        if ($funfact_enable == true) {
            $testimonial_background = get_theme_mod('testimonial_background');
            if ($testimonial_background != '') {
                ?>

                <section  id="section-block"  class="testimonial left-right-half" style="background-image:url('<?php echo esc_url($testimonial_background); ?>'); background-size: cover; background-position: fixed; background-rapeat: no-repeat; position: relative; ">

                    <?php } else { ?>
                    <section id="section-block"  class="testimonial left-right-half">
                        <?php } ?>
                    <div class="container">
                        <?php
                        $quality_pro_options = companion_testimonial_theme_data_setup();
                        $current_theme_content = wp_parse_args(get_option('quality_pro_options', array()), $quality_pro_options);


                        $testimonial_title = get_theme_mod('testimonial_title', esc_html__('Sed ut Perspiciatis Unde Omnis Iste','webriti-companion'));
                        $testimonial_descripton = get_theme_mod('testimonial_descripton', esc_html__('Sed ut Perspiciatis Unde Omnis Iste Sed ut perspiciatis  unde omnis iste natu error sit voluptatem accu tium
			neque fermentum veposu miten a tempor nise. Duis autem vel eum iriure dolor in hendrerit in vulputate velit consequat in velit esse.','webriti-companion'));
                        $testimonial_name = get_theme_mod('testimonial_name', esc_html__('Elementum Nulla','webriti-companion'));
                        $testimonial_position = get_theme_mod('testimonial_position', esc_html__('Vestibulum', 'webriti-companion'));
                        $testimonial_image = get_theme_mod('testimonial_image', WC__PLUGIN_URL . '/inc/quality/images/user1.jpg');


                        $current_options = get_option('quality_pro_options');
                        if (($current_theme_content['home_testimonial_title']) || ($current_theme_content['home_testimonial_desciption'] != '' )) {
                            ?>
                            <div class="row">
                                <div class="section-header">
                                    <?php if ($current_theme_content['home_testimonial_title']) { ?>
                                    <p><?php echo wp_kses_post($current_theme_content['home_testimonial_title']); ?></p>
                                    <?php }
                                    if ($current_theme_content['home_testimonial_desciption']) {
                                        ?>
                                        <h1 class="widget-title"><?php echo wp_kses_post($current_theme_content['home_testimonial_desciption']); ?></h1>
                            <?php } ?>
                                    <hr class="divider">
                                </div>
                            </div>
            <?php } ?>

            <?php if (!empty($testimonial_title) || !empty($testimonial_descripton) || !empty($testimonial_image) || !empty($testimonial_name) || !empty($testimonial_position)): ?>	
                            <div class="row">
                                <div id="testimonial-carousel" class="owl-carousel owl-theme col-md-12">
                                    <div class="item">
                                        <blockquote class="testmonial-block text-center">
                                                <?php if (!empty($testimonial_title) || !empty($testimonial_descripton)): ?>
                                                <div class="description">
                                                    <?php if (!empty($testimonial_title)): ?>
                                                        <h3 class="title"><?php echo esc_html($testimonial_title); ?></h3>
                                                    <?php endif;
                                                    if (!empty($testimonial_descripton)):
                                                        ?>
                                                        <p><?php echo esc_html($testimonial_descripton); ?></p>
                    <?php endif; ?>
                                                </div>	
                                            <?php endif;
                                            if (!empty($testimonial_image)):
                                                ?>								
                                                <figure class="avatar">
                                                    <img class="img-responsive img-circle" src="<?php echo esc_url($testimonial_image); ?>" />
                                                </figure>
                                                <?php endif;
                                                if (!empty($testimonial_name) || !empty($testimonial_position)):
                                                    ?>
                                                <figcaption>
                                                <?php if (!empty($testimonial_name)): ?>
                                                        <cite class="name"><?php echo esc_html($testimonial_name); ?></cite>
                    <?php endif;
                    if (!empty($testimonial_position)):
                        ?>
                                                        <span class="designation"><?php echo esc_html($testimonial_position); ?></span>
                                <?php endif; ?>
                                                </figcaption>
                    <?php endif; ?>
                                        </blockquote>		
                                    </div>			
                                </div>
                            </div>
                <?php endif; ?>
                    </div>
                </section>
            <?php }
        }

endif; 
    if (function_exists('quality_testimonial')) {
        $section_priority = apply_filters('quality_section_priority', 14, 'quality_testimonial');
        add_action('quality_sections', 'quality_testimonial', absint($section_priority));
    }

    function companion_testimonial_theme_data_setup() {
        return $theme_options = array(
            'home_testimonial_title' => esc_html__("Aliquam eget", "webriti-companion"),
            'home_testimonial_desciption' => __("Magnis <b>Dis</b> Parturient", "webriti-companion"),
        );
    }