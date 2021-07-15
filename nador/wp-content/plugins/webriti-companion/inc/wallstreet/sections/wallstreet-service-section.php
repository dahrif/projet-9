<?php
/**
 * Service section for the homepage.
 */
if (!function_exists('wallstreet_service_section')) :

    function wallstreet_service_section() {
        $theme = wp_get_theme();
        if ($theme->name == 'Bluestreet') {
            $service_child_setting = wp_parse_args(get_option('wallstreet_pro_options', array()), bluestreet_theme_data_setup());
            @$service_child_type = $service_child_setting['service_box_layout_setting'];
        } elseif ($theme->name == 'Leo' && version_compare(wp_get_theme()->get('Version'), '1.2.7') > 0 ) {
            $service_child_setting = wp_parse_args(get_option('wallstreet_pro_options', array()), leo_theme_data_setup());
            $service_child_type = $service_child_setting['service_slide_layout_setting'];
        } else {
            $service_child_setting = '';
            $service_child_type ='';
        }
        $wallstreet_pro_options = wallstreet_theme_data_setup();
        $current_options = wp_parse_args(get_option('wallstreet_pro_options', array()), $wallstreet_pro_options);
        if ($current_options['service_image_one'] == 'service1') {
            $current_options['service_image_one'] = WC__PLUGIN_URL . 'inc/wallstreet/images/service/service-4.png';
        }
        if ($current_options['service_image_two'] == 'service2') {
            $current_options['service_image_two'] = WC__PLUGIN_URL . 'inc/wallstreet/images/service/service-2.png';
        }
        if ($current_options['service_image_three'] == 'service3') {
            $current_options['service_image_three'] = WC__PLUGIN_URL . 'inc/wallstreet/images/service/service-3.png';
        }
        if ($current_options['service_section_enabled'] == true) {
            ?>
            <!-- wallstreet Service Section ---->
            <div class="service-section">
                <div class="container">
                    <div class="row">
                        <div class="section_heading_title">
                            <?php if ($current_options['service_title']) { ?>
                                <h1><?php echo esc_html($current_options['service_title']); ?></h1>
                                <div class="pagetitle-separator">
                                    <div class="pagetitle-separator-border">
                                        <div class="pagetitle-separator-box"></div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($current_options['service_description']) { ?>
                                <p><?php echo esc_html($current_options['service_description']); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                    if ($theme->name == 'Bluestreet' && version_compare(wp_get_theme()->get('Version'), '1.2.7') > 0 && $service_child_type == 'box') {
                        $service_row_class = 'service-section service3';
                    } elseif ($theme->name == 'Leo' && version_compare(wp_get_theme()->get('Version'), '1.2.7') > 0 && $service_child_type == 'slide') {
                        $service_row_class = 'service-section service2';
                    } elseif ($theme->name == 'Wallstreet Agency' ) {
                        $service_row_class = 'service-section service5';
                    } else {
                        $service_row_class = '';
                    }
                    ?>
                    <div class="row <?php echo $service_row_class; ?>">
                        <?php
                        $service_title_array = array($current_options['service_title_one'], $current_options['service_title_two'], $current_options['service_title_three']);
                        $service_description_array = array($current_options['service_description_one'], $current_options['service_description_two'], $current_options['service_description_three']);
                        $service_image_array = array($current_options['service_image_one'], $current_options['service_image_two'], $current_options['service_image_three']);
                        $i = 0;
                        for ($i = 0; $i < 3; $i++) {
                            if ($service_image_array[$i] || $service_title_array[$i] || $service_description_array[$i]) {
                                if ($service_child_type!='default' && $theme->name == 'Leo' && version_compare(wp_get_theme()->get('Version'), '1.2.4') > 0 || $service_child_type!='default' && $theme->name == 'Bluestreet' && version_compare(wp_get_theme()->get('Version'), '1.2.7') > 0 || $service_child_type =='default' && $theme->name == 'Wallstreet Agency' ) {?>

                                            <div class="col-md-4 col-sm-6">
                                                <div class="service-effect">
                                                    <?php if (!empty($service_image_array[$i])) { ?>
                                                        <div class="service-box">
                                                            <img class="img-responsive service-box-image" alt="<?php echo esc_attr($service_title_array[$i]); ?>" src="<?php echo esc_url($service_image_array[$i]); ?>">
                                                        </div>
                                                    <?php } ?>
                                                    <div class="service-area">
                                                        <?php if ($service_title_array[$i]) { ?>
                                                            <h2><a href="#"><?php echo esc_html($service_title_array[$i]); ?></a></h2>
                                                        <?php } ?>
                                                        <?php if ($service_description_array[$i]) { ?>
                                                            <p><?php echo esc_html($service_description_array[$i]); ?></p>
                                                        <?php } ?>
                                                    </div><!-- / service-area -->
                                                </div>
                                            </div> <!-- / service-effect column -->
                                    <?php
                                } else {
                                    ?>
                                    <div class="col-md-4 col-sm-6 <?php
                                    if($theme->name != 'Wallstreet Agency'){
                                      if ($current_options['service_section_animation_enabled'] == true ) {
                                          echo "service-effect";
                                      } else {
                                          echo "stop-service-effect";
                                      }
                                    }
                                    ?>">
                                    <?php
                                    if (($theme->name == 'Wallstreet Agency') && ($current_options['service_section_animation_enabled'] == true) ) {
                                        echo '<div class="service-effect">';
                                    } elseif (($theme->name == 'Wallstreet Agency') && ($current_options['service_section_animation_enabled'] == false) ) {
                                        echo '<div class="stop-service-effect">';
                                    }
                                    if (!empty($service_image_array[$i])) { ?>
                                            <div class="service-box">
                                                <img class="img-responsive service-box-image" alt="<?php echo esc_attr($service_title_array[$i]); ?>" src="<?php echo esc_url($service_image_array[$i]); ?>">
                                            </div>
                                        <?php } ?>
                                        <div class="service-area">
                                            <?php if ($service_title_array[$i]) { ?>
                                                <h2><a href="#"><?php echo esc_html($service_title_array[$i]); ?></a></h2>
                                            <?php } ?>
                                            <?php if ($service_description_array[$i]) { ?>
                                                <p><?php echo esc_html($service_description_array[$i]); ?></p>
                                            <?php } ?>
                                        </div><!-- / service-area -->
                                        <?php if ($theme->name == 'Wallstreet Agency') {
                                            echo '</div>';
                                        }?>
                                    </div> <!-- / service-effect column -->
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }

endif;

if (function_exists('wallstreet_service_section')) {
    $section_priority = apply_filters('wallstreet_section_priority', 11, 'wallstreet_service_section');
    add_action('wallstreet_sections', 'wallstreet_service_section', absint($section_priority));
}
