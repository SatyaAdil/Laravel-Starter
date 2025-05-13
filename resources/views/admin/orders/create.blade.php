@extends('layouts.app')

@section('title', 'Buat Order')

@section('content')
    <div class="flux-card flux-p-6 flux-bg-white flux-rounded-xl flux-shadow">
        <h2 class="flux-text-2xl flux-font-bold flux-mb-4">Buat Order Baru</h2>

        @if ($errors->any())
            <div class="flux-bg-red-100 flux-text-red-700 flux-p-4 flux-rounded flux-mb-4">
                <ul class="flux-list-disc flux-ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.orders.store') }}" method="POST" class="flux-space-y-4">
            @csrf

            <div>
                <label for="customer_id" class="flux-block flux-mb-1">Customer</label>
                <select name="customer_id" id="customer_id" class="flux-input">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="order_date" class="flux-block flux-mb-1">Tanggal Order</label>
                <input type="date" name="order_date" id="order_date" class="flux-input">
            </div>

            <div>
                <label for="status" class="flux-block flux-mb-1">Status</label>
                <select name="status" id="status" class="flux-input">
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <button type="submit" class="flux-btn flux-btn-primary">Simpan</button>
        </form>
    </div>
@endsection
