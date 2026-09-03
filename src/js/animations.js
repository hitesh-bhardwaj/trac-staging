/**
 * Trac Theme - GSAP Animations
 *
 * All scroll-triggered animations using GSAP ScrollTrigger
 */

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
// import { initTeamSlider } from './team-slider';
gsap.registerPlugin(ScrollTrigger);

/**
 * Default animation settings
 */
const defaults = {
    duration: 1,
    ease: 'power3.out',
    stagger: 0.1,
};

/**
 * Initialize all animations
 */
export function initAnimations() {
    // Basic fade animations
    initBarbaSyncedHeroReveal();
    initFadeAnimations();
    initHeroAnimations();
    initSectionAnimations();
    initParallaxAnimations();
    initHiInstallationScroll();
    initTextAnimations();
    initParagraphLineReveal();
    initHeadingLineReveal();
    initPartnersProgramCards();
    initHomeInternetWhyTrac();
    initSmeProblemStatement();
    initPartnerVoicesSlider();
    initTeamSlider();
    initStackingCards();
    initTestimonialsSlider();
    initWhoWeAreSlider();
    initWhoWeAreCounters();
    initWhatWeDoSlider();
    initTracStoryTimeline();
    initOurNetworkAnimation();
    initOurNetworkPointers();
    initWhyTracCircles();
    initWhyTracScrollStory();
    initCtaLineAnimation();
    initCommunityHubCards();
    initImpactGallery();
    initParallaxImgSlider();
    initFooterOverlayFade();
    initOurOfferingAccordion();
    initWhyChooseTracCards();
    initSolutionOverviewStack();
    initConnectorSvgAnimation();

    // Refresh ScrollTrigger after all animations are set up
    ScrollTrigger.refresh();

    console.log('[Trac] Animations initialized');
}

// Lightweight helper for reduced-motion (or when you want to just "show" the hero instantly).
export function revealHeroContent(scope = document, options = {}) {
    initBarbaSyncedHeroReveal(scope, options);
}

function initCommunityHubCards() {
    const section = document.querySelector('.community-hub-section');
    if (!section || window.innerWidth <= 1024) return;

    const cards = Array.from(
        section.querySelectorAll('[data-community-hub-card]'),
    );

    if (cards.length < 5) return;

    const prefersReducedMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)',
    ).matches;

    if (prefersReducedMotion) {
        gsap.set(cards, { clearProps: 'transform' });
        return;
    }

    const [outerLeft, innerLeft, center, innerRight, outerRight] = cards;

    ScrollTrigger.getAll().forEach((trigger) => {
        if (trigger.vars?.id === 'community-hub-cards') {
            trigger.kill();
        }
    });

    gsap.killTweensOf(cards);

    gsap.set(outerLeft, {
        x: 0,
        y: '80%',
    });

    gsap.set(innerLeft, {
        x: 0,
        y: '40%',
    });

    gsap.set(center, {
        x: 0,
        y: 0,
    });

    gsap.set(innerRight, {
        x: 0,
        y: '40%',
    });

    gsap.set(outerRight, {
        x: 0,
        y: '80%',
    });

    const tl = gsap.timeline({
        scrollTrigger: {
            id: 'community-hub-cards',
            trigger: section,
            start: 'top 80%',
            end: 'bottom 50%',
            scrub: 0.35,
            invalidateOnRefresh: true,
        },
    });

    tl.to(
        [innerLeft, innerRight],
        {
            y: 0,
            duration: 1,
            ease: 'none',
        },
        0,
    ).to(
        [outerLeft, outerRight],
        {
            y: 0,
            duration: 1,
            ease: 'none',
        },
        0,
    );
}

function initBarbaSyncedHeroReveal(scope = document, options = {}) {
    const { skipAnimation = false } = options;
    const heroItems = Array.from(scope.querySelectorAll('[data-hero-reveal]'));
    if (!heroItems.length) return;

    heroItems.forEach((el) => {
        gsap.killTweensOf(el);

        if (el.dataset.heroAnimated === 'true') {
            gsap.set(el, {
                opacity: 1,
                y: 0,
                clearProps: 'willChange',
            });
            if (el.hasAttribute('data-heading-anim')) {
                const lines = Array.from(
                    el.querySelectorAll('.hero-title-line'),
                );
                if (lines.length) {
                    gsap.set(lines, {
                        WebkitMaskPosition: '0% 100%',
                        maskPosition: '0% 100%',
                    });
                }
            }
            if (el.hasAttribute('data-para-anim')) {
                el.style.visibility = 'visible';
            }
            el.classList.add('is-hero-revealed');
            return;
        }

        if (skipAnimation) {
            gsap.set(el, {
                opacity: 1,
                y: 0,
                clearProps: 'willChange',
            });
            if (el.hasAttribute('data-heading-anim')) {
                const lines = Array.from(
                    el.querySelectorAll('.hero-title-line'),
                );
                if (lines.length) {
                    gsap.set(lines, {
                        WebkitMaskPosition: '0% 100%',
                        maskPosition: '0% 100%',
                    });
                }
            }
            if (el.hasAttribute('data-para-anim')) {
                el.style.visibility = 'visible';
            }
            el.dataset.heroAnimated = 'true';
            el.classList.add('is-hero-revealed');
            return;
        }

        const delay = parseFloat(el.dataset.heroDelay || '0');

        // If a hero element also opts into our line-based text reveals, run those immediately
        // (no ScrollTrigger) so the text never "shows first then animates".
        if (el.hasAttribute('data-heading-anim')) {
            const lines = Array.from(el.querySelectorAll('.hero-title-line'));
            // Ensure mask styles apply even before initHeadingLineReveal runs.
            lines.forEach((line) => line.classList.add('heading-line'));

            // The reveal motion here is carried by the mask wipe + blur below; this only
            // needs to clear this element's own hidden state (opacity is handled by the
            // fromTo below, but `y` is never touched otherwise) left by barba's `enter()`
            // on nav (same issue as the `data-para-anim` branch further down).
            gsap.set(el, { y: 0, clearProps: 'willChange' });

            const prefersReducedMotion = window.matchMedia(
                '(prefers-reduced-motion: reduce)',
            ).matches;

            // Subtle defaults (same as non-hero `data-heading-anim`)
            const duration = parseFloat(el.dataset.duration || '1.6') || 1.6;
            const stagger = parseFloat(el.dataset.stagger || '0.14') || 0.14;
            const baseDelay =
                parseFloat(el.dataset.baseDelay || '0.05') || 0.05;

            if (!prefersReducedMotion && lines.length) {
                gsap.set(lines, {
                    WebkitMaskPosition: '100% 100%',
                    maskPosition: '100% 100%',
                    willChange: 'mask-position',
                });

                // Sync a blur-to-sharp reveal with the same timing as the mask wipe.
                const tl = gsap.timeline({
                    delay: baseDelay + delay,
                    defaults: { ease: 'power3.out', overwrite: 'auto' },
                });

                tl.fromTo(
                    el,
                    { filter: 'blur(12px)', opacity: 1 },
                    {
                        filter: 'blur(0px)',
                        duration: Math.max(0.7, duration * 0.65),
                        ease: 'power2.out',
                        clearProps: 'filter',
                    },
                    0,
                );

                tl.to(
                    lines,
                    {
                        WebkitMaskPosition: '0% 100%',
                        maskPosition: '0% 100%',
                        duration,
                        stagger,
                        onComplete: () => {
                            gsap.set(lines, { clearProps: 'willChange' });
                        },
                    },
                    0,
                );
            }

            el.dataset.heroAnimated = 'true';
            el.classList.add('is-hero-revealed');
            return;
        }

        if (el.hasAttribute('data-para-anim')) {
            // Run the paragraph line reveal immediately for hero copy.
            const escapeHtml = (str) =>
                str
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');

            const SplitInLine = (node) => {
                if (node.dataset.paraSplit === 'true') return;

                const words = [];
                const collectWords = (n) => {
                    n.childNodes.forEach((child) => {
                        if (child.nodeType === Node.TEXT_NODE) {
                            (child.textContent || '')
                                .split(/\s+/)
                                .filter(Boolean)
                                .forEach((w) => words.push(w));
                        } else if (child.tagName === 'BR') {
                            words.push('\n');
                        } else {
                            collectWords(child);
                        }
                    });
                };
                collectWords(node);
                if (!words.length) return;

                node.innerHTML = '';
                let afterForcedBreak = false;
                words.forEach((w, idx) => {
                    if (w === '\n') {
                        node.appendChild(document.createElement('br'));
                        afterForcedBreak = true;
                        return;
                    }
                    const span = document.createElement('span');
                    span.className = 'para-word';
                    span.innerHTML = escapeHtml(w);
                    if (afterForcedBreak) {
                        span.dataset.afterBreak = 'true';
                        afterForcedBreak = false;
                    }
                    node.appendChild(span);
                    if (idx !== words.length - 1 && words[idx + 1] !== '\n') {
                        node.appendChild(document.createTextNode(' '));
                    }
                });

                const wordEls = Array.from(node.querySelectorAll('.para-word'));
                if (!wordEls.length) return;

                const lines = [];
                let current = [];
                let currentTop = null;

                wordEls.forEach((w) => {
                    const top = w.offsetTop;
                    if (currentTop === null) {
                        currentTop = top;
                        current = [w];
                        return;
                    }
                    if (Math.abs(top - currentTop) > 2) {
                        lines.push(current);
                        currentTop = top;
                        current = [w];
                    } else {
                        current.push(w);
                    }
                });
                if (current.length) lines.push(current);

                node.innerHTML = '';
                lines.forEach((wordLine) => {
                    const wrap = document.createElement('span');
                    wrap.className = 'para-line';
                    if (wordLine[0]?.dataset.afterBreak === 'true') {
                        wrap.classList.add('para-line-break');
                    }

                    const inner = document.createElement('span');
                    inner.className = 'line-internal';

                    wordLine.forEach((w, idx) => {
                        inner.appendChild(w);
                        if (idx !== wordLine.length - 1) {
                            inner.appendChild(document.createTextNode(' '));
                        }
                    });

                    wrap.appendChild(inner);
                    node.appendChild(wrap);
                });

                node.dataset.paraSplit = 'true';
            };

            const duration = parseFloat(el.dataset.duration || '1.2') || 1.2;
            const stagger = parseFloat(el.dataset.stagger || '0.07') || 0.07;
            const localDelay = parseFloat(el.dataset.delay || '0') || 0;

            // Avoid first paint flash by splitting while hidden (CSS also covers this for heroes).
            el.style.visibility = 'hidden';
            SplitInLine(el);
            const paraLine = Array.from(el.querySelectorAll('.line-internal'));
            // Force visible so it overrides any lingering CSS hide rules.
            el.style.visibility = 'visible';
            // The reveal motion itself is carried by the inner `.line-internal` spans below;
            // this only needs to clear the outer element's own hidden state (opacity:0, y:30,
            // set by barba's `enter()` on nav) since nothing else does it once mask/blur or
            // barba's own per-item tween isn't the one owning this element.
            gsap.set(el, { opacity: 1, y: 0, clearProps: 'willChange' });

            const prefersReducedMotion = window.matchMedia(
                '(prefers-reduced-motion: reduce)',
            ).matches;

            if (!prefersReducedMotion && paraLine.length) {
                gsap.set(paraLine, { yPercent: 100, willChange: 'transform' });
                gsap.to(paraLine, {
                    yPercent: 0,
                    duration,
                    stagger,
                    delay: delay + localDelay,
                    ease: 'power3.out',
                    overwrite: 'auto',
                    onComplete: () => {
                        gsap.set(paraLine, { clearProps: 'willChange' });
                    },
                });
            }

            el.dataset.heroAnimated = 'true';
            el.classList.add('is-hero-revealed');
            return;
        }

        gsap.fromTo(
            el,
            {
                opacity: 0,
                y: 30,
            },
            {
                opacity: 1,
                y: 0,
                duration: 0.7,
                delay,
                ease: 'power3.out',
                overwrite: true,
                onComplete: () => {
                    el.dataset.heroAnimated = 'true';
                    el.classList.add('is-hero-revealed');
                    gsap.set(el, { clearProps: 'willChange' });
                },
            },
        );
    });

    console.log('[Trac] Hero reveal initialized');
}

function initImpactGallery() {
    const section = document.querySelector('.impact-gallery-section');
    if (!section || window.innerWidth <= 1024) return;

    const images = Array.from(section.querySelectorAll('[data-impact-image]'));
    if (images.length !== 6) return;

    const titleSecondary = section.querySelector(
        '.impact-gallery-title__secondary',
    );

    const prefersReducedMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)',
    ).matches;

    const stripStates = [
        {
            left: '42%',
            top: '105%',
            width: '8.6%',
            height: '11.2%',
            rotation: -7,
        },
        {
            left: '46%',
            top: '104.5%',
            width: '7.9%',
            height: '10.4%',
            rotation: -4,
        },
        {
            left: '50%',
            top: '105%',
            width: '7.2%',
            height: '9.8%',
            rotation: 6,
        },
        {
            left: '54%',
            top: '104.5%',
            width: '7.9%',
            height: '10.4%',
            rotation: -6,
        },
        {
            left: '58%',
            top: '105%',
            width: '8.8%',
            height: '11.8%',
            rotation: 8,
        },
        {
            left: '62%',
            top: '105%',
            width: '8.8%',
            height: '11.8%',
            rotation: 5,
        },
    ];

    const finalStates = [
        {
            left: '5.5%',
            top: '3%',
            width: '24.5%',
            height: '28.1%',
            rotation: -3.4,
        },
        {
            left: '6.2%',
            top: '22.8%',
            width: '16.6%',
            height: '24.1%',
            rotation: -3.4,
        },
        {
            left: '76.8%',
            top: '5.2%',
            width: '13.2%',
            height: '28.3%',
            rotation: 7.5,
        },
        {
            left: '75.1%',
            top: '33.4%',
            width: '16.8%',
            height: '23.2%',
            rotation: -5.8,
        },
        {
            left: '9.1%',
            top: '61.7%',
            width: '23.1%',
            height: '33.7%',
            rotation: 8.3,
        },
        {
            left: '67.4%',
            top: '68.6%',
            width: '23.1%',
            height: '33.7%',
            rotation: 8.3,
        },
    ];

    if (prefersReducedMotion) {
        images.forEach((image, index) => {
            const state = finalStates[index];
            gsap.set(image, {
                left: state.left,
                top: state.top,
                width: state.width,
                height: state.height,
                rotation: state.rotation,
                xPercent: 0,
                yPercent: 0,
            });
        });
        if (titleSecondary) {
            gsap.set(titleSecondary, { '--impact-fill': '100%' });
        }
        return;
    }

    images.forEach((image, index) => {
        const stripState = stripStates[index];
        gsap.set(image, {
            left: stripState.left,
            top: stripState.top,
            width: stripState.width,
            height: stripState.height,
            rotation: stripState.rotation,
            xPercent: -50,
            yPercent: -100,
        });
    });

    const timeline = gsap.timeline({
        scrollTrigger: {
            trigger: section,
            start: '5% top',
            end: 'bottom bottom',
            scrub: 0.25,
        },
    });

    if (titleSecondary) {
        timeline.to(
            titleSecondary,
            {
                '--impact-fill': '100%',
                duration: 1,
                ease: 'none',
            },
            0,
        );
    }

    timeline.to(
        [images[0], images[2]],
        {
            left: (index) => finalStates[index === 0 ? 0 : 2].left,
            top: (index) => finalStates[index === 0 ? 0 : 2].top,
            width: (index) => finalStates[index === 0 ? 0 : 2].width,
            height: (index) => finalStates[index === 0 ? 0 : 2].height,
            rotation: (index) => finalStates[index === 0 ? 0 : 2].rotation,
            xPercent: 0,
            yPercent: 0,
            duration: 0.34,
            ease: 'none',
            stagger: 0.06,
        },
        0,
    );

    timeline.to(
        [images[1], images[3]],
        {
            left: (index) => finalStates[index === 0 ? 1 : 3].left,
            top: (index) => finalStates[index === 0 ? 1 : 3].top,
            width: (index) => finalStates[index === 0 ? 1 : 3].width,
            height: (index) => finalStates[index === 0 ? 1 : 3].height,
            rotation: (index) => finalStates[index === 0 ? 1 : 3].rotation,
            xPercent: 0,
            yPercent: 0,
            duration: 0.34,
            ease: 'none',
            stagger: 0.06,
        },
        0.33,
    );

    timeline.to(
        [images[4], images[5]],
        {
            left: (index) => finalStates[index === 0 ? 4 : 5].left,
            top: (index) => finalStates[index === 0 ? 4 : 5].top,
            width: (index) => finalStates[index === 0 ? 4 : 5].width,
            height: (index) => finalStates[index === 0 ? 4 : 5].height,
            rotation: (index) => finalStates[index === 0 ? 4 : 5].rotation,
            xPercent: 0,
            yPercent: 0,
            duration: 0.34,
            ease: 'none',
            stagger: 0.06,
        },
        0.66,
    );
}

