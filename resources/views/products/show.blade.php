<!DOCTYPE html>
<html>
<head>
    <title>Product Details: {{ $product->name }}</title>
</head>
<body>
    <h1>Product Details</h1>

    <table>
        <tr>
            <th>Product ID</th>
            <td>{{ $product->product_id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $product->name }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $product->description ? $product->description : 'No description available' }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>${{ number_format($product->price, 2) }}</td>
        </tr>
        <tr>
            <th>Stock</th>
            <td>{{ $product->stock ?? 'Not available' }}</td>
        </tr>
        @if($product->image)
        <tr>
            <th>Image</th>
            <td>
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 300px;">
            </td>
        </tr>
        @endif
    </table>

    <a href="{{ route('products.index') }}">Back to Product List</a> |
    <a href="{{ route('products.edit', $product->id) }}">Edit Product</a> |
    <form method="POST" action="{{ route('products.destroy', $product->id) }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Delete Product</button>
    </form>
</body>
</html>