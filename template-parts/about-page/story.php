<?php
if (!defined('ABSPATH')) {
    exit();
}

$content = trim((string) get_the_content());
?>

<section class="about-story relative overflow-hidden bg-white" data-section="about-story">
    <div class="about-story-container w-full px-[5.21vw] py-[6.25vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
        <div class="about-story-grid flex justify-between gap-[5.208vw] md:flex-col md:gap-10">
            <div class="w-[38%] md:w-full" data-animate="fade-up">
                <div class="mb-[1.563vw] flex items-center gap-[1.042vw] md:mb-6 md:gap-4">
                    <span class="h-[0.208vw] w-[1.354vw] bg-brand-primary md:h-1 md:w-6"></span>
                    <span class="font-body text-[1.25vw] text-text-primary md:text-xl sm:text-lg">
                        <?php esc_html_e('Who We Are', 'trac'); ?>
                    </span>
                </div>

                <h2 class="font-heading text-[3.438vw] leading-[1.18] tracking-[0.01em] text-text-primary md:text-4xl sm:text-3xl">
                    <?php esc_html_e(
                        'A network-led team focused on practical digital growth.',
                        'trac',
                    ); ?>
                </h2>
            </div>

            <div class="w-[47%] font-body text-[1.25vw] leading-[1.85] text-text-body md:w-full md:text-lg sm:text-base" data-animate="fade-up" data-delay="0.1">
                <?php if ($content !== ''): ?>
                    <div class="prose prose-lg max-w-none">
                        <?php the_content(); ?>
                    </div>
                <?php else: ?>
                    <p class="mb-[1.563vw] md:mb-6">
                        <?php esc_html_e(
                            'TrAC works at the intersection of infrastructure, service delivery, and long-term partnership. Our role is to make complex connectivity feel dependable and straightforward for the organizations we support.',
                            'trac',
                        ); ?>
                    </p>
                    <p>
                        <?php esc_html_e(
                            'From backbone capabilities to customer-facing solutions, we prioritize systems that are resilient, scalable, and built around real operating needs.',
                            'trac',
                        ); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
