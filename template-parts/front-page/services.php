<?php
if (!defined('ABSPATH')) {
    exit();
}

$services = [
    [
        'title' => get_field('service_1_title') ?: 'Home Internet',
        'description' => get_field('service_1_description') ?: 'Fast, stable fibre internet with clear pricing and local support you can rely on.',
        'link' => get_field('service_1_link') ?: home_url('/products/home-internet'),
        'image' => get_field('service_1_image') ?: get_template_directory_uri() . '/src/imgs/service-1.png',
        'alt' => get_field('service_1_title') ?: 'Home Internet Service',
    ],
    [
        'title' => get_field('service_2_title') ?: 'Business Internet',
        'description' => get_field('service_2_description') ?: 'Dedicated connectivity, managed equipment, and reliable business support without oversubscription.',
        'link' => get_field('service_2_link') ?: home_url('/business-internet'),
        'image' => get_field('service_2_image') ?: get_template_directory_uri() . '/src/imgs/service-2.png',
        'alt' => get_field('service_2_title') ?: 'Business Internet Service',
    ],
    [
        'title' => get_field('service_3_title') ?: 'Enterprise Connectivity',
        'description' => get_field('service_3_description') ?: 'Resilient enterprise connectivity with private links, redundancy, SLA-backed uptime, and scalable network architecture.',
        'link' => get_field('service_3_link') ?: home_url('/enterprise-connectivity'),
        'image' => get_field('service_3_image') ?: get_template_directory_uri() . '/src/imgs/service-3.png',
        'alt' => get_field('service_3_title') ?: 'Enterprise Connectivity',
    ],
    [
        'title' => get_field('service_4_title') ?: 'Hosting & Data Centre',
        'description' => get_field('service_4_description') ?: 'Secure hosting, colocation, and infrastructure services built to keep critical workloads close to your network.',
        'link' => get_field('service_4_link') ?: home_url('/data-centre'),
        'image' => get_field('service_4_image') ?: get_template_directory_uri() . '/src/imgs/service-4.png',
        'alt' => get_field('service_4_title') ?: 'Data Centre Services',
    ],
];
?>

