<?php
if (!defined('ABSPATH')) {
    exit();
}

$faq_args = isset($args) && is_array($args) ? $args : [];
$section_label = $faq_args['section_label'] ?? '';
$section_title = $faq_args['section_title'] ?? '';
$open_first = array_key_exists('open_first', $faq_args)
    ? (bool) $faq_args['open_first']
    : true;
$items = $faq_args['items'] ?? [];
$id_prefix = !empty($faq_args['id_prefix'])
    ? sanitize_html_class($faq_args['id_prefix'])
    : 'faq';

if (!$items) {
    return;
}
?>

<section class="faqs-section relative bg-white overflow-hidden" data-section="faqs">
    <div class="px-[5vw] py-[7.031vw] md:px-[4vw] md:py-16 sm:px-[7vw] sm:py-12">

        <div class="faqs-header mb-[4.844vw] md:mb-12 sm:mb-10">
            <?php if ($section_label) : ?>
                <div class="faqs-label flex items-center gap-[0.729vw] mb-[1.563vw] md:gap-3 md:mb-5 sm:mb-4" data-animate="fade-up">
                    <span class="label-line w-[1.354vw] h-[0.208vw] bg-brand-secondary md:w-6 md:h-1 sm:w-5"></span>
                    <span class="label-text font-body text-30 text-brand-secondary md:text-xl sm:text-lg">
                        <?php echo esc_html($section_label); ?>
                    </span>
                </div>
            <?php endif; ?>

            <?php if ($section_title) : ?>
                <h2 class="faqs-title font-heading text-66 leading-[1.27] tracking-[0.01em] text-text-primary md:text-4xl sm:text-[8vw]" data-heading-anim>
                    <?php echo esc_html($section_title); ?>
                </h2>
            <?php endif; ?>
        </div>

        <div class="faqs-accordion w-full max-w-[89.583vw] mx-auto md:max-w-full" data-animate="fade-up" data-delay="0.2">
            <?php foreach ($items as $index => $faq) :
                $is_first = $index === 0 && $open_first;
                $question = $faq['question'] ?? '';
                $answer = $faq['answer'] ?? '';
                $answer_id = $id_prefix . '-answer-' . $index;
                $button_id = $id_prefix . '-btn-' . $index;

                if (!$question || !$answer) {
                    continue;
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
                        aria-controls="<?php echo esc_attr($answer_id); ?>"
                        id="<?php echo esc_attr($button_id); ?>"
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
                        id="<?php echo esc_attr($answer_id); ?>"
                        role="region"
                        aria-labelledby="<?php echo esc_attr($button_id); ?>"
                        aria-hidden="<?php echo $is_first ? 'false' : 'true'; ?>"
                    >
                        <div class="faq-answer-text font-body text-24 leading-[1.5] text-text-primary pb-[2.135vw] max-w-[67.5vw] md:text-lg md:max-w-full md:pb-6 sm:text-base sm:pb-4">
                            <?php echo wp_kses_post($answer); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
