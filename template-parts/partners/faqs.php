<?php
if (!defined('ABSPATH')) {
    exit();
}

// Get FAQ section settings
$section_label = get_field('faq_section_label') ?: 'FAQs';
$section_title =
    get_field('faq_section_title') ?: 'Any Questions? We Got You.';
$display_mode = get_field('faq_display_mode') ?: 'latest';
$faq_limit = get_field('faq_limit') ?: 5;
$open_first = get_field('faq_open_first');
$open_first = $open_first !== null ? $open_first : true;

// Build query args based on display mode
$query_args = [
    'post_type' => 'faq',
    'post_status' => 'publish',
    'posts_per_page' => $faq_limit > 0 ? $faq_limit : -1,
    'orderby' => 'menu_order date',
    'order' => 'ASC',
];

// Modify query based on display mode
switch ($display_mode) {
    case 'category':
        $categories = get_field('faq_categories');
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
        $specific_faqs = get_field('faq_specific_items');
        if ($specific_faqs) {
            $query_args['post__in'] = $specific_faqs;
            $query_args['orderby'] = 'post__in'; // Maintain selected order
        }
        break;

    case 'all':
        $query_args['posts_per_page'] = -1;
        break;

    case 'latest':
    default:
        // Use default query args (latest posts)
        break;
}

// Query FAQs
$faqs_query = new WP_Query($query_args);

// Fallback FAQs if no posts exist
$fallback_faqs = [
    [
        'question' => 'How do partners work with TrAC?',
        'answer' =>
            'We collaborate with partners on delivery, deployment, and ongoing operations to ensure stable, resilient connectivity for customers.',
    ],
    [
        'question' => 'What regions do you support?',
        'answer' =>
            'TrAC operates across Rwanda and connects into broader East African and international routes, depending on your service requirements.',
    ],
];
?>

<section class="faqs-section relative bg-white overflow-hidden" data-section="faqs">
    <div class="px-[5.21vw] py-[7.031vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">

        <div class="faqs-header text-center mb-[4.844vw] md:mb-12 sm:mb-8">
            <div class="faqs-label flex items-center justify-center gap-[0.729vw] mb-[1.563vw] md:gap-3 md:mb-5 sm:mb-4" data-animate="fade-up">
                <span class="label-line w-[1.354vw] h-[0.208vw] bg-brand-primary md:w-6 md:h-1 sm:w-5"></span>
                <span class="label-text font-body text-[1.25vw] text-text-primary md:text-xl sm:text-lg"><?php echo esc_html(
                    $section_label,
                ); ?></span>
            </div>
            <h2 class="faqs-title font-heading text-[3.438vw] leading-[1.27] tracking-[0.01em] text-text-primary md:text-4xl sm:text-3xl" data-animate="fade-up" data-delay="0.1">
                <?php echo esc_html($section_title); ?>
            </h2>
        </div>

        <div class="faqs-accordion w-full max-w-[89.583vw] mx-auto md:max-w-full" data-animate="fade-up" data-delay="0.2">
            <?php if ($faqs_query->have_posts()):
                $index = 0;
                while ($faqs_query->have_posts()):
                    $faqs_query->the_post();
                    $is_first = $index === 0 && $open_first;
                    $question = get_the_title();
                    $answer = get_field('faq_answer');

                    if (!$answer) {
                        $answer = get_the_content();
                    }
                    ?>
                    <div
                        class="faq-item"
                        data-faq
                        <?php echo $is_first ? 'data-open' : ''; ?>
                    >
                        <button
                            class="faq-question w-full flex items-center justify-between text-left py-[1.667vw] md:py-5 sm:py-4"
                            aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>"
                            aria-controls="faq-answer-<?php echo $index; ?>"
                            id="faq-btn-<?php echo $index; ?>"
                        >
                            <span class="faq-question-text font-body text-[1.458vw] text-text-primary md:text-xl sm:text-lg">
                                <?php echo esc_html($question); ?>
                            </span>

                            <span class="faq-icon-wrap" aria-hidden="true">
                                <span class="faq-bar faq-bar-h"></span>
                                <span class="faq-bar faq-bar-v"></span>
                            </span>
                        </button>

                        <div
                            class="faq-answer"
                            id="faq-answer-<?php echo $index; ?>"
                            role="region"
                            aria-labelledby="faq-btn-<?php echo $index; ?>"
                            aria-hidden="<?php echo $is_first ? 'false' : 'true'; ?>"
                        >
                            <div class="faq-answer-text font-body text-[1.25vw] leading-[1.5] text-text-body pb-[2.135vw] max-w-[67.5vw] md:text-lg md:max-w-full md:pb-6 sm:text-base sm:pb-4">
                                <?php echo wp_kses_post($answer); ?>
                            </div>
                        </div>
                    </div>
                    <?php $index++; ?>
                <?php
                endwhile;
                wp_reset_postdata();
            else:
                foreach ($fallback_faqs as $index => $faq):
                    $is_first = $index === 0 && $open_first;
                    ?>
                    <div
                        class="faq-item"
                        data-faq
                        <?php echo $is_first ? 'data-open' : ''; ?>
                    >
                        <button
                            class="faq-question w-full flex items-center justify-between text-left py-[1.667vw] md:py-5 sm:py-4"
                            aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>"
                            aria-controls="faq-answer-<?php echo $index; ?>"
                            id="faq-btn-<?php echo $index; ?>"
                        >
                            <span class="faq-question-text font-body text-[1.458vw] text-text-primary md:text-xl sm:text-lg">
                                <?php echo esc_html($faq['question']); ?>
                            </span>

                            <span class="faq-icon-wrap" aria-hidden="true">
                                <span class="faq-bar faq-bar-h"></span>
                                <span class="faq-bar faq-bar-v"></span>
                            </span>
                        </button>

                        <div
                            class="faq-answer"
                            id="faq-answer-<?php echo $index; ?>"
                            role="region"
                            aria-labelledby="faq-btn-<?php echo $index; ?>"
                            aria-hidden="<?php echo $is_first ? 'false' : 'true'; ?>"
                        >
                            <p class="faq-answer-text font-body text-[1.25vw] leading-[1.5] text-text-body pb-[2.135vw] max-w-[67.5vw] md:text-lg md:max-w-full md:pb-6 sm:text-base sm:pb-4">
                                <?php echo esc_html($faq['answer']); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach;
            endif; ?>
        </div>

    </div>
</section>

