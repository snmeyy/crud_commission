@extends('layouts.app')

@section('content')
@vite('resources/css/app.css')
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-sm max-w-4xl">
        <h1 class="text-3xl font-bold text-gray-700 mb-4 text-center">Order Details</h1>

        <div class="p-4 border rounded-lg">
            <div class="mb-4">
                <h2 class="text-lg font-medium text-gray-800">Name: <span class="font-normal">{{ $order->name }}</span></h2>
            </div>
            <p class="text-gray-600 mb-2"><strong>Email:</strong> {{ $order->email }}</p>
            <p class="text-gray-600 mb-2"><strong>Phone:</strong> {{ $order->phone }}</p>
            <p class="text-gray-600 mb-2"><strong>Product:</strong> {{ $order->product->title }}</p>
            <p class="text-gray-600 mb-2"><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
            <p class="text-gray-600 mb-4"><strong>Description:</strong> {{ $order->order_description }}</p>

            {{-- @if ($order->photos && count($order->photos) > 0)
                <div>
                    <h3 class="text-base font-medium text-gray-700 mb-2">Photos:</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($order->photos as $photo)
                            <img src="{{ asset('storage/'.$photo) }}" alt="Order Photo" class="w-24 h-24 object-cover rounded-md border">
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-gray-500 mt-2">No photos available.</p>
            @endif --}}
        </div>
    </div>
@endsection
