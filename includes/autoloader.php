<?php
/**
 * Register plugin classes
 *
 * The autoloader registers plugin classes for later use.
 *
 * @package    KC_Network
 * @subpackage Includes
 * @category   Classes
 * @since      1.0.0
 */

namespace KC_Network;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Class files
 *
 * Defines the class directories and file prefixes.
 *
 * @since 1.0.0
 * @var   array Defines an array of class file paths.
 */
define( 'KCN_CLASS', [
	'core'     => KCN_PATH . 'includes/classes/core/class-',
	'settings' => KCN_PATH . 'includes/classes/settings/class-',
	'tools'    => KCN_PATH . 'includes/classes/tools/class-',
	'media'    => KCN_PATH . 'includes/classes/media/class-',
	'users'    => KCN_PATH . 'includes/classes/users/class-',
	'vendor'   => KCN_PATH . 'includes/classes/vendor/class-',
	'admin'    => KCN_PATH . 'includes/classes/backend/class-',
	'front'    => KCN_PATH . 'includes/classes/frontend/class-',
	'general'  => KCN_PATH . 'includes/classes/class-',
] );

/**
 * Classes namespace
 *
 * @since 1.0.0
 * @var   string Defines the namespace of class files.
 */
define( 'KCN_CLASS_NS', __NAMESPACE__ . '\Classes' );

/**
 * Array of classes to register
 *
 * When you add new classes to your version of this plugin you may
 * add them to the following array rather than requiring the file
 * elsewhere. Be sure to include the precise namespace.
 *
 * SAMPLES: Uncomment sample classes to load them.
 *
 * @since 1.0.0
 * @var   array Defines an array of class files to register.
 */
