<?php
use App\Http\Controllers\ProductController; 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

//route resource for products
// Route::resource('/products', ProductController::class);
Route::resource('/products', ProductController::class);
Auth::routes();

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