/**
 * Partners page: Partner Program card slide-in (right -> center), staggered.
 * Uses ScrollTrigger directly (not the generic [data-animate] system).
 */
function initPartnersProgramCards() {
    const section = document.querySelector('.partners-program');
    if (!section) return;

    const wrappers = Array.from(section.querySelectorAll('.program-cards'));
    if (!wrappers.length) return;

    const setInitialWidths = () => {
        wrappers.forEach((wrapper) => {
            gsap.set(wrapper, { clearProps: 'width' });

            const currentWidth = wrapper.offsetWidth;

            gsap.set(wrapper, {
                width: currentWidth,
            });
        });
    };

    setInitialWidths();

    wrappers.forEach((wrapper, index) => {
        gsap.to(wrapper, {
            width: () => {
                const parent = wrapper.parentElement;
                return parent ? parent.clientWidth : section.clientWidth;
            },
            ease: 'power1.out',
            scrollTrigger: {
                trigger: wrapper,
                start: `top bottom`,
                end: `bottom top`,
                scrub: true,
                // markers:true,
                invalidateOnRefresh: true,
            },
        });
    });

    ScrollTrigger.addEventListener('refreshInit', setInitialWidths);

    console.log('[Trac] Partners program cards initialized');
}

/**
 * Home Internet page: "Why TrAC" list pills slide from right -> final position on scroll.
 * Left-side content uses the generic [data-animate="fade-up"] system.
 */
function initHomeInternetWhyTrac() {
    const section = document.querySelector('[data-hi-why]');
    if (!section) return;
    if (section.dataset.hiWhyInit === 'true') return;

    const items = Array.from(section.querySelectorAll('[data-hi-why-item]'));
    if (!items.length) return;

    section.dataset.slideRightInit = 'true';

    items.forEach((el) => {
        gsap.fromTo(
            el,
            { x: dist, opacity: 0 },
            {
                x: 0,
                opacity: 1,
                ease: 'none',
                overwrite: 'auto',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 85%',
                    end: 'top 70%',
                    scrub: 0.6,
                },
            },
        );
    });
}

export function initConnectorSvgAnimation() {
    const wrappers = document.querySelectorAll('.connectors-svg');

    if (!wrappers.length) return;

    wrappers.forEach((wrapper) => {
        if (wrapper.dataset.connectorAnimationInit === 'true') return;

        wrapper.dataset.connectorAnimationInit = 'true';

        const svg = wrapper.querySelector('svg');

        if (!svg || typeof gsap === 'undefined') return;

        const allPaths = Array.from(svg.querySelectorAll('path'));

        const whiteLinePaths = allPaths.filter((path) => {
            const stroke = path.getAttribute('stroke');
            return stroke && stroke.toLowerCase() === 'white';
        });

        const orangePointStrokePaths = allPaths.filter((path) => {
            const stroke = path.getAttribute('stroke');
            const strokeWidth = path.getAttribute('stroke-width');

            return (
                stroke &&
                stroke.toLowerCase() === '#e86224' &&
                Number.parseFloat(strokeWidth) === 0.948993
            );
        });

        const orangeFillPaths = allPaths.filter((path) => {
            const fill = path.getAttribute('fill');
            return fill && fill.toLowerCase() === '#e86224';
        });

        // Orange filled dots should stay visible always.
        gsap.set(orangeFillPaths, {
            opacity: 1,
        });

        // White connector lines: hidden initially, then randomly draw and erase.
        whiteLinePaths.forEach((path) => {
            const length = path.getTotalLength();

            path.dataset.pathLength = length;

            gsap.set(path, {
                strokeDasharray: length,
                strokeDashoffset: length,
                opacity: 0,
            });
        });

        // Orange outlined point paths: subtle random scale-down pulse.
        gsap.set(orangePointStrokePaths, {
            transformOrigin: '50% 50%',
            transformBox: 'fill-box',
        });

        function animateWhitePath(path) {
            const length = Number(path.dataset.pathLength);

            if (!length) return;

            gsap.killTweensOf(path);

            const delayBeforeStart = gsap.utils.random(0.2, 3.2);
            const drawDuration = gsap.utils.random(1.4, 2.6);
            const holdDuration = gsap.utils.random(0.8, 1.4);
            const eraseDuration = gsap.utils.random(1.2, 2.2);
            const delayBeforeRepeat = gsap.utils.random(1.0, 4.0);

            const tl = gsap.timeline({
                delay: delayBeforeStart,
                onComplete: () => {
                    gsap.delayedCall(delayBeforeRepeat, () => {
                        animateWhitePath(path);
                    });
                },
            });

            tl.set(path, {
                strokeDasharray: length,
                strokeDashoffset: length,
                opacity: 1,
            });

            // Draw from start to end.
            tl.to(path, {
                strokeDashoffset: 0,
                duration: drawDuration,
                ease: 'power2.inOut',
            });

            // Hold for around 1 second.
            tl.to(path, {
                strokeDashoffset: 0,
                duration: holdDuration,
                ease: 'none',
            });

            // Erase from start to end.
            tl.to(path, {
                strokeDashoffset: -length,
                duration: eraseDuration,
                ease: 'power2.inOut',
            });

            tl.to(
                path,
                {
                    opacity: 0,
                    duration: 0.25,
                    ease: 'power1.out',
                },
                '-=0.15',
            );
        }

        whiteLinePaths.forEach((path) => {
            animateWhitePath(path);
        });
    });
}

/**
 * SME Internet: Problem Statement rows slide from right to a centered final layout.
 * Each row has a small final offset (`data-offset-vw`) to create the diagonal rhythm.
 */
function initSmeProblemStatement() {
    const section = document.querySelector('[data-sme-problem]');
    if (!section) return;
    if (section.dataset.smeProblemInit === 'true') return;

    const items = Array.from(
        section.querySelectorAll('[data-sme-problem-item]'),
    );
    if (!items.length) return;

    section.dataset.smeProblemInit = 'true';

    const dist = window.innerWidth <= 768 ? 56 : 220;

    items.forEach((el) => {
        gsap.fromTo(
            el,
            { x: dist, opacity: 0 },
            {
                x: 0,
                opacity: 1,
                ease: 'none',
                overwrite: 'auto',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 85%',
                    end: 'top 70%',
                    scrub: 0.6,
                },
            },
        );
    });
}

/**
 * Paragraph line-by-line reveal (y -> 0) using overflow-hidden line masks.
 * Triggered by `data-para-anim`.
 *
 * Based on the user's reference:
 * SplitInLine(el); gsap.from(".line-internal", { yPercent: 100, stagger: 0.07, duration: 1.2, start: "top 90%" })
 */
function initParagraphLineReveal(scope = null) {
    const root =
        scope ||
        document.querySelector('[data-barba="container"]') ||
        document.body ||
        document.documentElement;

    const paras = Array.from(root.querySelectorAll('[data-para-anim]')).filter(
        (el) => {
            // Horizontal "Why TrAC" sections animate via containerAnimation; skip here to avoid non-firing vertical triggers.
            const why = el.closest('.why-trac-section[data-horizontal-scroll]');
            // Hero copy is handled by `data-hero-reveal` to avoid "shows first then animates".
            const isHero = el.closest('[data-hero-static]');
            const isHeroReveal = el.hasAttribute('data-hero-reveal');
            return !why && !isHero && !isHeroReveal;
        },
    );
    if (!paras.length) return;

    // Prevent double-init on the same container; avoids "shows once then animates again".
    if (root.dataset && root.dataset.paraAnimInit === 'true') return;
    if (root.dataset) root.dataset.paraAnimInit = 'true';

    const escapeHtml = (str) =>
        str
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');

    // Equivalent to the user's SplitInLine helper. Walks child nodes (rather than
    // flattening to textContent) so a literal <br> in the source survives as a
    // forced line break instead of being silently discarded.
    const SplitInLine = (el) => {
        if (el.dataset.paraSplit === 'true') return;

        const words = [];
        const collectWords = (node) => {
            node.childNodes.forEach((child) => {
                if (child.nodeType === Node.TEXT_NODE) {
                    (child.textContent || '')
                        .split(/\s+/)
                        .filter(Boolean)
                        .forEach((w) => words.push(w));
                } else if (child.tagName === 'BR') {
                    words.push('\n');
                } else {
                    collectWords(child);
                }
            });
        };
        collectWords(el);
        if (!words.length) return;

        // Build DOM with normal spaces (not &nbsp;) to avoid overflow/clipping after we "lock" words into lines.
        el.innerHTML = '';
        let afterForcedBreak = false;
        words.forEach((w, idx) => {
            if (w === '\n') {
                el.appendChild(document.createElement('br'));
                afterForcedBreak = true;
                return;
            }
            const span = document.createElement('span');
            span.className = 'para-word';
            span.innerHTML = escapeHtml(w);
            if (afterForcedBreak) {
                span.dataset.afterBreak = 'true';
                afterForcedBreak = false;
            }
            el.appendChild(span);
            if (idx !== words.length - 1 && words[idx + 1] !== '\n') {
                el.appendChild(document.createTextNode(' '));
            }
        });

        const wordEls = Array.from(el.querySelectorAll('.para-word'));
        if (!wordEls.length) return;

        // Group words by their rendered line (offsetTop).
        const lines = [];
        let current = [];
        let currentTop = null;

        wordEls.forEach((w) => {
            const top = w.offsetTop;
            if (currentTop === null) {
                currentTop = top;
                current = [w];
                return;
            }
            if (Math.abs(top - currentTop) > 2) {
                lines.push(current);
                currentTop = top;
                current = [w];
            } else {
                current.push(w);
            }
        });
        if (current.length) lines.push(current);

        // Rebuild DOM into overflow-hidden line masks.
        el.innerHTML = '';
        lines.forEach((wordLine) => {
            const wrap = document.createElement('span');
            wrap.className = 'para-line';
            if (wordLine[0]?.dataset.afterBreak === 'true') {
                wrap.classList.add('para-line-break');
            }

            const inner = document.createElement('span');
            inner.className = 'line-internal';

            wordLine.forEach((w, idx) => {
                inner.appendChild(w);
                if (idx !== wordLine.length - 1) {
                    inner.appendChild(document.createTextNode(' '));
                }
            });
            wrap.appendChild(inner);
            el.appendChild(wrap);
        });

        el.dataset.paraSplit = 'true';
    };

    root._paraCtx = gsap.context(() => {
        const paraAnimations = paras;

        paraAnimations.forEach((paraAnimation) => {
            SplitInLine(paraAnimation);
            const paraLine = paraAnimation.querySelectorAll('.line-internal');
            if (!paraLine.length) return;

            const delay = parseFloat(paraAnimation.dataset.delay) || 0;
            const duration = parseFloat(paraAnimation.dataset.duration) || 1.2;
            const stagger = parseFloat(paraAnimation.dataset.stagger) || 0.07;

            gsap.from(paraLine, {
                scrollTrigger: {
                    trigger: paraAnimation,
                    start: 'top 90%',
                    once: true,
                },
                duration,
                delay,
                yPercent: 100,
                stagger,
                ease: 'power3.out',
                overwrite: 'auto',
            });
        });
    }, root);
}

/**
 * Heading reveal using a horizontal CSS-mask wipe per line.
 * Triggered by `data-heading-anim`.
 *
 * Reference behavior based on the user's SplitText + maskPosition tween.
 * We support:
 * - Existing manual line wrappers (e.g. `.hero-title-line` spans)
 * - Auto splitting text into visual lines (simple word-wrap measurement)
 */
