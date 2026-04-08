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

    // Section-specific animations
    initHeroAnimations();
    initSectionAnimations();
    initParallaxAnimations();
    initTextAnimations();
    initHorizontalScroll();
    initStackingCards();
    initTestimonialsSlider();
    initOurNetworkAnimation();
    initCtaLineAnimation();

    // Refresh ScrollTrigger after all animations are set up
    ScrollTrigger.refresh();

    console.log('[Trac] Animations initialized');
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
        gradient.setAttribute('x1', String(start.x));
        gradient.setAttribute('y1', String(start.y));
        gradient.setAttribute('x2', String(end.x));
        gradient.setAttribute('y2', String(end.y));

        [
            { offset: '0%', color: '#10417F', opacity: '0' },
            { offset: '35%', color: '#10417F', opacity: '0.2' },
            { offset: '50%', color: '#10417F', opacity: '1' },
            { offset: '70%', color: '#5e96db', opacity: '0.75' },
            { offset: '100%', color: '#ffffff', opacity: '0' },
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
        clone.setAttribute('stroke-width', '2');
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
            strokeDasharray: `${Math.max(length * 0.12, 56)} ${length}`,
            strokeDashoffset: length * 1.1,
        });

        return { clone, length };
    });

    gsap.set(accentPaths, { opacity: 0 });

    const runTravelPulse = (entry) => {
        const { clone, length } = entry;
        const segmentLength = gsap.utils.random(
            Math.max(length * 0.1, 48),
            Math.max(length * 0.18, 110),
        );

        gsap.set(clone, {
            opacity: 0,
            strokeDasharray: `${segmentLength} ${length + segmentLength}`,
            strokeDashoffset: length + segmentLength,
        });

        gsap
            .timeline({
                delay: gsap.utils.random(0.2, 2.2),
                onComplete: () => runTravelPulse(entry),
            })
            .to(clone, {
                opacity: 1,
                duration: 0.2,
                ease: 'power1.out',
            })
            .to(
                clone,
                {
                    strokeDashoffset: -segmentLength,
                    duration: gsap.utils.random(2.8, 5),
                    ease: 'none',
                },
                0,
            )
            .to(
                clone,
                {
                    opacity: 0,
                    duration: 0.35,
                    ease: 'power1.in',
                },
                `>${-0.25}`,
            );
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
            from: 'center',
        },
        ease: 'power2.out',
    })
        .call(() => {
            travelEntries.forEach((entry) => {
                gsap.delayedCall(gsap.utils.random(0.1, 1.5), () => {
                    runTravelPulse(entry);
                });
            });
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
function initHorizontalScroll() {
    const section = document.querySelector('[data-horizontal-scroll]');
    if (!section) return;

    // Only enable on desktop (above 768px)
    if (window.innerWidth <= 768) {
        console.log('[Trac] Horizontal scroll disabled on mobile');
        return;
    }

    const track = section.querySelector('.why-trac-track');
    const slides = section.querySelectorAll('.why-trac-slide');

    if (!track || slides.length === 0) return;

    // Calculate total scroll width
    const totalWidth = track.scrollWidth;
    const viewportWidth = window.innerWidth;
    const scrollDistance = totalWidth - viewportWidth;

    // Create horizontal scroll animation - just translate, no other animations
    gsap.to(track, {
        x: -scrollDistance,
        ease: 'power1.inOut',
        scrollTrigger: {
            trigger: section,
            start: 'top top',
            end: 'bottom bottom',
            scrub: true,
            // markers:true
        },
    });

    console.log('[Trac] Horizontal scroll initialized');
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
            pin: true,
            anticipatePin: 1,
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
