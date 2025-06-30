<x-layouts.app :title="__('Products')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Update Product</flux:heading>
        <flux:subheading size="lg" class="mb-3">Manage product data</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if (session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full">{{ session()->get('successMessage') }}</flux:badge>
    @elseif(session()->has('errorMessage'))
        <flux:badge color="red" class="mb-3 w-full">{{ session()->get('errorMessage') }}</flux:badge>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <flux:input label="Name" name="name" value="{{ $product->name }}" class="mb-3" />
        <flux:input label="Slug" name="slug" value="{{ $product->slug }}" class="mb-3" />
        <flux:input label="SKU" name="sku" value="{{ $product->sku }}" class="mb-3" />

        <flux:select label="Kategori" name="product_category_id" class="mb-3">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ $product->product_category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </flux:select>

        <flux:input label="Harga" name="price" type="number" value="{{ $product->price }}" class="mb-3" />
        <flux:input label="Stok" name="stock" type="number" value="{{ $product->stock }}" class="mb-3" />
        <flux:textarea label="Deskripsi" name="description" class="mb-3">{{ $product->description }}</flux:textarea>

        <flux:select label="Status Aktif" name="is_active" class="mb-3">
            <option value="1" {{ $product->is_active ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ !$product->is_active ? 'selected' : '' }}>Nonaktif</option>
        </flux:select>

        <div style="width: 200px; height: 200px; overflow: hidden; margin-bottom: 16px; margin-top: 16px;">
            @if ($product->image_url)
                <img src="{{ asset('storage/' . $product->image_url) }}" alt="Product Image"
                     style="width: 100%; height: 100%; object-fit: cover;">
            @else
                <span style="color: gray; font-style: italic;">No image</span>
            @endif
        </div>

        <flux:input type="file" label="Image" name="image" class="mb-3" />

        <flux:separator />

        <div class="mt-4">
            <flux:button type="submit" variant="primary">Update</flux:button>
            <flux:button href="{{ route('products.index') }}" variant="ghost" class="ml-3">Back</flux:button>
        </div>
    </form>
</x-layouts.app>
