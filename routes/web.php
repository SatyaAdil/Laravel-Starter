<?php

use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\ProductCategoryController;

use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('orders', OrderController::class);
});


Route::get('/', [HomepageController::class, 'index'])->name('home');


Route::get('products', [HomepageController::class, 'products']);

Route::get('product/{slug}', [HomepageController::class, 'product']);

Route::get('categories', [HomepageController::class, 'categories']);
Route::get('category/{slug}', [HomepageController::class, 'category']);
Route::get('cart', [HomepageController::class, 'cart']);
Route::get('checkout', [HomepageController::class, 'checkout']);



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('products', ProductController::class);  // Memindahkan products ke dalam dashboard
    Route::resource('categories', ProductCategoryController::class);
});


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
