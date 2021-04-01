<?php
/**
 * Cutomize Settings
 *
 * Includes all theme's customize settings here.
 *
 * @author   ThemeCountry
 * @since    1.0.0
 * @package  satmag
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Adds generate settings
 *
 * @since 1.0.0
 * @return array
 */
function satmag_customize_general_settings() {

	$settings = array(

					array(
						'settings'          => 'general_post_show_excerpt',
						'label'             => __('Show Excerpt', 'satmag'),
						'section'           => 'satmag_general_section',
						'type'              => 'switch',
						'default'           => true,
						'priority'          => 3,
						'choices'     		=> array(
							'on'				=> esc_attr__( 'ON', 'satmag' ),
							'off'				=> esc_attr__( 'OFF', 'satmag' ),
						),

					),
					array(
						'settings'          => 'general_post_excerpt_length',
						'label'             => __('Excerpt Length', 'satmag'),
						'section'           => 'satmag_general_section',
						'type'              => 'slider',
						'default'           => 20,
						'priority'          => 4,
						'choices'     => array(
							'min'  => '10',
							'max'  => '80',
							'step' => '1',
						),
						'active_callback' => array(
							array(
								'setting'  => 'general_post_show_excerpt',
								'operator' => '==',
								'value'    => true,
							)
						)

					),

					array(
						'settings'          => 'general_post_show_excerpt_more',
						'label'             => __('Excerpt More String', 'satmag'),
						'section'           => 'satmag_general_section',
						'type'              => 'text',
						'default'           => '[...]',
						'priority'          => 5,

						'active_callback' => array(
							array(
								'setting'  => 'general_post_show_excerpt',
								'operator' => '==',
								'value'    => true,
							)
						)

					),

					array(
						'settings'          => 'general_post_show_readmore',
						'label'             => __('Show Read More', 'satmag'),
						'section'           => 'satmag_general_section',
						'type'              => 'switch',
						'default'           => 1,
						'priority'          => 8,
						'choices'     		=> array(
							'on'				=> esc_attr__( 'ON', 'satmag' ),
							'off'				=> esc_attr__( 'OFF', 'satmag' ),
						),

						'active_callback' => array(
							array(
								'setting'  => 'general_post_show_excerpt',
								'operator' => '==',
								'value'    => 'on',
							)
						)


					),

					array(
						'settings'          => 'general_post_show_readmore_label',
						'label'             => __('Read More Label', 'satmag'),
						'section'           => 'satmag_general_section',
						'type'              => 'text',
						'default'           => __('View Detail', 'satmag'),
						'priority'          => 9,

						'active_callback' => array(
							array(
								'setting'  => 'general_post_show_readmore',
								'operator' => '==',
								'value'    => 'on',
							)
						)

					),


					array(
						'settings'          => 'general_post_show_thumbnail',
						'label'             => __('Show Post Thumbnail', 'satmag'),
						'section'           => 'satmag_general_section',
						'type'              => 'switch',
						'default'           => 1,
						'priority'          => 10,
						'choices'     		=> array(
							'on'				=> esc_attr__( 'ON', 'satmag' ),
							'off'				=> esc_attr__( 'OFF', 'satmag' ),
						),

					),

					// Post meta data

					array(
						'settings'          => 'general_posts_metadata',
						'label'             => sprintf('<h3 class="azb-customize-title">%s</h3>', __('Show/Hide Post Meta Data', 'satmag') ),
						'description'		=> __( 'Check them to show post meta data.', 'satmag'),
						'section'           => 'satmag_general_section',
						'type'              => 'multicheck',
						'default'           => array('date', 'category', 'tag', 'author'),
						'priority'          => 11,
						'choices'     		=> array(
							'date'					=> esc_attr__( 'Date', 'satmag' ),
							'category'				=> esc_attr__( 'Category', 'satmag' ),
							'tag'					=> esc_attr__( 'Tag', 'satmag' ),
							'author'				=> esc_attr__( 'Author', 'satmag' ),
							'comment'				=> esc_attr__( 'Comment', 'satmag' ),
						),

					),

					array(
						'settings'          => 'general_posts_modified_date',
						'label'             => __('Show Modified Date', 'satmag'),
						'section'           => 'satmag_general_section',
						'type'              => 'switch',
						'default'           => 'off',
						'priority'          => 12,
						'choices'     		=> array(
							'on'				=> esc_attr__( 'ON', 'satmag' ),
							'off'				=> esc_attr__( 'OFF', 'satmag' ),
						),

					),

					array(
						'type'     => 'text',
						'settings' => 'general_posts_date_prefix',
						'label'    => __( 'Date Prefix', 'satmag' ),
						'section'  => 'satmag_general_section',
						'description'  => esc_attr__( 'Prefix before date archive. It will show for all archive and single post.', 'satmag' ),
						'priority' => 13,
					),

			);

	return apply_filters('satmag_customize_general_settings', $settings);
}

/**
 * Add layout customize settings
 *
 * @since 1.0.0
 * @return array
 */
