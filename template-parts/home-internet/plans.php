<?php
if (!defined('ABSPATH')) {
    exit();
}

$label = get_field('hi_plans_label') ?: 'Plans & Pricing';
$title = get_field('hi_plans_title') ?: 'Home Internet Packages';

$plans = [
    [
        'name' => 'Home Plus',
        'speed' => '75Mbps',
        'price' => 'RWF 55,000',
        'period' => '/month',
        'description' =>
            'Ideal for families, online learning, and HD streaming.',
        'image' =>
            get_template_directory_uri() . '/src/imgs/home-internet/plan-1.png',
    ],
    [
        'name' => 'Home Max',
        'speed' => '100Mbps',
        'price' => 'RWF 85,000',
        'period' => '/month',
        'description' =>
            'Perfect for smart homes, heavy streaming, and professionals working from home.',
        'image' =>
            get_template_directory_uri() . '/src/imgs/home-internet/plan-2.png',
    ],
];
?>

<section class="home-internet-plans relative bg-white py-[7vw] md:py-20 sm:py-16 overflow-hidden" data-section="home-internet-plans">
    <div class="w-full px-[9vw] md:px-[4vw] sm:px-[6vw]">
        <div class="max-w-[92rem] mx-auto">
            <div class="flex items-center justify-start gap-3 mb-10 md:mb-5" data-animate="fade-up">
                <span class="w-6 h-1 bg-brand-secondary"></span>
                <span class="font-body text-brand-secondary text-30"><?php echo esc_html(
                    $label,
                ); ?></span>
            </div>

            <h2 class="font-heading text-66 font-normal leading-[1.12] tracking-[0.01em] text-text-primary mb-[5vw] md:text-5xl md:mb-10 sm:text-4xl text-left" data-heading-anim>
                <?php echo esc_html($title); ?>
            </h2>

            <div class="grid grid-cols-2 gap-[7vw] md:grid-cols-1 md:gap-8  w-full items-stretch">
                <?php foreach ($plans as $i => $p): ?>
                    <article class="rounded-[1.6vw] md:rounded-3xl overflow-hidden border border-brand-quaternary flex flex-col" data-animate="fade-up" data-delay="<?php echo esc_attr(
                        0.1 * $i,
                    ); ?>">
                        <div class="relative h-[16vw] md:h-64 sm:h-56 w-full overflow-hidden bg-brand-quaternary ">
                            <img
                                src="<?php echo esc_url($p['image']); ?>"
                                alt="<?php echo esc_attr($p['name']); ?>"
                                class="h-full w-full object-cover rounded-[1.2vw] md:rounded-3xl"
                                loading="lazy"
                            >
                            <span class="absolute left-[1.4vw] top-[1.4vw] md:left-5 md:bottom-5 inline-flex items-center rounded-full bg-white/60 border border-brand-quaternary backdrop-blur-lg px-[1.2vw] py-[0.3vw] md:px-5 md:py-2 font-heading text-30 md:text-sm text-brand-quaternary">
                                Unlimited - <span class="font-bold ml-1"><?php echo esc_html(
                                    $p['speed'],
                                ); ?></span>
                            </span>
                        </div>

                        <div class="flex-1 flex flex-col bg-brand-quaternary p-[2vw] py-[3vw] md:p-8 sm:p-6">
                            <h3 class="font-heading text-white text-36 md:text-3xl font-normal mb-[1vw] md:mb-3">
                                <?php echo esc_html($p['name']); ?>
                            </h3>
                            <p class="font-body text-white text-24 md:text-base leading-[1.5] mb-[2vw] md:mb-6 w-[70%]">
                                <?php echo esc_html($p['description']); ?>
                            </p>

                            <div class="mt-auto">
                                <div class="mb-[1.6vw] md:mb-6">
                                    <span class="font-heading font-medium text-white text-36 md:text-3xl">
                                        <?php echo esc_html($p['price']); ?>
                                    </span>
                                    <span class="font-body text-white/70 text-[1vw] md:text-sm">
                                        <?php echo esc_html($p['period']); ?>
                                    </span>
                                </div>

                                <a href="<?php echo esc_url(
                                    get_field('hi_plans_button_link') ?:
                                    '#get-connected',
                                ); ?>" class="btn btn-primary group magnetic">
                                    <span class="btn-line"></span>
                                    <span class="btn-text"><?php echo esc_html(
                                        get_field('hi_plans_button_text') ?:
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
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
