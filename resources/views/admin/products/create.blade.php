@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')
<div class="flux-card">
    <h2 class="text-xl font-semibold mb-4">Add Product</h2>
    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Product Name" class="flux-input mb-3" required>
        <input type="number" name="price" placeholder="Price" class="flux-input mb-3" required>
        <input type="number" name="stock" placeholder="Stock" class="flux-input mb-3" required>
        <button class="flux-btn flux-btn-primary">Save</button>
    </form>
</div>
@endsection
