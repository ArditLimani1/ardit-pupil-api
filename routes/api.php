<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// General User Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected User Route
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Customer Specific Routes
Route::post('/customer-register', [CustomerController::class, 'registerCustomer']);
Route::post('/customer-login', [CustomerController::class, 'loginCustomer']);

// Package Routes
Route::get('/packages', [PackageController::class, 'index']);
Route::post('/register-package', [PackageController::class, 'registerPackage'])->middleware('auth:sanctum');

