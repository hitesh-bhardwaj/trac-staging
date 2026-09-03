<?php
if (!defined('ABSPATH')) {
    exit();
}

$collaboration_image_url =
    get_template_directory_uri() . '/src/imgs/communities/collaborations.png';
?>

<section class="bg-brand-quaternary px-[5vw] py-[7vw] text-white md:px-[4vw] md:py-[82px] sm:px-[6vw] sm:py-16" data-section="communities-collaborations">
    <div class="grid grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)] items-center gap-[5.208vw] md:grid-cols-1 md:gap-11 sm:gap-8">
        <div class="max-w-[43.75vw] text-left md:max-w-[720px]">
            <div class="mb-[3.333vw] inline-flex items-center gap-[1.302vw] md:mb-8 md:gap-4 sm:mb-6 sm:gap-3" data-animate="fade-up">
                <span class="h-[2px] min-h-[2px] w-[1.354vw] min-w-5 bg-current" aria-hidden="true"></span>
                <span class="font-body text-30 leading-none text-white md:text-xl sm:text-base">Our Collaborations</span>
            </div>

            <h2 class="mb-[2.344vw] w-[45vw] font-heading text-66 font-normal leading-[1.22] tracking-normal text-white md:mb-6 md:max-w-[720px] md:text-5xl sm:mb-5 sm:text-[34px] sm:leading-[1.18]" data-heading-anim>
                How TrAC Enables Connecting Communities
            </h2>

            <div class="flex max-w-[40.417vw] flex-col gap-[2.083vw] font-body text-24 leading-[1.5] text-white md:max-w-[720px] md:gap-7 md:text-xl sm:gap-5 sm:text-base sm:leading-[1.55]">
                <p data-para-anim data-delay="0.2">
                    TrAC sits at the heart of the Connecting Communities model, providing the network and infrastructure that makes everything else possible.
                </p>
                <p data-para-anim data-delay="0.28">
                    CC builds on that foundation by bringing services together around a shared local platform. TrAC enables the connection, while Connecting Communities turns that connection into wider access to tools and services that support people, businesses, and communities.
                </p>
            </div>
        </div>

        <figure class="relative m-0 w-full overflow-visible rounded-[1.667vw] md:max-w-[720px] md:rounded-[26px] sm:rounded-[20px]" data-animate="fade-up" data-delay="0.2">
            <img
                src="<?php echo esc_url($collaboration_image_url); ?>"
                alt="TrAC collaboration presentation"
                class="block aspect-[1.14/1] w-full rounded-[inherit] object-cover"
                loading="lazy"
            >
        </figure>
    </div>
</section>
