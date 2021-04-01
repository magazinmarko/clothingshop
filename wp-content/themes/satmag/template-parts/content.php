<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SatmaG
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('gap-col post-item clearfix'); ?>>

	<?php
	/**
	 * Functions hooked in to basepress_loop_post action.
	 *
	 * @hooked satmag_post_header          - 10
	 * @hooked satmag_post_meta            - 20
	 * @hooked satmag_post_content         - 30
	 * @hooked satmag_init_structured_data - 40
	 */
	do_action( 'satmag_loop_post' );

	?>	
	
</article><!-- #post-## -->