<?php
/**
 * Theme Footer
 *
 * @package Trac
 */
$trac_footer_logo = get_field('footer_logo_image', 'option');
$trac_footer_logo_mobile = get_field('footer_logo_image_mobile', 'option');
$trac_footer_brand_text = get_field('footer_brand_text', 'option');
$trac_footer_contact_heading = get_field('footer_contact_heading', 'option');
$trac_footer_email = get_field('footer_email', 'option');
$trac_footer_phone = get_field('footer_phone', 'option');
$trac_footer_company_heading = get_field('footer_company_heading', 'option');
$trac_footer_solutions_heading = get_field(
    'footer_solutions_heading',
    'option',
);
$trac_footer_copyright_text = get_field('footer_copyright_text', 'option');

$trac_footer_company_links = [];
for ($i = 1; $i <= 4; $i++) {
    $trac_footer_company_links[] = [
        'label' => get_field("footer_company_{$i}_label", 'option'),
        'link' => get_field("footer_company_{$i}_link", 'option'),
    ];
}

$trac_footer_solutions_links = [];
for ($i = 1; $i <= 4; $i++) {
    $trac_footer_solutions_links[] = [
        'label' => get_field("footer_solutions_{$i}_label", 'option'),
        'link' => trac_normalize_solution_url(
            get_field("footer_solutions_{$i}_link", 'option'),
        ),
    ];
}

