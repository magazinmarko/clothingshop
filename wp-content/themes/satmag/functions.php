<?php
/**
 * SatmaG main functions
 */


/**
 * Assign the SatmaG version to a var
 */
$theme          = wp_get_theme( 'satmag' );
$satmag_version = $theme['Version'];

/**
 * Theme's constants
 */

// Theme Version Constant
define( 'MODEL_THEME_VERSION', $theme['Version'] );
// Theme Customize ID
define( 'MODEL_CUSTOMIZE_ID', 'satmag_customize_id' );
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$satmag = (object) array(
	'version' => $satmag_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-satmag.php',
	'customizer' => require 'inc/customizer/class-customize.php',
);

/**
 * Include functions
 */
if ( is_admin() ) {

	$satmag->admin = require 'inc/admin/class-admin.php';

	// Includes recommend plugin
	require 'inc/helpers/class-tgm-plugin-activation.php';
}

require 'inc/recent-posts.php';
require 'inc/core-functions.php';
require 'inc/template-hooks.php';
require 'inc/template-functions.php';
require 'inc/helpers/class-customize-output.php';
