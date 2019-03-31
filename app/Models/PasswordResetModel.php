<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class PasswordResetModel extends Model
{

    protected $table = 'password_resets';
    protected $primaryKey = 'id';
    protected $fillable = ['email', 'token', 'created_at'];


}
