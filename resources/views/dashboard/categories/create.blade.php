<x-layouts.app :title="__('Dashboard')">
    <flux:heading>Create New Products Categories</flux:heading>
    <flux:separator varian="subtle" class="mt-3" />
    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data" >
        @csrf
        <flux:input label="Category Name" name="name" type="text" placeholder="Enter category name" required class="mb-2"/>
        <flux:input label="Slug" name="slug" type="text" placeholder="Enter category slug" required class="mb-2" />
        <flux:input label="Description" name="description" type="text" placeholder="Enter category description" required class="mb-2"/>
        <flux:input label="Image" name="image" type="file" accept="image/*" class="mb-2"/>
        <flux:button type="submit" ico="plus" class="mt-4">Create Category</flux:button>
        <flux:button href="{{ route('categories.index') }}" class="ml-3">Back</flux:button>
    </form>
</x-layouts.app>
