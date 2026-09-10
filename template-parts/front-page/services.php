<?php
if (!defined('ABSPATH')) {
    exit();
}

$services = [];

for ($i = 1; $i <= 4; $i++) {
    $services[] = [
        'title' => get_field("service_{$i}_title"),
        'description' => get_field("service_{$i}_description"),
        'link' => get_field("service_{$i}_link"),
        'image' => get_field("service_{$i}_image"),
        'alt' => get_field("service_{$i}_title"),
        'button_text' => get_field("service_{$i}_button_text"),
    ];
}
?>

<section class="relative overflow-hidden bg-white py-[5vw] md:pb-[13%] sm:pb-[20%] sm:pt-0 md:pt-[10%] min-h-auto" data-section="services" id="solutions">
    <div class="services-container w-full">
        <div class="services-heading px-[5vw] md:px-[7vw] md:py-8">
            <div class="services-label mb-[2.5vw] flex items-center justify-start gap-[0.8vw] md:mb-6 md:gap-3" data-animate="fade-up">
                <span class="label-line h-[0.2vw] w-[1.5vw] bg-brand-secondary md:h-1 md:w-5"></span>

                <span class="label-text font-body text-30 text-brand-secondary sm:text-[4vw]">
                    <?php echo trac_esc_html(get_field('services_label')); ?>
                </span>
            </div>

            <h2 data-heading-anim class="services-title font-heading text-66 leading-[1.3] tracking-[0.01em] text-text-primary">
                <?php echo trac_esc_html(get_field('services_title')); ?>
            </h2>
        </div>
<div data-animate="fade-up">

        <div class="services-cards-wrapper mt-[7vw] relative w-full md:mt-[3vw]" data-service-slider>
            <div class="services-slider-viewport">
                <div class="services-cards">
                    <?php foreach ($services as $index => $service): ?>
                        <article
                            class="service-card !bg-brand-tertiary overflow-hidden rounded-[1.2vw] border border-brand-dark md:border-none md:rounded-2xl"
                            data-service-card
                            data-card-index="<?php echo esc_attr($index); ?>"
                        >
                            <div class="card-inner grid h-full grid-cols-[1fr_auto] items-center md:flex md:flex-col-reverse md:items-start">
                                <div class="card-content flex h-full flex-col justify-between p-[3vw] pt-[4vw] pr-[2vw] md:p-5 md:pb-8">
                                    <div>
                                        <h3 class="card-title font-subheading mb-[1.2vw] text-36 font-normal text-white md:mb-3 sm:text-[6vw]">
                                            <?php echo trac_esc_html(
                                                $service['title'],
                                            ); ?>
                                        </h3>

                                        <p class="font-body max-w-[33vw] text-24 leading-[1.45] text-white md:max-w-full">
                                            <?php echo trac_esc_html(
                                                $service['description'],
                                            ); ?>
                                        </p>
                                    </div>

                                    <a href="<?php echo esc_url(
                                        $service['link'],
                                    ); ?>" class="btn btn-primary group w-fit md:w-[80%]!">
                                        <span class="btn-line"></span>
                                        <span class="btn-text"><?php echo trac_esc_html(
                                            $service['button_text'],
                                        ); ?></span>
                                        <span class="btn-icon">
                                            <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path d="M9.45369 8.66578C9.45369 8.86726 9.37668 9.06894 9.22286 9.22276L1.34483 17.1008C1.03699 17.4086 0.538513 17.4086 0.230876 17.1008C-0.0767616 16.793 -0.0769585 16.2945 0.230875 15.9868L7.55193 8.66578L0.230875 1.34473C-0.0769592 1.03689 -0.0769592 0.538408 0.230875 0.230772C0.538709 -0.0768662 1.03719 -0.0770627 1.34483 0.230772L9.22286 8.1088C9.37668 8.26262 9.45369 8.4643 9.45369 8.66578Z" fill="currentColor" />
                                                <path d="M16.4537 8.66578C16.4537 8.86726 16.3767 9.06894 16.2229 9.22276L8.34483 17.1008C8.03699 17.4086 7.53851 17.4086 7.23088 17.1008C6.92324 16.793 6.92304 16.2945 7.23088 15.9868L14.5519 8.66578L7.23087 1.34473C6.92304 1.03689 6.92304 0.538408 7.23087 0.230772C7.53871 -0.0768662 8.03719 -0.0770627 8.34483 0.230772L16.2229 8.1088C16.3767 8.26262 16.4537 8.4643 16.4537 8.66578Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>

                                <div class="card-image relative mr-[0.9vw] h-[calc(100%-2vw)] w-[34.3vw] overflow-hidden rounded-[1vw]  md:h-[52vw] md:w-[calc(100%-3rem)] sm:w-[calc(100%-2.4rem)] md:rounded-xl">
                                    <img
                                        src="<?php echo esc_url(
                                            $service['image'],
                                        ); ?>"
                                        alt="<?php echo esc_attr(
                                            $service['alt'],
                                        ); ?>"
                                        class="absolute inset-0 h-full w-full object-cover"
                                    >                          
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="services-slider-controls mt-[4.6vw] flex items-center justify-center gap-[0.6vw] md:mt-8 md:gap-3" data-animate="fade-up">
                <button
                    type="button"
                    class="services-nav-btn flex h-[2.7vw] min-h-11 w-[4.6vw] min-w-[3.9vw] items-center justify-center rounded-full border border-brand-secondary bg-white text-brand-secondary transition-all duration-300 hover:bg-brand-secondary hover:text-white md:h-12 md:w-20"
                    data-service-prev
                    aria-label="Previous service"
                >
                    <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M9.3 1.2L2 8.5L9.3 15.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M3 8.5H26" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>

                <button
                    type="button"
                    class="services-nav-btn flex h-[2.7vw] min-h-11 w-[4.6vw] min-w-[3.9vw] items-center justify-center rounded-full border border-brand-secondary bg-white text-brand-secondary transition-all duration-300 hover:bg-brand-secondary hover:text-white md:h-12 md:w-20"
                    data-service-next
                    aria-label="Next service"
                >
                    <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M18.7 1.2L26 8.5L18.7 15.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M25 8.5H2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>
            </div>
        </div>
                    </div>
    </div>
</section>
