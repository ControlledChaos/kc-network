<?php
/**
 * Settings class
 *
 * @package    KC_Network
 * @subpackage Classes
 * @category   Settings
 * @since      1.0.0
 */

namespace KC_Network\Classes\Settings;
use
KC_Network\Classes as Classes,
KC_Network\Classes\Admin as Admin;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Define forms directory.
if ( ! defined( 'KCN_FORMS' ) ) {
	define( 'KCN_FORMS', [
		'forms'    => KCN_PATH . 'views/backend/forms/',
		'partials' => KCN_PATH . 'views/backend/forms/partials'
	] );
}

class Settings {

	/**
	 * Setting data
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    array
	 */
	private $setting = [];

	/**
	 * Constructor method
	 *
	 * Calls the parent constructor.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {}

	/**
	 * Settings
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function settings() {}

	/**
	 * Settings section
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function section() {}

	/**
	 * Setting
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function setting( $args ) {

		$defaults = [
			'id'            => null,
			'id_before'     => 'kcn_',
			'id_after'      => null,
			'capability'    => 'read',
			'section'       => null,
			'label'         => null,
			'label_before'  => null,
			'label_after'   => null,
			'class'         => 'kcn-setting',
			'icon'          => null,
			'description'   => null,
			'hide-if-no-js' => false,
			'callback'      => null,
			'priority'      => 10,
		];

		$args       = wp_parse_args( $args, $defaults );
		$args['id'] = sanitize_html_class( $args['id'] );

		// Ensure there is an an ID.
		if ( ! $args['id'] ) {
			return;
		}

		// Allows for overriding existing with that ID.
		$this->setting[ $args['id'] ] = $args;
	}
}

/**
 * Get settings
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function get_settings() {

	/**
	 * Path to settings files
	 *
	 * Only gets files prefixed with `settings-`.
	 *
	 * This includes main directory (`/`) and any
	 * subdirectories (`* /`).
	 */
	$dir_file = KCN_PATH .  'includes/settings' . "{/,/*/}" . 'settings-*.php';

	// Include each file matching the path patterns.
	foreach ( glob( $dir_file, GLOB_BRACE ) as $settings_file ) {
		if ( is_file( $settings_file ) && is_readable( $settings_file ) ) {
			require $settings_file;
		}
	}
}
// get_settings();
