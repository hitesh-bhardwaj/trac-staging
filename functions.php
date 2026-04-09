<?php
/**
 * Trac Corporate Theme Functions
 *
 * @package Trac
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit();
}

// Theme version for cache busting
define('TRAC_VERSION', '1.0.0');
define('TRAC_DIR', get_template_directory());
define('TRAC_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function trac_setup()
{
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);
    add_theme_support('custom-logo', [
        'height' => 100,
        'width' => 300,
        'flex-height' => true,
        'flex-width' => true,
    ]);
    add_theme_support('menus');

    // Register navigation menus
    register_nav_menus([
        'primary' => __('Primary Navigation', 'trac'),
        'footer' => __('Footer Navigation', 'trac'),
    ]);

    // Set content width
    $GLOBALS['content_width'] = 1400;
}
add_action('after_setup_theme', 'trac_setup');

/**
 * Ensure key utility pages exist in local/staging environments.
 * This prevents 404s when templates are added but the WP Page doesn't exist yet.
 */
function trac_ensure_enterprise_network_page()
{
    // Only allow an admin to auto-create pages to avoid unexpected writes for visitors.
    if (!is_user_logged_in() || !current_user_can('manage_options')) {
        return;
    }

    $slug = 'enterprise-network';
    $existing = get_page_by_path($slug, OBJECT, 'page');
    if ($existing instanceof WP_Post) {
        return;
    }

    $page_id = wp_insert_post([
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_title' => 'Enterprise Network',
        'post_name' => $slug,
    ]);

    if (!is_wp_error($page_id) && $page_id) {
        // Needed when permalinks are enabled and this slug hasn't existed before.
        flush_rewrite_rules(false);
    }
}
add_action('init', 'trac_ensure_enterprise_network_page');

/**
 * Ensure Partners page exists (so /partners doesn't 404 on staging/local).
 */
function trac_ensure_partners_page()
{
    // Only allow an admin to auto-create pages to avoid unexpected writes for visitors.
    if (!is_user_logged_in() || !current_user_can('manage_options')) {
        return;
    }

    $slug = 'partners';
    $existing = get_page_by_path($slug, OBJECT, 'page');
    if ($existing instanceof WP_Post) {
        return;
    }

    $page_id = wp_insert_post([
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_title' => 'Partners',
        'post_name' => $slug,
    ]);

    if (!is_wp_error($page_id) && $page_id) {
        // Force the Partners template for clarity (slug-based template also works).
        update_post_meta($page_id, '_wp_page_template', 'page-partners.php');

        // Needed when permalinks are enabled and this slug hasn't existed before.
        flush_rewrite_rules(false);
    }
}
add_action('init', 'trac_ensure_partners_page');

/**
 * Enqueue Styles and Scripts
 */
function trac_enqueue_assets()
{
    $manifest_path = TRAC_DIR . '/dist/.vite/manifest.json';
    $main_css_path = TRAC_DIR . '/src/css/main.css';
    $main_css_version = file_exists($main_css_path)
        ? filemtime($main_css_path)
        : TRAC_VERSION;

    // Check if we're in development mode (Vite dev server running)
    $is_dev =
        defined('WP_DEBUG') && WP_DEBUG && file_exists(TRAC_DIR . '/.vite-dev');

    if ($is_dev) {
        // Development: Load from Vite dev server
        wp_enqueue_script(
            'vite-client',
            'http://localhost:5173/@vite/client',
            [],
            null,
            false,
        );
        wp_enqueue_script(
            'trac-main',
            'http://localhost:5173/src/js/main.js',
            [],
            null,
            true,
        );

        // Add type="module" to Vite scripts
        add_filter(
            'script_loader_tag',
            function ($tag, $handle) {
                if (in_array($handle, ['vite-client', 'trac-main'])) {
                    return str_replace(' src', ' type="module" src', $tag);
                }
                return $tag;
            },
            10,
            2,
        );
    } elseif (file_exists($manifest_path)) {
        // Production: Load from built manifest
        $manifest = json_decode(file_get_contents($manifest_path), true);

        // Enqueue CSS
        if (isset($manifest['src/css/main.css'])) {
            wp_enqueue_style(
                'trac-style',
                TRAC_URI . '/dist/' . $manifest['src/css/main.css']['file'],
                [],
                TRAC_VERSION,
            );
        }

        // Enqueue JS
        if (isset($manifest['src/js/main.js'])) {
            $main_entry = $manifest['src/js/main.js'];

            wp_enqueue_script(
                'trac-main',
                TRAC_URI . '/dist/' . $main_entry['file'],
                ['lenis-init'], // Wait for Lenis to load first
                TRAC_VERSION,
                true,
            );

            // Add type="module" to main script
            add_filter(
                'script_loader_tag',
                function ($tag, $handle) {
                    if ($handle === 'trac-main') {
                        return str_replace(' src', ' type="module" src', $tag);
                    }
                    return $tag;
                },
                10,
                2,
            );

            // Preload chunk imports for better performance
            if (!empty($main_entry['imports'])) {
                add_action(
                    'wp_head',
                    function () use ($manifest, $main_entry) {
                        foreach ($main_entry['imports'] as $import) {
                            if (isset($manifest[$import])) {
                                $chunk_file = $manifest[$import]['file'];
                                echo '<link rel="modulepreload" href="' .
                                    esc_url(TRAC_URI . '/dist/' . $chunk_file) .
                                    '">' .
                                    "\n";
                            }
                        }
                    },
                    1,
                );
            }
        }
    } else {
        // Fallback: Load source files directly (for initial development)
        wp_enqueue_style(
            'trac-style-dev',
            TRAC_URI . '/src/css/main.css',
            [],
            $main_css_version,
        );
    }

    // Localize script data for JavaScript
    wp_localize_script('trac-main', 'tracData', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('trac_nonce'),
        'themeUrl' => TRAC_URI,
    ]);
}
add_action('wp_enqueue_scripts', 'trac_enqueue_assets');

