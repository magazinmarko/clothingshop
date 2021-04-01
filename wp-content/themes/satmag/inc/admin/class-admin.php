<?php
/**
 * SatmaG Admin Class
 *
 * @author   ThemeCountry
 * @since    1.0.0
 * @package SatmaG
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'Satmag_Admin' ) ) {
	/**
	 * SatmaG Admin Class
	 *
	 * @version 1.0.0
	 */
	class Satmag_Admin
	{
		/**
		 * Setup class.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			add_action( 'tgmpa_register', array( $this, 'register_required_plugins' ));

		}

		/**
		 * Recommends plugins
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function register_required_plugins() {

			$plugins =  array(
				array(
					'name'      => 'Kirki',
					'slug'      => 'kirki',
					'required'  => false,
				),

			);
			$config = array(
				'id'           => 'satmag',                 // Unique ID for hashing notices for multiple instances of TGMPA.
				'default_path' => '',                      // Default absolute path to bundled plugins.
				'menu'         => 'tgmpa-install-plugins', // Menu slug.
				'parent_slug'  => 'themes.php',            // Parent menu slug.
				'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
				'has_notices'  => true,                    // Show admin notices or not.
				'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
				'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
				'is_automatic' => false,                   // Automatically activate plugins after installation or not.

			);

			if ( function_exists( 'tgmpa' ) ) {
				// require plugins
				tgmpa( $plugins, $config );
			}

		}
	}
}

return new Satmag_Admin();
