<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'order_no';
    protected $fillable = [
    	'order_totalprice', 'customer_id', 'orderstatus_id', 'user_id',
    ];

    public function customer()
    {
    	return $this->belongsTo('App\Models\CustomerModel', 'customer_id');
    }

    public function orderstatus()
    {
    	return $this->belongsTo('App\Models\OrderStatusModel', 'orderstatus_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Users', 'user_id');
    }

    public function orderdetail()
    {
        return $this->hasMany('App\Models\OrderDetailModel');
    }

    public function cart()
    {
        return $this->hasMany('App\Models\CartModel');
    }
}
