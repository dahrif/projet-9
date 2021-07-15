<?php
/**
 * Portfolio section for the homepage.
 */
if (!function_exists('appointment_homecallout')) :

    function appointment_homecallout() {

        $appointment_options = appointment_theme_setup_data();
        $callout_setting = wp_parse_args(get_option('appointment_options', array()), $appointment_options);
        if ($callout_setting['home_call_out_area_enabled'] == 0) {
        $imgURL = $callout_setting['callout_background'];
        if($imgURL==""){
            $imgURL=WC__PLUGIN_URL . 'inc/appointment/images/homecallout/callout-bg.jpg';
        }
            if ($imgURL != '') {
                ?>
                <div class="callout-section" style="background-image:url('<?php echo esc_url($imgURL); ?>'); background-repeat: no-repeat; background-position: top left; background-attachment: fixed;">
                <?php
                } else {
                    ?>
                    <div class="callout-section" style="background-color:#ccc;">
                    <?php } ?>
                    <div class="overlay">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">

                                    <h2><?php echo wp_kses_post($callout_setting['home_call_out_title']); ?></h2>
                                    <p><?php echo wp_kses_post($callout_setting['home_call_out_description']); ?></p>

                                    <div class="btn-area">
                                        <a href="<?php echo esc_url($callout_setting['home_call_out_btn1_link']); ?>" <?php if ($callout_setting['home_call_out_btn1_link_target'] == 1) {
                echo "target='_blank'";
            } ?> class="callout-btn1"><?php echo wp_kses_post($callout_setting['home_call_out_btn1_text']);
            ?></a>


                                        <a href="<?php echo esc_url($callout_setting['home_call_out_btn2_link']); ?>" <?php if ($callout_setting['home_call_out_btn2_link_target'] == 1) {
                echo "target='_blank'";
            } ?> class="callout-btn2"><?php echo wp_kses_post($callout_setting['home_call_out_btn2_text']); ?></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- /Callout Section -->
                <div class="clearfix"></div>
            <?php
            }
        }

    endif;

    if (function_exists('appointment_homecallout')) {
        $section_priority = apply_filters('appointment_section_priority', 13, 'appointment_homecallout');
        add_action('appointment_sections', 'appointment_homecallout', absint($section_priority));
    }
