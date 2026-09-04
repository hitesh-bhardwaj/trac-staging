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
<div class="page-loader">
    <div class="w-screen h-screen fixed inset-0 bg-white z-[99999] flex flex-col justify-center items-center loader [clip-path:inset(0%_0%_0%_0%)]">
        <div class="size-[15vw] min-w-[72px] min-h-[72px]">
            <img src="<?php echo get_template_directory_uri(); ?>/src/imgs/trac-icon-light.svg" class="w-full h-full" alt="Trac Logo">
        </div>

        <p class="whitespace-nowrap w-[8.5em] flex items-center justify-center gap-[0.02em] text-brand-primary text-[1.85vw] absolute top-[65%] left-[51%] -translate-x-1/2">
             <span class="inline-block">Loading</span>
             <span class="inline-flex items-center justify-start w-[1.6em]" aria-hidden="true">
             <span class="loader-dot">.</span>
             <span class="loader-dot">.</span>
             <span class="loader-dot">.</span>
             <span class="loader-dot">.</span>
             </span>
        </p>

        <div class="size-[15vw] min-w-[72px] min-h-[72px] absolute [clip-path:inset(0%_100%_0%_0%)] overflow-hidden overlay-logo">
            <img
                src="<?php echo get_template_directory_uri(); ?>/src/imgs/trac-icon.svg"
                class="w-full h-full object-contain"
                alt="Trac Logo"
            >
        </div>
    </div>
</div>
<div class="mouse-follower" aria-hidden="true"></div>

</div>

<div id="page" class="site" data-scroll-container data-barba="wrapper">
    <a class="skip-link sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[50] focus:bg-brand-primary focus:text-white focus:px-4 focus:py-2 focus:rounded" href="#main-content">
        <?php esc_html_e('Skip to content', 'trac'); ?>
    </a>

   <?php
   // Active nav-link detection (underline stays on for the current route).
   // Header.php isn't re-rendered by Barba's client-side navigation (it lives outside
   // `[data-barba="container"]`), so this only gets this right for the initial request;
   // `initActiveNavLink()` in main.js re-syncs it on every subsequent transition.
   $trac_current_path = trim(
       (string) wp_parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH),
       '/',
   );

   /**
    * @param string $path Route to check, e.g. 'about-us' or 'solutions'.
    * @param bool $prefix When true, also matches sub-paths (e.g. 'solutions/sme-internet').
    */
   $trac_nav_is_active = function (string $path, bool $prefix = false) use (
       $trac_current_path,
   ): bool {
       $path = trim($path, '/');
       if ($prefix) {
           return $trac_current_path === $path ||
               strpos($trac_current_path, $path . '/') === 0;
       }
       return $trac_current_path === $path;
   };
   ?>
   <header
    id="site-header"
    class="site-header fixed top-0 left-1/2 -translate-x-1/2 w-full rounded-none z-[9999] bg-brand-primary"
 >
        <div class="header-inner w-full px-[4vw] py-[1.15vw] flex items-center justify-between md:px-[4vw] md:py-5 sm:px-[6vw] sm:py-4">
            <!-- Logo -->
            <div class="site-logo flex-shrink-0">
                <?php if (has_custom_logo()): ?>
                    <?php the_custom_logo(); ?>
                <?php else: ?>
                    <a href="<?php echo esc_url(
                        home_url('/'),
                    ); ?>" class="flex items-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/imgs/trac-icon.svg" class="w-[8vw] sm:w-[20vw] brightness-[16]" alt="Trac Logo">
                    </a>
                <?php endif; ?>
            </div>

            <!-- Primary Navigation - Desktop -->
            <nav id="primary-nav" class="primary-navigation flex items-center justify-center flex-1 mx-[2vw] md:hidden" aria-label="<?php esc_attr_e(
                'Primary Navigation',
                'trac',
            ); ?>">
                <ul class="list-none flex items-center gap-[3.125vw]">
                    <?php $is_about_active = $trac_nav_is_active('about-us'); ?>
                    <li class="menu-item under-multi-parent">
                        <a href="<?php echo esc_url(
                            home_url('/about-us'),
                        ); ?>" class="nav-link nav-underline-offset text-white hover:text-white under-multi<?php echo $is_about_active
    ? ' is-active-link'
    : ''; ?>"<?php echo $is_about_active ? ' aria-current="page"' : ''; ?>>
                            About Us
                        </a>
                    </li>
                    <?php // Checked against 'solutions' (the real URL prefix, e.g.

