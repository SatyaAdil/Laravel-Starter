@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<div class="flux-card">
    <h2 class="text-xl font-semibold mb-4">Products</h2>
    <a href="{{ route('admin.products.create') }}" class="flux-btn flux-btn-primary mb-4">Add Product</a>
    <table class="flux-table">
        <thead>
            <tr><th>Name</th><th>Price</th><th>Stock</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price) }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product) }}" class="flux-btn flux-btn-secondary">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline-block">
                        @csrf @method('DELETE')
                        <button class="flux-btn flux-btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
