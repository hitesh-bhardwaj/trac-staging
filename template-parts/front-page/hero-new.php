<?php
/**
 * New Hero Section - From Figma Design
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

// Get hero content from ACF
$hero_title = get_field('hero_new_title') ?: 'Connectivity Is Where It All Begins';
$hero_subtitle = get_field('hero_new_subtitle') ?: 'Access to services starts with access to connectivity.';
$hero_description = get_field('hero_new_description') ?: "Without it, systems cannot function, platforms cannot reach people, and opportunities remain out of reach. TrAC provides that foundation, building the infrastructure that enables everything else to work.";
$hero_image = get_field('hero_new_image') ?: 'https://www.figma.com/api/mcp/asset/72b7b9bf-2b36-4998-8fe1-5db1b166e089';
?>

<section class="hero-new relative w-full min-h-screen bg-white" data-section="hero-new">
    <div class="hero-new-container w-full px-[5.21vw] pt-[13vw] pb-[7.031vw] md:px-[4vw] md:pt-[160px] md:pb-16 sm:px-[6vw] sm:pt-[140px] sm:pb-12">

        <!-- Hero Text Content -->
        <div class="hero-text-content relative z-[10] text-center mb-[5.208vw] md:mb-16 sm:mb-12">
            <!-- Main Title -->
            <h1 class="hero-main-title font-heading text-[3.958vw] leading-[5vw] tracking-[0.04vw] text-[#111] mb-[3.125vw] max-w-[71.51vw] mx-auto md:text-5xl md:leading-[1.2] md:mb-8 sm:text-4xl sm:mb-6" data-animate="fade-up">
                <?php echo esc_html($hero_title); ?>
            </h1>

            <!-- Subtitle -->
            <p class="hero-subtitle font-heading text-[1.875vw] tracking-[0.019vw] text-[#111] mb-[5vw] md:text-3xl md:mb-8 sm:text-2xl sm:mb-6" data-para-anim data-delay="0.1">
                <?php echo esc_html($hero_subtitle); ?>
            </p>

            <!-- Description -->
            <p class="hero-description font-body text-[1.25vw] leading-[2.083vw] text-[#1e1e1e] max-w-[46.927vw] mx-auto md:text-xl md:leading-[1.6] md:max-w-full sm:text-lg sm:leading-[1.5]" data-para-anim data-delay="0.2">
                <?php echo esc_html($hero_description); ?>
            </p>
        </div>

        <!-- Hero Image -->
        <div class="hero-image-container relative z-[10]" data-animate="fade-up" data-delay="0.3">
            <div class="hero-image-wrapper relative bg-[#edecec] rounded-[2.083vw] overflow-hidden h-[30.99vw] md:rounded-3xl md:h-[400px] sm:rounded-2xl sm:h-[300px]">
                <?php if (is_array($hero_image) && isset($hero_image['url'])): ?>
                    <img
                        src="<?php echo esc_url($hero_image['url']); ?>"
                        alt="<?php echo esc_attr($hero_image['alt'] ?: 'TrAC Connectivity Network'); ?>"
                        class="absolute inset-0 w-full h-full object-cover"
                        loading="lazy"
                    >
                <?php else: ?>
                    <img
                        src="<?php echo esc_url($hero_image); ?>"
                        alt="TrAC Connectivity Network"
                        class="absolute inset-0 w-full h-full object-cover"
                        loading="lazy"
                    >
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>
