<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
	protected $table = 'customer';
	protected $primaryKey = 'customer_id';
	protected $fillable = [
		'customer_id', 'customer_name', 'customer_address', 'customer_postcode', 'customer_email', 'customer_tel', 
		'user_id',
	];

	public function user()
    {
    	return $this->belongsTo('App\Users', 'user_id');
    }
	
    public function order()
    {
    	return $this->hasMany('App\Models\OrderModel');
    }
}
