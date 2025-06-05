<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Panggil controller-nya
use App\Http\Controllers\Api\ProductCategoryController;
use App\Http\Controllers\Api\ProductController;


Route::apiResource('/product-categories', ProductCategoryController::class)->only('index','store','show'); 
Route::apiResource('/products', ProductController::class)->only('index','store','show');

// Route untuk mendapatkan data user yang terautentikasi
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
