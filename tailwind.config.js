/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/flowbite/**/*.js',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            screens: {
                xs: '360px',
            },
            colors: {
                cyan: '#183D55',
                'cyan-100': '#7393A7',
                lightblue: '#E8ECF1',
            },
            fontFamily: {
                Gilgan: ['Gilgan', 'sans-serif'],
            },
            backgroundImage: {
                jumbotron: "url('/assets/jumbotron.png')",
            },
            fontSize: {
                '2xs': '0.50rem',
            },
        },
    },
    plugins: [require('flowbite/plugin')],
};
