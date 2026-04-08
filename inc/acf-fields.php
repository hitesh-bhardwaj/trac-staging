<?php
/**
 * ACF Field Definitions
 *
 * Register all ACF field groups for the Trac theme.
 * These fields provide content editing capabilities for non-technical users.
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

/**
 * Register ACF Field Groups
 */
function trac_register_acf_fields()
{
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // ========================================
    // Page Sections (Flexible Content)
    // ========================================
    acf_add_local_field_group([
        'key' => 'group_page_sections',
        'title' => 'Page Sections',
        'fields' => [
            [
                'key' => 'field_page_sections',
                'label' => 'Page Sections',
                'name' => 'page_sections',
                'type' => 'flexible_content',
                'instructions' =>
                    'Add, edit, and reorder sections to build your page.',
                'button_label' => 'Add Section',
                'layouts' => [
                    // Hero Section
                    trac_acf_layout_hero(),
                    // Features Section
                    trac_acf_layout_features(),
                    // CTA Section
                    trac_acf_layout_cta(),
                    // Content Section
                    trac_acf_layout_content(),
                    // Stats Section
                    trac_acf_layout_stats(),
                    // Testimonials Section
                    trac_acf_layout_testimonials(),
                    // Cards Section
                    trac_acf_layout_cards(),
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
    ]);

    // ========================================
    // Theme Settings - Header
    // ========================================
    acf_add_local_field_group([
        'key' => 'group_header_settings',
        'title' => 'Header Settings',
        'fields' => [
            [
                'key' => 'field_header_cta_text',
                'label' => 'CTA Button Text',
                'name' => 'header_cta_text',
                'type' => 'text',
                'placeholder' => 'Get Started',
            ],
            [
                'key' => 'field_header_cta_link',
                'label' => 'CTA Button Link',
                'name' => 'header_cta_link',
                'type' => 'url',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-header',
                ],
            ],
        ],
    ]);

    // ========================================
    // Theme Settings - Footer
    // ========================================
    acf_add_local_field_group([
        'key' => 'group_footer_settings',
        'title' => 'Footer Settings',
        'fields' => [
            [
                'key' => 'field_footer_description',
                'label' => 'Company Description',
                'name' => 'footer_description',
                'type' => 'textarea',
                'rows' => 3,
            ],
            [
                'key' => 'field_social_links',
                'label' => 'Social Links',
                'name' => 'social_links',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add Social Link',
                'sub_fields' => [
                    [
                        'key' => 'field_social_platform',
                        'label' => 'Platform',
                        'name' => 'platform',
                        'type' => 'select',
                        'choices' => [
                            'twitter' => 'Twitter / X',
                            'linkedin' => 'LinkedIn',
                            'facebook' => 'Facebook',
                            'instagram' => 'Instagram',
                            'youtube' => 'YouTube',
                            'github' => 'GitHub',
                        ],
                    ],
                    [
                        'key' => 'field_social_url',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                    ],
                ],
            ],
            [
                'key' => 'field_footer_columns',
                'label' => 'Footer Columns',
                'name' => 'footer_columns',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add Column',
                'max' => 3,
                'sub_fields' => [
                    [
                        'key' => 'field_column_title',
                        'label' => 'Column Title',
                        'name' => 'title',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_column_links',
                        'label' => 'Links',
                        'name' => 'links',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'button_label' => 'Add Link',
                        'sub_fields' => [
                            [
                                'key' => 'field_link_item',
                                'label' => 'Link',
                                'name' => 'link',
                                'type' => 'link',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'key' => 'field_legal_links',
                'label' => 'Legal Links',
                'name' => 'legal_links',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add Legal Link',
                'sub_fields' => [
                    [
                        'key' => 'field_legal_link_item',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'link',
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-footer',
                ],
            ],
        ],
    ]);
}
add_action('acf/init', 'trac_register_acf_fields');

// ========================================
// Layout Definitions
// ========================================

/**
 * Hero Section Layout - Trac/Enigma Design
 */
function trac_acf_layout_hero()
{
    return [
        'key' => 'layout_hero',
        'name' => 'hero',
        'label' => 'Hero Section',
        'display' => 'block',
        'sub_fields' => [
            [
                'key' => 'field_hero_title_line1',
                'label' => 'Title Line 1',
                'name' => 'title_line1',
                'type' => 'text',
                'required' => true,
                'default_value' => "Powering Africa's",
                'placeholder' => "Powering Africa's",
            ],
            [
                'key' => 'field_hero_title_line2',
                'label' => 'Title Line 2',
                'name' => 'title_line2',
                'type' => 'text',
                'required' => true,
                'default_value' => 'Digital Future.',
                'placeholder' => 'Digital Future.',
            ],
            [
                'key' => 'field_hero_subtitle',
                'label' => 'Subtitle',
                'name' => 'subtitle',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' =>
                    "We don't just provide internet; we provide the tools for innovation, education, and global reach.",
            ],
            [
                'key' => 'field_hero_cta_primary',
                'label' => 'Primary CTA Button',
                'name' => 'cta_primary',
                'type' => 'link',
                'instructions' => 'Main action button (e.g., "Get Connected")',
            ],
            [
                'key' => 'field_hero_cta_secondary',
                'label' => 'Secondary CTA Button',
                'name' => 'cta_secondary',
                'type' => 'link',
                'instructions' =>
                    'Outline style button (e.g., "Explore Products")',
            ],
            [
                'key' => 'field_hero_globe_image',
                'label' => 'Globe/Map Image',
                'name' => 'globe_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'instructions' =>
                    'Custom globe or map visualization. Leave empty to use default SVG globe.',
            ],
        ],
    ];
}

/**
 * Features Section Layout
 */
function trac_acf_layout_features()
{
    return [
        'key' => 'layout_features',
        'name' => 'features',
        'label' => 'Features Section',
        'display' => 'block',
        'sub_fields' => [
            [
                'key' => 'field_features_eyebrow',
                'label' => 'Eyebrow Text',
                'name' => 'eyebrow',
                'type' => 'text',
            ],
            [
                'key' => 'field_features_title',
                'label' => 'Section Title',
                'name' => 'title',
                'type' => 'text',
                'required' => true,
            ],
            [
                'key' => 'field_features_description',
                'label' => 'Section Description',
                'name' => 'description',
                'type' => 'textarea',
                'rows' => 2,
            ],
            [
                'key' => 'field_features_items',
                'label' => 'Features',
                'name' => 'features',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add Feature',
                'min' => 1,
                'max' => 6,
                'sub_fields' => [
                    [
                        'key' => 'field_feature_icon',
                        'label' => 'Icon',
                        'name' => 'icon',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                    ],
                    [
                        'key' => 'field_feature_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'required' => true,
                    ],
                    [
                        'key' => 'field_feature_description',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 3,
                    ],
                    [
                        'key' => 'field_feature_link',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'link',
                    ],
                ],
            ],
            [
                'key' => 'field_features_layout',
                'label' => 'Layout',
                'name' => 'layout',
                'type' => 'select',
                'choices' => [
                    'grid-3' => '3 Columns',
                    'grid-2' => '2 Columns',
                    'list' => 'List',
                ],
                'default_value' => 'grid-3',
            ],
            [
                'key' => 'field_features_bg',
                'label' => 'Background',
                'name' => 'background',
                'type' => 'select',
                'choices' => [
                    'white' => 'White',
                    'light' => 'Light Gray',
                    'dark' => 'Dark',
                ],
                'default_value' => 'white',
            ],
        ],
    ];
}

/**
 * CTA Section Layout
 */
function trac_acf_layout_cta()
{
    return [
        'key' => 'layout_cta',
        'name' => 'cta',
        'label' => 'Call to Action',
        'display' => 'block',
        'sub_fields' => [
            [
                'key' => 'field_cta_title',
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'required' => true,
            ],
            [
                'key' => 'field_cta_description',
                'label' => 'Description',
                'name' => 'description',
                'type' => 'textarea',
                'rows' => 2,
            ],
            [
                'key' => 'field_cta_button',
                'label' => 'Button',
                'name' => 'button',
                'type' => 'link',
            ],
            [
                'key' => 'field_cta_bg',
                'label' => 'Background',
                'name' => 'background',
                'type' => 'select',
                'choices' => [
                    'primary' => 'Brand Primary',
                    'secondary' => 'Brand Secondary',
                    'dark' => 'Dark',
                    'gradient' => 'Gradient',
                ],
                'default_value' => 'primary',
            ],
        ],
    ];
}

/**
 * Content Section Layout
 */
function trac_acf_layout_content()
{
    return [
        'key' => 'layout_content',
        'name' => 'content',
        'label' => 'Content Section',
        'display' => 'block',
        'sub_fields' => [
            [
                'key' => 'field_content_layout',
                'label' => 'Layout',
                'name' => 'layout',
                'type' => 'select',
                'choices' => [
                    'text-only' => 'Text Only',
                    'text-image' => 'Text + Image',
                    'image-text' => 'Image + Text',
                ],
                'default_value' => 'text-image',
            ],
            [
                'key' => 'field_content_eyebrow',
                'label' => 'Eyebrow Text',
                'name' => 'eyebrow',
                'type' => 'text',
            ],
            [
                'key' => 'field_content_title',
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
            ],
            [
                'key' => 'field_content_body',
                'label' => 'Content',
                'name' => 'content',
                'type' => 'wysiwyg',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => false,
            ],
            [
                'key' => 'field_content_image',
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_content_layout',
                            'operator' => '!=',
                            'value' => 'text-only',
                        ],
                    ],
                ],
            ],
            [
                'key' => 'field_content_cta',
                'label' => 'CTA Button',
                'name' => 'cta',
                'type' => 'link',
            ],
            [
                'key' => 'field_content_bg',
                'label' => 'Background',
                'name' => 'background',
                'type' => 'select',
                'choices' => [
                    'white' => 'White',
                    'light' => 'Light Gray',
                    'dark' => 'Dark',
                ],
                'default_value' => 'white',
            ],
        ],
    ];
}

/**
 * Stats Section Layout
 */
function trac_acf_layout_stats()
{
    return [
        'key' => 'layout_stats',
        'name' => 'stats',
        'label' => 'Stats Section',
        'display' => 'block',
        'sub_fields' => [
            [
                'key' => 'field_stats_title',
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
            ],
            [
                'key' => 'field_stats_items',
                'label' => 'Statistics',
                'name' => 'stats',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add Stat',
                'min' => 2,
                'max' => 4,
                'sub_fields' => [
                    [
                        'key' => 'field_stat_number',
                        'label' => 'Number',
                        'name' => 'number',
                        'type' => 'text',
                        'placeholder' => '100+',
                    ],
                    [
                        'key' => 'field_stat_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                        'placeholder' => 'Happy Clients',
                    ],
                ],
            ],
            [
                'key' => 'field_stats_bg',
                'label' => 'Background',
                'name' => 'background',
                'type' => 'select',
                'choices' => [
                    'dark' => 'Dark',
                    'primary' => 'Brand Primary',
                    'light' => 'Light',
                ],
                'default_value' => 'dark',
            ],
        ],
    ];
}

/**
 * Testimonials Section Layout
 */
function trac_acf_layout_testimonials()
{
    return [
        'key' => 'layout_testimonials',
        'name' => 'testimonials',
        'label' => 'Testimonials',
        'display' => 'block',
        'sub_fields' => [
            [
                'key' => 'field_testimonials_title',
                'label' => 'Section Title',
                'name' => 'title',
                'type' => 'text',
            ],
            [
                'key' => 'field_testimonials_items',
                'label' => 'Testimonials',
                'name' => 'testimonials',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add Testimonial',
                'min' => 1,
                'sub_fields' => [
                    [
                        'key' => 'field_testimonial_quote',
                        'label' => 'Quote',
                        'name' => 'quote',
                        'type' => 'textarea',
                        'rows' => 3,
                        'required' => true,
                    ],
                    [
                        'key' => 'field_testimonial_author',
                        'label' => 'Author Name',
                        'name' => 'author',
                        'type' => 'text',
                        'required' => true,
                    ],
                    [
                        'key' => 'field_testimonial_role',
                        'label' => 'Author Role',
                        'name' => 'role',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_testimonial_company',
                        'label' => 'Company',
                        'name' => 'company',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'field_testimonial_avatar',
                        'label' => 'Avatar',
                        'name' => 'avatar',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                    ],
                ],
            ],
            [
                'key' => 'field_testimonials_bg',
                'label' => 'Background',
                'name' => 'background',
                'type' => 'select',
                'choices' => [
                    'white' => 'White',
                    'light' => 'Light Gray',
                ],
                'default_value' => 'light',
            ],
        ],
    ];
}

/**
 * Cards Section Layout
 */
function trac_acf_layout_cards()
{
    return [
        'key' => 'layout_cards',
        'name' => 'cards',
        'label' => 'Cards Section',
        'display' => 'block',
        'sub_fields' => [
            [
                'key' => 'field_cards_eyebrow',
                'label' => 'Eyebrow',
                'name' => 'eyebrow',
                'type' => 'text',
            ],
            [
                'key' => 'field_cards_title',
                'label' => 'Section Title',
                'name' => 'title',
                'type' => 'text',
            ],
            [
                'key' => 'field_cards_items',
                'label' => 'Cards',
                'name' => 'cards',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add Card',
                'min' => 1,
                'max' => 6,
                'sub_fields' => [
                    [
                        'key' => 'field_card_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                    ],
                    [
                        'key' => 'field_card_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'required' => true,
                    ],
                    [
                        'key' => 'field_card_description',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 2,
                    ],
                    [
                        'key' => 'field_card_link',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'link',
                    ],
                ],
            ],
            [
                'key' => 'field_cards_columns',
                'label' => 'Columns',
                'name' => 'columns',
                'type' => 'select',
                'choices' => [
                    '2' => '2 Columns',
                    '3' => '3 Columns',
                    '4' => '4 Columns',
                ],
                'default_value' => '3',
            ],
            [
                'key' => 'field_cards_bg',
                'label' => 'Background',
                'name' => 'background',
                'type' => 'select',
                'choices' => [
                    'white' => 'White',
                    'light' => 'Light Gray',
                    'dark' => 'Dark',
                ],
                'default_value' => 'white',
            ],
        ],
    ];
}
