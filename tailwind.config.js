const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Fraunces', 'Barlow', 'Nunito', ...defaultTheme.fontFamily.sans],
            },
            //     screens: {
            //   'sm': '576px',
            //   'md': '960px',
            //   'lg': '1440px',
            // },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