<section class="services-section relative overflow-hidden bg-white py-[7%] sm:pb-[25%]" data-section="services" id="products">
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
            display: flex;
            align-items: stretch;
            gap: 2vw;
            height: 100%;
            will-change: transform;
            transition: transform 550ms ease-in-out;
        }

        [data-service-slider] .services-cards.is-jumping {
            transition: none !important;
        }

        [data-service-slider] .service-card {
            position: relative;
            flex: 0 0 84vw;
            width: 84vw;
            height: 100%;
            opacity: 1;
            pointer-events: none;
            transition:
                opacity 550ms ease,
                filter 550ms ease,
                transform 550ms ease-in-out;
            will-change: transform, opacity, filter;
        }

        [data-service-slider] .service-card.is-active {
            opacity: 1;
            filter: brightness(1);
            transform: scale(1);
            pointer-events: auto;
        }

        [data-service-slider] .services-nav-btn {
            cursor: pointer;
        }

        @media (max-width: 1024px) {
            [data-service-slider] .services-slider-viewport {
                height: 78vw;
                min-height: 560px;
            }

            [data-service-slider] .services-cards {
                gap: 3vw;
            }

            [data-service-slider] .service-card {
                flex-basis: 86vw;
                width: 86vw;
            }
        }

        @media (max-width: 640px) {
            [data-service-slider] .services-slider-viewport {
                height: 132vw;
                min-height: 540px;
            }

            [data-service-slider] .services-cards {
                gap: 4vw;
            }

            [data-service-slider] .service-card {
                flex-basis: 88vw;
                width: 88vw;
            }
        }
    </style>

    <div class="services-container w-full">
        <div class="services-heading bg-white px-[5vw] pb-[7vw] md:px-[5vw] md:py-12 sm:px-[10vw] sm:py-8">
            <div class="services-label mb-[1.563vw] flex items-center justify-start gap-[0.833vw] md:mb-5 md:gap-3 sm:mb-10" data-animate="fade-up">
                <span class="label-line h-[0.208vw] w-[1.354vw] bg-[#E86224] md:h-1 md:w-6 sm:w-5"></span>

                <span class="label-text font-body text-30 text-[#E86224] md:text-xl sm:text-lg">
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
                            class="service-card !bg-[#10417F] overflow-hidden rounded-[1.2vw] border border-black md:rounded-3xl"
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
                    class="services-nav-btn flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-[#E86224] bg-white text-[#E86224] transition-all duration-300 hover:bg-[#E86224] hover:text-white md:h-12 md:w-20"
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
                    class="services-nav-btn flex h-[2.708vw] min-h-11 w-[4.688vw] min-w-[76px] items-center justify-center rounded-full border border-[#E86224] bg-white text-[#E86224] transition-all duration-300 hover:bg-[#E86224] hover:text-white md:h-12 md:w-20"
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
                let currentIndex = total;
                let isAnimating = false;
                let normalizeTimer = null;

                const beforeFragment = document.createDocumentFragment();
                const afterFragment = document.createDocumentFragment();

                originalSlides.forEach(function (slide) {
                    const beforeClone = slide.cloneNode(true);
                    beforeClone.setAttribute('data-clone', 'before');
                    beforeFragment.appendChild(beforeClone);
                });

                originalSlides.forEach(function (slide) {
                    const afterClone = slide.cloneNode(true);
                    afterClone.setAttribute('data-clone', 'after');
                    afterFragment.appendChild(afterClone);
                });

                track.insertBefore(beforeFragment, track.firstChild);
                track.appendChild(afterFragment);

                function getSlides() {
                    return Array.from(track.querySelectorAll('[data-service-card]'));
                }

                function updateActiveState() {
                    const slides = getSlides();

                    slides.forEach(function (slide, index) {
                        const isActive = index === currentIndex;
                        const link = slide.querySelector('a');

                        slide.classList.toggle('is-active', isActive);
                        slide.setAttribute('aria-hidden', isActive ? 'false' : 'true');

                        if (link) {
                            link.tabIndex = isActive ? 0 : -1;
                        }
                    });
                }

                function centerSlide(skipTransition) {
                    const slides = getSlides();
                    const activeSlide = slides[currentIndex];

                    if (!activeSlide) return;

                    if (skipTransition) {
                        track.classList.add('is-jumping');
                    } else {
                        track.classList.remove('is-jumping');
                    }

                    const viewportCenter = viewport.clientWidth / 2;
                    const slideCenter = activeSlide.offsetLeft + activeSlide.offsetWidth / 2;
                    const translateX = viewportCenter - slideCenter;

                    track.style.transform = 'translate3d(' + translateX + 'px, 0, 0)';

                    updateActiveState();

                    if (skipTransition) {
                        requestAnimationFrame(function () {
                            requestAnimationFrame(function () {
                                track.classList.remove('is-jumping');
                            });
                        });
                    }
                }

                function normalizeLoop() {
                    if (currentIndex >= total * 2) {
                        currentIndex -= total;
                        centerSlide(true);
                    }

                    if (currentIndex < total) {
                        currentIndex += total;
                        centerSlide(true);
                    }

                    isAnimating = false;
                }

                function goTo(index) {
                    if (isAnimating) return;

                    clearTimeout(normalizeTimer);

                    isAnimating = true;
                    currentIndex = index;
                    centerSlide(false);

                    normalizeTimer = setTimeout(normalizeLoop, 900);
                }

                nextBtn.addEventListener('click', function () {
                    goTo(currentIndex + 1);
                });

                prevBtn.addEventListener('click', function () {
                    goTo(currentIndex - 1);
                });

                window.addEventListener('resize', function () {
                    centerSlide(true);
                });

                requestAnimationFrame(function () {
                    centerSlide(true);
                });
            }

            document.querySelectorAll('[data-service-slider]').forEach(initServiceSlider);
        })();
    </script>
</section>
