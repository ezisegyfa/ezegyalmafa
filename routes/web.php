<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Crm\CrmController;

Auth::routes();

Route::get('admin/login', 'Auth\LoginController@showAdminLoginForm');
Route::get('user/login', 'Auth\LoginController@showUserLoginForm');
Route::get('user/register', 'Auth\RegisterController@showUserRegistrationForm');
Route::get('user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::post('admin/login', 'Auth\LoginController@adminLogin');
Route::post('admin/logout', 'Auth\LoginController@adminLogout');
Route::post('user/login', 'Auth\LoginController@userLogin');
Route::post('user/register', 'Auth\RegisterController@createUser');
Route::post('user/logout', 'Auth\LoginController@userLogout');

Route::group(['namespace' => 'Webshop'], function($route) {
	Route::get('/', 'HomeController@index')
    	->name('welocme');
	Route::get('termsAndConditions', 'HomeController@showTermsAndConditions');
	Route::get('privateDataProtectionDescription', 'HomeController@showPrivateDataProtectionDescription');
	Route::get('products/{productType}', 'HomeController@showProductDetails');
});

Route::get('setup', 'SetupController@setup');
Route::middleware(['auth:user'])->group(function () {
    Route::post('webshop/order_infos/store', 'OutputOrderController@webshopStore');
	Route::get('user/edit', 'UserController@showEditUserForm')->name('profile');
	Route::post('user/edit', 'UserController@updateProfile');
});
Route::get('webshop/regions/{regionId}/locations', 'RegionController@getLocations');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin', 'MenuController@showMenu')->name('menu');

    CrmController::initializeRoutes();
});
Route::get('/catalog', 'HomeController@downloadCatalogPdf');
