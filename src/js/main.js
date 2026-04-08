/**
 * Trac Theme - Main JavaScript Entry
 *
 * Initializes GSAP, Three.js, and integrates with Lenis smooth scroll
 */

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { initAnimations } from './animations.js';
import { initGlobe } from './globe.js';

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);

/**
 * App State
 */
const app = {
    lenis: null,
    isLoaded: false,
    prefersReducedMotion: window.matchMedia('(prefers-reduced-motion: reduce)')
        .matches,
};

/**
 * Initialize Lenis + GSAP ScrollTrigger sync
 */
function initLenisSync() {
    // Wait for Lenis to be available (initialized by mu-plugin)
    if (typeof window.lenis !== 'undefined') {
        app.lenis = window.lenis;

        // Sync GSAP ScrollTrigger with Lenis scroll events
        app.lenis.on('scroll', ScrollTrigger.update);

        // Tell mu-plugin that GSAP is handling the RAF loop
        window.lenisGsapSync = true;

        // Sync Lenis with GSAP ticker for smooth animation
        gsap.ticker.add((time) => {
            app.lenis.raf(time * 1000);
        });

        // Disable GSAP's lag smoothing for better sync with Lenis
        gsap.ticker.lagSmoothing(0);

        console.log('[Trac] Lenis + GSAP sync initialized');
    } else {
        // Listen for Lenis ready event if not yet available
        document.addEventListener(
            'lenis:ready',
            (e) => {
                app.lenis = e.detail.lenis;
                window.lenisGsapSync = true;

                app.lenis.on('scroll', ScrollTrigger.update);
                gsap.ticker.add((time) => {
                    app.lenis.raf(time * 1000);
                });
                gsap.ticker.lagSmoothing(0);

                console.log('[Trac] Lenis + GSAP sync initialized (via event)');
            },
            { once: true },
        );

        console.warn('[Trac] Waiting for Lenis...');
    }
}

/**
 * Initialize header behavior
 */
function initHeader() {
    const header = document.getElementById('site-header');
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    if (!header) return;

    let lastScroll = 0;
    const scrollThreshold = 100;
    let scrollTimeout = null;

    // Header scroll behavior with scroll-stop detection
    const updateHeader = () => {
        const currentScroll = window.scrollY;
        const scrollDelta = Math.abs(currentScroll - lastScroll);

        // Add/remove scrolled class (updates immediately)
        if (currentScroll > 50) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }

        // Scrolling up - show header immediately
        if (currentScroll < lastScroll && scrollDelta > 0.5) {
            if (scrollTimeout) {
                clearTimeout(scrollTimeout);
            }
            header.classList.remove('is-hidden');
            lastScroll = currentScroll;
            return;
        }

        // Scrolling down - hide header immediately
        if (currentScroll > lastScroll && currentScroll > scrollThreshold && scrollDelta > 0.5) {
            header.classList.add('is-hidden');
        }

        // Always set/reset timeout to show header after scroll stops
        if (scrollTimeout) {
            clearTimeout(scrollTimeout);
        }

        scrollTimeout = setTimeout(() => {
            if (header.classList.contains('is-hidden')) {
                header.classList.remove('is-hidden');
                console.log('[Header] Showing header after scroll stop');
            }
        }, 300);

        lastScroll = currentScroll;
    };

    // Use Lenis scroll event if available, otherwise use native
    if (app.lenis) {
        app.lenis.on('scroll', updateHeader);
    } else {
        window.addEventListener('scroll', updateHeader, { passive: true });
    }

    // Mobile menu toggle
    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', () => {
            const isOpen =
                mobileMenuToggle.getAttribute('aria-expanded') === 'true';

            mobileMenuToggle.setAttribute('aria-expanded', !isOpen);
            mobileMenu.classList.toggle('is-open');
            mobileMenu.classList.toggle('hidden', isOpen);

            // Toggle body scroll
            if (app.lenis) {
                isOpen ? app.lenis.start() : app.lenis.stop();
            } else {
                document.body.style.overflow = isOpen ? '' : 'hidden';
            }
        });

        // Close menu on escape
        document.addEventListener('keydown', (e) => {
            if (
                e.key === 'Escape' &&
                mobileMenu.classList.contains('is-open')
            ) {
                mobileMenuToggle.click();
            }
        });
    }
}

/**
 * Initialize page loader
 */
function initLoader() {
    const loader = document.querySelector('.site-loader');

    if (loader) {
        window.addEventListener('load', () => {
            gsap.to(loader, {
                opacity: 0,
                duration: 0.6,
                onComplete: () => {
                    loader.classList.add('is-loaded');
                    app.isLoaded = true;
                    document.dispatchEvent(new CustomEvent('trac:loaded'));
                },
            });
        });
    } else {
        // No loader, mark as loaded immediately
        window.addEventListener('load', () => {
            app.isLoaded = true;
            document.dispatchEvent(new CustomEvent('trac:loaded'));
        });
    }
}

/**
 * Initialize smooth scroll to anchors
 */
function initSmoothAnchors() {
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', (e) => {
            const href = anchor.getAttribute('href');
            if (href === '#') return;

            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();

                if (app.lenis) {
                    app.lenis.scrollTo(target, {
                        offset: -100,
                        duration: 1.2,
                    });
                } else {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    });
}

