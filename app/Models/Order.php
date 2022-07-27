<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s'
    ];

    protected $guarded = ['phone', 'po_box', 'city', 'delivery_address', 'paid', 'shipped'];

    public function order_products(){
        return $this->hasMany('App\Models\OrderProduct');
    }
}
