<?php
if (!defined('ABSPATH')) {
    exit();
}

// Query for jobs custom post type
$jobs_query = new WP_Query([
    'post_type' => 'job',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
]);
?>

<section class="open-positions-section relative overflow-hidden bg-white pb-[7vw] md:py-20 sm:py-16" data-section="open-positions" id="open-positions">
    <div class="w-full px-[5.21vw] md:px-[4vw] sm:px-[6vw]">
        <div class="mx-auto">
            <!-- Section Label -->
            <div class="flex items-center gap-[0.729vw] mb-[4.167vw] justify-center md:gap-3 md:mb-12 sm:mb-10" data-animate="fade-up">
                <span class="w-[1.354vw] h-[0.208vw] bg-brand-primary md:w-6 md:h-1"></span>
                <span class="font-body text-[1.25vw] text-[#111] md:text-xl">Career</span>
            </div>

            <!-- Heading -->
            <h2 class="font-heading text-[3.438vw] font-normal leading-[1.12] tracking-[-0.01em] text-[#111] text-center mb-[4vw] md:text-5xl md:mb-12 sm:text-4xl sm:mb-10" data-heading-anim>
                Open Positions
            </h2>

            <!-- Jobs Grid -->
            <?php if ($jobs_query->have_posts()): ?>
                <div class="jobs-grid grid grid-cols-2 gap-[2vw] md:grid-cols-1 md:gap-12 sm:gap-8">
                    <?php while ($jobs_query->have_posts()): $jobs_query->the_post();
                        // Get job meta fields
                        $job_location = get_field('job_location') ?: get_post_meta(get_the_ID(), 'job_location', true);
                        $job_department = get_field('job_department') ?: get_post_meta(get_the_ID(), 'job_department', true);
                        $job_excerpt = get_field('job_excerpt') ?: get_the_excerpt();
                    ?>
                        <div class="job-card bg-[#EEF3FC] rounded-[1.302vw] p-[2.604vw] relative md:rounded-3xl md:p-12 sm:p-6" data-animate="fade-up" data-delay="0.2">
                            <!-- Department Badge -->
                            <?php if ($job_department): ?>
                                <div class="department-badge absolute top-[2.292vw] right-[2.604vw] bg-white rounded-[1.042vw] px-[1.25vw] py-[0.521vw] md:top-11 md:right-12 md:rounded-xl md:px-6 md:py-2 sm:top-6 sm:right-6 sm:px-4 sm:py-1.5">
                                    <span class="font-body text-[0.938vw] text-brand-primary md:text-lg sm:text-base"><?php echo esc_html($job_department); ?></span>
                                </div>
                            <?php endif; ?>

                            <!-- Job Title -->
                            <h3 class="job-title font-heading text-[1.875vw] font-normal leading-[1.2] tracking-[-0.01em] text-[#111] mb-[1.042vw] pr-[10vw] md:text-4xl md:mb-4 md:pr-44 sm:text-2xl sm:mb-3 sm:pr-32">
                                <?php the_title(); ?>
                            </h3>

                            <!-- Location -->
                            <?php if ($job_location): ?>
                                <p class="job-location font-body text-[1.25vw] text-[#111] tracking-[-0.01em] mb-[3vw] md:text-2xl md:mb-10 sm:text-lg sm:mb-6">
                                    (Location - <?php echo esc_html($job_location); ?>)
                                </p>
                            <?php endif; ?>

                            <!-- Description -->
                            <div class="job-description font-body text-[1.146vw] leading-[1.64] text-[#1e1e1e] mb-[3vw] md:text-lg md:mb-10 sm:text-base sm:mb-6">
                                <?php echo wp_kses_post($job_excerpt); ?>
                            </div>

                            <!-- Apply Button -->
                            <a href="#job-application" class="btn btn-primary group magnetic smooth-scroll" data-job-id="<?php echo get_the_ID(); ?>" data-job-title="<?php echo esc_attr(get_the_title()); ?>">
                                <span class="btn-line"></span>
                                <span class="btn-text">Apply</span>
                                <span class="btn-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="1.71429" cy="1.71429" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="1.71429" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="12" r="1.71429" fill="currentColor"/>
                                        <circle cx="22.2866" cy="12" r="1.71429" fill="currentColor"/>
                                        <circle cx="1.71429" cy="22.2857" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="22.2857" r="1.71429" fill="currentColor"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            <?php else: ?>
                <div class="no-jobs text-center py-[5vw] md:py-20 sm:py-16">
                    <p data-para-anim class="font-body text-[1.25vw] text-[#1e1e1e] md:text-xl sm:text-lg">
                        No open positions at the moment. Check back soon!
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
