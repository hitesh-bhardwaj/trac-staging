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
        'icon' => 'phone',
    ],
    [
        'title' => 'Fibre Check',
        'desc' => 'We confirm fibre availability in your area',
        'icon' => 'signal',
    ],
    [
        'title' => 'Schedule Install',
        'desc' => 'Our team schedules installation at your convenience',
        'icon' => 'calendar',
    ],
    [
        'title' => 'Set Up Router',
        'desc' => 'We configure your router and optimize coverage',
        'icon' => 'router',
    ],
    [
        'title' => 'Go Live',
        'desc' => 'You are online with support ready when needed',
        'icon' => 'check',
    ],
];

// Inline icons (simple, lightweight).
function trac_hi_install_icon($name)
{
    $stroke = '#9CA3AF';

    if ($name === 'phone') { ?>
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
            <path d="M8.9 3.2 7.4 2.6C6.8 2.4 6.2 2.6 5.8 3.1L4.3 5.1c-.4.5-.4 1.2 0 1.7l2.3 2.9c.3.4.4.9.2 1.3-.5 1.1-1 2.1-1.6 3.1-.2.4-.2.9.1 1.2l3.5 3.6c.4.4 1 .4 1.5.1l2-1.5c.5-.4.7-1 .5-1.6l-.6-1.5" stroke="<?php echo esc_attr(
                $stroke,
            ); ?>" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M13.5 6.5c1.8.4 3.3 1.9 3.7 3.7" stroke="<?php echo esc_attr(
                $stroke,
            ); ?>" stroke-width="1.6" stroke-linecap="round"/>
            <path d="M13.2 3.6c3.4.6 6.1 3.3 6.7 6.7" stroke="<?php echo esc_attr(
                $stroke,
            ); ?>" stroke-width="1.6" stroke-linecap="round"/>
        </svg>
    <?php } elseif ($name === 'signal') { ?>
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
            <path d="M4 20v-2" stroke="<?php echo esc_attr(
                $stroke,
            ); ?>" stroke-width="1.6" stroke-linecap="round"/>
            <path d="M8 20v-5" stroke="<?php echo esc_attr(
                $stroke,
            ); ?>" stroke-width="1.6" stroke-linecap="round"/>
            <path d="M12 20v-8" stroke="<?php echo esc_attr(
                $stroke,
            ); ?>" stroke-width="1.6" stroke-linecap="round"/>
            <path d="M16 20v-11" stroke="<?php echo esc_attr(
                $stroke,
            ); ?>" stroke-width="1.6" stroke-linecap="round"/>
            <path d="M20 20V6" stroke="<?php echo esc_attr(
                $stroke,
            ); ?>" stroke-width="1.6" stroke-linecap="round"/>
        </svg>
    <?php } elseif ($name === 'calendar') { ?>
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
            <path d="M7 3v3M17 3v3" stroke="<?php echo esc_attr(
                $stroke,
            ); ?>" stroke-width="1.6" stroke-linecap="round"/>
            <path d="M4.5 7.5h15" stroke="<?php echo esc_attr(
                $stroke,
            ); ?>" stroke-width="1.6" stroke-linecap="round"/>
            <path d="M6.5 5.5h11c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2h-11c-1.1 0-2-.9-2-2v-12c0-1.1.9-2 2-2Z" stroke="<?php echo esc_attr(
                $stroke,
            ); ?>" stroke-width="1.6" stroke-linejoin="round"/>
        </svg>
    <?php } elseif ($name === 'router') { ?>
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
            <path d="M4 14h16" stroke="<?php echo esc_attr(
                $stroke,
            ); ?>" stroke-width="1.6" stroke-linecap="round"/>
            <path d="M6.5 14v4.5h11V14" stroke="<?php echo esc_attr(
                $stroke,
            ); ?>" stroke-width="1.6" stroke-linejoin="round"/>
            <path d="M9 11.5c.7-1.1 1.9-1.8 3-1.8s2.3.7 3 1.8" stroke="<?php echo esc_attr(
                $stroke,
            ); ?>" stroke-width="1.6" stroke-linecap="round"/>
            <circle cx="8.5" cy="16.3" r="0.9" fill="<?php echo esc_attr(
                $stroke,
            ); ?>"/>
            <circle cx="12" cy="16.3" r="0.9" fill="<?php echo esc_attr(
                $stroke,
            ); ?>"/>
        </svg>
    <?php } else { ?>
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
            <path d="M6 12.5 10 16.5 18 8.5" stroke="<?php echo esc_attr(
                $stroke,
            ); ?>" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    <?php }
}
?>

<section class="hi-installation relative bg-white overflow-hidden" data-section="hi-installation" data-hi-installation style="--hi-steps: <?php echo esc_attr(
    count($steps),
); ?>;">
    <div class="hi-installation-scroll">
        <div class="hi-installation-sticky">
            <div class="w-full px-[5.21vw] md:px-[4vw] sm:px-[6vw]">
                <div class="max-w-[92rem] mx-auto">
                    <div class="text-center max-w-[56rem] mx-auto">
                        <div class="flex items-center justify-center gap-3 mb-8 md:mb-6" data-animate="fade-up">
                            <span class="w-6 h-1 bg-brand-primary"></span>
                            <span class="font-body text-base text-[#111]"><?php echo esc_html(
                                $label,
                            ); ?></span>
                        </div>

                        <h2 class="font-heading text-[3.75vw] font-normal leading-[1.12] tracking-[0.01em] text-text-primary md:text-5xl sm:text-4xl" data-animate="fade-up" data-delay="0.1">
                            <?php echo esc_html($title); ?>
                        </h2>
                    </div>

                    <div class="hi-installation-track-area mt-[5.2vw] md:mt-12">
                        <div class="hi-installation-viewport" data-hi-installation-viewport>
                            <div class="hi-installation-line" aria-hidden="true">
                                <div class="hi-installation-line-base"></div>
                                <div class="hi-installation-line-progress" data-hi-installation-progress></div>
                            </div>

                            <div class="hi-installation-track" data-hi-installation-track>
                                <?php foreach ($steps as $i => $s): ?>
                                    <article class="hi-install-card<?php echo $i === 0
                                        ? ' is-active'
                                        : ''; ?>" data-hi-installation-step data-step-index="<?php echo esc_attr(
    $i,
); ?>">
                                        <div class="hi-install-card__icon">
                                            <?php trac_hi_install_icon(
                                                $s['icon'],
                                            ); ?>
                                        </div>

                                        <h3 class="hi-install-card__title"><?php echo esc_html(
                                            $s['title'],
                                        ); ?></h3>
                                        <p class="hi-install-card__desc"><?php echo esc_html(
                                            $s['desc'],
                                        ); ?></p>
                                    </article>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

