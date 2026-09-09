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
 * Escape a text field value for output while still allowing editors to
 * force a line break by typing <br/> (or <br>) inside an ACF text field.
 * Everything else is escaped exactly like esc_html().
 */
function trac_esc_html($text)
{
    $text = (string) $text;
    $placeholder = '%%TRAC_BR%%';
    $text = preg_replace('#<br\s*/?>#i', $placeholder, $text);
    $text = esc_html($text);
    return str_replace(esc_html($placeholder), '<br />', $text);
}

/**
 * Only auto-create/move pages in non-production environments.
 * This avoids unexpected writes for real visitors on production.
 */
function trac_can_autocreate_pages()
{
    // Always allow for site admins (safe for local/staging workflows).
    if (is_user_logged_in() && current_user_can('manage_options')) {
        return true;
    }

    if (function_exists('wp_get_environment_type')) {
        $env = wp_get_environment_type(); // 'local', 'development', 'staging', 'production'
        if (in_array($env, ['local', 'development', 'staging'], true)) {
            return true;
        }
    }

    // Heuristic for LocalWP / staging domains where env might still be "production".
    $home = function_exists('home_url') ? (string) home_url('/') : '';
    if ($home) {
        $host = wp_parse_url($home, PHP_URL_HOST);
        $host = is_string($host) ? $host : '';

        $ends_with_local = $host && substr($host, -6) === '.local';
        $has_staging = $host && strpos($host, 'staging') !== false;

        if ($host === 'localhost' || $ends_with_local || $has_staging) {
            return true;
        }
    }

    // Fallback: allow when WP_DEBUG is on.
    return defined('WP_DEBUG') && WP_DEBUG;
}

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
function trac_get_page_by_slug($slug)
{
    $posts = get_posts([
        'post_type' => 'page',
        'post_status' => 'any',
        'name' => $slug,
        'numberposts' => 1,
        'no_found_rows' => true,
    ]);

    return !empty($posts) && $posts[0] instanceof WP_Post ? $posts[0] : null;
}

function trac_ensure_solutions_parent_page()
{
    $slug = 'solutions';
    $existing = trac_get_page_by_slug($slug);
    if ($existing instanceof WP_Post) {
        return (int) $existing->ID;
    }

    if (!trac_can_autocreate_pages()) {
        return 0;
    }

    $page_id = wp_insert_post([
        'post_type' => 'page',
        'post_status' => 'publish',
        'post_title' => 'solutions',
        'post_name' => $slug,
        'post_parent' => 0,
    ]);

    return !is_wp_error($page_id) && $page_id ? (int) $page_id : 0;
}

function trac_normalize_solution_url($url)
{
    if (!is_string($url) || $url === '') {
        return $url;
    }

    $solution_slugs = [
        'enterprise-network',
        'sme-internet',
        'home-internet',
        'carrier-services',
    ];

    $path = wp_parse_url($url, PHP_URL_PATH);
    $path = trim(is_string($path) ? $path : $url, '/');

    foreach ($solution_slugs as $slug) {
        if ($path === "products/{$slug}") {
            return '/solutions/' . $slug;
        }
    }

    return $url;
}

/**
 * Ensure a page exists at $slug (creating it if missing), optionally nested
 * under $parent_id and/or forced onto a specific page template. Shared by
 * every `trac_ensure_*_page()` below so each one only has to state what's
 * different about its page rather than repeat the lookup/create/flush dance.
 *
 * @param string $slug
 * @param string $title
 * @param string|null $template Page template file to force, or null to leave it alone.
 * @param int $parent_id Parent page ID, or 0 for a top-level page.
 */
