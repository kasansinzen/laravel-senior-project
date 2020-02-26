<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTypeModel extends Model
{
    protected $table = 'producttype';
    protected $primaryKey = 'producttype_id';
    protected $fillable = [
    	'producttype_name', 'user_id',
    ];

    public function product()
    {
    	return $this->hasMany('App\Models\ProductModel');
    }

    public  function users()
    {
    	return $this->belongsTo('App\Users', 'user_id');
    }
}
