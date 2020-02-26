<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'payment_id';
    protected $fillable = [
    	'payment_bank', 'payment_accountno', 'payment_name', 'payment_description', 'user_id',
    ];

    public  function users()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
