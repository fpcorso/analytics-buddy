<?php
/**
 * This file creates the settings page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Settings_Page {

	public function init() {
		add_action( 'admin_init', array( $this, 'setup' ) );
	}

	public function setup() {
		register_setting( 'qmn-settings-group', 'qmn-settings' );
		add_settings_section( 'qmn-global-section', __( 'Main Settings', 'quiz-master-next' ), array( $this, 'display_main_section' ), 'qmn_global_settings' );
		add_settings_field( 'ip-collection', __( 'Disable collecting and storing IP addresses?', 'quiz-master-next' ), array( $this, 'ip_collection_field' ), 'qmn_global_settings', 'qmn-global-section' );
		add_settings_field( 'ip-collection', __( 'Disable collecting and storing IP addresses?', 'quiz-master-next' ), array( $this, 'ip_collection_field' ), 'qmn_global_settings', 'qmn-global-section' );
		add_settings_field( 'ip-collection', __( 'Disable collecting and storing IP addresses?', 'quiz-master-next' ), array( $this, 'ip_collection_field' ), 'qmn_global_settings', 'qmn-global-section' );
		add_settings_field( 'ip-collection', __( 'Disable collecting and storing IP addresses?', 'quiz-master-next' ), array( $this, 'ip_collection_field' ), 'qmn_global_settings', 'qmn-global-section' );
	}

	/**
	 * Generates the main section info
	 *
	 * @since 1.0.0
	 */
	public function display_main_section() {
		echo '<p>' . __( '' ) . '</p>';
	}

	/**
	 * Generates the settings page
	 *
	 * @since 1.0.0
	 */
	public function display_page() {
		?>
		<div class="wrap">
			<h2><?php _e( '' ); ?></h2>
			<form action="options.php" method="POST">
				<?php settings_fields( 'qmn-settings-group' ); ?>
				<?php do_settings_sections( 'qmn_global_settings' ); ?>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}
}