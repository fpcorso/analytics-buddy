<?php
/**
 * This file creates the settings page
 *
 * @package ANBU
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * This class handles the generation of settings fields on the settings page.
 *
 * @since 1.0.0
 */
class ANBU_Settings_Page {

	/**
	 * Registers setup hook
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'admin_init', array( $this, 'setup' ) );
	}

	/**
	 * Registers settings, sections, and fields
	 *
	 * @since 1.0.0
	 */
	public function setup() {
		register_setting( 'anbu-settings-group', 'anbu-settings' );
		add_settings_section( 'anbu-global-section', __( 'Main Settings', 'analytics-buddy' ), array( $this, 'display_main_section' ), 'anbu_global_settings' );
		add_settings_field( 'id-field', __( 'Your tracking ID. Should look like UA-XXXX-Y.', 'analytics-buddy' ), array( $this, 'id_field' ), 'anbu_global_settings', 'anbu-global-section' );
		add_settings_field( 'disable-user', __( 'Exclude tracking logged-in users?', 'analytics-buddy' ), array( $this, 'disable_user_field' ), 'anbu_global_settings', 'anbu-global-section' );
		add_settings_field( 'anonymize-ip', __( 'Anonymize IP Addresses?', 'analytics-buddy' ), array( $this, 'anonymize_ip_field' ), 'anbu_global_settings', 'anbu-global-section' );
		add_settings_field( 'do-not-track', __( 'Honor Do Not Track?', 'analytics-buddy' ), array( $this, 'do_not_track_field' ), 'anbu_global_settings', 'anbu-global-section' );
	}

	/**
	 * Generates the main section info
	 *
	 * @since 1.0.0
	 */
	public function display_main_section() {
		echo '<p>' . __( '', 'analytics-buddy' ) . '</p>';
		if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] ) {
			?>
			<div id="message" class="updated below-h2"><p><?php _e( '', 'analytics-buddy' ); ?></p></div>
			<?php
		}
	}

	/**
	 * Generates the tracking id field
	 *
	 * @since 1.0.0
	 */
	public function id_field() {
		global $analytics_buddy;
		$settings = $analytics_buddy->get_settings();
		?>
		<input type='text' name='anbu-settings[tracking_id]' id='anbu-settings[tracking_id]' value='<?php echo esc_attr( $settings['tracking_id'] ); ?>' />
		<?php
	}

	/**
	 * Generates the disable user field
	 *
	 * @since 1.0.0
	 */
	public function disable_user_field() {
		global $analytics_buddy;
		$settings = $analytics_buddy->get_settings();
		$checked = '';
		if ( '1' == $settings['disable_user'] ) {
			$checked = " checked='checked'";
		}
		echo "<input type='checkbox' name='anbu-settings[disable_user]' id='anbu-settings[disable_user]' value='1'$checked />";
	}

	/**
	 * Generates the anonymize ip field
	 *
	 * @since 1.0.0
	 */
	public function anonymize_ip_field() {
		global $analytics_buddy;
		$settings = $analytics_buddy->get_settings();
		$checked = '';
		if ( '1' == $settings['anonymize_ip'] ) {
			$checked = " checked='checked'";
		}
		echo "<input type='checkbox' name='anbu-settings[anonymize_ip]' id='anbu-settings[anonymize_ip]' value='1'$checked />";
	}

	/**
	 * Generates the do not track field
	 *
	 * @since 1.0.0
	 */
	public function do_not_track_field() {
		global $analytics_buddy;
		$settings = $analytics_buddy->get_settings();
		$checked = '';
		if ( '1' == $settings['do_not_track'] ) {
			$checked = " checked='checked'";
		}
		echo "<input type='checkbox' name='anbu-settings[do_not_track]' id='anbu-settings[do_not_track]' value='1'$checked />";
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
				<?php settings_fields( 'anbu-settings-group' ); ?>
				<?php do_settings_sections( 'anbu_global_settings' ); ?>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}
}