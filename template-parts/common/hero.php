<?php
if (!defined('ABSPATH')) {
    exit();
}

$args = isset($args) && is_array($args) ? $args : [];

$section_classes = isset($args['section_classes'])
    ? (string) $args['section_classes']
    : (isset($args['section_class']) ? (string) $args['section_class'] : '');
$section_classes = $section_classes !== ''
    ? $section_classes
    : 'hero relative min-h-screen bg-brand-primary! overflow-hidden';
$container_classes = isset($args['container_classes'])
    ? (string) $args['container_classes']
    : (isset($args['container_class']) ? (string) $args['container_class'] : '');
$container_classes = $container_classes !== ''
    ? $container_classes
    : 'hero-container w-full px-[5vw]  pb-[5.21vw] relative z-[10] md:px-[4vw] md:pt-[120px] sm:px-[8vw] sm:pt-[100px]';
$grid_classes = isset($args['grid_classes'])
    ? (string) $args['grid_classes']
    : 'hero-grid flex items-start justify-between gap-[5vw] md:flex-col md:gap-8';
$text_classes = isset($args['text_classes'])
    ? (string) $args['text_classes']
    : 'hero-text w-[60%] md:w-full md:max-w-full relative z-[10]';
$media_classes = isset($args['media_classes'])
    ? (string) $args['media_classes']
    : 'hero-media w-[55%] md:w-full';

$title = $args['title'] ?? ($args['title_lines'] ?? '');
$title_lines = is_array($title) ? $title : [(string) $title];
$title_tag = isset($args['title_tag']) ? (string) $args['title_tag'] : 'h1';

$title_classes = isset($args['title_classes'])
    ? (string) $args['title_classes']
    : 'hero-title text-[4vw] font-heading text-white tracking-[0.05vw] mb-6 md:mb-6 sm:mb-4 md:text-center';
$subtitle_1 = isset($args['subtitle_1']) ? (string) $args['subtitle_1'] : '';
$subtitle_1_classes = isset($args['subtitle_1_classes'])
    ? (string) $args['subtitle_1_classes']
    : 'hero-subtitle-1 font-heading pr-0.2 text-36 font-normal leading-[1.35] text-white mb-[1vw] md:text-[28px] sm:text-[20px]';
$subtitle = $args['subtitle'] ?? '';
$subtitle_paragraphs = is_array($subtitle)
    ? array_values(array_filter(array_map('strval', $subtitle), static fn($paragraph) => $paragraph !== ''))
    : ($subtitle !== '' ? [(string) $subtitle] : []);
$subtitle_classes = isset($args['subtitle_classes'])
    ? (string) $args['subtitle_classes']
    : 'hero-subtitle font-body font-medium w-[80%] text-white mb-[3.125vw] md:w-full md:max-w-full md:mb-8 sm:mb-6 md:text-center';

$primary = isset($args['primary']) && is_array($args['primary'])
    ? $args['primary']
    : [];
$secondary = isset($args['secondary']) && is_array($args['secondary'])
    ? $args['secondary']
    : [];

$primary_text = isset($primary['text']) ? (string) $primary['text'] : '';
$primary_link = isset($primary['link']) ? (string) $primary['link'] : '';

$secondary_text = isset($secondary['text']) ? (string) $secondary['text'] : '';
$secondary_link = isset($secondary['link']) ? (string) $secondary['link'] : '';

$legacy_button_text = isset($args['button_text']) ? (string) $args['button_text'] : '';
$legacy_button_link = isset($args['button_link']) ? (string) $args['button_link'] : '';
if ($primary_text === '' && $legacy_button_text !== '') {
    $primary_text = $legacy_button_text;
}
if ($primary_link === '' && $legacy_button_link !== '') {
    $primary_link = $legacy_button_link;
}

$media = isset($args['media']) && is_array($args['media']) ? $args['media'] : [];
$media_src = isset($media['src']) ? (string) $media['src'] : '';
$media_alt = isset($media['alt']) ? (string) $media['alt'] : '';

