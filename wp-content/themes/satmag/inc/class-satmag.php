<?php
/**
 * Satmag Class: The main class of theme
 *
 * @author   ThemeCountry
 * @since    1.0.0
 * @package  Satmag
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'satmag' ) ) :

	/**
	 * The main Satmag class to init & setup theme
	 *
	 * @since  1.0.0
	 * @version  1.0
	 */
	class Satmag
	{

		function __construct() {

			add_action( 'after_setup_theme',          array( $this, 'setup' ) );
			add_action( 'widgets_init',               array( $this, 'widgets_init' ) );
			add_action( 'wp_enqueue_scripts',         array( $this, 'scripts' ),       10 );
			//add_action( 'wp_enqueue_scripts',         array( $this, 'child_scripts' ), 30 );

			// After WooCommerce.
			add_filter( 'body_class',                 array( $this, 'body_classes' ) );
			//add_filter( 'wp_page_menu_args',          array( $this, 'page_menu_args' ) );


		}

		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 *
		 * @since 1.0
		 */
		public function setup() {

			/*
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 * If you're building a theme based on Satmag, use a find and replace
			 * to change 'satmag' to the name of your theme in all the template files.
			 */

			// Loads wp-content/themes/base/languages/it_IT.mo.
			load_theme_textdomain( 'satmag', get_template_directory() . '/languages' );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a
			 * hard-coded <title> tag in the document head, and expect WordPress to
			 * provide it for us.
			 */
			add_theme_support( 'title-tag' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			 */

			add_theme_support( 'post-thumbnails' );

			/**
			 * Enable support for site logo
			 */
			// Set up the WordPress core custom logo feature.
			add_theme_support( 'custom-logo', apply_filters( 'Satmag_custom_logo_args', array(
					'height'		=> 90,
					'width'			=> 300,
					'flex-width'	=> true,
			) ) );


			// This theme uses wp_nav_menu() in two locations.
			register_nav_menus( array(
				'primary'			=> __( 'Primary Menu', 'satmag' ),
				'footer'			=> __( 'Footer Menu', 'satmag' ),
				'social'			=> __( 'Social Menu', 'satmag' ),
			) );

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );


			/**
			 *  Add support for the Site Logo plugin and the site logo functionality in JetPack
			 *  https://github.com/automattic/site-logo
			 *  http://jetpack.me/
			 */
			add_theme_support( 'site-logo', array( 'size' => 'full' ) );

			// Set up the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( 'Satmag_custom_background_args', array(
					'default-color'		=> 'ffffff',
					'default-image'		=> '',
			) ) );

			add_theme_support( 'custom-header', apply_filters( 'Satmag_custom_header_args', array(
				'header-text'			=> false,
				'width'					=> 1600,
				'height'				=> 640,
				'flex-height'			=> true,
			) ) );

			// Add thirt party plugin
			$this->_addons_support();

			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
		}

		/**
		 * Adds theme support pro version
		 *
		 * @since 1.0
		 * @return void
		 */
		private function _addons_support() {

			// Add theme support for Satmag Pro plugin.
			add_theme_support( 'Satmag-pro' );


		}

		/**
		 * Register widget area.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
		 * @since 1.0
		 */
		public function widgets_init() {

			$sidebar_args['sidebar'] = array(
				'name'          => __( 'Sidebar', 'satmag' ),
				'id'            => 'sidebar-1',
				'description'   => ''
			);

			$rows    = intval( apply_filters( 'Satmag_footer_widget_rows', 1 ) );
			$regions = intval( apply_filters( 'Satmag_footer_widget_columns', 4 ) );

			for ( $row = 1; $row <= $rows; $row++ ) {
				for ( $region = 1; $region <= $regions; $region++ ) {
					$footer_n = $region + $regions * ( $row - 1 ); // Defines footer sidebar ID.
					$footer   = sprintf( 'footer_%d', $footer_n );

					if ( 1 == $rows ) {
						$footer_region_name = sprintf( __( 'Footer Column %1$d', 'satmag' ), $region );
						$footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of the footer.', 'satmag' ), $region );
					} else {
						$footer_region_name = sprintf( __( 'Footer Row %1$d - Column %2$d', 'satmag' ), $row, $region );
						$footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of footer row %2$d.', 'satmag' ), $region, $row );
					}

					$sidebar_args[ $footer ] = array(
						'name'        => $footer_region_name,
						'id'          => sprintf( 'footer-%d', $footer_n ),
						'description' => $footer_region_description,
					);
				}
			}

			foreach ( $sidebar_args as $sidebar => $args ) {
				$widget_tags = array(
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<span class="gamma widget-title">',
					'after_title'   => '</span>',
				);

				/**
				 * Dynamically generated filter hooks. Allow changing widget wrapper and title tags. See the list below.
				 *
				 * 'Satmag_header_widget_tags'
				 * 'Satmag_sidebar_widget_tags'
				 *
				 * 'Satmag_footer_1_widget_tags'
				 * 'Satmag_footer_2_widget_tags'
				 * 'Satmag_footer_3_widget_tags'
				 * 'Satmag_footer_4_widget_tags'
				 */
				$filter_hook = sprintf( 'Satmag_%s_widget_tags', $sidebar );
				$widget_tags = apply_filters( $filter_hook, $widget_tags );

				if ( is_array( $widget_tags ) ) {
					register_sidebar( $args + $widget_tags );
				}
			}
		}
		/**
		 * Enqueue scripts and styles.
		 *
		 * @since  1.0
		 */
		public function scripts() {

			global $wp_query, $Satmag_version;

			/**
			 * Styles
			 */

			wp_enqueue_style( 'owl-slider', get_template_directory_uri() . '/assets/css/owlslider/owl.carousel.css', '', $Satmag_version );
			wp_enqueue_style( 'Satmag-style', get_template_directory_uri() . '/style.css', '', $Satmag_version );
			wp_enqueue_style( 'Satmag-icons', get_template_directory_uri() . '/assets/css/base/icons.css', '', $Satmag_version );

			/**
			 * Fonts
			 */
			$google_fonts = apply_filters( 'Satmag_google_font_families', array(
				'Open Sans'	=> 'Open+Sans:400,600,700'
			) );

			if ( $google_fonts ) {

				$query_args = array(
					'family' => implode( '|', $google_fonts )
				);

				$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );


				wp_enqueue_style( 'Satmag-fonts', $fonts_url, array(), null );

			}

			/**
			 * Scripts
			 */
			wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), $Satmag_version, true);
			wp_enqueue_script( 'Satmag-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), $Satmag_version, true );
			wp_enqueue_script( 'Satmag-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), $Satmag_version, true );
			wp_enqueue_script( 'Satmag-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), $Satmag_version, true);

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

		}

		
		/**
		 * Enqueue child theme stylesheet.
		 * A separate function is required as the child theme css needs to be enqueued _after_ the parent theme
		 *
		 * @since  1.0
		 * @return void
		 */
		public function child_scripts() {
			if ( is_child_theme() ) {
				wp_enqueue_style( 'Satmag-child-style', get_stylesheet_uri(), '' );
			}
		}

		/**
		 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
		 *
		 * @param array $args Configuration arguments.
		 * @since  1.0
		 * @return array
		 */
		public function page_menu_args( $args ) {
			$args['show_home'] = true;
			return $args;
		}


		/**
		 * Adds custom classes to the array of body classes.
		 *
		 * @param array $classes Classes for the body element.
		 * @since  1.0
		 * @return array
		 */
		public function body_classes( $classes ) {
			
			// Blogs with more than one published author
			if ( is_multi_author() ) {
				$classes[] = 'group-blog';
			} 

			if ( Satmag_get_theme_option( 'layout', 1 ) == 'none' || ! is_active_sidebar( 'sidebar-1' ) && ! is_page_template( 'template-homepage.php' ) ) {
				$classes[] = 'none-sidebar';
			}

			if ( is_page_template( 'template-homepage.php' ) ) {
				$classes[] = 'magazin-template';
			}

			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			if ( ( $paged == 1 && is_front_page() && Satmag_get_theme_option('homepage_slide', 1) == 1 ) || ( is_single() && has_post_thumbnail() ) || (is_page_template( 'template-homepage.php' ) && Satmag_get_theme_option('homepage_slide', 1) == 1) ) {
				$classes[] = 'gap-st-one';
			} else {
				$classes[] = 'gap-st-two';
			}

			return $classes;
		}

	}

endif;

return new Satmag();
