/**
 * Map Section Animations
 * Handles the reveal animation for the world map and location markers
 */

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initMapAnimation() {

    const mapSection = document.querySelector('[data-section="map"]');

    if (!mapSection) {
        console.warn('[Map Animation] Map section not found!');
        return;
    }

    const mapOverlay = mapSection.querySelector('[data-map-overlay]');
    const locationMarkers = mapSection.querySelectorAll('.location-marker');
    const addressCards = mapSection.querySelectorAll('.address-card');
    const mapContainer =
        mapSection.querySelector('.map-container') || mapSection;
    const connectors = Array.from(
        mapSection.querySelectorAll('[data-map-connector]'),
    );

    const layoutConnectors = () => {
        if (!connectors.length) return;
        const containerRect = mapContainer.getBoundingClientRect();

        connectors.forEach((connector) => {
            const key = connector.getAttribute('data-map-connector') || '';
            const marker = mapSection.querySelector(`[data-location="${key}"]`);
            const card = mapSection.querySelector(`[data-address="${key}"]`);
            const line = connector.querySelector('[data-map-line]');
            if (!marker || !card || !line) return;

            const m = marker.getBoundingClientRect();
            const c = card.getBoundingClientRect();

            const startX = m.left + m.width / 2 - containerRect.left;
            const startY = m.top + m.height / 2 - containerRect.top;

            // Attach to the nearest horizontal edge of the card, centered vertically.
            const cardMidY = c.top + c.height / 2 - containerRect.top;
            const cardLeftX = c.left - containerRect.left;
            const cardRightX = c.right - containerRect.left;
            const endX = cardLeftX > startX ? cardLeftX : cardRightX;
            const endY = cardMidY;

            const dx = endX - startX;
            const dy = endY - startY;
            const length = Math.sqrt(dx * dx + dy * dy);
            const angle = (Math.atan2(dy, dx) * 180) / Math.PI;

            connector.style.left = `${startX}px`;
            connector.style.top = `${startY}px`;
            connector.style.setProperty('--map-line-angle', `${angle}deg`);
            connector.style.setProperty('--map-line-length', `${length}px`);
        });
    };

    // Initial layout and keep connectors accurate on resize/refresh.
    layoutConnectors();
    window.addEventListener('resize', layoutConnectors);
    ScrollTrigger.addEventListener('refreshInit', layoutConnectors);
    mapSection._mapConnectorCleanup = () => {
        window.removeEventListener('resize', layoutConnectors);
        ScrollTrigger.removeEventListener('refreshInit', layoutConnectors);
    };

    // ScrollTrigger for map reveal with white overlay (left to right)
    if (gsap && ScrollTrigger && mapOverlay) {
        // Prep initial states
        gsap.set(locationMarkers, { scale: 0.9, transformOrigin: '50% 50%' });
        gsap.set(addressCards, { y: 20 });
        const connectorLines = connectors
            .map((c) => c.querySelector('[data-map-line]'))
            .filter(Boolean);
        if (connectorLines.length) {
            gsap.set(connectorLines, { scaleX: 0, transformOrigin: '0% 50%' });
        }

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: mapSection,
                start: 'top 60%',
                toggleActions: 'play none none none',
            },
        });

        // Animate white overlay from left to right (reveal map)
        tl.to(mapOverlay, {
            x: '100%',
            duration: 1.35,
            ease: 'power2.inOut',
        })
        // Fade in location markers with scale effect
        .to(locationMarkers, {
            opacity: 1,
            scale: 1,
            duration: 0.6,
            stagger: 0.2,
            ease: 'back.out(1.7)',
        }, '-=0.6')
        // Draw connector lines
        .to(
            connectorLines,
            {
                scaleX: 1,
                duration: 0.7,
                stagger: 0.15,
                ease: 'power3.out',
            },
            '-=0.35',
        )
        // Fade in address cards after the lines connect
        .to(
            addressCards,
            {
                opacity: 1,
                y: 0,
                duration: 0.45,
                stagger: 0.12,
                ease: 'power2.out',
            },
            '-=0.35',
        );
    } else {
        console.warn('[Map Animation] Missing dependencies:', {
            gsap: !!gsap,
            ScrollTrigger: !!ScrollTrigger,
            overlay: !!mapOverlay
        });
    }
}
