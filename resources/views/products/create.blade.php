<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h1>Create New Product</h1>

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="product_id">Product ID</label>
        <input type="text" name="product_id" required>

        <label for="name">Name</label>
        <input type="text" name="name" required>

        <label for="price">Price</label>
        <input type="text" name="price" required>

        <label for="stock">Stock</label>
        <input type="number" name="stock">

        <label for="description">Description</label>
        <textarea name="description"></textarea>

        <label for="image">Image</label>
        <input type="file" name="image