let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css').version();

mix.js('resources/assets/js/product/review.js', 'public/js').version();

mix.js('resources/assets/js/product/product.js', 'public/js').version();


mix.scripts([
    'resources/assets/plugins/jclient-validation/jclient.validation.js',
    'resources/assets/plugins/waitsync/waitsync.min.js',
    'resources/assets/js/layout.js',

], 'public/js/all.js');
