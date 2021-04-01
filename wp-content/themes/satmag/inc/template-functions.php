<?php
/**
 * Satmag template functions.
 *
 * @author  ThemeCountry
 * @since 	1.0.0
 * @package satmag
 */

if ( ! function_exists( 'satmag_skip_links' ) ) {
	/**
	 * Skip links
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function satmag_skip_links() {
		?>

			<a class="skip-link screen-reader-text" href="#site-navigation"><?php esc_attr_e( 'Skip to navigation', 'satmag' ); ?></a>
			<a class="skip-link screen-reader-text" href="#content"><?php esc_attr_e( 'Skip to content', 'satmag' ); ?></a>

		<?php
	}
}


if ( ! function_exists( 'satmag_site_branding' ) ) {
	/**
	 * Site branding wrapper and display
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function satmag_site_branding() {
		?>
		<div id="logo" class="site-branding clearfix">
			<?php satmag_site_title_or_logo(); ?>
		</div>
		<?php
	}
}


if ( ! function_exists( 'satmag_site_title_or_logo' ) ) {
	/**
	 * Display the site title or logo
	 *
	 * @since 1.0.0
	 * @param bool $echo Echo the string or return it.
	 * @return string
	 */
	function satmag_site_title_or_logo( $echo = true ) {

		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {

			$logo = get_custom_logo();
			$html = is_home() ? '<h1 class="header-logo logo-text">' . $logo . '</h1>' : $logo;

		} elseif ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {

			// Copied from jetpack_the_site_logo() function.
			$logo    = site_logo()->logo;
			$logo_id = get_theme_mod( 'custom_logo' ); // Check for WP 4.5 Site Logo
			$logo_id = $logo_id ? $logo_id : $logo['id']; // Use WP Core logo if present, otherwise use Jetpack's.
			$size    = site_logo()->theme_size();
			$html    = sprintf( '<a href="%1$s" class="site-logo-link" rel="home" itemprop="url">%2$s</a>',
				esc_url( home_url( '/' ) ),
				wp_get_attachment_image(
					$logo_id,
					$size,
					false,
					array(
						'class'     => 'site-logo attachment-' . $size,
						'data-size' => $size,
						'itemprop'  => 'logo'
					)
				)
			);

			$html = apply_filters( 'jetpack_the_site_logo', $html, $logo, $size );

		} else {

			$tag = is_home() ? 'h1' : 'h2';

			$html = '<' . esc_attr( $tag ) . ' class="header-logo"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a></' . esc_attr( $tag ) .'>';

			if ( '' !== get_bloginfo( 'description' ) ) {
				$html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
			}

		}

		if ( ! $echo ) {

			return $html;
		}

		echo $html;
	}
}

if ( ! function_exists( 'satmag_hero_header' ) ) {

	/**
	 * Display close wrap content div
	 *
	 * @since 1.0.0
	 */
	function satmag_hero_header() {

		echo '<div class="button-header"><div class="column-wrap">';
	}

}

if ( ! function_exists( 'satmag_hero_header_close' ) ) {

	/**
	 * Display close wrap content div
	 *
	 * @since 1.0.0
	 */
	function satmag_hero_header_close() {

		echo '</div></div><!-- .button-header -->';

	}
}

if ( ! function_exists( 'satmag_hero_logo' ) ) {

	/**
	 * Display close wrap content div
	 *
	 * @since 1.0.0
	 */
	function satmag_hero_logo() {

		echo '<div class="nav-logo">';

		satmag_toggle_mobile();
		satmag_site_branding();

		echo '</div><!-- .nav-logo -->';

	}

}


if ( ! function_exists( 'satmag_header_right_path' ) ) {

	/**
	 * Display close wrap content div
	 *
	 * @since 1.0.0
	 */
	function satmag_header_right_path() {

		echo '<div class="right-menu">';

		satmag_social_menu();
		satmag_search();

		echo '</div><!-- .right-menu -->';

	}

}

if ( ! function_exists( 'satmag_social_menu' ) ) {

	function satmag_social_menu() {

		if ( has_nav_menu( 'social' )): 

			?>
			
				<div class="social-menu-wrap">

					<?php

						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_id' 		 => 'social-menu',
							'container' 	 => '',
							'menu_class' 	 => 'social-menu',
							)
						);

					?>
				</div> <!-- .social-menu -->

			<?php 

		endif;
	}

}

if ( ! function_exists( 'satmag_search' ) ) {

	function satmag_search() {

		?>

		<div class="search">

			<span id="trigger-overlay">
				<i class="fas fa-search"></i>
			</span>

		</div><!-- .search -->

	<?php

	}

}