/**
 * Remove WordPress defaults that conflict with custom setup
 */
function trac_clean_head()
{
    // Remove emoji scripts
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');

    // Remove unnecessary meta
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');

    // Remove block library CSS (if not using Gutenberg)
    if (!is_admin()) {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('global-styles');
    }
}
add_action('init', 'trac_clean_head');

/**
 * Custom Post Types
 */
if (file_exists(TRAC_DIR . '/inc/post-types.php')) {
    require_once TRAC_DIR . '/inc/post-types.php';
}

/**
 * ACF Fields Registration
 */
if (file_exists(TRAC_DIR . '/inc/acf-fields.php')) {
    require_once TRAC_DIR . '/inc/acf-fields.php';
}

/**
 * ACF Options Page
 */
function trac_acf_options_page()
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => __('Theme Settings', 'trac'),
            'menu_title' => __('Theme Settings', 'trac'),
            'menu_slug' => 'theme-settings',
            'capability' => 'edit_posts',
            'redirect' => false,
            'icon_url' => 'dashicons-admin-customizer',
            'position' => 2,
        ]);

        acf_add_options_sub_page([
            'page_title' => __('Header Settings', 'trac'),
            'menu_title' => __('Header', 'trac'),
            'parent_slug' => 'theme-settings',
        ]);

        acf_add_options_sub_page([
            'page_title' => __('Footer Settings', 'trac'),
            'menu_title' => __('Footer', 'trac'),
            'parent_slug' => 'theme-settings',
        ]);
    }
}
add_action('acf/init', 'trac_acf_options_page');

/**
 * Custom Image Sizes
 */
function trac_image_sizes()
{
    add_image_size('hero', 1920, 1080, true);
    add_image_size('card', 600, 400, true);
    add_image_size('card-lg', 800, 600, true);
}
add_action('after_setup_theme', 'trac_image_sizes');

/**
 * Helper: Get section template
 */
function trac_get_section($section_name, $args = [])
{
    if (!empty($args)) {
        extract($args);
    }
    get_template_part('template-parts/sections/' . $section_name, null, $args);
}

/**
 * Helper: Render ACF Flexible Content sections
 */
function trac_render_sections($field_name = 'page_sections')
{
    if (have_rows($field_name)) {
        while (have_rows($field_name)) {
            the_row();
            $layout = get_row_layout();
            trac_get_section($layout);
        }
    }
}

/**
 * Add body classes
 */
function trac_body_classes($classes)
{
    // Add page slug
    if (is_singular()) {
        global $post;
        $classes[] = 'page-' . $post->post_name;
    }

    // Add smooth scroll class
    $classes[] = 'has-smooth-scroll';

    return $classes;
}
add_filter('body_class', 'trac_body_classes');

/**
 * Disable Gutenberg for pages using ACF sections
 */
function trac_disable_gutenberg($use_block_editor, $post)
{
    if ($post->post_type === 'page') {
        // Check if page has flexible content layout
        if (get_field('page_sections', $post->ID)) {
            return false;
        }
    }
    return $use_block_editor;
}
add_filter('use_block_editor_for_post', 'trac_disable_gutenberg', 10, 2);
