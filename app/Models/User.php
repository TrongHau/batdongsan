<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Config;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Backpack\CRUD\CrudTrait;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use CrudTrait;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'status', 'avatar', 'app_facebook', 'app_google', 'point_total', 'point_current', 'aritcle_lease_total', 'aritcle_buy_total', 'cash_total', 'cash_curent', 'cash_promotion',
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
    public function userTypeName() {
        return $this->belongsTo('App\Models\UserTypeModel', 'user_type_id');
    }
    public function rolesBDSRoleName()
    {
        $relationship = $this->belongsToMany(Config::get('entrust.role'), Config::get('entrust.role_user_table'), Config::get('entrust.user_foreign_key'), Config::get('entrust.role_foreign_key'))->first();
        if(!$relationship)
            return DEFAULT_ROLE_NAME_EMPTY;
        return $relationship->name;
    }
}
