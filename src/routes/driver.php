<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


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



// Driver routes
Route::get('driver/home', [App\Http\Controllers\HomeController::class, 'driverHome'])->name('driverHome')->middleware(['auth', 'verified', 'driverauth']);
Route::post('ajax', [App\Http\Controllers\HomeController::class, 'tryAjax'])->name('ajax');
Route::prefix('driver/car')->group(function () {
    /*
        car operations
    */
    Route::get('/', [App\Http\Controllers\Driver\CarController::class, 'index'])->name('cars');
    Route::get('/add', [App\Http\Controllers\Driver\CarController::class, 'add'])->name('addCar');
    Route::post('/add', [App\Http\Controllers\Driver\CarController::class, 'store'])->name('addCar');
    Route::post('/delete/{id}', [App\Http\Controllers\Driver\CarController::class, 'delete'])->name('deleteCar')->where('id', '[0-9]+');
    Route::post('/updateCarUse', [App\Http\Controllers\Driver\CarController::class, 'updateCarUse'])->name('updateCarUse');

})->middleware(['auth', 'verified', 'driverauth']);

Route::prefix('driver/licenses')->group(function () {
    /*
        license operations
    */
    Route::get('/', [App\Http\Controllers\Driver\LicenseController::class, 'index'])->name('licenses');
    Route::get('/add', [App\Http\Controllers\Driver\LicenseController::class, 'add'])->name('addLicense')->middleware('canAddLicense');
    Route::post('/add', [App\Http\Controllers\Driver\LicenseController::class, 'store'])->name('addLicense')->middleware('canAddLicense');
    Route::post('/delete/{id}', [App\Http\Controllers\Driver\LicenseController::class, 'delete'])->name('deleteLicense')->where('id', '[0-9]+');
})->middleware(['auth', 'verified', 'driverauth']);

Route::prefix('driver/order')->group(function () {
    /*
        request operations
    */
    Route::get('/new', [App\Http\Controllers\Driver\OrderController::class, 'newRequest'])->name('newRequest');
    Route::get('/current', [App\Http\Controllers\Driver\OrderController::class, 'currentOrder'])->name('currentOrder');
    Route::get('/history', [App\Http\Controllers\Driver\OrderController::class, 'history'])->name('history');
    Route::get('/tracker', [App\Http\Controllers\Driver\OrderController::class, 'tracker'])->name('tracker');
    Route::post('/addTracker', [App\Http\Controllers\Driver\OrderController::class, 'addTracker'])->name('postTracker');
    Route::get('/detail/{id}', [App\Http\Controllers\Driver\OrderController::class, 'requestDetail'])->name('requestDetail')->where('id', '[0-9]+');
    Route::get('/laundry/{id}', [App\Http\Controllers\Driver\OrderController::class, 'viewLaundry'])->name('viewLaundry')->where('id', '[0-9]+');
    Route::post('/track-order', [App\Http\Controllers\Driver\OrderController::class, 'trackOrder'])->name('track-order');
    Route::post('/updateOrderStatus', [App\Http\Controllers\Driver\OrderController::class, 'updateOrderStatus'])->name('updateOrderStatus');
    Route::get('/track-order/{id}', [App\Http\Controllers\Driver\OrderController::class, 'trackOrder'])->name('track-order-view')->where('id', '[0-9]+');
    Route::post('/live-location', [App\Http\Controllers\Driver\OrderController::class, 'activateLiveLocation'])->name('live-location');
    

    
})->middleware(['auth', 'verified', 'driverauth']);
