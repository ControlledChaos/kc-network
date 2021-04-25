<?php
/**
 * Initialize plugin functionality
 *
 * @package    KC_Network
 * @subpackage Init
 * @category   Core
 * @since      1.0.0
 */

namespace KC_Network;

// Alias namespaces.
use
KC_Network\Classes          as Classes,
KC_Network\Classes\Core     as Core,
KC_Network\Classes\Settings as Settings,
KC_Network\Classes\Tools    as Tools,
KC_Network\Classes\Media    as Media,
KC_Network\Classes\Users    as Users,
KC_Network\Classes\Admin    as Admin,
KC_Network\Classes\Front    as Front,
KC_Network\Classes\Vendor   as Vendor;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Initialization function
 *
 * Loads PHP classes and text domain.
 * Instantiates various classes.
 * Adds settings link in the plugin row.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function init() {

	// Standard plugin installation.
	load_plugin_textdomain(
		'kc-network',
		false,
		dirname( KCN_BASENAME ) . '/languages'
	);

	// If this is in the must-use plugins directory.
	load_muplugin_textdomain(
		'kc-network',
		dirname( KCN_BASENAME ) . '/languages'
	);

	/**
	 * Class autoloader
	 *
	 * The autoloader registers plugin classes for later use,
	 * such as running new instances below.
	 */
	require_once KCN_PATH . 'includes/autoloader.php';

	// Get compatibility functions.
	require KCN_PATH . 'includes/vendor/compatibility.php';

	// Instantiate settings classes.
	new Settings\Settings;
	new Admin\Content_Settings;

	// Instantiate core classes.
	new Core\Type_Tax;
	// new Core\Register_Sample_Type;
	// new Core\Register_Sample_Tax;
	new Core\Register_Admin;
	new Core\Register_Site_Help;

	// If the Customizer is disabled in the system config file.
	if ( ( defined( 'KCN_ALLOW_CUSTOMIZER' ) && false == KCN_ALLOW_CUSTOMIZER ) && ! current_user_can( 'develop' ) ) {
		new Core\Remove_Customizer;
	}

	/**
	 * Editor options for WordPress
	 *
	 * Not run for ClassicPress and the default antibrand system.
	 * The `classicpress_version()` function checks for ClassicPress.
	 * The `APP_INC_PATH` constant checks for the default antibrand system.
	 *
	 * Not run if the Classic Editor plugin is active.
	 */
	if ( ! function_exists( 'classicpress_version' ) || ! defined( 'APP_INC_PATH' ) ) {
		if ( ! is_plugin_active( 'classic-editor/classic-editor.php' ) ) {
			new Core\Editor_Options;
		}
	}

	// Instantiate tools classes.
	new Tools\Tools;

	// Instantiate media classes.
	new Media\Media;

	// Instantiate third-party classes.
	// new Vendor\Sample_ACF_Options;
	// new Vendor\Sample_ACF_Suboptions;
	// new Vendor\Sample_Plugin;
	new Vendor\ACF;
	new Vendor\ACFE;

	// Instantiate backend classes.
	if ( is_admin() ) {
		new Admin\Admin;
	}

	// Instantiate users classes.
	new Users\Users;

	// Instantiate frontend classes.
	if ( ! is_admin() ) {
		new Front\Frontend;
	}

	// Disable WordPress administration email verification prompt.
	add_filter( 'admin_email_check_interval', '__return_false' );

	// Disable Site Health notifications.
	if ( defined( 'KCN_ALLOW_SITE_HEALTH' ) && ! KCN_ALLOW_SITE_HEALTH ) {
		add_filter( 'wp_fatal_error_handler_enabled', '__return_false' );
	}

	/**
	 * Allow links manager
	 *
	 * @todo Put into an option.
	 */
	if ( defined( 'KCN_ALLOW_LINKS_MANAGER' ) && KCN_ALLOW_LINKS_MANAGER ) {
		add_filter( 'pre_option_link_manager_enabled', '__return_true' );
	}

	// Remove the Draconian capital P filters.
	remove_filter( 'the_title', 'capital_P_dangit', 11 );
	remove_filter( 'the_content', 'capital_P_dangit', 11 );
	remove_filter( 'comment_text', 'capital_P_dangit', 31 );

	/**
	 * Disable emoji script
	 *
	 * Emojis will still work in modern browsers. This removes the script
	 * that makes emojis work in old browsers.
	 */
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// System email filters.
	add_filter( 'wp_mail_from_name', function( $name ) {
		return apply_filters( 'kcn_mail_from_name', get_bloginfo( 'name' ) );
	} );
}

// Run initialization function.
init();

/**
 * Admin initialization function
 *
 * Instantiates various classes.
 *
 * @since  1.0.0
 * @access public
 * @global $pagenow Get the current admin screen.
 * @return void
 */
function admin_init() {

	// Access current admin page.
	global $pagenow;
}
add_action( 'admin_init', __NAMESPACE__ . '\admin_init' );
