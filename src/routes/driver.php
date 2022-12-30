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
    Route::get('/detail/{id}', [App\Http\Controllers\Driver\OrderController::class, 'requestDetail'])->name('requestDetail')->where('id', '[0-9]+');
})->middleware(['auth', 'verified', 'driverauth']);
