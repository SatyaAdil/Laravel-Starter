<x-layouts.app :title="__('Dashboard')">
    <flux:heading>Create New Product</flux:heading>
    <flux:separator varian="subtle" class="mt-3" />

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <flux:input label="Product Name" name="name" type="text" placeholder="Ex: Kaos Polos" required class="mb-2" />

        <flux:input label="Slug" name="slug" type="text" placeholder="Ex: kaos-polos" required class="mb-2" />

        <flux:input label="SKU" name="sku" type="text" placeholder="Ex: SKU12345" required class="mb-2" />

        <flux:select label="Category" name="product_category_id" class="mb-2" required>
            <option value="">-- Choose Category --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </flux:select>

        <flux:input label="Price" name="price" type="number" min="0" placeholder="Ex: 50000" required class="mb-2" />

        <flux:input label="Stock" name="stock" type="number" min="0" placeholder="Ex: 100" required class="mb-2" />

        <flux:textarea label="Description" name="description" placeholder="Product Description..." class="mb-2" />

        <flux:select label="Status" name="is_active" class="mb-2" required>
            <option value="1">Active</option>
            <option value="0">Nonactive</option>
        </flux:select>

        <flux:input label="Product Image" name="image" type="file" accept="image/*" class="mb-4" />

        <flux:button type="submit" ico="plus" class="mt-4">Create Product</flux:button>
        <flux:button href="{{ route('products.index') }}" class="ml-3">Back</flux:button>
    </form>
</x-layouts.app>
