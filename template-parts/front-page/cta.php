<?php
if (!defined('ABSPATH')) {
    exit();
}

// Allow this CTA to be reused across pages by passing `$args` via get_template_part(..., null, $args).
// Pattern mirrors `template-parts/connecting-communities/hero.php`.
$cta_args = isset($args) && is_array($args) ? $args : [];

// Get CTA section settings (args override ACF override defaults)
$cta_title =
    $cta_args['title'] ?? get_field('cta_title') ?? 'Ready to Get on TrAC?';

// Optional second paragraph used on some pages (e.g. Connecting Communities)
$cta_para = $cta_args['para'] ?? get_field('cta_para') ?? '';

$cta_button_text =
    $cta_args['button_text'] ??
    get_field('cta_button_text') ??
    'Get Connected';
$cta_button_link =
    $cta_args['button_link'] ??
    get_field('cta_button_link') ??
    home_url('/contact-us');

// Optional extra class hooks
$cta_button_wrapper_class = $cta_args['button_wrapper_class'] ?? '';

$cta_logo_svg_path = get_template_directory() . '/src/imgs/logo-trac.svg';
?>

<section class="cta-section relative bg-brand-quaternary overflow-hidden" data-section="cta">
    <div class="cta-container relative z-[10] w-full px-[5vw] py-[9vw] md:px-[4vw] md:py-20 sm:px-[6vw] sm:py-16">
        <div class="flex items-center justify-center gap-[4vw] md:flex-col md:gap-10">
            <div class="cta-logo shrink-0 w-[30vw] absolute left-[-4%] md:w-[42vw] md:max-w-[220px] [--stroke-0:#fff] [--fill-0:#fff]" data-animate="fade-right" aria-hidden="true">
                <?php
                if (file_exists($cta_logo_svg_path)) {
                    echo file_get_contents($cta_logo_svg_path);
                }
                ?>
            </div>

            <div class="text-center w-[70%] md:max-w-full">
                <h2 class="w-full  font-heading font-normal text-66 leading-[1.12] tracking-[0.01em] text-white mb-[2.5vw] md:text-4xl md:mb-8 sm:text-3xl sm:mb-6" data-heading-anim>
                    <?php echo esc_html($cta_title); ?>
                </h2>

                <?php if (!empty($cta_para)): ?>
                    <p class="mx-auto w-[70%] font-body font-normal text-24 leading-[1.5] text-white/85 mb-[2.5vw] md:text-lg md:mb-8 sm:text-base sm:mb-6" data-para-anim data-delay="0.15">
                        <?php echo esc_html($cta_para); ?>
                    </p>
                <?php endif; ?>

                <div class="cta-button-wrapper flex justify-center <?php echo esc_attr(
                    $cta_button_wrapper_class,
                ); ?>" data-animate="fade-up" data-delay="0.2">
                     <a href="<?php echo esc_url(
                        $cta_button_link,
                     ); ?>" class="btn btn-primary group magnetic">
                        <span class="btn-line"></span>
                        <span class="btn-text"><?php echo esc_html(
                            $cta_button_text,
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
    </div>
</section>
