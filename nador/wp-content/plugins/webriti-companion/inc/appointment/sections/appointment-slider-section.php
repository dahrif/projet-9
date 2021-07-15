<?php
/**
 * slider section for the homepage.
 */
if (!function_exists('appointment_slider')) :

    function appointment_slider() {

        $appointment_options = appointment_theme_setup_data();
        $slider_setting = wp_parse_args(get_option('appointment_options', array()), $appointment_options);
        if ($slider_setting['home_banner_enabled'] == 0) {
            $theme = wp_get_theme();
            if('Appointee'==$theme->name){
                $slider_class=' slider2';
            }
            
            ?>
            <div class="homepage-mycarousel <?php echo $slider_setting['slider_radio']; echo (isset($slider_class)) ? $slider_class : '';  ?>">
                <div id="carousel-example-generic" class="carousel slide <?php echo esc_attr($slider_setting['slider_options']); ?>" data-ride="carousel" <?php if ($slider_setting['slider_transition_delay'] != '') { ?> data-interval="<?php
                    echo esc_attr($slider_setting['slider_transition_delay']);
                }
                ?>" >
                    <!-- Indicators -->
                    <?php
                    $query_args = array();
                    if ($slider_setting['slider_radio'] == 'demo') {
                        
                        if($theme->name =='Appointment Dark'){
                            $demo_slide1=WC__PLUGIN_URL . 'inc/appointment/images/slider/appointment-dark-slide1.jpg';
                            $demo_slide2=WC__PLUGIN_URL . 'inc/appointment/images/slider/appointment-dark-slide2.jpg';
                            $demo_slide3=WC__PLUGIN_URL . 'inc/appointment/images/slider/appointment-dark-slide3.jpg';
                        }elseif($theme->name =='Appointee'){
                            $demo_slide1=WC__PLUGIN_URL . 'inc/appointment/images/slider/appointee-slide1.jpg';
                            $demo_slide2=WC__PLUGIN_URL . 'inc/appointment/images/slider/appointee-slide2.jpg';
                            $demo_slide3=WC__PLUGIN_URL . 'inc/appointment/images/slider/appointee-slide3.jpg';
                        }else{
                            $demo_slide1=WC__PLUGIN_URL . 'inc/appointment/images/slider/slide1.jpg';
                            $demo_slide2=WC__PLUGIN_URL . 'inc/appointment/images/slider/slide2.jpg';
                            $demo_slide3=WC__PLUGIN_URL . 'inc/appointment/images/slider/slide3.jpg';
                        }
                        ?>
                        <ol class="carousel-indicators" role="tablist" tabindex="0">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active" >
                                <img src="<?php echo esc_url($demo_slide1); ?>" alt="<?php esc_attr_e('image1', 'webriti-companion'); ?>">
                                <div class="container slide-caption">
                                    <div class="slide-text-bg1"><h2><?php echo esc_html__('Donec Maximus Rhoncus', 'webriti-companion'); ?></h2></div>
                                    <div class="slide-text-bg2"><span><?php echo esc_html__('In neque ex, euismod sed sagittis et, ultrices vel diam. Donec vel mattis enim vel ipsum mattis fringilla.', 'webriti-companion'); ?></span></div>	
                                    <div class="slide-btn-area-sm"><a href="#" class="slide-btn-sm"><?php echo esc_html__('Velit Quis', 'webriti-companion'); ?></a></div>		
                                </div>
                            </div>  
                            <div class="item" >
                                <img src="<?php echo esc_url($demo_slide2); ?>" alt="<?php esc_attr_e('image2', 'webriti-companion'); ?>">
                                <div class="container slide-caption">
                                    <div class="slide-text-bg1"><h2><?php echo esc_html__('Donec Maximus Rhoncus', 'webriti-companion'); ?></h2></div>
                                    <div class="slide-text-bg2"><span><?php echo esc_html__('In neque ex, euismod sed sagittis et, ultrices vel diam. Donec vel mattis enim vel ipsum mattis fringilla.', 'webriti-companion'); ?></span></div>	
                                    <div class="slide-btn-area-sm"><a href="#" class="slide-btn-sm"><?php echo esc_html__('Velit Quis', 'webriti-companion'); ?></a></div>		
                                </div>
                            </div>
                            <div class="item" >
                                <img src="<?php echo esc_url($demo_slide3); ?>" alt="<?php esc_attr_e('image3', 'webriti-companion'); ?>">
                                <div class="container slide-caption">
                                    <div class="slide-text-bg1"><h2><?php echo esc_html__('Donec Maximus Rhoncus', 'webriti-companion'); ?></h2></div>
                                    <div class="slide-text-bg2"><span><?php echo esc_html__('In neque ex, euismod sed sagittis et, ultrices vel diam. Donec vel mattis enim vel ipsum mattis fringilla.', 'webriti-companion'); ?></span></div>	
                                    <div class="slide-btn-area-sm"><a href="#" class="slide-btn-sm"><?php echo esc_html__('Velit Quis', 'webriti-companion'); ?></a></div>		
                                </div>	
                            </div>
                        </div>  
                        <!-- Controls -->
                        <ul class="carou-direction-nav">
                            <li><a class="carou-prev" href="#carousel-example-generic" data-slide="prev"></a></li>
                            <li><a class="carou-next" href="#carousel-example-generic" data-slide="next"></a></li>
                        </ul>	
                        <?php
                    } else {
                        $featured_slider_post = $slider_setting['featured_slider_post'];

                        $slider_select_category = array();

                        if (!is_array($slider_setting['slider_select_category'])) {
                            $slider_select_category = explode(',', $slider_setting['slider_select_category']);
                        } else {
                            $slider_select_category = $slider_setting['slider_select_category'];
                        }

                        $query_args = array('category__in' => $slider_select_category, 'ignore_sticky_posts' => 1, 'posts_per_page' => $featured_slider_post);

                        $t = true;

                        $the_query = new WP_Query($query_args);
                        $i = 0;
                        if ($the_query->post_count > 1):
                            ?>
                            <ol class="carousel-indicators" role="tablist" tabindex="0">
                                <?php
                                if ($the_query->have_posts()) {
                                    while ($the_query->have_posts()) {
                                        $the_query->the_post();
                                        ?>
                                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo absint($i); ?>" class="<?php
                                        if ($i == 0) {
                                            echo 'active';
                                        }
                                        ?>"></li>
                                            <?php
                                            $i++;
                                        }
                                    }
                                    ?>
                            </ol>
                    <?php endif; ?>
                        
                        <div class="carousel-inner" role="listbox">
                            <?php
                            //echo '<pre>';print_r($the_query); wp_die();
                            if ($the_query->have_posts()) {
                                while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                    ?>
                                    <div class="item <?php
                                    if ($t == true) {
                                        echo 'active';
                                    }$t = false;
                                    ?>">
                                             <?php $default_arg = array('class' => "img-responsive"); ?>
                                             <?php
                                             if (has_post_thumbnail()) {
                                                 the_post_thumbnail('', $default_arg);
                                             }
                                             if (!has_post_thumbnail()) {
                                                 ?>
                                            <img class="img-responsive" src="<?php echo esc_url(WC__PLUGIN_URL . 'inc/appointment/images/slider/no-image.jpg'); ?>">

                                            <div class="container slide-caption">
                                                <?php if ($the_query->post_title == "") { ?>
                                                    <div class="slide-text-bg1"><h2><?php the_title(); ?></h2></div>
                                                    <?php
                                                }
                                                if ($the_query->post_content == "") {
                                                    echo get_the_excerpt();
                                                }
                                                ?>
                                            </div>
                                        <?php } else {
                                            ?>
                                            <div class="container slide-caption">
                                                <?php if ($the_query->post_title == "") { ?>
                                                    <div class="slide-text-bg1"><h2><?php the_title(); ?></h2></div>
                                                    <?php
                                                }
                                                if ($the_query->post_content == "") {
                                                    echo get_the_excerpt();
                                                }
                                                ?>
                                            </div>
                                        <?php } ?>
                                    </div> 
                                    <?php
                                } wp_reset_postdata();
                            }
                            ?>  

                        </div>
                        <!-- Pagination --> 
                        <?php if ($i > 1) { ?>
                            <!-- Controls -->
                            <ul class="carou-direction-nav">
                                <li><a class="carou-prev" href="#carousel-example-generic" data-slide="prev"></a></li>
                                <li><a class="carou-next" href="#carousel-example-generic" data-slide="next"></a></li>
                            </ul>
                        <?php } ?>
                        <!-- /Pagination -->
                    </div>
                    <!-- /Slider Section -->
                    <?php
                }
                ?>
            </div>
            <div class="clearfix"></div>
            <?php
        }
    }

endif;

if (function_exists('appointment_slider')) {
    $section_priority = apply_filters('appointment_section_priority', 10, 'appointment_slider');
    add_action('appointment_sections', 'appointment_slider', absint($section_priority));
}