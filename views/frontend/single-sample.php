<?php
/**
 * Content for singular sample post type
 *
 * @package    Site_Core
 * @subpackage Views
 * @category   Front
 * @since      1.0.0
 */

printf(
	'<p>%s%s</p>',
	__( 'Content for post #', 'sitecore' ),
	get_the_ID()
);
