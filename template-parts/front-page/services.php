<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<section class="services-section relative bg-white py-[7%]" data-section="services" id="products">
    <div class="services-container w-full">
        <div class="services-heading text-center pb-[7vw] md:py-12 sm:py-8 bg-white">
            <div class="services-label flex items-center justify-center gap-[0.833vw] mb-[1.563vw] md:gap-3 md:mb-5 sm:mb-4">
                <span class="label-line w-[1.354vw] h-[0.208vw] bg-brand-primary md:w-6 md:h-1 sm:w-5"></span>
                <span class="label-text font-body text-[1.25vw] text-text-primary md:text-xl sm:text-lg">What We Offer</span>
            </div>
            <h2 class="services-title font-heading text-[3.438vw] leading-[1.12] tracking-[0.01em] text-text-primary md:text-4xl sm:text-3xl">
                Get Connected. Glitch Free
            </h2>
        </div>

        <div class="services-cards-wrapper relative px-[10.21vw] md:px-[4vw] sm:px-[6vw]" data-stacking-cards>
            <div class="services-cards relative flex flex-col gap-[2vw]">
                <div class="service-card bg-white border border-brand-primary rounded-[2.083vw] overflow-hidden md:rounded-3xl" data-card-index="0">
                    <div class="card-inner grid grid-cols-[1fr_auto] items-center md:grid-cols-1">
                        <div class="card-content p-[3.073vw] md:p-8 sm:p-6">
                            <h3 class="card-title font-heading font-normal text-[1.875vw] text-brand-primary mb-[1.25vw] md:text-2xl md:mb-4 sm:text-xl sm:mb-3">Home</h3>
                            <p class="card-description font-body text-[1.25vw] leading-[1.5] text-text-body mb-[1.563vw] max-w-[35vw] md:text-lg md:mb-5 md:max-w-full sm:text-base sm:mb-4">Looking for premium internet for your family or home office? Our premium home internet plans are business grade and uncontended, with capped and uncapped options backed by business-grade support.</p>
                            <a href="<?php echo esc_url(
                                home_url('/home-internet'),
                            ); ?>" class="btn btn-primary group">
                                <span class="btn-line"></span>
                                <span class="btn-text">Learn More</span>
                                <span class="btn-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="1.71429" cy="1.71429" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="1.71429" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="12" r="1.71429" fill="currentColor"/>
                                        <circle cx="22.2866" cy="12" r="1.71429" fill="currentColor"/>
                                        <circle cx="1.71429" cy="22.2857" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="22.2857" r="1.71429" fill="currentColor"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div class="card-image relative w-[34.375vw] h-[25vw] md:w-full md:h-[50vw] sm:h-[60vw] rounded-[1.25vw] md:rounded-2xl overflow-hidden ">
                            <img src="<?php echo esc_url(
                                get_template_directory_uri() .
                                    '/src/imgs/service-1.png',
                            ); ?>" alt="Home Internet Service" class="absolute inset-0 w-full h-full object-cover ">
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-[rgba(8,67,178,0.33)] rounded-[1.25vw] md:rounded-2xl"></div>
                        </div>
                    </div>
                </div>

                <div class="service-card bg-white border border-brand-primary rounded-[2.083vw] overflow-hidden md:rounded-3xl" data-card-index="1">
                    <div class="card-inner grid grid-cols-[1fr_auto] items-center md:grid-cols-1">
                        <div class="card-content p-[3.073vw] md:p-8 sm:p-6">
                            <h3 class="card-title font-heading font-normal text-[1.875vw] text-brand-primary mb-[1.25vw] md:text-2xl md:mb-4 sm:text-xl sm:mb-3">Business</h3>
                            <p class="card-description font-body text-[1.25vw] leading-[1.5] text-text-body mb-[1.563vw] max-w-[35vw] md:text-lg md:mb-5 md:max-w-full sm:text-base sm:mb-4">From single dedicated internet links to multi-site private networks, TrAC gives businesses reliable connectivity, managed equipment, and rapid support without oversubscription.</p>
                            <a href="<?php echo esc_url(
                                home_url('/business-internet'),
                            ); ?>" class="btn btn-primary group">
                                <span class="btn-line"></span>
                                <span class="btn-text">Learn More</span>
                                <span class="btn-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="1.71429" cy="1.71429" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="1.71429" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="12" r="1.71429" fill="currentColor"/>
                                        <circle cx="22.2866" cy="12" r="1.71429" fill="currentColor"/>
                                        <circle cx="1.71429" cy="22.2857" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="22.2857" r="1.71429" fill="currentColor"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div class="card-image relative w-[34.375vw] h-[25vw] md:w-full md:h-[50vw] sm:h-[60vw] rounded-[1.25vw] md:rounded-2xl overflow-hidden">
                            <img src="<?php echo esc_url(
                                get_template_directory_uri() .
                                    '/src/imgs/service-2.png',
                            ); ?>" alt="Business Internet Service" class="absolute inset-0 w-full h-full object-cover rounded-[1.25vw] md:rounded-2xl">
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-[rgba(8,67,178,0.33)] rounded-[1.25vw] md:rounded-2xl"></div>
                        </div>
                    </div>
                </div>

                <div class="service-card bg-white border border-brand-primary rounded-[2.083vw] overflow-hidden md:rounded-3xl" data-card-index="2">
                    <div class="card-inner grid grid-cols-[1fr_auto] items-center md:grid-cols-1">
                        <div class="card-content p-[3.073vw] md:p-8 sm:p-6">
                            <h3 class="card-title font-heading font-normal text-[1.875vw] text-brand-primary mb-[1.25vw] md:text-2xl md:mb-4 sm:text-xl sm:mb-3">Enterprise</h3>
                            <p class="card-description font-body text-[1.25vw] leading-[1.5] text-text-body mb-[1.563vw] max-w-[35vw] md:text-lg md:mb-5 md:max-w-full sm:text-base sm:mb-4">For larger organisations, we design resilient enterprise connectivity with private links, network redundancy, SLA-backed uptime, and architecture that scales with your operations.</p>
                            <a href="<?php echo esc_url(
                                home_url('/enterprise-connectivity'),
                            ); ?>" class="btn btn-primary group">
                                <span class="btn-line"></span>
                                <span class="btn-text">Learn More</span>
                                <span class="btn-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="1.71429" cy="1.71429" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="1.71429" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="12" r="1.71429" fill="currentColor"/>
                                        <circle cx="22.2866" cy="12" r="1.71429" fill="currentColor"/>
                                        <circle cx="1.71429" cy="22.2857" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="22.2857" r="1.71429" fill="currentColor"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div class="card-image relative w-[34.375vw] h-[25vw] md:w-full md:h-[50vw] sm:h-[60vw] rounded-[1.25vw] md:rounded-2xl overflow-hidden">
                            <img src="<?php echo esc_url(
                                get_template_directory_uri() .
                                    '/src/imgs/service-3.png',
                            ); ?>" alt="Enterprise Connectivity" class="absolute inset-0 w-full h-full object-cover rounded-[1.25vw] md:rounded-2xl">
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-[rgba(8,67,178,0.33)] rounded-[1.25vw] md:rounded-2xl"></div>
                        </div>
                    </div>
                </div>

                <div class="service-card bg-white border border-brand-primary rounded-[2.083vw] overflow-hidden md:rounded-3xl" data-card-index="3">
                    <div class="card-inner grid grid-cols-[1fr_auto] items-center md:grid-cols-1">
                        <div class="card-content p-[3.073vw] md:p-8 sm:p-6">
                            <h3 class="card-title font-heading font-normal text-[1.875vw] text-brand-primary mb-[1.25vw] md:text-2xl md:mb-4 sm:text-xl sm:mb-3">Hosting & Data Centre</h3>
                            <p class="card-description font-body text-[1.25vw] leading-[1.5] text-text-body mb-[1.563vw] max-w-[35vw] md:text-lg md:mb-5 md:max-w-full sm:text-base sm:mb-4">Extend beyond access with secure hosting, colocation, and infrastructure services designed to keep critical workloads close to your network and easy to manage.</p>
                            <a href="<?php echo esc_url(
                                home_url('/data-centre'),
                            ); ?>" class="btn btn-primary group">
                                <span class="btn-line"></span>
                                <span class="btn-text">Learn More</span>
                                <span class="btn-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="1.71429" cy="1.71429" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="1.71429" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="12" r="1.71429" fill="currentColor"/>
                                        <circle cx="22.2866" cy="12" r="1.71429" fill="currentColor"/>
                                        <circle cx="1.71429" cy="22.2857" r="1.71429" fill="currentColor"/>
                                        <circle cx="11.9994" cy="22.2857" r="1.71429" fill="currentColor"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div class="card-image relative w-[34.375vw] h-[25vw] md:w-full md:h-[50vw] sm:h-[60vw] rounded-[1.25vw] md:rounded-2xl overflow-hidden">
                            <img src="<?php echo esc_url(
                                get_template_directory_uri() .
                                    '/src/imgs/service-4.png',
                            ); ?>" alt="Data Centre Services" class="absolute inset-0 w-full h-full object-cover rounded-[1.25vw] md:rounded-2xl">
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-[rgba(8,67,178,0.33)] rounded-[1.25vw] md:rounded-2xl"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
