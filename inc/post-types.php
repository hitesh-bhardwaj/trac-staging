<?php
/**
 * Custom Post Types
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

/**
 * Register Testimonials Custom Post Type
 */
function trac_register_testimonials_cpt()
{
    $labels = [
        'name' => __('Testimonials', 'trac'),
        'singular_name' => __('Testimonial', 'trac'),
        'menu_name' => __('Testimonials', 'trac'),
        'add_new' => __('Add New', 'trac'),
        'add_new_item' => __('Add New Testimonial', 'trac'),
        'edit_item' => __('Edit Testimonial', 'trac'),
        'new_item' => __('New Testimonial', 'trac'),
        'view_item' => __('View Testimonial', 'trac'),
        'search_items' => __('Search Testimonials', 'trac'),
        'not_found' => __('No testimonials found', 'trac'),
        'not_found_in_trash' => __('No testimonials found in trash', 'trac'),
        'all_items' => __('All Testimonials', 'trac'),
    ];

    $args = [
        'labels' => $labels,
        'public' => false, // Not publicly queryable
        'show_ui' => true, // Show in admin
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-format-quote',
        'menu_position' => 20,
        'supports' => ['title', 'thumbnail'],
        'has_archive' => false,
        'rewrite' => false,
        'capability_type' => 'post',
        'show_in_rest' => false, // No block editor needed
    ];

    register_post_type('testimonial', $args);
}
add_action('init', 'trac_register_testimonials_cpt');

/**
 * Register FAQs Custom Post Type
 */
function trac_register_faqs_cpt()
{
    $labels = [
        'name' => __('FAQs', 'trac'),
        'singular_name' => __('FAQ', 'trac'),
        'menu_name' => __('FAQs', 'trac'),
        'add_new' => __('Add New', 'trac'),
        'add_new_item' => __('Add New FAQ', 'trac'),
        'edit_item' => __('Edit FAQ', 'trac'),
        'new_item' => __('New FAQ', 'trac'),
        'view_item' => __('View FAQ', 'trac'),
        'search_items' => __('Search FAQs', 'trac'),
        'not_found' => __('No FAQs found', 'trac'),
        'not_found_in_trash' => __('No FAQs found in trash', 'trac'),
        'all_items' => __('All FAQs', 'trac'),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-editor-help',
        'menu_position' => 21,
        'supports' => ['title', 'editor'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'faqs', 'with_front' => false],
        'capability_type' => 'post',
        'show_in_rest' => true,
        'taxonomies' => ['faq_category'],
    ];

    register_post_type('faq', $args);
}
add_action('init', 'trac_register_faqs_cpt');

/**
 * Register FAQ Category Taxonomy
 */
function trac_register_faq_taxonomy()
{
    $labels = [
        'name' => __('FAQ Categories', 'trac'),
        'singular_name' => __('FAQ Category', 'trac'),
        'menu_name' => __('Categories', 'trac'),
        'all_items' => __('All Categories', 'trac'),
        'edit_item' => __('Edit Category', 'trac'),
        'view_item' => __('View Category', 'trac'),
        'update_item' => __('Update Category', 'trac'),
        'add_new_item' => __('Add New Category', 'trac'),
        'new_item_name' => __('New Category Name', 'trac'),
        'search_items' => __('Search Categories', 'trac'),
        'not_found' => __('No categories found', 'trac'),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true, // Like categories
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'faq-category'],
    ];

    register_taxonomy('faq_category', ['faq'], $args);
}
add_action('init', 'trac_register_faq_taxonomy');
