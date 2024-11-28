@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="flex justify-center items-center min-h-screen bg-white">
    <div class="w-full max-w-2xl bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-semibold text-gray-700 mb-6 text-center">Create Commission Order</h1>
        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" name="name" id="name"
                    class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-gray-200"
                    placeholder="Enter your name" required>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" name="email" id="email"
                    class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-gray-200"
                    placeholder="Enter your email" required>
            </div>

            <!-- Phone -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-600">Phone</label>
                <input type="text" name="phone" id="phone"
                    class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-gray-200"
                    placeholder="Enter your phone number" required>
            </div>

            <!-- Product -->
            <div>
                <label for="product_id" class="block text-sm font-medium text-gray-600">Product</label>
                <select name="product_id" id="product_id"
                    class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-gray-200"
                    required>
                    <option value="" disabled selected>Select a product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Payment Method -->
            <div>
                <label for="payment_method" class="block text-sm font-medium text-gray-600">Payment Method</label>
                <select name="payment_method" id="payment_method"
                    class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-gray-200"
                    required>
                    <option value="" disabled selected>Select a payment method</option>
                    <option value="BCA">BCA</option>
                    <option value="ShopeePay">ShopeePay</option>
                    <option value="OVO">OVO</option>
                    <option value="Gopay">Gopay</option>
                </select>
            </div>

            <!-- Order Description -->
            <div>
                <label for="order_description" class="block text-sm font-medium text-gray-600">Order Description</label>
                <textarea name="order_description" id="order_description"
                    class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-gray-200"
                    placeholder="Provide a brief description of the order"></textarea>
            </div>

            <!-- Photos -->
            {{-- <div>
                <label for="photos" class="block text-sm font-medium text-gray-600">Reference Photos</label>
                <input type="file" name="photos[]" id="photos"
                    class="mt-2 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-gray-200"
                    multiple>
            </div> --}}

            <!-- Error Display -->
            @if ($errors->any())
                <div class="mt-4 bg-red-50 border-l-4 border-red-400 p-4 text-red-600 text-sm rounded-lg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full flex justify-center items-center bg-gray-700 text-white py-2 px-4 rounded-md shadow-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-700 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 13l4 4L19 7" />
                    </svg>
                    Submit
                </button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</div>
@endsection