function trac_ensure_page($slug, $title, $template = null, $parent_id = 0)
{
    if (!trac_can_autocreate_pages()) {
        return;
    }

    $existing = trac_get_page_by_slug($slug);
    $did_change = false;

    if ($existing instanceof WP_Post) {
        if ($parent_id && (int) $existing->post_parent !== (int) $parent_id) {
            wp_update_post([
                'ID' => $existing->ID,
                'post_parent' => $parent_id,
            ]);
            $did_change = true;
        }

        if ($template) {
            update_post_meta($existing->ID, '_wp_page_template', $template);
        }
    } else {
        $page_id = wp_insert_post([
            'post_type' => 'page',
            'post_status' => 'publish',
            'post_title' => $title,
            'post_name' => $slug,
            'post_parent' => $parent_id,
        ]);

        if (!is_wp_error($page_id) && $page_id) {
            if ($template) {
                update_post_meta($page_id, '_wp_page_template', $template);
            }
            $did_change = true;
        }
    }

    if ($did_change) {
        // Needed when permalinks are enabled and this slug hasn't existed before.
        flush_rewrite_rules(false);
    }
}

function trac_ensure_enterprise_network_page()
{
    $solutions_id = trac_ensure_solutions_parent_page();
    if (!$solutions_id) {
        return;
    }

    trac_ensure_page(
        'enterprise-network',
        'Enterprise Network',
        null,
        $solutions_id,
    );
}
add_action('init', 'trac_ensure_enterprise_network_page');

/**
 * Ensure Home Internet page exists (so /solutions/home-internet doesn't 404).
 */
function trac_ensure_home_internet_page()
{
    $solutions_id = trac_ensure_solutions_parent_page();
    if (!$solutions_id) {
        return;
    }

    // Force the Home Internet template for clarity (slug-based template also works).
    trac_ensure_page(
        'home-internet',
        'Home Internet',
        'page-home-internet.php',
        $solutions_id,
    );
}
add_action('init', 'trac_ensure_home_internet_page');

/**
 * Ensure Carrier Services page exists (so /solutions/carrier-services doesn't 404).
 */
function trac_ensure_carrier_services_page()
{
    $solutions_id = trac_ensure_solutions_parent_page();
    if (!$solutions_id) {
        return;
    }

    trac_ensure_page(
        'carrier-services',
        'Carrier Services',
        'page-carrier-services.php',
        $solutions_id,
    );
}
add_action('init', 'trac_ensure_carrier_services_page');

/**
 * Ensure SME Internet page exists (so /solutions/sme-internet doesn't 404).
 */
function trac_ensure_sme_internet_page()
{
    $solutions_id = trac_ensure_solutions_parent_page();
    if (!$solutions_id) {
        return;
    }

    trac_ensure_page(
        'sme-internet',
        'SME Internet',
        'page-sme-internet.php',
        $solutions_id,
    );
}
add_action('init', 'trac_ensure_sme_internet_page');

/**
 * Ensure Contact Us page exists (so /contact-us doesn't 404 on staging/local).
 */
function trac_ensure_contact_us_page()
{
    trac_ensure_page('contact-us', 'Contact Us', 'page-contact-us.php');
}
add_action('init', 'trac_ensure_contact_us_page');

/**
 * Redirect legacy product URLs to the new /solutions/* routes.
 * Keeps old bookmarks working after we nest pages under solutions.
 */
