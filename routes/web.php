<?php

use App\Http\Controllers\Dashboard\LinkController;
use App\Http\Controllers\Frontend\Auth\LogoutController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Payment\StripeController;
use App\Http\Controllers\Frontend\PricingController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\RedirectUrlController;
use App\Http\Controllers\Frontend\ShortUrlController;
use App\Http\Controllers\Frontend\SubscriptionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class)->name('home');

Route::post('/short/url', [ShortUrlController::class, 'store'])->name('short.url.store');

Route::prefix('dashboard')->name('user.')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');

    //Profile Route
    Route::resource('profile', ProfileController::class)->only(['index', 'update']);

    Route::resource('links', LinkController::class);


});

//Pricing
Route::get('pricing', [PricingController::class, 'index'])->name('pricing.index');

Route::get('pricing/{slug}/checkout', [SubscriptionController::class, 'index'])->middleware(['auth'])->name('pricing.checkout.index');

Route::post('pricing/{package}/checkout', [SubscriptionController::class, 'store'])->middleware(['auth'])->name('pricing.checkout.store');

//Checkout Payment
Route::post('checkout/stripe/token',[StripeController::class,'makeToken'])->name('checkout.stripe.token');

//Logout Route
Route::post('logout', LogoutController::class)->middleware(['auth'])->name('logout');

//Get Original From Shorted Url and Redirect
Route::get('{code}', RedirectUrlController::class)->name('redirect.url');

