<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::orderBy('created_at', 'desc')->get();
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    public function create()
    {
        return view('admin.subscriptions.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'price' => 'required|integer',
            'monday_lunch' => 'required|string',
            'monday_dinner' => 'required|string',
            'tuesday_lunch' => 'required|string',
            'tuesday_dinner' => 'required|string',
            'wednesday_lunch' => 'required|string',
            'wednesday_dinner' => 'required|string',
            'thursday_lunch' => 'required|string',
            'thursday_dinner' => 'required|string',
            'friday_lunch' => 'required|string',
            'friday_dinner' => 'required|string',
            'saturday_lunch' => 'required|string',
            'saturday_dinner' => 'required|string',
            'sunday_lunch' => 'required|string',
            'sunday_dinner' => 'required|string'
        ]);

        $subscription = new Subscription();
        $subscription->title = $request->title;
        $subscription->price = $request->price;
        $subscription->monday_lunch = $request->monday_lunch;
        $subscription->monday_dinner = $request->monday_dinner;
        $subscription->tuesday_lunch = $request->tuesday_lunch;
        $subscription->tuesday_dinner = $request->tuesday_dinner;
        $subscription->wednesday_lunch = $request->wednesday_lunch;
        $subscription->wednesday_dinner = $request->wednesday_dinner;
        $subscription->thursday_lunch = $request->thursday_lunch;
        $subscription->thursday_dinner = $request->thursday_dinner;
        $subscription->friday_lunch = $request->friday_lunch;
        $subscription->friday_dinner = $request->friday_dinner;
        $subscription->saturday_lunch = $request->saturday_lunch;
        $subscription->saturday_dinner = $request->saturday_dinner;
        $subscription->sunday_lunch = $request->sunday_lunch;
        $subscription->sunday_dinner = $request->sunday_dinner;
        $subscription->save();

        return redirect()->route('admin.subscriptions.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Paket berhasil dibuat');
    }

    public function edit(Subscription $subscription)
    {
        return view('admin.subscriptions.edit', compact('subscription'));
    }

    public function update(Request $request, Subscription $subscription)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'price' => 'required|integer',
            'monday_lunch' => 'required|string',
            'monday_dinner' => 'required|string',
            'tuesday_lunch' => 'required|string',
            'tuesday_dinner' => 'required|string',
            'wednesday_lunch' => 'required|string',
            'wednesday_dinner' => 'required|string',
            'thursday_lunch' => 'required|string',
            'thursday_dinner' => 'required|string',
            'friday_lunch' => 'required|string',
            'friday_dinner' => 'required|string',
            'saturday_lunch' => 'required|string',
            'saturday_dinner' => 'required|string',
            'sunday_lunch' => 'required|string',
            'sunday_dinner' => 'required|string'
        ]);

        $subscription->title = $request->title;
        $subscription->price = $request->price;
        $subscription->monday_lunch = $request->monday_lunch;
        $subscription->monday_dinner = $request->monday_dinner;
        $subscription->tuesday_lunch = $request->tuesday_lunch;
        $subscription->tuesday_dinner = $request->tuesday_dinner;
        $subscription->wednesday_lunch = $request->wednesday_lunch;
        $subscription->wednesday_dinner = $request->wednesday_dinner;
        $subscription->thursday_lunch = $request->thursday_lunch;
        $subscription->thursday_dinner = $request->thursday_dinner;
        $subscription->friday_lunch = $request->friday_lunch;
        $subscription->friday_dinner = $request->friday_dinner;
        $subscription->saturday_lunch = $request->saturday_lunch;
        $subscription->saturday_dinner = $request->saturday_dinner;
        $subscription->sunday_lunch = $request->sunday_lunch;
        $subscription->sunday_dinner = $request->sunday_dinner;
        $subscription->save();

        return redirect()->route('admin.subscriptions.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Paket berhasil diubah');
    }

    public function destroy(Subscription $subscription)
    {
        $subscription->delete();

        return redirect()->route('admin.subscriptions.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Paket berhasil dihapus');
    }
}
