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

    // ScrollTrigger for map reveal with white overlay (left to right)
    if (gsap && ScrollTrigger && mapOverlay) {
        gsap.timeline({
            scrollTrigger: {
                trigger: mapSection,
                start: 'top 60%',
                toggleActions: 'play none none none',
            },
        })
        // Animate white overlay from left to right (reveal map)
        .to(mapOverlay, {
            x: '100%',
            duration: 1.5,
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
        // Fade in address cards
        .to(addressCards, {
            opacity: 1,
            y: 0,
            duration: 0.5,
            stagger: 0.15,
            ease: 'power2.out',
            onStart: function() {
                addressCards.forEach(card => {
                    card.style.transform = 'translateY(20px)';
                });
            }
        }, '-=0.4');
    } else {
        console.warn('[Map Animation] Missing dependencies:', {
            gsap: !!gsap,
            ScrollTrigger: !!ScrollTrigger,
            overlay: !!mapOverlay
        });
    }
}
