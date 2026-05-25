<?php
if (!defined('ABSPATH')) {
    exit();
}

$team_arrow_svg = get_template_directory_uri() . '/src/assets/icons/arrow.svg';

$team_members = [
    [
        'name' => 'John Doe',
        'role' => 'Lorem ipsum dolor sit amet,',
        'image' => get_template_directory_uri() . '/src/imgs/about/our-team-1.png',
        'linkedin' => '#',
    ],
    [
        'name' => 'Jane Smith',
        'role' => 'Senior Operations Lead',
        'image' => get_template_directory_uri() . '/src/imgs/about/our-team-2.png',
        'linkedin' => '#',
    ],
    [
        'name' => 'Angela Brown',
        'role' => 'Regional Growth Manager',
        'image' => get_template_directory_uri() . '/src/imgs/about/our-team-3.png',
        'linkedin' => '#',
    ],
    [
        'name' => 'Sarah Wilson',
        'role' => 'Customer Success Lead',
        'image' => get_template_directory_uri() . '/src/imgs/about/our-team-4.png',
        'linkedin' => '#',
    ],
    [
        'name' => 'Michael Lee',
        'role' => 'Network Strategy Manager',
        'image' => get_template_directory_uri() . '/src/imgs/about/our-team-5.png',
        'linkedin' => '#',
    ],
];
?>

<section class="team-slider-section relative py-[7%]" data-team-slider>
    <div class="pl-[5.2vw]  md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
        <div class="flex items-start justify-between gap-[3vw] max-md:flex-col h-full">
            <div class="w-[30%] max-md:w-full flex flex-col h-full justify-between">
                <div>
                   <div class="mb-[1.8vw] flex items-center gap-[0.833vw] md:mb-5 md:gap-3" data-animate="fade-up">
                     <span class="label-line h-[0.208vw] w-[1.354vw] bg-[#E86224] md:h-1 md:w-6 sm:w-5"></span>
                     <span class="font-body text-30 text-[#E86224] md:text-xl sm:text-lg">
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

                <div data-animate="fade-up" class="mt-[15vw] w-fit rounded-full flex items-center md:mt-10 sm:mt-8 px-[1vw] gap-[1vw] text-[#E86224]">
                     <button
                    type="button"
                        class="team-slider-nav team-slider-prev flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-[#E86224] bg-white text-[#E86224] transition-all duration-300 hover:bg-[#E86224] hover:text-white md:h-12 md:w-20"
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
                        class="team-slider-nav team-slider-next flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-[#E86224] bg-white text-[#E86224] transition-all duration-300 hover:bg-[#E86224] hover:text-white md:h-12 md:w-20"
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

            <div class="w-[64%] max-md:w-full overflow-hidden">
                <div data-animate="fade-up" class="team-slider-stage relative flex items-end gap-[1.6vw]">
                    <div class="team-slider-active-card" data-team-slider-active-card>
                        <a
                            class="team-slider-linkedin"
                            href="#"
                            target="_blank"
                            rel="noopener noreferrer"
                            data-team-slider-linkedin
                            aria-label="LinkedIn profile"
                        >
                            in
                        </a>

                        <div class="team-slider-active-image">
                            <img
                                src=""
                                alt=""
                                data-team-slider-active-image
                                draggable="false"
                            >
                        </div>

                        <div class="team-slider-active-content bg-[#0B1F3A] font-normal">
                            <h3 data-team-slider-active-name class="font-normal text-white font-subheading text-36"></h3>
                            <p data-team-slider-active-role class="text-white text-24"></p>
                        </div>
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
