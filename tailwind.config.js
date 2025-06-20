import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'purple': {
                    50: '#f0f4ff',
                    100: '#e0eaff',
                    500: '#a855f7',
                    600: '#9333ea',
                    700: '#7e22ce'


                },
                'indigo': {
                    600: '#4f46e5', // Add this
                    400: '#818cf8',
                    800: '#3730a3',
                    200: '#c7d2fe',
                },
                'slate': {
                    400: '#94a3b8', // default value
                    500: '#64748b', // default value
                    200: '#e2e8f0',
                    300: '#cbd5e1',
                    600: '#475569',
                },
                'subject-green': '#86efac',      // Light green
                'subject-green-dark': '#16a34a', // Dark green
                'edit-yellow': '#fde047',        // Light yellow
                'edit-yellow-dark': '#eab308'    // Darker yellow
            }
        },
    },

    plugins: [forms],
};