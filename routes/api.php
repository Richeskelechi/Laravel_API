<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
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

// Protected Route like the post, update and delete route needs one to login first and be authenticated.
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', [ProductController::class, 'store']);

    Route::put('/product/{id?}', [ProductController::class, 'update']);

    Route::delete('/product/{id?}', [ProductController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
// Every Other route is a public route. That is anybody can access those routes 
Route::get('/products', [ProductController::class, 'index']);

Route::get('/product/{id?}', [ProductController::class, 'show']);

Route::get('/product/search/{name?}', [ProductController::class, 'search']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);