function initHeadingLineReveal(scope = null) {
    const root =
        scope ||
        document.querySelector('[data-barba="container"]') ||
        document.body ||
        document.documentElement;

    const headings = Array.from(
        root.querySelectorAll('[data-heading-anim]'),
    ).filter((el) => {
        // Hero headings are handled by `data-hero-reveal`.
        const isHero = el.closest('[data-hero-static]');
        const isHeroReveal = el.hasAttribute('data-hero-reveal');
        return !isHero && !isHeroReveal;
    });
    if (!headings.length) return;

    // Prevent double-init per container.
    if (root.dataset && root.dataset.headingAnimInit === 'true') return;
    if (root.dataset) root.dataset.headingAnimInit = 'true';

    const prefersReducedMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)',
    ).matches;

    const waitForFonts = async () => {
        if (document.fonts && document.fonts.ready) {
            try {
                await document.fonts.ready;
            } catch (_) {}
        }
    };

    const escapeHtml = (str) =>
        str
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');

    const splitHeadingIntoLines = (el) => {
        if (el.dataset.headingSplit === 'true') {
            return Array.from(el.querySelectorAll('.heading-line'));
        }

        // If markup already provides line wrappers, just tag them.
        const manual = Array.from(el.querySelectorAll('.hero-title-line'));
        if (manual.length) {
            manual.forEach((line) => {
                line.classList.add('heading-line');
            });
            el.dataset.headingSplit = 'true';
            return manual;
        }

        // Otherwise: build spans per word and group by rendered line.
        const raw = (el.textContent || '').trim();
        if (!raw) return [];

        const words = raw.split(/\s+/);
        el.innerHTML = '';
        words.forEach((w, idx) => {
            const span = document.createElement('span');
            span.className = 'heading-word';
            span.innerHTML = escapeHtml(w);
            el.appendChild(span);
            if (idx !== words.length - 1) {
                el.appendChild(document.createTextNode(' '));
            }
        });

        const wordEls = Array.from(el.querySelectorAll('.heading-word'));
        if (!wordEls.length) return [];

        const lines = [];
        let current = [];
        let currentTop = null;

        wordEls.forEach((w) => {
            const top = w.offsetTop;
            if (currentTop === null) {
                currentTop = top;
                current = [w];
                return;
            }
            if (Math.abs(top - currentTop) > 2) {
                lines.push(current);
                currentTop = top;
                current = [w];
            } else {
                current.push(w);
            }
        });
        if (current.length) lines.push(current);

        // Rebuild as line blocks so the mask can animate per line.
        el.innerHTML = '';
        lines.forEach((wordLine) => {
            const wrap = document.createElement('span');
            wrap.className = 'heading-line-wrap';

            const line = document.createElement('span');
            line.className = 'heading-line';

            wordLine.forEach((w, idx) => {
                line.appendChild(w);
                if (idx !== wordLine.length - 1) {
                    line.appendChild(document.createTextNode(' '));
                }
            });

            wrap.appendChild(line);
            el.appendChild(wrap);
        });

        el.dataset.headingSplit = 'true';
        return Array.from(el.querySelectorAll('.heading-line'));
    };

    // We need font metrics to be stable so "visual lines" are correct.
    // Do work async but keep init synchronous for the caller.
    (async () => {
        await waitForFonts();

        headings.forEach((el) => {
            // Avoid a flash of unmasked text on slower pages.
            el.style.visibility = 'hidden';

            const lines = splitHeadingIntoLines(el);
            // Explicit 'visible' (not '') so this reliably overrides the CSS
            // default (`html.js [data-heading-anim]:not([data-hero-reveal])`)
            // that hides these headings before this script runs.
            el.style.visibility = 'visible';

            if (!lines.length) return;

            if (prefersReducedMotion) {
                gsap.set(lines, {
                    WebkitMaskPosition: '0% 100%',
                    maskPosition: '0% 100%',
                    clearProps: 'willChange',
                });
                return;
            }

            const delay = parseFloat(el.dataset.delay || '0') || 0;
            // Subtle defaults (same as hero `data-heading-anim`, but without blur).
            const duration = parseFloat(el.dataset.duration || '5') || 5;
            const stagger = parseFloat(el.dataset.stagger || '0.14') || 0.14;
            const baseDelay =
                parseFloat(el.dataset.baseDelay || '0.05') || 0.05;

            gsap.set(lines, {
                WebkitMaskPosition: '100% 100%',
                maskPosition: '100% 100%',
                willChange: 'mask-position',
            });

            gsap.to(lines, {
                WebkitMaskPosition: '0% 100%',
                maskPosition: '0% 100%',
                stagger,
                duration,
                delay: baseDelay + delay,
                ease: 'power3.out',
                overwrite: 'auto',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 80%',
                    once: true,
                },
                onComplete: () => {
                    gsap.set(lines, { clearProps: 'willChange' });
                },
            });
        });
    })();
}

/**
 * Partners page: "Partner Voices" looping slider (7 slides).
 * Custom logic (no external slider lib), transitions powered by GSAP.
 */
function initPartnerVoicesSlider() {
    const section = document.querySelector('[data-partner-voices]');
    if (!section) return;
    if (section.dataset.partnerVoicesInit === 'true') return;

    const track = section.querySelector('[data-partner-voices-track]');
    const prevBtn = section.querySelector('[data-partner-voices-prev]');
    const nextBtn = section.querySelector('[data-partner-voices-next]');
    if (!track || !prevBtn || !nextBtn) return;

    const viewport =
        section.querySelector('[data-partner-voices-viewport]') ||
        section.querySelector('.partner-voices-viewport') ||
        track.parentElement;

    const getGapPx = () => {
        const styles = window.getComputedStyle(track);
        const gap =
            parseFloat(styles.columnGap || styles.gap || '0') ||
            parseFloat(styles.gap || '0') ||
            0;
        return Number.isFinite(gap) ? gap : 0;
    };

    const slides = Array.from(
        track.querySelectorAll('[data-partner-voices-slide]'),
    );
    if (slides.length < 2) return;

    let stepPx = 0;
    let currentIndex = 0;
    let isAnimating = false;

    const computeStep = () => {
        const any = slides[0];
        if (!any) return 0;
        const w = any.getBoundingClientRect().width;
        return w + getGapPx();
    };

    const computeBaseOffset = () => {
        if (!viewport) return 0;
        const any = slides[0];
        if (!any) return 0;

        const vw = viewport.getBoundingClientRect().width;
        const sw = any.getBoundingClientRect().width;
        return Math.max(0, (vw - sw) / 2);
    };

    const updateButtons = () => {
        prevBtn.disabled = currentIndex <= 0;
        nextBtn.disabled = currentIndex >= slides.length - 1;
    };

    const setActiveVisual = () => {
        if (!slides.length) return;

        slides.forEach((slide, idx) => {
            const isActive = idx === currentIndex;
            slide.classList.toggle('is-active', isActive);

            // Keep border consistent, but emphasize active slightly.
            slide.classList.toggle('border-brand-primary', isActive);
            slide.classList.toggle('border-brand-primary/40', !isActive);

            gsap.to(slide, {
                scale: isActive ? 1 : 0.96,
                opacity: isActive ? 1 : 0.72,
                duration: 0.35,
                ease: 'power2.out',
                overwrite: true,
            });
        });

        updateButtons();
    };

    const jumpTo = (index) => {
        const baseOffset = computeBaseOffset();
        gsap.set(track, { x: baseOffset - index * stepPx });
        currentIndex = index;
        setActiveVisual();
    };

    const goTo = (index) => {
        if (isAnimating) return;
        const maxIndex = slides.length - 1;
        const nextIndex = Math.max(0, Math.min(maxIndex, index));
        if (nextIndex === currentIndex) return;

        isAnimating = true;
        const baseOffset = computeBaseOffset();

        gsap.to(track, {
            x: baseOffset - nextIndex * stepPx,
            duration: 0.6,
            ease: 'power2.inOut',
            onComplete: () => {
                currentIndex = nextIndex;

                setActiveVisual();
                isAnimating = false;
            },
        });
    };

    const refreshLayout = () => {
        stepPx = computeStep();
        if (!stepPx) return;
        const baseOffset = computeBaseOffset();
        gsap.set(track, { x: baseOffset - currentIndex * stepPx });
        setActiveVisual();
    };

    // Initial setup
    section.dataset.partnerVoicesInit = 'true';
    gsap.set(track, { x: 0, willChange: 'transform' });

    // Start hidden and reveal on scroll (animation.js requirement).
    gsap.set(track, { opacity: 0, y: 12 });

    ScrollTrigger.create({
        trigger: section,
        start: 'top 80%',
        once: true,
        onEnter: () => {
            refreshLayout();
            jumpTo(0);
            gsap.to(track, {
                opacity: 1,
                y: 0,
                duration: 0.55,
                ease: 'power2.out',
            });
        },
    });

    nextBtn.addEventListener('click', () => goTo(currentIndex + 1));
    prevBtn.addEventListener('click', () => goTo(currentIndex - 1));

    window.addEventListener('resize', () => {
        gsap.delayedCall(0.05, refreshLayout);
    });
}

/**
 * Why TrAC circles intro (outer -> inner, bouncy)
 */
function initWhyTracCircles() {
    const section = document.querySelector('.why-trac-section');
    if (!section) return;

    const circleWrap = section.querySelector('.why-circles');
    if (!circleWrap) return;

    const circles = Array.from(circleWrap.querySelectorAll('img'));
    if (!circles.length) return;

    // Markup order is inner -> middle -> outer, so reverse it.
    const ordered = [...circles].reverse();

    gsap.set(circles, {
        opacity: 0,
        scale: 0.88,
        transformOrigin: '50% 50%',
    });

    gsap.timeline({
        scrollTrigger: {
            trigger: section,
            // Trigger a bit later so circles don't appear too early.
            start: 'top 70%',
            once: true,
        },
    }).to(ordered, {
        opacity: 0.5,
        scale: 1,
        duration: 1.0,
        // Less "springy" than before, but still bouncy.
        ease: 'elastic.out(1, 0.35)',
        stagger: 0.18,
    });
}

/**
 * Why TrAC unified scroll: one ScrollTrigger drives horizontal movement + svg draw.
 * This avoids drift/conflict between separate scrubbed animations.
 */
function initWhyTracScrollStory() {
    const section =
        document.querySelector('.why-trac-section[data-horizontal-scroll]') ||
        document.querySelector('[data-horizontal-scroll]');
    if (!section) return;

    if (window.innerWidth <= 768) return;

    const track = section.querySelector('.why-trac-track');
    if (!track) return;

    // Reserve a little "hold" at the beginning: section pins/settles, then motion starts.
    const HOLD = 0.14;

    const masterTl = gsap.timeline({
        scrollTrigger: {
            trigger: section,
            // Start when the sticky section pins. We'll use HOLD to create the pause.
            start: 'top top',
            end: 'bottom bottom',
            // Lower scrub smoothing so the draw responds faster to the scroll.
            scrub: 0.25,
        },
    });

    // Initial pause segment: nothing changes, but scrolling advances the timeline.
    masterTl.to({}, { duration: HOLD });

    masterTl.to(
        track,
        {
            x: () => -(track.scrollWidth - window.innerWidth),
            ease: 'none',
            duration: 1 - HOLD,
        },
        HOLD,
    );

    // Draw the long straight progress line as horizontal motion begins.
    // The stroke draws from transparent -> black -> primary, and stays perfectly in sync with the horizontal travel.
    const progressSvg = section.querySelector('[data-why-progress-line]');
    const progressBase = progressSvg?.querySelector('line');
    if (
        progressSvg &&
        progressBase &&
        typeof progressBase.getTotalLength === 'function'
    ) {
        // Clean up old clone if any.
        progressSvg
            .querySelectorAll('[data-why-progress-draw]')
            .forEach((n) => n.remove());

        const baseLen = progressBase.getTotalLength();
        // Base is fully transparent (we "fill" the line with the draw overlay).
        progressBase.style.stroke = 'rgba(17, 17, 17, 0)';
        progressBase.style.strokeLinecap = 'round';
        // Let the dash scale with the SVG so it always fills end-to-end.
        progressBase.style.vectorEffect = '';

        const drawLine = progressBase.cloneNode(true);
        drawLine.setAttribute('data-why-progress-draw', 'true');
        // Keep a constant primary color all the way to the end.
        drawLine.style.stroke = '#072245';
        drawLine.style.strokeOpacity = '1';
        drawLine.style.strokeWidth = '1.2';
        drawLine.style.strokeLinecap = 'round';
        drawLine.style.vectorEffect = '';
        progressBase.insertAdjacentElement('afterend', drawLine);

        gsap.set(drawLine, {
            strokeDasharray: baseLen,
            strokeDashoffset: baseLen,
            strokeOpacity: 1,
        });

        // Delay progress line a bit so connector SVG can finish first.
        const progressAt = HOLD + 0.15;
        const progressDur = Math.max(0.12, 1 - progressAt);
        masterTl.to(
            drawLine,
            {
                strokeDashoffset: 0,
                duration: progressDur,
                ease: 'none',
            },
            progressAt,
        );
    }

    // Add the svg + dots + card reveals into the same timeline.
    // SVG should begin during the HOLD (before horizontal movement), but cards should reveal with movement.
    initWhyTracStory(masterTl, 0, HOLD);

    // Make `data-para-anim` content inside this horizontal section reveal correctly using containerAnimation.
    // (Vertical ScrollTriggers won't fire reliably for elements moving via horizontal transforms.)
    initWhyTracParaReveal(section, masterTl);
}

/**
 * Why TrAC: line-by-line reveal driven by the horizontal container animation.
 */
function initWhyTracParaReveal(section, containerTl) {
    if (!section || !containerTl) return;
    if (section.dataset.whyParaInit === 'true') return;

    const targets = Array.from(section.querySelectorAll('[data-para-anim]'));
    if (!targets.length) return;

    section.dataset.whyParaInit = 'true';

    const escapeHtml = (str) =>
        str
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');

    const splitInLine = (el) => {
        if (el.dataset.paraSplit === 'true') return;
        if (el.children && el.children.length > 0) return;

        const raw = (el.textContent || '').trim();
        if (!raw) return;

        const words = raw.split(/\s+/);
        el.innerHTML = '';
        words.forEach((w, idx) => {
            const span = document.createElement('span');
            span.className = 'para-word';
            span.innerHTML = escapeHtml(w);
            el.appendChild(span);
            if (idx !== words.length - 1)
                el.appendChild(document.createTextNode(' '));
        });

        const wordEls = Array.from(el.querySelectorAll('.para-word'));
        if (!wordEls.length) return;

        const lines = [];
        let current = [];
        let currentTop = null;

        wordEls.forEach((w) => {
            const top = w.offsetTop;
            if (currentTop === null) {
                currentTop = top;
                current = [w];
                return;
            }
            if (Math.abs(top - currentTop) > 2) {
                lines.push(current);
                currentTop = top;
                current = [w];
            } else {
                current.push(w);
            }
        });
        if (current.length) lines.push(current);

        el.innerHTML = '';
        lines.forEach((wordLine) => {
            const wrap = document.createElement('span');
            wrap.className = 'para-line';

            const inner = document.createElement('span');
            inner.className = 'line-internal';

            wordLine.forEach((w, idx) => {
                inner.appendChild(w);
                if (idx !== wordLine.length - 1)
                    inner.appendChild(document.createTextNode(' '));
            });
            wrap.appendChild(inner);
            el.appendChild(wrap);
        });

        el.dataset.paraSplit = 'true';
    };

    targets.forEach((el) => {
        splitInLine(el);
        const lines = Array.from(el.querySelectorAll('.line-internal'));
        if (!lines.length) return;

        const delay = parseFloat(el.dataset.delay) || 0;
        const duration = parseFloat(el.dataset.duration) || 1.2;
        const stagger = parseFloat(el.dataset.stagger) || 0.07;

        gsap.fromTo(
            lines,
            { yPercent: 100 },
            {
                yPercent: 0,
                duration,
                delay,
                stagger,
                ease: 'power3.out',
                overwrite: 'auto',
                scrollTrigger: {
                    trigger: el,
                    containerAnimation: containerTl,
                    start: 'left 85%',
                    once: true,
                },
            },
        );
    });
}

/**
 * Why TrAC scroll storytelling:
 * dots fade -> connection draws -> cards reveal as you scroll
 */
