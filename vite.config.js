import { defineConfig } from 'vite';
import { resolve } from 'path';

export default defineConfig({
    base: '/wp-content/themes/trac-staging/dist/',

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
