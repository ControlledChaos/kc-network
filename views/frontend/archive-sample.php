<?php
/**
 * Content for sample post type archive
 *
 * @package    KC_Network
 * @subpackage Views
 * @category   Front
 * @since      1.0.0
 */

printf(
	'<p>%s%s</p>',
	__( 'Content for archived post #', 'kc-network' ),
	get_the_ID()
);
