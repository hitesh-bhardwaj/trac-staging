<?php
/**
 * 404 template.
 *
 * @package Trac
 */

if (!defined('ABSPATH')) {
    exit();
}

get_header();
?>

<main
    id="main-content"
    class="site-main"
    data-barba="container"
    data-barba-namespace="not-found"
>
    <section class="relative flex min-h-screen items-center overflow-hidden bg-brand-primary px-[5vw] py-[10vw] text-white md:px-[4vw] md:py-28 sm:px-[7vw] sm:py-24">
        <div class="relative z-10 mx-auto flex w-full max-w-[76vw] flex-col items-center text-center md:max-w-full">
            <h1 class="font-heading text-[15vw] leading-none text-brand-secondary md:text-[28px] sm:text-[24px]" data-animate="fade-up">
                404
</h1>
            <h1 class="mt-[0.5vw] font-heading text-66 font-normal leading-[1.3] tracking-[0.01em] md:mt-6 sm:mt-4" data-animate="fade-up" data-delay="0.1">
                This page does not exist
            </h1>

            <p class="mt-[1.5vw] max-w-[36vw] font-body text-24 leading-[1.45] text-white/80 md:mt-6 md:max-w-[640px] sm:mt-4 sm:max-w-full" data-animate="fade-up" data-delay="0.2">
                The page you are looking for may have moved, been deleted, or the URL may be incorrect.
            </p>

            <div class="mt-[3vw] md:mt-10 sm:mt-8" data-animate="fade-up" data-delay="0.25">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary group magnetic">
                    <span class="btn-line"></span>
                    <span class="btn-text"><?php esc_html_e(
                        'Return to Homepage',
                        'trac',
                    ); ?></span>
                    <span class="btn-icon">
                        <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M9.45369 8.66578C9.45369 8.86726 9.37668 9.06894 9.22286 9.22276L1.34483 17.1008C1.03699 17.4086 0.538513 17.4086 0.230876 17.1008C-0.0767616 16.793 -0.0769585 16.2945 0.230875 15.9868L7.55193 8.66578L0.230875 1.34473C-0.0769592 1.03689 -0.0769592 0.538408 0.230875 0.230772C0.538709 -0.0768662 1.03719 -0.0770627 1.34483 0.230772L9.22286 8.1088C9.37668 8.26262 9.45369 8.4643 9.45369 8.66578Z" fill="currentColor"/>
                            <path d="M16.4537 8.66578C16.4537 8.86726 16.3767 9.06894 16.2229 9.22276L8.34483 17.1008C8.03699 17.4086 7.53851 17.4086 7.23088 17.1008C6.92324 16.793 6.92304 16.2945 7.23088 15.9868L14.5519 8.66578L7.23087 1.34473C6.92304 1.03689 6.92304 0.538408 7.23087 0.230772C7.53871 -0.0768662 8.03719 -0.0770627 8.34483 0.230772L16.2229 8.1088C16.3767 8.26262 16.4537 8.4643 16.4537 8.66578Z" fill="currentColor"/>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
