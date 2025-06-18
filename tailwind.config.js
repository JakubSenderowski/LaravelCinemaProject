/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Hanken Grotesk', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            colors: {
                brown: '#171212',
                green: '#122117',
            },
            fontSize: {
                '2xs': '10px',
            },
            // Dodaj te animacje
            animation: {
                'fade-in-up': 'fadeInUp 1s ease-out',
                'bounce-in': 'bounceIn 1.5s ease-out',
                'pulse-glow': 'pulseGlow 2s ease-in-out infinite',
                'count-reveal': 'countReveal 2s ease-out',
                'scale-bounce': 'scaleBounce 1.5s ease-out',
            },
            keyframes: {
                fadeInUp: {
                    '0%': { opacity: '0', transform: 'translateY(30px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                bounceIn: {
                    '0%': { opacity: '0', transform: 'scale(0.3)' },
                    '50%': { opacity: '1', transform: 'scale(1.05)' },
                    '70%': { transform: 'scale(0.9)' },
                    '100%': { transform: 'scale(1)' },
                },
                pulseGlow: {
                    '0%, 100%': {
                        transform: 'scale(1)',
                        textShadow: '0 0 5px rgba(255, 255, 255, 0.5)'
                    },
                    '50%': {
                        transform: 'scale(1.1)',
                        textShadow: '0 0 20px rgba(255, 255, 255, 0.8)'
                    },
                },
                countReveal: {
                    '0%': {
                        opacity: '0',
                        transform: 'rotateY(90deg) scale(0.5)',
                        filter: 'blur(10px)'
                    },
                    '50%': {
                        opacity: '0.7',
                        transform: 'rotateY(45deg) scale(0.8)',
                        filter: 'blur(5px)'
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'rotateY(0deg) scale(1)',
                        filter: 'blur(0px)'
                    },
                },
                scaleBounce: {
                    '0%': { transform: 'scale(0)' },
                    '60%': { transform: 'scale(1.2)' },
                    '80%': { transform: 'scale(0.9)' },
                    '100%': { transform: 'scale(1)' },
                },
            },
        },
    },
    plugins: [],
};