function initWhyTracStory(
    masterTl,
    drawOffset = 0,
    contentOffset = drawOffset,
) {
    const section = document.querySelector('.why-trac-section');
    if (!section) return;

    // Only enable on desktop (horizontal scroll is disabled on mobile anyway).
    if (window.innerWidth <= 768) return;

    // Prefer explicit marker; fall back to the first svg in the connector wrapper.
    const svg =
        section.querySelector('[data-why-connect]') ||
        section.querySelector('.why-lines svg');
    if (!svg) return;

    // Clean up any previous clones (e.g. if init runs twice).
    svg.querySelectorAll('[data-why-draw]').forEach((el) => el.remove());

    // Dots may be authored as <circle> or as filled <path>.
    const dots = Array.from(svg.querySelectorAll('circle, path[fill]')).filter(
        (el) => {
            const fill = (el.getAttribute('fill') || '').trim().toLowerCase();
            // Keep only brand-colored dots; ignore "none" and other fills.
            return fill === '#10417f';
        },
    );

    // Lines can be <path>, <line>, <polyline> etc. Keep only stroked ones.
    // Only original base lines (not any draw clones we create).
    const baseLines = Array.from(
        svg.querySelectorAll(
            'path[stroke]:not([data-why-draw]), line[stroke]:not([data-why-draw]), polyline[stroke]:not([data-why-draw])',
        ),
    );

    if (!dots.length || !baseLines.length) return;

    const cards = Array.from(section.querySelectorAll('.why-card'));
    const cardImages = cards.map((card) =>
        card.querySelector('.why-card-image'),
    );
    const cardImageImgs = cardImages
        .map((wrap) => wrap?.querySelector('img'))
        .filter(Boolean);
    const cardContent = cards.map((card) =>
        card.querySelector('.why-card-content'),
    );

    const getDotCenterX = (el) => {
        // <circle>
        if (el.tagName.toLowerCase() === 'circle') {
            const cx = parseFloat(el.getAttribute('cx') || '0');
            return Number.isFinite(cx) ? cx : 0;
        }
        // Filled <path> dot
        if (typeof el.getBBox === 'function') {
            const b = el.getBBox();
            return b.x + b.width / 2;
        }
        return 0;
    };

    const orderedDots = [...dots].sort(
        (a, b) => getDotCenterX(a) - getDotCenterX(b),
    );

    orderedDots.forEach((dot) => {
        gsap.set(dot, {
            opacity: 0,
            // Keep dots locked in place: only fade opacity (no scale transform).
            scale: 1,
            transformOrigin: '50% 50%',
        });
    });

    // Prepare metadata to sequence: 2 lines from left first, then the others.
    const lineMeta = baseLines
        .map((el) => {
            if (typeof el.getTotalLength !== 'function') return null;
            const length = el.getTotalLength();
            const p0 = el.getPointAtLength(0);
            const p1 = el.getPointAtLength(length);
            const minX = Math.min(p0.x, p1.x);
            const maxX = Math.max(p0.x, p1.x);

            // Identify straight segments (helps later if you add the straight line).
            let isStraight = el.tagName.toLowerCase() === 'line';
            if (!isStraight && typeof el.getBBox === 'function') {
                const b = el.getBBox();
                const w = Math.max(b.width, 1);
                const h = b.height;
                isStraight = h / w < 0.06;
            }

            return { el, length, p0, p1, minX, maxX, isStraight };
        })
        .filter(Boolean);

    if (!lineMeta.length) return;

    const globalMinX = Math.min(...lineMeta.map((m) => m.minX));
    const phase1 = lineMeta
        .filter((m) => m.minX - globalMinX < 20)
        .sort((a, b) => a.maxX - b.maxX)
        .slice(0, 2)
        .map((m) => m.el);

    const phase1Set = new Set(phase1);
    const straightCandidate = lineMeta.find((m) => m.isStraight)?.el || null;

    const phase2 = lineMeta
        .map((m) => m.el)
        .filter((el) => !phase1Set.has(el) && el !== straightCandidate);

    const straightLine =
        straightCandidate && !phase1Set.has(straightCandidate)
            ? straightCandidate
            : null;

    // Style + create "draw overlay" lines.
    const drawLines = baseLines
        .map((path) => {
            if (typeof path.getTotalLength !== 'function') return null;

            // Keep connector base invisible so the draw feels like it fills on transparency.
            path.style.stroke = 'rgba(17, 17, 17, 0)';
            path.style.strokeWidth = '1.2';
            path.style.strokeLinecap = 'round';
            path.style.strokeLinejoin = 'round';
            path.style.vectorEffect = 'non-scaling-stroke';

            // Clone for the actual drawing stroke (brand color).
            const clone = path.cloneNode(true);
            clone.setAttribute('data-why-draw', 'true');
            clone.style.stroke = '#072245';
            // We'll fade the stroke in as it draws so it feels like it fills from transparent -> primary.
            clone.style.strokeOpacity = '0';
            clone.style.strokeWidth = '1.2';
            clone.style.strokeLinecap = 'round';
            clone.style.strokeLinejoin = 'round';
            clone.style.vectorEffect = 'non-scaling-stroke';

            // Put the drawing stroke on top of the base stroke.
            path.insertAdjacentElement('afterend', clone);
            return clone;
        })
        .filter(Boolean);

    const toDrawClone = new Map();
    drawLines.forEach((clone, i) => {
        // drawLines are created in the same order as baseLines.
        const base = baseLines[i];
        if (base) toDrawClone.set(base, clone);
    });

    drawLines.forEach((path) => {
        if (typeof path.getTotalLength !== 'function') return;
        const length = path.getTotalLength();

        // Ensure the draw direction is left -> right, regardless of SVG authoring.
        const p0 = path.getPointAtLength(0);
        const p1 = path.getPointAtLength(length);
        const drawsLeftToRight = p0.x <= p1.x;
        const initialOffset = drawsLeftToRight ? length : -length;

        gsap.set(path, {
            strokeDasharray: length,
            strokeDashoffset: initialOffset,
        });
    });

    const getDotPos = (el) => {
        if (el.tagName.toLowerCase() === 'circle') {
            return {
                x: parseFloat(el.getAttribute('cx') || '0') || 0,
                y: parseFloat(el.getAttribute('cy') || '0') || 0,
            };
        }
        if (typeof el.getBBox === 'function') {
            const b = el.getBBox();
            return { x: b.x + b.width / 2, y: b.y + b.height / 2 };
        }
        return { x: 0, y: 0 };
    };

    // Approx: for a dot point, find where along a path it is "reached" (fraction 0..1)
    // by sampling points along its length. Works well for monotonic-ish connectors.
    const approxFractionForPoint = (path, point, samples = 180) => {
        if (typeof path.getTotalLength !== 'function') return null;
        const len = path.getTotalLength();
        let best = { i: 0, d2: Number.POSITIVE_INFINITY };
        for (let i = 0; i <= samples; i++) {
            const p = path.getPointAtLength((len * i) / samples);
            const dx = p.x - point.x;
            const dy = p.y - point.y;
            const d2 = dx * dx + dy * dy;
            if (d2 < best.d2) best = { i, d2 };
        }
        return { frac: best.i / samples, d2: best.d2 };
    };

    // Hide cards initially; they'll reveal in sequence as scroll progresses.
    gsap.set(cards, { opacity: 0, y: 28 });
    // Keep wrapper opaque so the line isn't visible behind during the image reveal.
    gsap.set(cardImages, { opacity: 1, scale: 1 });
    // Reveal the actual bitmap with a small fade-up.
    gsap.set(cardImageImgs, { opacity: 0, y: 10 });
    gsap.set(cardContent, { opacity: 0, y: 18 });

    const tl =
        masterTl ||
        gsap.timeline({
            scrollTrigger: {
                trigger: section,
                start: 'top top',
                end: 'bottom bottom',
                scrub: 0.25,
            },
        });

    const drawPhase = (baseEls, at, duration, stagger) => {
        const clones = baseEls.map((b) => toDrawClone.get(b)).filter(Boolean);
        if (!clones.length) return;

        tl.to(
            clones,
            {
                strokeDashoffset: 0,
                strokeOpacity: 1,
                duration,
                ease: 'none',
                stagger,
            },
            drawOffset + at,
        );
    };

    // 2) Draw the first 2 lines that start from the left.
    // Simultaneous (no stagger) per your reference.
    // Start draw immediately (during HOLD) so it begins before horizontal motion.
    const phase1At = 0.0;
    // Fill a little faster: finish the main draw sooner in the scroll.
    const phase1Dur = 0.18;
    drawPhase(phase1, phase1At, phase1Dur, 0);

    // 3) Then draw the remaining curved connections.
    const phase2At = 0.1;
    const phase2Dur = 0.2;
    drawPhase(phase2, phase2At, phase2Dur, 0.03);

    // 4) If/when you add the straight line, fill it from transparent -> primary as you scroll.
    if (straightLine) {
        const straightClone = toDrawClone.get(straightLine);
        if (straightClone) {
            // "Black line" that fills into primary.
            gsap.set(straightClone, {
                opacity: 0,
                stroke: '#111111',
                strokeOpacity: 0,
            });
            const straightAt = phase2At + phase2Dur + 0.06;
            tl.to(
                straightClone,
                {
                    opacity: 1,
                    stroke: '#072245',
                    strokeDashoffset: 0,
                    strokeOpacity: 1,
                    duration: 0.18,
                    ease: 'none',
                },
                drawOffset + straightAt,
            );
        }
    }

    // 1) Dots fade in only when the drawing reaches them.
    // Map dots to the earliest reach time across all drawing phases.
    const phasesForDots = [
        { els: phase1, at: phase1At, dur: phase1Dur },
        { els: phase2, at: phase2At, dur: phase2Dur },
        // Straight line handled separately below if present.
    ];

    orderedDots.forEach((dot, idx) => {
        const pos = getDotPos(dot);
        let bestTime = null;

        phasesForDots.forEach((ph) => {
            ph.els.forEach((baseEl) => {
                const clone = toDrawClone.get(baseEl);
                if (!clone) return;
                const r = approxFractionForPoint(clone, pos);
                if (!r) return;

                // Require the dot to be reasonably close to the path.
                // (SVG units: threshold tuned for this connector size.)
                const within = r.d2 <= 26 * 26;
                if (!within) return;

                const t = ph.at + r.frac * ph.dur;
                if (bestTime === null || t < bestTime) bestTime = t;
            });
        });

        // Fallback: if we didn't match a path (rare), fade it late instead of early.
        if (bestTime === null) bestTime = 0.18;

        // Fade dots in slightly before the draw reaches them.
        const DOT_LEAD = 0.03;
        let dotTime = Math.max(0, bestTime - DOT_LEAD);
        // Delay the last/right-most dot so it appears after the svg connectors are done.
        if (idx === orderedDots.length - 1) {
            dotTime += 0.17;
        }

        tl.to(
            dot,
            {
                opacity: 1,
                duration: 0.06,
                ease: 'power2.out',
            },
            drawOffset + dotTime,
        );
    });

    // 3) Reveal each card as the horizontal story progresses.
    // Reveal cards based on their actual horizontal position so timing matches the scroll.
    // This fixes "images not loading at correct time" when slide widths change.
    const track = section.querySelector('.why-trac-track');
    const scrollDistance = track ? track.scrollWidth - window.innerWidth : 0;
    const motionDur = Math.max(0.001, 1 - contentOffset);
    const REVEAL_LAG = 0.04; // reveal a little late

    const cardTimes = cards.map((card) => {
        const slide = card.closest('.why-trac-slide');
        const left = slide ? slide.offsetLeft : card.offsetLeft;
        // Slightly later than center for a calmer pace.
        const p =
            scrollDistance > 0
                ? (left - window.innerWidth * 0.6) / scrollDistance
                : 0;
        const clamped = Math.max(0, Math.min(1, p));
        return contentOffset + clamped * motionDur;
    });

    cards.forEach((card, index) => {
        // Keep reveals inside the horizontal-motion window so they don't extend the timeline
        // (which would make the progress line look like it "stops" early).
        const CARD_DUR = 0.16; // content ends around t+0.16
        const maxT = contentOffset + motionDur - CARD_DUR;
        const rawT = Math.max(
            contentOffset,
            (cardTimes[index] ?? contentOffset) + REVEAL_LAG,
        );
        const t = Math.min(maxT, rawT);
        const image = cardImages[index];
        const content = cardContent[index];

        tl.to(
            card,
            {
                opacity: 1,
                y: 0,
                duration: 0.18,
                ease: 'power2.out',
                delay: -0.1,
            },
            t,
        );

        const imageImg = image?.querySelector('img');
        if (imageImg) {
            tl.to(
                imageImg,
                {
                    opacity: 1,
                    y: 0,
                    duration: 0.01,
                    ease: 'power2.out',
                },
                t + 0,
            );
        }

        if (content) {
            tl.to(
                content,
                {
                    opacity: 1,
                    y: 0,
                    duration: 0.22,
                    ease: 'power2.out',
                },
                t + 0.02,
            );
        }
    });
}

/**
 * CTA SVG line draw + traveling highlight animation
 */
