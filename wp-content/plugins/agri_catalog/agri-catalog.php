<?php
/**
 * Plugin Name: Agricultural Catalog
 * Description: Adds a product catalog for agricultural items using a custom post type and taxonomy.
 * Version: 1.0.0
 * Author: Pi Assistant
 * Text Domain: agri-catalog
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Register Custom Post Type
function agri_catalog_product_cpt() {
    $labels = array(
        'name'                  => _x('Products', 'Post Type General Name', 'agri-catalog'),
        'singular_name'         => _x('Product', 'Post Type Singular Name', 'agri-catalog'),
        'menu_name'             => __('Agricultural Products', 'agri-catalog'),
        'name_admin_bar'        => __('Product', 'agri-catalog'),
        'add_new_item'          => __('Add New Product', 'agri-catalog'),
        'edit_item'             => __('Edit Product', 'agri-catalog'),
        'new_item'              => __('New Product', 'agri-catalog'),
        'view_item'             => __('View Product', 'agri-catalog'),
        'search_items'          => __('Search Products', 'agri-catalog'),
    );
    $args = array(
        'label'                 => __('Product', 'agri-catalog'),
        'description'           => __('Catalog of agricultural products', 'agri-catalog'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'taxonomies'            => array('agri_category'),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-carrot',
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'products'),
        'show_in_rest'          => true,
    );
    register_post_type('agri_product', $args);
}
add_action('init', 'agri_catalog_product_cpt');

// Register Custom Taxonomy
function agri_catalog_category_taxonomy() {
    $labels = array(
        'name'              => _x('Categories', 'taxonomy general name', 'agri-catalog'),
        'singular_name'     => _x('Category', 'taxonomy singular name', 'agri-catalog'),
        'search_items'      => __('Search Categories', 'agri-catalog'),
        'all_items'         => __('All Categories', 'agri-catalog'),
        'parent_item'       => __('Parent Category', 'agri-catalog'),
        'parent_item_colon' => __('Parent Category:', 'agri-catalog'),
        'edit_item'         => __('Edit Category', 'agri-catalog'),
        'update_item'       => __('Update Category', 'agri-catalog'),
        'add_new_item'      => __('Add New Category', 'agri-catalog'),
        'new_item_name'     => __('New Category Name', 'agri-catalog'),
        'menu_name'         => __('Product Categories', 'agri-catalog'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'product-category'),
        'show_in_rest'      => true,
    );
    register_taxonomy('agri_category', array('agri_product'), $args);
}
add_action('init', 'agri_catalog_category_taxonomy');

?>