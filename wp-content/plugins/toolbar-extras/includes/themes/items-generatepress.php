<?php

// items-generatepress
// items-generatepress-premium

/**
 * Prevent direct access to this file.
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Check if GeneratePress Premium Add-On plugin is active or not.
 *
 * @since  1.0.0
 *
 * @return bool TRUE if constant defined, otherwise FALSE.
 */
function ddw_tbex_is_generatepress_premium_active() {

	return ( defined( 'GP_PREMIUM_VERSION' ) ) ? TRUE : FALSE;

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_generatepress', 100 );
/**
 * Items for Theme: GeneratePress (by Tom Usborne)
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_string_theme_title()
 * @uses   ddw_tbex_customizer_start()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_generatepress() {

	/** GeneratePress creative */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-creative',
			'parent' => 'group-active-theme',
			'title'  => ddw_tbex_string_theme_title(),
			'href'   => esc_url( admin_url( 'themes.php?page=generate-options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_theme_title( 'attr' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-creative-customize',
				'parent' => 'theme-creative',
				'title'  => esc_attr__( 'Customize Design', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_start(),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => esc_attr__( 'Customize Design', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_generatepress_customize', 100 );
/**
 * Customize items for GeneratePress Theme
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_customizer_focus()
 * @uses   ddw_tbex_string_customize_attr()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_generatepress_customize() {

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'gpcmz-layout',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus panel in the Customizer */
			'title'  => esc_attr__( 'Layout', 'toolbar-extras' ),
			'href'   => ddw_tbex_customizer_focus( 'panel', 'generate_layout_panel' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Layout', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'gpcmz-colors',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section/ panel in the Customizer */
			'title'  => esc_attr__( 'Colors', 'toolbar-extras' ),
			'href'   => defined( 'GENERATE_COLORS_VERSION' ) ? ddw_tbex_customizer_focus( 'panel', 'generate_colors_panel' ) : ddw_tbex_customizer_focus( 'section', 'body_section' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Colors', 'toolbar-extras' ) )
			)
		)
	);

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'gpcmz-typography',
			'parent' => 'theme-creative-customize',
			/* translators: Autofocus section/ panel in the Customizer */
			'title'  => esc_attr__( 'Typography', 'toolbar-extras' ),
			'href'   => defined( 'GENERATE_FONT_VERSION' ) ? ddw_tbex_customizer_focus( 'panel', 'generate_typography_panel' ) : ddw_tbex_customizer_focus( 'section', 'font_section' ),
			'meta'   => array(
				'target' => ddw_tbex_meta_target(),
				'title'  => ddw_tbex_string_customize_attr( __( 'Typography', 'toolbar-extras' ) )
			)
		)
	);

	if ( defined( 'GENERATE_BACKGROUNDS_VERSION' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gpcmz-backgrounds',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus panel in the Customizer */
				'title'  => esc_attr__( 'Background Images', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'panel', 'generate_backgrounds_panel' ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Background Images', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

	if ( defined( 'GENERATE_BLOG_VERSION' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'gpcmz-blog',
				'parent' => 'theme-creative-customize',
				/* translators: Autofocus section in the Customizer */
				'title'  => esc_attr__( 'Blog', 'toolbar-extras' ),
				'href'   => ddw_tbex_customizer_focus( 'section', 'generate_blog_section', get_post_type_archive_link( 'post' ) ),
				'meta'   => array(
					'target' => ddw_tbex_meta_target(),
					'title'  => ddw_tbex_string_customize_attr( __( 'Blog', 'toolbar-extras' ) )
				)
			)
		);

	}  // end if

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_generatepress_resources', 120 );
/**
 * General resources items for GeneratePress Theme.
 *   Hook in later to have these items at the bottom.
 *
 * @since 1.0.0
 *
 * @uses  ddw_tbex_display_items_resources()
 * @uses  ddw_tbex_is_generatepress_premium_active()
 * @uses  ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_generatepress_resources() {

	/** Bail early if no resources display active */
	if ( ! ddw_tbex_display_items_resources() ) {
		return;
	}

	/** Group: Resources for GeneratePress Theme */
	$GLOBALS[ 'wp_admin_bar' ]->add_group(
		array(
			'id'     => 'group-theme-resources',
			'parent' => ddw_tbex_is_generatepress_premium_active() ? 'theme-settings' : 'theme-creative',
			'meta'   => array( 'class' => 'ab-sub-secondary' )
		)
	);

	ddw_tbex_resource_item(
		'support-forum',
		'theme-support',
		'group-theme-resources',
		'https://wordpress.org/support/theme/generatepress'
	);

	ddw_tbex_resource_item(
		'documentation',
		'theme-docs',
		'group-theme-resources',
		'https://docs.generatepress.com/',
		esc_attr__( 'Official Theme Documentation', 'toolbar-extras' )
	);

	/** Required hook for GeneratePress Premium resources */
	do_action( 'tbex_after_theme_free_docs' );

	ddw_tbex_resource_item(
		'facebook-group',
		'theme-facebook',
		'group-theme-resources',
		'https://www.facebook.com/groups/generatepress/'
	);

	ddw_tbex_resource_item(
		'translations-community',
		'theme-translate',
		'group-theme-resources',
		'https://translate.wordpress.org/projects/wp-themes/generatepress'
	);

	ddw_tbex_resource_item(
		'github',
		'theme-github',
		'group-theme-resources',
		'https://github.com/tomusborne/generatepress'
	);

	ddw_tbex_resource_item(
		'official-site',
		'theme-site',
		'group-theme-resources',
		'https://generatepress.com/'
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_generatepress_premium', 100 );
/**
 * Items for Theme: GeneratePress Premium - Add-On Plugin (by Tom Usborne)
 *
 * @since  1.0.0
 * @since  1.3.2 Added GP Elements support.
 * @since  1.3.5 Added BTC plugin support.
 *
 * @uses   ddw_tbex_is_generatepress_premium_active()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_generatepress_premium() {

	/** Bail early if Premium version is not active */
	if ( ! ddw_tbex_is_generatepress_premium_active() ) {
		return;
	}

	/** Premium: Elements */
	if ( function_exists( 'generate_premium_do_elements' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'generatepress-elements',
				'parent' => 'theme-creative'
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gp-elements-all',
					'parent' => 'generatepress-elements',
					'title'  => esc_attr__( 'Elements', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=gp_elements' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Elements', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gp-elements-new',
					'parent' => 'generatepress-elements',
					'title'  => esc_attr__( 'New Element', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=gp_elements' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Element', 'toolbar-extras' )
					)
				)
			);

			/** Element categories, via BTC plugin */
			if ( ddw_tbex_is_btcplugin_active() ) {

				$GLOBALS[ 'wp_admin_bar' ]->add_node(
					array(
						'id'     => 'gp-elements-categories',
						'parent' => 'generatepress-elements',
						'title'  => ddw_btc_string_template( 'element' ),
						'href'   => esc_url( admin_url( 'edit-tags.php?taxonomy=builder-template-category&post_type=gp_elements' ) ),
						'meta'   => array(
							'target' => '',
							'title'  => esc_html( ddw_btc_string_template( 'element' ) )
						)
					)
				);

			}  // end if

	}  // end if

	/** Premium: Page Headers */
	if ( defined( 'GENERATE_PAGE_HEADER_VERSION' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'generatepress-pheaders',
				'parent' => 'theme-creative'
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gp-ph-all',
					'parent' => 'generatepress-pheaders',
					'title'  => esc_attr__( 'Page Headers', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=generate_page_header' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Page Headers', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gp-ph-new',
					'parent' => 'generatepress-pheaders',
					'title'  => esc_attr__( 'New Header', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'post-new.php?post_type=generate_page_header' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'New Header', 'toolbar-extras' )
					)
				)
			);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gp-ph-global',
					'parent' => 'generatepress-pheaders',
					'title'  => esc_attr__( 'Global Locations', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'edit.php?post_type=generate_page_header&page=page-header-global-locations' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'Global Page Header Locations', 'toolbar-extras' )
					)
				)
			);

	}  // end if

	/** Premium: Hooks */
	if ( defined( 'GENERATE_HOOKS_VERSION' ) ) {

		$GLOBALS[ 'wp_admin_bar' ]->add_group(
			array(
				'id'     => 'generatepress-hooks',
				'parent' => 'theme-creative'
			)
		);

			$GLOBALS[ 'wp_admin_bar' ]->add_node(
				array(
					'id'     => 'gp-hooks',
					'parent' => 'generatepress-hooks',
					'title'  => esc_attr__( 'GP Hooks', 'toolbar-extras' ),
					'href'   => esc_url( admin_url( 'themes.php?page=gp_hooks_settings' ) ),
					'meta'   => array(
						'target' => '',
						'title'  => esc_attr__( 'GeneratePress Hook Locations', 'toolbar-extras' )
					)
				)
			);

	}  // end if

	/** GeneratePress settings */
	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'theme-settings',
			'parent' => 'group-active-theme',
			'title'  => esc_attr__( 'GP Premium Settings', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'themes.php?page=generate-options' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => esc_attr__( 'GeneratePress Premium Settings', 'toolbar-extras' )
			)
		)
	);

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => 'theme-settings-extensions',
				'parent' => 'theme-settings',
				'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' ),
				'href'   => esc_url( admin_url( 'themes.php?page=generate-options' ) ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Activate Modules', 'toolbar-extras' )
				)
			)
		);

}  // end function


