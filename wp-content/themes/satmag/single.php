<?php
/**
 * The template for displaying all single posts.
 *
 * @package satmag
 */

get_header(); ?>

	<div id="primary" class="gap-single-full content-area">
		<main id="main" class="site-main" role="main">
			
			<?php while ( have_posts() ) : the_post();

				do_action( 'satmag_single_post_before' );

				get_template_part( 'template-parts/content', 'single' );

				do_action( 'satmag_single_post_after' );

			endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
