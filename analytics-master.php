<?php
/**
 * Plugin Name: Analytics Master
 * Description: Quickly and easily add Google Analytics to your site
 * Version: 1.0.0
 * Author: Frank Corso
 * Author URI: https://markasio.com/
 * Plugin URI: https://markasio.com/
 * Text Domain: quiz-master-next
 *
 * @author Frank Corso
 * @version 1.0.0
 * @package QSM
 */

/**
 * Stuff @todo
 *
 * 1. Finalize name
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The main class of the plugin
 *
 * @since 1.0.0
 */
class Analytics_Master {

	/**
	 * The current version of the plugin
	 *
	 * @since 1.0.0
	 * @var string
	 */
	public $version = '1.0.0';

	/**
	 * Sets up the entire plugin
	 *
	 * @since 1.0.0
	 * @uses Analytics_Master::load_dependencies
	 * @uses Analytics_Master::init
	 */
	public function __construct() {
		$this->load_dependencies();
		$this->init();
	}

	/**
	 * Loads the other files of the plugin
	 *
	 * @since 1.0.0
	 */
	public function load_dependencies() {
		include 'php/settings-page.php';
		include 'php/ga-code.php';
	}

	/**
	 * Sets up all actions and filters
	 *
	 * @since 1.0.0
	 * @uses Settings_Page::init
	 */
	public function init() {
		Settings_Page::init();
		add_action( 'admin_menu', array( $this, 'setup_admin' ) );
		add_action( 'wp_head', '' );
	}

	/**
	 * Configures admin pages
	 *
	 * @since 1.0.0
	 */
	public function setup_admin() {
		add_options_page( __( '' ), __( '' ), 'manage_options', 'analytics_master', array( 'Settings_Page', 'display_page' ) );
	}

	/**
	 * Wrapper to get our settings
	 *
	 * @since 1.0.0
	 * @return array The array of settings
	 */
	public function get_settings() {
		$settings = get_option( '', array() );
		$defaults = array(
			'tracking_id'  => '',
			'disable_user' => '1',
			'anonymize_ip' => '1',
			'do_not_track' => '1',
		);
		return wp_parse_args( $settings, $defaults );
	}
}

global $analytics_manager;
$analytics_manager = new Analytics_Manager();