$after_section = $args['after_section'] ?? '';
$text_footer = isset($args['text_footer']) ? (string) $args['text_footer'] : '';
$right_content = isset($args['right_content'])
    ? (string) $args['right_content']
    : '';

$cta_wrapper_classes = isset($args['cta_wrapper_classes'])
    ? (string) $args['cta_wrapper_classes']
    : 'hero-cta flex flex-wrap gap-[1.042vw] md:gap-4 sm:flex-col sm:gap-3 md:items-center';

$center_wrap_classes = isset($args['center_wrap_classes'])
    ? (string) $args['center_wrap_classes']
    : (isset($args['center_wrap_class']) ? (string) $args['center_wrap_class'] : '');
$images_wrapper_classes = isset($args['images_wrapper_classes'])
    ? (string) $args['images_wrapper_classes']
    : (isset($args['images_wrapper_class']) ? (string) $args['images_wrapper_class'] : '');
$images = isset($args['images']) && is_array($args['images']) ? $args['images'] : [];
?>

<?php if (!empty($images)): ?>
    <section class="<?php echo esc_attr($section_classes); ?>" data-section="hero" data-hero-static>
        <div class="<?php echo esc_attr($container_classes); ?>">
            <?php if ($center_wrap_classes !== ''): ?>
                <div class="<?php echo esc_attr($center_wrap_classes); ?>">
            <?php endif; ?>

            <<?php echo tag_escape($title_tag); ?>
                class="<?php echo esc_attr($title_classes); ?>"
                data-hero-reveal
                data-heading-anim
                data-base-delay="0.05"
            >
                <?php foreach ($title_lines as $line): ?>
                    <?php if ($line === ''): ?>
                        <?php continue; ?>
                    <?php endif; ?>
                    <span class="block hero-title-line"><?php echo esc_html(
                        $line,
                    ); ?></span>
                <?php endforeach; ?>
            </<?php echo tag_escape($title_tag); ?>>

            <?php if ($subtitle_1 !== ''): ?>
                <p
                    class="<?php echo esc_attr($subtitle_1_classes); ?>"
                    data-hero-reveal
                    data-hero-delay="0.14"
                    data-para-anim
                >
                    <?php echo esc_html($subtitle_1); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($subtitle_paragraphs)): ?>
                <div class="<?php echo esc_attr($subtitle_classes); ?> space-y-[0.7vw]">
                    <?php foreach ($subtitle_paragraphs as $paragraph): ?>
                        <p
                            data-hero-reveal
                            data-hero-delay="0.14"
                            data-para-anim
                        >
                            <?php echo wp_kses_post($paragraph); ?>
                        </p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ($primary_text !== '' && $primary_link !== ''): ?>
                <div
                    class="<?php echo esc_attr($cta_wrapper_classes); ?>"
                    data-hero-reveal
                    data-hero-delay="0.22"
                >
                    <a href="<?php echo esc_url(
                        $primary_link,
                    ); ?>" class="btn btn-primary group magnetic">
                        <span class="btn-line"></span>
                        <span class="btn-text"><?php echo esc_html(
                            $primary_text,
                        ); ?></span>
                        <span class="btn-icon">
                            <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.45369 8.66578C9.45369 8.86726 9.37668 9.06894 9.22286 9.22276L1.34483 17.1008C1.03699 17.4086 0.538513 17.4086 0.230876 17.1008C-0.0767616 16.793 -0.0769585 16.2945 0.230875 15.9868L7.55193 8.66578L0.230875 1.34473C-0.0769592 1.03689 -0.0769592 0.538408 0.230875 0.230772C0.538709 -0.0768662 1.03719 -0.0770627 1.34483 0.230772L9.22286 8.1088C9.37668 8.26262 9.45369 8.4643 9.45369 8.66578Z" fill="currentColor"/>
                                <path d="M16.4537 8.66578C16.4537 8.86726 16.3767 9.06894 16.2229 9.22276L8.34483 17.1008C8.03699 17.4086 7.53851 17.4086 7.23088 17.1008C6.92324 16.793 6.92304 16.2945 7.23088 15.9868L14.5519 8.66578L7.23087 1.34473C6.92304 1.03689 6.92304 0.538408 7.23087 0.230772C7.53871 -0.0768662 8.03719 -0.0770627 8.34483 0.230772L16.2229 8.1088C16.3767 8.26262 16.4537 8.4643 16.4537 8.66578Z" fill="currentColor"/>
                            </svg>
                        </span>
                    </a>
                </div>
            <?php endif; ?>

            <?php if ($center_wrap_classes !== ''): ?>
                </div>
            <?php endif; ?>

            <?php if ($images_wrapper_classes !== ''): ?>
                <div class="<?php echo esc_attr($images_wrapper_classes); ?>">
                    <?php foreach ($images as $image): ?>
                        <?php
                        if (!is_array($image) || empty($image['src'])) {
                            continue;
                        }
                        $wrap_class = isset($image['wrap_class'])
                            ? (string) $image['wrap_class']
                            : 'rounded-[1.2vw] overflow-hidden h-[18vw] w-[18vw]';
                        $alt = isset($image['alt']) ? (string) $image['alt'] : '';
                        ?>
                        <div class="<?php echo esc_attr($wrap_class); ?>">
                            <img
                                src="<?php echo esc_url($image['src']); ?>"
                                alt="<?php echo esc_attr($alt); ?>"
                                class="h-full w-full object-cover"
                                loading="lazy"
                            >
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php
        if ($after_section) {
            echo is_string($after_section) ? $after_section : '';
        }
        ?>
    </section>
