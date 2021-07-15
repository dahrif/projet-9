<?php
function appointment_theme_setup_data()
  	{
	return $appointment_options=array(
	//Header Settings
	'upload_image_favicon' => '',
	'header_one_name' => '' ,
	'header_one_text' => '' ,
	'text_title' => 1 ,
	'height' => '50',
	'width' => '50',
	'enable_header_logo_text' => '',
	'upload_image_logo' => '',
	'social_media_facebook_link' => '',
	'social_media_twitter_link' => '',
	'social_media_linkedin_link' => '',
	'header_social_media_enabled' => 0,
	'facebook_media_enabled' => 1,
	'twitter_media_enabled' => 1,
	'linkedin_media_enabled' => 1,
	'webrit_custom_css' => '',
  'link_color' => '#ee591f',
  'link_color_enable' => false,

	//Slider Default settings
	'home_banner_enabled' => '',
	'slider_radio' => 'demo',
	'slider_select_category' =>__('Uncategorized','appointment'),
	'slider_options' => __('slide','appointment'),
	'slider_transition_delay' => 2000,
	'featured_slider_post' => '',

	//Service section settings
	'service_section_enabled' => '',
	'service_title' => __('Lorem Ipsum','appointment'),
	'service_description' => __('Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','appointment'),
	'service_one_icon' => 'fa-mobile',
	'service_one_title'=>__('Quam in nibh','appointment'),
	'service_one_description' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','appointment'),
	'service_two_icon' => 'fa-bell',
	'service_two_title'=>__('Quam in nibh','appointment'),
	'service_two_description' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','appointment'),
	'service_three_icon' => 'fa-laptop',
	'service_three_title'=>__('Quam in nibh','appointment'),
	'service_three_description' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','appointment'),
	'service_four_icon' => 'fa-support',
	'service_four_title'=>__('Quam in nibh','appointment'),
	'service_four_description' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','appointment'),
	'service_five_icon' => 'fa-code',
	'service_five_title'=>__('Quam in nibh','appointment'),
	'service_five_description' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','appointment'),
	'service_six_icon' => 'fa-cog',
	'service_six_title'=>__('Quam in nibh','appointment'),
	'service_six_description' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.','appointment'),

	//Home callout section
	'home_call_out_area_enabled' => '',
	'home_call_out_title' => __('Etiam eu nisi quis lectus bibend?','appointment'),
	'home_call_out_description' => __('Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs sint occaecat proidentse.','appointment'),
	'callout_background' => '',
	'home_call_out_btn1_text' =>__('Morbi fermentum','appointment'),
	'home_call_out_btn1_link' => '#',
	'home_call_out_btn1_link_target' => '',
	'home_call_out_btn2_text' => __('Fringilla in Magna','appointment'),
	'home_call_out_btn2_link' => '#',
	'home_call_out_btn2_link_target' => '',

	//News Section
	'home_blog_enabled' => '',
	'home_meta_section_settings' => '',
	'blog_heading' => __('Proin euismod','appointment'),
	'blog_description' => __('Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui official deserunt mollit anim id est laborum.','appointment'),
	'blog_selected_category_id'=> 1,
	'post_display_count' => '4',

	//Footer Copyright & footer social links
	'footer_copyright_text' => '<p>'.__( 'Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: <a href="https://webriti.com" rel="nofollow">Appointment</a> by Webriti', 'appointment' ).'</p>',
	'footer_menu_bar_enabled' => '',
	'footer_social_media_enabled' => '',
	'footer_social_media_facebook_link' => '',
	'footer_facebook_media_enabled' => 1,
	'footer_social_media_twitter_link' => '',
	'footer_twitter_media_enabled'=>1,
	'footer_social_media_linkedin_link' => '',
	'footer_linkedin_media_enabled'=>1,
	'footer_social_media_skype_link' => '',
	'footer_skype_media_enabled' => 1
	);
  	}