// /solutions/sme-internet/) rather than the "Solutions" label -
                    // the link itself is just a dropdown trigger (href="#").
                    $is_solutions_active = $trac_nav_is_active(
                        'solutions',
                        true,
                    ); ?>
                    <li class="menu-item menu-item-has-children relative group under-multi-parent" data-solutions-menu-item>
    <a
        href="<?php echo esc_url(home_url('#')); ?>"
        class="nav-link inline-flex items-center gap-[0.26vw] under-multi text-white hover:text-white<?php echo $is_solutions_active
            ? ' is-active-link'
            : ''; ?>"
        data-solutions-trigger
        <?php echo $is_solutions_active ? ' aria-current="page"' : ''; ?>
    >
        Solutions
        <div class="size-[1.5vw] group-hover:translate-y-[10%] duration-300 ease-out">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.708 22.122L23.416 14.416L22.002 13L15.708 19.294L9.416 13L8 14.416L15.708 22.122Z" fill="white"/>
            </svg>
        </div>
    </a>
                 </li>
                    <?php $is_communities_active = $trac_nav_is_active(
                        'connecting-communities',
                    ); ?>
                    <li class="menu-item under-multi-parent">
                        <a href="<?php echo esc_url(
                            home_url('/connecting-communities'),
                        ); ?>" class="nav-link nav-underline-offset under-multi text-white hover:text-white<?php echo $is_communities_active
    ? ' is-active-link'
    : ''; ?>"<?php echo $is_communities_active
    ? ' aria-current="page"'
    : ''; ?>>
                            Connecting Communities
                        </a>
                    </li>

                    <?php $is_careers_active = $trac_nav_is_active(
                        'careers',
                    ); ?>
                    <li class="menu-item under-multi-parent">
                        <a href="<?php echo esc_url(
                            home_url('/careers'),
                        ); ?>" class="nav-link nav-underline-offset under-multi text-white hover:text-white<?php echo $is_careers_active
    ? ' is-active-link'
    : ''; ?>"<?php echo $is_careers_active ? ' aria-current="page"' : ''; ?>>
                            Careers
                        </a>
                    </li>

                </ul>
            </nav>

            <!-- Header Actions -->
            <div class="header-actions flex items-center gap-[0.833vw] md:gap-3">
                <!-- Cloud Login CTA Button - Desktop -->
                <a href="<?php echo esc_url(
                    get_field('header_cta_link', 'option') ?: '/contact-us',
                ); ?>" class="btn btn-primary md:hidden hover:bg-white hover:text-brand-secondary transition-colors durtaion-700 ease-in-out border border-brand-secondary">
                    <!-- <span class="btn-line"></span> -->
                     <span>
                         Contact Us
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
        <div id="mobile-menu" class="mobile-menu hidden fixed inset-0 top-[80px] bg-white z-[40] overflow-y-auto">
            <nav class="w-full px-[4vw] py-8 sm:px-[6vw]" aria-label="<?php esc_attr_e(
                'Mobile Navigation',
                'trac',
            ); ?>">
                <ul class="flex flex-col gap-6">
                    <li><a href="<?php echo esc_url(
                        home_url('/about-us'),
                    ); ?>" class="mobile-nav-link block py-2 text-xl text-neutral-900 hover:text-brand-primary">About Us</a></li>
                    <li>
                        <a href="<?php echo esc_url(
                            home_url('/solutions'),
                        ); ?>" class="mobile-nav-link block py-2 text-xl text-neutral-900 hover:text-brand-primary">Solutions</a>
                        <ul class="mt-2 flex flex-col gap-2 pl-4">
                            <li><a href="<?php echo esc_url(
                                home_url('/solutions/enterprise-network/'),
                            ); ?>" class="mobile-nav-link text-lg sm:text-base">Enterprise Network</a></li>
                            <li><a href="<?php echo esc_url(
                                home_url('/solutions/sme-internet/'),
                            ); ?>" class="mobile-nav-link text-lg sm:text-base">SME Internet</a></li>
                            <li><a href="<?php echo esc_url(
                                home_url('/solutions/home-internet/'),
                            ); ?>" class="mobile-nav-link text-lg sm:text-base">Home Internet</a></li>
                            <li><a href="<?php echo esc_url(
                                home_url('/solutions/carrier-services/'),
                            ); ?>" class="mobile-nav-link text-lg sm:text-base">Wholesale &amp; Carrier</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo esc_url(
                        home_url('/communities'),
                    ); ?>" class="mobile-nav-link block py-2 text-xl text-neutral-900 hover:text-brand-primary">Connecting Communities</a></li>
                    <li><a href="<?php echo esc_url(
                        home_url('/partners'),
                    ); ?>" class="mobile-nav-link block py-2 text-xl text-neutral-900 hover:text-brand-primary">Partners</a></li>
                    <li><a href="<?php echo esc_url(
                        home_url('/careers'),
                    ); ?>" class="mobile-nav-link block py-2 text-xl text-neutral-900 hover:text-brand-primary">Careers</a></li>

                </ul>

                <a href="#" class="btn btn-primary mt-10 w-full justify-center">
                    <span class="btn-line"></span>
                    <span class="btn-text">Contact Us</span>
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
   <?php $solutions_menu_items = [
       [
           'label' => 'Enterprise Network',
           'url' => home_url('/solutions/enterprise-network/'),
       ],
       [
           'label' => 'SME Internet',
           'url' => home_url('/solutions/sme-internet/'),
       ],
       [
           'label' => 'Home Internet',
           'url' => home_url('/solutions/home-internet/'),
       ],
       [
           'label' => 'Wholesale & Carrier',
           'url' => home_url('/solutions/carrier-services/'),
       ],
   ]; ?>
   <nav
    class="fixed w-[90%] top-[12vw] left-1/2 -translate-x-1/2 rounded-[0.9vw] p-[1.5vw] py-[1.5vw] flex justify-between z-[999] bg-white"
    data-solutions-dropdown
      >
    <?php foreach ($solutions_menu_items as $solution_item): ?>
        <a href="<?php echo esc_url(
            $solution_item['url'],
        ); ?>" class="group w-[24%] h-[12vw] rounded-[0.8vw] bg-white border border-brand-primary pl-[1.5vw] p-[0.8vw] flex flex-col justify-center text-black hover:bg-brand-tertiary hover:border-brand-tertiary hover:text-white duration-300 ease-in-out">
            <div class="w-full flex flex-col gap-[1vw] h-full justify-center">
                <h4 class="text-[1.8vw] font-body"><?php echo esc_html(
                    $solution_item['label'],
                ); ?></h4>
            </div>

            <div class="w-full flex justify-end">
                <div class="size-[3.5vw] rounded-[0.6vw] bg-white border border-brand-primary flex justify-center items-center text-black overflow-hidden group-hover:bg-brand-secondary group-hover:border-brand-secondary group-hover:text-white duration-300 ease-out">
                    <div class="relative w-[20px] h-[20px] overflow-hidden">
                        <div class="absolute top-0 left-0 w-[20px] h-[20px] flex items-center justify-center transition-transform duration-300 ease-in-out group-hover:translate-x-[120%]">
                            <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.45369 8.66578C9.45369 8.86726 9.37668 9.06894 9.22286 9.22276L1.34483 17.1008C1.03699 17.4086 0.538513 17.4086 0.230876 17.1008C-0.0767616 16.793 -0.0769585 16.2945 0.230875 15.9868L7.55193 8.66578L0.230875 1.34473C-0.0769592 1.03689 -0.0769592 0.538408 0.230875 0.230772C0.538709 -0.0768662 1.03719 -0.0770627 1.34483 0.230772L9.22286 8.1088C9.37668 8.26262 9.45369 8.4643 9.45369 8.66578Z" fill="currentColor"/>
                                <path d="M16.4537 8.66578C16.4537 8.86726 16.3767 9.06894 16.2229 9.22276L8.34483 17.1008C8.03699 17.4086 7.53851 17.4086 7.23088 17.1008C6.92324 16.793 6.92304 16.2945 7.23088 15.9868L14.5519 8.66578L7.23087 1.34473C6.92304 1.03689 6.92304 0.538408 7.23087 0.230772C7.53871 -0.0768662 8.03719 -0.0770627 8.34483 0.230772L16.2229 8.1088C16.3767 8.26262 16.4537 8.4643 16.4537 8.66578Z" fill="currentColor"/>
                            </svg>
                        </div>

                        <div class="absolute top-0 left-[-120%] w-[20px] h-[20px] flex items-center justify-center transition-transform duration-300 ease-in-out group-hover:translate-x-[120%]">
                            <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.45369 8.66578C9.45369 8.86726 9.37668 9.06894 9.22286 9.22276L1.34483 17.1008C1.03699 17.4086 0.538513 17.4086 0.230876 17.1008C-0.0767616 16.793 -0.0769585 16.2945 0.230875 15.9868L7.55193 8.66578L0.230875 1.34473C-0.0769592 1.03689 -0.0769592 0.538408 0.230875 0.230772C0.538709 -0.0768662 1.03719 -0.0770627 1.34483 0.230772L9.22286 8.1088C9.37668 8.26262 9.45369 8.4643 9.45369 8.66578Z" fill="currentColor"/>
                                <path d="M16.4537 8.66578C16.4537 8.86726 16.3767 9.06894 16.2229 9.22276L8.34483 17.1008C8.03699 17.4086 7.53851 17.4086 7.23088 17.1008C6.92324 16.793 6.92304 16.2945 7.23088 15.9868L14.5519 8.66578L7.23087 1.34473C6.92304 1.03689 6.92304 0.538408 7.23087 0.230772C7.53871 -0.0768662 8.03719 -0.0770627 8.34483 0.230772L16.2229 8.1088C16.3767 8.26262 16.4537 8.4643 16.4537 8.66578Z" fill="currentColor"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
   </nav>
   <div data-solutions-overlay class=" bg-black/20 backdrop-blur-md fixed inset-0 w-screen h-screen z-[998]">
    </div>

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
    /* font-family: var(--font-heading); */
    font-size: var(--text-body);  /* 1.146vw = 22px at 1920 */
    color: var(--color-text-secondary);
    transition: color 0.3s ease;
    white-space: nowrap;
}

/* If a nav-link also uses the under-multi underline, preserve background-size transition too. */
.nav-link.under-multi {
    transition: color 0.3s ease, background-size 0.3s ease-out;
}

.nav-link:hover {
    color: var(--color-text-secondary);
}

/* Active route: keep the hover underline permanently on. Specificity matches
   `.under-multi-parent:hover .under-multi` (3 classes) so it isn't overridden by the
   `.menu-item .under-multi` resting-state rule (2 classes) in main.css. */
.menu-item .under-multi.is-active-link {
    background-size:
        100% 0px,
        100% 1px;
}

/* "Solutions" is an inline-flex box (text + dropdown chevron), which makes it taller
   than the plain-text links, so its bottom-anchored underline (`background-position:
   ... 100%`) naturally sits lower. Push the plain-text links' underline down to match. */
.nav-underline-offset {
    padding-bottom: 0.35vw;
}

@media (max-width: 1024px) {
    .nav-underline-offset {
        padding-bottom: 10px;
    }
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
    /* font-family: var(--font-heading); */
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
