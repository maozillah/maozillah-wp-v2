<?php
/**
 * _mbbasetheme functions and definitions
 *
 * @package _mbbasetheme
 */

/****************************************
Theme Setup
*****************************************/

/**
 * Theme initialization
 */
require get_template_directory() . '/lib/init.php';

/**
 * Custom theme functions definited in /lib/init.php
 */
require get_template_directory() . '/lib/theme-functions.php';

/**
 * Helper functions for use in other areas of the theme
 */
require get_template_directory() . '/lib/theme-helpers.php';

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/lib/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/lib/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/lib/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/lib/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/lib/inc/jetpack.php';


/****************************************
Require Plugins
*****************************************/

require get_template_directory() . '/lib/class-tgm-plugin-activation.php';
require get_template_directory() . '/lib/theme-require-plugins.php';

// add_action( 'tgmpa_register', 'mb_register_required_plugins' );


/****************************************
Misc Theme Functions
*****************************************/

/**
 * Define custom post type capabilities for use with Members
 */
add_action( 'admin_init', 'mb_add_post_type_caps' );
function mb_add_post_type_caps() {
	// mb_add_capabilities( 'portfolio' );
}

/**
 * Filter Yoast SEO Metabox Priority
 */
add_filter( 'wpseo_metabox_prio', 'mb_filter_yoast_seo_metabox' );
function mb_filter_yoast_seo_metabox() {
	return 'low';
}

// new post type for projects specifically

function wptp_create_post_type() {
    $labels = array(
        'name' => __( 'Projects' ),
        'singular_name' => __( 'project' ),
        'add_new' => __( 'New Project' ),
        'add_new_item' => __( 'Add New project' ),
        'edit_item' => __( 'Edit project' ),
        'new_item' => __( 'New project' ),
        'view_item' => __( 'View project' ),
        'search_items' => __( 'Search projects' ),
        'not_found' =>  __( 'No projects Found' ),
        'not_found_in_trash' => __( 'No projects found in Trash' ),
    );
    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'custom-fields',
            'thumbnail',
            'page-attributes'
        ),
        'taxonomies' => array( 'post_tag', 'category' ),
    );
    register_post_type( 'project', $args );
}
add_action( 'init', 'wptp_create_post_type' );

// display number posts for project archive items
function post_per_page_control( $query ){
    if ( is_post_type_archive('project') ) {
         $query->set( 'posts_per_page', 10 );
          return;
    }
}
add_action('pre_get_posts','post_per_page_control');

// get custom post type
