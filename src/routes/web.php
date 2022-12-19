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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'verify' => true
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'userHome'])->name('home')->middleware(['auth', 'verified']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'userHome'])->name('home')->middleware(['auth', 'verified']);

Route::get('driver/home', [App\Http\Controllers\HomeController::class, 'driverHome'])->name('driver.home')->middleware("driverauth");


/*
    Email verfiication
 */
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('/profile', function () {
    // Only verified users may access this route...
})->middleware(['auth', 'verified']);

/*
    User address
*/
Route::prefix('home/address')->group(function () {
    /*
        Address operations
    */
    Route::get('/', [App\Http\Controllers\User\AddressController::class, 'index'])->name('address');
    Route::get('/add', [App\Http\Controllers\User\AddressController::class, 'add'])->name('addAddress'); 
    Route::post('/add', [App\Http\Controllers\User\AddressController::class, 'store'])->name('addAddress');
    Route::post('/delete/{id}', [App\Http\Controllers\User\AddressController::class, 'delete'])->name('deleteAddress')->where('id', '[0-9]+');;
    Route::get('/update/{id}', [App\Http\Controllers\User\AddressController::class, 'edit'])->name('editAddress')->where('id', '[0-9]+');;
    Route::post('/update/{id}', [App\Http\Controllers\User\AddressController::class, 'edit'])->name('editAddress')->where('id', '[0-9]+');;
})->middleware(['auth', 'verified']);

/*
    Profile Information
*/
Route::get('home/profile', [App\Http\Controllers\User\ProfileController::class, 'index'])->name('profile')->middleware(['auth', 'verified']);
Route::post('home/profile', [App\Http\Controllers\User\ProfileController::class, 'edit'])->name('profile')->middleware(['auth', 'verified']);

Route::prefix('home/order')->group(function () {
    /*
        Order operations
    */
    Route::get('/', [App\Http\Controllers\User\OrderController::class, 'index'])->name('order');
    Route::post('/', [App\Http\Controllers\User\OrderController::class, 'choosepackage'])->name('order');

    Route::get('/', [App\Http\Controllers\User\OrderController::class, 'currentorder'])->name('currentorder');
})->middleware(['auth', 'verified']);
