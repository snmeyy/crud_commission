<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Products - SantriKoding.com</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">

    <div class="container mx-auto mt-10">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">

                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Image</label>
                        <input
                            type="file"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('image') border-red-500 @enderror"
                            name="image">

                        @error('image')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <input
                            type="text"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="Enter product title">

                        @error('title')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror"
                            name="description"
                            rows="5"
                            placeholder="Enter product description">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Price</label>
                            <input
                                type="number"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('price') border-red-500 @enderror"
                                name="price"
                                value="{{ old('price') }}"
                                placeholder="Enter product price">

                            @error('price')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Stock</label>
                            <input
                                type="number"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('stock') border-red-500 @enderror"
                                name="stock"
                                value="{{ old('stock') }}"
                                placeholder="Enter product stock">

                            @error('stock')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex space-x-4">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Save
                        </button>
                        <button type="reset" class="px-4 py-2 bg-gray-300 text-gray-800 font-medium rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300">
                            Reset
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</body>
</html>
