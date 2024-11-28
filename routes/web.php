<?php
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    $products = Product::all();
    return view('home', compact("products"));
});

//route resource for products
// Route::resource('/products', ProductController::class);
Route::resource('/products', ProductController::class);
Auth::routes();

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{id}/show', [OrderController::class, 'show'])->name('orders.show');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::get('/orders/{id}', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
    Route::get('/home', [OrderController::class, 'index']);
});

Route::get('/gallery', function () {
    return view('gallery.index'); // Pastikan file gallery/index.blade.php ada
})->name('gallery.index');
