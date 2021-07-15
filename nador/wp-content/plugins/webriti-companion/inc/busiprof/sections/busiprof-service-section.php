<?php

function webriti_busiprof_services() {
    $default_content = false;
    $current_options = wp_parse_args(get_option('busiprof_theme_options', array()), busiprof_theme_setup_data());
    $busiprof_service_content = get_theme_mod('busiprof_service_content', $default_content);
    if ($current_options['enable_services'] == "on") {
        if (!empty($current_options)) {
            if (empty($busiprof_service_content)) {

                $old_theme_servives = wp_parse_args(get_option('busiprof_theme_options', array()), busiprof_theme_setup_data());

                if ($old_theme_servives['service_image_one'] != '' || $old_theme_servives['service_icon_one'] != '' || $old_theme_servives['service_title_one'] != '' || $old_theme_servives['service_text_one'] != '' || $old_theme_servives['service_image_two'] != '' || $old_theme_servives['service_icon_two'] != '' || $old_theme_servives['service_title_two'] != '' || $old_theme_servives['service_text_two'] != '' || $old_theme_servives['service_image_three'] != '' || $old_theme_servives['service_icon_three'] != '' || $old_theme_servives['service_title_three'] != '' || $old_theme_servives['service_text_three'] != '' || $old_theme_servives['service_image_four'] != '' || $old_theme_servives['service_icon_four'] != '' || $old_theme_servives['service_title_four'] != '' || $old_theme_servives['service_text_four'] != '') {

                    $busiprof_service_content = json_encode(array(
                        array(
                            'icon_value' => isset($old_theme_servives['service_icon_one']) ? $old_theme_servives['service_icon_one'] : '',
                            'image_url' => isset($old_theme_servives['service_image_one']) ? $old_theme_servives['service_image_one'] : '',
                            'choice' => 'customizer_repeater_icon',
                            'title' => isset($old_theme_servives['service_title_one']) ? $old_theme_servives['service_title_one'] : '',
                            'text' => isset($old_theme_servives['service_text_one']) ? $old_theme_servives['service_text_one'] : '',
                            'link' => '',
                            'id' => 'customizer_repeater_56d7ea7f40b56',
                            'color' => '#e91e63',
                        ),
                        array(
                            'icon_value' => isset($old_theme_servives['service_icon_two']) ? $old_theme_servives['service_icon_two'] : '',
                            'image_url' => isset($old_theme_servives['service_image_two']) ? $old_theme_servives['service_image_two'] : '',
                            'choice' => 'customizer_repeater_icon',
                            'title' => isset($old_theme_servives['service_title_two']) ? $old_theme_servives['service_title_two'] : '',
                            'text' => isset($old_theme_servives['service_text_two']) ? $old_theme_servives['service_text_two'] : '',
                            'link' => '',
                            'id' => 'customizer_repeater_56d7ea7f40b66',
                            'color' => '#a01000',
                        ),
                        array(
                            'icon_value' => isset($old_theme_servives['service_icon_three']) ? $old_theme_servives['service_icon_three'] : '',
                            'image_url' => isset($old_theme_servives['service_image_three']) ? $old_theme_servives['service_image_three'] : '',
                            'choice' => 'customizer_repeater_icon',
                            'title' => isset($old_theme_servives['service_title_three']) ? $old_theme_servives['service_title_three'] : '',
                            'text' => isset($old_theme_servives['service_text_three']) ? $old_theme_servives['service_text_three'] : '',
                            'link' => '',
                            'id' => 'customizer_repeater_56d7ea7f40b86',
                            'color' => '#eded23',
                        ),
                        array(
                            'icon_value' => isset($old_theme_servives['service_icon_four']) ? $old_theme_servives['service_icon_four'] : '',
                            'image_url' => isset($old_theme_servives['service_image_four']) ? $old_theme_servives['service_image_four'] : '',
                            'choice' => 'customizer_repeater_icon',
                            'title' => isset($old_theme_servives['service_title_four']) ? $old_theme_servives['service_title_four'] : '',
                            'text' => isset($old_theme_servives['service_text_four']) ? $old_theme_servives['service_text_four'] : '',
                            'link' => '',
                            'id' => 'customizer_repeater_56d7ea7f40b96',
                            'color' => '#59327a',
                        ),
                    ));
                }
            }
        }
        $theme = wp_get_theme(); // gets the current theme
        $current_options = wp_parse_args(get_option('busiprof_theme_options', array()), busiprof_theme_setup_data());


        if (isset($current_options['service_effect_layout_setting']) && $theme->name=='vdequator') {
            if ($current_options['service_effect_layout_setting'] == 'default') {
                busiprof_default_layout($busiprof_service_content); //default Lyout
            }
            if ($current_options['service_effect_layout_setting'] == 'slide_effect') {
                busiprof_slide_layout($busiprof_service_content); //slide layout used in vdequator child
            }
        }
        if (isset($current_options['service_rotate_effect_layout_setting']) && $theme->name=='LazyProf') {
            if ($current_options['service_rotate_effect_layout_setting'] == 'default') {
                busiprof_default_layout($busiprof_service_content); //default Lyout
            }
            if ($current_options['service_rotate_effect_layout_setting'] == 'rotate_effect') {
                busiprof_rotate_layout($busiprof_service_content); //slide layout used in lazyprof child
            }
        }
        if (isset($current_options['service_blink_effect_layout_setting']) && $theme->name=='vdperanto') {
            if ($current_options['service_blink_effect_layout_setting'] == 'default') {
                busiprof_default_layout($busiprof_service_content); //default Lyout
            }
            if ($current_options['service_blink_effect_layout_setting'] == 'blink_effect') {
                busiprof_blink_layout($busiprof_service_content); //slide layout used in lazyprof child
            }
        }


        if($theme->name=='vdequator' && (!isset($current_options['service_effect_layout_setting'])) ) {

            if(get_option('busiprof_user', 'new') == 'old' && (version_compare(wp_get_theme()->get('Version'), '1.0.9') > 0)){
            busiprof_default_layout($busiprof_service_content); //default Lyout
            }else{
            busiprof_slide_layout($busiprof_service_content); //slide layout used in vdequator child
            }
        }

        if ($theme->name=='LazyProf' && !isset($current_options['service_rotate_effect_layout_setting'])  ) {
            if(get_option('busiprof_user', 'new') == 'old' && (version_compare(wp_get_theme()->get('Version'), '1.2.5') > 0)){
            busiprof_default_layout($busiprof_service_content); //default Lyout
            }else{
            busiprof_rotate_layout($busiprof_service_content); //slide layout used in lazyprof child
            }
        }
        if ($theme->name=='vdperanto' && !isset($current_options['service_blink_effect_layout_setting'])) {

            if(get_option('busiprof_user', 'new') == 'old' && (version_compare(wp_get_theme()->get('Version'), '2.0', '>='))){
            busiprof_default_layout($busiprof_service_content); //default Lyout
            }else{
            busiprof_blink_layout($busiprof_service_content); //slide layout used in vdequator child
            }
        }

        if($theme->name=='Busiprof' || $theme->name=='ARzine'){
            busiprof_default_layout($busiprof_service_content); //default Lyout
        }

        if($theme->name == 'Busiprof Agency'){
            busiprof_circle_layout($busiprof_service_content); //default Lyout
        }
    }
}


