<?php

/* * Theme Name	: Appointment
 * Theme Core Functions and Codes
 */
/* * Includes reqired resources here* */
define('APPOINTMENT_TEMPLATE_DIR_URI', get_template_directory_uri());
define('APPOINTMENT_TEMPLATE_DIR', get_template_directory());
define('APPOINTMENT_THEME_FUNCTIONS_PATH', APPOINTMENT_TEMPLATE_DIR . '/functions');
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/scripts/script.php');
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php');
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/menu/appoinment_nav_walker.php');
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/widgets/sidebars.php');
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/widgets/appointment_info_widget.php');
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/template-tag.php');
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php');
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/font/font.php');
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/custom-style/custom-style.php');
//Customizer
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/customizer/customizer-pro-feature.php');
//require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/customizer/customizer-slider.php');
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/customizer/customizer-copyright.php');
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/customizer/customizer-header.php');
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/customizer/customizer-news.php');
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/customizer/customizer.php');
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/customizer/customizer_recommended_plugin.php');
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/customizer/customizer_theme_style.php');
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/customizer/fonts.php');
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/customizer/customizer_typography.php');

require_once APPOINTMENT_TEMPLATE_DIR . '/class-tgm-plugin-activation.php';
require_once('child_theme_compatible.php');
require_once('appointment_theme_setup_data.php');

add_action('tgmpa_register', 'appointment_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function appointment_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name' => esc_html__('Webriti Companion','appointment'),
            'slug' => 'webriti-companion',
            'required' => false,
        ),

        array(
            'name' => esc_html__('Contact Form 7','appointment'),
            'slug' => 'contact-form-7',
            'required' => false,
        ),

        array(
            'name' => esc_html__('Seo Optimized Images','appointment'),
            'slug' => 'seo-optimized-images',
            'required' => false,
        )
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id' => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
    );

    tgmpa($plugins, $config);
}

// Appointment Info Page
//require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/appointment-info/welcome-screen.php');
// Custom Category control
require( APPOINTMENT_THEME_FUNCTIONS_PATH . '/custom-controls/select/categorydrop-downcustomcontrol.php');

add_action('admin_init', 'appointment_customizer_css');

function appointment_customizer_css() {
    wp_enqueue_style('appointment-customizer-info', APPOINTMENT_TEMPLATE_DIR_URI . '/css/pro-feature.css');
}

/* Theme Setup Function */
add_action('after_setup_theme', 'appointment_setup');

function appointment_setup() {
    // Load text domain for translation-ready
    load_theme_textdomain('appointment', APPOINTMENT_TEMPLATE_DIR . '/languages');

    add_theme_support('custom-logo', array(
        'height' => 50,
        'width' => 200,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
            )
    );
    add_theme_support('post-thumbnails'); //supports featured image
    // Register primary menu
    register_nav_menu('primary', __('Primary Menu', 'appointment'));

    add_editor_style();

    //Add Theme Support Title Tag
    add_theme_support("title-tag");

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    //About Theme
    $theme = wp_get_theme(); // gets the current theme
    if ('Appointment' == $theme->name) {
        if (is_admin()) {
            require get_template_directory() . '/admin/admin-init.php';
        }
    }

    // Set the content_width with 900
    if (!isset($content_width))
        $content_width = 900;
    require_once('appointment_theme_setup_data.php');
}

add_filter('wp_get_attachment_image_attributes', function($attr) {
    if (isset($attr['class']) && 'custom-logo' === $attr['class'])
        $attr['class'] = 'custom-logo';
    return $attr;
});

add_filter('get_custom_logo', 'appointment_change_logo_class');

function appointment_change_logo_class($html) {
    $html = str_replace('custom-logo-link', 'navbar-brand', $html);
    return $html;
}

// set appointment page title
function appointment_title($title, $sep) {
    global $paged, $page;

    if (is_feed())
        return $title;
    // Add the site name.
    $title .= esc_html(get_bloginfo('name'));
    // Add the site description for the home/front page.
    $site_description = esc_html(get_bloginfo('description'));
    if ($site_description && ( is_home() || is_front_page() ))
        $title = "$title $sep $site_description";
    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2)
        $title = "$title $sep " . sprintf(__('Page', 'appointment'), max($paged, $page));
    return $title;
}

add_filter('wp_title', 'appointment_title', 10, 2);

add_filter('get_avatar', 'appointment_add_gravatar_class');

function appointment_add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='img-responsive img-circle", $class);
    return $class;
}

add_filter('get_the_excerpt', 'appointment_post_slider_excerpt');

function appointment_post_slider_excerpt($output) {
    $output = strip_tags(preg_replace(" (\[.*?\])", '', $output));
    $output = strip_shortcodes($output);
    $original_len = strlen($output);
    $output = substr($output, 0, 155);
    $len = strlen($output);
    if ($original_len > 155) {
        $output = $output;
        return '<div class="slide-text-bg2">' . '<span>' . $output . '</span>' . '</div>' .
                '<div class="slide-btn-area-sm"><a href="' . esc_url(get_permalink()) . '" class="slide-btn-sm">'
                . esc_html__("Read More", "appointment") . '</a></div>';
    } else {
        return '<div class="slide-text-bg2">' . '<span>' . $output . '</span>' . '</div>';
    }
}

