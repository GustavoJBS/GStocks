const colors = require('tailwindcss/colors.js');

/** @type {import('tailwindcss').Config} */
module.exports = {
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],
    content: [
        "./resources/**/*.blade.php",
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php',
        './vendor/filament/**/*.blade.php'
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Roboto", "sans-serif"],
            },
            colors: {
                danger: colors.rose,
                primary: {
                    50: '#f5f9f4',
                    100: '#e5f3e5',
                    200: '#cce6cc',
                    300: '#99cc99',
                    400: '#74b474',
                    500: '#509750',
                    600: '#3e7b3e',
                    700: '#336234',
                    800: '#2c4f2c',
                    900: '#264127',
                    950: '#112212',
                },
                neutral: {
                    0: "#fffdff",
                    50: "#fff8f7",
                    100: "#ffedeb",
                    200: "#f4dddb",
                    300: "#d8c1c0",
                    350: "#bba6a5",
                    400: "#a08c8b",
                    450: "#857372",
                    500: "#6b5a59",
                    600: "#5f4f4d",
                    650: "#534342",
                    700: "#473837",
                    750: "#3b2d2c",
                    800: "#251918",
                    900: "#000000",
                },
            }
        },
    },
    plugins: [
        require('tailwind-scrollbar'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/typography')
    ],
    variants: {
        scrollbar: [],
    },
};
