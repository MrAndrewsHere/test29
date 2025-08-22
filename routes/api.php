<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CModelController;
use Illuminate\Support\Facades\Route;

Route::apiResource('brands', BrandController::class)->only('index');
Route::apiResource('models', CModelController::class)->only('index');
Route::apiResource('cars', CarController::class);
