<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

	protected $casts = [
		'created_at' => 'datetime:Y-m-d H:i:s'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function getRouteKeyName()
	{
		return 'id';
	}

	public function getRouteKey()
	{
		return $this->id;
	}

	public function getCreatedAtAttribute($value)
	{
		return date('d-m-Y H:i:s', strtotime($value));
	}

	public function getUpdatedAtAttribute($value)
	{
		return date('d-m-Y H:i:s', strtotime($value));
	}




}