function initCtaLineAnimation() {
    const section = document.querySelector('.cta-section');
    const svg = section?.querySelector('[data-cta-svg]');

    if (!section || !svg || section.dataset.ctaLineInit === 'true') {
        return;
    }

    section.dataset.ctaLineInit = 'true';

    const gsapRef = window.gsap || (typeof gsap !== 'undefined' ? gsap : null);

    if (!gsapRef) return;

    const basePaths = Array.from(svg.querySelectorAll('path[stroke]')).filter(
        (path) =>
            !path.hasAttribute('data-cta-traveller') && !path.closest('defs'),
    );

    if (!basePaths.length) return;

    const travellerEntries = [];

    basePaths.forEach((path, index) => {
        const length = path.getTotalLength();

        if (!length) return;

        const startPoint = path.getPointAtLength(0);
        const endPoint = path.getPointAtLength(length);

        const shouldTravelForward = startPoint.y <= endPoint.y;

        path.setAttribute('fill', 'none');
        path.setAttribute('stroke-linecap', 'round');
        path.setAttribute('stroke-linejoin', 'round');

        gsapRef.set(path, {
            strokeDasharray: length,
            strokeDashoffset: length,
        });

        const traveller = document.createElementNS(
            'http://www.w3.org/2000/svg',
            'path',
        );

        traveller.setAttribute('fill', 'none');
        traveller.setAttribute('stroke', '#E86224');
        traveller.setAttribute('stroke-width', '3');
        traveller.setAttribute('stroke-linecap', 'round');
        traveller.setAttribute('stroke-linejoin', 'round');
        traveller.setAttribute('pointer-events', 'none');
        traveller.setAttribute('data-cta-traveller', `traveller-${index}`);

        svg.appendChild(traveller);

        gsapRef.set(traveller, {
            opacity: 0,
        });

        travellerEntries.push({
            sourcePath: path,
            traveller,
            length,
            shouldTravelForward,
        });
    });

    const setTravellerSegment = (entry, distance, segmentLength) => {
        const { sourcePath, traveller, length, shouldTravelForward } = entry;

        let startDistance;
        let endDistance;

        if (shouldTravelForward) {
            startDistance = Math.max(0, Math.min(distance, length));
            endDistance = Math.max(
                0,
                Math.min(distance + segmentLength, length),
            );
        } else {
            startDistance = Math.max(0, Math.min(distance, length));
            endDistance = Math.max(
                0,
                Math.min(distance - segmentLength, length),
            );
        }

        const p1 = sourcePath.getPointAtLength(startDistance);
        const p2 = sourcePath.getPointAtLength(endDistance);

        traveller.setAttribute('d', `M ${p1.x} ${p1.y} L ${p2.x} ${p2.y}`);
    };

    const runTraveller = (entry) => {
        const segmentLength = gsapRef.utils.random(28, 48);
        const proxy = {
            distance: entry.shouldTravelForward ? 0 : entry.length,
        };

        const startDistance = entry.shouldTravelForward ? 0 : entry.length;
        const endDistance = entry.shouldTravelForward ? entry.length : 0;

        setTravellerSegment(entry, startDistance, segmentLength);

        const tl = gsapRef.timeline();

        tl.set(entry.traveller, {
            opacity: 0,
        });

        tl.to(entry.traveller, {
            opacity: 1,
            duration: 0.25,
            ease: 'power2.out',
        });

        tl.to(
            proxy,
            {
                distance: endDistance,
                duration: gsapRef.utils.random(2.8, 4.2),
                ease: 'none',
                onUpdate: () => {
                    setTravellerSegment(entry, proxy.distance, segmentLength);
                },
            },
            0,
        );

        tl.to(
            entry.traveller,
            {
                opacity: 0,
                duration: 0.35,
                ease: 'power2.inOut',
            },
            '>-0.25',
        );

        return tl;
    };

    const startContinuousTravellers = () => {
        const maxConcurrent = Math.min(5, travellerEntries.length);
        const active = new Set();

        const pickNextEntry = () => {
            const available = travellerEntries.filter(
                (entry) => !active.has(entry),
            );

            if (!available.length) return null;

            return available[Math.floor(Math.random() * available.length)];
        };

        const startOne = (entry) => {
            if (!entry || active.has(entry)) return;

            active.add(entry);

            runTraveller(entry).eventCallback('onComplete', () => {
                active.delete(entry);

                gsapRef.delayedCall(gsapRef.utils.random(0.2, 0.8), () => {
                    startOne(pickNextEntry() || entry);
                });
            });
        };

        for (let i = 0; i < maxConcurrent; i += 1) {
            gsapRef.delayedCall(gsapRef.utils.random(0.1, 1.1), () => {
                startOne(pickNextEntry());
            });
        }
    };

    const playAnimation = () => {
        gsapRef
            .timeline()
            .to(basePaths, {
                strokeDashoffset: 0,
                duration: 1.5,
                stagger: 0.035,
                ease: 'power2.out',
            })
            .call(startContinuousTravellers);
    };

    if (window.ScrollTrigger) {
        gsapRef
            .timeline({
                scrollTrigger: {
                    trigger: section,
                    start: 'top 80%',
                    once: true,
                },
            })
            .call(playAnimation);
    } else {
        const observer = new IntersectionObserver(
            ([entry]) => {
                if (!entry.isIntersecting) return;

                playAnimation();
                observer.disconnect();
            },
            {
                threshold: 0.25,
            },
        );

        observer.observe(section);
    }
}

window.initCtaLineAnimation = initCtaLineAnimation;

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCtaLineAnimation);
} else {
    initCtaLineAnimation();
}
/**
 * Basic fade animations for [data-animate] elements
 */
function initFadeAnimations() {
    const animatedElements = document.querySelectorAll('[data-animate]');

    animatedElements.forEach((el) => {
        if (el.classList.contains('is-animated')) return;
        const animationType = el.dataset.animate;
        const delay = parseFloat(el.dataset.delay) || 0;
        const duration = parseFloat(el.dataset.duration) || defaults.duration;

        // Get initial transform based on animation type
        const initialState = getInitialState(animationType);

        gsap.fromTo(el, initialState, {
            opacity: 1,
            x: 0,
            y: 0,
            scale: 1,
            duration,
            delay,
            ease: defaults.ease,
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
                once: true,
                onEnter: () => el.classList.add('is-animated'),
            },
        });
    });
}

/**
 * Get initial state based on animation type
 */
function getInitialState(type) {
    const states = {
        'fade-up': { opacity: 0, y: 30 },
        'fade-down': { opacity: 0, y: -30 },
        'fade-left': { opacity: 0, x: 30 },
        'fade-right': { opacity: 0, x: -30 },
        'scale-up': { opacity: 0, scale: 0.95 },
        'scale-down': { opacity: 0, scale: 1.05 },
        fade: { opacity: 0 },
    };

    return states[type] || states['fade'];
}

/**
 * Hero section animations
 */
function initHeroAnimations() {
    const hero = document.querySelector('.hero');
    if (!hero) return;

    // skip old hero animation system if this page uses static/barba-synced hero reveals
    if (
        hero.hasAttribute('data-hero-static') ||
        hero.querySelector('[data-hero-reveal]')
    ) {
        return;
    }

    const heroTitle = hero.querySelector('.hero-title');
    const heroSubtitle = hero.querySelector('.hero-subtitle');
    const heroCta = hero.querySelector('.hero-cta');
    const heroMedia = hero.querySelector('.hero-media');

    const tl = gsap.timeline({
        defaults: { ease: 'power3.out' },
    });

    document.addEventListener('trac:loaded', () => {
        if (heroTitle) {
            tl.fromTo(
                heroTitle,
                { opacity: 0, y: 50 },
                { opacity: 1, y: 0, duration: 1 },
            );
        }

        if (heroSubtitle) {
            tl.fromTo(
                heroSubtitle,
                { opacity: 0, y: 30 },
                { opacity: 1, y: 0, duration: 0.8 },
                '-=0.6',
            );
        }

        if (heroCta) {
            tl.fromTo(
                heroCta,
                { opacity: 0, y: 20 },
                { opacity: 1, y: 0, duration: 0.6 },
                '-=0.4',
            );
        }

        if (heroMedia) {
            tl.fromTo(
                heroMedia,
                { opacity: 0, scale: 0.95 },
                { opacity: 1, scale: 1, duration: 1.2 },
                '-=0.8',
            );
        }
    });

    if (heroMedia) {
        gsap.to(heroMedia, {
            y: '20%',
            ease: 'none',
            scrollTrigger: {
                trigger: hero,
                start: 'top top',
                end: 'bottom top',
                scrub: true,
            },
        });
    }
}

/**
 * Section-specific animations
 */
function initSectionAnimations() {
    // Animate section headers
    const sectionHeaders = document.querySelectorAll('.section-header');

    sectionHeaders.forEach((header) => {
        const title = header.querySelector('.section-title');
        const subtitle = header.querySelector('.section-subtitle');
        const description = header.querySelector('.section-description');

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: header,
                start: 'top 80%',
                once: true,
            },
        });

        if (title) {
            tl.fromTo(
                title,
                { opacity: 0, y: 30 },
                { opacity: 1, y: 0, duration: 0.8 },
            );
        }

        if (subtitle) {
            tl.fromTo(
                subtitle,
                { opacity: 0, y: 20 },
                { opacity: 1, y: 0, duration: 0.6 },
                '-=0.5',
            );
        }

        if (description) {
            tl.fromTo(
                description,
                { opacity: 0, y: 20 },
                { opacity: 1, y: 0, duration: 0.6 },
                '-=0.4',
            );
        }
    });

    // Stagger children animations
    const staggerContainers = document.querySelectorAll('.stagger-children');

    staggerContainers.forEach((container) => {
        const children = container.children;
        const stagger =
            parseFloat(container.dataset.stagger) || defaults.stagger;

        gsap.fromTo(
            children,
            { opacity: 0, y: 20 },
            {
                opacity: 1,
                y: 0,
                duration: 0.6,
                stagger,
                scrollTrigger: {
                    trigger: container,
                    start: 'top 80%',
                    once: true,
                    onEnter: () => container.classList.add('is-animated'),
                },
            },
        );
    });

    // Card reveal animations
    const cards = document.querySelectorAll('.card');

    cards.forEach((card, index) => {
        gsap.fromTo(
            card,
            { opacity: 0, y: 40 },
            {
                opacity: 1,
                y: 0,
                duration: 0.8,
                delay: (index % 3) * 0.1, // Stagger within row
                scrollTrigger: {
                    trigger: card,
                    start: 'top 85%',
                    once: true,
                },
            },
        );
    });
}

/**
 * Parallax animations
 */
function initParallaxAnimations() {
    const parallaxElements = document.querySelectorAll(
        '.parallax, [data-parallax]',
    );

    parallaxElements.forEach((el) => {
        const speed = parseFloat(el.dataset.parallaxSpeed) || 0.2;
        const direction = el.dataset.parallaxDirection || 'y';

        const propName = direction === 'x' ? 'x' : 'y';
        const movement = direction === 'x' ? '20%' : `${speed * 100}%`;

        gsap.to(el, {
            [propName]: movement,
            ease: 'none',
            scrollTrigger: {
                trigger: el.parentElement || el,
                start: 'top bottom',
                end: 'bottom top',
                scrub: true,
            },
        });
    });

    // Background parallax for sections
    const parallaxBgs = document.querySelectorAll('[data-parallax-bg]');

    parallaxBgs.forEach((section) => {
        const bg = section.querySelector('.parallax-bg, [class*="bg-"]');
        if (bg) {
            gsap.to(bg, {
                y: '30%',
                ease: 'none',
                scrollTrigger: {
                    trigger: section,
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: true,
                },
            });
        }
    });
}

