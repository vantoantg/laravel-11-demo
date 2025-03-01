<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/barcode', [\App\Http\Controllers\BarcodeController::class, 'generate']);
