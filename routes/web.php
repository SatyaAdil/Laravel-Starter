<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerAuthController; 
use App\Http\Controllers\ApiController;

Route::get('/api-data', [ApiController::class, 'getApiData'])->name('api.data');



Route::group(['prefix'=>'customer'], function(){ 
    Route::controller(CustomerAuthController::class)->group(function(){ 
        Route::get('login','login')->name('customer.login');  
        Route::post('login','store_login')->name('customer.store_login'); 
        Route::get('register','register')->name('customer.register'); 
        Route::post('register','store_register')->name('customer.store_register');
        Route::post('logout', 'logout')->name('customer.logout');
        
    }); 
});




Route::get('/',[HomepageController::class,'index'])->name('home');
Route::get('products', [HomepageController::class, 'products'])->name('products');
Route::get('product/{slug}', [HomepageController::class, 'product'])->name('product');
Route::get('categories',[HomepageController::class, 'categories']);
Route::get('category/{slug}', [HomepageController::class, 'category']);
Route::get('cart', [HomepageController::class, 'cart']);
Route::get('checkout', [HomepageController::class, 'checkout']);
Route::patch('/products/{id}/toggle-status', [ProductController::class, 'toggleStatus'])->name('products.toggleStatus');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    
Route::group(['prefix'=>'dashboard'], function(){
    Route::resource('categories',ProductCategoryController::class);
});
Route::prefix('/dashboard')->middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
});
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
