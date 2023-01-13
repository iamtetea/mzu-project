<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubscriptionController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegistrationController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/admin', [HomeController::class, 'dashboard']);

    Route::prefix('admin')->group(function () {
        Route::get('events/new', [EventsController::class, 'create']);
        Route::get('events/search', [EventsController::class, 'index']);
        Route::get('categories/new', [CategoryController::class, 'create']);
        Route::get('subscriptions/new', [SubscriptionController::class, 'create']);

        Route::resources([
            'events' => EventsController::class,
            'categories' => CategoryController::class,
            'subscriptions' => SubscriptionController::class,
        ]);
    });
});
