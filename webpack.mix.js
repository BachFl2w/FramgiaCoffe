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
	    'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js',
	    'node_modules/ckeditor/ckeditor.js',
	    'resources/asset/js/customer.js',
   	], 'public/js/app.js')
	.styles([
        'public/css/app.css',
        'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
        'node_modules/@icon/themify-icons/themify-icons.css',
        'resources/asset/css/style.css',
        'resources/asset/css/customer.css',
    ], 'public/css/app.css');

mix.copy([
    'node_modules/@icon/themify-icons/themify-icons.eot',
    'node_modules/@icon/themify-icons/themify-icons.svg',
    'node_modules/@icon/themify-icons/themify-icons.ttf',
    'node_modules/@icon/themify-icons/themify-icons.woff',
    ], 'public/fonts');
