<?php
/**
 * Base class to register a taxonomy
 *
 * @package    KC_Network
 * @subpackage Classes
 * @category   Core
 * @since      1.0.0
 */

declare( strict_types = 1 );
namespace KC_Network\Classes\Core;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Register_Tax {

	/**
	 * Taxonomy
	 *
	 * Maximum 20 characters. May only contain lowercase alphanumeric
	 * characters, dashes, and underscores. Dashes discouraged.
	 *
	 * @example 'color'
	 * @example 'vehicle_type'
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The database name of the taxonomy.
	 */
	protected $tax_key = '';

	/**
	 * Associated post types
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    array The array of associated post types.
	 */
	protected $post_types = [];

	/**
	 * Singular name
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The singular name of the taxonomy.
	 */
	protected $singular = '';

	/**
	 * Plural name
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string The plural name of the taxonomy.
	 */
	protected $plural = '';

	/**
	 * Public type
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    boolean Whether the taxonomy is public.
	 */
	protected $public = true;

	/**
	 * Hierarchical
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    boolean Whether the taxonomy is hierarchical.
	 */
	protected $hierarchical = false;

	/**
	 * Show user interface
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    boolean Whether the taxonomy displays
	 *                 a user interface.
	 */
	protected $show_ui = true;

	/**
	 * Show in admin menu
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    boolean Whether the taxonomy displays
	 *                 links in the admin menu.
	 */
	protected $show_in_menu = true;

	/**
	 * Show admin column
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    boolean Whether the taxonomy displays an
	 *                 admin column in the post list.
	 */
	protected $show_admin_column = true;

	/**
	 * Show in quick edit
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    boolean Whether the taxonomy displays in
	 *                 relative post type quick edit.
	 */
	protected $show_in_quick_edit = true;

	/**
	 * Show in navigation menus
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    boolean Whether the taxonomy displays
	 *                 in the navigation menus interface.
	 */
	protected $show_in_nav_menus = true;

	/**
	 * Show in REST API
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    boolean Whether to show in REST API.
	 */
	protected $show_in_rest = false;

	/**
	 * REST controller class
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string REST API Controller class name.
	 */
	protected $rest_controller_class = 'WP_REST_Terms_Controller';

	/**
	 * Constructor magic method.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Register taxonomy.
		add_action( 'init', [ $this, 'register' ] );

	}

	/**
     * Register taxonomy
     *
     * Note for WordPress 5.0 or greater:
     * If you want your taxonomy to adopt the block edit_form_image_editor
     * rather than using the rich text editor then set `show_in_rest` to `true`.
     *
     * @since  1.0.0
	 * @access public
	 * @return void
     */
    public function register() {

		register_taxonomy(
			strtolower( $this->tax_key ),
			$this->post_types,
			$this->options()
		);
	}

	/**
	 * Taxonomy options
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array Returns the array of taxonomy options,
	 *               including labels from $this->labels().
	 */
	public function options() {

		$options = [
			'label'                 => __( ucwords( $this->plural ), 'kc-network' ),
			'labels'                => $this->labels(),
			'public'                => $this->public,
			'hierarchical'          => $this->hierarchical,
			'show_ui'               => $this->show_ui,
			'show_admin_column'     => $this->show_admin_column,
			'show_in_quick_edit'    => $this->show_in_quick_edit,
			'show_in_menu'          => $this->show_in_menu,
			'show_in_nav_menus'     => $this->show_in_nav_menus,
			'rewrite'               => $this->rewrite(),
			'show_in_rest'          => $this->show_in_rest,
			'rest_base'             => $this->tax_key . '_rest_api',
			'rest_controller_class' => $this->rest_controller_class,
			'query_var'             => $this->tax_key,
		];

		return $options;
	}

	/**
	 * Taxonomy labels
	 *
	 * The `ucwords()` function capitalizes
	 * the string (uppercase words).
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array Returns the array of taxonomy labels.
	 */
	public function labels() {

		$labels = [
			'name'                       => __( ucwords( $this->plural ), 'kc-network' ),
			'singular_name'              => __( ucwords( $this->singular ), 'kc-network' ),
			'menu_name'                  => __( ucwords( $this->plural ), 'kc-network' ),
			'all_items'                  => __( 'All ' . ucwords( $this->plural ), 'kc-network' ),
			'edit_item'                  => __( 'Edit ' . ucwords( $this->singular ), 'kc-network' ),
			'view_item'                  => __( 'View ' . ucwords( $this->singular ), 'kc-network' ),
			'update_item'                => __( 'Update ' . ucwords( $this->singular ), 'kc-network' ),
			'add_new_item'               => __( 'Add New ' . ucwords( $this->singular ), 'kc-network' ),
			'new_item_name'              => __( 'New ' . ucwords( $this->singular ), 'kc-network' ),
			'parent_item'                => __( 'Parent ' . ucwords( $this->singular ), 'kc-network' ),
			'parent_item_colon'          => __( 'Parent ' . ucwords( $this->singular ), 'kc-network' ),
			'popular_items'              => __( 'Popular ' . ucwords( $this->plural ), 'kc-network' ),
			'separate_items_with_commas' => __( 'Separate ' . ucwords( $this->plural ) . ' with commas', 'kc-network' ),
			'add_or_remove_items'        => __( 'Add or Remove ' . ucwords( $this->plural ), 'kc-network' ),
			'choose_from_most_used'      => __( 'Choose from the most used ' . ucwords( $this->plural ), 'kc-network' ),
			'not_found'                  => __( 'No ' . ucwords( $this->plural ) . ' Found', 'kc-network' ),
			'no_terms'                   => __( 'No ' . ucwords( $this->plural ), 'kc-network' ),
			'items_list_navigation'      => __( ucwords( $this->plural ) . ' list navigation', 'kc-network' ),
			'items_list'                 => __( ucwords( $this->plural ) . ' List', 'kc-network' ),
		];

		return $labels;
	}

	/**
	 * Rewrite rules
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array Returns the array of rewrite rules.
	 */
	public function rewrite() {

		$rewrite = [
			'slug'       => $this->tax_key,
			'with_front' => true
		];

		return $rewrite;
	}
}
