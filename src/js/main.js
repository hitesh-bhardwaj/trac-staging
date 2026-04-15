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
import { initMapAnimation } from './map-animation.js';

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

document.documentElement.classList.add('js');
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

    let scrollTimeout = null;
    let currentState = null;

    const desktop = () => window.innerWidth > 1024;
    const shrinkTrigger = () => window.innerHeight * 0.5;

    const setTopState = (immediate = false) => {
        if (currentState === 'top' && !immediate) return;
        currentState = 'top';

        gsap.killTweensOf(header);

        gsap.to(header, {
            width: '100%',
            top: '0%',
            borderRadius: '0vw',
            backgroundColor: 'rgba(255,255,255,0.7)',
            backdropFilter: 'blur(12px)',
            webkitBackdropFilter: 'blur(12px)',
            duration: immediate ? 0 : 0.55,
            ease: 'power3.out',
            overwrite: true,
        });
    };

    const setScrolledState = (immediate = false) => {
        if (currentState === 'scrolled' && !immediate) return;
        currentState = 'scrolled';

        gsap.killTweensOf(header);

        gsap.to(header, {
            width: desktop() ? '90%' : 'calc(100% - 24px)',
            top: desktop() ? '2%' : '12px',
            borderRadius: desktop() ? '0.9vw' : '16px',
            backgroundColor: 'rgba(255,255,255,1)',
            backdropFilter: 'blur(0px)',
            webkitBackdropFilter: 'blur(0px)',
            duration: immediate ? 0 : 0.55,
            ease: 'power3.out',
            overwrite: true,
        });
    };

    const updateHeader = () => {
        const currentScroll = window.scrollY || 0;

        if (currentScroll > shrinkTrigger()) {
            setScrolledState();
        } else {
            setTopState();
        }

        if (scrollTimeout) clearTimeout(scrollTimeout);

        scrollTimeout = setTimeout(() => {
            if (header.classList.contains('is-hidden')) {
                header.classList.remove('is-hidden');
            }
        }, 300);
    };

    // initial state
    if ((window.scrollY || 0) > shrinkTrigger()) {
        setScrolledState(true);
    } else {
        setTopState(true);
    }

    if (app.lenis) {
        app.lenis.on('scroll', updateHeader);
    } else {
        window.addEventListener('scroll', updateHeader, { passive: true });
    }

    window.addEventListener('resize', () => {
        if ((window.scrollY || 0) > shrinkTrigger()) {
            setScrolledState(true);
        } else {
            setTopState(true);
        }
    });

    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', () => {
            const isOpen =
                mobileMenuToggle.getAttribute('aria-expanded') === 'true';

            mobileMenuToggle.setAttribute('aria-expanded', !isOpen);
            mobileMenu.classList.toggle('is-open');
            mobileMenu.classList.toggle('hidden', isOpen);

            if (app.lenis) {
                isOpen ? app.lenis.start() : app.lenis.stop();
            } else {
                document.body.style.overflow = isOpen ? '' : 'hidden';
            }
        });

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

function destroyNetworkCanvases() {
    if (!app.networkInstances || !app.networkInstances.length) return;

    app.networkInstances.forEach((instance) => {
        if (!instance) return;

        if (typeof instance.destroy === 'function') {
            instance.destroy();
        } else if (typeof instance.dispose === 'function') {
            instance.dispose();
        }
    });

    app.networkInstances = [];
    console.log('[Trac] Network canvases destroyed');
}

function initNetworkCanvases() {
    destroyNetworkCanvases();

    if (app.prefersReducedMotion) return;

    const networkCanvases = document.querySelectorAll('.network-canvas-el');
    if (!networkCanvases.length) return;

    app.networkInstances = [];

    networkCanvases.forEach((canvas) => {
        const instance = initNetworkCanvas(canvas, {
            starCount: 80,
            linkDistance: 150,
            maxVelocity: 20,
            minRadius: 1,
            maxRadius: 2,
            starColor: '#97ACC8',
            lineColor: '#97ACC8',
            interactive: true,
        });

        if (instance) {
            app.networkInstances.push(instance);
        }
    });

    console.log('[Trac] Network canvases initialized', app.networkInstances.length);
}

/**
 * Initialize all page-specific components
 * Called on initial load and after Barba transitions
 */
