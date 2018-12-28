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
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'status', 'avatar', 'app_id', 'app', 'point_total', 'point_current', 'aritcle_total', 'cash_total', 'cash_curent', 'cash_promotion',
        'birth_day', 'gender', 'province', 'province_id', 'district', 'district_id', 'ward', 'ward_id', 'street', 'street_id', 'address', 'tax_code', 'facebook', 'skype', 'zalo',
        'viber', 'user_type_id', 'nick_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function UserType() {
        return $this->hasMany('App\Models\UserTypeModel', 'id', 'user_type_id')->first();
    }
}
