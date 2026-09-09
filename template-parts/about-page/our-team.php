<?php
if (!defined('ABSPATH')) {
    exit();
}

$team_slider_css =
    get_template_directory_uri() . '/src/css/sections/team-slider.css';

$team_right_arrow_svg =
    get_template_directory_uri() . '/src/assets/icons/right-arrow.svg';
$team_cross_svg = get_template_directory_uri() . '/src/assets/icons/cross.svg';
$team_linkedin_icon = get_field('au_team_linkedin_icon');

$team_label = get_field('au_team_label');
$team_title = get_field('au_team_title');
$team_description = get_field('au_team_description');

$team_members = [];
for ($i = 1; $i <= 5; $i++) {
    $team_members[] = [
        'name' => get_field("au_team_{$i}_name"),
        'role' => get_field("au_team_{$i}_role"),
        'image' => get_field("au_team_{$i}_photo"),
        'linkedin' => get_field("au_team_{$i}_linkedin"),
        'bio' => get_field("au_team_{$i}_bio"),
    ];
}
?>

<link rel="stylesheet" href="<?php echo esc_url($team_slider_css); ?>">

<section class="team-slider-section relative overflow-hidden py-[7%]" data-team-slider>
    <div class="pl-[5.2vw] md:px-[7vw] md:py-12">
        <div class="team-slider-layout">
            <div class="team-slider-copy w-full">
                   <div class="mb-[1.8vw] flex items-center gap-[0.833vw] md:mb-5 md:gap-3" data-animate="fade-up">
                     <span class="label-line h-[0.2vw] w-[1.5vw] bg-brand-secondary md:h-1 md:w-5"></span>
                     <span class="font-body text-30 text-brand-secondary md:text-xl sm:text-lg">
                        <?php echo trac_esc_html($team_label); ?>
                      </span>
                     </div>

                     <h2 data-heading-anim class="w-[25vw] font-heading text-66 font-normal leading-[1.2] tracking-[-0.03em] text-text-primary md:w-full">
                    <?php echo trac_esc_html($team_title); ?>
                     </h2>

                      <p data-para-anim class="mt-[2.2vw] w-[90%] font-body text-24 leading-[1.45] text-text-body md:mt-6 md:w-[70%] md:text-[22px] sm:text-[18px]">
                    <?php echo trac_esc_html($team_description); ?>
                      </p>
            </div>

            <div class="team-slider-main w-full md:mt-10 overflow-visible">
                <div data-animate="fade-up" class="team-slider-stage relative flex items-end gap-[1.6vw]">
                    <div class="team-slider-active-card group" data-team-slider-active-card tabindex="0" role="button" aria-pressed="false">
                        <div class="team-slider-flip-inner">
                            <div class="team-slider-card-front absolute inset-0 overflow-hidden rounded-[1.5vw] border border-brand-quaternary [backface-visibility:hidden] lg:rounded-[20px]">
                                <div class="team-slider-active-image group overflow-hidden">
                                    <img
                                        src=""
                                        alt="team"
                                        data-team-slider-active-image
                                        draggable="false"
                                        class="h-full w-full  scale-105 object-cover transition-transform duration-[600ms] ease-out group-hover:scale-100"
                                    >
                                </div>

                                <div class="absolute inset-x-0 bottom-0 z-[3] px-[1.8vw] pt-[1.8vw] pb-[1.45vw] text-center text-white [will-change:transform,opacity] bg-brand-primary font-normal lg:px-[20px] lg:pt-[20px] lg:pb-[16px]">
                                    <h3 data-team-slider-active-name class="font-normal text-white font-subheading uppercase leading-none text-[2.1vw] lg:text-[36px] sm:text-[28px]"></h3>
                                    <p data-team-slider-active-role class="text-white mt-[0.45vw] text-[1.15vw] leading-[1.35] opacity-95 lg:mt-[6px] lg:text-[18px] sm:text-[16px]"></p>
                                    <span class="flex justify-center mt-[1.5vw] leading-none lg:mt-[14px]" aria-hidden="true">
                                        <img class="block w-[1.8vw] h-auto object-contain lg:w-[40px]" src="<?php echo esc_url(
                                            $team_right_arrow_svg,
                                        ); ?>" alt="right-arrow">
                                    </span>
                                </div>
                            </div>

                            <div class="team-slider-card-back absolute inset-0 overflow-hidden rounded-[1.5vw] border border-brand-quaternary [backface-visibility:hidden] lg:rounded-[20px]" aria-hidden="true">
                                <div class="pr-[4.5vw] lg:pr-[70px] sm:pr-[54px] opacity-0 transition-opacity duration-200 group-[.is-flip-complete]:opacity-100">
                                    <h3 data-team-slider-back-name class="font-subheading text-36 font-normal"></h3>
                                    <p data-team-slider-back-role class="font-body text-24 mt-[1vw] leading-[1.2] lg:mt-[12px]"></p>
                                </div>

                                <div class="w-full h-[2px] shrink-0 mt-[1.25vw] mb-[1.45vw] bg-white lg:mt-[18px] lg:mb-[20px] opacity-0 transition-opacity duration-200 group-[.is-flip-complete]:opacity-100"></div>

                                <p data-team-slider-back-bio class="font-body text-24 leading-[1.55] opacity-0 transition-opacity duration-200 group-[.is-flip-complete]:opacity-100"></p>

                            </div>
                        </div>

                        <a
                            href="https://www.linkedin.com/"
                            class="team-slider-back-linkedin pointer-events-none absolute bottom-[2.6vw] left-[3vw] z-10 flex h-[2.8vw] w-[2.8vw] items-center justify-center rounded-full bg-transparent opacity-0 transition-opacity duration-200 group-[.is-flip-complete]:pointer-events-auto group-[.is-flip-complete]:opacity-100 md:bottom-[28px] md:left-[26px] md:h-[38px] md:w-[38px]"
                            target="_blank"
                            rel="noopener noreferrer"
                            data-team-slider-back-linkedin
                            aria-label="LinkedIn profile"
                            aria-hidden="true"
                            tabindex="-1"
                        >
                            <img class="block h-full w-full object-contain" src="<?php echo esc_url(
                                $team_linkedin_icon,
                            ); ?>" alt="linkedin icon" aria-hidden="true">
                        </a>

                        <button type="button" class="team-slider-card-close pointer-events-none absolute right-[2.2vw] top-[2.2vw] z-10 flex h-[3vw] w-[3vw] cursor-pointer items-center justify-center rounded-full border-2 border-current bg-transparent text-white opacity-0 transition-opacity duration-200 touch-manipulation group-[.is-flip-complete]:pointer-events-auto group-[.is-flip-complete]:opacity-100 md:right-[22px] md:top-[26px] md:h-[40px] md:w-[40px]" data-team-slider-close aria-label="Close team bio" aria-hidden="true" tabindex="-1">
                            <img class="block h-[1.05vw] w-[1.05vw] object-contain md:h-[14px] md:w-[14px]" src="<?php echo esc_url(
                                $team_cross_svg,
                            ); ?>" alt="cross icon" aria-hidden="true">
                        </button>
                    </div>

                    <div class="team-slider-rail-wrap">
                        <div class="team-slider-rail" data-team-slider-rail>
                            <?php foreach (
                                $team_members
                                as $index => $member
                            ): ?>
                                <button
                                    type="button"
                                    class="team-slider-thumb"
                                    data-team-slider-thumb
                                    data-team-index="<?php echo esc_attr(
                                        $index,
                                    ); ?>"
                                    data-name="<?php echo esc_attr(
                                        $member['name'],
                                    ); ?>"
                                    data-role="<?php echo esc_attr(
                                        $member['role'],
                                    ); ?>"
                                    data-image="<?php echo esc_url(
                                        $member['image'],
                                    ); ?>"
                                    data-linkedin="<?php echo esc_url(
                                        $member['linkedin'],
                                    ); ?>"
                                    data-bio="<?php echo esc_attr(
                                        $member['bio'],
                                    ); ?>"
                                    aria-label="<?php echo esc_attr(
                                        $member['name'],
                                    ); ?>"
                                >
                                    <img
                                        src="<?php echo esc_url(
                                            $member['image'],
                                        ); ?>"
                                        alt="<?php echo esc_attr(
                                            $member['name'],
                                        ); ?>"
                                        draggable="false"
                                    >
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div data-animate="fade-up" class="team-slider-card-navigation w-fit rounded-full flex items-center px-[1vw] gap-[1vw] text-brand-secondary">
                 <button
                type="button"
                    class="team-slider-nav team-slider-prev flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-brand-secondary bg-white text-brand-secondary transition-all duration-300 hover:bg-brand-secondary hover:text-white md:h-12 md:w-20"
                    data-team-slider-prev
                    aria-label="Previous team member"
            >
                <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M9.3 1.2L2 8.5L9.3 15.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M3 8.5H26" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>

                <button
               type="button"
                    class="team-slider-nav team-slider-next flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-brand-secondary bg-white text-brand-secondary transition-all duration-300 hover:bg-brand-secondary hover:text-white md:h-12 md:w-20"
                    data-team-slider-next
                    aria-label="Next team member"
            >
                <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M18.7 1.2L26 8.5L18.7 15.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M25 8.5H2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>
            </div>
        </div>
    </div>
</section>
