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
        <div class="size-[15vw] min-w-[72px] min-h-[72px] sm:size-[50vw]">
            <img src="<?php echo get_template_directory_uri(); ?>/src/imgs/trac-icon-light.svg" class="w-full h-full" alt="Trac Logo">
        </div>

        <p class="whitespace-nowrap w-[8.5em] flex items-center justify-center gap-[0.02em] text-brand-primary text-[1.85vw] absolute top-[65%] left-[51%] -translate-x-1/2 sm:text-[7vw]">
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

   $trac_header_logo = get_field('header_logo_image', 'option');
   $trac_header_cta_text = get_field('header_cta_text', 'option');
   $trac_header_cta_link = get_field('header_cta_link', 'option');
   $trac_header_solutions_label = get_field(
       'header_solutions_label',
       'option',
   );

   $trac_header_nav_links = [];
   for ($i = 1; $i <= 3; $i++) {
       $trac_header_nav_links[] = [
           'label' => get_field("header_nav_{$i}_label", 'option'),
           'link' => get_field("header_nav_{$i}_link", 'option'),
       ];
   }

   $trac_solutions_menu_items = [];
   for ($i = 1; $i <= 4; $i++) {
       $trac_solutions_menu_items[] = [
           'label' => get_field("header_solutions_{$i}_label", 'option'),
           'url' => trac_normalize_solution_url(
               get_field("header_solutions_{$i}_link", 'option'),
           ),
       ];
   }

   $trac_mobile_social = [
       'facebook' => [
           'url' => get_field('footer_social_facebook', 'option'),
           'icon' => get_field('footer_social_facebook_icon', 'option'),
           'label' => 'Facebook',
       ],
       'twitter' => [
           'url' => get_field('footer_social_twitter', 'option'),
           'icon' => get_field('footer_social_twitter_icon', 'option'),
           'label' => 'X',
       ],
       'instagram' => [
           'url' => get_field('footer_social_instagram', 'option'),
           'icon' => get_field('footer_social_instagram_icon', 'option'),
           'label' => 'Instagram',
       ],
       'linkedin' => [
           'url' => get_field('footer_social_linkedin', 'option'),
           'icon' => get_field('footer_social_linkedin_icon', 'option'),
           'label' => 'LinkedIn',
       ],
   ];
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
                <?php elseif ($trac_header_logo): ?>
                    <a href="<?php echo esc_url(
                        home_url('/'),
                    ); ?>" class="flex items-center">
                        <img src="<?php echo esc_url(
                            $trac_header_logo,
                        ); ?>" class="w-[8vw] md:w-[15vw] sm:w-[20vw] " alt="<?php bloginfo(
                            'name',
                        ); ?>">
                    </a>
                <?php endif; ?>
            </div>

            <!-- Primary Navigation - Desktop -->
            <nav id="primary-nav" class="primary-navigation flex items-center justify-center flex-1 mx-[2vw] lg:hidden" aria-label="<?php esc_attr_e(
                'Primary Navigation',
                'trac',
            ); ?>">
                <ul class="list-none flex items-center gap-[3.125vw]">
                    <?php
                    // First nav link (About Us position)
                    $nav_link_0 = $trac_header_nav_links[0];
                    $is_nav_0_active = $trac_nav_is_active(
                        wp_parse_url($nav_link_0['link'], PHP_URL_PATH) ?:
                            $nav_link_0['link'],
                    );
                    ?>
                    <li class="menu-item under-multi-parent">
                        <a href="<?php echo esc_url(
                            $nav_link_0['link'],
                        ); ?>" class="nav-link text-[1.146vw] whitespace-nowrap transition-[color,background-size] duration-300 ease-out pb-[0.35vw] lg:pb-[10px] text-white hover:text-white under-multi<?php echo $is_nav_0_active
    ? ' is-active-link'
    : ''; ?>"<?php echo $is_nav_0_active ? ' aria-current="page"' : ''; ?>>
                            <?php echo trac_esc_html($nav_link_0['label']); ?>
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
        class="nav-link text-[1.146vw] whitespace-nowrap transition-[color,background-size] duration-300 ease-out inline-flex items-center gap-[0.26vw] under-multi text-white hover:text-white<?php echo $is_solutions_active
            ? ' is-active-link'
            : ''; ?>"
        data-solutions-trigger
        <?php echo $is_solutions_active ? ' aria-current="page"' : ''; ?>
    >
        <?php echo trac_esc_html($trac_header_solutions_label); ?>
        <div class="size-[1.5vw] group-hover:translate-y-[10%] duration-300 ease-out">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.708 22.122L23.416 14.416L22.002 13L15.708 19.294L9.416 13L8 14.416L15.708 22.122Z" fill="white"/>
            </svg>
        </div>
    </a>
                 </li>
                    <?php
                    $nav_link_1 = $trac_header_nav_links[1];
                    $is_nav_1_active = $trac_nav_is_active(
                        wp_parse_url($nav_link_1['link'], PHP_URL_PATH) ?:
                            $nav_link_1['link'],
                    );
                    ?>
                    <li class="menu-item under-multi-parent">
                        <a href="<?php echo esc_url(
                            $nav_link_1['link'],
                        ); ?>" class="nav-link text-[1.146vw] whitespace-nowrap transition-[color,background-size] duration-300 ease-out pb-[0.35vw] lg:pb-[10px] under-multi text-white hover:text-white<?php echo $is_nav_1_active
    ? ' is-active-link'
    : ''; ?>"<?php echo $is_nav_1_active
    ? ' aria-current="page"'
    : ''; ?>>
                            <?php echo trac_esc_html($nav_link_1['label']); ?>
                        </a>
                    </li>

                    <?php
                    $nav_link_2 = $trac_header_nav_links[2];
                    $is_nav_2_active = $trac_nav_is_active(
                        wp_parse_url($nav_link_2['link'], PHP_URL_PATH) ?:
                            $nav_link_2['link'],
                    );
                    ?>
                    <li class="menu-item under-multi-parent">
                        <a href="<?php echo esc_url(
                            $nav_link_2['link'],
                        ); ?>" class="nav-link text-[1.146vw] whitespace-nowrap transition-[color,background-size] duration-300 ease-out pb-[0.35vw] lg:pb-[10px] under-multi text-white hover:text-white<?php echo $is_nav_2_active
    ? ' is-active-link'
    : ''; ?>"<?php echo $is_nav_2_active ? ' aria-current="page"' : ''; ?>>
                            <?php echo trac_esc_html($nav_link_2['label']); ?>
                        </a>
                    </li>

                </ul>
            </nav>

            <!-- Header Actions -->
            <div class="header-actions flex items-center gap-[0.833vw] md:gap-3">
                <!-- Cloud Login CTA Button - Desktop -->
                <a href="<?php echo esc_url(
                    $trac_header_cta_link,
                ); ?>" class="btn btn-primary lg:hidden hover:bg-white hover:text-brand-secondary transition-colors durtaion-700 ease-in-out border border-brand-secondary">
                    <!-- <span class="btn-line"></span> -->
                     <span>
                         <?php echo trac_esc_html($trac_header_cta_text); ?>
                     </span>
                </a>

                <!-- Mobile Menu Toggle -->
                <button
                    id="mobile-menu-toggle"
                    class="mobile-toggle hidden lg:flex flex-col justify-center items-center w-12 h-12 gap-1.5"
                    aria-expanded="false"
                    aria-controls="mobile-menu"
                    aria-label="<?php esc_attr_e('Toggle menu', 'trac'); ?>"
                >
                    <span class="menu-line w-7 h-0.5 bg-white transition-all origin-center"></span>
                    <span class="menu-line w-7 h-0.5 bg-white transition-all"></span>
                    <span class="menu-line w-7 h-0.5 bg-white transition-all origin-center"></span>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu hidden fixed inset-0 bg-white z-[10000] overflow-y-auto text-[#111111]">
            <nav class="flex min-h-[100dvh] w-full flex-col px-[4vw] pb-8 pt-10 sm:px-[8vw] sm:pb-3 sm:pt-9" aria-label="<?php esc_attr_e(
                'Mobile Navigation',
                'trac',
            ); ?>">
                <div class="mb-8 flex justify-end">
                    <button class="mobile-menu-close flex h-[8.889vw] w-[8.889vw] items-center justify-center text-brand-primary" type="button" aria-label="<?php esc_attr_e(
                        'Close menu',
                        'trac',
                    ); ?>">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M7 7L27 27M27 7L7 27" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>

                <ul class="flex flex-col gap-3 m-0 p-0 list-none">
                    <li><a href="<?php echo esc_url(
                        $nav_link_0['link'],
                    ); ?>" class="mobile-nav-link flex min-h-[16.296vw] sm:min-h-[16.481vw] items-center rounded-[1.852vw] bg-brand-tint px-[5.185vw] sm:px-[5.370vw] font-body text-[4.074vw] leading-[1.15] text-[#111111] no-underline hover:text-[#111111]<?php echo $is_nav_0_active
    ? ' is-active-link'
    : ''; ?>"<?php echo $is_nav_0_active ? ' aria-current="page"' : ''; ?>><?php echo trac_esc_html(
    $nav_link_0['label'],
); ?></a></li>
                    <li class="mobile-nav-solutions rounded-xl bg-brand-tint text-[#111111] overflow-hidden p-[5.185vw] sm:p-[5.185vw]<?php echo $is_solutions_active
    ? ' is-active-link'
    : ''; ?>">
                        <button class="mobile-nav-solutions-trigger flex w-full items-center justify-between border-0 bg-transparent p-0 font-body text-[4.074vw] leading-[1.15] text-inherit text-left sm:text-[4.074vw]" type="button" aria-expanded="false" aria-controls="mobile-solutions-list">
                            <span><?php echo trac_esc_html(
                            $trac_header_solutions_label,
                        ); ?></span>
                            <svg class="mobile-nav-solutions-arrow transition-transform duration-300" width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M5 9L12 16L19 9" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        <ul id="mobile-solutions-list" class="mobile-nav-solutions-list flex flex-col p-0 list-none">
                            <?php foreach ($trac_solutions_menu_items as $solution_item): ?>
                                <li><a href="<?php echo esc_url(
                                    $solution_item['url'],
                                ); ?>" class="mobile-nav-solutions-link block border-b py-4 pb-5 font-body text-[3.519vw] leading-[1.2] no-underline last:border-b-0 last:pb-[0.370vw] sm:text-[3.519vw]"><?php echo trac_esc_html(
    $solution_item['label'],
); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li><a href="<?php echo esc_url(
                        $nav_link_1['link'],
                    ); ?>" class="mobile-nav-link flex min-h-[16.296vw] sm:min-h-[16.481vw] items-center rounded-[1.852vw] bg-brand-tint px-[5.185vw] sm:px-[5.370vw] font-body text-[4.074vw] leading-[1.15] text-[#111111] no-underline hover:text-[#111111]<?php echo $is_nav_1_active
    ? ' is-active-link'
    : ''; ?>"<?php echo $is_nav_1_active
    ? ' aria-current="page"'
    : ''; ?>><?php echo trac_esc_html(
    $nav_link_1['label'],
); ?></a></li>
                    <li><a href="<?php echo esc_url(
                        $nav_link_2['link'],
                    ); ?>" class="mobile-nav-link flex min-h-[16.296vw] sm:min-h-[16.481vw] items-center rounded-[1.852vw] bg-brand-tint px-[5.185vw] sm:px-[5.370vw] font-body text-[4.074vw] leading-[1.15] text-[#111111] no-underline hover:text-[#111111]<?php echo $is_nav_2_active
    ? ' is-active-link'
    : ''; ?>"<?php echo $is_nav_2_active ? ' aria-current="page"' : ''; ?>><?php echo trac_esc_html(
    $nav_link_2['label'],
); ?></a></li>

                </ul>

                <a href="<?php echo esc_url(
                    $trac_header_cta_link,
                ); ?>" class="mt-auto flex min-h-[11.852vw] items-center justify-center rounded-full bg-brand-secondary px-[3.704vw] font-body text-[3.519vw] leading-none text-white text-center no-underline">
                    <?php echo trac_esc_html(
                        $trac_header_cta_text,
                    ); ?>
                </a>

                <div class="flex justify-center gap-[4.074vw] pt-[5.926vw] sm:gap-[3.333vw]">
                    <?php foreach ($trac_mobile_social as $social): ?>
                        <?php if ($social['url'] && $social['icon']): ?>
                            <a href="<?php echo esc_url(
                                $social['url'],
                            ); ?>" target="_blank" rel="noopener noreferrer" class="flex h-[8.148vw] w-[8.148vw] items-center justify-center rounded-full border-[0.278vw] border-[#111111] bg-white first:border-brand-primary" aria-label="<?php echo esc_attr(
                                $social['label'],
                            ); ?>">
                                <img src="<?php echo esc_url(
                                    $social['icon'],
                                ); ?>" alt="social icon" aria-hidden="true" class="h-[4.815vw] w-[4.815vw] object-contain [filter:brightness(0)_saturate(100%)]">
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </nav>
        </div>
    </header>
   <nav
    class="fixed w-[90%] top-[12vw] left-1/2 -translate-x-1/2 rounded-[0.9vw] p-[1.5vw] py-[1.5vw] flex justify-between z-[999] bg-white"
    data-solutions-dropdown
      >
    <?php foreach ($trac_solutions_menu_items as $solution_item): ?>
        <a href="<?php echo esc_url(
            $solution_item['url'],
        ); ?>" class="group w-[24%] h-[12vw] rounded-[0.8vw] bg-white border border-brand-primary pl-[1.5vw] p-[0.8vw] flex flex-col justify-center text-black hover:bg-brand-tertiary hover:border-brand-tertiary hover:text-white duration-300 ease-in-out">
            <div class="w-full flex flex-col gap-[1vw] h-full justify-center">
                <h4 class="text-[1.8vw] font-body"><?php echo trac_esc_html(
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

