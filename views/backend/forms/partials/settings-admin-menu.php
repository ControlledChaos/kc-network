<?php
/**
 * Form fields for admin settings menu tab
 *
 * @package    KC_Network
 * @subpackage Views
 * @category   Forms
 * @since      1.0.0
 */

namespace KC_Network\Views\Admin;
use KC_Network\Classes\Admin as Admin;

// Instance of the Manage_Website_Page class.
$page = new Admin\Admin_Settings_Page;


settings_fields( 'kcn-site-admin-menu' );
do_settings_sections( 'kcn-site-admin-menu' );

