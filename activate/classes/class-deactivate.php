<?php
/**
 * Plugin deactivation class
 *
 * @package    KC_Network
 * @subpackage Classes
 * @category   Activate
 * @since      1.0.0
 */

namespace KC_Network\Classes\Activate;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Deactivate {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {
		// Add actions & filters.
	}
}

/**
 * Deactivate plugin
 *
 * Puts an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function deactivation_class() {
	return new Deactivate;
}
