<?php
if (!defined("ABSPATH")) {
    exit();
}

$story_years = ["2026", "2025", "2024", "2023", "2020"];
$story_content = [
    "title" => __(
        "Lorem ipsum dolor sit amet, consectetuer adipiscing elit.",
        "trac"
    ),
    "body_title" => __("Lorem ipsum dolor", "trac"),
    "body" => __(
        "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus.",
        "trac"
    ),
];
?>

<section class="trac-story-section relative bg-[#eef4ff]" data-section="trac-story">
    <div class="trac-story-sticky sticky top-0 min-h-screen overflow-hidden">
        <div class="trac-story-year pointer-events-none absolute inset-0 flex items-center justify-center" aria-hidden="true">
            <div class="trac-story-year-value flex items-center justify-center">
                <?php for (
                    $digit_index = 0;
                    $digit_index < 4;
                    $digit_index++
                ): ?>
                    <span class="trac-story-year-window">
                        <span class="trac-story-year-reel" data-story-year-reel data-digit-index="<?php echo esc_attr(
                            $digit_index
                        ); ?>">
                            <?php foreach ($story_years as $year): ?>
                                <span class="trac-story-year-digit">
                                    <?php echo esc_html($year[$digit_index]); ?>
                                </span>
                            <?php endforeach; ?>
                        </span>
                    </span>
                <?php endfor; ?>
            </div>
        </div>

    </div>
    <div class="px-[7vw] py-[7vw] h-fit flex flex-col gap-[7vw] items-center relative z-20 mt-[-100vh]">
         <div class="trac-story-label flex items-center gap-[0.833vw] md:gap-3" data-animate="fade-up">
            <span class="label-line h-[0.208vw] w-[1.354vw] bg-brand-primary md:h-1 md:w-6 sm:w-5"></span>
            <h3 class="font-body font-medium text-[1.25vw] text-text-primary md:text-xl sm:text-lg">
                <?php esc_html_e("TrAC Story", "trac"); ?>
                        </h3>
         </div>
        <div class="w-full flex justify-between">
            <div class="w-[80%] flex  gap-[2vw]">
                <div class="w-[34vw] h-[22vw] rounded-[1.2vw] overflow-hidden  img-1">
                     <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-1.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />

                </div>
                <p class="text-[3.2vw] font-medium !leading-[1.2] w-[50%]">
                   Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 

                </p>

            </div>
            <div class="w-[10vw] h-[12vw] rounded-[0.8vw] img-2 overflow-hidden">
                <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-2.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />
            </div>
        </div>
        <div class="w-full flex justify-between">
            <div class="w-[10vw] h-[12vw] rounded-[0.8vw] overflow-hidden">
                 <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-3.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />

            </div>
            <div class="flex w-[40%]">
                <div class="flex flex-col gap-[1vw] w-[70%]">
                    <h4 class="text-[1.835vw] font-normal">
                        Lorem ipsum dolor 

                    </h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.

                    </p>

                </div>
                
                <div class="w-[10vw] h-[12vw] rounded-[0.8vw] overflow-hidden mt-[15vw]">
                     <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-4.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />

                </div >

            </div>
        </div>

    </div>
    <div class="px-[7vw] py-[7vw] h-fit flex flex-col gap-[7vw] items-center relative z-20 ">
         
        <div class="w-full flex justify-between">
            <div class="w-[80%] flex  gap-[2vw]">
                <div class="w-[34vw] h-[22vw] rounded-[1.2vw] overflow-hidden  img-1">
                     <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-1.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />

                </div>
                <p class="text-[3.2vw] font-medium !leading-[1.2] w-[50%]">
                   Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 

                </p>

            </div>
            <div class="w-[10vw] h-[12vw] rounded-[0.8vw] img-2 overflow-hidden">
                <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-2.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />
            </div>
        </div>
        <div class="w-full flex justify-between">
            <div class="w-[10vw] h-[12vw] rounded-[0.8vw] overflow-hidden">
                 <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-3.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />

            </div>
            <div class="flex w-[40%]">
                <div class="flex flex-col gap-[1vw] w-[70%]">
                    <h4 class="text-[1.835vw] font-normal">
                        Lorem ipsum dolor 

                    </h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.

                    </p>

                </div>
                
                <div class="w-[10vw] h-[12vw] rounded-[0.8vw] overflow-hidden mt-[15vw]">
                     <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-4.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />

                </div >

            </div>
        </div>

    </div>
    <div class="px-[7vw] py-[7vw] h-fit flex flex-col gap-[7vw] items-center relative z-20 ">
         
        <div class="w-full flex justify-between">
            <div class="w-[80%] flex  gap-[2vw]">
                <div class="w-[34vw] h-[22vw] rounded-[1.2vw] overflow-hidden  img-1">
                     <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-1.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />

                </div>
                <p class="text-[3.2vw] font-medium !leading-[1.2] w-[50%]">
                   Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 

                </p>

            </div>
            <div class="w-[10vw] h-[12vw] rounded-[0.8vw] img-2 overflow-hidden">
                <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-2.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />
            </div>
        </div>
        <div class="w-full flex justify-between">
            <div class="w-[10vw] h-[12vw] rounded-[0.8vw] overflow-hidden">
                 <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-3.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />

            </div>
            <div class="flex w-[40%]">
                <div class="flex flex-col gap-[1vw] w-[70%]">
                    <h4 class="text-[1.835vw] font-normal">
                        Lorem ipsum dolor 

                    </h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.

                    </p>

                </div>
                
                <div class="w-[10vw] h-[12vw] rounded-[0.8vw] overflow-hidden mt-[15vw]">
                     <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-4.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />

                </div >

            </div>
        </div>

    </div>
    <div class="px-[7vw] py-[7vw] h-fit flex flex-col gap-[7vw] items-center relative z-20 ">
         
        <div class="w-full flex justify-between">
            <div class="w-[80%] flex  gap-[2vw]">
                <div class="w-[34vw] h-[22vw] rounded-[1.2vw] overflow-hidden  img-1">
                     <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-1.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />

                </div>
                <p class="text-[3.2vw] font-medium !leading-[1.2] w-[50%]">
                   Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 

                </p>

            </div>
            <div class="w-[10vw] h-[12vw] rounded-[0.8vw] img-2 overflow-hidden">
                <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-2.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />
            </div>
        </div>
        <div class="w-full flex justify-between">
            <div class="w-[10vw] h-[12vw] rounded-[0.8vw] overflow-hidden">
                 <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-3.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />

            </div>
            <div class="flex w-[40%]">
                <div class="flex flex-col gap-[1vw] w-[70%]">
                    <h4 class="text-[1.835vw] font-normal">
                        Lorem ipsum dolor 

                    </h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.

                    </p>

                </div>
                
                <div class="w-[10vw] h-[12vw] rounded-[0.8vw] overflow-hidden mt-[15vw]">
                     <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-4.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />

                </div >

            </div>
        </div>

    </div>
    <div class="px-[7vw] py-[7vw] h-fit flex flex-col gap-[7vw] items-center relative z-20 ">
         
        <div class="w-full flex justify-between">
            <div class="w-[80%] flex  gap-[2vw]">
                <div class="w-[34vw] h-[22vw] rounded-[1.2vw] overflow-hidden  img-1">
                     <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-1.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />

                </div>
                <p class="text-[3.2vw] font-medium !leading-[1.2] w-[50%]">
                   Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 

                </p>

            </div>
            <div class="w-[10vw] h-[12vw] rounded-[0.8vw] img-2 overflow-hidden">
                <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-2.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />
            </div>
        </div>
        <div class="w-full flex justify-between">
            <div class="w-[10vw] h-[12vw] rounded-[0.8vw] overflow-hidden">
                 <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-3.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />

            </div>
            <div class="flex w-[40%]">
                <div class="flex flex-col gap-[1vw] w-[70%]">
                    <h4 class="text-[1.835vw] font-normal">
                        Lorem ipsum dolor 

                    </h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.

                    </p>

                </div>
                
                <div class="w-[10vw] h-[12vw] rounded-[0.8vw] overflow-hidden mt-[15vw]">
                     <img
                          src="<?php echo esc_url(
                              get_template_directory_uri() . '/src/imgs/about/timeline-2026-img-4.png'
                              ); ?>"
                               alt="<?php echo esc_attr('timeline image'); ?>"
                                class="w-full h-full object-cover"
                             loading="lazy"
                         />

                </div >

            </div>
        </div>

    </div>
</section>
