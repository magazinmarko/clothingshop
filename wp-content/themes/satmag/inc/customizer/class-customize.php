<?php
/**
 * SatmaG Customize Class
 *
 * @author   ThemeCountry
 * @since	1.0.0
 * @package  satmag
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'Satmag_Customize' ) ) {

	/**
	* Satmag Customize Class
	*
	* @since 1.0.0
	* @version 1.0
	*/
	class Satmag_Customize {

		/**
		* Class setup
		*
		* @since  1.0
		* @access public
		*/
		public function __construct() {

			// Include Kirki Helper Class
			$this->includes();

			// Add Field
			add_action( 'init', array( $this, 'init_kirki' ) );
			// add_action('customize_controls_print_scripts', array( $this, 'scripts') );
		}

		/**
		* Includes files for Satmag Customizer
		*
		* @since 1.0
		* @access private
		* @return void
		*/
		private function includes() {

			require_once get_template_directory() . '/inc/helpers/class-include-kirki.php';
			require_once get_template_directory() . '/inc/helpers/class-helper-kirki.php';
			require_once get_template_directory() . '/inc/customizer/customize-settings.php';
			require_once get_template_directory() . '/inc/customizer/custom.php';
		}

		/**
		* Initials Kirki customize
		*
		* @since 1.0
		* @return void
		*/
		public function init_kirki() {

			Satmag_Helper_Kirki::add_config( MODEL_CUSTOMIZE_ID, array(
				'capability'	=> 'edit_theme_options',
				'option_type'	=> 'option',
				'option_name'	=> MODEL_CUSTOMIZE_ID . '_name'
			) );


			Satmag_Helper_Kirki::add_panel( 'satmag_panel' , array(
				'priority'	=> 100,
				'title'		=> __( 'Theme Options', 'satmag' ),
				'description' => __( 'The basic theme options for free version.', 'satmag' ),
			) );

			// Add customize sections and fields
			$this->add_sections_settings();
		}

		/**
		* Initils to add customize sections and settings.
		*
		* @since 1.0
		* @return void
		*/
		private function add_sections_settings() {

			$sections = apply_filters ('Satmag_Customize_sections', $this->sections() );

			$fields = apply_filters ('Satmag_Customize_settings', $this->add_settings() );

			// Generate sections
			foreach( $sections as $key => $section ) {

				Satmag_Helper_Kirki::add_section( $key, $section);

			}

			// Generate fields
			foreach ( $fields as $field) {

				Satmag_Helper_Kirki::add_field( MODEL_CUSTOMIZE_ID, $field );
			}

		}

		/**
		* Adds theme cutomize section
		*
		* @since 1.0
		* @return void
		*/
		private function sections() {

			return array(
				'satmag_general_section' => array(
					'title'			=> __( 'Genneral Settings', 'satmag' ),
					'panel'			=> 'satmag_panel',
					'priority'		=> 10,
				),
				'satmag_layout_section' => array(
					'title'			=> __( 'Layout Settings', 'satmag' ),
					'panel'			=> 'satmag_panel',
					'priority'		=> 20,
				),
				'satmag_single_post_section' => array(
					'title'			=> __( 'Single Post Settings', 'satmag' ),
					'panel'			=> 'satmag_panel',
					'priority'		=> 30,
				),
				'satmag_footer_widget_section' => array(
					'title'			=> __( 'Footer Widget Settings', 'satmag' ),
					'panel'			=> 'satmag_panel',
					'priority'		=> 40,
				)
			);
		}

		/**
		* Adds theme customize settings
		*
		* @since 1.0
		* @return array
		*/
		private function add_settings() {
			// Default layout fields
			$setttings = array_merge(
				Satmag_Customize_general_settings(),
				Satmag_Customize_layout_settings(),
				Satmag_Customize_single_post_settings(),
				Satmag_Customize_footer_widget_settings()
			);

			return $setttings;
		}

	}
}

return new Satmag_Customize();
