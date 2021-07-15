<?php
/**
 * Services section for the homepage.
 */
if (!function_exists('quality_features')) :

    function quality_features() {


        $current_options = get_option('quality_pro_options');
        $hide_section = isset($current_options['service_enable']) ? $current_options['service_enable'] : true;

        $quality_service_title = isset($current_options['service_title']) ? $current_options['service_title'] : esc_html__('Nam suscipit libero', 'webriti-companion');
        $quality_service_subtitle = isset($current_options['service_description']) ? $current_options['service_description'] : __('Curabitur <b>lacinia</b> tellus', 'webriti-companion');
        $quality_service_content = !empty($current_options['quality_service_content']) ? $current_options['quality_service_content'] : quality_get_service_default();
        $section_is_empty = empty($quality_service_content) && empty($quality_service_subtitle) && empty($quality_service_title);

//        Add class to service div based on child theme
        function quality_service_section_html_class($type) {
            $theme = wp_get_theme();

            if($theme->name =='Quality orange'){
                $service_child_setting = wp_parse_args(get_option('quality_pro_options', array()), quality_orange_default_data());
            }
            elseif($theme->name =='Quality green'){
                $service_child_setting = wp_parse_args(get_option('quality_pro_options', array()), quality_green_default_data());
            }
            elseif($theme->name =='Quality blue'){
                $service_child_setting = wp_parse_args(get_option('quality_pro_options', array()), quality_blue_default_data());
            }
            elseif($theme->name =='Heroic'){
                $service_child_setting = wp_parse_args(get_option('quality_pro_options', array()), heroic_default_data());
            }else{
                $service_child_setting = wp_parse_args(get_option('quality_pro_options', array()), quality_theme_data_setup());
            }

            $themeName = $theme->name;
            if ($type == 'sectionClass') {
                $serviceSectionClass = '';
                if ($themeName == 'Quality') {
                    $serviceSectionClass = '';
                } else if ($themeName == 'Quality blue' && $service_child_setting['service_blink_layout_setting']=='blink') {
                    $serviceSectionClass = 'service-2';
                } else if ($themeName == 'Heroic' && $service_child_setting['service_slide_layout_setting']=='slide') {
                    $serviceSectionClass = 'service-two';
                } else if ($themeName == 'Quality green' && $service_child_setting['service_box_layout_setting']=='box') {
                    $serviceSectionClass = 'service-5';
                } else if ($themeName == 'Quality orange' && $service_child_setting['service_rotate_layout_setting']=='rotate') {
                    $serviceSectionClass = 'service-4';
                }
                echo $serviceSectionClass;
            } elseif ($type == 'articleClass') {
                if ($themeName == 'Quality' ||($themeName == 'Quality blue') || $themeName == 'Quality green' || $themeName == 'Quality orange' && $service_child_setting['service_rotate_layout_setting']=='default' || $themeName == 'Heroic' && $service_child_setting['service_slide_layout_setting']=='default') {
                    $serviceArticleClass = 'text-center';
                } else if ($themeName == 'Heroic' && $service_child_setting['service_slide_layout_setting']=='slide' || $themeName == 'Quality orange' && $service_child_setting['service_rotate_layout_setting']=='rotate') {
                    $serviceArticleClass = '';
                }else{
                    echo $serviceArticleClass='text-center';
                }
            }
        }

        add_filter('serviceSection', 'quality_service_section_html_class', '', 1);

        //        Add div wrapper for specific child theme
        function quality_div_service_wrapper_fn($type, $class) {
            $theme = wp_get_theme();
            $themeName = $theme->name;
            $openDiv = '';
            if ($type == 'open' && $themeName == 'Quality orange' && $class == 'media') {
                $openDiv = '<div class="media">';
            } elseif ($type == 'close' && $themeName == 'Quality orange' && $class == 'media') {
                $openDiv = '</div>';
            } elseif ($type == 'open' && $themeName == 'Quality orange' && $class == 'media-body') {
                $openDiv = '<div class="media-body">';
            } elseif ($type == 'close' && $themeName == 'Quality orange' && $class == 'media-body') {
                $openDiv = '</div>';
            }
            echo $openDiv;
        }

        add_filter('quality_div_service_wrapper', 'quality_div_service_wrapper_fn', '', 2);

        if ($hide_section == true) {
            ?>
            <section id="section-block" class="service <?php apply_filters('serviceSection', 'sectionClass'); ?>">

                <div class="container">
                    <?php if (($quality_service_title) || ($quality_service_subtitle != '' )) { ?>
                        <div class="row">
                            <div class="section-header">
                                <?php
                                if (!empty($quality_service_title) || is_customize_preview()) {
                                    echo '<p>' . $quality_service_title . '</p>';
                                }

                                if (!empty($quality_service_subtitle) || is_customize_preview()) {
                                    echo '<h1 class="widget-title">' . $quality_service_subtitle . '</h1>';
                                }
                                echo '<hr class="divider">';
                                ?>
                            </div>	 
                        </div>
                        <?php
                    }
                    quality_service_content($quality_service_content);
                    ?>
                </div>
            </section>
            <?php
        }
    }