function initTeamSlider() {
    const section = document.querySelector('[data-team-slider]');
    if (!section) return;

    const prevBtn = section.querySelector('[data-team-slider-prev]');
    const nextBtn = section.querySelector('[data-team-slider-next]');

    const activeCard = section.querySelector('[data-team-slider-active-card]');
    const activeImageWrap = section.querySelector('.team-slider-active-image');
    const activeName = section.querySelector('[data-team-slider-active-name]');
    const activeRole = section.querySelector('[data-team-slider-active-role]');
    const backName = section.querySelector('[data-team-slider-back-name]');
    const backRole = section.querySelector('[data-team-slider-back-role]');
    const backBio = section.querySelector('[data-team-slider-back-bio]');
    const backLinkedin = section.querySelector(
        '[data-team-slider-back-linkedin]',
    );
    const closeBtn = section.querySelector('[data-team-slider-close]');

    const railWrap = section.querySelector('.team-slider-rail-wrap');
    const rail = section.querySelector('[data-team-slider-rail]');

    const initialThumbs = Array.from(
        section.querySelectorAll('[data-team-slider-thumb]'),
    );

    if (
        !prevBtn ||
        !nextBtn ||
        !activeCard ||
        !activeImageWrap ||
        !activeName ||
        !activeRole ||
        !backName ||
        !backRole ||
        !backBio ||
        !backLinkedin ||
        !closeBtn ||
        !railWrap ||
        !rail ||
        !initialThumbs.length
    ) {
        console.log('[Trac] Team slider missing elements');
        return;
    }

    const members = initialThumbs.map((thumb) => ({
        name: thumb.dataset.name || '',
        role: thumb.dataset.role || '',
        image: thumb.dataset.image || '',
        linkedin: thumb.dataset.linkedin || '#',
        bio: thumb.dataset.bio || '',
    }));

    let currentIndex = 0;
    let isAnimating = false;
    let suppressCardClick = false;
    let flipCompleteTimer = null;
    let flipContentHideTimer = null;

    const mod = (n, m) => ((n % m) + m) % m;
    const escapeAttr = (value) =>
        String(value)
            .replace(/&/g, '&amp;')
            .replace(/"/g, '&quot;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');

    const createActiveSlideMarkup = (member) => {
        return `
            <div class="team-slider-active-slide">
                <img
                    src="${escapeAttr(member.image)}"
                    alt="${escapeAttr(member.name)}"
                    draggable="false"
                />
            </div>
        `;
    };

    const createThumbMarkup = (memberIndex) => {
        const member = members[memberIndex];
        return `
            <button
                type="button"
                class="team-slider-thumb"
                data-team-slider-thumb-live
                data-team-index="${memberIndex}"
                data-name="${escapeAttr(member.name)}"
                data-role="${escapeAttr(member.role)}"
                data-image="${escapeAttr(member.image)}"
                data-linkedin="${escapeAttr(member.linkedin)}"
                data-bio="${escapeAttr(member.bio)}"
                aria-label="${escapeAttr(member.name)}"
            >
                <img
                    src="${escapeAttr(member.image)}"
                    alt="${escapeAttr(member.name)}"
                    draggable="false"
                />
            </button>
        `;
    };

    const getThumbIndexesForState = (baseIndex) => {
        const arr = [];
        for (let i = 1; i < members.length; i += 1) {
            arr.push(mod(baseIndex + i, members.length));
        }
        return arr;
    };

    const setActiveContent = (member) => {
        activeName.textContent = member.name;
        activeRole.textContent = member.role;
        backName.textContent = member.name;
        backRole.textContent = member.role;
        backBio.textContent = member.bio;
        backLinkedin.setAttribute('href', member.linkedin || '#');
    };

    const setCardFlipped = (flipped) => {
        if (flipCompleteTimer) {
            window.clearTimeout(flipCompleteTimer);
            flipCompleteTimer = null;
        }

        if (flipContentHideTimer) {
            window.clearTimeout(flipContentHideTimer);
            flipContentHideTimer = null;
        }

        activeCard.classList.toggle('is-flipped', flipped);
        if (flipped) {
            activeCard.classList.remove('is-flip-complete');
        } else {
            flipContentHideTimer = window.setTimeout(() => {
                activeCard.classList.remove('is-flip-complete');
            }, 160);
        }
        activeCard.setAttribute('aria-pressed', flipped ? 'true' : 'false');
        const backFace = activeCard.querySelector('.team-slider-card-back');
        const frontFace = activeCard.querySelector('.team-slider-card-front');

        if (backFace) {
            backFace.setAttribute('aria-hidden', flipped ? 'false' : 'true');
        }

        if (frontFace) {
            frontFace.setAttribute('aria-hidden', flipped ? 'true' : 'false');
        }

        closeBtn.tabIndex = -1;
        backLinkedin.tabIndex = -1;
        closeBtn.setAttribute('aria-hidden', 'true');
        backLinkedin.setAttribute('aria-hidden', 'true');

        if (flipped) {
            flipCompleteTimer = window.setTimeout(() => {
                if (!activeCard.classList.contains('is-flipped')) return;

                activeCard.classList.add('is-flip-complete');
                closeBtn.tabIndex = 0;
                backLinkedin.tabIndex = 0;
                closeBtn.setAttribute('aria-hidden', 'false');
                backLinkedin.setAttribute('aria-hidden', 'false');
            }, 420);
        }
    };

    const closeCard = (event) => {
        if (event) {
            event.preventDefault();
            event.stopPropagation();
        }

        suppressCardClick = true;
        setCardFlipped(false);

        window.setTimeout(() => {
            suppressCardClick = false;
        }, 120);
    };

    const renderActiveStatic = () => {
        const member = members[currentIndex];
        activeImageWrap.innerHTML = createActiveSlideMarkup(member);
        setActiveContent(member);
    };

    const bindThumbClicks = () => {
        const liveThumbs = Array.from(
            rail.querySelectorAll('[data-team-slider-thumb-live]'),
        );

        liveThumbs.forEach((thumb) => {
            thumb.addEventListener('click', () => {
                const targetIndex = Number(thumb.dataset.teamIndex);
                if (Number.isNaN(targetIndex) || targetIndex === currentIndex)
                    return;

                const forwardDistance = mod(
                    targetIndex - currentIndex,
                    members.length,
                );
                const backwardDistance = mod(
                    currentIndex - targetIndex,
                    members.length,
                );

                goToIndex(
                    targetIndex,
                    forwardDistance <= backwardDistance ? 1 : -1,
                );
            });
        });
    };

    const renderThumbsStatic = (baseIndex = currentIndex) => {
        const indexes = getThumbIndexesForState(baseIndex);
        rail.innerHTML = indexes.map(createThumbMarkup).join('');
        gsap.set(rail, { x: 0 });
        bindThumbClicks();
    };

    const getThumbStep = () => {
        const firstThumb = rail.querySelector('.team-slider-thumb');
        if (!firstThumb) return 0;
        const gap = parseFloat(getComputedStyle(rail).gap || '0') || 0;
        return firstThumb.offsetWidth + gap;
    };

    const animateFrame = (nextIndex, direction) => {
        const currentMember = members[currentIndex];
        const nextMember = members[nextIndex];

        const outgoingLayer = document.createElement('div');
        outgoingLayer.className = 'team-slider-active-slide-layer';

        const incomingLayer = document.createElement('div');
        incomingLayer.className = 'team-slider-active-slide-layer';

        outgoingLayer.innerHTML = createActiveSlideMarkup(currentMember);
        incomingLayer.innerHTML = createActiveSlideMarkup(nextMember);

        activeImageWrap.innerHTML = '';
        activeImageWrap.appendChild(outgoingLayer);
        activeImageWrap.appendChild(incomingLayer);

        const outgoingSlide = outgoingLayer.querySelector(
            '.team-slider-active-slide',
        );
        const incomingSlide = incomingLayer.querySelector(
            '.team-slider-active-slide',
        );

        gsap.set(outgoingSlide, { xPercent: 0 });
        gsap.set(incomingSlide, { xPercent: direction > 0 ? 100 : -100 });

        gsap.to(outgoingSlide, {
            xPercent: direction > 0 ? -100 : 100,
            duration: 0.72,
            ease: 'power3.inOut',
            overwrite: true,
        });

        gsap.to(incomingSlide, {
            xPercent: 0,
            duration: 0.72,
            ease: 'power3.inOut',
            overwrite: true,
        });

        gsap.to([activeName, activeRole], {
            autoAlpha: 0,
            y: 12,
            duration: 0.18,
            ease: 'power2.out',
            overwrite: true,
            onComplete: () => {
                activeName.textContent = nextMember.name;
                activeRole.textContent = nextMember.role;

                gsap.to([activeName, activeRole], {
                    autoAlpha: 1,
                    y: 0,
                    duration: 0.26,
                    ease: 'power2.out',
                    overwrite: true,
                });
            },
        });
    };

    const animateThumbs = (nextIndex, direction) => {
        const step = getThumbStep();
        if (!step) {
            currentIndex = nextIndex;
            renderThumbsStatic(currentIndex);
            return Promise.resolve();
        }

        return new Promise((resolve) => {
            const currentIndexes = getThumbIndexesForState(currentIndex);
            const nextIndexes = getThumbIndexesForState(nextIndex);

            const currentTrack = document.createElement('div');
            currentTrack.className = 'team-slider-rail team-slider-rail-clone';
            currentTrack.style.position = 'absolute';
            currentTrack.style.left = '0';
            currentTrack.style.top = '0';
            currentTrack.style.height = '100%';
            currentTrack.style.width = 'max-content';
            currentTrack.style.pointerEvents = 'none';
            currentTrack.style.gap = getComputedStyle(rail).gap;
            currentTrack.style.display = 'flex';
            currentTrack.style.alignItems = 'flex-end';
            currentTrack.innerHTML = currentIndexes
                .map(createThumbMarkup)
                .join('');

            const nextTrack = document.createElement('div');
            nextTrack.className = 'team-slider-rail team-slider-rail-clone';
            nextTrack.style.position = 'absolute';
            nextTrack.style.left = '0';
            nextTrack.style.top = '0';
            nextTrack.style.height = '100%';
            nextTrack.style.width = 'max-content';
            nextTrack.style.pointerEvents = 'none';
            nextTrack.style.gap = getComputedStyle(rail).gap;
            nextTrack.style.display = 'flex';
            nextTrack.style.alignItems = 'flex-end';
            nextTrack.innerHTML = nextIndexes.map(createThumbMarkup).join('');

            rail.style.visibility = 'hidden';
            railWrap.style.position = 'relative';

            railWrap.appendChild(currentTrack);
            railWrap.appendChild(nextTrack);

            if (direction > 0) {
                gsap.set(currentTrack, { x: 0 });
                gsap.set(nextTrack, { x: step });

                const tl = gsap.timeline({
                    onComplete: () => {
                        currentTrack.remove();
                        nextTrack.remove();
                        currentIndex = nextIndex;
                        renderThumbsStatic(currentIndex);
                        rail.style.visibility = '';
                        resolve();
                    },
                });

                tl.to(
                    currentTrack,
                    {
                        x: -step,
                        duration: 0.72,
                        ease: 'power3.inOut',
                    },
                    0,
                ).to(
                    nextTrack,
                    {
                        x: 0,
                        duration: 0.72,
                        ease: 'power3.inOut',
                    },
                    0,
                );
            } else {
                gsap.set(currentTrack, { x: 0 });
                gsap.set(nextTrack, { x: -step });

                const tl = gsap.timeline({
                    onComplete: () => {
                        currentTrack.remove();
                        nextTrack.remove();
                        currentIndex = nextIndex;
                        renderThumbsStatic(currentIndex);
                        rail.style.visibility = '';
                        resolve();
                    },
                });

                tl.to(
                    currentTrack,
                    {
                        x: step,
                        duration: 0.72,
                        ease: 'power3.inOut',
                    },
                    0,
                ).to(
                    nextTrack,
                    {
                        x: 0,
                        duration: 0.72,
                        ease: 'power3.inOut',
                    },
                    0,
                );
            }
        });
    };

    const goToIndex = async (targetIndex, direction = 1) => {
        if (isAnimating || members.length <= 1) return;

        const nextIndex = mod(targetIndex, members.length);
        if (nextIndex === currentIndex) return;

        isAnimating = true;
        setCardFlipped(false);

        animateFrame(nextIndex, direction);
        await animateThumbs(nextIndex, direction);

        renderActiveStatic();
        isAnimating = false;
    };

    prevBtn.addEventListener('click', () => {
        goToIndex(currentIndex - 1, -1);
    });

    nextBtn.addEventListener('click', () => {
        goToIndex(currentIndex + 1, 1);
    });

    closeBtn.addEventListener('pointerdown', closeCard);
    closeBtn.addEventListener('click', closeCard);

    backLinkedin.addEventListener('click', (event) => {
        event.stopPropagation();
    });

    activeCard.addEventListener('click', (event) => {
        if (suppressCardClick) return;
        if (event.target.closest('.team-slider-card-back')) return;
        if (event.target.closest('[data-team-slider-back-linkedin]')) return;
        if (activeCard.classList.contains('is-flipped')) return;
        setCardFlipped(true);
    });

    activeCard.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            if (activeCard.classList.contains('is-flipped')) return;
            setCardFlipped(true);
        }
    });

    const handleResize = () => {
        setCardFlipped(false);
        renderActiveStatic();
        renderThumbsStatic(currentIndex);
    };

    window.addEventListener('resize', handleResize);

    renderActiveStatic();
    renderThumbsStatic(currentIndex);
    setCardFlipped(false);

    section._teamSliderCleanup = () => {
        window.removeEventListener('resize', handleResize);
    };

    console.log('[Trac] Team slider initialized');
}

/**
 * Text animations (split text, reveal, etc.)
 */
function initTextAnimations() {
    // Reveal text animations
    const revealTexts = document.querySelectorAll('.reveal-text');

    revealTexts.forEach((wrapper) => {
        const text = wrapper.querySelector('.reveal-content') || wrapper;

        gsap.fromTo(
            text,
            { y: '100%' },
            {
                y: 0,
                duration: 1,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: wrapper,
                    start: 'top 85%',
                    once: true,
                    onEnter: () => wrapper.classList.add('is-animated'),
                },
            },
        );
    });

    // Line-by-line text animation
    const lineAnimations = document.querySelectorAll('[data-animate-lines]');

    lineAnimations.forEach((el) => {
        // Split text into lines (simple approach - for complex needs use SplitText)
        const text = el.textContent;
        const words = text.split(' ');
        const wordsPerLine = 8; // Approximate
        const lines = [];

        for (let i = 0; i < words.length; i += wordsPerLine) {
            lines.push(words.slice(i, i + wordsPerLine).join(' '));
        }

        el.innerHTML = lines
            .map(
                (line) =>
                    `<span class="line-wrapper"><span class="line">${line}</span></span>`,
            )
            .join(' ');

        const lineElements = el.querySelectorAll('.line');

        gsap.fromTo(
            lineElements,
            { y: '100%', opacity: 0 },
            {
                y: 0,
                opacity: 1,
                duration: 0.8,
                stagger: 0.1,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 85%',
                    once: true,
                },
            },
        );
    });
}

/**
 * Stacking cards animation for services section
 */
function initStackingCards() {
    const wrapper = document.querySelector('[data-stacking-cards]');
    if (!wrapper) return;

    const cards = Array.from(wrapper.querySelectorAll('.service-card'));

    if (cards.length === 0) return;

    // Animate each card (except the last one) as the next card comes up
    cards.forEach((card, index) => {
        // Skip the last card (nothing comes after it)
        if (index === cards.length - 1) return;

        const nextCard = cards[index + 1];

        // Create scroll trigger for this card
        gsap.to(card, {
            scale: 0.9,
            filter: 'blur(4px)',
            ease: 'none',
            scrollTrigger: {
                trigger: nextCard,
                start: 'top 80%',
                end: 'top 30%',
                scrub: 0.25,
            },
        });
    });

    console.log('[Trac] Stacking cards animation initialized');
}

/**
 * Testimonials slider with navigation
 */
function initTestimonialsSlider() {
    const section = document.querySelector('.testimonials-section');
    if (!section) return;

    const track = section.querySelector('.testimonials-track');
    const viewport = section.querySelector('.testimonials-viewport');
    const originalCards = Array.from(
        section.querySelectorAll('.testimonial-card:not([data-clone])'),
    );
    const prevBtns = Array.from(section.querySelectorAll('.arrow-prev'));
    const nextBtns = Array.from(section.querySelectorAll('.arrow-next'));
    const currentSlide = section.querySelector('.current-slide');
    const totalSlides = section.querySelector('.total-slides');

    if (!track || !viewport || !originalCards.length) return;

    const totalCards = originalCards.length;
    let currentIndex = totalCards;
    let isAnimating = false;
    let normalizeTimer = null;

    const beforeFragment = document.createDocumentFragment();
    const afterFragment = document.createDocumentFragment();

    originalCards.forEach((card) => {
        const beforeClone = card.cloneNode(true);
        beforeClone.setAttribute('data-clone', 'before');
        beforeFragment.appendChild(beforeClone);
    });

    originalCards.forEach((card) => {
        const afterClone = card.cloneNode(true);
        afterClone.setAttribute('data-clone', 'after');
        afterFragment.appendChild(afterClone);
    });

    track.insertBefore(beforeFragment, track.firstChild);
    track.appendChild(afterFragment);

    function getCards() {
        return Array.from(section.querySelectorAll('.testimonial-card'));
    }

    if (totalSlides) {
        totalSlides.textContent = String(totalCards).padStart(2, '0');
    }

    function updateCounter() {
        if (currentSlide) {
            const displayIndex =
                (((currentIndex - totalCards) % totalCards) + totalCards) %
                totalCards;
            currentSlide.textContent = String(displayIndex + 1).padStart(
                2,
                '0',
            );
        }
    }

    function setButtonState(buttons) {
        buttons.forEach((btn) => {
            btn.disabled = false;
            btn.setAttribute('aria-disabled', 'false');

            btn.classList.remove(
                'pointer-events-none',
                'opacity-40',
                'cursor-not-allowed',
            );
            btn.classList.add('opacity-100', 'cursor-pointer');
        });
    }

    function updateButtons() {
        setButtonState(prevBtns);
        setButtonState(nextBtns);
    }

    function updateActiveState() {
        const cards = getCards();

        cards.forEach((card, index) => {
            const isActive = index === currentIndex;
            card.classList.toggle('is-active', isActive);
            card.setAttribute('aria-hidden', isActive ? 'false' : 'true');
        });
    }

    function getTranslateX(index) {
        const cards = getCards();
        const activeCard = cards[index];
        if (!activeCard) return 0;

        const trackStyles = window.getComputedStyle(track);
        const paddingLeft = parseFloat(trackStyles.paddingLeft) || 0;

        return activeCard.offsetLeft - paddingLeft;
    }

    function normalizeLoop() {
        if (currentIndex >= totalCards * 2) {
            currentIndex -= totalCards;
            refreshPosition();
        }

        if (currentIndex < totalCards) {
            currentIndex += totalCards;
            refreshPosition();
        }

        updateCounter();
        updateActiveState();
        isAnimating = false;
    }

    function goTo(index) {
        if (isAnimating) return;

        clearTimeout(normalizeTimer);

        isAnimating = true;
        currentIndex = index;
        updateCounter();
        updateButtons();
        updateActiveState();

        gsap.to(track, {
            x: -getTranslateX(currentIndex),
            duration: 0.85,
            ease: 'power3.inOut',
            overwrite: 'auto',
            onComplete: () => {
                normalizeLoop();
            },
        });
    }

    function refreshPosition() {
        gsap.set(track, {
            x: -getTranslateX(currentIndex),
        });
    }

    nextBtns.forEach((btn) =>
        btn.addEventListener('click', () => goTo(currentIndex + 1)),
    );
    prevBtns.forEach((btn) =>
        btn.addEventListener('click', () => goTo(currentIndex - 1)),
    );

    window.addEventListener('resize', () => {
        refreshPosition();
        updateButtons();
    });

    refreshPosition();
    updateActiveState();
    updateCounter();
    updateButtons();

    console.log('[Trac] Testimonials full-width slider initialized');
}

/**
 * About page "Who We Are" slider
 */
