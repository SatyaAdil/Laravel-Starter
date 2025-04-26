<x-layouts.app title="_('Dashboard')">
    <flux:heading>User profile</flux:heading>
    <flux:text class="mt-2">This information will be displayed publicly.</flux:text>

    <table class="min-w-full divide-y divide-gray-200 table-auto">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($categories as $key => $category)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $key + 1 }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->slug }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->description }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <!-- Add action buttons or links here -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layouts.app>