<?php
if (!defined('ABSPATH')) {
    exit();
}

$what_we_do_label = get_field('au_what_label');

$what_we_do_cards = [];
for ($i = 1; $i <= 5; $i++) {
    $what_we_do_cards[] = [
        'title' => get_field("au_service_{$i}_title"),
        'description' => get_field("au_service_{$i}_description"),
        'icon' => get_field("au_service_{$i}_icon"),
    ];
}
?>

<section class="relative py-[9vw] bg-brand-tertiary h-auto overflow-visible lg:h-[260vh] md:h-auto md:py-[15%]" data-section="what-we-do" data-what-we-do-slider>
    <div class="what-we-do-shell w-full ">
        <div class="mb-[3.438vw]  px-[5vw] flex items-center justify-between md:mb-10 sm:px-[6vw]">
            <div data-animate="fade-up" class="what-we-do-header flex items-center gap-[0.833vw] md:gap-3">
                <span class="label-line h-[0.2vw] w-[1.5vw] bg-white md:h-1 md:w-6 sm:w-5"></span>
                <span class="font-body text-30 text-white md:text-xl sm:!text-[4vw]">
                    <?php echo trac_esc_html($what_we_do_label); ?>
                </span>
            </div>

            <div class="what-we-do-nav flex fadeup items-center gap-[0.625vw] md:hidden overflow-visible" aria-label="<?php esc_attr_e(
                'What we do navigation',
                'trac',
            ); ?>">
                <button type="button" class="what-we-do-nav-btn flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-white/60 bg-transparent text-white transition-all duration-300 hover:bg-brand-secondary hover:text-white hover:border-brand-secondary disabled:opacity-40 disabled:hover:bg-transparent disabled:hover:text-white" data-what-we-do-prev aria-label="<?php esc_attr_e(
                    'Previous',
                    'trac',
                ); ?>">
                    <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M9.3 1.2L2 8.5L9.3 15.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M3 8.5H26" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>
                <button type="button" class="what-we-do-nav-btn flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-white/60 bg-transparent text-white transition-all duration-300 hover:bg-brand-secondary hover:text-white hover:border-brand-secondary disabled:opacity-40 disabled:hover:bg-transparent disabled:hover:text-white" data-what-we-do-next aria-label="<?php esc_attr_e(
                    'Next',
                    'trac',
                ); ?>">
                    <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M18.7 1.2L26 8.5L18.7 15.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M25 8.5H2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="what-we-do-viewport overflow-x-auto overflow-y-hidden [scroll-snap-type:x_mandatory] [-webkit-overflow-scrolling:touch] scroll-smooth [scrollbar-width:none] [&::-webkit-scrollbar]:hidden pl-[30vw] pr-[5vw] [scroll-padding-left:30vw] md:pl-[8vw] md:pr-[8vw] md:[scroll-padding-left:8vw] sm:pl-0 sm:pr-0" data-what-we-do-viewport>

            <div class=" flex gap-[1.667vw] w-max [will-change:transform] ml-0 sm:ml-10 md:gap-6 sm:gap-4" data-what-we-do-track data-animate="fade-up">
                <?php foreach ($what_we_do_cards as $card): ?>
                    <article class="what-we-do-card flex h-[30vw] w-[25vw] flex-shrink-0 flex-col rounded-[1.563vw] border border-white/60 bg-white px-[2vw] py-[2.292vw] shadow-[0_24px_80px_rgba(16,65,127,0.08)] [scroll-snap-align:center] [will-change:transform,opacity] md:h-[55vw] md:w-[78vw] md:rounded-[28px] md:px-8 md:py-8 sm:w-[78vw] sm:rounded-[24px] sm:px-6 sm:py-10 sm:h-auto" >
                        <div class="mb-[5.208vw] text-brand-primary md:mb-10 sm:mb-[14vw]">
                            <img
                                src="<?php echo esc_url($card['icon']); ?>"
                                alt="icons"
                                class="h-[5vw] w-[5vw] md:h-24 md:w-24 sm:h-20 sm:w-20"
                                loading="lazy"
                            >

                        </div>


                        <h2 class="mb-[1.875vw] font-heading w-[80%] text-36 font-normal leading-[1.18] tracking-[-0.02em] text-text-primary md:mb-5 md:text-[34px] sm:text-[28px]">
                            <?php echo trac_esc_html($card['title']); ?>
                        </h2>

                        <p class="font-body text-[1.15vw] leading-[1.65] text-text-body md:text-[22px] sm:text-[17px]">
                            <?php echo trac_esc_html($card['description']); ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Mobile bottom navigation -->
        <div class="hidden md:flex items-center justify-center gap-[1vw] mt-10 sm:gap-3 sm:mt-8">
            <button type="button" class="what-we-do-nav-btn flex items-center justify-center rounded-full border border-white/60 bg-transparent text-white transition-all duration-300 hover:bg-brand-secondary hover:text-white hover:border-brand-secondary disabled:opacity-40 disabled:hover:bg-transparent disabled:hover:text-white h-12 w-20" data-what-we-do-prev aria-label="<?php esc_attr_e(
                'Previous',
                'trac',
            ); ?>">
                <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M9.3 1.2L2 8.5L9.3 15.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M3 8.5H26" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>
            <button type="button" class="what-we-do-nav-btn flex items-center justify-center rounded-full bg-brand-secondary text-white transition-all duration-300 disabled:opacity-40 h-12 w-20" data-what-we-do-next aria-label="<?php esc_attr_e(
                'Next',
                'trac',
            ); ?>">
                <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M18.7 1.2L26 8.5L18.7 15.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M25 8.5H2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>
        </div>
    </div>
</section>
