@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold">Product Details</h1>

    <div class="mt-4">
        <h2 class="text-xl">{{ $product->name }}</h2>
        <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
        <p><strong>Description:</strong> {{ $product->description ?? 'No description available' }}</p>
        <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
        <p><strong>Stock:</strong> {{ $product->stock ?? 'N/A' }}</p>

        @if($product->image)
        <div class="mt-4">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                class="w-full h-auto rounded">
        </div>
        @else
        <p>No image available.</p>
        @endif
    </div>

    <div class="mt-4">
        <a href="{{ route('products.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Back to Product
            List</a>
    </div>
</div>
@endsection