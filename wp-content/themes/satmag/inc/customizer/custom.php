<?php
/**
 * Custom cutomize section and settings.
 *
 */

function satmag_example_add_slide_section( $sections ) {


	$sections['satmag_general_section'] = array(
		'title'			=> __( 'Genneral Settings', 'satmag' ),
		'panel'			=> 'satmag_panel',
		'priority'		=> 10,
	);
	$sections['satmag_single_post_section'] = array(
		'title'			=> __( 'Single Settings', 'satmag' ),
		'panel'			=> 'satmag_panel',
		'priority'		=> 20,
	);
	$sections['satmag_footer_section'] = array(
		'title'			=> __( 'Footer Settings', 'satmag' ),
		'panel'			=> 'satmag_panel',
		'priority'		=> 30,
	);
	$sections['satmag_layout_section'] = array(
		'title'			=> __( 'Homepage Layout', 'satmag' ),
		'panel'			=> 'satmag_panel',
		'priority'		=> 50,
	);
	$sections['satmag_footer_widget_section'] = array(
		'title'			=> __( 'Footer Widget', 'satmag' ),
		'panel'			=> 'satmag_panel',
		'priority'		=> 60,
	);
	$sections['satmag_style_section'] = array(
	    'title'          => __( 'Style Settings', 'satmag' ),
	    'panel'          => 'satmag_panel',
	    'priority'       => 40,
	);

	return $sections;
}

add_filter( 'satmag_customize_sections', 'satmag_example_add_slide_section' );

/**
 * satmag_general_settings
 *
 */
function satmag_general_settings ( $settings ) {

	$customize_settings	= array(


		//General Setting
		array(
			'settings'			=> 'satmag_back_to_top',
			'label'				=> __('Back To Top', 'satmag'),
			'section'			=> 'satmag_general_section',
			'type'				=> 'toggle',
			'default'			=> 1,
			'priority'			=> 15,
			'choices'			=> array(
				'on'				=> esc_attr__( 'ON', 'satmag' ),
				'off'				=> esc_attr__( 'OFF', 'satmag' ),
			)
		)	
	);

	$settings = array_merge( $customize_settings, $settings );

	return apply_filters( 'satmag_general_settings', $settings );
}

add_filter( 'satmag_customize_settings', 'satmag_general_settings' );


/**
 * satmag_slide_settings
 *
 */

function satmag_banner_settings ( $settings ) {

	$customize_settings	= array(

		// Latest posts section
		$settings[] = array(
			'settings'			=> 'homepage_slide',
			'label'				=> __( 'Show Post Slider', 'satmag' ),
			'section'			=> 'satmag_layout_section',
			'type'				=> 'toggle',
			'priority'			=> 1,
			'default'			=> 'on',
			'choices'			=> array(
				'on'				=> esc_attr__( 'ON', 'satmag' ),
				'off'				=> esc_attr__( 'OFF', 'satmag' ),
			),
		),	

		array(
			'settings'			=> 'homepage_slide_category',
			'type'				=> 'select',
			'label'				=> __( 'Choose Category', 'satmag' ),
			'choices'			=> satmag_get_category_list(),
			'section'			=> 'satmag_layout_section',
			'priority'			=> 2,
			'default'			=> 0,
			'active_callback' => array(
				array(
					'setting'  => 'homepage_slide',
					'operator' => '==',
					'value'    => true,
				)
			)
		),

		array(
			'settings'			=> 'homepage_slide_number',
			'label'				=> __( 'Number of Posts', 'satmag' ),
			'section'			=> 'satmag_layout_section',
			'type'				=> 'number',
			'default'			=> 3,
			'priority'			=> 3,
			'active_callback' => array(
				array(
					'setting'  => 'homepage_slide',
					'operator' => '==',
					'value'    => true,
				)
			)
		)

	);

	$settings = array_merge( $customize_settings, $settings );

	return apply_filters( 'satmag_banner_settings', $settings );

}

add_filter( 'satmag_customize_settings', 'satmag_banner_settings' );


/**
 * satmag_home_layout_settings
 *
 */
