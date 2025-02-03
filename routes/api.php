<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CurrencyRateController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UnitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('units', UnitController::class);
Route::resource('products', ProductsController::class);
Route::resource('categories', CategoryController::class);
Route::resource('currencies', CurrencyController::class);
Route::resource('currencyRate', CurrencyRateController::class);