function appointment_get_home_blog_excerpt() {
    global $post;
    $excerpt = get_the_content();
    $excerpt = strip_tags(preg_replace(" (\[.*?\])", '', $excerpt));
    $excerpt = strip_shortcodes($excerpt);
    $original_len = strlen($excerpt);
    $excerpt = substr($excerpt, 0, 145);
    $len = strlen($excerpt);
    if ($original_len > 275) {
        $excerpt = $excerpt;
        return $excerpt . '<div class="blog-btn-area-sm"><a href="' . esc_url(get_permalink()) . '" class="blog-btn-sm">' . esc_html__("Read More", "appointment") . '</a></div>';
    } else {
        return $excerpt;
    }
}

function appointment_after_import_setup() {

    // Menus to assign after import.
    $main_menu = get_term_by('name', 'Menu 1', 'nav_menu');

    set_theme_mod('nav_menu_locations', array(
        'primary' => $main_menu->term_id,
    ));

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title('Home');
    $blog_page_id = get_page_by_title('Blog');

    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id->ID);
    update_option('page_for_posts', $blog_page_id->ID);
}

add_action('pt-ocdi/after_import', 'appointment_after_import_setup');

if (!function_exists('wp_body_open')) {

    function wp_body_open() {
        do_action('wp_body_open');
    }

}

//Custom CSS compatibility
$appointment_options = appointment_theme_setup_data();
$appointment_current_options = wp_parse_args(get_option('appointment_options', array()), $appointment_options);
if ($appointment_current_options['webrit_custom_css'] != '' && $appointment_current_options['webrit_custom_css'] != 'nomorenow') {
    $appointment_old_custom_css = '';
    $appointment_old_custom_css .= $appointment_current_options['webrit_custom_css'];
    $appointment_old_custom_css .= (string) wp_get_custom_css(get_stylesheet());
    $appointment_current_options['webrit_custom_css'] = 'nomorenow';
    update_option('appointment_options', $appointment_current_options);
    wp_update_custom_css_post($appointment_old_custom_css, array());
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function appointment_skip_link_focus_fix() {
    // The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
    ?>
    <script>
    /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
    </script>
    <?php
}
add_action( 'wp_print_footer_scripts', 'appointment_skip_link_focus_fix' );


//Load Google Fonts For Top Bar
add_action('wp_head', 'appointment_load_google_font');
function appointment_load_google_font() { ?>
    <style type='text/css' id='appointment-top-bar-main'>
        <?php
        $st_font                    = get_theme_mod('site_title_fontfamily','Open Sans');
        $tag_font                   = get_theme_mod('tagline_title_fontfamily','Open Sans');
        $menu_font                  = get_theme_mod('menu_title_fontfamily','Open Sans');
        $submenu_font               = get_theme_mod('submenu_title_fontfamily','Open Sans');
        $banner_font                = get_theme_mod('banner_title_fontfamily','Open Sans');
        $bread_font                 = get_theme_mod('breadcrumb_title_fontfamily','Open Sans');
        $slider_title               = get_theme_mod('slider_title_fontfamily','Open Sans');
        $homepage_title             = get_theme_mod('homepage_title_fontfamily','Open Sans');
        $homepage_description       = get_theme_mod('homepage_description_fontfamily','Open Sans');
        $post_title_font            = get_theme_mod('post_title_fontfamily','Open Sans');
        $side_font                  = get_theme_mod('sidebar_fontfamily','Open Sans');
        $side_content_font          = get_theme_mod('sidebar_widget_content_fontfamily','Open Sans');
        $footer_widget_font         = get_theme_mod('footer_widget_title_fontfamily','Open Sans');
        $footer_widget_content_font = get_theme_mod('footer_widget_content_fontfamily','Open Sans');
        $h1_font                    = get_theme_mod('h1_typography_fontfamily','Open Sans');
        $h2_font                    = get_theme_mod('h2_typography_fontfamily','Open Sans');
        $h3_font                    = get_theme_mod('h3_typography_fontfamily','Open Sans');
        $h4_font                    = get_theme_mod('h4_typography_fontfamily','Open Sans');
        $h5_font                    = get_theme_mod('h5_typography_fontfamily','Open Sans');
        $h6_font                    = get_theme_mod('h6_typography_fontfamily','Open Sans');
        $p_font                     = get_theme_mod('p_typography_fontfamily','Open Sans');
        $btn_font                   = get_theme_mod('button_text_typography_fontfamily','Open Sans');
        echo "@import url('https://fonts.googleapis.com/css2?family=".$st_font.":wght@400;500;600;700;800;900&family=".$tag_font.":wght@400;500;600;700;800;900&family=".$menu_font.":wght@400;500;600;700;800;900&family=".$submenu_font.":wght@400;500;600;700;800;900&family=".$banner_font.":wght@400;500;600;700;800;900&family=".$bread_font.":wght@400;500;600;700;800;900&family=".$slider_title.":wght@400;500;600;700;800;900&family=".$homepage_title.":wght@400;500;600;700;800;900&family=".$homepage_description.":wght@400;500;600;700;800;900&family=".$post_title_font.":wght@400;500;600;700;800;900&family=".$side_font.":wght@400;500;600;700;800;900&family=".$side_content_font.":wght@400;500;600;700;800;900&family=".$footer_widget_font.":wght@400;500;600;700;800;900&family=".$h1_font.":wght@400;500;600;700;800;900&family=".$h2_font.":wght@400;500;600;700;800;900&family=".$h3_font.":wght@400;500;600;700;800;900&family=".$h4_font.":wght@400;500;600;700;800;900&family=".$h5_font.":wght@400;500;600;700;800;900&family=".$h6_font.":wght@400;500;600;700;800;900&family=".$p_font.":wght@400;500;600;700;800;900&family=".$btn_font.":wght@400;500;600;700;800;900&display=swap');"; ?>
    </style>
<?php }
