<?php
/**
 * Content settings class
 *
 * @package    KC_Network
 * @subpackage Classes
 * @category   Admin
 * @since      1.0.0
 */

declare( strict_types = 1 );
namespace KC_Network\Classes\Admin;
use KC_Network\Classes\Settings as Settings;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Content_Settings extends Add_Settings_Page {

	/**
	 * Settings class
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    Settings
	 */
	private $settings;

	/**
	 * Page title
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The text to be displayed in the
	 *                title tags of the page when the
	 *                menu is selected.
	 */
	protected $page_title = 'Content Settings';

	/**
	 * Menu title
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The text to be used for the menu.
	 */
	protected $menu_title = 'Content';

	/**
	 * Capability
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The capability required for the menu
	 *                to be displayed to the user.
	 */
	protected $capability = 'manage_options';

	/**
	 * Page slug
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The slug name to refer to the menu by.
	 */
	protected $menu_slug = 'content-settings';

	/**
	 * Menu icon
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The URL to the icon to be used for this menu.
	 */
	protected $icon_url = 'dashicons-edit';

	/**
	 * Menu position
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    integer The position in the menu order this item should appear.
	 */
	protected $position = 26;

	/**
	 * Page description
	 *
	 * This is a non-native feature. The description is addeded by
	 * the template provided in this plugin.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var    string The description of the page diplayed below the title.
	 */
	protected $description = 'Manage how the content of this website is edited and displayed.';

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {
		parent :: __construct();
	}

	/**
	 * Tabbed content
	 *
	 * Add content to the tabbed section of the page.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function tabs() {

		$this->add_content_tab( [
			'id'         => 'content-settings-intro',
			'tab'        => __( 'Intro', 'kc-network' ),
			'heading'    => __( 'Introduction', 'kc-network' ),
			'content'    => __( 'In development', 'kc-network' ),
			'callback'   => ''
		] );
	}

	/**
	 * Page heading
	 *
	 * @since  1.0.0
	 * @access protected
	 * @return string Returns the page heading.
	 */
	protected function heading() {
		return __( 'Content Settings', 'kc-network' );
	}
}
