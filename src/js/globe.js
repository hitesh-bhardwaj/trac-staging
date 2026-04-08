/**
 * Trac Theme - Three Globe Component
 * Aceternity UI / GitHub Globe Style
 *
 * Features:
 * - Dotted land texture (hexbin pattern)
 * - Glowing location markers with rings
 * - Smooth arc connections
 * - Bottom gradient fade effect
 */

import * as THREE from 'three';
import ThreeGlobe from 'three-globe';
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js';

// Import the GeoJSON data
import countriesData from '../data/globe.json';

// Globe configuration (Aceternity/GitHub style + Trac brand)
const GLOBE_CONFIG = {
    // Globe appearance - light base for white background
    globeColor: '#ffffff', // Light gray

    // Atmosphere - subtle neutral glow
    showAtmosphere: true,
    atmosphereColor: '#ffffff',
    atmosphereAltitude: 0.12,

    // Hexbin dots styling - Africa highlighted, others lighter
    hexPolygonColor: getHexPolygonColor,
    hexPolygonResolution: 3,
    hexPolygonMargin: 0.4, // Larger dots with smaller gaps
    hexPolygonDotResolution: 12, // Smooth circular dots

    // Lighting
    ambientLight: '#ffffff',
    directionalLeftLight: '#ffffff',
    directionalTopLight: '#ffffff',
    pointLight: '#ffffff',

    // Animation
    arcTime: 1000,
    arcLength: 0.9,
    rings: 1,
    maxRings: 3,

    // Initial position (focus on Africa)
    initialPosition: {
        lat: 5,
        lng: 20,
    },

    // Rotation (handled by OrbitControls)
    autoRotate: false,
    autoRotateSpeed: 0.5,
};

// Arc data - connections between African cities and global points (all blue, reduced curvature)
const ARC_DATA = [
    // Africa to Europe
    {
        order: 1,
        startLat: 30.04442,
        startLng: 31.235712,
        endLat: 51.507351,
        endLng: -0.127758,
        arcAlt: 0.15,
        color: '#10417F',
    }, // Cairo to London
    {
        order: 2,
        startLat: 6.524379,
        startLng: 3.379206,
        endLat: 48.856614,
        endLng: 2.352222,
        arcAlt: 0.12,
        color: '#10417F',
    }, // Lagos to Paris
    {
        order: 3,
        startLat: 33.589886,
        startLng: -7.603869,
        endLat: 40.416775,
        endLng: -3.70379,
        arcAlt: 0.08,
        color: '#10417F',
    }, // Casablanca to Madrid

    // Africa internal connections
    {
        order: 4,
        startLat: -1.286389,
        startLng: 36.817223,
        endLat: 6.524379,
        endLng: 3.379206,
        arcAlt: 0.1,
        color: '#10417F',
    }, // Nairobi to Lagos
    {
        order: 5,
        startLat: -33.924869,
        startLng: 18.424055,
        endLat: 30.04442,
        endLng: 31.235712,
        arcAlt: 0.15,
        color: '#10417F',
    }, // Cape Town to Cairo
    {
        order: 6,
        startLat: 6.524379,
        startLng: 3.379206,
        endLat: 14.716677,
        endLng: -17.467686,
        arcAlt: 0.08,
        color: '#10417F',
    }, // Lagos to Dakar
    {
        order: 7,
        startLat: -1.286389,
        startLng: 36.817223,
        endLat: -6.792354,
        endLng: 39.208328,
        arcAlt: 0.05,
        color: '#10417F',
    }, // Nairobi to Dar es Salaam

    // Africa to Americas
    {
        order: 8,
        startLat: -33.924869,
        startLng: 18.424055,
        endLat: -23.55052,
        endLng: -46.633308,
        arcAlt: 0.18,
        color: '#10417F',
    }, // Cape Town to Sao Paulo
    {
        order: 9,
        startLat: 14.716677,
        startLng: -17.467686,
        endLat: 40.712776,
        endLng: -74.005974,
        arcAlt: 0.2,
        color: '#10417F',
    }, // Dakar to New York

    // Africa to Asia/Middle East
    {
        order: 10,
        startLat: -1.286389,
        startLng: 36.817223,
        endLat: 25.204849,
        endLng: 55.270783,
        arcAlt: 0.1,
        color: '#10417F',
    }, // Nairobi to Dubai
    {
        order: 11,
        startLat: 30.04442,
        startLng: 31.235712,
        endLat: 1.3521,
        endLng: 103.8198,
        arcAlt: 0.18,
        color: '#10417F',
    }, // Cairo to Singapore
    {
        order: 12,
        startLat: 9.005401,
        startLng: 38.763611,
        endLat: 35.6762,
        endLng: 139.6503,
        arcAlt: 0.22,
        color: '#10417F',
    }, // Addis Ababa to Tokyo
];

