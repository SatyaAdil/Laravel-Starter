<x-layouts.app :title="__('Dashboard')">
    <div class="flex justify-between items-center mb-4">
        <flux:heading>Product List</flux:heading>
        <flux:subheading>Manage Product List</flux:subheading>
    </div>
    <flux:button href="{{ route('products.create') }}" icon="plus" class="mb-4">Add New Product</flux:button>

    @if (session()->has('success'))
        <flux:badge color="green" icon="check-circle" class="mb-4 mt-4 w-full">
            {{ session()->get('success') }}
        </flux:badge>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 dark:border-gray-700 rounded-lg shadow-md">
            <thead class="text-white bg-gray-800">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium">No</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">Image</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">Name</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">SKU</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">Category</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">Price</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">Stock</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">Status</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">Action</th>
                </tr>
            </thead>
            <tbody class="border-t border-gray-200 dark:border-gray-700 transition duration-150">
                @forelse ($products as $index => $product)
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">
                            @if($product->image_url)
                                <img src="{{ asset('storage/' . $product->image_url) }}" alt="Product Image" class="w-10 h-10 rounded-full">
                            @else
                                <span class="text-gray-400 italic">No image</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $product->name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $product->sku }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $product->category->name ?? '-' }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $product->stock }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">
                            @if($product->is_active)
                                <span class="text-green-600 font-semibold">Aktif</span>
                            @else
                                <span class="text-red-600 font-semibold">Nonaktif</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 space-x-2">
                            <flux:dropdown>
                                <flux:button icon="chevron-down" size="sm">Actions</flux:button>
                                <flux:menu>
                                    <flux:menu.item href="{{ route('products.edit', $product->id) }}" icon="pencil">
                                        Edit
                                    </flux:menu.item>
                                    <flux:menu.item href="{{ route('products.destroy', $product->id) }}" icon="trash" color="red" variant="danger"
                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this product?')) document.getElementById('delete-form-{{ $product->id }}').submit();">
                                        Delete
                                    </flux:menu.item>
                                    <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </flux:menu>
                            </flux:dropdown>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-4 py-4 text-center text-gray-500">Tidak ada produk tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>
