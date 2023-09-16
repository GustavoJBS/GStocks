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
            colors: {
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
                }
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
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],
    variants: {
        scrollbar: [],
    },
};
