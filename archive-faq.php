<?php
/**
 * FAQ Archive Template
 * Displays all FAQs organized by category
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

get_header();
?>

<main id="main-content" class="site-main faq-archive" data-barba="container" data-barba-namespace="faq-archive">
    <section class="faqs-archive-section relative bg-white overflow-hidden" data-section="faq-archive">
        <div class="px-[5.21vw] py-[7.031vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">

            <!-- Page Header -->
            <div class="faqs-header text-center mb-[4.844vw] md:mb-12 sm:mb-8">
                <div class="faqs-label flex items-center justify-center gap-[0.729vw] mb-[1.563vw] md:gap-3 md:mb-5 sm:mb-4" data-animate="fade-up">
                    <span class="label-line w-[1.354vw] h-[0.208vw] bg-brand-primary md:w-6 md:h-1 sm:w-5"></span>
                    <span class="label-text font-body text-[1.25vw] text-text-primary md:text-xl sm:text-lg">FAQs</span>
                </div>
                <h1 class="faqs-title font-heading text-[3.438vw] leading-[1.27] tracking-[0.01em] text-text-primary md:text-4xl sm:text-3xl" data-animate="fade-up" data-delay="0.1">
                    Frequently Asked Questions
                </h1>
                <p class="faqs-description font-body text-[1.25vw] text-text-body max-w-[52vw] mx-auto mt-[1.563vw] md:text-lg md:max-w-full md:mt-5 sm:text-base sm:mt-4" data-para-anim data-delay="0.2">
                    Find answers to common questions about our services, connectivity, and support.
                </p>
            </div>

            <?php
            // Get all FAQ categories
            $categories = get_terms([
                'taxonomy' => 'faq_category',
                'hide_empty' => true,
            ]);

            if (!is_wp_error($categories) && !empty($categories)):
                // Display FAQs organized by category
                foreach ($categories as $category):
                    $faq_query = new WP_Query([
                        'post_type' => 'faq',
                        'posts_per_page' => -1,
                        'tax_query' => [
                            [
                                'taxonomy' => 'faq_category',
                                'field' => 'term_id',
                                'terms' => $category->term_id,
                            ],
                        ],
                        'orderby' => 'menu_order date',
                        'order' => 'ASC',
                    ]);

                    if ($faq_query->have_posts()):
                        ?>
                        <div class="faq-category-group mb-[3.125vw] md:mb-10 sm:mb-8" data-animate="fade-up">
                            <h2 class="category-title font-heading text-[2.083vw] text-brand-primary mb-[2.083vw] md:text-2xl md:mb-6 sm:text-xl sm:mb-5">
                                <?php echo esc_html($category->name); ?>
                            </h2>

                            <div class="faqs-accordion w-full max-w-[89.583vw] mx-auto md:max-w-full">
                                <?php
                                $index = 0;
                                while ($faq_query->have_posts()):
                                    $faq_query->the_post();
                                    $unique_id =
                                        $category->slug . '-' . get_the_ID();
                                    $question = get_the_title();
                                    $answer = get_field('faq_answer');

                                    if (!$answer) {
                                        $answer = get_the_content();
                                    }
                                    ?>
                                    <div class="faq-item" data-faq>
                                        <button
                                            class="faq-question w-full flex items-center justify-between text-left py-[1.667vw] md:py-5 sm:py-4"
                                            aria-expanded="false"
                                            aria-controls="faq-answer-<?php echo $unique_id; ?>"
                                            id="faq-btn-<?php echo $unique_id; ?>"
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
                                            id="faq-answer-<?php echo $unique_id; ?>"
                                            role="region"
                                            aria-labelledby="faq-btn-<?php echo $unique_id; ?>"
                                            aria-hidden="true"
                                        >
                                            <div class="faq-answer-text font-body text-[1.25vw] leading-[1.5] text-text-body pb-[2.135vw] max-w-[67.5vw] md:text-lg md:max-w-full md:pb-6 sm:text-base sm:pb-4">
                                                <?php echo wp_kses_post($answer); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $index++; ?>
                                <?php
                                endwhile;
                                ?>
                            </div>
                        </div>
                        <?php
                        wp_reset_postdata();
                    endif;
                endforeach;
            else:
                // Display all FAQs without categories
                $all_faqs = new WP_Query([
                    'post_type' => 'faq',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order date',
                    'order' => 'ASC',
                ]);

                if ($all_faqs->have_posts()):
                    ?>
                    <div class="faqs-accordion w-full max-w-[89.583vw] mx-auto md:max-w-full" data-animate="fade-up">
                        <?php
                        $index = 0;
                        while ($all_faqs->have_posts()):
                            $all_faqs->the_post();
                            $is_first = $index === 0;
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
                        ?>
                    </div>
                    <?php
                else:
                    ?>
                    <div class="no-faqs text-center py-[5.208vw] md:py-16 sm:py-12">
                        <p class="font-body text-[1.25vw] text-text-muted md:text-lg sm:text-base">
                            No FAQs available yet. Please check back soon!
                        </p>
                    </div>
                <?php
                endif;
            endif;
            ?>

        </div>
    </section>
</main>

<?php get_footer();
