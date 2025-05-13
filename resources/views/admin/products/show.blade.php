@extends('layouts.admin')

@section('title', 'Product Details')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Product Details</h2>
        <div class="flex space-x-2">
            <a href="{{ route('admin.products.edit', $product) }}" class="flux-btn flux-btn-primary">
                Edit
            </a>
            <a href="{{ route('admin.products.index') }}" class="flux-btn flux-btn-secondary">
                Back to List
            </a>
        </div>
    </div>
    
    <div class="flux-card">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <h3 class="text-lg font-medium mb-2">Product Information</h3>
                <dl class="space-y-2">
                    <div>
                        <dt class="text-sm text-gray-400">ID</dt>
                        <dd>{{ $product->id }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-400">Name</dt>
                        <dd>{{ $product->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-400">Price</dt>
                        <dd>${{ number_format($product->price, 2) }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-gray-400">Stock</dt>
                        <dd>{{ $product->stock }}</dd>
                    </div>
                </dl>
            </div>
            <div>
                <h3 class="text-lg font-medium mb-2">Description</h3>
                <p class="text-gray-300">{{ $product->description ?? 'No description provided.' }}</p>
            </div>
        </div>
    </div>
@endsection