import { defineConfig } from 'vite';
import { resolve } from 'path';

export default defineConfig({
    base: '/wp-content/themes/trac-staging/dist/',

    resolve: {
        alias: {
            // Fix three.js subpath exports for Vite (more specific paths first)
            'three/webgpu': resolve(__dirname, 'node_modules/three/build/three.webgpu.js'),
            'three/tsl': resolve(__dirname, 'node_modules/three/build/three.tsl.js'),
            'three/addons/': resolve(__dirname, 'node_modules/three/examples/jsm/'),
        },
    },

    optimizeDeps: {
        include: ['three', 'three-globe'],
    },

    build: {
        outDir: 'dist',
        emptyDirOnBuild: true,
        manifest: true,
        chunkSizeWarningLimit: 800,
        rollupOptions: {
            input: {
                main: resolve(__dirname, 'src/js/main.js'),
                style: resolve(__dirname, 'src/css/main.css'),
            },
            output: {
                entryFileNames: '[name]-[hash].js',
                chunkFileNames: '[name]-[hash].js',
                assetFileNames: '[name]-[hash].[ext]',
                manualChunks: {
                    // Split Three.js and related into own chunk
                    'three-vendor': ['three', 'three-globe'],
                    // Keep GSAP together
                    gsap: ['gsap', 'gsap/ScrollTrigger'],
                },
            },
        },
    },

    server: {
        origin: 'http://localhost:5173',
        cors: true,
    },
});