add_action( 'tbex_after_theme_free_docs', 'ddw_tbex_themeitems_generatepress_premium_resources' );
/**
 * Additional Resource Items for GeneratePress Premium
 *
 * @since 1.0.0
 *
 * @uses  ddw_tbex_is_generatepress_premium_active()
 * @uses  ddw_tbex_resource_item()
 */
function ddw_tbex_themeitems_generatepress_premium_resources() {

	/** Bail early if Premium version is not active */
	if ( ! ddw_tbex_is_generatepress_premium_active() ) {
		return;
	}

	ddw_tbex_resource_item(
		'pro-modules-documentation',
		'theme-docs-pro',
		'group-theme-resources',
		'https://docs.generatepress.com/collection/add-ons/'
	);

}  // end function


add_action( 'tbex_new_content_before_nav_menu', 'ddw_tbex_themeitems_new_content_generatepress_premium' );
/**
 * Items for "New Content" section: New GP Premium "Element" Content
 *
 * @since  1.3.2
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_new_content_generatepress_premium() {

	/** Bail early if Elements Module is not active */
	if ( ! function_exists( 'generate_premium_do_elements' ) ) {
		return;
	}

	$GLOBALS[ 'wp_admin_bar' ]->add_node(
		array(
			'id'     => 'new-gp_elements',
			'parent' => 'new-content',
			'title'  => esc_attr__( 'GP Element', 'toolbar-extras' ),
			'href'   => esc_url( admin_url( 'post-new.php?post_type=gp_elements' ) ),
			'meta'   => array(
				'target' => '',
				'title'  => ddw_tbex_string_add_new_item( __( 'GeneratePress Element', 'toolbar-extras' ) )
			)
		)
	);

}  // end function


