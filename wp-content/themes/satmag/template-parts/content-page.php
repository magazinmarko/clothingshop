<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package  satmag
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked in to satmag_page add_action
	 *
	 * @hooked satmag_page_header          - 10
	 * @hooked satmag_page_content         - 20
	 * @hooked satmag_init_structured_data - 30
	 */
	do_action( 'satmag_page' );
	?>

	<?php if ( get_edit_post_link() ) : ?>
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'satmag' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
	<?php endif; ?>
</article><!-- #post-## -->
