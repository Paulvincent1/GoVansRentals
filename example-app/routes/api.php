<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\VanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/vans', [VanController::class, 'index']);
    Route::get('/vans/view/{id}', [VanController::class, 'show']);

    //booking
    Route::post('/vans/view/{id}', [BookController::class, 'store']);
    Route::get('/my-request', [BookController::class, 'myRequest']);
    Route::get('/my-request/{id}', [BookController::class, 'edit']);
    Route::put('/my-request/{id}', [BookController::class, 'update']);
    Route::delete('/my-request/delete/{id}', [BookController::class, 'destroy']);

    Route::get('/request-status', [BookController::class, 'requestVan']);

    Route::get('/users/current',[AuthController::class, 'currentUsers']);
});

//public routes
Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);
