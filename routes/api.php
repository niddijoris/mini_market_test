<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CurrencyRateController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SellingPriceController;
use App\Http\Controllers\StockBalanceController;
use App\Http\Controllers\StockEntriesController;
use App\Http\Controllers\StockExitsController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\UnitController;
use App\Models\SellingPrice;
use App\Models\StockBalance;
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
Route::resource('suppliers', SuppliersController::class);
Route::resource('stock_entires', StockEntriesController::class);
Route::resource('stock_exits', StockExitsController::class);
Route::resource('selling_price', SellingPriceController::class);
Route::resource('stock_balance', StockBalanceController::class);
Route::resource('financial_control', FinancialController::class);