/**
 * Initialize lazy loading for images
 */
function initLazyImages() {
    const lazyImages = document.querySelectorAll('img[data-src]');

    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    if (img.dataset.srcset) {
                        img.srcset = img.dataset.srcset;
                    }
                    img.removeAttribute('data-src');
                    img.removeAttribute('data-srcset');
                    imageObserver.unobserve(img);
                }
            });
        });

        lazyImages.forEach((img) => imageObserver.observe(img));
    } else {
        // Fallback for older browsers
        lazyImages.forEach((img) => {
            img.src = img.dataset.src;
            if (img.dataset.srcset) {
                img.srcset = img.dataset.srcset;
            }
        });
    }
}

/**
 * Initialize FAQ accordion
 */
function initFaqs() {
    const faqItems = Array.from(document.querySelectorAll('[data-faq]'));

    if (!faqItems.length) {
        return;
    }

    const closeItem = (item) => {
        const button = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');

        if (!button || !answer) {
            return;
        }

        item.removeAttribute('data-open');
        button.setAttribute('aria-expanded', 'false');
        answer.setAttribute('aria-hidden', 'true');
        answer.style.maxHeight = '0px';
    };

    const openItem = (item) => {
        const button = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');

        if (!button || !answer) {
            return;
        }

        item.setAttribute('data-open', '');
        button.setAttribute('aria-expanded', 'true');
        answer.setAttribute('aria-hidden', 'false');
        answer.style.maxHeight = `${answer.scrollHeight}px`;
    };

    faqItems.forEach((item) => {
        const button = item.querySelector('.faq-question');

        if (!button) {
            return;
        }

        if (item.hasAttribute('data-open')) {
            openItem(item);
        } else {
            closeItem(item);
        }

        button.addEventListener('click', () => {
            const isOpen = item.hasAttribute('data-open');

            faqItems.forEach(closeItem);

            if (!isOpen) {
                openItem(item);
            }
        });
    });

    window.addEventListener('resize', () => {
        faqItems.forEach((item) => {
            if (item.hasAttribute('data-open')) {
                openItem(item);
            }
        });
    });
}

/**
 * Initialize client logo rotation
 */
function initClientLogos() {
    const logoGrids = Array.from(document.querySelectorAll('[data-client-logos]'));

    if (!logoGrids.length) {
        return;
    }

    logoGrids.forEach((grid) => {
        const cards = Array.from(grid.querySelectorAll('[data-client-card]'));
        const logos = JSON.parse(grid.dataset.clientLogos || '[]');

        if (!cards.length || logos.length < 2) {
            return;
        }

        const pickRandomCards = () => {
            const shuffledCards = [...cards].sort(() => Math.random() - 0.5);
            const changeCount = Math.min(cards.length, 5);

            return shuffledCards.slice(0, changeCount);
        };

        const getNextLogoIndex = (currentIndex) => {
            let nextIndex = currentIndex;

            while (nextIndex === currentIndex) {
                nextIndex = Math.floor(Math.random() * logos.length);
            }

            return nextIndex;
        };

        window.setInterval(() => {
            pickRandomCards().forEach((card) => {
                const activeLayerName = card.dataset.activeLayer || 'a';
                const inactiveLayerName = activeLayerName === 'a' ? 'b' : 'a';
                const activeImage = card.querySelector(
                    `[data-logo-layer="${activeLayerName}"]`,
                );
                const inactiveImage = card.querySelector(
                    `[data-logo-layer="${inactiveLayerName}"]`,
                );

                if (!activeImage || !inactiveImage) {
                    return;
                }

                const currentIndex = Number(card.dataset.logoIndex || 0);
                const nextIndex = getNextLogoIndex(currentIndex);
                const nextLogo = logos[nextIndex];

                inactiveImage.src = nextLogo.src;
                inactiveImage.alt = nextLogo.alt;
                inactiveImage.classList.add('is-active');
                activeImage.classList.remove('is-active');

                card.dataset.logoIndex = String(nextIndex);
                card.dataset.activeLayer = inactiveLayerName;
            });
        }, 3000);
    });
}

/**
 * Main initialization
 */
function init() {
    console.log('[Trac] Initializing...');

    // Initialize Lenis sync first
    initLenisSync();

    // Initialize header
    initHeader();

    // Initialize FAQ accordion
    initFaqs();

    // Initialize rotating client logos
    initClientLogos();

    // Initialize loader
    initLoader();

    // Initialize on page load
    document.addEventListener('trac:loaded', () => {
        // Initialize animations (GSAP ScrollTrigger)
        if (!app.prefersReducedMotion) {
            initAnimations();
        }

        // Initialize Three.js globe
        const globeContainer = document.getElementById('globe-container');
        if (globeContainer && !app.prefersReducedMotion) {
            app.globe = initGlobe(globeContainer);
        }

        // Initialize interactive elements
        initSmoothAnchors();
        initLazyImages();

        console.log('[Trac] All systems initialized');
    });
}

// Start when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}

// Export for external use
export { app, gsap, ScrollTrigger };
