<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PieceController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\VehicleController;
use App\Http\Controllers\Api\VehiclePiecesController;
use App\Http\Controllers\Api\PieceVehiclesController;
use App\Http\Controllers\Api\ClientVehiclesController;

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

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('clients', ClientController::class);

        // Client Vehicles
        Route::get('/clients/{client}/vehicles', [
            ClientVehiclesController::class,
            'index',
        ])->name('clients.vehicles.index');
        Route::post('/clients/{client}/vehicles', [
            ClientVehiclesController::class,
            'store',
        ])->name('clients.vehicles.store');

        Route::apiResource('vehicles', VehicleController::class);

        // Vehicle Piecies
        Route::get('/vehicles/{vehicle}/pieces', [
            VehiclePiecesController::class,
            'index',
        ])->name('vehicles.pieces.index');
        Route::post('/vehicles/{vehicle}/pieces/{piece}', [
            VehiclePiecesController::class,
            'store',
        ])->name('vehicles.pieces.store');
        Route::delete('/vehicles/{vehicle}/pieces/{piece}', [
            VehiclePiecesController::class,
            'destroy',
        ])->name('vehicles.pieces.destroy');

        Route::apiResource('pieces', PieceController::class);

        // Piece Vehicles
        Route::get('/pieces/{piece}/vehicles', [
            PieceVehiclesController::class,
            'index',
        ])->name('pieces.vehicles.index');
        Route::post('/pieces/{piece}/vehicles/{vehicle}', [
            PieceVehiclesController::class,
            'store',
        ])->name('pieces.vehicles.store');
        Route::delete('/pieces/{piece}/vehicles/{vehicle}', [
            PieceVehiclesController::class,
            'destroy',
        ])->name('pieces.vehicles.destroy');

        Route::apiResource('users', UserController::class);
    });
