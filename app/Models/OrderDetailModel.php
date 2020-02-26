<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    protected $table = 'orderdetail';
    protected $fillable = [
    	'order_no', 'product_id', 'unit', 'user_id',
    ];

    public function order()
    {
    	return $this->belongsTo('App\Models\OrderModel', 'order_no');
    }

    public function product() 
    {
    	return $this->belongsTo('App\Models\ProductModel', 'product_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Users', 'user_id');
    }
}
