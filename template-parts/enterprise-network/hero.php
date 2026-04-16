<?php
if (!defined('ABSPATH')) {
    exit();
}

// Shared product hero (reused by Enterprise Network, Home Internet, SME Internet, Carrier Services).
// Pass args via `get_template_part('template-parts/enterprise-network/hero', null, [ ... ])`.
$hero_args = isset($args) && is_array($args) ? $args : [];

$section_class =
    $hero_args['section_class'] ??
    'hero relative bg-white overflow-hidden';

$container_class =
    $hero_args['container_class'] ??
    'hero-container px-[5.21vw] py-[12vw] w-screen h-fit flex items-center flex-col gap-[2vw] relative z-[10] md:px-[4vw] md:pt-[120px] sm:px-[6vw] sm:pt-[100px]';

$center_wrap_class =
    $hero_args['center_wrap_class'] ?? 'flex items-center justify-center';

$title_lines = $hero_args['title_lines'] ?? [];
$title_lines = is_array($title_lines) ? $title_lines : [$title_lines];
$title_lines = array_values(array_filter($title_lines, fn($l) => (string) $l !== ''));

// Fallback title if nothing is passed.
if (!count($title_lines)) {
    $title_lines = ['Get on TrAC.'];
}

$subtitle = (string) ($hero_args['subtitle'] ?? '');
$button_text = (string) ($hero_args['button_text'] ?? 'Get Connected');
$button_link = (string) ($hero_args['button_link'] ?? '#get-connected');

$images_wrapper_class =
    $hero_args['images_wrapper_class'] ??
    'enterprise-hero-images w-full mx-auto mt-[2vw] md:mt-10 sm:mt-8 flex items-end justify-center h-full gap-[1.25vw]';

$images = $hero_args['images'] ?? [];
$images = is_array($images) ? $images : [];

// Default image wrappers (matches existing product hero layout).
$default_image_wrap_classes = [
    'rounded-[1.2vw] overflow-hidden h-[18vw] w-[20vw]',
    'rounded-[1.2vw] overflow-hidden h-[15vw] w-[20vw]',
    'rounded-[1.2vw] overflow-hidden h-[18vw] w-[20vw]',
];
?>

<section class="<?php echo esc_attr($section_class); ?>" data-section="hero" data-hero-static>
    <div class="<?php echo esc_attr($container_class); ?>">
        <div class="<?php echo esc_attr($center_wrap_class); ?>">
            <div class="hero-text w-full max-w-[80rem] text-center">
                <div>
                    <h1
                        class="hero-title font-heading text-text-primary tracking-[0.05vw] mb-[1.667vw] md:mb-6 sm:mb-4"
                        data-hero-reveal
                        data-heading-anim
                        data-base-delay="0.05"
                    >
                        <?php foreach ($title_lines as $line): ?>
                            <span class="block hero-title-line">
                                <?php echo esc_html($line); ?>
                            </span>
                        <?php endforeach; ?>
                    </h1>

                    <?php if (trim($subtitle) !== ''): ?>
                        <p
                            class="hero-subtitle font-body font-medium text-text-body mx-auto max-w-[45rem] mb-[3.125vw] md:mb-8 sm:mb-6"
                            data-hero-reveal
                            data-hero-delay="0.08"
                            data-para-anim
                        >
                            <?php echo esc_html($subtitle); ?>
                        </p>
                    <?php endif; ?>

                    <div
                        class="hero-cta flex flex-wrap justify-center gap-[1.042vw] md:gap-4 sm:flex-col sm:gap-3"
                        data-hero-reveal
                        data-hero-delay="0.16"
                    >
                        <a href="<?php echo esc_url(
                            $button_link,
                        ); ?>" class="btn btn-primary group magnetic">
                            <span class="btn-line"></span>
                            <span class="btn-text"><?php echo esc_html(
                                $button_text,
                            ); ?></span>
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

                <?php if (count($images)): ?>
                    <div class="<?php echo esc_attr($images_wrapper_class); ?>">
                        <?php foreach ($images as $idx => $img): ?>
                            <?php
                            $src = isset($img['src']) ? (string) $img['src'] : '';
                            if ($src === '') {
                                continue;
                            }

                            $alt = isset($img['alt']) ? (string) $img['alt'] : '';
                            $wrap_class =
                                isset($img['wrap_class']) && (string) $img['wrap_class'] !== ''
                                    ? (string) $img['wrap_class']
                                    : ($default_image_wrap_classes[$idx] ??
                                        $default_image_wrap_classes[0]);
                            $delay = 0.24 + ($idx * 0.08);
                            ?>

                            <div
                                class="<?php echo esc_attr($wrap_class); ?>"
                                data-hero-reveal
                                data-hero-delay="<?php echo esc_attr(
                                    number_format($delay, 2, '.', ''),
                                ); ?>"
                            >
                                <img
                                    src="<?php echo esc_url($src); ?>"
                                    alt="<?php echo esc_attr($alt); ?>"
                                    class="w-full h-full object-cover"
                                    loading="lazy"
                                >
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
