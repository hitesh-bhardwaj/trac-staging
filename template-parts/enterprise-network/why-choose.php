<?php
if (!defined('ABSPATH')) {
    exit();
} ?>

<section class="enterprise-why relative overflow-hidden bg-[#eef3fc] py-[7vw] md:py-20 sm:py-16" data-section="enterprise-why">

    <div class="relative z-[1] w-full px-[5.21vw] md:px-[4vw] sm:px-[6vw]">
        <div class="max-w-[80rem] mx-auto text-center">
            <div class="flex items-center justify-center gap-3 mb-8 md:mb-10" data-animate="fade-up">
                <span class="w-6 h-1 bg-brand-primary"></span>
                <span class="font-body text-base text-[#111]">Why Choose TrAC</span>
            </div>

            <h2 class="font-heading text-[3.438vw]  font-normal leading-[1.24] tracking-[0.01em] text-text-primary mb-[2.083vw] md:text-4xl md:mb-8 sm:text-[1.823vw] sm:mb-6" data-animate="fade-up" data-delay="0.1">
                Why Enterprises Partner with TrAC.
            </h2>

            <p class="w-[75%] font-body text-[1.25vw] leading-[1.58] text-text-body space-y-[0.521vw] mb-[2.604vw] md:text-lg md:space-y-2 md:mb-8 sm:text-base sm:space-y-2 sm:mb-6 text-center mx-auto" data-animate="fade-up" data-delay="0.2">
                With over 13 years of experience in Rwanda, TrAC combines local expertise with infrastructure built for reliability and performance. We operate as long-term infrastructure partners — not transactional vendors.
            </p>

	            <div class="grid grid-cols-3 px-10 gap-10 md:grid-cols-1 mt-[5vw] md:gap-8 text-left items-stretch">
	                <div class="bg-white rounded-[1.5vw] border border-transparent hover:border-brand-primary transition-colors duration-300 p-8 md:p-8 h-full  md:min-h-[180px] flex flex-col justify-between items-start" data-animate="fade-up">
	                    <div class="font-heading text-brand-primary font-medium text-[3vw] md:text-5xl min-h-[3.2vw] md:min-h-[56px] flex items-end">13+</div>
	                    <p class="font-body text-text-body text-[1.25vw] md:text-lg leading-snug">
	                        Years operating<br>in Rwanda
	                    </p>
	                </div>
	
	                <div class="bg-white rounded-[1.5vw] border border-transparent hover:border-brand-primary transition-colors duration-300 p-8 md:p-8 h-full  md:min-h-[180px] flex flex-col justify-between items-start" data-animate="fade-up" data-delay="0.05">
	                    <div class="font-heading text-brand-primary font-medium text-[3vw] md:text-5xl min-h-[3.2vw] md:min-h-[56px] flex items-end">100%</div>
	                    <p class="font-body text-text-body text-[1.25vw] md:text-lg leading-snug">
	                        Fibre-first<br>infrastructure
	                    </p>
	                </div>
	
	                <div class="bg-white rounded-[1.5vw] border border-transparent hover:border-brand-primary transition-colors duration-300 p-8 md:p-8 h-full  md:min-h-[180px] flex flex-col justify-between items-start" data-animate="fade-up" data-delay="0.1">
	                    <div class="font-heading text-brand-primary font-medium text-[3vw] md:text-5xl min-h-[3.2vw] md:min-h-[56px] flex items-end">3x</div>
	                    <p class="font-body text-text-body text-[1.25vw] md:text-lg leading-snug">
	                        Redundant international<br>connectivity routes
	                    </p>
	                </div>
	
	                <div class="bg-white rounded-[1.5vw] border border-transparent hover:border-brand-primary transition-colors duration-300 p-8 md:p-8 h-full  md:min-h-[180px] flex flex-col justify-between items-start" data-animate="fade-up" data-delay="0.15">
	                    <div class="font-heading text-brand-primary font-medium text-[3vw] md:text-5xl min-h-[3.2vw] md:min-h-[56px] flex items-end">24/7</div>
	                    <p class="font-body text-text-body text-[1.25vw] md:text-lg leading-snug">
	                        Dedicated enterprise<br>support teams
	                    </p>
	                </div>
	
	                <div class="bg-white rounded-[1.5vw] border border-transparent hover:border-brand-primary transition-colors duration-300 p-8 md:p-8 h-full  md:min-h-[180px] flex flex-col justify-between items-start" data-animate="fade-up" data-delay="0.2">
	                    <div class="font-heading text-brand-primary font-medium text-[3vw] md:text-5xl min-h-[3.2vw] md:min-h-[56px] flex items-end">
	                        <img src="<?php echo esc_url(
	                            get_template_directory_uri() .
	                                '/src/imgs/enterprise-network/infinity.png',
	                        ); ?>" alt="" class="w-auto h-[1.5vw] md:h-[40px]" loading="lazy">
	                    </div>
	                    <p class="font-body text-text-body text-[1.25vw] md:text-lg leading-snug">
	                        Local engineering<br>presence in Rwanda
	                    </p>
	                </div>
	
	                <div class="bg-white rounded-[1.5vw] border border-transparent hover:border-brand-primary transition-colors duration-300 p-8 md:p-8 h-full  md:min-h-[180px] flex flex-col justify-between items-start" data-animate="fade-up" data-delay="0.25">
	                    <div class="font-heading text-brand-primary font-medium text-[3vw] md:text-5xl min-h-[3.2vw] md:min-h-[56px] flex items-end">0</div>
	                    <p class="font-body text-text-body text-[1.25vw] md:text-lg leading-snug">
	                        Contention,<br>never shared bandwidth
	                    </p>
	                </div>
	            </div>
        </div>
    </div>
    <canvas class="network-canvas-el absolute inset-0 h-full w-full"></canvas>

</section>
