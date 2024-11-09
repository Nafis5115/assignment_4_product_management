<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // If there's a search query, filter products by name
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        // Get paginated products
        $products = $query->paginate(10); // You can change 10 to any number for pagination

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image',
            // Add validation rules as needed
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function show($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Pass the product to the view
        return view('products.show', compact('product'));
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // Update validation rules
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'image' => 'nullable|image', // Make the image optional
        'description' => 'nullable', // Optional description
        'stock' => 'nullable|integer',
    ]);

    // Update product fields
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->stock = $request->stock;

    // Handle the image upload if a new image is uploaded
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $product->image = $imagePath;
    }

    // Save the updated product
    $product->save();

    return redirect()->route('products.index')->with('success', 'Product updated successfully!');
}


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
