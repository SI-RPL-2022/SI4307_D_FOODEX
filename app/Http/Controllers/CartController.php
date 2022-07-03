<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Subscription;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
        $totalMenuPrice = Menu::query()
            ->select('id', 'price')
            ->whereIn('id', $carts->pluck('menu_id'))
            ->cursor()
            ->reduce(fn($a, $p) => $a + ( $p->price * $carts->firstWhere('menu_id', $p->id)->quantity ), 0);
        $totalSubscriptionPrice = Subscription::query()
            ->select('id', 'price')
            ->whereIn('id', $carts->pluck('subscription_id'))
            ->cursor()
            ->reduce(fn($a, $p) => $a + ( $p->price * $carts->firstWhere('subscription_id', $p->id)->quantity ), 0);
        $totalPrice = $totalMenuPrice + $totalSubscriptionPrice;
        return view('carts.index', compact('carts', 'totalPrice'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // if product already exist on cart
        Cart::updateOrCreate(
            ['user_id' => auth()->user()->id, 'menu_id' => $request->menu_id],
            ['quantity' => $request->quantity]
        );

        return redirect()->route('cart.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Menu berhasil ditambahkan');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Menu berhasil dihapus');
    }
}
