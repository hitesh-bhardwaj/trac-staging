<?php
if (!defined('ABSPATH')) {
    exit();
}

$label = get_field('hi_install_label') ?: 'Installation';
$title = get_field('hi_install_title') ?: 'Simple Installation Process';

$steps = [
    [
        'title' => 'Contact Us',
        'desc' => 'Contact us or submit your request',
        'icon' => get_template_directory() . '/src/assets/icons/installation-contact.svg',
    ],
    [
        'title' => 'Fibre Check',
        'desc' => 'We confirm fibre availability in your area',
        'icon' => get_template_directory() . '/src/assets/icons/installation-fibre.svg',
    ],
    [
        'title' => 'Schedule Install',
        'desc' => 'Our team schedules installation',
        'icon' => get_template_directory() . '/src/assets/icons/installation-schedule-new.svg',
    ],
     [
        'title' => 'You’re online',
        'desc' => 'You are on TraC Network',
        'icon' => get_template_directory() . '/src/assets/icons/installation-network.svg',
    ],
    [
        'title' => '24/7 support',
        'desc' => 'End-to-end installation with 24/7 support, because our service doesn’t stop at setup.',
        'icon' => get_template_directory() . '/src/assets/icons/installation-support-new.svg',
    ],
    
];

function trac_render_inline_svg($svg_path, $class = '')
{
    if (!$svg_path || !file_exists($svg_path)) {
        return;
    }

    $svg = file_get_contents($svg_path);

    if (!$svg) {
        return;
    }

    if ($class) {
        $svg = preg_replace(
            '/<svg\b([^>]*)>/i',
            '<svg$1 class="' . esc_attr($class) . '">',
            $svg,
            1
        );
    }

    echo $svg;
}
?>

<section
    class="hi-installation relative h-[300vh] bg-white"
    data-section="hi-installation"
    data-hi-installation
    style="--hi-steps: <?php echo esc_attr(count($steps)); ?>;"
>
        <div class="hi-installation-sticky overflow-hidden">
            <div class="w-full px-[5.21vw] md:px-[4vw] sm:px-[6vw]">
                <div class="mx-auto max-w-[92rem]">
                    <div class="mx-auto max-w-[56rem] text-center">
                        <div
                            class="mb-14 flex items-center justify-center gap-3 md:mb-6"
                            data-animate="fade-up"
                        >
                            <span class="h-1 w-6 bg-brand-primary"></span>
                            <span class="font-body text-base text-[#111]">
                                <?php echo esc_html($label); ?>
                            </span>
                        </div>

                        <h2
                            class="font-heading text-[3.75vw] font-normal leading-[1.12] tracking-[0.01em] text-text-primary md:text-5xl sm:text-4xl"
                            data-animate="fade-up"
                            data-delay="0.1"
                        >
                            <?php echo esc_html($title); ?>
                        </h2>
                    </div>

                    <div class="mt-[5.2vw] hi-installation-track-area md:mt-12">
                        <div class="hi-installation-viewport" data-hi-installation-viewport>
                           <div class="w-[88%] bg-black/20 h-[1px] absolute top-1/2">
                            <div class="bg-brand-primary w-full h-full progress-line">
                            </div>

                           </div>

                            <div class="hi-installation-track" data-hi-installation-track>
                                <?php foreach ($steps as $i => $s): ?>
                                    <article
                                        class="hi-install-card flex flex-col justify-between<?php echo $i === 0 ? ' is-active' : ''; ?>"
                                        data-hi-installation-step
                                        data-step-index="<?php echo esc_attr($i); ?>"
                                    >
                                    <div class="w-full flex justify-end">
                                        <div class="hi-install-card__icon">
                                            <?php trac_render_inline_svg(
                                                $s['icon'],
                                                'hi-install-card__icon-svg'
                                            ); ?>
                                        </div>
                                </div>

                                        <div>
                                            <h3 class="hi-install-card__title font-heading text-[1.85vw] font-normal">
                                                <?php echo esc_html($s['title']); ?>
                                            </h3>
                                            <p class="hi-install-card__desc">
                                                <?php echo esc_html($s['desc']); ?>
                                            </p>
                                        </div>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>