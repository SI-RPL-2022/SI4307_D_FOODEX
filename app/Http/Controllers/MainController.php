<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('created_at', 'desc')->limit(3)->get();
        $articles = Article::orderBy('created_at', 'desc')->limit(3)->get();
        return view('index', compact('menus', 'articles'));
    }

    public function profile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'alamat' => 'required|string',
            'password' => 'nullable|min:8',
            'password_confirmation' => 'same:password',
            'photo' => 'file|image|mimes:jpg,jpeg,png'
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->name = $validated['name'];
        $user->alamat = $validated['alamat'];

        if ($request->has('password') && $validated['password'] != null) {
            $user->password = Hash::make($validated['password']);
        }

        if ($request->has('photo') && $validated['photo'] != null) {
            $user->photo = $validated['photo']->move('assets/images/avatars/', $validated['photo']->hashName());
        }

        if ($user->save()) {
            return back()
                ->with('alert_type', 'success')
                ->with('alert_message', 'Profile berhasil diupdate.');
        }

        return back()
            ->with('alert_type', 'error')
            ->with('alert_message', 'Profile gagal diupdate.');
    }

    public function menus()
    {
        $menus = Menu::orderBy('created_at', 'desc')->paginate(6);
        return view('menus', compact('menus'));
    }

    public function article(Article $article)
    {
        return view('article', compact('article'));
    }

    public function subscription()
    {
        $subscriptions = Subscription::orderBy('title', 'ASC')->get();
        return view('subscriptions.index', compact('subscriptions'));
    }

    public function showSubscription(Subscription $subscription)
    {
        return view('subscriptions.show', compact('subscription'));
    }

    public function addToCartSubscription(Subscription $subscription)
    {
        $cart = new Cart();
        $cart->subscription_id = $subscription->id;
        $cart->quantity = 1;
        $cart->user_id = Auth::user()->id;
        $cart->save();

        return redirect()->route('cart.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Paket berhasil ditambahkan ke keranjang.');
    }
}
