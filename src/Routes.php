<?php

use Illuminate\Support\Facades\Route;
use Naykel\Shopit\Controllers\ProductController;

Route::middleware('web')->group(function () {
    Route::prefix('products')->name('products.')->group(function () {
        Route::resource('/', ProductController::class)->parameters(['' => 'product:name'])->only(['index', 'show']);
    });
});
