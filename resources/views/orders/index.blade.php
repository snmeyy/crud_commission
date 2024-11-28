@extends('layouts.app')

@section('content')
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <div class="bg-white min-h-screen">
        <header class="border-b">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="{{('/') }}" class="flex items-center space-x-2">
                        <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="">
                        <span class="text-gray-800 text-lg font-semibold"></span>
                    </a>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-gray-900">Product</a>
                    <a href="{{ route('gallery.index') }}" class="text-gray-700 hover:text-gray-900">Gallery</a>
                    <a href="{{ route('orders.index') }}" class="text-gray-700 hover:text-gray-900">Order</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-100">
                            Log in
                        </a>
                        <a href="{{ route('register') }}" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg">
                            Register
                        </a>
                    @endguest
                    @auth
                        <a href="{{ route('logout') }}"
                           class="text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @endauth
                </div>
            </nav>
        </header>

        <main class="container mx-auto p-6">
            <h1 class="text-center text-4xl font-bold text-gray-800 mb-6">Order List</h1>

            <a href="{{ route('orders.create') }}"
               class="inline-block text-gray-700 border border-gray-300 px-4 py-2 rounded-lg hover:bg-gray-100 mb-6">
                Order Commission
            </a>

            <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
                <table class="min-w-full border border-gray-300 text-gray-800">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border text-left">Name</th>
                            <th class="px-4 py-2 border text-left">Product Name</th>
                            <th class="px-4 py-2 border text-left">Description</th>
                            <th class="px-4 py-2 border text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border">{{ $order->name }}</td>
                                <td class="px-4 py-2 border">{{ $order->product->title }}</td>
                                <td class="px-4 py-2 border">{{ $order->order_description }}</td>
                                <td class="px-4 py-2 border flex space-x-2">
                                    <a href="{{ route('orders.show', $order->id) }}"
                                       class="px-4 py-2 rounded-lg bg-green-600 text-white hover:bg-green-700">
                                        View
                                    </a>
                                    <a href="{{ route('orders.edit', $order->id) }}"
                                       class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                                        Edit
                                    </a>
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
