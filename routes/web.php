<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\DAshboard\ProductController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::controller(AuthController::class)
    ->middleware('guest')
    ->group(function () {
        Route::group(['prefix' => 'login'], function () {
            Route::get('/', 'login')->name('login');
            Route::post('/', 'postLogin')->name('login.post');
        });
        Route::group(['prefix' => 'register'], function () {
            Route::get('/', 'register')->name('register');
            Route::post('/', 'postRegister')->name('register.post');
        });
    });

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboards');

    Route::controller(UserController::class)
        ->prefix('/users')
        ->name('users')
        ->group(function () {
            Route::get('/', 'index');
            Route::put('/{id}/approve', 'approve')->name('.approve');
        });

    Route::controller(ProductController::class)
        ->prefix('/products')
        ->name('products')
        ->group(function () {
            Route::get('/', 'index');
            Route::post('/', 'store')->name('.store');
            Route::put('/{id}/update', 'update')->name('.update');
            Route::delete('/{id}', 'destroy')->name('.destroy');
        });
});
