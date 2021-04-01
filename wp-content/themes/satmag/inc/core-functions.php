<?php
/**
 * SatmaG  functions.
 *
 * @package SatmaG
 * @author ThemeCountry
 * @since 1.0.0
 */

if ( ! function_exists( 'satmag_the_post_thumbnail' ) ) :

	/**
	 * Renders post's thumbnail
	 *
	 * @param  string  $size
	 * @param  string  $attr
	 * @param  boolean $echo
	 * @since 1.0.0
	 * @return mix
	 */
	function satmag_the_post_thumbnail( $size, $attr = '', $echo = true ) {
		global $post;

		if ( has_post_thumbnail() ) {

			$img = get_the_post_thumbnail( $post->ID, $size, $attr );

		} else {

			$img = sprintf('<img class="wp-post-image" src="%s/assets/images/%s.jpg" alt="%s" />',  get_template_directory_uri(), esc_attr( $size ), esc_attr( get_the_title()) );
		}

		if ( $echo ) {

			echo $img;

		} else {

			return $img;

		}
	}
endif;

if ( ! function_exists('satmag_get_theme_option') ) :

	/**
	 * Get Theme Options
	 *
	 * @since 1.0.0
	 * @param  mix $setting
	 * @param  mix $default
	 * @return mix
	 */
	function satmag_get_theme_option( $setting, $default = '' ) {

	    $options = get_option( MODEL_CUSTOMIZE_ID . '_name', array() );

	    $value = $default;

	    if ( isset( $options[ $setting ] ) ) {

	        $value = $options[ $setting ];

	    }

	    return $value;
	}


endif;

if ( ! function_exists('satmag_set_custom_thumbnail') ) :
	/**
	 * Hooks to set custom post thumbnails
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function satmag_set_custom_thumbnail() {

	    // Default Thumbnail Sizes
		set_post_thumbnail_size( 300, 250 );
		add_image_size( 'satmag-xsmall-thumbnail', 86, 60, true );
		add_image_size( 'satmag-small-thumbnail', 300, 172, true );
		add_image_size( 'satmag-medium-thumbnail', 480, 380, true );
		add_image_size( 'satmag-large-thumbnail', 870, 468, true );
		add_image_size( 'satmag-xlarge-thumbnail', 1366, 740, true );
		add_image_size( 'satmag-banner-thumbnail', 1680, 800, true );

	}

endif;
add_action( 'after_setup_theme', 'satmag_set_custom_thumbnail' );

function satmag_search_form( $html ) {

		$str = esc_attr( __('Type keyword to search ', 'satmag' ) );

        $html = str_replace( 'placeholder="Search ', 'placeholder="'. $str , $html );

        return $html;
}
add_filter( 'get_search_form', 'satmag_search_form' );
