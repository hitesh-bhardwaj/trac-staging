<?php
if (!defined('ABSPATH')) {
    exit();
}

$enterprise_services = [
    [
        'img'      => get_template_directory_uri() . '/src/imgs/enterprise-network/business.svg',
        'title'    => 'Enterprise Fibre Connectivity',
        'para'     => 'Dedicated, high-performance fibre built for demanding business operations, with resilient infrastructure designed to support critical applications and maintain continuity.',
        'link'     => '#get-connected',
        'btn_text' => 'Get on TrAC',
    ],
    [
        'img'      => get_template_directory_uri() . '/src/imgs/enterprise-network/private-network.svg',
        'title'    => 'VPN',
        'para'     => 'Secure private networks that connect multiple locations, teams, and systems, providing reliable communication and consistent performance across your operations.',
        'link'     => '#get-connected',
        'btn_text' => 'Get on TrAC',
    ],
    [
        'img'      => get_template_directory_uri() . '/src/imgs/enterprise-network/data-centre.svg',
        'title'    => 'Data Centre & Colocation',
        'para'     => 'Enterprise-grade hosting in Rwanda, with controlled access and continuous monitoring to provide a secure, reliable environment for critical infrastructure.',
        'link'     => '#get-connected',
        'btn_text' => 'Get on TrAC',
    ],
    [
        'img'      => get_template_directory_uri() . '/src/imgs/enterprise-network/cloud-infrastructure.svg',
        'title'    => 'Cloud & Virtual Infrastructure',
        'para'     => 'Flexible Cloud environments that support virtual infrastructure, data protection, and scalable operations, adapting as your business needs evolve.',
        'link'     => '#get-connected',
        'btn_text' => 'Get on TrAC',
    ],
];
?>

<section class="enterprise-services py-[7vw] md:py-20 sm:py-16" data-section="enterprise-services">
    <div class="w-full px-[5vw] md:px-[4vw] sm:px-[6vw]">
        <div class="text-left">
            <div class="flex items-center justify-start gap-3 mb-12 md:mb-10" data-animate="fade-up">
                <span class="w-6 h-1 bg-[#E86224]"></span>
                <span class="font-body  text-[#E86224] text-30">Our Services</span>
            </div>

            <h2 data-heading-anim class="font-heading text-66 font-normal leading-[1.24] tracking-[0.01em] text-text-primary mb-[2.083vw] md:text-4xl md:mb-8 sm:text-[1.823vw] sm:mb-6 text-left">
                Built for Organisations That Cannot Afford Downtime.
            </h2>

            <p class="w-[70%] font-body text-24 leading-[1.58] text-text-body space-y-[0.521vw] mb-[2.604vw] md:text-lg md:space-y-2 md:mb-8 sm:text-base sm:space-y-2 sm:mb-6 text-left" data-para-anim data-delay="0.2">
                TrAC designs and deploys enterprise-grade networks that support complex organisations with an infrastructure built to perform under pressure to ensure systems remain stable when it matters most.

            </p>

            <div class="grid grid-cols-2 gap-10 mt-[5vw] md:grid-cols-1 md:gap-8 text-left">
                <?php foreach ($enterprise_services as $index => $card) : ?>
                    <div
                        class="bg-[#389FD8] rounded-[32px] p-10 flex flex-col min-h-[440px] md:min-h-0 md:p-8 text-left"
                        data-animate="fade-up"
                        <?php if ($index > 0) : ?>
                            data-delay="<?php echo esc_attr($index * 0.1); ?>"
                        <?php endif; ?>
                    >
                        <div>
                            <div class="h-[4.5vw] w-[4.5vw] mb-10">
                                <img src="<?php echo esc_url($card['img']); ?>" alt="" class="w-full h-full" loading="lazy">
                            </div>

                            <h3 class="font-heading text-white text-36 md:text-2xl mb-6 font-normal">
                                <?php echo $card['title']; ?>
                            </h3>

                            <p class="font-body text-white leading-[1.7] mb-3 text-[1.15vw]">
                                <?php echo esc_html($card['para']); ?>
                            </p>
                        </div>

                        <div class="mt-auto pt-10">
                            <a href="<?php echo esc_url(
                        get_field('hero_primary_button_link') ?:
                        '#get-connected',
                     ); ?>" class="btn btn-primary group magnetic">
                        <span class="btn-line"></span>
                        <span class="btn-text"><?php echo esc_html(
                            get_field('hero_primary_button_text') ?:
                            'Get on TrAC',
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
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
