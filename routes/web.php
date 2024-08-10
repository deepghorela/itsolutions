<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestQuoteController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/{alias?}', [App\Http\Controllers\PagesController::class, 'index']);

Route::post('/request-quote', [RequestQuoteController::class, 'store'])->name('request-quote.store');