<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package  satmag
 */

get_header(); ?>
	<div id="primary" class="content-grid">
		<main id="main" class="site-main" role="main">

			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			if ( $paged == 1 ) : ?>
				<div class="section-header">
					<h2 class="section-title">
						<?php echo esc_html( satmag_get_theme_option( 'homepage_latest_posts_title', 'Latest Post' ) ); ?>
					</h2>
				</div> <!-- .section-header -->
			<?php endif; ?> 

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
get_footer();
