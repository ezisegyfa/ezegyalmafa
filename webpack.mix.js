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
	.js('resources/assets/js/jquery.redirect.js', 'public/js')
	.babel([
		'resources/assets/js/helperFunctions.js',
		'resources/assets/js/routeFunctions.js'
	], 'public/js/helperMethods.js')
	.sass('resources/assets/sass/app.scss', 'public/css')
	.copy('resources/assets/css/crm.css', 'public/css')
	.copy('resources/assets/css/webshop/layout.css', 'public/css/webshop')
	.copy('resources/assets/css/webshop/productList.css', 'public/css/webshop')
	.copy('resources/assets/js/webshop/productDetails.js', 'public/js/webshop')
	.copy('resources/assets/js/webshop/productList.js', 'public/js/webshop');
