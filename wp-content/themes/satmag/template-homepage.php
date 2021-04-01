<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package	satmag
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php 

			$cl_slide = '';

			$no_slide = satmag_get_theme_option( 'homepage_slide' , '1' );
			if ( $no_slide == 0) {
				$cl_slide = ' no-slide';
			}
			?>	

			<div class="megazine-wrap<?php echo $cl_slide; ?>">

			<?php
				/**
				 * Functions hooked in to satmag_before_content
				 *
				 * @hooked satmag_homepage_render				- 10
				 *
				 */
				do_action( 'satmag_magazine_layout' ); ?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