$trac_footer_social = [
    'facebook' => [
        'url' => get_field('footer_social_facebook', 'option'),
        'icon' => get_field('footer_social_facebook_icon', 'option'),
        'label' => 'Facebook',
    ],
    'twitter' => [
        'url' => get_field('footer_social_twitter', 'option'),
        'icon' => get_field('footer_social_twitter_icon', 'option'),
        'label' => 'X',
    ],
    'instagram' => [
        'url' => get_field('footer_social_instagram', 'option'),
        'icon' => get_field('footer_social_instagram_icon', 'option'),
        'label' => 'Instagram',
    ],
    'linkedin' => [
        'url' => get_field('footer_social_linkedin', 'option'),
        'icon' => get_field('footer_social_linkedin_icon', 'option'),
        'label' => 'LinkedIn',
    ],
];
?>

    <footer id="site-footer" class="site-footer relative " data-parallax-footer>
        <div class="footer-container w-full px-[5vw] pt-[3.6vw] pb-[1.6vw] md:px-[4vw] md:pt-20 md:pb-16 sm:px-[6vw] sm:pt-16 sm:pb-12" data-footer-clippath>
            <!-- Footer Top -->
            <div class="footer-top grid grid-cols-[1fr_auto_auto]  mb-[3.2vw] md:grid-cols-1 md:gap-12 sm:gap-8 md:mb-16 sm:mb-12">
                <!-- Brand Column -->
                <div class="footer-brand max-w-[33.854vw] md:max-w-full ">
                    <!-- Logo -->
                       <div class="site-logo flex flex-col md:flex-row  gap-3 md:mb-8 md:gap-6">

                        <?php if ($trac_footer_logo): ?>
                            <img src="<?php echo esc_url(
                                $trac_footer_logo,
                            ); ?>" class="w-[8vw] md:w-[25vw] sm:w-[30vw]" alt="<?php bloginfo(
                                'name',
                            ); ?>">
                        <?php endif; ?>
                        <!-- <?php if ($trac_footer_logo_mobile): ?>
                            <img src="<?php echo esc_url(
                                $trac_footer_logo_mobile,
                            ); ?>" class="hidden md:block md:w-[35vw] sm:w-[50vw] sm:h-auto" alt="<?php bloginfo(
                                'name',
                            ); ?>">
                        <?php endif; ?> -->
                        <span class=" h-[1px] w-[5.4vw] ml-[1vw] bg-brand-navy md:hidden"></span>
                     <span class="font-heading text-[3.65vw] text-brand-navy md:text-[6vw] sm:text-[10vw] "><?php echo trac_esc_html(
                         $trac_footer_brand_text,
                     ); ?></span>
            </div>



                    <!-- Contact Details -->
                    <div class="footer-contact md:hidden">
                        <h4 class="font-body !font-normal text-24 text-text-primary md:text-[3vw] sm:text-[5vw] mb-2"><?php echo trac_esc_html(
                            $trac_footer_contact_heading,
                        ); ?></h4>
                        <div class="contact-links flex flex-col gap-[0.521vw] md:gap-2">
                            <?php if ($trac_footer_email): ?>
                                <div class="under-multi-parent w-fit">
                                    <a href="mailto:<?php echo esc_attr(
                                        $trac_footer_email,
                                    ); ?>" class="font-body text-[1.15vw]  md:text-[2.5vw] sm:text-[4vw] leading-[1.5] tracking-[0.03em] text-text-body hover:text-brand-quaternary transition-colors duration-300  under-multi">
                                        <?php echo trac_esc_html(
                                            $trac_footer_email,
                                        ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if ($trac_footer_phone): ?>
                                <div class="under-multi-parent w-fit">
                                    <a href="tel:<?php echo esc_attr(
                                        preg_replace(
                                            '/[^0-9+]/',
                                            '',
                                            $trac_footer_phone,
                                        ),
                                    ); ?>" class="font-body text-[1.15vw]  md:text-[2.5vw] sm:text-[4vw] leading-[1.5] tracking-[0.03em] text-text-body hover:text-brand-quaternary transition-colors duration-300  under-multi">
                                        <?php echo trac_esc_html(
                                            $trac_footer_phone,
                                        ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Navigation Columns -->
                <div class="footer-nav-columns flex gap-[8vw] sm:gap-16 md:gap-[20vw]  sm:flex-wrap">
                    <!-- Company Column -->
                    <div class="footer-column">
                        <h4 class="font-body text-24 !font-normal text-text-primary mb-[1vw] md:text-[3vw] md:mb-8 sm:text-[5vw] sm:mb-3"><?php echo trac_esc_html(
                            $trac_footer_company_heading,
                        ); ?></h4>
                        <ul class="footer-links flex flex-col gap-3">
                            <?php foreach ($trac_footer_company_links as $link): ?>
                                <li class="under-multi-parent">
                                    <a href="<?php echo esc_url(
                                        $link['link'],
                                    ); ?>" class="font-body text-[1.15vw]  md:text-[2.5vw] sm:text-[4vw] text-text-body hover:text-brand-quaternary transition-colors duration-300  under-multi"><?php echo trac_esc_html(
    $link['label'],
); ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Product Column -->
                    <div class="footer-column">
                        <h4 class="font-body text-24 text-text-primary mb-[1vw] md:text-[3vw] md:mb-8 sm:text-[5vw] sm:mb-3 !font-normal"><?php echo trac_esc_html(
                            $trac_footer_solutions_heading,
                        ); ?></h4>
                        <ul class="footer-links flex flex-col gap-3">
                            <?php foreach ($trac_footer_solutions_links as $link): ?>
                                <li class="under-multi-parent">
                                    <a href="<?php echo esc_url(
                                        $link['link'],
                                    ); ?>" class="font-body text-[1.15vw]  md:text-[2.5vw] sm:text-[4vw] text-text-body hover:text-brand-quaternary transition-colors duration-300  under-multi"><?php echo trac_esc_html(
    $link['label'],
); ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- Contact Details (Mobile) -->
                <div class="footer-contact hidden md:block">
                    <h4 class="font-body !font-normal text-24 text-text-primary md:text-[3vw] sm:text-[5vw] mb-2"><?php echo trac_esc_html(
                        $trac_footer_contact_heading,
                    ); ?></h4>
                    <div class="contact-links flex flex-col gap-[0.521vw] md:gap-2">
                        <?php if ($trac_footer_email): ?>
                            <div class="under-multi-parent w-fit">
                                <a href="mailto:<?php echo esc_attr(
                                    $trac_footer_email,
                                ); ?>" class="font-body text-[1vw] md:text-[2.5vw] sm:text-[4vw] leading-[1.5] tracking-[0.03em] text-text-body hover:text-brand-quaternary transition-colors duration-300  under-multi">
                                    <?php echo trac_esc_html($trac_footer_email); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if ($trac_footer_phone): ?>
                            <div class="under-multi-parent w-fit">
                                <a href="tel:<?php echo esc_attr(
                                    preg_replace(
                                        '/[^0-9+]/',
                                        '',
                                        $trac_footer_phone,
                                    ),
                                ); ?>" class="font-body text-[1vw] md:text-[2.5vw] sm:text-[4vw] leading-[1.5] tracking-[0.03em] text-text-body hover:text-brand-quaternary transition-colors duration-300  under-multi">
                                    <?php echo trac_esc_html($trac_footer_phone); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom flex items-center justify-between md:flex-col md:gap-8 sm:gap-6 md:items-start">
                <!-- Copyright -->
                <p class="footer-copyright font-body text-[1.15vw]  md:text-[2.5vw] sm:text-[4vw] text-text-body  md:order-2">
                    <?php echo trac_esc_html($trac_footer_copyright_text); ?>
                </p>

                <!-- Social Links -->
                <div class="footer-social flex items-center gap-[1.302vw] md:gap-4 md:order-1">
                    <?php foreach ($trac_footer_social as $social): ?>
                        <?php if ($social['url']): ?>
                            <a href="<?php echo esc_url(
                                $social['url'],
                            ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon w-[3.4vw] h-[3.4vw] flex items-center justify-center rounded-full border border-text-primary md:w-12 md:h-12 sm:w-10 sm:h-10" aria-label="<?php echo esc_attr(
                                $social['label'],
                            ); ?>">
                                <img src="<?php echo esc_url(
                                    $social['icon'],
                                ); ?>" alt="<?php echo esc_attr(
                                    $social['label'],
                                ); ?>" class="w-[2.15vw] h-[2.15vw] md:w-8 md:h-8 sm:w-6 sm:h-6">
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
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
