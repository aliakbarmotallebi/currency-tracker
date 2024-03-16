<?php

use App\Http\Controllers\Api\Transaction\AverageRatePerCurrencyController;
use App\Http\Controllers\Api\Currency\CurrenciesController;
use App\Http\Controllers\Api\Transaction\TransactionsController;
use App\Http\Controllers\Api\Transaction\TransactionStoreController;
use Illuminate\Support\Facades\Route;

Route::get('/currencies', CurrenciesController::class);

Route::get('/transactions', TransactionsController::class);

Route::get('/transactions/currency/{currency}', AverageRatePerCurrencyController::class);

Route::post('/transactions/store', TransactionStoreController::class);
