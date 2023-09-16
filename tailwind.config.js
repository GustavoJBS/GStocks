/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php'
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Roboto", "sans-serif"],
            },
        },
    },
    plugins: [
        require('tailwind-scrollbar'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/typography')
    ],
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],
    variants: {
        scrollbar: [],
    },
};