<?php else: ?>
    <section class="<?php echo esc_attr($section_classes); ?>" data-section="hero" data-hero-static>
        <div class="<?php echo esc_attr($container_classes); ?>">
            <div class="<?php echo esc_attr($grid_classes); ?>">
                <div class="<?php echo esc_attr($text_classes); ?>">
                    <<?php echo tag_escape($title_tag); ?>
                        class="<?php echo esc_attr($title_classes); ?>"
                        data-hero-reveal
                        data-heading-anim
                        data-base-delay="0.05"
                    >
                        <?php foreach ($title_lines as $line): ?>
                            <?php if ($line === ''): ?>
                                <?php continue; ?>
                            <?php endif; ?>
                            <span class="block hero-title-line"><?php echo esc_html(
                                $line,
                            ); ?></span>
                        <?php endforeach; ?>
                    </<?php echo tag_escape($title_tag); ?>>

                    <?php if ($subtitle_1 !== ''): ?>
                        <p
                            class="<?php echo esc_attr($subtitle_1_classes); ?>"
                            data-hero-reveal
                            data-hero-delay="0.14"
                            data-para-anim
                        >
                            <?php echo esc_html($subtitle_1); ?>
                        </p>
                    <?php endif; ?>

                    <?php if (!empty($subtitle_paragraphs)): ?>
                        <div class="<?php echo esc_attr($subtitle_classes); ?> space-y-[2vw]">
                            <?php foreach ($subtitle_paragraphs as $paragraph): ?>
                                <p
                                    data-hero-reveal
                                    data-hero-delay="0.14"
                                    data-para-anim
                                >
                                    <?php echo wp_kses_post($paragraph); ?>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($primary_text !== '' || $secondary_text !== ''): ?>
                        <div
                            class="<?php echo esc_attr($cta_wrapper_classes); ?>"
                            data-hero-reveal
                            data-hero-delay="0.22"
                        >
                            <?php if ($primary_text !== '' && $primary_link !== ''): ?>
                                <a href="<?php echo esc_url(
                                    $primary_link,
                                ); ?>" class="btn btn-primary group magnetic">
                                    <span class="btn-line"></span>
                                    <span class="btn-text"><?php echo esc_html(
                                        $primary_text,
                                    ); ?></span>
                                    <span class="btn-icon">
                                        <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.45369 8.66578C9.45369 8.86726 9.37668 9.06894 9.22286 9.22276L1.34483 17.1008C1.03699 17.4086 0.538513 17.4086 0.230876 17.1008C-0.0767616 16.793 -0.0769585 16.2945 0.230875 15.9868L7.55193 8.66578L0.230875 1.34473C-0.0769592 1.03689 -0.0769592 0.538408 0.230875 0.230772C0.538709 -0.0768662 1.03719 -0.0770627 1.34483 0.230772L9.22286 8.1088C9.37668 8.26262 9.45369 8.4643 9.45369 8.66578Z" fill="currentColor"/>
                                            <path d="M16.4537 8.66578C16.4537 8.86726 16.3767 9.06894 16.2229 9.22276L8.34483 17.1008C8.03699 17.4086 7.53851 17.4086 7.23088 17.1008C6.92324 16.793 6.92304 16.2945 7.23088 15.9868L14.5519 8.66578L7.23087 1.34473C6.92304 1.03689 6.92304 0.538408 7.23087 0.230772C7.53871 -0.0768662 8.03719 -0.0770627 8.34483 0.230772L16.2229 8.1088C16.3767 8.26262 16.4537 8.4643 16.4537 8.66578Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                </a>
                            <?php endif; ?>

                            <?php if ($secondary_text !== '' && $secondary_link !== ''): ?>
                                <a href="<?php echo esc_url(
                                    $secondary_link,
                                ); ?>" class="btn btn-outline group magnetic">
                                    <span class="btn-line"></span>
                                    <span class="btn-text"><?php echo esc_html(
                                        $secondary_text,
                                    ); ?></span>
                                    <span class="btn-icon">
                                        <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.45369 8.66578C9.45369 8.86726 9.37668 9.06894 9.22286 9.22276L1.34483 17.1008C1.03699 17.4086 0.538513 17.4086 0.230876 17.1008C-0.0767616 16.793 -0.0769585 16.2945 0.230875 15.9868L7.55193 8.66578L0.230875 1.34473C-0.0769592 1.03689 -0.0769592 0.538408 0.230875 0.230772C0.538709 -0.0768662 1.03719 -0.0770627 1.34483 0.230772L9.22286 8.1088C9.37668 8.26262 9.45369 8.4643 9.45369 8.66578Z" fill="currentColor"/>
                                            <path d="M16.4537 8.66578C16.4537 8.86726 16.3767 9.06894 16.2229 9.22276L8.34483 17.1008C8.03699 17.4086 7.53851 17.4086 7.23088 17.1008C6.92324 16.793 6.92304 16.2945 7.23088 15.9868L14.5519 8.66578L7.23087 1.34473C6.92304 1.03689 6.92304 0.538408 7.23087 0.230772C7.53871 -0.0768662 8.03719 -0.0770627 8.34483 0.230772L16.2229 8.1088C16.3767 8.26262 16.4537 8.4643 16.4537 8.66578Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($text_footer !== ''): ?>
                        <div
                            data-hero-reveal
                            data-hero-delay="0.3"
                        >
                            <?php echo $text_footer; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($right_content !== ''): ?>
                    <div class="<?php echo esc_attr($media_classes); ?>">
                        <?php echo $right_content; ?>
                    </div>
                <?php elseif ($media_src !== ''): ?>
                    <div class="<?php echo esc_attr($media_classes); ?>">
                        <div class="h-[40vw] w-full overflow-hidden rounded-[1.3vw] md:h-[360px] md:rounded-[28px] sm:h-[70vw] sm:rounded-[24px]">
                            <img
                                src="<?php echo esc_url($media_src); ?>"
                                alt="<?php echo esc_attr($media_alt); ?>"
                                class="h-full w-full object-cover"
                                loading="lazy"
                            >
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php
        if ($after_section) {
            echo is_string($after_section) ? $after_section : '';
        }
        ?>
    </section>
<?php endif; ?>
