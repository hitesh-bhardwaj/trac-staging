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
    <div class="pl-[5.2vw] py-[6.2vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12">
        <div class="flex items-start justify-between gap-[3vw] max-md:flex-col h-full">
            <div class="w-[30%] max-md:w-full flex flex-col h-full justify-between">
                <div>
                   <div class="mb-[1.8vw] flex items-center gap-[0.833vw] md:mb-5 md:gap-3" data-animate="fade-up">
                     <span class="label-line h-[0.208vw] w-[1.354vw] bg-brand-primary md:h-1 md:w-6 sm:w-5"></span>
                     <span class="font-body text-[1.25vw] text-text-primary md:text-xl sm:text-lg">
                        <?php esc_html_e('Meet Our Team', 'trac'); ?>
                      </span>
                     </div>

                     <h2 data-heading-anim class="w-[25vw] font-heading text-[3.5vw] font-normal leading-[1.2] tracking-[-0.03em] text-text-primary md:max-w-full md:text-[52px] sm:text-[38px]">
                    Welcome our talented team
                     </h2>

                      <p data-para-anim class="mt-[2.2vw] max-w-[18vw] font-body text-[1.25vw] leading-[1.45] text-text-body md:mt-6 md:max-w-[360px] md:text-[22px] sm:text-[18px]">
                    These individuals are the heart and soul of our product.
                      </p>
                 </div>

                <div data-animate="fade-up" class="mt-[20vw] w-fit rounded-full flex items-center md:mt-10 sm:mt-8 border border-brand-primary px-[1vw] gap-[1vw]">
                    <button
                        type="button"
                        class="team-slider-nav team-slider-prev"
                        data-team-slider-prev
                        aria-label="Previous team member"
                    >
                        <span class="team-slider-nav-icon">
                            <img
                                src="<?php echo esc_url($team_arrow_svg); ?>"
                                alt=""
                                aria-hidden="true"
                            >
                        </span>
                    </button>

                    <button
                        type="button"
                        class="team-slider-nav team-slider-next"
                        data-team-slider-next
                        aria-label="Next team member"
                    >
                        <span class="team-slider-nav-icon team-slider-nav-icon--next">
                            <img
                                src="<?php echo esc_url($team_arrow_svg); ?>"
                                alt=""
                                aria-hidden="true"
                            >
                        </span>
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

                        <div class="team-slider-active-content bg-white/20 backdrop-blur-md font-normal">
                            <h3 data-team-slider-active-name class="font-normal"></h3>
                            <p data-team-slider-active-role></p>
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
