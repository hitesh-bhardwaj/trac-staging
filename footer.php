<?php
/**
 * Theme Footer
 *
 * @package Trac
 */
?>

    <footer id="site-footer" class="site-footer relative " data-parallax-footer>
        <div class="footer-container w-full px-[5.21vw] pt-[5.469vw] pb-[2vw] md:px-[4vw] md:pt-20 md:pb-16 sm:px-[6vw] sm:pt-16 sm:pb-12" data-footer-clippath>
            <!-- Footer Top -->
            <div class="footer-top grid grid-cols-[1fr_auto_auto]  mb-[5vw] md:grid-cols-1 md:gap-12 md:mb-16 sm:mb-12">
                <!-- Brand Column -->
                <div class="footer-brand max-w-[33.854vw] md:max-w-full">
                    <!-- Logo -->
                       <div class="site-logo flex items-center gap-5">

                        <img src="<?php echo get_template_directory_uri(); ?>/src/imgs/trac-icon.svg" class="w-[8vw]" alt="Trac Logo">
                     <span class="font-heading text-[3.333vw] text-brand-primary md:text-5xl sm:text-4xl">TrAC</span>
            </div>

                    <!-- Description -->
                    <p class="footer-description font-body text-[1.146vw] leading-[1.636] text-[#1e1e1e] mb-[5.208vw] md:text-lg md:mb-10 sm:text-base sm:mb-8 w-[88%]">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                    </p>

                    <!-- Contact Details -->
                    <div class="footer-contact">
                        <h4 class="font-body !font-normal text-[1.25vw] text-[#111] md:text-xl mb-2">Connect with us</h4>
                        <div class="contact-links flex flex-col gap-[0.521vw] md:gap-2">
                            <div class="under-multi-parent w-fit">
                                <a href="mailto:info@trac.africa" class="font-body text-[1.042vw] leading-[1.5] tracking-[0.03em] text-[#1e1e1e] hover:text-brand-primary transition-colors md:text-base sm:text-sm under-multi">
                                    info@trac.africa
                                </a>
                            </div>
                            <div class="under-multi-parent w-fit">
                                <a href="tel:+250733000190" class="font-body text-[1.042vw] leading-[1.5] tracking-[0.03em] text-[#1e1e1e] hover:text-brand-primary transition-colors md:text-base sm:text-sm under-multi">
                                    +250 733 000 190
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Columns -->
                <div class="footer-nav-columns flex gap-[8vw] md:gap-16 sm:gap-12 sm:flex-wrap">
                    <!-- Company Column -->
                    <div class="footer-column">
                        <h4 class="font-body text-[1.25vw] !font-normal text-[#111] mb-[1vw] md:text-xl md:mb-8 sm:text-lg sm:mb-6">Company</h4>
                        <ul class="footer-links flex flex-col gap-3 md:gap-5 sm:gap-4">
                            <li class="under-multi-parent">
                                <a href="/about-us" class="font-body text-[1.042vw] text-[#1e1e1e] hover:text-brand-primary transition-colors md:text-base sm:text-sm under-multi">About Us</a>
                            </li>
                            <li class="under-multi-parent">
                                <a href="/connecting-communities/" class="font-body text-[1.042vw] text-[#1e1e1e] hover:text-brand-primary transition-colors md:text-base sm:text-sm under-multi">Communities</a>
                            </li>
                            <li class="under-multi-parent">
                                <a href="/partners" class="font-body text-[1.042vw] text-[#1e1e1e] hover:text-brand-primary transition-colors md:text-base sm:text-sm under-multi">Partners</a>
                            </li>
                            <li class="under-multi-parent">
                                <a href="/careers" class="font-body text-[1.042vw] text-[#1e1e1e] hover:text-brand-primary transition-colors md:text-base sm:text-sm under-multi">Careers</a>
                            </li>
                            <li class="under-multi-parent">
                                <a href="/contact-us" class="font-body text-[1.042vw] text-[#1e1e1e] hover:text-brand-primary transition-colors md:text-base sm:text-sm under-multi">Contact Us</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Product Column -->
                    <div class="footer-column">
                        <h4 class="font-body text-[1.25vw] text-[#111] mb-[1vw] md:text-xl md:mb-8 sm:text-lg sm:mb-6 !font-normal">Product</h4>
                        <ul class="footer-links flex flex-col gap-3 md:gap-5 sm:gap-4">
                            <li class="under-multi-parent">
                                <a href="/products/home-internet" class="font-body text-[1.042vw] text-[#1e1e1e] hover:text-brand-primary transition-colors md:text-base sm:text-sm under-multi">Home Internet</a>
                            </li>
                            <li class="under-multi-parent">
                                <a href="/products/sme-internet" class="font-body text-[1.042vw] text-[#1e1e1e] hover:text-brand-primary transition-colors md:text-base sm:text-sm under-multi">SME Internet</a>
                            </li>
                            <li class="under-multi-parent">
                                <a href="/products/enterprise-network" class="font-body text-[1.042vw] text-[#1e1e1e] hover:text-brand-primary transition-colors md:text-base sm:text-sm under-multi">Enterprise Network</a>
                            </li>
                            <li class="under-multi-parent">
                                <a href="/products/carrier-services/" class="font-body text-[1.042vw] text-[#1e1e1e] hover:text-brand-primary transition-colors md:text-base sm:text-sm under-multi">Wholesale & Carrier</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom flex items-center justify-between md:flex-col md:gap-8 sm:gap-6">
                <!-- Copyright -->
                <p class="footer-copyright font-body text-[1.042vw] text-[#1e1e1e] md:text-base sm:text-sm md:order-2">
                    &copy; <?php echo date('Y'); ?> All Rights Reserved
                </p>

                <!-- Social Links -->
                <div class="footer-social flex items-center gap-[1.302vw] md:gap-4 md:order-1">
                    <!-- Facebook -->
                    <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="social-icon w-[3.125vw] h-[3.125vw] flex items-center justify-center rounded-full border border-[#111] md:w-12 md:h-12 sm:w-10 sm:h-10" aria-label="Facebook">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/assets/icons/facebook.svg" alt="Facebook" class="w-[2.083vw] h-[2.083vw] md:w-8 md:h-8 sm:w-6 sm:h-6">
                    </a>

                    <!-- X (Twitter) -->
                    <a href="https://x.com" target="_blank" rel="noopener noreferrer" class="social-icon w-[3.125vw] h-[3.125vw] flex items-center justify-center rounded-full border border-[#111] md:w-12 md:h-12 sm:w-10 sm:h-10" aria-label="X">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/assets/icons/twitter.svg" alt="X" class="w-[2.083vw] h-[2.083vw] md:w-8 md:h-8 sm:w-6 sm:h-6">
                    </a>

                    <!-- Instagram -->
                    <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="social-icon w-[3.125vw] h-[3.125vw] flex items-center justify-center rounded-full border border-[#111] md:w-12 md:h-12 sm:w-10 sm:h-10" aria-label="Instagram">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/assets/icons/instagram.svg" alt="Instagram" class="w-[2.083vw] h-[2.083vw] md:w-8 md:h-8 sm:w-6 sm:h-6">
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="social-icon w-[3.125vw] h-[3.125vw] flex items-center justify-center rounded-full border border-[#111] md:w-12 md:h-12 sm:w-10 sm:h-10" aria-label="LinkedIn">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/assets/icons/linkedin.svg" alt="LinkedIn" class="w-[2.083vw] h-[2.083vw] md:w-8 md:h-8 sm:w-6 sm:h-6">
                    </a>

                    <!-- YouTube -->
                    <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="social-icon w-[3.125vw] h-[3.125vw] flex items-center justify-center rounded-full border border-[#111] md:w-12 md:h-12 sm:w-10 sm:h-10" aria-label="YouTube">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/assets/icons/youtube.svg" alt="YouTube" class="w-[2.083vw] h-[2.083vw] md:w-8 md:h-8 sm:w-6 sm:h-6">
                    </a>
                </div>
            </div>
        </div>
        <!-- <div class="bg-black/40 absolute inset-0 w-screen h-screen footer-overlay pointer-events-none">
        </div> -->
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
