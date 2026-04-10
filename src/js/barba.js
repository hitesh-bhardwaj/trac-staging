/**
 * Barba.js Page Transitions
 *
 * Handles smooth page transitions with proper loader integration
 */

import barba from '@barba/core';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

/**
 * Initialize Barba.js with page transitions
 */
export function initBarba(app) {
    // Don't initialize if Barba is already running
    if (window.barbaInitialized) return;

    barba.init({
        debug: false,
        timeout: 10000,
        prevent: ({ el }) => {
            // Prevent Barba on specific links
            if (el.classList?.contains('no-barba')) return true;
            if (el.hasAttribute('download')) return true;
            if (el.href?.includes('#')) return true; // Keep anchor links normal
            if (el.href?.includes('wp-admin')) return true;
            if (el.href?.includes('wp-login')) return true;
            return false;
        },

        transitions: [
            {
                name: 'default-transition',

                // Before leaving current page
                async leave(data) {
                    const loader = document.querySelector('.page-loader');

                    // Show loader
                    if (loader) {
                        gsap.set(loader, { display: 'flex' });
                        await gsap.to(loader, {
                            opacity: 1,
                            duration: 0.3,
                            ease: 'power2.inOut',
                        });
                    }

                    // Stop Lenis scroll
                    if (app.lenis) {
                        app.lenis.stop();
                    }
                    if (app.networkInstances && app.networkInstances.length) {
                        app.networkInstances.forEach((instance) => {
                            if (!instance) return;

                            if (typeof instance.destroy === 'function') {
                                instance.destroy();
                            } else if (typeof instance.dispose === 'function') {
                                instance.dispose();
                            }
                        });

                        app.networkInstances = [];
                    }

                    // Fade out current page content
                    await gsap.to(data.current.container, {
                        opacity: 0,
                        y: -50,
                        duration: 0.4,
                        ease: 'power2.in',
                    });
                },

                // After new page HTML is fetched
                async enter(data) {
                    // Scroll to top
                    window.scrollTo(0, 0);
                    if (app.lenis) {
                        app.lenis.scrollTo(0, { immediate: true });
                    }

                    // Reset new page container
                    gsap.set(data.next.container, {
                        opacity: 0,
                        y: 50,
                    });

                    // Kill all ScrollTrigger instances from previous page
                    ScrollTrigger.getAll().forEach((trigger) => trigger.kill());

                    // Fade in new page
                    await gsap.to(data.next.container, {
                        opacity: 1,
                        y: 0,
                        duration: 0.5,
                        ease: 'power2.out',
                    });

                    // Hide loader
                    const loader = document.querySelector('.page-loader');
                    if (loader) {
                        await gsap.to(loader, {
                            opacity: 0,
                            duration: 0.3,
                            ease: 'power2.inOut',
                            onComplete: () => {
                                gsap.set(loader, { display: 'none' });
                            },
                        });
                    }
                },

                // After everything is done
                async after(data) {
                    if (app.lenis) {
                        app.lenis.start();
                    }

                    await new Promise((resolve) =>
                        requestAnimationFrame(resolve),
                    );
                    await new Promise((resolve) =>
                        requestAnimationFrame(resolve),
                    );

                    if (window.reinitializePageComponents) {
                        window.reinitializePageComponents();
                    }

                    ScrollTrigger.refresh();

                    console.log('[Barba] Transition complete');
                },
            },
        ],

        views: [
            {
                namespace: 'home',
                beforeEnter() {
                    console.log('[Barba] Entering homepage');
                },
            },
        ],
    });

    // Handle Barba errors
    barba.hooks.once(() => {
        console.log('[Barba] Initialized');
    });

    barba.hooks.afterLeave(() => {
        // Clean up any page-specific event listeners
        document.querySelectorAll('[data-barba-cleanup]').forEach((el) => {
            const clone = el.cloneNode(true);
            el.parentNode.replaceChild(clone, el);
        });
    });

    window.barbaInitialized = true;
}

/**
 * Initial page load animation
 */
export function initPageLoader() {
    const loader = document.querySelector('.page-loader');

    if (!loader) {
        console.warn('[Loader] No .page-loader element found');
        // Dispatch event anyway so page doesn't stay hidden
        document.dispatchEvent(new CustomEvent('trac:loaded'));
        return;
    }

    // Show loader initially
    gsap.set(loader, { display: 'flex', opacity: 1 });

    const hideLoader = () => {
        gsap.to(loader, {
            opacity: 0,
            duration: 0.6,
            delay: 0.3,
            ease: 'power2.inOut',
            onComplete: () => {
                gsap.set(loader, { display: 'none' });
                loader.classList.add('is-loaded');
                document.dispatchEvent(new CustomEvent('trac:loaded'));
                console.log('[Loader] trac:loaded event dispatched');
            },
        });
    };

    // Hide loader when page is ready
    if (document.readyState === 'complete') {
        // Page already loaded
        hideLoader();
    } else {
        window.addEventListener('load', hideLoader);
    }

    // Fallback: dispatch event after 3 seconds max
    setTimeout(() => {
        if (!loader.classList.contains('is-loaded')) {
            console.warn('[Loader] Fallback timeout - forcing trac:loaded');
            document.dispatchEvent(new CustomEvent('trac:loaded'));
        }
    }, 3000);

    console.log('[Loader] Page loader initialized');
}
