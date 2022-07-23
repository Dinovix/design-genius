<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


	public function referred_by()
	{
		return $this->belongsTo(User::class, "referred_by", "id");
	}

	public function payment_detail()
	{
		return $this->hasOne(PaymentDetail::class);
	}
}
