<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/products', [\App\Http\Controllers\ProductController::class, 'store']);
Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'show']);

// Add Soft Delete test
Route::get('/posts/{id}', [\App\Http\Controllers\PostController::class, 'show']);
Route::delete('/posts/{id}', [\App\Http\Controllers\PostController::class, 'destroy']);
Route::patch('/posts/{id}/restore', [\App\Http\Controllers\PostController::class, 'restore']);
Route::delete('/posts/{id}/force-delete', [\App\Http\Controllers\PostController::class, 'forceDelete']);
