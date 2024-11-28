<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

</head>

<body style="background: rgb(255, 255, 255)">
    <div class="bg-white">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="{{('/')}}" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto"
                            src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="">
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="{{ route('products.index') }}" class="text-sm/6 font-semibold text-gray-900">Product</a>
                    <a href="{{ route('gallery.index') }}" class="text-sm/6 font-semibold text-gray-900">Gallery</a>
                    <a href="{{ route('orders.index') }}" class="text-sm/6 font-semibold text-gray-900">Order</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <!-- Tampilkan Login dan Register hanya jika pengguna belum login -->
                    @guest
                        <button
                            class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                            <span
                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                <a href="{{ route('login') }}" class="text-sm/6 font-semibold text-gray-900">Log in</a>
                            </span>
                        </button>
                        <a href="{{ route('register') }}" button
                            class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-black rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 focus:ring-4 focus:outline-none focus:ring-lime-200">
                            <span
                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0 text-black group-hover:text-black">
                                Register
                            </span>
                            </button>
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

                    <!-- Tampilkan Logout hanya jika pengguna sudah login -->
                    @auth
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <button
                                class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </button>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endauth
                </div>

    </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-50"></div>
        <div
            class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600"
                        alt="">
                </a>
                <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <a href="{{ route('products.index') }}"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Product</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Features</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Marketplace</a>
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Company</a>
                    </div>
                    <div class="py-6">
                        <a href="#"
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Log
                            in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </header>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <br><br>
                    <h2 class="text-6xl text-gray-900 dark:text-white text-center" style="color: rgb(0, 0, 0);">Commission Art</h2>
                    <hr>
                </div>
                <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('products.create') }}" class="btn btn-md btn-success mb-3">ADD PRODUCT</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">TITLE</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">STOCK</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ asset('image') }}/{{ $product->image }}" class="rounded"
                                                style="width: 150px">
                                        </td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ 'Rp ' . number_format($product->price, 2, ',', '.') }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('products.destroy', $product->id) }}"
                                                method="POST">
                                                <a href="{{ route('products.show', $product->id) }}"
                                                    class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm" style="background-color: red; border-color: red; color:white">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Products are not yet available.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>


    <script>
        var successMessage = "{{ session('success') }}";
        var errorMessage = "{{ session('error') }}";

        if (successMessage) {
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: successMessage,
                showConfirmButton: false,
                timer: 2000
            });
        } else if (errorMessage) {
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: errorMessage,
                showConfirmButton: false,
                timer: 2000
            });
        }
    </script>

</body>

</html>
