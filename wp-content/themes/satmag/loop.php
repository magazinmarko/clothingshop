<?php
/**
 * The loop template file.
 *
 * Included on pages like index.php, archive.php and search.php to display a loop of posts
 * Learn more: http://codex.wordpress.org/The_Loop
 *
 * @package  satmag
 */

do_action( 'satmag_loop_before' );


	/* Start the Loop */
	while ( have_posts() ) : the_post();

	/*
	 * Include the Post-Format-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
		get_template_part( 'template-parts/content', get_post_format() );

	endwhile;


/**
 * Functions hooked in to satmag_paging_nav action
 *
 * @hooked satmag_paging_nav - 10
 */
do_action( 'satmag_loop_after' );