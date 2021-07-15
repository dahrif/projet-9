<?php

// Register and load the widget
function appointee_info_header_widget() {
    register_widget('Appointee_header_info_widget');
}

add_action('widgets_init', 'appointee_info_header_widget');

// Creating the widget
class Appointee_header_info_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'appointee_info_header_widget', // Base ID
                esc_html__('WBR : Header Widget', 'appointee'), // Widget Name
                array(
                    'classname' => 'Appointee_header_info_widget',
                    'description' => 'Header Info widget.',
                ),
                array(
                    'width' => 600,
                )
        );
    }

    public function widget($args, $instance) {

        echo $args['before_widget'];

        if ($args['id'] == 'sidebar_primary') {
            $instance['before_title'] = '<div class="sm-widget-title wow fadeInDown animated" data-wow-delay="0.4s"><h3>';
            $instance['before_title'] = '</h3></div><div class="sm-sidebar-widget wow fadeInDown animated" data-wow-delay="0.4s">';

            echo $args['before_title'] . '<i class="fa ' . esc_attr($instance['fa_icon']) . '"></i>' . $args['after_title'];
        }
        ?>
        <ul class="header-contact-info">
            <li>
                <?php if (!empty($instance['fa_icon'])) { ?>
                    <i class="fa <?php echo esc_attr($instance['fa_icon']); ?>"></i>
                <?php } ?>
                <?php if (!empty($instance['link'])) { ?>
                    <a href="<?php echo esc_url($instance['link']); ?>" <?php echo ($instance['target'] ? 'target="_blank"' : ''); ?> >
                        <?php if (!empty($instance['description'])) { ?>
                            <?php echo wp_kses_post($instance['description']); ?>
                        </a>
                    <?php
                    }
                } else {
                    if (isset($instance['description'])) {
                        echo wp_kses_post($instance['description']);
                    }
                }
                ?>
            </li>
        </ul>
        <?php
        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance) {

        if (isset($instance['fa_icon'])) {
            $fa_icon = $instance['fa_icon'];
        } else {
            $fa_icon = 'fa fa-phone';
        }

        if (isset($instance['description'])) {
            $description = $instance['description'];
        } else {
            $description = __('Lorem ipsum: 9-999-999-9999', 'appointee');
        }

        if (isset($instance['link'])) {
            $link = $instance['link'];
        } else {
            $link = '';
        }

        if (isset($instance['target'])) {
            $target = $instance['target'];
        } else {
            $target = false;
        }

        // Widget admin form
        ?>

        <h4 for="<?php echo esc_attr($this->get_field_id('fa_icon')); ?>"><?php esc_html__('Font Awesome Icon', 'appointee'); ?></h4>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('fa_icon')); ?>" name="<?php echo esc_attr($this->get_field_name('fa_icon')); ?>" type="text" value="<?php if ($fa_icon) echo esc_attr($fa_icon);
        else esc_attr_e('fa fa-phone', 'appointee'); ?>" />
        <span><?php esc_html_e('Find all icons', 'appointee');
        echo " "; ?><a href="<?php echo esc_url('http://fortawesome.github.io/Font-Awesome/icons/'); ?>" target="_blank" ><?php esc_html_e('here', 'appointee'); ?></a></span>

        <h4 for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Description', 'appointee'); ?></h4>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" type="text" value="<?php if ($description) echo esc_attr(htmlspecialchars_decode($description));
        else _e('Lorem ipsum: 9-999-999-9999', 'appointee'); ?>" /><br><br>

        <h4 for="<?php echo esc_attr($this->get_field_id('link')); ?>"><?php esc_html_e('Link', 'appointee'); ?></h4>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="text" value="<?php if ($link) echo esc_url($link);
        else echo ''; ?>" /><br><br>

        <h4 for="<?php echo esc_attr($this->get_field_id('target')); ?>"><?php esc_html_e('Open link in new tab', 'appointee'); ?></h4>
        <input type="checkbox" class="widefat" id="<?php echo esc_attr($this->get_field_id('target')); ?>" name="<?php echo esc_attr($this->get_field_name('target')); ?>" <?php if ($target != false) echo 'checked'; ?> /><br><br>


        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {

        $instance = array();
        $instance['fa_icon'] = (!empty($new_instance['fa_icon']) ) ? appointee_sanitize_text($new_instance['fa_icon']) : '';
        $instance['description'] = (!empty($new_instance['description']) ) ? appointee_sanitize_text($new_instance['description']) : '';
        $instance['link'] = (!empty($new_instance['link']) ) ? esc_url_raw($new_instance['link']) : '';
        $instance['target'] = (!empty($new_instance['target']) ) ? appointee_sanitize_checkbox($new_instance['target']) : '';

        return $instance;
    }

}