// Brand colors
const COLORS = {
    orange: '#F0741C', // Brand accent - markers
    blue: '#10417F', // Brand primary - arc lines
};

/**
 * Get hex polygon color based on whether country is in Africa
 */
function getHexPolygonColor(feature) {
    const continent = feature.properties?.continent || '';
    if (continent === 'Africa') {
        return 'rgba(16, 65, 127, 0.9)'; // Brand blue for Africa
    }
    return 'rgba(16, 65, 127, 0.25)'; // Light blue for other continents
}

// Points data - Location markers with glow effect
const POINTS_DATA = [
    // Major African cities (ORANGE - brand accent)
    {
        lat: -1.286389,
        lng: 36.817223,
        size: 0.08,
        color: COLORS.orange,
        name: 'Nairobi',
    },
    {
        lat: 6.524379,
        lng: 3.379206,
        size: 0.08,
        color: COLORS.orange,
        name: 'Lagos',
    },
    {
        lat: -33.924869,
        lng: 18.424055,
        size: 0.08,
        color: COLORS.orange,
        name: 'Cape Town',
    },
    {
        lat: 30.04442,
        lng: 31.235712,
        size: 0.08,
        color: COLORS.orange,
        name: 'Cairo',
    },
    {
        lat: 14.716677,
        lng: -17.467686,
        size: 0.06,
        color: COLORS.orange,
        name: 'Dakar',
    },
    {
        lat: -6.792354,
        lng: 39.208328,
        size: 0.06,
        color: COLORS.orange,
        name: 'Dar es Salaam',
    },
    {
        lat: 5.603717,
        lng: -0.186964,
        size: 0.06,
        color: COLORS.orange,
        name: 'Accra',
    },
    {
        lat: -4.441931,
        lng: 15.266293,
        size: 0.06,
        color: COLORS.orange,
        name: 'Kinshasa',
    },
    {
        lat: -26.204103,
        lng: 28.047305,
        size: 0.06,
        color: COLORS.orange,
        name: 'Johannesburg',
    },
    {
        lat: 9.005401,
        lng: 38.763611,
        size: 0.06,
        color: COLORS.orange,
        name: 'Addis Ababa',
    },
    {
        lat: 33.589886,
        lng: -7.603869,
        size: 0.05,
        color: COLORS.orange,
        name: 'Casablanca',
    },
    {
        lat: 36.806496,
        lng: 10.181532,
        size: 0.05,
        color: COLORS.orange,
        name: 'Tunis',
    },

    // Global connection points (ORANGE - all markers orange)
    {
        lat: 51.507351,
        lng: -0.127758,
        size: 0.04,
        color: COLORS.orange,
        name: 'London',
    },
    {
        lat: 48.856614,
        lng: 2.352222,
        size: 0.04,
        color: COLORS.orange,
        name: 'Paris',
    },
    {
        lat: 40.712776,
        lng: -74.005974,
        size: 0.04,
        color: COLORS.orange,
        name: 'New York',
    },
    {
        lat: -23.55052,
        lng: -46.633308,
        size: 0.04,
        color: COLORS.orange,
        name: 'Sao Paulo',
    },
    {
        lat: 25.204849,
        lng: 55.270783,
        size: 0.04,
        color: COLORS.orange,
        name: 'Dubai',
    },
    {
        lat: 35.6762,
        lng: 139.6503,
        size: 0.03,
        color: COLORS.orange,
        name: 'Tokyo',
    },
    {
        lat: 1.3521,
        lng: 103.8198,
        size: 0.03,
        color: COLORS.orange,
        name: 'Singapore',
    },
    {
        lat: 40.416775,
        lng: -3.70379,
        size: 0.03,
        color: COLORS.orange,
        name: 'Madrid',
    },
];

// Globe instance and state
let globe = null;
let renderer = null;
let scene = null;
let camera = null;
let controls = null;
let animationId = null;

// Mouse interaction state
let mouseX = 0;
let mouseY = 0;
let targetRotationX = 0;
let targetRotationY = 0;

/**
 * Create animated arcs with staggered timing
 */
function getArcDashAnimateTime(arc) {
    return GLOBE_CONFIG.arcTime + arc.order * 100;
}

/**
 * Initialize the globe
 * @param {HTMLElement} container - The container element for the globe
 * @param {Object} options - Optional configuration overrides
 */