function trac_redirect_legacy_product_routes()
{
    if (!is_404()) {
        return;
    }

    $path = '';
    if (!empty($_SERVER['REQUEST_URI'])) {
        $path = wp_parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
    $path = trim((string) $path, '/');

    $legacy_routes = [
        'home-internet',
        'carrier-services',
        'enterprise-network',
        'sme-internet',
    ];

    foreach ($legacy_routes as $slug) {
        if ($path === $slug || $path === "products/{$slug}") {
            wp_safe_redirect(home_url('/solutions/' . $slug), 301);
            exit();
        }
    }
}
add_action('template_redirect', 'trac_redirect_legacy_product_routes', 0);

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
    // ponytail: .vite-dev is gitignored, so this can never switch on in production
    $is_dev = file_exists(TRAC_DIR . '/.vite-dev');

    if ($is_dev) {
        // Development: Load from Vite dev server.
        // Must match `base` in vite.config.js, derived so a theme rename stays in sync.
        $vite =
            'http://localhost:5173' . wp_make_link_relative(TRAC_URI) . '/dist';

        wp_enqueue_script(
            'vite-client',
            $vite . '/@vite/client',
            [],
            null,
            false,
        );
        wp_enqueue_script(
            'trac-main',
            $vite . '/src/js/main.js',
            [],
            null,
            true,
        );
        // Vite serves CSS as a JS module in dev, so main.css is enqueued as a script
        wp_enqueue_script(
            'trac-main-css',
            $vite . '/src/css/main.css',
            [],
            null,
            false,
        );

        // Add type="module" to Vite scripts
        add_filter(
            'script_loader_tag',
            function ($tag, $handle) {
                if (
                    in_array($handle, [
                        'vite-client',
                        'trac-main',
                        'trac-main-css',
                    ])
                ) {
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
            'menu_slug' => 'header-settings',
            'parent_slug' => 'theme-settings',
        ]);

        acf_add_options_sub_page([
            'page_title' => __('Footer Settings', 'trac'),
            'menu_title' => __('Footer', 'trac'),
            'menu_slug' => 'footer-settings',
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
 * Allow SVG uploads (WordPress core blocks them by default).
 * Restricted to users who can already upload files (e.g. editors/admins).
 */
function trac_allow_svg_upload($mimes)
{
    if (current_user_can('upload_files')) {
        $mimes['svg'] = 'image/svg+xml';
    }
    return $mimes;
}
add_filter('upload_mimes', 'trac_allow_svg_upload');

function trac_fix_svg_filetype_check($data, $file, $filename, $mimes)
{
    if (!$data['type']) {
        $filetype = wp_check_filetype($filename, $mimes);
        if ($filetype['ext'] === 'svg') {
            $data['ext'] = 'svg';
            $data['type'] = 'image/svg+xml';
        }
    }
    return $data;
}
add_filter(
    'wp_check_filetype_and_ext',
    'trac_fix_svg_filetype_check',
    10,
    4,
);

/**
 * Split a textarea value into separate lines/paragraphs on blank lines,
 * trimming each and dropping empty ones. Lets a single ACF field replace
 * what used to be several "Line 1" / "Line 2" fields.
 *
 * @return string[]
 */
function trac_split_lines($text)
{
    if (!$text) {
        return [];
    }
    $parts = preg_split('/\R{2,}/', trim((string) $text));
    $parts = array_map('trim', $parts);
    return array_values(array_filter($parts, static fn($p) => $p !== ''));
}

/**
 * Helper: Get section template
 */
function trac_get_section($section_name, $args = [])
{
    if (!empty($args)) {
        extract($args);
    }

    if ($section_name === 'cta') {
        get_template_part('template-parts/common/cta', null, $args);
        return;
    }

    get_template_part('template-parts/sections/' . $section_name, null, $args);
}

/**
 * Helper: Build FAQ section data for shared templates.
 */
function trac_get_faq_section_args($overrides = [])
{
    $section_label =
        $overrides['section_label'] ?? get_field('faq_section_label');
    $section_title =
        $overrides['section_title'] ?? get_field('faq_section_title');
    $display_mode =
        $overrides['display_mode'] ??
        (get_field('faq_display_mode') ?? 'latest');
    $faq_limit = $overrides['limit'] ?? (get_field('faq_limit') ?? 5);
    $open_first = $overrides['open_first'] ?? get_field('faq_open_first');
    $open_first = $open_first !== null ? (bool) $open_first : true;

    $query_args = [
        'post_type' => 'faq',
        'post_status' => 'publish',
        'posts_per_page' => $faq_limit > 0 ? (int) $faq_limit : -1,
        'orderby' => 'menu_order date',
        'order' => 'ASC',
    ];

    switch ($display_mode) {
        case 'category':
            $categories =
                $overrides['categories'] ?? get_field('faq_categories');
            if ($categories) {
                $query_args['tax_query'] = [
                    [
                        'taxonomy' => 'faq_category',
                        'field' => 'term_id',
                        'terms' => $categories,
                    ],
                ];
            }
            break;

        case 'specific':
            $specific_faqs =
                $overrides['specific_items'] ?? get_field('faq_specific_items');
            if ($specific_faqs) {
                $query_args['post__in'] = $specific_faqs;
                $query_args['orderby'] = 'post__in';
            }
            break;

        case 'all':
            $query_args['posts_per_page'] = -1;
            break;
    }

    $items = [];
    $faqs_query = new WP_Query($query_args);

    if ($faqs_query->have_posts()) {
        while ($faqs_query->have_posts()) {
            $faqs_query->the_post();

            $answer = get_field('faq_answer');
            if (!$answer) {
                $answer = get_the_content();
            }

            $items[] = [
                'question' => get_the_title(),
                'answer' => $answer,
            ];
        }

        wp_reset_postdata();
    }

    if (!$items && !empty($overrides['fallback_faqs'])) {
        $items = $overrides['fallback_faqs'];
    }

    return array_merge($overrides, [
        'section_label' => $section_label,
        'section_title' => $section_title,
        'open_first' => $open_first,
        'items' => $items,
    ]);
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
 * Create core pages once when missing.
 */
function trac_maybe_create_core_pages()
{
    $option_key = 'trac_core_pages_created';

    if (get_option($option_key)) {
        return;
    }

    $about_page = get_page_by_path('about-us');

    if (!$about_page) {
        wp_insert_post([
            'post_title' => 'About Us',
            'post_name' => 'about-us',
            'post_type' => 'page',
            'post_status' => 'publish',
            'post_excerpt' =>
                'Learn more about Trac, our approach, and the values behind our network solutions.',
            'post_content' =>
                "Trac delivers connectivity solutions designed around reliability, scale, and long-term partnership.\n\nUpdate this content from the WordPress editor any time.",
        ]);
    }

    update_option($option_key, 1);
}
add_action('init', 'trac_maybe_create_core_pages');

/**
 * Disable Gutenberg for pages using ACF sections
 */
function trac_disable_gutenberg($use_block_editor, $post)
{
    // All pages are fully ACF-driven, so use the classic editor everywhere
    // for a consistent editing experience (ACF fields appear directly on
    // the page, no Gutenberg block canvas above them).
    if ($post->post_type === 'page') {
        return false;
    }
    return $use_block_editor;
}
add_filter('use_block_editor_for_post', 'trac_disable_gutenberg', 10, 2);

/**
 * Hide the default (empty) "Content" editor box on pages that use one of
 * our custom ACF-driven templates, or that are the static front page.
 * None of these templates call the_content(), so the box is always empty.
 */
function trac_hide_empty_content_editor()
{
    $screen = get_current_screen();
    if (!$screen || $screen->base !== 'post' || $screen->id !== 'page') {
        return;
    }

    $post_id = isset($_GET['post']) ? (int) $_GET['post'] : 0;
    if (!$post_id) {
        return;
    }

    $template = get_page_template_slug($post_id);
    $is_front_page = (int) get_option('page_on_front') === $post_id;

    if ($template !== '' || $is_front_page) {
        remove_post_type_support('page', 'editor');
    }
}
add_action('current_screen', 'trac_hide_empty_content_editor');

/**
 * Fix REST API 403 errors
 * Allow REST API access for logged-in users
 */
function trac_fix_rest_api_permissions()
{
    // Remove REST API restrictions
    remove_filter(
        'rest_authentication_errors',
        'rest_cookie_check_errors',
        100,
    );
}
add_action('rest_api_init', 'trac_fix_rest_api_permissions', 10);

/**
 * Allow REST API for all authenticated users
 */
add_filter('rest_authentication_errors', function ($result) {
    if (!empty($result)) {
        return $result;
    }
    if (!is_user_logged_in()) {
        return new WP_Error(
            'rest_not_logged_in',
            'You are not currently logged in.',
            ['status' => 401],
        );
    }
    return $result;
});

/**
 * Disable CF7's automatic wpautop() on form markup (not mail bodies). Our form
 * templates use custom HTML (buttons, wrapper divs, spans) and wpautop silently
 * wraps lines in <p> and inserts <br> between them, breaking flex layouts and
 * the label/input structure of custom fields like the Solutions radio picker.
 */
add_filter('wpcf7_autop_or_not', 'trac_disable_wpcf7_autop_for_forms', 10, 2);
function trac_disable_wpcf7_autop_for_forms($autop, $options)
{
    if (isset($options['for']) && 'mail' === $options['for']) {
        return $autop;
    }

    return false;
}

/**
 * Style every Contact Form 7 submit button as the same animated .btn.btn-primary
 * pill used in hero sections (sliding line, text shift, fading arrow icon on hover).
 * Rebuilds CF7's plain <input type="submit"> into the identical <button> markup
 * hero.php uses, while preserving CF7's own classes so its JS/AJAX/spinner still work.
 */
add_filter('wpcf7_form_elements', 'trac_style_wpcf7_submit_button');
function trac_style_wpcf7_submit_button($content)
{
    return preg_replace_callback(
        '/<input\s+[^>]*type="submit"[^>]*>/i',
        'trac_render_btn_primary_submit',
        $content,
    );
}

function trac_render_btn_primary_submit($matches)
{
    $tag = $matches[0];

    if (false === strpos($tag, 'wpcf7-submit')) {
        return $tag;
    }

    preg_match('/value="([^"]*)"/i', $tag, $value_match);
    preg_match('/class="([^"]*)"/i', $tag, $class_match);
    preg_match('/id="([^"]*)"/i', $tag, $id_match);

    $label = isset($value_match[1]) ? $value_match[1] : 'Submit';
    $classes = isset($class_match[1])
        ? $class_match[1]
        : 'wpcf7-form-control wpcf7-submit has-spinner';
    $id_attr = isset($id_match[1])
        ? ' id="' . esc_attr($id_match[1]) . '"'
        : '';

    $svg =
        '<svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">' .
        '<path d="M9.45369 8.66578C9.45369 8.86726 9.37668 9.06894 9.22286 9.22276L1.34483 17.1008C1.03699 17.4086 0.538513 17.4086 0.230876 17.1008C-0.0767616 16.793 -0.0769585 16.2945 0.230875 15.9868L7.55193 8.66578L0.230875 1.34473C-0.0769592 1.03689 -0.0769592 0.538408 0.230875 0.230772C0.538709 -0.0768662 1.03719 -0.0770627 1.34483 0.230772L9.22286 8.1088C9.37668 8.26262 9.45369 8.4643 9.45369 8.66578Z" fill="currentColor"/>' .
        '<path d="M16.4537 8.66578C16.4537 8.86726 16.3767 9.06894 16.2229 9.22276L8.34483 17.1008C8.03699 17.4086 7.53851 17.4086 7.23088 17.1008C6.92324 16.793 6.92304 16.2945 7.23088 15.9868L14.5519 8.66578L7.23087 1.34473C6.92304 1.03689 6.92304 0.538408 7.23087 0.230772C7.53871 -0.0768662 8.03719 -0.0770627 8.34483 0.230772L16.2229 8.1088C16.3767 8.26262 16.4537 8.4643 16.4537 8.66578Z" fill="currentColor"/>' .
        '</svg>';

    return sprintf(
        '<button type="submit"%s class="%s btn btn-primary group magnetic"><span class="btn-line"></span><span class="btn-text">%s</span><span class="btn-icon">%s</span></button>',
        $id_attr,
        esc_attr($classes),
        $label,
        $svg,
    );
}

/**
 * Restrict the contact form's "Phone Number" field (your-number) to digits only.
 * Field stays a plain text input (per Figma design); this enforces numeric-only
 * server-side since the front-end input filtering can be bypassed.
 */
add_filter(
    'wpcf7_validate_text*',
    'trac_validate_phone_number_digits_only',
    20,
    2,
);
function trac_validate_phone_number_digits_only($result, $tag)
{
    if ('your-number' !== $tag->name) {
        return $result;
    }

    $value = isset($_POST['your-number'])
        ? trim(wp_unslash($_POST['your-number']))
        : '';

    if ('' !== $value && !preg_match('/^[0-9]+$/', $value)) {
        $result->invalidate($tag, 'Please enter numbers only.');
    }

    return $result;
}
