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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/menu', 'HomeController@showMenu')->name('menu');
    
});

Route::group(
[
    'prefix' => 'buyer_observations',
], function () {

    Route::get('/', 'BuyerObservationsController@index')
         ->name('buyer_observations.buyer_observation.index');

    Route::get('/getQuery', 'BuyerObservationsController@getQuery');     

    Route::get('/getByBuyerQuery/{buyer}', 'BuyerObservationsController@getByBuyerQuery');     

    Route::post('/filter', 'BuyerObservationsController@filter')
         ->name('buyer_observations.buyer_observation.index.filter');

    Route::get('/create','BuyerObservationsController@create')
         ->name('buyer_observations.buyer_observation.create');

    Route::get('/show/{buyerObservation}','BuyerObservationsController@show')
         ->name('buyer_observations.buyer_observation.show')
         ->where('id', '[0-9]+');

    Route::get('/{buyerObservation}/edit','BuyerObservationsController@edit')
         ->name('buyer_observations.buyer_observation.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'BuyerObservationsController@store')
         ->name('buyer_observations.buyer_observation.store');
               
    Route::put('/{buyerObservation}', 'BuyerObservationsController@update')
         ->name('buyer_observations.buyer_observation.update')
         ->where('id', '[0-9]+');

    Route::delete('/{buyerObservation}','BuyerObservationsController@destroy')
         ->name('buyer_observations.buyer_observation.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'buyers',
], function () {

    Route::get('/', 'BuyersController@index')
         ->name('buyers.buyer.index');

    Route::get('/getQuery', 'BuyersController@getQuery');     

    Route::post('/filter', 'BuyersController@filter')
         ->name('buyers.buyer.index.filter');

    Route::get('/create','BuyersController@create')
         ->name('buyers.buyer.create');

    Route::get('/show/{buyer}','BuyersController@show')
         ->name('buyers.buyer.show')
         ->where('id', '[0-9]+');

    Route::get('/{buyer}/edit','BuyersController@edit')
         ->name('buyers.buyer.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'BuyersController@store')
         ->name('buyers.buyer.store');
               
    Route::put('/{buyer}', 'BuyersController@update')
         ->name('buyers.buyer.update')
         ->where('id', '[0-9]+');

    Route::delete('/{buyer}','BuyersController@destroy')
         ->name('buyers.buyer.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'car_types',
], function () {

    Route::get('/', 'CarTypesController@index')
         ->name('car_types.car_type.index');

    Route::get('/getQuery', 'CarTypesController@getQuery');     

    Route::post('/filter', 'CarTypesController@filter')
         ->name('car_types.car_type.index.filter');

    Route::get('/create','CarTypesController@create')
         ->name('car_types.car_type.create');

    Route::get('/show/{carType}','CarTypesController@show')
         ->name('car_types.car_type.show')
         ->where('id', '[0-9]+');

    Route::get('/{carType}/edit','CarTypesController@edit')
         ->name('car_types.car_type.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'CarTypesController@store')
         ->name('car_types.car_type.store');
               
    Route::put('/{carType}', 'CarTypesController@update')
         ->name('car_types.car_type.update')
         ->where('id', '[0-9]+');

    Route::delete('/{carType}','CarTypesController@destroy')
         ->name('car_types.car_type.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'cars',
], function () {

    Route::get('/', 'CarsController@index')
         ->name('cars.car.index');

    Route::get('/getQuery', 'CarsController@getQuery');     

    Route::get('/getByDriverQuery/{driver}', 'CarsController@getByDriverQuery');  

    Route::post('/filter', 'CarsController@filter')
         ->name('cars.car.index.filter');

    Route::get('/create','CarsController@create')
         ->name('cars.car.create');

    Route::get('/show/{car}','CarsController@show')
         ->name('cars.car.show')
         ->where('id', '[0-9]+');

    Route::get('/{car}/edit','CarsController@edit')
         ->name('cars.car.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'CarsController@store')
         ->name('cars.car.store');
               
    Route::put('/{car}', 'CarsController@update')
         ->name('cars.car.update')
         ->where('id', '[0-9]+');

    Route::delete('/{car}','CarsController@destroy')
         ->name('cars.car.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'driver_cars',
], function () {

    Route::get('/', 'DriverCarsController@index')
         ->name('driver_cars.driver_car.index');

    Route::get('/getQuery', 'DriverCarsController@getQuery');     

    Route::post('/filter', 'DriverCarsController@filter')
         ->name('driver_cars.driver_car.index.filter');

    Route::get('/create','DriverCarsController@create')
         ->name('driver_cars.driver_car.create');

    Route::get('/show/{driverCar}','DriverCarsController@show')
         ->name('driver_cars.driver_car.show')
         ->where('id', '[0-9]+');

    Route::get('/{driverCar}/edit','DriverCarsController@edit')
         ->name('driver_cars.driver_car.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'DriverCarsController@store')
         ->name('driver_cars.driver_car.store');
               
    Route::put('/{driverCar}', 'DriverCarsController@update')
         ->name('driver_cars.driver_car.update')
         ->where('id', '[0-9]+');

    Route::delete('/{driverCar}','DriverCarsController@destroy')
         ->name('driver_cars.driver_car.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'drivers',
], function () {

    Route::get('/', 'DriversController@index')
         ->name('drivers.driver.index');

    Route::get('/getQuery', 'DriversController@getQuery');     

    Route::post('/filter', 'DriversController@filter')
         ->name('drivers.driver.index.filter');

    Route::get('/create','DriversController@create')
         ->name('drivers.driver.create');

    Route::get('/show/{driver}','DriversController@show')
         ->name('drivers.driver.show')
         ->where('id', '[0-9]+');

    Route::get('/{driver}/edit','DriversController@edit')
         ->name('drivers.driver.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'DriversController@store')
         ->name('drivers.driver.store');
               
    Route::put('/{driver}', 'DriversController@update')
         ->name('drivers.driver.update')
         ->where('id', '[0-9]+');

    Route::delete('/{driver}','DriversController@destroy')
         ->name('drivers.driver.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'identity_card_series',
], function () {

    Route::get('/', 'IdentityCardSeriesController@index')
         ->name('identity_card_series.identity_card_series.index');

    Route::get('/getQuery', 'IdentityCardSeriesController@getQuery');     

    Route::post('/filter', 'IdentityCardSeriesController@filter')
         ->name('identity_card_series.identity_card_series.index.filter');

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
               
    Route::put('/{identityCardSeries}', 'IdentityCardSeriesController@update')
         ->name('identity_card_series.identity_card_series.update')
         ->where('id', '[0-9]+');

    Route::delete('/{identityCardSeries}','IdentityCardSeriesController@destroy')
         ->name('identity_card_series.identity_card_series.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'identity_card_types',
], function () {

    Route::get('/', 'IdentityCardTypesController@index')
         ->name('identity_card_types.identity_card_type.index');

    Route::get('/getQuery', 'IdentityCardTypesController@getQuery');     

    Route::post('/filter', 'IdentityCardTypesController@filter')
         ->name('identity_card_types.identity_card_type.index.filter');

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
               
    Route::put('/{identityCardType}', 'IdentityCardTypesController@update')
         ->name('identity_card_types.identity_card_type.update')
         ->where('id', '[0-9]+');

    Route::delete('/{identityCardType}','IdentityCardTypesController@destroy')
         ->name('identity_card_types.identity_card_type.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'material_types',
], function () {

    Route::get('/', 'MaterialTypesController@index')
         ->name('material_types.material_type.index');

    Route::get('/getQuery', 'MaterialTypesController@getQuery');     

    Route::post('/filter', 'MaterialTypesController@filter')
         ->name('material_types.material_type.index.filter');

    Route::get('/create','MaterialTypesController@create')
         ->name('material_types.material_type.create');

    Route::get('/show/{materialType}','MaterialTypesController@show')
         ->name('material_types.material_type.show')
         ->where('id', '[0-9]+');

    Route::get('/{materialType}/edit','MaterialTypesController@edit')
         ->name('material_types.material_type.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'MaterialTypesController@store')
         ->name('material_types.material_type.store');
               
    Route::put('/{materialType}', 'MaterialTypesController@update')
         ->name('material_types.material_type.update')
         ->where('id', '[0-9]+');

    Route::delete('/{materialType}','MaterialTypesController@destroy')
         ->name('material_types.material_type.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'notification_types',
], function () {

    Route::get('/', 'NotificationTypesController@index')
         ->name('notification_types.notification_type.index');

    Route::get('/getQuery', 'NotificationTypesController@getQuery');     

    Route::post('/filter', 'NotificationTypesController@filter')
         ->name('notification_types.notification_type.index.filter');

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
               
    Route::put('/{notificationType}', 'NotificationTypesController@update')
         ->name('notification_types.notification_type.update')
         ->where('id', '[0-9]+');

    Route::delete('/{notificationType}','NotificationTypesController@destroy')
         ->name('notification_types.notification_type.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'observation_types',
], function () {

    Route::get('/', 'ObservationTypesController@index')
         ->name('observation_types.observation_type.index');

    Route::get('/getQuery', 'ObservationTypesController@getQuery');     

    Route::post('/filter', 'ObservationTypesController@filter')
         ->name('observation_types.observation_type.index.filter');

    Route::get('/create','ObservationTypesController@create')
         ->name('observation_types.observation_type.create');

    Route::get('/show/{observationType}','ObservationTypesController@show')
         ->name('observation_types.observation_type.show')
         ->where('id', '[0-9]+');

    Route::get('/{observationType}/edit','ObservationTypesController@edit')
         ->name('observation_types.observation_type.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'ObservationTypesController@store')
         ->name('observation_types.observation_type.store');
               
    Route::put('/{observationType}', 'ObservationTypesController@update')
         ->name('observation_types.observation_type.update')
         ->where('id', '[0-9]+');

    Route::delete('/{observationType}','ObservationTypesController@destroy')
         ->name('observation_types.observation_type.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'orders',
], function () {

    Route::get('/', 'OrdersController@index')
         ->name('orders.order.index');

    Route::get('/getQuery', 'OrdersController@getQuery');  

    Route::get('/getUncomplitedQuery', 'OrdersController@getUncomplitedQuery');  

    Route::get('/getByBuyerQuery/{buyer}', 'OrdersController@getByBuyerQuery');   

    Route::post('/filter', 'OrdersController@filter')
         ->name('orders.order.index.filter');

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
               
    Route::put('/{order}', 'OrdersController@update')
         ->name('orders.order.update')
         ->where('id', '[0-9]+');

    Route::delete('/{order}','OrdersController@destroy')
         ->name('orders.order.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'process_types',
], function () {

    Route::get('/', 'ProcessTypesController@index')
         ->name('process_types.process_type.index');

    Route::get('/getQuery', 'ProcessTypesController@getQuery');     

    Route::post('/filter', 'ProcessTypesController@filter')
         ->name('process_types.process_type.index.filter');

    Route::get('/create','ProcessTypesController@create')
         ->name('process_types.process_type.create');

    Route::get('/show/{processType}','ProcessTypesController@show')
         ->name('process_types.process_type.show')
         ->where('id', '[0-9]+');

    Route::get('/{processType}/edit','ProcessTypesController@edit')
         ->name('process_types.process_type.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'ProcessTypesController@store')
         ->name('process_types.process_type.store');
               
    Route::put('/{processType}', 'ProcessTypesController@update')
         ->name('process_types.process_type.update')
         ->where('id', '[0-9]+');

    Route::delete('/{processType}','ProcessTypesController@destroy')
         ->name('process_types.process_type.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'product_types',
], function () {

    Route::get('/', 'ProductTypesController@index')
         ->name('product_types.product_type.index');

    Route::get('/getQuery', 'ProductTypesController@getQuery');     

    Route::post('/filter', 'ProductTypesController@filter')
         ->name('product_types.product_type.index.filter');

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
               
    Route::put('/{productType}', 'ProductTypesController@update')
         ->name('product_types.product_type.update')
         ->where('id', '[0-9]+');

    Route::delete('/{productType}','ProductTypesController@destroy')
         ->name('product_types.product_type.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'regions',
], function () {

    Route::get('/', 'RegionsController@index')
         ->name('regions.region.index');

    Route::get('/getQuery', 'RegionsController@getQuery');     

    Route::post('/filter', 'RegionsController@filter')
         ->name('regions.region.index.filter');

    Route::get('/create','RegionsController@create')
         ->name('regions.region.create');

    Route::get('/show/{region}','RegionsController@show')
         ->name('regions.region.show')
         ->where('id', '[0-9]+');

    Route::get('/{region}/edit','RegionsController@edit')
         ->name('regions.region.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'RegionsController@store')
         ->name('regions.region.store');
               
    Route::put('/{region}', 'RegionsController@update')
         ->name('regions.region.update')
         ->where('id', '[0-9]+');

    Route::delete('/{region}','RegionsController@destroy')
         ->name('regions.region.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'settlements',
], function () {

    Route::get('/', 'SettlementsController@index')
         ->name('settlements.settlement.index');

    Route::get('/getQuery', 'SettlementsController@getQuery');     

    Route::post('/filter', 'SettlementsController@filter')
         ->name('settlements.settlement.index.filter');

    Route::get('/create','SettlementsController@create')
         ->name('settlements.settlement.create');

    Route::get('/show/{settlement}','SettlementsController@show')
         ->name('settlements.settlement.show')
         ->where('id', '[0-9]+');

    Route::get('/{settlement}/edit','SettlementsController@edit')
         ->name('settlements.settlement.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'SettlementsController@store')
         ->name('settlements.settlement.store');
               
    Route::put('/{settlement}', 'SettlementsController@update')
         ->name('settlements.settlement.update')
         ->where('id', '[0-9]+');

    Route::delete('/{settlement}','SettlementsController@destroy')
         ->name('settlements.settlement.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'stock_transports',
], function () {

    Route::get('/', 'StockTransportsController@index')
         ->name('stock_transports.stock_transport.index');

    Route::get('/getQuery', 'StockTransportsController@getQuery');     

    Route::post('/filter', 'StockTransportsController@filter')
         ->name('stock_transports.stock_transport.index.filter');

    Route::get('/create','StockTransportsController@create')
         ->name('stock_transports.stock_transport.create');

    Route::get('/show/{stockTransport}','StockTransportsController@show')
         ->name('stock_transports.stock_transport.show')
         ->where('id', '[0-9]+');

    Route::get('/{stockTransport}/edit','StockTransportsController@edit')
         ->name('stock_transports.stock_transport.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'StockTransportsController@store')
         ->name('stock_transports.stock_transport.store');
               
    Route::put('/{stockTransport}', 'StockTransportsController@update')
         ->name('stock_transports.stock_transport.update')
         ->where('id', '[0-9]+');

    Route::delete('/{stockTransport}','StockTransportsController@destroy')
         ->name('stock_transports.stock_transport.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'transports',
], function () {

    Route::get('/', 'TransportsController@index')
         ->name('transports.transport.index');

    Route::get('/getQuery', 'TransportsController@getQuery');  

    Route::get('/getByDriverQuery/{driver}', 'TransportsController@getByDriverQuery');

    Route::post('/filter', 'TransportsController@filter')
         ->name('transports.transport.index.filter');

    Route::get('/create','TransportsController@create')
         ->name('transports.transport.create');

    Route::get('/createByOrder/{order}','TransportsController@createByOrder'); 

    Route::get('/show/{transport}','TransportsController@show')
         ->name('transports.transport.show')
         ->where('id', '[0-9]+');

    Route::get('/{transport}/edit','TransportsController@edit')
         ->name('transports.transport.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'TransportsController@store')
         ->name('transports.transport.store');
               
    Route::put('/{transport}', 'TransportsController@update')
         ->name('transports.transport.update')
         ->where('id', '[0-9]+');

    Route::delete('/{transport}','TransportsController@destroy')
         ->name('transports.transport.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'users',
], function () {

    Route::get('/', 'UsersController@index')
         ->name('users.user.index');

    Route::get('/getQuery', 'UsersController@getQuery');     

    Route::post('/filter', 'UsersController@filter')
         ->name('users.user.index.filter');

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
               
    Route::put('/{user}', 'UsersController@update')
         ->name('users.user.update')
         ->where('id', '[0-9]+');

    Route::delete('/{user}','UsersController@destroy')
         ->name('users.user.destroy')
         ->where('id', '[0-9]+');

});
