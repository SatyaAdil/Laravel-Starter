@extends('layouts.admin')

@section('title', 'Customers')

@section('content')
<div class="flux-card">
    <h2 class="text-xl font-semibold mb-4">Customers</h2>
    <a href="{{ route('admin.customers.create') }}" class="flux-btn flux-btn-primary mb-4">Add Customer</a>
    <table class="flux-table">
        <thead>
            <tr>
                <th>Name</th><th>Email</th><th>Phone</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>
                    <a href="{{ route('admin.customers.edit', $customer) }}" class="flux-btn flux-btn-secondary">Edit</a>
                    <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST" class="inline-block">
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
