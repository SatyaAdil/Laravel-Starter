@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
<div class="flux-card">
    <h2 class="text-xl font-semibold mb-4">Orders</h2>
    <a href="{{ route('admin.orders.create') }}" class="flux-btn flux-btn-primary mb-4">Add Order</a>
    <table class="flux-table">
       <thead>
    <tr>
        <th>Customer</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Total</th> {{-- kolom baru --}}
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    @foreach($orders as $order)
    <tr>
        <td>{{ $order->customer->name ?? 'N/A' }}</td>
        <td>{{ $order->order_date }}</td>
        <td>{{ ucfirst($order->status) }}</td>
        <td>{{ number_format($order->total_amount, 2) ?? '0.00' }}</td> {{-- total --}}
        <td>
            <a href="{{ route('admin.orders.edit', $order) }}" class="flux-btn flux-btn-secondary">Edit</a>
            <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" class="inline-block">
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