endif;

function quality_service_content($quality_service_content, $is_callback = false) {
    if (!$is_callback) {
        ?>
        <div id="service_content_section">
            <div class="row">
                <?php
            }
            if (!empty($quality_service_content)) :

                $quality_service_content = json_decode($quality_service_content);
                if (!empty($quality_service_content)) {
                    $i = 1;
                    foreach ($quality_service_content as $service_item) :
                        $icon = !empty($service_item->icon_value) ? $service_item->icon_value : '';
                        $image = !empty($service_item->image_url) ? $service_item->image_url : '';
                        $title = !empty($service_item->title) ? $service_item->title : '';
                        $text = !empty($service_item->text) ? $service_item->text : '';
                        $link = !empty($service_item->link) ? $service_item->link : '';
                        $color = !empty($service_item->color) ? $service_item->color : '';
                        $open_new_tab = !empty($service_item->open_new_tab) ? $service_item->open_new_tab : 'no';

                        if (!isset($service_item->choice)) {
                            $service_item->choice = 'customizer_repeater_icon';
                        }
                        ?>
                        <?php if (!empty($icon) || !empty($image) || !empty($title) || !empty($text) || !empty($link) || !empty($color)): ?>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <!--<div class="service_area">-->
                                <article class="post <?php apply_filters('serviceSection', 'articleClass'); ?>">

                                    <?php
                                    //                                            Quality green layout wrapper
                                    apply_filters('quality_div_service_wrapper', 'open', 'media');

                                    if ($service_item->choice == 'customizer_repeater_image') {
                                        ?>
                                        <?php if (!empty($image)) :
                                            ?>



                                            <figure class="post-thumbnail"> 
                                                <?php if (!empty($link)) : ?>
                                                    <a href="<?php echo esc_url($link); ?>" <?php
                                                    if ($open_new_tab == 'yes' || $open_new_tab == 'on') {
                                                        echo "target='_blank'";
                                                    }
                                                    ?>>
                                                        <img class="img-responsive" src="<?php echo esc_url($image); ?>" <?php if (!empty($title)) : ?> alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" <?php endif; ?> />
                                                    </a>
                                                <?php endif; ?>	
                                                <?php if (empty($link)) : ?>	
                                                    <img class="img-responsive" src="<?php echo esc_url($image); ?>" <?php if (!empty($title)) : ?> alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" <?php endif; ?> />
                                                <?php endif; ?>	
                                            </figure>								
                                        <?php endif; ?>
                                    <?php } else if ($service_item->choice == 'customizer_repeater_icon') { ?>
                                        <?php if (!empty($icon)) : ?>
                                            <figure class="post-thumbnail">
                                                <?php if (!empty($link)) : ?>
                                                    <a href="<?php echo esc_url($link); ?>" <?php
                                                    if ($open_new_tab == 'yes' || $open_new_tab == 'on') {
                                                        echo "target='_blank'";
                                                    }
                                                    ?>><i class="fa <?php echo esc_attr($icon); ?>"></i></a>
                                                   <?php endif; ?>
                                                   <?php if (empty($link)) : ?>
                                                    <i class="fa <?php echo esc_attr($icon); ?>"></i>	
                                                <?php endif; ?>
                                            </figure>
                                        <?php endif; ?>
                                    <?php } ?>


                                    <?php
                                    if (!empty($title)) :

                                        apply_filters('quality_div_service_wrapper', 'open', 'media-body');

                                        if (empty($link)) {
                                            ?>
                                            <div class="entry-header">
                                                <h3 class="entry-title"><?php echo esc_html($title); ?></h3></div><?php
                                        } else {
                                            ?>
                                            <div class="entry-header">
                                                <h3 class="entry-title"><a href="<?php echo esc_url($link); ?>" <?php if ($open_new_tab != 'no') { ?>target="_blank" <?php } ?> ><?php echo esc_html($title); ?></a></h3></div><?php
                                        }
                                        ?>
                                    <?php endif; ?>

                                    <?php if (!empty($text)) : ?>
                                        <div class="entry-content"><p><?php echo wp_kses_post(html_entity_decode($text)); ?></p></div>
                                                <?php
                                            endif;

                                            apply_filters('quality_div_service_wrapper', 'close', 'media-body');

                                            apply_filters('quality_div_service_wrapper', 'close', 'media');
                                            ?>
                                </article>
                            </div>	
                            <?php
                        endif;
                    endforeach;
                    echo '</div>';
                }// End if().
            endif;
            if (!$is_callback) {
                ?>
            </div></div>	
        <?php
    }
}

