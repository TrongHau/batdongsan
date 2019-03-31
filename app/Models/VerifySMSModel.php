<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class VerifySMSModel extends Model
{
    protected $table = 'sms_otp';
    protected $primaryKey = 'user_id';
    protected $fillable = ['user_id', 'phone', 'otp', 'otp_time_expried', 'type'];
}
