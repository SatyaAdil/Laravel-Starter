<?php

use Livewire\Volt\Volt;
use App\Http\Controllers\homepageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CartController;

Route::get('/api-data', [ApiController::class, 'getApiData'])->name('api.data');

Route::get('/', [homepageController::class, 'index'])->name('home');
Route::get('products', [homepageController::class, 'products']);
Route::get('product/{slug}', [homepageController::class, 'product'])->name('product.show');
Route::get('categories', [homepageController::class, 'categories']);
Route::get('category/{slug}', [homepageController::class, 'category']);
Route::get('cart', [homepageController::class, 'cart'])->name('cart.index');
Route::get('checkout', [homepageController::class, 'checkout'])->name('checkout.index');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::group(['prefix' => 'dashboard'], function () {
    Route::resource('categories', ProductCategoryController::class);
    Route::resource('products', ProductsController::class);
});

Route::group(['prefix' => 'customer'], function () {
    Route::controller(CustomerAuthController::class)->group(function () {
        Route::group(['middleware' => 'check_customer_login'], function () {
            //tampilkan halaman login
            Route::get('login', 'login')->name('customer.login');
            //aksi login
            Route::post('login', 'store_login')->name('customer.store_login');
            //tampilkan halaman register
            Route::get('register', 'register')->name('customer.register');
            //aksi register
            Route::post('register', 'store_register')->name('customer.store_register');
        });

        //aksi logout
        Route::post('logout', 'logout')->name('customer.logout');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::group(['middleware' => ['is_customer_login']], function () {
    Route::controller(CartController::class)->group(function () {
        Route::post('cart/add', 'add')->name('cart.add');
        Route::delete('cart/remove/{id}', 'remove')->name('cart.remove');
        Route::patch('cart/update/{id}', 'update')->name('cart.update');
    });
});

require __DIR__ . '/auth.php';
