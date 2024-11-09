@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold text-center mb-6">Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Product Name</label>
            <input type="text" name="name" id="name" class="w-full p-2 border rounded"
                value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700">Price</label>
            <input type="number" name="price" id="price" class="w-full p-2 border rounded"
                value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description (Optional)</label>
            <textarea name="description" id="description"
                class="w-full p-2 border rounded">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="stock" class="block text-gray-700">Stock (Optional)</label>
            <input type="number" name="stock" id="stock" class="w-full p-2 border rounded"
                value="{{ old('stock', $product->stock) }}">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Product Image (Optional)</label>
            <input type="file" name="image" id="image" class="w-full p-2 border rounded">
            @if($product->image)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    class="w-24 h-24 object-cover rounded">
            </div>
            @endif
        </div>

        <div class="flex justify-between">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Update Product</button>
            <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
        </div>
    </form>
</div>
@endsection