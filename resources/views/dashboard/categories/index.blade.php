<x-layouts.app :title="__('Dashboard')">
    <div class="flex justify-between items-center mb-4">
        <flux:heading>Produk Kategori</flux:heading>
    </div>

    <flux:button href="{{ route('categories.create') }}" class="mb-2">Add New Product Category</flux:button>

    @if(session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full">{{session()->get('successMessage')}}</flux:badge>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 dark:border-gray-700 rounded-lg shadow-md">
            <thead class="text-white">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium">No</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">Image</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">Name</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">Slug</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">Description</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                <tr class="border-t border-gray-200 dark:border-gray-700 transition duration-150">
                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $key + 1 }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">
                        <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="w-10 h-10 rounded-full">
                    </td>
                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $category->name }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $category->slug }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $category->description }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">
                    <flux:dropdown>
                                <flux:button icon:trailing="chevron-down">Actions</flux:button>
                                <flux:menu>
                                    <flux:menu.item icon="pencil" href="{{ route('categories.edit', $category->id) }}">
                                        Edit</flux:menu.item>
                                    <flux:menu.item icon="trash" variant="danger"
                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this category?')) document.getElementById('delete-form-{{ $category->id }}').submit();">
                                        Delete</flux:menu.item>
                                    <form id="delete-form-{{ $category->id }}"
                                        action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </flux:menu>
                            </flux:dropdown>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>