function initWhoWeAreSlider() {
    const section = document.querySelector('.who-we-are-section');
    if (!section) return;

    const slides = Array.from(section.querySelectorAll('.who-we-are-slide'));
    const dots = Array.from(section.querySelectorAll('[data-who-we-are-dot]'));

    if (slides.length === 0) return;

    let currentIndex = 0;
    let isAnimating = false;
    let autoPlay = null;

    const updateDots = () => {
        dots.forEach((dot, index) => {
            const isActive = index === currentIndex;
            dot.classList.toggle('is-active', isActive);
            dot.setAttribute('aria-pressed', isActive ? 'true' : 'false');
        });
    };

    const setInitialState = () => {
        slides.forEach((slide, index) => {
            const isActive = index === 0;

            slide.setAttribute('aria-hidden', isActive ? 'false' : 'true');

            gsap.set(slide, {
                autoAlpha: isActive ? 1 : 0,
                zIndex: isActive ? 2 : 1,
            });
        });

        updateDots();
    };

    const goToSlide = (nextIndex) => {
        if (isAnimating || nextIndex === currentIndex) return;

        if (nextIndex < 0) {
            nextIndex = slides.length - 1;
        }

        if (nextIndex >= slides.length) {
            nextIndex = 0;
        }

        const currentSlide = slides[currentIndex];
        const nextSlide = slides[nextIndex];

        isAnimating = true;

        slides.forEach((slide, index) => {
            slide.setAttribute(
                'aria-hidden',
                index === nextIndex ? 'false' : 'true',
            );
        });

        gsap.set(nextSlide, {
            autoAlpha: 0,
            zIndex: 3,
        });

        const tl = gsap.timeline({
            defaults: {
                duration: 0.7,
                ease: 'power2.out',
            },
            onComplete: () => {
                gsap.set(currentSlide, {
                    autoAlpha: 0,
                    zIndex: 1,
                });

                gsap.set(nextSlide, {
                    autoAlpha: 1,
                    zIndex: 2,
                });

                currentIndex = nextIndex;
                updateDots();
                isAnimating = false;
            },
        });

        tl.to(currentSlide, { autoAlpha: 0 }, 0).to(
            nextSlide,
            { autoAlpha: 1 },
            0,
        );
    };

    const startAutoplay = () => {
        if (autoPlay) return;

        autoPlay = window.setInterval(() => {
            goToSlide(currentIndex + 1);
        }, 5000);
    };

    const stopAutoplay = () => {
        if (!autoPlay) return;
        window.clearInterval(autoPlay);
        autoPlay = null;
    };

    dots.forEach((dot) => {
        dot.addEventListener('click', () => {
            const nextIndex = Number(dot.dataset.whoWeAreDot);
            stopAutoplay();
            goToSlide(nextIndex);
            startAutoplay();
        });
    });

    section.addEventListener('mouseenter', stopAutoplay);
    section.addEventListener('mouseleave', startAutoplay);

    setInitialState();

    ScrollTrigger.create({
        trigger: section,
        start: 'top 75%',
        once: true,
        onEnter: () => {
            startAutoplay();
        },
    });

    console.log('[Trac] Who we are slider initialized');
}

function initWhoWeAreCounters() {
    const counterSection = document.querySelector('[data-counter-section]');
    if (!counterSection) return;

    const reels = Array.from(
        counterSection.querySelectorAll('[data-digit-reel]'),
    );
    const fades = Array.from(
        counterSection.querySelectorAll('[data-counter-fade]'),
    );

    if (!reels.length) return;

    reels.forEach((reel) => {
        gsap.set(reel, { y: 0 });
    });

    gsap.set(fades, { autoAlpha: 0 });

    ScrollTrigger.create({
        trigger: counterSection,
        start: 'top 82%',
        once: true,
        onEnter: () => {
            const tl = gsap.timeline();

            reels.forEach((reel, index) => {
                const digits = reel.querySelectorAll('.counter-digit');
                if (!digits.length) return;

                // Use getBoundingClientRect for sub-pixel precision
                const digitHeight = digits[0].getBoundingClientRect().height;

                const targetDigit = Number(reel.dataset.targetDigit || 0);
                const loopCount = Number(reel.dataset.reelLoops || 3);

                // The PHP logic generates: (loops * 10) + (digits 0 to target)
                // To land perfectly, we calculate the total items to slide up
                const finalIndex = loopCount * 10 + targetDigit;

                tl.to(
                    reel,
                    {
                        y: -(digitHeight * finalIndex),
                        duration: 1.5,
                        ease: 'power3.inOut',
                    },
                    index * 0.12, // Staggering the start of each reel
                );
            });

            if (fades.length) {
                tl.to(
                    fades,
                    {
                        autoAlpha: 1,
                        duration: 0.45,
                        delay: 2,
                        stagger: 0.08,
                        ease: 'power2.out',
                    },
                    0.45,
                );
            }
        },
    });

    console.log('[Trac] Who we are counters initialized');
}

function initWhatWeDoSlider() {
    const section = document.querySelector('[data-what-we-do-slider]');
    if (!section) return;
    if (section.dataset.whatWeDoSliderInit === 'true') return;
    section.dataset.whatWeDoSliderInit = 'true';

    const viewport = section.querySelector('[data-what-we-do-viewport]');
    const track = section.querySelector('[data-what-we-do-track]');
    const prevBtn = section.querySelector('[data-what-we-do-prev]');
    const nextBtn = section.querySelector('[data-what-we-do-next]');
    const cards = Array.from(section.querySelectorAll('.what-we-do-card'));

    if (!viewport || !track || !prevBtn || !nextBtn || cards.length === 0) {
        return;
    }

    // Mobile stacks cards vertically; no slider needed.
    if (window.innerWidth <= 768) return;

    // If the old scroll version ever ran (or a transition left transforms behind),
    // ensure we start from a clean, non-transformed layout so padding/scroll works.
    gsap.set(track, { clearProps: 'transform' });
    gsap.set(cards, { clearProps: 'transform,opacity' });

    let scrollStep = 0;

    function computeScrollStep() {
        const firstCard = cards[0];
        const cardWidth = firstCard
            ? firstCard.getBoundingClientRect().width
            : 0;
        const styles = window.getComputedStyle(track);
        const gap = parseFloat(styles.columnGap || styles.gap || '0') || 0;
        scrollStep = cardWidth + gap;
    }

    function updateButtons() {
        const maxScrollLeft = viewport.scrollWidth - viewport.clientWidth;
        prevBtn.disabled = viewport.scrollLeft <= 1;
        nextBtn.disabled = viewport.scrollLeft >= maxScrollLeft - 1;
    }

    function scrollByStep(direction) {
        if (!scrollStep) computeScrollStep();
        viewport.scrollBy({ left: scrollStep * direction, behavior: 'smooth' });
    }

    prevBtn.addEventListener('click', () => scrollByStep(-1));
    nextBtn.addEventListener('click', () => scrollByStep(1));

    let raf = null;
    viewport.addEventListener(
        'scroll',
        () => {
            if (raf) return;
            raf = requestAnimationFrame(() => {
                raf = null;
                updateButtons();
            });
        },
        { passive: true },
    );

    window.addEventListener('resize', () => {
        computeScrollStep();
        updateButtons();
    });

    computeScrollStep();
    updateButtons();

    console.log('[Trac] What we do slider initialized');
}

function initTracStoryTimeline() {
    const section = document.querySelector('.trac-story-section');
    if (!section) return;

    const reels = Array.from(
        section.querySelectorAll('[data-story-year-reel]'),
    );
    if (!reels.length) return;

    if (window.innerWidth <= 768) {
        reels.forEach((reel) => {
            gsap.set(reel, { y: 0 });
        });
        return;
    }

    const storyYears = ['2026', '2025', '2024', '2023', '2020'];
    const yearCount = storyYears.length;

    ScrollTrigger.getAll().forEach((trigger) => {
        if (
            trigger.vars?.id === 'trac-story-main' ||
            String(trigger.vars?.id || '').startsWith('trac-story-year-')
        ) {
            trigger.kill();
        }
    });

    reels.forEach((reel) => {
        gsap.set(reel, { y: 0 });
    });

    const digitHeights = reels.map((reel) => {
        const digit = reel.querySelector('.trac-story-year-digit');
        return digit ? digit.getBoundingClientRect().height : 0;
    });

    const totalScroll = window.innerHeight * yearCount;
    const segmentDuration = 1; // 1 timeline unit = 1 year block

    const tl = gsap.timeline({
        scrollTrigger: {
            id: 'trac-story-main',
            trigger: section,
            start: 'top 80%',
            end: `+=${totalScroll}`,
            scrub: true,
            invalidateOnRefresh: true,
        },
        defaults: {
            ease: 'none',
        },
    });

    // Year 1 stays for first 100vh
    tl.set(reels, { y: 0 }, 0);

    // Each next year gets exactly one segment
    for (let stage = 1; stage < yearCount; stage += 1) {
        tl.to(
            reels,
            {
                y: (index) => -(digitHeights[index] * stage),
                duration: segmentDuration,
                ease: 'power1.inOut',
                stagger: {
                    each: 0.1,
                },
            },
            stage,
        );
    }

    // Create markers for each 100vh block
    storyYears.forEach((year, index) => {
        ScrollTrigger.create({
            id: `trac-story-year-${year}`,
            trigger: section,
            start: () => `top+=${window.innerHeight * index} bottom`,
            end: () => `top+=${window.innerHeight * (index + 1)} top`,
            onEnter: () => console.log(`[Trac Story] Enter ${year}`),
            onEnterBack: () => console.log(`[Trac Story] Enter back ${year}`),
        });
    });

    ScrollTrigger.refresh();

    console.log('[Trac] TrAC story timeline initialized');
}

/**
 * Draw network SVG paths when the section enters the viewport
 */
function initOurNetworkAnimation() {
    const section = document.querySelector('.our-network-section');
    if (!section) return;

    const lineLayer = section.querySelector('[data-network-draw="line"]');
    if (!lineLayer) return;

    const linePaths = Array.from(lineLayer.querySelectorAll('path'));
    if (!linePaths.length) return;

    linePaths.forEach((path) => {
        if (typeof path.getTotalLength !== 'function') return;

        const length = path.getTotalLength();

        gsap.set(path, {
            strokeDasharray: length,
            strokeDashoffset: length,
            opacity: 1,
        });
    });

    const tl = gsap.timeline({
        delay: 1,
        scrollTrigger: {
            trigger: section,
            start: 'top 70%',
            once: true,
        },
    });

    linePaths.forEach((path, index) => {
        tl.to(
            path,
            {
                strokeDashoffset: 0,
                duration: 0.5,
                ease: 'power2.out',
            },
            index === 0 ? 0 : '>-0.3',
        );
    });
    console.log('[Trac] Our Network line animation initialized');
}

function initOurNetworkPointers() {
    const section = document.querySelector('.our-network-section');
    if (!section || section.dataset.networkPointersInit === 'true') return;

    section.dataset.networkPointersInit = 'true';

    const drawLayers = Array.from(
        section.querySelectorAll(
            '[data-network-draw="dotted"], [data-network-draw="circle"]',
        ),
    );

    const allCircles = drawLayers.flatMap((layer) =>
        Array.from(layer.querySelectorAll('circle')),
    );

    const pointerCards = Array.from(section.querySelectorAll('.pointer-card'));

    if (!allCircles.length || !pointerCards.length) return;

    if (window.gsap) {
        window.gsap.set(pointerCards, {
            autoAlpha: 0,
            yPercent: 30,
            pointerEvents: 'none',
        });
    }

    const isOuterNode = (circle) =>
        circle.getAttribute('r') === '11.5' &&
        circle.getAttribute('fill') === '#EFF4FC' &&
        circle.getAttribute('stroke') === '#001837';

    const isInnerNode = (circle) =>
        circle.getAttribute('r') === '7' &&
        circle.getAttribute('fill') === '#F0741C';

    const getCirclePoint = (circle) => ({
        cx: parseFloat(circle.getAttribute('cx')),
        cy: parseFloat(circle.getAttribute('cy')),
    });

    const isSamePoint = (a, b, tolerance = 1) =>
        Math.abs(a.cx - b.cx) <= tolerance &&
        Math.abs(a.cy - b.cy) <= tolerance;

    const getLayerName = (circle) => {
        const layer = circle.closest('[data-network-draw]');
        return layer?.getAttribute('data-network-draw') || '';
    };

    const findPointerCardByCoordinate = (node) => {
        return pointerCards.find((card) => {
            const cardLayer = card.getAttribute('data-node-layer');
            const cardCx = parseFloat(card.getAttribute('data-node-cx'));
            const cardCy = parseFloat(card.getAttribute('data-node-cy'));

            if (!cardLayer || Number.isNaN(cardCx) || Number.isNaN(cardCy)) {
                return false;
            }

            if (cardLayer !== node.layerName) return false;

            return isSamePoint(
                {
                    cx: cardCx,
                    cy: cardCy,
                },
                node.point,
                1,
            );
        });
    };

    const outerCircles = allCircles.filter(isOuterNode);
    const innerCircles = allCircles.filter(isInnerNode);

    const usedInnerCircles = new Set();
    const nodeGroups = [];

    outerCircles.forEach((outerCircle) => {
        const outerPoint = getCirclePoint(outerCircle);
        const outerLayer = getLayerName(outerCircle);

        const innerCircle = innerCircles.find((inner) => {
            if (usedInnerCircles.has(inner)) return false;
            if (getLayerName(inner) !== outerLayer) return false;

            const innerPoint = getCirclePoint(inner);

            return isSamePoint(outerPoint, innerPoint, 1);
        });

        if (!innerCircle) return;

        const pointerCard = findPointerCardByCoordinate({
            point: outerPoint,
            layerName: outerLayer,
        });

        if (!pointerCard) return;

        usedInnerCircles.add(innerCircle);

        const parent = outerCircle.parentNode;
        const group = document.createElementNS(
            'http://www.w3.org/2000/svg',
            'g',
        );

        group.classList.add('network-node');
        group.setAttribute('tabindex', '0');
        group.setAttribute('role', 'button');
        group.setAttribute(
            'aria-label',
            `Show ${
                pointerCard.querySelector('h3')?.textContent?.trim() ||
                'network'
            } pointer`,
        );

        parent.insertBefore(group, outerCircle);
        group.appendChild(outerCircle);
        group.appendChild(innerCircle);

        nodeGroups.push({
            group,
            point: outerPoint,
            layerName: outerLayer,
            pointerCard,
        });
    });

    let activeCard = null;
    let hideTimeout = null;
    const hidePointer = (card) => {
        if (!card) return;

        card.classList.remove('is-active');

        if (window.gsap) {
            window.gsap.killTweensOf(card);

            window.gsap.to(card, {
                autoAlpha: 0,
                yPercent: 30,
                duration: 0.7,
                ease: 'power2.out',
                pointerEvents: 'none',
            });
        } else {
            card.style.opacity = '0';
            card.style.visibility = 'hidden';
            card.style.pointerEvents = 'none';
            card.style.transform = 'translateY(30%)';
        }

        if (activeCard === card) {
            activeCard = null;
        }
    };

    const showPointer = (card) => {
        if (!card) return;

        clearTimeout(hideTimeout);

        if (activeCard && activeCard !== card) {
            hidePointer(activeCard);
        }

        activeCard = card;
        card.classList.add('is-active');

        if (window.gsap) {
            window.gsap.killTweensOf(card);

            window.gsap.fromTo(
                card,
                {
                    autoAlpha: 0,
                    yPercent: 30,
                },
                {
                    autoAlpha: 1,
                    yPercent: 0,
                    duration: 0.9,
                    ease: 'power2.out',
                    pointerEvents: 'auto',
                },
            );
        } else {
            card.style.opacity = '1';
            card.style.visibility = 'visible';
            card.style.pointerEvents = 'auto';
            card.style.transform = 'translateY(0)';
        }
    };

    const delayedHide = (card) => {
        // clearTimeout(hideTimeout);

        // hideTimeout = setTimeout(() => {
        hidePointer(card);
        // }, 220);
    };

    nodeGroups.forEach((node) => {
        const { group, pointerCard } = node;

        group.addEventListener('mouseenter', () => showPointer(pointerCard));
        group.addEventListener('mouseleave', () => delayedHide(pointerCard));

        group.addEventListener('focus', () => showPointer(pointerCard));
        group.addEventListener('blur', () => delayedHide(pointerCard));

        group.addEventListener('click', (e) => {
            e.stopPropagation();
            showPointer(pointerCard);
        });

        pointerCard.addEventListener('mouseenter', () =>
            showPointer(pointerCard),
        );
        pointerCard.addEventListener('mouseleave', () =>
            delayedHide(pointerCard),
        );
    });

    section.addEventListener('mouseleave', () => {
        clearTimeout(hideTimeout);

        hideTimeout = setTimeout(() => {
            hideAllPointers();
        }, 120);
    });

    document.addEventListener('click', (e) => {
        if (!section.contains(e.target)) {
            hideAllPointers();
        }
    });

    console.log('[Trac] Our Network pointers initialized', {
        groupedNodes: nodeGroups.length,
        cards: pointerCards.length,
    });
}

