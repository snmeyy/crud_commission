<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">
    <div class="container mx-auto py-10">
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Image Section -->
            <div class="md:w-1/3">
                <div class="rounded-lg overflow-hidden shadow">
                    <img src="{{ asset('image') }}/{{$product->image}}" alt="Product Image" class="w-full">
                </div>
            </div>

            <!-- Details Section -->
            <div class="md:w-2/3">
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-2xl font-semibold mb-4">{{ $product->title }}</h3>
                    <p class="text-xl font-bold text-gray-700 mb-4">{{ "Rp " . number_format($product->price,2,',','.') }}</p>
                    <p class="text-gray-600 mb-4">{!! $product->description !!}</p>
                    <p class="text-gray-500">Stock: <span class="font-medium">{{ $product->stock }}</span></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
