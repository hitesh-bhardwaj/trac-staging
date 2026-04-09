/**
 * Trac Theme - GSAP Animations
 *
 * All scroll-triggered animations using GSAP ScrollTrigger
 */

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
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
    initTextAnimations();
    // initFooterParallax();
    initStackingCards();
    initTestimonialsSlider();
    initOurNetworkAnimation();
    initOurNetworkPointers();
    initWhyTracCircles();
    initWhyTracScrollStory();
    initCtaLineAnimation();

    // Refresh ScrollTrigger after all animations are set up
    ScrollTrigger.refresh();

    console.log('[Trac] Animations initialized');
}

/**
 * Parallax footer reveal:
 * footer is fixed at bottom; CTA scrolls over it; we reveal footer via clip-path.
 */
function initFooterParallax() {
    const footer = document.querySelector('[data-parallax-footer]');
    const page = document.getElementById('page');
    if (!footer || !page) return;

    // Only enable on desktop.
    if (window.innerWidth <= 768) {
        document.documentElement.style.setProperty('--parallax-footer-height', '0px');
        return;
    }

    const cta = document.querySelector('.cta-section');
    if (!cta) return;

    const setFooterHeight = () => {
        const h = footer.offsetHeight || 0;
        document.documentElement.style.setProperty('--parallax-footer-height', `${h}px`);
    };

    setFooterHeight();
    window.addEventListener('resize', () => {
        setFooterHeight();
        ScrollTrigger.refresh();
    });

    const footerInner = footer.querySelector('.footer-container') || footer;

    gsap.set(footer, {
        clipPath: 'inset(100% 0% 0% 0%)',
        webkitClipPath: 'inset(100% 0% 0% 0%)',
    });

    gsap.timeline({
        scrollTrigger: {
            trigger: cta,
            start: 'bottom 92%',
            end: 'bottom 10%',
            scrub: true,
        },
    })
        .to(
            footer,
            {
                clipPath: 'inset(0% 0% 0% 0%)',
                webkitClipPath: 'inset(0% 0% 0% 0%)',
                ease: 'none',
            },
            0,
        )
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
    if (progressSvg && progressBase && typeof progressBase.getTotalLength === 'function') {
        // Clean up old clone if any.
        progressSvg.querySelectorAll('[data-why-progress-draw]').forEach((n) => n.remove());

        const baseLen = progressBase.getTotalLength();
        // Base is fully transparent (we "fill" the line with the draw overlay).
        progressBase.style.stroke = 'rgba(17, 17, 17, 0)';
        progressBase.style.strokeLinecap = 'round';
        // Let the dash scale with the SVG so it always fills end-to-end.
        progressBase.style.vectorEffect = '';

        const drawLine = progressBase.cloneNode(true);
        drawLine.setAttribute('data-why-progress-draw', 'true');
        // Keep a constant primary color all the way to the end.
        drawLine.style.stroke = '#10417F';
        drawLine.style.strokeOpacity = '1';
        drawLine.style.strokeWidth = '1.5';
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
function initWhyTracStory(masterTl, drawOffset = 0, contentOffset = drawOffset) {
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
    const cardImages = cards.map((card) => card.querySelector('.why-card-image'));
    const cardImageImgs = cardImages
        .map((wrap) => wrap?.querySelector('img'))
        .filter(Boolean);
    const cardContent = cards.map((card) => card.querySelector('.why-card-content'));

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

    const orderedDots = [...dots].sort((a, b) => getDotCenterX(a) - getDotCenterX(b));

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

    const straightLine = straightCandidate && !phase1Set.has(straightCandidate) ? straightCandidate : null;

    // Style + create "draw overlay" lines.
    const drawLines = baseLines
        .map((path) => {
            if (typeof path.getTotalLength !== 'function') return null;

            // Keep connector base invisible so the draw feels like it fills on transparency.
            path.style.stroke = 'rgba(17, 17, 17, 0)';
            path.style.strokeWidth = '1.25';
            path.style.strokeLinecap = 'round';
            path.style.strokeLinejoin = 'round';
            path.style.vectorEffect = 'non-scaling-stroke';

            // Clone for the actual drawing stroke (brand color).
            const clone = path.cloneNode(true);
            clone.setAttribute('data-why-draw', 'true');
            clone.style.stroke = '#10417F';
            // We'll fade the stroke in as it draws so it feels like it fills from transparent -> primary.
            clone.style.strokeOpacity = '0';
            clone.style.strokeWidth = '2';
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
    const phase2At = 0.10;
    const phase2Dur = 0.20;
    drawPhase(phase2, phase2At, phase2Dur, 0.03);

    // 4) If/when you add the straight line, fill it from transparent -> primary as you scroll.
    if (straightLine) {
        const straightClone = toDrawClone.get(straightLine);
        if (straightClone) {
            // "Black line" that fills into primary.
            gsap.set(straightClone, { opacity: 0, stroke: '#111111', strokeOpacity: 0 });
            const straightAt = phase2At + phase2Dur + 0.06;
            tl.to(
                straightClone,
                {
                    opacity: 1,
                    stroke: '#10417F',
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
            scrollDistance > 0 ? (left - window.innerWidth * 0.6) / scrollDistance : 0;
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
            { offset: '0%', color: '#FFFFFF', opacity: '0' },
            { offset: '58%', color: '#FFFFFF', opacity: '0' },
            { offset: '82%', color: '#10417F', opacity: '0.45' },
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
    })
        .call(() => {
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
 * Horizontal scroll section for "Why Businesses Choose TrAC"
 */
// function initHorizontalScroll() {
//     const section = document.querySelector('[data-horizontal-scroll]');
//     if (!section) return;

//     // Only enable on desktop (above 768px)
//     if (window.innerWidth <= 768) {
//         console.log('[Trac] Horizontal scroll disabled on mobile');
//         return;
//     }

//     const track = section.querySelector('.why-trac-track');
//     const slides = section.querySelectorAll('.why-trac-slide');

//     if (!track || slides.length === 0) return;

//     // Calculate total scroll width
//     const totalWidth = track.scrollWidth;
//     const viewportWidth = window.innerWidth;
//     const scrollDistance = totalWidth - viewportWidth;

//     // Create horizontal scroll animation - just translate, no other animations
//     gsap.to(track, {
//         x: -scrollDistance,
//         // Keep it linear so the SVG draw (also scrubbed) stays in sync.
//         ease: 'none',
//         scrollTrigger: {
//             trigger: section,
//             // Match the storytelling trigger so the draw + horizontal movement stay aligned.
//             start: 'top 70%',
//             end: 'bottom bottom',
//             // Slight smoothing so it doesn't feel twitchy/fast.
//             scrub: 0.8,
//             // markers:true
//         },
//     });

//     console.log('[Trac] Horizontal scroll initialized');
// }

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

    if (!track || cards.length === 0) return;

    let currentIndex = 0;
    const totalCards = cards.length;
    let isAnimating = false;

    // Update total slides display
    if (totalSlides) {
        totalSlides.textContent = String(totalCards).padStart(2, '0');
    }

    // Update current slide display
    function updateCounter() {
        if (currentSlide) {
            currentSlide.textContent = String(currentIndex + 1).padStart(
                2,
                '0',
            );
        }
    }

    // Initialize cards - hide all except first
    cards.forEach((card, index) => {
        if (index === 0) {
            gsap.set(card, { x: '0%', scale: 1, filter: 'brightness(1)', zIndex: 2 });
        } else {
            gsap.set(card, { x: '0%', scale: 0.9, filter: 'brightness(0.6)', zIndex: 1 });
        }
    });

    // Animate to specific card
    function goToCard(index, direction = 'next') {
        if (isAnimating) return;

        // Wrap around
        if (index < 0) index = totalCards - 1;
        if (index >= totalCards) index = 0;

        if (index === currentIndex) return;

        isAnimating = true;

        const currentCard = cards[currentIndex];
        const nextCard = cards[index];

        // Determine slide direction
        const slideFrom = direction === 'next' ? '100%' : '-100%';

        // Set next card starting position before animating
        gsap.set(nextCard, {
            x: slideFrom,
            scale: 1,
            filter: 'brightness(1)',
            zIndex: 2
        });

        // Animate out current card - scale down and dim with brightness (stays in place)
        gsap.to(currentCard, {
            scale: 0.9,
            filter: 'brightness(0.6)',
            duration: 0.5,
            ease: 'power2.inOut',
            zIndex: 1,
            onComplete: () => {
                // Reset current card position after it's hidden
                gsap.set(currentCard, { x: '0%' });
            }
        });

        // Animate in next card - slide from left or right
        gsap.to(nextCard, {
            x: '0%',
            duration: 0.6,
            ease: 'power2.out',
            onComplete: () => {
                isAnimating = false;
            },
        });

        currentIndex = index;
        updateCounter();
    }

    // Navigation button handlers
    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            goToCard(currentIndex - 1, 'prev');
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            goToCard(currentIndex + 1, 'next');
        });
    }

    // Initialize counter
    updateCounter();

    console.log('[Trac] Testimonials slider initialized');
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
        index === 0 ? 0 : '>-0.3'
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
        ...(circleLayer ? Array.from(circleLayer.querySelectorAll('circle')) : []),
        ...(dottedLayer ? Array.from(dottedLayer.querySelectorAll('circle')) : []),
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
        (group) => group.outer || group.inner
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
                `Show network pointer ${index + 1}`
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

/**
 * Refresh all ScrollTriggers (call after dynamic content loads)
 */
export function refreshAnimations() {
    ScrollTrigger.refresh();
}

// Export individual animation creators for use in components
export { gsap, ScrollTrigger };
