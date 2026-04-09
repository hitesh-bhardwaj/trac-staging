/**
 * Trac Theme - Main JavaScript Entry
 *
 * Initializes GSAP, Three.js, canvas network, and integrates with Lenis smooth scroll
 */

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { initAnimations } from './animations.js';
import { initGlobe } from './globe.js';
import { initNetworkCanvas } from './network-canvas.js';
import { initBarba, initPageLoader } from './barba.js';

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);

/**
 * App State
 */
const app = {
    lenis: null,
    isLoaded: false,
    globe: null,
    networkCanvas: null,
    networkCanvases: [],
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
        if (
            currentScroll > lastScroll &&
            currentScroll > scrollThreshold &&
            scrollDelta > 0.5
        ) {
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
 * Initialize all page-specific components
 * Called on initial load and after Barba transitions
 */
function initializePageComponents() {
    // Initialize FAQ accordion
    initFaqs();

    // Partners page partner-network tabs
    initPartnerNetworkTabs();

    // Initialize rotating client logos
    initClientLogos();

    // Initialize animations (GSAP ScrollTrigger)
    if (!app.prefersReducedMotion) {
        initAnimations();
    }

    // Initialize Three.js globe
    const globeContainer = document.getElementById('globe-container');
    if (globeContainer && !app.prefersReducedMotion) {
        // Clean up existing globe if it exists
        if (app.globe && app.globe.destroy) {
            app.globe.destroy();
            app.globe = null;
        }

        // Clear container before re-initializing
        while (globeContainer.firstChild) {
            globeContainer.removeChild(globeContainer.firstChild);
        }

        app.globe = initGlobe(globeContainer);
    }

    // Initialize interactive elements
    initSmoothAnchors();
    initLazyImages();

    console.log('[Trac] Page components initialized');
}

/**
 * Partners: partner-network tab filtering
 */
function initPartnerNetworkTabs() {
    const sections = Array.from(document.querySelectorAll('[data-partner-network]'));
    if (!sections.length) return;

    sections.forEach((section) => {
        const tabs = Array.from(section.querySelectorAll('[data-partner-tab]'));
        const cards = Array.from(section.querySelectorAll('[data-partner-logo]'));
        if (!tabs.length || !cards.length) return;

        const setActive = (value) => {
            tabs.forEach((tab) => {
                const isActive = tab.dataset.partnerTab === value;
                tab.setAttribute('aria-selected', isActive ? 'true' : 'false');

                // Active pill styling
                tab.classList.toggle('bg-brand-primary', isActive);
                tab.classList.toggle('text-white', isActive);
                tab.classList.toggle('border-brand-primary', isActive);

                // Inactive pill styling
                tab.classList.toggle('bg-transparent', !isActive);
                tab.classList.toggle('text-text-primary', !isActive);
                tab.classList.toggle('border-brand-primary/50', !isActive);
            });

            cards.forEach((card) => {
                const category = card.dataset.partnerCategory || '';
                const visible = value === 'all' || category === value;
                card.classList.toggle('hidden', !visible);
            });
        };

        // Default to "all"
        setActive('all');

        tabs.forEach((tab) => {
            tab.addEventListener('click', () => {
                setActive(tab.dataset.partnerTab || 'all');
            });
        });
    });
}

// Expose for Barba to call after transitions
window.reinitializePageComponents = initializePageComponents;

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

    // Initialize page loader
    initPageLoader();

    // Initialize Barba.js for page transitions
    initBarba(app);

    // Initialize on page load
    document.addEventListener('trac:loaded', () => {
        // Initialize network canvas (not in initializePageComponents)
        const canvases = Array.from(
            document.querySelectorAll('#network-canvas, [data-network-canvas]'),
        );

        if (canvases.length && !app.prefersReducedMotion) {
            canvases.forEach((canvas) => {
                if (canvas.dataset.networkCanvasInit === 'true') return;
                canvas.dataset.networkCanvasInit = 'true';

                const instance = initNetworkCanvas(canvas, {
                    starCount: 100,
                    linkDistance: 150,
                    maxVelocity: 25,
                    minRadius: 1,
                    maxRadius: 2,
                    starColor: '#ffffff',
                    lineColor: '#ffffff',
                    interactive: true,
                });

                app.networkCanvases.push(instance);
                // Back-compat: keep the first instance on app.networkCanvas
                if (!app.networkCanvas) {
                    app.networkCanvas = instance;
                }
            });
        }

        // Call initializePageComponents which handles everything else
        initializePageComponents();
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
