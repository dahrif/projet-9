<?php
$appointment_options = appointment_theme_setup_data();
$appointment_news_setting = wp_parse_args(get_option('appointment_options', array()), $appointment_options);
if ($appointment_news_setting['home_blog_enabled'] == 0) {
    ?>
    <div class="blog-section">
        <div class="container">

            <!-- Section Title -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading-title">
                        <h2><?php echo esc_html($appointment_news_setting['blog_heading']); ?></h2>
                        <p><?php echo esc_html($appointment_news_setting['blog_description']); ?></p>
                    </div>
                </div>
            </div>
            <!-- /Section Title -->

            <div class="row">
                <?php
                $appointment_category_id = array();

                if (!is_array($appointment_news_setting['blog_selected_category_id'])) {
                    $appointment_category_id = explode(',', $appointment_news_setting['blog_selected_category_id']);
                } else {
                    $appointment_category_id = $appointment_news_setting['blog_selected_category_id'];
                }

                $appointment_no_of_post = $appointment_news_setting['post_display_count'];

                $appointment_args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'category__in' => $appointment_category_id, 'posts_per_page' => $appointment_no_of_post);
                $appointment_news_query = new WP_Query($appointment_args);


                $i = 1;
                while ($appointment_news_query->have_posts()) : $appointment_news_query->the_post();
                    ?>
                    <div class="col-md-6">
                        <div class="blog-sm-area">
                            <div class="media">
                                <div class="blog-sm-box">
                                    <?php $appointment_defalt_arg = array('class' => "img-responsive"); ?>
                                    <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('', $appointment_defalt_arg); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="media-body">
                                    <?php
                                    $appointment_options = appointment_theme_setup_data();
                                    $appointment_news_setting = wp_parse_args(get_option('appointment_options', array()), $appointment_options);
                                    if ($appointment_news_setting['home_meta_section_settings'] == '') {
                                        ?>
                                        <div class="blog-post-sm">
                                            <?php esc_html_e('By', 'appointment'); ?><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html(get_the_author()); ?></a>
                                            <a href="<?php echo esc_url(get_month_link(get_post_time('Y'), get_post_time('m'))); ?>">
                                                <?php echo esc_html(get_the_date()); ?></a>
                                            <?php
                                            $appointment_tag_list = get_the_tag_list();
                                            if (!empty($appointment_tag_list))

                                                ?>
                                            <div class="blog-tags-sm"><?php the_tags('', ', ', ''); ?></div>
                                        </div>
                                    <?php } ?>
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p><?php echo appointment_get_home_blog_excerpt(); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($i == 2) {
                        echo '<div class="clearfix"></div>';
                        $i = 0;
                    }$i++;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    <?php } ?>
</div>
