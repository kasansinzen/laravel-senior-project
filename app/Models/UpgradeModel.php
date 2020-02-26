<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UpgradeModel extends Model
{
    protected $table = 'upgrade';
    protected $primaryKey = 'upgrade_id';
    protected $fillable = [
    	'upgrade_accountno', 'upgrade_bank', 'upgrade_picture', 'upgrade_amount', 'upgrade_name', 'upgrade_date', 
    	'upgrade_time', 'user_id',
    ];

    public  function users()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

}
