<?php
/**
 * The template git or displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package satmag
 */
?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'satmag_before_footer' ); ?>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked satmag_footer_logo				- 10
			 * @hooked satmag_footer_widgets			- 20
			 * @hooked satmag_footer_block_left			- 30
			 * 
			 */
			do_action( 'satmag_footer_block' ); ?>
		</footer><!-- #colophon -->

		

	</div><!-- #page -->

	<?php do_action( 'satmag_after_footer' ); ?>

	<?php wp_footer(); ?>

</body>
</html>