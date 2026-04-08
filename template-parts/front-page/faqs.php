<?php
if (!defined('ABSPATH')) {
    exit();
}

$faqs = [
    [
        'question' => "What does 'uncontended' internet mean?",
        'answer'   => "Being on TrAC means being on the most resilient trans-African network available. Every aspect of the TrAC network is designed with protection in mind. Internet enters our network from three different providers across three different geographies.",
    ],
    [
        'question' => 'How quickly can I get connected?',
        'answer'   => 'Connection times vary depending on your location and the type of service required. For areas with existing fiber infrastructure, we can typically have you connected within 5-7 business days. For new installations, our team will provide a detailed timeline after the site survey.',
    ],
    [
        'question' => 'What support options are available?',
        'answer'   => 'TrAC provides 24/7 technical support through multiple channels including phone, email, and our online portal. Our dedicated support team monitors network performance around the clock and can respond to issues before they affect your service.',
    ],
    [
        'question' => 'Do you offer service level agreements (SLAs)?',
        'answer'   => "Yes, all our business and enterprise packages come with comprehensive SLAs that guarantee uptime, response times, and performance metrics. We're confident in our network reliability and back it with service credits if we don't meet our commitments.",
    ],
    [
        'question' => 'Can I upgrade my plan as my business grows?',
        'answer'   => "Absolutely! Our flexible plans are designed to scale with your business. You can upgrade your bandwidth, add locations, or expand services at any time. Our account managers work with you to ensure your connectivity solution always matches your needs.",
    ],
];
?>

<section class="faqs-section relative bg-white overflow-hidden" data-section="faqs">
    <div class="px-[5.21vw] py-[7.031vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">

        <div class="faqs-header text-center mb-[4.844vw] md:mb-12 sm:mb-8">
            <div class="faqs-label flex items-center justify-center gap-[0.729vw] mb-[1.563vw] md:gap-3 md:mb-5 sm:mb-4" data-animate="fade-up">
                <span class="label-line w-[1.354vw] h-[0.208vw] bg-brand-primary md:w-6 md:h-1 sm:w-5"></span>
                <span class="label-text font-body text-[1.25vw] text-text-primary md:text-xl sm:text-lg">FAQs</span>
            </div>
            <h2 class="faqs-title font-heading text-[3.438vw] leading-[1.27] tracking-[0.01em] text-text-primary md:text-4xl sm:text-3xl" data-animate="fade-up" data-delay="0.1">
                Any Questions? We Got You.
            </h2>
        </div>

        <div class="faqs-accordion w-full max-w-[89.583vw] mx-auto md:max-w-full" data-animate="fade-up" data-delay="0.2">
            <?php foreach ($faqs as $index => $faq) :
                $is_first = ($index === 0);
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

                        <!-- Plus/minus icon built from two spans -->
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
            <?php endforeach; ?>
        </div>

    </div>
</section>
