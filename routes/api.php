<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BienController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\PaiementController;


Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::apiResource('biens',  BienController::class);
    Route::apiResource('artisans', ArtisanController::class)->only(['index','store']);
    Route::apiResource('devis',   DevisController::class)->only(['index','store']);
    Route::apiResource('paiements', PaiementController::class)->only(['store']);
});

