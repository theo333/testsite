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

/************************************************/
/**************** PORTFOLIO *********************/

add_action( 'init', 'create_posttype' );

function create_posttype () {
    $labels = array(
        'name'                => __( 'Portfolio' ),
        'singular_name'       => __( 'Portfolio' ),
        'add_new_item'        => __( 'Add New Portfolio Item'),
        'edit_item'           => __( 'Edit Portfolio Item' ),
        'featured_image'      => __( 'Website Homepage Screenshot'),
        'set_featured_image'  => __( 'Select Website Screenshot'),
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => true,  //show in admin screen & site content
        'has_archive'         => true,
        'menu_position'       => 5,  //moved menu item below Post
        'menu_icon'           => 'dashicons-format-gallery',  //from https://developer.wordpress.org/resource/dashicons/#format-gallery
        'supports'            => array('title', 'editor', 'author', 'thumbnail', 'custom-fields', 'revisions'),
        'rewrite'             => array( 'slug' => __('portfolio' )),  //create clean URL so displays URL: sitename.com/portfolio/    
    );

    register_post_type( 'myportfolio', $args );
}


//  https://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column
// register admin columns for custom post type myportfolio
add_filter('manage_myportfolio_posts_columns', 'add_myportfolio_columns');

function add_myportfolio_columns( $columns ) {
    $columns = array(
        'cb' => '<input type=\"checkbox\" />',
        'title' => __('Client Name'),
        'myportfolio_url' => __('URL'),
        'thumbnail' => __('Website Homepage Screenshot'),
    );
    return $columns;
}

// populate data into admin columns for custom post type myportfolio
add_action( 'manage_myportfolio_posts_custom_column' , 'myportfolio_custom_columns', 10, 2 );

function myportfolio_custom_columns( $column, $post_id ) {
    switch ( $column ) {
            
        case "myportfolio_url" :
            $url = get_post_meta( $post_id, 'myportfolio_url', true );
            echo $url;
            break;        
        case "thumbnail" :
            $thumbnail = the_post_thumbnail( array('80','80') );
            echo $thumbnail;
            break;
    }
}


/************************************************/
/**************** PORTFOLIO 2 *******************/


// https://piklist.com/learn/doc/piklist_post_types/
// Piklist:  add 'portfolio2' custom post type 
add_filter('piklist_post_types', 'piklist_portfolio2_post_type');

function piklist_portfolio2_post_type($post_types) {
$labels = array(
    'name'                => __( 'Portfolio 2' ),
    'singular_name'       => __( 'Portfolio 2' ),
    'add_new_item'        => __( 'Add New Portfolio Item'),
    'edit_item'           => __( 'Edit Portfolio Item' ),
    'featured_image'      => __( 'Website Homepage Screenshot'),
    'set_featured_image'  => __( 'Select Website Screenshot'),
);
    
$post_types['portfolio2'] = array(
  'labels' => $labels
  ,'title' => __('Enter a new Client Name')
  ,'menu_icon' => piklist('url', 'piklist') . '/parts/img/piklist-menu-icon.svg'
  ,'page_icon' => piklist('url', 'piklist') . '/parts/img/piklist-page-icon-32.png'
  ,'supports' => array(
    'title'
    ,'editor'
    ,'thumbnail'
  )
  ,'public' => true
  ,'admin_body_class' => array(
    'custom-body-class'
  )
  ,'has_archive' => true
  ,'rewrite' => array(
    'slug' => 'portfolio2'
  )
  ,'capability_type' => 'post'
  ,'edit_columns' => array(
    'title' => __('Client Name')
    ,'client_url' => __('URL')
    ,'thumbnail' => __('Website Homepage Screenshot')
    ,'internal_page_screenshot' => __('Internal Page Screenshot') 
  )
  ,'hide_meta_box' => array(
    'author'
  )
  ,'status' => array(
    'new' => array(
      'label' => 'New'
      ,'public' => false
    )
    ,'pending' => array(
      'label' => 'Pending Review'
      ,'public' => false
    )
    ,'demo' => array(
      'label' => 'Demo'
      ,'public' => true
      ,'exclude_from_search' => true
      ,'show_in_admin_all_list' => true
      ,'show_in_admin_status_list' => true
   )
    ,'lock' => array(
      'label' => 'Lock'
      ,'public' => true
    )
  )
);
return $post_types;
}

// this code replaced by Piklist 'edit columns' of above function piklist_portfolio2_post_type
// register admin columns for custom post type portfolio2
//add_filter('manage_portfolio2_posts_columns', 'add_portfolio2_columns' );
//
//function add_portfolio2_columns( $columns ) {
//    $columns = array(
//        'cb' => '<input type=\"checkbox\" />',
//        'title' => __('Client Name'),
//        'client_url' => __('URL'),
//        'thumbnail' => __('Website Homepage Screenshot'),
//        'internal_page_screenshot' => __('Internal Page Screenshot'),
//    );
//    return $columns;
//}



// populate data into admin columns for custom post type portfolio2
// can not do in Piklist
// ??? Why get error when try to replace $post_id with $post=>ID  ???
add_action( 'manage_portfolio2_posts_custom_column', 'portfolio2_custom_columns', 10, 2 );

function portfolio2_custom_columns( $column, $post_id ) {
    $size = 200;
    switch ( $column ) {
        case "client_url" :
            $url = get_post_meta( $post_id, 'client_url', true );
            $output_url = <<<HTML
                 <a href=$url target="_blank">$url</a>  
HTML;
            echo $output_url;
            break;
        case "thumbnail" :
            $thumbnail = the_post_thumbnail( array($size,$size) );
            echo $thumbnail;
            break;
        case "internal_page_screenshot" :
            // returns ID of attachment
            $internal_page = get_post_meta( $post_id, 'internal_page_screenshot', true ); 
            // displays image of attachment ID of $internal_page
            echo wp_get_attachment_image( $internal_page, array($size,$size) );
            break;
    }
}

