<?php
/**
 * Portfolio section for the homepage.
 */
if (!function_exists('quality_portfolio')) :

    function quality_portfolio() {

        $quality_pro_options = companion_theme_data_setup();
        $current_theme_content = wp_parse_args(get_option('quality_pro_options', array()), $quality_pro_options);

        $current_options = get_option('quality_pro_options');
        $hide_section = isset($current_options['home_projects_enabled']) ? $current_options['home_projects_enabled'] : true;
        $quality_portfolio_title = isset($current_options['project_heading_one']) ? $current_options['project_heading_one'] : esc_html__('Vestibulum vitae tellus', 'webriti-companion');
        $quality_portfolio_subtitle = isset($current_options['project_tagline']) ? $current_options['project_tagline'] : __('Orci <b>varius</b> natoque', 'webriti-companion');
        $quality_portfolio_button_text = isset($current_options['project_button_text']) ? $current_options['project_button_text'] : esc_html__('View All Portfolios', 'webriti-companion');
        $quality_portfolio_button_link = isset($current_options['project_button_text_link']) ? $current_options['project_button_text_link'] : '#';
        if ($hide_section == true) {
            ?>

            <section id="section-portfolio" class="portfolio">
                <div class="container-fluid padding-0">
                    <?php if (($quality_portfolio_title) || ($quality_portfolio_subtitle != '' )) { ?>
                        <div class="row">
                            <div class="section-header">
                                <?php
                                if (!empty($quality_portfolio_title) || is_customize_preview()) {
                                    echo '<p>' . $quality_portfolio_title . '</9>';
                                }
                                if (!empty($quality_portfolio_subtitle) || is_customize_preview()) {
                                    echo '<h1 class="widget-title">' . $quality_portfolio_subtitle . '</h1>';
                                }
                                echo '<hr class="divider">';
                                ?>	
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row p-left-right-0">

                        <div class="col">	
                            <article class="post" id="quality_project_one">
                                <?php if ($current_theme_content['project_one_thumb']) { ?>
                                    <img src="<?php echo esc_url($current_theme_content['project_one_thumb']); ?>" />
                                <?php } ?>
                                <figcaption>
                                    <?php if ($current_theme_content['project_one_title']) { ?>
                                        <h4 class="entry-title"><a href="#"><?php echo esc_html($current_theme_content['project_one_title']) ; ?></a></h4>
                                    <?php } if ($current_theme_content['project_one_desc']) { ?>
                                        <p><?php echo esc_html($current_theme_content['project_one_desc']); ?></p>
                                    <?php } ?>
                                </figcaption><a href="<?php echo esc_url($current_theme_content['project_one_thumb']); ?>" data-lightbox="image" title="<?php echo esc_attr($current_theme_content['project_one_title']); ?>"><i class="fa fa-search "></i></a>
                            </article>
                        </div>

                        <div class="col">	
                            <article class="post" id="quality_project_two">
                                <?php if ($current_theme_content['project_two_thumb']) { ?>
                                    <img src="<?php echo esc_url($current_theme_content['project_two_thumb']); ?>" />
                                <?php } ?>
                                <figcaption>
                                    <?php if ($current_theme_content['project_two_title']) { ?>
                                        <h4 class="entry-title"><a href="#"><?php echo esc_html($current_theme_content['project_two_title']); ?></a></h4>
                                    <?php } if ($current_theme_content['project_two_desc']) { ?>
                                        <p><?php echo esc_html($current_theme_content['project_two_desc']); ?></p>
                                    <?php } ?>
                                </figcaption><a href="<?php echo esc_url($current_theme_content['project_two_thumb']); ?>" data-lightbox="image" title="<?php echo esc_attr($current_theme_content['project_two_title']); ?>"><i class="fa fa-search "></i></a>
                            </article>
                        </div>

                        <div class="col">	
                            <article class="post" id="quality_project_three">
                                <?php if ($current_theme_content['project_three_thumb']) { ?>
                                    <img src="<?php echo esc_url($current_theme_content['project_three_thumb']); ?>" />
                                <?php } ?>
                                <figcaption>
                                    <?php if ($current_theme_content['project_three_title']) { ?>
                                        <h4 class="entry-title"><a href="#"><?php echo esc_html($current_theme_content['project_three_title']); ?></a></h4>
                                    <?php } if ($current_theme_content['project_three_desc']) { ?>
                                        <p><?php echo esc_html($current_theme_content['project_three_desc']); ?></p>
                                    <?php } ?>
                                </figcaption><a href="<?php echo esc_url($current_theme_content['project_three_thumb']); ?>" data-lightbox="image" title="<?php echo esc_attr($current_theme_content['project_three_title']); ?>"><i class="fa fa-search "></i></a>
                            </article>
                        </div>

                        <div class="col">	
                            <article class="post" id="quality_project_four">
                                <?php if ($current_theme_content['project_four_thumb']) { ?>
                                    <img src="<?php echo esc_url($current_theme_content['project_four_thumb']); ?>" />
                                <?php } ?>
                                <figcaption>
                                    <?php if ($current_theme_content['project_four_title']) { ?>
                                        <h4 class="entry-title"><a href="#"><?php echo esc_html($current_theme_content['project_four_title']); ?></a></h4>
                                    <?php } ?>
                                    <p><?php echo esc_html($current_theme_content['project_four_desc']); ?></p>
                                </figcaption><a href="<?php echo esc_url($current_theme_content['project_four_thumb']); ?>" data-lightbox="image" title="<?php echo esc_attr($current_theme_content['project_four_title']); ?>"><i class="fa fa-search "></i></a>
                            </article>
                        </div>

                        <div class="col">	
                            <article class="post" id="quality_project_five">
                                <?php if ($current_theme_content['project_five_thumb']) { ?>
                                    <img src="<?php echo esc_url($current_theme_content['project_five_thumb']); ?>" />
                                <?php } ?>
                                <figcaption>
                                    <?php if ($current_theme_content['project_five_title']) { ?>
                                        <h4 class="entry-title"><a href="#"><?php echo esc_html($current_theme_content['project_five_title']); ?></a></h4>
                                    <?php }
                                    if ($current_theme_content['project_five_desc']) {
                                        ?>
                                        <p><?php echo esc_html($current_theme_content['project_five_desc']); ?></p>
            <?php } ?>
                                </figcaption><a href="<?php echo esc_url($current_theme_content['project_five_thumb']); ?>" data-lightbox="image" title="<?php echo esc_attr($current_theme_content['project_five_title']); ?>"><i class="fa fa-search "></i></a>
                            </article>
                        </div>	
                    </div>
                </div>
            </div>
            </section>
        <?php
        }
    }

endif;

if (function_exists('quality_portfolio')) {
    $section_priority = apply_filters('quality_section_priority', 12, 'quality_portfolio');
    add_action('quality_sections', 'quality_portfolio', absint($section_priority));
}

function companion_theme_data_setup() {
    return $theme_options = array(
        //Projects Section Settings

        'project_one_thumb' => WC__PLUGIN_URL . 'inc/quality/images/portfolio/home-port1.jpg',
        'project_one_title' => esc_html__('Cras tempus', 'webriti-companion'),
        'project_two_thumb' => WC__PLUGIN_URL . 'inc/quality/images/portfolio/home-port2.jpg',
        'project_two_title' => esc_html__('Cras tempus', 'webriti-companion'),
        'project_three_thumb' => WC__PLUGIN_URL . 'inc/quality/images/portfolio/home-port3.jpg',
        'project_three_title' => esc_html__('Cras tempus', 'webriti-companion'),
        'project_four_thumb' => WC__PLUGIN_URL . 'inc/quality/images/portfolio/home-port4.jpg',
        'project_four_title' => esc_html__('Cras tempus', 'webriti-companion'),
        'project_five_thumb' => WC__PLUGIN_URL . 'inc/quality/images/portfolio/home-port5.jpg',
        'project_five_title' => esc_html__('Cras tempus', 'webriti-companion'),
        'project_one_desc' => esc_html__('Nunc, Placerat', 'webriti-companion'),
        'project_two_desc' => esc_html__('Nunc, Placerat', 'webriti-companion'),
        'project_three_desc' => esc_html__('Nunc, Placerat', 'webriti-companion'),
        'project_four_desc' => esc_html__('Nunc, Placerat', 'webriti-companion'),
        'project_five_desc' => esc_html__('Nunc, Placerat', 'webriti-companion'),
    );
}