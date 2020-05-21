<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/menu-walkers.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** Custom Post Types */
require_once( 'library/bs-custom-post-types.php' );

/** Custom Functions - various shortcodes and other custom functions*/
require_once( 'library/bs-custom-functions.php' );

/** Customizer Additions */
require_once( 'library/bs-customizer-additions.php' );

/** The "Subhead" metabox and related functions */
require_once( 'library/metabox-subhead.php' );

/** Required and Recommended Plugins */
require_once( 'library/class-tgm-plugin-activation.php' );
require_once( 'library/bs-plugin-activation.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/protocol-relative-theme-assets.php' );

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if ( is_archive() && (is_category() || is_tag()) && empty( $query->query_vars['suppress_filters'] ) ) {
    $post_type = get_query_var('post_type');
	    if($post_type)
	      $post_type = $post_type;
	    else
	      $post_type = array('post','portfolio');
        $query->set('post_type',$post_type);
	    return $query;
    }
}

function acf_set_featured_image( $value, $post_id, $field  ){

    if($value != ''){
	    //Add the value which is the image ID to the _thumbnail_id meta data for the current post
	    add_post_meta($post_id, '_thumbnail_id', $value);
    }

    return $value;
}

// acf/update_value/name={$field_name} - filter for a specific field based on it's name
//$thumb = get_field('bs_portfolio_thumbnail');
add_filter('acf/update_value/name=bs_portfolio_thumbnail', 'acf_set_featured_image', 10, 3);


add_filter( 'script_loader_tag', function ( $tag, $handle ) {

    if ( 'events-manager' !== $handle )
        return $tag;

    return str_replace( ' src', ' async src', $tag );
}, 10, 2 );

/**
 * Register custom sidebars and other widget areas
 * 
 * @see https://github.com/INN/largo/blob/590181982d22a5444eb3c5ccca58ea8b56db12f7/inc/sidebars.php#L3-L129
 */
function calhealth_register_custom_sidebars() {

	$sidebars = array(

		array(
			'name' 	=> __( 'Article Bottom', 'allonsy' ),
			'desc' 	=> __( 'Footer widget area for posts', 'allonsy' ),
			'id' 	=> 'article-bottom'
		),

	);

	// register the active widget areas
	foreach ( $sidebars as $sidebar ) {
		register_sidebar( array(
			'name' 			=> $sidebar['name'],
			'description' 	=> $sidebar['desc'],
			'id' 			=> $sidebar['id'],
			'before_widget' => '<!-- Sidebar: ' . $sidebar['id'] . ' --><aside id="%1$s" class="%2$s clearfix side-widget">',
			'after_widget' 	=> "</aside>",
			'before_title' 	=> '<h3 class="widgettitle">',
			'after_title' 	=> '</h3>',
		) );
	}

}
add_action( 'widgets_init', 'calhealth_register_custom_sidebars' );

/**
 * If the article bottom widget area has active widgets, go ahead and show it
 * 
 * @see https://github.com/INN/umbrella-elpasomatters/issues/3
 */
function calhealth_post_bottom_widget_area() {
	if ( is_active_sidebar( 'article-bottom' ) ) {
		dynamic_sidebar( 'article-bottom' );
	}
}
add_action( 'calhealth_post_bottom_widget_area', 'calhealth_post_bottom_widget_area' );