define( 'KCN_CLASSES', [

	// Base class.
	KCN_CLASS_NS . '\Base' => KCN_CLASS['general'] . 'base.php',

	// Core classes.
	KCN_CLASS_NS . '\Core\Editor_Options'     => KCN_CLASS['core'] . 'editor-options.php',
	KCN_CLASS_NS . '\Core\Type_Tax'           => KCN_CLASS['core'] . 'type-tax.php',
	KCN_CLASS_NS . '\Core\Register_Type'      => KCN_CLASS['core'] . 'register-type.php',
	// KCN_CLASS_NS . '\Core\Register_Sample_Type' => KCN_CLASS['core'] . 'register-sample-type.php',
	KCN_CLASS_NS . '\Core\Register_Admin'     => KCN_CLASS['core'] . 'register-admin.php',
	KCN_CLASS_NS . '\Core\Register_Site_Help' => KCN_CLASS['core'] . 'register-site-help.php',
	KCN_CLASS_NS . '\Core\Register_Tax'       => KCN_CLASS['core'] . 'register-tax.php',
	// KCN_CLASS_NS . '\Core\Register_Sample_Tax' => KCN_CLASS['core'] . 'register-sample-tax.php',
	KCN_CLASS_NS . '\Core\Types_Taxes_Order'  => KCN_CLASS['core'] . 'types-taxes-order.php',
	KCN_CLASS_NS . '\Core\Taxonomy_Templates' => KCN_CLASS['core'] . 'taxonomy-templates.php',
	KCN_CLASS_NS . '\Core\Remove_Blog'        => KCN_CLASS['core'] . 'remove-blog.php',
	KCN_CLASS_NS . '\Core\Remove_Customizer'  => KCN_CLASS['core'] . 'remove-customizer.php',

	// Settings classes.
	KCN_CLASS_NS . '\Settings\Settings'     => KCN_CLASS['settings'] . 'settings.php',

	// Tools classes.
	KCN_CLASS_NS . '\Tools\Tools'            => KCN_CLASS['tools'] . 'tools.php',
	KCN_CLASS_NS . '\Tools\Disable_FloC'     => KCN_CLASS['tools'] . 'disable-google-floc.php',
	KCN_CLASS_NS . '\Tools\RTL_Test'         => KCN_CLASS['tools'] . 'rtl-test.php',
	KCN_CLASS_NS . '\Tools\Customizer_Reset' => KCN_CLASS['tools'] . 'customizer-reset.php',

	// Media classes.
	KCN_CLASS_NS . '\Media\Media'               => KCN_CLASS['media'] . 'media.php',
	KCN_CLASS_NS . '\Media\Register_Media_Type' => KCN_CLASS['media'] . 'register-media-type.php',

	// Users classes.
	KCN_CLASS_NS . '\Users\Users'           => KCN_CLASS['users'] . 'users.php',
	KCN_CLASS_NS . '\Users\User_Roles_Caps' => KCN_CLASS['users'] . 'user-roles-caps.php',
	KCN_CLASS_NS . '\Users\User_Toolbar'    => KCN_CLASS['users'] . 'user-toolbar.php',
	KCN_CLASS_NS . '\Users\User_Avatars'    => KCN_CLASS['users'] . 'user-avatars.php',

	// Vendor classes.
	KCN_CLASS_NS . '\Vendor\Plugin'        => KCN_CLASS['vendor'] . 'plugin.php',
	// KCN_CLASS_NS . '\Vendor\Sample_Plugin' => KCN_CLASS['vendor'] . 'sample-plugin.php',
	KCN_CLASS_NS . '\Vendor\ACF'           => KCN_CLASS['vendor'] . 'acf.php',
	KCN_CLASS_NS . '\Vendor\ACFE'          => KCN_CLASS['vendor'] . 'acfe.php',
	KCN_CLASS_NS . '\Vendor\ACF_Columns'   => KCN_CLASS['vendor'] . 'acf-columns.php',
	KCN_CLASS_NS . '\Vendor\Add_ACF_Options'       => KCN_CLASS['vendor'] . 'add-acf-options.php',
	KCN_CLASS_NS . '\Vendor\Add_ACF_Suboptions'    => KCN_CLASS['vendor'] . 'add-acf-suboptions.php',
	// KCN_CLASS_NS . '\Vendor\Sample_ACF_Options'    => KCN_CLASS['vendor'] . 'sample-acf-options.php',
	// KCN_CLASS_NS . '\Vendor\Sample_ACF_Suboptions' => KCN_CLASS['vendor'] . 'sample-acf-suboptions.php',

	// Backend/admin classes,
	KCN_CLASS_NS . '\Admin\Admin'                   => KCN_CLASS['admin'] . 'admin.php',
	KCN_CLASS_NS . '\Admin\Add_Page'                => KCN_CLASS['admin'] . 'add-page.php',
	KCN_CLASS_NS . '\Admin\Add_Subpage'             => KCN_CLASS['admin'] . 'add-subpage.php',
	KCN_CLASS_NS . '\Admin\Admin_Settings_Page'     => KCN_CLASS['admin'] . 'admin-settings-page.php',
	KCN_CLASS_NS . '\Admin\Add_Settings_Page'       => KCN_CLASS['admin'] . 'add-settings-page.php',
	KCN_CLASS_NS . '\Admin\Admin_ACF_Settings_Page' => KCN_CLASS['admin'] . 'admin-acf-settings-page.php',
	KCN_CLASS_NS . '\Admin\Content_Settings'        => KCN_CLASS['admin'] . 'content-settings.php',
	KCN_CLASS_NS . '\Admin\Manage_Website_Page'     => KCN_CLASS['admin'] . 'manage-website-page.php',
	KCN_CLASS_NS . '\Admin\User_Colors'             => KCN_CLASS['admin'] . 'user-colors.php',
	KCN_CLASS_NS . '\Admin\Dashboard'               => KCN_CLASS['admin'] . 'dashboard.php',
	KCN_CLASS_NS . '\Admin\Posts_List_Table'        => KCN_CLASS['admin'] . 'posts-list-table.php',

	// Frontend classes.
	KCN_CLASS_NS . '\Front\Frontend'       => KCN_CLASS['front'] . 'frontend.php',
	KCN_CLASS_NS . '\Front\Title_Filter'   => KCN_CLASS['front'] . 'title-filter.php',
	KCN_CLASS_NS . '\Front\Content_Filter' => KCN_CLASS['front'] . 'content-filter.php',

	// General/miscellaneous classes.

] );

/**
 * Autoload class files
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
spl_autoload_register(
	function ( string $class ) {
		if ( isset( KCN_CLASSES[ $class ] ) ) {
			require KCN_CLASSES[ $class ];
		}
	}
);
