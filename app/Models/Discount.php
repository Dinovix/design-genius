<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;


	public function product()
	{
		$this->belongsTo(Product::class);
	}
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s'
    ]; 

    protected $guarded = []; 
}
