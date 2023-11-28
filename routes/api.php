<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SensoresController;

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
Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::post('/sensorReport', [SensoresController::class, 'insertValues'])->name('api.sensor.insertValues');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
//        Route::post('/sensorReport', [SensoresController::class, 'insertValues'])->name('api.sensor.insertValues');
    });