export function initGlobe(container, options = {}) {
    if (!container) {
        console.warn('[Trac Globe] Container not found');
        return null;
    }

    const config = { ...GLOBE_CONFIG, ...options };

    // Find the hero section for mouse tracking (or use window as fallback)
    const heroSection = container.closest('[data-section="hero"]') || container.closest('section') || document.documentElement;
    const width = container.clientWidth;
    const height = container.clientHeight;

    // Scene setup
    scene = new THREE.Scene();
    scene.background = null; // Transparent background

    // Camera setup - positioned for good Africa view
    camera = new THREE.PerspectiveCamera(50, width / height, 0.1, 2000);
    camera.position.z = 290;

    // Renderer setup
    renderer = new THREE.WebGLRenderer({
        antialias: true,
        alpha: true,
        powerPreference: 'high-performance',
    });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setSize(width, height);
    renderer.setClearColor(0x000000, 0);
    container.appendChild(renderer.domElement);

    // OrbitControls for manual rotation
    controls = new OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;
    controls.dampingFactor = 0.05;
    controls.enableZoom = false;
    controls.enablePan = false;
    controls.rotateSpeed = 0.5;
    controls.autoRotate = false; // Disabled for mouse interaction
    controls.autoRotateSpeed = 0;

    // Lighting setup - creates the glow effect
    const ambientLight = new THREE.AmbientLight(config.ambientLight, 1.8);
    scene.add(ambientLight);

    const directionalLight1 = new THREE.DirectionalLight(
        config.directionalLeftLight,
        0.8,
    );
    directionalLight1.position.set(-400, 100, 400);
    scene.add(directionalLight1);

    const directionalLight2 = new THREE.DirectionalLight(
        config.directionalTopLight,
        0.6,
    );
    directionalLight2.position.set(-200, 500, 200);
    scene.add(directionalLight2);

    const pointLight = new THREE.PointLight(config.pointLight, 0.8);
    pointLight.position.set(-200, 500, 200);
    scene.add(pointLight);

    // Create globe with hexbin (dotted) pattern
    globe = new ThreeGlobe({ animateIn: true })
        // Base globe appearance
        .showGlobe(true)
        .showAtmosphere(config.showAtmosphere)
        .atmosphereColor(config.atmosphereColor)
        .atmosphereAltitude(config.atmosphereAltitude)

        // Hexbin dots for land areas (dotted earth effect)
        .hexPolygonsData(countriesData.features)
        .hexPolygonResolution(config.hexPolygonResolution)
        .hexPolygonMargin(config.hexPolygonMargin)
        .hexPolygonUseDots(true)
        .hexPolygonDotResolution(config.hexPolygonDotResolution)
        .hexPolygonColor(config.hexPolygonColor)
        .hexPolygonAltitude(0.008)
        .hexPolygonsTransitionDuration(1000)

        // Points (solid circle markers)
        .pointsData(POINTS_DATA)
        .pointLat('lat')
        .pointLng('lng')
        .pointColor('color')
        .pointAltitude(0.01)
        .pointRadius(0.8)
        .pointsMerge(false)

        // Arcs (smooth connection lines)
        .arcsData(ARC_DATA)
        .arcStartLat('startLat')
        .arcStartLng('startLng')
        .arcEndLat('endLat')
        .arcEndLng('endLng')
        .arcColor('color')
        .arcAltitude('arcAlt')
        .arcStroke(0.2)
        .arcDashLength(config.arcLength)
        .arcDashGap(1.0)
        .arcDashAnimateTime(getArcDashAnimateTime)

        // Rings at all points (animating circles outside solid markers)
        .ringsData(POINTS_DATA)
        .ringLat('lat')
        .ringLng('lng')
        .ringColor((d) => (t) => {
            const baseColor = d.color || COLORS.orange;
            const r = parseInt(baseColor.slice(1, 3), 16);
            const g = parseInt(baseColor.slice(3, 5), 16);
            const b = parseInt(baseColor.slice(5, 7), 16);
            return `rgba(${r}, ${g}, ${b}, ${1 - t})`;
        })
        .ringMaxRadius(2)
        .ringPropagationSpeed(1.5)
        .ringRepeatPeriod(800);

    // Globe material customization - pure white
    const globeMaterial = globe.globeMaterial();
    globeMaterial.color = new THREE.Color(0xffffff);
    globeMaterial.emissive = new THREE.Color(0xffffff);
    globeMaterial.emissiveIntensity = 0.15;
    globeMaterial.shininess = 0;
    globeMaterial.transparent = false;
    globeMaterial.opacity = 1.0;

    // Set initial rotation to focus on Africa
    const initialRotY = -Math.PI * (config.initialPosition.lng / 180);
    const initialRotX = Math.PI * (config.initialPosition.lat / 180);
    globe.rotation.y = initialRotY;
    globe.rotation.x = initialRotX;

    // Set initial target rotation (will be overridden by mouse movement)
    targetRotationY = initialRotY;
    targetRotationX = initialRotX;

    scene.add(globe);

    // Add gradient overlay effect (bottom glow)
    addGradientEffect(container);

    // Event listeners
    window.addEventListener('resize', () => onWindowResize(container));
    // Track mouse on entire hero section so text/buttons don't block interaction
    heroSection.addEventListener('mousemove', (event) =>
        onMouseMove(event, container),
    );

    // Store hero section reference for cleanup
    container._heroSection = heroSection;

    // Start animation loop
    animate();

    console.log('[Trac Globe] Initialized');

    return {
        globe,
        scene,
        camera,
        renderer,
        controls,
        destroy: () => destroyGlobe(container),
        pause: pauseGlobe,
        resume: resumeGlobe,
    };
}

