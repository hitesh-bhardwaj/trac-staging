<?php
/**
 * Theme Header - Trac/Enigma Design
 * Desktop First Approach (1920x1080 base)
 *
 * @package Trac
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Page Loader -->
<div class="page-loader">
    <div class="loader-inner">
        <div class="loader-logo">
            <img src="<?php echo get_template_directory_uri(); ?>/src/imgs/trac-icon.svg" alt="Trac Logo">
        </div>
        <div class="loader-spinner">
            <div class="spinner-ring"></div>
            <div class="spinner-ring"></div>
            <div class="spinner-ring"></div>
        </div>
        <p class="loader-text">Loading...</p>
    </div>
</div>

<div id="page" class="site" data-scroll-container data-barba="wrapper">
    <a class="skip-link sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-50 focus:bg-brand-primary focus:text-white focus:px-4 focus:py-2 focus:rounded" href="#main-content">
        <?php esc_html_e('Skip to content', 'trac'); ?>
    </a>

    <header id="site-header" class="site-header fixed top-0 left-0 w-full z-50 bg-white/95 backdrop-blur-sm transition-all duration-400">
        <div class="header-inner w-full px-[5.21vw] py-[1.302vw] flex items-center justify-between md:px-[4vw] md:py-5 sm:px-[6vw] sm:py-4">
            <!-- Logo -->
            <div class="site-logo flex-shrink-0">
                <?php if (has_custom_logo()): ?>
                    <?php the_custom_logo(); ?>
                <?php else: ?>
                    <a href="<?php echo esc_url(
                        home_url('/'),
                    ); ?>" class="flex items-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/imgs/trac-icon.svg" class="w-[8vw]" alt="Trac Logo">
                    </a>
                <?php endif; ?>
            </div>

            <!-- Primary Navigation - Desktop -->
            <nav id="primary-nav" class="primary-navigation flex items-center justify-center flex-1 mx-[2.083vw] md:hidden" aria-label="<?php esc_attr_e(
                'Primary Navigation',
                'trac',
            ); ?>">
                <ul class="nav-menu flex items-center gap-[3.125vw]">
                    <li class="menu-item">
                        <a href="<?php echo esc_url(
                            home_url('/about-us'),
                        ); ?>" class="nav-link">
                            About Us
                        </a>
                    </li>
                    <li class="menu-item menu-item-has-children relative group">
                        <a href="<?php echo esc_url(
                            home_url('/products'),
                        ); ?>" class="nav-link inline-flex items-center gap-[0.26vw]">
                            Products
                            <svg class="nav-dropdown-icon transition-transform group-hover:rotate-180" viewBox="0 0 32 32" fill="currentColor">
                                <path d="M16 20L8 12H24L16 20Z"/>
                            </svg>
                        </a>
                        <!-- Dropdown would go here -->
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo esc_url(
                            home_url('/communities'),
                        ); ?>" class="nav-link">
                            Communities
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo esc_url(
                            home_url('/partners'),
                        ); ?>" class="nav-link">
                            Partners
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo esc_url(
                            home_url('/careers'),
                        ); ?>" class="nav-link">
                            Careers
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="<?php echo esc_url(
                            home_url('/contact-us'),
                        ); ?>" class="nav-link">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Header Actions -->
            <div class="header-actions flex items-center gap-[0.833vw] md:gap-3">
                <!-- Cloud Login CTA Button - Desktop -->
                <a href="<?php echo esc_url(
                    get_field('header_cta_link', 'option') ?: '#',
                ); ?>" class="btn btn-primary md:hidden hover:bg-white hover:text-brand-primary transition-colors durtaion-500 ease-in-out border border-brand-primary">
                    <!-- <span class="btn-line"></span> -->
                     <span>
                        Cloud Login
                     </span>
                </a>

                <!-- Mobile Menu Toggle -->
                <button
                    id="mobile-menu-toggle"
                    class="mobile-toggle hidden md:flex flex-col justify-center items-center w-12 h-12 gap-1.5"
                    aria-expanded="false"
                    aria-controls="mobile-menu"
                    aria-label="<?php esc_attr_e('Toggle menu', 'trac'); ?>"
                >
                    <span class="menu-line w-7 h-0.5 bg-text-primary transition-all origin-center"></span>
                    <span class="menu-line w-7 h-0.5 bg-text-primary transition-all"></span>
                    <span class="menu-line w-7 h-0.5 bg-text-primary transition-all origin-center"></span>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu hidden fixed inset-0 top-[80px] bg-white z-40 overflow-y-auto">
            <nav class="w-full px-[4vw] py-8 sm:px-[6vw]" aria-label="<?php esc_attr_e(
                'Mobile Navigation',
                'trac',
            ); ?>">
                <ul class="mobile-nav-menu flex flex-col gap-6">
                    <li><a href="<?php echo esc_url(
                        home_url('/about-us'),
                    ); ?>" class="mobile-nav-link">About Us</a></li>
                    <li><a href="<?php echo esc_url(
                        home_url('/products'),
                    ); ?>" class="mobile-nav-link">Products</a></li>
                    <li><a href="<?php echo esc_url(
                        home_url('/communities'),
                    ); ?>" class="mobile-nav-link">Communities</a></li>
                    <li><a href="<?php echo esc_url(
                        home_url('/partners'),
                    ); ?>" class="mobile-nav-link">Partners</a></li>
                    <li><a href="<?php echo esc_url(
                        home_url('/careers'),
                    ); ?>" class="mobile-nav-link">Careers</a></li>
                    <li><a href="<?php echo esc_url(
                        home_url('/contact-us'),
                    ); ?>" class="mobile-nav-link">Contact Us</a></li>
                </ul>

                <a href="#" class="btn btn-primary mt-10 w-full justify-center">
                    <span class="btn-line"></span>
                    <span class="btn-text">Cloud Login</span>
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
            </nav>
        </div>
    </header>

<style>
/* ==========================================
   Header - Desktop First (1920px base)
   ========================================== */