function satmag_home_layout_settings ( $settings ) {

	$customize_settings	= array(

		// Latest posts section
		$settings[] = array(
			'settings'			=> 'homepage_latest_posts',
			'label'				=> __( 'Show Latest Posts', 'satmag' ),
			'section'			=> 'satmag_layout_section',
			'type'				=> 'toggle',
			'priority'			=> 10,
			'default'			=> 'off',
			'choices'			=> array(
				'on'				=> esc_attr__( 'ON', 'satmag' ),
				'off'				=> esc_attr__( 'OFF', 'satmag' ),
			),
		),	

		array(
			'settings'			=> 'homepage_latest_posts_title',
			'label'				=> __('Title Section', 'satmag'),
			'section'			=> 'satmag_layout_section',
			'type'				=> 'text',
			'default'			=> 'Latest News',
			'priority'			=> 20,
			'active_callback' => array(
				array(
					'setting'  => 'homepage_latest_posts',
					'operator' => '==',
					'value'    => true,
				)
			)
		),
	
		array(
			'settings'			=> 'homepage_latest_posts_num',
			'label'				=> __( 'Number of Posts', 'satmag' ),
			'section'			=> 'satmag_layout_section',
			'type'				=> 'number',
			'default'			=> 3,
			'priority'			=> 30,
			'active_callback' => array(
				array(
					'setting'  => 'homepage_latest_posts',
					'operator' => '==',
					'value'    => true,
				)
			)
		),

		// Homepage Section

		array(
			'type'				=> 'repeater',
			'label'				=> esc_attr__( 'Homepage Sections', 'satmag' ),
			'section'			=> 'satmag_layout_section',
			'priority'			=> 40,
			'row_label'	=> array(
				'type'		=> 'text',
				'value'		=> esc_attr__('Homepage Section', 'satmag' ),
			),
			'row_label' => array(
				'type'		=> 'text',
				'value'		=> esc_attr__('Homepage Section', 'satmag' ),
			),
			'button_label'		=> esc_attr__('Add Homepage Section', 'satmag' ),
			'settings'			=> 'custom_homepage_control',
			'default'	=> array(
				array(
					'link_text'		=> esc_attr__( 'Title Section', 'satmag' ),
					'category_post'	=> 0,
					'box_post'		=> 3,
				),
			),
			'fields' => array(
				'link_text' => array(
					'type'				=> 'text',
					'label'				=> esc_attr__( 'Title Post', 'satmag' ),
					'default'			=> 'Title Section',
				),
				'category_post' => array(
					'type'				=> 'select',
					'label'				=> __( 'Select Category', 'satmag' ),
					'choices'			=> satmag_get_category_list(),
				),
				'box_post' => array(
					'type'				=> 'select',
					'label'				=> __( 'Select box', 'satmag' ),
					'default'			=> '3',
					'choices'			=> array(
						'1'				=> __( 'Grid 1 Column', 'satmag' ),
						'2'				=> __( 'Grid 2 Columns', 'satmag' ),
						'3'				=> __( 'Grid 3 Columns', 'satmag' ),
						'4'				=> __( 'Featured Style One', 'satmag' ),
						'5'				=> __( 'Featured Style Two', 'satmag' ),
					),
				),
			)
		)
	);

	$settings = array_merge( $customize_settings, $settings );

	return apply_filters( 'satmag_home_layout_settings', $settings );

}

add_filter( 'satmag_customize_settings', 'satmag_home_layout_settings' );

/**
 * satmag_style_settings
 *
 */
function satmag_style_settings ( $settings ) {

	$customize_settings	= array(

		//Color section
		array(

			'type'			=> 'color',
			'settings'		=> 'primary_color',
			'label'			=> __( 'Primary Color', 'satmag' ),
			'section'		=> 'satmag_style_section',
			'default'		=> '#ff6666',
			'priority'		=> 2,
			'output'           => array(
				array(
					'element'   => '.back-to-top, .added_to_cart, .button, button, input[type=button], input[type=reset], input[type=submit], .gap-st-two .site-header, .paged .site-header, .pagination .nav-links a:hover',
					'property'  => 'background-color',
				),
		
				array(
					'element'   => 'a, .copyright h3, span.introl-cat a, .entry-title a:hover, .gap-title a:hover, .widget ul li a:hover, .entry-meta>span a:hover, .post-meta>span a:hover, .single-post .post-navigation .nav-links .nav-next a:hover, .single-post .post-navigation .nav-links .nav-previous a:hover, .post-wrap .gap-col .cat-links a, #respond, #search-overlay .search-overlay-inner .search-close:hover, #comments .comment-list .reply a',
					'property'  => 'color',
				),

				array(
					'element'	=> '#search-overlay .search-overlay-inner .search-form',
					'property'	=> 'border-color'
				),
			)
		)
	);

	$settings = array_merge( $customize_settings, $settings );

	return apply_filters( 'satmag_style_settings', $settings );
}

add_filter( 'satmag_customize_settings', 'satmag_style_settings' );

/**
 * satmag_custom_customize_single_post
 *
 */
