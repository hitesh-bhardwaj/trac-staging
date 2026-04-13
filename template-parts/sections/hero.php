<?php
/**
 * Hero Section Template - Trac/Enigma Design
 *
 * Features:
 * - Large headline with line breaks
 * - Subtitle
 * - Two CTA buttons (primary + outline) with icon dots
 * - Globe visualization on the right
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

// Get ACF fields (with defaults for the design)
$title_line1 = get_sub_field('title_line1') ?: 'Rwanda’s Connectivity';
$title_line2 = get_sub_field('title_line2') ?: 'Backbone';
$subtitle =
    get_sub_field('subtitle') ?:
    "We don't just provide internet; we provide the tools for innovation, education, and global reach.";
$cta_primary = get_sub_field('cta_primary');
$cta_secondary = get_sub_field('cta_secondary');
$globe_image = get_sub_field('globe_image');

// Default button text
$cta_primary_text = $cta_primary['title'] ?? 'Get Connected';
$cta_primary_url = $cta_primary['url'] ?? '#';
$cta_secondary_text = $cta_secondary['title'] ?? 'Explore Products';
$cta_secondary_url = $cta_secondary['url'] ?? '#';
?>

<section class="hero relative min-h-screen bg-white overflow-hidden" data-section="hero">
    <div class="container mx-auto px-6 lg:px-[100px] pt-[120px] lg:pt-[200px] pb-20 relative z-[10]">
        <div class="grid lg:grid-cols-2 gap-12 items-center min-h-[calc(100vh-200px)]">
            <!-- Hero Text Content -->
            <div class="hero-text max-w-[788px]">
                <!-- Title -->
                <h1 class="hero-title font-heading text-text-primary tracking-[0.96px] mb-8" data-animate="fade-up">
                    <span class="block text-[clamp(48px,7vw,96px)] leading-[1.29]"><?php echo esc_html(
                        $title_line1,
                    ); ?></span>
                    <span class="block text-[clamp(48px,7vw,96px)] leading-[1.29]"><?php echo esc_html(
                        $title_line2,
                    ); ?></span>
                </h1>

                <!-- Subtitle -->
                <p class="hero-subtitle font-body font-normal text-text-body text-[clamp(18px,2vw,24px)] leading-[44px] max-w-[588px] mb-12" data-animate="fade-up" data-delay="0.1">
                    <?php echo esc_html($subtitle); ?>
                </p>

                <!-- CTA Buttons -->
                <div class="hero-cta flex flex-wrap gap-5" data-animate="fade-up" data-delay="0.2">
                    <!-- Primary Button -->
                    <a href="<?php echo esc_url(
                        $cta_primary_url,
                    ); ?>" class="btn btn-primary group magnetic">
                        <span><?php echo esc_html($cta_primary_text); ?></span>
                        <span class="btn-icon">
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </span>
                    </a>

                    <!-- Outline Button -->
                    <a href="<?php echo esc_url(
                        $cta_secondary_url,
                    ); ?>" class="btn btn-outline group magnetic">
                        <span><?php echo esc_html(
                            $cta_secondary_text,
                        ); ?></span>
                        <span class="btn-icon">
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </span>
                    </a>
                </div>
            </div>

            <!-- Globe Visualization -->
            <div class="hero-globe relative hidden lg:block" data-animate="fade-left" data-delay="0.3">
                <!-- Globe container positioned to overflow right -->
                <div class="globe-container absolute -right-[200px] top-1/2 -translate-y-1/2 w-[1308px] h-[1270px]">
                    <?php if ($globe_image): ?>
                        <img
                            src="<?php echo esc_url($globe_image['url']); ?>"
                            alt="<?php echo esc_attr(
                                $globe_image['alt'] ?:
                                'Global network visualization',
                            ); ?>"
                            class="w-full h-full object-contain"
                            loading="eager"
                        />
                    <?php else: ?>
                        <!-- SVG Globe Placeholder - Africa focused with connection dots -->
                        <div id="globe-canvas" class="w-full h-full"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Connection lines decoration (optional CSS-based) -->
    <div class="connection-lines absolute inset-0 pointer-events-none overflow-hidden z-[0]">
        <svg class="absolute right-0 top-0 w-[60%] h-full opacity-20" viewBox="0 0 800 800" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="400" cy="400" r="300" stroke="#10417f" stroke-width="0.5" stroke-dasharray="4 4" fill="none" opacity="0.3"/>
            <circle cx="400" cy="400" r="350" stroke="#10417f" stroke-width="0.5" stroke-dasharray="4 4" fill="none" opacity="0.2"/>
            <circle cx="400" cy="400" r="400" stroke="#10417f" stroke-width="0.5" stroke-dasharray="4 4" fill="none" opacity="0.1"/>
        </svg>
    </div>
</section>

<style>
/* Hero Section Specific Styles */
.hero-title {
    font-style: normal;
    font-weight: 400;
}

/* Button icon dots layout - 2x2 grid */
.btn-icon {
    display: grid;
    grid-template-columns: repeat(2, 6px);
    gap: 4px;
}

.btn-icon .dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    transition: transform 0.3s ease;
}

.btn:hover .btn-icon .dot {
    transform: scale(1.2);
}

.btn:hover .btn-icon .dot:nth-child(1) { transform: translate(-2px, -2px); }
.btn:hover .btn-icon .dot:nth-child(2) { transform: translate(2px, -2px); }
.btn:hover .btn-icon .dot:nth-child(3) { transform: translate(-2px, 2px); }
.btn:hover .btn-icon .dot:nth-child(4) { transform: translate(2px, 2px); }

/* Globe animation */
.globe-container {
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(-50%) translateX(0); }
    50% { transform: translateY(-52%) translateX(5px); }
}

/* Responsive adjustments */
@media (max-width: 1024px) {
    .hero {
        min-height: auto;
        padding-top: 120px;
    }
}
</style>
