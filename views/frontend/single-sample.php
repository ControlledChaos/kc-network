<?php
/**
 * Content for singular sample post type
 *
 * @package    KC_Network
 * @subpackage Views
 * @category   Front
 * @since      1.0.0
 */

printf(
	'<p>%s%s</p>',
	__( 'Content for post #', 'kc-network' ),
	get_the_ID()
);