function satmag_custom_customize_single_post( $settings ) {

	// Posts Categories
	$settings[] = array(
		'settings'			=> 'single_post_metadata_cats',
		'label'				=> __( 'Show/Hide Categories', 'satmag' ),
		'section'			=> 'satmag_single_post_section',
		'type'				=> 'switch',
		'default'			=> 1,
		'priority'			=> 10,
		'choices'			=> array(
			'on'				=> esc_attr__( 'ON', 'satmag' ),
			'off'				=> esc_attr__( 'OFF', 'satmag' ),
		),
	);

	// Post Tags
	$settings[] = array(
		'settings'			=> 'single_post_metadata_tags',
		'label'				=> __( 'Show/Hide Tags', 'satmag' ),
		'section'			=> 'satmag_single_post_section',
		'type'				=> 'switch',
		'default'			=> 1,
		'priority'			=> 10,
		'choices'			=> array(
			'on'				=> esc_attr__( 'ON', 'satmag' ),
			'off'				=> esc_attr__( 'OFF', 'satmag' ),
		),
	);

	$settings[] = array(
		'settings'			=> 'single_post_metadata',
		'label'				=> sprintf('<h3 class="azb-customize-title">%s</h3>', __( 'Show/Hide Post Meta Data', 'satmag' ) ),
		'description'		=> __( 'Check them to show post meta data.', 'satmag' ),
		'section'			=> 'satmag_single_post_section',
		'type'				=> 'multicheck',
		'default'			=> array('date', 'category', 'tag', 'author'),
		'priority'			=> 30,
		'choices'			=> array(
			'date'					=> esc_attr__( 'Date', 'satmag' ),
			'author'				=> esc_attr__( 'Author', 'satmag' ),
		)
	);

	return $settings;
}

add_filter( 'satmag_customize_single_post_settings', 'satmag_custom_customize_single_post' );

/**
 * satmag_slide_settings
 *
 */
function satmag_footer_settings ( $settings ) {

	$customize_settings	= array(

		// Footer Logo
		array(
			'settings'			=> 'footer_logo',
			'label'				=> __( 'Footer Logo', 'satmag' ),
			'description'		=> __( 'Recomment Size (150x46)', 'satmag'),
			'section'			=> 'satmag_footer_section',
			'type'				=> 'upload',
			'priority'			=> 1,
		),

		// Footer Search
		array(
			'settings'			=> 'footer_search',
			'label'				=> __( 'Footer Search', 'satmag' ),
			'section'			=> 'satmag_footer_section',
			'type'				=> 'toggle',
			'default'			=> 0,
			'priority'			=> 1,
		),
	);

	$settings = array_merge( $customize_settings, $settings );

	return apply_filters( 'satmag_footer_settings', $settings );

}

add_filter( 'satmag_customize_settings', 'satmag_footer_settings' );


function satmag_remove_some_controls( $fields ) {

	$fields[] = array(
		'settings'		=> 'general_posts_modified_date',
		'type'			=> 'custom',
	);

	$fields[] = array(
		'settings'		=> 'general_post_show_thumbnail',
		'type'			=> 'custom',
	);

	$fields[] = array(
		'settings'		=> 'single_post_metadata',
		'type'			=> 'custom',
	);

	return $fields;
}
add_filter( 'satmag_customize_general_settings', 'satmag_remove_some_controls' );


function satmag_remove_single_some_controls( $fields ) {

	$fields[] = array(
		'settings'		=> 'single_post_metadata',
		'type'			=> 'custom',
	);

	$fields[] = array(
		'settings'		=> 'single_post_modified_date',
		'type'			=> 'custom',
	);

	$fields[] = array(
		'settings'		=> 'single_post_show_thumbnail',
		'type'			=> 'custom',
	);

	return $fields;
}
add_filter( 'satmag_customize_single_post_settings', 'satmag_remove_single_some_controls' );


function satmag_remove_layout_some_controls( $fields ) {

	$fields[] = array(
		'settings'		=> 'layout_thumbnail_pos',
		'type'			=> 'custom',
	);

	$fields[] = array(
		'settings'		=> 'layout_show_thumbnail',
		'type'			=> 'custom',
	);

	$fields[] = array(
		'settings'		=> 'layout',
		'type'			=> 'custom',
	);

	return $fields;
}
add_filter( 'satmag_customize_layout_settings', 'satmag_remove_layout_some_controls' );


function satmag_get_category_list() {
	
	$categories = get_categories();
	$cats[0] = __('All Categories', 'satmag');
	
	foreach ($categories as $cat) {
		$cats[$cat->cat_ID] = $cat->name;
	}

	return $cats;
}