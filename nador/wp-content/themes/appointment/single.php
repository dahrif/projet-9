<?php
get_header();
get_template_part('index', 'banner');
?>
<!-- Blog Section Right Sidebar -->
<div class="page-builder" id="wrap">
    <div class="container">
        <div class="row">

            <!-- Blog Area -->
            <div class="<?php appointment_post_layout_class(); ?>" >
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        get_template_part('content', '');
                        ?>
                        <!--Blog Author-->
                        <div class="comment-title"><h3><?php esc_html_e('About the author', 'appointment'); ?></h3></div>
                        <div class="blog-author">
                            <div class="media">
                                <div class="pull-left">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 200); ?>
                                </div>
                                <div class="media-body">
                                    <h2> <?php the_author(); ?> <span> <?php
                                            $appointment_user = new WP_User(get_the_author_meta('ID'));
                                            echo esc_html($appointment_user->roles[0]);
                                            ?> </span></h2>
                                    <p><?php the_author_meta('description'); //the_author_description();    ?> </p>
                                    <ul class="blog-author-social">
                                        <?php
                                        $appointment_google_profile = get_the_author_meta('google_profile');
                                        if ($appointment_google_profile && $appointment_google_profile != '') {
                                            echo '<li class="googleplus"><a href="' . esc_url($appointment_google_profile) . '" rel="author"><i class="fa fa-google-plus"></i></a></li>';
                                        }

                                        $appointment_twitter_profile = get_the_author_meta('twitter_profile');
                                        if ($appointment_twitter_profile && $appointment_twitter_profile != '') {
                                            echo '<li class="twitter"><a href="' . esc_url($appointment_twitter_profile) . '"><i class="fa fa-twitter"></i></a></li>';
                                        }

                                        $appointment_facebook_profile = get_the_author_meta('facebook_profile');
                                        if ($appointment_facebook_profile && $appointment_facebook_profile != '') {
                                            echo '<li class="facebook"><a href="' . esc_url($appointment_facebook_profile) . '"><i class="fa fa-facebook"></i></a></li>';
                                        }

                                        $appointment_linkedin_profile = get_the_author_meta('linkedin_profile');
                                        if ($appointment_linkedin_profile && $appointment_linkedin_profile != '') {
                                            echo '<li class="linkedin"><a href="' . esc_url($appointment_linkedin_profile) . '"><i class="fa fa-linkedin"></i></a></li>';
                                        }
                                        $appointment_skype_profile = get_the_author_meta('skype_profile');
                                        if ($appointment_skype_profile && $appointment_skype_profile != '') {
                                            echo '<li class="skype"><a href="' . esc_url($appointment_skype_profile) . '"><i class="fa fa-skype"></i></a></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>	
                        </div>	
                        <!--/Blog Author-->
                        <?php
                    } comments_template('', true);
                }
                ?>	
            </div>
            <!-- /Blog Area -->			

            <!--Sidebar Area-->
            <div class="col-md-4">
                <?php get_sidebar(); ?>	
            </div>
            <!--Sidebar Area-->
        </div>
    </div>
</div>
<!-- /Blog Section Right Sidebar -->
<?php get_footer(); ?>