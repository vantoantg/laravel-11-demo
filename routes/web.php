<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('upload', [\App\Http\Controllers\UploadFileController::class, 'index']);
Route::post('upload/store', [\App\Http\Controllers\UploadFileController::class, 'store'])->name('upload.store');
