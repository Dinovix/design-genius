<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s'
    ]; 

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function discount(){
        return $this->belongsTo('App\Models\Discount');
    }

    public function order_products(){
        return $this->hasMany(OrderProduct::class);
    }

    // protected function active(): Attribute{
    //     return Attribute::make(
    //         get: fn ($values) => $values == 1 ? "VISIBLE" : "NOT VISIBLE"
    //     );
    // }

    protected $guarded = [];
}
