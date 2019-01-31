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

Route::get('/termsAndConditions', 'HomeController@showTermsAndConditions');
Route::get('/privateDataProtectionDescription', 'HomeController@showPrivateDataProtectionDescription');

Route::get('/', 'HomeController@index')
    ->name('welocme');
Route::get('orders/createWithBuyer/{productType}','OrderController@createWithBuyer')
 ->name('orders.order.createWithBuyer');
Route::post('orders/storeWithBuyer','OrderController@storeWithBuyer')
     ->name('orders.order.storeWithBuyer');

Route::middleware(['auth'])->group(function () {
    Route::get('/menu', 'HomeController@showMenu')->name('menu');

    CrmController::initializeRoutes();
});
