<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->resource('cars', CarController::class);
    $router->resource('users', UserController::class);
    $router->resource('orders', OrderController::class);
    $router->resource('licenses', LicenseController::class);
    $router->resource('packages', PackageController::class);
    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('laundries', LaundryController::class);
    $router->resource('deliveries', DeliveryController::class);
    $router->resource('order-statuses', OrderStatusController::class);
    $router->resource('laundry-types', LaundryTypeController::class);
    $router->resource('request-statuses', RequestStatusController::class);
    $router->resource('package-services', PackageServiceController::class);

});
