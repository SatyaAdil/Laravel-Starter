<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Mengambil orders beserta detailnya dan menghitung total amount
        $orders = Order::with('customer', 'orderDetails')
            ->withSum('orderDetails as total_amount', 'subtotal') // Menghitung total amount dari orderDetails
            ->orderByDesc('order_date')
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('admin.orders.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required',
        ]);

        // Menyimpan order baru
        Order::create($request->only(['customer_id', 'order_date', 'status']));

        return redirect()->route('admin.orders.index')->with('success', 'Order created.');
    }

    public function edit(Order $order)
    {
        $customers = Customer::all();
        return view('admin.orders.edit', compact('order', 'customers'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required',
        ]);

        $order->update($request->only(['customer_id', 'order_date', 'status']));

        return redirect()->route('admin.orders.index')->with('success', 'Order updated.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted.');
    }
}

