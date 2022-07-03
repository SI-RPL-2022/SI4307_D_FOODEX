<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $items = Cart::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
        if($items->count()==0){
            return redirect()->route('cart.index')
                ->with('alert_type', 'danger')
                ->with('alert_message', 'Keranjang masih kosong');
        }
        $totalMenuPrice = Menu::query()
            ->select('id', 'price')
            ->whereIn('id', $items->pluck('menu_id'))
            ->cursor()
            ->reduce(fn($a, $p) => $a + ( $p->price * $items->firstWhere('menu_id', $p->id)->quantity ), 0);
        $totalSubscriptionPrice = Subscription::query()
            ->select('id', 'price')
            ->whereIn('id', $items->pluck('subscription_id'))
            ->cursor()
            ->reduce(fn($a, $p) => $a + ( $p->price * $items->firstWhere('subscription_id', $p->id)->quantity ), 0);
        $totalPrice = $totalMenuPrice + $totalSubscriptionPrice;
        return view('orders.create', compact('items', 'totalPrice'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'payment_proof' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $items = Cart::where('user_id', auth()->user()->id)->get();

        $totalMenuPrice = Menu::query()
            ->select('id', 'price')
            ->whereIn('id', $items->pluck('menu_id'))
            ->cursor()
            ->reduce(fn($a, $p) => $a + ( $p->price * $items->firstWhere('menu_id', $p->id)->quantity ), 0);
        $totalSubscriptionPrice = Subscription::query()
            ->select('id', 'price')
            ->whereIn('id', $items->pluck('subscription_id'))
            ->cursor()
            ->reduce(fn($a, $p) => $a + ( $p->price * $items->firstWhere('subscription_id', $p->id)->quantity ), 0);
        $totalPrice = $totalMenuPrice + $totalSubscriptionPrice;

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->name = $request->name;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->payment_proof = $request->payment_proof->move('assets/images/payment_proof', $request->payment_proof->hashName());
        $order->total = $totalPrice;
        $order->status = 0;
        $order->save();

        foreach ($items as $item) {
            $orderDetail = new OrderDetail();
            if ($item->menu_id != null){
                $orderDetail->name = $item->menu->name;
                $orderDetail->description = 'Pemesanan Menu';
                $orderDetail->price = $item->menu->price;
                $orderDetail->quantity = $item->quantity;
                $orderDetail->order_id = $order->id;
            } else {
                $orderDetail->name = $item->subscription->title;
                $orderDetail->description = 'Pemesanan Paket';
                $orderDetail->price = $item->subscription->price;
                $orderDetail->quantity = $item->quantity;
                $orderDetail->order_id = $order->id;
            }
            $orderDetail->save();
        }

        $items->each->delete();

        return redirect()->route('orders.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Pesanan berhasil dibuat');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $order->status = $request->status;
        $order->save();
        return redirect()->route('orders.show', $order->id)
            ->with('alert_type', 'success')
            ->with('alert_message', 'Status pesanan berhasil diubah');
    }
}
