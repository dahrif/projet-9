<?php
// Typography
$appointment_enable_header_typography        = get_theme_mod('enable_header_typography',false);
$appointment_enable_banner_typography        = get_theme_mod('enable_banner_typography',false);
$appointment_enable_slider_typography        = get_theme_mod('enable_slider_typography',false);
$appointment_enable_homepage_typography      = get_theme_mod('enable_homepage_typography',false);
$appointment_enable_content_typography       = get_theme_mod('enable_content_typography',false);
$appointment_enable_post_typography          = get_theme_mod('enable_post_typography',false);
$appointment_enable_sidebar_typography       = get_theme_mod('enable_sidebar_typography',false);
$appointment_enable_footer_widget_typography = get_theme_mod('enable_footer_widget_typography',false);


/* Site title and tagline */
if($appointment_enable_header_typography == true)
{ ?>
		<style>
		body .site-title .navbar-brand, body .site-branding-text .site-title {
				font-size:<?php echo esc_html(get_theme_mod('site_title_fontsize','32')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('site_title_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('site_title_line_height','25')).'px'; ?>;
		}
		body .site-description {
				font-size:<?php echo esc_html(get_theme_mod('tagline_title_fontsize','15')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('tagline_title_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('tagline_line_height','25')).'px'; ?>;
		}
		body .navbar-default .navbar-nav > li > a {
				font-size:<?php echo esc_html(get_theme_mod('menu_title_fontsize','14')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('menu_title_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('menu_line_height','25')).'px'; ?>;
		}
		body .dropdown-menu li a {
				font-size:<?php echo esc_html(get_theme_mod('submenu_title_fontsize','14')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('submenu_title_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('submenu_line_height','25')).'px'; ?>;
		}
		</style>
<?php }

/* Breadcrumb Section */
if($appointment_enable_banner_typography == true)
{ ?>
		<style>
		body .page-title h1 {
				font-size:<?php echo esc_html(get_theme_mod('banner_title_fontsize','36')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('banner_title_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('banner_line_height','25')).'px'; ?>;
		}
		body .page-breadcrumb a, body .page-breadcrumb span, body .page-breadcrumb li {
				font-size:<?php echo esc_html(get_theme_mod('breadcrumb_title_fontsize','15')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('breadcrumb_title_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('breadcrumb_line_height','25')).'px'; ?>;
		}
		</style>
<?php }

/* Slider Section */
if($appointment_enable_slider_typography == true)
{ ?>
		<style>
		body .slide-text-bg1 h2 {
				font-size:<?php echo esc_html(get_theme_mod('slider_title_fontsize','30')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('slider_title_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('slider_line_height','40')).'px'; ?>;
		}
		</style>
<?php }


/* Homepage Sections title and description */
if($appointment_enable_homepage_typography == true)
{ ?>
		<style>
		body .section-heading-title h1, body .section-heading-title h2, body .callout-section h2, body .footer-section-heading-title h2 {
				font-size:<?php echo esc_html(get_theme_mod('homepage_title_fontsize','36')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('homepage_title_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('homepage_title_line_height','40')).'px'; ?>;
		}
		body .section-heading-title p, body .callout-section p {
				font-size:<?php echo esc_html(get_theme_mod('homepage_description_fontsize','15')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('homepage_description_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('homepage_description_line_height','25')).'px'; ?>;
		}
		</style>
<?php }


/* Headings (h1,h2, h3, h4,h5, h6), paragraph and button */
if($appointment_enable_content_typography == true)
{ ?>
		<style>
		/* Heading H1 */
		body.page-template-fullwidth .page-builder .blog-lg-area-left h1, body.page-template-default .page-builder .blog-lg-area-left h1, body .page-builder .blog-content h1, body #blog-masonry .item .blog-lg-area-left h1  {
				font-size:<?php echo esc_html(get_theme_mod('h1_typography_fontsize','36')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('h1_typography_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('h1_line_height','40')).'px'; ?>;
		}
		/* Heading H2 */
		body.page-template-fullwidth .page-builder .blog-lg-area-left h2, body.page-template-default .page-builder .blog-lg-area-left h2, body .page-builder .blog-content h2, body .blog-author h2, body #blog-masonry .item .blog-lg-area-left h2  {
				font-size:<?php echo esc_html(get_theme_mod('h2_typography_fontsize','30')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('h2_typography_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('h2_line_height','35')).'px'; ?>;
		}
		/* Heading H3 */
		body.page-template-fullwidth .page-builder .blog-lg-area-left h3, body.page-template-default .page-builder .blog-lg-area-left h3, body .page-builder .blog-content h3, body .service-area h3, body .blog-sm-area h3, body .comment-title h3, body .contact-title h3, body #blog-masonry .item .blog-lg-area-left h3  {
				font-size:<?php echo esc_html(get_theme_mod('h3_typography_fontsize','24')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('h3_typography_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('h3_line_height','30')).'px'; ?>;
		}
		/* Heading H4 */
		body.page-template-fullwidth .page-builder .blog-lg-area-left h4, body.page-template-default .page-builder .blog-lg-area-left h4, body .page-builder .blog-content h4, body .contact-area h4, body .comment-detail-title, body .footer-contact-area h4, body #blog-masonry .item .blog-lg-area-left h4  {
				font-size:<?php echo esc_html(get_theme_mod('h4_typography_fontsize','20')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('h4_typography_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('h4_line_height','25')).'px'; ?>;
		}
		/* Heading H5 */
		body.page-template-fullwidth .page-builder .blog-lg-area-left h5, body.page-template-default .page-builder .blog-lg-area-left h5, body .page-builder .blog-content h5, body #blog-masonry .item .blog-lg-area-left h5  {
				font-size:<?php echo esc_html(get_theme_mod('h5_typography_fontsize','16')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('h5_typography_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('h5_line_height','20')).'px'; ?>;
		}
		/* Heading H6 */
		body.page-template-fullwidth .page-builder .blog-lg-area-left h6, body.page-template-default .page-builder .blog-lg-area-left h6, body .page-builder .blog-content h6, body .contact-area h6, body .footer-contact-area h6, body #blog-masonry .item .blog-lg-area-left h6  {
				font-size:<?php echo esc_html(get_theme_mod('h6_typography_fontsize','14')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('h6_typography_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('h6_line_height','20')).'px'; ?>;
		}
		/* Paragraph */
		body .page-builder .blog-lg-area-left p, body .service-area p, body .slide-text-bg2 span, body .blog-sm-area p, body .comment-detail p, body .comment-form-section p  {
				font-size:<?php echo esc_html(get_theme_mod('p_typography_fontsize','15')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('p_typography_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('p_line_height','25')).'px'; ?>;
		}
		/* Button text */
		body .page-builder .blog-lg-area-left .wp-block-button__link, body .slide-btn-sm, body .callout-btn1, body .callout-btn2, body .blog-btn-sm, body a.more-link, body input[type="submit"]  {
				font-size:<?php echo esc_html(get_theme_mod('button_text_typography_fontsize','16')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('button_text_typography_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('button_line_height','25')).'px'; ?>;
		}
		</style>
<?php }


/* Blog Page/Archive/Single Post */
if($appointment_enable_post_typography == true)
{ ?>
		<style>
		body .blog-lg-area-left h3.blog-title, body .blog-lg-area-left h3.blog-single-title, body .blog-lg-area-right h3, body .blog-lg-area-full h3, body #blog-masonry .item .blog-lg-area-left h3.blog-masonry  {
				font-size:<?php echo esc_html(get_theme_mod('post_title_fontsize','27')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('post_title_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('post_title_line_height','25')).'px'; ?>;
		}
		</style>
<?php }

/* Blog Page/Archive/Single Post */
if($appointment_enable_sidebar_typography == true)
{ ?>
		<style>
		body .sidebar-widget-title h3  {
				font-size:<?php echo esc_html(get_theme_mod('sidebar_fontsize','24')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('sidebar_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('sidebar_line_height','25')).'px'; ?>;
		}
		body .sidebar-widget p, body .sidebar-widget ul li, body .sidebar-widget ol li, body .sidebar-widget a,body .sidebar-widget .search_widget_input, body .sidebar-widget .wp-calendar-table, body .sidebar-widget > ul > li > a, body .sidebar-widget address  {
				font-size:<?php echo esc_html(get_theme_mod('sidebar_widget_content_fontsize','15')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('sidebar_widget_content_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('sidebar_widget_content_line_height','25')).'px'; ?>;
		}
		</style>
<?php }

/* Blog Page/Archive/Single Post */
if($appointment_enable_footer_widget_typography == true)
{ ?>
		<style>
		body .footer-widget-title  {
				font-size:<?php echo esc_html(get_theme_mod('footer_widget_title_fontsize','24')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('footer_widget_title_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('footer_widget_title_line_height','25')).'px'; ?>;
		}
		body .footer-section p, body .footer-section ul li, body .footer-section ol li, body .footer-section a, body .footer-section .footer-section, body .footer-section .wp-calendar-table, body .footer-section address  {
				font-size:<?php echo esc_html(get_theme_mod('footer_widget_content_fontsize','15')).'px'; ?>;
				font-family:<?php echo esc_html(get_theme_mod('footer_widget_content_fontfamily','Open Sans')); ?>;
				line-height: <?php echo esc_html(get_theme_mod('footer_widget_content_line_height','25')).'px'; ?>;
		}
		</style>
<?php }
