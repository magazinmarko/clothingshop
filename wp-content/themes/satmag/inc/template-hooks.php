<?php
/**
 * SatmaG hooks
 *
 * @author   ThemeCountry
 * @package  satmag
 */

/**
 * Header
 *
 * @see satmag_skip_links
 * @see satmag_site_branding
 * @see satmag_primary_navigation
 */

add_action( 'satmag_header',				'satmag_skip_links',					10 );
add_action( 'satmag_header',				'satmag_primary_navigation',			20 );
add_action( 'satmag_header',				'satmag_hero_header',					30 );
add_action( 'satmag_header',				'satmag_hero_logo',						40 );
add_action( 'satmag_header',				'satmag_header_right_path',				50 );
add_action( 'satmag_header',				'satmag_hero_header_close',				60 );

add_action( 'satmag_before_content',		'satmag_site_header_inner',				10 );


/**
 * Post
 */

add_action( 'satmag_before_single_title',	'satmag_meta_tags_top',					10 );
add_action( 'satmag_loop_post',				'satmag_post_thumbnail',				10 );
add_action( 'satmag_loop_post',				'satmag_meta_cat_top',					15 );
add_action( 'satmag_loop_post',				'satmag_post_header',					20 );
add_action( 'satmag_loop_post',				'satmag_post_content',					30 );
add_action( 'satmag_loop_after',			'satmag_paging_nav',					20 );

//add_action( 'satmag_loop_post_by',			'satmag_post_by',				        10 );
add_action( 'satmag_after_post_title',		'satmag_post_on',						10 );

/**
 * Single Post
 */
add_action( 'satmag_single_post',			'satmag_post_header',					10 );
add_action( 'satmag_single_post',			'satmag_post_single_content',			20 );

/**
 * Functions hooked in to satmag_single_post_bottom action
 *
 * @hooked satmag_post_nav			- 10
 * @hooked satmag_display_comments	- 20
 */

add_action( 'satmag_single_post_bottom',	'satmag_meta_tags_bottom',				10 );
add_action( 'satmag_single_post_bottom',	'satmag_post_nav',						20 );
add_action( 'satmag_single_post_bottom',	'satmag_display_comments',				30 );


/**
 * Back to top in to satmag_sidebar action
 *
 * @hooked satmag_get_sidebar				- 10
 */
add_action( 'satmag_sidebar',				'satmag_get_sidebar',					10 );


/**
 * Single Page - Hooks
 *
 * @see  satmag_page_header()
 * @see  satmag_page_content()
 */

add_action( 'satmag_page',					'satmag_page_header',					10 );
add_action( 'satmag_page',					'satmag_page_content',					20 );


/**
 * Single Pages - Hooks
 *
 * @see  satmag_display_comments()
 */
add_action( 'satmag_page_after',			'satmag_display_comments',				10 );



/**
 * Functions Top Footer in to satmag_footer_block action
 *
 * @hooked satmag_footer_logo				- 10
 * @hooked satmag_footer_widgets			- 20
 * @hooked satmag_footer_block				- 30
 *
 */

add_action( 'satmag_footer_block',			'satmag_footer_logo',					10 );
add_action( 'satmag_footer_block',			'satmag_footer_widgets',				20 );
add_action( 'satmag_footer_block',			'satmag_footer_copyright',				30 );
add_action( 'satmag_footer_block',			'satmag_copyright_text',				40 );


/**
 * Functions Top Footer in to satmag_footer_block_left action
 *
 * @hooked satmag_footer_navigation				- 10
 * @hooked satmag_copyright_text				- 20
 *
 */

add_action( 'satmag_footer_block_left',		'satmag_footer_nav',				10 );


/**
 * Functions Top Footer in to satmag_footer_block_right action
 *
 * @hooked satmag_social_profile				- 10
 *
 */

add_action( 'satmag_footer_block_right',	'satmag_social_profile',			10 );


/**
 * Back to top in to satmag_after_footer action
 *
 * @hooked satmag_back_to_top				- 10
 */
add_action( 'satmag_after_footer',			'satmag_back_to_top',				10 );
add_action( 'satmag_after_footer',			'satmag_search_overlay',			20 );


/**
 * Back to top in to satmag_magazine_layout action
 *
 * @hooked satmag_homepage_render			- 10
 */

add_action( 'satmag_magazine_layout',		'satmag_homepage_latest_posts',			20 );
add_action( 'satmag_magazine_layout',		'satmag_homepage_render',				30 );
add_action( 'satmag_after_footer',			'satmag_light_box',						10 );