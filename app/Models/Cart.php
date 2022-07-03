<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['menu_id', 'quantity', 'user_id'];

    public function setQuantityAttribute($value) {
        $this->attributes['quantity'] = ($this->attributes['quantity'] ?? 0)+$value;
    }

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class, 'id', 'subscription_id');
    }
}
