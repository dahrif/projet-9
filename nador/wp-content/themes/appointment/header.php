<!DOCTYPE html>
<html <?php language_attributes(); ?> >
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        $appointment_options = appointment_theme_setup_data();
        $appointment_header_setting = wp_parse_args(get_option('appointment_options', array()), $appointment_options);

        if ( is_singular() && pings_open( get_queried_object() ) ) :
           echo '<link rel="pingback" href=" '.esc_url(get_bloginfo( 'pingback_url' )).' ">';
        endif;
        ?>
        <?php wp_head(); ?>

    </head>
    <body <?php body_class(); ?> >

        <?php wp_body_open(); ?>
        <a class="skip-link screen-reader-text" href="#wrap"><?php esc_html_e('Skip to content', 'appointment'); ?></a>
        <!--Logo & Menu Section-->
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">

                    <?php
                    if (!has_custom_logo() && $appointment_header_setting['enable_header_logo_text'] != 'nomorenow') {
                        $appointment_logo = $appointment_header_setting['upload_image_logo'];
                        $appointment_logo_id = attachment_url_to_postid($appointment_logo);
                        $appointment_logo_alt = get_post_meta($appointment_logo_id, '_wp_attachment_image_alt', true);
                        $appointment_logo_title = get_the_title($appointment_logo_id);

                        if ($appointment_header_setting['enable_header_logo_text'] == 1) {
                            echo "<div class=appointment_title_head>" . esc_html(get_bloginfo()) . "</div>";
                        } if ($appointment_header_setting['enable_header_logo_text'] == '' && $appointment_logo != '') {
                            ?>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home" >
                                <img class="img-responsive" src="<?php echo esc_url($appointment_logo); ?>" style="height:50px; width:200px;" alt="<?php
                    if (!empty($appointment_logo_alt)) {
                        echo esc_attr($appointment_logo_alt);
                    } else {
                        echo esc_attr(get_bloginfo('name'));
                    }
                            ?>"/></a>

                            <?php
                        }
                    } else {
                        if ($appointment_header_setting['enable_header_logo_text'] != 'nomorenow') {
                            $appointment_header_setting['enable_header_logo_text'] = 'nomorenow';
                            update_option('appointment_options', $appointment_header_setting);
                        }

                        the_custom_logo();
                        ?>

                    <?php } ?>
                    <div class="site-branding-text logo-link-url">

                        <h2 class="site-title" style="margin: 0px;" ><a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home" >

                                <div class=appointment_title_head>
                                    <?php bloginfo('name'); ?>
                                </div>
                            </a>
                        </h2>

                        <?php
                        $appointment_description = get_bloginfo('description', 'display');
                        if ($appointment_description || is_customize_preview()) :
                            ?>
                            <p class="site-description"><?php echo $appointment_description; ?></p>
                        <?php endif; ?>
                    </div>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only"><?php esc_html_e('Toggle navigation', 'appointment'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <?php
                $appointment_header_facebook = $appointment_header_setting['social_media_facebook_link'];
                $appointment_header_twitter = $appointment_header_setting['social_media_twitter_link'];
                $appointment_header_linkdin = $appointment_header_setting['social_media_linkedin_link'];
                $appointment_header_social = '<ul id="%1$s" class="%2$s">%3$s';
                    if ($appointment_header_setting['header_social_media_enabled'] == 0) {
                        if($appointment_header_facebook !='' || $appointment_header_twitter!='' || $appointment_header_linkdin!=''){

                            $appointment_header_social .= '<ul class="head-contact-social">';

                            if ($appointment_header_setting['social_media_facebook_link'] != '') {
                                $appointment_header_social .= '<li class="facebook"><a href="' . esc_url($appointment_header_facebook) . '"';
                                if ($appointment_header_setting['facebook_media_enabled'] == 1) {
                                    $appointment_header_social .= 'target="_blank"';
                                }
                                $appointment_header_social .= '><i class="fa fa-facebook"></i></a></li>';
                            }
                            if ($appointment_header_setting['social_media_twitter_link'] != '') {
                                $appointment_header_social .= '<li class="twitter"><a href="' . esc_url($appointment_header_twitter) . '"';
                                if ($appointment_header_setting['twitter_media_enabled'] == 1) {
                                    $appointment_header_social .= 'target="_blank"';
                                }
                                $appointment_header_social .= '><i class="fa fa-twitter"></i></a></li>';
                            }
                            if ($appointment_header_setting['social_media_linkedin_link'] != '') {
                                $appointment_header_social .= '<li class="linkedin"><a href="' . esc_url($appointment_header_linkdin) . '"';
                                if ($appointment_header_setting['linkedin_media_enabled'] == 1) {
                                    $appointment_header_social .= 'target="_blank"';
                                }
                                $appointment_header_social .= '><i class="fa fa-linkedin"></i></a></li>';
                            }
                            $appointment_header_social .= '</ul>';
                        }
                    }
                    $appointment_header_social .= '</ul>';
                ?>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => '',
                        'menu_class' => 'nav navbar-nav navbar-right',
                        'fallback_cb' => 'appointment_fallback_page_menu',
                        'items_wrap' => $appointment_header_social,
                        'walker' => new appointment_nav_walker()
                    ));
                    ?>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!--/Logo & Menu Section-->
        <div class="clearfix"></div>
