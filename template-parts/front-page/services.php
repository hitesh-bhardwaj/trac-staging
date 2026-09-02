<?php
if (!defined('ABSPATH')) {
    exit();
}

$services = [
    [
        'title' => get_field('service_1_title') ?: 'Enterprise Networks',
        'description' => get_field('service_1_description') ?: 'Secure, high-capacity infrastructure built for large-scale operations, complex network environments, and mission-critical systems. Designed to support heavier workloads, multi-site connectivity, and evolving business demands.',
        'link' => get_field('service_1_link') ?: home_url('/products/enterprise-networks'),
        'image' => get_field('service_1_image') ?: get_template_directory_uri() . '/src/imgs/home/service-enterprise-network.png',
        'alt' => get_field('service_1_title') ?: 'Enterprise Networks Service',
    ],
    [
        'title' => get_field('service_2_title') ?: 'SME Internet',
        'description' => get_field('service_2_description') ?: "Reliable business internet built to support your growth, whether you're a small team or a growing company. Designed for daily operations, cloud tools, payments, and seamless collaboration.",
        'link' => get_field('service_2_link') ?: home_url('/sme-internet'),
        'image' => get_field('service_2_image') ?: get_template_directory_uri() . '/src/imgs/home/service-sme-internet.png',
        'alt' => get_field('service_2_title') ?: 'SME Internet Service',
    ],
    [
        'title' => get_field('service_3_title') ?: 'Home Internet',
        'description' => get_field('service_3_description') ?: 'Fast, stable fibre or wireless internet with clear pricing and local support you can rely on.',
        'link' => get_field('service_3_link') ?: home_url('/home-internet'),
        'image' => get_field('service_3_image') ?: get_template_directory_uri() . '/src/imgs/home/service-home-internet.png',
        'alt' => get_field('service_3_title') ?: 'Home Internet Service',
    ],
    [
        'title' => get_field('service_4_title') ?: 'Wholesale & Carrier',
        'description' => get_field('service_4_description') ?: 'Flexible, scalable infrastructure designed for network operators at every stage, from new ISPs to established carriers expanding capacity across Rwanda and East Africa.',
        'link' => get_field('service_4_link') ?: home_url('/carrier-services'),
        'image' => get_field('service_4_image') ?: get_template_directory_uri() . '/src/imgs/home/service-wholesale-carrier.png',
        'alt' => get_field('service_4_title') ?: 'Wholesale & Carrier Services',
    ],
];
?>

