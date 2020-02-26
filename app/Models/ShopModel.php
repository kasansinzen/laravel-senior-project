<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
    protected $table = 'shop';
    protected $primaryKey = 'shop_id';
    protected $fillable = [
    	'shop_url', 'user_id'
    ];

    public  function users()
    {
    	return $this->belongsTo('App\Users', 'user_id');
    }
}
