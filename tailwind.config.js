import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
    
        extend: {
            screens: {
                xs: '480px'
            },
            boxShadow: {
                header3D: "0px 1px 0 #393d3f, 1px 2px 0 #393d3f, 2px 3px 0 #393d3f, 3px 4px 0 #393d3f",
                box: "0px 0px 1px rgba(0, 0, 0, 0.3), 0px 3px 7px rgba(0, 0, 0, 0.3), 0px 1px white inset, 0px -3px 1px rgba(0, 0, 0, 0.3) inset"
            },
            backgroundImage: (theme) => ({
                'body-pattern': "url('../img/pattern.png')",
                'banner': "url('../img/bakbaner.png')",

            }),
            backgroundPosition: {
                'banner-position': '-200px -200px'
            },
            colors: {
                "azul-claro": "#37bcf9",
                "azul-oscuro": "#0370b9"
            },
            animation: {
                'spin-slow': 'spin 3s linear infinite',
                'spin-and-down':
                    'animate-none, fromBellow 500ms linear',
                'spin-right': 'fromRight 300ms linear',
                'bg-banner': 'backBanner 10s linear',
                'text-banner': 'showBannerText 10s linear',
                'show-card-icon': 'showCardIcon 300ms linear',
                'show-card-category': 'showCardCategory 400ms linear',
                'show-card-desc': 'showCardDesc 400ms linear'
            },
            keyframes: {
                fromBellow: {
                    '0%': { transform: 'translateY(0%)' },
                    '50%': { transform: 'translateY(200%)' },
                    '100%': { transform: 'translateY(0%)' }
                },
                fromRight: {
                    '0%': { transform: 'translatex(200%)' },
                    '100%': { transform: 'translatex(0%)' }
                },
               
            }
        }
    },

    plugins: [forms],
};
