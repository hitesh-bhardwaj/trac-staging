<?php
if (!defined('ABSPATH')) {
    exit();
}

$label = get_field('cs_infra_label') ?: 'Infrastructure';
$title = get_field('cs_infra_title') ?: "Let's Design Your Network";
$subtitle =
    get_field('cs_infra_subtitle') ?:
    'Tell us what your network requires, and our team will design a solution that fits.';
$button_text = get_field('cs_infra_button_text') ?: 'Request a Consultation';
$button_link = get_field('cs_infra_button_link') ?: '#get-in-touch';
?>

<section class="carrier-infrastructure relative overflow-hidden bg-brand-quaternary px-[5vw] py-[6vw] md:px-[4vw] md:py-16 sm:px-[6vw] sm:py-12" data-section="infrastructure">
    <div class="max-w-[92rem] mx-auto">
        <div class="max-w-[46vw] md:max-w-full">
            <div class="flex items-center justify-start gap-3 mb-10 md:mb-6" data-animate="fade-up">
                <span class="w-6 h-1 bg-white"></span>
                <span class="font-body text-white text-30 md:text-lg sm:text-base">
                    <?php echo esc_html($label); ?>
                </span>
            </div>

            <h2 class="font-heading text-[3.5vw] font-normal leading-[1.15] tracking-[0.01em] text-white mb-[1.6vw] md:text-5xl md:mb-6 sm:text-4xl" data-heading-anim>
                <?php echo esc_html($title); ?>
            </h2>

            <p class="font-body text-24 leading-[1.5] text-white/90 md:text-lg sm:text-base" data-para-anim>
                <?php echo esc_html($subtitle); ?>
            </p>
        </div>

        <div class="mt-[5vw] md:mt-12 sm:mt-10">
            <div class="grid grid-cols-2 gap-[3vw] md:gap-5 sm:grid-cols-1 sm:gap-4">
                <figure
                    class="overflow-hidden rounded-[1.6vw] bg-white md:rounded-[28px] sm:rounded-[22px] group"
                    data-animate="fade-up"
                    data-delay="0.1"
                >
                    <img
                        src="<?php echo esc_url(
                            get_template_directory_uri() .
                                '/src/imgs/carrier-services/infra-img-1.png',
                        ); ?>"
                        alt="Fibre installation team working on infrastructure"
                        class="block h-[32vw] w-full md:h-[420px] sm:h-[280px] scale-105 object-cover transition-transform duration-600 ease-out group-hover:scale-100"
                        loading="lazy"
                    >
                </figure>

                <figure
                    class="overflow-hidden rounded-[1.6vw] bg-white md:rounded-[28px] sm:rounded-[22px] group"
                    data-animate="fade-up"
                    data-delay="0.15"
                >
                    <img
                        src="<?php echo esc_url(
                            get_template_directory_uri() .
                                '/src/imgs/carrier-services/infra-img-2.png',
                        ); ?>"
                        alt="Data centre environment supporting network operations"
                        class="block h-[32vw] w-full md:h-[420px] sm:h-[280px] scale-105 object-cover transition-transform duration-600 ease-out group-hover:scale-100"
                        loading="lazy"
                    >
                </figure>
            </div>
        </div>

        <div class="flex justify-center mt-[3.2vw] md:mt-10" data-animate="fade-up" data-delay="0.2">
            <a href="<?php echo esc_url(
                $button_link,
            ); ?>" class="btn btn-primary group magnetic">
                <span class="btn-line"></span>
                <span class="btn-text"><?php echo esc_html(
                    $button_text,
                ); ?></span>
                <span class="btn-icon">
                    <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.45369 8.66578C9.45369 8.86726 9.37668 9.06894 9.22286 9.22276L1.34483 17.1008C1.03699 17.4086 0.538513 17.4086 0.230876 17.1008C-0.0767616 16.793 -0.0769585 16.2945 0.230875 15.9868L7.55193 8.66578L0.230875 1.34473C-0.0769592 1.03689 -0.0769592 0.538408 0.230875 0.230772C0.538709 -0.0768662 1.03719 -0.0770627 1.34483 0.230772L9.22286 8.1088C9.37668 8.26262 9.45369 8.4643 9.45369 8.66578Z" fill="currentColor"/>
                        <path d="M16.4537 8.66578C16.4537 8.86726 16.3767 9.06894 16.2229 9.22276L8.34483 17.1008C8.03699 17.4086 7.53851 17.4086 7.23088 17.1008C6.92324 16.793 6.92304 16.2945 7.23088 15.9868L14.5519 8.66578L7.23087 1.34473C6.92304 1.03689 6.92304 0.538408 7.23087 0.230772C7.53871 -0.0768662 8.03719 -0.0770627 8.34483 0.230772L16.2229 8.1088C16.3767 8.26262 16.4537 8.4643 16.4537 8.66578Z" fill="currentColor"/>
                    </svg>
                </span>
            </a>
        </div>
    </div>
</section>
