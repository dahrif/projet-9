/**
 * Admin-side JS
 *
 * @package Bravada
 */

jQuery(document).ready(function() {

	/* Confirm modal window on reset to defaults */
	jQuery('#cryout_reset_defaults').click(function() {
		if (!confirm(cryout_admin_settings.reset_confirmation)) { return false; }
	});

});/* document.ready */

/* FIN */
