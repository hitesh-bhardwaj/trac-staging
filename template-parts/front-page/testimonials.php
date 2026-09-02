<?php
if (!defined('ABSPATH'))
{
    exit();
}

$team_arrow_svg = get_template_directory_uri() . "/src/assets/icons/arrow.svg";

?>


<section class="testimonials-section relative overflow-hidden sm:py-[15%]" data-section="testimonials">
    <div class="testimonials-container w-full flex flex-col items-end px-[5vw] py-[6.25vw] md:py-16 sm:px-[7vw] sm:py-12 md:items-center sm:gap-[7vw]">
        <div class="testimonials-header mb-[2.604vw] md:mb-10 sm:mb-8 w-full md:flex md:flex-col md:items-center">
            <div
                class="testimonials-label mb-[1.563vw] flex items-center gap-[0.833vw] md:mb-5 md:gap-3 sm:mb-10"
                data-animate="fade-up"
            >
                <span class="label-line h-[0.208vw] w-[1.354vw] bg-[#E86224] md:h-1 md:w-6 sm:w-5"></span>
                <span class="label-text font-body text-30 text-[#E86224] md:text-xl sm:text-lg">
                    <?php echo esc_html(get_field('testimonials_label') ? : 'Testimonials',); ?>
                </span>
            </div>

            <h2
                class="testimonials-title font-heading text-66 leading-[1.12] tracking-[0.01em] text-text-primary md:text-4xl sm:text-[8vw]"
                data-heading-anim
             >
                <?php echo esc_html(get_field('testimonials_title') ? : 'What Our Clients Say',); ?>
            </h2>
        </div>

        <div class="testimonials-controls mb-[2.083vw] flex items-center justify-between md:mb-8 sm:mb-6 w-full relative z-[10] md:hidden">
            <div
                class="slide-counter flex items-center gap-[0.833vw] md:gap-3"
                data-animate="fade-up"
                data-delay="0.2"
            >
                <span class="current-slide font-body text-30 text-brand-primary md:text-2xl sm:text-xl">
                    01
                </span>
                <span class="counter-line h-[1px] w-[8.073vw] bg-brand-primary md:w-24 sm:w-16"></span>
                <span class="total-slides font-body text-30 text-brand-primary md:text-2xl sm:text-xl">
                    03
                </span>
            </div>

            <div class=" flex items-center justify-center gap-[0.625vw] md:mt-10 md:gap-3 sm:mt-8 relative z-[10]">
                <button
                    type="button"
                     class=" arrow-prev flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-[#E86224] bg-white text-[#E86224] transition-all duration-300 hover:bg-[#E86224] hover:text-white md:h-12 md:w-20"
        data-testimonial-prev-desktop
        aria-label="Previous testimonial"
                >
                    <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M9.3 1.2L2 8.5L9.3 15.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M3 8.5H26" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>

                <button
                    type="button"
                     class=" arrow-next flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-[#E86224] bg-white text-[#E86224] transition-all duration-300 hover:bg-[#E86224] hover:text-white md:h-12 md:w-20"
        data-testimonial-next-desktop
        aria-label="Next testimonial"
                >
                    <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M18.7 1.2L26 8.5L18.7 15.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M25 8.5H2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>
            </div>
        </div>

        <div
            class="testimonials-slider relative z-[10] w-full min-h-[28vw] md:min-h-[360px] sm:min-h-[300px]"
            data-animate="fade-up"
            data-delay="0.3"
         >
            <div class="testimonials-viewport">
                <div class="testimonials-track">
                <?php
// Get testimonials limit from ACF
$limit = get_field('testimonials_limit') ? : 3;

// Query testimonial posts
$testimonials_query = new WP_Query(['post_type' => 'testimonial', 'posts_per_page' => $limit, 'post_status' => 'publish', 'orderby' => 'date', 'order' => 'DESC', 'meta_query' => ['relation' => 'OR', ['key' => 'testimonial_featured', 'value' => '1', 'compare' => '=', ], ['key' => 'testimonial_featured', 'compare' => 'NOT EXISTS', ], ], ]);

if ($testimonials_query->have_posts()):
    while ($testimonials_query->have_posts()):
        $testimonials_query->the_post();

        $quote = get_field('testimonial_quote');
        $author = get_field('testimonial_author');
        $role = get_field('testimonial_role');
        $company = get_field('testimonial_company');
        $logo = get_field('testimonial_company_logo');

        // Fallback logo if none provided
        if (!$logo)
        {
            $logo = get_template_directory_uri() . '/src/imgs/testimonial-logo-1.png';
        }
