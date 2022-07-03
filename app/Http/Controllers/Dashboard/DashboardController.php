<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Subscription;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $menus = Menu::count();
        $subscribtions = Subscription::count();
        $orders = Order::count();
        $users = User::where('is_admin', 0)->count();
        $income = Order::sum('total');
        return view('admin.index', compact('menus', 'subscribtions', 'orders', 'users', 'income'));
    }
}