function busiprof_rotate_layout($busiprof_service_content){
    $current_options = wp_parse_args(get_option('busiprof_theme_options', array()), busiprof_theme_setup_data());
    ?>
    <section id="section" class="service5 service">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <?php if ($current_options['service_heading_one'] != '') { ?>
                            <h1 class="section-heading"><?php echo wp_kses_post($current_options['service_heading_one']); ?></h1>
                        <?php } if ($current_options['service_tagline'] != '') { ?>
                            <p><?php echo esc_html($current_options['service_tagline']); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php busiprof_service_content($busiprof_service_content); ?>
            <div class="clearfix"></div>
            <div class="col-md-12 col-xs-12">
                <div class="btn-wrap">
                    <div class="services_more_btn">
                        <?php if ($current_options['service_link_btn'] != '') { ?>
                            <a href="<?php echo esc_url($current_options['service_link_btn']); ?>">
                                <?php
                            } if ($current_options['service_button_value'] != '') {
                                echo esc_html($current_options['service_button_value']);
                                ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}

function busiprof_slide_layout($busiprof_service_content) {
    $current_options = wp_parse_args(get_option('busiprof_theme_options', array()), busiprof_theme_setup_data());
    ?>
    <section id="section" class="service2 service">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <?php if ($current_options['service_heading_one'] != '') { ?>
                            <h1 class="section-heading"><?php echo wp_kses_post($current_options['service_heading_one']); ?></h1>
                        <?php } if ($current_options['service_tagline'] != '') { ?>
                            <p><?php echo esc_html($current_options['service_tagline']); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php busiprof_service_content($busiprof_service_content); ?>
            <div class="clearfix"></div>
            <div class="col-md-12 col-xs-12">
                <div class="btn-wrap">
                    <div class="services_more_btn">
                        <?php if ($current_options['service_link_btn'] != '') { ?>
                            <a href="<?php echo esc_url($current_options['service_link_btn']); ?>">
                                <?php
                            } if ($current_options['service_button_value'] != '') {
                                echo esc_html($current_options['service_button_value']);
                                ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}


function busiprof_default_layout($busiprof_service_content) {
    $current_options = wp_parse_args(get_option('busiprof_theme_options', array()), busiprof_theme_setup_data());
    ?>
    <section id="section" class="service">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <?php if ($current_options['service_heading_one'] != '') { ?>
                            <h1 class="section-heading"><?php echo wp_kses_post($current_options['service_heading_one']); ?></h1>
                        <?php } if ($current_options['service_tagline'] != '') { ?>
                            <p><?php echo esc_html($current_options['service_tagline']); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php busiprof_service_content($busiprof_service_content); ?>
            <div class="clearfix"></div>
            <div class="col-md-12 col-xs-12">
                <div class="btn-wrap">
                    <div class="services_more_btn">
                        <?php if ($current_options['service_link_btn'] != '') { ?>
                            <a href="<?php echo esc_url($current_options['service_link_btn']); ?>">
                                <?php
                            } if ($current_options['service_button_value'] != '') {
                                echo esc_html($current_options['service_button_value']);
                                ?></a>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}

function busiprof_blink_layout($busiprof_service_content) {
    $current_options = wp_parse_args(get_option('busiprof_theme_options', array()), busiprof_theme_setup_data());
    ?>
    <section id="section" class="service3 service">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <?php if ($current_options['service_heading_one'] != '') { ?>
                            <h1 class="section-heading"><?php echo wp_kses_post($current_options['service_heading_one']); ?></h1>
                        <?php } if ($current_options['service_tagline'] != '') { ?>
                            <p><?php echo esc_html($current_options['service_tagline']); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php busiprof_service_content($busiprof_service_content); ?>
            <div class="clearfix"></div>
            <div class="col-md-12 col-xs-12">
                <div class="btn-wrap">
                    <div class="services_more_btn">
                        <?php if ($current_options['service_link_btn'] != '') { ?>
                            <a href="<?php echo esc_url($current_options['service_link_btn']); ?>">
                                <?php
                            } if ($current_options['service_button_value'] != '') {
                                echo esc_html($current_options['service_button_value']);
                                ?></a>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
function busiprof_circle_layout($busiprof_service_content) {
    $current_options = wp_parse_args(get_option('busiprof_theme_options', array()), busiprof_theme_setup_data());
    ?>
    <section id="section" class="service1 service">
    	<div class="container">
    		<!-- Section Title -->
    		<div class="row">
    			<div class="col-md-12">
    				<div class="section-title">
              <?php if ($current_options['service_heading_one'] != '') { ?>
    					       <h1 class="section-heading"><?php echo wp_kses_post($current_options['service_heading_one']); ?></h1>
              <?php } if ($current_options['service_tagline'] != '') { ?>
    					       <p><?php echo esc_html($current_options['service_tagline']); ?></p>
              <?php } ?>
    				</div>
    			</div>
    		</div>
        <?php busiprof_service_content($busiprof_service_content); ?>
    		<!-- /Section Title -->
    		<div class="clearfix"></div>
  			<div class="col-md-12 col-xs-12">
          <div class="btn-wrap">
            <div class="services_more_btn">
                <?php if ($current_options['service_link_btn'] != '') { ?>
                    <a href="<?php echo esc_url($current_options['service_link_btn']); ?>">
                        <?php
                    } if ($current_options['service_button_value'] != '') {
                        echo esc_html($current_options['service_button_value']);
                        ?></a>
                    <?php } ?>
            </div>
          </div>
      </div>
    	</div>
</section>
<?php
}

/**
 * Get content for features section.
 *
 * @since 1.1.30
 * @access public
 * @param string busiprof_service_content Section content in json format.
 * @param bool   $is_callback Flag to check if it's callback or not.
 */
if(!function_exists('busiprof_service_content')){
function busiprof_service_content($busiprof_service_content, $is_callback = false) {
    if (!$is_callback) {
        ?>
        <div class="row busiprof-features-content">
            <?php
        }
        if (!empty($busiprof_service_content)) {
            $allowed_html = array(
                'br' => array(),
                'em' => array(),
                'strong' => array(),
                'b' => array(),
                'i' => array(),
            );
            $busiprof_service_content = json_decode($busiprof_service_content);
            foreach ($busiprof_service_content as $features_item) :
                $icon = !empty($features_item->icon_value) ? apply_filters('busiprof_translate_single_string', $features_item->icon_value, 'Features section') : '';
                $title = !empty($features_item->title) ? apply_filters('busiprof_translate_single_string', $features_item->title, 'Features section') : '';
                $text = !empty($features_item->text) ? apply_filters('busiprof_translate_single_string', $features_item->text, 'Features section') : '';
                $link = !empty($features_item->link) ? apply_filters('busiprof_translate_single_string', $features_item->link, 'Features section') : '';
                $image = !empty($features_item->image_url) ? apply_filters('busiprof_translate_single_string', $features_item->image_url, 'Features section') : '';
                $color = !empty($features_item->color) ? apply_filters('busiprof_translate_single_string', $features_item->color, 'Features section') : '';
                if (is_customize_preview() && !empty($features_item->color)) {
                    $color = $features_item->color;
                }
                ?>
                <div class="col-md-3 col-sm-6 col-xs-12 service-box">
                    <div class="post">
                        <?php if ($features_item->choice == 'customizer_repeater_image') { ?>
                            <?php if (!empty($image)) : ?>
                                <?php if (!empty($link)) : ?>
                                    <a href="<?php echo esc_url($link); ?>">
                                    <?php endif; ?>
                                    <img class="services_cols_mn_icon"
                                         src="<?php echo esc_url($image); ?>" <?php if (!empty($title)) : ?> alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" <?php endif; ?> />
                                         <?php if (!empty($link)) : ?>
                                    </a>
                                <?php endif; ?>
                                <?php
                            endif;
                        }
                        ?>

                        <?php if (!empty($link)) : ?>
                            <a href="<?php echo esc_url($link); ?>">
                            <?php endif; ?>
                            <?php if ($features_item->choice == 'customizer_repeater_icon') { ?>
                                <?php if (!empty($icon)) : ?>
                                    <div class="service-icon" <?php
                    if (!empty($color)) {
                        echo 'style="color:' . $color . '"';
                    }
                                    ?>>
                                        <i class="fa <?php echo esc_attr($icon); ?>"></i>
                                    </div>
                                <?php endif; ?>
                            <?php } ?>
                            <?php if (!empty($title)) : ?>

                                <div class="entry-header">
                                    <h4 class="entry-title"><?php echo esc_html($title); ?></h4>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($link)) : ?>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($text)) : ?>

                            <div class="entry-content">
                                <p><?php echo wp_kses(html_entity_decode($text), $allowed_html); ?></p>
                            </div>


                        <?php endif; ?>
                    </div>
                </div>
                <?php
            endforeach;
        } else {
            $colors = array('#e91e63', '#a01000', '#eded23', '#59327a');

            $title = array(esc_html__('Quis Urna', 'webriti-companion'), esc_html__('Sit Amet Aliquet', 'webriti-companion'), esc_html__('Sed non massa', 'webriti-companion'), esc_html__('Velit Tempus', 'webriti-companion'));
            $icon = array('fa fa-laptop', 'fa fa-tasks', 'fa fa-thumbs-o-up', 'fa fa-life-ring');
            for ($i = 0; $i <= 3; $i++) {
                ?>
                <div class="col-md-3 col-sm-6 col-xs-12 service-box">
                    <div class="post">
                        <a href="#">
                            <div class="service-icon" style="color:<?php echo esc_attr($colors[$i]); ?>">
                                <i class="<?php echo esc_attr($icon[$i]); ?>"></i>
                            </div>
                            <div class="entry-header">
                                <h4 class="entry-title"><?php echo esc_html($title[$i]); ?></h4>
                            </div>
                        </a>
                        <div class="entry-content">
                            <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat pretium nulla, vitae molestie arcu dignissim in.', 'webriti-companion'); ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        if (!$is_callback) {
            ?>
        </div>
        <?php
    }
}}

if (function_exists('webriti_busiprof_services')) {
    $section_priority = apply_filters('busiprof_section_priority', 11, 'webriti_busiprof_services');
    add_action('busiprof_home_template_sections', 'webriti_busiprof_services', absint($section_priority));
    add_action('after_setup_theme', 'busiprof_features_register_strings', 11);
}
