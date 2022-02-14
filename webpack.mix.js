const mix = require('laravel-mix');


mix
.js('resources/js/app.js', 'public/js').vue()
.js('resources/js/extra.js', 'public/js')
.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
])
.css('resources/css/extra.css', 'public/css/app.css')
.browserSync('jet.test')
