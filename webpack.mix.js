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

mix.sass('resources/sass/app.scss', 'public/css');

// mix.js([
//         'resources/js/app.js',
//         'node_modules/datatables.net/js/jquery.dataTables.js',
//         'node_modules/bootstrap//dist/js/bootstrap.js',
//         'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js',
//     ], 'public/js/app.js')
//     .styles([
//         'public/css/app.css',
//         'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
//         'resources/asset/css/admin.css',
//     ], 'public/css/admin_style.css')
//     .styles([
//         'public/css/app.css',
//         'node_modules/simple-line-icons/css/simple-line-icons.css',
//     ], 'public/css/client_style.css')
//     .copyDirectory([
//         'node_modules/simple-line-icons/fonts/'
//     ], 'public/fonts/');

//Mix client
mix.js([
    'resources/js/app.js',
    'resources/asset/client/js/revslider.js',
    'resources/asset/client/js/common.js',
], 'public/js/app_client.js');

mix.js([
       'resources/asset/js/sweetalert.min.js'
], 'public/js/sweetalert.min.js');

