@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold text-center mb-6">Create New Product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="w-full p-3 border rounded-lg" value="{{ old('name') }}"
                required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea name="description" id="description"
                class="w-full p-3 border rounded-lg">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700">Price</label>
            <input type="text" name="price" id="price" class="w-full p-3 border rounded-lg" value="{{ old('price') }}"
                required>
        </div>

        <div class="mb-4">
            <label for="stock" class="block text-gray-700">Stock</label>
            <input type="number" name="stock" id="stock" class="w-full p-3 border rounded-lg"
                value="{{ old('stock') }}">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Product Image</label>
            <input type="file" name="image" id="image" class="w-full p-3 border rounded-lg" required>
        </div>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Form fields here -->
            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">Create
                Product</button>
        </form>
        @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </form>
</div>
@endsection