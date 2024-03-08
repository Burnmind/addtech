const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    darkMode: 'selector',
    theme: {
        extend: {
            /**
             * #3f4b3c
             * #efefe4
             * Source Code Pro
             */
            colors: {
                blue: {
                    100: '#b1f0e5',
                    200: '#9fd7cf',
                    300: '#8cbdb5',
                    400: '#79a39c',
                    500: '#62857f',
                    600: '#4f6b66',
                    700: '#3c524e',
                    800: '#293835',
                    900: '#161f1d',
                },
                gray: {
                    100: '#e0e6df',
                    200: '#a0bf99',
                    300: '#91ad8b',
                    400: '#6f856a',
                    500: '#5e705a',
                    600: '#53634f',
                    700: '#455241',
                    800: '#3f4b3c',
                    900: '#364033',
                }
            },
            fontFamily: {
                sans: ['Source Code Pro', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
