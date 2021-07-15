<?php
function appointment_custom_light() {
	$appointment_options = theme_setup_data();
	$current_options = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
	$link_color = esc_html($current_options['link_color']);
	list($r, $g, $b) = sscanf($link_color, "#%02x%02x%02x");
	$r = $r - 50;
	$g = $g - 25;
	$b = $b - 40;

	if ( $link_color != '#ff0000' ) :
	?>
		<style type="text/css">
			/* Menus */
			body .navbar .navbar-nav > .open > a, body .navbar .navbar-nav > .open > a:hover, body .navbar .navbar-nav > .open > a:focus, body .navbar .navbar-nav > li > a:hover, body .navbar .navbar-nav > li > a:focus, body .navbar-default.navbar6 .navbar-nav > .active > a, body .navbar-default.navbar6 .navbar-nav > .active > a:hover, body .navbar-default.navbar6 .navbar-nav > .active > a:focus, body .navbar.navbar6 .navbar-nav > .active.open > a, body .navbar.navbar6 .navbar-nav > .active.open > a:hover, body .navbar.navbar6 .navbar-nav > .active.open > a:focus {
				color: <?php echo $link_color; ?>;
			}
			body .navbar .navbar-nav > .active > a, body .navbar .navbar-nav > .active > a:hover, body .navbar .navbar-nav > .active > a:focus, body .dropdown-menu, body .dropdown-menu .active > a, body .dropdown-menu .active > a:hover, body .dropdown-menu .active > a:focus, body .navbar-default .navbar-nav > .active > a, body .navbar-default .navbar-nav > .active > a:hover, body .navbar-default .navbar-nav > .active > a:focus {
			    background-color: <?php echo $link_color; ?>;
			}
			body .navbar-default {
			    background-color: transparent;
			}
			@media (max-width: 767px) {
				body .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, body .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
				    /* color: #fff; */
						background-color: transparent;
				 }
				 body .navbar-default .navbar-nav .open .dropdown-menu > li > a {
				      color: #fff;
				 }
			}
			body .dropdown-menu > li > a,body .nav .open.dropdown-submenu >  a ,body .nav .open.dropdown-submenu > a:hover, body .nav .open.dropdown-submenu > a:focus, body .nav .open > .dropdown-menu a:focus {
					border-bottom: 1px solid rgb(<?php echo $r; ?>,<?php echo $g; ?>,<?php echo $b;?>);
					background-color: <?php echo $link_color; ?>;
			}
			body .dropdown-menu > li > a:hover, body .dropdown-menu > li > a:focus,body .nav .open.dropdown-submenu > a, body .nav .open.dropdown-submenu > a:hover, body .nav .open.dropdown-submenu >  a:focus,body .nav .open .dropdown-menu >  a ,body .nav .open  > a:hover, body .nav .open   > a:focus {
					background-color: rgb(<?php echo $r; ?>,<?php echo $g; ?>,<?php echo $b;?>);
			}
		 	body .nav .open > .dropdown-submenu a, body .nav .open > .dropdown-submenu a:hover, body .nav .open > .dropdown-submenu a:focus {
    			border-bottom: 1px solid rgb(<?php echo $r; ?>,<?php echo $g; ?>,<?php echo $b;?>);
			}
     	body .navbar-default .navbar-nav > .active > a,body .navbar .navbar-nav > .open.active > a { color:#ffffff; }
			.navbar2 .logo-link-url .navbar-brand .appointment_title_head, .navbar2 .logo-link-url p, .navbar-default.navbar3 .navbar-nav > li > a{
	    		color: #ffffff;
			}

			/*Background colors */
			.callout-btn2, a.works-btn, .blog-btn-sm, a.more-link, .top-contact-detail-section, .blog-post-date-area .date, .blog-btn-lg, .blogdetail-btn a:hover, .cont-btn a:hover, .sidebar-widget > .input-group > .input-group-addon, .sidebar-widget > .input-group > .input-group-addon, .sidebar-widget-tags a:hover, .navigation.pagination .nav-links .page-numbers.current,  .navigation.pagination .nav-links a:hover, a.error-btn, .hc_scrollup, .tagcloud a:hover, .form-submit input, .media-body input[type=submit], .sidebar-widget input[type=submit], .footer-widget-column input[type=submit], .blogdetail-btn, .cont-btn button, .orange-widget-column > .input-group > .input-group-addon, .orange-widget-column-tags a:hover, .slider-btn-sm, .slide-btn-sm, .slider-sm-area a.more-link, .blog-pagination span.current, .wpcf7-submit, .page-title-section, ins, body .service-section3 .service-area i.fa, body .service-section3 .service-area:hover, .service-section2 .service-area::before, body .Service-section.service6 .service-area, body .navbar-default.navbar5 .navbar-header, body .stickymenu1 .navbar-default .navbar-nav > .active > a, body .stickymenu1 .navbar-default .navbar-nav > .active > a:hover, body .stickymenu1 .navbar-default .navbar-nav > .active > a:focus, body .stickymenu1 .navbar .navbar-nav > li > a:hover, body .stickymenu1 .navbar .navbar-nav > li > a:focus, body .stickymenu1 .navbar .navbar-nav > .open > a, body .stickymenu1 .navbar .navbar-nav > .open > a:hover, body .stickymenu1 .navbar .navbar-nav > .open > a:focus {
				background-color: <?php echo $link_color; ?>;
			}
			body .navbar-default.navbar6 .navbar-nav > li.active > a:after, body .navbar6 ul li > a:hover:after {
				background: <?php echo $link_color; ?>;
			}

			/* Font Colors */
			.service-icon i, .blog-post-sm a:hover, .blog-tags-sm a:hover, .blog-sm-area h3 > a:hover, .blog-sm-area h3 > a:focus, .footer-contact-icon i, .footer-addr-icon, .footer-blog-post:hover h3 a , .footer-widget-tags a:hover, .footer-widget-column ul li a:hover, .footer-copyright p a:hover, .page-breadcrumb > li.active a, .blog-post-lg a:hover, .blog-post-lg a:focus, .blog-tags-lg a:hover, .blog-lg-area-full h3 > a:hover, .blog-author span, .comment-date a:hover, .reply a, .reply a:hover, .sidebar-blog-post:hover h3 a, ul.post-content li:hover a, .error-404 .error404-title, .media-body th a:hover, .media-body dd a:hover, .media-body li a:hover, .blog-post-info-detail a:hover, .comment-respond a:hover, .blogdetail-btn a, .cont-btn a, .blog-lg-area-left h3 > a:hover, .blog-lg-area-right h3 > a:hover, .blog-lg-area-full h3 > a:hover, .sidebar-widget > ul > li > a:hover,
			.sidebar-widget table th, .footer-widget-column table th,	.top-contact-detail-section table th,	blockquote a,	blockquote a:hover,	blockquote a:focus,
			#calendar_wrap table > thead > tr > th,	#calendar_wrap a,	table tbody a, table tbody a:hover,	table tbody a:focus, .textwidget a:hover,	.format-quote p:before,	td#prev a, td#next a,	dl > dd > a, dl > dd > a:hover, .rsswidget:hover,	.recentcomments a:hover, p > a, p > a:hover,	ul > li > a:hover, tr.odd a, tr.even a,	p.wp-caption-text a, .footer-copyright a, .footer-copyright a:hover, body .service-section3 .service-area:hover i.fa, body .service-section1 .service-area:hover i.fa {
				color: <?php echo $link_color; ?>;
			}

			/* Border colors */
			.footer-widget-tags a:hover , .sidebar-widget > .input-group > .input-group-addon, .sidebar-widget-tags a:hover, .blog-pagination a:hover, .blog-pagination a.active, .tagcloud a:hover, .media-body input[type=submit], .sidebar-widget input[type=submit], .footer-widget-column input[type=submit] {
				border: 1px solid <?php echo $link_color; ?>;
			}
			.footer-copyright-section {	border-bottom: 5px solid <?php echo $link_color; ?>; }
			.blog-lg-box img { border-bottom: 3px solid <?php echo $link_color; ?>; }
			blockquote { border-left: 5px solid <?php echo $link_color; ?>; }

			/* Box Shadow*/
			.callout-btn2, a.hrtl-btn, a.works-btn, .blog-btn-sm, .more-link, .blogdetail-btn a, .cont-btn a, a.error-btn, .form-submit input, .blogdetail-btn, .cont-btn button, .slider-btn-sm , .slider-sm-area a.more-link, .slide-btn-sm, .wpcf7-submit,
			.post-password-form input[type="submit"], input[type="submit"] { box-shadow: 0 3px 0 0 rgb(<?php echo $r; ?>,<?php echo $g; ?>,<?php echo $b;?>); }

			/* Other */
			body .service-section1 i.fa {
			    background: <?php echo $link_color; ?>;
			    box-shadow: <?php echo $link_color; ?> 0px 0px 0px 1px;
			}
			body .Service-section.service7 .service-area:after {
					border-top: 2px dashed <?php echo $link_color; ?> ;
					border-bottom: 2px dashed <?php echo $link_color; ?> ;
			}
			body .Service-section.service7 .service-area .media:after {
					border-left: 2px dashed <?php echo $link_color; ?> ;
		  		border-right: 2px dashed <?php echo $link_color; ?> ;
			}
			@media (min-width: 1101px) {
				body .navbar2.navbar-default .navbar-nav > .open > a, body .navbar3.navbar-default .navbar-nav > .open > a {
				    color: <?php echo $link_color; ?>;
				}
				body .navbar2.navbar-default .navbar-nav > .open.active > a, body .navbar3.navbar-default .navbar-nav > .open.active > a {
					color: #ffffff;
				}
			}
			body blockquote {
			    border-left: 5px solid <?php echo $link_color; ?>;
			}
		</style>
		<?php
		$theme = wp_get_theme();
    if ('Appointment Dark' == $theme->name) { ?>
			<style type="text/css">
					body {
						background-color: #040402 !important;
						color: #e5e5e5;
					}
					body .service-section2 .service-area { background: #191919; }
					body .media-body h3, body .section-heading-title h1, body .sidebar-widget-title h3, body.sidebar-widget ul li a, body .blog-lg-area-left h3 > a, body .blog-post-lg a, body .blog-post-lg, body .footer-widget-title, body .media-body h1, body .media-body .h1, body .media-body h2, body .media-body .h2, body .media-body h3, body .media-body .h3, body .media-body h4, body .media-body .h4, body .media-body h5, body .media-body .h5, body .media-body h6, body .media-body .h6, body .media-body ol, body .media-body li a, body .media-body li, body .comment-title h3, body #commentform p, body #commentform p a, body .blog-form-group-textarea, body .footer-copyright p a, body .blog-post-sm a, body .blog-tags-sm a, body .blog-sm-area h3 > a, body .footer-section-heading-title h1, body .navbar-default .navbar-nav > li > a { color: #fff; }
					body .service-area p, body .section-heading-title p, body .blog-post-sm, body .blog-sm-area p, body .page-builder p, body .page-builder ol li, body .blog-lg-area-left ol li a, body .page-builder ul li, body .page-builder ul li a, body .footer-section p, body .footer-widget-address address, body .footer-blog-post span, body .footer-widget-column ul li a, body .footer-copyright p { color: #e5e5e5; }
					body .service-section2 { padding: 80px 0 30px; }
					body .blog-lg-area-left, body .sidebar-section-right, body .footer-section { background-color: #191919; }
					body .sidebar-section-right { border: none; }
					body .blog-lg-area-left { margin: 0 0 20px; padding: 20px; }
					body .sticky .blog-post-lg a, body .sticky .blog-post-lg, body .sticky .media-body h3 > a, body .sticky .media-body p, body .sticky .media-body li a, body .sticky .media-body li, body .blog-lg-area-left .wp-block-quote p, body .wp-block-group,.wp-block-group p, body .media-body blockquote, body .media-body blockquote p, body table, body .wp-block-pullquote blockquote p, body .wp-block-group.has-background p, body .wp-caption p.wp-caption-text, body .wp-block-search .wp-block-search__button, body .wp-block-table { color: #000; }
					body .sticky .media-body a:hover, body .site-title a:hover, body .site-title a:focus { color: <?php echo $link_color; ?>; }
					body .footer-copyright-section { background-color: #040402; border-top: none; }
					body .navigation.pagination .nav-links .page-numbers, body .navigation.pagination .nav-links a { border-color: <?php echo $link_color; ?>; }
					body .blog-content .more-link {
						background-color: <?php echo $link_color; ?>;
					}
					body .blog-section {
    					background-color: #111111;
					}
					body .page-title-section { padding-top: 65px; }
					@media (max-width: 767px) {
							body .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, body .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
						    color: #fff;
						 	}
							body .navbar-default.navbar2 .navbar-nav .open .dropdown-menu > .active > a, body .navbar-default.navbar2 .navbar-nav .open .dropdown-menu > .active > a:focus {
								color: #fff;
								background-color: rgb(<?php echo $r; ?>,<?php echo $g; ?>,<?php echo $b;?>);
							}
				 }
			</style>
		<?php }

		if ('Shk Corporate' == $theme->name) { ?>
			<style type="text/css">
					body .top-header-widget {
					    background-color: #21202e;
					}
					body .page-title-section {
					    border-top: 1px solid #21202e;
					}
					@media (max-width: 767px) {
						body .navbar-default .navbar-nav li.open .dropdown-menu > li > a:focus {
							color: <?php echo $link_color; ?>;
						}
					}
			</style>
		<?php }

		if ('Appointee' == $theme->name) { ?>
			<style type="text/css">
					body .blog-post-info-detail a {
							color: <?php echo $link_color; ?>;
					}
					@media (max-width: 767px) {
						body .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, body .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
						    color: #fff;
						}
					}
			</style>
		<?php }

		if ('Appointment Blue' == $theme->name) { ?>
			<style type="text/css">
				@media (max-width: 767px) {
						body .navbar-default.navbar3 .navbar-nav > .open > a {
								color: <?php echo $link_color; ?>;
						}
						body .navbar-default.navbar3 .navbar-nav > .active > a, body .navbar-default.navbar3 .navbar-nav > .open.active > a {
							color: #ffffff;
						}
					}
			</style>
		<?php }

		endif;
}
