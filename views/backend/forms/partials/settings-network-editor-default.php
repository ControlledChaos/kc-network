<?php
/**
 * Form fields for network default editor option
 *
 * @package    KC_Network
 * @subpackage Views
 * @category   Forms
 * @since      1.0.0
 */

// Editor settings.
$editor     = get_network_option( null, 'editor-options-replace' );
$is_checked = ( get_network_option( null, 'tinymce-editor-allow-sites' ) === 'allow' );

?>
<h2 id="tinymce-editor-options"><?php _e( 'Editor Settings', 'kc-network' ); ?></h2>

<table class="form-table">
	<?php wp_nonce_field( 'allow-site-admin-settings', 'tinymce-editor-network-settings' ); ?>
	<tr>
		<th scope="row"><?php _e( 'Default editor for all sites', 'kc-network' ); ?></th>
		<td>
			<p>
				<input type="radio" name="editor-options-replace" id="editor-options-tinymce" value="tinymce"<?php if ( $editor !== 'block' ) echo ' checked'; ?> />
				<label for="editor-options-tinymce"><?php _ex( 'Rich text editor', 'Editor Name', 'kc-network' ); ?></label>
			</p>
			<p>
				<input type="radio" name="editor-options-replace" id="editor-options-block" value="block"<?php if ( $editor === 'block' ) echo ' checked'; ?> />
				<label for="editor-options-block"><?php _ex( 'Block editor', 'Editor Name', 'kc-network' ); ?></label>
			</p>
		</td>
	</tr>
	<tr>
		<th scope="row"><?php _e( 'Change settings', 'kc-network' ); ?></th>
		<td>
			<input type="checkbox" name="tinymce-editor-allow-sites" id="tinymce-editor-allow-sites" value="allow"<?php if ( $is_checked ) echo ' checked'; ?>>
			<label for="tinymce-editor-allow-sites"><?php _e( 'Allow site admins to change settings', 'kc-network' ); ?></label>
			<p class="description"><?php _e( 'By default the block editor is replaced with the rich text editor and users cannot switch editors.', 'kc-network' ); ?></p>
		</td>
	</tr>
</table>
