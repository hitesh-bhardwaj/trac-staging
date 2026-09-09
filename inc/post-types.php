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
 * Register FAQ Page Taxonomy
 * Used to sort FAQs by which page they belong to (Homepage, Enterprise Network, etc.)
 */
function trac_register_faq_taxonomy()
{
    $labels = [
        'name' => __('Pages', 'trac'),
        'singular_name' => __('Page', 'trac'),
        'menu_name' => __('Pages', 'trac'),
        'all_items' => __('All Pages', 'trac'),
        'edit_item' => __('Edit Page', 'trac'),
        'view_item' => __('View Page', 'trac'),
        'update_item' => __('Update Page', 'trac'),
        'add_new_item' => __('Add New Page', 'trac'),
        'new_item_name' => __('New Page Name', 'trac'),
        'search_items' => __('Search Pages', 'trac'),
        'not_found' => __('No pages found', 'trac'),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true, // Behaves like folders
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => ['slug' => 'faq-page'],
        // Managed via the "Page" field in FAQ Details instead of the default sidebar box.
        'meta_box_cb' => false,
    ];

    register_taxonomy('faq_category', ['faq'], $args);
}
add_action('init', 'trac_register_faq_taxonomy');

/**
 * Add a "Page" filter dropdown to the FAQs list screen so entries can be
 * browsed folder-by-folder.
 */
function trac_faq_page_filter_dropdown()
{
    global $typenow;

    if ($typenow !== 'faq') {
        return;
    }

    $selected = isset($_GET['faq_category'])
        ? sanitize_text_field(wp_unslash($_GET['faq_category']))
        : '';

    wp_dropdown_categories([
        'show_option_all' => __('All Pages', 'trac'),
        'taxonomy' => 'faq_category',
        'name' => 'faq_category',
        'orderby' => 'name',
        'selected' => $selected,
        'hierarchical' => true,
        'depth' => 3,
        'show_count' => true,
        'hide_empty' => false,
    ]);
}
add_action('restrict_manage_posts', 'trac_faq_page_filter_dropdown');

/**
 * Register Jobs Custom Post Type
 */
function trac_register_jobs_cpt()
{
    $labels = [
        'name' => __('Jobs', 'trac'),
        'singular_name' => __('Job', 'trac'),
        'menu_name' => __('Jobs', 'trac'),
        'add_new' => __('Add New', 'trac'),
        'add_new_item' => __('Add New Job', 'trac'),
        'edit_item' => __('Edit Job', 'trac'),
        'new_item' => __('New Job', 'trac'),
        'view_item' => __('View Job', 'trac'),
        'search_items' => __('Search Jobs', 'trac'),
        'not_found' => __('No jobs found', 'trac'),
        'not_found_in_trash' => __('No jobs found in trash', 'trac'),
        'all_items' => __('All Jobs', 'trac'),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-businessman',
        'menu_position' => 22,
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => false,
        'rewrite' => ['slug' => 'careers/job', 'with_front' => false],
        'capability_type' => 'post',
        'show_in_rest' => true,
    ];

    register_post_type('job', $args);
}
add_action('init', 'trac_register_jobs_cpt');
