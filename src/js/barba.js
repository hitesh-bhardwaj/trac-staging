/**
 * Barba.js Page Transitions
 */

import barba from '@barba/core';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initBarba(app) {
    if (window.barbaInitialized) return;

    barba.init({
        debug: false,
        timeout: 10000,

        prevent: ({ el }) => {
            if (el.classList?.contains('no-barba')) return true;
            if (el.hasAttribute('download')) return true;
            if (el.href?.includes('#')) return true;
            if (el.href?.includes('wp-admin')) return true;
            if (el.href?.includes('wp-login')) return true;
            return false;
        },

        transitions: [
            {
                name: 'default-transition',
                sync: true,

                async before(data) {
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

                    ScrollTrigger.getAll().forEach((trigger) => trigger.kill());

                    data.next.container
                        ?.querySelectorAll('[data-hero-reveal]')
                        .forEach((el) => delete el.dataset.heroAnimated);

                    gsap.set(data.current.container, {
                        position: 'relative',
                        zIndex: 2,
                        transformOrigin: '50% 0%',
                        willChange: 'opacity, transform, filter',
                    });

                    gsap.set(data.next.container, {
                        position: 'absolute',
                        inset: 0,
                        width: '100%',
                        zIndex: 3,
                        opacity: 0,
                        scale: 1.06,
                        filter: 'blur(14px)',
                        transformOrigin: '50% 0%',
                        willChange: 'opacity, transform, filter',
                    });
                },

                async leave(data) {
                    return gsap.to(data.current.container, {
                        opacity: 0,
                        scale: 0.92,
                        filter: 'blur(10px)',
                        duration: 0.38,
                        ease: 'power2.out',
                    });
                },

                async enter(data) {
                    window.scrollTo(0, 0);

                    if (app.lenis) {
                        app.lenis.scrollTo(0, { immediate: true });
                    }

                    const heroItems = Array.from(
                        data.next.container.querySelectorAll(
                            '[data-hero-reveal]',
                        ),
                    );

                    document.documentElement.classList.add(
                        'is-barba-page-enter',
                    );

                    if (heroItems.length) {
                        heroItems.forEach((el) => {
                            gsap.set(el, {
                                opacity: 0,
                                y: 30,
                                willChange: 'transform, opacity',
                            });
                        });
                    }

                    const tl = gsap.timeline();

                    tl.to(
                        data.next.container,
                        {
                            opacity: 1,
                            scale: 1,
                            filter: 'blur(0px)',
                            duration: 0.5,
                            ease: 'power2.out',
                        },
                        0,
                    );

                    if (heroItems.length) {
                        heroItems.forEach((el) => {
                            const delay = parseFloat(
                                el.dataset.heroDelay || '0',
                            );

                            tl.to(
                                el,
                                {
                                    opacity: 1,
                                    y: 0,
                                    duration: 0.65,
                                    ease: 'power3.out',
                                    clearProps: 'willChange',
                                    onComplete: () => {
                                        el.dataset.heroAnimated = 'true';
                                    },
                                },
                                delay + 0.05,
                            );
                        });
                    }

                    return tl;
                },

                async after(data) {
                    gsap.set(data.next.container, {
                        clearProps:
                            'position,inset,width,zIndex,willChange,transformOrigin,filter',
                    });

                    gsap.set(data.current.container, {
                        clearProps:
                            'position,zIndex,willChange,transformOrigin,filter',
                    });

                    await new Promise((resolve) =>
                        requestAnimationFrame(resolve),
                    );

                    if (window.reinitializePageComponents) {
                        window.reinitializePageComponents();
                    }

                    ScrollTrigger.refresh();

                    if (app.lenis) {
                        app.lenis.start();
                    }

                    document.documentElement.classList.remove(
                        'is-barba-page-enter',
                    );

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

    barba.hooks.once(() => {
        console.log('[Barba] Initialized');
    });

    barba.hooks.afterLeave(() => {
        document.querySelectorAll('[data-barba-cleanup]').forEach((el) => {
            const clone = el.cloneNode(true);
            el.parentNode.replaceChild(clone, el);
        });
    });

    window.barbaInitialized = true;
}

export function initPageLoader() {
    const pageLoader = document.querySelector('.page-loader');
    const loader = document.querySelector('.loader');
    const overlayLogo = loader?.querySelector('.overlay-logo');

    if (!loader) {
        console.warn('[Loader] No .loader element found');
        document.dispatchEvent(new CustomEvent('trac:loaded'));
        return;
    }

    gsap.set(pageLoader || loader, {
        opacity: 1,
        visibility: 'visible',
        pointerEvents: 'auto',
    });

    gsap.set(overlayLogo, {
        clipPath: 'inset(0% 100% 0% 0%)',
    });

    let hasHidden = false;

    const hideLoader = () => {
        if (hasHidden) return;
        hasHidden = true;

        gsap.to(pageLoader || loader, {
            opacity: 0,
            duration: 0.45,
            ease: 'power2.inOut',
            onComplete: () => {
                gsap.set(pageLoader || loader, {
                    pointerEvents: 'none',
                    visibility: 'hidden',
                    display: 'none',
                });

                loader.classList.add('is-hidden');
                document.dispatchEvent(new CustomEvent('trac:loaded'));
                console.log('[Loader] trac:loaded event dispatched');
            },
        });
    };

    const introTl = gsap.timeline({
        onComplete: () => {
            if (document.readyState === 'complete') {
                hideLoader();
            }
        },
    });

    introTl.to(overlayLogo, {
        clipPath: 'inset(0% 0% 0% 0%)',
        duration: 1,
        ease: 'power2.inOut',
    });

    if (document.readyState !== 'complete') {
        window.addEventListener(
            'load',
            () => {
                if (introTl.progress() >= 1) {
                    hideLoader();
                } else {
                    introTl.eventCallback('onComplete', hideLoader);
                }
            },
            { once: true },
        );
    }

    setTimeout(() => {
        hideLoader();
    }, 3000);
}