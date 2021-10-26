<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('clients', ClientController::class);
        Route::resource('vehicles', VehicleController::class);
        Route::resource('pieces', PieceController::class);
        Route::resource('users', UserController::class);
    });
