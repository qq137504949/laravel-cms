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
    .js('resources/assets/utils/utils.js','public/js/utils')
    .js('resources/assets/utils/store.js','public/js/utils')
   .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/reset.scss', 'public/css')
    .sass('resources/assets/sass/mixin.scss', 'public/css')
    .sass('resources/assets/sass/const.scss', 'public/css')
    .sass('resources/assets/sass/iconfont.scss', 'public/css');
// mix.copy('resources/assets/fonts','public/css/fonts');
