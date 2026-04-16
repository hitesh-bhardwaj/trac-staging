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
    if (!el || !el.href) return false;

    if (el.classList?.contains('no-barba')) return true;
    if (el.hasAttribute('download')) return true;
    if (el.href?.includes('#')) return true;
    if (el.href?.includes('wp-admin')) return true;
    if (el.href?.includes('wp-login')) return true;

    const currentUrl = new URL(window.location.href);
    const targetUrl = new URL(el.href, window.location.origin);

    const normalize = (url) =>
        `${url.origin}${url.pathname.replace(/\/+$/, '') || '/'}`;

    if (normalize(currentUrl) === normalize(targetUrl)) {
        return true;
    }

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
    const loaderDotEls = loader?.querySelectorAll('.loader-dot');

    if (!pageLoader || !loader || !overlayLogo) {
        console.warn('[Loader] Missing loader elements');
        document.dispatchEvent(new CustomEvent('trac:loaded'));
        return;
    }

    gsap.set(pageLoader, {
        visibility: 'visible',
        pointerEvents: 'auto',
        display: 'block',
        clipPath: 'inset(0% 0% 0% 0%)',
        opacity: 1,
    });

    gsap.set(overlayLogo, {
        clipPath: 'inset(0% 100% 0% 0%)',
    });

    if (loaderDotEls?.length) {
        gsap.set(loaderDotEls, {
            opacity: 0,
            yPercent: 40,
        });
    }

    let hasHidden = false;
    let animationDone = false;
    let pageReady = document.readyState === 'complete';
    let minTimeDone = false;
    let dotsTween = null;

    const maybeHideLoader = () => {
        if (!animationDone || !pageReady || !minTimeDone) return;
        hideLoader();
    };

    const hideLoader = () => {
        if (hasHidden) return;
        hasHidden = true;

        if (dotsTween) {
            dotsTween.kill();
            dotsTween = null;
        }

        gsap.to(pageLoader, {
            clipPath: 'inset(0% 0% 100% 0%)',
            duration: 1,
            ease: 'power3.inOut',
            onStart: () => {
                gsap.delayedCall(0.55, () => {
                    document.dispatchEvent(new CustomEvent('trac:loaded'));
                    console.log('[Loader] trac:loaded event dispatched');
                });
            },
            onComplete: () => {
                gsap.set(pageLoader, {
                    pointerEvents: 'none',
                    visibility: 'hidden',
                    display: 'none',
                });

                pageLoader.classList.add('is-hidden');
                loader.classList.add('is-hidden');
            },
        });
    };

    if (loaderDotEls?.length) {
        dotsTween = gsap.timeline({
            repeat: -1,
            repeatDelay: 0.12,
        });

        dotsTween
            .to(loaderDotEls, {
                opacity: 1,
                yPercent: 0,
                duration: 0.32,
                stagger: 0.08,
                ease: 'power2.out',
            })
            .to(
                loaderDotEls,
                {
                    opacity: 0,
                    yPercent: -20,
                    duration: 0.26,
                    stagger: 0.06,
                    ease: 'power2.in',
                },
                '+=0.18',
            );
    }

    // const introTl = gsap.timeline({
    //     onComplete: () => {
    //         animationDone = true;
    //         maybeHideLoader();
    //     },
    // });

    // introTl
    //     .to(overlayLogo, {
    //         clipPath: 'inset(0% 70% 0% 0%)',
    //         duration: 0.6,
    //         ease: 'power2.inOut',
    //     })
    //     .to({}, { duration: 0.08 })
    //     .to(overlayLogo, {
    //         clipPath: 'inset(0% 20% 0% 0%)',
    //         duration: 2.2,
    //         ease: 'power2.inOut',
    //     })
    //     .to({}, { duration: 0.08 })
    //     .to(overlayLogo, {
    //         clipPath: 'inset(0% 0% 0% 0%)',
    //         duration: 0.7,
    //         ease: 'power2.inOut',
    //     });

    gsap.delayedCall(0, () => {
        minTimeDone = true;
        maybeHideLoader();
    });

    if (!pageReady) {
        window.addEventListener(
            'load',
            () => {
                pageReady = true;
                maybeHideLoader();
            },
            { once: true },
        );
    }

    setTimeout(() => {
        pageReady = true;
        animationDone = true;
        minTimeDone = true;
        maybeHideLoader();
    }, 1000);
}
