<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('updated_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $order->status = $request->status;
        $order->save();
        return redirect()->route('admin.orders.show', $order->id)
            ->with('alert_type', 'success')
            ->with('alert_message', 'Status pesanan berhasil diubah');
    }
}
