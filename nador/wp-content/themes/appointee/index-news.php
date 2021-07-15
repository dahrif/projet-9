<?php
$appointee_options = appointment_theme_setup_data();
$appointee_news_setting = wp_parse_args(get_option('appointment_options', array()), $appointee_options);
if ($appointee_news_setting['home_blog_enabled'] == 0) {
    ?>
    <div class="blog-section blog1">
        <div class="container">

            <!-- Section Title -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading-title">
                        <h2><?php echo esc_html($appointee_news_setting['blog_heading']); ?></h2>
                        <p><?php echo esc_html($appointee_news_setting['blog_description']); ?></p>
                    </div>
                </div>
            </div>
            <!-- /Section Title -->

            <div class="row rotate-list-view">
                <?php
                $appointee_category_id = array();

                if (!is_array($appointee_news_setting['blog_selected_category_id'])) {
                    $appointee_category_id = explode(',', $appointee_news_setting['blog_selected_category_id']);
                } else {
                    $appointee_category_id = $appointee_news_setting['blog_selected_category_id'];
                }

                $appointee_no_of_post = $appointee_news_setting['post_display_count'];

                $appointee_args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'category__in' => $appointee_category_id, 'posts_per_page' => $appointee_no_of_post);
                $appointee_news_query = new WP_Query($appointee_args);


                $i = 1;
                while ($appointee_news_query->have_posts()) : $appointee_news_query->the_post();

                $i = $i + 1;
                if($i % 2===0){


                    ?>
                    <div class="blog-sm-area">
                        <?php if (has_post_thumbnail()): ?>
                        <div class="col-md-4">
                            <!--<div class="media">-->
                                <div class="blog-sm-box">
                                    <?php $appointee_defalt_arg = array('class' => "img-responsive"); ?>

                                        <?php the_post_thumbnail('', $appointee_defalt_arg); ?>

                                </div>

                            <!--</div>-->
                        </div>
                        <?php endif; ?>
                        <div class="col-md-<?php echo (has_post_thumbnail()) ? '8' : '12'; ?>">
                            <div class="blog-post-sm">
                                    <?php
                                    $appointee_options = appointment_theme_setup_data();
                                    $appointee_news_setting = wp_parse_args(get_option('appointment_options', array()), $appointee_options);
                                    if ($appointee_news_setting['home_meta_section_settings'] == '') {
                                        ?>
                                        <div class="blog-post-sm">
                                            <?php esc_html_e('By', 'appointee'); ?><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html(get_the_author()); ?></a>
                                            <?php esc_html_e('Posted', 'appointee'); ?><a href="<?php echo esc_url(get_month_link(get_post_time('Y'), get_post_time('m'))); ?>">
                                                <?php echo esc_html(get_the_date()); ?></a>
                                            <?php
                                            $appointee_tag_list = get_the_tag_list();
                                            if (!empty($appointee_tag_list))

                                                ?>
                                            <div class="blog-tags-sm"><?php esc_html_e('In', 'appointee'); ?> <?php the_tags('', ', ', ''); ?></div>
                                        </div>
                                    <?php } ?>
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p><?php echo wp_kses_post(appointment_get_home_blog_excerpt()); ?></p>
                                </div>
                        </div>
                    </div>
                    <?php
                    }else{
                        ?>
                    <div class="blog-sm-area right-blog">
                        <div class="col-md-<?php echo (has_post_thumbnail()) ? '8' : '12'; ?>">
                            <div class="blog-post-sm">
                                    <?php
                                    $appointee_options = appointment_theme_setup_data();
                                    $appointee_news_setting = wp_parse_args(get_option('appointment_options', array()), $appointee_options);
                                    if ($appointee_news_setting['home_meta_section_settings'] == '') {
                                        ?>
                                        <div class="blog-post-sm">
                                            <?php esc_html_e('By', 'appointee'); ?><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html(get_the_author()); ?></a>
                                            <?php esc_html_e('Posted', 'appointee'); ?><a href="<?php echo esc_url(get_month_link(get_post_time('Y'), get_post_time('m'))); ?>">
                                                <?php echo esc_html(get_the_date()); ?></a>
                                            <?php
                                            $appointee_tag_list = get_the_tag_list();
                                            if (!empty($appointee_tag_list))

                                                ?>
                                            <div class="blog-tags-sm"><?php esc_html_e('In', 'appointee'); ?> <?php the_tags('', ', ', ''); ?></div>
                                        </div>
                                    <?php } ?>
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p><?php echo wp_kses_post(appointment_get_home_blog_excerpt()); ?></p>
                                </div>
                        </div>
                               <?php if (has_post_thumbnail()): ?>
                               <div class="col-md-4">
                            <!--<div class="media">-->
                                    <div class="blog-sm-box">
                                        <?php $appointee_defalt_arg = array('class' => "img-responsive"); ?>
                                            <?php the_post_thumbnail('', $appointee_defalt_arg); ?>
                                    </div>
                                </div>
                               <?php endif; ?>
                    </div>
                            <?php
                    }
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    <?php } ?>
</div>