/**
 * Add subtle vignette effect for depth
 */
function addGradientEffect(container) {
    container.style.position = 'relative';
}

/**
 * Window resize handler
 */
function onWindowResize(container) {
    if (!camera || !renderer) return;

    const width = container.clientWidth;
    const height = container.clientHeight;

    camera.aspect = width / height;
    camera.updateProjectionMatrix();
    renderer.setSize(width, height);
}

/**
 * Mouse move handler for interactive globe rotation
 */
function onMouseMove(event, container) {
    const rect = container.getBoundingClientRect();
    const centerX = rect.left + rect.width / 2;
    const centerY = rect.top + rect.height / 2;

    // Calculate mouse position relative to globe container center (-1 to 1)
    // Using clientX/Y directly since event might be from parent element
    mouseX = (event.clientX - centerX) / (rect.width / 2);
    mouseY = (event.clientY - centerY) / (rect.height / 2);

    // Set target rotation based on mouse position
    // Multiply by a factor to control rotation sensitivity
    targetRotationY = mouseX * 0.3; // Horizontal rotation
    targetRotationX = mouseY * 0.15; // Vertical rotation (less sensitive)
}

/**
 * Animation loop
 */
function animate() {
    animationId = requestAnimationFrame(animate);

    if (!globe || !renderer || !scene || !camera || !controls) return;

    // Smooth rotation based on mouse position
    const lerpFactor = 0.05; // Smoothness factor (lower = smoother)
    globe.rotation.y += (targetRotationY - globe.rotation.y) * lerpFactor;
    globe.rotation.x += (targetRotationX - globe.rotation.x) * lerpFactor;

    // Update OrbitControls
    controls.update();

    renderer.render(scene, camera);
}

/**
 * Destroy the globe and cleanup
 */
function destroyGlobe(container) {
    if (animationId) {
        cancelAnimationFrame(animationId);
        animationId = null;
    }

    // Remove mouse event listener from hero section
    if (container && container._heroSection) {
        // Clone and replace to remove all event listeners
        const heroSection = container._heroSection;
        const newHeroSection = heroSection.cloneNode(true);
        if (heroSection.parentNode) {
            heroSection.parentNode.replaceChild(newHeroSection, heroSection);
        }
        delete container._heroSection;
    }

    if (controls) {
        controls.dispose();
    }

    if (renderer) {
        renderer.dispose();
        if (renderer.domElement && renderer.domElement.parentNode) {
            renderer.domElement.parentNode.removeChild(renderer.domElement);
        }
    }

    // Remove gradient overlay
    const gradient = container?.querySelector('.globe-gradient-overlay');
    if (gradient) {
        gradient.remove();
    }

    if (globe) {
        scene.remove(globe);
    }

    globe = null;
    renderer = null;
    scene = null;
    camera = null;
    controls = null;

    // Reset mouse state
    mouseX = 0;
    mouseY = 0;
    targetRotationX = 0;
    targetRotationY = 0;

    console.log('[Trac Globe] Destroyed');
}

/**
 * Pause the globe animation
 */
function pauseGlobe() {
    if (animationId) {
        cancelAnimationFrame(animationId);
        animationId = null;
    }
}

/**
 * Resume the globe animation
 */
function resumeGlobe() {
    if (!animationId && renderer) {
        animate();
    }
}

export default initGlobe;
