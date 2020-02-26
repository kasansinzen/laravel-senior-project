<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IntervalModel extends Model
{
    protected $table = 'interval';
    protected $primaryKey = 'interval_id';
    protected $fillable = [
    	'interval_start', 'interval_end', 'user_id',
    ];

    public  function users()
    {
    	return $this->belongsTo('App\Users', 'user_id');
    }
}