add_action( 'admin_bar_menu', 'ddw_tbex_themeitems_generatepress_sites_import', 100 );
/**
 * Items for Demos Import: GeneratePress Sites
 *
 * @since  1.0.0
 *
 * @uses   ddw_tbex_display_items_demo_import()
 * @uses   ddw_tbex_id_sites_browser()
 * @uses   ddw_tbex_item_title_with_settings_icon()
 *
 * @global mixed $GLOBALS[ 'wp_admin_bar' ]
 */
function ddw_tbex_themeitems_generatepress_sites_import() {

	/** Bail early if no display of Demo Import items */
	if ( ! ddw_tbex_display_items_demo_import() ) {
		return;
	}

	/** Premium: GeneratePress Sites */
	if ( defined( 'GENERATE_SITES_PATH' ) ) {

		$gp_sites_url = version_compare( GP_PREMIUM_VERSION, '1.7-rc.1', '>=' ) ? admin_url( 'themes.php?page=generatepress-site-library' ) : admin_url( 'themes.php?page=generate-options&area=generate-sites' );

		$GLOBALS[ 'wp_admin_bar' ]->add_node(
			array(
				'id'     => ddw_tbex_id_sites_browser(),
				'parent' => 'group-demo-import',
				'title'  => ddw_tbex_item_title_with_settings_icon(
					esc_attr__( 'Import Sites', 'toolbar-extras' ),
					'general',
					'demo_import_icon'
				),
				'href'   => esc_url( $gp_sites_url ),
				'meta'   => array(
					'target' => '',
					'title'  => esc_attr__( 'Import Sites', 'toolbar-extras' )
				)
			)
		);

	}  // end if

}  // end function