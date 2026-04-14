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
    initFadeAnimations();
    initHeroAnimations();
    initSectionAnimations();
    initParallaxAnimations();
    initHiInstallationScroll();
    initTextAnimations();
    initPartnersProgramCards();
    initHomeInternetWhyTrac();
			    initSmeProblemStatement();
    initPartnerVoicesSlider();
    initTeamSlider();
    initStackingCards();
    initTestimonialsSlider();
    initWhoWeAreSlider();
    initWhoWeAreCounters();
    initWhatWeDoScroll();
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

    // Refresh ScrollTrigger after all animations are set up
    ScrollTrigger.refresh();

    console.log('[Trac] Animations initialized');
}

function initCommunityHubCards() {
    const section = document.querySelector('.community-hub-section');
    if (!section || window.innerWidth <= 1024) return;

    const cards = Array.from(
        section.querySelectorAll('[data-community-hub-card]')
    );

    if (cards.length < 5) return;

    const prefersReducedMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)'
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
        0
    ).to(
        [outerLeft, outerRight],
        {
            y: 0,
            duration: 1,
            ease: 'none',
        },
        0
    );
}

function initImpactGallery() {
    const section = document.querySelector('.impact-gallery-section');
    if (!section || window.innerWidth <= 1024) return;

    const images = Array.from(section.querySelectorAll('[data-impact-image]'));
    if (images.length !== 6) return;

    const titleSecondary = section.querySelector('.impact-gallery-title__secondary');

    const prefersReducedMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)'
    ).matches;

    const stripStates = [
        { left: '42%', top: '105%', width: '8.6%', height: '11.2%', rotation: -7 },
        { left: '46%', top: '104.5%', width: '7.9%', height: '10.4%', rotation: -4 },
        { left: '50%', top: '105%', width: '7.2%', height: '9.8%', rotation: 6 },
        { left: '54%', top: '104.5%', width: '7.9%', height: '10.4%', rotation: -6 },
        { left: '58%', top: '105%', width: '8.8%', height: '11.8%', rotation: 8 },
        { left: '62%', top: '105%', width: '8.8%', height: '11.8%', rotation: 5 },
    ];

    const finalStates = [
        { left: '5.5%', top: '3%', width: '24.5%', height: '28.1%', rotation: -3.4 },
        { left: '6.2%', top: '22.8%', width: '16.6%', height: '24.1%', rotation: -3.4 },
        { left: '76.8%', top: '5.2%', width: '13.2%', height: '28.3%', rotation: 7.5 },
        { left: '75.1%', top: '33.4%', width: '16.8%', height: '23.2%', rotation: -5.8 },
        { left: '9.1%', top: '61.7%', width: '23.1%', height: '33.7%', rotation: 8.3 },
        { left: '67.4%', top: '68.6%', width: '23.1%', height: '33.7%', rotation: 8.3 },
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
            0
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
        0
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
        0.33
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
        0.66
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
	            }
	        );
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

	    const items = Array.from(section.querySelectorAll('[data-sme-problem-item]'));
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
            }
        );
    });
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

    const slides = Array.from(track.querySelectorAll('[data-partner-voices-slide]'));
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

    if (!section || !svg) {
        return;
    }

    const strokePaths = Array.from(svg.querySelectorAll('path[stroke]'));

    if (!strokePaths.length) {
        return;
    }
    const accentPaths = Array.from(svg.querySelectorAll("path[fill^='url(']"));
    let defs = svg.querySelector('defs');

    if (!defs) {
        defs = document.createElementNS('http://www.w3.org/2000/svg', 'defs');
        svg.appendChild(defs);
    }

    const travelEntries = strokePaths.map((path, index) => {
        const length = path.getTotalLength();
        const start = path.getPointAtLength(0);
        const end = path.getPointAtLength(length);
        const gradientId = `cta-travel-gradient-${index}`;
        const gradient = document.createElementNS(
            'http://www.w3.org/2000/svg',
            'linearGradient',
        );

        gradient.setAttribute('id', gradientId);
        gradient.setAttribute('gradientUnits', 'userSpaceOnUse');
        // Align gradient with each path direction (top -> bottom on these arcs).
        gradient.setAttribute('x1', String(start.x));
        gradient.setAttribute('y1', String(start.y));
        gradient.setAttribute('x2', String(end.x));
        gradient.setAttribute('y2', String(end.y));

        [
            { offset: '0%', color: '#10417F', opacity: '0' },
            { offset: '25%', color: '#10417F', opacity: '0.5' },
            { offset: '75%', color: '#10417F', opacity: '0.75' },
            { offset: '100%', color: '#10417F', opacity: '1' },
        ].forEach(({ offset, color, opacity }) => {
            const stop = document.createElementNS(
                'http://www.w3.org/2000/svg',
                'stop',
            );
            stop.setAttribute('offset', offset);
            stop.setAttribute('stop-color', color);
            stop.setAttribute('stop-opacity', opacity);
            gradient.appendChild(stop);
        });

        defs.appendChild(gradient);

        const clone = path.cloneNode(false);
        clone.removeAttribute('fill');
        clone.setAttribute('fill', 'none');
        clone.setAttribute('stroke', `url(#${gradientId})`);
        clone.setAttribute('stroke-width', '1.25');
        clone.setAttribute('stroke-linecap', 'round');
        clone.setAttribute('stroke-linejoin', 'round');
        clone.setAttribute('data-cta-travel', '');
        defs.parentNode.insertBefore(clone, defs);

        gsap.set(path, {
            strokeDasharray: length,
            strokeDashoffset: length,
        });

        gsap.set(clone, {
            opacity: 0,
            // One moving dash that travels from start -> end.
            // Keep it shorter than before so the highlight feels tighter.
            strokeDasharray: `${Math.max(length * 0.04, 20)} ${length}`,
            strokeDashoffset: 0,
        });

        return { clone, length };
    });

    gsap.set(accentPaths, { opacity: 0 });

    const runTravelPulse = (entry) => {
        const { clone, length } = entry;
        const segmentLength = gsap.utils.random(
            Math.max(length * 0.03, 18),
            Math.max(length * 0.055, 38),
        );

        gsap.set(clone, {
            opacity: 0,
            strokeDasharray: `${segmentLength} ${length}`,
            strokeDashoffset: 0,
        });

        const tl = gsap.timeline();

        // Start visible at the path start, then travel start -> end.
        // (Fade-in was making it feel like it "appears" mid-path.)
        tl.set(clone, { opacity: 1 }, 0).to(
            clone,
            {
                // Travel start -> end
                strokeDashoffset: -(length + segmentLength),
                duration: gsap.utils.random(3.2, 4.8),
                ease: 'none',
            },
            0,
        );

        tl.to(
            clone,
            { opacity: 0, duration: 0.32, ease: 'power1.inOut' },
            `>${-0.28}`,
        );

        return tl;
    };

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: section,
            start: 'top 80%',
            once: true,
        },
    });

    tl.to(strokePaths, {
        strokeDashoffset: 0,
        duration: 1.6,
        stagger: {
            each: 0.03,
            from: 'start',
        },
        ease: 'power2.out',
    }).call(() => {
        const maxConcurrent = Math.min(5, travelEntries.length);
        const active = new Set();

        const pickNextEntry = () => {
            const available = travelEntries.filter(
                (entry) => !active.has(entry),
            );
            if (!available.length) {
                return null;
            }
            return available[Math.floor(Math.random() * available.length)];
        };

        const startPulse = (entry) => {
            if (!entry || active.has(entry)) {
                return;
            }

            active.add(entry);

            runTravelPulse(entry).eventCallback('onComplete', () => {
                active.delete(entry);
                // Keep ~5 running, but start replacement slightly staggered.
                gsap.delayedCall(gsap.utils.random(0.05, 0.55), () => {
                    startPulse(pickNextEntry() || entry);
                });
            });
        };

        const fillToMax = () => {
            const needed = maxConcurrent - active.size;
            for (let i = 0; i < needed; i += 1) {
                gsap.delayedCall(gsap.utils.random(0.0, 0.9), () => {
                    startPulse(pickNextEntry());
                });
            }
        };

        // Start a small number of pulses with random offsets,
        // keeping concurrency capped so they don't all move at once.
        fillToMax();

        // Safety: if something ends early, top back up.
        gsap.delayedCall(1.5, fillToMax);
        gsap.delayedCall(3.5, fillToMax);
    });
}

