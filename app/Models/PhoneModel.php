<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Backpack\CRUD\CrudTrait;

class PhoneModel extends Model
{
    use CrudTrait;
    protected $table = 'phone';
    protected $primaryKey = 'phone';
    public $incrementing = false;
    protected $fillable = ['phone', 'status', 'note', 'count_sms', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
