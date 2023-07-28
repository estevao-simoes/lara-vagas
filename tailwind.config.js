/** @type {import('tailwindcss').Config} */

import colors from 'tailwindcss/colors';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Mulish', 'sans-serif'],
                body: ['Mulish', 'sans-serif'],
            },
            colors: {
                'prussian-blue': '#072939',
                'orange-web': '#fca311',
                'vermilion': '#f9322b',
                'lavender-web': '#d6e3f8',
                'seashell': '#fef5ef',
                danger: colors.rose,
                primary: {
                    '50': '#f0faff',
                    '100': '#e0f4fe',
                    '200': '#bbebfc',
                    '300': '#7fdcfa',
                    '400': '#3bcbf5',
                    '500': '#11b5e6',
                    '600': '#0592c4',
                    '700': '#05749f',
                    '800': '#096283',
                    '900': '#0d526d',
                    '950': '#072939',
                },
                success: colors.green,
                warning: colors.yellow,
            },
        },
    },
    plugins: [
        forms, 
        typography,
    ],
};
