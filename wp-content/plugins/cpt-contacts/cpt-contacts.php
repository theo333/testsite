<?php
/*
 * Plugin Name: Contacts Custom Post Type
 * Description: Creates Contacts Custom Post Type
 * Version 1.0
 * Author:  Theo Manton
 * License:  GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: cpt_contacts
 */

/************************************************/
/**************** CONTACTS **********************/
/**************** The WP Way ********************/

//** Register Custom Post Type Contacts
add_action( 'init', 'create_posttype_contacts' );

function create_posttype_contacts() {
    $labels = array(
        'name'          => __( 'Contacts'),
        'singular_name' => __( 'Contact'),
        'add_new_item'  => __( 'Add New Contact'),
        'edit_item'     => __( 'Edit Contact Name'),
    );
    $args = array(
        'labels'        => $labels,
        'public'        => true,  //show in admin screen & site content
        'has_archive'   => true,
        'menu_position' => 6,
        // 'menu_icon'     =>   //find good icon for this
        'supports'      => array( 'title', 'editor', 'thumbnail' ),
        'rewrite'       => array( 'slug' => __( 'contacts' )),
    );
    
    register_post_type( 'contacts', $args );
        
}

//** Register Admin Columns for CPT Contacts
//* status: not working yet
//add_filter( 'manage_contacts_posts_columns', 'add_contacts_columns');
//
//function add_contacts_columns() {
//    $columns = array(
//        'cb'    => '<input type=\"checkbox\" />',
//        'title' => __( 'Contact Name' ),
//        'company'   => __( 'Company Name' ),
//        'email_address' => __( 'Email Address' ), 
//    );
//}


/************************************************/
/**************** CONTACTS 2 ********************/
/**************** The Piklist Way ***************/

//** Piklist: add 'contacts2' custom post type **
//* ref: https://piklist.com/learn/doc/piklist_post_types/
add_filter( 'piklist_post_types', 'piklist_contacts2_post_type');

function piklist_contacts2_post_type() {
    $labels = array(
        'name'          => __( 'Contacts 2' ),
        'singular_name' => __( 'Contact 2' ),
        'add_new_item'  => __( 'Add New Contact' ),
        'edit_item'     => __( 'Edit Contact' ),
    );
    
    $post_types['contacts2'] = array(
        'labels'        => $labels,
        'title'         => __( 'Enter a New Contact Name' ),
        // 'menu_icon' => 
        // 'page_icon' => 
        'supports'     => array(
            'title'
            // what else?
        ),
        'public'        => true,
        'admin_body_class' => array(
            'custom-body-class'
        ),
        'has_archive'  => true,
        'rewrite'      => array(
            'slug'  => 'contacts2'
        ),
        'capability_type' => 'post',
        'edit_columns' => array(
            'title'     => __( 'Contact Name' ),
            'cm_company_name'  => __( 'Company Name' ),
            'cm_email_address' => __( 'Email Address' ),
            'cm_phone_number' => __( 'Phone Number' )
        ),
        'hide_meta_box' => array(
            'author'
        ),
    );
    return $post_types;
    
}

//** Populate Data Into Admin Columns for CPT 'contacts2' **
//* Note: can not do in Piklist
add_action( 'manage_contacts2_posts_custom_column', 'contacts2_custom_columns', 10, 2 );

function contacts2_custom_columns($column, $post_id) {
    switch ( $column ) {
        case "cm_company_name" :
            $company = get_post_meta( $post_id, 'cm_company_name', true );
            echo $company;
            break;
        case "cm_email_address" :
            $email = get_post_meta( $post_id, 'cm_email_address', true );
            echo $email;
            break;
        case "cm_phone_number" :
            $phone = get_post_meta( $post_id, 'cm_phone_number', true );
            echo $phone;
            break;
    }
}





