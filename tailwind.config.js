
const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {

  darkMode: 'class',
  
  mode: 'jit',

  purge: [                              
  './storage/framework/views/*.php',
  './resources/**/*.blade.php',
  './resources/**/*.js',
  './config/*.php',
  ],  

  content: [
  './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  './storage/framework/views/*.php',
  './resources/views/**/*.blade.php',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Fraunces', 'Barlow', 'Nunito'],
      },
      colors: {
        ...colors
      },
    },
  },

  plugins: [require('@tailwindcss/forms')],
};
