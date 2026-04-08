<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<section class="testimonials-section relative overflow-hidden bg-[#eef3fc]" data-section="testimonials">


    <div class="testimonials-container w-full flex flex-col items-end px-[5.21vw] py-[6.25vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
        <div class="testimonials-header mb-[2.604vw] md:mb-10 sm:mb-8 w-full">
            <div
                class="testimonials-label mb-[1.563vw] flex items-center gap-[0.833vw] md:mb-5 md:gap-3 sm:mb-4"
                data-animate="fade-up"
            >
                <span class="label-line h-[0.208vw] w-[1.354vw] bg-brand-primary md:h-1 md:w-6 sm:w-5"></span>
                <span class="label-text font-body text-[1.25vw] text-text-primary md:text-xl sm:text-lg">
                    Testimonials
                </span>
            </div>

            <h2
                class="testimonials-title font-heading text-[3.438vw] leading-[1.12] tracking-[0.01em] text-text-primary md:text-4xl sm:text-3xl"
                data-animate="fade-up"
                data-delay="0.1"
            >
                What Our Clients Say
            </h2>
        </div>

        <div class="testimonials-controls mb-[2.083vw] flex items-center justify-between md:mb-8 sm:mb-6 w-full relative z-10">
            <div
                class="slide-counter flex items-center gap-[0.833vw] md:gap-3"
                data-animate="fade-up"
                data-delay="0.2"
            >
                <span class="current-slide font-body text-[1.563vw] text-brand-primary md:text-2xl sm:text-xl">
                    01
                </span>
                <span class="counter-line h-[1px] w-[8.073vw] bg-brand-primary md:w-24 sm:w-16"></span>
                <span class="total-slides font-body text-[1.563vw] text-brand-primary md:text-2xl sm:text-xl">
                    03
                </span>
            </div>

            <div
                class="slide-arrows flex items-center gap-[0.521vw] md:gap-2"
                data-animate="fade-up"
                data-delay="0.2"
            >
                <button
                    class="arrow-prev flex h-[2.708vw] w-[2.708vw] items-center justify-center rounded-full border border-brand-primary text-brand-primary transition-all duration-300 hover:bg-brand-primary hover:text-white disabled:pointer-events-none disabled:opacity-40 md:h-12 md:w-12 sm:h-10 sm:w-10"
                    aria-label="Previous testimonial"
                    type="button"
                >
                    <svg
                        class="h-[1.042vw] w-[1.042vw] md:h-5 md:w-5 sm:h-4 sm:w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                <button
                    class="arrow-next flex h-[2.708vw] w-[2.708vw] items-center justify-center rounded-full border border-brand-primary text-brand-primary transition-all duration-300 hover:bg-brand-primary hover:text-white disabled:pointer-events-none disabled:opacity-40 md:h-12 md:w-12 sm:h-10 sm:w-10"
                    aria-label="Next testimonial"
                    type="button"
                >
                    <svg
                        class="h-[1.042vw] w-[1.042vw] md:h-5 md:w-5 sm:h-4 sm:w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>

        <div
            class="testimonials-slider flex w-fit justify-end min-h-[28vw] md:min-h-[360px] sm:min-h-[300px] relative z-10"
            data-animate="fade-up"
            data-delay="0.3"
        >
            <div class="testimonials-track relative h-[30vw] w-[44vw] overflow-visible md:h-[360px] md:w-[72vw] sm:h-[300px] sm:w-full">
                <div class="testimonial-card absolute right-0 top-0 w-[44vw] rounded-[1.563vw] bg-white p-[3.125vw] md:w-[72vw] md:rounded-3xl md:p-8 sm:w-full sm:rounded-[24px] sm:p-6">
                    <p class="testimonial-text font-body mb-[2.083vw] text-[1.25vw] leading-[1.6] text-text-primary md:mb-6 md:text-lg sm:mb-5 sm:text-base">
                        Throughout the course of 4 years of working together, we have been constantly impressed by TransAfrica Communications’ ability to provide requested services in a timely manner and ensure that any bumps along the way are sorted out with the at most priority in the shortest time possible.
                    </p>
                    <div class="testimonial-author">
                        <img
                            src="<?php echo esc_url(
                                get_template_directory_uri() .
                                    '/src/imgs/client-partners.png',
                            ); ?>"
                            alt="Partners In Health"
                            class="h-[2.552vw] w-auto md:h-10 sm:h-8"
                        >
                    </div>
                </div>

                <div class="testimonial-card absolute right-0 top-0 w-[44vw] rounded-[1.563vw] bg-white p-[3.125vw] md:w-[72vw] md:rounded-3xl md:p-8 sm:w-full sm:rounded-[24px] sm:p-6">
                    <p class="testimonial-text font-body mb-[2.083vw] text-[1.25vw] leading-[1.6] text-text-primary md:mb-6 md:text-lg sm:mb-5 sm:text-base">
                        TransAfrica Communications (TrAC) has been providing to us Multiprotocol Label Switching (MPLS private network) and Internet services which are highly efficient, scalable and secure. In our interactions, we have found TrAC staff to be highly professional and rich with experience in project implementation skills and the ability to handle diverse environments.
                    </p>
                    <div class="testimonial-author">
                        <img
                            src="<?php echo esc_url(
                                get_template_directory_uri() .
                                    '/src/imgs/client-urwego.png',
                            ); ?>"
                            alt="Client logo"
                            class="h-[2.552vw] w-auto md:h-10 sm:h-8"
                        >
                    </div>
                </div>

                <div class="testimonial-card absolute right-0 top-0 w-[44vw] rounded-[1.563vw] bg-white p-[3.125vw] md:w-[72vw] md:rounded-3xl md:p-8 sm:w-full sm:rounded-[24px] sm:p-6">
                    <p class="testimonial-text font-body mb-[2.083vw] text-[1.25vw] leading-[1.6] text-text-primary md:mb-6 md:text-lg sm:mb-5 sm:text-base">
                        We have been working with TransAfrica Communications for 5 years now and they have proven to be undoubtedly a reliable Internet Service Provider. Through their strong network, we have managed to get first-rate internet quality for all of our 15 branches throughout the country and this has greatly facilitated our business activities.
                    </p>
                    <div class="testimonial-author">
                        <img
                            src="<?php echo esc_url(
                                get_template_directory_uri() .
                                    '/src/imgs/client-smart.png',
                            ); ?>"
                            alt="Client logo"
                            class="h-[2.552vw] w-auto md:h-10 sm:h-8"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
                <canvas id="network-canvas" class="absolute inset-0 h-full w-full"></canvas>

</section>