function satmag_customize_layout_settings() {

	$settings = array(

			array(
				'settings'          => 'layout',
				'label'             => __('Site Layout', 'satmag'),
				'description'		=> __('This layout will apply hold website. But will not apply to custom homepage.', 'satmag'),
				'section'           => 'satmag_layout_section',
				'type'              => 'radio-image',
				'default'           => 'right',
				'priority'          => 10,
				'choices'     		=> array(
					'none'   => get_template_directory_uri() . '/assets/images/customizer/controls/none.png',
					'left' 	=> get_template_directory_uri() . '/assets/images/customizer/controls/left.png',
					'right'  => get_template_directory_uri() . '/assets/images/customizer/controls/right.png',
					),

			),
			array(
				'settings'          => 'layout_show_thumbnail',
				'label'             => __('Show Post Thumbnail', 'satmag'),
				'description'		=> __('Show or hide post\'s thumbnail for each archvie.', 'satmag'),
				'section'           => 'satmag_layout_section',
				'type'              => 'swhttps://mail.google.com/mail/u/0/#inboxitch',
				'default'           => 1,
				'priority'          => 20,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'ON', 'satmag' ),
					'off'				=> esc_attr__( 'OFF', 'satmag' ),
				),

			),
			array(
				'settings'          => 'layout_thumbnail_pos',
				'label'             => __('Thumbnail Position', 'satmag'),
				'description'		=> __('Choose post\'s thumbnail position of each archvie.', 'satmag'),
				'section'           => 'satmag_layout_section',
				'type'              => 'radio-buttonset',
				'default'           => 'left',
				'priority'          => 30,
				'choices'     		=> array(
					'left'				=> __('Left', 'satmag'),
					'top'				=> __('Top', 'satmag'),
					'right'				=> __('Right', 'satmag')
				),

			),
	);

	return apply_filters( 'satmag_customize_layout_settings', $settings );
}

/**
 * Adds customize settings for single post.
 *
 * @since 1.0.0
 * @return array
 */
function satmag_customize_single_post_settings() {

	$settings  = array(

		array(
				'settings'          => 'single_post_show_thumbnail',
				'label'             => __('Show Post Thumbnail', 'satmag'),
				'section'           => 'satmag_single_post_section',
				'type'              => 'switch',
				'default'           => 1,
				'priority'          => 10,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'ON', 'satmag' ),
					'off'				=> esc_attr__( 'OFF', 'satmag' ),
				),

			),
			// Post navigation
			array(
				'settings'          => 'single_post_show_nav',
				'label'             => __('Show Post Navigation', 'satmag'),
				'section'           => 'satmag_single_post_section',
				'type'              => 'switch',
				'default'           => 1,
				'priority'          => 20,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'ON', 'satmag' ),
					'off'				=> esc_attr__( 'OFF', 'satmag' ),
				),

			),

			// Post meta data

			array(
				'settings'          => 'single_post_metadata',
				'label'             => sprintf('<h3 class="azb-customize-title">%s</h3>', __('Show/Hide Post Meta Data', 'satmag') ),
				'description'		=> __( 'Check them to show post meta data.', 'satmag'),
				'section'           => 'satmag_single_post_section',
				'type'              => 'multicheck',
				'default'           => array('date', 'category', 'tag', 'author'),
				'priority'          => 30,
				'choices'     		=> array(
					'date'					=> esc_attr__( 'Date', 'satmag' ),
					'category'				=> esc_attr__( 'Category', 'satmag' ),
					'tag'					=> esc_attr__( 'Tag', 'satmag' ),
					'author'				=> esc_attr__( 'Author', 'satmag' ),
				),

			),

			array(
				'settings'          => 'single_post_modified_date',
				'label'             => __('Show Modified Date', 'satmag'),
				'section'           => 'satmag_single_post_section',
				'type'              => 'switch',
				'default'           => 'off',
				'priority'          => 40,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'ON', 'satmag' ),
					'off'				=> esc_attr__( 'OFF', 'satmag' ),
				),

			)
	);

	return apply_filters( 'satmag_customize_single_post_settings', $settings );

}

/**
 * Adds customize footer widget settings
 *
 * @since 1.0.0
 * @return array
 */
function satmag_customize_footer_widget_settings () {

	$settings  = array(

		array(
				'settings'          => 'footer_widget_cols',
				'label'             => __('Footer Widget Columns', 'satmag'),
				'section'           => 'satmag_footer_widget_section',
				'type'              => 'radio-buttonset',
				'default'           => '4',
				'priority'          => 10,
				'choices'     => array(
					'0'				=> __('None', 'satmag'),
					'1'				=> __('1', 'satmag'),
					'2'				=> __('2', 'satmag'),
					'3'				=> __('3', 'satmag'),
					'4'				=> __('4', 'satmag')
				),

			),
			array(
				'settings'          => 'footer_widget_rows',
				'label'             => __('Footer Widget Rows', 'satmag'),
				'section'           => 'satmag_footer_widget_section',
				'type'              => 'radio-buttonset',
				'default'           => '2',
				'priority'          => 11,
				'choices'     => array(
					'1'				=> __('1', 'satmag'),
					'2'				=> __('2', 'satmag'),
					'3'				=> __('3', 'satmag'),
					'4'				=> __('4', 'satmag')
				),

			)
	);

	return apply_filters( 'satmag_customize_footer_widget_settings', $settings );
}
