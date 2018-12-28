<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class UserTypeModel extends Model
{
    public $timestamps = false;
    protected $table = 'user_type';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