/* Logo sizing - 150x74 at 1920px */
.logo-svg {
    width: 7.813vw;   /* 150px at 1920 */
    height: 3.854vw;  /* 74px at 1920 */
}

@media (max-width: 1024px) {
    .logo-svg {
        width: 120px;
        height: 59px;
    }
}

@media (max-width: 540px) {
    .logo-svg {
        width: 100px;
        height: 49px;
    }
}

/* Nav link - 22px at 1920px */
.nav-link {
    font-family: var(--font-heading);
    font-size: var(--text-body);  /* 1.146vw = 22px at 1920 */
    color: var(--color-text-secondary);
    transition: color 0.3s ease;
    white-space: nowrap;
}

.nav-link:hover {
    color: var(--color-brand-primary);
}

/* Nav dropdown icon */
.nav-dropdown-icon {
    width: 1.667vw;   /* 32px at 1920 */
    height: 1.667vw;
}

@media (max-width: 1024px) {
    .nav-dropdown-icon {
        width: 24px;
        height: 24px;
    }
}

/* Mobile nav link */
.mobile-nav-link {
    font-family: var(--font-heading);
    font-size: 24px;
    color: var(--color-text-secondary);
    display: block;
    padding: 8px 0;
    transition: color 0.3s ease;
}

.mobile-nav-link:hover {
    color: var(--color-brand-primary);
}

@media (max-width: 540px) {
    .mobile-nav-link {
        font-size: 20px;
    }
}

/* Mobile menu toggle animation */
#mobile-menu-toggle[aria-expanded="true"] .menu-line:nth-child(1) {
    transform: translateY(8px) rotate(45deg);
}

#mobile-menu-toggle[aria-expanded="true"] .menu-line:nth-child(2) {
    opacity: 0;
}

#mobile-menu-toggle[aria-expanded="true"] .menu-line:nth-child(3) {
    transform: translateY(-8px) rotate(-45deg);
}

/* Header scroll state */
.site-header.is-scrolled {
    box-shadow: 0 0.26vw 1.042vw rgba(0, 0, 0, 0.05);
}

@media (max-width: 1024px) {
    .site-header.is-scrolled {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
}

.site-header.is-hidden {
    transform: translateY(-100%);
}

/* Mobile menu open state */
.mobile-menu.is-open {
    display: block;
}
</style>
