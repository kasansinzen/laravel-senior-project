<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'product_id';
    protected $fillable = [
    	'product_name', 'product_unit', 'product_price', 'product_description', 'product_picture', 'producttype_id',
    	'user_id',
    ];

    public function producttype(){
    	return $this->belongsTo('App\Models\ProductTypeModel', 'producttype_id');
    }

    public  function users()
    {
    	return $this->belongsTo('App\Users', 'user_id');
    }

    public function cart()
    {
    	return $this->hasMany('App\Models\CartModel');
    }

    public function discount()
    {
    	return $this->hasOne('App\Models\DiscountModel');
    }
}
