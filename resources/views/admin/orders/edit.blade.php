@extends('layouts.app')

@section('title', 'Edit Order')

@section('content')
    <div class="flux-card flux-p-6 flux-bg-white flux-rounded-xl flux-shadow">
        <h2 class="flux-text-2xl flux-font-bold flux-mb-4">Edit Order</h2>

        @if ($errors->any())
            <div class="flux-bg-red-100 flux-text-red-700 flux-p-4 flux-rounded flux-mb-4">
                <ul class="flux-list-disc flux-ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="flux-space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="customer_id" class="flux-block flux-mb-1">Customer</label>
                <select name="customer_id" id="customer_id" class="flux-input">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="order_date" class="flux-block flux-mb-1">Tanggal Order</label>
                <input type="date" name="order_date" id="order_date" class="flux-input"
                       value="{{ old('order_date', $order->order_date->format('Y-m-d')) }}">
            </div>

            <div>
                <label for="status" class="flux-block flux-mb-1">Status</label>
                <select name="status" id="status" class="flux-input">
                    @foreach(['pending', 'processing', 'completed'] as $status)
                        <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="flux-btn flux-btn-primary">Update</button>
        </form>
    </div>
@endsection
