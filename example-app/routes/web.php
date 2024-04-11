<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\NewBookController;
use App\Http\Controllers\VanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/van', [VanController::class, 'index'])->name('van');
    Route::get('/van/view/{id}', [VanController::class, 'show'])->name('van.show');

    //Booking
    Route::post('/van/view/{id}', [BookController::class, 'store'])->name('rent');

    Route::get('/my-request', [BookController::class, 'myRequest'])->name('my-request');
    Route::get('my-request/{id}', [BookController::class, 'edit'])->name('edit');
    Route::put('my-request/{id}', [BookController::class, 'update'])->name('update');
    Route::delete('/my-request/delete/{id}', [BookController::class, 'destroy'])->name('my-request.delete');

    Route::get('/request-status', [BookController::class, 'requestVan'])->name('request-status');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.auth');
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('/signup', [AuthController::class, 'createUser'])->name('signup.store');
});

Route::group(['middleware' => ['admin', 'auth']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit.van');
    Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update.van');
    Route::post('/admin/create-van', [AdminController::class, 'store'])->name('admin.store.van');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete.van');
    Route::get('/admin/all-vans', [AdminController::class, 'allVans'])->name('admin.all-vans');
    Route::get('/admin/on-going', [AdminController::class, 'onGoing'])->name('admin.on-going');
    Route::put('/admin/on-going/{id}', [AdminController::class, 'done'])->name('admin.done');

    Route::put('admin/accept/{id}', [AdminController::class, 'accept'])->name('accept');
    Route::put('admin/reject/{id}', [AdminController::class, 'reject'])->name('reject');
});
