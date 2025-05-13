<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;  // Jangan lupa untuk meng-import Request

class CustomerController extends Controller
{
    // Method untuk menampilkan daftar customer
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }

    // Method untuk menampilkan form pembuatan customer
    public function create()
    {
        return view('admin.customers.create');
    }

    // Method untuk menyimpan customer baru
    public function store(Request $request)
    {
        // Validasi inputan dari form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers', // Pastikan email unik
            'phone' => 'required',
        ]);

        // Menyimpan data customer baru ke database
        Customer::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.customers.index')->with('success', 'Customer created successfully.');
    }

    // Method untuk menampilkan form edit customer
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    // Method untuk memperbarui data customer
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,' . $customer->id, // Mengabaikan validasi email pada customer yang sedang diubah
            'phone' => 'required',
        ]);

        $customer->update($request->all());

        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }

    // Method untuk menghapus customer
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully.');
    }
}
