<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SatmaG
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'satmag_before_site' ); ?>

<div id="page" class="hfeed site">

	<?php do_action( 'satmag_before_header' ); ?>

	<header id="masthead" class="site-header" role="banner">

		<div id="sticky" class="mag-full">

			<?php
			/**
			 * Functions hooked into satmag_header action
			 *
			 */
			do_action( 'satmag_header' ); ?>
			
		</div>

	</header><!-- #masthead -->


	<?php
	/**
	 * Functions hooked in to satmag_before_content
	 *
	 */
	do_action( 'satmag_before_content' ); ?>

	<div id="content" class="site-content" tabindex="-1">
		
		<div class="column-wrap">

		<?php
		do_action( 'satmag_content_top' );
