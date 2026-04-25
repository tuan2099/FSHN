<?php
/**
 * Register Custom Post Types
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function fohn_register_cpts() {

    /**
     * Post Type: Rooms
     */
    $labels_room = array(
        'name'                  => _x( 'Rooms', 'Post Type General Name', 'fohn' ),
        'singular_name'         => _x( 'Room', 'Post Type Singular Name', 'fohn' ),
        'menu_name'             => __( 'Rooms', 'fohn' ),
        'name_admin_bar'        => __( 'Room', 'fohn' ),
        'archives'              => __( 'Room Archives', 'fohn' ),
        'attributes'            => __( 'Room Attributes', 'fohn' ),
        'parent_item_colon'     => __( 'Parent Room:', 'fohn' ),
        'all_items'             => __( 'All Rooms', 'fohn' ),
        'add_new_item'          => __( 'Add New Room', 'fohn' ),
        'add_new'               => __( 'Add New', 'fohn' ),
        'new_item'              => __( 'New Room', 'fohn' ),
        'edit_item'             => __( 'Edit Room', 'fohn' ),
        'update_item'           => __( 'Update Room', 'fohn' ),
        'view_item'             => __( 'View Room', 'fohn' ),
        'view_items'            => __( 'View Rooms', 'fohn' ),
        'search_items'          => __( 'Search Room', 'fohn' ),
        'not_found'             => __( 'Not found', 'fohn' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'fohn' ),
        'featured_image'        => __( 'Featured Image', 'fohn' ),
        'set_featured_image'    => __( 'Set featured image', 'fohn' ),
        'remove_featured_image' => __( 'Remove featured image', 'fohn' ),
        'use_featured_image'    => __( 'Use as featured image', 'fohn' ),
        'insert_into_item'      => __( 'Insert into room', 'fohn' ),
        'uploaded_to_this_item' => __( 'Uploaded to this room', 'fohn' ),
        'items_list'            => __( 'Rooms list', 'fohn' ),
        'items_list_navigation' => __( 'Rooms list navigation', 'fohn' ),
        'filter_items_list'     => __( 'Filter rooms list', 'fohn' ),
    );
    $args_room = array(
        'label'                 => __( 'Room', 'fohn' ),
        'description'           => __( 'Manage hotel rooms', 'fohn' ),
        'labels'                => $labels_room,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-home',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );
    register_post_type( 'room', $args_room );

    /**
     * Post Type: Offers
     */
    $labels_offer = array(
        'name'                  => _x( 'Offers', 'Post Type General Name', 'fohn' ),
        'singular_name'         => _x( 'Offer', 'Post Type Singular Name', 'fohn' ),
        'menu_name'             => __( 'Offers', 'fohn' ),
        'name_admin_bar'        => __( 'Offer', 'fohn' ),
        'all_items'             => __( 'All Offers', 'fohn' ),
        'add_new_item'          => __( 'Add New Offer', 'fohn' ),
        'add_new'               => __( 'Add New', 'fohn' ),
        'new_item'              => __( 'New Offer', 'fohn' ),
        'edit_item'             => __( 'Edit Offer', 'fohn' ),
        'update_item'           => __( 'Update Offer', 'fohn' ),
        'view_item'             => __( 'View Offer', 'fohn' ),
        'search_items'          => __( 'Search Offer', 'fohn' ),
        'not_found'             => __( 'Not found', 'fohn' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'fohn' ),
    );
    $args_offer = array(
        'label'                 => __( 'Offer', 'fohn' ),
        'description'           => __( 'Manage special offers', 'fohn' ),
        'labels'                => $labels_offer,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-tag',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'offer', $args_offer );

}
add_action( 'init', 'fohn_register_cpts', 0 );
