<!-- Footer Section -->
<?php
$appointment_options = appointment_theme_setup_data();
$appointment_footer_setting = wp_parse_args(get_option('appointment_options', array()), $appointment_options);
if (is_active_sidebar('footer-widget-area')) {
    ?>
    <div class="footer-section">
        <div class="container">	
            <div class="row footer-widget-section">
                <?php
                dynamic_sidebar('footer-widget-area');
            }
            ?>	
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- /Footer Section -->
<div class="clearfix"></div>
<!-- Footer Copyright Section -->
<div class="footer-copyright-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="footer-copyright">
                    <?php if ($appointment_footer_setting['footer_menu_bar_enabled'] == 0) { ?>
                        <?php echo wp_kses_post($appointment_footer_setting['footer_copyright_text']); ?>
                    <?php } // end if    ?>
                </div>
            </div>
            <?php
            if ($appointment_footer_setting['footer_social_media_enabled'] == 0) {
                $appointment_footer_facebook = $appointment_footer_setting['footer_social_media_facebook_link'];
                $appointment_footer_twitter = $appointment_footer_setting['footer_social_media_twitter_link'];
                $appointment_footer_linkdin = $appointment_footer_setting['footer_social_media_linkedin_link'];
                $appointment_footer_skype = $appointment_footer_setting['footer_social_media_skype_link'];
                if($appointment_footer_facebook !='' || $appointment_footer_twitter!='' || $appointment_footer_linkdin!='' || $appointment_footer_skype !=''){?>
                <div class="col-md-4">
                    <ul class="footer-contact-social">
                        <?php if ($appointment_footer_setting['footer_social_media_facebook_link'] != '') { ?>
                            <li class="facebook"><a href="<?php echo esc_url($appointment_footer_facebook); ?>" <?php
                                if ($appointment_footer_setting['footer_facebook_media_enabled'] == 1) {
                                    echo "target='_blank'";
                                }
                                ?> ><i class="fa fa-facebook"></i></a></li>
                                                <?php } if ($appointment_footer_setting['footer_social_media_twitter_link'] != '') { ?>
                            <li class="twitter"><a href="<?php echo esc_url($appointment_footer_twitter); ?>" <?php
                                if ($appointment_footer_setting['footer_twitter_media_enabled'] == 1) {
                                    echo "target='_blank'";
                                }
                                ?> ><i class="fa fa-twitter"></i></a></li>
                                               <?php } if ($appointment_footer_setting['footer_social_media_linkedin_link'] != '') { ?>
                            <li class="linkedin"><a href="<?php echo esc_url($appointment_footer_linkdin); ?>" <?php
                                if ($appointment_footer_setting['footer_linkedin_media_enabled'] == 1) {
                                    echo "target='_blank'";
                                }
                                ?> ><i class="fa fa-linkedin"></i></a></li>
                                                <?php } if ($appointment_footer_setting['footer_social_media_skype_link'] != '') { ?>
                            <li class="skype"><a href="<?php echo esc_url($appointment_footer_skype); ?>" <?php
                                if ($appointment_footer_setting['footer_skype_media_enabled'] == 1) {
                                    echo "target='_blank'";
                                }
                                ?> ><i class="fa fa-skype"></i></a></li>
                                             <?php } ?>
                    </ul>
                </div>
            <?php }
            } ?>
        </div>
    </div>
</div>
<!-- /Footer Copyright Section -->
<!--Scroll To Top--> 
<a href="#" class="hc_scrollup"><i class="fa fa-chevron-up"></i></a>
<!--/Scroll To Top--> 
<?php wp_footer(); ?>
</body>
</html>