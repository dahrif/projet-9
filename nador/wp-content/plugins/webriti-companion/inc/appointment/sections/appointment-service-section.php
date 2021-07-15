<?php
if (!function_exists('appointment_services')) :

    function appointment_services() {
        $theme = wp_get_theme();
        $appointment_options = appointment_theme_setup_data();
        $service_setting = wp_parse_args(get_option('appointment_options', array()), $appointment_options);

        if($theme->name =='Appointment Red'){
            $appointment_child_default_data=appointment_red_default_data();
            $service_child_setting = wp_parse_args(get_option('appointment_options', array()), $appointment_child_default_data);
        }
        elseif($theme->name =='Shk Corporate'){
            $appointment_child_default_data=shk_corporate_default_data();
            $service_child_setting = wp_parse_args(get_option('appointment_options', array()), $appointment_child_default_data);
        }
        elseif($theme->name =='Appointment Green'){
            $appointment_child_default_data=appointment_green_default_data();
            $service_child_setting = wp_parse_args(get_option('appointment_options', array()), $appointment_child_default_data);
        }
        elseif($theme->name =='Appointment Blue'){
            $appointment_child_default_data=appointment_blue_default_data();
            $service_child_setting = wp_parse_args(get_option('appointment_options', array()), $appointment_child_default_data);
        }
        //print_r($service_child_setting);
        if ($service_setting['service_section_enabled'] == 0) {
            if($theme->name == 'Appointment'){ $servicestyle='Service-section';}
            else if($theme->name =='Shk Corporate' && $service_child_setting['service_blink_layout_setting']=='blink' ){ $servicestyle='service-section1';}
            else if($theme->name =='Appointment Blue' && $service_child_setting['service_slide_layout_setting']=='slide'){ $servicestyle='service-section2';} 
            else if($theme->name =='Appointment Red' && $service_child_setting['service_layout_setting']=='box' ){ $servicestyle='service-section3';}
            else if($theme->name =='Appointment Green' && $service_child_setting['service_rotate_layout_section']=='rotate'){ $servicestyle='Service-section service6';}
            else if($theme->name =='Appointment Dark'){ $servicestyle='service-section2';} 
            else if($theme->name =='Appointee'){ $servicestyle='Service-section service7';} 
            else{
                $servicestyle='Service-section';
            }
            ?>
            <div class="<?php echo $servicestyle; ?>">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12">

                            <div class="section-heading-title">
                                <h1> <?php echo wp_kses_post($service_setting['service_title']); ?></h1>
                                <p><?php echo wp_kses_post($service_setting['service_description']); ?> </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <?php if($service_setting['service_one_icon'] || $service_setting['service_one_title'] || $service_setting['service_one_description']){ ?>
                        <div class="col-md-4">
                            <div class="service-area">
                                <div class="media">
                                    <?php if($service_setting['service_one_icon']):?>
                                    <div class="service-icon">
                                        <i class="fa <?php echo esc_attr($service_setting['service_one_icon']); ?>"></i>
                                    </div>
                                    <?php endif;
                                    if($service_setting['service_one_title'] || $service_setting['service_one_description']):?>
                                    <div class="media-body">
                                        <h3><?php echo wp_kses_post($service_setting['service_one_title']); ?></h3>
                                        <p><?php echo wp_kses_post($service_setting['service_one_description']); ?></p>
                                    </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    <?php }
                    if($service_setting['service_two_icon'] || $service_setting['service_two_title'] || $service_setting['service_two_description']){?> 
                        <div class="col-md-4">
                            <div class="service-area">
                                <div class="media">
                                    <?php if($service_setting['service_two_icon']):?>
                                    <div class="service-icon">
                                        <i class="fa <?php echo esc_attr($service_setting['service_two_icon']); ?>"></i>
                                    </div>
                                    <?php endif;
                                    if($service_setting['service_two_title'] || $service_setting['service_two_description']):?>
                                    <div class="media-body">
                                        <h3><?php echo wp_kses_post($service_setting['service_two_title']); ?></h3>
                                        <p><?php echo wp_kses_post($service_setting['service_two_description']); ?></p>
                                    </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    <?php }
                    if($service_setting['service_three_icon'] || $service_setting['service_three_title'] || $service_setting['service_three_description']){?>
                        <div class="col-md-4">
                            <div class="service-area">
                                <div class="media">
                                    <?php if($service_setting['service_three_icon']):?>
                                    <div class="service-icon">
                                        <i class="fa <?php echo esc_attr($service_setting['service_three_icon']); ?>"></i>
                                    </div>
                                    <?php endif;
                                    if($service_setting['service_three_title'] || $service_setting['service_three_description']):?>
                                    <div class="media-body">
                                        <h3><?php echo wp_kses_post($service_setting['service_three_title']); ?></h3>
                                        <p><?php echo wp_kses_post($service_setting['service_three_description']); ?></p>
                                    </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    <?php }
                    if($service_setting['service_four_icon'] || $service_setting['service_four_title'] || $service_setting['service_four_description']){?>
                        <div class="col-md-4">
                            <div class="service-area">
                                <div class="media">
                                    <?php if($service_setting['service_four_icon']):?>
                                    <div class="service-icon">
                                        <i class="fa <?php echo esc_attr($service_setting['service_four_icon']); ?>"></i>
                                    </div>
                                    <?php endif;
                                    if($service_setting['service_four_title'] || $service_setting['service_four_description']):?>
                                    <div class="media-body">
                                        <h3><?php echo wp_kses_post($service_setting['service_four_title']); ?></h3>
                                        <p><?php echo wp_kses_post($service_setting['service_four_description']); ?></p>
                                    </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    <?php }
                    if($service_setting['service_five_icon'] || $service_setting['service_five_title'] || $service_setting['service_five_description']){?>
                        <div class="col-md-4">
                            <div class="service-area">
                                <div class="media">
                                    <?php if($service_setting['service_five_icon']):?>
                                    <div class="service-icon">
                                        <i class="fa <?php echo esc_attr($service_setting['service_five_icon']); ?>"></i>
                                    </div>
                                    <?php endif;
                                    if($service_setting['service_five_title'] || $service_setting['service_five_description']):?>
                                    <div class="media-body">
                                        <h3><?php echo wp_kses_post($service_setting['service_five_title']); ?></h3>
                                        <p><?php echo wp_kses_post($service_setting['service_five_description']); ?></p>
                                    </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    <?php }
                    if($service_setting['service_six_icon'] || $service_setting['service_six_title'] || $service_setting['service_six_description']){?>
                        <div class="col-md-4">
                            <div class="service-area">
                                <div class="media">
                                    <?php if($service_setting['service_six_icon']):?>
                                    <div class="service-icon">
                                        <i class="fa <?php echo esc_attr($service_setting['service_six_icon']); ?>"></i>
                                    </div>
                                    <?php endif;
                                    if($service_setting['service_six_title'] || $service_setting['service_six_description']):?>
                                    <div class="media-body">
                                        <h3><?php echo wp_kses_post($service_setting['service_six_title']); ?></h3>
                                        <p><?php echo wp_kses_post($service_setting['service_six_description']); ?></p>
                                    </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- /HomePage Service Section -->
            <?php
        }
    }

endif;

if (function_exists('appointment_services')) {
    $section_priority = apply_filters('appointment_section_priority', 12, 'appointment_services');
    add_action('appointment_sections', 'appointment_services', absint($section_priority));
}