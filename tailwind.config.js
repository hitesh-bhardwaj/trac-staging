/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './*.php',
        './template-parts/**/*.php',
        './inc/**/*.php',
        './src/**/*.js',
    ],
    theme: {
        // Desktop-first breakpoints (max-width)
        screens: {
            '2xl': { max: '1535px' }, // max-2xl: applies below 1536px
            xl: { max: '1279px' }, // max-xl: applies below 1280px
            lg: { max: '1024px' }, // max-lg: applies below 1024px (tablet landscape)
            md: { max: '768px' }, // max-md: applies below 768px (tablet portrait)
            sm: { max: '540px' }, // max-sm: applies below 540px (mobile)
        },
        extend: {
            colors: {
                // Brand colors from Figma - Trac/Enigma design
                brand: {
                    primary: '#10417f', // Main blue
                    secondary: '#E85D24', // Orange accent (for markers)
                    dark: '#111111',
                    light: '#F5F5F5',
                },
                // Text colors
                text: {
                    primary: '#111111',
                    secondary: '#1d1d1d',
                    body: '#1e1e1e',
                    muted: '#666666',
                },
                // Neutral palette
                neutral: {
                    50: '#FAFAFA',
                    100: '#F5F5F5',
                    200: '#E5E5E5',
                    300: '#D4D4D4',
                    400: '#A3A3A3',
                    500: '#737373',
                    600: '#525252',
                    700: '#404040',
                    800: '#262626',
                    900: '#171717',
                    950: '#0A0A0A',
                },
            },
            fontFamily: {
                // Brand fonts from Figma
                heading: [
                    '"Helvetica Neue"',
                    'Helvetica',
                    'Arial',
                    'sans-serif',
                ],
                body: ['"Open Sans"', 'system-ui', 'sans-serif'],
            },
            fontSize: {
                // Custom fluid typography scale
                'display-1': [
                    'clamp(3rem, 8vw, 7rem)',
                    { lineHeight: '1.1', letterSpacing: '-0.02em' },
                ],
                'display-2': [
                    'clamp(2.5rem, 6vw, 5rem)',
                    { lineHeight: '1.15', letterSpacing: '-0.02em' },
                ],
                'heading-1': [
                    'clamp(2rem, 4vw, 3.5rem)',
                    { lineHeight: '1.2', letterSpacing: '-0.01em' },
                ],
                'heading-2': [
                    'clamp(1.5rem, 3vw, 2.5rem)',
                    { lineHeight: '1.25', letterSpacing: '-0.01em' },
                ],
                'heading-3': [
                    'clamp(1.25rem, 2vw, 1.75rem)',
                    { lineHeight: '1.3' },
                ],
                'body-lg': ['1.125rem', { lineHeight: '1.6' }],
                body: ['1rem', { lineHeight: '1.6' }],
                'body-sm': ['0.875rem', { lineHeight: '1.5' }],
            },
            spacing: {
                // Custom spacing for sections
                section: 'clamp(4rem, 10vw, 8rem)',
                'section-sm': 'clamp(2rem, 5vw, 4rem)',
            },
            transitionDuration: {
                400: '400ms',
                600: '600ms',
                800: '800ms',
            },
            animation: {
                'fade-in': 'fadeIn 0.6s ease-out forwards',
                'fade-up': 'fadeUp 0.6s ease-out forwards',
                'scale-in': 'scaleIn 0.6s ease-out forwards',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                fadeUp: {
                    '0%': { opacity: '0', transform: 'translateY(30px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                scaleIn: {
                    '0%': { opacity: '0', transform: 'scale(0.95)' },
                    '100%': { opacity: '1', transform: 'scale(1)' },
                },
            },
        },
    },
    plugins: [],
};
