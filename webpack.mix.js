const mix = require('laravel-mix'),
    WebpackRTLPlugin = require('webpack-rtl-plugin');

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
mix.js('resources/assets/js/dashboard.js', 'public/js')
    .sass('resources/assets/sass/dashboard.scss', 'public/css');

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');

// Handle rtl
mix.webpackConfig({
  plugins: [
    new WebpackRTLPlugin({
      diffOnly: false,
      minify: true,
    }),
  ],
});

mix.version([
    'public/js/*',
    'public/css/*',
]);

