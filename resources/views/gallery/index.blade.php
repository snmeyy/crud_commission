<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
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

        <main class="bg-gray-50 py-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900 mb-8">Commission Gallery</h2>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <!-- Mulai item gambar -->
                    @foreach (['yj.jpeg', 'soobin.jpeg', 'leon.jpeg', 'smallgirl.jpeg', 'bg.jpeg', 'awm.jpeg', 'alice.jpeg', 'hk.jpeg', 'howsweet.jpeg', 'llrd.jpeg', 'miru.jpeg', 'yukata.jpeg'] as $image)
                        <div class="group relative bg-white p-4 rounded-lg shadow hover:shadow-lg">
                            <img src="{{ asset('image/' . $image) }}" alt="Gallery Image"
                                class="w-full h-60 object-cover rounded-lg transition-opacity duration-300 group-hover:opacity-75">
                            <h3 class="mt-4 text-sm font-semibold text-gray-700">Basic Tee</h3>
                            <p class="text-sm text-gray-500">Black</p>
                        </div>
                    @endforeach
                    <!-- Selesai item gambar -->
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
