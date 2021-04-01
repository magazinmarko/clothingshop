<?php
/**
 * Template used to display post content on single pages.
 *
 * @package satmag
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-content clearfix'); ?>>

	<?php
	do_action( 'satmag_single_post_top' );

	/**
	 * Functions hooked into satmag_single_post add_action
	 *
	 * @hooked satmag_post_header          - 10
	 * @hooked asatmag_post_meta           - 20
	 * @hooked satmag_post_content         - 30
	 */
	do_action( 'satmag_single_post' );

	/**
	 * Functions hooked in to satmag_single_post_bottom action
	 *
	 * @hooked satmag_post_nav         - 10
	 * @hooked satmag_display_comments - 20
	 */
	do_action( 'satmag_single_post_bottom' );
	?>

</article><!-- #post-## -->
