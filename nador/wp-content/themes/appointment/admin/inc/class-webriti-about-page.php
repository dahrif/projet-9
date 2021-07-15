<?php
/**
 * @author Webriti
 */

if (!class_exists('Appointment_About_Page')) {
	class Appointment_About_Page {

		protected static $instance;
		private $options;
		private $version = '1.0.0';
		private $theme;
		private $demo_link;
		private $docs_link;
		private $rate_link;
		private $theme_page;
		private $pro_link;
		private $tabs;
		private $action_count;
		private $recommended_actions;

		public static function get_instance() {

			if (is_null(self::$instance)) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function __construct() {
			$this->theme            = wp_get_theme();
			$actions                   = $this->get_recommended_actions();
			$this->action_count        = $actions['count'];
			$this->recommended_actions = $actions['actions'];

			add_action('admin_menu', array($this, 'add_theme_info_menu'));
			add_action('wp_ajax_appointment_update_rec_acts', array($this, 'update_recommended_actions_watch'));
			add_action('load-themes.php', array($this, 'activation_admin_notice'));
			/* enqueue script and style for welcome screen */
			add_action( 'admin_enqueue_scripts', array( $this, 'style_and_scripts' ) );
			
			/* load welcome screen */
			add_action( 'appointment_info_screen', array( $this, 'get_started' ), 	    10 );
			add_action( 'appointment_info_screen', array( $this, 'github_file' ), 		            40 );
			add_action( 'appointment_info_screen', array( $this, 'welcome_free_pro' ), 				50 );
			add_action( 'appointment_info_screen', array( $this, 'recommending_actions' ), 				50 );
			add_action( 'appointment_info_screen', array( $this, 'support_themes' ), 				50 );
			add_action( 'appointment_info_screen', array( $this, 'changelog_themes' ), 				50 );
			add_action( 'appointment_info_screen', array( $this, 'emailcourses_themes' ), 				50 );
			
			
			
			}

		/**
	 * Load welcome screen css and javascript
	 * @sfunctionse  1.8.2.4
	 */
	public function style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_appointment-welcome' == $hook_suffix ) {
			
                        wp_enqueue_style('appointment-bootstrap-css',APPOINTMENT_TEMPLATE_DIR_URI.'/css/bootstrap.css');
                    
			wp_enqueue_style( 'appointment-info-screen-css', get_template_directory_uri() . '/admin/assets/css/welcome.css' );
			
			wp_enqueue_style('appointment-theme-info-style', get_template_directory_uri() . '/admin/assets/css/welcome-page-styles.css');
			
			wp_enqueue_style('appointment_welcome_customizer', get_template_directory_uri() . '/admin/assets/css/welcome_customizer.css');
			wp_enqueue_script('plugin-install');
			wp_enqueue_script('updates');
			wp_enqueue_script('appointment-companion-install', get_template_directory_uri() . '/admin/assets/js/plugin-install.js', array('jquery'));
			wp_enqueue_script('appointment-about-tabs', get_template_directory_uri() . '/admin/assets/js/about-tabs.js', array('jquery'));
			wp_localize_script('appointment-companion-install', 'appointment_companion_install',
				array(
					'installing' => esc_html__('Installing', 'appointment'),
					'activating' => esc_html__('Activating', 'appointment'),
					'error'      => esc_html__('Error', 'appointment'),
					'ajax_url'   => esc_url(admin_url('admin-ajax.php')),
				)
			);
		}
	}

		public function add_theme_info_menu() {
			$theme = $this->theme;
			$count = $this->action_count;
			$count = ($count > 0) ? '<span class="awaiting-mod action-count"><span>' . $count . '</span></span>' : '';
			$title = sprintf(esc_html__('About appointment Theme', 'appointment'), esc_html($theme->get('Name')), $count);
			add_theme_page(sprintf(esc_html__('Welcome to %1$s %2$s', 'appointment'), esc_html($theme->get('Name')), esc_html($theme->get('Version'))), $title, 'edit_theme_options', 'appointment-welcome', array($this, 'print_welcome_page'));
		}

		public function activation_admin_notice() {
			global $pagenow;
			if (is_admin() && ('themes.php' == $pagenow) && isset($_GET['activated'])) {
				add_action('admin_notices', array($this, 'welcome_admin_notice'), 99);
			}
		}

		public function welcome_admin_notice() {
			$theme_info = wp_get_theme();
			?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( "Appointment theme is installed. To take full advantage of the features this theme has to offer visit our %1\$s welcome page %2\$s", 'appointment' ), '<a href="' . esc_url( admin_url( 'themes.php?page=appointment-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=appointment-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php esc_html_e( 'Get started with Appointment Lite', 'appointment' ); ?></a></p>
			</div>
		<?php
		}

		public function print_welcome_page() {
			$theme = $this->theme;
			?>
	  <div class="container-fluid">
		<div class="row">
		<div class="col-md-12">
			<div class="wrap theme-info-wrap appointment-wrap">
				<div style="clear: both;"></div>
				<div class="theme-welcome-container" style="min-height:300px;">
					<div class="theme-welcome-inner">
						<?php
							$tabs = $this->get_tabs_array();
							$tabs_head     = '';
							$tab_file_path = '';
							$active_tab    = 'getting_started';

							if (isset($_GET['tab']) && $_GET['tab']) {
								$active_tab = sanitize_text_field($_GET['tab']);
							}

							foreach ($tabs as $key => $tab) {
								$active_class = '';
								$count        = '';
								if ($active_tab == $tab['link']) {
									
									$tab_file_path = $tab['file_path'];
								}

								if ($tab['link'] == 'recommended_actions') {
									$count = $this->action_count;
									$count = ($count > 0) ? '<span class="badge-action-count">' . $count . '</span>' : '';
								}
                             
	
								$tabs_head .= sprintf('<li role="presentation"><a href="%s" class="nav-tab %s" role="tab" data-toggle="tab">%s</a></li>', esc_url(('#' . $tab['link'])), $active_class, $tab['name'] . $count);
								                    
							}
							
						?>
		
						 <ul class="appointment-nav-tabs" role="tablist">
							<?php echo wp_kses_post($tabs_head); ?>
						 </ul>
						 
						 	<div class="appointment-tab-content">

			<?php do_action( 'appointment_info_screen' ); ?>

		</div>
						
						 <div class="tab-content <?php echo esc_attr($active_tab); ?>">
						 	<?php
								if (!empty($tab_file_path) && file_exists($tab_file_path)) {
									require_once $tab_file_path;
								}
							?>
						 	<div style="clear: both;"></div>
						 </div>
					</div>
				</div>
			</div></div></div></div>
		
			<?php
		}
		
		public function get_started() {
		require_once( get_template_directory() . '/admin/tab-pages/getting-started.php' );
	}

	/**
	 * Contribute
	 *
	 */
	public function github_file() {
		require_once( get_template_directory() . '/admin/tab-pages/useful_plugins.php' );
	}


	/**
	 * Free vs PRO
	 * 
	 */
	public function welcome_free_pro() {
		require_once( get_template_directory() . '/admin/tab-pages/free_vs_pro.php' );
	}
	
	
	/**
	 * Recommended Action
	 * 
	 */
	public function recommending_actions() {
		require_once( get_template_directory() . '/admin/tab-pages/recommended_actions.php' );
	}
	
	/**
	 * Support 
	 * 
	 */
	public function support_themes() {
		require_once( get_template_directory() . '/admin/tab-pages/support.php' );
	}

        /**
	 * TrustWorthy
	 * 
	 */
	public function emailcourses_themes() {
		require_once( get_template_directory() . '/admin/tab-pages/emailcourse.php' );
	}


	/**
		 * Output the changelog screen.
		 */
		public function changelog_themes() {
			global $wp_filesystem;

			?>
			<div id="changelog" class="appointment-tab-pane panel-close">
			<div class="wrap about-wrap">

				<?php //$this->intro(); ?>

				<p class="about-description"><?php esc_html_e( 'See changelog below:', 'appointment' ); ?></p>

				<?php
				$changelog_file = apply_filters( 'changelog_themes', APPOINTMENT_TEMPLATE_DIR. '/changelog.txt' );

				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog      = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = $this->parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
				?>
			</div>
			</div>
			<?php
		}

		/**
		 * Parse changelog from readme file.
		 *
		 * @param  string $content
		 *
		 * @return string
		 */
		private function parse_changelog( $content ) {
			$matches   = null;
			$regexp    = '~==\s*Changelog\s*==(.*)($)~Uis';
			$changelog = '';

			if ( preg_match( $regexp, $content, $matches ) ) {
				$changes = explode( '\r\n', trim( $matches[1] ) );

				$changelog .= '<pre class="changelog">';

				foreach ( $changes as $index => $line ) {
					$changelog .= wp_kses_post( preg_replace( '~(=\s*Version\s*(\d+(?:\.\d+)+)\s*=|$)~Uis', '<span class="title">${1}</span>', $line ) );
				}

				$changelog .= '</pre>';
			}

			return wp_kses_post( $changelog );
		}

		public function get_tabs_array() {
			$tabs_array = array();
			
			
			$tabs_array[]	= array(
					'link'      => 'getting_started',
					'name'      => esc_html__('Getting Started', 'appointment'),
					'file_path' => get_template_directory() . '/admin/tab-pages/getting-started.php',
				);
			$tabs_array[]	= 	array(
					'link'      => 'recommended_actions',
					'name'      => esc_html__('Recommended Actions', 'appointment'),
					'file_path' => get_template_directory() . '/admin/tab-pages/recommended-actions.php',
				);


			if(count($this->get_useful_plugins()) > 0){
				$tabs_array[]	= 	array(
						'link'      => 'useful_plugins',
						'name'      => esc_html__('Why Upgrade to PRO?', 'appointment'),
						'file_path' => get_template_directory() . '/admin/tab-pages/useful_plugins.php',
				);
			}
			
			$tabs_array[]	= 	array(
					'link'      => 'free_vs_pro',
					'name'      => esc_html__('Free vs Pro', 'appointment'),
					'file_path' => get_template_directory() . '/admin/tab-pages/free-vs-pro.php',
				);

			$tabs_array[]	= 	array(
					'link'      => 'support',
					'name'      => esc_html__('Support', 'appointment'),
					'file_path' => get_template_directory() . '/admin/tab-pages/support.php',
			);
			
			$tabs_array[]	= 	array(
					'link'      => 'changelog',
					'name'      => esc_html__('Changelog', 'appointment'),
					'file_path' => get_template_directory() . '/admin/tab-pages/changelog.php',
			);
			
                        $tabs_array[]	= 	array(
					'link'      => 'emailcourse_themes',
					'name'      => esc_html__('CREATE TRUSTWORTHY WEBSITES', 'appointment'),
					'file_path' => get_template_directory() . '/admin/tab-pages/emailcourse.php',
			);

			return $tabs_array;
			
		}

		public function get_recommended_plugins() {
			
			$plugins = apply_filters('appointment_recommended_plugins', array());
			return $plugins;
		}

		public function get_useful_plugins() {
			$plugins = apply_filters('appointment_useful_plugins', array());
			return $plugins;
		}



		public function get_recommended_actions() {

			$act_count           = 0;
			$actions_todo = get_option( 'recommending_actions', array());
			
			$plugins = $this->get_recommended_plugins();

			if ($plugins) {
				foreach ($plugins as $key => $plugin) {
					$action = array();
					if (!isset($plugin['slug'])) {
						continue;
					}

					$action['id']   = 'install_' . $plugin['slug'];
					$action['desc'] = '';
					if (isset($plugin['desc'])) {
						$action['desc'] = $plugin['desc'];
					}

					$action['name'] = '';
					if (isset($plugin['name'])) {
						$action['title'] = $plugin['name'];
					}

					$link_and_is_done  = $this->get_plugin_buttion($plugin['slug'], $plugin['name'], $plugin['function']);
					$action['link']    = $link_and_is_done['button'];
					$action['is_done'] = $link_and_is_done['done'];
					if (!$action['is_done'] && (!isset($actions_todo[$action['id']]) || !$actions_todo[$action['id']])) {
						$act_count++;
					}
					$recommended_actions[] = $action;
					$actions_todo[]        = array('id' => $action['id'], 'watch' => true);
				}
				return array('count' => $act_count, 'actions' => $recommended_actions);
			}

		}

		public function get_plugin_buttion($slug, $name, $function) {
			$is_done      = false;
			$button_html  = '';
			$is_installed = $this->is_plugin_installed($slug);
			$plugin_path  = $this->get_plugin_basename_from_slug($slug);
			$is_activeted = (function_exists($function)) ? true : false;
			if (!$is_installed) {
				$plugin_install_url = add_query_arg(
					array(
						'action' => 'install-plugin',
						'plugin' => $slug,
					),
					self_admin_url('update.php')
				);
				$plugin_install_url = wp_nonce_url($plugin_install_url, 'install-plugin_' . esc_attr($slug));
				$button_html        = sprintf('<a class="webriti-plugin-install install-now button-secondary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
					esc_attr($slug),
					esc_url($plugin_install_url),
					sprintf(esc_html__('Install %s Now', 'appointment'), esc_html($name)),
					esc_html($name),
					esc_html__('Install & Activate', 'appointment')
				);
			} elseif ($is_installed && !$is_activeted) {

				$plugin_activate_link = add_query_arg(
					array(
						'action'        => 'activate',
						'plugin'        => rawurlencode($plugin_path),
						'plugin_status' => 'all',
						'paged'         => '1',
						'_wpnonce'      => wp_create_nonce('activate-plugin_' . $plugin_path),
					), self_admin_url('plugins.php')
				);

				$button_html = sprintf('<a class="webriti-plugin-activate activate-now button-primary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
					esc_attr($slug),
					esc_url($plugin_activate_link),
					sprintf(esc_html__('Activate %s Now', 'appointment'), esc_html($name)),
					esc_html($name),
					esc_html__('Activate', 'appointment')
				);
			} elseif ($is_activeted) {
				$button_html = sprintf('<div class="action-link button disabled"><span class="dashicons dashicons-yes"></span> %s</div>', esc_html__('Active', 'appointment'));
				$is_done     = true;
			}

			return array('done' => $is_done, 'button' => $button_html);
		}

                public function get_plugin_basename_from_slug($slug) {
			$keys = array_keys($this->get_installed_plugins());
			foreach ($keys as $key) {
				if (preg_match('|^' . $slug . '/|', $key)) {
					return $key;
				}
			}
			return $slug;
		}

		public function is_plugin_installed($slug) {
			$installed_plugins = $this->get_installed_plugins(); // Retrieve a list of all installed plugins (WP cached).
			$file_path         = $this->get_plugin_basename_from_slug($slug);
			return (!empty($installed_plugins[$file_path]));
		}

		public function get_installed_plugins() {

			if (!function_exists('get_plugins')) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			return get_plugins();
		}

		public function update_recommended_actions_watch() {
			if (isset($_POST['action_id'])) {
				$action_id    = sanitize_text_field($_POST['action_id']);
				$actions_todo = get_option('recommending_actions', array());

				if ((!isset($actions_todo[$action_id]) || !$actions_todo[$action_id])) {
					$actions_todo[$action_id] = true;
				} else {
					$actions_todo[$action_id] = false;
				}
				update_option('recommending_actions', $actions_todo);
			}
			echo json_encode(get_option('recommending_actions'));
			wp_die();
		}


		public function get_plugin_info_api( $slug ) {
			require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
			$call_api = get_transient( 'wt_about_plugin_info_' . $slug );

			if ( false === $call_api ) {
				$call_api = plugins_api(
					'plugin_information', array(
						'slug'   => $slug,
						'fields' => array(
							'downloaded'        => false,
							'rating'            => false,
							'description'       => false,
							'short_description' => true,
							'donate_link'       => false,
							'tags'              => false,
							'sections'          => true,
							'homepage'          => true,
							'added'             => false,
							'last_updated'      => false,
							'compatibility'     => false,
							'tested'            => false,
							'requires'          => false,
							'downloadlink'      => false,
							'icons'             => true,
						),
					)
				);
				set_transient( 'wt_about_plugin_info_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
			}

			return $call_api;
		}

		public function get_plugin_icon( $icons ) {

			if ( ! empty( $icons['svg'] ) ) {
				$plugin_icon_url = $icons['svg'];
			} elseif ( ! empty( $icons['2x'] ) ) {
				$plugin_icon_url = $icons['2x'];
			} elseif ( ! empty( $icons['1x'] ) ) {
				$plugin_icon_url = $icons['1x'];
			} else {
				$plugin_icon_url = get_template_directory_uri() . '/admin/assets/images/placeholder_plugin.png';
			}
			return $plugin_icon_url;
		}
	}
}


function appointment_useful_plugins_array($plugins){
	$plugins[] = array(
					'slug'     => 'elementor',
				);

	return $plugins;
}
add_filter('appointment_useful_plugins', 'appointment_useful_plugins_array');

function appointment_recommended_plugins_array($plugins){
	$plugins[] = array(
					'name'     => esc_html__('Webriti Companion', 'appointment'),
					'slug'     => 'webriti-companion',
					'function'     => 'webriti_companion_activate',
					'desc'     => esc_html__('It is highly recommended that you install the Webriti Companion plugin to have access to the advance Frontpage sections and other theme features', 'appointment'),
				);
				
	$plugins[] = array(
					'name'     => esc_html__('Contact Form 7', 'appointment'),
					'slug'     => 'contact-form-7',
					'function'     => 'wpcf7',
					'desc'     => esc_html__('it is recommended that you install the Contact Form 7 plugin to show contact form on pages', 'appointment'),
				);			
	
	return $plugins;
}
add_filter('appointment_recommended_plugins', 'appointment_recommended_plugins_array');

function Appointment_About_Page() {
	return Appointment_About_Page::get_instance();
}
global $appointment_about_page;
$appointment_about_page = Appointment_About_Page();