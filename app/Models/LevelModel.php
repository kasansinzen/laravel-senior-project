<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    protected $table = 'level';
    protected $primaryKey = 'level_id';
    protected $fillable = [
    	'level_status', 'date_start', 'date_end',
    ];
}
