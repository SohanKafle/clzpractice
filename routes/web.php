<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class,'home'])-> name('home');
Route::get('/about', [PagesController::class,'about'])-> name('about');
Route::get('/contact', [PagesController::class,'contact'])-> name('contact');
Route::get('/categoryproducts/{catid}', [PagesController::class,'categoryproducts'])-> name('categoryproducts');

Route::get('/viewproducts/{id}', [PagesController::class,'viewproducts'])-> name('viewproducts');

Route::middleware(['auth'])->group(function() {
    Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::get('/mycart', [CartController::class, 'mycart'])->name('mycart');
    // Route::get('/cart/{id}/delete', [CartController::class,'delete'])->name('cart.delete');
});

Route::middleware(['auth','isadmin'])->group(function() {
Route::get('/dashboard', [DashboardController::class,'dashboard'])-> name('dashboard');

Route::get('/categories', [CategoryController::class,'index'])-> name('categories.index');
Route::get('/categories/create', [CategoryController::class,'create'])-> name('categories.create');
Route::post('/categories/store', [CategoryController::class,'store'])-> name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class,'edit'])-> name('categories.edit');
Route::post('/categories/{id}/update', [CategoryController::class,'update'])-> name('categories.update');
Route::get('/categories/{id}/delete', [CategoryController::class,'delete'])-> name('categories.delete');

Route::get('/products',[ProductsController::class,'index'])->name('products.index');
Route::get('/products/create',[ProductsController::class,'create'])->name('products.create');
Route::post('/products/store',[ProductsController::class,'store'])->name('products.store');
Route::get('/products/{id}/edit',[ProductsController::class,'edit'])->name('products.edit');
Route::post('/products/{id}/update',[ProductsController::class,'update'])->name('products.update');
Route::get('/products/{id}/delete',[ProductsController::class,'delete'])->name('products.delete');

});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
