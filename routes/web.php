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

Route::get('/', function () {
    return view('welcome');
});

Route::group(
[
    'prefix' => 'cities',
], function () {

    Route::get('/', 'CitiesController@index')
         ->name('cities.city.index');

    Route::get('/create','CitiesController@create')
         ->name('cities.city.create');

    Route::get('/show/{city}','CitiesController@show')
         ->name('cities.city.show')
         ->where('id', '[0-9]+');

    Route::get('/{city}/edit','CitiesController@edit')
         ->name('cities.city.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'CitiesController@store')
         ->name('cities.city.store');
               
    Route::put('city/{city}', 'CitiesController@update')
         ->name('cities.city.update')
         ->where('id', '[0-9]+');

    Route::delete('/city/{city}','CitiesController@destroy')
         ->name('cities.city.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'counties',
], function () {

    Route::get('/', 'CountiesController@index')
         ->name('counties.county.index');

    Route::get('/create','CountiesController@create')
         ->name('counties.county.create');

    Route::get('/show/{county}','CountiesController@show')
         ->name('counties.county.show')
         ->where('id', '[0-9]+');

    Route::get('/{county}/edit','CountiesController@edit')
         ->name('counties.county.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'CountiesController@store')
         ->name('counties.county.store');
               
    Route::put('county/{county}', 'CountiesController@update')
         ->name('counties.county.update')
         ->where('id', '[0-9]+');

    Route::delete('/county/{county}','CountiesController@destroy')
         ->name('counties.county.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'identity_card_series',
], function () {

    Route::get('/', 'IdentityCardSeriesController@index')
         ->name('identity_card_series.identity_card_series.index');

    Route::get('/create','IdentityCardSeriesController@create')
         ->name('identity_card_series.identity_card_series.create');

    Route::get('/show/{identityCardSeries}','IdentityCardSeriesController@show')
         ->name('identity_card_series.identity_card_series.show')
         ->where('id', '[0-9]+');

    Route::get('/{identityCardSeries}/edit','IdentityCardSeriesController@edit')
         ->name('identity_card_series.identity_card_series.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'IdentityCardSeriesController@store')
         ->name('identity_card_series.identity_card_series.store');
               
    Route::put('identity_card_series/{identityCardSeries}', 'IdentityCardSeriesController@update')
         ->name('identity_card_series.identity_card_series.update')
         ->where('id', '[0-9]+');

    Route::delete('/identity_card_series/{identityCardSeries}','IdentityCardSeriesController@destroy')
         ->name('identity_card_series.identity_card_series.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'identity_card_types',
], function () {

    Route::get('/', 'IdentityCardTypesController@index')
         ->name('identity_card_types.identity_card_type.index');

    Route::get('/create','IdentityCardTypesController@create')
         ->name('identity_card_types.identity_card_type.create');

    Route::get('/show/{identityCardType}','IdentityCardTypesController@show')
         ->name('identity_card_types.identity_card_type.show')
         ->where('id', '[0-9]+');

    Route::get('/{identityCardType}/edit','IdentityCardTypesController@edit')
         ->name('identity_card_types.identity_card_type.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'IdentityCardTypesController@store')
         ->name('identity_card_types.identity_card_type.store');
               
    Route::put('identity_card_type/{identityCardType}', 'IdentityCardTypesController@update')
         ->name('identity_card_types.identity_card_type.update')
         ->where('id', '[0-9]+');

    Route::delete('/identity_card_type/{identityCardType}','IdentityCardTypesController@destroy')
         ->name('identity_card_types.identity_card_type.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'notification_types',
], function () {

    Route::get('/', 'NotificationTypesController@index')
         ->name('notification_types.notification_type.index');

    Route::get('/create','NotificationTypesController@create')
         ->name('notification_types.notification_type.create');

    Route::get('/show/{notificationType}','NotificationTypesController@show')
         ->name('notification_types.notification_type.show')
         ->where('id', '[0-9]+');

    Route::get('/{notificationType}/edit','NotificationTypesController@edit')
         ->name('notification_types.notification_type.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'NotificationTypesController@store')
         ->name('notification_types.notification_type.store');
               
    Route::put('notification_type/{notificationType}', 'NotificationTypesController@update')
         ->name('notification_types.notification_type.update')
         ->where('id', '[0-9]+');

    Route::delete('/notification_type/{notificationType}','NotificationTypesController@destroy')
         ->name('notification_types.notification_type.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'orders',
], function () {

    Route::get('/', 'OrdersController@index')
         ->name('orders.order.index');

    Route::get('/create','OrdersController@create')
         ->name('orders.order.create');

    Route::get('/show/{order}','OrdersController@show')
         ->name('orders.order.show')
         ->where('id', '[0-9]+');

    Route::get('/{order}/edit','OrdersController@edit')
         ->name('orders.order.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'OrdersController@store')
         ->name('orders.order.store');
               
    Route::put('order/{order}', 'OrdersController@update')
         ->name('orders.order.update')
         ->where('id', '[0-9]+');

    Route::delete('/order/{order}','OrdersController@destroy')
         ->name('orders.order.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'product_types',
], function () {

    Route::get('/', 'ProductTypesController@index')
         ->name('product_types.product_type.index');

    Route::get('/create','ProductTypesController@create')
         ->name('product_types.product_type.create');

    Route::get('/show/{productType}','ProductTypesController@show')
         ->name('product_types.product_type.show')
         ->where('id', '[0-9]+');

    Route::get('/{productType}/edit','ProductTypesController@edit')
         ->name('product_types.product_type.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'ProductTypesController@store')
         ->name('product_types.product_type.store');
               
    Route::put('product_type/{productType}', 'ProductTypesController@update')
         ->name('product_types.product_type.update')
         ->where('id', '[0-9]+');

    Route::delete('/product_type/{productType}','ProductTypesController@destroy')
         ->name('product_types.product_type.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'transports',
], function () {

    Route::get('/', 'TransportsController@index')
         ->name('transports.transport.index');

    Route::get('/create','TransportsController@create')
         ->name('transports.transport.create');

    Route::get('/show/{transport}','TransportsController@show')
         ->name('transports.transport.show')
         ->where('id', '[0-9]+');

    Route::get('/{transport}/edit','TransportsController@edit')
         ->name('transports.transport.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'TransportsController@store')
         ->name('transports.transport.store');
               
    Route::put('transport/{transport}', 'TransportsController@update')
         ->name('transports.transport.update')
         ->where('id', '[0-9]+');

    Route::delete('/transport/{transport}','TransportsController@destroy')
         ->name('transports.transport.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'user_notifications',
], function () {

    Route::get('/', 'UserNotificationsController@index')
         ->name('user_notifications.user_notification.index');

    Route::get('/create','UserNotificationsController@create')
         ->name('user_notifications.user_notification.create');

    Route::get('/show/{userNotification}','UserNotificationsController@show')
         ->name('user_notifications.user_notification.show')
         ->where('id', '[0-9]+');

    Route::get('/{userNotification}/edit','UserNotificationsController@edit')
         ->name('user_notifications.user_notification.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'UserNotificationsController@store')
         ->name('user_notifications.user_notification.store');
               
    Route::put('user_notification/{userNotification}', 'UserNotificationsController@update')
         ->name('user_notifications.user_notification.update')
         ->where('id', '[0-9]+');

    Route::delete('/user_notification/{userNotification}','UserNotificationsController@destroy')
         ->name('user_notifications.user_notification.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'users',
], function () {

    Route::get('/', 'UsersController@index')
         ->name('users.user.index');

    Route::get('/create','UsersController@create')
         ->name('users.user.create');

    Route::get('/show/{user}','UsersController@show')
         ->name('users.user.show')
         ->where('id', '[0-9]+');

    Route::get('/{user}/edit','UsersController@edit')
         ->name('users.user.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'UsersController@store')
         ->name('users.user.store');
               
    Route::put('user/{user}', 'UsersController@update')
         ->name('users.user.update')
         ->where('id', '[0-9]+');

    Route::delete('/user/{user}','UsersController@destroy')
         ->name('users.user.destroy')
         ->where('id', '[0-9]+');

});
