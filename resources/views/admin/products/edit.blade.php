@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<div class="flux-card">
    <h2 class="text-xl font-semibold mb-4">Edit Product</h2>
    <form action="{{ route('admin.products.update', $product) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="name" value="{{ $product->name }}" class="flux-input mb-3" required>
        <input type="number" name="price" value="{{ $product->price }}" class="flux-input mb-3" required>
        <input type="number" name="stock" value="{{ $product->stock }}" class="flux-input mb-3" required>
        <button class="flux-btn flux-btn-primary">Update</button>
    </form>
</div>
@endsection