if ( ! function_exists( 'satmag_light_box' ) ) {

	/**
	 * Light Box
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function satmag_light_box() {

		if ( has_nav_menu( 'primary' ) ) : ?>

			<div id="lightbox"></div>

		<?php

		endif;
	}
}


if ( ! function_exists( 'satmag_search_overlay' ) ) {

	function satmag_search_overlay() { ?>

		<div id="search-overlay">
			<div class="search-overlay-inner">
				<i class="fas fa-times search-close"></i>
				<?php
					/**
					 * Search Form
					 *
					 * @search from wordpress
					 */
					echo get_search_form();
				?>
				<p class="search-label">
					<?php esc_html__( 'Type keyword to search','satmag' ) ?>
				</p>
			</div>
		</div>

	<?php
	}
}

if ( ! function_exists( 'satmag_toggle_mobile' ) ) {
	/**
	 * Button back to top.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function satmag_toggle_mobile() {

		if( has_nav_menu('primary') )  {
		?>

			<span class="menu-toggle">
				<span class="screen-reader-text"><?php esc_html_e( 'Go to main menu', 'satmag' ); ?></span>
			</span>
		
		<?php
		}
	}
	
}

if ( ! function_exists( 'satmag_primary_navigation' ) ) {

	function satmag_primary_navigation() {

		if ( has_nav_menu( 'primary' ) ) :
		?>
		
			<nav id="site-navigation" class="main-navigation default-menustyle" role="navigation">

				<div class="column-wrap">

					<?php
						wp_nav_menu( array(
							'theme_location'	=> 'primary',
							'menu_id'			=> 'primary-navigation',
							'container'			=> '',
							'menu_class'		=> 'main-navigation-menu',
							)
						);

					?>
				</div>
			</nav><!-- #site-navigation -->
			<div id="catcher" class="mag-full"></div>
		
		<?php
		endif;
	}
}

/**
*------------------------------------------------------------------------------
* Display Ads After Featured : 970x90
*------------------------------------------------------------------------------
*/

function satmag_block_ads() { 

	$banner = html_entity_decode ( satmag_get_theme_option('satmag_block_ads'), ENT_QUOTES );
	if ($banner) {
		?>
		<div class="gap-block-ads">
			<div class="ads-970x90">
				<?php echo $banner; ?>
			</div>
		</div>
		<?php
	}
}


/**
*------------------------------------------------------------------------------
* Posts
*------------------------------------------------------------------------------
*/

if ( ! function_exists( 'satmag_homepage_posts' ) ) :

	/**
	 * Display Homepage Style.
	 *
	 * @since 1.0.1
	 */

	function satmag_homepage_posts( $class, $thumb ) {
	?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

		<div class="post-thumbnail">
			<a href="<?php the_permalink() ?>" rel="bookmark" class="maga-thumb">		
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( $thumb ); ?>
				<?php else : ?>
					<img class="wp-post-image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/<?php echo $thumb; ?>.jpg" />
				<?php endif; ?>
			</a>
		</div>

		<div class="gap-content">
			<?php
			satmag_meta_cats();
			the_title( sprintf( '<h3 class="gap-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			?>
		</div>

	</article><!-- article -->

	<?php
	}

endif;

if ( ! function_exists( 'satmag_get_post_thumbnail_url' ) ) :

	/**
	 * Display Homepage Style.
	 *
	 * @since 1.0.1
	 */

	function satmag_get_post_thumbnail_url( $size = 'post-thumbnail' ) {
		$url = get_the_post_thumbnail_url( null, $size );
		if ( $url ) {
			echo esc_url( $url );
		}
	}
endif;

if ( ! function_exists( 'satmag_homepage_slide' ) ) :

	/**
	 * Display Homepage Style.satmag_get_post_thumbnail_url
	 *
	 * @since 1.0.1
	 */

	function satmag_homepage_slide() {

		if ( satmag_get_theme_option( 'homepage_slide', 'on' ) == 'on' ) {
			
			$num_posts = absint(satmag_get_theme_option( 'homepage_slide_number', 3 ));
			$cat_id = satmag_get_theme_option( 'homepage_slide_category', 0 );

			$query_arguments = array(
				'posts_per_page'		=> $num_posts,
				'ignore_sticky_posts'	=> true,
			);

			if ( $cat_id > 0 ) {
				$query_arguments['cat'] = $cat_id;
			}
	
			$posts_query = new WP_Query( $query_arguments );

			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			if ( $paged < 2 ) :

			?>

			<div id="banner-slider" class="slider-section">
				<div class="owl-carousel owl-theme">

					<?php
					if( $posts_query->have_posts() ) :
						while( $posts_query->have_posts() ) :
						$posts_query->the_post();
						?>

						<div class="slide-item site-header-inner">
							<div class="item-bg" style="background-image: url(<?php echo satmag_get_post_thumbnail_url(get_the_ID(), 'satmag-banner-thumbnail'); ?>)"><img class="" src="<?php echo satmag_get_post_thumbnail_url(get_the_ID(), 'satmag-banner-thumbnail'); ?>" /></div>
							
							<header class="page-header">
								<?php the_title( sprintf( '<h2 class="page-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
								
								<div class="taxonomy-description"><?php the_excerpt(); ?></div>
								
								<a href="<?php the_permalink() ?>" rel="bookmark" class="introl-button">Continue Reading</a>
							</header>
						</div>

						<?php
						endwhile; 
					endif;
					wp_reset_postdata();
					?>

				</div>
				<div class="overlay-screen"></div>
			</div>

		<?php
			endif;
		}
	}

endif;


if ( ! function_exists( 'satmag_homepage_render' ) ) :

	/**
	 * Display Homepage Style.
	 *
	 * @since 1.0.1
	 */

	function satmag_homepage_latest_posts() {

		if ( satmag_get_theme_option( 'homepage_latest_posts', 'off' ) == 'on' ) {
			
			$num_posts = absint(satmag_get_theme_option( 'homepage_latest_posts_num', 3 ));

			$query_arguments = array(
				'posts_per_page'		=> $num_posts,
				'ignore_sticky_posts'	=> true,
				'category'				=> 0,
			);
			
			$posts_query = new WP_Query( $query_arguments );
			?>

			<section class="section-latest default-section">
				
				<div class="col-max">
					<div class="section-header">
						<h2 class="section-title">
							<?php echo esc_html( satmag_get_theme_option( 'homepage_latest_posts_title', 'Latest News' ) ); ?>
						</h2>
					</div>

					<div class="gap-3 gap-grid">
						
						<?php
						if( $posts_query->have_posts() ) :
							while( $posts_query->have_posts() ) :
							$posts_query->the_post();

								satmag_homepage_posts('gap-col', 'satmag-medium-thumbnail');

							endwhile; 
						endif;
						wp_reset_postdata();
						?>

					</div>
				</div>
			</section><!-- end .default-section -->

		<?php
		}
	}

endif;

if ( ! function_exists( 'satmag_homepage_render' ) ) :

	/**
	 * Display Homepage Style.
	 *
	 * @since 1.0.1
	 */

	function satmag_homepage_render() {

		$homepage_style = satmag_get_theme_option( 'custom_homepage_control', array() );

		if ( ! empty( $homepage_style ) && is_array( $homepage_style ) ) :
			
			foreach ( $homepage_style as $homepage_style_id => $homepage_style_label ) :

				$num_grids = isset( $homepage_style_label['box_post'] ) ? $homepage_style_label['box_post'] : 3;
				if( $num_grids != 5 ) {$num_posts = $num_grids;} else {$num_posts = 4;}
				
				$gap_magazine_class = 'gap-' . $num_grids;
				$title_section = $homepage_style_label['link_text'];
				$cat_id = intval( $homepage_style_label['category_post'] );

				$query_arguments = array(
					'posts_per_page'		=> $num_posts,
					'ignore_sticky_posts'	=> true,
				);

				if ( $cat_id > 0 ) {
					$query_arguments['cat'] = $cat_id;
				}

				$posts_query = new WP_Query( $query_arguments );
				?>

				<section class="default-section">

					<?php if ( $num_grids != 1 ) { echo '<div class="col-full">'; } else { echo '<div class="gap-section-full col-full">'; } ?>

						<?php satmag_homepage_section_title( $title_section, $cat_id ); ?>
					
					<?php if ( $num_grids == 4 ) : ?>

						<?php
							$i = 0;
							if( $posts_query->have_posts() ) :
								while( $posts_query->have_posts() ) :
								$posts_query->the_post();

								if( isset($i) and $i == 0 ) :
									?>

									<div class="gap-feature">
										<article id="post-<?php the_ID(); ?>" <?php post_class('gap-grid gap-middle'); ?>>

											<div class="gap-lg-one gap-col">
												<div class="post-thumbnail">
													<a href="<?php the_permalink() ?>" rel="bookmark" >
														<?php if ( has_post_thumbnail() ) : ?>
															<?php the_post_thumbnail( 'satmag-large-thumbnail' ); ?>
														<?php else : ?>
															<img class="wp-post-image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/satmag-large-thumbnail.jpg" />
														<?php endif; ?>
													</a>
												</div>
											</div>

											<div class="gap-display-middle gap-sm gap-col">
												<div class="special-gap-main">
													<?php satmag_meta_cats(); ?>
													<?php the_title( sprintf( '<h3 class="gap-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
													<p><?php echo satmag_excerpt(20); ?></p>
												</div>
											</div>

										</article><!-- article -->
									</div>

									<div class="gap-feature-grid gap-3 gap-grid">
									
									<?php else : ?>

										<?php satmag_homepage_posts('gap-col', 'satmag-medium-thumbnail'); ?>
									
									<?php
								endif; $i++;
								endwhile; 
							endif;
							?>
							<!-- </div> -->
						</div>

					<?php elseif ( $num_grids == 5 ) : ?>

						<div class="gap-section-main">

							<?php
							$i = 0;
							if( $posts_query->have_posts() ) :
								while( $posts_query->have_posts() ) :
								$posts_query->the_post();

								if( isset($i) and $i == 0 ) :
									?>

									<div class="gap-feature">
										<article id="post-<?php the_ID(); ?>" <?php post_class('gap-grid gap-middle'); ?>>

											<div class="gap-display-middle gap-sm gap-col">
												<div class="special-gap-main">
													<?php satmag_meta_cats(); ?>
													<?php the_title( sprintf( '<h3 class="gap-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
													<p><?php echo satmag_excerpt(20); ?></p>
												</div>
											</div>

											<div class="gap-lg-two gap-col">
												<div class="post-thumbnail">
													<a href="<?php the_permalink() ?>" rel="bookmark" >
														<?php if ( has_post_thumbnail() ) : ?>
															<?php the_post_thumbnail( 'satmag-large-thumbnail' ); ?>
														<?php else : ?>
															<img class="wp-post-image" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/satmag-large-thumbnail.jpg" />
														<?php endif; ?>
													</a>
												</div>
											</div>

										</article><!-- article -->
									</div>

									<div class="gap-feature-grid gap-3 gap-grid">
									
									<?php else : ?>

										<?php satmag_homepage_posts('gap-col', 'satmag-medium-thumbnail'); ?>
									
									<?php
								endif; $i++;
								endwhile;
							endif;
							?>
							</div>
						</div>

					<?php elseif ( $num_grids == 1 ) : ?>

						<div class="gap-1 gap-grid">
							<?php
							if( $posts_query->have_posts() ) :
								while( $posts_query->have_posts() ) :
								$posts_query->the_post();

									satmag_homepage_posts( 'gap-col', 'satmag-xlarge-thumbnail' );

								endwhile; 
							endif;
							?>
						</div>

					<?php elseif ( $num_grids == 2 ) : ?>

						<div class="gap-2 gap-grid">
							<?php
							if( $posts_query->have_posts() ) :
								while( $posts_query->have_posts() ) :
								$posts_query->the_post();

									satmag_homepage_posts('gap-col', 'satmag-large-thumbnail');

								endwhile; 
							endif;
							?>
						</div>

					<?php else : ?>

						<div class="<?php echo $gap_magazine_class; ?> gap-grid">
							<?php
							$i = 0;
							if( $posts_query->have_posts() ) :
								while( $posts_query->have_posts() ) :
								$posts_query->the_post();

									satmag_homepage_posts('gap-col', 'satmag-large-thumbnail');

								endwhile; 
							endif;
							?>
						</div>

					<?php endif; ?>

					<?php if ( $num_grids != 1 ) { echo '</div>'; } ?>

				</section><!-- end .row-box -->

			<?php
			endforeach;
		endif;

	}

endif;


if ( ! function_exists( 'satmag_site_header_inner' ) ) {
	/**
	 * Credit wrapper
	 */
	function satmag_site_header_inner() {

		if ( is_front_page() || is_page_template( 'template-homepage.php' ) ) :
			
			satmag_homepage_slide();

		elseif ( is_single() ) :
			?>
			
			<?php
			if ( has_post_thumbnail() ) :
				$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail');
				$image = $img[0];

				echo '<div id="custom-bg" class="site-header-inner clearfix" style="background-image: url(' . $image . ')"></div>';
			endif;
			?>

			
			
			<?php

		endif;
	}
}


if ( ! function_exists( 'satmag_back_to_top' ) ) {
	/**
	 * Button back to top.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function satmag_back_to_top() {
		if ( satmag_get_theme_option( 'satmag_back_to_top', true ) ) :
		?>
			<span class="back-to-top"><i class="fa fa-chevron-up"></i></span>
		<?php
		endif;
	}

}


if ( ! function_exists( 'satmag_post_thumbnail' ) ) :
	/**
	 * Display Post Thumbnail
	 */
	function satmag_post_thumbnail() {

		$size = apply_filters( 'satmag_post_thumbnail_size', 'satmag-medium-thumbnail' );

		?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink() ?>" rel="bookmark">
					<?php satmag_the_post_thumbnail( $size, '', true ) ?>
				 </a>
			</div>
		<?php

	}

endif;


if ( ! function_exists( 'satmag_post_header' ) ) :

			/**
	 * Display post single header
	 */

	function satmag_post_header() {
		?>

		<header class="entry-header">

			<?php

			if ( is_single() ) {
				do_action( 'satmag_before_single_title' );
				the_title( '<h1 class="entry-title single-title">', '</h1>' );
			} else {
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			}

			do_action( 'satmag_after_post_title' );
			?>

		</header><!-- .entry-header -->

		<?php
	}

endif;


if ( ! function_exists( 'satmag_single_post_thumbnail' ) ) :
	/**
	 * Display Post Thumbnail
	 */
	function satmag_single_post_thumbnail() {
		?>

		<div class="top-single-image">
			<?php the_post_thumbnail( 'satmag-large-thumbnail' ); ?>
		</div>

		<?php
	}

endif;


if ( ! function_exists( 'satmag_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function satmag_paging_nav() {
	
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$nav_style = 'paging-numberal';

	//$theme_options['paging'];

	if  ( $nav_style == 'paging-numberal' ) :
		
		// Previous/next page navigation.
		the_posts_pagination( array(
			'prev_text'          => '<i class="fa fa-angle-left"></i>',
			'next_text'          => '<i class="fa fa-angle-right"></i>',
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'satmag' ) . ' </span>',
		) );

	else :

		satmag_pagination_default();
	
	endif;

}
endif;


if ( ! function_exists( 'satmag_pagination_default' ) ) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function satmag_pagination_default() {
		?>

		<nav class="pagination-default clearfix" role="navigation">
			<span class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'satmag' ); ?></span>
			<div class="nav-links">

				<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav"><i class="fa fa-angle-left"></i></span> Previous', 'satmag' ) ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
				<div class="nav-next"><?php previous_posts_link( __( 'Next <span class="meta-nav"><i class="fa fa-angle-right"></i></span>', 'satmag' ) ); ?></div>
				<?php endif; ?>

			</div><!-- .nav-links -->
		</nav><!-- .navigation -->

	<?php
	}
endif;

if ( ! function_exists( 'satmag_post_on' ) ) :

	/**
	 * Display post on
	 */

	function satmag_post_on() {

		$posted_on = apply_filters( 'satmag_posted_on_show', true );

		?>
			<?php if ( 'post' === get_post_type() && $posted_on ) : ?>
				<?php satmag_posted_on(); ?>
			<?php endif; ?>

		<?php
	}

endif;


if ( ! function_exists( 'satmag_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function satmag_posted_on() {
		global $post;
		$author_id=$post->post_author;
	
		$meta_options = satmag_get_theme_option( 'general_posts_metadata', array('date', 'tag', 'author') );
	
		if(empty($meta_options))
			return;
	
		if(is_array($meta_options))
			$meta_options = array_flip($meta_options);
	
		echo '<div class="entry-meta">';
	
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%3$s">%4$s</time>';
		}
	
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
	
		$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';
	
		$byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( $author_id ) ) . '">' . esc_html( get_the_author_meta( 'display_name', $author_id ) ) . '</a>';
	
		if ( isset ( $meta_options['date'] ) ) {
	
			printf( '<span class="posted-on"> ' . esc_html__( ' %1$s ', 'satmag' ) . ' </span>', $posted_on );
		}
	
		if ( isset ( $meta_options['author'] ) ) {
	
			printf( '<span class="author">' . esc_html__( 'By %1$s ', 'satmag' ) . ' </span>', $byline );
		}
	
		if ( isset( $meta_options['comment'] ) ) :
	
			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">';
				/* translators: %s: post title */
				comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'satmag' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
				echo '</span>';
			}
	
		endif;
	
		echo '</div><!-- .entry-meta -->';
	
	}

endif;


if ( ! function_exists( 'satmag_post_nav' ) ) {

	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function satmag_post_nav() {
		
		if( satmag_get_theme_option( 'single_post_show_nav', true ) ) {
			$args = array(
				'next_text' => '%title',
				'prev_text' => '%title',
			);

			$enable_postnav = apply_filters('satmag_enable_postnav', true);

			if ( $enable_postnav ) {

				the_post_navigation( $args );

			}
		}

	}
}

if ( ! function_exists( 'satmag_display_comments' ) ) {
	/**
	 * Satmag display comments
	 *
	 * @since  1.0.0
	 */
	function satmag_display_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	}
}

/**
|------------------------------------------------------------------------------
| Excerpt
|------------------------------------------------------------------------------
|
*/
function satmag_excerpt_length( $length ) {

	$excerpt_length = satmag_get_theme_option( 'general_post_excerpt_length' , 20 );
	$number = intval ($excerpt_length) > 0 ? intval ($excerpt_length) : $length;
	
	if ( is_admin() ) {
		return $length;
	}
	return $number;
}
add_filter( 'excerpt_length', 'satmag_excerpt_length', 999 );

function satmag_excerpt_more( $more ) {

	return satmag_get_theme_option( 'general_post_show_excerpt_more' , ' ...' );

}
add_filter('excerpt_more', 'satmag_excerpt_more');



/*
|------------------------------------------------------------------------------
| Truncate string to x letters/words
|------------------------------------------------------------------------------
*/

function satmag_truncate( $str, $length = 40, $units = 'letters', $ellipsis = '&nbsp;&hellip;' ) {
	if ( $units == 'letters' ) {
		if ( mb_strlen( $str ) > $length ) {
			return mb_substr( $str, 0, $length ) . $ellipsis;
		} else {
			return $str;
		}
	} else {
		$words = explode( ' ', $str );
		if ( count( $words ) > $length ) {
			return implode( " ", array_slice( $words, 0, $length ) ) . $ellipsis;
		} else {
			return $str;
		}
	}
}

if ( ! function_exists( 'satmag_excerpt' ) ) {
	function satmag_excerpt( $limit = 40 ) {
	  return satmag_truncate( get_the_excerpt(), $limit, 'words' );
	}
}




if ( ! function_exists( 'satmag_homepage_section_title' ) ) : 

	function satmag_homepage_section_title( $title_section, $cat_id ) {
		
		$category_link = get_category_link( $cat_id );
		?>

		<div class="section-header">
			<h2 class="section-title">
				<?php if ( $category_link ) : ?>
					<a href="<?php echo esc_url( $category_link ); ?>"><?php echo esc_html( $title_section ); ?></a>
				<?php else : ?>
					<?php echo esc_html( $title_section ); ?>
				<?php endif; ?>
			</h2>
		</div>

		<?php
	}

endif;


if ( ! function_exists( 'satmag_meta_cats' ) ) :

	/**
	 * Display post on
	 */

	function satmag_meta_cats() {

		$option_cats = satmag_get_theme_option( 'single_post_metadata_cats', true );
		$meta_cats = get_the_category_list( esc_html__( ', ', 'satmag' ) );

		if ( $option_cats && $option_cats ) :
			printf( '<span class="introl-cat">' . esc_html__( ' %1$s ', 'satmag' ) . ' </span>', $meta_cats ); // WPCS: XSS OK.
		endif;

	}

endif;


if ( ! function_exists( 'satmag_meta_tags' ) ) :

	/**
	 * Display post on
	 */

	function satmag_meta_tags() {

		$option_cats = satmag_get_theme_option( 'single_post_metadata_tags', true );
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'satmag' ) );

		if ( $option_cats && $tags_list ) :
			printf( '<span class="custom-tag introl-cat">' . esc_html__( 'Tag : %1$s ', 'satmag' ) . ' </span>', $tags_list ); // WPCS: XSS OK.
		endif;

	}

endif;


if ( ! function_exists( 'satmag_meta_tags_top' ) ) :

	/**
	 * Display post on
	 */

	function satmag_meta_tags_top() {

		print_r('<div class="meta-tags-top">');
			satmag_meta_cats();
		print_r('</div>');

	}

endif;

if ( ! function_exists( 'satmag_meta_tags_bottom' ) ) :

	/**
	 * Display post on
	 */

	function satmag_meta_tags_bottom() {
		if (has_tag()) {
			print_r('<div class="meta-tags-bottom">');
				satmag_meta_tags();
			print_r('</div>');
		}

	}

endif;


if ( ! function_exists( 'satmag_post_on' ) ) :

	/**
	 * Display post on
	 */

	function satmag_post_on() {
		$posted_on = apply_filters( 'satmag_posted_on_show', true );

		?>
			<?php if ( 'post' === get_post_type() && $posted_on ) : ?>
				<?php satmag_posted_on(); ?>
			<?php endif; ?>

		<?php
	}

endif;

if ( ! function_exists( 'satmag_meta_cat_top' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time.
 */
function satmag_meta_cat_top() {

	$meta_options = satmag_get_theme_option( 'general_posts_metadata', array('category') );

	if(empty($meta_options))
		return;

	if(is_array($meta_options))
		$meta_options = array_flip($meta_options);

	echo '<div class="entry-meta">';

	$categories_list = get_the_category_list( esc_html__( ', ', 'satmag' ) );

	if ( isset ( $meta_options['category'] ) && $categories_list ) {

		printf( '<span class="cat-links"> ' . esc_html__( ' %1$s ', 'satmag' ) . ' </span>', $categories_list ); // WPCS: XSS OK.
	}

	echo '</div><!-- .entry-meta -->';

}
endif;



if ( ! function_exists( 'satmag_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time.
 */
function satmag_posted_on() {
	
	$meta_options = satmag_get_theme_option( 'satmag_meta_info', array('date', 'category', 'tag') );

	if( empty($meta_options) )
		return;

	if( is_array($meta_options) )
		$meta_options = array_flip($meta_options);

	echo '<div class="entry-meta">';

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%3$s">%4$s</time>';
	}

	$categories_list = get_the_category_list( esc_html__( ', ', 'satmag' ) );

	$tags_list = get_the_tag_list( '', esc_html__( ', ', 'satmag' ) );

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

	$byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>';

	if ( isset ( $meta_options['author'] ) ) {

		printf( '<span class="author"><i class="fa fa-user"></i> ' . esc_html__( ' %1$s ', 'satmag' ) . ' </span>', $byline );
	}

	if ( isset ( $meta_options['date'] ) ) {

		printf( '<span class="posted-on"><i class="fa fa-clock-o"></i> ' . esc_html__( ' %1$s ', 'satmag' ) . ' </span>', $posted_on );
	}

	if ( ! is_single() && isset ( $meta_options['category'] ) && $categories_list ) {
		
		printf( '<span class="cat-links"><i class="fa fa-archive" aria-hidden="true"></i>' . esc_html__( ' %1$s ', 'satmag' ) . ' </span>', $categories_list ); // WPCS: XSS OK.
	}

	if ( ! is_single() && isset ($meta_options['tag'] ) && $tags_list  ) {
		
		printf( '<span class="tags-links"><i class="fa fa-tags" aria-hidden="true"></i>' . esc_html__( ' %1$s ', 'satmag' ) . ' </span>', $tags_list ); // WPCS: XSS OK.
	}

	echo '</div><!-- .entry-meta -->';

}
endif;

if ( ! function_exists( 'satmag_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function satmag_post_by() {
		
		$meta_options = satmag_get_theme_option( 'satmag_meta_info', array('author') );

		if(empty($meta_options))
			return;

		if(is_array($meta_options))
			$meta_options = array_flip($meta_options);

		echo '<div class="author-meta">';

		$byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>';

		if ( isset ( $meta_options['author'] ) ) { 
		?>
		
		<div class="bio-avatar"><?php echo get_avatar(get_the_author_meta('user_email'),'50'); ?></div>
		<?php
			printf('<span class="author"> '. esc_html__( ' %1$s ', 'satmag' ) . ' </span>', $byline );
		}
		echo '</div><!-- .author-meta -->';

	}

endif;

if ( ! function_exists( 'satmag_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function satmag_post_content() {

		$excerpt = satmag_get_theme_option( 'general_post_show_excerpt', true );
		?>

		<!-- <div class="entry-content"> -->
		<div class="gap-content">
		
			<?php
			/**
			 * Functions hooked in to azauthority_post_content_before asction.
			 *
			 * @hooked azauthority_post_thumbnail - 10
			 */
			do_action( 'satmag_post_content_before' );

				if ( $excerpt ) {

					the_excerpt();

				}
			?>

			<?php
			do_action( 'satmag_post_content_after' );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'satmag' ),
				'after'  => '</div>',
			) );

			do_action( 'satmag_loop_post_by' );
			?>

		</div><!-- .entry-content -->

		<?php
	}
}

if ( ! function_exists( 'satmag_footer_logo' )  ) {
	/**
	 * Display the footer widget regions.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function satmag_footer_logo() {
		$footer_logo = satmag_get_theme_option( 'footer_logo');
		$footer_search = satmag_get_theme_option( 'footer_search', false );
		?>

		<?php if( $footer_logo != '' && $footer_search != false ) : ?>

			<div class="section-footer">
				<div class="footer-branding">
					<div class="column-wrap">

					<?php
					if( $footer_logo == true ) : ?>
						<div class="footer-logo">
							 <img class="wp-post-image" src="<?php echo $footer_logo; ?>"/>
						</div>
					<?php endif; ?>

					<?php if( $footer_search == true ) : ?>
						<div class="footer-search"><?php get_search_form() ?></div>
					<?php endif; ?>

				</div><!-- .footer-branding -->
				</div>
			</div>

		<?php endif; ?>

		<?php

	}
}


if ( ! function_exists( 'satmag_footer_widgets' ) ) {
	
	/**
	 * Display the footer widget regions.
	 *
	 * @since  1.0.0
	 * @return void
	 */

	function satmag_footer_widgets() {
		$rows    = intval( apply_filters( 'satmag_footer_widget_rows', 1 ) );
		$regions = intval( apply_filters( 'satmag_footer_widget_columns', 5 ) );

		for ( $row = 1; $row <= $rows; $row++ ) :

			// Defines the number of active columns in this footer row.
			for ( $region = $regions; 0 < $region; $region-- ) {
				if ( is_active_sidebar( 'footer-' . strval( $region + $regions * ( $row - 1 ) ) ) ) {
					$columns = $region;
					break;
				}
			}

			if ( isset( $columns ) ) :
				?>
				
				<div class="section-footer">
					<div class=<?php echo '"footer-widgets column-wrap gap-grid gap-' . strval( $columns ) . '"'; ?>>

						<?php
						for ( $column = 1; $column <= $columns; $column++ ) :
							$footer_n = $column + $regions * ( $row - 1 );

							if ( is_active_sidebar( 'footer-' . strval( $footer_n ) ) ) : ?>

								<div class="gap-col footer-widget-<?php echo strval( $column ); ?>">
									<?php dynamic_sidebar( 'footer-' . strval( $footer_n ) ); ?>
								</div><?php

							endif;
						endfor;
						?>

					</div><!-- footer-widgets gap-grid -->
				</div>

				<?php
				unset( $columns );
			endif;
		endfor;
	}
}


if ( ! function_exists( 'satmag_footer_copyright' ) ) {
	/**
	 * Display single post header
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function satmag_footer_copyright() {

		$title = satmag_get_theme_option( 'footer_title' );
		$description = satmag_get_theme_option( 'footer_description' );

		if ( has_nav_menu( 'footer' ) || ( $title != '' && $description != '' ) ) :

		?>

			<div class="section-footer">

				<div class="footer-wrap">

					<div class="column-wrap">
					
						<div class="copyright">
							<?php
							/**
							 * Functions hooked in to satmag_footer_copyright action
							 *
							 * @hooked satmag_company_detail				- 10
							 * @hooked satmag_footer_nav					- 20
							 * 
							 */
							do_action( 'satmag_footer_block_left' ); ?>
						</div>

					</div>

				</div>

			</div>

		<?php

	endif;

	}
}

if ( ! function_exists( 'satmag_copyright_text' ) ) {

	/**
	|------------------------------------------------------------------------------
	| Footer Copyright
	|------------------------------------------------------------------------------
	*/

	function satmag_copyright_text() {
		?>

		<div class="section-footer">
			<div class="site-info">
				<?php echo esc_html( apply_filters( 'satmag_copyright_text', $content = '&copy; ') ); ?>

				<?php if ( apply_filters( 'satmag_credit_link', true ) ) { ?>
					<?php 

					echo '<a href="https://themecountry.com/themes/satmag" rel="author" title="' . esc_attr( __( 'Satmag - Wordpress Magazine Theme', 'satmag' ) ) . '">' . get_bloginfo( 'name' ) . '</a> ' . date( 'Y' ) . ' <span class="copyright-block"> &bull; </span>'. esc_html(__('Powered by', 'satmag' ) ).' <a href="http://wordpress.org/">WordPress</a>'; 

					?>
				<?php } ?>

			</div>
		</div><!-- .site-info -->
	<?php
	}
}


if ( ! function_exists( 'satmag_inner_wrapper' ) ) {
	/**
	 * Display inner wrapper
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function satmag_inner_wrapper() {
		?>
		<div class="site-info clearfix">

			<?php echo "satmag_inner_wrapper"; ?>

		</div><!-- .site-info -->
		<?php
	}
}

if ( ! function_exists( 'satmag_post_single_content' ) ) {
	/**
	 * Display post content single
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function satmag_post_single_content() {
		?>

		<!-- <div class="entry-content"> -->
		<div class="gap-content">
		<?php

			/**
			 * Functions hooked in to satmag_post_content_before action.
			 *
			 * @hooked satmag_post_thumbnail - 10
			 */
			do_action( 'satmag_single_entry_before' );

			the_content(
				sprintf(
					__( 'Continue reading %s', 'satmag' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				)
			);

			do_action( 'satmag_single_entry_after' );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'satmag' ),
				'after'  => '</div>',
			) );
		?>
		</div><!-- .entry-content -->

		<?php
	}
}

if ( ! function_exists( 'satmag_get_sidebar' ) ) {
	/**
	 * Display satmag sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function satmag_get_sidebar() {

		if ( satmag_get_theme_option( 'layout', 1 ) != 'none' ) {
			get_sidebar();
		}
	}

}

if ( ! function_exists( 'satmag_page_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function satmag_page_header() {
		?>
		<header class="entry-header">
			<?php
				the_title( '<h1 class="entry-title">', '</h1>' );
			?>
		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'satmag_page_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function satmag_page_content() {
		?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'satmag' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php
	}
}


if ( ! function_exists( 'satmag_footer_nav' ) ) {
	/**
	 * Display Footer Menu
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function satmag_footer_nav() {

		// Check if there is a footer menu.
		if ( has_nav_menu( 'footer' ) ) {

			echo '<nav id="footer-links" class="footer-navigation default-menustyle" role="navigation">';

			wp_nav_menu( array(
					'theme_location' => 'footer',
					'container' => false,
					'menu_class' => 'footer-menu',
					'echo' => true,
					'fallback_cb' => '',
					'depth' => 1,
				)
			);

			echo '</nav><!-- #footer-links -->';
		}

	}

}
