<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('created_at', 'desc')->get();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'calories' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->calories = $request->calories;
        $menu->price = $request->price;
        $menu->image = $request->image->move('assets/images/menus', $request->image->hashName());
        $menu->save();

        return redirect()->route('admin.menus.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Menu berhasil dibuat');
    }

    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'calories' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
            'image' => 'image|mimes:jpeg,png,jpg'
        ]);

        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->calories = $request->calories;
        $menu->price = $request->price;
        if ($request->hasFile('image')) {
            if (File::exists($menu->image)) {
                File::delete($menu->image);
            }

            $menu->image = $request->image->move('assets/images/menus', $request->image->hashName());
        }
        $menu->save();

        return redirect()->route('admin.menus.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Menu berhasil diubah');
    }

    public function destroy(Menu $menu)
    {
        if (File::exists($menu->image)) {
            File::delete($menu->image);
        }

        $menu->delete();

        return redirect()->route('admin.menus.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Menu berhasil dihapus');
    }
}
