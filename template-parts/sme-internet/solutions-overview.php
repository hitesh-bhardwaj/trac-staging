<?php
if (!defined('ABSPATH')) {
    exit();
}

$label = get_field('sme_solutions_label') ?: 'Solutions Overview';
$title =
    get_field('sme_solutions_title') ?: 'Solutions to Support Your Growth';
$button_text =
    get_field('sme_solutions_button_text') ?: 'Request a Consultation';
$button_link =
    get_field('sme_solutions_button_link') ?: '#get-connected';

$solutions_icon_base = get_template_directory_uri() . '/src/imgs/sme-internet/';

$solutions = [
    [
        'title' => 'Secure Connectivity',
        'description' =>
            'Connect offices, sites, and teams through a dedicated VPN designed for secure, reliable communication.',
        'icon' => $solutions_icon_base . 'security-icon.svg',
    ],
    [
        'title' => 'Reliable Infrastructure',
        'description' =>
            'Host applications, systems, and data within our Tier III Data Centre, built for performance, resilience, and business continuity.',
        'icon' => $solutions_icon_base . 'reliable-icon.svg',
    ],
    [
        'title' => 'Flexible Cloud Solutions',
        'description' =>
            'Deploy, manage, and scale digital services through secure cloud environments designed to grow with your business.',
        'icon' => $solutions_icon_base . 'cloud-icon.svg',
    ],
];
?>

<section class="sme-solutions relative overflow-hidden bg-[color:var(--color-brand-primary)] py-[7vw] md:py-20 sm:py-16" data-section="sme-solutions">
    <div class="relative z-[1] w-full px-[9vw] md:px-[4vw] sm:px-[6vw]">
        <div class="max-w-[92rem] mx-auto">
            <div class="flex items-center justify-start gap-3 mb-10 md:mb-5" data-animate="fade-up">
                <span class="w-6 h-1 bg-white"></span>
                <span class="font-body text-white/90 text-24"><?php echo esc_html(
                    $label,
                ); ?></span>
            </div>

            <h2 class="font-heading text-[3.75vw] font-normal leading-[1.12] tracking-[0.01em] text-white mb-[5vw] md:text-5xl md:mb-10 sm:text-4xl text-left" data-heading-anim>
                <?php echo esc_html($title); ?>
            </h2>

            <div class="grid grid-cols-3 gap-[1.8vw] md:grid-cols-1 md:gap-6 items-stretch">
                <?php foreach ($solutions as $i => $s): ?>
                    <div class="card bg-white rounded-[1.4vw] md:rounded-3xl p-[2vw] py-[5vw] md:p-8 sm:p-7 flex flex-col items-start gap-[1.6vw] md:gap-6" data-animate="fade-up" data-delay="<?php echo esc_attr(
                        0.08 * $i,
                    ); ?>">
                        <img
                            src="<?php echo esc_url($s['icon']); ?>"
                            alt=""
                            class="size-[4vw] mb-[3.5vw] md:w-10 md:h-10 object-contain"
                            loading="lazy"
                        >
                        <div>
                            <h3 class="font-heading text-text-primary text-[1.6vw] md:text-2xl font-normal mb-[0.8vw] md:mb-3">
                                <?php echo esc_html($s['title']); ?>
                            </h3>
                            <p class="font-body text-text-body text-[1.2vw] md:text-base leading-[1.55]">
                                <?php echo esc_html($s['description']); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="flex justify-center mt-[3.6vw] md:mt-12" data-animate="fade-up" data-delay="0.2">
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
    </div>

</section>
