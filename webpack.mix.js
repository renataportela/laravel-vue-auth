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
   .js('resources/assets/js/user/register.js', 'public/js/user/register.js')
   .js('resources/assets/js/user/login.js', 'public/js/user/login.js')
   .js('resources/assets/js/user/sendResetLink.js', 'public/js/user/sendResetLink.js')
   .js('resources/assets/js/user/resetPassword.js', 'public/js/user/resetPassword.js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .version();