window.initOurNetworkPointers = initOurNetworkPointers;

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initOurNetworkPointers);
} else {
    initOurNetworkPointers();
}

function initParallaxImgSlider() {
    const outer = document.querySelector('[data-parallax-slider]');
    if (!outer) return;

    const track = outer.querySelector('[data-parallax-slider-track]');
    if (!track) return;

    const updateHeight = () => {
        const travel = track.scrollWidth - window.innerWidth;
        outer.style.height = `${Math.max(travel + window.innerHeight, window.innerHeight)}px`;
    };

    updateHeight();

    const resizeObserver = new ResizeObserver(updateHeight);
    resizeObserver.observe(track);
    window.addEventListener('resize', updateHeight);

    const ctx = gsap.context(() => {
        const horizontalTween = gsap.to(track, {
            x: () => -(track.scrollWidth - window.innerWidth),
            ease: 'none',
            scrollTrigger: {
                trigger: outer,
                start: 'top top',
                end: () => `+=${track.scrollWidth - window.innerWidth}`,
                scrub: 1,
                invalidateOnRefresh: true,
            },
        });

        const slideWrappers = gsap.utils.toArray('[data-parallax-slide]');

        gsap.fromTo(
            slideWrappers,
            {
                clipPath: 'inset(0 100% 0 0)',
            },
            {
                clipPath: 'inset(0 0% 0 0)',
                ease: 'power3.inOut',
                duration: 0.6,
                stagger: 0.08,
                scrollTrigger: {
                    trigger: outer,
                    start: '5% bottom',
                    toggleActions: 'play none none none',
                },
            },
        );

        const slides = gsap.utils.toArray('.parallax-img');

        slides.forEach((el) => {
            gsap.fromTo(
                el,
                {
                    xPercent: -25,
                    scale: 1.25,
                },
                {
                    xPercent: 25,
                    scale: 1.25,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: el,
                        containerAnimation: horizontalTween,
                        start: 'left right',
                        end: 'right left',
                        scrub: true,
                    },
                },
            );
        });
    }, outer);

    ScrollTrigger.refresh();

    outer._parallaxSliderCleanup = () => {
        ctx.revert();
        resizeObserver.disconnect();
        window.removeEventListener('resize', updateHeight);
    };

    console.log('[Trac] Parallax image slider initialized');
}

// footer overlay

function initFooterOverlayFade() {
    const footer = document.getElementById('site-footer');
    const footerContainer = footer?.querySelector('.footer-container');

    if (!footer || !footerContainer) return;

    gsap.set(footerContainer, {
        yPercent: 50,
        willChange: 'transform',
    });

    gsap.to(footerContainer, {
        yPercent: 0,
        ease: 'power1.out',
        scrollTrigger: {
            trigger: footer,
            start: 'top bottom',
            end: 'bottom 88%',
            scrub: true,
        },
    });

    console.log('[Trac] Footer container parallax initialized');
}

// our offering animation

function initOurOfferingAccordion() {
    const section = document.querySelector('.our-offering-section');
    if (!section) return;

    const items = Array.from(section.querySelectorAll('[data-offering-item]'));
    if (!items.length) return;

    const setInitial = () => {
        items.forEach((item, index) => {
            const body = item.querySelector('.our-offering-item__body');
            const inner = item.querySelector('.our-offering-item__body-inner');
            if (!body || !inner) return;

            if (index === 0) {
                item.classList.add('is-active');
                gsap.set(item, {
                    backgroundColor: '#EEF3FC',
                    borderColor: '#10417f',
                    scale: 1,
                });
                gsap.set(body, {
                    height: inner.offsetHeight,
                    opacity: 1,
                });
            } else {
                item.classList.remove('is-active');
                gsap.set(item, {
                    backgroundColor: '#ffffff',
                    borderColor: 'transparent',
                    scale: 0.985,
                });
                gsap.set(body, {
                    height: 0,
                    opacity: 0,
                });
            }
        });
    };

    const activateItem = (activeIndex) => {
        items.forEach((item, index) => {
            const body = item.querySelector('.our-offering-item__body');
            const inner = item.querySelector('.our-offering-item__body-inner');
            if (!body || !inner) return;

            const isActive = index === activeIndex;
            item.classList.toggle('is-active', isActive);

            gsap.killTweensOf(item);
            gsap.killTweensOf(body);

            if (isActive) {
                gsap.to(item, {
                    backgroundColor: '#EEF3FC',
                    borderColor: '#10417f',
                    scale: 1,
                    duration: 0.45,
                    ease: 'power3.out',
                    overwrite: true,
                });

                gsap.to(body, {
                    height: inner.offsetHeight,
                    opacity: 1,
                    duration: 0.45,
                    ease: 'power3.out',
                    overwrite: true,
                });
            } else {
                gsap.to(item, {
                    backgroundColor: '#ffffff',
                    borderColor: 'transparent',
                    scale: 0.985,
                    duration: 0.4,
                    ease: 'power3.out',
                    overwrite: true,
                });

                gsap.to(body, {
                    height: 0,
                    opacity: 0,
                    duration: 0.35,
                    ease: 'power3.out',
                    overwrite: true,
                });
            }
        });
    };

    setInitial();

    const total = items.length;

    ScrollTrigger.create({
        trigger: section,
        start: 'top top',
        end: 'bottom bottom',
        scrub: 0.6,
        onUpdate: (self) => {
            const index = Math.min(
                total - 1,
                Math.floor(self.progress * total),
            );
            activateItem(index);
        },
    });
}

// carrier overview
function initSolutionOverviewStack() {
    const section = document.querySelector('.solution-overview-section');
    if (!section) return;

    const stack = section.querySelector('[data-solution-stack]');
    const cards = Array.from(section.querySelectorAll('[data-solution-card]'));

    if (!stack || !cards.length) return;

    if (window.innerWidth <= 768) {
        cards.forEach((card, index) => {
            gsap.set(card, {
                clearProps: 'all',
                position: 'relative',
                zIndex: index + 1,
            });
        });
        return;
    }

    const CARD_GAP = 14;
    const STACK_LIFT = 30;
    const SCALE_STEP = 0.04;
    const ENTRY_Y = 540;
    const SEGMENT = 1;

    const setInitialLayout = () => {
        let maxHeight = 0;

        cards.forEach((card, index) => {
            const h = card.offsetHeight;
            if (h > maxHeight) maxHeight = h;

            if (index === 0) {
                gsap.set(card, {
                    position: 'absolute',
                    left: 0,
                    top: 0,
                    y: 0,
                    scale: 1,
                    zIndex: index + 1,
                });
            } else {
                gsap.set(card, {
                    position: 'absolute',
                    left: 0,
                    top: 0,
                    y: ENTRY_Y,
                    scale: 1,
                    zIndex: index + 1,
                });
            }
        });

        stack.style.minHeight = `${maxHeight + cards.length * CARD_GAP + 60}px`;
    };

    setInitialLayout();

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: section,
            start: 'top top',
            end: () => 'bottom 60%',
            // markers: true,
            scrub: true,
            invalidateOnRefresh: true,
            onRefresh: setInitialLayout,
        },
    });

    for (let activeIndex = 1; activeIndex < cards.length; activeIndex += 1) {
        const incomingCard = cards[activeIndex];
        const previousCards = cards.slice(0, activeIndex);

        tl.to(
            incomingCard,
            {
                y: activeIndex * CARD_GAP,
                duration: SEGMENT,
                ease: 'none',
            },
            activeIndex - 1,
        );

        previousCards.forEach((card, prevIndex) => {
            tl.to(
                card,
                {
                    y: prevIndex * CARD_GAP - activeIndex * STACK_LIFT,
                    scale: Math.max(
                        0.82,
                        1 - (activeIndex - prevIndex) * SCALE_STEP,
                    ),
                    duration: SEGMENT,
                    ease: 'none',
                },
                activeIndex - 1,
            );
        });
    }

    // final lift after the last card has stacked
    tl.to(
        cards,
        {
            y: (index) => index * CARD_GAP - cards.length * STACK_LIFT,
            scale: (index) =>
                Math.max(0.82, 1 - (cards.length - 1 - index) * SCALE_STEP),
            duration: SEGMENT,
            ease: 'none',
            stagger: 0,
        },
        cards.length - 1,
    );

    console.log('[Trac] Solution overview stack initialized');
}

// why choose trac

function initWhyChooseTracCards() {
    const section = document.querySelector('.why-choose-trac-section');
    if (!section) return;

    const container = section.querySelector('.why-choose-container');
    const cards = Array.from(section.querySelectorAll('[data-why-card]'));

    if (!container || !cards.length) return;

    if (window.innerWidth <= 768) {
        gsap.set(cards, { clearProps: 'all' });
        gsap.set(container, { clearProps: 'all' });
        return;
    }

    const randomBetween = (min, max) => gsap.utils.random(min, max, 0.1);

    const startStates = [
        { x: -80, y: 40, rotation: -6 },
        { x: -20, y: 8, rotation: 4 },
        { x: 30, y: 32, rotation: -5 },
        { x: 70, y: 12, rotation: 6 },
        { x: 120, y: 48, rotation: -4 },
        { x: 170, y: 22, rotation: 5 },
    ];

    const endStates = cards.map((_, i) => ({
        x: randomBetween(-80, 120) + i * 8,
        y: randomBetween(-30, 70),
        rotation: randomBetween(-14, 14),
    }));

    cards.forEach((card, index) => {
        const start = startStates[index] || {
            x: randomBetween(-80, 120),
            y: randomBetween(-20, 60),
            rotation: randomBetween(-8, 8),
        };

        gsap.set(card, {
            x: start.x,
            y: start.y,
            rotation: start.rotation,
            transformOrigin: '50% 50%',
        });
    });

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: section,
            start: 'top 50%',
            end: 'bottom 30%',
            // markers:true,
            scrub: true,
            invalidateOnRefresh: true,
        },
    });

    tl.to(
        container,
        {
            translateX: '-75%',
            ease: 'none',
        },
        0,
    );

    cards.forEach((card, index) => {
        const target = endStates[index];

        tl.to(
            card,
            {
                x: target.x,
                y: target.y,
                rotation: target.rotation,
                ease: 'none',
            },
            0,
        );
    });

    console.log('[Trac] Why Choose TrAC cards initialized');
}

/**
 * Create scroll-triggered counter animation
 */
export function animateCounter(el, target, duration = 2) {
    const obj = { value: 0 };

    return gsap.to(obj, {
        value: target,
        duration,
        ease: 'power2.out',
        scrollTrigger: {
            trigger: el,
            start: 'top 80%',
            once: true,
        },
        onUpdate: () => {
            el.textContent = Math.round(obj.value).toLocaleString();
        },
    });
}

/**
 * Create horizontal scroll section
 */
export function createHorizontalScroll(container, items) {
    const containerWidth = container.scrollWidth;
    const viewportWidth = window.innerWidth;

    gsap.to(items, {
        x: () => -(containerWidth - viewportWidth),
        ease: 'none',
        scrollTrigger: {
            trigger: container,
            start: 'top top',
            end: () => `+=${containerWidth - viewportWidth}`,
            scrub: 1,
            // Prefer CSS `position: sticky` sections instead of ScrollTrigger pinning.
        },
    });
}

function initHiInstallationScroll() {
    const section = document.querySelector('[data-hi-installation]');
    if (!section) return;

    const trackArea = section.querySelector('.hi-installation-track-area');
    const track = section.querySelector('[data-hi-installation-track]');
    const cards = Array.from(
        section.querySelectorAll('[data-hi-installation-step]'),
    );
    const progressLine = section.querySelector('.progress-line');

    if (!trackArea || !track || !cards.length || !progressLine) return;

    if (window.innerWidth <= 768) {
        gsap.set(trackArea, { xPercent: 0 });
        gsap.set(progressLine, { scaleX: 1, transformOrigin: 'left center' });
        cards.forEach((card, index) => {
            card.classList.toggle('is-active', index === 0);
        });
        return;
    }

    gsap.set(trackArea, { xPercent: 15, force3D: true });
    gsap.set(progressLine, {
        scaleX: 0,
        transformOrigin: 'left center',
        force3D: true,
    });

    const setActiveCard = (activeIndex) => {
        cards.forEach((card, index) => {
            card.classList.toggle('is-active', index === activeIndex);
        });
    };

    setActiveCard(0);

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: section,
            start: 'top top',
            end: 'bottom bottom',
            scrub: true,
            invalidateOnRefresh: true,
            onUpdate: (self) => {
                const progress = self.progress;
                const maxIndex = cards.length - 1;
                const activeIndex = Math.min(
                    maxIndex,
                    Math.floor(progress * cards.length),
                );

                setActiveCard(activeIndex);
            },
        },
    });

    tl.to(
        trackArea,
        {
            xPercent: -70,
            ease: 'none',
        },
        0,
    ).to(
        progressLine,
        {
            scaleX: 1,
            ease: 'none',
        },
        0,
    );

    console.log('[Trac] Hi installation scroll initialized');
}

/**
 * Refresh all ScrollTriggers (call after dynamic content loads)
 */
export function refreshAnimations() {
    ScrollTrigger.refresh();
}

// Export individual animation creators for use in components
export { gsap, ScrollTrigger };
