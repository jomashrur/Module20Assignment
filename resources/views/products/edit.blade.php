<!DOCTYPE html>
<html>
<head>
    <title>Edit Product: {{ $product->name }}</title>
</head>
<body>
    <h1>Edit Product: {{ $product->name }}</h1>

    <!-- Form to Edit the Product -->
    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Product ID (readonly) -->
        <label for="product_id">Product ID</label>
        <input type="text" name="product_id" value="{{ old('product_id', $product->product_id) }}" readonly>

        <!-- Product Name -->
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" required>

        <!-- Product Price -->
        <label for="price">Price</label>
        <input type="text" name="price" value="{{ old('price', $product->price) }}" required>

        <!-- Product Stock -->
        <label for="stock">Stock</label>
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">

        <!-- Product Description -->
        <label for="description">Description</label>
        <textarea name="description">{{ old('description', $product->description) }}</textarea>

        <!-- Product Image (optional) -->
        <label for="image">Image</label>
        <input type="file" name="image">

        <!-- Display current image if exists -->
        @if ($product->image)
            <p>Current Image:</p>
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 300px; max-height: 300px;">
        @endif

        <button type="submit">Update Product</button>
    </form>

    <a href="{{ route('products.index') }}">Back to Product List</a>
</body>
</html>