?>
                        <div class="testimonial-card rounded-[1.563vw] bg-[var(--color-brand-primary)] p-[3.125vw] md:rounded-3xl md:p-8 sm:rounded-[2vw] sm:p-6 md:flex md:flex-col md:justify-between">
                            <?php if ($quote): ?>
                                <p class="testimonial-text font-body mb-[2.083vw] text-24 leading-[1.6] text-white md:mb-6 md:text-lg sm:mb-5 sm:text-base">
                                    <?php echo esc_html($quote); ?>
                                </p>
                            <?php
        endif; ?>

                            <div class="testimonial-author">
                                <?php if ($logo): ?>
                                    <img
                                        src="<?php echo esc_url($logo); ?>"
                                        alt="<?php echo esc_attr($company ? : 'Client logo',); ?>"
                                        class="h-[2.552vw] w-auto md:h-12 "
                                    >
                                <?php
        endif; ?>

                                <?php if ($author || $role): ?>
                                    <div class="author-details mt-4">
                                        <?php if ($author): ?>
                                            <p class="author-name font-heading text-[1.042vw] font-semibold text-white md:text-base">
                                                <?php echo esc_html($author); ?>
                                            </p>
                                        <?php
            endif; ?>

                                        <?php if ($role || $company): ?>
                                            <p class="author-role font-body text-[0.938vw] text-text-muted md:text-sm">
                                                <?php
                if ($role && $company)
                {
                    echo esc_html($role . ', ' . $company,);
                }
                elseif ($role)
                {
                    echo esc_html($role);
                }
                elseif ($company)
                {
                    echo esc_html($company);
                }
?>
                                            </p>
                                        <?php
            endif; ?>
                                    </div>
                                <?php
        endif; ?>
                            </div>
                        </div>
                    <?php
    endwhile;
    wp_reset_postdata();
else:
?>
                    <!-- Fallback: Show default testimonial if no posts exist -->
                    <div class="testimonial-card rounded-[1.563vw] p-[3.125vw] md:rounded-3xl md:p-8 sm:rounded-[2vw] sm:p-6 md:flex md:flex-col md:justify-between">
                        <p class="testimonial-text font-body mb-[2.083vw] text-[1.25vw] leading-[1.6] text-white md:mb-6 md:text-lg sm:mb-5 sm:text-base">
                            Throughout the course of working together since 2017, we have been constantly impressed by TrAC ability to provide requested services in a timely manner and ensure that any bumps along the way are sorted out with the at most priority in the shortest time possible.
                        </p>
                        <div class="testimonial-author">
                            <img
                                src="<?php echo esc_url(get_template_directory_uri() . '/src/imgs/home/testimonials/partners-in-health.png',); ?>"
                                alt="Client logo"
                                class="h-[2.552vw] w-auto md:h-10 sm:h-8 brightness-[16]"
                            >
                        </div>
                    </div>
                   
                    <div class="testimonial-card rounded-[1.563vw] p-[3.125vw] md:rounded-3xl md:p-8 sm:rounded-[2vw] sm:p-6 md:flex md:flex-col md:justify-between">
                        <p class="testimonial-text font-body mb-[2.083vw] text-[1.25vw] leading-[1.6] text-white md:mb-6 md:text-lg sm:mb-5 sm:text-base">
                            We have been working with TrAC  since 2017 and they have proven to be undoubtedly a reliable Internet Service Provider. Through their strong network, we have managed to get first-rate internet quality for all of our 15 branches throughout the country and this has greatly facilitated our business activities.
                        </p>
                        <div class="testimonial-author">
                            <img
                                src="<?php echo esc_url(get_template_directory_uri() . '/src/imgs/home/testimonials/urwego-bank.png',); ?>"
                                alt="Client logo"
                                class="h-[2.552vw] w-auto md:h-10 sm:h-8 brightness-[16]"
                            >
                        </div>
                    </div>
                   
                    <div class="testimonial-card rounded-[1.563vw] p-[3.125vw] md:rounded-3xl md:p-8 sm:rounded-[2vw] sm:p-6 md:flex md:flex-col md:justify-between">
                        <p class="testimonial-text font-body mb-[2.083vw] text-[1.25vw] leading-[1.6] text-white md:mb-6 md:text-lg sm:mb-5 sm:text-base">
                            TrAC has  been providing to us Multiprotocol Label Switching (MPLS private network) and Internet services which are highly efficient, scalable and secure. In our interactions, we have found TrAC staff to be highly professional and rich with experience in project implementation skills and the ability to handle diverse environments while providing exceptional customer service and support in a timely manner.
                        </p>
                        <div class="testimonial-author">
                            <img
                                src="<?php echo esc_url(get_template_directory_uri() . '/src/imgs/home/testimonials/smart-access.png',); ?>"
                                alt="Client logo"
                                class="h-[2.552vw] w-auto md:h-10 sm:h-8 brightness-[16]"
                            >
                        </div>
                    </div>
                   
                <?php
endif; ?>
                </div>
            </div>
        </div>
        
         
    </div>
                               <canvas class="network-canvas-el absolute inset-0 h-full w-full" data-star-color="#FFBFA2" data-line-color="#10417F1A"></canvas>


</section>
