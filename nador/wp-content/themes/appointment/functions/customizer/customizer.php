<?php

/* * *********************** Theme Customizer with Sanitize function ******************************** */

function appointment_sanitize_fn($wp_customize) {


    if (!function_exists('appointment_select2_text_sanitization')) {

        function appointment_select2_text_sanitization($input) {
            if (strpos($input, ',') !== false) {
                $input = explode(',', $input);
            }
            if (is_array($input)) {
                foreach ($input as $key => $value) {
                    $input[$key] = sanitize_text_field($value);
                }
                $input = implode(',', $input);
            } else {
                $input = sanitize_text_field($input);
            }
            return $input;
        }

    }

    //checkbox box sanitization function
    function appointment_sanitize_checkbox($checked) {
        // Boolean check.
        return ( ( isset($checked) && true == $checked ) ? 1 : 0 );
    }

    //radio box sanitization function
    function appointment_sanitize_radio($input, $setting) {

        $input = sanitize_key($input);

        $choices = $setting->manager->get_control($setting->id)->choices;

        //return if valid 
        return ( array_key_exists($input, $choices) ? $input : $setting->default );
    }

    //select sanitization function
    function appointment_sanitize_select($input, $setting) {

        $input = sanitize_key($input);

        $choices = $setting->manager->get_control($setting->id)->choices;

        //return if valid
        return ( array_key_exists($input, $choices) ? $input : $setting->default );
    }

}

add_action('customize_register', 'appointment_sanitize_fn');
