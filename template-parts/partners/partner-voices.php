<?php
if (!defined("ABSPATH")) {
    exit();
}

$label = get_field("partner_voices_label") ?: "Partner Voices";
$title = get_field("partner_voices_title") ?: "What Our Partners Say";
$team_arrow_svg = get_template_directory_uri() . "/src/assets/icons/arrow.svg";

// 7 slides, looped by JS. Logos reused from homepage clients assets.
$unified_quote =
    "TransAfrica Communications (TrAC) has been providing to us Multiprotocol Label Switching (MPLS private network) and Internet services which are highly efficient, scalable and secure. In our interactions, we have found TrAC staff to be highly professional and rich with experience in project implementation skills and the ability to handle diverse environments while providing exceptional customer service and support in a timely manner.";

$slides = [
    [
        "logo" =>
            get_template_directory_uri() . "/src/imgs/client-partners.png",
        "logo_alt" => "Partners In Health",
        "quote" => $unified_quote,
        "meta" => "CMO, PARTNERS IN HEALTH",
    ],
    [
        "logo" => get_template_directory_uri() . "/src/imgs/client-smart.png",
        "logo_alt" => "Smart",
        "quote" => $unified_quote,
        "meta" => "CMO, SMART SERVICES",
    ],
    [
        "logo" => get_template_directory_uri() . "/src/imgs/client-airtel.png",
        "logo_alt" => "Airtel",
        "quote" => $unified_quote,
        "meta" => "PARTNER SUCCESS LEAD, AIRTEL",
    ],
    [
        "logo" => get_template_directory_uri() . "/src/imgs/client-urwego.png",
        "logo_alt" => "Urwego Bank",
        "quote" => $unified_quote,
        "meta" => "HEAD OF IT, URWEGO BANK",
    ],
    [
        "logo" =>
            get_template_directory_uri() . "/src/imgs/client-partners.png",
        "logo_alt" => "Partners In Health",
        "quote" => $unified_quote,
        "meta" => "OPERATIONS DIRECTOR, PARTNERS IN HEALTH",
    ],
    [
        "logo" => get_template_directory_uri() . "/src/imgs/client-smart.png",
        "logo_alt" => "Smart",
        "quote" => $unified_quote,
        "meta" => "TECHNICAL DIRECTOR, SMART SERVICES",
    ],
    [
        "logo" => get_template_directory_uri() . "/src/imgs/client-airtel.png",
        "logo_alt" => "Airtel",
        "quote" => $unified_quote,
        "meta" => "REGIONAL LEAD, AIRTEL",
    ],
];
?>

<section class="partner-voices-section relative px-[5.21vw] overflow-hidden w-screen py-[7vw] md:px-[4vw] md:py-20 sm:px-[6vw] sm:py-16" data-section="partner-voices" data-partner-voices>
    <!-- Animated network canvas background (same system as enterprise "why" section) -->
    <canvas class="network-canvas-el absolute inset-0 h-full w-full"></canvas>
 <div class="flex items-center justify-center gap-3 mb-14 md:mb-6" data-animate="fade-up">
                <span class="w-6 h-1 bg-brand-primary"></span>
                <span class="font-body text-base text-[#111]"><?php echo esc_html(
                    $label
                ); ?></span>
            </div>
              <div class="w-full flex justify-center">
                  <h2 class="font-heading text-[3.75vw] font-normal leading-[1.12] tracking-[0.01em] text-[#111] mb-[3.2vw] md:text-5xl md:mb-10 sm:text-4xl sm:mb-8" data-heading-anim>
                      <?php echo esc_html($title); ?>
                  </h2>

</div>
    <div class="relative z-[10] w-full   flex flex-col items-center gap-[4vw]">
        <div class="max-w-full mx-auto text-center">
           
	
	            <div class="relative w-full overflow-visible " data-animate="fade-up">
	                <div class="partner-voices-viewport relative mt-[5vw] w-full overflow-visible" data-partner-voices-viewport>
		                    <div class="partner-voices-track flex gap-[8vw] md:gap-12 sm:gap-8 will-change-transform" data-partner-voices-track>
		                        <?php foreach ($slides as $slide): ?>
		                            <article class="partner-voices-slide flex-shrink-0 w-[48vw] md:w-[72vw] sm:w-[84vw] rounded-[1.563vw] md:rounded-3xl bg-white border border-brand-primary/40 p-[2.5vw] md:p-8 sm:p-6 text-left" data-partner-voices-slide>
                                <div class="h-[4vw] md:h-10 sm:h-8 w-auto mb-[2.083vw] md:mb-6 sm:mb-5">
                                    <img src="<?php echo esc_url(
                                        $slide["logo"]
                                    ); ?>" alt="<?php echo esc_attr(
    $slide["logo_alt"]
); ?>" class="h-full w-auto object-contain">
                                </div>

	                                <p class="font-body text-[1.25vw] md:text-lg sm:text-base leading-[1.65] text-text-primary mb-[2.5vw] md:mb-8 sm:mb-7">
	                                    &ldquo; <?php echo esc_html(
                                         $slide["quote"]
                                     ); ?> &rdquo;
	                                </p>

                                <p class="font-body tracking-[0.18em] uppercase text-[0.938vw] md:text-sm sm:text-xs text-[#E86224]">
                                    <?php echo esc_html($slide["meta"]); ?>
                                </p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>

               
            </div>
        </div>
        <div data-animate="fade-up" class=" w-fit rounded-full flex items-center md:mt-10 sm:mt-8 border border-brand-primary px-[1vw] gap-[1vw] bg-white">
            <button
                type="button"
                class="team-slider-nav team-slider-prev"
                data-partner-voices-prev
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
                data-partner-voices-next
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
</section>
