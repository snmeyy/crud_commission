<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Menampilkan form order
    public function create()
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in first.');
        }

        // Ambil data produk untuk dropdown
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    // Menyimpan order ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'product_id' => 'required|exists:products,id',
            'payment_method' => 'required|in:BCA,ShopeePay,OVO,Gopay',
            'order_description' => 'nullable|string',
            'photos' => 'nullable|array',
        ]);

        $photos = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('photos', 'public');  // Menyimpan foto
            }
        }

        Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'product_id' => $request->product_id,
            'payment_method' => $request->payment_method,
            'order_description' => $request->order_description,
            'photos' => $photos,  // Menyimpan array foto
        ]);

        return redirect()->route('orders.index')->with('success', 'Order has been created successfully!');
    }

    // Menampilkan daftar order
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    // Menampilkan detail order
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }

    // Menghapus order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order has been deleted.');
    }

    public function edit($id)
{
    $order = Order::findOrFail($id);
    $products = Product::all();
    return view('orders.edit', compact('order', 'products'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'product_id' => 'required|exists:products,id',
        'payment_method' => 'required|in:BCA,ShopeePay,OVO,Gopay',
        'order_description' => 'nullable|string',
        'photos' => 'nullable|array',
        'photos.*' => 'image|mimes:jpeg,png,jpg',
    ]);

    $order = Order::findOrFail($id);

    $photos = $order->photos ?? [];
    if ($request->hasFile('photos')) {
        foreach ($request->file('photos') as $photo) {
            $photos[] = $photo->store('photos', 'public');
        }
    }

    $order->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'product_id' => $request->product_id,
        'payment_method' => $request->payment_method,
        'order_description' => $request->order_description,
        'photos' => $photos,
    ]);

    return redirect()->route('orders.index')->with('success', 'Order has been updated successfully!');

    }
}
