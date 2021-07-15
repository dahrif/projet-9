<?php
if (!class_exists('WP_Customize_Control')) {
    return null;
}

class webriti_companion_image_radio_button extends WP_Customize_Control {

    /**
     * The type of control being rendered
     */
    public $type = 'image_radio_button';

    /**
     * Enqueue our scripts and styles
     */
    public function enqueue() {
        wp_enqueue_style('webriti-companion-radio-image-button-custom-controls', WC__PLUGIN_URL . 'inc/controls/Image_radio_Button/css/customizer.css');
    }

    /**
     * Render the control in the customizer
     */
    public function render_content() {
        ?>
        <div class="image_radio_button_control">
            <?php if (!empty($this->label)) { ?>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php } ?>
            <?php if (!empty($this->description)) { ?>
                <span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
            <?php } ?>

            <?php foreach ($this->choices as $key => $value) { ?>
                <label class="radio-button-label">
                    <input type="radio" name="<?php echo esc_attr($this->id); ?>" value="<?php echo esc_attr($key); ?>" <?php $this->link(); ?> <?php checked(esc_attr($key), $this->value()); ?>/>
                    <img src="<?php echo esc_attr($value['image']); ?>" alt="<?php echo esc_attr($value['name']); ?>" title="<?php echo esc_attr($value['name']); ?>" />
                </label>
            <?php } ?>
        </div>
        <?php
    }

}

if (!function_exists('webriti_companion_image_radio_button_sanitization')) {

    function webriti_companion_image_radio_button_sanitization($input, $setting) {
        //get the list of possible radio box or select options
        $choices = $setting->manager->get_control($setting->id)->choices;

        if (array_key_exists($input, $choices)) {
            return $input;
        } else {
            return $setting->default;
        }
    }

}