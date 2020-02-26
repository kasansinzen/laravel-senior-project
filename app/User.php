<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name', 'facebook_id', 'email', 'password', 'picture', 'level_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'member_password', 'remember_token',
    ];

    public function level()
    {
        return $this->belongsTo('App\Models\LevelModel', 'level_id');
    }

    public function cart()
    {
        return $this->hasMany('App\Models\CartModel');
    }

    public function dealer()
    {
        return $this->hasMany('App\Models\DealerModel');
    }

    public function customer()
    {
        return $this->hasMany('App\Models\CustomerModel');
    }

    public function discount()
    {
        return $this->hasOne('App\Models\DiscountModel');
    }

    public function product()
    {
        return $this->hasMany('App\Models\ProductModel');
    }

    public function producttype()
    {
        return $this->hasMany('App\Models\ProductTypeModel');
    }

    public function shop()
    {
        return $this->hasOne('App\Models\ShopModel');
    }

    public function payment()
    {
        return $this->hasMany('App\Models\PaymentModel');
    }

    public function upgrade()
    {
        return $this->hasMany('App\Models\UpgradeModel');
    }

    public function interval()
    {
        return $this->hasMany('App\Models\IntervalModel');
    }
}
