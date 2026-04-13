<?php
if (!defined('ABSPATH')) {
    exit();
}

$label = get_field('hi_packages_label') ?: 'Our Packages';
$title = get_field('hi_packages_title') ?: 'Home Internet Packages';

$plans = [
    [
        'name' => 'Home Plus',
        'badge' => 'Unlimited · Up to 75 Mbps',
        'desc' => 'Ideal for families, remote work, online learning, and HD streaming.',
        'price' => 'RWF 55,000',
        'period' => '/ month',
        'link' => get_field('hi_packages_plan_1_link') ?: '#get-connected',
    ],
    [
        'name' => 'Home Max',
        'badge' => 'Unlimited · Up to 100 Mbps',
        'desc' =>
            'Perfect for smart homes, heavy streaming, and professionals working from home.',
        'price' => 'RWF 85,000',
        'period' => '/ month',
        'link' => get_field('hi_packages_plan_2_link') ?: '#get-connected',
    ],
];
?>

<section class="home-internet-packages relative bg-white py-[7vw] md:py-20 sm:py-16" data-section="home-internet-packages">
    <div class="w-full px-[5.21vw] md:px-[4vw] sm:px-[6vw]">
        <div class="max-w-[92rem] mx-auto">
            <div class="text-center max-w-[56rem] mx-auto">
                <div class="flex items-center justify-center gap-3 mb-14 md:mb-6" data-animate="fade-up">
                    <span class="w-6 h-1 bg-brand-primary"></span>
                    <span class="font-body text-base text-[#111]"><?php echo esc_html(
                        $label,
                    ); ?></span>
                </div>

                <h2 class="font-heading text-[3.75vw] font-normal leading-[1.12] tracking-[0.01em] text-text-primary mb-[4.2vw] md:text-5xl md:mb-10 sm:text-4xl" data-animate="fade-up" data-delay="0.1">
                    <?php echo esc_html($title); ?>
                </h2>
            </div>

            <div class="grid grid-cols-2 gap-[2.6vw] md:grid-cols-1 md:gap-8 max-w-[70rem] mx-auto">
                <?php foreach ($plans as $i => $p): ?>
                    <article class="relative border border-brand-primary rounded-[2vw] md:rounded-3xl p-[2.6vw] md:p-10 sm:p-7 bg-white min-h-[34vw] md:min-h-0 flex flex-col" data-animate="fade-up" data-delay="<?php echo esc_attr(
                        0.12 * $i,
                    ); ?>">
                        <div class="flex items-start justify-between gap-6">
                            <h3 class="font-body text-brand-primary text-[1.85vw] md:text-2xl sm:text-xl font-medium">
                                <?php echo esc_html($p['name']); ?>
                            </h3>
                        </div>

                        <div class="mt-3 mb-6">
                            <span class="inline-flex items-center rounded-full bg-brand-primary/10 text-brand-primary px-4 py-2 font-body text-[0.75vw] md:text-sm sm:text-xs">
                                <?php echo esc_html($p['badge']); ?>
                            </span>
                        </div>

                        <div class="h-px w-full bg-brand-primary/15 mb-7"></div>

                        <p class="font-body text-text-body text-body-lg md:text-base sm:text-sm leading-[1.6] max-w-[28rem] mb-10">
                            <?php echo esc_html($p['desc']); ?>
                        </p>
                        <div class="flex flex-col gap-1 mb-10">
                                <span class="font-heading text-brand-primary text-[2.604vw] md:text-4xl sm:text-3xl leading-[1]">
                                    <?php echo esc_html($p['price']); ?>
                                </span>
                                <span class="font-body text-text-body text-sm md:text-sm sm:text-xs pb-1">
                                    <?php echo esc_html($p['period']); ?>
                                </span>
                            </div>

                        <div class="mt-auto">
                            

                            <a href="<?php echo esc_url(
                                $p['link'],
                            ); ?>" class="btn btn-primary group magnetic inline-flex">
                                <span class="btn-line"></span>
                                <span class="btn-text">Get Connected</span>
                                <span class="btn-icon" aria-hidden="true">
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
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

