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

mix.js([
	    'resources/js/app.js',
   	    'node_modules/datatables.net/js/jquery.dataTables.js',
        'node_modules/bootstrap//dist/js/bootstrap.js',
	    'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js',
        'vendor/unisharp/laravel-ckeditor/ckeditor.js',
        'node_modules/bootstrap-datepicker/js/bootstrap-datepicker.js',
   	], 'public/js/app.js')
	.styles([
        'public/css/app.css',
        'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
        'node_modules/@icon/themify-icons/themify-icons.css',
        'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css',
        'resources/asset/css/style.css',
        'resources/asset/css/customer.css',
    ], 'public/css/app.css');

mix.copy([
    'node_modules/@icon/themify-icons/themify-icons.eot',
    'node_modules/@icon/themify-icons/themify-icons.svg',
    'node_modules/@icon/themify-icons/themify-icons.ttf',
    'node_modules/@icon/themify-icons/themify-icons.woff',
    ], 'public/fonts');
