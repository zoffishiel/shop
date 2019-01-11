const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

// Profile Styling
mix.sass('resources/sass/profile.scss', 'public/css');

// Dashboard Styling
mix.js('resources/js/dashboard.js', 'public/js')
  .sass('resources/sass/dashboard.scss', 'public/css');

// Chart js
mix.js('node_modules/chart.js/dist/Chart.bundle.min.js', 'public/js');

// users table
mix.js('resources/js/users.js', 'public/js');

mix.browserSync('127.0.0.1:8000');
