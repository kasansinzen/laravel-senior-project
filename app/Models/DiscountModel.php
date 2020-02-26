<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountModel extends Model
{
    protected $table = 'discount';
    protected $primaryKey = 'discount_id';
    protected $fillable = [
    	'discount_percent', 'product_id', 'dealer_id', 'user_id',
    ];

    public function product()
    {
    	return $this->belongsTo('App\Models\ProductModel', 'product_id');
    }

    public function dealer()
    {
    	return $this->belongsTo('App\Models\DealerModel', 'dealer_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Users', 'user_id');
    }
}