/**
 * Basic fade animations for [data-animate] elements
 */
function initFadeAnimations() {
    const animatedElements = document.querySelectorAll('[data-animate]');

    animatedElements.forEach((el) => {
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
    if (hero.hasAttribute('data-hero-static')) return;

    const heroTitle = hero.querySelector('.hero-title');
    const heroSubtitle = hero.querySelector('.hero-subtitle');
    const heroCta = hero.querySelector('.hero-cta');
    const heroMedia = hero.querySelector('.hero-media');

    // Create hero timeline
    const tl = gsap.timeline({
        defaults: { ease: 'power3.out' },
    });

    // Animate hero content after page load
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

    // Hero parallax on scroll
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

    const activeImageWrap = section.querySelector('.team-slider-active-image');
    const activeName = section.querySelector('[data-team-slider-active-name]');
    const activeRole = section.querySelector('[data-team-slider-active-role]');
    const activeLinkedin = section.querySelector('[data-team-slider-linkedin]');

    const railWrap = section.querySelector('.team-slider-rail-wrap');
    const rail = section.querySelector('[data-team-slider-rail]');

    const initialThumbs = Array.from(
        section.querySelectorAll('[data-team-slider-thumb]')
    );

    if (
        !prevBtn ||
        !nextBtn ||
        !activeImageWrap ||
        !activeName ||
        !activeRole ||
        !activeLinkedin ||
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
    }));

    let currentIndex = 0;
    let isAnimating = false;

    const mod = (n, m) => ((n % m) + m) % m;

    const createActiveSlideMarkup = (member) => {
        return `
            <div class="team-slider-active-slide">
                <img
                    src="${member.image}"
                    alt="${member.name}"
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
                data-name="${member.name}"
                data-role="${member.role}"
                data-image="${member.image}"
                data-linkedin="${member.linkedin}"
                aria-label="${member.name}"
            >
                <img
                    src="${member.image}"
                    alt="${member.name}"
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
        activeLinkedin.href = member.linkedin || '#';
    };

    const renderActiveStatic = () => {
        const member = members[currentIndex];
        activeImageWrap.innerHTML = createActiveSlideMarkup(member);
        setActiveContent(member);
    };

    const bindThumbClicks = () => {
        const liveThumbs = Array.from(
            rail.querySelectorAll('[data-team-slider-thumb-live]')
        );

        liveThumbs.forEach((thumb) => {
            thumb.addEventListener('click', () => {
                const targetIndex = Number(thumb.dataset.teamIndex);
                if (Number.isNaN(targetIndex) || targetIndex === currentIndex) return;

                const forwardDistance = mod(targetIndex - currentIndex, members.length);
                const backwardDistance = mod(currentIndex - targetIndex, members.length);

                goToIndex(
                    targetIndex,
                    forwardDistance <= backwardDistance ? 1 : -1
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

        const outgoingSlide = outgoingLayer.querySelector('.team-slider-active-slide');
        const incomingSlide = incomingLayer.querySelector('.team-slider-active-slide');

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

        gsap.to(activeLinkedin, {
            autoAlpha: 0,
            duration: 0.18,
            ease: 'power2.out',
            overwrite: true,
            onComplete: () => {
                activeLinkedin.href = nextMember.linkedin || '#';

                gsap.to(activeLinkedin, {
                    autoAlpha: 1,
                    duration: 0.22,
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
            currentTrack.innerHTML = currentIndexes.map(createThumbMarkup).join('');

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
                    0
                ).to(
                    nextTrack,
                    {
                        x: 0,
                        duration: 0.72,
                        ease: 'power3.inOut',
                    },
                    0
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
                    0
                ).to(
                    nextTrack,
                    {
                        x: 0,
                        duration: 0.72,
                        ease: 'power3.inOut',
                    },
                    0
                );
            }
        });
    };

    const goToIndex = async (targetIndex, direction = 1) => {
        if (isAnimating || members.length <= 1) return;

        const nextIndex = mod(targetIndex, members.length);
        if (nextIndex === currentIndex) return;

        isAnimating = true;

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

    const handleResize = () => {
        renderActiveStatic();
        renderThumbsStatic(currentIndex);
    };

    window.addEventListener('resize', handleResize);

    renderActiveStatic();
    renderThumbsStatic(currentIndex);

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
    const cards = Array.from(section.querySelectorAll('.testimonial-card'));
    const prevBtn = section.querySelector('.arrow-prev');
    const nextBtn = section.querySelector('.arrow-next');
    const currentSlide = section.querySelector('.current-slide');
    const totalSlides = section.querySelector('.total-slides');

    if (!track || !cards.length) return;

    let currentIndex = 0;
    let isAnimating = false;
    const totalCards = cards.length;

    if (totalSlides) {
        totalSlides.textContent = String(totalCards).padStart(2, '0');
    }

    function updateCounter() {
        if (currentSlide) {
            currentSlide.textContent = String(currentIndex + 1).padStart(
                2,
                '0',
            );
        }
    }

    function updateButtons() {
        if (prevBtn) prevBtn.disabled = currentIndex === 0;
        if (nextBtn) nextBtn.disabled = currentIndex === totalCards - 1;
    }

    function getSlideDistance() {
        return track.offsetWidth * 0.92;
    }

    function resetCard(card) {
        gsap.set(card, {
            x: 0,
            scale: 1,
            autoAlpha: 0,
            filter: 'brightness(1)',
            zIndex: 1,
            pointerEvents: 'none',
        });
    }

    function setFrontCard(card) {
        gsap.set(card, {
            x: 0,
            scale: 1,
            autoAlpha: 1,
            filter: 'brightness(1)',
            zIndex: 3,
            pointerEvents: 'auto',
        });
    }

    function setBackCard(card) {
        gsap.set(card, {
            scale: 0.93,
            autoAlpha: 1,
            filter: 'brightness(0.78)',
            zIndex: 2,
            pointerEvents: 'none',
        });
    }

    cards.forEach(resetCard);
    setFrontCard(cards[0]);

    function goNext() {
        if (isAnimating || currentIndex >= totalCards - 1) return;

        isAnimating = true;

        const currentCard = cards[currentIndex];
        const nextCard = cards[currentIndex + 1];
        const distance = getSlideDistance();

        cards.forEach((card, index) => {
            if (index !== currentIndex && index !== currentIndex + 1) {
                resetCard(card);
            }
        });

        gsap.killTweensOf([currentCard, nextCard]);

        gsap.set(currentCard, {
            x: 0,
            scale: 1,
            autoAlpha: 1,
            filter: 'brightness(1)',
            zIndex: 3,
            pointerEvents: 'none',
        });

        gsap.set(nextCard, {
            x: distance * 1.1,
            scale: 1,
            autoAlpha: 1,
            filter: 'brightness(1)',
            zIndex: 4,
            pointerEvents: 'auto',
        });

        const tl = gsap.timeline({
            defaults: {
                duration: 0.85,
                ease: 'power3.inOut',
                overwrite: 'auto',
            },
            onComplete: () => {
                setBackCard(currentCard);
                setFrontCard(nextCard);
                currentIndex += 1;
                updateCounter();
                updateButtons();
                isAnimating = false;
            },
        });

        tl.to(
            currentCard,
            {
                scale: 0.93,
                filter: 'brightness(0.78)',
            },
            0,
        ).to(
            nextCard,
            {
                x: 0,
            },
            0,
        );
    }

    function goPrev() {
        if (isAnimating || currentIndex <= 0) return;

        isAnimating = true;

        const currentCard = cards[currentIndex];
        const previousCard = cards[currentIndex - 1];
        const distance = getSlideDistance();

        cards.forEach((card, index) => {
            if (index !== currentIndex && index !== currentIndex - 1) {
                resetCard(card);
            }
        });

        gsap.killTweensOf([currentCard, previousCard]);

        // current moves out to right
        gsap.set(currentCard, {
            x: 0,
            scale: 1,
            autoAlpha: 1,
            filter: 'brightness(1)',
            zIndex: 4,
            pointerEvents: 'none',
        });

        // previous comes forward from its stacked back state
        gsap.set(previousCard, {
            scale: 0.93,
            autoAlpha: 1,
            filter: 'brightness(0.78)',
            zIndex: 3,
            pointerEvents: 'auto',
        });

        const tl = gsap.timeline({
            defaults: {
                duration: 0.85,
                ease: 'power3.inOut',
                overwrite: 'auto',
            },
            onComplete: () => {
                resetCard(currentCard);
                setFrontCard(previousCard);
                currentIndex -= 1;
                updateCounter();
                updateButtons();
                isAnimating = false;
            },
        });

        tl.to(
            currentCard,
            {
                x: distance * 1.1,
            },
            0,
        ).to(
            previousCard,
            {
                x: 0,
                scale: 1,
                filter: 'brightness(1)',
            },
            0,
        );
    }

    nextBtn?.addEventListener('click', goNext);
    prevBtn?.addEventListener('click', goPrev);

    window.addEventListener('resize', () => {
        cards.forEach(resetCard);

        if (currentIndex > 0) {
            setBackCard(cards[currentIndex - 1]);
        }

        setFrontCard(cards[currentIndex]);
        updateButtons();
    });

    updateCounter();
    updateButtons();

    console.log('[Trac] Testimonials stacking slider initialized');
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
                        duration: 3,
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

function initWhatWeDoScroll() {
    const section = document.querySelector('[data-what-we-do-scroll]');
    if (!section) return;

    const sticky = section.querySelector('.what-we-do-sticky');
    const track = section.querySelector('[data-what-we-do-track]');
    const cards = Array.from(section.querySelectorAll('.what-we-do-card'));

    if (!sticky || !track || cards.length === 0) return;

    if (window.innerWidth <= 768) {
        gsap.set(track, { xPercent: 75 });
        return;
    }

    gsap.set(track, { xPercent: 75 });

    gsap.to(track, {
        xPercent: -25,
        ease: 'none',
        scrollTrigger: {
            trigger: section,
            start: 'top 70%',
            end: 'bottom bottom',
            scrub: true,
            // markers:true,
            invalidateOnRefresh: true,
        },
    });
    cards.forEach((card, index) => {
        gsap.fromTo(
            card,
            {
                // autoAlpha: 0.45,
                opacity: 0,
                yPercent: 100,
            },
            {
                // autoAlpha: 1,
                opacity: 1,
                yPercent: 0,
                duration: 0.7,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: section,
                    start: `top+=${index * 12}% 70%`,
                    end: "bottom bottom",
                    scrub: true,
                },
            },
        );
    });

    console.log('[Trac] What we do scroll initialized');
}

function initTracStoryTimeline() {
    const section = document.querySelector('.trac-story-section');
    if (!section) return;

    const reels = Array.from(section.querySelectorAll('[data-story-year-reel]'));
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
            stage
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
    if (!section) return;

    const circleLayer = section.querySelector('[data-network-draw="circle"]');
    const dottedLayer = section.querySelector('[data-network-draw="dotted"]');

    const allCircles = [
        ...(circleLayer
            ? Array.from(circleLayer.querySelectorAll('circle'))
            : []),
        ...(dottedLayer
            ? Array.from(dottedLayer.querySelectorAll('circle'))
            : []),
    ];

    const pointerCards = Array.from(section.querySelectorAll('.pointer-card'));
    if (!allCircles.length || !pointerCards.length) return;

    const hideAllPointers = () => {
        pointerCards.forEach((card) => card.classList.remove('is-active'));
    };

    const isOuterNode = (circle) =>
        circle.getAttribute('r') === '11.5' &&
        circle.getAttribute('fill') === '#EFF4FC' &&
        circle.getAttribute('stroke') === '#001837';

    const isInnerNode = (circle) =>
        circle.getAttribute('r') === '7' &&
        circle.getAttribute('fill') === '#F0741C';

    // group only valid node circles by same cx/cy
    const nodeMap = new Map();

    allCircles.forEach((circle) => {
        if (!isOuterNode(circle) && !isInnerNode(circle)) return;

        const cx = circle.getAttribute('cx');
        const cy = circle.getAttribute('cy');
        const key = `${cx}-${cy}`;

        if (!nodeMap.has(key)) {
            nodeMap.set(key, {
                outer: null,
                inner: null,
                circles: [],
            });
        }

        const group = nodeMap.get(key);

        if (isOuterNode(circle)) group.outer = circle;
        if (isInnerNode(circle)) group.inner = circle;

        group.circles.push(circle);
    });

    // keep only true node pairs, or at least a single valid node if only one exists
    const nodeGroups = Array.from(nodeMap.values()).filter(
        (group) => group.outer || group.inner,
    );

    nodeGroups.forEach((group, index) => {
        const pointerCard = section.querySelector(`.pointer-${index + 1}`);
        if (!pointerCard) return;

        const showPointer = () => {
            hideAllPointers();
            pointerCard.classList.add('is-active');
        };

        const hidePointer = () => {
            pointerCard.classList.remove('is-active');
        };

        group.circles.forEach((circle) => {
            circle.addEventListener('mouseenter', showPointer);
            circle.addEventListener('mouseleave', hidePointer);
            circle.addEventListener('focus', showPointer);
            circle.addEventListener('blur', hidePointer);
            circle.addEventListener('click', (e) => {
                e.stopPropagation();
                showPointer();
            });

            circle.setAttribute('tabindex', '0');
            circle.setAttribute('role', 'button');
            circle.setAttribute(
                'aria-label',
                `Show network pointer ${index + 1}`,
            );
            circle.style.cursor = 'pointer';
        });
    });

    section.addEventListener('mouseleave', hideAllPointers);

    document.addEventListener('click', (e) => {
        if (!section.contains(e.target)) {
            hideAllPointers();
        }
    });

    console.log('[Trac] Our Network pointers initialized', {
        groups: nodeGroups.length,
        cards: pointerCards.length,
    });
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
            }
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
                }
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
    const overlay = footer?.querySelector('.footer-overlay');

    if (!footer || !overlay) return;

    gsap.set(overlay, {
        opacity: 1,
    });

    gsap.to(overlay, {
        opacity: 0,
        ease: 'none',
        scrollTrigger: {
            trigger: footer,
            start: 'top 85%',
            end: 'bottom bottom',
            scrub: true,
        },
    });

    console.log('[Trac] Footer overlay fade initialized');
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
            const index = Math.min(total - 1, Math.floor(self.progress * total));
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
            activeIndex - 1
        );

        previousCards.forEach((card, prevIndex) => {
            tl.to(
                card,
                {
                    y: prevIndex * CARD_GAP - activeIndex * STACK_LIFT,
                    scale: Math.max(0.82, 1 - (activeIndex - prevIndex) * SCALE_STEP),
                    duration: SEGMENT,
                    ease: 'none',
                },
                activeIndex - 1
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
        cards.length - 1
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
           translateX:"-75%",
            ease: 'none',
        },
        0
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
            0
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
    const cards = Array.from(section.querySelectorAll('[data-hi-installation-step]'));
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
                    Math.floor(progress * cards.length)
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
        0
    ).to(
        progressLine,
        {
            scaleX: 1,
            ease: 'none',
        },
        0
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