function initializePageComponents() {
    initFaqs();
    initPartnerNetworkTabs();
    initCollaborationsAccordion();
    initClientLogos();
    initProductsMegaMenu();
    initMouseFollower();

    if (!app.prefersReducedMotion) {
        initAnimations();
    }

    const globeContainer = document.getElementById('globe-container');
    if (globeContainer && !app.prefersReducedMotion) {
        if (app.globe && app.globe.destroy) {
            app.globe.destroy();
            app.globe = null;
        }

        while (globeContainer.firstChild) {
            globeContainer.removeChild(globeContainer.firstChild);
        }

        app.globe = initGlobe(globeContainer);
    }

    initNetworkCanvases();
    initMapAnimation();

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
 * Initialize communities collaborations accordion
 */
function initCollaborationsAccordion() {
    const accordions = Array.from(
        document.querySelectorAll('[data-collab-accordion]')
    );

    if (!accordions.length) {
        return;
    }

    accordions.forEach((accordion) => {
        const items = Array.from(
            accordion.querySelectorAll('[data-collab-item]')
        );

        const closeItem = (item) => {
            const trigger = item.querySelector('[data-collab-trigger]');
            const panel = item.querySelector('[data-collab-panel]');

            if (!trigger || !panel) {
                return;
            }

            item.removeAttribute('data-open');
            trigger.setAttribute('aria-expanded', 'false');
            panel.setAttribute('aria-hidden', 'true');
            panel.style.display = 'block';
            panel.style.maxHeight = '0px';
        };

        const openItem = (item) => {
            const trigger = item.querySelector('[data-collab-trigger]');
            const panel = item.querySelector('[data-collab-panel]');

            if (!trigger || !panel) {
                return;
            }

            item.setAttribute('data-open', '');
            trigger.setAttribute('aria-expanded', 'true');
            panel.setAttribute('aria-hidden', 'false');
            panel.style.display = 'block';
            requestAnimationFrame(() => {
                panel.style.maxHeight = `${panel.scrollHeight}px`;
            });
        };

        items.forEach((item) => {
            const trigger = item.querySelector('[data-collab-trigger]');
            const panel = item.querySelector('[data-collab-panel]');

            if (!trigger || !panel) {
                return;
            }

            panel.addEventListener('transitionend', (event) => {
                if (event.propertyName !== 'max-height') {
                    return;
                }

                if (!item.hasAttribute('data-open')) {
                    panel.style.display = 'none';
                }
            });

            if (item.hasAttribute('data-open')) {
                openItem(item);
            } else {
                closeItem(item);
                panel.style.display = 'none';
            }

            trigger.addEventListener('click', () => {
                const isOpen = item.hasAttribute('data-open');

                items.forEach(closeItem);

                if (!isOpen) {
                    openItem(item);
                }
            });
        });

        window.addEventListener('resize', () => {
            items.forEach((item) => {
                if (item.hasAttribute('data-open')) {
                    openItem(item);
                }
            });
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

function initProductsMegaMenu() {
    const header = document.getElementById('site-header');
    const trigger = document.querySelector('[data-products-trigger]');
    const menuItem = document.querySelector('[data-products-menu-item]');
    const dropdown = document.querySelector('[data-products-dropdown]');
    const overlay = document.querySelector('[data-products-overlay]');

    if (!header || !trigger || !menuItem || !dropdown || !overlay) return;
    if (window.innerWidth <= 1024) return;

    if (dropdown._productsMenuCleanup) {
        dropdown._productsMenuCleanup();
    }

    let isOpen = false;
    let closeTimer = null;

    const dropdownLinks = Array.from(dropdown.querySelectorAll('a[href]'));

    const bridge = document.createElement('div');
    bridge.setAttribute('data-products-bridge-runtime', 'true');
    bridge.style.position = 'fixed';
    bridge.style.left = '0px';
    bridge.style.top = '0px';
    bridge.style.width = '0px';
    bridge.style.height = '0px';
    bridge.style.zIndex = '999';
    bridge.style.pointerEvents = 'none';
    bridge.style.background = 'transparent';

    document.body.appendChild(bridge);

    gsap.killTweensOf([dropdown, overlay]);

    gsap.set(dropdown, {
        opacity: 0,
        yPercent: -20,
        visibility: 'hidden',
        pointerEvents: 'none',
    });

    gsap.set(overlay, {
        opacity: 0,
        visibility: 'hidden',
        pointerEvents: 'none',
    });

    const clearCloseTimer = () => {
        if (closeTimer) {
            clearTimeout(closeTimer);
            closeTimer = null;
        }
    };

    const updateBridge = () => {
        if (!isOpen) return;

        const triggerRect = menuItem.getBoundingClientRect();
        const dropdownRect = dropdown.getBoundingClientRect();

        const gapTop = Math.min(triggerRect.bottom, dropdownRect.top);
        const gapBottom = Math.max(triggerRect.bottom, dropdownRect.top);
        const gapHeight = Math.max(18, gapBottom - gapTop);

        const left = Math.min(triggerRect.left, dropdownRect.left);
        const right = Math.max(triggerRect.right, dropdownRect.right);

        bridge.style.left = `${left}px`;
        bridge.style.top = `${gapTop - 6}px`;
        bridge.style.width = `${right - left}px`;
        bridge.style.height = `${gapHeight + 12}px`;
    };

    const enableBridge = () => {
        bridge.style.pointerEvents = 'auto';
        updateBridge();
    };

    const disableBridge = () => {
        bridge.style.pointerEvents = 'none';
        bridge.style.left = '0px';
        bridge.style.top = '0px';
        bridge.style.width = '0px';
        bridge.style.height = '0px';
    };

    const openMenu = () => {
        clearCloseTimer();

        if (isOpen) {
            updateBridge();
            return;
        }

        isOpen = true;

        gsap.killTweensOf([dropdown, overlay]);

        gsap.set(overlay, {
            visibility: 'visible',
            pointerEvents: 'auto',
        });

        gsap.set(dropdown, {
            visibility: 'visible',
            pointerEvents: 'auto',
        });

        enableBridge();

        gsap.to(overlay, {
            opacity: 1,
            duration: 0.28,
            ease: 'power2.out',
        });

        gsap.to(dropdown, {
            opacity: 1,
            yPercent: 0,
            duration: 0.35,
            ease: 'power2.out',
            onUpdate: updateBridge,
            onComplete: updateBridge,
        });
    };

    const closeMenu = (instant = false) => {
        clearCloseTimer();
        if (!isOpen && !instant) return;

        isOpen = false;

        gsap.killTweensOf([dropdown, overlay]);

        if (instant) {
            gsap.set(dropdown, {
                opacity: 0,
                yPercent: -10,
                visibility: 'hidden',
                pointerEvents: 'none',
            });

            gsap.set(overlay, {
                opacity: 0,
                visibility: 'hidden',
                pointerEvents: 'none',
            });

            disableBridge();
            return;
        }

        gsap.to(dropdown, {
            opacity: 0,
            yPercent: -10,
            duration: 0.26,
            ease: 'power2.out',
            pointerEvents: 'none',
            onComplete: () => {
                gsap.set(dropdown, {
                    visibility: 'hidden',
                });
                disableBridge();
            },
        });

        gsap.to(overlay, {
            opacity: 0,
            duration: 0.22,
            ease: 'power2.out',
            pointerEvents: 'none',
            onComplete: () => {
                gsap.set(overlay, {
                    visibility: 'hidden',
                });
            },
        });
    };

    const scheduleClose = () => {
        clearCloseTimer();
        closeTimer = setTimeout(() => {
            closeMenu();
        }, 140);
    };

    const keepOpen = () => {
        clearCloseTimer();
        if (isOpen) updateBridge();
    };

    const onTriggerEnter = () => openMenu();

    const onTriggerLeave = (e) => {
        const related = e.relatedTarget;
        if (
            related &&
            (menuItem.contains(related) ||
                dropdown.contains(related) ||
                bridge.contains(related))
        ) {
            return;
        }
        scheduleClose();
    };

    const onDropdownEnter = () => keepOpen();

    const onDropdownLeave = (e) => {
        const related = e.relatedTarget;
        if (
            related &&
            (menuItem.contains(related) ||
                dropdown.contains(related) ||
                bridge.contains(related))
        ) {
            return;
        }
        scheduleClose();
    };

    const onBridgeEnter = () => keepOpen();

    const onBridgeLeave = (e) => {
        const related = e.relatedTarget;
        if (
            related &&
            (menuItem.contains(related) ||
                dropdown.contains(related) ||
                bridge.contains(related))
        ) {
            return;
        }
        scheduleClose();
    };

    const onOverlayEnter = () => scheduleClose();
    const onOverlayClick = () => closeMenu();

    const onWindowUpdate = () => {
        if (isOpen) updateBridge();
    };

   const onDropdownLinkClick = () => {
    clearCloseTimer();

    gsap.killTweensOf([dropdown, overlay]);

    gsap.to(dropdown, {
        opacity: 0,
        yPercent: -10,
        duration: 0.18,
        ease: 'power2.out',
        pointerEvents: 'none',
        onComplete: () => {
            gsap.set(dropdown, {
                visibility: 'hidden',
            });
            disableBridge();
        },
    });

    gsap.to(overlay, {
        opacity: 0,
        duration: 0.16,
        ease: 'power2.out',
        pointerEvents: 'none',
        onComplete: () => {
            gsap.set(overlay, {
                visibility: 'hidden',
            });
        },
    });

    isOpen = false;
};

    trigger.addEventListener('mouseenter', onTriggerEnter);
    menuItem.addEventListener('mouseenter', onTriggerEnter);

    trigger.addEventListener('mouseleave', onTriggerLeave);
    menuItem.addEventListener('mouseleave', onTriggerLeave);

    dropdown.addEventListener('mouseenter', onDropdownEnter);
    dropdown.addEventListener('mouseleave', onDropdownLeave);

    bridge.addEventListener('mouseenter', onBridgeEnter);
    bridge.addEventListener('mouseleave', onBridgeLeave);

    overlay.addEventListener('mouseenter', onOverlayEnter);
    overlay.addEventListener('click', onOverlayClick);

    dropdownLinks.forEach((link) => {
        link.addEventListener('click', onDropdownLinkClick);
    });

    window.addEventListener('resize', onWindowUpdate);
    window.addEventListener('scroll', onWindowUpdate, true);

    const onKeydown = (e) => {
        if (e.key === 'Escape') {
            closeMenu();
        }
    };

    document.addEventListener('keydown', onKeydown);

    dropdown._productsMenuCleanup = () => {
        clearCloseTimer();

        trigger.removeEventListener('mouseenter', onTriggerEnter);
        menuItem.removeEventListener('mouseenter', onTriggerEnter);

        trigger.removeEventListener('mouseleave', onTriggerLeave);
        menuItem.removeEventListener('mouseleave', onTriggerLeave);

        dropdown.removeEventListener('mouseenter', onDropdownEnter);
        dropdown.removeEventListener('mouseleave', onDropdownLeave);

        bridge.removeEventListener('mouseenter', onBridgeEnter);
        bridge.removeEventListener('mouseleave', onBridgeLeave);

        overlay.removeEventListener('mouseenter', onOverlayEnter);
        overlay.removeEventListener('click', onOverlayClick);

        dropdownLinks.forEach((link) => {
            link.removeEventListener('click', onDropdownLinkClick);
        });

        window.removeEventListener('resize', onWindowUpdate);
        window.removeEventListener('scroll', onWindowUpdate, true);

        document.removeEventListener('keydown', onKeydown);

        gsap.killTweensOf([dropdown, overlay]);

        bridge.remove();

        gsap.set([dropdown, overlay], {
            opacity: 0,
            visibility: 'hidden',
            pointerEvents: 'none',
        });
    };
}

function initMouseFollower() {
    const follower = document.querySelector('.mouse-follower');
    if (!follower) return;

    if (window.innerWidth <= 1024) {
        gsap.set(follower, { display: 'none' });
        return;
    }

    let mouseX = window.innerWidth / 2;
    let mouseY = window.innerHeight / 2;
    let currentX = mouseX;
    let currentY = mouseY;

    const lerp = (start, end, factor) => start + (end - start) * factor;

    const onMouseMove = (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
    };

    const render = () => {
        currentX = lerp(currentX, mouseX, 0.12);
        currentY = lerp(currentY, mouseY, 0.12);

        follower.style.transform = `translate3d(${currentX}px, ${currentY}px, 0) translate(-50%, -50%)`;

        follower._raf = requestAnimationFrame(render);
    };

    window.addEventListener('mousemove', onMouseMove);

    render();

    follower._cleanup = () => {
        window.removeEventListener('mousemove', onMouseMove);
        if (follower._raf) cancelAnimationFrame(follower._raf);
    };
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
    // Initialize on page load
document.addEventListener('trac:loaded', () => {
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
