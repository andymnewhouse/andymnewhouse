const mix = require('laravel-mix');

mix.js('resources/js/site.js', 'public/js')

mix.postCss('resources/css/tailwind.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('postcss-nested'),
])

if (mix.inProduction()) {
   mix.version();
}
