<!-- resources/views/admin/customers/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Customer</h1>

        <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="flux-input-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="flux-input" value="{{ old('name', $customer->name) }}">
            </div>

            <div class="flux-input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="flux-input" value="{{ old('email', $customer->email) }}">
            </div>

            <div class="flux-input-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="flux-input" value="{{ old('phone', $customer->phone) }}">
            </div>

            <div class="flux-input-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" class="flux-textarea">{{ old('address', $customer->address) }}</textarea>
            </div>

            <button type="submit" class="flux-btn flux-btn-primary">Update Customer</button>
        </form>
    </div>
@endsection
