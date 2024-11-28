@extends('layouts.app')

@section('content')
@vite('resources/css/app.css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

<div class="container mx-auto flex justify-center items-center min-h-screen">
    <div class="w-full max-w-md">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Edit Commission Order</h1>

        <form action="{{ route('orders.update', $order->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md space-y-6">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name"
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('name') border-red-500 @enderror"
                    value="{{ old('name', $order->name) }}" required>
                @error('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email"
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('email') border-red-500 @enderror"
                    value="{{ old('email', $order->email) }}" required>
                @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Phone -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone" id="phone"
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('phone') border-red-500 @enderror"
                    value="{{ old('phone', $order->phone) }}" required>
                @error('phone')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Product -->
            <div>
                <label for="product_id" class="block text-sm font-medium text-gray-700">Product</label>
                <select name="product_id" id="product_id"
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('product_id') border-red-500 @enderror" required>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ $product->id == $order->product_id ? 'selected' : '' }}>
                            {{ $product->title }}
                        </option>
                    @endforeach
                </select>
                @error('product_id')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="order_description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="order_description" id="order_description" rows="4"
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('order_description') border-red-500 @enderror"
                    required>{{ old('order_description', $order->order_description) }}</textarea>
                @error('order_description')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Payment -->
            <div>
                <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment Method</label>
                <select name="payment_method" id="payment_method"
                    class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400"
                    required>
                    <option value="" disabled {{ old('payment_method', $order->payment_method) == '' ? 'selected' : '' }}>Select a payment method</option>
                    <option value="BCA" {{ old('payment_method', $order->payment_method) == 'BCA' ? 'selected' : '' }}>BCA</option>
                    <option value="ShopeePay" {{ old('payment_method', $order->payment_method) == 'ShopeePay' ? 'selected' : '' }}>ShopeePay</option>
                    <option value="OVO" {{ old('payment_method', $order->payment_method) == 'OVO' ? 'selected' : '' }}>OVO</option>
                    <option value="Gopay" {{ old('payment_method', $order->payment_method) == 'Gopay' ? 'selected' : '' }}>Gopay</option>
                </select>
                @error('payment_method')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Photo -->
            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                <input type="file" name="photo" id="photo"
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('photo') border-red-500 @enderror">
                @error('photo')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
                @if($order->photo)
                    <div class="mt-4">
                        <img src="{{ asset('storage/' . $order->photo) }}" alt="Uploaded Photo" class="w-full h-auto rounded-md shadow-md">
                    </div>
                @endif
            </div>

            <!-- Buttons -->
            <div class="flex justify-between">
                <a href="{{ route('orders.index') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md shadow hover:bg-gray-300">
                   Back
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
