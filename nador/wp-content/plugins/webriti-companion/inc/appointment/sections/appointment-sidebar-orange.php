<?php
/**
 * Portfolio section for the homepage.
 */
if (!function_exists('appointment_sidebar_orange')) :

    function appointment_sidebar_orange() {

        if (is_active_sidebar('home-orange-sidebar_left') || is_active_sidebar('home-orange-sidebar_center') || is_active_sidebar('home-orange-sidebar_right')) :
            ?>
            <div class="top-contact-detail-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <?php
                            if (is_active_sidebar('home-orange-sidebar_left')) :
                                if (function_exists('dynamic_sidebar')) :
                                    dynamic_sidebar('home-orange-sidebar_left');
                                endif;
                            endif;
                            ?>
                        </div>

                        <div class="col-md-4">
                            <?php
                            if (is_active_sidebar('home-orange-sidebar_center')) :
                                if (function_exists('dynamic_sidebar')) :
                                    dynamic_sidebar('home-orange-sidebar_center');
                                endif;
                            endif;
                            ?>
                        </div>

                        <div class="col-md-4">
                            <?php
                            if (is_active_sidebar('home-orange-sidebar_right')) :
                                if (function_exists('dynamic_sidebar')) :
                                    dynamic_sidebar('home-orange-sidebar_right');
                                endif;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <?php
        endif;
    }

endif;

if (function_exists('appointment_sidebar_orange')) {
    $section_priority = apply_filters('appointment_section_priority', 11, 'appointment_sidebar_orange');
    add_action('appointment_sections', 'appointment_sidebar_orange', absint($section_priority));
}	