/**
 * Get default values for service section.
 *
 * @since 1.1.31
 * @access public
 */
function quality_get_service_default() {

    $old_theme_servives = wp_parse_args(get_option('quality_pro_options', array()), plugin_data_setup());

    //if(get_option( 'quality_pro_options')!=''){
    if ($old_theme_servives['service_one_icon'] != '' || $old_theme_servives['service_one_title'] != '' || $old_theme_servives['service_one_text'] != '' || $old_theme_servives['service_two_icon'] != '' || $old_theme_servives['service_two_title'] != '' || $old_theme_servives['service_two_text'] != '' || $old_theme_servives['service_three_icon'] != '' || $old_theme_servives['service_three_title'] != '' || $old_theme_servives['service_three_text'] != '' || $old_theme_servives['service_four_icon'] != '' || $old_theme_servives['service_four_title'] != '' || $old_theme_servives['service_four_text'] != '' || $old_theme_servives['service_five_icon'] != '' || $old_theme_servives['service_five_title'] != '' || $old_theme_servives['service_five_text'] != '' || $old_theme_servives['service_six_icon'] != '' || $old_theme_servives['service_six_title'] != '' || $old_theme_servives['service_six_text'] != '') {
        //$old_theme_servives = get_option( 'quality_pro_options');

        return apply_filters(
                'quality_service_default_content', json_encode(
                        array(
                            array(
                                'icon_value' => isset($old_theme_servives['service_one_icon']) ? $old_theme_servives['service_one_icon'] : '',
                                'title' => isset($old_theme_servives['service_one_title']) ? $old_theme_servives['service_one_title'] : '',
                                'text' => isset($old_theme_servives['service_one_text']) ? $old_theme_servives['service_one_text'] : '',
                                'choice' => 'customizer_repeater_icon',
                                'link' => '',
                                'open_new_tab' => 'no',
                            ),
                            array(
                                'icon_value' => isset($old_theme_servives['service_two_icon']) ? $old_theme_servives['service_two_icon'] : '',
                                'title' => isset($old_theme_servives['service_two_title']) ? $old_theme_servives['service_two_title'] : '',
                                'text' => isset($old_theme_servives['service_two_text']) ? $old_theme_servives['service_two_text'] : '',
                                'choice' => 'customizer_repeater_icon',
                                'link' => '',
                                'open_new_tab' => 'no',
                            ),
                            array(
                                'icon_value' => isset($old_theme_servives['service_three_icon']) ? $old_theme_servives['service_three_icon'] : '',
                                'title' => isset($old_theme_servives['service_three_title']) ? $old_theme_servives['service_three_title'] : '',
                                'text' => isset($old_theme_servives['service_three_text']) ? $old_theme_servives['service_three_text'] : '',
                                'choice' => 'customizer_repeater_icon',
                                'link' => '',
                                'open_new_tab' => 'no',
                            ),
                            array(
                                'icon_value' => isset($old_theme_servives['service_four_icon']) ? $old_theme_servives['service_four_icon'] : '',
                                'title' => isset($old_theme_servives['service_four_title']) ? $old_theme_servives['service_four_title'] : '',
                                'text' => isset($old_theme_servives['service_four_text']) ? $old_theme_servives['service_four_text'] : '',
                                'choice' => 'customizer_repeater_icon',
                                'link' => '',
                                'open_new_tab' => 'no',
                            ),
                            array(
                                'icon_value' => isset($old_theme_servives['service_five_icon']) ? $old_theme_servives['service_five_icon'] : '',
                                'title' => isset($old_theme_servives['service_five_title']) ? $old_theme_servives['service_five_title'] : '',
                                'text' => isset($old_theme_servives['service_five_text']) ? $old_theme_servives['service_five_text'] : '',
                                'choice' => 'customizer_repeater_icon',
                                'link' => '',
                                'open_new_tab' => 'no',
                            ),
                            array(
                                'icon_value' => isset($old_theme_servives['service_six_icon']) ? $old_theme_servives['service_six_icon'] : '',
                                'title' => isset($old_theme_servives['service_six_title']) ? $old_theme_servives['service_six_title'] : '',
                                'text' => isset($old_theme_servives['service_six_text']) ? $old_theme_servives['service_six_text'] : '',
                                'choice' => 'customizer_repeater_icon',
                                'link' => '',
                                'open_new_tab' => 'no',
                            ),
                        )
                )
        );
    }
    //}
    else {
        return apply_filters(
                'quality_service_default_content', json_encode(
                        array(
                            array(
                                'icon_value' => 'fa fa-cogs txt-pink',
                                'title' => esc_html__('Donec tristique', 'webriti-companion'),
                                'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'quality'),
                                'choice' => 'customizer_repeater_icon',
                                'link' => '#',
                                'open_new_tab' => 'no',
                            ),
                            array(
                                'icon_value' => 'fa fa-mobile txt-pink',
                                'title' => esc_html__('Donec tristique', 'webriti-companion'),
                                'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'quality'),
                                'link' => '#',
                                'choice' => 'customizer_repeater_icon',
                                'open_new_tab' => 'no',
                            ),
                            array(
                                'icon_value' => 'fa fa-users txt-pink',
                                'title' => esc_html__('Donec tristique', 'webriti-companion'),
                                'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'quality'),
                                'choice' => 'customizer_repeater_icon',
                                'link' => '#',
                                'open_new_tab' => 'no',
                            ),
                            array(
                                'icon_value' => 'fa fa-laptop txt-pink',
                                'title' => esc_html__('Donec tristique', 'webriti-companion'),
                                'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'quality'),
                                'choice' => 'customizer_repeater_icon',
                                'link' => '#',
                                'open_new_tab' => 'no',
                            ),
                            array(
                                'icon_value' => 'fa fa-file-code-o txt-pink',
                                'title' => esc_html__('Donec tristique', 'webriti-companion'),
                                'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'quality'),
                                'choice' => 'customizer_repeater_icon',
                                'link' => '#',
                                'open_new_tab' => 'no',
                            ),
                            array(
                                'icon_value' => 'fa fa-star-half-full txt-pink',
                                'title' => esc_html__('Donec tristique', 'webriti-companion'),
                                'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'quality'),
                                'choice' => 'customizer_repeater_icon',
                                'link' => '#',
                                'open_new_tab' => 'no',
                            ),
                        )
                )
        );
    }
}

