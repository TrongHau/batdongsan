<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use DB;

class ContactModel extends Model
{
    use CrudTrait;
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'user_id', 'title', 'phone', 'address', 'message', 'status'];
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

}
