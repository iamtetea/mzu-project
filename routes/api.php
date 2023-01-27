<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('events', [HomeController::class, 'getEventsApi']);
Route::post('categories', [HomeController::class, 'storeCategory']);
Route::post('/categories/{id}', [HomeController::class, 'updateCategory']);
Route::delete('/categories/{id}', [HomeController::class, 'deleteCategory']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
