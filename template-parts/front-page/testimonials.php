<?php
if (!defined('ABSPATH')) {
    exit();
}

$team_arrow_svg = get_template_directory_uri() . '/src/assets/icons/arrow.svg';
?>


<section class="testimonials-section relative overflow-hidden py-[5vw] px-[5vw] md:px-[7vw]" data-section="testimonials" id="testimonials">
    <div class="testimonials-container w-full flex flex-col items-end ">
        <div class="testimonials-header mb-[2.604vw] md:mb-6 w-full md:flex md:flex-col ">
            <div
                class="testimonials-label mb-[2.563vw] flex items-center gap-[0.833vw] md:mb-5 md:gap-3 sm:mb-6"
                data-animate="fade-up"
            >
                <span class="label-line h-[0.2vw] w-[1.5vw] bg-brand-secondary md:h-1 md:w-6 sm:w-5"></span>
                <span class="label-text font-body text-30 text-brand-secondary md:text-xl sm:text-lg">
                    <?php echo trac_esc_html(get_field('testimonials_label')); ?>
                </span>
            </div>

            <h2
                class="font-heading font-normal text-66 leading-[1.12] tracking-[0.01em] text-text-primary md:w-[55%] "
                data-heading-anim
             >
                <?php echo trac_esc_html(get_field('testimonials_title')); ?>
            </h2>
        </div>

        <div class="testimonials-controls mb-[2vw] flex items-end justify-end md:mb-4 w-full relative z-[10] ">
            <!-- <div
                class="font-normal flex items-center gap-[0.833vw] md:gap-3"
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
            </div> -->

            <div class=" flex items-center justify-center gap-[0.625vw] md:hidden relative z-[10]">
                <button
                    type="button"
                     class=" arrow-prev flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-brand-secondary bg-white text-brand-secondary transition-all duration-300 hover:bg-brand-secondary hover:text-white md:h-12 md:w-20"
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
                     class=" arrow-next flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-brand-secondary bg-white text-brand-secondary transition-all duration-300 hover:bg-brand-secondary hover:text-white md:h-12 md:w-20"
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
            class="testimonials-slider mt-[3vw] relative z-[10] w-full min-h-[28vw] md:min-h-[360px] sm:min-h-[300px]"
            data-animate="fade-up"
            data-delay="0.3"
         >
            <div class="testimonials-viewport relative left-1/2 h-[28vw] min-h-[400px] w-screen -translate-x-1/2 overflow-hidden md:h-[45vw] md:min-h-[560px] sm:h-[100vw] sm:min-h-[250px]">
                <div class="testimonials-track flex h-full items-stretch gap-[3.125vw] pl-[5vw] [will-change:transform] md:gap-[3vw] md:pl-[4vw] sm:gap-[4vw] sm:pl-[7vw]">
                <?php
                for ($i = 1; $i <= 3; $i++):
                    $quote = get_field("testimonial_{$i}_quote");
                    $logo = get_field("testimonial_{$i}_logo");
                    ?>
                    <div class="testimonial-card relative flex h-[25vw] w-[40vw] flex-[0_0_40vw] flex-col justify-between rounded-[1.5vw] bg-brand-primary p-[3vw] text-text-secondary [backface-visibility:hidden] [transform-origin:center_center] [transform:translate3d(0,0,0)] [will-change:transform,opacity,filter] md:h-full md:w-[72vw] md:flex-[0_0_72vw] md:rounded-3xl md:p-8 sm:w-[86vw] sm:flex-[0_0_86vw] sm:rounded-[4vw] sm:p-6">
                        <?php if ($quote): ?>
                            <p class="font-body font-normal mb-[2vw] text-24 leading-[1.6] text-white md:mb-6  sm:mb-5">
                                <?php echo trac_esc_html($quote); ?>
                            </p>
                        <?php endif; ?>

                        <div class="testimonial-author mt-auto">
                            <?php if ($logo): ?>
                                <img
                                    src="<?php echo esc_url($logo); ?>"
                                    alt="Client logo"
                                    class="h-[2.552vw] w-auto md:h-12 "
                                >
                            <?php endif; ?>
                        </div>
                    </div>
                <?php
                endfor;
                ?>
                </div>
            </div>
        </div>
         <div class=" items-center justify-center gap-4 hidden md:flex w-full relative z-[10] md:mt-8">
                <button
                    type="button"
                     class=" arrow-prev flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-brand-secondary bg-white text-brand-secondary transition-all duration-300 hover:bg-brand-secondary hover:text-white md:h-12 md:w-20"
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
                     class=" arrow-next flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-brand-secondary bg-white text-brand-secondary transition-all duration-300 hover:bg-brand-secondary hover:text-white md:h-12 md:w-20"
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
                               <canvas class="network-canvas-el absolute inset-0 h-full w-full" data-star-color="#FFBFA2" data-line-color="#10417F1A"></canvas>


</section>
