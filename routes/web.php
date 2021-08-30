<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\RedirectUrlController;
use App\Http\Controllers\Frontend\ShortUrlController;
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

Route::get('/', HomeController::class);

Route::post('/short/url', [ShortUrlController::class, 'store'])->name('short.url.store');

Route::get('{code}', RedirectUrlController::class)->name('redirect.url');

