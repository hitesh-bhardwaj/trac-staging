<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<section class="enterprise-services py-[7vw] md:py-20 sm:py-16" data-section="enterprise-services">
    <div class="w-full px-[5.21vw] md:px-[4vw] sm:px-[6vw]">
        <div class="max-w-[80rem] mx-auto text-center">
            <div class="flex items-center justify-center gap-3 mb-12 md:mb-10" data-animate="fade-up">
                <span class="w-6 h-1 bg-brand-primary"></span>
                <span class="font-body text-base text-[#111]">Our Services</span>
            </div>

        <h2 class="font-heading text-[3.438vw]  font-normal leading-[1.24] tracking-[0.01em] text-text-primary mb-[2.083vw] md:text-4xl md:mb-8 sm:text-[1.823vw] sm:mb-6" data-animate="fade-up" data-delay="0.1">
                Built for Organisations That Cannot Afford Downtime.
            </h2>

            <p class="w-[70%] font-body text-[1.25vw] leading-[1.58] text-text-body space-y-[0.521vw] mb-[2.604vw] md:text-lg md:space-y-2 md:mb-8 sm:text-base sm:space-y-2 sm:mb-6 text-center mx-auto" data-animate="fade-up" data-delay="0.2">
                TrAC designs and deploys enterprise-grade networks that support complex organisations with infrastructure built to perform under pressure to ensure systems remain stable when it matters most.
            </p>

            <div class="grid grid-cols-3 gap-10 mt-[5vw] md:grid-cols-1 md:gap-8 text-left">
                <div class="bg-white rounded-[32px] border border-[#d7e0f0] hover:border-brand-primary/60 focus-within:border-brand-primary/60 transition-colors duration-300 p-10 flex flex-col min-h-[440px] md:min-h-0 md:p-8 text-left" data-animate="fade-up">
                    <div>
                        <div class="h-[4.5vw] w-[4.5vw] mb-10">
                        <img src="<?php echo esc_url(
                            get_template_directory_uri() .
                                '/src/imgs/enterprise-network/business.svg',
                        ); ?>" alt="" class="w-full h-full " loading="lazy">
                        </div>

                    <h3 class="font-body text-text-primary text-[1.823vw] md:text-2xl mb-6 font-normal">Business Internet</h3>
                        <p class="font-body text-text-body  leading-[1.7]">
                            Dedicated, uncontended bandwidth for cloud systems and critical applications. Multiple international routes and a fully redundant backbone ensure continuity across your operations.
                        </p>
                    </div>

                    <div class="mt-auto pt-10">
                        <a href="<?php echo esc_url('#get-connected'); ?>" class="btn btn-primary group magnetic">
                            <span class="btn-line"></span>
                            <span class="btn-text">Get on TrAC</span>
                            <span class="btn-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                </div>

                <div class="bg-white rounded-[32px] border border-[#d7e0f0] hover:border-brand-primary/60 focus-within:border-brand-primary/60 transition-colors duration-300 p-10 flex flex-col min-h-[440px] md:min-h-0 md:p-8 text-left" data-animate="fade-up" data-delay="0.1">
                    <div>
                        <div class="h-[4.5vw] w-[4.5vw] mb-10">
                        <img src="<?php echo esc_url(
                            get_template_directory_uri() .
                                '/src/imgs/enterprise-network/private-network.svg',
                        ); ?>" alt="" class="w-full h-full " loading="lazy">
                        </div>

                    <h3 class="font-body text-text-primary text-[1.823vw] md:text-2xl mb-6 font-normal">Private Network &amp; VPN</h3>
                        <p class="font-body text-text-body  leading-[1.7]">
                            Secure MPLS private networks connecting branches, teams, and systems into a single controlled environment with site-to-site security and consistent performance.
                        </p>
                    </div>

                    <div class="mt-auto pt-10">
                        <a href="<?php echo esc_url('#get-connected'); ?>" class="btn btn-primary group magnetic">
                            <span class="btn-line"></span>
                            <span class="btn-text">Get on TrAC</span>
                            <span class="btn-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                </div>

                <div class="bg-white rounded-[32px] border border-[#d7e0f0] hover:border-brand-primary/60 focus-within:border-brand-primary/60 transition-colors duration-300 p-10 flex flex-col min-h-[440px] md:min-h-0 md:p-8 text-left" data-animate="fade-up" data-delay="0.2">
                    <div>
                        <div class="h-[4.5vw] w-[4.5vw] mb-10">
                        <img src="<?php echo esc_url(
                            get_template_directory_uri() .
                                '/src/imgs/enterprise-network/cloud-hosting.svg',
                        ); ?>" alt="" class="w-full h-full " loading="lazy">
                        </div>

                    <h3 class="font-body text-text-primary text-[1.823vw] md:text-2xl mb-6 font-normal">Cloud &amp; Hosting</h3>
                        <p class="font-body text-text-body  leading-[1.7]">
                            Flexible cloud environments supporting virtual infrastructure, data protection, and scalable operations. Tier 3 data centre colocation with 24/7 monitoring.
                        </p>
                    </div>

                    <div class="mt-auto pt-10">
                        <a href="<?php echo esc_url('#get-connected'); ?>" class="btn btn-primary group magnetic">
                            <span class="btn-line"></span>
                            <span class="btn-text">Get on TrAC</span>
                            <span class="btn-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                </div>
            </div>
        </div>
    </div>
</section>
