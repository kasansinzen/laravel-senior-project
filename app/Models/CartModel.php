<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
	protected $table = 'cart';
	protected $primaryKey = 'cart_id';
	protected $fillable = [
		'product_id', 'cart_unit', 'order_no', 'user_id',
	];

	public function product() 
    {
    	return $this->belongsTo('App\Models\ProductModel', 'product_id');
    }

    public function order()
    {
    	return $this->belongsTo('App\Models\OrderModel', 'order_no');
    }

    public function user()
    {
    	return $this->belongsTo('App\Users', 'user_id');
    }
}
