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

mix.sass('resources/assets/sass/app.scss', 'public/css')
	.js('resources/assets/js/app.js', 'public/js')

	//Helpers
	.copy('resources/assets/css/crm/layout.css', 'public/css/crm')
	.copy('resources/assets/css/crm/sidebar.css', 'public/css/crm')
	.copy('resources/assets/css/components.css', 'public/css')
	.js('resources/assets/js/jquery.redirect.js', 'public/js')
	.babel([
		'resources/assets/js/helperFunctions.js',
		'resources/assets/js/routeFunctions.js'
	], 'public/js/helperMethods.js')

	//Webshop
	.copy('resources/assets/css/webshop/layout.css', 'public/css/webshop')
	.copy('resources/assets/css/webshop/header.css', 'public/css/webshop')
	.copy('resources/assets/css/webshop/login.css', 'public/css/webshop')
	.copy('resources/assets/css/webshop/productList.css', 'public/css/webshop')
	.copy('resources/assets/css/webshop/productDetails.css', 'public/css/webshop')

	.copy('resources/assets/js/webshop/location.js', 'public/js/webshop')
	.copy('resources/assets/js/webshop/layout.js', 'public/js/webshop')
	.copy('resources/assets/js/webshop/header.js', 'public/js/webshop')
	.copy('resources/assets/js/webshop/productList.js', 'public/js/webshop')
	.copy('resources/assets/js/webshop/productDetails.js', 'public/js/webshop');
