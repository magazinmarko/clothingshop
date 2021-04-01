<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package  satmag
 */

get_header();

?>

	<div id="primary" class="content-grid">
		<main id="main" class="site-main search-result" role="main">
			
			<header class="page-header">

				<h1 class="page-title"><?php printf( esc_attr__( 'Search Results for: %s', 'satmag' ), '<em>' . get_search_query() . '</em>' ); ?></h1>

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
				
				get_search_form();
				

			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// do_action( 'satmag_sidebar' );

get_footer();
