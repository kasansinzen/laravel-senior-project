<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'news_id';
    protected $fillable = [
    	'news_header', 'news_content', 'news_picture',
    ];
}
