<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SatmaG
 */

get_header();
?>

	<div id="primary" class="content-grid">
		<main id="main" class="site-main" role="main">
			
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			if ( have_posts() ) :
			?>

				<div class="post-wrap clearfix">
					<div class="gap-3 gap-grid">
						<?php get_template_part( 'loop' ); ?>
					</div>
				</div>

			<?php
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// do_action( 'satmag_sidebar' ).
get_footer();
