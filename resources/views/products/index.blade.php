@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold text-center mb-6">Product List</h1>

    <div class="flex justify-between mb-4">
        <a href="{{ route('products.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create New Product</a>
        <form action="{{ route('products.index') }}" method="GET" class="flex space-x-2">
            <input type="text" name="search" class="px-4 py-2 border rounded-lg" placeholder="Search by Product Name"
                value="{{ request('search') }}">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Search</button>
        </form>
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if($products->isEmpty())
    <div class="text-center text-gray-600 py-4">
        <p class="font-semibold text-xl">No products found.</p>
    </div>
    @else
    <table class="w-full table-auto border-collapse">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 px-4 text-left">Image</th>
                <th class="py-3 px-4 text-left">Product ID</th>
                <th class="py-3 px-4 text-left">Name</th>
                <th class="py-3 px-4 text-left">Price</th>
                <th class="py-3 px-4 text-left">Stock</th>
                <th class="py-3 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-3 px-4">
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="w-16 h-16 object-cover rounded">
                    @else
                    <span>No Image</span>
                    @endif
                </td>
                <td class="py-3 px-4">{{ $product->id }}</td>
                <td class="py-3 px-4">{{ $product->name }}</td>
                <td class="py-3 px-4">${{ number_format($product->price, 2) }}</td>
                <td class="py-3 px-4">{{ $product->stock ?? 'N/A' }}</td>
                <td class="py-3 px-4">
                    <a href="{{ route('products.show', $product->id) }}"
                        class="text-blue-600 hover:text-blue-800">View</a> |
                    <a href="{{ route('products.edit', $product->id) }}"
                        class="text-yellow-600 hover:text-yellow-800">Edit</a> |
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
    @endif
</div>
@endsection