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

mix.js('resources/assets/js/loader.js', 'public/js').version();

mix.js('resources/assets/js/product/review.js', 'public/js').version();

mix.js('resources/assets/js/product/product.js', 'public/js').version();

mix.js('resources/assets/js/product/similar-products.js', 'public/js').version();

mix.js('resources/assets/js/cart/small-cart.js', 'public/js').version();

mix.js('resources/assets/js/cart/big-cart.js', 'public/js').version();

mix.js('resources/assets/js/home/new-slider.js', 'public/js').version();

mix.js('resources/assets/js/home/sales-slider.js', 'public/js').version();

mix.js('resources/assets/js/home/top-slider.js', 'public/js').version();

mix.js('resources/assets/js/search/search.js', 'public/js').version();

mix.js('resources/assets/js/product-grid/product-grid.js', 'public/js').version();


mix.scripts([
    'resources/assets/plugins/jclient-validation/jclient.validation.js',
    'resources/assets/plugins/waitsync/waitsync.min.js',
    'resources/assets/js/layout.js',

], 'public/js/all.js');