if (function_exists('quality_features')) {
    $section_priority = apply_filters('quality_section_priority', 10, 'quality_features');
    add_action('quality_sections', 'quality_features', absint($section_priority));
}

function plugin_data_setup() {

    return $theme_options = array(
        'service_one_title' => esc_html__('Donec tristique', 'webriti-companion'),
        'service_two_title' => esc_html__('Donec tristique', 'webriti-companion'),
        'service_three_title' => esc_html__('Donec tristique', 'webriti-companion'),
        'service_four_title' => esc_html__('Donec tristique', 'webriti-companion'),
        'service_five_title' => esc_html__('Donec tristique', 'webriti-companion'),
        'service_six_title' => esc_html__('Donec tristique', 'webriti-companion'),
        'service_one_icon' => 'fa fa-cogs txt-pink',
        'service_two_icon' => 'fa fa-mobile txt-pink',
        'service_three_icon' => 'fa fa-users txt-pink',
        'service_four_icon' => 'fa fa-laptop txt-pink',
        'service_five_icon' => 'fa fa-file-code-o txt-pink',
        'service_six_icon' => 'fa fa-star-half-full txt-pink',
        'service_one_text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'quality'),
        'service_two_text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'quality'),
        'service_three_text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'quality'),
        'service_four_text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'quality'),
        'service_five_text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'quality'),
        'service_six_text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed dosit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.', 'quality'),
    );
}