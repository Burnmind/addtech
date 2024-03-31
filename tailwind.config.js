const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './resources/js/**/*.js',
        './resources/js/**/*.{ts,jsx,tsx}',
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
                    0: '#ffffff',
                    50: '#b1fbee',
                    100: '#b1f0e5',
                    200: '#9fd7cf',
                    300: '#8cbdb5',
                    400: '#79a39c',
                    500: '#62857f',
                    600: '#4f6b66',
                    700: '#3c524e',
                    800: '#293835',
                    900: '#161f1d',
                    950: '#0E1413',
                },
                gray: {
                    50: '#f1f7f0',
                    100: '#e0e6df',
                    200: '#a0bf99',
                    300: '#91ad8b',
                    400: '#6f856a',
                    500: '#5e705a',
                    600: '#53634f',
                    700: '#455241',
                    800: '#3f4b3c',
                    900: '#364033',
                    950: '#242b22',
                },
                'primary-50': 'rgb(var(--primary-50))',
                'primary-100': 'rgb(var(--primary-100))',
                'primary-200': 'rgb(var(--primary-200))',
                'primary-300': 'rgb(var(--primary-300))',
                'primary-400': 'rgb(var(--primary-400))',
                'primary-500': 'rgb(var(--primary-500))',
                'primary-600': 'rgb(var(--primary-600))',
                'primary-700': 'rgb(var(--primary-700))',
                'primary-800': 'rgb(var(--primary-800))',
                'primary-900': 'rgb(var(--primary-900))',
                'primary-950': 'rgb(var(--primary-950))',
                'surface-0': 'rgb(var(--surface-0))',
                'surface-50': 'rgb(var(--surface-50))',
                'surface-100': 'rgb(var(--surface-100))',
                'surface-200': 'rgb(var(--surface-200))',
                'surface-300': 'rgb(var(--surface-300))',
                'surface-400': 'rgb(var(--surface-400))',
                'surface-500': 'rgb(var(--surface-500))',
                'surface-600': 'rgb(var(--surface-600))',
                'surface-700': 'rgb(var(--surface-700))',
                'surface-800': 'rgb(var(--surface-800))',
                'surface-900': 'rgb(var(--surface-900))',
                'surface-950': 'rgb(var(--surface-950))'
            },
            fontFamily: {
                sans: ['Source Code Pro', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
