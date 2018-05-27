<?php
/**
 * Plugin Name: Analytics Master
 * Description: Quickly and easily add Google Analytics to your site
 * Version: 1.0.0
 * Author: Frank Corso
 * Author URI: https://www.quizandsurveymaster.com/
 * Plugin URI: https://www.quizandsurveymaster.com/
 * Text Domain: quiz-master-next
 *
 * @author Frank Corso
 * @version 1.0.0
 * @package QSM
 */

/**
 * @todo
 *
 * 1. Finalize name
 * 2. Switch URL's at top
 * 3. Create settings page
 * 4. Add GA code to head
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
	 */
	public $version = '1.0.0';

	/**
	 * Sets up the entire plugin
	 *
	 * @since 1.0.0
	 * @uses Analytics_Master::load_dependencies
	 */
	public function __construct() {
		$this->load_dependencies();
	}

	/**
	 * Loads the other files of the plugin
	 *
	 * @since 1.0.0
	 */
	public function load_dependencies() {

	}
}

global $analytics_manager;
$analytics_manager = new Analytics_Manager();
