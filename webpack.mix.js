const mix = require('laravel-mix');

// Mix Asset Management

mix.js('resources/js/app.js', 'public/build/js')
    .sass('resources/sass/app.scss', 'public/build/css')
    .sourceMaps();
