<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatusModel extends Model
{
    protected $table = 'orderstatus';
    protected $primaryKey = 'orderstatus_id';
    protected $fillable = [
    	'orderstatus_id', 'orderstatus_name',
    ];

    public function order()
    {
    	return $this->hasMany('App\Models\OrderModel');
    }
}
