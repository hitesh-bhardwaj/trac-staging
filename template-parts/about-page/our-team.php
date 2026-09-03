<?php
if (!defined('ABSPATH')) {
    exit();
}

$team_arrow_svg = get_template_directory_uri() . '/src/assets/icons/arrow.svg';
$team_right_arrow_svg = get_template_directory_uri() . '/src/assets/icons/right-arrow.svg';
$team_cross_svg = get_template_directory_uri() . '/src/assets/icons/cross.svg';
$team_linkedin_icon = get_template_directory_uri() . '/src/imgs/about/linkedin.png';

$team_members = [
    [
        'name' => 'Johnny Kayihura',
        'role' => 'Managing Director and CCO',
        'image' => get_template_directory_uri() . '/src/imgs/about/johnny-kayihura.png',
        'linkedin' => '#',
        'bio' => 'With more than 25 years of experience in ICT and telecommunications across East Africa, Johnny has built and scaled multiple technology businesses, including Rock Global Consulting and TrAC. As CCO, he leads commercial strategy, business development, and regional growth, drawing on decades of experience transforming startups into market-leading organisations.',
    ],
    [
        'name' => 'Noorissa Khoja',
        'role' => 'Chief Operating Officer (COO)',
        'image' => get_template_directory_uri() . '/src/imgs/about/noorissa-khoja.png',
        'linkedin' => '#',
        'bio' => "Drawing on experience across high-growth technology companies and startups, Noorissa brings expertise in product strategy, operational transformation, and business growth. She attained an MBA from Stanford and held leadership roles at Careem, Mastercard, and Munch:On. She now oversees TrAC's operations and market development, helping drive sustainable growth while ensuring the company remains focused on delivering reliable, customer-centered solutions.",
    ],
    [
        'name' => 'Andre Mutambuka',
        'role' => 'Chief Technology Officer (CTO)',
        'image' => get_template_directory_uri() . '/src/imgs/about/andre-mutambuka.png',
        'linkedin' => '#',
        'bio' => "With more than 15 years of experience in telecommunications infrastructure, network planning, and project delivery, Andre has led some of Rwanda’s most significant connectivity initiatives, including FTTH, 4G LTE, and national education connectivity programmes. As CTO, he leads TrAC’s technology strategy, network development, and innovation agenda, ensuring the reliability and scalability of the company's infrastructure.",
    ],
    [
        'name' => 'Aimé Bizimana',
        'role' => 'Chief Innovation Officer (CIO)',
        'image' => get_template_directory_uri() . '/src/imgs/about/aime-bizimana.png',
        'linkedin' => '#',
        'bio' => "A co-founder of TrAC, Aimé brings over a decade of experience in ICT, operations, and systems design. He has played a central role in building TrAC’s operational foundations, internal systems, and technical capabilities. Today, he leads the company’s technology operations, driving efficiency, innovation, and the continued development of the systems that support TrAC’s growth.",
    ],
    [
        'name' => 'Karim Khoja',
        'role' => 'Executive Chairman',
        'image' => get_template_directory_uri() . '/src/imgs/about/karim-khoja.png',
        'linkedin' => '#',
        'bio' => 'Karim has spent more than three decades building telecommunications businesses across Europe, South Asia, and Africa. As Executive Chairman, he provides strategic leadership and long-term vision, helping expand connectivity, strengthen partnerships, and guide TrAC’s growth as a leading provider of digital infrastructure and connectivity solutions.',
    ],
];
?>

