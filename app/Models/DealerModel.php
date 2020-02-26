<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DealerModel extends Model
{
    protected $table = 'dealer';
    protected $primaryKey = 'dealer_id';
    protected $fillable = [
    	'dealer_name', 'dealer_tel', 'delaer_email', 'dealer_picture', 'user_id',
    ];

    public  function users()
    {
    	return $this->belongsTo('App\Users', 'user_id');
    }

    public function discount()
    {
    	return $this->hasOne('App\Models\DiscountModel');
    }
}
