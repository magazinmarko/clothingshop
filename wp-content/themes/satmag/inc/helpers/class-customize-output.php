<?php
/**
 * Satmag Customize Output Class
 *
 * @author   ThemeCountry
 * @since    1.0.0
 * @package  satmag
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Satmag_Customize_Output' ) ) {
	/**
	* Satmag Customize Output Class
	*
	* Renders all theme customize settings from here.
	*
	* @since 1.0.0
	* @version 1.0
	*/
	class Satmag_Customize_Output
	{
		/**
		 * Setups class
		 *
		 * @since 1.0
		 */
		public function __construct()
		{
			$this->init_hooks();
		}

		/**
		 * Initials theme output hooks
		 *
		 * @since 1.0
		 * @return void
		 */
		private function init_hooks() {

			// Loop post thumbnails
			add_filter( 'satmag_post_thumbnail_show', array( $this, 'show_loop_thumbnail' ) );

			// footer widget
			add_filter( 'satmag_footer_widget_rows', array( $this, 'footer_widget_rows' ) );
			add_filter( 'satmag_footer_widget_columns', array( $this, 'footer_widget_columns' ) );
		}

		public function show_loop_thumbnail() {

			return satmag_get_theme_option( 'layout_show_thumbnail', 1 );

		}

		public function footer_widget_columns( $num = 4) {

			return satmag_get_theme_option( 'footer_widget_cols', $num );
		}

		public function footer_widget_rows( $num = 1) {

			return satmag_get_theme_option( 'footer_widget_rows', $num );

		}
	}
}

new Satmag_Customize_Output();
