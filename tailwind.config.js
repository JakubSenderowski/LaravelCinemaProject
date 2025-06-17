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
        },
    },
    plugins: [],
};
