/**
 * Trac Theme - Three.js Hero Scene
 *
 * 3D background scene for the hero section
 */

import * as THREE from 'three';
import { gsap } from 'gsap';

// Scene state
let scene, camera, renderer, animationId;
let particles, particlesMaterial;
let mouseX = 0,
    mouseY = 0;
let windowHalfX = window.innerWidth / 2;
let windowHalfY = window.innerHeight / 2;

/**
 * Initialize the hero Three.js scene
 */
export function initHeroScene(container) {
    if (!container) {
        console.warn('[Trac] Hero canvas container not found');
        return;
    }

    // Scene setup
    scene = new THREE.Scene();

    // Camera setup
    camera = new THREE.PerspectiveCamera(
        75,
        window.innerWidth / window.innerHeight,
        1,
        2000,
    );
    camera.position.z = 1000;

    // Renderer setup
    renderer = new THREE.WebGLRenderer({
        antialias: true,
        alpha: true,
    });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setClearColor(0x000000, 0);
    container.appendChild(renderer.domElement);

    // Create particles
    createParticles();

    // Event listeners
    document.addEventListener('mousemove', onMouseMove, false);
    window.addEventListener('resize', onWindowResize, false);

    // Start animation
    animate();

    // Intro animation
    introAnimation();

    console.log('[Trac] Hero scene initialized');
}

/**
 * Create particle system
 */
function createParticles() {
    const particleCount = 1500;
    const geometry = new THREE.BufferGeometry();

    const positions = new Float32Array(particleCount * 3);
    const scales = new Float32Array(particleCount);
    const colors = new Float32Array(particleCount * 3);

    // Brand colors for particles
    const color1 = new THREE.Color(0x0066ff); // Primary blue
    const color2 = new THREE.Color(0x00d4aa); // Secondary teal

    for (let i = 0; i < particleCount; i++) {
        const i3 = i * 3;

        // Random position in sphere
        const radius = 800 + Math.random() * 400;
        const theta = Math.random() * Math.PI * 2;
        const phi = Math.acos(2 * Math.random() - 1);

        positions[i3] = radius * Math.sin(phi) * Math.cos(theta);
        positions[i3 + 1] = radius * Math.sin(phi) * Math.sin(theta);
        positions[i3 + 2] = radius * Math.cos(phi);

        // Random scale
        scales[i] = Math.random() * 2 + 0.5;

        // Gradient between brand colors
        const mixAmount = Math.random();
        const color = color1.clone().lerp(color2, mixAmount);
        colors[i3] = color.r;
        colors[i3 + 1] = color.g;
        colors[i3 + 2] = color.b;
    }

    geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    geometry.setAttribute('scale', new THREE.BufferAttribute(scales, 1));
    geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

    // Custom shader material for particles
    particlesMaterial = new THREE.ShaderMaterial({
        uniforms: {
            uTime: { value: 0 },
            uOpacity: { value: 0 }, // Start invisible for intro animation
        },
        vertexShader: `
      attribute float scale;
      attribute vec3 color;
      varying vec3 vColor;
      uniform float uTime;

      void main() {
        vColor = color;

        vec3 pos = position;

        // Subtle floating motion
        pos.y += sin(uTime * 0.5 + position.x * 0.01) * 10.0;
        pos.x += cos(uTime * 0.3 + position.z * 0.01) * 10.0;

        vec4 mvPosition = modelViewMatrix * vec4(pos, 1.0);

        gl_PointSize = scale * (300.0 / -mvPosition.z);
        gl_Position = projectionMatrix * mvPosition;
      }
    `,
        fragmentShader: `
      varying vec3 vColor;
      uniform float uOpacity;

      void main() {
        // Circular particle with soft edge
        float dist = length(gl_PointCoord - vec2(0.5));
        if (dist > 0.5) discard;

        float alpha = 1.0 - smoothstep(0.3, 0.5, dist);
        alpha *= uOpacity;

        gl_FragColor = vec4(vColor, alpha);
      }
    `,
        transparent: true,
        depthWrite: false,
        blending: THREE.AdditiveBlending,
    });

    particles = new THREE.Points(geometry, particlesMaterial);
    scene.add(particles);
}

/**
 * Intro animation
 */
function introAnimation() {
    // Fade in particles
    gsap.to(particlesMaterial.uniforms.uOpacity, {
        value: 0.8,
        duration: 2,
        delay: 0.5,
        ease: 'power2.out',
    });

    // Camera movement
    gsap.from(camera.position, {
        z: 1500,
        duration: 2.5,
        ease: 'power3.out',
    });
}

/**
 * Handle mouse movement
 */
function onMouseMove(event) {
    mouseX = event.clientX - windowHalfX;
    mouseY = event.clientY - windowHalfY;
}

/**
 * Handle window resize
 */
function onWindowResize() {
    windowHalfX = window.innerWidth / 2;
    windowHalfY = window.innerHeight / 2;

    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();

    renderer.setSize(window.innerWidth, window.innerHeight);
}

/**
 * Animation loop
 */
function animate() {
    animationId = requestAnimationFrame(animate);

    // Update time uniform
    if (particlesMaterial) {
        particlesMaterial.uniforms.uTime.value += 0.01;
    }

    // Smooth camera follow mouse
    camera.position.x += (mouseX * 0.05 - camera.position.x) * 0.02;
    camera.position.y += (-mouseY * 0.05 - camera.position.y) * 0.02;
    camera.lookAt(scene.position);

    // Rotate particles slowly
    if (particles) {
        particles.rotation.y += 0.0005;
        particles.rotation.x += 0.0002;
    }

    renderer.render(scene, camera);
}

/**
 * Destroy scene (cleanup)
 */
export function destroyHeroScene() {
    if (animationId) {
        cancelAnimationFrame(animationId);
    }

    if (renderer) {
        renderer.dispose();
    }

    if (particles) {
        particles.geometry.dispose();
        particlesMaterial.dispose();
    }

    document.removeEventListener('mousemove', onMouseMove);
    window.removeEventListener('resize', onWindowResize);

    scene = null;
    camera = null;
    renderer = null;
    particles = null;

    console.log('[Trac] Hero scene destroyed');
}

/**
 * Pause animation (for performance)
 */
export function pauseHeroScene() {
    if (animationId) {
        cancelAnimationFrame(animationId);
        animationId = null;
    }
}

/**
 * Resume animation
 */
export function resumeHeroScene() {
    if (!animationId && renderer) {
        animate();
    }
}

// Export for external use
export { scene, camera, renderer };
