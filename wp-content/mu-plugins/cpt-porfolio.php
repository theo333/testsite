<?php
/* Plugin Name: Portfolio Custom Post Type
 * Description:  Creates Portfolio Custom Post Type
 * Version 1.0
 * Author: Theo Manton
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: cpt_portfolio
 */
 
/* register custom post type
 * do in plugin, rather than in theme so data can be accessed if switch themes
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
 */  

add_action( 'init', 'create_posttype' );

function create_posttype () {
    $labels = array(
        'name'                => __( 'Portfolio' ),
        'singular_name'       => __( 'Portfolio' ),
        'add_new_item'        => __( 'Add New Portfolio Item'),
        'edit_item'        => __( 'Edit Portfolio Item' ),
        'featured_image'        => __( 'Website Homepage Screenshot'),
        'set_featured_image'        => __( 'Select Website Screenshot'),
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,  //show in admin screen & site content
        'has_archive'         => true,
        'menu_position'       => 5,  //moved menu item below Post
        'menu_icon'           => 'dashicons-format-gallery',  //from https://developer.wordpress.org/resource/dashicons/#format-gallery
        'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'revisions' ),
        'rewrite'             => array( 'slug' => __('portfolio' )),  //create clean URL so displays URL: sitename.com/portfolio/    
    );

    register_post_type( 'myportfolio', $args );
}

// change columns for the edit Portfolio CPT screen
// https://yoast.com/dev-blog/custom-post-type-snippets/
function myp_change_columns( $cols) {
    $cols = array(
        'url'    => __( 'URL', 'myportfolio' ),
    );
    return $cols;
}
add_filter( 'manage_myporfolio_posts_columns', 'myp_change_columns');

// fill edit Portfolio CPT screen with content from CPT
function myp_custom_columns( $column, $post_id ) {
    switch ( $column ) {
        case "url":
            $url = get_post_meta( $post_id, 'url', true);
            echo '<a href"' . $url . '">' . $url. '</a>';
            break;
    }
}

add_action( 'manage_posts_custom_column', 'myp_custom_columns', 10, 2 );