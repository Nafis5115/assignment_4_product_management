<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management System</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto p-6">
        <!-- Navbar -->
        <nav class="bg-blue-600 p-4 rounded-lg shadow-md">
            <div class="flex justify-between items-center">
                <a href="{{ route('products.index') }}" class="text-white text-2xl font-semibold">Product Management</a>
                <ul class="flex space-x-6">
                    <li><a href="{{ route('products.index') }}" class="text-white hover:text-gray-300">All Products</a>
                    </li>
                    <li><a href="{{ route('products.create') }}" class="text-white hover:text-gray-300">Create
                            Product</a></li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="mt-6">
            @yield('content')
        </div>
    </div>
</body>

</html>