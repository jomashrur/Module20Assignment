<!DOCTYPE html>
<html>
<head>
    <title>Product Management</title>
</head>
<body>
    <h1>Products</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('products.index') }}">
        <input type="text" name="search" placeholder="Search by Product ID or Description" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <!-- Sort Links -->
    <a href="{{ route('products.index', ['sort_by' => 'name', 'order' => 'asc']) }}">Sort by Name Asc</a> |
    <a href="{{ route('products.index', ['sort_by' => 'name', 'order' => 'desc']) }}">Sort by Name Desc</a> |
    <a href="{{ route('products.index', ['sort_by' => 'price', 'order' => 'asc']) }}">Sort by Price Asc</a> |
    <a href="{{ route('products.index', ['sort_by' => 'price', 'order' => 'desc']) }}">Sort by Price Desc</a>

    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">View</a> |
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a> |
                        <form method="POST" action="{{ route('products.destroy', $product->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
</body>
</html>