<section class="team-slider-section relative py-[7%]" data-team-slider>
    <div class="pl-[5.2vw]  md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
        <div class="flex items-start justify-between gap-[3vw] max-md:flex-col h-full">
            <div class="w-[30%] max-md:w-full flex flex-col h-full justify-between">
                <div>
                   <div class="mb-[1.8vw] flex items-center gap-[0.833vw] md:mb-5 md:gap-3" data-animate="fade-up">
                     <span class="label-line h-[0.2vw] w-[1.5vw] bg-brand-secondary md:h-1 md:w-6 sm:w-5"></span>
                     <span class="font-body text-30 text-brand-secondary md:text-xl sm:text-lg">
                        <?php esc_html_e('Team', 'trac'); ?>
                      </span>
                     </div>

                     <h2 data-heading-anim class="w-[25vw] font-heading text-66 font-normal leading-[1.2] tracking-[-0.03em] text-text-primary md:max-w-full md:text-[52px] sm:text-[38px]">
                    Meet our talented team
                     </h2>

                      <p data-para-anim class="mt-[2.2vw] max-w-[22vw] font-body text-24 leading-[1.45] text-text-body md:mt-6 md:max-w-[360px] md:text-[22px] sm:text-[18px]">
                    Our team brings together technical expertise and a strong commitment to the people we serve, delivering solutions that are built to last.
                      </p>
                 </div>

                <div data-animate="fade-up" class="mt-[15vw] w-fit rounded-full flex items-center md:mt-10 sm:mt-8 px-[1vw] gap-[1vw] text-brand-secondary">
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

            <div class="w-[64%] max-md:w-full overflow-visible">
                <div data-animate="fade-up" class="team-slider-stage relative flex items-end gap-[1.6vw]">
                    <div class="team-slider-active-card group" data-team-slider-active-card tabindex="0" role="button" aria-pressed="false">
                        <div class="team-slider-flip-inner">
                            <div class="team-slider-card-front absolute inset-0 overflow-hidden rounded-[1.5vw] border border-brand-quaternary [backface-visibility:hidden] lg:rounded-[20px]">
                                <div class="team-slider-active-image">
                                    <img
                                        src=""
                                        alt=""
                                        data-team-slider-active-image
                                        draggable="false"
                                    >
                                </div>

                                <div class="absolute inset-x-0 bottom-0 z-[3] px-[1.8vw] pt-[1.8vw] pb-[1.45vw] text-center text-white [will-change:transform,opacity] bg-brand-primary font-normal lg:px-[20px] lg:pt-[20px] lg:pb-[16px]">
                                    <h3 data-team-slider-active-name class="font-normal text-white font-subheading uppercase leading-none text-[2.1vw] lg:text-[36px] sm:text-[28px]"></h3>
                                    <p data-team-slider-active-role class="text-white mt-[0.45vw] text-[1.15vw] leading-[1.35] opacity-95 lg:mt-[6px] lg:text-[18px] sm:text-[16px]"></p>
                                    <span class="flex justify-center mt-[1vw] leading-none lg:mt-[14px]" aria-hidden="true">
                                        <img class="block w-[2.6vw] h-auto object-contain lg:w-[40px]" src="<?php echo esc_url($team_right_arrow_svg); ?>" alt="">
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
                            href="#"
                            class="team-slider-back-linkedin pointer-events-none absolute bottom-[2.6vw] left-[3vw] z-10 flex h-[2.8vw] w-[2.8vw] items-center justify-center rounded-full bg-transparent opacity-0 transition-opacity duration-200 group-[.is-flip-complete]:pointer-events-auto group-[.is-flip-complete]:opacity-100 md:bottom-[34px] md:left-[34px] md:h-[46px] md:w-[46px] sm:bottom-[28px] sm:left-[26px] sm:h-[38px] sm:w-[38px]"
                            target="_blank"
                            rel="noopener noreferrer"
                            data-team-slider-back-linkedin
                            aria-label="LinkedIn profile"
                            aria-hidden="true"
                            tabindex="-1"
                        >
                            <img class="block h-full w-full object-contain" src="<?php echo esc_url($team_linkedin_icon); ?>" alt="" aria-hidden="true">
                        </a>

                        <button type="button" class="team-slider-card-close pointer-events-none absolute right-[2.2vw] top-[2.2vw] z-10 flex h-[3vw] w-[3vw] cursor-pointer items-center justify-center rounded-full border-2 border-current bg-transparent text-white opacity-0 transition-opacity duration-200 touch-manipulation group-[.is-flip-complete]:pointer-events-auto group-[.is-flip-complete]:opacity-100 md:right-[30px] md:top-[34px] md:h-[48px] md:w-[48px] sm:right-[22px] sm:top-[26px] sm:h-[40px] sm:w-[40px]" data-team-slider-close aria-label="Close team bio" aria-hidden="true" tabindex="-1">
                            <img class="block h-[1.05vw] w-[1.05vw] object-contain md:h-[17px] md:w-[17px] sm:h-[14px] sm:w-[14px]" src="<?php echo esc_url($team_cross_svg); ?>" alt="" aria-hidden="true">
                        </button>
                    </div>

                    <div class="team-slider-rail-wrap">
                        <div class="team-slider-rail" data-team-slider-rail>
                            <?php foreach ($team_members as $index => $member): ?>
                                <button
                                    type="button"
                                    class="team-slider-thumb"
                                    data-team-slider-thumb
                                    data-team-index="<?php echo esc_attr($index); ?>"
                                    data-name="<?php echo esc_attr($member['name']); ?>"
                                    data-role="<?php echo esc_attr($member['role']); ?>"
                                    data-image="<?php echo esc_url($member['image']); ?>"
                                    data-linkedin="<?php echo esc_url($member['linkedin']); ?>"
                                    data-bio="<?php echo esc_attr($member['bio']); ?>"
                                    aria-label="<?php echo esc_attr($member['name']); ?>"
                                >
                                    <img
                                        src="<?php echo esc_url($member['image']); ?>"
                                        alt="<?php echo esc_attr($member['name']); ?>"
                                        draggable="false"
                                    >
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
