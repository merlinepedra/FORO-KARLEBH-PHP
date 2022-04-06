
const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {

  darkMode: 'class',
  
  mode: 'jit',

  purge: [                              
  './storage/framework/views/*.php',
  './resources/**/*.blade.php',
  './resources/**/*.js',
  './resources/**/**/*.vue',
  './config/*.php',
  ],  

  content: [
  './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  './storage/framework/views/*.php',
  './resources/views/**/*.blade.php',
  './resources/views/**/**/*.blade.php',
  './resources/views/**/**/*.vue',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Fraunces', 'Barlow', 'Nunito'],
      },
      colors: {
        ...colors,
        'yellow': colors.yellow,
        'midnight': 'rgb(23 25 35/1)',
      },
    },
  },

  plugins: [require('@tailwindcss/forms')],
};