<section class="services-section relative overflow-hidden bg-[var(--color-brand-light)] py-[7%] sm:pb-[25%]" data-section="services" id="products">
    <style>
        [data-service-slider] .services-slider-viewport {
            position: relative;
            left: 50%;
            width: 100vw;
            height: 25vw;
            min-height: 360px;
            overflow: hidden;
            transform: translateX(-50%);
        }

        [data-service-slider] .services-cards {
            position: relative;
            height: 100%;
        }

        [data-service-slider] .service-card {
            position: absolute;
            top: 0;
            left: 10vw;
            width: 80vw;
            height: 100%;
            opacity: 0;
            pointer-events: none;
            transform: translate3d(7.5vw, 0, 0);
            transition:
                opacity 650ms ease,
                transform 650ms ease-in-out;
            will-change: transform, opacity;
        }

        [data-service-slider] .services-cards.is-jumping .service-card {
            transition: none !important;
        }

        [data-service-slider] .service-card.is-prev,
        [data-service-slider] .service-card.is-prev-2,
        [data-service-slider] .service-card.is-prev-3,
        [data-service-slider] .service-card.is-next,
        [data-service-slider] .service-card.is-next-2,
        [data-service-slider] .service-card.is-next-3,
        [data-service-slider] .service-card.is-active {
            opacity: 1;
        }

        [data-service-slider] .service-card.is-prev {
            z-index: 3;
            transform: translate3d(-2.5vw, 0, 0);
        }

        [data-service-slider] .service-card.is-prev-2 {
            z-index: 2;
            transform: translate3d(-5vw, 0, 0);
        }

        [data-service-slider] .service-card.is-prev-3 {
            z-index: 1;
            transform: translate3d(-7.5vw, 0, 0);
        }

        [data-service-slider] .service-card.is-active {
            z-index: 4;
            transform: translate3d(0, 0, 0);
            pointer-events: auto;
        }

        [data-service-slider] .service-card.is-next {
            z-index: 3;
            transform: translate3d(2.5vw, 0, 0);
        }

        [data-service-slider] .service-card.is-next-2 {
            z-index: 2;
            transform: translate3d(5vw, 0, 0);
        }

        [data-service-slider] .service-card.is-next-3 {
            z-index: 1;
            transform: translate3d(7.5vw, 0, 0);
        }

        [data-service-slider] .services-nav-btn {
            cursor: pointer;
        }

        @media (max-width: 1024px) {
            [data-service-slider] .services-slider-viewport {
                height: 78vw;
                min-height: 560px;
            }

            [data-service-slider] .service-card {
                left: 7vw;
                width: 86vw;
            }

            [data-service-slider] .service-card.is-prev {
                transform: translate3d(-2.5vw, 0, 0);
            }

            [data-service-slider] .service-card.is-prev-2 {
                transform: translate3d(-5vw, 0, 0);
            }

            [data-service-slider] .service-card.is-prev-3 {
                transform: translate3d(-7.5vw, 0, 0);
            }

            [data-service-slider] .service-card.is-next {
                transform: translate3d(2.5vw, 0, 0);
            }

            [data-service-slider] .service-card.is-next-2 {
                transform: translate3d(5vw, 0, 0);
            }

            [data-service-slider] .service-card.is-next-3 {
                transform: translate3d(7.5vw, 0, 0);
            }
        }

        @media (max-width: 640px) {
            [data-service-slider] .services-slider-viewport {
                height: 132vw;
                min-height: 540px;
            }

            [data-service-slider] .service-card {
                left: 6vw;
                width: 88vw;
            }

            [data-service-slider] .service-card.is-prev {
                transform: translate3d(-2vw, 0, 0);
            }

            [data-service-slider] .service-card.is-prev-2 {
                transform: translate3d(-4vw, 0, 0);
            }

            [data-service-slider] .service-card.is-prev-3 {
                transform: translate3d(-6vw, 0, 0);
            }

            [data-service-slider] .service-card.is-next {
                transform: translate3d(2vw, 0, 0);
            }

            [data-service-slider] .service-card.is-next-2 {
                transform: translate3d(4vw, 0, 0);
            }

            [data-service-slider] .service-card.is-next-3 {
                transform: translate3d(6vw, 0, 0);
            }
        }
    </style>

    <div class="services-container w-full">
        <div class="services-heading bg-[var(--color-brand-light)] px-[5vw] pb-[7vw] md:px-[5vw] md:py-12 sm:px-[10vw] sm:py-8">
            <div class="services-label mb-[1.563vw] flex items-center justify-start gap-[0.833vw] md:mb-5 md:gap-3 sm:mb-10" data-animate="fade-up">
                <span class="label-line h-[0.208vw] w-[1.354vw] bg-[var(--color-brand-secondary)] md:h-1 md:w-6 sm:w-5"></span>

                <span class="label-text font-body text-30 text-brand-secondary md:text-xl sm:text-lg">
                    <?php echo esc_html(get_field('services_label') ?: 'What We Offer'); ?>
                </span>
            </div>

            <h2 data-heading-anim class="services-title font-heading text-66 leading-[1.12] tracking-[0.01em] text-text-primary md:text-4xl sm:text-center sm:text-[8vw]">
                <?php echo esc_html(get_field('services_title') ?: 'Get Connected. Stay Connected'); ?>
            </h2>
        </div>

        <div class="services-cards-wrapper relative w-full sm:mt-[8vw]" data-service-slider>
            <div class="services-slider-viewport">
                <div class="services-cards">
                    <?php foreach ($services as $index => $service) : ?>
                        <article
                            class="service-card !bg-[var(--color-brand-tertiary)] overflow-hidden rounded-[1.2vw] border border-[var(--color-brand-dark)] md:rounded-3xl"
                            data-service-card
                            data-card-index="<?php echo esc_attr($index); ?>"
                        >
                            <div class="card-inner grid h-full grid-cols-[1fr_auto] items-center md:grid-cols-1">
                                <div class="card-content flex h-full flex-col justify-between p-[3.073vw] pr-[2vw] md:p-8 sm:p-6">
                                    <div>
                                        <h3 class="card-title font-subheading mb-[1.25vw] text-36 font-normal text-white md:mb-4 md:text-2xl sm:mb-3 sm:text-[6vw]">
                                            <?php echo esc_html($service['title']); ?>
                                        </h3>

                                        <p class="card-description font-body max-w-[35vw] text-24 leading-[1.5] text-white md:max-w-full md:text-lg sm:text-base">
                                            <?php echo esc_html($service['description']); ?>
                                        </p>
                                    </div>

                                    <a href="<?php echo esc_url($service['link']); ?>" class="btn btn-primary group w-fit">
                                        <span class="btn-line"></span>
                                        <span class="btn-text">Learn More</span>
                                        <span class="btn-icon">
                                            <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path d="M9.45369 8.66578C9.45369 8.86726 9.37668 9.06894 9.22286 9.22276L1.34483 17.1008C1.03699 17.4086 0.538513 17.4086 0.230876 17.1008C-0.0767616 16.793 -0.0769585 16.2945 0.230875 15.9868L7.55193 8.66578L0.230875 1.34473C-0.0769592 1.03689 -0.0769592 0.538408 0.230875 0.230772C0.538709 -0.0768662 1.03719 -0.0770627 1.34483 0.230772L9.22286 8.1088C9.37668 8.26262 9.45369 8.4643 9.45369 8.66578Z" fill="currentColor" />
                                                <path d="M16.4537 8.66578C16.4537 8.86726 16.3767 9.06894 16.2229 9.22276L8.34483 17.1008C8.03699 17.4086 7.53851 17.4086 7.23088 17.1008C6.92324 16.793 6.92304 16.2945 7.23088 15.9868L14.5519 8.66578L7.23087 1.34473C6.92304 1.03689 6.92304 0.538408 7.23087 0.230772C7.53871 -0.0768662 8.03719 -0.0770627 8.34483 0.230772L16.2229 8.1088C16.3767 8.26262 16.4537 8.4643 16.4537 8.66578Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>

                                <div class="card-image relative mr-[0.938vw] h-[calc(100%-2vw)] w-[34.375vw] overflow-hidden rounded-[1vw] md:mx-8 md:mb-8 md:h-[45vw] md:w-[calc(100%-4rem)] md:rounded-2xl sm:mx-6 sm:mb-6 sm:h-[52vw] sm:w-[calc(100%-3rem)]">
                                    <img
                                        src="<?php echo esc_url($service['image']); ?>"
                                        alt="<?php echo esc_attr($service['alt']); ?>"
                                        class="absolute inset-0 h-full w-full object-cover"
                                    >

                                    
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="services-slider-controls mt-[4.688vw] flex items-center justify-center gap-[0.625vw] md:mt-10 md:gap-3 sm:mt-8">
                <button
                    type="button"
                    class="services-nav-btn flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-[var(--color-brand-secondary)] bg-[var(--color-brand-light)] text-[var(--color-brand-secondary)] transition-all duration-300 hover:bg-[var(--color-brand-secondary)] hover:text-[var(--color-text-secondary)] md:h-12 md:w-20"
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
                    class="services-nav-btn flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-[var(--color-brand-secondary)] bg-[var(--color-brand-light)] text-[var(--color-brand-secondary)] transition-all duration-300 hover:bg-[var(--color-brand-secondary)] hover:text-[var(--color-text-secondary)] md:h-12 md:w-20"
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

    <script>
        (function () {
            function initServiceSlider(slider) {
                if (!slider || slider.dataset.serviceSliderInit === 'true') return;

                slider.dataset.serviceSliderInit = 'true';

                const viewport = slider.querySelector('.services-slider-viewport');
                const track = slider.querySelector('.services-cards');
                const prevBtn = slider.querySelector('[data-service-prev]');
                const nextBtn = slider.querySelector('[data-service-next]');

                if (!viewport || !track || !prevBtn || !nextBtn) return;

                const originalSlides = Array.from(
                    track.querySelectorAll('[data-service-card]:not([data-clone])')
                );

                if (!originalSlides.length) return;

                const total = originalSlides.length;
                let currentIndex = 0;
                let isAnimating = false;

                function getSlides() {
                    return originalSlides;
                }

                function clampIndex(index) {
                    return Math.max(0, Math.min(index, total - 1));
                }

                function setButtonState(button, disabled) {
                    button.disabled = disabled;
                    button.setAttribute('aria-disabled', disabled ? 'true' : 'false');
                    button.classList.toggle('pointer-events-none', disabled);
                    button.classList.toggle('opacity-40', disabled);
                    button.classList.toggle('cursor-not-allowed', disabled);
                    button.classList.toggle('opacity-100', !disabled);
                    button.classList.toggle('cursor-pointer', !disabled);
                }

                function updateButtons() {
                    setButtonState(prevBtn, currentIndex === 0);
                    setButtonState(nextBtn, currentIndex === total - 1);
                }

                function updateActiveState() {
                    const slides = getSlides();
                    const previousIndex = currentIndex - 1;
                    const previousSecondIndex = currentIndex - 2;
                    const previousThirdIndex = currentIndex - 3;
                    const activeIndex = currentIndex;
                    const nextIndex = currentIndex + 1;
                    const nextSecondIndex = currentIndex + 2;
                    const nextThirdIndex = currentIndex + 3;

                    slides.forEach(function (slide, index) {
                        const isPrevious = index === previousIndex;
                        const isPreviousSecond = index === previousSecondIndex;
                        const isPreviousThird = index === previousThirdIndex;
                        const isActive = index === activeIndex;
                        const isNext = index === nextIndex;
                        const isNextSecond = index === nextSecondIndex;
                        const isNextThird = index === nextThirdIndex;
                        const link = slide.querySelector('a');

                        slide.classList.toggle('is-prev', isPrevious);
                        slide.classList.toggle('is-prev-2', isPreviousSecond);
                        slide.classList.toggle('is-prev-3', isPreviousThird);
                        slide.classList.toggle('is-active', isActive);
                        slide.classList.toggle('is-next', isNext);
                        slide.classList.toggle('is-next-2', isNextSecond);
                        slide.classList.toggle('is-next-3', isNextThird);
                        slide.setAttribute('aria-hidden', isActive ? 'false' : 'true');

                        if (link) {
                            link.tabIndex = isActive ? 0 : -1;
                        }
                    });
                }

                function renderSlides(skipTransition) {
                    if (skipTransition) {
                        track.classList.add('is-jumping');
                    }
                    updateActiveState();
                    updateButtons();

                    if (skipTransition) {
                        requestAnimationFrame(function () {
                            requestAnimationFrame(function () {
                                track.classList.remove('is-jumping');
                            });
                        });
                    }
                }

                function goTo(index) {
                    if (isAnimating) return;

                    const nextIndex = clampIndex(index);
                    if (nextIndex === currentIndex) return;

                    isAnimating = true;
                    currentIndex = nextIndex;
                    renderSlides(false);

                    window.setTimeout(function () {
                        isAnimating = false;
                    }, 650);
                }

                nextBtn.addEventListener('click', function () {
                    goTo(currentIndex + 1);
                });

                prevBtn.addEventListener('click', function () {
                    goTo(currentIndex - 1);
                });

                window.addEventListener('resize', function () {
                    renderSlides(true);
                });

                requestAnimationFrame(function () {
                    renderSlides(true);
                });
            }

            document.querySelectorAll('[data-service-slider]').forEach(initServiceSlider);
        })();
    </script>
</section>
