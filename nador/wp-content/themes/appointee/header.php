<!DOCTYPE html>
<html <?php language_attributes(); ?> >
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        $appointee_options = appointment_theme_setup_data();
        $appointee_header_setting = wp_parse_args(get_option('appointment_options', array()), $appointee_options);

         if ( is_singular() && pings_open( get_queried_object() ) ) :
             echo '<link rel="pingback" href=" '.esc_url(get_bloginfo( 'pingback_url' )).' ">';
         endif;
        wp_head();?>
    </head>
    <body <?php body_class(); ?> >

        <?php wp_body_open(); ?>
        <a class="skip-link screen-reader-text" href="#wrap"><?php esc_html_e('Skip to content', 'appointee'); ?></a>
        <div class="header">
        <?php if (is_active_sidebar('home-header-sidebar_left') || is_active_sidebar('home-header-sidebar_center') || is_active_sidebar('home-header-sidebar_right')) { ?>
            <section class="top-header-widget">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div id="top-header-sidebar-left">
                                <?php if (is_active_sidebar('home-header-sidebar_left')) { ?>
                                    <?php dynamic_sidebar('home-header-sidebar_left'); ?>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <div id="top-header-sidebar-right">
                                <?php if (is_active_sidebar('home-header-sidebar_right')) { ?>
                                    <?php dynamic_sidebar('home-header-sidebar_right'); ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>


        <div class="container-fluid navbar8">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">

                    <?php
                    if (!has_custom_logo() && $appointee_header_setting['enable_header_logo_text'] != 'nomorenow') {
                        $appointee_logo = $appointee_header_setting['upload_image_logo'];
                        $appointee_logo_id = attachment_url_to_postid($appointee_logo);
                        $appointee_logo_alt = get_post_meta($appointee_logo_id, '_wp_attachment_image_alt', true);
                        $appointee_logo_title = get_the_title($appointee_logo_id);

                        if ($appointee_header_setting['enable_header_logo_text'] == 1) {
                            echo "<div class=appointment_title_head>" . esc_html(get_bloginfo()) . "</div>";
                        } if ($appointee_header_setting['enable_header_logo_text'] == '' && $appointee_logo != '') {
                            ?>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home" >
                                <img class="img-responsive" src="<?php echo esc_url($appointee_logo); ?>" style="height:50px; width:200px;" alt="<?php
                                if (!empty($appointee_logo_alt)) {
                                    echo esc_attr($appointee_logo_alt);
                                } else {
                                    echo esc_attr(get_bloginfo('name'));
                                }
                                ?>"/></a>

                            <?php
                        }
                    } else {
                        if ($appointee_header_setting['enable_header_logo_text'] != 'nomorenow') {
                            $appointee_header_setting['enable_header_logo_text'] = 'nomorenow';
                            update_option('appointment_options', $appointee_header_setting);
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
                        $appointee_description = get_bloginfo('description', 'display');
                        if ($appointee_description || is_customize_preview()) : ?>
                            <p class="site-description"><?php echo $appointee_description; ?></p>
                        <?php endif; ?>
                    </div>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only"><?php esc_html_e('Toggle navigation', 'appointee'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <?php
               $appointee_header_social_setting = wp_parse_args(get_option('appointment_options', array()), appointee_default_data());
                $appointee_header_facebook = $appointee_header_social_setting['social_media_facebook_link'];
                $appointee_header_twitter = $appointee_header_social_setting['social_media_twitter_link'];
                $appointee_header_linkdin = $appointee_header_social_setting['social_media_linkedin_link'];

                $appointee_header_social = '<ul id="%1$s" class="%2$s">%3$s';
                if ($appointee_header_social_setting['header_social_media_enabled'] == 0) {
                    $appointee_header_social .= '<ul class="head-contact-social">';

                    if ($appointee_header_social_setting['social_media_facebook_link'] != '') {
                        $appointee_header_social .= '<li class="facebook"><a href="' . esc_url($appointee_header_facebook) . '"';
                        if ($appointee_header_social_setting['facebook_media_enabled'] == 1) {
                            $appointee_header_social .= 'target="_blank"';
                        }
                        $appointee_header_social .= '><i class="fa fa-facebook"></i></a></li>';
                    }
                    if ($appointee_header_social_setting['social_media_twitter_link'] != '') {
                        $appointee_header_social .= '<li class="twitter"><a href="' . esc_url($appointee_header_twitter) . '"';
                        if ($appointee_header_social_setting['twitter_media_enabled'] == 1) {
                            $appointee_header_social .= 'target="_blank"';
                        }
                        $appointee_header_social .= '><i class="fa fa-twitter"></i></a></li>';
                    }
                    if ($appointee_header_social_setting['social_media_linkedin_link'] != '') {
                        $appointee_header_social .= '<li class="linkedin"><a href="' . esc_url($appointee_header_linkdin) . '"';
                        if ($appointee_header_social_setting['linkedin_media_enabled'] == 1) {
                            $appointee_header_social .= 'target="_blank"';
                        }
                        $appointee_header_social .= '><i class="fa fa-linkedin"></i></a></li>';
                    }
                    $appointee_header_social .= '</ul>';
                }
                $appointee_header_social .= '</ul>';
                ?>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => '',
                        'menu_class' => 'nav navbar-nav navbar-right',
                        'fallback_cb' => 'appointment_fallback_page_menu',
                        'items_wrap' => $appointee_header_social,
                        'walker' => new appointment_nav_walker()
                    ));
                    ?>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        </div>
        </div>
        <div class="clearfix"></div>
