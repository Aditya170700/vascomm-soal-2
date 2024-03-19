<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
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
            Route::get('/login', 'login')->name('login');
            Route::post('/login', 'postLogin')->name('login.post');
        });
    });

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboards');
    Route::get('/users', [UserController::class, 'index'])->name('users');
});
