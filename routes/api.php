<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/products', [\App\Http\Controllers\ProductController::class, 'store']);
Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'show']);
