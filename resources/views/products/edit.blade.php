<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">

    <div class="container mx-auto mt-10 mb-10">
        <div class="max-w-3xl mx-auto p-6 bg-white rounded-xl shadow-md">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <!-- IMAGE -->
                <div class="mb-6">
                    <label class="block font-medium mb-2">Image</label>
                    <input type="file" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('image') border-red-500 @enderror" name="image">

                    @error('image')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- TITLE -->
                <div class="mb-6">
                    <label class="block font-medium mb-2">Title</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" name="title" value="{{ old('title', $product->title) }}" placeholder="Enter product title">

                    @error('title')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- DESCRIPTION -->
                <div class="mb-6">
                    <label class="block font-medium mb-2">Description</label>
                    <textarea class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror" name="description" rows="5" placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>

                    @error('description')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-6 mb-6">
                    <!-- PRICE -->
                    <div>
                        <label class="block font-medium mb-2">Price</label>
                        <input type="number" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('price') border-red-500 @enderror" name="price" value="{{ old('price', $product->price) }}" placeholder="Enter product price">

                        @error('price')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- STOCK -->
                    <div>
                        <label class="block font-medium mb-2">Stock</label>
                        <input type="number" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('stock') border-red-500 @enderror" name="stock" value="{{ old('stock', $product->stock) }}" placeholder="Enter product stock">

                        @error('stock')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-4">
                    <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Update</button>
                    <button type="reset" class="px-6 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Reset</button>
                </div>

            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</body>
</html>
