@extends('layouts.app')

@section('content')
@vite('resources/css/app.css')
<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-800">Login</h2>
        <form method="POST" action="{{ route('login') }}" class="mt-6">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input id="email" type="email"
                       class="block w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror"
                       name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password"
                       class="block w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror"
                       name="password" required>
                @error('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember"
                           class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                           {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="ml-2 text-sm text-gray-700">Remember Me</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">
                        Forgot Password?
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit"
                    class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Login
            </button>
        </form>

        <!-- Register Link -->
        <p class="mt-4 text-sm text-center text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
        </p>
    </div>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
